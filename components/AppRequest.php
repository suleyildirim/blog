<?php

namespace common\components;

use Yii;
use yii\web\Request;

class AppRequest extends Request {
    public $web;
    public $aliasUrl;

    public function getBaseUrl(){ 	
        return str_replace($this->web, "", parent::getBaseUrl()) . $this->aliasUrl;
    }
}