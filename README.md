<p align="center"><img src="https://i.ibb.co/fr2DPvP/laravel-books-logo-1.png" width="400"></p>

## Possibilities of Project

- Adding tenants.
- Adding books.
- Book rental in realtime.
- View active readers (tenants).
- View the latest rented books.

## Installation & Requirements

###### The Laravel 7 framework has a few system requirements ######
> PHP >= 7.2.5  
> BCMath PHP Extension  
> Ctype PHP Extension  
> Fileinfo PHP extension  
> JSON PHP Extension  
> Mbstring PHP Extension  
> OpenSSL PHP Extension  
> PDO PHP Extension  
> Tokenizer PHP Extension  
> XML PHP Extension  

**Installing**
```
composer create-project --prefer-dist moonofmylife/laravel-books books
```

**Starting**
- You must change the database settings in ```.env``` file (see ```.env.example```)
- Start database migrations: ```php artisan migrate```
- Start seeding the database with test data: ```php artisan db:seed```
- This command will start a development server at ```http://localhost:8000```:
```$xslt
php artisan serve
```


**Starting with Docker**

- You must change the database settings in ```.env``` file (see ```.env.docker.example```)
- Start the building docker containers ```docker-compose up -d --build```
- Start database migrations: ```docker-compose exec backend php artisan migrate```
- Start seeding the database with test data: ```docker-compose exec backend php artisan db:seed```
- The development server was started at ```http://localhost:8000```

## Note
**Test user:**
```
admin@example.com
admin
```

## Todo
- **Elasticsearch** for implementing quick search
- **Redis**/**RabbitMQ** for Laravel Queue
- **Memcached**
