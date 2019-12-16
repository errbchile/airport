<?php

namespace App\Http\Controllers;

use Auth;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    
    public function __construct(){
        $this->middleware("auth");
    }

    public function index()
    {
        $current_user = Auth::user()->id;
        $notifications = Notification::where('user_id',$current_user)->get();
        //Marcar como leidas
        $ns = Notification::where('user_id',$current_user)->where('status',1)->get();
        foreach ($ns as $n) {
            $n->status = 0;
            $n->save();
        }
        return view('notifications.index', ['notifications'=>$notifications]);
    }

}
