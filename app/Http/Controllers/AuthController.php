<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
      //recibir email y password
      $email = $request->email;
      $password = $request->password;

      //validar email y password -> respuesta en caso no sea válido
      $user = User::where(['email' => $email, 'password' => $password])->first();

      if (!$user) {
        return new JsonResponse(['error' => 'Creedenciales no válidas'], 400); 
      }

      //generar token con JWT
      $token = $this->generateToken($user);
      
      //devolver el token
      return new JsonResponse(['token' => $token]);
    }

    public function logout()
    {

    }

    private function generateToken(User $user)
    {
        $payload = [
            'sub' => $user->id,
            'email' => $user->email,
            'iat' => time(),
            'exp' => time() + 3600, // 1 Hour
        ];

        $token = JWT::encode($payload, config('services.JWT.key'), 'HS256');

        return $token;
    }
}
 