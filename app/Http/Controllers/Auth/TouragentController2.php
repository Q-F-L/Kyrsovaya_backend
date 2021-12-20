<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Touragent;

class TouragentController2 extends Controller
{
    public function Register(Request $req){

        $validator = $req->validate([
            'name' => 'required|string|min:4',
            'surname' => 'required|string|min:4',
            'email' => 'required|string|email',
            'country' => 'required|string',
            'rating' => 'required',
            'description' => 'required|string|max:1200',
            "password" => "required|required_with:password_confirm|same:password_confirm",
            "password_confirm" => "required",
        ]);

        if (touragent::where('email', $validator['email'])->exists()) {
            return response()->json([
                'error' => [
                    "message" => "This email exist!",
                ]
            ], 422);
        }
        
        $user = new Touragent;

        $user->name = $req->input("name");
        $user->surname = $req->input("surname");
        $user->email = $req->input("email");
        $user->country = $req->input("country");
        $user->rating = $req->input("rating");
        $user->description = $req->input("description");
        $user->password = bcrypt($req->input("password"));
        
        $user->save();

        return response()->json([
            'message' => "Registration is successful!",
        ]);
    }

    public function SignIn(Request $req) {
    	$validator = $req->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

		$user = Touragent::where('email', $req->email)->first();
		
        if (!$user) 
            return response()->json("This user does not exist!");
		if ($req->password != $user->password)
            return response()->json("The entered data is incorrect!");

       

		return response()->json(
			[
				"message" => "You are logged in!"
			]
	    );
    }

    
}
