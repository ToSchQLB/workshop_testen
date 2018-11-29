<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ticktet_status`.
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
        $this->createTable('ticktet_status', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'crus' => $this->integer(),
            'crti' => $this->datetime(),
            'upus' => $this->integer(),
            'upti' => $this->datetime(),
        ]);

        // creates index for column `crus`
        $this->createIndex(
            'idx-ticktet_status-crus',
            'ticktet_status',
            'crus'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-ticktet_status-crus',
            'ticktet_status',
            'crus',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `upus`
        $this->createIndex(
            'idx-ticktet_status-upus',
            'ticktet_status',
            'upus'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-ticktet_status-upus',
            'ticktet_status',
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
            'fk-ticktet_status-crus',
            'ticktet_status'
        );

        // drops index for column `crus`
        $this->dropIndex(
            'idx-ticktet_status-crus',
            'ticktet_status'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-ticktet_status-upus',
            'ticktet_status'
        );

        // drops index for column `upus`
        $this->dropIndex(
            'idx-ticktet_status-upus',
            'ticktet_status'
        );

        $this->dropTable('ticktet_status');
    }
}
