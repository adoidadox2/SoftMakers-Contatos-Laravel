<h1 align="center">
  SoftMakers-Contatos-Laravel
</h1>

<p align="center">

  <a href="https://www.linkedin.com/in/augusto-vin%C3%ADcius-vasconcelos-tabosa-71aa991a5/" target="_blank" rel="noopener noreferrer">
    <img alt="Made by" src="https://img.shields.io/badge/made%20by-adoidadox2-%23FF9000">
  </a>
</p>

## Technologies :rocket::

Technologies that I used to develop this MVC 

- [PHP 7](https://www.php.net/)
- [Laravel 8](https://laravel.com/docs/8.x/releases)
- [PostgreSQL](https://www.postgresql.org/)

# Getting started

### Environment variables wich need to be filled manually -
- **DB_CONNECTION**: Defines the type of database (Ex.: pgsql)
- **DB_HOST**: Defines the host of database (Ex.: localhost)
- **DB_PORT**: Defines the port of database (Ex.: 5432)
- **DB_USERNAME**: Defines the username of database (Ex.: admin)
- **DB_PASSWORD**: Defines the password of database (Ex.: admin123)
- **DB_DATABASE**: Defines the name of database (Ex.: softmakers-contatos)

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)


Clone the repository

    git clone https://github.com/adoidadox2/SoftMakers-Contatos-Laravel.git
    
Switch to the repo folder

    cd SoftMakers-Contatos-Laravel
    
Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate
     
Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Create a symbolic link to storage folder  (required to use contacts profile pictures at views)

	php artisan storage:link

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Routes

	+--------+-----------+-------------------------+------------------+------------------------------------------------+------------+
	|        | GET|HEAD  | contacts                | contacts.index   | App\Http\Controllers\ContactController@index   | web        |
	|        | POST      | contacts                | contacts.store   | App\Http\Controllers\ContactController@store   | web        |
	|        | GET|HEAD  | contacts/create         | contacts.create  | App\Http\Controllers\ContactController@create  | web        |
	|        | GET|HEAD  | contacts/{contact}      | contacts.show    | App\Http\Controllers\ContactController@show    | web        |
	|        | PUT|PATCH | contacts/{contact}      | contacts.update  | App\Http\Controllers\ContactController@update  | web        |
	|        | DELETE    | contacts/{contact}      | contacts.destroy | App\Http\Controllers\ContactController@destroy | web        |
	|        | GET|HEAD  | contacts/{contact}/edit | contacts.edit    | App\Http\Controllers\ContactController@edit    | web        |
	+--------+-----------+-------------------------+------------------+------------------------------------------------+------------+

## Challenges for me & Strategies to a scalable application   :chart_with_upwards_trend::

 - My first contact with Laravel/PHP, I had some problems configuring the tools, but in the end it was an incredible experience!
 - I believe that for a more scalable application, a functionality for creating and authenticating users of the system must be implemented, and add sentry to monitor the application in production
 - List users by address, using the **address 1 - N user** relation


## License :memo::

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## Author :man_technologist::

Made with :heart: by **Augusto Vinícius** 👋🏻 [Get in touch!](https://github.com/adoidadox2)
