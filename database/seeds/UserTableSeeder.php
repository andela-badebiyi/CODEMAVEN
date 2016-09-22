<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = factory(App\User::class)->create(
      [
        'name' => 'Adebiyi Bodunde',
        'email' => 'bodunadebiyi@gmail.com',
        'password' => bcrypt('pass1234')
      ]);

      $setting =  new App\Settings;
      $setting->user_id = $user->id;
      $setting->save();
    }
}
