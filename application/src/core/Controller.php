<?php

namespace Paw\core;

use Paw\core\database\QueryBuilder;
use Paw\core\Model;

class Controller {

    # 1-1 relation against a model
    public ?string $modelName = null;
    
    protected string $viewsDir;
    protected array $contact;
    protected array $userOptions;
    protected array $menuOptions;
    protected array $footerLinks;

    public function __construct(){
        global $connection, $log;
        $this->viewsDir = __DIR__ . "/../app/views/";
        $this->contact = [
            'href' => 'tel:+549234642-4593',
            'name' => '+54 9 2346 42-4593'
        ];
        $this->userOptions = [
            [
                'href' => '/login',
                'name' => 'Ingresar'
            ],
            [
                'href' => '/register',
                'name' => 'Registrarse'
            ]
        ];
        $this->menuOptions = [
            [
                'href' => '/about',
                'name' => '¿Quienes Somos?'
            ],
            [
                'href' => '/services',
                'name' => 'Nuestros Servicios'
            ],
            [
                'href' => '/coverages',
                'name' => 'Coberturas'
            ],
            [
                'href' => '/newturn',
                'name' => 'Turnos'
            ]
        ];
        $this->footerLinks = [
            [
                'href' => 'https://www.facebook.com/dentalmedicalgroup',
                'name' => 'facebook'
            ],
            [
                'href' => 'https://www.instagram.com/dentalmedicalgroup',
                'name' => 'instagram'
            ],
            // [
            //     'href' => 'https://www.linkedin.com/dentalmedicalgroup',
            //     'name' => 'linkedin'
            // ],
            [
                'href' => 'mailto:contacto@dentalmedicalgroup.com',
                'name' => 'mail'
            ]
        ];
        if(! is_null($this->modelName)){
            
            # Construct QB
            # var_dump($connection);die;
            $qb = new QueryBuilder($connection, $log);

            # Construct Model dynamically
            $model = new $this->modelName;

            # Inject QB to Model
            $model->setQueryBuilder($qb);
            $this->setModel($model);
        }
    }

    private function setModel(Model $model){
        $this->model = $model; 
    }
}

?>