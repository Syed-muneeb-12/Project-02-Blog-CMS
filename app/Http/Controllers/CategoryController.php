<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate incoming data
        $validated = $request->validate([
            'name' => ['required', 'unique:categories,name', 'max:255'],
        ]);

        Category::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name'], '-'),
        ]);

        $request->session()->flash('status', 'Task was successful!');

        return redirect()
            ->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255', Rule::unique('categories', 'name')->ignore($category)],
        ]);

        $category->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name'], '-'),
        ]);

        return redirect()->route('categories.index');
    }


    public function destroy(Request $request, Category $category)
    {

        // Use the static destroy method which accepts the model id
        Category::destroy($category->id);

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
