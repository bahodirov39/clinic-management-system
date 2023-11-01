<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $query = ItemCategory::query();
        $categories = $query->active()->get();

        $query = Item::query();
        $items = $query->ordered()->get();
        $quantity = $query->count();
        $compact = compact('items', 'categories', 'quantity');
        return view('crm.items.index', $compact);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'in_stock' => 'required',
            'per_price' => 'required',
            'category_id' => '',
            'priority' => '',
            'status' => '',
        ]);

        $data['category_id'] = json_encode($data['category_id']);
        $data['clinic_id'] = auth()->user()->clinic_id;

        Item::create($data);

        return back()->with('success', 'Item successfully added!');
    }

    public function edit($id)
    {
        $query = Item::query();
        $item = $query->where('id', $id)->first();

        $query = ItemCategory::query();
        $categories = $query->active()->get();

        $compact = compact('item', 'categories');
        return view('crm.items.edit', $compact);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'in_stock' => 'required',
            'per_price' => 'required',
            'category_id' => '',
            'priority' => '',
            'status' => '',
        ]);

        $data['category_id'] = json_encode($data['category_id']);
        Item::where('id', $request->item_id)->update($data);

        return redirect()->route('items')->with('success', 'Item successfully updated!');
    }

    public function destroy(Request $request, $id)
    {
        $item = Item::find($id);
        if (!$item) {
            return redirect()->back()->with('error', 'Item not found.');
        }

        $item->delete();

        return redirect()->back()->with('success', 'Item deleted successfully.');
    }
}
