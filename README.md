# FlatFlow - Backend

![Under Development](https://img.shields.io/badge/status-under%20development-blue)

## Overview

Welcome to the backend of the **Flat Flow** application! Our mission is to enhance the quality of cohabitation in shared living spaces for individuals without familial ties. This project aims to improve established cohabitation by organizing and planning space usage, routines, and responsibilities.

## Project Description

**Flat Flow** is a web platform developed in Laravel designed to improve cohabitation in shared living spaces. It enables users to communicate effectively, organize and assign household tasks, and track shared expenses. The backend provides a RESTful API for managing the application's operations.

## Project Objectives

- Create an efficient communication tool for users sharing living spaces.
- Facilitate the organization and assignment of household tasks.
- Streamline the management of shared expenses.
- Enhance cohabitation by promoting transparency and collaboration among residents.
- Implement additional features to further improve the living experience.

## Technologies Used

- Laravel: A PHP web application framework for building the backend.
- MariaDB: The database management system used for data storage.
- Sanctum: For API authentication.
- RESTful API: The backend provides a RESTful API for managing application operations.

## Getting Started

To clone and set up the FlatFlow backend, follow these steps:

1. **Clone the Repository:**

   ```bash
   git clone <repository-url>
   cd backend
   ```
2. **Install Dependencies:**

Run the following command to install all the required dependencies for the project:

```bash

composer install
```
3.**Database Setup:**

Create a database in MariaDB and configure the .env file with your database credentials:

env
```bash
DB_CONNECTION=mysql
DB_HOST=your_database_host
DB_PORT=your_database_port
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```
4.**Then run the migrations to set up the database schema:**

```bash

php artisan migrate
```
5.**Start the Development Server:**

Use the following command to start the Laravel development server:

```bash

php artisan serve
```
The backend will be accessible at http://localhost:8000.

## API Endpoints
/api/messages: Endpoint for sending and receiving messages and notifications.
/api/tasks: Endpoint for creating and managing household tasks.
/api/expenses: Endpoint for tracking shared expenses.
/api/users: Endpoint for user management.
/api/groups: Endpoint for creating and managing user groups.

## Authentication
FlatFlow uses Laravel Sanctum for API authentication. Users can register and log in to the application to access the features.
