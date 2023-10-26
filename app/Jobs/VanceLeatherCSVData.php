<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Batchable;
use App\Models\vanceleather;
use App\Models\employe;

use Illuminate\Support\Facades\Log;

class VanceLeatherCSVData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $header;
    public $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data, $header)
    {
        $this->data = $data;
        $this->header = $header;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

          $counter = 0;
            foreach ($this->data as $vance) {
                $productInput = array_combine($this->header, $vance);
                // print_r($productInput);
                $vance = new vanceleather($productInput);
                // $vance->create($productInput);

                
                //  vanceleather::create(['Handle' => $productInput['Handle']]);
                // $this->insertFtn($productInput);
                $counter++;
                if ($counter >= 10) {
                    break; // Exit the loop after printing 10 items
                }
            }
    }

    public function insertFtn($pp){
       vanceleather::create($pp);

    }
    public function withBatchId($batchId)
    {
        $this->batchId = $batchId;

        return $this;
    }
}
