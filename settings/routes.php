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
        'method' => 'GET',
        'controller' => 'Mountains\Controllers\MountainController::getMountains'
    ],
    [
        'path' => '/api/climb',
        'method' => 'GET',
        'controller' => 'Mountains\Controllers\ClimbController::getAllClimbs'
    ],
];

