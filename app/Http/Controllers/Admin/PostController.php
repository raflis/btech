<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Models\Blog\Tag;
use App\Models\Blog\Post;
use Illuminate\Http\Request;
use App\Models\Blog\Category;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function index()
    {
        $posts = Post::orderBy('id','Asc')->paginate();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'Asc')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->get();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name' => 'required',
            'slug' => 'required|unique:posts,slug',
            'category_id'=>'required',
            'body'=>'required',
            'status'=>'required',
            'image_index'=>'required',
            'image_carrousel'=>'required',
            'image_post'=>'required',
            'author'=>'required',
            'order'=>'required',
        ];

        $messages=[
            'name.required'=> 'Ingrese el nombre de la publicación',
            'slug.required'=>'La URL amigable es necesaria',
            'slug.unique'=>'Ya existe un registro con la misma URL',
            'category_id.required'=>'Seleccione una categoría',
            'body.required'=>'Ingrese el cuerpo de la publicación',
            'status.required'=>'Seleccione el estado de la publicación',
            'image_index.required'=>'Seleccione una imagen para el index',
            'image_carrousel.required'=>'Seleccione una imagen para carrusel',
            'image_post.required'=>'Seleccione una imagen para el mismo post',
            'author.required'=>'Ingrese el nombre del autor',
            'order.required'=>'Ingrese el orden de la publicación',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
            $post = Post::create($request->all());
            $post->tags()->attach($request->get('tags'));
            return redirect()->route('posts.index')->with('message','Creado con éxito.')->with('typealert','success');
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy('name', 'Asc')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->get();
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'name' => 'required',
            'slug' => 'required|unique:posts,slug,'.$id,
            'category_id'=>'required',
            'body'=>'required',
            'status'=>'required',
            'image_index'=>'required',
            'image_carrousel'=>'required',
            'image_post'=>'required',
            'author'=>'required',
            'order'=>'required',
        ];

        $messages=[
            'name.required'=> 'Ingrese el nombre de la publicación',
            'slug.required'=>'La URL amigable es necesaria',
            'slug.unique'=>'Ya existe un registro con la misma URL',
            'category_id.required'=>'Seleccione una categoría',
            'body.required'=>'Ingrese el cuerpo de la publicación',
            'status.required'=>'Seleccione el estado de la publicación',
            'image_index.required'=>'Seleccione una imagen para el index',
            'image_carrousel.required'=>'Seleccione una imagen para carrusel',
            'image_post.required'=>'Seleccione una imagen para el mismo post',
            'author.required'=>'Ingrese el nombre del autor',
            'order.required'=>'Ingrese el orden de la publicación',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
            $post = Post::find($id);
            $post->fill($request->all())->save();
            $post->tags()->sync($request->get('tags'));
            return redirect()->route('posts.index')->with('message','Actualizado con éxito.')->with('typealert','success');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id)->delete();
        return back()->with('message', 'Eliminado correctamente')->with('typealert','success');
    }
}
