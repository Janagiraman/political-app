<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voter;
use App\Models\VoterInfos;
use App\Models\VoterService;

class VotersController extends Controller
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

    public function searchByEpicno(Request $request){
          $value = $request->value;
          $type = $request->type;

          if($type == 'epicno'){
              $voter = Voter::where('epic_no','=', $value)->get();
          }
          if($type == 'voter_name'){
            $voter = Voter::where('voter_name','LIKE','%'.$value.'%')->get();
        }
          if($voter->isEmpty()){
                return response()->json([
                    'status' => 0,
                    'message' => 'No data found'
                ]);
          }
          return response()->json([
            'status' => 1,
            'data' => $voter
        ]);

    }

    public function voterInfo(Request $request){
        $value = $request->epic_no;
        if($value != ''){
            $voterInfo = VoterInfos::with('user:id,name')->where('epic_no','=', $value)->get();
        }

        if($voterInfo->isEmpty()){
              return response()->json([
                  'status' => 0,
                  'message' => 'No data found'
              ]);
        }
        return response()->json([
          'status' => 1,
          'data' => $voterInfo,
          'image_path' => 'http://anjanadridb.com/images/voters/'
        ]);

  }

  public function voterServices(Request $request, Exception $e){

    $value = $request->epic_no;
    if($value != ''){
        $voterService = VoterService::with('user:id,name')->where('epic_no','=', $value)->get();
    }
    if($voterService->isEmpty()){
          return response()->json([
              'status' => 0,
              'message' => 'No data found'
          ]);
    }
    return response()->json([
      'status' => 1,
      'data' => $voterService,
      'image_path' => 'http://anjanadridb.com/service_images/'
    ]);

}

    public function updateVoterInfo(Request $request){
      

        $voterInfo = new VoterInfos();
        $voterInfo->voter_id = $request->voter_id;
        $voterInfo->user_id = $request->user_id;
        $voterInfo->doc_type = $request->doc_type;
        $voterInfo->value = $request->value;
        $voterInfo->epic_no = $request->epic_no;
        $voterInfo->latitude = $request->latitude;
        $voterInfo->longitude = $request->longitude;
        $voterInfo->comment = $request->comment;

        if($voterInfo->save()){

             $voterId = $voterInfo->id;
             $voterImage = VoterInfos::find($voterId);
             if ($file = $request->file('image')) {
                   $name = $voterId.'_'.$voterInfo->epic_no.'_'.time().'.'.$request->image->extension(); 
                   $request->image->move(public_path('images/voters'), $name);
                   $voterImage->image = $name;
                   $voterImage->save();
             }  
            

            return response()->json([
                'status' => 1,
                'message' => 'Succesfully Saved',
            ]);
        }

        return response()->json([
            'status' => 0,
            'message' => 'Something went wrong'
        ]);
    }
}
