<?php

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
        // $this->call(UsersTableSeeder::class);

        DB::table('albums')->insert([
            'name' => 'The Works',
            'artist' => 'Queen',
            'genre' => 'Rock',
            'condition' => 'Very Good',
            'is_active' => true,
        ]);
        DB::table('albums')->insert([
            'name' => 'Angels Cry',
            'artist' => 'Angra',
            'genre' => 'Power Metal',
            'condition' => 'Excellent',
            'is_active' => true,
        ]);
        DB::table('albums')->insert([
            'name' => 'Temple of Shadows',
            'artist' => 'Angra',
            'genre' => 'Power Metal',
            'condition' => 'Very Good',
            'is_active' => true,
        ]);
        DB::table('albums')->insert([
            'name' => 'Imaginations from the Other Side',
            'artist' => 'Blind Guardian',
            'genre' => 'Power Metal',
            'condition' => 'Poor',
            'is_active' => true,
        ]);
        DB::table('albums')->insert([
            'name' => 'Dusk and Her Embrace',
            'artist' => 'Cradle of Filth',
            'genre' => 'Extreme Metal',
            'condition' => 'Very Good',
            'is_active' => true,
        ]);
        DB::table('albums')->insert([
            'name' => 'Spiritual Black Dimensions',
            'artist' => 'Dimmu Borgir',
            'genre' => 'Black Metal',
            'condition' => 'Excellent',
            'is_active' => true,
        ]);
        DB::table('albums')->insert([
            'name' => '5th Season',
            'artist' => 'Dreamscape',
            'genre' => 'Progressive Metal',
            'condition' => 'Very Good',
            'is_active' => true,
        ]);
        DB::table('albums')->insert([
            'name' => 'Dust to Dust',
            'artist' => 'Heavenly',
            'genre' => 'Power Metal',
            'condition' => 'Very Good',
            'is_active' => true,
        ]);
 
    }
}
