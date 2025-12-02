# todolist

## Project Title & Badges 🚀

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

A simple ToDo List application built with Laravel, designed to help users manage their tasks efficiently. 📝

## Description 📝

The ToDo List application is a web-based tool designed to help users organize and manage their tasks effectively. Built using PHP and the Laravel framework, it provides essential features such as task creation, categorization, status tracking, and user authentication. The application uses a SQLite database for data storage and incorporates modern web development practices with Tailwind CSS for styling and Vite for asset bundling.

## Table of Contents 🗂️

- [Features ✨](#features-%E2%9C%A8)
- [Tech Stack 💻](#tech-stack-%F0%9F%92%BB)
- [Installation 🛠️](#installation-%F0%9F%95%A7)
- [Usage 👨‍💻](#usage-%F0%9F%91%A4)
- [How to Use 💡](#how-to-use-%F0%9F%92%A1)
- [Project Structure 📂](#project-structure-%F0%9F%97%82)
- [Contributing 🤝](#contributing-%F0%9F%A4%9D)
- [License 📜](#license-%F0%9F%93%9C)
- [Important Links 🔗](#important-links-%F0%9F%94%97)
- [Footer <footer>](#footer-%3Cfooter%3E)

## Features ✨

- **User Authentication:** Secure registration and login functionality. 🔐
- **Task Management:** Create, edit, and delete tasks. ✅
- **Categorization:** Organize tasks into predefined categories (cat1, cat2, cat3). 🗂️
- **Status Tracking:** Monitor task progress with status options (To Do, In Progress, Done). 📊
- **Filtering and Searching:** Filter tasks by category and status, and search by title. 🔍
- **Email Notifications**: Sends email when task is created. 📧

## Tech Stack 💻

- **Backend:** PHP 8.2, Laravel 12
- **Frontend:** JavaScript, Bootstrap, Tailwind CSS, Next.js
- **Database:** SQLite
- **Build Tools:** Vite

## Installation 🛠️

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/phobo22/todolist.git
    cd todolist
    ```
2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```
3.  **Copy the environment file:**
    ```bash
    cp .env.example .env
    ```
4.  **Generate application key:**
    ```bash
    php artisan key:generate
    ```
5.  **Set up the database:**
    ```bash
    php artisan migrate
    ```
6.  **Install JavaScript dependencies:**
    ```bash
    npm install
    ```
7.  **Build assets:**
    ```bash
    npm run build
    ```

## Usage 👨‍💻

1.  **Run the development server:**
    ```bash
    php artisan serve
    ```
2.  **Access the application** in your browser at `http://localhost:8000`.
3.  **Register or login** to manage your tasks.
4.  **Use the navigation** to add, view, and manage your tasks.

## How to Use 💡

1.  **Register/Login:**
    - Navigate to the `/register` or `/login` routes.
    - Use the forms to create a new account or log in with existing credentials.

    ```php
    Route::get('/register', 'register')
        ->middleware('guest')
        ->name('register.page');
    ```

2.  **Task Management:**
    - **Add Task:** Click on "Add Task" in the navigation bar to create a new task.

    ```php
    Route::get('/tasks/create', 'create')
        ->middleware('auth')
        ->name('tasks.create');
    ```

    - **View Tasks:** Click on "Your Task" to see a list of tasks. Here, you can:
        - Filter tasks by category and status.
        - Search tasks by title.
        - Update or delete tasks if you have the required permissions.

    ```php
    Route::get('/tasks', 'index')
        ->middleware('auth')
        ->name('tasks.index');
    ```

    - **Update Task:** Click the “Update” button on a task to edit its details.

    ```php
    Route::put('/tasks/{task}', 'update')
        ->middleware('auth')
        ->can('edit', 'task')
        ->name('tasks.update');
    ```

    - **Delete Task:** Click the “Delete” button to remove a task.

    ```php
    Route::delete('/tasks/{task}', 'destroy')
        ->middleware('auth')
        ->can('edit', 'task')
        ->name('tasks.destroy');
    ```

## Project Structure 📂

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   ├── Jobs/
│   ├── Mail/
│   ├── Models/
│   ├── Providers/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   ├── seeders/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   ├── views/
│   │   ├── auth/
│   │   ├── components/
│   │   ├── home/
│   │   ├── layouts/
│   │   ├── mail/
│   │   ├── task/
├── routes/
├── storage/
├── tests/
├── .env.example
├── package.json
├── vite.config.js
├── composer.json
├── composer.lock
```

## Contributing 🤝

Contributions are welcome! Please follow these steps:

1.  Fork the repository.
2.  Create a new branch for your feature or bug fix.
3.  Commit your changes with descriptive messages.
4.  Push your branch to your forked repository.
5.  Create a pull request to the main repository.

## License 📜

This project is licensed under the MIT License - see the [LICENSE](https://opensource.org/licenses/MIT) file for details.

## Important Links 🔗

- Repository: [https://github.com/phobo22/todolist](https://github.com/phobo22/todolist)

## Footer <footer>

ToDoList - [https://github.com/phobo22/todolist](https://github.com/phobo22/todolist) by [phobo22](https://github.com/phobo22).

⭐️ Feel free to fork, star, and contribute! 📝


---
**<p align="center">Generated by [ReadmeCodeGen](https://www.readmecodegen.com/)</p>**