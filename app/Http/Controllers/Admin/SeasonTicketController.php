<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SeasonTicket;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SeasonTicketController extends Controller
{
    public function seasonTicketList(Request $request)
    {

        $seasonTickets = DB::select(
            "select st.id, st.title,
            concat('[',group_concat( DISTINCT
                json_object(
                    'category_id', c.id,
                    'value', c.title
                )),']') as category_titles
            from season_tickets as st
            left join category_season_ticket as cst on st.id = cst.season_ticket_id
            left join categories as c on c.id = cst.category_id
            group by st.id"
        );

        $seasonTickets = $this->arrayPaginator($seasonTickets, $request);

        return view('admin.season_tickets.season-ticket-list', compact('seasonTickets'));
    }

    public function seasonTicketEdit($seasonTicketId)
    {
        if ($seasonTicketId) {
            if (!$seasonTicket = SeasonTicket::find($seasonTicketId)) {
                return abort(404);
            }
        }

        $attachedCategories = $seasonTicket->categories()->get();

        $allCategories = Category::all(['id', 'title']);

        return view('admin.season_tickets.season-ticket-edit', compact('seasonTicket', 'attachedCategories', 'allCategories'));
    }

    public function seasonTicketCreate()
    {
        $allCategories = Category::all(['id', 'title']);

        return view('admin.season_tickets.season-ticket-create', compact('allCategories'));
    }

    public function seasonTicketDelete(Request $request)
    {
        SeasonTicket::destroy($request->id);

        return redirect('/admin/season-tickets');
    }

    public function seasonTicketStore(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'max:255',
            'duration' => 'required|max:10',
            'description.brief_info.*' => 'max:550',
        ]);

        $validated['description'] = json_encode($validated['description']);

        $seasonTicket = SeasonTicket::updateOrCreate(['id' => $request->id], $validated);

        $categoriesToAttach = [];
        $categoriesToDetach = [];

        foreach ($request->category as $key => $category) {
            if (array_key_exists('delete', $category)) {
                array_push($categoriesToDetach, $category['id']);
                continue;
            }
            unset($category['id']);
            $category['season_ticket_coach_levels_prices'] = json_encode($category['season_ticket_coach_levels_prices']);
            $categoriesToAttach[$key] = $category;
        }

        $seasonTicket->categories()->detach($categoriesToDetach);
        $seasonTicket->categories()->sync($categoriesToAttach);

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
