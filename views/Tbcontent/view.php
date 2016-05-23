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

    
    <div class="container">
        
    <div class="panel panel-default">
       <div class="panel-heading">
       <b><?= $model->subject ?></b><span class="badge"><?= $model->tag?></span>
        
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
     
     
        </div>

        

        <div class="panel-body">
            
            <?= $model->content?>
        </div>
    <div class="panel-footer">
        <b>"<?= $model->title ;?>"</b> in <?=$model->types->Name?> created by <?= $model->authors->username?> at <?= $model->date ?> 
    </div>
    </div>


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
