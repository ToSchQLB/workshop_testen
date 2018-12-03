<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
        return ArrayHelper::merge(
            parent::attributeLabels(),
            [
                'id' => Yii::t('ticket', 'ID'),
                'name' => Yii::t('ticket', 'Name'),
            ]
        );
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
}
