<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Request;
use App\Models\UserAttendance;
use App\Models\User;
use Laracasts\Flash\Flash;
use App\DataTables\UserAttendanceDataTable;
use App\Repositories\UserAttendanceRepository;
use App\Http\Controllers\AppBaseController;
use DB;

class UserAttendanceController extends AppBaseController
{
    /** @var  UserAttendanceRepository */
    private $userAttendanceRepository;

    public function __construct(UserAttendanceRepository $userAttendanceRepo)
    {
        $this->userAttendanceRepository = $userAttendanceRepo;
    }

    public function index(UserAttendanceDataTable $userAttendanceDataTable)
    {
        return $userAttendanceDataTable->render('user_attendance.index');
    }

    public function show($id)
    {
        $userAttendance = $this->userAttendanceRepository->find($id);
        
        if (empty($userAttendance)) {
            Flash::error(__('models/userAttendance.message.not_found'));

            return redirect(route('user_attendance.index'));
        }

        return view('user_attendance.show')->with('userAttendance', $userAttendance); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAttendance  $userAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAttendance $userAttendance)
    {
        //
    }
}
