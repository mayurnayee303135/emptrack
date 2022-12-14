<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CompanyVisit;
use App\Models\User;
use App\Models\CompanyAttachment;
use Illuminate\Http\Request;
use App\Models\IndustryType;
use DB;

class CompanyVisitController extends Controller
{
    public function companyVisitList(Request $request){
        $userId = $request->user_id;
        
        if(!empty($userId))
        {
            $companyVisitLists = CompanyVisit::where('created_by','=',$userId)->select('id','name','operated_by','industry','date_of_visit')->get()->toArray();
            
            $data = [];
            if(!empty($companyVisitLists))
            {
                foreach ($companyVisitLists as $key => $value) {
                    $data[$key]['visit_id'] = $value['id'] ?? 0;
                    $data[$key]['name'] = $value['name'] ?? '';
                    $data[$key]['operated_by'] = $value['operated_by'] ?? '';
                    $data[$key]['industry_type']= $this->getIndustryType($value['industry']);
                    $data[$key]['date_of_visit']= $value['date_of_visit'] ?? '';
                    $data[$key]['attachment']= $this->getAttachments($value['id']);
                }
            }

            return response()->json(['data' => $data , 'message'=>'Company visit list successfull.'], 200); 
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
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $user_location = $request->user_location;
        $attachment = $request->file('attachment');
       

        $data = [];
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
        $companyVisit->latitude = $latitude;
        $companyVisit->longitude = $longitude;
        $companyVisit->user_location = $user_location;
        $companyVisit->created_by = $createdBy;
        $companyVisit->save();
        
        if(!empty($attachment)) {
            foreach ($request->file('attachment') as $file)
            {
                $fileName = $file->getClientOriginalName();
                $url = $file->move(public_path().'/companyAttachments/',$fileName);
                $companyAttachment = array(
                    'image' => $fileName,
                    'company_id' => $companyVisit->id, 
                );  
                CompanyAttachment::create($companyAttachment);
            }
        }
        $data['id'] = $companyVisit->id;

        return response()->json(['data' => $data , 'message' => 'Company Visit Added Successfully.'], 200); 
    }

    public function companyVisitDetail(Request $request){ 
        $visitId = $request->visit_id;
        
        $data =[];
        if(!empty($visitId))
        {
            $companyVisitLists = CompanyVisit::where('id','=',$visitId)->select('*')->first();

            $data['visit_id'] = $companyVisitLists->id ?? 0;
            $data['operated_by'] = $companyVisitLists->operated_by ?? '';
            $data['name'] = $companyVisitLists->name ?? '';
            
            $data['city'] = $companyVisitLists->city ?? '';
            $data['state'] = $companyVisitLists->state ?? '';
            $data['address'] = $companyVisitLists->address ?? '';
            $data['contact_person'] = $companyVisitLists->contact_person ?? '';
            $data['designation'] = $companyVisitLists->designation ?? '';
            $data['department'] = $companyVisitLists->department ?? '';
            $data['decision_maker'] = $companyVisitLists->decision_maker ?? '';
            $data['contact_no'] = $companyVisitLists->contact_no ?? '';
            $data['email'] = $companyVisitLists->email ?? '';
            $data['customer_code'] = $companyVisitLists->customer_code ?? '';
            $data['date_of_visit'] = $companyVisitLists->date_of_visit ?? '';
            $data['next_follow_update'] = $companyVisitLists->next_follow_update ?? '';
            $data['created_by'] = $this->getUser($companyVisitLists->created_by);
            $data['latitude'] = $companyVisitLists->latitude ?? '';
            $data['longitude'] = $companyVisitLists->longitude ?? '';
            $data['user_location'] = $companyVisitLists->user_location ?? '';
            
            $data['industry_type']= $this->getIndustryType($companyVisitLists->industry);
            $data['attachment']= $this->getAttachments($companyVisitLists->id);

            return response()->json(['data' => $data , 'message'=>'Company visit details successfull.'], 200); 
        }
        else
        {
            return response()->json(['data' => [] , 'message'=>'No data found'], 200); 
        }
    }

    public function getAttachments($visitId)
    {
        
        $attachments = CompanyAttachment::where('company_id','=',$visitId)->get();

        $list=[];
        foreach($attachments as $key=> $value)
        {
                $list[$key]['url']= url('companyAttachments/'.$value->image);
        }

        return $list;
    }

    public function getIndustryType($industryId)
    {
        $industryTypeData = IndustryType::where('id','=',$industryId)->select('name')->first();

        return $industryTypeData->name ?? '';
    }
    
    public function getUser($userId)
    {
        $userData = User::where('id','=',$userId)->select('name')->first();
    
        return $userData->name ?? '';
    }
}
