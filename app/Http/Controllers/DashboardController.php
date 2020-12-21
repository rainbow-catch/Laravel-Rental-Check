<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/21/2020
 * Time: 2:44 PM
 */

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }
}
