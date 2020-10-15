<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Link::withTrashed()->paginate(10);
        return view('table', compact('links'));
    }

    /**
     * Show the form for creating a new link.
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created link in storage.
     */
    public function store()
    {
        $data = request()->validate([
            'url' => 'required|url'
        ]);

        $link = new Link();
        $link->url = request('url');
        $link->delete_at = request('delete_at');
        $link->save();

        return redirect()->back()->with('link', $link);
    }

    /**
     * Redirect to link url.
     */
    public function redirect(Link $link)
    {
        $link->increment('visits',1);

        return view('redirect', compact('link'));
    }
}
