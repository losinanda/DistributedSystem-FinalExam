<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::all();
        return response()->json([
            'data' => $admin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $admin = Admin::create([
            'id' => Str::uuid(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin_name' => $request->admin_name,
            'admin_phone_number' => $request->admin_phone_number,
            'admin_gender' => $request->admin_gender,
            'admin_address' => $request->admin_address,
        ]);
        return response()->json([
            'data' => "Data created successfully!"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $admin = Admin::where('id', $id)->get();
        return response()->json([
            'data' => $admin
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $admin->email = $request->email;
        // $admin->password = Hash::make($request->password);
        // $admin->admin_name = $request->admin_name;
        // $admin->admin_phone_number = $request->admin_phone_number;
        // $admin->admin_gender = $request->admin_gender;
        // $admin->admin_address = $request->admin_address;
        $admin = Admin::find($id);
        if ($admin == null) {
            return response()->json(['data' => 'Data not found']);
        }
        $admin->update($request->all());
        return response()->json([
            'data' => "Data updated successfully!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $admin = Admin::find($id);
        if ($admin == null) {
            return response()->json(['data' => 'Data not found']);
        }
        $admin->delete();
        return response()->json(['data' => "Data deleted successfully!"]);
    }
}
