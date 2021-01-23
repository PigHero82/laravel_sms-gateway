<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Info;
use App\Models\Group;
use App\Models\Outbox;
use App\Models\SMS;
use Config;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $credit = Info::firstInfo('credit');
        $customer = Customer::miniGetCustomer();
        $outbox = Outbox::miniGetOutbox();
        $group = Group::miniGetGroup();

        return view('pages.home.index', compact('credit', 'customer', 'group', 'outbox'));
    }
}
