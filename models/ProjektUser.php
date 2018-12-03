<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projekt_user".
 *
 * @property int $projekt_id
 * @property int $user_id
 * @property int $rolle
 *
 * @property User $user
 * @property Projekt $projekt
 */
class ProjektUser extends \yii\db\ActiveRecord
{
    const R_LEITER = 1;
    const R_ENTWICKLER = 2;
    const R_REPORTER = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projekt_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['projekt_id', 'user_id', 'rolle'], 'required'],
            [['projekt_id', 'user_id', 'rolle'], 'integer'],
            [['projekt_id', 'user_id'], 'unique', 'targetAttribute' => ['projekt_id', 'user_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['projekt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Projekt::className(), 'targetAttribute' => ['projekt_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'projekt_id' => Yii::t('projekt', 'Projekt ID'),
            'user_id' => Yii::t('projekt', 'User ID'),
            'rolle' => Yii::t('projekt', 'Rolle'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjekt()
    {
        return $this->hasOne(Projekt::className(), ['id' => 'projekt_id']);
    }
}
