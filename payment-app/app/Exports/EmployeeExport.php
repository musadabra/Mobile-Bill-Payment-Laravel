<?php

namespace App\Exports;

use App\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class EmployeeExport implements FromCollection,WithHeadings
{
    public function collection()
    {
        
        $employees = Employee::all();
      //  $employees = DB::table('employees')->whereYear('created_at', '=', 2010)->get();
        return $employees;
    }

    public function headings(): array
    {
    return ['id','employer_id', 'employee_firstname', 'employee_middle_name','employee_surname','employee_gender','employee_id_number','employee_radiation_passbook_no','employee_dob','employee_work_start_date','employee_occupation',
    'employee_occupation_sub_category','employee_monitoring_status'
    ];
    }
}

?>