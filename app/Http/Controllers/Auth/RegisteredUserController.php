<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Utils\Utility;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{

    public function update(Request $request, int $id) {
        $request->validate(['role' => ['required', Rule::in(array_values(Utility::USER_ROLES))]]);

        $role = $request->get('role');

        $user = User::find($id);

        $user->update(['role' => $role]);

        if($role === Utility::USER_ROLES['admin']) {

            Auth::user()->update(['role' => Utility::USER_ROLES['invigilator']]);

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/');
        }

        Redirect::to(route('staff.all'))->with('staff updated');

    }

    public function show(int $id): \Illuminate\Http\Response
    {
        $user = User::find($id);

        return response()->view('backend.users.single', ['user' => $user]);

    }

    public function delete(int $id): Redirector|Application|RedirectResponse
    {
        User::destroy($id);

        return redirect(route('staff.all'))->with('staff', 'Delete Success');
    }

    public function index(): \Illuminate\Http\Response
    {
        $users = Auth::user()->school->staffs;

        return response()->view('backend.users.all', ['users' => $users]);
    }

    /**
     * Display the registration view.
     */
    public function create(): \Illuminate\Http\Response
    {
        return response()->view('frontend.auth.register', ['schools' => School::all()]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if(!$request->get('school') AND !$request->get('school-new')) {
            return redirect()->back()->withInput()->withErrors(['school' => 'School field required']);
        }

        $school = ($request->get('school')) ? $request->get('school') : $request->get('school-new');

        $thisSchool = School::find($school);

        $role = '';

        if($thisSchool) {
            $role = Utility::USER_ROLES['invigilator'];
        }
        else {
            $thisSchool = School::create([
                'name' => $school,
                'email' => $request->get('email')
            ]);

            $role = Utility::USER_ROLES['admin'];
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $role,
            'school_id' => $thisSchool->id,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
