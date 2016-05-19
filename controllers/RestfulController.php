<?php

namespace suleyildirim\blog\controllers;
use Yii;
use yii\web\Controller;
use yii\rest\ActiveController;

class RestfulController extends ActiveController
{
	//public $modelClass = 'suleyildirim\blog\models\Tbcontent',
	public $modelClass = 'backend\modules\blog\models\Tbcontent';
}
	

