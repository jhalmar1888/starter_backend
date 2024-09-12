<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LoginTokenRequest;


class LoginController extends Controller
{
    //    
    public function login(LoginRequest $request)
    {
        $item = Persona::where('email', $request->email)->first();
        if (Hash::check($request->password, $item->password)) {
            $token=$item->createToken('Laravel Personal Access Client')->accessToken;
            $result = array(
                'success' => true,
                'data' => $item,
                'token' => $token,
                'msg' => trans('messages.listed')
            );
            return $result;
        } else {
            return response()->json(['error' => 'Unauthenticated.'], 401);
            /*$result = array(
                'success' => false,
                'data' => null,
                'msg' => trans('messages.listed')
            );
            return $result;*/
        }
    }

    public function loginToken365(LoginTokenRequest $request)
    {
        $item = Persona::where('email', $request->email)->first();
        if ($request->token == $item->Office365Id) {
            $token=$item->createToken('Laravel Personal Access Client')->accessToken;
            $result = array(
                'success' => true,
                'data' => $item,
                'token' => $token,
                'msg' => trans('messages.listed')
            );
            return $result;
        } else {
            if ($item->Office365Id == null || $item->Office365Id == "") {
                $item->Office365Id = $request->token;
                $token=$item->createToken('Laravel Personal Access Client')->accessToken;
                $item->save();
                $result = array(
                    'success' => true,
                    'data' => $item,
                    'token' => $token,
                    'msg' => trans('messages.listed')
                );
                return $result;
            } else {
                $result = array(
                    'success' => false,
                    'data' => null,
                    'msg' => trans('messages.listed')
                );
                return $result;
            }
        }
    }
}
