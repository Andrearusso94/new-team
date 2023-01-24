<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = ['Problem solving', 'Team work', 'Team building', 'Creativity'];

        foreach ($skills as $skill) {
            $newSkill = new Skill();
            $newSkill->name = $skill;
            $newSkill->slug = Str::slug($newSkill->name);
            $newSkill->save();
        }
    }
}
