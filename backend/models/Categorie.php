<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categorie".
 *
 * @property integer $id_cat
 * @property string $categorie
 * @property integer $id_art
 *
 * @property Article $idArt
 */
class Categorie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categorie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categorie', 'id_art'], 'required'],
            [['id_art'], 'integer'],
            [['categorie'], 'string', 'max' => 30],
            [['id_art'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['id_art' => 'id_art']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cat' => 'Id Cat',
            'categorie' => 'Categorie',
            'id_art' => 'Id Art',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArt()
    {
        return $this->hasOne(Article::className(), ['id_art' => 'id_art']);
    }
}
