<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Charts;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        // $chart = Charts::database($users, 'bar', 'highcharts')
        //           ->title("Monthly new Register Users")
        //           ->elementLabel("Total Users")
        //           ->dimensions(1000, 500)
        //           ->responsive(false)
        //           ->groupByMonth(date('Y'), true);

        return view('dashboard');
    }

    public function chartSample1()
    {
        $data = array(
            "chart" => array(
                "labels" => ["First", "Second", "Third"]
            ),
            "datasets" => array(
                array("name" => "Sample 1", "values" => array(10, 3, 7)),
                array("name" => "Sample 2", "values" => array(1, 6, 2)),
            )
        );

        return $data;
    }

    public function chartSample2(){
        $data = array(
            "chart" => array(
                "labels" => ["First", "Second", "Third"]
            ),
            "datasets" => array(
                array("name" => "Sample 1", "values" => array(10, 3, 7)),
                array("name" => "Sample 2", "values" => array(1, 6, 2)),
            )
        );

        return $data;
    }
}
