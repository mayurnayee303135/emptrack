<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\User;
use App\Models\LeadReplay;
use App\Models\IndustryType;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function leadList(Request $request){ 
        $userId = $request->user_id;
        
        if(!empty($userId))
        {
            $leadLists = Lead::where('created_by','=',$userId)->select('leads.*')->get()->toArray();

            $data = [];
            if (!empty($leadLists)) {
                foreach ($leadLists as $key => $value) {
                    $data[$key]['leadid'] = $value['id'] ?? '';
                    $data[$key]['name'] = $value['name'] ?? '';
                    $data[$key]['city'] = $value['city'] ?? '';
                    $data[$key]['state'] = $value['state'] ?? '';
                    $data[$key]['address'] = $value['address'] ?? '';
                    $data[$key]['operated_by'] = $value['operated_by'] ?? '';
                    $data[$key]['industry_type'] = $this->getIndustryType($value['industry']);
                    $data[$key]['contact_person'] = $value['contact_person'] ?? '';
                    $data[$key]['designation'] = $value['designation'] ?? '';
                    $data[$key]['department'] = $value['department'] ?? '';
                    $data[$key]['decision_maker'] = $value['decision_maker'] ?? '';
                    $data[$key]['contact_no'] = $value['contact_no'] ?? 0;
                    $data[$key]['email'] = $value['email'] ?? '';
                    $data[$key]['date_of_visit'] = date('Y-m-d', strtotime($value['date_of_visit'])) ?? '';
                    $data[$key]['next_follow_update'] = date('Y-m-d', strtotime($value['next_follow_update'])) ?? '';
                    $data[$key]['attachment']= $this->getAttachments($value['id']);
                }
            }

            return response()->json(['data' => $data , 'message'=>'Lead lists successfull.'], 200); 
        }
        else
        {
            return response()->json(['data' => [] , 'message'=>'No data found'], 200); 
        }
    }

    public function leadDetails(Request $request){ 
        $leadId = $request->lead_id;
        
        if(!empty($leadId))
        {
            $leadLists = Lead::where('id','=',$leadId)->select('leads.*')->first();

            $data['lead_id'] = $leadLists->id ?? '';
            $data['name'] = $leadLists->name ?? '';
            $data['city'] = $leadLists->city ?? '';
            $data['state'] = $leadLists->state ?? '';
            $data['address'] = $leadLists->address ?? '';
            $data['operated_by'] = $leadLists->operated_by ?? '';
            $data['industry_type']= $this->getIndustryType($leadLists->industry);
            $data['contact_person'] = $leadLists->contact_person ?? '';
            $data['designation'] = $leadLists->designation ?? '';
            $data['department'] = $leadLists->department ?? '';
            $data['decision_maker'] = $leadLists->decision_maker ?? '';
            $data['contact_no'] = $leadLists->contact_no ?? 0;
            $data['email'] = $leadLists->email ?? '';
            $data['date_of_visit'] = date('Y-m-d', strtotime($leadLists->date_of_visit)) ?? '';
            $data['next_follow_update'] = date('Y-m-d', strtotime($leadLists->next_follow_update)) ?? '';
            $data['attachment'] = $this->getAttachments($leadLists->id);

            return response()->json(['data' => $data , 'message'=>'Lead details successfull.'], 200); 
        }
        else
        {
            return response()->json(['data' => [] , 'message'=>'No data found'], 200); 
        }
    }

    public function leadCommentAdd(Request $request){ 
        $comment = $request->comment;
        $lead_id = $request->lead_id;
        $attachment = $request->file('attachment');
        $createdBy = $request->created_by;

        if(!empty($attachment))
        {            
            $image = $attachment;
            $filename = $image->getClientOriginalName();
            $url = $image->move(public_path().'/leadAttachments/',$fileName);
        }
        else
        {
            $filename = '';
        }
       
        if(!empty($filename))
        {
            $leadReplay = new LeadReplay();
            $leadReplay->comment = $comment;
            $leadReplay->attachment = $filename;
            $leadReplay->created_by = $createdBy;
            $leadReplay->lead_id = $lead_id;
            $leadReplay->save();
        }
        else
        {
            $leadReplay = new LeadReplay();
            $leadReplay->comment = $comment;
            $leadReplay->attachment = '';
            $leadReplay->lead_id = $lead_id;
            $leadReplay->created_by = $createdBy;
            $leadReplay->save();
        }

        return response()->json(['data' => $leadReplay->id , 'message' => 'Lead Comment Added Successfully.'], 200); 
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

    public function getAttachments($leadId)
    {
        
        $attachments = LeadReplay::where('lead_id','=',$leadId)->get();

        $list=[];
        foreach($attachments as $key=> $value)
        {
            $list[$key]['comment']= $value->comment;
            $list[$key]['created_at']= $value->created_at;
            $list[$key]['created_by']= $this->getUser($value->created_by);
            $list[$key]['url']= url('leadAttachments/'.$value->attachment);
        }

        return $list;
    }
}
