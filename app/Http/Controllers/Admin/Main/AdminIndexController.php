<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {

        return view('admin.main.index');
    }
}
