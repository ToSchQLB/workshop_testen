<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ticket_historie".
 *
 * @property int $id
 * @property int $ticket_id
 * @property int $user_id
 * @property string $datum
 * @property int $ticket_status_id
 * @property string $nachricht
 *
 * @property TicketStatus $ticketStatus
 * @property Ticket $ticket
 * @property User $user
 */
class TicketHistorie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket_historie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticket_id', 'datum'], 'required'],
            [['ticket_id', 'user_id', 'ticket_status_id'], 'integer'],
            [['datum'], 'safe'],
            [['nachricht'], 'string'],
            [['ticket_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketStatus::className(), 'targetAttribute' => ['ticket_status_id' => 'id']],
            [['ticket_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ticket::className(), 'targetAttribute' => ['ticket_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('ticket', 'ID'),
            'ticket_id' => Yii::t('ticket', 'Ticket ID'),
            'user_id' => Yii::t('ticket', 'User ID'),
            'datum' => Yii::t('ticket', 'Datum'),
            'ticket_status_id' => Yii::t('ticket', 'Ticket Status ID'),
            'nachricht' => Yii::t('ticket', 'Nachricht'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketStatus()
    {
        return $this->hasOne(TicketStatus::className(), ['id' => 'ticket_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicket()
    {
        return $this->hasOne(Ticket::className(), ['id' => 'ticket_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}