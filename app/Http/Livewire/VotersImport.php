<?php

namespace App\Imports;

// use App\Models\User;
use App\Models\Voter;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
// use Maatwebsite\Excel\Concerns\WithProgressBar;


class VotersImport implements ToModel, WithHeadingRow, WithChunkReading
{
     private $voters;

    public function __construct()
    {
        $this->voters = Voter::all(['id', 'name'])->pluck('id', 'name');
    }

    public function model(array $row)
    {
     
        // $this->importing = true;  
        return new Voter([
            'name' => $row['name'],
            'epic_no' => $row['epic_no']
            
        ]);
    }

    public function chunkSize(): int
    {
        return 5000;
    }
}
