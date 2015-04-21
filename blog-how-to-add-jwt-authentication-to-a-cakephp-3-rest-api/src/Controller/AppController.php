<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\UnauthorizedException;

class AppController extends Controller {

    use \Crud\Controller\ControllerTrait;

    public $components = [
        'RequestHandler',
        'Crud.Crud' => [
            'actions' => [
                'Crud.Index',
                'Crud.View',
                'Crud.Add',
                'Crud.Edit',
                'Crud.Delete'
            ],
            'listeners' => [
                'Crud.Api',
                'Crud.ApiPagination',
                'Crud.ApiQueryLog'
            ]
        ],
        'Auth'
    ];

    public function beforeFilter(Event $event)
    {
        $this->Auth->config('authenticate', [
            'Basic',
            'ADmad/JwtAuth.Jwt' => [
                'parameter' => '_token',
                'userModel' => 'Users',
                'scope' => ['Users.active' => 1],
                'fields' => [
                    'id' => 'id'
                ]
            ]
        ]);
    }

}
