<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ticket_historie`.
 * Has foreign keys to the tables:
 *
 * - `ticket`
 * - `user`
 * - `ticket_status`
 */
class m181130_103453_create_ticket_historie_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ticket_historie', [
            'id' => $this->primaryKey(),
            'ticket_id' => $this->integer()->notNull(),
            'user_id' => $this->integer(),
            'datum' => $this->datetime()->notNull(),
            'ticket_status_id' => $this->integer(),
            'nachricht' => $this->Text(),
        ]);

        // creates index for column `ticket_id`
        $this->createIndex(
            'idx-ticket_historie-ticket_id',
            'ticket_historie',
            'ticket_id'
        );

        // add foreign key for table `ticket`
        $this->addForeignKey(
            'fk-ticket_historie-ticket_id',
            'ticket_historie',
            'ticket_id',
            'ticket',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-ticket_historie-user_id',
            'ticket_historie',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-ticket_historie-user_id',
            'ticket_historie',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `ticket_status_id`
        $this->createIndex(
            'idx-ticket_historie-ticket_status_id',
            'ticket_historie',
            'ticket_status_id'
        );

        // add foreign key for table `ticket_status`
        $this->addForeignKey(
            'fk-ticket_historie-ticket_status_id',
            'ticket_historie',
            'ticket_status_id',
            'ticket_status',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `ticket`
        $this->dropForeignKey(
            'fk-ticket_historie-ticket_id',
            'ticket_historie'
        );

        // drops index for column `ticket_id`
        $this->dropIndex(
            'idx-ticket_historie-ticket_id',
            'ticket_historie'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-ticket_historie-user_id',
            'ticket_historie'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-ticket_historie-user_id',
            'ticket_historie'
        );

        // drops foreign key for table `ticket_status`
        $this->dropForeignKey(
            'fk-ticket_historie-ticket_status_id',
            'ticket_historie'
        );

        // drops index for column `ticket_status_id`
        $this->dropIndex(
            'idx-ticket_historie-ticket_status_id',
            'ticket_historie'
        );

        $this->dropTable('ticket_historie');
    }
}
