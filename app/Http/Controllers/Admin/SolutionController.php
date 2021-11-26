<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Models\Admin\Solution;
use App\Http\Controllers\Controller;

class SolutionController extends Controller
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
        $solutions = Solution::orderBy('id','Asc')->paginate();
        return view('admin.solutions.index', compact('solutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.solutions.create');
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
            'image_white' => 'required',
            'image_green' => 'required',
            'image_show' => 'required',
            'description' => 'required',
            'order' => 'required',
        ];

        $messages=[
            'name.required' => 'Ingrese un nombre',
            'image_white.required' => 'Seleccione una imagen blanca',
            'image_green.required' => 'Seleccione una imagen verde',
            'image_show.required' => 'Seleccione una imagen a mostrar',
            'description.required' => 'Ingrese una descripción',
            'order.required' => 'Ingrese el orden',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
            $solution = Solution::create($request->all());
            return redirect()->route('solutions.index')->with('message','Creado con éxito.')->with('typealert','success');
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
        $solution = Solution::find($id);
        return view('admin.solutions.edit', compact('solution'));
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
            'image_white' => 'required',
            'image_green' => 'required',
            'image_show' => 'required',
            'description' => 'required',
            'order' => 'required',
        ];

        $messages=[
            'name.required' => 'Ingrese un nombre',
            'image_white.required' => 'Seleccione una imagen blanca',
            'image_green.required' => 'Seleccione una imagen verde',
            'image_show.required' => 'Seleccione una imagen a mostrar',
            'description.required' => 'Ingrese una descripción',
            'order.required' => 'Ingrese el orden',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
            $solution = Solution::find($id);
            $solution->fill($request->all())->save();
            return redirect()->route('solutions.index')->with('message','Actualizado con éxito.')->with('typealert','success');
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
        $solution = Solution::find($id)->delete();
        return back()->with('message', 'Eliminado correctamente')->with('typealert','success');
    }
}
