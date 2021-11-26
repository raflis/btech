<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Record;
use App\Models\Blog\Post;
use App\Models\Admin\Partner;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function dashboard()
    {
        $registros = Record::count();
        $entradas = Post::count();
        $partners = Partner::count();

        return view('admin.dashboard.index', compact(
                                                    [
                                                        'entradas',
                                                        'partners',
                                                        'registros',
                                                    ]
                                                ));
    }
}
