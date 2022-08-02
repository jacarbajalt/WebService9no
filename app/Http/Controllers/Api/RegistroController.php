<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
//Usar el Hash para encriptar la contraseña
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller {
    //Registro por medio de una peticion post con nombre, apellido paterno, apellido materno, email, username, password,, password confirmation  ,fecha de nacimiento, edad y curp
    public function registro(Request $request) {
        $this->validateRegistro($request);
        $user = new User();
        $user->nombre = $request->nombre;
        $user->apPaterno = $request->apPaterno;
        $user->apMaterno = $request->apMaterno;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->fechaNacimiento = $request->fechaNacimiento;
        $user->edad = $request->edad;
        $user->curp = $request->curp;
        //$user->rol = $request->rol;
        //Definir rol de usuario como paciente
        $user->rol = 'Paciente';
        $user->save();
        return response()->json(['message' => 'Usuario registrado correctamente'], 200);
    }
    //Validar los datos de registro
    public function validateRegistro(Request $request) {
        return $request->validate([
            'nombre' => 'required',
            'apPaterno' => 'required',
            'apMaterno' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required|confirmed',
            'fechaNacimiento' => 'required',
            'edad' => 'required',
            'curp' => 'required',
            //'rol' => 'required',
        ]);
    }
}