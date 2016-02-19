<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryFeatureTest extends TestCase
{
    /**
     * Test to add a new category.
     *
     * @return void
     */
    public function testCreateNewCategory()
    {
        //create a user
        $user = factory(\App\User::class)->create([
          'name'     => 'John Doe',
          'email'    => 'j_doe@gmail.com',
          'password' => bcrypt('hayakiri'),
          'username' => 'johndoe',
        ]);

        $this->actingAs($user)
        ->call('post', '/category/create', ['name' => 'Networking']);

        $this->assertResponseOk();

        $this->seeInDatabase('categories', [
          'name' => 'Networking'
        ]);

        $user->delete();
    }

    public function testAllCategories()
    {
      $this->call('get', '/categories');
      $this->assertResponseOk();

      $this->visit('/')
      ->see('Categories');
    }

    public function testShowVideosInCategory()
    {
      //create category
      $user = factory(\App\User::class)->create([
        'name'     => 'John Doe',
        'email'    => 'j_doe@gmail.com',
        'password' => bcrypt('hayakiri'),
        'username' => 'johndoe',
      ]);

      $this->actingAs($user)
      ->call('post', '/category/create', ['name' => 'Networking']);

      $this->call('get', '/category/networking');
      $this->assertResponseOk();
      $this->visit('/category/networking')
      ->see('Networking');

      $this->call('get', '/category/unknowncategory');
      $this->assertResponseStatus(404);
    }
}
