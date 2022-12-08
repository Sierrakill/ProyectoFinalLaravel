<?php

namespace App\Http\Controllers;

use App\Exports\PrimeExport;
use App\Models\Prime;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $primes = Prime::orderBy('id')->paginate(10);
        return view('primes.index',compact('primes'));
    }
    public function inventario()
    {
        //
        $primes = Prime::orderBy('id')->paginate(10);
        return view('inventario.index',compact('primes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idProduct)
    {
        //
        return view('primes.create',compact('idProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required',
            'weight_in_grams'=>'required|min:0',
            'amount'=>'required|numeric',
            'stock_min'=>'required|numeric',
            'stock_max'=>'required|numeric',
            'stock'=>'required|numeric',
            'product_id'=>'required|numeric',
            'cover'=>'required|image|mimes:png,jpeg,svg,jpg|max:2048',
        ]);
        $product = $request->all();
        if(
            $imagen=$request->file('cover')
            ){
            $ruta = 'img/covers/';
            $cover =  date('YmdHis').".".$imagen->guessExtension();
            $imagen->move($ruta,$cover);
            $product['cover']="$cover";
        }
        Prime::create($product);
        return redirect()->route('products.show',$product['product_id'])->with('success', 'Materia prima creada con exito');;
        // return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prime  $prime
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prime = Prime::find($id);

        return view('primes.show',compact('prime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prime  $prime
     * @return \Illuminate\Http\Response
     */
    public function edit(Prime $prime)
    {
        return view('primes.edit',compact('prime'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prime  $prime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $prime = Prime::find($id);

        $request->validate([
            'description'=>'required',
            'weight_in_grams'=>'required|min:0',
            'amount'=>'required|numeric',
            'stock_min'=>'required|numeric',
            'stock_max'=>'required|numeric',
            'stock'=>'required|numeric',
            'cover'=>'image|mimes:png,jpeg,svg,jpg|max:2048',
        ]);
        $product = $request->all();
        if(
            $imagen=$request->file('cover')
            ){
            $ruta = 'img/covers/';
            $cover =  date('YmdHis').".".$imagen->guessExtension();
            $imagen->move($ruta,$cover);
            $product['cover']="$cover";
        }
        $prime->update($product);
        return redirect()->route('primes.show',$prime->id)->with('success', 'Materia prima actualizada con exito');
        // return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prime  $prime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prime $prime)
    {
        $producto = $prime->product_id;
        $prime->delete();
        return redirect()->route('products.show',$producto)->with('success', 'Materia prima eliminada con exito');
    }

    public function importar(Request $entrada){
        if($entrada->hasFile('archivoenviado')){
            $path = $entrada->File('archivoenviado')->getRealPath();
            $datos = Excel::load($path,function($reader){
            })->get();

            if(!empty($datos) && $datos->count()) {
                $datos = $datos->toArray();
                for ($i=0; $i < count($datos); $i++) {
                    $datosImportar[] = $datos[$i];
                }
            }

            Prime::insert($datosImportar);
            return back();
        }
    }
    public function exportar(){
        return Excel::download(new PrimeExport, 'materiaPrima.xlsx');
        // ->with('success', 'Inventario exportado con exito');
    }
}
