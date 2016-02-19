<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $this->authorize('user-is-signed-in');
        $category_name = $request->input('name');
        if (Category::where('name', $category_name)->first() == null ) {
          $category = new Category;
          $category->name = ucwords($request->input('name'));
          $category->save();
          return $category->id;
        } else {
          return 'failed';
        }
    }

    public function index(Request $request){
      $categories = Category::all();
      return view('categories', ['categories' => $categories]);
    }

    public function show(Request $request){
      $category = ucwords($request->category_name);
      $catModel = Category::where('name', $category )->firstOrFail();
      $videos = $catModel->videos()->get();
      return view('videos', ['videos' => $videos, 'hide_options' => true, 'category' => $category ]);
    }
}
