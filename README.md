# Laravel Social Media App

Welcome to the Laravel Social Media App repository! This project aims to develop a simple social media platform using the Laravel framework.

## Project Status

⚠️ **Work in Progress**:

The project is actively being developed and enhanced with new features. Here's what has been implemented so far:

-   **User Registration and Login:** Basic functionalities for user registration and login have been implemented, allowing users to create accounts and securely log in.

-   **User Profiles:** Users can now personalize their profiles by uploading avatars and updating their profile information.

-   **Following and Followers:** Users can follow and unfollow other users, and view a list of users they are following.

-   **Content Posting:** The ability to create and manage posts has been added. Pagination is implemented for better user experience.

-   **Search Functionality:** Implemented search functionality using Scout Laravel to allow users to search for posts and users.

-   **Document and Page Title:** Added dynamic document/page title for improved SEO and user experience.

-   **Post Component:** Created a reusable post component for displaying individual posts.

-   **Database Seeding:** Seed data has been added for users to populate the initial database for testing purposes.

**Real-Time Chat Functionality:** We can implement a chat function using Pusher or Ably. Pusher setup is straightforward. To integrate Pusher, run the following command: `composer require pusher/pusher-php-server`. Don't forget to include Pusher details in the `.env` file.

- **Single Page Application (SPA):** Included a definition and explanation of how the single-page application works. In an SPA, the entire application is contained within a single HTML page. Navigation between pages is done dynamically without the need for full page reloads, resulting in a smoother user experience. 

- **Cache Middleware:** Added cache middleware with a maximum cache time of 19 seconds, which you can verify in Chrome Dev Tools.

-   **Email Testing with Mailtrap or SendGrid:** For testing real emails, you can use Mailtrap, which is free. Alternatively, SendGrid is also an option. Update the `.env` file with the necessary details for testing emails.

-   **API Testing with Insomnia:** To test APIs, you can use Insomnia. Install Laravel Sanctum for API authentication. Laravel Sanctum provides a simple authentication system for SPAs (single page applications), mobile applications, and simple, token-based APIs. To install Laravel Sanctum, run `composer require laravel/sanctum` and follow the documentation for setup.

Future updates will include additional features such as going live with forge.laravel and FYI: we can deploy it on digitalOcean, linode, vultr, amazon, hetzner and more..

## Getting Started

To get started with the project:

1. Clone this repository to your local machine.
2. Set up your local development environment for Laravel.
3. Run migrations to set up the database schema.
4. Start the Laravel development server.
5. Install Node.js and run `npm install` to install dependencies.
6. Run `npm run dev` or `npm run build` while working on the project to compile assets.

## Project Structure

-   **app/**: Contains the application logic.
-   **database/**: Includes database migrations and seeders.
-   **public/**: Houses the public assets of the application.
-   **resources/**: Contains views, language files, and assets.
-   **routes/**: Defines application routes.
-   **tests/**: Contains PHPUnit tests for the application.

## Languages and Tools Used

-   **PHP**: Primary language used for backend development.
-   **JavaScript**: Used for frontend interactivity.
-   **HTML/CSS**: Structuring web pages and styling.
-   **MySQL**: Database management system.
-   **Node.js/NPM**: For compiling assets and managing frontend dependencies.
-   **Text Editor**: VS Code, with the following extensions:
    -   Laravel Blade Snippets
    -   PHP Namespace Resolver

## Contributing

Contributions are welcome! Feel free to fork the repository and submit pull requests with improvements or additional features.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.


## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.
