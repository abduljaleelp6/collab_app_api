<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Utils\ApiResponder;
use Illuminate\Support\Facades\DB;

use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
    use ApiResponder;
    public  $my_attachments =[];

   public function basic_email() 
   {
      $data = array('name'=>"Virat Gandhi");
   
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('abduljaleel@bewithcollab.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "Basic Email Sent. Check your inbox.";
   }

   public function html_email() 
   {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('abduljaleel@bewithcollab.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "HTML Email Sent. Check your inbox.";
   }

public function attachment_email() 
   {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('abduljaleel@bewithcollab.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }

    //send email functionality

public function send_mail(Request $request): \Illuminate\Http\JsonResponse
            {
            
                $rcvd = $request->toArray();
                $sndr="abduljaleel@bewithcollab.com";
                
                $emails_to_send = [];
                array_push($emails_to_send,$sndr);
                $country_list="";
                $activity_list="";

                   if(isset($rcvd['ourmails']))
                   {
                    foreach ($rcvd['ourmails'] as $eml)
                    {
                        array_push($emails_to_send, $eml);
                    }  
                   }
                   
                   if(isset($rcvd['email']))
                   {
                    array_push($emails_to_send,$rcvd['email']); 
                   }

                   if(isset($rcvd['country']))
                   {
                    $country=[];
                    foreach ($rcvd['country'] as $cnt)
                    {
                        array_push($country, "'".$cnt."'");
                    } 
                    $country_list=implode(",",$country);
                   }
                   
                   if(isset($rcvd['business_activity']))
                   {
                    $activity=[];
                    foreach ($rcvd['business_activity'] as $cnt)
                    {
                        array_push($activity, "'".$cnt."'");
                    } 
                    $activity_list=implode(",",$activity);
                   }
                   
                        
                           
                
                
                $qry="select business_email from business where 1 ";
                if($activity_list!="")
                {
                    $qry="select business_email from business";
                    $join_subactivity=" join sub_activities on business.business_sub_activity_id=sub_activities.activity_code ";
          
                  $qry.=$join_subactivity." and activity_english_name in (".$activity_list.")";

                }
                if($country_list!="")
                {
                
                  $qry.=" and country in (".$country_list.")";

                }
                
                
                       /*$results = DB::select($qry);
                
                        if (count($results) != 0) 
                        {
                            foreach ($results as $res) 
                                {
                            array_push($emails_to_send, $res->business_email);
                                }
                            return $this->successResponse($emails_to_send);
                        }*/
		
                $bdy=$rcvd['compose-body'];
                $sbjct=$rcvd['subject'];
                if($sbjct=="")
                {
                    $sbjct="Message from Collab";
                }

                //$to_email=$rcvd['ourmails'];
               
                $to_name="jk";
                 
                $data = array('name'=>$bdy, "body" => $bdy);
   
                    Mail::send('mail', $data, function($message) use ($to_name, $emails_to_send,$sbjct)
                    {
                        $message->to($emails_to_send)->subject
                            ($sbjct);
                        
                           //$message->attach('https://collab.ae/assets/img/logo1.jpg');
                           
                           

                        $message->from($address = 'info@collab.ae','Collab App');
                    });
                    //echo "Basic Email Sent. Check your inbox.";

                return $this->successResponse($emails_to_send, 'Emails Send Successfully..');
                        
            }
            static function uploadImage(Request $request, $key, $postName): string
                {

                        if ($request->hasFile($key)) {
                            $allowedExt = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'];
                            $orgRxt = $request->file($key)->getClientOriginalExtension();
                            $postName = str_replace(' ', '_', $postName);

                            if (in_array($orgRxt, $allowedExt)) {
                                $original_filename = $request->file($key)->getClientOriginalName();
                                $original_filename_arr = explode('.', $original_filename);
                                $file_ext = end($original_filename_arr);
                                $destination_path = 'images/mail_attachment/';
                                $image = 'P-' . str_replace(' ', '_', $request->input('post_text')) . '-' . $key . '.' . $file_ext;

                                if ($request->file($key)->move($destination_path, $image)) 
                                {
                                    return $destination_path . $image;
                                } 
                                else 
                                {
                                    return 'Cannot upload file';
                                }
                            } else {
                                return false;
                            }
                        } else {
                            return 'File not found';
                        }
                 }
                 public function my_email_uploads(Request $request) 
                 {
                    $file = $request->file('eml_attachment');
                 
                    //Display File Name
                   /* echo 'File Name: '.$file->getClientOriginalName();
                    echo '<br>';
                 
                    //Display File Extension
                    echo 'File Extension: '.$file->getClientOriginalExtension();
                    echo '<br>';
                 
                    //Display File Real Path
                    echo 'File Real Path: '.$file->getRealPath();
                    echo '<br>';
                 
                    //Display File Size
                    echo 'File Size: '.$file->getSize();
                    echo '<br>';
                 
                    //Display File Mime Type
                    echo 'File Mime Type: '.$file->getMimeType();
                 
                    //Move Uploaded File*/
                    $destinationPath = 'email_uploads';
                    //$fnm=''.$file->getClientOriginalName();
                    
                    
                    $file->move($destinationPath,$file->getClientOriginalName());
                    array_push($this->my_attachments, $file->getClientOriginalName());
                    return $this->my_attachments;
                 }
                 
}