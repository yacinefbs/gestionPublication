<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\User;
use dosamigos\datepicker\DatePicker;
use backend\models\Categorie;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

   <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contenu')->textarea(['rows' => 6]) ?>

    
     <?= $form->field($model, 'publie')->dropDownList(
         array(['1'=>'Oui', '0' => 'Non', '9' => 'Supprimé'])
     ); 
     // ['prompt' => 'Publier ?']
     ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?php  
        $modelCats = ArrayHelper::map($modelCats, 'categorie', 'categorie');    
    ?>

    <?php if(empty($_GET['id'])) { ?>
        <?= $form->field($model, 'categories')->checkboxlist($modelCats);

         ?>
        
    <?php 
    }else{ 
    //    if(!$model->isNewRecord)
    //     $list2 = ArrayHelper::map(Categorie::find()->all(),'categorie','categorie'); 
    // else
    // $list2 = array(); 
// var_dump($list2);
 ?>
    <?= $form->field($model, 'categories')->checkboxlist($modelCats, $model2); ?>
    
    <?php
    }
    ?>

   

   <!-- <?= $form->field($model, 'id_user')->dropDownList(
            ArrayHelper::map(User::find()->all(), 'id', 'username'),
            ['prompt' => 'Sélectionner user']
        ); ?>
    -->    
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
