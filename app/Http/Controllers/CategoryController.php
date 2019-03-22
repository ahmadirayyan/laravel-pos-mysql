<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
      $categories = Category::orderBy('created_at', 'DESC')->paginate(10);

      return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|string|max:50',
        'description' => 'nullable|string'
      ]);

      try {
        $categories = Category::firstOrCreate([
          'name' => $request->name
        ], [
          'description' => $request->description
        ]);
        return redirect()->back()->with(['success' => 'Category: ' . $categories->name . ' added.']);
      } catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
      }
    }

    public function edit($id)
    {
      $categories = Category::findOrFail($id);
      return view('categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'name' => 'required|string|max:50',
        'description' => 'nullable|string'
      ]);

      try {
        $categories = Category::findOrFail($id);
        $categories->update([
          'name' => $request->name,
          'description' => $request->description
        ]);

        return redirect(route('kategori.index'))->with(['success' => 'Category: ' . $categories->name . ' updated.']);
      } catch (\Exception $e) {
        return redirect(route('kategori.index'))->with(['error' => $e->getMessage()]);
      }
    }

    public function destroy($id)
    {
      $categories = Category::findOrFail($id);
      $categories->delete();
      return redirect()->back()->with(['success' => 'Category: ' . $categories->name . ' deleted.']);
    }
}
