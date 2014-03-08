<?php
return CMap::mergeArray(
    include(__DIR__ . '/main.php'),
    array(
        'controllerPath' => realpath(__DIR__ . '/../controllers/backend'),
        'viewPath' => realpath(__DIR__ . '/../views/backend'),
        'defaultController' => 'dash',
        'import' => array(
            'application.forms.backend.*',
            'application.helpers.bootstrap.*',
            'application.helpers.bootstrap.widgets.*',
        ),
        'modules' => array(
            'gii' => array(
                'class' => 'system.gii.GiiModule',
                'password' => YII_DEBUG ? '1' : '12345',
                'ipFilters' => array('127.0.0.1', '::1'),
            ),
        ),
        'components' => array(
            'sBackup' => array(
                'class' => 'BackupService',
                'backups_path' => realpath(__DIR__ . '/../../backups')
            ),
            'errorHandler' => array(
                'errorAction' => 'dash/error',
            ),
            'urlManager' => array(
                'baseUrl' => '/backend.php',
                'urlFormat' => 'get',
            ),
        )
    )
);