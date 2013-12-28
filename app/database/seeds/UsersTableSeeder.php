<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	// DB::table('users_table_seeder')->delete();

        $users = array(
            array(
                'username' => 'user',
                'password' => Hash::make('user'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ),
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }

}
