<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __construct(
        private UserInterface $user
        ) 
    {
    }

    /**
     * Show the profile for a given user.
     */
    public function __invoke(Request $request): View
    {
        $onlineUsers = $this->user->GetOnlineUsers();
        return view('index.index', [
            'onlineUsers'   => $onlineUsers
        ]);
    }
}
