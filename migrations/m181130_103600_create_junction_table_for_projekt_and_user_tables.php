<?php

use yii\db\Migration;

/**
 * Handles the creation of table `projekt_user`.
 * Has foreign keys to the tables:
 *
 * - `projekt`
 * - `user`
 */
class m181130_103600_create_junction_table_for_projekt_and_user_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('projekt_user', [
            'projekt_id' => $this->integer(),
            'user_id' => $this->integer(),
            'rolle' => $this->smallInteger()->notNull(),
            'PRIMARY KEY(projekt_id, user_id)',
        ]);

        // creates index for column `projekt_id`
        $this->createIndex(
            'idx-projekt_user-projekt_id',
            'projekt_user',
            'projekt_id'
        );

        // add foreign key for table `projekt`
        $this->addForeignKey(
            'fk-projekt_user-projekt_id',
            'projekt_user',
            'projekt_id',
            'projekt',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-projekt_user-user_id',
            'projekt_user',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-projekt_user-user_id',
            'projekt_user',
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
        // drops foreign key for table `projekt`
        $this->dropForeignKey(
            'fk-projekt_user-projekt_id',
            'projekt_user'
        );

        // drops index for column `projekt_id`
        $this->dropIndex(
            'idx-projekt_user-projekt_id',
            'projekt_user'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-projekt_user-user_id',
            'projekt_user'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-projekt_user-user_id',
            'projekt_user'
        );

        $this->dropTable('projekt_user');
    }
}
