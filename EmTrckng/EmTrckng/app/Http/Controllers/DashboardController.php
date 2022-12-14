<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use App\Repositories\DashboardRepository;
use DB;

class DashboardController extends Controller
{
    /** @var  DashboardRepository */
    private $dashboardRepository;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DashboardRepository $dashboardRepo)
    {
        $this->dashboardRepository = $dashboardRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->dashboardRepository->GetData();
        return view('dashboard.index', $data);
    }
}
