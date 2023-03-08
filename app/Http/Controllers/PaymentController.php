<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Page;
use App\Models\Payment;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $id = Crypt::decryptString($request->page);
        } catch (DecryptException $e) {
            return redirect(route('index'))->with('error', 'Key Invalid!!!');
        }

        $page =  Page::with('setting')->findOrFail($id);
        if ($id && $page) {
            return view('pages.payments', compact('page'));
        }

        return back()->with('error', 'Something Wrong!!!');
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
    public function store(PaymentRequest $request)
    {
        $data = $request->validated();
        $page = Page::findOrFail($request->page_id);
        $data['slip'] = $request->file('slip')->store('slips/'.$page->id, 'public');
        $data['user_id'] = auth()->id();

        $payment = Payment::create($data);

        if ($payment) {
            return back()->with('success', 'Your slip submitted!!!');
        }
        return back()->with('error', 'Something Wrong!!!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
