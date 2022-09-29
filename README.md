## Test Your Laravel Migrations Skills

This repository is a test for you: perform a set of tasks listed below, and fix the PHPUnit tests, which are currently intentionally failing.

To test if all the functions work correctly, there are PHPUnit tests in `tests/Feature/MigrationsTest.php` file.

In the very beginning, if you run `php artisan test`, or `vendor/bin/phpunit`, all tests fail.
Your task is to make those tests pass.


## IMPORTANT NOTICE - TESTING DATABASE IS MYSQL

**TESTS ARE CONFIGURED TO RUN ON A LOCAL MYSQL DATABASE (NOT SQLITE) WHICH SHOULD BE CALLED "mysql_testing"**

**DON'T FORGET TO CREATE THAT DATABASE**

**ALSO, THAT DB WILL BE WIPED A LOT WITHIN TESTS BY "migrate:fresh"**


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

## Task 3. Soft Deletes.

Folder `database/migrations/task3` contains a migration for projects table. You need to add a field there, for Soft Delete functionality.

Test method `test_soft_deletes()`.

---

## Task 4. Auto-Delete Related Records

Folder `database/migrations/task4` contains migrations for category and products tables. You need to modify the products migration, so that deleting the category would auto-delete its products, instead of throwing an error.

Test method `test_delete_parent_child_record()`.

---

## Task 5. Check if Table/Column Exists

Folder `database/migrations/task5` contains migrations for users table. By mistake, some developer tries to add the column that already exists, and re-create the users table that already exists.

You need to modify the migrations to ignore those operations if the column/table exists. So "php artisan migrate" should run successfully, without errors.

Test method `test_repeating_column_table()`.

---

## Task 6. Duplicate Column Value

Folder `database/migrations/task6` contains a migration for companies table. Edit that migration, so that it would be impossible to create multiple companies with the same name.

Test method `test_duplicate_name()`.

---

## Task 7. Automatic Column Value

Folder `database/migrations/task7` contains a migration for companies table. Edit that migration, so that if someone creates a company without the name, the automatic name would be "My company".

Test method `test_automatic_value()`.

---

## Task 8. Rename table

Folder `database/migrations/task8` contains a migration for company table. Later it was decided to rename the table from "company" to "companies". Write the code for that, in the second migration file.

Test method `test_renamed_table()`.

---

## Task 9. Rename column

Folder `database/migrations/task9` contains a migration for companies table. Later it was decided to rename the column from "companies.title" to "companies.name". Write the code for that, in the second migration file.

Test method `test_renamed_column()`.

---

## Task 10. NULL on Foreign Key

Folder `database/migrations/task10` contains migrations for countries and visitors table. Visitor may have undetected country, so country_id may be NULL. Change the visitors table migration to allow that.

Test method `test_null_foreign_key()`.

---

