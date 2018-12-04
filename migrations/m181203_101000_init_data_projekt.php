<?php

use yii\db\Migration;

/**
 * Class m181203_100400_init_data_projekt
 */
class m181203_101000_init_data_projekt extends Migration
{
    public static $data = [
        [
            'data' => [
                'id' => 1,
                'name' => 'Testen mit Codecept',
                'beschreibung' => "Alles was man braucht um mit Codeception testen zu können",
                'crus' => 4,
                'upus' => 4,
                'crti' => '2018-12-10 10:00:00',
                'upti' => '2018-12-10 10:00:00'
            ],
            'rollen' => [
                4 => \app\models\ProjektUser::R_LEITER,
                3 => \app\models\ProjektUser::R_REPORTER,
            ]
        ],
        [
            'data' => [
                'id' => 2,
                'name' => 'Beispiel 1',
                'beschreibung' => 'Die ist nur ein Beispiel Projekt',
                'crus' => 3,
                'upus' => 3,
                'crti' => '2018-12-10 10:00:00',
                'upti' => '2018-12-10 10:00:00'
            ],
            'rollen' => [
                3 => \app\models\ProjektUser::R_LEITER,
                4 => \app\models\ProjektUser::R_REPORTER,
            ],
        ],
        [
            'data' => [
                'id' => 3,
                'name' => 'Beispiel 2',
                'beschreibung' => 'Die ist nur ein Beispiel Projekt',
                'crus' => 3,
                'upus' => 3,
                'crti' => '2018-12-10 10:00:00',
                'upti' => '2018-12-10 10:00:00'
            ],
            'rollen' => [
                3 => \app\models\ProjektUser::R_LEITER,
                4 => \app\models\ProjektUser::R_REPORTER,
            ],
        ],
        [
            'data' => [
                'id' => 4,
                'name' => 'Beispiel 3',
                'beschreibung' => 'Die ist nur ein Beispiel Projekt',
                'crus' => 2,
                'upus' => 2,
                'crti' => '2018-12-10 10:00:00',
                'upti' => '2018-12-10 10:00:00'
            ],
            'rollen' => [
                2 => \app\models\ProjektUser::R_LEITER,
            ],
        ]
    ];
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->delete('projekt');
        foreach (self::$data as $datum) {
            $this->insert('projekt', $datum['data']);
            foreach ($datum['rollen'] as $userId => $rolle) {
                $this->insert('projekt_user', [
                    'projekt_id' => \app\models\Projekt::find()->max('id'),
                    'user_id' => $userId,
                    'rolle' => $rolle
                ]);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('projekt');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181203_100400_init_data_projekt cannot be reverted.\n";

        return false;
    }
    */
}
