<?php

namespace App\Http\Controllers\Auth\Panel;

use App\Companies;
use App\Http\Controllers\Controller;
use App\Positions;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PositionsController extends Controller
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
        $positions = Positions::orderBy('id', 'DESC')->paginate(self::resultsPerPage);

        return view('auth.system.positions', [
            'positions' => $positions,
        ]);
    }

    /**
     * @return Factory|View
     */
    public function add(): View
    {
        $references = Config::get('positions.references');
        $companies = Companies::all();
        return view('auth.system.positions_add', [
            'companies' => $companies,
            'references' => $references
        ]);
    }

    /**
     * @param Int $id
     * @return View
     */
    public function edit(Int $id): View
    {
        $position = Positions::findOrFail($id);
        $references = Config::get('positions.references');
        $companies = Companies::all();

        return view('auth.system.positions_edit', [
            'position' => $position,
            'companies' => $companies,
            'references' => $references
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
        $references = implode(',', Config::get('positions.references'));

        $rules = [
            'companies_id' => 'required|integer|exists:companies,id',
            'reference' => 'required|in:' . $references,
            'title' => 'required|string|max:128',
            'description' => 'required|string|max:5000',
            'email' => 'required|email|max:128',
        ];

        $names = [
            'name' => __('auth.company_name'),
        ];

        $this->validate($request, $rules, [], $names);

        if ($id) {
            $position = Positions::findOrFail($id);
        } else {
            $position = new Positions();
        }
        $position->companies_id = $request->get('companies_id');
        $position->reference = $request->get('reference');
        $position->title = $request->get('title');
        $position->description = $request->get('description');
        $position->email = $request->get('email');

        $position->save();

        return redirect(route('positions'))->with('success', __('auth.success'))->withInput();
    }

    /**
     * @param Int $id
     * @return RedirectResponse|Redirector
     */
    public function delete(Int $id)
    {
        Positions::findOrFail($id)->delete();
        return redirect(route('positions'))->with('success', __('dashboard.success'))->withInput();
    }

}
