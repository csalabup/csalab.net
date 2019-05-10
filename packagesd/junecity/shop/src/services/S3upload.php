<?php

namespace junecity\shop\services;



class S3upload
{

  protected $access_key;     
  protected $secret_key;      
  protected $bucket;         
  protected $region;         
  protected $success_redirect;
  protected $allowd_file_size;


  public function __construct($access_key, $secret_key, $bucket, $region, $success_redirect, $allowd_file_size, $url_key, $path)
    {
    
        $this->access_key = $access_key;     
        $this->secret_key = $secret_key;      
        $this->bucket = $bucket;         
        $this->region = $region;          
        $this->success_redirect = $success_redirect; 
        $this->allowd_file_size = $allowd_file_size;
        $this->url_key = $url_key;
        $this->path = $path;
            
    }

   public function Upload()
    {
         
          $access_key = $this->access_key;       
          $secret_key = $this->secret_key;        
          $bucket = $this->bucket;           
          $region = $this->region;            
          $success_redirect = $this->success_redirect;   
          $allowd_file_size = $this->allowd_file_size;
          $url_key = $this->url_key;
          $path = $this->path;


          //dates
          $short_date         = gmdate('Ymd'); //short date
          $iso_date           = gmdate("Ymd\THis\Z"); //iso format date
          $expiration_date    = gmdate('Y-m-d\TG:i:s\Z', strtotime('+1 hours')); //policy expiration 1 hour from now
          
          //POST Policy required in order to control what is allowed in the request
          //For more info http://docs.aws.amazon.com/AmazonS3/latest/API/sigv4-HTTPPOSTConstructPolicy.html
          $policy = utf8_encode(json_encode(array(
          'expiration' => $expiration_date,
          'conditions' => array(
          array('acl' => 'public-read'),
          array('bucket' => $bucket),
          array('success_action_redirect' => $success_redirect),
          array('starts-with', '$key', $path),
          array('starts-with', '$Content-Type', 'image/'),
          array('content-length-range', '1', $allowd_file_size),
          array('x-amz-credential' => $access_key.'/'.$short_date.'/'.$region.'/s3/aws4_request'),
          array('x-amz-algorithm' => 'AWS4-HMAC-SHA256'),
          array('X-amz-date' => $iso_date)
          
          ))));
        


          //Signature calculation (AWS Signature Version 4)
          //For more info http://docs.aws.amazon.com/AmazonS3/latest/API/sig-v4-authenticating-requests.html
          $kDate = hash_hmac('sha256', $short_date, 'AWS4' . $secret_key, true);
          $kRegion = hash_hmac('sha256', $region, $kDate, true);
          $kService = hash_hmac('sha256', "s3", $kRegion, true);
          $kSigning = hash_hmac('sha256', "aws4_request", $kService, true);
          $signature = hash_hmac('sha256', base64_encode($policy), $kSigning);
          $bpolicy = base64_encode($policy);


          return array($signature, $bpolicy, $short_date, $iso_date);



    }

 

}
