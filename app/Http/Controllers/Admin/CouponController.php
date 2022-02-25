<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //Coupons
    public function coupons()
    {
        $coupons = Coupon::orderBy('id', 'desc')->get();
        return view('admin.coupon.coupon', compact('coupons'));
    }
    //Add Coupon
    public function add_coupon()
    {
        return view('admin.coupon.add-coupon');
    }
    //Added Coupon
    public function added_coupon(Request $request)
    {
        if ($request->ajax()) {
            $request->all();
            $added_category     = Coupon::create([
                'coupon'        => $request->coupon,
                'status'        => $request->status,
                'discount'      => $request->discount
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Coupon Added Successfully!'
            ]);
        }

        //Success

    }
    //Delete Coupon
    public function delete_coupon(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $coupon_delete = Coupon::where('id', $data['id'])->delete();
            if ($coupon_delete) {
                return response()->json([
                    'status' => 200,
                    'id'     => $data['id'],
                    'message' => 'Coupon Deleted Successfully!'
                ]);
            }
        }
    }
}