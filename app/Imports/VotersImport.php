<?php

namespace App\Imports;

// use App\Models\User;
use App\Models\Voter;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithProgressBar;


class VotersImport implements ToModel, WithHeadingRow, WithChunkReading
{
     private $voters;
     use Importable;

    public function __construct()
    {
        $this->voters = Voter::all(['id', 'voter_name'])->pluck('id', 'voter_name');
    }

    // public function rules(): array
    // {
    //     return [
    //         'epic_no' => Rule::unique('voters', 'epic_no'), // Table name, field in your db
    //     ];
    // }

    // public function customValidationMessages()
    // {
    //     return [
    //         'epic_no.unique' => 'Voter already inserted',
    //     ];
    // }

    public function model(array $row)
    {
        // echo '<pre>';
        // print_r($row);
        // exit;
        if($row['epic_no'] != ''){
            $voter = Voter::where('epic_no','=',$row['epic_no'])->first();
            if ($voter === null) {
                    return new Voter([
                         'booth_no' => $row['booth_no'],
                         'booth_name' => $row['booth_name'],
                         'area_name' => $row['village_area_name'],
                         'ward_name' => $row['village_ward_name'],
                         'sl_no' => $row['sl_no'],
                         'epic_no' => $row['epic_no'],
                         'voter_name' => $row['voter_name'],
                        // 'relation_name' => $row['relation_name'],
                        // 'gender' => $row['sex'],
                        // 'age' => $row['age']                   
                    ]);
            }
        }
    }

    public function chunkSize(): int
    {
        return 5000;
    }
}
