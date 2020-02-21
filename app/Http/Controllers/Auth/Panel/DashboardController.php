<?php

namespace App\Http\Controllers\Auth\Panel;

use App\Companies;
use App\Http\Controllers\Controller;
use App\Positions;
use App\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return View
     */
    public function index(): View
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
