<?php

namespace App\Http\Controllers;

use App\Models\CouponCode;
use App\Http\Requests\StoreCouponCodeRequest;
use App\Http\Requests\UpdateCouponCodeRequest;

class CouponCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCouponCodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponCodeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CouponCode  $couponCode
     * @return \Illuminate\Http\Response
     */
    public function show(CouponCode $couponCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CouponCode  $couponCode
     * @return \Illuminate\Http\Response
     */
    public function edit(CouponCode $couponCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCouponCodeRequest  $request
     * @param  \App\Models\CouponCode  $couponCode
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponCodeRequest $request, CouponCode $couponCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CouponCode  $couponCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(CouponCode $couponCode)
    {
        //
    }
}
