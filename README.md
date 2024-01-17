# Chess2

Chess2 is a Symfony-based web application that allows users to play chess online.

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/malekjakub69/chess2.git
    ```

2. Install dependencies:

    ```bash
    composer install
    ```

3. Configure the database connection in the `.env` file:

    ```dotenv
    DATABASE_URL=sqlite:///%kernel.project_dir%/var/data.db
    ```

4. Create the database and run migrations:

    ```bash
    php bin/console doctrine:database:create
    php bin/console doctrine:migrations:migrate
    ```

## Usage

1. Start the Symfony development server:

    ```bash
    symfony server:start
    ```

2. Open your web browser and visit `http://localhost:8000` to access the application.

## Features

- View other user score.
- Sort by Win, Lose or Best Game
- Add new users
- View user detail 
- Edit users data
