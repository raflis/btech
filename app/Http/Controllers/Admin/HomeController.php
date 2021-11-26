<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Models\Admin\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
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

    public function aboutus()
    {
        $home = Home::find(1);
        return view('admin.aboutus.aboutus', compact('home'));
    }
    
    public function index()
    {
        $home = Home::find(1);
        return view('admin.home.index', compact('home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
            /*'title' => 'required',
            'description' => 'required',
            'button_name' => 'required',
            'button_link' => 'required',
            'slider_desktop' => 'required',
            'slider_mobile' => 'required',
            'title2' => 'required',
            'description2' => 'required',*/
        ];

        $messages=[
            'title.required'=> 'Ingrese un título',
            'description.required'=> 'Ingrese la descripción',
            'button_name.required'=> 'Ingrese el nombre del botón',
            'button_link.required'=> 'Ingrese el link del botón',
            'slider_desktop.required'=> 'Suba la imagen para desktop',
            'slider_mobile.required'=> 'Suba la imagen para mobile',
            'title2.required'=> 'Ingrese un título2',
            'description2.required'=> 'Ingrese la descripción2',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
            if($request->home_carousel):
                $request->merge(['home_carousel'=>array_values(collect($request->home_carousel)->sortBy(['order'])->toArray())]);
            endif;
            $home = Home::find(1);
            $home->fill($request->all())->save();
            return redirect()->back()->with('message','Actualizado con éxito.')->with('typealert','success');
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
        //
    }
}
