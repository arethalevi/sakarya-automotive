<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Catalog;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function inventory()
    {
        $inventory = Inventory::all();
        $catalog = Catalog::all();

        return view('admin.inventory.index', compact('inventory','catalog'));
    }
}
