<?php
declare(strict_types=1);

use Paw\core\database\Constants;
use Phinx\Migration\AbstractMigration;


final class FirstMigrations extends AbstractMigration
{
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

        $tableObrasSociales = $this->table('obras_sociales');
        $tableObrasSociales->addColumn('nombre', 'string', ['limit' => Constants::getOsNomMax(),
                                                            'null' => false])
                            ->create();
        
        $tableEspecialidad = $this->table('especialidades');
        $tableEspecialidad->addColumn('nombre', 'string', ['limit' => Constants::getEspNomMax(),
                                                            'null' => false])
                          ->addColumn('descripcion', 'string', ['limit' => Constants::getEspDescMax(),
                                                                'null'  => false])
                          ->create();

        # PK => nombre + apellido
        # Restriccion => sin nombres duplicados
        $tableEspecialista = $this->table('especialistas');
        $tableEspecialista->addColumn('nombre', 'string', ['limit' => Constants::getNomApMax(),
                                                           'null' => false])
                          ->addColumn('apellido', 'string', ['limit' => Constants::getNomApMax(),
                                                             'null'  => false])
                          ->create();

        # PK compuesta => FK(especialidad_id) + FK(especialista_id)
        $tableIntermedia = $this->table('intermedia');
        $tableIntermedia->addColumn('id_especialidad', 'integer', ['limit' => Constants::getEspNomMax(),
                                                         'null' => false])
                        ->addColumn('id_especialista', 'integer', ['limit' => Constants::getNomApMax(),
                                                         'null' => false])
                                        # col local   | tbl externa  | col externa
                        ->addForeignKey('id_especialidad', 'especialidades', 'id')
                                        # col local   | tbl externa  | col externa
                        ->addForeignKey('id_especialista', 'especialistas', 'id')
                        ->create();

        # PK => mail
        # Restriccion => no puede existir un mail asociado a dos cuentas diferentes
        $tableUsuario = $this->table('usuarios', ['id' => false, 'primary_key' => ['mail']]);
        $tableUsuario->addColumn('nombre', 'string', ['limit' => Constants::getNomApMax(),
                                                            'null' => false])
                        ->addColumn('apellido', 'string', ['limit' => Constants::getNomApMax(),
                                                            'null'  => false])
                        ->addColumn('fnac', 'date', ['null' => false])
                        ->addColumn('celular', 'string', ['limit' => Constants::getCelMax(),
                                                          'null' => false])
                        ->addColumn('mail', 'string', ['limit' => Constants::getMailMax(),
                                                       'null' => false])
                        ->addColumn('password', 'string', ['limit' => Constants::getPwdMax(),
                                                           'null' => false])
                        ->addColumn('id_obra_social', 'integer', ['limit' => Constants::getOsNomMax(),
                                                              'null' => true])
                                       # col local   | tbl externa  | col externa
                        ->addForeignKey('id_obra_social', 'obras_sociales', 'id')
                        ->create();
    }
}
