<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CoachController extends Controller
{
    public function coachList()
    {

        $coaches = Coach::orderBy('id')->paginate(5);

        return view('admin.coaches.coach-list', compact('coaches'));
    }

    public function coachEdit($coachId)
    {
        if ($coachId) {
            if (!$coach = Coach::find($coachId)) {
                return abort(404);
            }
        }

        return view('admin.coaches.coach-edit', compact('coach'));
    }

    public function coachCreate()
    {
        return view('admin.coaches.coach-create');
    }

    public function coachDelete(Request $request)
    {

        $coach = Coach::find($request->id);

        $coachDirectory = explode('\\', $coach->portrait)[0];

        Coach::destroy($request->id);

        if (File::isDirectory($coachDirectory)) {
            File::deleteDirectory(public_path($coachDirectory));
        }

        return redirect('/admin/coaches');
    }

    public function coachStore(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'surname' => "required|max:255",
            'name' => "required|max:255",
            'patronymic' => "max:255",
            'description.brief_info' => "max:255",
            'description.slogan' => "max:100",
            'description.options.*' => "max:100",
        ]);

        $validated['description'] = json_encode($validated['description']);

        if ($request->hasFile('portrait')) {
            $savePath = 'images/coaches/' . 'coach-' . str_slug($validated['name'] . ' ' . $validated['surname'] . ' ' . $validated['patronymic']);
            $fileName = str_replace(' ', '-', trim($request->file('portrait')->getClientOriginalName()));

            if (!File::isDirectory($savePath)) {
                File::makeDirectory($savePath);
            }

            $validated['portrait'] = $request->file('portrait')->move($savePath, $fileName);
        }

        Coach::updateOrCreate(['id' => $request->id], $validated);

        return redirect()->back();
    }
}
