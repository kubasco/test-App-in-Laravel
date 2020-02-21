<?php

namespace App\Http\Controllers\Auth\Panel;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class UsersController extends Controller
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
        $users = User::orderBy('id', 'DESC')->paginate(self::resultsPerPage);

        return view('auth.system.users', [
            'users' => $users,
        ]);
    }

    /**
     * @return View
     */
    public function add(): View
    {
        return view('auth.system.users_add');
    }

    /**
     * @param Int $id
     * @return View
     */
    public function edit(Int $id): View
    {
        $user = User::findOrFail($id);

        return view('auth.system.users_edit', [
            'user' => $user
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
            'nip' => 'string|max:128|nullable',
            'email' => 'required|email|max:128|unique:users,email,' . $id,
            'password' => (($id) ? '' : 'required|') . 'min:8|string|max:512|nullable',
            'phone' => 'min:7|string|max:32|nullable',
            'address' => 'string|max:128|nullable',
            'zip_code' => 'string|max:16|nullable',
            'city' => 'string|max:128|nullable',
        ];

        $names = [
            'name' => __('auth.name'),
            'email' => __('auth.email'),
            'password' => __('auth.password'),
            'phone' => __('auth.phone'),
            'address' => __('auth.address'),
            'zip_code' => __('auth.zip_code'),
            'city' => __('auth.city')
        ];

        $this->validate($request, $rules, [], $names);

        if ($id) {
            $user = User::findOrFail($id);
            if ($request->get('password') !== null || $user->password === $request->get('password')) {
                $user->password = Hash::make($request->get('password'));
            }
        } else {
            $user = new User();
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
        }
        $user->name = $request->get('name');
        $user->nip = $request->get('nip');
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');
        $user->zip_code = $request->get('zip_code');
        $user->city = $request->get('city');

        $user->save();

        return redirect(route('users'))->with('success', __('auth.save'))->withInput();
    }

    /**
     * @param Int $id
     * @return RedirectResponse|Redirector
     */
    public function delete(Int $id)
    {
        User::findOrFail($id)->delete();
        return redirect(route('users'))->with('success', __('dashboard.success'))->withInput();
    }

}
