<?php

use yii\db\Migration;

/**
 * Class m181204_132439_init_data_kategorie
 */
class m181204_132439_init_data_kategorie extends Migration
{

    private $data = [
        '-1' => 'Funktionswunsch',
        '-2' => 'Anwendungfehler',
        '-3' => 'VerSchreiber',
    ];
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        foreach ($this->data as $id => $name) {
            $this->insert(
                'ticket_kategorie',
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
        $this->delete('ticket_kategorie');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181204_132439_init_data_kategorie cannot be reverted.\n";

        return false;
    }
    */
}
