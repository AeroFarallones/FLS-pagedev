<?php

namespace Modules\FlsModule\Http\Controllers;

use App\Contracts\Controller;
use App\Models\News;

class Fls_NewsController extends Controller
{
    // News
    public function index()
    {
        $allnews = News::with('user')->orderby('created_at', 'DESC')->paginate(20);

        return view('FlsModule::news.index', [
            'allnews' => $allnews,
        ]);
    }
}
