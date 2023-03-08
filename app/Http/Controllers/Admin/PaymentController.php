<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\VipUser;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::with('page', 'user')->where('page_id', auth()->user()->page_id)->paginate(10);

        return view('admin.payments.index', compact('payments'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        return view('admin.payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $data = $request->validate([
            'approve' => 'nullable|string',
            'expiry_at' => 'nullable|date'
        ]);
        $data['page_id'] = $payment->page_id;
        $data['user_id'] = $payment->user_id;

        if ($request->approve === 'on' && $request->expiry_at) {
            $vip = VipUser::create($data);
            if ($vip) {
                $payment = Payment::findOrFail($id);
                $payment->update([
                    'approve' => 1
                ]);
                return redirect(route('akm.payments.index'))->with('success', 'Approved!!!');
            }
        }

        return redirect(route('akm.payments.index'))->with('error', 'Something Wrong!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $status = $payment->delete();

        if ($status) {
            return back()->with('success', 'Payment Deleted!!!');
        }
        return back()->with('error', 'Something Wrong!!');
    }
}
