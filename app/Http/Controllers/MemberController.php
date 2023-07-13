<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member = Member::all();
        return response()->json([
            'data' => $member
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
        $member = Member::create([
            'id' => Str::uuid(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'member_name' => $request->member_name,
            'member_phone_number' => $request->member_phone_number,
            'member_gender' => $request->member_gender,
            'member_address' => $request->member_address,
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
        $member = Member::where('id', $id)->get();
        return response()->json([
            'data' => $member
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $member->email = $request->email;
        // $member->password = Hash::make($request->password);
        // $member->member_name = $request->member_name;
        // $member->member_phone_number = $request->member_phone_number;
        // $member->member_gender = $request->member_gender;
        // $member->member_address = $request->member_address;
        $member = Member::find($id);
        if ($member == null) {
            return response()->json(['data' => 'Data not found']);
        }
        $member->update($request->all());
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
        $member = Member::find($id);
        if ($member == null) {
            return response()->json(['data' => 'Data not found']);
        }
        $member->delete();
        return response()->json(['data' => "Data deleted successfully!"]);
    }
}
