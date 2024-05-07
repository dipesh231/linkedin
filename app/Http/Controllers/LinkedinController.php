<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LinkedinController extends Controller
{
    public function redirectToLinkedIn()
    {
        return Socialite::driver('linkedin')->scopes(['r_basicprofile', 'r_emailaddress','r_1st_connections_size'])->redirect();
    }

    public function getToken(){
        $linkedinUser = Socialite::driver('linkedin')->stateless()->user();
        return $linkedinUser->token;
    }

    public function handleLinkedInCallback()
    {
        $linkedinUser = Socialite::driver('linkedin')->stateless()->user();
        // dd($linkedinUser);
        $accessToken = $linkedinUser->token;




        // Check if the user already exists in the database
        $user = User::where('linkedin_id', $linkedinUser->id)->first();
        if (!$user) {
            // Create a new user
            $user = User::create([
                'name' => $linkedinUser->name,
                'email' => $linkedinUser->email,
                'linkedin_id' => $linkedinUser->id,
                'avatar' => $linkedinUser->avatar,
                'password' => '',
            ]);
        }

        // Log in the user
        Auth::login($user);

        // Redirect the user to the desired page
        return redirect('/dashboard');

    }

    public function getConnections($accessToken){

        $endpoint = 'https://api.linkedin.com/v2/me?projection=(id,firstName,lastName,r_1st_connections_size)';

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ])->get($endpoint);

            $data = $response->json();

            // Extract the necessary data
            $id = $data['id'];
            $firstName = $data['firstName']['localized']['en_US'];
            $lastName = $data['lastName']['localized']['en_US'];
            $connectionCount = $data['r_1st_connections_size'];

            // Display the retrieved information
            echo "ID: $id<br>";
            echo "Name: $firstName $lastName<br>";
            echo "Connection Count: $connectionCount<br>";
        } catch (\Exception $e) {
            // Handle the error case
            echo "Error: Unable to retrieve data from LinkedIn API.";
        }
    }



}
