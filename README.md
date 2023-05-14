<p align="center"><a href="https://laravel.com" target="_blank"><img src="/public/svg/icon-the-bookshelf.svg" width="400" alt="Laravel Logo"></a></p>



# TheBookshelf: Accessible Virtual Library

TheBookshelf is a web platform that connects readers with real libraries, making it easier to access books and promoting reading in our society. It allows users to search and check the availability of books in real libraries, see if a book is reserved by someone else, create an account, and become a member without having to visit the library in person.

## Table of Contents

- [Main Features](#main-features)
- [Technologies Used](#technologies-used)
- [Video youtube](#Video-youtube)
- [Redirect to thebookshelf](#Redirect-to-thebookshelf-page)
- [Case Diagram](#Case-Diagram)
- [Diagram Phase](#Diagram-Phase)
- [Installation and Configuration](#installation-and-configuration)
- [Unit Tests](#unit-tests)


## Main Features

- Check the availability of books in real libraries.
- Create an account and become a member without visiting the library.
- Interact with a community of readers.

## Technologies Used

- Laravel
- MySQL
- HEROKU
- CSS
- Tailwind
- Alpine.js
- Livewire
- Google API (for book search and retrieval)

## Case Diagram
 
- [THE BOOKSHELF - PRE-DESIGN ](https://www.figma.com/file/lkbYx5ObMaOSsgWJWpdyfK/diagrama-casos-de-uso?type=design&t=7lJOjzn9gMYqqKHa-1).

## Diagram Phase

- [THE BOOKSHELF - DIAGRAM PHASE ](https://www.figma.com/file/c8pFXBp9Y5ZaBIwy4qXmuy/preview-thebookshelf?type=design&t=7lJOjzn9gMYqqKHa-1).

- [THE BOOKSHELF - CLASS DIAGRAM ](https://drive.google.com/file/d/1QGv0ilAQgQ2f1Bk5lT-B2kkL-Q2bbrWw/view?usp=sharing).

- [THE BOOKSHELF - RELATIONAL ENTITY DIAGRAM ](https://drive.google.com/file/d/1CN_DanqRaOD8LW499V-4jWTay93bo_lt/view?usp=sharing).

- THE BOOKSHELF - DB STRUCTURE ,file ```database.sql``` in the folder database.


## Installation and Configuration

1. Clone the repository on your local machine:

> git clone https://github.com/isma2697/the-bookshelf2.git


2. Enter the project directory and install the dependencies with Composer:

```cd thebookshelf```
```composer install```


3. Copy the `.env.example` file to `.env` and configure the necessary environment variables:

```cp .env.example .env```


4. Generate the application key:

```php artisan key:generate```


5. Configure your database and add the credentials in the `.env` file.

6. Run migrations and seeders to populate the database:

```php artisan migrate --seed```


7. Start the local development server:

```php artisan serve```




## Unit Tests

To run the unit tests, run the following command:

```php artisan test```

The unit tests I have are:

- /ApiBookControllerTest.php
- /BookControllerTest.php
- /BooksSeederTest.php


## Video Youtube

- [THE BOOKSHELF - PROYECTO FINAL DAW - CIFP ZONZAMAS](https://youtu.be/FeulmEhaAJo).

## Redirect to THEBOOKSHELF page

- [THE BOOKSHELF](http://pacific-mesa-14831.herokuapp.com/) .

## lincense 
 











