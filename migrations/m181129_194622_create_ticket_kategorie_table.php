<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ticket_kategorie`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `user`
 */
class m181129_194622_create_ticket_kategorie_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('ticket_kategorie', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'beschreibung' => $this->text(),
            'crus' => $this->integer(),
            'crti' => $this->datetime(),
            'upus' => $this->integer(),
            'upti' => $this->datetime(),
        ]);

        // creates index for column `crus`
        $this->createIndex(
            'idx-ticket_kategorie-crus',
            'ticket_kategorie',
            'crus'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-ticket_kategorie-crus',
            'ticket_kategorie',
            'crus',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `upus`
        $this->createIndex(
            'idx-ticket_kategorie-upus',
            'ticket_kategorie',
            'upus'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-ticket_kategorie-upus',
            'ticket_kategorie',
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
            'fk-ticket_kategorie-crus',
            'ticket_kategorie'
        );

        // drops index for column `crus`
        $this->dropIndex(
            'idx-ticket_kategorie-crus',
            'ticket_kategorie'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-ticket_kategorie-upus',
            'ticket_kategorie'
        );

        // drops index for column `upus`
        $this->dropIndex(
            'idx-ticket_kategorie-upus',
            'ticket_kategorie'
        );

        $this->dropTable('ticket_kategorie');
    }
}
