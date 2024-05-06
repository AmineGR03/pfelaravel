<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterApiController extends Controller
{
    public function register(Request $request) 

    {

        $validator = Validator::make($request->all(),[

            'name'     => 'required',

            'email'    => 'required',

            'password' => 'required'

        ]);

        if($validator->fails()) {

            return response()->json([

                'success' => false,

                'message' => $validator->errors()->first()

            ]);

        }

        $user = User::create([

            'name'     => $request->name,

            'email'    => $request->email,

            'password' => Hash::make($request->password),

        ]);

       

        return response()->json([

            'success' => true,

            'message' => 'User register successfully.'

        ]);

    }

}
