<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\VoterService;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::get();
        if($services->isEmpty()){
                return response()->json([
                    'status' => 0,
                    'message' => 'No data found'

                ]);
        }
        return response()->json([
            'status' => 1,
            'data' => $services

        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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


    public function addVoterService(Request $request){

           $voterService = new VoterService();
           $epic_no =  $request->epic_no;
           $service_type =  $request->service_type;
           $is_provide_service = $request->is_provide_service;
           $image = $request->image;
           $comment = $request->comment;
           $latitude = $request->latitude;
           $longitude = $request->longitude;
           $user_id = $request->user_id;

           $voterService->epic_no = $epic_no;
           $voterService->service_type = $service_type;
           $voterService->is_provide_service = $is_provide_service;
           $voterService->image = $image;
           $voterService->comment = $comment;
           $voterService->latitude = $latitude;
           $voterService->longitude = $longitude;
           $voterService->user_id = $user_id;
           if($voterService->save()){
            return [
                'status' => 1, 
                'message' => 'Service added Successfully.'
            ];
        }



    }
}
