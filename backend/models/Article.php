<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id_art
 * @property string $titre
 * @property string $contenu
 * @property integer $publie
 * @property string $image
 * @property integer $id_user
 *
 * @property User $idUser
 * @property Categorie[] $categories
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titre', 'contenu', 'publie', 'image', 'id_user'], 'required'],
            [['contenu'], 'string'],
            [['publie', 'id_user'], 'integer'],
            [['titre'], 'string', 'max' => 30],
            [['image'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_art' => 'Id Art',
            'titre' => 'Titre',
            'contenu' => 'Contenu',
            'publie' => 'Publie',
            'image' => 'Image',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categorie::className(), ['id_art' => 'id_art']);
    }
}
