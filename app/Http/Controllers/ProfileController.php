<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        // Get the authenticated user
        $user = $request->user();

        // Fetch profile data
        $profile = $user->profile ?? null;

        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $user instanceof MustVerifyEmail,
            'status' => session('status'),
            'user' => $user,
            'profile' => $profile,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['nullable','string','max:20', Rule::unique('user_profiles', 'mobile')->ignore($request->user()->id, 'user_id')],
            'address' => ['nullable', 'string', 'max:255'],
        ]);

        // Get the authenticated user
        $user = $request->user();

        // Update users table
        $user->name = $validated['name'];
        $user->save();

        // Update or create profile data
        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'mobile' => $validated['mobile'] ?? '',
                'address' => $validated['address'] ?? '',
            ]
        );

        // Redirect back with success message
        return Redirect::route('profile.edit')->with('success', 'Profile updated successfully.');
    }


    /**
     * Update the user's profile image.
     */
    public function updateImage(Request $request): RedirectResponse
    {   
        // Validate the request
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($request->hasFile('image')) {
            // Delete old image if exists
            $oldImage = $user->profile?->image;

            if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }

            // Upload new profile image
            $imagePath = $request->file('image')->store('profile-images', 'public');

            // Update or create customer profile image field
            $user->profile()->updateOrCreate(
                ['user_id' => $user->id],
                ['image' => $imagePath]
            );
        }

        return redirect()->back()->with('success', 'Your profile image updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        // Get the authenticated user
        $user = $request->user();

        // Logout the user
        Auth::logout();

        // Delete the user
        $user->delete();

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the home page
        return Redirect::to('/');
    }
}