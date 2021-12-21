<?php

namespace App\Http\Controllers;

use App\Models\Mobile\Lokasim;
use App\Models\Mobile\Mitra;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\DB;

class MitraController extends Controller
{
    public function index(Request $request)
    {
        if (!Mitra::checkToken($request)) {
            return response()->json([
                'message' => 'Token is required'
            ], 422);
        }

        $user = JWTAuth::parseToken()->authenticate();
        $isProfileUpdated = false;
        if ($user->isPicUpdated == 1 && $user->isEmailUpdated) {
            $isProfileUpdated = true;
        }
        $user->isProfileUpdated = $isProfileUpdated;

        return $user;
    }

    public function store(Request $request)
    {
        $plainPassword = $request->password;
        $password = bcrypt($request->password);
        $request->request->add(['password' => $password]);
        DB::table('users')->insert([
            'username' => $request->username,
            'password' => $password,
            'role' => 'customer',
        ]);
        Mitra::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->username,
            'tlpn' => $request->tlpn,
            'totalorderan' => '0',
        ]);
        $idmitra = Mitra::select('id')->where('nik',$request->nik)->first();
        Lokasim::created([
            'mitras_id' => $idmitra->id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => 'online',
        ]);
        $request->request->add(['password' => $plainPassword]);
        return $this->login($request);
    }

    public function update(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak di temukan'
            ]);
        }

        unset($request['token']);

        Mitra::where('id', $user->id)->update($request);
        $user =  Mitra::find($user->id);

        return response()->json([
            'success' => true,
            'message' => 'Update successfully!',
            'user' => $user
        ]);
    }

    public function login(Request $request)
    {
        $input = $request->only('username', 'password');
        $jwt_token = null;
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }
        $user = Auth::user();
        $data = Mitra::all()->where('email', $user->username);

        return response()->json([
            'success' => true,
            'token' => $jwt_token,
            'user' => $user,
            'data' => $data
        ], 200);
    }

    public function logout(Request $request)
    {
        if (!User::checkToken($request)) {
            return response()->json([
                'message' => 'Token is required',
                'success' => false,
            ], 422);
        }

        try {
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                'success' => true,
                'message' => 'Logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Maaf, tidak bisa logged out'
            ], 500);
        }
    }

    public function destroy()
    {
        //
    }
}
