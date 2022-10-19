<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CompanyVisit;
use Illuminate\Http\Request;

class CompanyVisitController extends Controller
{
    public function companyVisitList(Request $request){
        $userId = $request->user();
        
        if(!empty($userId))
        {
            $companyVisitLists = CompanyVisit::join('industry_types','industry_types.id','=','company_visits.industry')->where('company_visits.created_by','=',$userId)->select('company_visits.id','company_visits.name','company_visits.operated_by','industry_types.name as industry_type')->get()->toArray();

            $data = [];
            if(!empty($companyVisitLists))
            {
                foreach ($companyVisitLists as $key => $value) {
                    $data[$key]['visit_id'] = $value['id'] ?? 0;
                    $data[$key]['name'] = $value['name'] ?? '';
                    $data[$key]['operated_by'] = $leadLists['operated_by'] ?? '';
                    $data[$key]['industry_type'] = $leadLists['industry_type'] ?? '';
                }
            }

            return response()->json(['data' => $data , 'message'=>'No data found'], 200); 
        }
        else
        {
            return response()->json(['data' => [] , 'message'=>'No data found'], 200); 
        }
    }

    public function companyVisitAdd(Request $request){ 
        $name = $request->name;
        $city = $request->city;
        $state = $request->state;
        $address = $request->address;
        $operatedBy = $request->operated_by;
        $industry = $request->industry;
        $cntctPer = $request->cntct_prsn_1;
        $designation = $request->designation;
        $department = $request->department;
        $decMaker = $request->decision_maker;
        $contactNo = $request->contact_no;
        $email = $request->email;
        $customerCode = $request->customer_code;
        $dateOfVisit = $request->date_of_visit;
        $nxtFlwUpDt = $request->next_follow_update;
        $createdBy = $request->created_by;
       
        $companyVisit = new CompanyVisit();
        $companyVisit->name = $name;
        $companyVisit->city = $city;
        $companyVisit->state = $state;
        $companyVisit->address = $address;
        $companyVisit->operated_by = $operatedBy;
        $companyVisit->industry = $industry;
        $companyVisit->contact_person = $cntctPer;
        $companyVisit->designation = $designation;
        $companyVisit->department = $department;
        $companyVisit->decision_maker = $decMaker;
        $companyVisit->contact_no = $contactNo;
        $companyVisit->email = $email;
        $companyVisit->customer_code = $customerCode;
        $companyVisit->date_of_visit = $dateOfVisit;
        $companyVisit->next_follow_update = $nxtFlwUpDt;
        $companyVisit->created_by = $createdBy;
        $companyVisit->save();

        return response()->json(['data' => $companyVisit->id , 'message' => 'Company Visit Added Successfully.'], 200); 
    }

    public function companyVisitDetail(Request $request){ 
        $visitId = $request->visit_id;
        
        if(!empty($visitId))
        {
            $companyVisitLists = CompanyVisit::join('industry_types','industry_types.id','=','company_visits.industry')->where('company_visits.id','=',$visitId)->select('company_visits.id','company_visits.name','company_visits.operated_by','industry_types.name as industry_type')->first();

            $data['visit_id'] = $companyVisitLists->id ?? 0;
            $data['name'] = $companyVisitLists->name ?? '';
            $data['operated_by'] = $companyVisitLists->operated_by ?? '';
            $data['industry_type'] = $companyVisitLists->industry_type ?? '';

            return response()->json(['data' => $data , 'message'=>'No data found'], 200); 
        }
        else
        {
            return response()->json(['data' => [] , 'message'=>'No data found'], 200); 
        }
    }
}
