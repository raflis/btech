<?php

namespace App\Exports;

use App\Models\Record;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RecordsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $fullname, $company, $start_date, $end_date;

    public function __construct($fullname, $company, $start_date, $end_date)
    {
        $this->fullname = $fullname;
        $this->company = $company;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    
    public function view(): View
    {
        return view('admin.records.excelrecord', [
            'records' => Record::orderBy('id','Desc')
                                ->fullname($this->fullname)
                                ->company($this->company)
                                ->startdate($this->start_date)
                                ->enddate($this->end_date)
                                ->get()
        ]);
    }
}
