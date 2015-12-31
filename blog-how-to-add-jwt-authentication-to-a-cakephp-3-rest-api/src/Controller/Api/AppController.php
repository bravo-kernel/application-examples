<?php
namespace App\Controller\Api;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * AppController specific to API resources
 */
class AppController extends Controller
{

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
        ]
    ];

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Auth', [
            'storage' => 'Memory',
            'authenticate' => [
                'Form' => [
                    'scope' => ['Users.active' => 1],
                ],
                'ADmad/JwtAuth.Jwt' => [
                    'parameter' => 'token',
                    'userModel' => 'Users',
                    'scope' => ['Users.active' => 1],
                    'fields' => [
                        'username' => 'id'
                    ],
                    'queryDatasource' => true,
                ]
            ],
            'unauthorizedRedirect' => false,
            'checkAuthIn' => 'Controller.initialize'
        ]);
    }
}

