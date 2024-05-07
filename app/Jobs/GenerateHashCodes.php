<?php
namespace App\Jobs;

use App\Models\Code;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateHashCodes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $length;

    /**
     * Create a new job instance.
     */
    public function __construct($length)
    {
        $this->length = $length;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        for ($i=0; $i < 1000; $i++) {
            try{
                Code::create([
                    'hash' => substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890') , 0 , $this->length),
                    'status' => false
                ]);
            }catch(\Exception $ex){
                info('Error Code Duplicated !');
            }
        }
    }
}
