<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('pages.profile.edit', [
            'user' => $request->user(),
        ]);
    }


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    public function additionalProfile(Request $request)
    {

        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'contact_no' => 'required',
            'address' => 'required'
        ]);

        $profile = $request->user()->profile;


        if (!$profile) {
            Profile::create([
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'contact_no' => $request->contact_no,
                'address' => $request->address,
                'user_id' => $request->user()->id
            ]);

            return back()->with(['message' => 'profile Added Success']);
        }


        $profile->update([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'contact_no' => $request->contact_no,
            'address' => $request->address,
            'user_id' => $request->user()->id
        ]);


        return back()->with(['message' => 'profile Updated Success']);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }



    // SELLER PROFILE


    /*
    Display Seller Profile Form

    */
    public function selleredit(Request $request): View
    {
        return view('pages.profile.seller', [
            'user' => $request->user(),
        ]);
    }
}
