<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20150622222841 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $task = $schema->getTable('link_pm_read_task');

        $workflowIdCol = $task->getColumn('workflow_id');
        $workflowIdCol->setNotnull(false);
        $processIdCol = $task->getColumn('process_id');
        $processIdCol->setNotnull(false);

    }

    public function down(Schema $schema)
    {
        $task = $schema->getTable('link_pm_read_task');

        $workflowIdCol = $task->getColumn('workflow_id');
        $workflowIdCol->setNotnull(true);
        $processIdCol = $task->getColumn('process_id');
        $processIdCol->setNotnull(true);

    }
}
