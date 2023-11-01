<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use TCG\Voyager\Models\Role;

class DentistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $query = User::query();
        $dentists = $query->dentist()->get();
        $quantity = $query->dentist()->count();

        $restricted_roles = Helper::restricted_roles(); // 1-admin, 2-user, 3-clinic_owner
        $roles = Role::whereNotIn('id', $restricted_roles)->get();
        $compact = compact('dentists', 'quantity', 'roles');
        return view('crm.dentists.index', $compact);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'father_name' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
            'email' => '',
            'role_id' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['clinic_id'] = auth()->user()->clinic_id;

        User::create($data);

        return back()->with('success', 'User successfully added');
    }

    public function edit($id)
    {
        $query = User::query();
        $dentist = $query->where('id', $id)->first();

        $restricted_roles = Helper::restricted_roles();
        $roles = Role::whereNotIn('id', $restricted_roles)->get();
        $compact = compact('dentist', 'roles');

        return view('crm.dentists.edit', $compact);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'father_name' => 'required',
            'phone_number' => 'required',
            'password' => '',
            'email' => '',
            'role_id' => 'required',
        ]);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }else{
            unset($data['password']);
        }

        User::where('id', $request->dentist_id)->update($data);

        return redirect()->route('dentists')->with('success', 'User successfully updated!');
    }

    public function destroy(Request $request, $id)
    {
        $dentist = User::find($id);
        if (!$dentist) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $dentist->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
