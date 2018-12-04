<?php

use yii\db\Migration;

/**
 * Class m181204_174944_init_data_ticket
 */
class m181204_174944_init_data_ticket extends Migration
{

    private $data = [
        [
            'data' => [
                'projekt_id' => 1,
                'ticket_kategorie_id' => -1,
                'titel' => 'Yii Installieren',
                'beschreibung' => 'Yii Basic App installieren und composer install ausführen',
                'bearbeiter_id' => 2,
                'ticket_status_id' => -5,
                'crus' => 2,
                'crti' => '2018-12-10 10:00:00',
                'upus' => 2,
                'upti' => '2018-12-10 10:15',
            ],
            'historie' => [
                [
                    'user_id' => 2,
                    'datum' => '2018-12-10 10:01:00',
                    'ticket_status_id' => -1,
                ],
                [
                    'user_id' => 2,
                    'datum' => '2018-12-10 10:01:00',
                    'ticket_status_id' => -2,
                    'nachricht' => 'Wie sonst?'
                ],
                [
                    'user_id' => 2,
                    'datum' => '2018-12-10 10:02:00',
                    'ticket_status_id' => -3,
                    'nachricht' => 'los gehts'
                ],
                [
                    'user_id' => 2,
                    'datum' => '2018-12-10 10:15:00',
                    'ticket_status_id' => -5,
                    'nachricht' => 'Ohne TrendMicro ginge das aber viel schneller!'
                ]

            ]
        ],
        [
            'data' => [
                'projekt_id' => 1,
                'ticket_kategorie_id' => -1,
                'titel' => 'Anwendung entwickeln',
                'beschreibung' => 'Alles soll gehen',
                'bearbeiter_id' => 2,
                'ticket_status_id' => -5,
                'crus' => 2,
                'crti' => '2018-12-10 10:15:00',
                'upus' => 2,
                'upti' => '2018-12-10 12:30:00',
            ],
            'historie' => [
                [
                    'user_id' => 2,
                    'datum' => '2018-12-10 10:16:00',
                    'ticket_status_id' => -1,
                ],
                [
                    'user_id' => 2,
                    'datum' => '2018-12-10 10:16:00',
                    'ticket_status_id' => -2,
                    'nachricht' => 'OK'
                ],
                [
                    'user_id' => 2,
                    'datum' => '2018-12-10 10:17:00',
                    'ticket_status_id' => -3,
                    'nachricht' => 'los gehts'
                ],
                [
                    'user_id' => 2,
                    'datum' => '2018-12-10 12:30:00',
                    'ticket_status_id' => -5,
                    'nachricht' => 'Mittach und Fertig'
                ]

            ]
        ],
        [
            'data' => [
                'projekt_id' => 1,
                'ticket_kategorie_id' => -1,
                'titel' => 'Testsytem einrichten',
                'beschreibung' => 'Codeception',
                'bearbeiter_id' => 2,
                'ticket_status_id' => -1,
                'crus' => 2,
                'crti' => '2018-12-10 10:15:00',
                'upus' => 2,
                'upti' => '2018-12-10 10:15:00',
            ],
            'historie' => [
                [
                    'user_id' => 2,
                    'datum' => '2018-12-10 10:15:00',
                    'ticket_status_id' => -1,
                ],
            ]
        ],
        [
            'data' => [
                'projekt_id' => 1,
                'ticket_kategorie_id' => -1,
                'titel' => 'Tests schreiben',
                'beschreibung' => 'natürlich mit Codeception',
                'bearbeiter_id' => 2,
                'ticket_status_id' => -1,
                'crus' => 2,
                'crti' => '2018-12-10 10:15:00',
                'upus' => 2,
                'upti' => '2018-12-10 10:15:00',
            ],
            'historie' => [
                [
                    'user_id' => 2,
                    'datum' => '2018-12-10 10:15:00',
                    'ticket_status_id' => -1,
                ],
            ]
        ],
        [
            'data' => [
                'projekt_id' => 1,
                'ticket_kategorie_id' => -1,
                'titel' => 'testen',
                'beschreibung' => 'Codeception',
                'bearbeiter_id' => 2,
                'ticket_status_id' => -1,
                'crus' => 2,
                'crti' => '2018-12-10 10:15:00',
                'upus' => 2,
                'upti' => '2018-12-10 10:15:00',
            ],
            'historie' => [
                [
                    'user_id' => 2,
                    'datum' => '2018-12-10 10:15:00',
                    'ticket_status_id' => -1,
                ],
            ]
        ],
    ];
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->delete('ticket');
        foreach ($this->data as $datum) {
            $this->insert('ticket', $datum['data']);
            $ticket_id = \app\models\Ticket::find()->max('id');
            foreach ($datum['historie'] as $historie) {
                $this->insert(
                    'ticket_historie',
                    \yii\helpers\ArrayHelper::merge(
                        ['ticket_id' => $ticket_id],
                        $historie
                    )
                );
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('ticket');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181204_174944_init_data_ticket cannot be reverted.\n";

        return false;
    }
    */
}
