<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\db\Query;
use yii\widgets\ListView;



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "advanced";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT count(* )FROM tbcontent";
$result = $conn->query($sql);
$conn->close();

$blogDiv = "";
if ($result->num_rows > 0) {
           $blogDiv =  $blogDiv.ListView::widget([
            'dataProvider' => $provider,
            'itemView' => function($model){
                $blogDiv = "<div class='panel panel-default'>"."<div class='panel-heading'>".$model->authors->username." created '";
                $blogDiv = $blogDiv."<b>".$model->title."</b>' in ".$model->types->Name." at ".$model->date."</div>";
                //$blogDiv = $blogDiv."<b>".$model->tag."</b> ";
                //$blogDiv = $blogDiv."<b>".$model->title."</b> - ".$model->date;
                $blogDiv = $blogDiv."<div class='panel-body'>".$model->content;

                
                //return $model->title.'<br/>'.$model->subject.'<br/>Tag '.$model->tag.'<br/>Date '.date("d/m/Y", strtotime( $model->date )).'In '.$model->types->Name.' By '.$model->authors->username.'<br/>'.$model->content.'<br/>' .'<br/>' .'<br/>'  ;
                $blogDiv = $blogDiv."</div></div>";
                return $blogDiv;
            }
            ]);

   
} else {
   // $emptyBlogContent = "<div class='container'><div class='jumbotron'>Gece Saçlı Kız Bloğu!</div>";
    //$emptyBlogContent = $emptyBlogContent."Total Blog Content<span class='badge'>0</span></div>";
    //echo $emptyBlogContent;
    echo "not found";
}



 
    

?>


<div class='jumbotron'>Anonim Kişisel Bloğ!</div>
<div class='container'>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            Total Blog Content <span class='badge'><?= $result->num_rows ?></span>
        </div>
        <div class="panel-body">
            <?= $blogDiv ?>
        </div>
    </div>
<div>