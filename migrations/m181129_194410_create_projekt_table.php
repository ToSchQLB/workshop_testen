<?php

use yii\db\Migration;

/**
 * Handles the creation of table `projekt`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `user`
 */
class m181129_194410_create_projekt_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('projekt', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'beschreibung' => $this->text(),
            'crus' => $this->integer(),
            'crti' => $this->datetime(),
            'upus' => $this->integer(),
            'upti' => $this->datetime(),
        ]);

        // creates index for column `crus`
        $this->createIndex(
            'idx-projekt-crus',
            'projekt',
            'crus'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-projekt-crus',
            'projekt',
            'crus',
            'user',
            'id',
            'RESTRICT'
        );

        // creates index for column `upus`
        $this->createIndex(
            'idx-projekt-upus',
            'projekt',
            'upus'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-projekt-upus',
            'projekt',
            'upus',
            'user',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-projekt-crus',
            'projekt'
        );

        // drops index for column `crus`
        $this->dropIndex(
            'idx-projekt-crus',
            'projekt'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-projekt-upus',
            'projekt'
        );

        // drops index for column `upus`
        $this->dropIndex(
            'idx-projekt-upus',
            'projekt'
        );

        $this->dropTable('projekt');
    }
}
