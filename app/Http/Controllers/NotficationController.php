<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Models\MessageNotifications;
use App\Utils\ApiResponder;

class NotficationController extends Controller
{
    //
    use ApiResponder;
    function create_notification(Request $request)
    {
        $ndata = [

            "title" => $request->title,
            "description" => $request->body,
            "type" =>$request->notification_type,
            "notification_value" =>$request->notification_value,

        ];
		try {
            $ndata  = MessageNotifications::create($ndata);

            return $this->successResponse($ndata, 'Post added successfully');



			} catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }
    public function getNotifications(): JsonResponse
    {

		$results = DB::select('select * from notifications where n_status=1');

		if (count($results) != 0)
		{
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no notifications found', Response::HTTP_NOT_FOUND);
        }
	}
    public function getNotificationsByMember(Request $request): JsonResponse
    {
        $rcvd = $request->toArray();
        $BID=$rcvd['bid'];
        $type=$rcvd['type'];

        ///update last date
        $latest_date="";
        $current_date=date('Y-m-d');

        $results1 = DB::select("select updated_at from business where BID='".$BID."'");

         if (count($results1) != 0)
         {
         $latest_date=$results1[0]->updated_at;

         }

         //// last active
         if($BID!="")
         {
             $data=array(

                 //'business_latest_notification' => date('Y-m-d H:i:s'),
                 'updated_at' => date('Y-m-d H:i:s'),

             );

        $res=DB::table('business')->where('BID', $BID)
       // ->where('business_password',$password)
        ->update($data);
       }



         /////
        if($type=="view")
        {
            $results = DB::select("select * from notifications where n_status=1 order by created_at DESC");
           // $results = DB::select("select * from notifications where n_status=1 and DATE(created_at) = '".$current_date."' order by created_at DESC");

           // $results = DB::select("select * from notifications where n_status=1 and created_at>'".$latest_date."' order by created_at DESC");

           // "SELECT COUNT(business_name),business_name from business join products on business.BID=products.BID group by business.BID,business_name";









//select english_name as title,LEFT(product_description, 40) as desription,'memberproducts' as type from products WHERE DATE(product_creation_date) = CURDATE();
//select BID,english_name as title,LEFT(product_description, 30) as description,'memberproducts' as type from products
//select business.BID,CONCAT(business_name,' added new products ') as title,LEFT(product_description, 30) as description,'memberproducts' as type from products join business on products.BID=business.BID limit 5;

if (count($results) != 0)
		{
		return $this->successResponse($results);

        }
		else
		{
            return $this->errorResponse('no notifications found '.$current_date, Response::HTTP_NOT_FOUND);
        }
    }
    else
    {
       $results = DB::select("select count(*) as tot_notification from notifications where n_status=1");
       // $results = DB::select("select count(*) as tot_notification from notifications where n_status=1 and created_at>'".$latest_date."'");
        //$results = DB::select("select count(*) as tot_notification from notifications where n_status=1 and DATE(created_at)='".$current_date."'");

       $cnt=0;
         if (count($results) != 0)
         {
         $cnt=$results[0]->tot_notification;

         }

         //return $this->successResponse($latest_date);
         return $this->successResponse($cnt);

    }
	}
	//SMS OTP
    public function send_sms_test(Request $request)
    {

        $rcvd = $request->toArray();
        if(isset($rcvd['to_phone_no'])&&isset($rcvd['sms_body']))
        {

            $to_num=$rcvd['to_phone_no'];
            $sms_body=$rcvd['sms_body'];

           // echo $this->send_bulk_sms_etisalat(str_replace("+","",$rcvd['to_phone_no']),$rcvd['sms_body']);
            echo $this->send_sms_etisalat($rcvd['to_phone_no'],$rcvd['sms_body'],"Collab OTP",);

            //$this->send_sms_twilio($to_num,$sms_body);
            //$this->send_whatsapp_twilio($to_num,$sms_body);
            //$this->send_sms_etisalat();
        }
        else
        {
           return "Invalid inputs" ;
        }

        //$this->get_sms_token_etisalat();
    }
    public function generateMessges(Request $request)
    {

        $rcvd = $request->toArray();
        $cnt=0;

       // return $this->successResponse($rcvd);
            //$sender_id="AD-COLLAB";
        $sender_id="AD-LIBRARY";
            if($rcvd['BID']=="0dd3a082-41c3-4055-b99f-5782d4e34d96_a24300c0-817c-11eb-9487-e1ea84824c75")
            {
                $sender_id="AD-LIBRARY";
            }

            $sms_body=$rcvd['sms_body'];
            $camp_name=$rcvd['campaignName'];

            if(isset($rcvd['to_phone_no_list']))
            {
                foreach($rcvd['to_phone_no_list'] as $to_phone)
                {
                    $cnt++;
                    $response=  $this->send_bulk_sms_etisalat(str_replace("+","",$to_phone['to_phone_no']),$sms_body,$sender_id,$camp_name);

                }
            }
            else
            {
                return "Invalid inputs" ;
            }

        $result = array(
            "total"=> $cnt,
        );

        //"total"=> $cnt,
        return $this->successResponse($result,"message succesfully generated",200,$rcvd);
        //$this->get_sms_token_etisalat();
    }
    public function get_sms_token_etisalat()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://smartmessaging.etisalat.ae:5676/login/user/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            //CURLOPT_POSTFIELDS =>'{"username":"MOHA4663","password":"Collab@321"}',
            CURLOPT_POSTFIELDS =>'{"username":"Collab","password":"Collab@321"}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                        ),
        ));

        $response = curl_exec($curl);
       // return  json_decode($response);
        //return $this->successResponse(json_decode($response),"test",200);

       // curl_close($curl);
        $json_object = json_decode($response);
       return $json_object->token;
    }
    public function get_sms_token_new($uname,$pass)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://smartmessaging.etisalat.ae:5676/login/user/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{"username":'.$uname.',"password":'.$pass.'}',
            //CURLOPT_POSTFIELDS =>'{"username":"Collab","password":"Collab@321"}',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);

        // curl_close($curl);
        $json_object = json_decode($response);
        return $json_object->token;
    }
    public function send_sms_etisalat($phone,$sms_body,$camp_name)
    {
    /*    -‘4.2’: Represents OTP messages
 -‘4.5’: Represents transactional
 -‘4.6’: Represents promotional(default)          */

        $token=$this->get_sms_token_etisalat();

        //$token=$this->get_sms_token_new("Collab","Collab@321");
        //echo $token;
        $data = array(
            "desc"=> "This is the description for campaign",
        "campaignName"=> $camp_name,
        "msgCategory"=> "4.6",      //4.6 for promotional
        "contentType"=> "3.2",
        //"senderAddr"=> "AD-LIBRARY",
        "senderAddr"=> "COLLAB",
        "dndCategory"=> "Campaign",
        "priority"=>1,
        "clientTxnId"=> 112346587965,
        "recipient"=> $phone,
        //"expiryDt"=> '2022-01- 26T09:07:19.096 Z',
        "dr" => "1",
        "msg"=> $sms_body
        );
        $payload = json_encode($data);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://smartmessaging.etisalat.ae:5676/campaigns/submissions/sms/nb',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$payload,

            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$token,
                'Content-Type: application/json',
                //'Cookie: TS010979f4=018c9c821b14cab59671c0627696ed1c6c42cfc09aa423da8203e852e3165d66fa4a3ef5ce9c9cc7d2278ccd8024ad843d8d19107e'
            ),
        ));

        $response = curl_exec($curl);

        //curl_close($curl);
        //$json_object = json_decode($response);
        //echo $json_object->token;
        return $response;


    }
    public function send_bulk_sms_etisalat($phone,$sms_body,$sender_id,$camp_name)
    {
        /*    -‘4.2’: Represents OTP messages
     -‘4.5’: Represents transactional
     -‘4.6’: Represents promotional(default)          */

        $token=$this->get_sms_token_etisalat();
        //echo $token;
        $data = array(
            "desc"=> "This is the description for campaign",
            "campaignName"=> $camp_name,
            "msgCategory"=> "4.6",      //4.6 for promotional
            "contentType"=> "3.2",
            "senderAddr"=> "$sender_id",
           // "senderAddr"=> "AD-LIBRARY",
            //"senderAddr"=> "AD-COLLAB",
            "dndCategory"=> "Campaign",
            "priority"=>1,
            "clientTxnId"=> 112346587965,
            //"recipients"=> ["971529673539"],
            "recipient"=> $phone,
            //"expiryDt"=> '2022-01- 26T09:07:19.096 Z',
            "dr" => "1",
            "msg"=> $sms_body
        );
        $payload = json_encode($data);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://smartmessaging.etisalat.ae:5676/campaigns/submissions/sms/nb',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$payload,
           /* CURLOPT_POSTFIELDS =>'{
 "msgCategory": "4.6",
 "contentType": "3.1",
 "senderAddr": "COLLAB",
 "dndCategory": "sports",
 "priority": 1,
 "clientTxnId": "112346587963",
 "schTime": "2022-01-26T08:07:19.096Z",
 "expiryDt": "2022-01-27T09:07:19.096Z",
 "desc": "This is the description for campaign",
 "campaignName": "test campaign",
 "recipients": [
 "971529673539"
 ],

 "msg": {
 "en": "here is the promotional message"
 },
 "defLang": "en",
 "dr": "1"
}',  */
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$token,
                'Content-Type: application/json',
                //'Cookie: TS010979f4=018c9c821b14cab59671c0627696ed1c6c42cfc09aa423da8203e852e3165d66fa4a3ef5ce9c9cc7d2278ccd8024ad843d8d19107e'
            ),
        ));

        $response = curl_exec($curl);

        //curl_close($curl);
        //$json_object = json_decode($response);
        //echo $json_object->token;
        return $response;


    }
    public function send_sms_twilio($to_num,$sms_body)
    {





       /* $data = [
            "Body" => "Hi there",
             "From"=>"+15017122661",
             "To"=>"+971529673539",
         ];
         $dataString = json_encode($data);

         $TWILIO_ACCOUNT_SID="AC88963b9e90b6c1b814ea1e956ccd1848";
         $TWILIO_AUTH_TOKEN="0bf9b00ab1242c2bcbaaad6add1c20a0";
        $url = "https://api.twilio.com/2010-04-01/Accounts/$TWILIO_ACCOUNT_SID/Messages.json";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Authorization: Basic 0bf9b00ab1242c2bcbaaad6add1c20a0",
);
//curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_USERPWD, $TWILIO_ACCOUNT_SID . ':' . $TWILIO_AUTH_TOKEN);
//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POSTFIELDS, $dataString);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);*/
         //$url = "https://api.twilio.com/2010-04-01/Accounts/$TWILIO_ACCOUNT_SID/Messages.json";
        $ch = curl_init();
        $data = [
           "Body" => $sms_body,
            "From"=>"+15713228824",
            //"To"=>$to_num,
            "toBinding" => $subscribers,
            "MessagingServiceSid"=>'MG690e479e0bb51ced74b42c4d8d102dd2',
        ];
        $dataString = json_encode($data);

        $TWILIO_ACCOUNT_SID="AC88963b9e90b6c1b814ea1e956ccd1848";
        $TWILIO_AUTH_TOKEN="0bf9b00ab1242c2bcbaaad6add1c20a0";
        //$headers = array();
        //$headers[] = 'Content-Type: application/x-www-form-urlencoded';
        //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_URL, "https://api.twilio.com/2010-04-01/Accounts/$TWILIO_ACCOUNT_SID/Messages.json");
        curl_setopt($ch, CURLOPT_POST, true);

        //curl_setopt($ch, CURLOPT_POSTFIELDS, '{"To":"+971529673539"}');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_USERPWD, $TWILIO_ACCOUNT_SID . ':' . $TWILIO_AUTH_TOKEN);
        $response = curl_exec($ch);
        echo $response;

    }


    ///bitly url api

    public function send_sms_url(Request $request)
    {
        $rcvd = $request->toArray();
        if(isset($rcvd['long_url']))
        {

            $long_url=$rcvd['long_url'];

            $this->generate_bitly_url($long_url);
        }
        else
        {
           return "Invalid inputs" ;
        }
    }
    public function generate_bitly_url($long_url)
    {

$apiv4 = 'https://api-ssl.bitly.com/v4/bitlinks';
$genericAccessToken = 'a2dc022b465ccb116058d21eb4739b084a1be21c';

$data = array(
    'long_url' => $long_url
);
$payload = json_encode($data);

$header = array(
    'Authorization: Bearer ' . $genericAccessToken,
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload)
);

$ch = curl_init($apiv4);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$result = curl_exec($ch);
return $this->successResponse($result);
//echo $result;
//print_r($result);
    }
    public function send_whatsapp_twilio($to_num,$sms_body)
    {


        $ch = curl_init();
        $data = [
           "Body" => $sms_body,
            "From"=>"whatsapp:+14155238886",
            "To"=>"whatsapp:".$to_num,
            //"toBinding" => $subscribers,
            "MessagingServiceSid"=>'MG690e479e0bb51ced74b42c4d8d102dd2',
        ];
        $dataString = json_encode($data);

        $TWILIO_ACCOUNT_SID="AC88963b9e90b6c1b814ea1e956ccd1848";
        $TWILIO_AUTH_TOKEN="0bf9b00ab1242c2bcbaaad6add1c20a0";
        //$headers = array();
        //$headers[] = 'Content-Type: application/x-www-form-urlencoded';
        //curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_URL, "https://api.twilio.com/2010-04-01/Accounts/$TWILIO_ACCOUNT_SID/Messages.json");
        curl_setopt($ch, CURLOPT_POST, true);

        //curl_setopt($ch, CURLOPT_POSTFIELDS, '{"To":"+971529673539"}');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_USERPWD, $TWILIO_ACCOUNT_SID . ':' . $TWILIO_AUTH_TOKEN);
        $response = curl_exec($ch);
        echo $response;

    }
    function send_whatsapp($message="Test"){
        $phone="+49123123123";  // Enter your phone number here
        $apikey="123456";       // Enter your personal apikey received in step 3 above

        $url='https://api.callmebot.com/whatsapp.php?source=php&phone='.$phone.'&text='.urlencode($message).'&apikey='.$apikey;

        if($ch = curl_init($url))
        {
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $html = curl_exec($ch);
            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            // echo "Output:".$html;  // you can print the output for troubleshooting
            curl_close($ch);
            return (int) $status;
        }
        else
        {
            return false;
        }
    }
}
