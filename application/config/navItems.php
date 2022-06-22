<?php

return [
    'items' => [
        'home' => [
            'name' => 'Home',
            'url' => URL::site('index/index')
        ],
        'workouts' => [
            'name' => 'My Workouts',
            'url' => URL::site('workouts/my_workouts')
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
            'name' => 'Categories',
            'url' => URL::site('exerciseHandling/display_exercise_categories')
        ],
        'display_animations'=> [
            'name' => 'Animations',
            'url' => URL::site('exerciseHandling/display_animations_view')
        ],
        'display_exercises'=> [
            'name' => 'Exercises',
            'url' => URL::site('exerciseHandling/display_exercises')
        ]
    ],

    'superAdminItems' => [
        'users_list' => [
            'name' => 'Users',
            'url' => URL::site('usersHandling/display_users')
        ]
    ]
];