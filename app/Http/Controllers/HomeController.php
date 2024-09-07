<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserRoles;

class HomeController extends Controller
{
    public function index(){
        $authUser = Auth::user();

        $role = $authUser->roles()->first()->name;

        switch ($role) {
            case UserRoles::ADMIN->value:
                return to_route('admin.index');
                break;
            case UserRoles::SELLER->value:
                return to_route('seller.index');
                break;
            case UserRoles::CUSTOMER->value:
                return to_route('customer.dashboard');
                break;
            default:
                return to_route('customer.index');
                break;
        }
    }
}
