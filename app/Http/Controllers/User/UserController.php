<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Category;
use App\Models\Inventory;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $catalog = Catalog::all()->take(15);
        // $feature_product = Catalog::where('catalog_status', 'belum')->take(15)->get();
        $category = Category::all();
        return view('users.home', compact('catalog', 'category'));
    }

    public function category()
    {
        $category = Category::all();
        return view('users.category', compact('category'));
    }

    public function categoryview($name)
    {
        if(Category::where('name',$name)->exists())
        {
            $category = Category::where('name',$name)->first();
            $catalog = Catalog::where('cat_id', $category->cat_id)->get();
            return view('users.products.index', compact('category', 'catalog'));

        }
        else{
            return redirect('/home')->with('status','Category doesnot exists');
        }
    }

    public function productview($name, $slug)
    {
        $catalog = Catalog::where('slug', $slug)->first();
        $inventory = Inventory::where('catalog_id', $catalog->catalog_id)->first();
        $category = Category::where('cat_id',$catalog->cat_id)->first();
        return view('users.products.view', [
            'catalog' => $catalog,
            'inventory' => $inventory,
            'category' => $category
        ]);
    }
}
