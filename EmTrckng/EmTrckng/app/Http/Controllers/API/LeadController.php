<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadReplay;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function leadList(Request $request){ 
        $userId = $request->user_id;
        
        if(!empty($userId))
        {
            $leadLists = Lead::join('industry_types','industry_types.id','=','company_visits.industry')->where('leads.created_by','=',$userId)->select('leads.*','industry_types.name as industry_type')->get()->toArray();

            $data = [];
            if (!empty($leadLists)) {
                foreach ($leadLists as $key => $value) {
                    $data[$key]['name'] = $value['name'] ?? '';
                    $data[$key]['city'] = $value['city'] ?? '';
                    $data[$key]['state'] = $leadLists['state'] ?? '';
                    $data[$key]['address'] = $leadLists['address'] ?? '';
                    $data[$key]['operated_by'] = $leadLists['operated_by'] ?? '';
                    $data[$key]['industry_type'] = $leadLists['industry_type'] ?? '';
                    $data[$key]['contact_person'] = $leadLists['contact_person'] ?? '';
                    $data[$key]['designation'] = $leadLists['designation'] ?? '';
                    $data[$key]['department'] = $leadLists['department'] ?? '';
                    $data[$key]['decision_maker'] = $leadLists['decision_maker'] ?? '';
                    $data[$key]['contact_no'] = $leadLists['contact_no'] ?? 0;
                    $data[$key]['email'] = $leadLists['email'] ?? '';
                    $data[$key]['date_of_visit'] = date('Y-m-d', strtotime($leadLists['date_of_visit'])) ?? '';
                    $data[$key]['next_follow_update'] = date('Y-m-d', strtotime($leadLists['next_follow_update'])) ?? '';
                }
            }

            return response()->json(['data' => $data , 'message'=>'No data found'], 200); 
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
            $leadLists = Lead::join('industry_types','industry_types.id','=','company_visits.industry')->where('leads.id','=',$leadId)->select('leads.*','industry_types.name as industry_type')->first();

            $data['name'] = $leadLists->name ?? '';
            $data['city'] = $leadLists->city ?? '';
            $data['state'] = $leadLists->state ?? '';
            $data['address'] = $leadLists->address ?? '';
            $data['operated_by'] = $leadLists->operated_by ?? '';
            $data['industry_type'] = $leadLists->industry_type ?? '';
            $data['contact_person'] = $leadLists->contact_person ?? '';
            $data['designation'] = $leadLists->designation ?? '';
            $data['department'] = $leadLists->department ?? '';
            $data['decision_maker'] = $leadLists->decision_maker ?? '';
            $data['contact_no'] = $leadLists->contact_no ?? 0;
            $data['email'] = $leadLists->email ?? '';
            $data['date_of_visit'] = date('Y-m-d', strtotime($leadLists->date_of_visit)) ?? '';
            $data['next_follow_update'] = date('Y-m-d', strtotime($leadLists->next_follow_update)) ?? '';

            return response()->json(['data' => $data , 'message'=>'No data found'], 200); 
        }
        else
        {
            return response()->json(['data' => [] , 'message'=>'No data found'], 200); 
        }
    }

    public function leadCommentAdd(Request $request){ 
        $comment = $request->comment;
        $attachment = $request->file('attachment');
        $createdBy = $request->created_by;

        if(!empty($attachment))
        {
            $image = $attachment;
            $filename = $image->getClientOriginalName();
            $destinationPath = 'public/leadAttachments';
        
            $image->storeAs("$destinationPath", $filename);

        }
        else
        {
            $filename = '';
        }
       
        if(!empty($filename))
        {
            $leadReplay = new LeadReplay();
            $leadReplay->comment = $comment;
            $leadReplay->attachment = 'leadAttachments/'.$filename;
            $leadReplay->created_by = $createdBy;
            $leadReplay->save();
        }
        else
        {
            $leadReplay = new LeadReplay();
            $leadReplay->comment = $comment;
            $leadReplay->attachment = '';
            $leadReplay->created_by = $createdBy;
            $leadReplay->save();
        }

        return response()->json(['data' => $leadReplay->id , 'message' => 'Lead Comment Added Successfully.'], 200); 
    }
}
