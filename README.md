# Notes

## Project Description

**Notes** is a training project that enables users to log in, register, and manage their notes. Users can add, edit, and delete notes.

## Project Purpose

The project was created for training purposes to learn how to implement basic web application functionalities, such as user authentication and CRUD (Create, Read, Update, Delete) operations for notes.

## Technologies

The project is built using the following technologies and tools:

- PHP
- Docker
- Composer packages:
    - phinx
    - phpdotenv
- Webpack
- Tailwind CSS

## Installation

To run the project locally, follow these steps:

1. Copy the `.env.example` file to `.env` and fill in the necessary details.
2. Start the Docker containers:
   ```bash
   docker compose up -d
3. Install PHP dependencies:
    ```bash
   docker compose exec php composer install
4. Run database migrations:
    ```bash
   docker compose exec php /vendor/bin/phinx migrate
5. Install Node.js dependencies and build the frontend:
    ```bash
   docker compose run node npm install && npm run build
6. The application will be available at http://localhost:8080.

## Usage

After installing and starting the application, you can:

- Register a new user
- Log in with the created account
- Add new notes
- Edit existing notes
- Delete notes

## Additional Information

- The application follows an object-oriented design.
- It includes routing, middleware, controllers, and form validation.
- The application uses a container and dependency injection.
- The central entry point of the application is index.php.
- The application follows the PRG (Post/Redirect/Get) pattern.
- It uses PSR-4 autoloading via Composer.