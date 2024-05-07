<?php
namespace App\Jobs;

use \App\Classes\HashCode;
use App\Models\Code;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateHashCodes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $hashcode;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->hashcode = new HashCode($data['length'], $data['prefix'] , $data['suffix'], $data['range']);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->hashcode->generate();

        foreach($this->hashcode->hashcodes as $code){
            try{
                Code::create([
                    'hash' => $code,
                    'status' => false
                ]);
            }catch(\Exception $ex){
                info($code);
            }
        }
    }
}
