<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\campaigns;
use Illuminate\Support\Facades\DB;
class CampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaignss=campaigns::all();
        return view('campaigns.index', [
            'campaignss' => DB::table('campaigns')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('campaigns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'from' => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d',
            'total' => 'required|numeric',
            'daily_budget' => 'required|numeric',
            'image' => 'required',
        ]);
        $input['name']=$request->name;
        $input['from']=$request->from;
        $input['to']=$request->to;
        $input['total']=$request->total;
        $input['daily_budget']=$request->daily_budget;
        if($request->hasfile('image'))
         {

            foreach($request->file('image') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data[] = $name;  
            }
         }
         $input['images']=implode('|',$data);
        $campaigns=campaigns::create($input);
        return redirect()->route('campaigns.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(campaigns $campaign)
    {
        return view('campaigns.view',compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(campaigns $campaign)
    {
        return view('campaigns.edit',compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, campaigns $campaign)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'from' => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d',
            'total' => 'required|numeric',
            'daily_budget' => 'required|numeric',
        ]);
        $campaign->update([
            "name"=>$request->name,
            "from"=>$request->from,
            "to"=>$request->to,
            "total"=>$request->total,
            "daily_budget"=>$request->daily_budget,
        ]);
        return redirect()->route('campaigns.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
