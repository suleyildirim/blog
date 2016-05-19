BLOG PORTALI
============

Path
----

\xampp\htdocs\advanced\composer.json

```"require": {
        "php": ">=5.4.0",
		"yiisoft/yii2": ">=2.0.6",
		"yiisoft/yii2-bootstrap": "*",
		"yiisoft/yii2-swiftmailer": "*",
		"suleyildirim/blog":"dev-master"
    },
```


\xampp\htdocs\advanced\backend\config\main-local.php

```	$config = [
		'modules' => [
			'blog' => [
				'class' => 'suleyildirim\blog\Module',
			],
		],
```


Setup
-----

\xampp\htdocs\advanced
```
	composer clear-cache
	commposer update
```

Restful API
-----------

\xampp\htdocs\advanced\backend\config\main-local.php

```	$config = [
    'modules' => [
        'blog' => [
            //'class' => 'suleyildirim\blog\Module',
			'class' => 'backend\modules\blog\Module',
        ],
    ],
	

    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'a20IHwCqs8sw3h1TwFMhGvfwI_jLmbzO',
            'class' => 'common\components\AppRequest',

            'parsers' => [
                'application\json' => 'yii\web\JsonParser',
            ],

            'web' => '/backend/web',
            'aliasUrl' =>'/admin',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            [
                'class' => 'yii\rest\UrlRule',
                'controller' => 'restful',
                'tokens' => [
                    '{id}' => '<id:\\w+'
                ]
            ]

            ],
        ],
    ],
    
];
```

\xampp\htdocs\advanced\frontend\config\main-local.php

```	'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'bcsHZoIMxZ8Rkbpmt0SFvmZvDCQCK26d',
            'class' => 'common\components\AppRequest',
            'web' => '/frontend/web',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            ],
    ],
```
C:\Windows\System32\drivers\etc\hosts


```
127.0.0.1       advanced.com
```

\xampp\apache\conf\extra\httpd-vhosts.conf

```

NameVirtualHost *:80

<VirtualHost *:80>
    ServerAdmin webmaster@advanced.com
    DocumentRoot "C:/xampp/htdocs/advanced"
    ServerName advanced.com
    ErrorLog "logs/advanced.com.log"
    CustomLog "logs/advanced.com-access.log" common
</VirtualHost>

```


\xampp\htdocs\advanced\
**.htaccess:**

```
Options +FollowSymlinks
RewriteEngine On

RewriteCond %{REQUEST_URI} ^/(admin)
RewriteRule ^admin/assets/(.*)$ backend/web/assets/$1 [L]
RewriteRule ^admin/css/(.*)$ backend/web/css/$1 [L]

RewriteCond %{REQUEST_URI} !^/backend/web/(assets|css)/
RewriteCond %{REQUEST_URI} ^/(admin)
RewriteRule ^.*$ backend/web/index.php [L]


RewriteCond %{REQUEST_URI} ^/(assets|css)
RewriteRule ^assets/(.*)$ frontend/web/assets/$1 [L]
RewriteRule ^css/(.*)$ frontend/web/css/$1 [L]

RewriteCond %{REQUEST_URI} !^/(frontend|backend)/web/(assets|css)/
RewriteCond %{REQUEST_URI} !index.php
RewriteCond %{REQUEST_FILENAME} !-f [OR]
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^.*$ frontend/web/index.php

RewriteCond %{REQUEST_URI} ^/(api)
RewriteRule ^api/assets/(.*)$ api/web/assets/$1 [L]
RewriteRule ^api/css/(.*)$ api/web/css/$1 [L]

RewriteCond %{REQUEST_URI} !^/api/web/(assets|css)/
RewriteCond %{REQUEST_URI} ^/(api)
RewriteRule ^.*$ api/web/index.php [L]
```

\blog\components\AppRequest.php

```<?php

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
```

~~~
http://localhost/basic/web/
~~~


**NOTES:**
- Create folder \uploads 
- \xampp\htdocs\advanced\backend\web\uploads
=======


