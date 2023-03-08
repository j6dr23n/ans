<?php

namespace App\Repositories\Admin;

use App\Models\Channel;

class ChannelRepository implements ChannelRepositoryInterface
{
    public function index()
    {
        $channels = Channel::paginate(10);

        return view('admin.channels.index',compact('channels'));
    }

    public function create()
    {
        return view('admin.channels.create');
    }

    public function store($request)
    {   
        $data = $request->all();
        Channel::create($data);

        return redirect(route('channels.index'))->with('success','Channel Created!!!');
    }

    public function edit($channel)
    {
        return view('admin.channels.edit',compact('channel'));
    }

    public function update($request,$channel)
    {
        $data = $request->all();

        $channel->fill($data)->save();

        return redirect(route('channels.index'))->with('success','Channel Updated!!!');
    }

    public function destroy($channel)
    {
        $channel->delete();
        
        return redirect(route('channels.index'))->with('success','Channel Deleted!!1');
    }
}