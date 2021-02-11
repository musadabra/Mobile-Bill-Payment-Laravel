<?php

namespace App\Exports;

use App\Employer;
use Auth;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Response;


class IndividualMonitoringInformation implements FromArray,WithHeadings
{   
   public $year = '';
   public function __construct($year)
   {
       $this->year = $year;
   }
    public function array(): array
    {   

        $id = Auth::User()->dsp_information_id;
        $personalInformationsCollection = [];
      //   $employees = DB::table('employees')->whereYear('created_at', '=', 2010)->get();
         $employers = Employer::with('dsp','employees')->wheredsp_information_id($id)->get();
         if(count($employers)>0){
             foreach($employers as $employer){
                   $personalInformation = new \stdClass();
                   $dsp =  $employer->dsp;
                   $employees = $employer->employees;
                   if(count($employees)>0){ //MEANS HE HAS EMPLOYEES
                         $dsp = @json_decode(json_encode($dsp), true);
                         $personalInformation->country = $dsp['country'];
                         $personalInformation->service_provider = $dsp['service_provider'];
                         $personalInformation->dsp_address = $dsp['dsp_address'];
                         $personalInformation->dsp_telno = $dsp['dsp_telno'];
 
                         //EMPLOYER INFORMATION FOR ROW
                         $employer = @json_decode(json_encode($employer), true);
                         unset($employer['dsp']);
                         unset($employer['employees']);
                         unset($employer['created_at']);
                         unset($employer['updated_at']);
                         unset($employer['id']);
                         unset($employer['dsp_information_id']);
                         foreach($employer as $key => $value)
                            $personalInformation->$key = $value;
 
                         foreach($employees as $employee){
 
                            $externalExposures = $employee->externalexposure()->whereYear('monitoring_date_start','=',$this->year)->get();
                            $employee = @json_decode(json_encode($employee), true);
                            unset($employee['employer_id']);
                            unset($employee['created_at']);
                            unset($employee['updated_at']);
                            unset($employee['id']);
                            foreach($employee as $key => $value)
                               $personalInformation->$key = $value;
                            if(count($externalExposures)>0){
                               foreach($externalExposures as $externalExposure){
                                  $Information = $personalInformation;
                                  $externalExposure = @json_decode(json_encode($externalExposure), true);
                                  unset($externalExposure['updated_at']);
                                  unset($externalExposure['created_at']);
                                  unset($externalExposure['id']);
                                  unset($externalExposure['employee_id']);
                                  unset($externalExposure['delete_status']);
                                  foreach($externalExposure as $key => $value)
                                     $Information->$key = $value;
                                  array_push($personalInformationsCollection,$Information);
                               }
                           }
                      }
                }
            }    
         }
         else{
            return "You have no data under you Sir";
         }
         //$personalInformation = json_decode (json_encode ($personalInformation), true);
         return $personalInformationsCollection;
    }

    public function headings(): array
    {
    return [ "country",
"service_provider",
"dsp_address",
"dsp_telno",
"employer_name",
"employer_address",
"employer_postal_code",
"employer_contact_person",
"employer_organisation_code",
"employer_monitoring_type",
    "employer_sector",
    "employer_telno",
    "employer_mobileno",
    "employee_firstname",
    "employee_middle_name",
    "employee_surname",
    "employee_id_number",
    "employee_gender",
    "employee_radiation_passbook_no",
    "employee_dob",
    "employee_work_start_date",
    "employee_occupation",
    "employee_occupation_sub_category",
    "employee_monitoring_status",
    "employee_employment_type",
    "applicant_name",
    "date_of_measurement",
    "monitoring_purpose",
    "monitoring_date_start",
    "monitoring_end_start",
    "background_blank_counting",
    "batch_no",
    "monitoring_type",
    "instrument_name",
    "calibiration_factor",
    "mdl",
    "radiation_protection_type",
    "value1_without_lead",
    "value2_without_lead",
    "detector1_without_lead",
    "detector2_without_lead",
    "hp10_without_lead",
    "hp3_without_lead",
    "hp007_without_lead",
    "hp10_under",
    "hp10_above",
    "hp3_above",
    "hp007_above",
    "hp10_neutron",
    "hp10_without_lead_notional_mSv",
    "hp3_notional_mSv",
    "hp007_notional_mSv",
    "hp10_under_lead_notional_mSv",
    "hp10_above_lead_notional_mSv",
    "hp3_above_lead_notional_mSv",
    "hp007_above_lead_notional_mSv",
    "hp10_for_neutron_notional_mSv",
    "effective_dose_E_mSv",
    "equivalent_dose_to_the_lens_of_eye_mSv",
    "equivalent_dose_to_the_skin",
    "remarks",
    "value3_under_lead",
    "value4_under_lead",
    "value5_above_lead",
    "value6_above_lead",
    "detector3_under_lead",
    "detector4_under_lead",
    "detector5_above_lead",
    "detector6_above_lead",
    ];
    }
}

?>