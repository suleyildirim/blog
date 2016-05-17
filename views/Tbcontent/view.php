<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use suleyildirim\blog\models\Tbtype;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\modules\blog\models\Tbcontent */
/*
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'subject',
            'tag',
            'content',
            'date',
            'type',
            'author',
        ],
    ]) ?>
*/

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tbcontents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbcontent-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <h1><?php echo $model->title; ?></h1>

    <div class="postState">

        
        <span class="postSubject">
            <?php echo $model->subject;?>
        </span>
        <br>Tag 
        <span class="postTag">
            <?php echo $model->tag;?>
        </span>
        <br>Date
        <span class="postDate">
            <?php echo date("d/m/Y", strtotime( $model->date ) );?>
        </span>
        In
        <span class="postCat">
            <?php echo $model->types->Name ?>
        </span>
        By 
        <span class="postAut">
            <?php echo $model->authors->username ?>
        </span>
    </div>
    <?php echo $model->content; ?>

</div>

</div>
<style type="text/css">
    h1 {
        font-family: "Times New Roman", Times, serif;
        font-size: 34px;
        margin-bottom: 3px;
    }
    .postSubject{
        margin-bottom: 12px;
        font-size: 20px;
    }
    .postState {
        margin-bottom: 12px;
        font-size: 14px;
    }
    .postDate, .postCat, .postAut, .postTag {
        font-weight: bold;
    }
    .postContent {
        font-size: 18px;
    }
</style>