<?php

namespace Paw\core;

use Paw\core\traits\Loggable;
use Paw\core\database\QueryBuiler;

class Model {
    use Loggable;

    public $queryBuilder;

    public function setQueryBuilder(QueryBuiler $qb) {

        $this->queryBuilder = $qb;

    }

}
?>