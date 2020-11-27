# Laravel 8 + GraphQL Test project
This projects implements a very basic payment emulation mechanism and role management. 

## LSS
- This project is covering TDD on Laravel 8 with GraphQL package.
- No views involved, use graphql.
- Please use PHP 7.4+.
- No Auth used.

## Quick start
1. Run ``git clone https://github.com/maksymkulia/laravel-graphql.git``.
2. Run your web server and configure it to run from ``/public``.
3. Start you MySQL server.
4. Setup ``.env`` file with DB parameters.
5. Run ``php artisan migrate:fresh --seed`` to create initial data in DB.
6. Go to ``your-domain-name/api/v1`` to execute GraphQL queries or GraphiQL playground: ``your-domain-name/graphiql``.

## Structure
- ``app/GraphQL`` - core logic of GraphQL.
- ``app/Models`` - containing all models.
- ``config/graphql`` - contains a basic configuration for GraphQL.
- ``database`` - includes factories, migrations and seeders.
- ``tests`` - includes Unit and Feature tests.

## Database
- MySQL 5.7+ is recommended and used.
- Eloquent ORM used all over the project.

## Tests
Run ``php artisan test``.
- Unit tests.
- Feature tests.

## Security
SQLmap tested. Other in process.

## Other
Please follow the state of the project by this [link](https://github.com/maksymkulia/laravel-graphql/projects/1).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
