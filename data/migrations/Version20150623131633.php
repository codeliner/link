<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20150623131633 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $task = $schema->getTable('link_pm_read_task');

        $messageHandlerId = $task->getColumn('message_handler_id');
        $messageHandlerId->setNotnull(false);

        $task->addColumn('activated', 'boolean', ['default' => 1]);
    }

    public function down(Schema $schema)
    {
        $task = $schema->getTable('link_pm_read_task');

        $messageHandlerId = $task->getColumn('message_handler_id');
        $messageHandlerId->setNotnull(true);

        $task->dropColumn('activated');
    }
}
