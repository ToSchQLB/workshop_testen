<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ticket_status`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `user`
 */
class m181129_194749_create_ticktet_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ticket_status', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'crus' => $this->integer(),
            'crti' => $this->datetime(),
            'upus' => $this->integer(),
            'upti' => $this->datetime(),
        ]);

        // creates index for column `crus`
        $this->createIndex(
            'idx-ticket_status-crus',
            'ticket_status',
            'crus'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-ticket_status-crus',
            'ticket_status',
            'crus',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `upus`
        $this->createIndex(
            'idx-ticket_status-upus',
            'ticket_status',
            'upus'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-ticket_status-upus',
            'ticket_status',
            'upus',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-ticket_status-crus',
            'ticket_status'
        );

        // drops index for column `crus`
        $this->dropIndex(
            'idx-ticket_status-crus',
            'ticket_status'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-ticket_status-upus',
            'ticket_status'
        );

        // drops index for column `upus`
        $this->dropIndex(
            'idx-ticket_status-upus',
            'ticket_status'
        );

        $this->dropTable('ticket_status');
    }
}
