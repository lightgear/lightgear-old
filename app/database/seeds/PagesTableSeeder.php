<?php

class PagesTableSeeder extends Seeder {

    public function run()
    {
        $pages = array(
            array(
                'title' => 'Page 1',
                'body' => 'Page 1 body',
                'slug' => 'page-1',
                'published' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ),
            array(
                'title' => 'Page 2',
                'body' => 'Page 2 body',
                'slug' => 'page-2',
                'published' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            )
        );

        // Uncomment the below to run the seeder
        DB::table('pages')->insert($pages);
    }

}
