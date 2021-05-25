<?php

namespace App\Http\Controllers;

use App\Models\inventarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;

class InventariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['inventarios']=Inventarios::paginate(4);
        return view('inventarios.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'modelo'=>'required|string|max:100',
            'marca'=>'required|string|max:100',
            'serial'=>'required|string|max:100',
            'estado'=>'required|string|max:100',
            'caracteristicas'=>'required|string|max:100',
            'precio_compra'=>'required|string|max:100',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',

        ];
        $Mensaje=["required"=>'El :attributo es requerido'];
        $this->validate($request,$campos,$Mensaje);

       //$datosInventario = request()->all();
       $datosInventario=request()->except('_token');
       if($request->hasFile('foto')){
           $datosInventario['foto']=$request->file('foto')->store('upload','public');
       }
       Inventarios::insert($datosInventario);
        //return response()->json($datosInventario);
        return redirect('inventarios')->with('Mensaje','Dispositivo agregado con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function show(inventarios $inventarios)
    {
       $reportes = Inventarios::get();
        $pdf = PDF::loadView('inventarios.pdf',compact('reportes'));

        return $pdf->stream();
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventario=Inventarios::findOrFail($id);

        return view('inventarios.edit',compact('inventario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'modelo'=>'required|string|max:100',
            'marca'=>'required|string|max:100',
            'serial'=>'required|string|max:100',
            'estado'=>'required|string|max:100',
            'caracteristicas'=>'required|string|max:100',
            'precio_compra'=>'required|string|max:100',        

        ];
          if($request->hasFile('foto')){
              $campos+=['foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
          }
        $Mensaje=["required"=>'El :attributo es requerido'];
        $this->validate($request,$campos,$Mensaje);
        $datosInventario=request()->except(['_token','_method']);
        if($request->hasFile('foto')){
            $inventario=Inventarios::findOrFail($id);    
            Storage::delete('public/'.$inventario->foto);        
            $datosInventario['foto']=$request->file('foto')->store('upload','public');
        }
        Inventarios::where('id','=',$id)->update($datosInventario);
        $inventario=Inventarios::findOrFail($id);

      // return view('inventarios.edit',compact('inventario'));
     return  redirect('inventarios')->with('Mensaje','Dispositivo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inventarios  $inventarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventario=Inventarios::findOrFail($id);    
        if(Storage::delete('public/'.$inventario->foto)){
            Inventarios::destroy($id); 
        };   
       
       //return redirect('inventarios');
       return  redirect('inventarios')->with('Mensaje','Dispositivo Eliminado');
    }
}
