<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class MigrationsTest extends TestCase
{
    // !!! IMPORTANT: TESTS ARE CONFIGURED TO RUN ON A LOCAL MYSQL DATABASE
    //     WHICH SHOULD BE CALLED "mysql_testing"
    // !!! DON'T FORGET TO CREATE THAT DATABASE

    // !!! NOTICE: THAT DB WILL BE WIPED A LOT WITHIN TESTS BY "migrate:fresh"

    public function test_successful_foreign_key_tasks()
    {
        // We just test if the migration succeeds or throws an exception
        $this->expectNotToPerformAssertions();

        Artisan::call('migrate:fresh', ['--path' => '/database/migrations/task1']);
    }
}
