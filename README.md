# DSW - MY RECIPE BOOK - Recipe Log API

My Recipe Book is an application for managing and logging recipes. Users can add, view, and manage recipes, including ingredients, steps, and categories. 

## Getting Started

These instructions will guide you through the process of setting up the project locally.

### Prerequisites

Make sure you have the following dependencies installed:

- PHP (version 8.0 or later): https://www.php.net/
- Composer (latest version): https://getcomposer.org/
- MySQL (latest version): https://dev.mysql.com/downloads/
- Node.js (latest version, for frontend assets): https://nodejs.org/en/

### Installing

To set up the project locally, follow these steps:

   
1. Clone the repository to your local machine using Git:

   ```bash
   git clone https://github.com/MiguelGC97/recipes
   ```

2. Navigate to the project directory:

   ```bash
      cd recipes
   ```

3. Install the PHP dependencies using Composer:

   ```bash
      composer install
   ```
4. Install Node.js dependencies for frontend assets:

   ```bash
      npm install
   ```

5. Set up your ``.env`` file by copying the example found in ``.env.example``.

6. Run database migrations:

   ```bash
      php artisan migrate
   ```

### Running the Application

To run the API locally, follow these steps:

1. Start the development server:

   ```bash
   php artisan serve
   ```

2. You can access the application at http://localhost:8000.


The API should be up and running.

## Built With

- **PHP** - Backend programming language
- **Laravel** - PHP framework for backend development
- **MySQL** - Database management
- **Bladewind UI** - UI components library for frontend
- **Tailwind CSS** - Utility-first CSS framework

## Author

- **Miguel Ángel Gutiérrez Carreño**

## License

This project is licensed under the MIT License - see the LICENSE.md file for details

