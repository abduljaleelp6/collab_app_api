<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\ApiResponder;
use App\Models\QuestUsers;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Mail;
class QuestUserController extends Controller
{
    //
    use ApiResponder;

    public function __construct()
    {
        $this->middleware('auth', [
            'only' => [
                'create',


            ]
        ]);

    }
    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
       /* $rules = [
            'GID' => 'required',//do email verification on mobile side
            'guest_name' => 'required',
            'guest_email' => 'required',
        ];*/
        try {
            $guest_data = $request->toArray();
            $otp=$this->generate_otp(4);
            $guest_data['guest_otp']=$otp;

           // $this->validate($request, $rules);
           $guest_usr = QuestUsers::where([
            //['guest_email', $request->input('guest_email')],
            ['guest_phone', $request->input('guest_phone')],
            //['guest_otp', $request->input('guest_otp')],
        ])->first();

        if($guest_usr)
        {
            $tbl="quest_users";
            $guest_data['updated_at']=date('Y-m-d H:i:s');
            DB::table($tbl)->where('guest_phone', $guest_data['guest_phone'])->update($guest_data);
        }
        else
        {
            $quest_user = QuestUsers::create($guest_data);



        }
            $guest_data['full_number']=str_replace("+","",$guest_data['guest_phone_code']).''.$guest_data['guest_phone'];
            $resu=app(\App\Http\Controllers\NotficationController::class)->send_sms_etisalat($guest_data['full_number'],"Please use the verification code below on the Collab Portal ".$guest_data['guest_otp']);
        $this->send_mail($guest_data);

        /*$fcm_token="d3Q_bqevQg66PP_UVJqzTI:APA91bE2yB5MGoO3N8GfGWv8zblRFLYj_Edt5CJGzxkQn_vrSoIr4-tVaMKthLjJivAAbe-c-_QtUzSAvGI9TSc6R6kIXVSC0ZRIULZUroHp6KNtbE7W6ereHkcxukw6AGi1bWTvP7H3";
        $fcm_token="";

        $body="";
        $title="someone has viewed your profile";
        $notify_type="Home Page";

        $notify_data = array(
            'title'  => $title,
            'body'  => $body,
            'notification_type'  => $notify_type,
            'fcm_token'  => $fcm_token,


        );
        app(\App\Http\Controllers\AdminController::class)->send_alert_Notification($notify_data);*/

        return $this->successResponse($guest_data);


        } catch (ValidationException $e) {
            return $this->errorResponse($e->response, 404, $request->all());
        }

        //here should send sma otp

    }

    public function guest_login(Request $request): JsonResponse
    {
        try
        {
            $guest_usr = QuestUsers::where([
                //['guest_email', $request->input('guest_email')],
                ['guest_phone', $request->input('guest_phone')],
                //['guest_otp', $request->input('guest_otp')],
            ])->first();

            if($guest_usr)
            {

                return $this->successResponse($guest_usr);
            }
            else
            {
                return $this->errorResponse('Invalid Credentials', Response::HTTP_BAD_REQUEST);
            }



        } catch (ValidationException $e) {
        return $this->errorResponse('Invalid Credentials', Response::HTTP_BAD_REQUEST);
        }
    }
    public function regenerate_otp(Request $request): JsonResponse
    {
        try
        {
            $tbl="quest_users";
            $guest_data = $request->toArray();
            $otp=$this->generate_otp(4);
            $guest_data['guest_otp']=$otp;
            $guest_data['updated_at']=date('Y-m-d H:i:s');

            $guest_usr = QuestUsers::where([
                //['guest_email', $request->input('guest_email')],
                ['guest_phone', $request->input('guest_phone')],
                //['guest_otp', $request->input('guest_otp')],
            ])->first();

            if($guest_usr)
            {

                DB::table($tbl)->where('guest_phone', $guest_data['guest_phone'])->update($guest_data);

                $this->send_mail($guest_data);
                return $this->successResponse($guest_data,"otp regenerated successfully");
            }
            else
            {
                return $this->errorResponse('Invalid Mobile No', Response::HTTP_BAD_REQUEST);
            }





        } catch (ValidationException $e) {
        return $this->errorResponse('Invalid Mobile No', Response::HTTP_BAD_REQUEST);
        }
    }
    public function send_otp($guest_data)
    {
        //app(\App\Http\Controllers\SearchController::class)->notification_mail("OTP Received");
        return $this->successResponse($guest_data);
    }
    public function send_mail($guest_data)
            {

                #$rcvd = $request->toArray();
                $bdy="Please use the verification code below on the Collab Portal ".$guest_data['guest_otp'];
                $to_name="Admin";
                $emails_to_send=[$guest_data['guest_email']];
                //$sbjct="Approvel Notification";
                $sbjct="OTP from Collab Portal";
                        $data = array('name'=>$bdy, "body" => $bdy);

                            Mail::send('mail', $data, function($message) use ($to_name, $emails_to_send,$sbjct)
                            {
                                $message->to($emails_to_send)->subject
                                    ($sbjct);

                                   //$message->attach('https://collab.ae/assets/img/logo1.jpg');



                                $message->from($address = 'info@collab.com','Collab App');
                            });
                            return $this->successResponse($guest_data);
            }
    public function generate_otp( $number ) {
        // Generate set of alpha characters
        $randomNumber = random_int(1000, 9999);
        return $randomNumber;
        $alpha = array();
        for ($u = 65; $u <= 90; $u++) {
            // Uppercase Char
            array_push($alpha, chr($u));
        }

        // Just in case you need lower case
        // for ($l = 97; $l <= 122; $l++) {
        //    // Lowercase Char
        //    array_push($alpha, chr($l));
        // }

        // Get random alpha character
        $rand_alpha_key = array_rand($alpha);
        $rand_alpha = $alpha[$rand_alpha_key];

        // Add the other missing integers
        $rand = array($rand_alpha);
        for ($c = 0; $c < $number - 1; $c++) {
            array_push($rand, mt_rand(0, 9));
            shuffle($rand);
        }

        return implode('', $rand);
    }
    public function get_all_guest_users(): JsonResponse
    {

		$results = DB::select('select * from quest_users where guest_status=1');

		if (count($results) != 0)
		{
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no guest usersfound', Response::HTTP_NOT_FOUND);
        }
	}
    public function editgueststatus(Request $request)
    {
        $tbl="quest_users";

         /*$rules = [
            'BID' => 'required',
            'post_text' => 'required',
			'post_image' => 'required|file',
            'post_type' => '',

        ];*/
		try {
            //$this->validate($request, $rules);
			$post = $request->toArray();

           $data=array(
                'guest_status' => $post['guest_status'],
                'updated_at' => date('Y-m-d H:i:s'),
                );

            DB::table($tbl)->where('guest_id', $post['guest_id'])->update($data);

            return $this->successResponse($post, 'Guest status updated successfully');

			} catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }
    public function delete_guest_user(Request $request)
    {
        $advr = $request->toArray();
        $ad_id=$advr['guest_id'];

        $adv = QuestUsers::where('guest_id', $ad_id)->first();

        if ($adv) {
              QuestUsers::where('guest_id', $ad_id)->delete();

            return $this->successResponse('Guest user successfully deleted',$adv);
        } else {
            return $this->errorResponse('no data found with given id', 404);
        }

    }
}
