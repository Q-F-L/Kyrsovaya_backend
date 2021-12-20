<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function register(Request $req ){
        $validator = Validator::make($req->all(), [
            'email' => 'required|email|unique:users,email',
            'login' => 'required|min:4|max:16|unique:users,login',
            'password' => 'required|min:6|max:20',
        ]);

        if($validator->failed()){
            return response()->json([
                'error' => [
                    "code" => 422,
                    "message" => "Validation error",
                    "errors" => $validator->errors(),
                ]
            ], 422);
        }


        $user = new Users();
        $user->email = $req->input('email');
        $user->login = $req->input('login');
        $user->password = bcrypt($req->input("password"));
        $user->remember_token = Str::random(30);
        $user->save();

        return response()->json([
            'message' => "Успешная регистриация"
        ]);
    }

    public function logIn(Request $req) {
    	$validator = Validator::make($req->all(), [
    		'login' => 'required|min:4|max:16',
    		'password' => 'required|min:6|max:20',
    	]);
    	if ($validator->fails()) {
    		return response()->json([
    			'error' => [
    				"code" => 422,
    				"message" => "Validation error",
    				"errors" => $validator->errors(),
    			]
    		], 422);
    	}  

		$user = Users::where("login", $req->login)->first();
		
        if (!$user) 
            return response()->json("This user does not exist!");
		if ($req->password != $user->password)
            return response()->json("The entered data is incorrect!");

        $token = Str::random(60);

        $cookie = cookie('jwt', $token, 60);

		return response()->json(
			[
				"message" => $token
			]
		)->withCookie($cookie);
    }

    public function logout(){
        // $cookie = Cookie->forget('jwt');
    }
}
