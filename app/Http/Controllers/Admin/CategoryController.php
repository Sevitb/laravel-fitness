<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function categoryList()
    {

        $categories = Category::orderBy('id')->paginate(4);

        return view('admin.categories.category-list', compact('categories'));
    }

    public function categoryEdit($categoryId)
    {
        if ($categoryId) {
            if (!$category = Category::find(($categoryId))) {
                return abort(404);
            }
        }

        return view('admin.categories.category-edit', compact('category'));
    }

    public function categoryCreate()
    {
        return view('admin.categories.category-create');
    }

    public function categoryDelete(Request $request)
    {
        Category::destroy($request->id);

        return redirect('/admin/categories');
    }

    public function categoryStore(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
        ]);

        if ($request->hasFile('canvas_image')) {
            $validated['canvas_image'] = $this->saveAndReturnPath($request, 'canvas_image', str_slug($validated['title']));
        }
        if ($request->hasFile('icon')) {
            $validated['icon'] = $this->saveAndReturnPath($request, 'icon', str_slug($validated['title']));
        }

        Category::updateOrCreate(['id' => $request->id], $validated);

        return redirect()->back();
    }


    public function saveAndReturnPath($request, $key, $directory)
    {
        $savePath = 'images/categories/' . $directory;
        $fileName = str_replace(' ', '-', trim($request->file($key)->getClientOriginalName()));

        if (!File::isDirectory($savePath)) {
            File::makeDirectory($savePath);
        }

        return $request->file($key)->move($savePath, $fileName);
    }
}
