<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class UserController extends Controller
{
    public function showDataInHome(){
        $posts=Post::all();
        return view('home', compact('posts'));
    }
    public function showFullPost($id){
        $post=Post::findOrFail($id);
        return view('fullpost', compact('post'));
    }
    public function my_search(Request $request)
    {
        $search = $request->get('search');

        $posts = Post::where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->latest()
            ->paginate(6);

        return view('home', compact('posts', 'search'));
    }
    public function home(Request $request){
        if ($request->user()->usertype == 'user') {
             return view('dashboard');
        } 
        else {
            return redirect()->route('admin.dashboard');
        }
    }

    public function index(Request $request){
        if ($request->user()->usertype == 'admin') {
            return view('admin.dashboard');
        }   
        else {
            return redirect()->route('dashboard');
        }
    }
}
