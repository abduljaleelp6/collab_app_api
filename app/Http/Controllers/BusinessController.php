<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\Activity;
use App\Models\Business;
use App\Models\Following;
use App\Models\Product;
use App\Models\SubActivity;
use App\Models\Post;
use App\Models\Advertisement;
use App\Models\AuthenticationDocument;
use App\Utils\ApiResponder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use League\Flysystem\Exception;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{
    use ApiResponder;


    public function __construct()
    {
        $this->middleware('auth', [
            'only' => [
                'createNewBusiness',
                'getAllBusiness',
                'getBusinessByBID',
                'getBusinessByMainActivity',
                'getBusinessBySubActivity',
                'getBusinessRandomCategory',
                'getBusinessRandomCategory_list',
                'updateBusiness',
                'getAllBusiness_list',
                'deleteAccount',
            ]
        ]);
    }

    /*
     * ->select('users.id', 'users.name', \DB::raw("COUNT('posts.id') AS post_count"))
       ->join('users', 'users.id', '=', 'posts.user_id')
       ->orderBy('post_count', 'desc')
       ->groupBy('users.id')
       ->take(5)
       ->get();
    */
    public function getBusinessRandomCategory(): JsonResponse
    {
        /*$result = [];
        $categories = DB::select('SELECT T1.business_sub_activity_id,activity_english_name FROM(SELECT distinct(business_sub_activity_id) FROM business ORDER BY rand() LIMIT 5) T1 join sub_activities on T1.business_sub_activity_id=sub_activities.activity_code ORDER BY activity_english_name;');
        //$result['categories']=$categories;
        if (count($categories) != 0) {
            foreach ($categories as $cat)
            {
                //$business = Business::where('business_sub_activity_id', $cat->activity_code);

                $business = DB::select("select * from business where business_sub_activity_id='".$cat->business_sub_activity_id."'");
                $data['title']=$cat->activity_english_name;
                $data['business']=$business;
                //old format
                //$result[$cat->activity_english_name]=$business;

                array_push($result, $data);
            }
            return $this->successResponse($result);
        } else {
            return $this->errorResponse('no buisness found', Response::HTTP_NOT_FOUND);
        }
        //return $this->successResponse($categories);*/
        return $this->getBusinessRandomCategory_list("");
    }
    public function getBusinessRandomCategory_list($country_code): JsonResponse
    {
        $result = [];
        $country_qry="";
        $bstats=" and business_account_status=1 ";
        if($country_code!="")
        {
            $country_qry.=" and business_country_code='".$country_code."' ";
        }
    //$categories = DB::select('SELECT T1.business_sub_activity_id,activity_english_name FROM(SELECT distinct(business_sub_activity_id) FROM business where business_account_status=1 '.$country_qry.' ORDER BY rand() LIMIT 5) T1 join sub_activities on T1.business_sub_activity_id=sub_activities.activity_code ORDER BY activity_english_name;');

    //$categories = DB::select('SELECT T1.business_sub_activity_id,activity_english_name FROM(SELECT distinct(business_sub_activity_id) FROM business where business_account_status=1 '.$country_qry.') T1 join sub_activities on T1.business_sub_activity_id=sub_activities.id ORDER BY activity_english_name;');
    $categories = DB::select('SELECT T1.business_sub_activity_id,activity_english_name FROM(SELECT business_sub_activity_id,count(business_sub_activity_id) FROM business where business_account_status=1 '.$country_qry.' group by business_sub_activity_id having count(business_sub_activity_id) >2) T1 join sub_activities on T1.business_sub_activity_id=sub_activities.id ORDER BY activity_english_name;');


        //$result['categories']=$categories;
        if (count($categories) != 0) {
            foreach ($categories as $cat)
            {
                //$business = Business::where('business_sub_activity_id', $cat->activity_code);

                //$business = DB::select("select * from business where business_sub_activity_id='".$cat->business_sub_activity_id."'".$country_qry.$bstats." ORDER BY rand() LIMIT 3 ");
                $business = DB::select("select * from business where business_sub_activity_id='".$cat->business_sub_activity_id."'".$country_qry.$bstats);

                $data['title']=$cat->activity_english_name;
                $data['subactivityId']=$cat->business_sub_activity_id;
                $data['business']=$business;
                //old format
                //$result[$cat->activity_english_name]=$business;

                array_push($result, $data);
            }
            return $this->successResponse($result);
        } else {
            return $this->successResponse($result,"no data found");
        }
        //return $this->successResponse($categories);
    }
    public function get_sub_act($id,$tbl,$col_name,$where_col_name)
    {
        $name="";


        $qry="select ".$col_name." as name from ".$tbl." where ".$where_col_name."='".$id."' or id=".$id;
        $result = DB::select($qry);
        if(count($result)!=0)
        {
            $name=$result[0]->name;
        }
        return $name;
    }
    public function getAllBusiness($by,$bid): JsonResponse
    {
        $mybid=$bid;
        switch ($by) {
            case 'new':
                $result = [];

                $business = Business::orderBy('created_at', 'DESC')
                ->where('BID', '!=', $mybid)
                ->where('business_account_status', '=', 1)

                ->take(15)->get();
                foreach ($business as $bsns)
                {
                    $bsns['follow']=$this->getFollowstatus($bsns->BID,$mybid);
                   // $bsns['business_main_activity']=$this->get_sub_act($bsns->business_main_activity_id,"activities","activity_name","activity_code");
                   // $bsns['business_sub_activity']=$this->get_sub_act($bsns->business_sub_activity_id,"sub_activities","activity_english_name","activity_code");
                    array_push($result, $bsns);
                }

                return $this->successResponse($result);
                break;
        }

        return $this->successResponse(Business::all());

        //return $this->getAllBusiness_list($by,$bid,"");


    }
    public function getAllBusiness_list($by,$bid,$country): JsonResponse
    {
        $mybid=$bid;

       app(\App\Http\Controllers\SearchController::class)->changeLogStatus($bid);

        /*if($country=="")
        {
            $country="+971";
        }*/
        $gen="select * from business where 1 ";
        $gen.=" and business_account_status=1";
        $order_by=" order by created_at DESC ";

         //else return all
         $qry="";
         if($country!="")
         {
             $qry.=" and business_country_code='".$country."'";
         }


        switch ($by)
        {
            case 'new':
                $result = [];
                //$qry.=" and BID!='".$mybid."'";
                $limit=" limit 15 ";
                $business = DB::select($gen.$qry.$order_by.$limit);
                foreach ($business as $bsns)
                {
                    //$bsns['follow']=$this->getFollowstatus($bsns->BID,$mybid);
                $bsns->follow=$this->getFollowstatus($bsns->BID,$mybid);

                //$bsns['business_main_activity']=$this->get_sub_act($bsns->business_main_activity_id,"activities","activity_name","activity_code");
                //$bsns['business_sub_activity']=$this->get_sub_act($bsns->business_sub_activity_id,"sub_activities","activity_english_name","activity_code");

                    //array_push($result, $bsns);
                }

                return $this->successResponse($business);
                break;
           }

        //$qry.=" and BID!='".$mybid."'";
        $business_all = DB::select($gen.$qry.$order_by);

        return $this->successResponse($business_all);
    }

    public function getFollowstatus($bid,$mybid)
    {

        $categories = DB::select("select * from following where follows='".$bid."' and BID='".$mybid."'");
        //$result['categories']=$categories;
        if (count($categories) != 0)
        {
            return true;
        }
       else
        {
            return false;
        }
    }

    public function getBusinessByBID($BID): JsonResponse
    {
        $business = Business::where('BID', $BID)->firstOrFail();
        //$business = DB::select("select * from business where BID='".$BID."'");
        if ($business != null) {


            $business['business_main_activity_name']=$this->get_sub_act($business->business_main_activity_id,"activities","activity_name","activity_code");
            $business['business_sub_activity_name']=$this->get_sub_act($business->business_sub_activity_id,"sub_activities","activity_english_name","activity_code");

            $business['created_at']=date_format($business['created_at'],"Y/m/d H:i:s");


            return $this->successResponse($business, $BID, 200);
        } else {
            return $this->errorResponse('No business found with given id= ' . $BID, Response::HTTP_NOT_FOUND, $BID);
        }

        /*$business = DB::select("select * from business where BID='".$BID."'");
        if ($business != null) {

          $business[0]->business_main_activity_name=$this->get_sub_act($business[0]->business_main_activity_id,"activities","activity_name","activity_code");
           $business[0]->business_sub_activity_name=$this->get_sub_act($business[0]->business_sub_activity_id,"sub_activities","activity_english_name","activity_code");
           //for temporary
          // $business[0]->business_main_activity_id= $this->get_sub_act($business[0]->business_main_activity_id,"activities","activity_name","activity_code");
          // $business[0]->business_sub_activity_id= $this->get_sub_act($business[0]->business_sub_activity_id,"sub_activities","activity_english_name","activity_code");
           return $this->successResponse($business, $BID, 200);
        } else {
            return $this->errorResponse('No business found with given id= ' . $BID, Response::HTTP_NOT_FOUND, $BID);
        }*/
    }


    public function getBusinessByMainActivity($mainActivityId): JsonResponse
    {
        try {
            $business = Business::where([
            ['business_main_activity_id', $mainActivityId],
            ['business_account_status', 1]
            ])
            //$business = Business::where('business_main_activity_id', $mainActivityId)

                //->orderByAesc('business_creation_date')
                ->orderBy('business_creation_date', 'ASC')
                ->get();
            return $this->successResponse($business);
        } catch (Exception $e) {
            return $this->errorResponse('No business available with selected category', 404);
        }
    }

    public function getMainActivities(): JsonResponse
    {
        $results = DB::select('select * from activities');

		if (count($results) != 0)
		{
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no found', Response::HTTP_NOT_FOUND);
        }
    }
    public function getBusinessBySubActivity($subActivityId): JsonResponse
    {
        // just to test git push update
        // just to test git push update 2
         // just to test git push update 2hsfhfhdhfjhd
         $result = [];
         /*
SELECT  business.*,DATE_FORMAT(created_at, '%m/%d/%Y')
FROM    business
WHERE   created_at BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()

         */
        if($subActivityId==1000)
        {
            $business = Business::orderBy('created_at', 'DESC')
           // ->where('BID', '!=', $mybid)
            ->where('business_account_status', '=', 1)

            ->take(10)->get();
            foreach ($business as $bsns)
            {
                $bsns['follow']=false;
               // $bsns['business_main_activity']=$this->get_sub_act($bsns->business_main_activity_id,"activities","activity_name","activity_code");
               // $bsns['business_sub_activity']=$this->get_sub_act($bsns->business_sub_activity_id,"sub_activities","activity_english_name","activity_code");
                array_push($result, $bsns);
            }

            return $this->successResponse($result);
        }
        else if($subActivityId==1001)
        {
            $business = Business::orderBy('created_at', 'DESC')
           // ->where('BID', '!=', $mybid)
           // ->where('business_account_status', '=', 1)
           // ->orwhere('BID', '=', '')
            //->orwhere('BID', '=', 1)
            ->whereIn('BID',[
                '0dd3a082-41c3-4055-b99f-5782d4e34d96_a24300c0-817c-11eb-9487-e1ea84824c75',
                'e05bcd90-8987-418f-b5f9-286dac9b9dc5_624248f0-e342-11eb-8777-c1daecda76da',
            ])
            ->get();
           // ->take(10)->get();
            foreach ($business as $bsns)
            {
                $bsns['follow']=false;
               // $bsns['business_main_activity']=$this->get_sub_act($bsns->business_main_activity_id,"activities","activity_name","activity_code");
               // $bsns['business_sub_activity']=$this->get_sub_act($bsns->business_sub_activity_id,"sub_activities","activity_english_name","activity_code");
                array_push($result, $bsns);
            }

            return $this->successResponse($result);
        }
        else if($subActivityId==1002)
        {
            $business = Business::orderBy('created_at', 'DESC')
           // ->where('BID', '!=', $mybid)
           // ->where('business_account_status', '=', 1)
           // ->orwhere('BID', '=', '')
            //->orwhere('BID', '=', 1)
            ->whereIn('BID',[
                '0dd3a082-41c3-4055-b99f-5782d4e34d96_a24300c0-817c-11eb-9487-e1ea84824c75'

            ])
            ->get();
           // ->take(10)->get();
            foreach ($business as $bsns)
            {
                $bsns['follow']=false;
               // $bsns['business_main_activity']=$this->get_sub_act($bsns->business_main_activity_id,"activities","activity_name","activity_code");
               // $bsns['business_sub_activity']=$this->get_sub_act($bsns->business_sub_activity_id,"sub_activities","activity_english_name","activity_code");
                array_push($result, $bsns);
            }

            return $this->successResponse($result);
        }
        else
        {
        try {
            $business = Business::where([
                ['business_sub_activity_id', $subActivityId],
                ['business_account_status', 1]
                ])
           // $business = Business::where('business_sub_activity_id', $subActivityId)
                //->orderByAesc('business_creation_date')
                ->orderBy('business_creation_date', 'ASC')
                ->get();
            return $this->successResponse($business,'This from business with sub activity '.$subActivityId, Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse('No business available with selected category', 404);
        }
      }

    }

    public function createNewBusiness(Request $request): JsonResponse
    {

        $rules = [
//        http://pub.dartlang.org/packages/uuid to create BUID in flutter use this and device uid
            'BID' => 'bail|required|unique:business',  //bail to stop operation when first validation failure
            'business_email' => 'required|max:255|unique:business',//do email verification on mobile side
            'business_main_phone_number' => 'required|max:255|unique:business',
            'business_address' => 'nullable',
            'business_lat' => 'required',
            'business_lng' => 'required',
            'business_name' => 'required|max:255|unique:business',
            'business_username' => 'required|max:255|unique:business',
            'business_password' => 'required',
            'business_bio' => 'required',
            'business_logo' => 'image|mimes:jpeg,bmp,png',
            'business_cover_image' => '|image|mimes:jpeg,bmp,png',
            'business_country' => 'required',
            'business_country_code' => 'required',
            'business_city' => '',
            'business_main_activity_id' => 'required',
            'business_sub_activity_id' => 'required',
            'business_facebook_url' => 'nullable',
            'business_linkedin_url' => 'nullable',
            'business_instagram_url' => 'nullable',
           // 'fcm_token' => 'nullable',
        ];
        try {
           // $this->validate($request, $rules);

            $businessLogoPath = $this->uploadImage($request, 'business_logo');
            $businessCoverPath = $this->uploadImage($request, 'business_cover_image');

            $business = $request->toArray();
            $business['business_logo'] = $businessLogoPath;
            $business['business_cover_image'] = $businessCoverPath;

            $business = Business::create($business);
//            $response = ['business' => $business, 'images' => $businessLogoPath];

            return $this->successResponse($business, 'Business Successfully Registered', $request);

        } catch (ValidationException $e) {
            return $this->errorResponse("Please fill all the required fields", $e->getCode(), $request->all());
        }
    }
    public function validatePasswordProp($password)
    {

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        //if(!$uppercase ) {
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            return 0;
                   }
        else
        {
            return 1;
        }
    }
    public function createNewBusinessStepFirst(Request $request): JsonResponse
    {

        $rules = [
//        http://pub.dartlang.org/packages/uuid to create BUID in flutter use this and device uid
            'BID' => 'bail|required|unique:business',  //bail to stop operation when first validation failure
            'business_email' => 'required|max:255|unique:business',//do email verification on mobile side
            'business_main_phone_number' => 'required|max:255|unique:business',
            'business_name' => 'required|max:255|unique:business',
            'business_password' => 'required',
            'business_logo' => 'image|mimes:jpeg,bmp,png',
            'business_cover_image' => '|image|mimes:jpeg,bmp,png',
            'business_country' => 'required',
            'business_country_code' => 'required',

           // 'fcm_token' => 'nullable',
        ];
        try {
            $this->validate($request, $rules);

            $password=$request->input('business_password');
                 if($this->validatePasswordProp($password)==0)
                 {
                     return $this->errorResponse("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character." , 401, $request->all());

                 }


            $businessLogoPath = $this->uploadImage($request, 'business_logo');
            $businessCoverPath = $this->uploadImage($request, 'business_cover_image');

            $business = $request->toArray();
            //$business['business_username']=$business['business_email'];
            $business['business_lat']=100;
            $business['business_lng']=100;
            $business['business_bio']=$business['business_name'];
            $business['business_main_activity_id']='0003';
            if(isset($business['business_sub_activity_id']))
            {

            }
            else
            {
                $business['business_sub_activity_id']='30';
            }

            //$business['fcm_token']='test';

            $business['business_logo'] = $businessLogoPath;
            $business['business_cover_image'] = $businessCoverPath;

            $business['business_password']=bcrypt($password);

            $business = Business::create($business);
//            $response = ['business' => $business, 'images' => $businessLogoPath];

            return $this->successResponse($business, 'Business Successfully Registered', $request);

        } catch (ValidationException $e) {
            return $this->errorResponse("Please fill all the required fields", $e->getCode(), $request->all());
        }
    }
    public function deleteBusiness($BID): JsonResponse
    {
        try {
            if (!Business::where([
                ['BID', $BID],
            ])->first()) {
                return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
            }
            else
            {
                Business::where('BID', $BID)->delete();
                return $this->successResponse($BID, 'Business Deleted Successfully');
            }


    }
    catch (ValidationException $e) {
    return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
    }
    }

    public function deleteAccount(Request $request): JsonResponse
    {
        try {
            $BID=$request->input('BID');
            $password=$request->input('password');
            if (!Business::where([
                ['BID', $BID],
            ])->first()) {
                return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
            }
            else
            {
                $data=array(
                    // 'id' => $business['id'],
                     'business_account_status' => 5,

                 );

                $res=DB::table('business')->where('BID', $BID)
                ->where('business_password',$password)
                ->update($data);
                //Business::where('BID', $BID)->delete();
                if($res==0)
                {
                    return $this->successResponse($res, 'Invalid Password');
                }
                return $this->successResponse($res, 'Account Deleted Successfully');
            }


            } catch (ValidationException $e) {
             return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
         }
    }


    public function uploadImage(Request $request, $key): string
    {
        // every business has sprite folder by its name in public __DIR__ ech folder contents 3 subFolder
        // (1) business_identity,(2) business_products and (3) business_authentication_docs


        $business = $request->toArray();
        $business_name="";

            if(isset($business['business_name']))
            {
                if($business['business_name']!="")
                {
                    $business_name=$business['business_name'];
                }

            }

            else
            {
                $data = DB::table('business')->where('BID', $business['BID'])->first();
                $business_name=$data->business_name;
            }

        if ($request->hasFile($key))
        {
            $original_filename = $request->file($key)->getClientOriginalName();
            $original_filename_arr = explode('.', $original_filename);
            $file_ext = end($original_filename_arr);
            $destination_path = 'images/' . str_replace(' ', '_', $business_name .
                    '/' . 'business_identity' . '/');
            $image = 'B-' . $key . '.' . $file_ext;

            if ($request->file($key)->move($destination_path, $image)) {
                return $destination_path . $image;
            } else {
                return 'Cannot upload file';
            }
        }
        else
        {
            return 'File not found';
        }
    }

    public function login(Request $request): JsonResponse
    {
        try
        {
        //for testing
        $usr=$request->input('user_name');
            $password = $request->input('password');

// Validate password strength
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            }

        //if($usr=="testjk@mail.com"||$usr=="test1"||$usr="test2"||$usr="test33")
        if($usr=="testjk@mail.com")
        {

            $business = Business::where([
                ['business_email', $request->input('user_name')],
                ['business_password', $request->input('password')],
                //['business_account_status', 1]
            ])->first();

            if($business)
            {
                return $this->successResponse($business);
            }
            else
            {
                return $this->errorResponse('Invalid Password for '.$usr, Response::HTTP_BAD_REQUEST);
            }

        }
        //end if testing.
        if (Business::where([
            ['business_email', $request->input('user_name')],
            ['business_password', $request->input('password')],
            ['business_account_status', 0]
        ])->first()) {
            return $this->errorResponse('Your business profile is under review', Response::HTTP_BAD_REQUEST);
        }
        else
        {
            if (filter_var($request->input('user_name'), FILTER_VALIDATE_EMAIL)) {
                 //Update your code for auth purpose (change business_password to password in controller):
                if(auth()->guard('business')->attempt(['business_email' => $request->input('user_name'),  'password' => $request->input('password')])){

                    $business = auth()->guard('business')->user();

                    //user sent their email
                /*$business = Business::where([
                    ['business_email', $request->input('user_name')],
                    ['business_password', $request->input('password')],
                    //['business_password', $request->input('password')],
                    ['business_account_status', 1]
                ])->first();*/
                if($business)
                {
                    $token = $business->createToken('mobileapp')->plainTextToken;
                    $business['apiToken']=$token;

                return $this->successResponse($business);
                }
                else
                {
                    return $this->errorResponse('Invalid Username/Password', Response::HTTP_BAD_REQUEST);
                }

            }
            return $this->errorResponse('Invalid Username/Password', Response::HTTP_BAD_REQUEST);
        }

            else {
                //user sent their user name
                $business = Business::where([
                    ['business_username', $request->input('user_name')],
                    ['business_password', $request->input('password')],
                    ['business_account_status', 1]
                    ])->first();
                if($business)
                {
                    return $this->successResponse($business);
                }
                else
                {
                    return $this->errorResponse('Invalid Username/Password', Response::HTTP_BAD_REQUEST);
                }
            }
               /* if (filter_var($request->input('user_name'), FILTER_VALIDATE_EMAIL)) {
                    //user sent their email
                    $business = Business::where([
                        ['business_email', $request->input('user_name')],
                        ['business_password', $request->input('password')],
                        ['business_account_status', 1]
                    ])->firstOrFail();
                    return $this->successResponse($business);
                } else {
                    //user sent their user name
                    $business = Business::where([
                        ['business_username', $request->input('user_name')],
                        ['business_password', $request->input('password')],
                        ['business_account_status', 1]
                    ])->firstOrFail();
                    return $this->successResponse($business);
                }*/
        }
    } catch (ValidationException $e) {
        return $this->errorResponse('Invalid Username/Password', Response::HTTP_BAD_REQUEST);
    }
    }
    public function reset_page($BID)
    {
        //$test_id='47bdd74a-92f3-4e8a-994f-38e282643455_100f7500-84a9-11eb-aa40-cbf44ea24688';
       /* //$test_sh='e4ff2e20ba05ab8f9f4da8b317ac6115c6169fcfe514d58a746d79f022c54437138cb171cf1774ec5e9e9af7bda49ebff8beaf2868b8b086b39e165b1d4e90c5';
        $test_sh=hash('sha512', $test_id);

        if($test_sh==$BID)x
        {
            return view('resetpassword', ['result' => $test_id]);
        }*/
        //$qry="select * from business where BID='".$BID."'";

        $qry="select * from business where SHA2(BID, 512)='".$BID."'";

        $results = DB::select($qry);

		if (count($results) == 0)
		{
            return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
        }
        else
        {
            $bid="";
            $business_name="";
            foreach ($results as $res)
                {
                    $bid=$results[0]->BID;
                }
                 //$bid = hash('sha512', '47bdd74a-92f3-4e8a-994f-38e282643455_100f7500-84a9-11eb-aa40-cbf44ea24688');
            return view('resetpassword', ['result' => $bid]);
        }
        /*if (!Business::where([
            ['BID', $BID],
        ])->first()) {
            return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
        }
        return view('resetpassword', ['result' => $BID]); */
        //return view('resetpassword');
    }
    public function change_password(Request $request): JsonResponse
    {

        try
        {
            $business = $request->toArray();

            // return $this->errorResponse(sha1($business['BID']).'-tst-'.sha1($business['BID']), Response::HTTP_BAD_REQUEST);

            if($business['retype_password']!=$business['new_password'])
            {
                return $this->errorResponse('Password Mismatch', Response::HTTP_BAD_REQUEST);
            }
            if (!Business::where([
                ['BID', $business['BID']],
            ])->first()) {
                return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
            }
            else
            {
            $data=array(
               // 'id' => $business['id'],
                'business_password' => $business['new_password'],

            );
            DB::table('business')->where('BID', $business['BID'])->update($data);

            $data = DB::table('business')->where('BID', $business['BID'])->first();
                    return $this->successResponse($data, 'Password Successfully Updated');
            }
                } catch (ValidationException $e) {
                    return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
                }

    }

    public function resetpassword(Request $request): JsonResponse
    {
        $mail_data= $request->toArray();
        $email="";
        if(isset($mail_data['email']))
        {
            $email=$request->input('email');
        }
        $qry="select * from business where business_email='".$email."'";
        $results = DB::select($qry);

		if (count($results) == 0)
		{
            return $this->errorResponse('Invalid Email', Response::HTTP_BAD_REQUEST);
        }
        else
        {
            $to_name="jk";
            //$emails_to_send=["amen@collabmncis.com","abduljaleel@collabmncis.com"];
            $emails_to_send=$email;
            $bid="";
            $business_name="";
            foreach ($results as $res)
                {
                    $bid=$results[0]->BID;
                    $business_name=$results[0]->business_name;
                }
            //$bid='3f057356-7d10-494b-9be4-628b963830ad_c37ba0d0-dedd-11eb-a3f6-47eb16a20b56';

            //$bid=sha1($bid);

            $bid = hash('sha512', $bid);

            $bdy="Click Here To Reset password https://bewithcollab.com/business/resetpassword/".$bid;
            $sbjct="Collab reset password";
            $data = array('name'=>$bdy, "body" => $bdy);



                try
                {
                    Mail::send('mail', $data, function($message) use ($to_name, $emails_to_send,$sbjct)
                    {
                        $message->to($emails_to_send)->subject
                            ($sbjct);

                           //$message->attach('https://collab.ae/assets/img/logo1.jpg');



                        $message->from($address = 'info@bewithcollab.com','Collab App');

                    });

                } catch(\Exception $ex){
                return $this->errorResponse("Email SMTP Connection Error",Response::HTTP_BAD_REQUEST);
            }
            return $this->successResponse($mail_data,"A reset link has been sent to your email address.");



        }

    }
    public function verify_email_url(Request $request): JsonResponse
    {
        $mail_data= $request->toArray();
        $email="";
        if(isset($mail_data['email']))
        {
            $email=$request->input('email');

                if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                return $this->errorResponse('Invalid Email Format', Response::HTTP_BAD_REQUEST);
            }
        }

        $qry="select * from business where business_email='".$email."'";
        $results = DB::select($qry);

		if (count($results) == 0)
		{
            return $this->errorResponse('No Data Associated with this email.', Response::HTTP_BAD_REQUEST);
        }

        else
        {
            //return $this->errorResponse('Valid Email', Response::HTTP_BAD_REQUEST);
            $to_name="jk";
            //$emails_to_send=["amen@collabmncis.com","abduljaleel@collabmncis.com"];
            $emails_to_send=$email;
            $bid="";
            $business_name="";
            foreach ($results as $res)
                {
                    $bid=$results[0]->BID;
                    $business_name=$results[0]->business_name;
                }
            //$bid='3f057356-7d10-494b-9be4-628b963830ad_c37ba0d0-dedd-11eb-a3f6-47eb16a20b56';

            //$bid=sha1($bid);

            $bid = hash('sha512', $bid);

            $bdy="Click Here To verifiy email address https://bewithcollab.com/business/verify_email_address/".$bid;
            $sbjct="Collab verifiy email address";
            $data = array('name'=>$bdy, "body" => $bdy);



                try
                {
                    Mail::send('mail', $data, function($message) use ($to_name, $emails_to_send,$sbjct)
                    {
                        $message->to($emails_to_send)->subject
                            ($sbjct);

                           //$message->attach('https://collab.ae/assets/img/logo1.jpg');



                        $message->from($address = 'info@bewithcollab.com','Collab App');

                    });

                } catch(\Exception $ex){
                return $this->errorResponse("Email SMTP Connection Error",Response::HTTP_BAD_REQUEST);
            }
            return $this->successResponse($mail_data,"An email verification link has been sent to your email address.");



        }

    }
    public function email_verified($BID)
    {
        try
        {



           $qry="select * from business where SHA2(BID, 512)='".$BID."'";

           $results = DB::select($qry);

           if (count($results) == 0)
           {
               return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
           }
           else
           {
            $bid="";
            foreach ($results as $res)
                {
                    $bid=$results[0]->BID;
                }
           $data=array(
            // 'id' => $business['id'],
             'business_account_status' => 4,

         );
            DB::table('business')->where('BID', $bid)->update($data);
            return view('status_page', ['result' => 'Email Successfully Verified and its under review for Approval']);


            }
} catch (ValidationException $e) {
    return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
}
    }

    public function updateBusinessStatus(Request $request): JsonResponse
    {
        try
        {
            $business = $request->toArray();
            $data=array(
               // 'id' => $business['id'],
                'business_account_status' => $business['status'],

            );
            /*$qry="select * from authentication_docs where BID='".$business['id']."'";
            $results = DB::select($qry);

            if (count($results) != 0)
            {
                DB::table('business')->where('uni_id', $business['id'])->update($data);

                return $this->successResponse($business, 'Business Status Successfully Updated', $request);

            }
            else
            {
                return $this->errorResponse('Unable to Process', Response::HTTP_BAD_REQUEST);
            }*/

            DB::table('business')->where('uni_id', $business['id'])->update($data);
            return $this->successResponse($business, 'Business Status Successfully Updated', $request);



        } catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }
    public function update_business_token(Request $request): JsonResponse
    {

        //BID,fcm_token
        $business = $request->toArray();
        if (!Business::where([
            ['BID', $business['BID']],
        ])->first()) {
            return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
        }
        try
        {

            $data=array(
               // 'id' => $business['id'],
                'fcm_token' => $business['fcm_token'],

            );

            DB::table('business')->where('BID', $business['BID'])->update($data);
            //app(\App\Http\Controllers\SearchController::class)->sendChatNotification($business['fcm_token'],"Greeting from Collab,You are using latest version","");

            return $this->successResponse($business, 'Business Token Successfully Updated', $request);



        } catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }
    public function update_business_location(Request $request): JsonResponse
    {

        //BID,fcm_token
        $business = $request->toArray();
        if (!Business::where([
            ['BID', $business['BID']],
        ])->first()) {
            return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
        }
        try
        {

            $data=array(

                'business_lat' => $business['latitude'],
                'business_lng' => $business['longitude'],

            );

            DB::table('business')->where('BID', $business['BID'])->update($data);
            //app(\App\Http\Controllers\SearchController::class)->sendChatNotification($business['fcm_token'],"Greeting from Collab,You are using latest version","");
            app(\App\Http\Controllers\AdminController::class)->sendChatNotification($business['BID'],'Location updated',$business['BID']);
            return $this->successResponse($business, 'Business Location Successfully Updated', $request);



        } catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }


    public function updateBusiness(Request $request): JsonResponse
    {

        $rules = [

            'BID' => 'bail|required|unique:business',  //bail to stop operation when first validation failure

        ];
        try {
           // $this->validate($request, $rules);
            $business = array_filter($request->toArray());
            $businessLogoPath="";
            $businessCoverPath="";

            if($request->hasFile('business_logo'))
           {
            $business['business_logo'] = $this->uploadImage($request, 'business_logo');

           }
           if($request->hasFile('business_cover_image'))
           {

            $business['business_cover_image'] = $this->uploadImage($request, 'business_cover_image');
           }
          /* else
           {
            $businessLogoPath=$business['business_logo_url'];
            $businessCoverPath=$business['business_cover_image_url'];
           }*/




            $data=array(
            'BID' => $business['BID'],
           /* 'business_email' => $business['business_email'],
            'business_address' => $business['business_address'],
            'business_lat' => $business['business_lat'],
            'business_lng' => $business['business_lng'],
            'business_name' => $business['business_name'],
            'business_username' => $business['business_username'],
            'business_password' => $business['business_password'],
            'business_bio' => $business['business_bio'],
            /*'business_logo' => $businessLogoPath,
            'business_cover_image' => $businessCoverPath,*/
           /* 'business_country' => $business['business_country'],
            'business_country_code' => $business['business_country_code'],
            'business_city' => $business['business_city'],
            'business_main_activity_id' => $business['business_main_activity_id'],
            'business_sub_activity_id' => $business['business_sub_activity_id'],

            'business_facebook_url' => $business['business_facebook_url'],
            'business_linkedin_url' => $business['business_linkedin_url'],
            'business_instagram_url' => $business['business_instagram_url'],*/

            'updated_at' => date('Y-m-d H:i:s'),
                );

                /*if(isset($business['business_logo']))
                {
                    unset($request->input('business_logo'));
                }*/



                if (!Business::where([
                    ['BID', $business['BID']],
                ])->first()) {
                    return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
                }
                else
                {
                    //DB::table('business')->where('BID', $business['BID'])->update(array_filter($request->all()));
                    DB::table('business')->where('BID', $business['BID'])->update($business);
                    $data = DB::table('business')->where('BID', $business['BID'])->first();
                    return $this->successResponse($data, 'Business Successfully Updated');
                }

        } catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }
    public function getAllBusinessDashboard(Request $request)
    {
        $rcvd = $request->toArray();
        $qry='select * from business where 1 ';
        if(isset($rcvd ['search']))
        {
            $qry.=' and business_account_status='.$rcvd ['search'];
        }
        $qry.=" order by uni_id desc";
		$results = DB::select($qry);

		if (count($results) != 0)
		{
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no posts found', Response::HTTP_NOT_FOUND);
        }
	}

    public function single_business($BID)
    {
        //$results=app(\App\Http\Controllers\SearchController::class)->single_business_view($BID);

       $results= DB::select('select * from business where uni_id='.$BID);
       //$results="select * from business where SHA2(uni_id, 512)=".$BID;
            //$bid = hash('sha512', $bid);
        if (count($results) != 0)
		{
            foreach ($results as $res)
                {

                  $sub_act = DB::select("select * from sub_activities where activity_code='".$res->business_sub_activity_id."' or id=".$res->business_sub_activity_id);
                  $res->sub_activity="";
                  if (count($sub_act) != 0)
                  {
                    $res->sub_activity=$sub_act[0]->activity_english_name;
                      $res->sub_activity_id=$sub_act[0]->id;


                  }
                  //$all_products=Product::where('product_status', 1)->get();

                  //$ID='fa893ef6-cc53-40be-ad16-c7ea04c43e60_7d904fe0-66dc-11eb-89f7-97e91090b0e1';
                  $ID=$res->BID;

                  $all_products=Product::where('BID', $ID)->orderByRaw('RAND()')->get();
                  $all_documents= AuthenticationDocument::where('BID', $ID)->get();
                  $all_posts= Post::where('BID', $ID)->get();


                  $all_followers=Following::where('follows', $ID)->get();
                  $all_following=Following::where('BID', $ID)->get();



                  $res->products = $all_products;
                  $res->documents=$all_documents;
                  $res->products_count = count($all_products);
                  $res->document_count=count($all_documents);
                  $res->live_feed_count=count($all_posts);
                  $res->following_count=count($all_following);
                  $res->followers_count=count($all_followers);




                }


        }
        if(count($results)!=0)
        {
            return view('member_profile', ['result' => $results]);

        }



    }
    public function reportBuisinessByBID($BID): JsonResponse
    {
        try {
            if (!Business::where([
                ['BID', $BID],
            ])->first()) {
                return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
            }
            else
            {
                //Business::where('BID', $BID)->delete();
                $data=array(

                     'business_account_status' => "3",

                 );
                 DB::table('business')->where('BID', $BID)->update($data);


                return $this->successResponse($BID, 'Business Reported Successfully');
            }


    } catch (ValidationException $e) {
    return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
    }
    }
}
