<?php

namespace Modules\FlsModule\Http\Controllers;

use App\Contracts\Controller;
use Illuminate\Http\Request;

/**
 * Class FlsCustomPagesController
 * @package Modules\FlsModule\Http\Controllers
 */
class Fls_CustomPagesController extends Controller
{
    public function index()
    {
        return view('FlsModule::admin.blog');
    }
    public function blog()
    {
    }
}
