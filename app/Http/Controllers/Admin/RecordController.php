<?php

namespace App\Http\Controllers\Admin;

use Excel;
use App\Models\Record;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
use App\Exports\RecordsExport;
use App\Http\Controllers\Controller;

class RecordController extends Controller
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
    
    public function excel(Request $request)
    {
        $fullname = $request->get('fullname');
        $company = $request->get('company');
        $startdate = $request->get('start_date');
        $enddate = $request->get('end_date');

        return Excel::download(new RecordsExport($fullname, $company, $startdate, $enddate),'registros-btech.xlsx');
    }

    public function index(Request $request)
    {
        $fullname = $request->get('fullname');
        $company = $request->get('company');
        $startdate = $request->get('start_date');
        $enddate = $request->get('end_date');

        $records = Record::orderBy('id','Desc')
                            ->company($company)
                            ->fullname($fullname)
                            ->startdate($startdate)
                            ->enddate($enddate)
                            ->paginate();
        return view('admin.records.index', compact('records'));
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
        //
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
