<?php

namespace App\Http\Controllers;

use Session;
use Exception;
Use App\Models\User;
use Carbon\Carbon;
use \Stripe\Stripe;
use App\Models\Plan;
use App\Models\Subscription;
use Laravel\Cashier\Cashier;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;

class SubscriptionController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    public function retrievePlans() {
        $key = \config('services.stripe.secret');
        $stripe = new \Stripe\StripeClient($key);
        $plansraw = $stripe->plans->all();
        $plans = $plansraw->data;

        foreach($plans as $plan) {
            $prod = $stripe->products->retrieve(
                $plan->product,[]
            );
            $plan->product = $prod;
        }
        return $plans;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::orderBy('sort_index','desc')->where("status",1)->get();
        return view('subscription.create',[
            "plans"=>$plans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubscriptionRequest $request)
    {
        // dd($request->all());
        try {
            $plan = Plan::find($request->plan);
            $user =  $request->user();
            $subscription = $user->newSubscription($request->plan, $plan->stripe_plan_id)
                            ->create($request->token);

            $date = Carbon::createFromFormat('Y-m-d', $user->validity ?? date("Y-m-d"));
            $user->validity = $date->addDays($plan->validity);
            $user->save();
            return view("subscription_success",compact("subscription"));
        } catch (\Throwable $th) {
            throw $th;
            // return view("subscription_success",compact("subscription"));
        }


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $plan = Plan::query()->where([
            "id"=>$id,
            "status"=>1,
        ])->first();
            $intent = auth()->user()->createSetupIntent();

        // return view("subscription_2", compact("plan", "intent"));
        return view("subscription", compact("plan", "intent"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
