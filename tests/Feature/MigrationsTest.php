<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
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
}
