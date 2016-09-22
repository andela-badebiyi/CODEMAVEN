<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Category::class)->create(
      [
          'name' => 'Java',
          'avatar' => 'http://res.cloudinary.com/okpe/image/upload/c_thumb/un3kia8wxqu8ussnh11x'
      ]);

      factory(App\Category::class)->create(
      [
          'name' => 'Python',
          'avatar' => 'http://codecondo.com/wp-content/uploads/2014/02/Python-Programming-2014.png'
      ]);

      factory(App\Category::class)->create(
      [
          'name' => 'Nodejs',
          'avatar' => 'http://res.cloudinary.com/okpe/image/upload/c_thumb/zlvgfkhsw2dudd0gu9gs'
      ]);

      factory(App\Category::class)->create(
      [
          'name' => 'Php',
          'avatar' => 'http://res.cloudinary.com/okpe/image/upload/c_thumb/kkr9nqp6ylqmqrt7d1io'
      ]);

      factory(App\Category::class)->create(
      [
          'name' => 'Laravel',
          'avatar' => 'http://kodeinfo.com/img/laravel_logo.png'
      ]);

      factory(App\Category::class)->create(
      [
          'name' => 'Django',
          'avatar' => 'http://www.shellrack.com/site_media/website/img/appliance/django-logo-square.png'
      ]);

      factory(App\Category::class)->create(
      [
          'name' => 'Android',
          'avatar' => 'http://opendatakosovo.org/wp-content/uploads/2015/08/android-logo.png'
      ]);

      factory(App\Category::class)->create(
      [
          'name' => 'Swift',
          'avatar' => 'http://img.deusm.com/informationweek/2015/09/1322066/Swift_logo.png'
      ]);

      factory(App\Category::class)->create(
      [
          'name' => 'Ionic',
          'avatar' => 'https://cdn.evbuc.com/images/7164259/44251867806/1/logo.png'
      ]);
    }
}
