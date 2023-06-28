<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Category;
use App\Models\CoachLevel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function serviceList(Request $request)
    {
        $services = DB::select(
            "select s.id, s.title,
            concat('[',group_concat( DISTINCT
                json_object(
                    'category_id', c.id,
                    'value', c.title
                )),']') as category_titles
            from services as s
            left join category_service as cs on s.id = cs.service_id
            left join categories as c on c.id = cs.category_id
            group by s.id"
        );

        $services = $this->arrayPaginator($services, $request);

        return view('admin.services.service-list', compact('services'));
    }

    public function serviceEdit($serviceId)
    {
        if ($serviceId) {
            if (!$service = Service::find($serviceId)) {
                return abort(404);
            }
        }

        $attachedCategories = $service->categories()->get();

        $allCategories = Category::all(['id', 'title']);

        return view('admin.services.service-edit', compact('service', 'attachedCategories', 'allCategories'));
    }

    public function serviceCreate()
    {
        $allCategories = Category::all(['id', 'title']);

        return view('admin.services.service-create', compact('allCategories'));
    }

    public function serviceDelete(Request $request)
    {

        $service = Service::find($request->id);

        $serviceDirectory = explode('\\', $service->image)[0];

        Service::destroy($request->id);

        if (File::isDirectory($serviceDirectory)) {
            File::deleteDirectory(public_path($serviceDirectory));
        }

        return redirect('/admin/services');
    }

    public function serviceStore(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description.brief_info.*' => 'max:550',
            'description.options.*' => 'max:255',
        ]);

        $validated['description'] = json_encode($validated['description']);

        if ($request->hasFile('image')) {
            $savePath = 'images/services/' . str_slug($validated['title']);
            $fileName = str_replace(' ', '-', trim($request->file('image')->getClientOriginalName()));

            if (!File::isDirectory($savePath)) {
                File::makeDirectory($savePath);
            }

            $validated['image'] = $request->file('image')->move($savePath, $fileName);
        }

        $service = Service::updateOrCreate(['id' => $request->id], $validated);

        $categoriesToAttach = [];
        $categoriesToDetach = [];

        foreach ($request->category as $key => $category) {
            if (array_key_exists('delete', $category)) {
                array_push($categoriesToDetach, $category['id']);
                continue;
            }
            unset($category['id']);
            $category['service_coach_levels_prices'] = json_encode($category['service_coach_levels_prices']);
            $categoriesToAttach[$key] = $category;
        }

        $service->categories()->detach($categoriesToDetach);
        $service->categories()->sync($categoriesToAttach);

        return redirect()->back()->with('msg', 'Данные успешно сохранены!');
    }

    public function arrayPaginator($array, $request)
    {
        $page = $request->input('page', 1);
        $perPage = 5;
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(
            array_slice($array, $offset, $perPage, true),
            count($array),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    }
}
