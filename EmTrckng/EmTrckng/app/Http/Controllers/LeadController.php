<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Request;
use App\Models\Lead;
use App\Models\LeadReplay;
use Laracasts\Flash\Flash;
use App\DataTables\LeadDataTable;
use App\Repositories\LeadRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\CompanyVisit;
use DB;

class LeadController extends Controller
{
    /** @var  LeadRepository */
    private $leadRepository;
 
    public function __construct(LeadRepository $leadRepo)
    {
        $this->leadRepository = $leadRepo;
    }

   public function index(LeadDataTable $leadDataTable)
   {
       return $leadDataTable->render('leads.index');
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $leads = CompanyVisit::select('*')->find($id);

        if (empty($leads)) {
            Flash::error(__('models/leads.message.not_found'));

            return redirect(route('leads.index'));
        }
        else
        {
            $lead = new Lead();
            $lead->company_visit_id = $id;
            $lead->name = $leads->name;
            $lead->city = $leads->city;
            $lead->state = $leads->state;
            $lead->address = $leads->address;
            $lead->operated_by = $leads->operated_by;
            $lead->industry = $leads->industry;
            $lead->contact_person = $leads->contact_person;
            $lead->designation = $leads->designation;
            $lead->department = $leads->department;
            $lead->decision_maker = $leads->decision_maker;
            $lead->contact_no = $leads->contact_no;
            $lead->email = $leads->email;
            $lead->customer_code = $leads->customer_code;
            $lead->date_of_visit = $leads->date_of_visit;
            $lead->next_follow_update = $leads->next_follow_update;
            $lead->attachment = $leads->attachment;
            $lead->created_by = $leads->created_by;
            $lead->save();

        }

        Flash::success(__('models/leads.message.create_success'));

        return redirect(route('leads.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leads = $this->leadRepository->find($id);

        $attchments = LeadReplay::where('lead_id','=',$id)->get();

        if (empty($leads)) {
            Flash::error(__('models/leads.message.not_found'));

            return redirect(route('leads.index'));
        }

        return view('leads.show',compact('leads', 'attchments'));

        // return view('leads.show')->with('leads', $leads)->with('attchments', $attchments);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lead = $this->leadRepository->find($id);

        if (empty($lead)) {
            Flash::error(__('models/leads.message.not_found'));

            return redirect(route('leads.index'));
        }

        $this->leadRepository->delete($id);

        Flash::success(__('models/leads.message.delete_success'));

        return redirect(route('leads.index'));
    }
}
