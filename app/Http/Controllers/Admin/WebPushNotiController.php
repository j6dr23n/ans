<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Kutia\Larafirebase\Facades\Larafirebase;

class WebPushNotiController extends Controller
{
    public function index()
    {
        return view('admin.pages.push-notifications');
    }

    public function updateToken(Request $request)
    {
        try {
            $request->user()->update(['fcm_token'=>$request->token]);
            return response()->json([
                'success'=>true
            ]);
        } catch(\Exception $e) {
            report($e);
            Log::alert($e->getMessage());
            return response()->json([
                'success'=>false
            ], 500);
        }
    }

    public function notification(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'message'=>'required'
        ]);
        $data = $request->all();

        $statusCode = webPushNoti($data['title'],$data['message'],null);
        
        if($statusCode === 200){
            return redirect()->back()->with('success', 'Notification Sent Successfully!!');
        }

        return redirect()->back()->with('error', 'Something goes wrong while sending notification.');
    }
}
