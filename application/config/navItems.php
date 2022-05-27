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
        'add_exercise' => [
            'name' => 'Add exercise',
            'url' => URL::site('exerciseHandling/displayAddExercise')
        ],
        'display_exercises'=> [
            'name' => 'Display exercises',
            'url' => URL::site('exerciseHandling/displayExercises')
        ],
        'display_exercise_categories'=> [
            'name' => 'Exercise categories',
            'url' => URL::site('exerciseHandling/displayExerciseCategories')
        ],

    ],
    'superAdminItems' => [
        'users_list' => [
            'name' => 'Users list',
            'url' => URL::site('usersHandling/displayUsers')
        ]
    ]
];