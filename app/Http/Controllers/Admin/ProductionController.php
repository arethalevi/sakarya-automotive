<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Production;
use App\Models\Catalog;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function production()
    {
        $production = Production::all();
        $catalog = Catalog::all();

        return view('admin.production.index', compact('production','catalog'));
    }

    public function add()
    {
        $catalog = Catalog::get();
        return view('admin.production.add', [
            'catalog' => $catalog
        ]);
    }

    public function save(Request $request)
    {
        $this->validate($request,[
            'catalog_id' => 'required',
            'tgl_produksi' => 'required',
            'jumlah_barang' => 'required'
        ]);

        $nama = Catalog::where('catalog_id', $request->catalog_id)->first();

        Production::create([
            'catalog_id' => $nama->catalog_id,
            'tgl_produksi' => $request->tgl_produksi,
            'jumlah_barang' => $request->jumlah_barang
        ]);

        return redirect('/admin/production')->with('status', 'New production succesfully added');
    }

    public function edit($production_id)
    {
        $production = Production::find($production_id);
        return view('admin.production.edit', ['production' => $production, 'production_id' => $production_id]);
    }

    public function update($production_id, Request $request)
    {
        $this->validate($request,[
            'catalog_id' => 'required',
            'tgl_produksi' => 'required',
            'jumlah_barang' => 'required'
        ]);
        $id = (int)$production_id;
        $production = Production::find($id);
        $production->catalog_id = $request->catalog_id;
        $production->tgl_produksi = $request->tgl_produksi;
        $production->jumlah_barang = $request->jumlah_barang;
        $production->save();

        return redirect('/admin/production')->with('status', 'New production succesfully updated');
    }

    public function delete($production_id)
    {
        $id = (int)$production_id;
        $production = Production::find($id);
        $production->delete();

        return redirect('/admin/production');
    }
}
