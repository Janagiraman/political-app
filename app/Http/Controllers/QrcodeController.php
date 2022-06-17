<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voter;
use QrCode;
use PDF;

class QrcodeController extends Controller
{
    public function index(Request $request)
    {

        $id = $request->id;
        $voter = Voter::find($id);
        $qr_code = QrCode::size(300)->generate($voter->epic_no);
        $data = [
            'image' => $voter->voterService->image,
            'name' => $voter->voter_name,
            'epic_no' => $voter->epic_no,
            'age' => $voter->age            
        ];
        // $pdf = PDF::loadView('qrPdf',['data'=>$data, 'qr_code' => $qr_code]);
        // return $pdf->download($voter->voter_name.'.pdf');
        // exit;
        // exit;
        // $data = [
        //     'title' => 'Welcome to Tutsmake.com',
        //     'date' => date('m/d/Y'),
        //     'qr_code'=>QrCode::size(300)->generate('A basic example of QR code!')
        // ];

        // // print_r($data);
        // // exit;
           
        //  $pdf = PDF::loadView('qrPdf', ['data'=>$data]);
     
        // return $pdf->download('tutsmake.pdf');
            
    }
}
