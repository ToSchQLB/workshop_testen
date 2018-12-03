<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ticket".
 *
 * @property int $id
 * @property int $projekt_id
 * @property int $ticket_kategorie_id
 * @property string $titel
 * @property string $beschreibung
 * @property int $bearbeiter_id
 * @property int $ticket_status_id
 * @property int $crus
 * @property string $crti
 * @property int $upus
 * @property string $upti
 *
 * @property User $bearbeiter
 * @property Projekt $projekt
 * @property TicketKategorie $ticketKategorie
 * @property TicketStatus $ticketStatus
 * @property TicketHistorie[] $ticketHistories
 * @property TicketUser[] $ticketUsers
 * @property User[] $users
 */
class Ticket extends CrUpRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['projekt_id', 'ticket_kategorie_id', 'titel', 'ticket_status_id'], 'required'],
            [['projekt_id', 'ticket_kategorie_id', 'bearbeiter_id', 'ticket_status_id', 'crus', 'upus'], 'integer'],
            [['beschreibung'], 'string'],
            [['crti', 'upti'], 'safe'],
            [['titel'], 'string', 'max' => 255],
            [['upus'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['upus' => 'id']],
            [['bearbeiter_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['bearbeiter_id' => 'id']],
            [['crus'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['crus' => 'id']],
            [['projekt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Projekt::className(), 'targetAttribute' => ['projekt_id' => 'id']],
            [['ticket_kategorie_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketKategorie::className(), 'targetAttribute' => ['ticket_kategorie_id' => 'id']],
            [['ticket_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketStatus::className(), 'targetAttribute' => ['ticket_status_id' => 'id']],
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
                'projekt_id' => Yii::t('projekt', 'Projekt'),
                'projekt.titel' => Yii::t('projekt', 'Projekt'),
                'ticket_kategorie_id' => Yii::t('ticket', 'Katgorie'),
                'ticketKategorie.name' => Yii::t('ticket', 'Katgorie'),
                'titel' => Yii::t('ticket', 'Titel'),
                'beschreibung' => Yii::t('ticket', 'Beschreibung'),
                'bearbeiter_id' => Yii::t('ticket', 'Bearbeiter'),
                'bearbeiter.name' => Yii::t('ticket', 'Bearbeiter'),
                'ticket_status_id' => Yii::t('ticket', 'Status'),
                'ticketStatus.name' => Yii::t('ticket', 'Status'),
            ]
        );
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
    public function getBearbeiter()
    {
        return $this->hasOne(User::className(), ['id' => 'bearbeiter_id']);
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
    public function getProjekt()
    {
        return $this->hasOne(Projekt::className(), ['id' => 'projekt_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketKategorie()
    {
        return $this->hasOne(TicketKategorie::className(), ['id' => 'ticket_kategorie_id']);
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
    public function getTicketHistories()
    {
        return $this->hasMany(TicketHistorie::className(), ['ticket_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketUsers()
    {
        return $this->hasMany(TicketUser::className(), ['ticket_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('ticket_user', ['ticket_id' => 'id']);
    }
}
