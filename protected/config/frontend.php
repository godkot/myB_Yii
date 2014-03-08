<?php

return CMap::mergeArray(
    include(__DIR__ . '/main.php'),
    array(
        'controllerPath' => realpath(__DIR__ . '/../controllers/frontend'),
        'viewPath' => realpath(__DIR__ . '/../views/frontend'),
        'defaultController' => 'site',
        'import' => array(
            'application.forms.frontend.*',
        ),
        'components' => array(
            'sMail' => array(
                'viewsPath' => 'application.views.frontend.emails'
            ),
            'urlManager' => array(
                'urlFormat' => 'path',
                'showScriptName' => false,
                'rules' => array(
                    'comment/add' => 'comment/add',
                    '<id:\w+>' => 'page/show',
                ),
            ),
            'errorHandler' => array(
                'errorAction' => 'site/error',
            ),
        )
    )
);