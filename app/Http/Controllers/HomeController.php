<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('inscription');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data['user'] = \App\User::find(Auth::user()->id);
        return view('home', $data);
    }
    public function inscription(Request $request)
    {
        

        $to      = 'inscripciones@preescolarbambydelnorte.com';
        $subject = 'Nueva información de inscripción';
        $message = 'Nombre: '.$request->nombre."\r\n";
        $message = $message. 'Grado: '.$request->grado."\r\n";
        $message = $message. 'Edad: '.$request->edad."\r\n";
        $message = $message. 'Correo: '.$request->correo."\r\n";
        $message = $message. 'Teléfono: '.$request->telefono."\r\n";
        $message = $message. 'Mensaje: '.$request->mensaje."\r\n";

       
        $headers = 'From: inscripciones@preescolarbambydelnorte.com' . "\r\n" .
            
            'X-Mailer: PHP/' . phpversion();

        
        try {
            if(mail($to, $subject, $message, $headers))
            return redirect()->back()->with('result', 'Mensaje enviado satisfactoriamente');
        } catch (\Throwable $th) {
            dd($th);
        }
               
        // 
        
        // return redirect()->back()->with('result', 'Hubo un problema al enviar el mensaje');


       
    }
}
