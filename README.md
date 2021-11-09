## Test Your Laravel Migrations Skills

This repository is a test for you: perform a set of tasks listed below, and fix the PHPUnit tests, which are currently intentionally failing.

To test if all the functions work correctly, there are PHPUnit tests in `tests/Feature/MigrationsTest.php` file.

In the very beginning, if you run `php artisan test`, or `vendor/bin/phpunit`, all tests fail.
Your task is to make those tests pass.


## How to Submit Your Solution

If you want to submit your solution, you should make a Pull Request to the `main` branch.
It will automatically run the tests via Github Actions and will show you/me if the test pass.

If you don't know how to make a Pull Request, [here's my video with instructions](https://www.youtube.com/watch?v=vEcT6JIFji0).

This task is mostly self-served, so I'm not planning review or merge the Pull Requests. This test is for yourselves to assess your skills, the automated tests will be your answer if you passed the test :)


## Questions / Problems?

If you're struggling with some of the tasks, or you have suggestions how to improve the task, create a Github Issue.

Good luck!

---

## Task 1. Migrations with Foreign Key.

Folder `database/migrations/task1` contains migrations for tasks with foreign key to users, and for comments with foreign key to users. 
Both will fail, your task is to understand the reason and to fix the migrations to run successfully.

Test method `test_successful_foreign_key_tasks_comments()`.

---

## Task 2. Add Column after Another Column.

Folder `database/migrations/task2` contains migrations for users table: one for creating the table, and another one for adding a NEW field.
That new field "surname" should be added in a particular order - after the "name" field.

Test method `test_column_added_to_the_table()`.

---

