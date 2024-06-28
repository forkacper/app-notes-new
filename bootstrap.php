<?php

use Core\App;
use Core\Container;
use Core\Database;
use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$container = new Container();

App::setContainer($container);

App::bind(Database::class, function () {
    return new Database(
        $_ENV['DB_USERNAME'],
        $_ENV['DB_PASSWORD'],
        $_ENV['DB_HOST'],
        $_ENV['DB_PORT'],
        $_ENV['DB_DATABASE'],
        $_ENV['DB_CONNECTION']
    );
});