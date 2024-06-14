<?php

namespace App\Http\Controllers;

class FrogramingController extends Controller
{
    //Trae los datos del usuario en caso de ser encontrado
    public function Loguear(Request $request)
    {
        return Credenciales::where('correo',$request->correo)->where('contrasena',$request->contrasenaI)->get();
    }

    //Actualizar última fecha de sesión
    public function UltimaSesion($usuarioid)
    {
        return DB::select('UPDATE credenciales SET fecha_lopgin = NOW() WHERE id = ' .$usuarioid.')');
    }

    //Llama al procedimiento para eliminar usuario
    public function EliminarUsuario($usuarioid)
    {
        return DB::select('CALL pa_delete_usuario('.$usuarioid.')');
    }

    //Llama al procedimiento y envía los parámetros - Insert en las tablas usuario y credenciales
    public function Registro(Request $request)
    {
        return DB::select('CALL pa_add_usuario('.$request->nombre. ',' .$request->apellido.',' .$request->correo.','
                                                .$request->contrasena.',' .$request->grupo.','
                                                .$request->cedula.',' .$request->foto.','
                                                .$request->carrera.',' .$request->facultad.')');
    }

    //Inner join de la tabla usuario y credenciales
    public function ObtenerPerfil($usuarioid)
    {
        return DB::select('SELECT usuario.nombre, usuario.apellido, credenciales.correo, credenciales.contrasena
                            FROM usuario
                            INNER JOIN credenciales
                            ON usuario.id = credenciales.usuario_id
                            WHERE '.$request->id.' = usuario.id)');
    }

    //Llama al procedimiento y envía los parámetros - Update en las tablas usuario y credenciales
    public function GuardarPerfil(Request $request)
    {
        return DB::select('CALL pa_update_usuario('.$request->usuario_id.','.$request->nombre.',' .$request->apellido.','
                                                .$request->correo.',' .$request->contrasena.')');
    }

    //Llamar toda la tabla leccion
    public function Leccion($temaid)
    {
        return Leccion::all();
    }

    //Llamar toda la tabla leccion_cuento
    public function LeccionCuento($temaid)
    {
        return LeccionCuento::all();
    }

    //Llama las temáticas existentes
    public function SeleccionTema()
    {
        return Tematica::all();
    }

    //Llama al procedimiento y envía tema id - Select tabla preguntas y respuestas
    public function ObtenerPreguntas($temaid)
    {
        return DB::select('CALL pa_obtener_preguntas_respuesta('.$temaid.')');
    }

    //Llama al procedimiento t envía tema id - Select tabla pregtunas y respuestas
    public function obtenerPareo($temaid)
    {
        return DB::select('CALL pa_obtener_preguntas_pareo('.$temaid.')');
    }

    //
    public function GuardarPartida(Request $request)
    {
        return DB::select('INSERT INTO respuesta_usuario 
                            (pregunta_id, usuario_id, puntos_obtenidos, fecha, hora)
                            VALUES('.$request->pregunta_id. ','
                            .$request->usuario_id. ','
                            .$request->puntos_obtenidos. ', CURDATE(), curtime()');
    }

    //Llama procedimiento para pedir los puntos - Select de la tabla respuesta_usuario
    public function ObtenerRanking($temaid)
    {
        return DB::select('CALL pa_obtener_ranking('.$temaid.')');
    }
}
