<?php

namespace App\Http\Controllers;

use PgSql\Lob;
use App\Models\Lending;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lending = Lending::with('member','book','admin')->get();
        return response()->json([
            'data' => $lending
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
        $lending = lending::create([
            'id' => Str::uuid(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'admin_id' => $request->admin_id,
            'member_id' => $request->member_id,
            'book_id' => $request->book_id,
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
        $lending = Lending::where('id', $id)->get();
        return response()->json([
            'data' => $lending
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lending $lending)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //            
        // $admin->email = $request->email;
        // $admin->password = Hash::make($request->password);
        // $admin->admin_name = $request->admin_name;
        // $admin->admin_phone_number = $request->admin_phone_number;
        // $admin->admin_gender = $request->admin_gender;
        // $admin->admin_address = $request->admin_address;
        $lending = Lending::find($id);
        if ($lending == null) {
            return response()->json(['data' => 'Data not found']);
        }
        $lending->update($request->all());
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
        $lending = Lending::find($id);
        if ($lending == null) {
            return response()->json(['data' => 'Data not found']);
        }
        $lending->delete();
        return response()->json([
            'data' => "Data deleted successfully!"
        ]);
    }
}
