<?php

namespace App\Http\Controllers;

use App\Utils\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Models\MessageNotifications;

class AdminController extends Controller
{
    use ApiResponder;
    public $app_token="";
    public static $auto_token="";
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    public function get_data_to_pass()
    {
        $token = openssl_random_pseudo_bytes(50);

//Convert the binary data into hexadecimal representation.
        $token = bin2hex($token);
        self::$auto_token=$token;
        $data = [
            'mytoken' => "INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC",
            'test_tkn'=> self::$auto_token,
        ];

        return $data;
    }
    public function get_Url_Auth()
    {
        //if($this->app_token!=""&&session()->has('uname'))
        if(session()->has('uname'))
        {
            return true;

        }
        else
        {
            return false;
        }
    }
    public function index()
    {
        //session()->put('uname','admin');

          // if(session()->has('uname'))
          if($this->get_Url_Auth())
            {
                //return view('adminhome');
                //return view('dash');

                return view('dash', ['result' => $this->get_data_to_pass()]);

            }
            else
            {

              return $this->login();
            }


    }

    public function subactivity_summary()
    {
        if($this->get_Url_Auth())
        {
            return view('subactivity_summary');
        }
        else
        {
            return view('myerror');
        }

    }
    public function getHomeCounter(): JsonResponse
    {
        $results=app(\App\Http\Controllers\SearchController::class)->get_Home_Counter();
        $info = [
            'totproduct' => $results['pcount'],//do email verification on mobile side
            'totbusiness' => $results['bcount'],
            'totfeeds' => $results['feed_count'],
            'totadds' => $results['adds_count'],
        ];
        return $this->successResponse($info);

    }

    public function productlist()
    {
        if($this->get_Url_Auth())
        {
            return view('productlist');
        }
        else
        {
            return view('myerror');
        }

    }
    public function create_user()
    {

        return view('create_user');
    }

    public function add_advertisement()
    {
        if($this->get_Url_Auth())
        {
            return view('add_advertisement');
        }
        else
        {
            return view('myerror');
        }

    }


    public function postcategorylist()
    {

        if($this->get_Url_Auth())
        {
            return view('postcategorylist');
        }
        else
        {
            return view('myerror');
        }

    }
    public function addpostcategory()
    {


        if($this->get_Url_Auth())
        {
            return view('addpostcategory');
        }
        else
        {
            return view('myerror');
        }
    }

    public function logintest()
    {

        return view('log');
    }
    public function addsubcategory()
    {


        if($this->get_Url_Auth())
        {
            return view('addsubcategory');
        }
        else
        {
            return view('myerror');
        }
    }

    public function addcategory()
    {


        if($this->get_Url_Auth())
        {
            return view('addcategory');
        }
        else
        {
            return view('myerror');
        }

    }
    public function login()
    {


        return view('log');
    }
    public function logout()
    {
        session()->forget('uname');
        return $this->index();
     }
    public function terms()
    {

        return view('terms');
    }
    public function support()
    {

        return view('support');
    }
    public function faq()
    {
        $data= DB::select('select * from help_faq where faq_status=1 order by display_order');
        return view('faq', ['result' => $data]);
    }
    public function composemail()
    {

        if($this->get_Url_Auth())
        {
            return view('mailcompose');
        }
        else
        {
            return view('myerror');
        }
    }
    public function advertisement_category()
    {

        if($this->get_Url_Auth())
        {
            return view('adds_category_list');
        }
        else
        {
            return view('myerror');
        }
    }
    public function addlist()
    {

        if($this->get_Url_Auth())
        {
            return view('addlist');
        }
        else
        {
            return view('myerror');
        }
    }

    public function product()
    {


        if($this->get_Url_Auth())
        {
            return view('product');
        }
        else
        {
            return view('myerror');
        }
    }
    public function businessList()
    {
        if($this->get_Url_Auth())
        {
            return view('business', ['result' => $this->get_data_to_pass()]);

         //return view('business');
        }
        else
        {
            return view('myerror');
        }

    }

    public function sidemenu()
    {

        return view('adminmenu');
    }
    public function subactivity()
    {



        if($this->get_Url_Auth())
        {
            return view('addsubactivity');
        }
        else
        {
            return view('myerror');
        }

    }
    public function add_activity()
    {



        if($this->get_Url_Auth())
        {
            return view('add_activity');
        }
        else
        {
            return view('myerror');
        }

    }


    public function subactivitylist()
    {


        if($this->get_Url_Auth())
        {
            return view('subactivitylist');
        }
        else
        {
            return view('myerror');
        }
    }
    public function activitylist()
    {


        if($this->get_Url_Auth())
        {
            return view('activitylist');
        }
        else
        {
            return view('myerror');
        }
    }
    public function categorylist()
    {


        if($this->get_Url_Auth())
        {
            return view('categorylist');
        }
        else
        {
            return view('myerror');
        }
    }
    public function subcategorylist()
    {
        if($this->get_Url_Auth())
        {
            return view('subcategorylist');
        }
        else
        {
            return view('myerror');
        }


    }
    public function parameter_list()
    {
        if($this->get_Url_Auth())
        {
            return view('parameter_list');
        }
        else
        {
            return view('myerror');
        }


    }
    public function guest_list()
    {
        if($this->get_Url_Auth())
        {
            return view('guestlist');
        }
        else
        {
            return view('myerror');
        }


    }
    public function guest_create()
    {
        if($this->get_Url_Auth())
        {
            return view('add_guest');
        }
        else
        {
            return view('myerror');
        }


    }
    public function create_group()
    {
        if($this->get_Url_Auth())
        {
            return view('chat_group_create');
        }
        else
        {
            return view('myerror');
        }


    }

    public function add_group_member()
    {
        if($this->get_Url_Auth())
        {
            return view('chat_group_create_member');
        }
        else
        {
            return view('myerror');
        }


    }
    public function chat_group_list()
    {
        if($this->get_Url_Auth())
        {
            return view('chat_group_list');
        }
        else
        {
            return view('myerror');
        }


    }
    public function postreportlist()
    {


        if($this->get_Url_Auth())
        {
            return view('postreport');
        }
        else
        {
            return view('myerror');
        }
    }
    public function postlist()
    {


        if($this->get_Url_Auth())
        {
            return view('postlist');
        }
        else
        {
            return view('myerror');
        }
    }
    public function rfq_list()
    {


        if($this->get_Url_Auth())
        {
            return view('quote_list');
        }
        else
        {
            return view('myerror');
        }
    }

    public function approval_list()
    {

        $results['business']= DB::select('select * from business where business_account_status=0');
        $results['products']= DB::select('select * from products where product_status=0');
        $results['posts']= DB::select('select * from posts where post_status=0');

        $results['adds'] = DB::select('select * from advertisement where ad_status=0');
            return view('approval_page', ['result' => $results]);



    }

    public function Edit($SID)
    {
        $data= DB::select('select * from sub_activities where id='.$SID);
        return view('editsubactivity', ['result' => $data]);
       // return view('editsubactivity')->with($data);

        //return view('editsubactivity');
    }



    public function updateBusinessStatus(Request $request): JsonResponse
    {

        $rules = [

            'BID' => 'bail|required|unique:business',  //bail to stop operation when first validation failure
            'business_email' => 'required|max:255|unique:business',//do email verification on mobile side

        ];
        try {
           // $this->validate($request, $rules);
            $business = $request->toArray();
            $businessLogoPath="";
            $businessCoverPath="";






            $data=array(
            'BID' => $business['BID'],
            'business_email' => $business['business_email'],

            'updated_at' => date('Y-m-d H:i:s'),
                );

            DB::table('business')->where('BID', $business['BID'])->update($data);

            return $this->successResponse($data, 'Business Successfully Updated', $request);

        } catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }
    public function userValidate(Request $request)
    {

         $rules = [
            'user_name' => 'required',
            'password' => 'required',


        ];
		try {
            $udetails = $request->toArray();
            $results=app(\App\Http\Controllers\SearchController::class)->get_Dashboard_Users($udetails);
           //if($udetails['user_name']=="collab"&&$udetails['password']=="admin@321")
           if(count($results)!=0)
           {
            session()->put('uname',$results[0]->name);
            session()->put('utype',$results[0]->utype);
            session()->put('mytoken','jk@321##');
            return $this->successResponse($udetails, '1');
           }
           else
           {
            return $this->successResponse($udetails, '0');
           }

        }


			 catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);
        return $this->successResponse($validatedData , '1');
        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'user' => $user, 'access_token' => $accessToken]);
    }
    public function sendNotification(Request $request)
    {

        //$firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
        $firebaseToken =array();
        $chatBids =array();

        $rcvd = $request->toArray();
        if($request->store_type!="saveonly")
        {
        //print_r($request->token_list);
        //return;
        if($request->token_list=="")
        {
            $data1=DB::select("select fcm_token from business where fcm_token!=''");
            foreach ($data1 as $res)
            {
             //$business_token=$res->fcm_token;
             array_push($firebaseToken, $res->fcm_token);

            }
        }
        else
        {


             foreach ($rcvd['token_list'] as $cnt)
             {

                 array_push($firebaseToken, $cnt);
             }



        }
            if($request->store_type=="chat_message") {
                $fromBID="291d4e2d-9057-4cb1-b4ad-e05d68396ef0_07f28550-e490-11eb-9562-85ac7659847c"; //collab
               // $fromBID="330f515a-1d1d-477a-a672-506be4024a17_ea1d1780-8da8-11ec-a711-c71686c6d423"; //collab support
                $data1 = DB::select("select BID,fcm_token from business where business_account_status=1");
                foreach ($data1 as $res) {
                    //$business_token=$res->fcm_token;
                    //array_push($firebaseToken, $res->fcm_token);
                    //array_push($chatBids, $res->BID);
                    date_default_timezone_set('Asia/Dubai');
                    $current_date_time = date('Y-m-d H:i:s');
                    $data = array(
                        'from_user_id' => $fromBID,
                        "to_user_id" => $res->BID,
                        "message" => $request->body,
                        "date" => date("Y-m-d"),
                        "time" => date('h:i A', strtotime($current_date_time)));
                    DB::table('message')->insert($data);
                }
                /*if ($request->chat_list == "") {
                    $data1 = DB::select("select BID,fcm_token from business where BID='24c3a3c7-b913-4a1f-9a85-d23ebd07615a_1ecb2710-e3b8-11eb-bf79-09c326791bd3'");
                    foreach ($data1 as $res) {
                        //$business_token=$res->fcm_token;
                        array_push($firebaseToken, $res->fcm_token);
                        array_push($chatBids, $res->BID);
                    }
                } else {


                    foreach ($rcvd['chat_list'] as $cnt) {

                        // array_push($firebaseToken, $cnt);
                        array_push($chatBids, $res->BID);
                    }


                }
                foreach ($chatBids as $chatBID) {
                    $current_date = date("Y-m-d");
                    $data = array(
                        'from_user_id' => '291d4e2d-9057-4cb1-b4ad-e05d68396ef0_07f28550-e490-11eb-9562-85ac7659847c',
                        "to_user_id" => $chatBID,
                        "message" => $request->body,
                        "date" => $current_date,
                        "time" => '10:10pm');
                    DB::table('message')->insert($data);

                }   */
            }
        $SERVER_API_KEY = 'AAAAp9H3UpA:APA91bHM-j1C6I-SmWCX1duN7caatAi38idjrP9SGVwRRz_GyYJ7CFMfY4_DJmLowv8r3M9OP4AeV6ozjLt_oQ3oert2vkoSPaZW_Tz9mDW5Xc88PiA4jjkbi0MmIhaHIBSOCG-D3CFW';
       // $SERVER_API_KEY = 'dHjXeMzNEENrgD-xQ06RDn:APA91bGpaxmCDQQZxNBkhpQO6uIjAJXNpgTcMUFN-S0T6HS3enH3NSLh39ZlI26B_EdIvtflNlWwtoxOfG1USYs119Q8wyyX8SS_CkGE7TtToivxl-_20MfBZXrXCYp1zk8ZovGGMA3h';



        $data = [
            "registration_ids" => $firebaseToken,
            //"to" => "eCBfmp2YS1iF5yUaP8iI13:APA91bE6DgrhHDyVTtWMvyyrYVZAFJhqGwhV-EOimBbXGswWkiG7tuZ6hb22ehFD3rCpqrtYmWqxQoWKuqVHcXlTSnOOyPre3EHTQPS0-2lke-fpBQacp0Yq_P0ijGfc68UY54XsQD78",
           // "to" => $request->test_token,
           //"to" => "dHjXeMzNEENrgD-xQ06RDn:APA91bGpaxmCDQQZxNBkhpQO6uIjAJXNpgTcMUFN-S0T6HS3enH3NSLh39ZlI26B_EdIvtflNlWwtoxOfG1USYs119Q8wyyX8SS_CkGE7TtToivxl-_20MfBZXrXCYp1zk8ZovGGMA3h",
          "notification" => [
              "click_action"=> "FLUTTER_NOTIFICATION_CLICK",
                "title" => $request->title,
                "body" => $request->body,
                "page_option"=>$request->notification_type,
                "screen"=> $request->notification_type,
                //
                "data" => [
                    "click_action"=> "FLUTTER_NOTIFICATION_CLICK",
                    "title" => $request->title,
                    "body" => $request->body,
                    "page_option"=>$request->notification_type,
                    "screen"=> $request->notification_type,
                ],
            ],
           "data" => [
               "click_action"=> "FLUTTER_NOTIFICATION_CLICK",
                "title" => $request->title,
                "body" => $request->body,
                "page_option"=>$request->notification_type,
               "screen"=> $request->notification_type,
            ],

           // "condition"=> "'all' in topics || 'android' in topics || 'ios' in topics"

        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
    }
        if($request->store_type=="savesend"||$request->store_type=="saveonly"||$request->store_type=="chat_message")
        {
            app(\App\Http\Controllers\NotficationController::class)->create_notification($request);
        }



  echo $response;
        //dd($response);
    }

    public function sendChatNotification($bid,$msg,$from_bid)
    {

       $business_token="";
       $sender_name=$from_bid;

        $SERVER_API_KEY = 'AAAAp9H3UpA:APA91bHM-j1C6I-SmWCX1duN7caatAi38idjrP9SGVwRRz_GyYJ7CFMfY4_DJmLowv8r3M9OP4AeV6ozjLt_oQ3oert2vkoSPaZW_Tz9mDW5Xc88PiA4jjkbi0MmIhaHIBSOCG-D3CFW';
       // $SERVER_API_KEY = 'dHjXeMzNEENrgD-xQ06RDn:APA91bGpaxmCDQQZxNBkhpQO6uIjAJXNpgTcMUFN-S0T6HS3enH3NSLh39ZlI26B_EdIvtflNlWwtoxOfG1USYs119Q8wyyX8SS_CkGE7TtToivxl-_20MfBZXrXCYp1zk8ZovGGMA3h';

       //for both chat and update business token section.
       if($sender_name!="")
      {
       $data1=DB::select("select fcm_token from business where BID='".$bid."'");
       foreach ($data1 as $res)
       {
        $business_token=$res->fcm_token;
       }
      }
      else
      {
        $business_token=$bid;
      }

      //end
       //return response($msg);
        $data = [
            //"registration_ids" => $firebaseToken,
            //"to" => "eCBfmp2YS1iF5yUaP8iI13:APA91bE6DgrhHDyVTtWMvyyrYVZAFJhqGwhV-EOimBbXGswWkiG7tuZ6hb22ehFD3rCpqrtYmWqxQoWKuqVHcXlTSnOOyPre3EHTQPS0-2lke-fpBQacp0Yq_P0ijGfc68UY54XsQD78",
            "to" => $business_token,
           //"to" => "dHjXeMzNEENrgD-xQ06RDn:APA91bGpaxmCDQQZxNBkhpQO6uIjAJXNpgTcMUFN-S0T6HS3enH3NSLh39ZlI26B_EdIvtflNlWwtoxOfG1USYs119Q8wyyX8SS_CkGE7TtToivxl-_20MfBZXrXCYp1zk8ZovGGMA3h",
          "notification" => [
                "title" => 'Chat Message',
                "body" => $msg,
                "page_option"=>'1',
                "sender_name"=>$sender_name,
              "click_action"=> "FLUTTER_NOTIFICATION_CLICK",
              "screen"=> "mychatlist",
                //"click_action"=> "mychatlist",

                //
                "data" => [
                    "click_action"=> "FLUTTER_NOTIFICATION_CLICK",
                    "title" => 'Chat Message',
                "body" => $msg,
                "page_option"=>'1',
                "sender_name"=>$sender_name,

                    "screen"=> "mychatlist",
                ],
            ],
           "data" => [
               "click_action"=> "FLUTTER_NOTIFICATION_CLICK",
            "title" => 'Chat Message',
            "body" => $msg,
            "page_option"=>'1',
            "sender_name"=>$sender_name,
               "screen"=> "mychatlist",

            ],

           // "condition"=> "'all' in topics || 'android' in topics || 'ios' in topics"

        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
  //echo $response;
        //dd($response);
    }
    public function generate_notification()
    {

        return view('generate_notification');
    }
    public function saveToken(Request $request)
    {
        //auth()->user()->update(['device_token'=>$request->token]);
        return response()->json([$request->token]);
    }

    public function general_alert_notification(Request $request): JsonResponse
    {
        try {

        $rcvd = $request->toArray();
        $fcm_token="";
        $fcm_token="d3Q_bqevQg66PP_UVJqzTI:APA91bE2yB5MGoO3N8GfGWv8zblRFLYj_Edt5CJGzxkQn_vrSoIr4-tVaMKthLjJivAAbe-c-_QtUzSAvGI9TSc6R6kIXVSC0ZRIULZUroHp6KNtbE7W6ereHkcxukw6AGi1bWTvP7H3";
        //$fcm_token=$rcvd['fcm_token'];

        $body=$rcvd['body'];
        $title=$rcvd['title'];
        #$notify_type=$rcvd['notify_type'];

        $bid=$rcvd['BID'];

        if($bid!="")
        {
         $data1=DB::select("select fcm_token from business where BID='".$bid."'");
         foreach ($data1 as $res)
         {
            $fcm_token=$res->fcm_token;
         }
        }
        $notify_type="Home Page";

        $notify_data = array(
            'title'  => $title,
            'body'  => $body,
            'notification_type'  => $notify_type,
            'fcm_token'  => $fcm_token,


        );
        $results=app(\App\Http\Controllers\AdminController::class)->send_alert_Notification($notify_data);
        return $this->successResponse($results);

        } catch (ValidationException $e) {
            return $this->errorResponse("Error", $e->getCode(), $request->all());
        }//end of catch

    }
    public function send_alert_Notification($notify_data)

    {

        //$firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
        $firebaseToken =array();


        $title=$notify_data['title'];
        $body=$notify_data['body'];
        $notification_type=$notify_data['notification_type'];

        if($notify_data['fcm_token']=="")
        {
            $data1=DB::select("select fcm_token from business where fcm_token!=''");
            foreach ($data1 as $res)
            {

             array_push($firebaseToken, $res->fcm_token);
            }
        }
        else
        {
            array_push($firebaseToken, $notify_data['fcm_token']);

        }


        $SERVER_API_KEY = 'AAAAp9H3UpA:APA91bHM-j1C6I-SmWCX1duN7caatAi38idjrP9SGVwRRz_GyYJ7CFMfY4_DJmLowv8r3M9OP4AeV6ozjLt_oQ3oert2vkoSPaZW_Tz9mDW5Xc88PiA4jjkbi0MmIhaHIBSOCG-D3CFW';
       // $SERVER_API_KEY = 'dHjXeMzNEENrgD-xQ06RDn:APA91bGpaxmCDQQZxNBkhpQO6uIjAJXNpgTcMUFN-S0T6HS3enH3NSLh39ZlI26B_EdIvtflNlWwtoxOfG1USYs119Q8wyyX8SS_CkGE7TtToivxl-_20MfBZXrXCYp1zk8ZovGGMA3h';



        $data = [
            "registration_ids" => $firebaseToken,
            //"to" => "eCBfmp2YS1iF5yUaP8iI13:APA91bE6DgrhHDyVTtWMvyyrYVZAFJhqGwhV-EOimBbXGswWkiG7tuZ6hb22ehFD3rCpqrtYmWqxQoWKuqVHcXlTSnOOyPre3EHTQPS0-2lke-fpBQacp0Yq_P0ijGfc68UY54XsQD78",
           // "to" => $request->test_token,
           //"to" => "dHjXeMzNEENrgD-xQ06RDn:APA91bGpaxmCDQQZxNBkhpQO6uIjAJXNpgTcMUFN-S0T6HS3enH3NSLh39ZlI26B_EdIvtflNlWwtoxOfG1USYs119Q8wyyX8SS_CkGE7TtToivxl-_20MfBZXrXCYp1zk8ZovGGMA3h",
          "notification" => [
                "title" => $title,
                "body" => $body,
                "page_option"=>$notification_type,
                //
                "data" => [
                    "title" => $title,
                    "body" => $body,
                    "page_option"=>$notification_type,
                ],
            ],
           "data" => [
                "title" => $title,
                "body" => $body,
                "page_option" => $notification_type,
            ],

           // "condition"=> "'all' in topics || 'android' in topics || 'ios' in topics"

        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
        return $this->successResponse($response, 'Notification generated Succesfully');

        //dd($response);
    }



}
