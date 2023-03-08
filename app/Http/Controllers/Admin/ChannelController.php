<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChannelRequest;
use App\Models\Channel;
use App\Repositories\Admin\ChannelRepository;

class ChannelController extends Controller
{
    public function __construct(ChannelRepository $channelRepository)
    {
        return $this->channelRepository = $channelRepository;
    }

    public function index()
    {
        return $this->channelRepository->index();
    }

    public function create()
    {
        return $this->channelRepository->create();
    }

    public function store(ChannelRequest $request)
    {
        return $this->channelRepository->store($request);
    }

    public function edit(Channel $channel)
    {
        return $this->channelRepository->edit($channel);
    }

    public function update(ChannelRequest $request,Channel $channel)
    {
        return $this->channelRepository->update($request,$channel);
    }

    public function destroy(Channel $channel)
    {
        return $this->channelRepository->destroy($channel);
    }
}
