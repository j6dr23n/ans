<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuoteRequest;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::latest()->paginate(10);

        return view('admin.quotes.index', compact('quotes'));
    }

    public function create()
    {
        return view('admin.quotes.create');
    }

    public function store(QuoteRequest $request)
    {
        $data = $request->all();
        $data['published'] = 0;
        if ($request->published === "on") {
            $data['published'] = 1;
        }
        $quote = Quote::create($data);
        if ($quote) {
            return back()->with('success', 'Quote Added!!!');
        }
        return back()->with('error', 'Something Wrong!!!');
    }

    public function edit($id)
    {
        $quote = Quote::findOrFail($id);

        return view('admin.quotes.edit', compact('quote'));
    }

    public function update(QuoteRequest $request, $id)
    {
        $data = $request->all();
        $quote = Quote::findOrFail($id);
        $data['published'] = 0;
        if ($request->published === "on") {
            $data['published'] = 1;
        }
        $quote->fill($data)->save();

        return redirect()->route('quotes.index')->with('success', 'Quote edited!!!');
    }
}
