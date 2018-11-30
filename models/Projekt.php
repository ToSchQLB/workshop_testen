<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projekt".
 *
 * @property int $id
 * @property string $name
 * @property string $beschreibung
 * @property int $crus
 * @property string $crti
 * @property int $upus
 * @property string $upti
 *
 * @property User $upus0
 * @property User $crus0
 * @property ProjektUser[] $projektUsers
 * @property User[] $users
 * @property Ticket[] $tickets
 */
class Projekt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projekt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['beschreibung'], 'string'],
            [['crus', 'upus'], 'integer'],
            [['crti', 'upti'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['upus'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['upus' => 'id']],
            [['crus'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['crus' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('projekt', 'ID'),
            'name' => Yii::t('projekt', 'Name'),
            'beschreibung' => Yii::t('projekt', 'Beschreibung'),
            'crus' => Yii::t('projekt', 'Crus'),
            'crti' => Yii::t('projekt', 'Crti'),
            'upus' => Yii::t('projekt', 'Upus'),
            'upti' => Yii::t('projekt', 'Upti'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpus0()
    {
        return $this->hasOne(User::className(), ['id' => 'upus']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrus0()
    {
        return $this->hasOne(User::className(), ['id' => 'crus']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjektUsers()
    {
        return $this->hasMany(ProjektUser::className(), ['projekt_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('projekt_user', ['projekt_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['projekt_id' => 'id']);
    }
}
