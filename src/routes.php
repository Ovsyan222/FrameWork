<?php

return [
    // Простейший тестовый маршрут
    '~^test$~' => [\MyProject\Controllers\UsersController::class, 'test'],
    
    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
    '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
    '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
    '~^users/login$~' => [\MyProject\Controllers\UsersController::class, 'login'],
    '~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],
    '~^users/signUpSuccessful$~' => [\MyProject\Controllers\UsersController::class, 'signUpSuccessful'],
    '~^articles/(\d+)/comments$~' => [\MyProject\Controllers\CommentsController::class, 'add'],
    '~^comments/(\d+)/edit$~' => [\MyProject\Controllers\CommentsController::class, 'edit'],
];