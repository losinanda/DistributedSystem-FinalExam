<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::all();
        return response()->json([
            'data' => $book
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
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('image/book');
        } else {
            $image = null;
        }
        $book = Book::create([
            'id' => Str::uuid(),
            'title' => $request->title,
            'image' => $image,
            'shelf' => $request->shelf,
            'status' => $request->status,
        ]);
        
        return response()->json([
            'data' => "Data created successfully!"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //            
        $book = Book::find($id);
        if ($request->hasFile("image")) {
            if ($book->image != null) {
                Storage::delete($book->image);
            }
            $image = $request->file('image')->store('image/book');
            $book->update([
            'title'     => $request->title,
            'shelf'   => $request->shelf,
            'status'   => $request->status,
            'image'   => $image,
            ]);
            // $book->image = $image;
            // $book->save();
        } else {
            $book->update([
                'title'     => $request->title,
                'shelf'   => $request->shelf,
                'status'   => $request->status,
            ]);
        }

        return response()->json([
            'data' => "Data updated successfully!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return response()->json([
            'data' => "Data deleted successfully!"
        ]);
    }
}
