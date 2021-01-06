<?php

namespace App\Http\Controllers\Admin;

use App\AutoApprove;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
        $admin_nav = config('nav.admin');
        View::share('admin_nav', $admin_nav);
    }

    public function toggleAutoApprove($id){
        $temp = AutoApprove::find($id);
        $temp->update([
            'isAuto'=> !$temp->isAuto
        ]);
        return redirect()->back();
    }
}
