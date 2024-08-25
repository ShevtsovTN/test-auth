<?php

use Illuminate\Support\Carbon;

return [
    'astroway' => [
        'basic' => [
            'duration_in_days' => 30,
            'ai_experts_message_count' => 100,
        ],
        'temporary' => [
            'duration_in_days' => 5,
            'ai_experts_message_count' => 10,
        ],
    ],
    'mind_healthy' => [
        'basic' => [
            'duration_in_days' => 30,
        ],
        'temporary' => [
            'duration_in_days' => 5,
        ],
    ],
    'past_life' => [
        'basic' => [
            'request_count' => 30,
        ],
        'temporary' => [
            'request_count' => 1,
        ],
    ],
    'surname_mystery' => [
        'basic' => [
            'request_count' => 30,
        ],
        'temporary' => [
            'request_count' => 1,
        ],
    ],
    'my_dream' => [
        'basic' => [
            'request_count' => 200,
            'ai_experts_message_count' => 1000,
        ],
        'temporary' => [
            'request_count' => 1,
            'ai_experts_message_count' => 3,
        ],
    ],

    'demo_user' => [
        'payment_expired_at' => Carbon::createFromFormat('Y-m-d', '2099-01-01'),
        'name' => 'Demo',
        'timezone' => 'UTC',
        'time_of_birth' => '12:00',
        'date_of_birth' => '1970-01-01',
        'place_of_birth' => 'London, UK',
        'gender' => 'Male',
        'request_count' => 1000,
        'lesson_order' => 1,
        'ai_experts_message_count' => 1000,
        'zodiac_sign' => 'Capricorn',
    ],
];
