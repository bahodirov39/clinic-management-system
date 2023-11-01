<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $query = ItemCategory::query();
        $categories = $query->with('items')->orderDesc()->get();
        $quantity = $query->count();
        $compact = compact('categories', 'quantity');
        return view('crm.item_categories.index', $compact);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);
        $data['clinic_id'] = auth()->user()->clinic_id;
        ItemCategory::create($data);

        return back()->with('success', 'Category successfully added!');
    }

    public function edit($id)
    {
        $query = ItemCategory::query();
        $category = $query->where('id', $id)->first();
        $compact = compact('category');
        return view('crm.item_categories.edit', $compact);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        ItemCategory::where('id', $request->item_category_id)->update($data);

        return redirect()->route('cat.items')->with('success', 'Category successfully updated!');
    }

    public function destroy(Request $request, $id)
    {
        $category = ItemCategory::find($id);
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}
