<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $subscriptions = Subscription::latest()->count();
 
        
        return view('pages.admin.index', compact(['subscriptions']));
    }
}
