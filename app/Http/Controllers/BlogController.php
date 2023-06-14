<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $bathView = 'endUser';
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['posts'] = \App\Entities\Post::where('status', 1)->latest()->paginate(10);
        return view($this->bathView.'.blogList')->with($data);
    }
    public function show($id){
        $data['post'] = \App\Entities\Post::find($id);
        return view($this->bathView.'.blogDetail')->with($data);
    }
}
