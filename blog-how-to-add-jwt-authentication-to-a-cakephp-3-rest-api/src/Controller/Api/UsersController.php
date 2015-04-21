<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotImplementedException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Exception\Exception;
use Cake\Utility\Security;
use Crud\Crud;

class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        //$this->Auth->allow('add', 'token');
    }

    /**
     * Create new user and return id plus JWT token
     */
    public function add()
    {
        $this->Crud->on('afterSave', function(\Cake\Event\Event $event) {
            if ($event->subject->created) {
                $this->set('data', [
                    'id' => $event->subject->entity->id,
                    'token' => $token = \JWT::encode(['id' => $event->subject->entity->id], Security::salt())
                ]);
                $this->Crud->action()->config('serialize.data', 'data');
            }
        });
        return $this->Crud->execute();
    }

    /**
     * Return JWT token if posted user credentials pass AuthComponent
     */
    public function token()
    {
        $user = $this->Auth->identify();
        if ($user) {
            $this->set([
                'success' => true,
                'data' => [
                    'token' => $token = \JWT::encode(['id' => $user['id']], Security::salt())
                ],
                '_serialize' => ['success', 'data']
            ]);
            return;
        }
        throw new UnauthorizedException();
    }

    public function woot()
    {
        $this->set([
            'success' => true,
            'data' => [
                'woot' => 'wootwoot'
            ],
            '_serialize' => ['success', 'data']
        ]);
        return;
    }

}
