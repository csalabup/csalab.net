<?php

namespace junecity\shop\jobs;

use junecity\shop\jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use junecity\shop\events\EditImage;

use Illuminate\Http\Request;
use junecity\shop\models\Original;
use Junecity\shop\models\User;
use Image;
use Storage;

class UpdateResizeImage extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $id;
    protected $user;
    protected $path;
    protected $original_url;
    protected $bucket;
 

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $path, $bucket, $original_url, $user)
    {
        $this->id = $id;
        $this->path = $path;
        $this->bucket = $bucket;
        $this->original_url = $original_url;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $id = $this->id;
        $path = $this->path;
        $bucket = $this->bucket;
        $original_url = $this->original_url;
        $user = $this->user;
        
        $original = Original::where('id', $id)->first();

        $original_file_to_delete = $original->original_url;

        $medium_file_to_delete = $original->medium_url;

        $small_file_to_delete = $original->small_url;

        $thumb_file_to_delete = $original->thumb_url;




        Storage::disk('s3')->delete($original_file_to_delete);
        
        Storage::disk('s3')->delete($medium_file_to_delete);

        Storage::disk('s3')->delete($small_file_to_delete);

        Storage::disk('s3')->delete($thumb_file_to_delete);


        $updated_original_file_name = str_random(30).'-updated-original.jpg';

        $updated_medium_file_name_400X400 = str_random(30).'-updated-400X400.jpg';

        $updated_small_file_name_200X200 = str_random(30).'-updated-200X200.jpg';

        $updated_thumb_file_name_60X60 = str_random(30).'-updated-60X60.jpg';


        $updated_original_image = Image::make($original_url);

        $updated_medium_image = Image::make($original_url);

        $updated_small_image = Image::make($original_url);

        $updated_thumb_image = Image::make($original_url);


        $updated_original_image = $updated_original_image->stream();
        
        Storage::disk('s3')->put($path. '/' .$updated_original_file_name, $updated_original_image->__toString(), 'public');

    
        $updated_medium_image->fit(400);

        $updated_medium_image = $updated_medium_image->stream();

        Storage::disk('s3')->put($path. '/' .$updated_medium_file_name_400X400, $updated_medium_image->__toString(), 'public');
       

        $updated_small_image->fit(200);

        $updated_small_image = $updated_small_image->stream();
        
        Storage::disk('s3')->put($path. '/' .$updated_small_file_name_200X200, $updated_small_image->__toString(), 'public');

        
        $updated_thumb_image->fit(60);

        $updated_thumb_image = $updated_thumb_image->stream();
        
        Storage::disk('s3')->put($path. '/' .$updated_thumb_file_name_60X60, $updated_thumb_image->__toString(), 'public');


        
        $original->original_url = $path. '/' .$updated_original_file_name;
        $original->medium_url = $path. '/' .$updated_medium_file_name_400X400;
        $original->small_url = $path. '/' .$updated_small_file_name_200X200;
        $original->thumb_url = $path. '/' .$updated_thumb_file_name_60X60;
        
        $original->thumb_key = 'https://s3.amazonaws.com/junecity.com/'.$path. '/' .$updated_thumb_file_name_60X60;

        

        $original->save();

       $edit_original = Original::where('user_id', $user->id)->get();
        
       event(new EditImage($edit_original, $user));
        

    }
}
