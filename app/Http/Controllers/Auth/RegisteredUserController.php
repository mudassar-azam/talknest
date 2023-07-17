<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('front.home');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }

    public function update(Request $request): RedirectResponse
{

    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
    ]);


    $user = Auth::user();
    $user->name = $request->name;
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect('/profile')->with('success', 'User updated successfully');
}

public function upload(Request $request)
{
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();

        $image->storeAs('public/profileimage', $filename);

        $user = Auth::user();

        // Delete the previous image if it exists
        if ($user->image) {
            Storage::delete('public/profileimage/' . $user->image);
        }

        $user->image = $filename;
        $user->save();

        // Return success response
        return response()->json(['success' => true]);
    }

    // Return error response
    return response()->json(['success' => false]);
}

}
