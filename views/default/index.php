
<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\db\Query;
use yii\widgets\ListView;

        echo ListView::widget([
            'dataProvider' => $provider,
            'itemView' => function($model){
                return $model->title.'<br/>'.$model->subject.'<br/>Tag '.$model->tag.'<br/>Date '.date("d/m/Y", strtotime( $model->date )).'In '.$model->types->Name.' By '.$model->authors->username.'<br/>'.$model->content.'<br/>' .'<br/>' .'<br/>'  ;
            }
            ]);


?>
<div class="blog-default-index">
    <h1><?= 'Home' ?></h1>
    <h3><?= $this->context->action->uniqueId ?></h3>

    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>


    <p>
        You may customize this page by editing the following file:<br>    
        <code><?= __FILE__ ?></code>
    </p>

</div>