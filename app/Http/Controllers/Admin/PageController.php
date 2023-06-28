<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function pageEdit()
    {

        $pageData = json_decode(Storage::get('public/home_page.json'), true);

        return view('admin.pages.page-edit', compact('pageData'));
    }

    public function pageStore(Request $request): RedirectResponse
    {

        $pageData = json_decode(Storage::get('public/home_page.json'), true);

        $newPageData = $request->page;

        foreach ($newPageData['gallery']['images'] as $images) {
            unset($images['src']);
        }

        $newPageData = array_replace_recursive($pageData, $newPageData);

        Storage::put('public/home_page.json', json_encode($newPageData));

        return redirect()->back();
    }

    public function pageDeleteImage(Request $request)
    {
        $pageData = json_decode(Storage::get('public/home_page.json'), true);

        if (File::exists($pageData['gallery']['images'][$request->gallery_group]['src'][$request->id])) {
            File::delete($pageData['gallery']['images'][$request->gallery_group]['src'][$request->id]);
        } else {
            return response()->json(['error' => 'Файл не существует.']);
        }

        unset($pageData['gallery']['images'][$request->gallery_group]['src'][$request->id]);

        Storage::put('public/home_page.json', json_encode($pageData));

        return response()->json();
    }

    public function pageUploadImage(Request $request)
    {
        $pageData = json_decode(Storage::get('public/home_page.json'), true);

        if ($request->hasFile('images')) {
            $savePath = 'images/home/gallery';
            $files = $request->file('images');
            foreach ($files as $file) {
                $fileName = str_replace(' ', '-', trim($file->getClientOriginalName()));

                if (!File::isDirectory($savePath)) {
                    File::makeDirectory($savePath);
                }

                $file->move($savePath, $fileName);

                array_push($pageData['gallery']['images'][$request->gallery_group]['src'], $savePath . '/' . $fileName);

                Storage::put('public/home_page.json', json_encode($pageData));
            }
        }

        return response()->json();
    }
}
