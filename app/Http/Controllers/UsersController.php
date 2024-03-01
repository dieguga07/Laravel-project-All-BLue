<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function register(Request $request)
    {
       
       
        $user = Users::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
        ]);

        
        return response()->json(['message' => 'Usuario registrado con éxito'], 201);
    }

    public function login(Request $request){

        $request->validate([
            'name' => 'required|string',
        ]);

        $user = Users::where('nombre', $request->name)->first();
        if ($user) {
            return response()->json(['user' => $user->only(['nombre',"email","phone", 'password'])]);
        }
        else {
 
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    }
    
    
    public function deleteByName($name){
    
        $user = Users::where('nombre', $name)->first();
      
        if ($user) {

            $user->delete();
            return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
        }
        else {
             return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    }
    
}