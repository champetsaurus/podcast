<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \App\Models\Usuario;
use \App\Models\Capsula;
use \App\Models\Episodio;
use \App\Models\Psicologo;
use \App\Models\Extra;

class AdminController extends Controller
{
  public function index(Request $request)
  {
    // return view('layouts.app2');
    return view('admin.user.login');

  }

  public function userIndex(Request $request)
  {
    $usuario=Usuario::all();
    // dd($usuario);
    return view('admin.user.index',compact('usuario'));
  }

  public function userAdd(Request $request)
  {
    return view('admin.user.create');
  }

  public function userPost(Request $request){
    // dd($request);
    $nombre=$request->nombre;
    $email=$request->email;
    $pass=$request->pass;
    $fecha=date("Y-m-d H:i:s");
    // dd($fecha);
    $usuario=Usuario::where('email',$email)->first();
    // dd($usuario);
    if($usuario==NULL){
      $usuario=Usuario::create([
        'name'=>$nombre,
        'email'=>$email,
        'password'=>Hash::make($pass),
        'tipo'=>'admin',
        'created_at'=>$fecha
      ]);
    }
    return redirect('/admin/usuarios');
  }

  public function loginPost(Request $request){
    $email=$request->email;
    $password=$request->password;
    $usuario=Usuario::where('email',$email)->first();
    $value = $request->session()->get('userAdmin');
    // dd($value);
    if($usuario!=NULL){
      $comparacion=Hash::check($password, $usuario->password);
      if($comparacion==true){
        $request->session()->put('userAdmin', $usuario->id);
        return redirect('/admin/usuarios');
      }
    }
    return back();
  }

  public function sesionClose(Request $request){
    $request->session()->forget('userAdmin');
    return back();
    // dd($request);
  }

  public function mediaIndex(Request $request){
    $capsulas=Capsula::where('activo',1)->get();
    return view('admin.media.index',compact('capsulas'));
  }

  public function addMedia(Request $request){
    return view('admin.media.add');
  }

  public function mediaPost(Request $request){
    $titulo=$request->titulo;
    $descripcion=$request->descripcion;
    $usuario = $request->session()->get('userAdmin');
    $tipo=$request->tipo;
    // dd($request);
    $capsula=Capsula::create([
      'titulo'=>$titulo,
      'descripcion'=>$descripcion,
      'tipo'=>$tipo,
      'add_user'=>$usuario
    ]);
    if( $request->file('foto') ){

      $file = $request->file('foto');
      $strExtension = $file->getClientOriginalExtension();

      $nombreFoto =  $capsula->id."_".md5($capsula->id).".".$strExtension;
      if( $request->getClientIp() == '127.0.0.1' ){
          $destino = public_path("image");
      }
      else{
          $destino = public_path("../../public_html/image");
      }
      //envia a la ubicacion destino
      $request->foto->move($destino,$nombreFoto);

      $capsula->imagen = $nombreFoto;
      $capsula->save();

    }
    return redirect('/admin/media');
  }

  public function editMedia(Request $request, $id){
    $capsula=Capsula::where('id',$id)->first();
    return view('admin.media.edit',compact('capsula'));
  }

  public function mediaUpdate(Request $request,$id){
    $capsula=Capsula::where('id',$id)->first();
    $capsula->update([
      'tipo'=>$request->tipo,
      'titulo'=>$request->titulo,
      'descripcion'=>$request->descripcion
    ]);
    if( $request->file('foto') ){

      $file = $request->file('foto');
      $strExtension = $file->getClientOriginalExtension();

      $nombreFoto =  $capsula->id."_".md5($capsula->id).".".$strExtension;
      if( $request->getClientIp() == '127.0.0.1' ){
          $destino = public_path("image");
      }
      else{
          $destino = public_path("../../public_html/image");
      }
      //envia a la ubicacion destino
      $request->foto->move($destino,$nombreFoto);

      $capsula->imagen = $nombreFoto;
      $capsula->save();

    }

    return back();
  }

  public function mediaDelete(Request $request,$id){
    $capsula=Capsula::where('id',$id)->first();
    $capsula->update([
      'activo'=>0
    ]);
    return back();
  }

  public function episodiosIndex(Request $request,$id){
    $capsula=Capsula::where('id',$id)->first();
    $episodios=Episodio::where('capsula_id',$id)->where('activo','1')->get();
    // dd($episodios);
    return view('admin.media.episodio.index',compact('capsula','episodios'));
  }

  public function addEpisodio(Request $request, $id){
    $capsula=Capsula::where('id',$id)->first();
    $psicologos=Psicologo::where('activo',1)->get();
    return view('admin.media.episodio.add', compact('capsula','psicologos'));
  }

  public function episodioPost(Request $request,$id){
    $capsulaID=$id;
    $psicologoID=($request->psicologo!="")?$request->psicologo:NULL;
    $titulo=$request->titulo;
    $descripcion=$request->descripcion;
    $link=$request->link;
    $match='';
    if(strlen($link) > 11)
    {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match))
        {
            // return $match[1];
        }
    }
    $usuario = $request->session()->get('userAdmin');
    // dd($link);
    $episodio=Episodio::create([
      'capsula_id'=>$capsulaID,
      'psicologo_id'=>$psicologoID,
      'titulo'=>$titulo,
      'descripcion'=>$descripcion,
      'link'=>$match[1],
      'add_user'=>$usuario
    ]);

    if( $request->file('foto') ){

      $file = $request->file('foto');
      $strExtension = $file->getClientOriginalExtension();

      $nombreFoto =  $episodio->id."_".md5($episodio->id).".".$strExtension;
      if( $request->getClientIp() == '127.0.0.1' ){
          $destino = public_path("image");
      }
      else{
          $destino = public_path("../../public_html/image");
      }
      //envia a la ubicacion destino
      $request->foto->move($destino,$nombreFoto);

      $episodio->imagen = $nombreFoto;
      $episodio->save();

    }
    return redirect('/admin/episodio/'.$id);
    // dd($request);
  }

  public function editEpisodio(Request $request,$id)
  {
    $episodio=Episodio::where('id',$id)->first();
    $capsula=Capsula::where('id',$episodio->capsula_id)->first();
    $psicologoSelect=Psicologo::where('id',$episodio->psicologo_id)->first();
    $psicologos=Psicologo::where('activo',1)->get();
    return view('admin.media.episodio.edit',compact('episodio','capsula','psicologoSelect','psicologos'));
  }

  public function episodioUpdate(Request $request,$id)
  {
    // dd($request);
    $episodio=Episodio::where('id',$id)->first();
    $psicologo=($request->psicologo!='')?$request->psicologo:NULL;
    $titulo=$request->titulo;
    $descripcion=$request->descripcion;
    // $link=isset($request->link)?html_entity_decode($request->link):'';
    $link=$request->link;
    $match='';
    if(strlen($link) > 11)
    {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match))
        {
            // return $match[1];
        }
    }

    $episodio->update([
      'psicologo_id'=>$psicologo,
      'titulo'=>$titulo,
      'descripcion'=>$descripcion,
      'link'=>$match[1],
    ]);
    if( $request->file('foto') ){

      $file = $request->file('foto');
      $strExtension = $file->getClientOriginalExtension();

      $nombreFoto =  $episodio->id."_".md5($episodio->id).".".$strExtension;
      if( $request->getClientIp() == '127.0.0.1' ){
          $destino = public_path("image");
      }
      else{
          $destino = public_path("../../public_html/image");
      }
      //envia a la ubicacion destino
      $request->foto->move($destino,$nombreFoto);

      $episodio->imagen = $nombreFoto;
      $episodio->save();

    }
    return back();
  }

  public function episodioDelete(Request $request, $id){
    $episodio=Episodio::where('id',$id)->first();
    $episodio->update([
      'activo'=>0
    ]);
    return back();
  }

  public function indexPsicologo(Request $request){
    $psicologos=Psicologo::where('activo',1)->get();
    return view('admin.psicologo.index',compact('psicologos'));
  }

  public function addPsicologo(Request $request){
    return view('admin.psicologo.add');
  }

  public function psicologoPost(Request $request){
    $nombre=$request->nombre;
    $descripcion=$request->descripcion;
    $telefono=$request->telefono;
    $direccion=$request->direccion;
    $email=$request->email;
    $link=$request->link;
    $usuario = $request->session()->get('userAdmin');

    $psicologo=Psicologo::create([
      'nombre'=>$nombre,
      'descripcion'=>$descripcion,
      'telefono'=>$telefono,
      'direccion'=>$direccion,
      'email'=>$email,
      'link'=>$link,
      'add_user'=>$usuario
    ]);

    if( $request->file('foto') ){

      $file = $request->file('foto');
      $strExtension = $file->getClientOriginalExtension();

      $nombreFoto =  $psicologo->id."_".md5($psicologo->id).".".$strExtension;
      if( $request->getClientIp() == '127.0.0.1' ){
          $destino = public_path("image");
      }
      else{
          $destino = public_path("../../public_html/image");
      }
      //envia a la ubicacion destino
      $request->foto->move($destino,$nombreFoto);

      $psicologo->foto = $nombreFoto;
      $psicologo->save();

    }
    return redirect('/admin/psicologo');
    // dd($request);
  }

  public function editPsicologo(Request $request,$id)
  {
    $psicologo=Psicologo::where('id',$id)->first();
    return view('admin.psicologo.edit',compact('psicologo'));
  }

  public function psicologoUpdate(Request $request,$id)
  {
    $nombre=$request->nombre;
    $descripcion=$request->descripcion;
    $telefono=$request->telefono;
    $direccion=$request->direccion;
    $email=$request->email;
    $link=$request->link;
    $psicologo=Psicologo::where('id',$id)->first();
    $psicologo->update([
      'nombre'=>$nombre,
      'descripcion'=>$descripcion,
      'telefono'=>$telefono,
      'direccion'=>$direccion,
      'email'=>$email,
      'link'=>$link,
    ]);

    if( $request->file('foto') ){

      $file = $request->file('foto');
      $strExtension = $file->getClientOriginalExtension();

      $nombreFoto =  $psicologo->id."_".md5($psicologo->id).".".$strExtension;
      if( $request->getClientIp() == '127.0.0.1' ){
          $destino = public_path("image");
      }
      else{
          $destino = public_path("../../public_html/image");
      }
      //envia a la ubicacion destino
      $request->foto->move($destino,$nombreFoto);

      $psicologo->foto = $nombreFoto;
      $psicologo->save();

    }
    return back();
    // dd($request);
  }

  public function psicologoDelete(Request $request,$id)
  {
    $psicologo=Psicologo::where('id',$id)->first();
    $psicologo->update([
      'activo'=>0
    ]);
    return back();
  }

  public function indexExtra(Request $request){
    $extras=Extra::where('activo',1)->get();
    return view('admin.extra.index',compact('extras'));
  }

  public function addExtra(Request $request){
    return view('admin.extra.add');
  }

  public function extraPost(Request $request){
    $titulo=$request->nombre;
    $descripcion=$request->descripcion;
    $link=$request->link;
    $usuario = $request->session()->get('userAdmin');
    $extra=Extra::create([
      'titulo'=>$titulo,
      'descripcion'=>$descripcion,
      'link'=>$link,
      'add_user'=>$usuario
    ]);

    if( $request->file('foto') ){

      $file = $request->file('foto');
      $strExtension = $file->getClientOriginalExtension();

      $nombreFoto =  $extra->id."_".md5($extra->id).".".$strExtension;
      if( $request->getClientIp() == '127.0.0.1' ){
          $destino = public_path("image");
      }
      else{
          $destino = public_path("../../public_html/image");
      }
      //envia a la ubicacion destino
      $request->foto->move($destino,$nombreFoto);

      $extra->imagen = $nombreFoto;
      $extra->save();

    }
    return redirect('/admin/extra');
  }

  public function editExtra(Request $request,$id){
    $extra=Extra::where('id',$id)->first();
    return view('admin.extra.edit',compact('extra'));
  }

  public function extraUpdate(Request $request,$id){
    $extra=Extra::where('id',$id)->first();
    $titulo=$request->nombre;
    $descripcion=$request->descripcion;
    $link=$request->link;
    $extra->update([
      'titulo'=>$titulo,
      'descripcion'=>$descripcion,
      'link'=>$link,
    ]);

    if( $request->file('foto') ){

      $file = $request->file('foto');
      $strExtension = $file->getClientOriginalExtension();

      $nombreFoto =  $extra->id."_".md5($extra->id).".".$strExtension;
      if( $request->getClientIp() == '127.0.0.1' ){
          $destino = public_path("image");
      }
      else{
          $destino = public_path("../../public_html/image");
      }
      //envia a la ubicacion destino
      $request->foto->move($destino,$nombreFoto);

      $extra->imagen = $nombreFoto;
      $extra->save();

    }

    return back();
  }

  public function extraDelete(Request $request,$id){
    $extra=Extra::where('id',$id)->first();
    $extra->update([
      'activo'=>0
    ]);
    return back();
  }
}
