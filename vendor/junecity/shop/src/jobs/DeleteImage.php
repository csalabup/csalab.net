<?php

namespace junecity\shop\jobs;

use junecity\shop\jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;


use Storage;
use junecity\shop\models\Original;
use Junecity\shop\models\User;


class DeleteImage extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $id;
    protected $user;
    protected $path;
    protected $bucket;
   

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $user, $path, $bucket)
    {
        $this->id = $id;
        $this->user = $user;
        $this->path = $path;
        $this->bucket = $bucket;
        

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        $id = $this->id;
        $user = $this->user;
        $path = $this->path;
        $bucket = $this->bucket;
      


        $original = Original::where('user_id', $user->id)->where('id', $id)->first();

        Storage::disk('s3')->delete($original->small_url);
        
        Storage::disk('s3')->delete($original->original_url);

        Storage::disk('s3')->delete($original->medium_url);

        Storage::disk('s3')->delete($original->thumb_url);

        $original->delete();

        

    }
}
