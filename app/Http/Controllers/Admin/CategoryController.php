<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return view('admin.category.index', compact('category'));
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function save(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('categoryimage',$imagename);

        Category::create([
            'name' => $request->name,
            'image'=> $imagename
        ]);

        return redirect('/admin/category')->with('status', 'New product succesfully added');
    }

    public function edit($cat_id)
    {
        $category = Category::find($cat_id);
        return view('admin.category.edit', ['category' => $category, 'cat_id' => $cat_id]);
    }

    public function update($cat_id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('categoryimage',$imagename);

        $id = (int)$cat_id;
        $category = Category::find($id);
        $category->name = $request->name;
        $category->image=$imagename;
        $category->save();

        return redirect('/admin/category')->with('status', 'Product successfully updated');;
    }

    public function delete($cat_id)
    {
        $id = (int)$cat_id;
        $category = Category::find($id);
        $category->delete();

        return redirect('/admin/category')->with('status', 'Product successfully deleted');;
    }
}
