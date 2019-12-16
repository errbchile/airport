<?php

namespace App\Http\Controllers;

use App\VueloUser;
use Illuminate\Http\Request;

class VueloUserController extends Controller
{
    
    public function __construct(){
        $this->middleware("auth");
    }
    
}
