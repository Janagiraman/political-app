<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voter;

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

    public function updateVoterInfo(Request $request){
        $voter_id =  $request->voter_id;
        $type = $request->type;
        $value = $request->value;

        $voter = Voter::find($voter_id);
        $voter->$type = $value;
        if($voter->save()){
            return response()->json([
                'status' => 1,
                'message' => 'Succesfully Saved',
                'data' => $voter
            ]);
        }

        return response()->json([
            'status' => 0,
            'message' => 'Data not updated'
        ]);
    }
}
