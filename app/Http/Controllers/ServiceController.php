<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $query = Service::query();
        $services = $query->get();
        $quantity = $query->count();

        $query = User::query();
        $dentists = $query->dentist()->get();

        $compact = compact('services', 'dentists', 'quantity');
        return view('crm.services.index', $compact);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_uz' => 'required',
            'name_ru' => 'required',
            'description_uz' => 'required',
            'description_ru' => 'required',
            'price' => '',
            'dentist_id' => '',
            'duration' => '',
            'bnpl_percent' => '',
        ]);

        $data['rating'] = rand(1, 10);
        $data['dentist_id'] = isset($data['dentist_id']) ? json_encode($data['dentist_id']) : null;
        $data['clinic_id'] = auth()->user()->clinic_id;

        Service::create($data);

        return back()->with('success', 'Item successfully added!');
    }

    public function edit($id)
    {
        $query = Service::query();
        $service = $query->where('id', $id)->first();

        $query = User::query();
        $dentists = $query->dentist()->get();

        $compact = compact('service', 'dentists');
        return view('crm.services.edit', $compact);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name_uz' => 'required',
            'name_ru' => 'required',
            'description_uz' => 'required',
            'description_ru' => 'required',
            'price' => '',
            'dentist_id' => '',
            'duration' => '',
            'bnpl_percent' => '',
        ]);

        $data['rating'] = rand(1, 10);
        $data['dentist_id'] = isset($data['dentist_id']) ? json_encode($data['dentist_id']) : null;

        Service::where('id', $request->service_id)->update($data);

        return redirect()->route('services')->with('success', 'Item successfully updated!');
    }

    public function destroy(Request $request, $id)
    {
        $service = Service::find($id);
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }

        $service->delete();

        return redirect()->back()->with('success', 'Service deleted successfully.');
    }
}
