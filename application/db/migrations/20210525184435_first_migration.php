<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
use Paw\core\Model;

final class FirstMigration extends AbstractMigration{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        

        # Phinx insters an autoincremental ID as PK for every created table unless modified
        $tableEspecialidad->addColumn('nombre', 'string', ['limit' => constant('_ESP_NOM_MAX'),
                                                            'null' => false]
                          ->addColumn('descripcion', 'string', ['limit' => constant('_ESP_DESC_MAX'),
                                                                'null'  => false])
                          ->create();

        $tableEspecialidad = $this->table('especialista');
        $tableEspecialista->addColumn('nombre', 'string', ['limit' => constant('_NOM_AP_MAX')]
                          ->addColumn('apellido', 'string', ['limit' => constant('_NOM_AP_MAX'),
                                            'null'  => false])
                          ->create();


    }
}
