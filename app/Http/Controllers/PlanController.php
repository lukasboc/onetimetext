<?php

namespace App\Http\Controllers;

use App\Models\Text;
use App\Models\User;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;

class PlanController extends Controller
{

    public function pro()
    {
        return view('plans.pro');
    }

    public function welcome()
    {
        return view('plans.welcome');
    }

    public function whoops()
    {
        return view('plans.whoops');
    }

    public function order(Request $request)
    {
        $user = $request->user();
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

        $priceId = config('services.subscription.price');

         return ($user->newSubscription('default', $priceId)
            ->checkout([
                'success_url' => route('welcome'),
                'cancel_url' => route('whoops'),
            ]));
    }

    public function stripeOptions()
    {
        return ;
    }

    public function dashboard(Request $request)
    {

        $user = $request->user();
        $userId = $user->id;

        $texts = DB::table('texts')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        $textSize = sizeof($texts);

        $membership = "Free";
        if ($user->subscribed()) {
            $membership = "Pro";
        }


        $ended = false;
        if ($user->subscription('default')->cancelled()) {
            $ended = true;
        }

        return view('plans.dashboard', [
            'texts' => $texts,
            'textsAmount' => $textSize,
            'membership' => $membership,
            'ended' => $ended,
        ]);
    }

    public function billingPortal(Request $request)
    {
        return $request->user()->redirectToBillingPortal(route('membership'));
    }

    public function membership(Request $request)
    {
        $user = User::find($request->user()->id);
        $membership = "Free";
        $endDate = '00.00.0000';

        if ($user->subscribed()) {
            $membership = "Pro";

            if($user->subscription()->cancelled()){
                $endDate = date_format(date_timezone_set(date_create_from_format("Y-m-d H:i:s",auth()->user()->subscription()->ends_at, new DateTimeZone('UTC')),new DateTimeZone('Europe/Berlin')),"d.m.Y");
            }
        }

        return view('plans.membership', [
            'membership' => $membership,
            'name' => $user->name,
            'email' => $user->email,
            'endDate' => $endDate,
        ]);
    }

    public function deleteUserView(Request $request)
    {
        return view('plans.deleteUser');
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->user()->id);

        DB::transaction(function () use ($user) {
            DB::table('texts')->where('user_id', $user->id)->delete();
            DB::table('users')->where('id', $user->id)->delete();
        });
        Auth::logout();
        //ggf. E-Mail dein Konto wurde gelöscht. Schade...
        return redirect(url('/'));
    }
}
