<?php

namespace App\Http\Controllers\Api;

use App\Models\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function __invoke(Request $request)
    {
        // Set validation
        $validator = Validator::make($request->all(), rules: [
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required|min:5|confirmed',
            'level_id' => 'required',
        ]);

        // If validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], status: 422);
        }

        // Create user
        $user = UserModel::create(attributes: [
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt(value: $request->password),
            'level_id' => $request->level_id,
        ]);

        // Return response JSON if user is created
        if ($user) {
            return response()->json(data: [
                'success' => true,
                'user' => $user,
            ], status: 201);
        }

        // Return JSON if process insert failed
        return response()->json(data: [
            'success' => false,
        ], status: 409);
    }
}