<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

       $faker = Faker::create();

class Videos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();

         $images = [
            '1565657133d4zrfDbO7c.png',
            '1565657178pZwvBC0iYF.jpg',
            '1565655671hqfAdHO9p6.jpeg'

         ];
         $youtupe = [
            'https://www.youtube.com/watch?v=-u9_T_CLZHY',
            'https://www.youtube.com/watch?v=eIrMbAQSU34',
            'https://www.youtube.com/watch?v=PkZNo7MFNFg',
            'https://www.youtube.com/watch?v=UB1O30fR-EE'

         ];
         $ids = [1,2,3,4,5,6,7,8,9];

        for ($i=0; $i < 10; $i++) { 

        $array = [
        	'name' => $faker->word,
        	'meta_keywords' => $faker->name,
        	'meta_desc' => $faker->name,
        	'category_id' => rand(1,10),
        	'user_id' => 1,
        	'published' => rand(1,0),
        	'youtupe' => $youtupe[rand(0,3)],
        	'image' =>$images[rand(0,2)],
        	'desc' =>$faker->paragraph,
        	
        ];

        	 $video =\App\Models\Video::create($array);
             $video->skills()->sync(array_rand($ids , 2));
             $video->tags()->sync(array_rand($ids , 3));
        }
    }
}
