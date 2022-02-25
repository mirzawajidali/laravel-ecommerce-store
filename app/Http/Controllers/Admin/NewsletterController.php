<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    //Coupons
    public function newsletters()
    {
        $newsletters = Newsletter::orderBy('id', 'desc')->get();
        return view('admin.newsletter.newsletters', compact('newsletters'));
    }
    //Delete Coupon
    public function delete_newsletter(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $newsletter_delete = Newsletter::where('id', $data['id'])->delete();
            if ($newsletter_delete) {
                return response()->json([
                    'status' => 200,
                    'id'     => $data['id'],
                    'message' => 'Newsletter Deleted Successfully!'
                ]);
            }
        }
    }
}