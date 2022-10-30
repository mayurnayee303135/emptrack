<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Request;
use App\Models\CompanyVisit;
use App\Models\CompanyAttachment;
use App\Models\Lead;
use Laracasts\Flash\Flash;
use App\DataTables\CompanyVisitDataTable;
use App\Repositories\CompanyVisitRepository;
use App\Http\Controllers\AppBaseController;
use DB;

class CompanyVisitController extends AppBaseController
{
    /** @var  CompanyVisitRepository */
    private $companyVisitRepository;

    public function __construct(CompanyVisitRepository $companyVisitRepo)
    {
        $this->companyVisitRepository = $companyVisitRepo;
    }

    public function index(CompanyVisitDataTable $companyVisitDataTable)
    {
        return $companyVisitDataTable->render('company_visits.index');
    }

    public function show($id)
    {
        $companyVisit = $this->companyVisitRepository->find($id);
        
        $attchments = CompanyAttachment::where('company_id','=',$id)->get();
        
        if (empty($companyVisit)) {
            Flash::error(__('models/categories.message.not_found'));

            return redirect(route('company_visits.index'));
        }

        return view('company_visits.show', compact('attchments'))->with('companyVisit', $companyVisit); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyVisit  $companyVisit
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyVisit $companyVisit)
    {
        //
    }
}
