<?php
namespace App\Imports;
use App\Models\Voter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithEvents;



class TestImport implements ToModel, WithHeadingRow, WithEvents
{
    public $sheetNames;
    public $sheetData;

    public function __construct(){
        $this->sheetNames = [];
        $this->sheetData = [];
    }
   
    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function(BeforeSheet $event) {
                $this->sheetNames[] = $event->getSheet()->getDelegate()->getTitle();
                
            } 
        ];
    }

    public function model(array $row)
    {

        
        if($row['epic_no'] != ''){
            $voter = Voter::where('epic_no','=',$row['epic_no'])->first();
            if ($voter === null) {
                    return new Voter([
                         'booth_no' => $row['booth_no'],
                         'booth_name' => $row['booth_name'],
                         'area_name' => $row['village_area_name'],
                        // 'ward_name' => $row['panchayath_ward_name'],
                         'sl_no' => $row['sl_no'],
                         'epic_no' => $row['epic_no'],
                         'voter_name' => $row['name'],
                     ]);
            }
        }
    }

}