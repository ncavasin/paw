<?php

namespace Paw\core;


use Paw\core\traits\Loggable;
use Paw\core\database\QueryBuiler;

class Model{
    use Loggable;

    public $queryBuilder;

    public function setQueryBuilder(QueryBuiler $qb){

        define('_NOMAP_MAX', 50, True);
        define('_ESPNOM_MAX', 50, True);
        define('_ESPDESC_MAX', 250, true);
        define('_SERVICES_MAX', 250, true);

        $this->$queryBuilder = $qb;

    }
}

?>