<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Request;
use App\Models\IndustryType;
use Laracasts\Flash\Flash;
use App\DataTables\IndustryTypeDataTable;
use App\Repositories\IndustryTypeRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateIndustryTypeRequest;
use App\Http\Requests\UpdateIndustryTypeRequest;
use DB;

class IndustryTypeController extends Controller
{
    /** @var  IndustryTypeRepository */
    private $industryTypeRepository;
 
    public function __construct(IndustryTypeRepository $industryTypeRepo)
    {
        $this->industryTypeRepository = $industryTypeRepo;
    }

   public function index(IndustryTypeDataTable $industryTypeDataTable)
   {
       return $industryTypeDataTable->render('industry_types.index');
   }

    
   public function create()
   {
       return view('industry_types.create')->with('roles', $this->industryTypeRepository->all()->pluck('name', 'id'));;
   }

   public function store(CreateIndustryTypeRequest $request)
   {
       $input = $request->all();
      
       $industryType = $this->industryTypeRepository->create($input);

       Flash::success(__('models/industryTypes.message.create_success'));

       return redirect(route('industry_types.index'));
   }

   public function show($id)
   {
       $industryType = $this->industryTypeRepository->find($id);

       if (empty($industryType)) {
           Flash::error(__('models/industryTypes.message.not_found'));

           return redirect(route('industry_types.index'));
       }

       return view('industry_types.show')->with('industryType', $industryType);
   }

   public function edit($id)
   {
       $industryType = $this->industryTypeRepository->find($id);

       if (empty($industryType)) {
           Flash::error(__('models/industryTypes.message.not_found'));

           return redirect(route('industry_types.index'));
       }

       return view('industry_types.edit')->with('industryType', $industryType);
   }

   public function update($id, UpdateIndustryTypeRequest $request)
   {
       $industryType = $this->industryTypeRepository->find($id);

       if (empty($industryType)) {
           Flash::error(__('models/industryTypes.message.not_found'));

           return redirect(route('industry_types.index'));
       }

       $industryType = $this->industryTypeRepository->update($request->all(), $id);

       Flash::success(__('models/industryTypes.message.update_success'));

       return redirect(route('industry_types.index'));
   }

   public function destroy($id)
   {
       $industryType = $this->industryTypeRepository->find($id);

       if (empty($industryType)) {
           Flash::error(__('models/industryTypes.message.not_found'));

           return redirect(route('industry_types.index'));
       }

       $this->industryTypeRepository->delete($id);

       Flash::success(__('models/industryTypes.message.delete_success'));

       return redirect(route('industry_types.index'));
   }
}
