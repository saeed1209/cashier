<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChargeController extends Controller
{
    public function index()
    {

        return view('stripe');
    }

    public function store(Request $request)
    {

        $plan = 'plan_GaSwBUE2i8BhQj';
        $user = User::find(1);
        if (Carbon::create($user->trial_ends_at)->isFuture()) {
            $user->newSubscription('main', $plan)
                ->trialDays(30)
                ->create($request->token);
        }
    }
}
