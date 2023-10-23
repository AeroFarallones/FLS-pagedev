<?php

namespace phpvms\tours\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    public function index()
    {
        $tours = Tour::paginate(10);

        return view('tours.index', compact('tours'));
    }

    public function show(Tour $tour)
    {
        return view('tours.show', compact('tour'));
    }
}
