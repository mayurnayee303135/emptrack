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
            $leadLists = Lead::where('created_by','=',$userId)->select('id','name','operated_by','industry','created_at')->get()->toArray();

            $data = [];
            if (!empty($leadLists)) {
                foreach ($leadLists as $key => $value) {
                    $data[$key]['lead_id'] = $value['id'] ?? 0;
                    $data[$key]['name'] = $value['name'] ?? '';
                    if(!empty($leadLists['created_at'])) {
                        $data[$key]['date'] = date('Y-m-d', strtotime($leadLists['created_at']));
                    } else {
                        $data[$key]['date'] = '';
                    }
                    $data[$key]['operated_by'] = $leadLists['operated_by'] ?? '';
                    $data[$key]['industry_type']= $this->getIndustryType($value['industry']);
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
        $leadId = $request->lead_id;
        $comment = $request->comment;
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
            $leadReplay->lead_id = $leadId;
            $leadReplay->comment = $comment;
            $leadReplay->attachment = $filename;
            $leadReplay->created_by = $createdBy;
            $leadReplay->save();
        }
        else
        {
            $leadReplay = new LeadReplay();
            $leadReplay->lead_id = $leadId;
            $leadReplay->comment = $comment;
            $leadReplay->attachment = '';
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

    public function getAttachments($leadId)
    {
        
        $attachments = LeadReplay::where('lead_id','=',$leadId)->get();

        $list=[];
        foreach($attachments as $key=> $value)
        {
            $list[$key]['comment']= $value->comment;
            $list[$key]['url']= url('leadAttachments/'.$value->attachment);
            $list[$key]['username']= $this->getUserName($value->created_by);
            $list[$key]['date']= $value->created_at;
        }

        return $list;
    }

    public function getUserName($userId)
    {
        $userData = User::where('id','=',$userId)->select('name')->first();

        return $userData->name ?? '';
    }
}
