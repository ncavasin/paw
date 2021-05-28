<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ObrasSocialesCreate extends AbstractMigration
{
    public function change(): void
    {
        $tableObrasSociales = $this->table('obras_sociales');
        $tableObrasSociales->addColumn('nombre', 'string', ['limit' => constant('_ESP_NOM_MAX'), 'null' => false]) # TODO la constant no se puede usar aca porque la definiste dentro de MODEL 
            ->create();
    }
}
