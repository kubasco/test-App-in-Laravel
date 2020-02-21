<?php

namespace App\Http\Controllers\Auth\Panel;

use App\Companies;
use App\Http\Controllers\Controller;
use App\Positions;
use App\User;
use Illuminate\Contracts\Support\Renderable;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $users = User::all()->count();;
        $companies = Companies::all()->count();;
        $positions = Positions::all()->count();;

        return view('auth.system.home', [
            'users' => $users,
            'companies' => $companies,
            'positions' => $positions,
        ]);
    }

}
