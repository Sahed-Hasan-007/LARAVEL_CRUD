<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create only 10 users
        $users = User::factory(50)->create();

        // Create 5 projects
        $projects = Project::factory(20)->create();

    
        // Attach each project to 1-3 random users
        $projects->each(function ($project) use ($users) {
            $randomUsers = $users->random(rand(1, 3))->pluck('id');
            $project->users()->attach($randomUsers);
        });
    }
}
