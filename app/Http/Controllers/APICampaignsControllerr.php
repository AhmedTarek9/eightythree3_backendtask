<?php

namespace App\Http\Controllers;
use App\Models\campaigns;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;


class APICampaignsControllerr extends Controller
{
    public function create_campaign(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'from' => 'required|date',
            'to' => 'required|date',
            'total' => 'required|numeric',
            'daily_budget' => 'required|numeric',
            'image' => 'required',
        ]);
        $input['name']=$request->name;
        $input['from']=$request->from;
        $input['to']=$request->to;
        $input['total']=$request->total;
        $input['daily_budget']=$request->daily_budget;
        $images=$request->file("image");
        $imagename='';
        foreach($images as $image)
           {
               $new_name=$image->getClientOriginalName();
               $image->move(public_path().'/images/', $new_name);  
               $imagename = $imagename.$new_name.'|';  
           }
           $imagedb=$imagename;
           $input['images']=$imagedb;
        $campaigns= campaigns::create($input);

        if(!empty($campaigns)){
			return response()->json(['message'=>'Success']);		
		}else{
			return response()->json(['message'=>'Error in Adding a campaign']);
		}
    }



    public function view_campaign(Request $request){
        $campaigns= campaigns::orderBy('id','desc')->get();
        if(!empty($campaigns)){
			return response()->json(['message'=>__('Successful.'),'campaigns'=>$campaigns]);	
		}else{
			return response()->json(['message'=>'Error in view a campaign']);
		}

    }

    public function update_campaign(Request $request){
        $validated = $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'name' => 'required|max:255',
            'from' => 'required|date',
            'to' => 'required|date',
            'total' => 'required|numeric',
            'daily_budget' => 'required|numeric',
        ]);
        $input['name']=$request->name;
        $input['from']=$request->from;
        $input['to']=$request->to;
        $input['total']=$request->total;
        $input['daily_budget']=$request->daily_budget;
        $campaigns= campaigns::where('id', $request->campaign_id)->first()->update($input);
        if(!empty($campaigns)){
			return response()->json(['message'=>__('Successful.')]);	
		}else{
			return response()->json(['message'=>'Error in update a campaign']);
		}

    }

    public function delete_campaign(Request $request){
        $validated = $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
        ]);

        $campaigns= campaigns::where('id', $request->campaign_id)->first()->delete();
        if(!empty($campaigns)){
			return response()->json(['message'=>__('Successful.')]);	
		}else{
			return response()->json(['message'=>'Error in delete a campaign']);
		}


    }
}
