# School Management System

A comprehensive school management system to handle various administrative tasks including student enrollment, attendance tracking, grade management, and more.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [License](#license)
- [Contact](#contact)

## Introduction

The School Management System is designed to help schools manage their administrative tasks efficiently. It covers functionalities for managing students, teachers, Devision, Grades .

## Features

- Student Enrollment and Management
- Teacher Management
- Devision Management
- Grade Management

## Technologies Used

- Frontend: HTML, CSS, JavaScript
- Backend: PHP
- Database: MySQL

## Installation

### Prerequisites

- Web server (Apache)
- PHP 8.2.12
- MySQL

### Steps

1. Clone the repository:
    ```sh
    git clone https://github.com/Mostefaouim/SchoolMangement.git
    ```
2. Navigate to the project directory:
    ```sh
    cd SchoolMangement
    ```
3. Import the SQL file to set up the database:
    - Open your MySQL database management tool (phpMyAdmin).
    - Create a new database named `school`.
    - Import the SQL file located in the `sql` directory:
        ```sh
        source SchoolMangement/Sql/schoolmangement.sql
        ```
4. Configure the database connection:
    - Open `config.php` in the project root.
    - Update the database settings:
        ```php
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_DATABASE', 'school');
        ```

## Usage

1. Start your web server and ensure it is properly configured to serve PHP applications.
2. Access the application via your web browser:
    ```sh
    http://localhost/SchoolMangement
    ```

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

Mostefaoui - [mohammedmostefaoui2@gmail.com](mailto:mohammedmostefaoui2@gmail.com)

Project Link: [https://github.com/Mostefaouim/SchoolMangement](https://github.com/Mostefaouim/SchoolMangement)
