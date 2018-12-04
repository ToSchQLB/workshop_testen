<?php

use yii\db\Migration;

/**
 * Class m181204_131459_init_data_status
 */
class m181204_131459_init_data_status extends Migration
{
    private $data = [
        '-1' => 'Neu',
        '-2' => 'Gesehen',
        '-3' => 'Feedback',
        '-4' => 'Testfreigabe',
        '-5' => 'Erledigt',
        '-6' => 'Abgewiesen'
    ];
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        foreach ($this->data as $id => $name) {
            $this->insert(
                'ticket_status',
                [
                    'id' => $id,
                    'name' => $name,
                    'crus' => 2,
                    'crti' => '2018-12-10',
                    'upus' => 2,
                    'upti' => '2018-12-10'
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('ticket_status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181204_131459_init_data_status cannot be reverted.\n";

        return false;
    }
    */
}
