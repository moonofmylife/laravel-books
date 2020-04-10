<?php

return [
    'books' => [
        'index' => [
            'title' => 'List of books',
            'header' => 'List of books',
            'empty_label' => 'List of books is empty. Add the first book',
            'empty_label_link' => 'right now!'
        ],
        'show' => [
            'detailed_info' => 'Detailed information'
        ],
        'create' => [
            'title' => 'Creation book',
            'header' => 'Creation book'
        ],
        'edit' => [
            'title' => 'Editing book',
            'header' => 'Editing book'
        ],
        'placeholders' => [
            'select_file' => 'Select file'
        ]
    ],
    'renters' => [
        'index' => [
            'title' => 'List of renters',
            'header' => 'List of renters',
            'empty_label' => 'No renters. Add the first one',
            'empty_label_link' => 'right now!'
        ],
        'show' => [
            'rented_books' => 'Rented books',
            'empty_label' => 'At the moment, the user does not have any books in rent.',
            'empty_label_link' => 'Give a book.'
        ],
        'create' => [
            'title' => 'Creating a new renter',
            'header' => 'Creating a new renter'
        ],
        'edit' => [
            'title' => ':user - editing profile',
            'header' => 'Editing profile'
        ],
        'placeholders' => [
            'name' => 'Name',
            'lastname' => 'Last name',
            'email' => 'Email',
            'gender' => 'Select a gender',
            'favorite_books' => 'Favorite books'
        ]
    ],
    'rents' => [
        'create' => [
            'title' => 'Rent book',
            'header' => 'Creation of a new rent',
        ],
        'edit' => [
            'title' => 'Changing the rent terms',
            'header' => 'Changing the rent terms'
        ],
        'placeholders' => [
            'search_renter' => 'Search renter',
            'search_book' => 'Search book'
        ],
        'cost_calculation' => 'Cost calculation',
        'cost_rent' => 'Cost of rent',
        'deposit_amount' => 'Deposit',
        'total_cost' => 'Total price',
        'min_deposit_alert_0' => 'The minimum deposit amount is <strong>30%</strong> of the rent cost',
        'min_deposit_alert' => 'The minimum deposit amount: <strong class="uk-text-bold">:deposit</strong> RUB',
        'cost' => '{0} :cost|[1,*] :cost RUB'
    ],
    'history' => [
        'active' => [
            'title' => '10 most active readers',
            'empty_label' => 'Unfortunately, no active readers were found. It\'s time',
            'empty_label_link' => 'to add them to the list!'
        ],
        'books' => [
            'title' => '10 last recently rented books',
            'empty_label' => 'Unfortunately, no rented books were found'
        ]
    ]
];
