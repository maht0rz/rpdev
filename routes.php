<?php
use vibius\core as core;

$rpdev = new vibius\plugins\rpdev();

$rpdev->setLoginCredentials(array('admin' => 'letmein'));
$rpdev->init();

$rpdev->register('/','rpdev/homepage',
        array(
            'projectName',
            'title',
            'jumboTitle',
            'jumboText',
            'section1',
            'section2',
            'section3',
            'section1Title',
            'section2Title',
            'section3Title'
            ));
