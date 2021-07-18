<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortenUrl;
use App\Models\User;
use App\Models\PlanUser;
use App\Models\Plan;


class ShortenUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortenUrls = ShortenUrl::latest()->get();
        $plan = auth()->user()->activePlan();
   
        return view('url_listing', compact('shortenUrls', 'plan'));
    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'url' => 'required|url'
        ]);

        $planUser = PlanUser::where(['is_active'=>1, 'user_id' => auth()->user()->id])->first();

        $message = empty($planUser) ? 'User not Found': Null; 
        $message = empty($planUser->available_limit) ? 'Sorry, Limit Exhausted!' : Null; 
        
        if(!empty($message)) {
            \Session::flash('alert-class', 'alert-danger');
            \Session::flash('message',$message); 
            return json_encode(['fail'=> $message]);
        }
   
        $input['url'] = $request->url;
        $input['short_url'] = \Str::random(6);
        $input['activated_at'] = now();
   
        ShortenUrl::create($input);
        $planUser->available_limit--;
        $planUser->used_limit++;
        $planUser->save();

        \Session::flash('message','Shorten Link Generated Successfully!'); 
        \Session::flash('alert-class', 'alert-success');
  
        return json_encode(['success'=> 'Shorten Link Generated Successfully!']);
    }

    public function delete(Request $request)
    {
        $request->validate([
           'url_id' => 'required'
        ]);

        $shortenUrl = ShortenUrl::where('id', intval($request->url_id))->first();

        if(!empty($shortenUrl)){
            $shortenUrl->status = ShortenUrl::STATUS_DEACTIVATE;
            $shortenUrl->delete();
            $shortenUrl->save();

            $planUser = PlanUser::where(['is_active'=>1, 'user_id' => auth()->user()->id])->first();

            $planUser->available_limit++;
            $planUser->used_limit--;
            $planUser->save();

            return json_encode(['success'=> 'Shorten Link Deleted Successfully!']);
        } 

        \Session::flash('alert-class', 'alert-danger');
        \Session::flash('message','URL not Found!'); 
        return json_encode(['fail'=> 'Url not Found!']);        
    }
   

    public function updateStatus(Request $request)
    {
        $request->validate([
           'url_id' => 'required'
        ]);

        $shortenUrl = ShortenUrl::where('id', $request->url_id)->first();

        $message ='Url not Found!';
        \Session::flash('message',$message); 

        if(!empty($shortenUrl)){

            if($shortenUrl->status == ShortenUrl::STATUS_DEACTIVATE){
                \Session::flash('alert-class', 'alert-danger');
                \Session::flash('message','Deleted Url can\'t be Activated/In-Activated again!'); 

                return json_encode(['fail'=> 'Deleted Url can\'t be Activated/In-Activated again!']);
            }

            $shortenUrl->status = ($shortenUrl->status == ShortenUrl::STATUS_ACTIVE) ? ShortenUrl::STATUS_INACTIVE : ShortenUrl::STATUS_ACTIVE;
            $shortenUrl->save();

            $message = ($shortenUrl->status == ShortenUrl::STATUS_ACTIVE) ? 'Activated' : 'In-Activated';
            $message = "Shorten Link {$message} Successfully!";

            \Session::flash('message',$message); 
            \Session::flash('alert-class', 'alert-success');


            return json_encode(['success'=> $message]);
        } 
        \Session::flash('alert-class', 'alert-danger'); 

        return json_encode(['message'=> $message]);
        
    }

    public function upgradePlan(Request $request)
    {
        $request->validate([
           'plan_id' => 'required'
        ]);

        $user = auth()->user();
        $cuurentPlanUser = $user->activePlan()->pivot;
        $cuurentPlanUser->is_active = PlanUser::STATUS_INACTIVE;
        $cuurentPlanUser->save();

        $plan = Plan::where('id','=',$request->plan_id)->first();

        /* 
         * for future reference 
         * if($cuurentPlanUser->used_limit > $plan->url_limit){
         *     return json_encode(['fail'=> 'Already exhausted'.$plan->name.'\'s! limit']);
         * }
         */

        PlanUser::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'available_limit' => $plan->url_limit - $cuurentPlanUser->used_limit,
            'used_limit' => $cuurentPlanUser->used_limit,
            'is_active' => PlanUser::STATUS_ACTIVE,
        ]);

        \Session::flash('message','Plan Upgraded Successfully!'); 
        \Session::flash('alert-class', 'alert-success');

        return json_encode(['success'=> 'Plan Upgraded Successfully!']);        
    }

    public function editUrl(Request $request)
    {
        $request->validate([
           'url_id' => 'required',
           'url' => 'required|url'
        ]);


        $shortenUrl = ShortenUrl::where('id', $request->url_id)->first();
        
        if(!empty($shortenUrl)) {
            $shortenUrl->url = $request->url;
            $shortenUrl->save();
            
            \Session::flash('message','URL Updated Successfully!'); 
            \Session::flash('alert-class', 'alert-success');

            return json_encode(['success'=> 'URL Updated Successfully!']);
        }
        
        \Session::flash('alert-class', 'alert-danger');
        \Session::flash('message','URL not Found!'); 
        return json_encode(['fail'=> 'URL not Found!']);
    
    }
}
