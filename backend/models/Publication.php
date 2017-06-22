<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "publication".
 *
 * @property integer $id_pub
 * @property string $titre
 * @property string $description
 * @property string $contenu
 * @property string $date_pub
 * @property string $image
 * @property integer $id_client
 * @property integer $id_user
 *
 * @property Client $idClient
 * @property User $idUser
 */
class Publication extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publication';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titre', 'description', 'contenu', 'date_pub', 'image', 'id_client', 'id_user'], 'required'],
            [['description', 'contenu', 'image'], 'string'],
            [['date_pub'], 'safe'],
            [['id_client', 'id_user'], 'integer'],
            [['titre'], 'string', 'max' => 255],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['id_client' => 'id_clt']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pub' => 'Id Pub',
            'titre' => 'Titre',
            'description' => 'Description',
            'contenu' => 'Contenu',
            'date_pub' => 'Date Pub',
            'image' => 'Image',
            'id_client' => 'Id Client',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClient()
    {
        return $this->hasOne(Client::className(), ['id_clt' => 'id_client']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
