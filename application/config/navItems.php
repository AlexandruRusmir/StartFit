<?php

return [
    'items' => [
        'home' => [
            'name' => 'Home',
            'url' => URL::site('index/index')
        ],
        'login' => [
            'name' => 'Login',
            'url' => URL::site('register/index')
        ],
        'logout' => [
            'name' => 'Logout',
            'url' => URL::site('register/logout')
        ]
    ],

    'adminItems' => [
        'display_exercise_categories'=> [
            'name' => 'Exercise categories',
            'url' => URL::site('exerciseHandling/displayExerciseCategories')
        ],
        'display_exercises'=> [
            'name' => 'Display exercises',
            'url' => URL::site('exerciseHandling/displayExercises')
        ],
    ],

    'superAdminItems' => [
        'users_list' => [
            'name' => 'Users list',
            'url' => URL::site('usersHandling/displayUsers')
        ]
    ]
];