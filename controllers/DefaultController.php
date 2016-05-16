<?php

namespace suleyildirim\blog\controllers;
use Yii;
use yii\web\Controller;
use yii\data\SqlDataProvider;
use suleyildirim\blog\models\Tbcontent;
use suleyildirim\blog\models\TbcontentSearch;

use yii\db\Query;


class DefaultController extends Controller
{
    public function actionIndex()
    {
    	/*$query = new Query;
        // compose the query
        $query->select('*')
            ->from('tbContent');
        // build and execute the query
        $rows = $query->all();
        // alternatively, you can create DB command and execute it
        $command = $query->createCommand();
        // $command->sql returns the actual SQL
        $rows = $command->queryAll();*/

    	$provider = new \yii\data\ActiveDataProvider([
    		'query' => tbContent::find(),
    		'pagination' => [
    			'pageSize' => 10,
    		],
    		]);
    	return $this->render('index', ['provider' => $provider]);
    }
}
