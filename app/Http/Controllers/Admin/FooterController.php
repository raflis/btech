<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Models\Admin\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FooterController extends Controller
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
        $home = Home::find(1);
        return view('admin.footer.index', compact('home'));
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
            'footer_description' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'linkedin' => 'required',
        ];

        $messages=[
            'address1.footer_description'=> 'Ingrese una descripción',
            'facebook.required'=> 'Ingrese el link de facebook',
            'youtube.required'=> 'Ingrese el link de youtube',
            'linkedin.required'=> 'Ingrese el link de linkedin',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput();
        else:
            if($request->footer_info):
                $request->merge(['footer_info'=>array_values(collect($request->footer_info)->sortBy(['order'])->toArray())]);
            else:
                $request->merge(['footer_info'=>[]]);
            endif;
            $home = Home::find(1);
            $home->fill($request->all())->save();
            return redirect()->route('footer.index')->with('message','Actualizado con éxito.')->with('typealert','success');
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
