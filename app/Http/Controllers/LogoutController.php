<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function Logout(){
        auth()->logout();
    
        session()->flash('message', 'Du hast dich erfolgreich ausgeloggt!');
    
        return redirect('/login');
      }
}
