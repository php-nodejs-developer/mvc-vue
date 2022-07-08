<?php
return [
   [
       'path' => '/',
       'method' => 'GET',
       'controller' => 'Mountains\Controllers\IndexController::index'
   ],
    [
        'path' => '/api/climber',
        'method' => 'POST',
        'controller' => 'Mountains\Controllers\ClimberController::addClimber'
    ],
    [
        'path' => '/api/climb',
        'method' => 'POST',
        'controller' => 'Mountains\Controllers\ClimbController::addClimb'
    ],
    [
        'path' => '/api/mountains',
        'method' => 'POST',
        'controller' => 'Mountains\Controllers\MountainsController::getMountains'
    ],
    [
        'path' => '/api/climb',
        'method' => 'POST',
        'controller' => 'Mountains\Controllers\MountainsController::getAllClimbs'
    ],
];

