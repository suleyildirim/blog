<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\Tbcontent */

$this->title = 'Create Tbcontent';
$this->params['breadcrumbs'][] = ['label' => 'Tbcontents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbcontent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
