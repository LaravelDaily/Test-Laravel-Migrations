<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\Project;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class MigrationsTest extends TestCase
{
    // !!! IMPORTANT: TESTS ARE CONFIGURED TO RUN ON A LOCAL MYSQL DATABASE
    //     WHICH SHOULD BE CALLED "mysql_testing"
    // !!! DON'T FORGET TO CREATE THAT DATABASE

    // !!! NOTICE: THAT DB WILL BE WIPED A LOT WITHIN TESTS BY "migrate:fresh"

    public function test_successful_foreign_key_tasks_comments()
    {
        // We just test if the migration succeeds or throws an exception
        $this->expectNotToPerformAssertions();

        Artisan::call('migrate:fresh', ['--path' => '/database/migrations/task1']);
    }

    public function test_column_added_to_the_table()
    {
        Artisan::call('migrate:fresh', ['--path' => '/database/migrations/task2']);

        User::factory()->create(['surname' => 'Testing']);
        $this->assertDatabaseHas(User::class, ['surname' => 'Testing']);

        $user = User::first();
        $fieldNumber = 0;
        foreach ($user->getAttributes() as $key => $value) {
            $fieldNumber++;
            if ($key == "surname") break;
        }

        $this->assertEquals(3, $fieldNumber);
    }

    public function test_soft_deletes()
    {
        // We just test if the test succeeds or throws an exception
        $this->expectNotToPerformAssertions();

        Artisan::call('migrate:fresh', ['--path' => '/database/migrations/task3']);

        $project = Project::factory()->create();
        $project->delete();
    }

    public function test_delete_parent_child_record()
    {
        // We just test if the test succeeds or throws an exception
        $this->expectNotToPerformAssertions();

        Artisan::call('migrate:fresh', ['--path' => '/database/migrations/task4']);

        $category = Category::factory()->create();
        Product::factory()->create();
        $category->delete();
    }

    public function test_repeating_column_table()
    {
        // We just test if the migration succeeds or throws an exception
        $this->expectNotToPerformAssertions();

        Artisan::call('migrate:fresh', ['--path' => '/database/migrations/task5']);
    }

    public function test_duplicate_name()
    {
        // We expect that the second Company::create() would throw an exception like
        // "Integrity constraint violation: 1062 Duplicate entry 'Company One'"
        $this->expectException(QueryException::class);

        Artisan::call('migrate:fresh', ['--path' => '/database/migrations/task6']);

        Company::create(['name' => 'Company One']);
        Company::create(['name' => 'Company One']);
    }

    public function test_automatic_value()
    {
        Artisan::call('migrate:fresh', ['--path' => '/database/migrations/task7']);

        Company::create([]);
        $company = Company::first();
        $this->assertEquals('My company', $company->name);
    }

    public function test_renamed_table()
    {
        Artisan::call('migrate:fresh', ['--path' => '/database/migrations/task8']);

        DB::table('companies')->insert(['name' => 'First']);
        $this->assertDatabaseHas(Company::class, ['name' => 'First']);
    }

    public function test_renamed_column()
    {
        Artisan::call('migrate:fresh', ['--path' => '/database/migrations/task9']);

        Company::create(['name' => 'First']);
        $this->assertDatabaseHas(Company::class, ['name' => 'First']);
    }

    public function test_null_foreign_key()
    {
        Artisan::call('migrate:fresh', ['--path' => '/database/migrations/task10']);

        Visitor::create(['ip_address' => '127.0.0.1']);
        $this->assertDatabaseCount(Visitor::class, 1);
    }
}
