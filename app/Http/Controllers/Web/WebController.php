<?php

namespace App\Http\Controllers\Web;

use Validator;
use App\Models\Record;
use App\Models\Blog\Tag;
use App\Models\Blog\Post;
use App\Models\Admin\Home;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Models\Admin\Aboutus;
use App\Models\Admin\Partner;
use App\Models\Blog\Category;
use App\Models\Admin\Solution;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class WebController extends Controller
{
    public function index()
    {
        $home = Home::find(1);
        $aboutus = Aboutus::orderBy('order', 'Asc')->get();
        $partners = Partner::orderBy('order', 'Asc')->get();
        $solutions = Solution::orderBy('order', 'Asc')->get();
        $posts = Post::orderBy('order', 'ASC')->where('status', 'PUBLISHED')->get();
        $agent = new Agent();
        return view('web.index', compact('agent', 'home', 'aboutus', 'partners', 'solutions', 'posts'));
    }

    public function blog(Request $request){
        $name = $request->get('name');
        $tags = Tag::orderBy('name', 'Asc')->get();
        $categories = Category::orderBy('name', 'Asc')->get();
        $posts = Post::with(['category','tags'])->orderBy('order', 'Asc')->where('status', 'PUBLISHED')->name($name)->get();
    	return view('web.blog.posts', compact('posts', 'tags', 'categories'));
    }

    public function category($slug){
        $tags = Tag::orderBy('name', 'Asc')->get();
        $categories = Category::orderBy('name', 'Asc')->get();
        $category = Category::where('slug', $slug)->pluck('id')->first();
        $posts = Post::where('category_id', $category)->orderBy('order', 'Asc')->where('status', 'PUBLISHED')->get();
        return view('web.blog.posts', compact('posts', 'tags', 'categories'));
    }

    public function tag($slug){ 
        $tags = Tag::orderBy('name', 'Asc')->get();
        $categories = Category::orderBy('name', 'Asc')->get();
        $posts = Post::whereHas('tags', function($query) use ($slug) {
            $query->where('slug', $slug);
        })
        ->orderBy('order', 'Asc')->where('status', 'PUBLISHED')->get();
        return view('web.blog.posts', compact('posts', 'tags', 'categories'));
    }

    public function post($slug){
    	$post = Post::where('slug', $slug)->first();
        $posts = Post::where('slug', '<>', $slug)->where('category_id', $post->category_id)->where('status', 'PUBLISHED')->orderBy('order', 'Asc')->get();
    	return view('web.blog.post', compact('post', 'posts'));
    }

    public function gracias()
    {
        return view('web.gracias');
    }

    public function postContacto(Request $request)
    {
        $rules=[
            'fullname' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'company' => 'required',
        ];

        $messages=[
            'fullname.required' => 'Ingrese su nombre',
            'telephone.required' => 'Ingrese su teléfono',
            'email.required' => 'Ingrese su correo',
            'company.required' => 'Ingrese su empresa',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
            $record = Record::create($request->all());
            return redirect()->route('gracias')->with('message','Creado con éxito.')->with('typealert','success');
        endif;
    }
}
