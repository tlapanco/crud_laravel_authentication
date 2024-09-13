<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\AdminFotoRequest;
use App\Http\Requests\Admin\AdminPasswordRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function updatepassword(AdminPasswordRequest $request, $id){
      try {
         $this->validate($request, [          
          'password' => 'confirmed'
         ]);
         $admin = Admin::find($id);
         $admin->password = bcrypt($request->password);
         $admin->save();

         return redirect()->route('prueba.index')->with('message', 'Contraseña Actualizada con exito');
      } catch (\Throwable $th) {
          return redirect()->route('prueba.index')->with('error', 'Error al actualizar la contraseña');
      }
   }

   public function updatefoto(AdminFotoRequest $request, $id){
      try {
            $this->validate($request,[
              'foto' => 'image|mimes: gif,jpeg, jpg, png, webp'
            ]);
      } catch (\Throwable $th) {
        return redirect()->route('prueba.index')->with('error', 'Formato no compatible, debe ser: jpg, png, gif, webp');
      }
      try {
            $admin = Admin::find($id);
            if (Storage::disk('local')->exists("$admin->foto")) {
               Storage::disk('local')->delete("$admin->foto");
            }
            $admin->foto = Storage::putFile('img', $request->file('foto'));
            $admin->save();
            return redirect()->route('prueba.index')->with('message', 'fotografia cambiada con exito');
      } catch (\Throwable $th) {
            return redirect()->route('prueba.index')->with('error', 'No se pudo cambiar la fotografia');
        }

   }
   public function perfil(){
      $usuario = Admin::find(Auth::id());
      return view('usuarios.perfil', compact('usuario'));
   }
}