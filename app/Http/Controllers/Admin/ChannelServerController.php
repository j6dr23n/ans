<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChannelServerRequest;
use App\Models\Channel;
use App\Models\ChannelServer;

class ChannelServerController extends Controller
{
    public function index($id)
    {   
        $channel = Channel::where('id',$id)->first();
        $servers = $channel->servers;

        return view('admin.channels.servers.index',compact('servers','channel'));
    }

    public function create(Channel $channel)
    {
        return view('admin.channels.servers.create',compact('channel'));
    }

    public function store(ChannelServerRequest $request)
    {
        $data = $request->all();
        ChannelServer::create($data);

        return redirect(route('channel-server.index',$request->channel_id))->with('success','Channel Server Created!!!');
    }

    public function edit($id)
    {
        $server = ChannelServer::where('id',$id)->first();

        return view('admin.channels.servers.edit',compact('server'));
    }

    public function update(ChannelServerRequest $request,$id)
    {   
        $data = $request->all();
        $server = ChannelServer::where('id',$id)->first();
        $server->fill($data)->save();

        return redirect(route('channel-server.index',$server->channel_id))->with('success','Channel Server Updated!!!');
    }

    public function destroy($id)
    {
        $server = ChannelServer::where('id',$id)->first();
        $server->delete();

        return redirect(route('channels.index'))->with('success','Channel Server Deleted!!!');
    }
}
