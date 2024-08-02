<?php

namespace Database\Seeders;

use App\Models\JobListing;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            "name" => "Subham Bhandari",
            "email" => "subham@gmail.com",
            "password" => bcrypt("12345678"),
        ]);

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'doe@gmail.com',
        ]);

        //seeding job_listing table using factory
        JobListing::factory(10)->create(
            [
                'user_id' => $user->id,
            ]
        );

        //seeding post table using factory
        Post::factory(50)->create([
            'user_id' => $user->id,
        ]);

        //seeding profile table using factory
        Profile::factory(10)->create([
            'user_id' => $user->id,
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // JobListing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet
        //         consectetur adipisicing elit. Ipsam minima et
        //         illo reprehenderit quas possimus voluptas
        //         repudiandae cum expedita, eveniet aliquid, quam
        //         illum quaerat consequatur! Expedita ab
        //         consectetur tenetur delensiti?',
        // ]);

        // JobListing::create([
        //     'title' => 'Laravel Junior Developer',
        //     'tags' => 'laravel',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet
        //         consectetur adipisicing elit. Ipsam minima et
        //         illo reprehenderit quas possimus voluptas
        //         repudiandae cum expedita, eveniet aliquid, quam
        //         illum quaerat consequatur! Expedita ab
        //         consectetur tenetur delensiti?',
        // ]);

    }
}
