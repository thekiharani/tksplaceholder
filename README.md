# tksplaceholder 
This is a dummy api for my personal ui development and testing. It uses sqlite database. Most env configurations are set in .env.example hence after cloning and copying .env.example to .env using command: `cp .env.example .env`, the app should work as expected.

# Quick Start: Run:
- `git clone https://github.com/thekiharani/tksplaceholder.git` if using http
                                OR
- `git clone git@github.com:thekiharani/tksplaceholder.git` if using ssh

- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`
- `php artisan serve`

Have fun

# Available routes
- Posts
    - `GET /api/posts`
    - `GET /api/posts/{post}`
    - `POST /api/posts`
    - `PUT/PATCH /api/posts/{post}`
    - `DELETE /api/posts/{post}`


- Todos
    - `GET /api/todos`
    - `GET /api/todos/{todo}`
    - `POST /api/todos`
    - `PUT/PATCH /api/todos/{todo}`
    - `DELETE /api/todos/{todo}`

- People
    - `GET /api/people`
    - `GET /api/people/{people}`
    - `POST /api/people`
    - `PUT/PATCH /api/people/{people}`
    - `DELETE /api/people/{people}`