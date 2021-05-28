<?php

namespace Paw\core;

use Paw\core\traits\Loggable;
use Paw\core\database\QueryBuiler;

class Model{
    use Loggable;

    public $queryBuilder;

    public function setQueryBuilder(QueryBuiler $qb){

        define('_NOM_AP_MAX', 50, True);
        define('_ESP_NOM_MAX', 50, True);
        define('_ESP_DESC_MAX', 250, true);
        define('_SERVICES_MAX', 250, true);

        $this->queryBuilder = $qb;

    }
}

?>