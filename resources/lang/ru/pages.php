<?php

return [
    'books' => [
        'index' => [
            'title' => 'Список книг',
            'header' => 'Список книг',
            'empty_label' => 'Список книг пуст. Добавьте первую книгу',
            'empty_label_link' => 'прямо сейчас!'
        ],
        'show' => [
            'detailed_info' => 'Детальная информация'
        ],
        'create' => [
            'title' => 'Создание книги',
            'header' => 'Создание книги'
        ],
        'edit' => [
            'title' => 'Редактирование книги',
            'header' => 'Редактирование книги'
        ],
        'placeholders' => [
            'select_file' => 'Выберите файл'
        ]
    ],
    'renters' => [
        'index' => [
            'title' => 'Список арендаторов',
            'header' => 'Список арендаторов',
            'empty_label' => 'Нет арендаторов. Добавьте первого',
            'empty_label_link' => ' прямо сейчас!'
        ],
        'show' => [
            'rented_books' => 'Арендованные книги',
            'empty_label' => 'На данный момент у пользователя нет арендованных книг.',
            'empty_label_link' => 'Выдать книгу.'
        ],
        'create' => [
            'title' => 'Создание нового арендатора',
            'header' => 'Создание нового арендатора'
        ],
        'edit' => [
            'title' => ':user - редактирование профиля',
            'header' => 'Редактирование профиля'
        ],
        'placeholders' => [
            'name' => 'Имя',
            'lastname' => 'Фамилия',
            'email' => 'Email',
            'gender' => 'Выберите пол',
            'favorite_books' => 'Любимые книги'
        ]
    ],
    'rents' => [
        'create' => [
            'title' => 'Аренды книги',
            'header' => 'Создание новой аренды',
        ],
        'edit' => [
            'title' => 'Изменение условий аренды',
            'header' => 'Изменение условий аренды'
        ],
        'placeholders' => [
            'search_renter' => 'Поиск арендатора',
            'search_book' => 'Поиск книги'
        ],

        'cost_calculation' => 'Расчет стоимости',
        'cost_rent' => 'Стоимость аренды',
        'deposit_amount' => 'Сумма залога',
        'total_cost' => 'Общая стоимость',
        'min_deposit_alert_0' => 'Минимальная сумма залога составляет <strong>30%</strong> от стоимости аренды',
        'min_deposit_alert' => 'Минимальная сумма залога: <strong class="uk-text-bold">:deposit</strong> руб.',
        'cost' => '{0} :cost|[1,*] :cost руб.'
    ],
    'history' => [
        'active' => [
            'title' => '10 самых активных читателей',
            'empty_label' => 'К сожалению, не найдено активных читателей. Самое время',
            'empty_label_link' => 'пополнить их список!'
        ],
        'books' => [
            'title' => '10 последних арендованных книг',
            'empty_label' => 'К сожалению, не найдено арендованных книг'
        ]
    ]
];
