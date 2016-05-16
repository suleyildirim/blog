<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\Tbtype */

$this->title = 'Create Tbtype';
$this->params['breadcrumbs'][] = ['label' => 'Tbtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbtype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
