<?php

namespace Database\Seeders;

use App\Models\Collaborator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class CollaboratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $collaborator = new Collaborator();
            $collaborator->image = 'placeholders/' . $faker->image('storage/app/public/placeholders', 600, 300, 'person', false, false);
            $collaborator->name = $faker->name();
            $collaborator->slug = Str::slug($collaborator->name, '-');
            $collaborator->bio = $faker->text();
            $collaborator->save();
        }
    }
}
