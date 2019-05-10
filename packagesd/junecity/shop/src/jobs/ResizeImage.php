<?php

namespace junecity\shop\jobs;

use junecity\shop\jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;
use junecity\shop\models\Original;
use Junecity\shop\models\User;
use Image;
use Storage;
use junecity\shop\events\OriginalCreated;


class ResizeImage extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;
    protected $path;
    protected $original_key;
    protected $bucket;
    

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $path, $bucket, $original_key)
    {

        
        $this->user = $user;
        $this->path = $path;
        $this->bucket = $bucket;
        $this->original_key = $original_key;

        
    
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       


        $user = $this->user;
        $path = $this->path;
        $bucket = $this->bucket;
        $original_key = $this->original_key;


        $original = New Original;
        $original->user_id = $user->id;
        $original->original_url = $original_key;
        $original->save();
        
    
        $medium_file_name_400X400 = str_random(30).'-400X400.jpg';

        $small_file_name_200X200 = str_random(30).'-200X200.jpg';

        $thumb_file_name_60X60 = str_random(30).'-60X60.jpg';

        $medium_image = Image::make('https://'.$bucket.'.s3.amazonaws.com/'.$original_key);

        $small_image = Image::make('https://'.$bucket.'.s3.amazonaws.com/'.$original_key);

        $thumb_image = Image::make('https://'.$bucket.'.s3.amazonaws.com/'.$original_key);

        $medium_image->fit(400);

        $medium_image = $medium_image->stream();
       
        Storage::disk('s3')->put($path. '/' .$medium_file_name_400X400, $medium_image->__toString(), 'public');


        $small_image->fit(200);

        $small_image = $small_image->stream();
       
        Storage::disk('s3')->put($path. '/' .$small_file_name_200X200, $small_image->__toString(), 'public');


        $thumb_image->fit(60);

        $thumb_image = $thumb_image->stream();
       
        Storage::disk('s3')->put($path. '/' .$thumb_file_name_60X60, $thumb_image->__toString(), 'public');

        
        $original->medium_url = $path. '/' .$medium_file_name_400X400;

        $original->small_url = $path. '/' .$small_file_name_200X200;

        $original->thumb_url = 'https://s3.amazonaws.com/junecity.com/'.$path. '/' .$thumb_file_name_60X60;
        
        $original->thumb_key = $path. '/' .$thumb_file_name_60X60;

        $original->save();

        $test_original = Original::where('user_id', $user->id)->get();
        
        event(new OriginalCreated($test_original));
        
        

    }
}
