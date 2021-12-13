<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Skills
        Content::factory()->create([
            'type' => 'skills',
            'title' => 'Programming',
            'body' => 'I learned to program since I was 15 years old. Currently I handle more than 7 programming languages and a wide range of software solutions for different problems.',
        ]);

        Content::factory()->create([
            'type' => 'skills',
            'title' => 'Database Administration',
            'body' => 'I have implemented, configured and maintained database servers with more than one hundred million records and hundreds of thousands of queries per day.',
        ]);

        Content::factory()->create([
            'type' => 'skills',
            'title' => 'Server Administration',
            'body' => 'I have implemented and configured physical and virtual servers in development and production environments. Implementing good practices and security.',
        ]);

        Content::factory()->create([
            'type' => 'skills',
            'title' => 'Service Gatekeeper',
            'body' => 'I have guaranteed services in corporate environments, ensuring the availability of services, making myself responsible for their existence.',
        ]);

        Content::factory()->create([
            'type' => 'skills',
            'title' => 'Product Development',
            'body' => 'I have designed, developed and implemented products for external companies and internal clients using agile.',
        ]);

        Content::factory()->create([
            'type' => 'skills',
            'title' => 'Process Automation',
            'body' => 'I have built automated processes using standardized artifact building tools. Using scheduled and event-based models.',
        ]);

        // Experiences
        Content::factory()->create([
            'type' => 'experiences',
            'title' => 'GPS Global',
            'body' => 'For two years I was responsible for everything related to technology in a company related to IoT. I built new products, manage teams, clients and learn to lead.',
        ]);

        Content::factory()->create([
            'type' => 'experiences',
            'title' => 'LaPagina SpA',
            'body' => 'For three years I was working in a solutions development and marketing agency. I developed my first mobile application and was in charge of several projects.',
        ]);

        Content::factory()->create([
            'type' => 'experiences',
            'title' => 'Ingenieria MCI',
            'body' => 'For six months I worked as a junior developer, I learned to write raw SQL, do sanitization and work with Scrum methodology.',
        ]);

        // Interests
        Content::factory()->create([
            'type' => 'interests',
            'title' => 'Sports',
            'body' => 'I think and believe in the balance between work and sports. That there is an interrelation between good performance and stress management.',
        ]);

        Content::factory()->create([
            'type' => 'interests',
            'title' => 'Self Study',
            'body' => 'I think that inner study is an essential tool in the life of every person. To raise the level of individual consciousness and make continuous improvement.',
        ]);

        Content::factory()->create([
            'type' => 'interests',
            'title' => 'Music',
            'body' => 'I am passionate about Hip Hop. Of the old school. I think Guru and Premier are excellent musicians. I\'m not a good rhymer but my lines of code comes with good sounds.',
        ]);
    }
}
