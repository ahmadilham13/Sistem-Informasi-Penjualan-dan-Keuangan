<?php

namespace App\Http\Controllers;

use App\Interfaces\ActivityInterface;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __construct(
        private UserInterface $user,
        private ActivityInterface $activity,
        ) 
    {
    }

    /**
     * Show the profile for a given user.
     */
    public function __invoke(Request $request): View
    {
        $onlineUsers = $this->user->GetOnlineUsers();
        $activities = $this->activity->GetAllActivity();
        
        return view('index.index', [
            'onlineUsers'   => $onlineUsers,
            'activities'    => $activities,
        ]);
    }
}
