<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\IncompletePayment;



class SubscriptionController extends Controller
{
    // you can move this to a database table 
     private $plans = array(
        'standard_monthly' => 'price_1KpyUHEpWs7pwp46NqoIW3dr',
        'standard_annually'=> 'price_1KpyUHEpWs7pwp46bvRJH9lM',
        'premium_monthly'   =>   'price_1KpyYdEpWs7pwp46q31BU6vT',
        'premium_annually'=>  'price_1KpyYdEpWs7pwp46iGRz3829',
     );
     
    public function subscribe(Request $request)
    {
       
        
        // this is a demo make sure to add some validation logic
     
        $user = auth()->user();
        
       
        $planeName = in_array($request->planId,['standard_monthly','standard_annually']) ? 'standard' : 'premium';
      
        // check if the user already have subscribed to the plan
       if ($user->subscribed($planeName)) {
           
            return response()->json(['message' => 'You have already subscribed to this plan!'], 403);
        } 


        // get plan priceId
        $planPriceId = $this->plans[$request->planId];
        
   
        // It does what it says :p
        $user->createOrGetStripeCustomer();

        try {
           
            // subscribe user to plan
            $subscription = $user->newSubscription($planeName, $planPriceId)
            ->create($request->paymentMethodId);

           
            if($subscription->name == "standard"){

                $user->assignRole('standard-user');
                
            }else{
                $user->assignRole('premium-user');
            }
 
            return response()->json(['message' => 'Subscription was successfully completed!'], 200);


        } catch (IncompletePayment $exception) {
            
            return response()->json(['message' => 'Opps! Something went wrong.'], 400);
  
        }


    }
}