<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;

use suleyildirim\blog\models\Tbtype;

/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\Tbcontent */
/* @var $form yii\widgets\ActiveForm 

<?= $form->field($model, 'type')->dropDownList(Tbtype::getCategory()) ?>

<?php
    echo $form->field($model, 'name')->dropDownList(ArrayHelper::map(User::find()->all(),'id','username'),['prompt'=>'Select User']);
?>


    <?php
        echo $form->field($model, 'author')->dropDownList(ArrayHelper::map(User::find()->all(),'id','username'),['prompt'=>'Select User']);
    ?>
    
*/
?>

<div class="tbcontent-form">

    
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file')->fileInput(); ?>

    <?= $form->field($model, 'type')->dropDownList(
         ArrayHelper::map(Tbtype::find()->all(),'ID','Name'),
        ['prompt' => 'Select Category']
) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
