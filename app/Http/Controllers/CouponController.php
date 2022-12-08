<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coupons = Coupon::orderBy('id')->paginate(12);
        return view('coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('coupons.create');
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
            'name'=>'required',
            'code'=>'required|min:5',
            'max_uses'=>'required|min:1|numeric',
            'min_amount'=>'required|min:0|numeric',
            'discount'=>'required|min:0|max:100|numeric',
        ]);
        $coupon = $request->all();

        Coupon::create($coupon);
        return redirect()->route('coupons.index')->with('success', 'Cupón creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $coupon = Coupon::find($id);

        return view('coupons.show',compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('coupons.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'count_uses'=>'',
        ]);
        $cupon=Coupon::find($id);

        $coupon = $request->all();

        $cupon->update($coupon);
        return redirect()->route('coupons.index')->with('success', 'Cupón actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {

        $coupon->delete();
        return redirect()->route('coupons.index')->with('success', 'Cupón creado con exito');
    }
}
