<?php

class TagsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('tags')->truncate();

		$tags = array(
            array(
                'name' => 'Tag 1',
                'slug' => 'tag-1',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ),
            array(
                'name' => 'Tag 2',
                'slug' => 'tag-2',
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            )
        );

        // Uncomment the below to run the seeder
        DB::table('tags')->insert($tags);
	}

}
