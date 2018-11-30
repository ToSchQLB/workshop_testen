<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ticket`.
 * Has foreign keys to the tables:
 *
 * - `projekt`
 * - `ticket_kategorie`
 * - `user`
 * - `ticket_status`
 * - `user`
 * - `user`
 */
class m181130_103413_create_ticket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ticket', [
            'id' => $this->primaryKey(),
            'projekt_id' => $this->integer()->notNull(),
            'ticket_kategorie_id' => $this->integer()->notNull(),
            'titel' => $this->string(255)->notNull(),
            'beschreibung' => $this->text(),
            'bearbeiter_id' => $this->integer(),
            'ticket_status_id' => $this->integer()->notNull(),
            'crus' => $this->integer(),
            'crti' => $this->datetime(),
            'upus' => $this->integer(),
            'upti' => $this->datetime(),
        ]);

        // creates index for column `projekt_id`
        $this->createIndex(
            'idx-ticket-projekt_id',
            'ticket',
            'projekt_id'
        );

        // add foreign key for table `projekt`
        $this->addForeignKey(
            'fk-ticket-projekt_id',
            'ticket',
            'projekt_id',
            'projekt',
            'id',
            'CASCADE'
        );

        // creates index for column `ticket_kategorie_id`
        $this->createIndex(
            'idx-ticket-ticket_kategorie_id',
            'ticket',
            'ticket_kategorie_id'
        );

        // add foreign key for table `ticket_kategorie`
        $this->addForeignKey(
            'fk-ticket-ticket_kategorie_id',
            'ticket',
            'ticket_kategorie_id',
            'ticket_kategorie',
            'id',
            'CASCADE'
        );

        // creates index for column `bearbeiter_id`
        $this->createIndex(
            'idx-ticket-bearbeiter_id',
            'ticket',
            'bearbeiter_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-ticket-bearbeiter_id',
            'ticket',
            'bearbeiter_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `ticket_status_id`
        $this->createIndex(
            'idx-ticket-ticket_status_id',
            'ticket',
            'ticket_status_id'
        );

        // add foreign key for table `ticket_status`
        $this->addForeignKey(
            'fk-ticket-ticket_status_id',
            'ticket',
            'ticket_status_id',
            'ticket_status',
            'id',
            'CASCADE'
        );

        // creates index for column `crus`
        $this->createIndex(
            'idx-ticket-crus',
            'ticket',
            'crus'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-ticket-crus',
            'ticket',
            'crus',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `upus`
        $this->createIndex(
            'idx-ticket-upus',
            'ticket',
            'upus'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-ticket-upus',
            'ticket',
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
        // drops foreign key for table `projekt`
        $this->dropForeignKey(
            'fk-ticket-projekt_id',
            'ticket'
        );

        // drops index for column `projekt_id`
        $this->dropIndex(
            'idx-ticket-projekt_id',
            'ticket'
        );

        // drops foreign key for table `ticket_kategorie`
        $this->dropForeignKey(
            'fk-ticket-ticket_kategorie_id',
            'ticket'
        );

        // drops index for column `ticket_kategorie_id`
        $this->dropIndex(
            'idx-ticket-ticket_kategorie_id',
            'ticket'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-ticket-bearbeiter_id',
            'ticket'
        );

        // drops index for column `bearbeiter_id`
        $this->dropIndex(
            'idx-ticket-bearbeiter_id',
            'ticket'
        );

        // drops foreign key for table `ticket_status`
        $this->dropForeignKey(
            'fk-ticket-ticket_status_id',
            'ticket'
        );

        // drops index for column `ticket_status_id`
        $this->dropIndex(
            'idx-ticket-ticket_status_id',
            'ticket'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-ticket-crus',
            'ticket'
        );

        // drops index for column `crus`
        $this->dropIndex(
            'idx-ticket-crus',
            'ticket'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-ticket-upus',
            'ticket'
        );

        // drops index for column `upus`
        $this->dropIndex(
            'idx-ticket-upus',
            'ticket'
        );

        $this->dropTable('ticket');
    }
}
