### Quick Start

1. create `.env`

1. `composer install`

1. `npm install && npm run watch`

1. `php artisan serve`

1. `php artisan migrate`

1. [optional] `php artisan db:seed`

### Features Implemented

1. `./vendor/bin/phpunit` to test all tests

1. Web API:

    | Endpoint        | Verb | Description |
    | ------------- |:-------------:|:-------------:|
    | http://127.0.0.1:8000/persons | GET | List of all Persons |
    | http://127.0.0.1:8000/persons/create| POST | Add a new person form |
    
1. API:

    | Endpoint        | Verb | Description |
    | ------------- |:-------------:|:-------------:|
    | http://127.0.0.1:8000/persons | GET | List of all Persons |
    | http://127.0.0.1:8000/persons | POST | Save a new person |
    | http://127.0.0.1:8000/persons/{person} | PATCH | Update an existing person |
    | http://127.0.0.1:8000/persons/{person} | DELETE | Add a new person form |
    
