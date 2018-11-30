<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ticket_user`.
 * Has foreign keys to the tables:
 *
 * - `ticket`
 * - `user`
 */
class m181130_103448_create_junction_table_for_ticket_and_user_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ticket_user', [
            'ticket_id' => $this->integer(),
            'user_id' => $this->integer(),
            'PRIMARY KEY(ticket_id, user_id)',
        ]);

        // creates index for column `ticket_id`
        $this->createIndex(
            'idx-ticket_user-ticket_id',
            'ticket_user',
            'ticket_id'
        );

        // add foreign key for table `ticket`
        $this->addForeignKey(
            'fk-ticket_user-ticket_id',
            'ticket_user',
            'ticket_id',
            'ticket',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-ticket_user-user_id',
            'ticket_user',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-ticket_user-user_id',
            'ticket_user',
            'user_id',
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
        // drops foreign key for table `ticket`
        $this->dropForeignKey(
            'fk-ticket_user-ticket_id',
            'ticket_user'
        );

        // drops index for column `ticket_id`
        $this->dropIndex(
            'idx-ticket_user-ticket_id',
            'ticket_user'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-ticket_user-user_id',
            'ticket_user'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-ticket_user-user_id',
            'ticket_user'
        );

        $this->dropTable('ticket_user');
    }
}
