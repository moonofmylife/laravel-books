<?php

return [
    'book' => [
        'name' => 'Название',
        'author' => 'Автор',
        'cover' => 'Обложка',
        'cost' => 'Стоимость аренды (день)',
        'pages' => 'Количество страниц',
        'age_limit' => 'Возрастное ограничение',
        'year' => 'Год написания',
        'description' => 'Описание',
        'updated_at' => 'Обновлен'
    ],
    'rent' => [
        'renter' => 'Арендатор',
        'rented_at' => 'Арендовано',
        'expired_at' => 'Истекает',
        'period' => 'Срок аренды (дней)',
        'deposit' => 'Залог (руб.)',
        'books_count' => 'Количество книг',
        'active' => 'Активен'
    ],
    'renter' => [
        'name' => 'Имя',
        'lastname' => 'Фамилия',
        'fullname' => 'Полное имя',
        'email' => 'Email',
        'gender' => [
            'field' => 'Пол',
            'male' => 'Мужчина',
            'female' => 'Женщина'
        ],
        'rents_total' => 'Арендовано (всего)',
        'rents_active' => 'Арендовано (активных)',
        'updated_at' => 'Обновлен',
        'favorite_books' => [
            'field' => 'Любимые книги',
            'empty' => 'отсутствуют'
        ]
    ]
];
