<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\User;
use Exception;

class AuthService
{
    public function login($request)
    {
        try {

            $credentials =  auth('api')->attempt($request);

            if ($credentials) {
                $token = $this->respondWithToken($credentials);
            } else {
                throw new Exception('Not Autorized', 401);
            }

            return response()->json(['token' => $token], 200);
        } catch (\Exception $ex) {

            return response()->json(['error' => true, 'message' => $ex->getMessage()], 401);
        }
    }

    public function me()
    {
        try {
            $user['nome'] = auth('api')->user()->nome;
            $user['email'] = auth('api')->user()->email;

            return response()->json(['usuario' => $user], 200);
        } catch (\Exception $ex) {

            return response()->json(['error' => true, 'message' => $ex->getMessage()], 401);
        }
    }

    public function logout()
    {
        try {
            auth('api')->logout(true);

            return response()->json(['message' => 'Desconectado com sucesso'], 200);
        } catch (\Exception $ex) {

            return response()->json(['error' => true, 'message' => $ex->getMessage()], 401);
        }
    }

    public function refresh()
    {
        try {
            $refresh = $this->respondWithToken(auth('api')->refresh());

            return response()->json(['success' => $refresh], 200);
        } catch (\Exception $ex) {

            return response()->json(['error' => true, 'message' => $ex->getMessage()], 401);
        }
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'usesr' => auth('api')->user(),
        ]);
    }
}
