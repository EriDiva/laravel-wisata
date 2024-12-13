<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'categories' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('photo')->store('categories');

        Category::create([
            'photo' => $path,
            'categories' => $request->categories,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'categories' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
            'photo' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            Storage::delete($category->photo);
            $path = $request->file('photo')->store('categories');
            $category->photo = $path;
        }

        $category->update([
            'categories' => $request->categories,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        Storage::delete($category->photo);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
    public function cetak()
    {
        $category = Category::all();
        $pdf = Pdf::loadview('categories.transaction-cetak', compact('category'));
        return $pdf->download('laporan-transaksi.pdf');
    }
}
