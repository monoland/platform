<?php

namespace App\Events;

use Jenssegers\Agent\Agent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserSuccessfullLogin implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    
    protected $user;

    public $login;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;

        $this->login = $this->fetchUserAgent();

        $this->dontBroadcastToCurrentUser();
    }

    protected function fetchUserAgent()
    {
        $userAgent = $this->createAgent(request()->userAgent());

        return [
            'agent' => [
                'is_desktop' => $userAgent->isDesktop(),
                'platform' => $userAgent->platform(),
                'browser' => $userAgent->browser(),
            ],
            
            'ip_address' => request()->ip(),
        ];
    }

    protected function createAgent($user_agent)
    {
        return tap(new Agent, function ($agent) use ($user_agent) {
            $agent->setUserAgent($user_agent);
        });
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('user-' . $this->user->id . '-activity');
    }
}
