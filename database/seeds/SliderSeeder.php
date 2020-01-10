<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for($i=1;$i<2;$i++){
          $title=$faker->sentence(3);
          $author=$faker->name;
          DB::table('sliders')->insert([
            'title'=>$title,
            'author'=>$author,
            'email'=>$faker->email,
            'image'=>$faker->imageUrl(1900, 1080, 'cats', true, 'Faker'),
            'titleslug'=>str_slug($title),
            'authorslug'=>str_slug($author),
            'order'=>$i,
            'status'=>1,
            'created_at'=>$faker->dateTime('now'),
            'updated_at'=>now()
          ]);
        }
    }
}
