<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Index method for route dashboard
    public function index(){
        $user = Auth::user();
        if ($user->hasRole('admin')){
            return view('dashboard.admin', [
                'posts' => Post::latest()->get()
            ]);
        }
        elseif ($user->hasRole('blogger')){
            return view('dashboard.blogger', [
                'posts' => Post::latest()->get()
            ]);
        }
        else{
            return view('dashboard.user', [
                'posts' => Post::latest()->get()
            ]);
        }
    }

    // User profile method for route dashboard.profile
    public function profile(){
        return view('dashboard.profile');
    }

    public function createPost(){
        return view('dashboard.createPost');
    }
}
