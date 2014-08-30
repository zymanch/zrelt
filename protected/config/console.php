<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
    'components' => array(
        'curl' => array(
            'class' => 'ext.curl-master.Curl',
            'options' => array(
                CURLOPT_VERBOSE        => false,
            ),
        ),
    )
);