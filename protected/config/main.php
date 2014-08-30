<?php

return array(

    'defaultController' => 'advert',

	'modules'=>array(

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'080388',
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

    'components' => array(
        'curl' => array(
            'class' => 'ext.curl-master.Curl',
            'options' => array(
                CURLOPT_VERBOSE        => false,
            ),
        ),
        'log'         => array(
            'class' => 'CLogRouter',
            'routes'=> array(
                array(
                    'class'  => 'ext.yiidebugtb.XWebDebugRouter',
                    'config' => 'alignRight, opaque, runInDebug, fixedPos, yamlStyle',
                    'levels' => 'error, warning, trace, profile, info',
                    'allowedIPs' => array('127.0.0.1', $_SERVER['REMOTE_ADDR']),
                ),
            ),
        ),
    )
);