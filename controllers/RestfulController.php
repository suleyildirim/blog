<?php

namespace suleyildirim\blog\controllers;
use Yii;
use yii\web\Controller;
use yii\rest\ActiveController;

class RestfulController extends ActiveController
{
	public $modelClass = 'backend\modules\blog\models\Tbcontent';
}
	

