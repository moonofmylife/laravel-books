<?php

return [
    'book' => [
        'name' => 'Name',
        'author' => 'Author',
        'cover' => 'Cover',
        'cost' => 'Cost of rent (day)',
        'pages' => 'Pages count',
        'age_limit' => 'Age limit',
        'year' => 'Year of writing',
        'description' => 'Description',
        'updated_at' => 'Updated'
    ],
    'rent' => [
        'renter' => 'Renter',
        'rented_at' => 'Rented',
        'created_at' => 'Rented at',
        'expired_at' => 'Expires',
        'period' => 'Rent period (days)',
        'deposit' => 'Deposit (RUB)',
        'books_count' => 'Books count',
        'active' => 'Active'
    ],
    'renter' => [
        'name' => 'Name',
        'lastname' => 'Last name',
        'fullname' => 'Full name',
        'email' => 'Email',
        'gender' => [
            'field' => 'Gender',
            'male' => 'Male',
            'female' => 'Female'
        ],
        'rents_total' => 'Rents (total)',
        'rents_active' => 'Rents (active)',
        'updated_at' => 'Updated',
        'favorite_books' => [
            'field' => 'Favorite books',
            'empty' => 'missing'
        ]
    ]
];
