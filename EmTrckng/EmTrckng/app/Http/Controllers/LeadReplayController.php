<?php

namespace App\Http\Controllers;

use App\Models\LeadReplay;
use Illuminate\Http\Request;

class LeadReplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->file('attachment')))
        {
            $image = $request->file('attachment');
            $filename = $image->getClientOriginalName();
            $image->move(public_path().'/leadAttachments/',$filename);

        }
        else
        {
            $filename = '';
        }
        

        
        if(!empty($filename))
        {
            LeadReplay::create([
                'lead_id' => $request->lead_id,
                'comment' => $request->comment,
                'attachment' => $filename,
                'created_by' => auth()->user()->id
            ]);
        }
        else{

            LeadReplay::create([
                'lead_id' => $request->lead_id,
                'comment' => $request->comment,
                'attachment' => '',
                'created_by' => auth()->user()->id
            ]);
        }

        return redirect(route('leads.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeadReplay  $leadReplay
     * @return \Illuminate\Http\Response
     */
    public function show(LeadReplay $leadReplay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeadReplay  $leadReplay
     * @return \Illuminate\Http\Response
     */
    public function edit(LeadReplay $leadReplay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeadReplay  $leadReplay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeadReplay $leadReplay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeadReplay  $leadReplay
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeadReplay $leadReplay)
    {
        //
    }
}
