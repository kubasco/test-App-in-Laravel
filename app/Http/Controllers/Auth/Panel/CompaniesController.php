<?php

namespace App\Http\Controllers\Auth\Panel;

use App\Companies;
use App\Http\Controllers\Controller;
use App\Positions;
use App\Products;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CompaniesController extends Controller
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
     * @return View
     */
    public function index(): View
    {
        $companies = Companies::orderBy('id', 'DESC')->paginate(self::resultsPerPage);

        return view('auth.system.companies', [
            'companies' => $companies,
        ]);
    }

    public function get()
    {
        // TODO
        dd('TODO');
    }

    /**
     * @return View
     */
    public function add(): View
    {
        return view('auth.system.companies_add');
    }

    /**
     * @param Int $id
     * @return View
     */
    public function edit(Int $id): View
    {
        $company = Companies::findOrFail($id);

        return view('auth.system.companies_edit', [
            'company' => $company
        ]);
    }

    /**
     * @param Request $request
     * @param Int|null $id
     * @return RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function update(Request $request, Int $id = null)
    {
        $rules = [
            'name' => 'required|string|max:128',
        ];

        $names = [
            'name' => __('auth.company_name'),
        ];

        $this->validate($request, $rules, [], $names);

        if ($id) {
            $company = Companies::findOrFail($id);
        } else {
            $company = new Companies();
        }
        $company->name = $request->get('name');

        $company->save();

        return redirect(route('companies'))->with('success', __('auth.success'))->withInput();
    }

    /**
     * @param Int $id
     * @return RedirectResponse|Redirector
     */
    public function delete(Int $id)
    {
        $company = Companies::findOrFail($id);
        Positions::where(['companies_id' => $company->id])->delete();
        $company->delete();

        return redirect(route('companies'))->with('success', __('dashboard.success'))->withInput();
    }

}
