<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Support\Str;

class CatalogController extends Controller
{
    public function catalog()
    {
        $catalog = Catalog::all();

        return view('admin.catalog.index', compact('catalog'));
    }

    public function add()
    {
        $categories = Category::get();
        return view('admin.catalog.add', [
            'categories' => $categories
        ]);
    }

    public function save(Request $request)
    {

        $this->validate($request,[
            'cat_id' => 'required',
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'image'=> 'required|image|mimes:jpg,png,jpeg,gif,jfif,svg|max:2048'
        ]);

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productimage',$imagename);

        $tipe = Category::where('cat_id', $request->cat_id)->first();

        Catalog::create([
            'cat_id' => $request->cat_id,
            'nama_barang' => $request->nama_barang,
            'slug' => Str::slug($request->nama_barang),
            'tipe' => $tipe->name,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'image'=> $imagename
        ]);

        return redirect('/admin/catalog')->with('status', 'New product succesfully added');
    }

    public function edit($catalog_id)
    {
        $catalog = Catalog::find($catalog_id);
        return view('admin.catalog.edit', ['catalog' => $catalog, 'catalog_id' => $catalog_id]);
    }

    public function update($catalog_id, Request $request)
    {
        $this->validate($request,[
            'cat_id' => 'required',
            'nama_barang' => 'required',
            'tipe' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productimage',$imagename);

        $id = (int)$catalog_id;
        $catalog = Catalog::find($id);
        $catalog->cat_id = $request->cat_id;
        $catalog->nama_barang = $request->nama_barang;
        $catalog->slug = Str::slug($request->nama_barang);
        $catalog->tipe = $request->tipe;
        $catalog->deskripsi = $request->deskripsi;
        $catalog->harga = $request->harga;
        $catalog->image=$imagename;
        $catalog->save();

        return redirect('/admin/catalog')->with('status', 'Product successfully updated');;
    }

}
