<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket_status".
 *
 * @property int $id
 * @property string $name
 * @property int $crus
 * @property string $crti
 * @property int $upus
 * @property string $upti
 *
 * @property Ticket[] $tickets
 * @property TicketHistorie[] $ticketHistories
 * @property User $upus0
 * @property User $crus0
 */
class TicketStatus extends CrUpRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['crus', 'upus'], 'integer'],
            [['crti', 'upti'], 'safe'],
            [['name'], 'string', 'max' => 50],
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
            'id' => Yii::t('ticket', 'ID'),
            'name' => Yii::t('ticket', 'Name'),
            'crus' => Yii::t('ticket', 'Crus'),
            'crti' => Yii::t('ticket', 'Crti'),
            'upus' => Yii::t('ticket', 'Upus'),
            'upti' => Yii::t('ticket', 'Upti'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['ticket_status_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketHistories()
    {
        return $this->hasMany(TicketHistorie::className(), ['ticket_status_id' => 'id']);
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
}
