<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utils\ApiResponder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use League\Flysystem\Exception;
use App\Models\ProductImages;
use Mail;
class SearchController extends Controller
{
    //
    use ApiResponder;

    public function __construct()
    {
        $this->middleware('auth', [
            'only' => [
                'getBusinessDashboard_Search',
                'get_faqs',
                //'get_subactivity_summary',

            ]
        ]);
    }

    public function getBusinessInfo()
    {
		$results = DB::select('select * from business');

		if (count($results) != 0)
		{
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no business found', Response::HTTP_NOT_FOUND);
        }
	}
    public function getBusinessCountry()
    {
		$results = DB::select('select business_country from business group by business_country');

		if (count($results) != 0)
		{
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no Country found', Response::HTTP_NOT_FOUND);
        }
	}
    public function getBusinessCity()
    {
		$results = DB::select('select business_city from business group by business_city');

		if (count($results) != 0)
		{
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no City found', Response::HTTP_NOT_FOUND);
        }
	}

    public function getBusinessActivity()
    {
		$results = DB::select('select * from sub_activities');

		if (count($results) != 0)
		{
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no subactivity found', Response::HTTP_NOT_FOUND);
        }
	}
    public function getBusiness_with_token(Request $request)
    {
        $qry="select * from business where fcm_token!=''";
        $results = DB::select($qry);
        if (count($results) != 0)
		{
            return $this->successResponse($results);
        }
        else
        {
            return $this->errorResponse('no business found', Response::HTTP_NOT_FOUND);
        }

    }

    public function getBusinessDashboard_Search(Request $request)
    {
        try {

           $viewtype="";
        $rcvd = $request->toArray();
        //return $this->successResponse($rcvd);
        $qry='select * from business where 1 ';
        $join_subactivity="";
        $join_products="";

        $prdct_fltr=0;

       ///start of search filter.
    if(count($rcvd)!=0)
    {


        //join subactivity table
        if($rcvd ['activity_name']!=""||$rcvd ['activity_code']!="")
        {
            $join_subactivity=" join sub_activities on business.business_sub_activity_id=sub_activities.activity_code ";
            $qry='select * from business'.$join_subactivity.''.$join_products.' where 1 ';

            if($rcvd ['activity_name']!="")
                 {

            $qry.="  and sub_activities.activity_english_name like '%".$rcvd ['activity_name']."%'";
                 }

                 if($rcvd ['activity_code']!="")
                 {

                $qry.="  and sub_activities.activity_code like '%".$rcvd ['activity_code']."%'";
                 }
        }
           //end of join

         //join product table

         if($rcvd ['product_name']!=""||$rcvd ['hs_code']!="")
         {
             $join_products=" join products on business.BID=products.BID ";
             $qry='select * from business'.$join_subactivity.''.$join_products.' where 1 ';

             if($rcvd ['product_name']!="")
                  {
                    $prdct_fltr=1;
             $qry.="  and products.english_name like '%".$rcvd ['product_name']."%'";
                  }
                  if($rcvd ['hs_code']!="")
                  {

             $qry.="  and products.hs_code like '%".$rcvd ['hs_code']."%'";
                  }
         }
         //end of join
        if(isset($rcvd ['status_filter']))
        {
            if($rcvd ['status_filter']!="")
            {
            $qry.=' and business_account_status='.$rcvd ['status_filter'];
            }
        }

            if($rcvd ['business_name']!="")
                 {
            $qry.=" and business_name like '%".$rcvd ['business_name']."%'";
                 }

        if(isset($rcvd ['location_name']))
        {
            if($rcvd ['location_name']!="")
                 {
            $qry.=" and business_address like '%".$rcvd ['location_name']."%'";
                 }
        }
        if(isset($rcvd ['country_name']))
        {
            if($rcvd ['country_name']!="")
                 {
            $qry.=" and business_country like '%".$rcvd ['country_name']."%'";
                 }
        }
        if(isset($rcvd ['token_filter']))
        {
            if($rcvd ['token_filter']!="")
                 {
                     if($rcvd ['token_filter']=="1")
                     {
                        $qry.=" and fcm_token !=''";
                     }
                     else if($rcvd ['token_filter']=="0")
                     {
                        $qry.=" and fcm_token =''";
                     }
                     else if($rcvd ['token_filter']=="2")
                     {
                         $viewtype="lastscene";
                     }


                 }
        }
        ///group by section
        if($rcvd ['product_name']!=""||$rcvd ['hs_code']!="")
        {
            //$qry.=" group by business.BID";
        }


    }
        ///end of search filter.
            ///
            if($viewtype=="lastscene")
            {
                $qry.=" order by last_scene desc";
            }
            else
            {
                $qry.=" order by uni_id desc";
            }


		$results = DB::select($qry);

		if (count($results) != 0)
		{
            foreach ($results as $res)
                {
                //$products = DB::select("select count(*) as tot from post_reports where post_id=".$res->p_id);
                  $prdct_sql="select count(*) as tot from products where BID='".$res->BID."'";

                  if($prdct_fltr==1)
                    {
                        $prdct_sql.=" and products.english_name like '%".$rcvd ['product_name']."%'";
                    }
                  $products = DB::select($prdct_sql);
                  $res->product_count=0;
                  if (count($products) != 0)
                  {
                    $res->product_count=$products[0]->tot;
                  }

                  $sub_act = DB::select("select * from sub_activities where activity_code='".$res->business_sub_activity_id."' or id=".$res->business_sub_activity_id);
                  $res->sub_activity="";
                  if (count($sub_act) != 0)
                  {
                    $res->sub_activity=$sub_act[0]->activity_english_name;
                  }


                }
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no business found', Response::HTTP_NOT_FOUND);
        }
    } catch (ValidationException $e) {
        return $this->errorResponse("Error", $e->getCode(), $request->all());
    }
	}
    public function getProductsDashboard_Search(Request $request)
    {
        try {


        $rcvd = $request->toArray();
        //return $this->successResponse($rcvd);
        $qry='select * from products where 1 ';
        $join_subactivity="";
        $join_products="";

        $prdct_fltr=0;

       ///start of search filter.
       $start_from=0;
       $per_page_record=10;
    if(count($rcvd)!=0)
    {



         //join business table
          if($rcvd ['business_name']!="")
                 {
                    $join_business=" join business on business.BID=products.BID ";
                    $qry='select * from products'.$join_business.' where 1 ';

                    if($rcvd ['business_name']!="")
                         {
                       $qry.="  and business.business_name like '%".$rcvd ['business_name']."%'";
                         }

                 }
         if($rcvd ['page_offset']!="")
         {
         $start_from=$rcvd ['page_offset'];
         }
         if($rcvd ['product_name']!="")
         {
            $qry.=" and english_name like '%".$rcvd ['product_name']."%'";
         }

         if($rcvd ['hs_code']!="")
         {
            $qry.=" and hs_code like '%".$rcvd ['hs_code']."%'";
         }

         //end of join

            if($rcvd ['status_filter']!="")
            {
            $qry.=' and product_status='.$rcvd ['status_filter'];
            }








    }
    $qry.=" order by product_identifier desc";
        ///end of search filter.

        //pagination query
        //$qry.=" LIMIT ".$start_from.",". $per_page_record;
        ///end of paginatiom query

       $results = DB::select($qry);


		if (count($results) != 0)
		{
            foreach ($results as $res)
                {

                $business = DB::select("select * from business where BID='".$res->BID."'");
                $res->provided="";
                $res->per_page=$per_page_record;
                $res->tot_rows=30;
                if (count($business) != 0)
		            {

                $res->provided=$business[0]->business_name;
                    }
                  //$res->provided=$business->business_name;

                }

		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no products found', Response::HTTP_NOT_FOUND);
        }
    } catch (ValidationException $e) {
        return $this->errorResponse("Error", $e->getCode(), $request->all());
    }
	}

    public function single_business_view($BID)
    {
        $results= DB::select('select * from business where uni_id='.$BID);
        if (count($results) != 0)
		{
            foreach ($results as $res)
                {

                  $sub_act = DB::select("select * from sub_activities where activity_code='".$res->business_sub_activity_id."'");
                  $res->sub_activity="";
                  if (count($sub_act) != 0)
                  {
                    $res->sub_activity=$sub_act[0]->activity_english_name;

                  }
                  $res->products = ProductImages::where('BID', $BID)->get();

                }


        }

        return $results;
    }

    public function get_subactivity_summary(Request $request)
    {
        $qry="select * from sub_activities where 1 ";
		$results = DB::select($qry);
		try {


            $rcvd = $request->toArray();
		if (count($results) != 0)
		{
            foreach ($results as $res)
            {

              $bus_count = DB::select("select count(*) as bcount,BID from business where business_sub_activity_id='".$res->activity_code."' group by BID");
              $res->business_count=0;
              $res->product_count=0;
              if (count($bus_count) != 0)
              {
                $res->business_count=$bus_count[0]->bcount;

                $p_count = DB::select("select count(*) as pcount from products where BID='".$bus_count[0]->BID."'");
                if (count($p_count) != 0)
                {
                    $res->product_count=$p_count[0]->pcount;
                }

              }


            }
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no data found', Response::HTTP_NOT_FOUND);
        }
    } catch (ValidationException $e) {
        return $this->errorResponse("Error", $e->getCode(), $request->all());
    }
	}
    public function get_Business_tokens($tkn)
    {
		$results = DB::select("select * from user_tokens where token='".$tkn."'");

		if (count($results) != 0)
		{
		return $results[0]->token;
		}
		else
		{
            return 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC';
        }
	}
    public function getSearchFilter1(Request $request): JsonResponse
    {
        $filter = "";
        $results=array();
        $blist=array();
        $filter = $request->toArray();

        if($filter['filter_text']!="")
        {
            $bsts=" and business_account_status=1 ";
            $psts=" and product_status=1 ";
            $qry_bsn="select * from business where business_name like '%".$filter['filter_text']."%' OR business_sme_type like '%".$filter['filter_text']."%'".$bsts;
            //$qry_bsn="select * from business where business_name like '%".$filter['filter_text']."%'".$bsts;
            $qry_bsn2="select * from business where business_sub_activity_id in(select id from sub_activities where activity_arabic_name like '%".$filter['filter_text']."%')".$bsts;
            //$qry_prd="select * from products where english_name like '%".$filter['filter_text']."%'";
            $qry_prd="select * from products where english_name like '%".$filter['filter_text']."%' or product_description like '%".$filter['filter_text']."%'".$psts;

            $qry_ctg="select * from categories where category_english_name like '%".$filter['filter_text']."%'";
            $qry_act="select * from activities where activity_name like '%".$filter['filter_text']."%'";

            $qry_subact="select * from sub_activities where activity_arabic_name like '%".$filter['filter_text']."%'";

            //$results['business'] = DB::select($qry_bsn);
            $data1=DB::select($qry_bsn);
            foreach ($data1 as $res)
            {
                array_push($blist, $res);
            }
            $data2=DB::select($qry_bsn2);
            foreach ($data2 as $res1)
            {
                array_push($blist, $res1);
            }
            $results['business'] =$blist;
            //$results['business'] = DB::select($qry_bsn2);

           /* array_push($blist, DB::select($qry_bsn));
            array_push($blist, DB::select($qry_bsn2));
            $results['business'] =$blist;*/


            $products= DB::select($qry_prd);

            foreach ($products as $product) {

                //$product['product_category_name'] = $this->get_category_subcategory($product['product_category_id'],"categories","category_english_name","category_identifier");
                //$product['product_sub_category_name'] = $this->get_category_subcategory($product['product_sub_category_id'],"sub_categories","category_name","category_id");


                $product->product_category_id = app(\App\Http\Controllers\ProductController::class)->get_category_subcategory($product->product_category_id,"categories","category_english_name","category_identifier");
                $product->product_sub_category_id = app(\App\Http\Controllers\ProductController::class)->get_category_subcategory($product->product_sub_category_id,"sub_categories","category_name","category_id");

                //array_push($finalArray, $product);
            }
            $results['products'] =$products;
            $results['categories'] = DB::select($qry_ctg);
            $results['activities'] = DB::select($qry_act);
            $results['subactivities'] = DB::select($qry_subact);

        }



		if (count($results) != 0)
		{
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('search item not found', Response::HTTP_NOT_FOUND);
        }
	}
    public function getSearchFilter(Request $request): JsonResponse
    {
        $filter = "";
        $results=array();
        $filter = $request->toArray();
		$bsts=" and business_account_status=1 ";
            $psts=" and product_status=1 ";
        if($filter['filter_text']!="")
        {
            $qry_bsn="select * from business where business_name like '%".$filter['filter_text']."%'".$bsts;
            $qry_prd="select * from products where english_name like '%".$filter['filter_text']."%' or product_description like '%".$filter['filter_text']."%'".$psts;
            $qry_ctg="select * from categories where category_english_name like '%".$filter['filter_text']."%'";
            $qry_act="select * from activities where activity_name like '%".$filter['filter_text']."%'";
            $qry_subact="select * from sub_activities where activity_arabic_name like '%".$filter['filter_text']."%'";

           /* $results['business'] = DB::select($qry_bsn);
            $results['products'] = DB::select($qry_prd);
            $results['categories'] = DB::select($qry_ctg);
            $results['activities'] = DB::select($qry_act);
            $results['subactivities'] = DB::select($qry_subact);*/

            /*array_push($results, DB::select($qry_bsn));
            array_push($results, DB::select($qry_prd));
            array_push($results, DB::select($qry_ctg));
            array_push($results, DB::select($qry_act));
            array_push($results, DB::select($qry_subact));*/
            //business
            $data1=DB::select($qry_bsn);
            foreach ($data1 as $res)
            {
                array_push($results, $res);
            }
            //subactivities
            $data2=DB::select($qry_subact);
            foreach ($data2 as $res)
            {
                array_push($results, $res);
            }

             //products
             $data3=DB::select($qry_prd);
             foreach ($data3 as $res)
             {
                 array_push($results, $res);
             }

              //categories
            $data4=DB::select($qry_ctg);
            foreach ($data4 as $res)
            {
                array_push($results, $res);
            }
              //activities
              $data4=DB::select($qry_act);
              foreach ($data4 as $res)
              {
                  array_push($results, $res);
              }

        }



		if (count($results) != 0)
		{
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('search item not found', Response::HTTP_NOT_FOUND);
        }
	}
    public function get_Home_Counter()
    {
        $filter = "";
        $results=array();
        $bcount=0;
        $pcount=0;
        $fcount=0;
        $acount=0;

            $qry_bsn="select count(*) as bcount from business";

            $data1=DB::select($qry_bsn);
            if (count($data1) != 0)
                {
           foreach ($data1 as $res)
            {
                $bcount=$res->bcount;
            }
                }

                ///product count
                $qry_bsn="select count(*) as pcount from products";

            $data2=DB::select($qry_bsn);
            if (count($data2) != 0)
                {
                foreach ($data2 as $res)
                    {
                        $pcount=$res->pcount;
                    }
                }
                ///////////
                 ///product count
                 $qry_bsn="select count(*) as fcount from view_post_all";

                 $data3=DB::select($qry_bsn);
                 if (count($data3) != 0)
                     {
                            foreach ($data3 as $res)
                            {
                                $fcount=$res->fcount;
                            }
                     }
                     ///////////

                       ///////////
                 ///product count
                 $qry_bsn="select count(*) as acount from advertisement";

                 $data3=DB::select($qry_bsn);
                 if (count($data3) != 0)
                     {
                foreach ($data3 as $res)
                 {
                    $acount=$res->acount;
                 }
                     }
                     ///////////
            $results['bcount']=$bcount;
            $results['pcount']=$pcount;
            $results['feed_count']=$fcount;
            $results['adds_count']=$acount;


		return $results;

	}
    public function get_Dashboard_Users($udata)
    {
        $uname=$udata['user_name'];
        $upass=$udata['password'];

		$results = DB::connection('mysql2')->select("select * from dashboard_users where name='".$uname."' and password='".$upass."'");
		//$results = DB::select("select * from dashboard_users where name='".$uname."' and password='".$upass."'");

		if (count($results) != 0)
		{
		return $results;
		}
        else
        {
        return $results;
        }

	}
    public function get_general_parameters()
    {

		$results = DB::connection('mysql2')->select("select * from app_parameters");

		if (count($results) != 0)
		{
            return $this->successResponse($results);
		//return $results;
		}
        else
        {
        return $results;
        }

	}
    public function get_All_Adds(Request $request): JsonResponse
    {
        try {


            $rcvd = $request->toArray();
            //return $this->successResponse($rcvd);
            $qry='select * from advertisement where 1 ';

            if(isset($rcvd ['status_filter']))
            {
                if($rcvd ['status_filter']!="")
                {
                $qry.=' and ad_status='.$rcvd ['status_filter'];
                }
            }
            if(isset($rcvd ['ad_title']))
            {
            if($rcvd ['ad_title']!="")
                  {

             $qry.="  and ad_title like '%".$rcvd ['ad_title']."%'";
                  }
                }
            $qry.=' order by ad_id desc';
		$results = DB::select($qry);

		if (count($results) != 0)
		{
            $catgeg="General Adds";

            foreach ($results as $res)
            {
                $res->add_category=$catgeg;

            }
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no adds found', Response::HTTP_NOT_FOUND);
        }
    } catch (ValidationException $e) {
        return $this->errorResponse("Error", $e->getCode(), $request->all());
    }//end of catch

	}

    public function notification_mail($message)
    {
    $bdy=$message;
    $to_name="Admin";
    $emails_to_send=["abduljaleel@collabmncis.com"];
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
   }
   public function getSubCategory_dashboard(): JsonResponse
    {
		$qry="select * from sub_categories where 1 ";
        if(isset($rcvd ['category_name']))
        {
        if($rcvd ['category_name']!="")
              {

         $qry.="  and category_name like '%".$rcvd ['category_name']."%'";
              }
            }
		$results = DB::select($qry);

		if (count($results) != 0)
		{

            //$activity['sub_activitys'] = $subActivitys;
            foreach ($results as $res)
            {
                $mainCategory = Category::where('category_identifier', $res->main_category_id)->get();
                $res->main_category=$mainCategory[0]['category_english_name'];
            }

		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no posts category found', Response::HTTP_NOT_FOUND);
        }
	}
   public function approve_pending($tbl)
    {

		$affected1 =0;
        $col_name="";



        if($tbl=="posts")
        {
            $col_name="post_status";
        }
        else if($tbl=="business")
        {
            $col_name="business_account_status";

        }
        else if($tbl=="products")
        {
            $col_name="product_status";

        }

		try {


           $data1=array(
            $col_name => 1,
                //'updated_at' => date('Y-m-d H:i:s'),
                );

                $affected1 =DB::table($tbl)->where($col_name, 0)->update($data1);

            return $this->successResponse("",$affected1." Rows Affected in ".$tbl);

			} catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }
    public function getBusinessCountCountryWise()
    {

        $qry='select business_country_code,count(*) as business_count from business group by business_country_code';

		$results = DB::select($qry);

		if (count($results) != 0)
		{
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no countries found', Response::HTTP_NOT_FOUND);
        }
	}
    public function get_faqs()
    {

        $qry="select * from help_faq where faq_status=1 and type='general' order by display_order";

		$results = DB::select($qry);

		if (count($results) != 0)
		{
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no countries found', Response::HTTP_NOT_FOUND);
        }
	}
    public function getSearchAllPaginatedFilter(Request $request)
    {
        $rcvd = $request->toArray();
        $page_type=$rcvd['page_type'];
        $start_from=$rcvd['start_from'];
        $per_page=$rcvd['per_page'];

        $filter_text="";
        $post_category_val="";
        $key_text="";
        $key_value="";
        $BID="";

        if(isset($rcvd['filter_text']))
        {
            if($rcvd['filter_text']!="")
            {
                $filter_text=$rcvd['filter_text'];
            }

        }
        if(isset($rcvd['key_text']))
        {
            if($rcvd['key_text']!="")
            {
                $key_text=$rcvd['key_text'];
            }

        }
        if(isset($rcvd['key_value']))
        {
            if($rcvd['key_value']!="")
            {
                $key_value=$rcvd['key_value'];
            }

        }

        if(isset($rcvd['BID']))
        {

            if($rcvd['BID']!=""&&$rcvd['BID']!="null")
            {
                $BID=$rcvd['BID'];
            }
        }



        if($page_type=="business"||$page_type=="subactivity")
        {
        return $this->getAllBusinessPaginatedWithFilter($page_type,$start_from, $per_page,$filter_text,$key_text,$key_value,$BID);
        }
        else if($page_type=="product"||$page_type=="category"||$page_type=="Product")
        {
        return $this->getAllProductPaginatedWithFilter($page_type,$start_from, $per_page,$filter_text,$key_text,$key_value,$BID);
        }
        else if($page_type=="post"||$page_type=="postcategory")
        {
        return $this->getAllLiveFeedsPaginatedWithFilter($page_type,$start_from, $per_page,$filter_text,$key_text,$key_value,$BID);
        }

        else
		{
            return $this->errorResponse('no data found', Response::HTTP_NOT_FOUND);
        }
    }
    public function getAllProductPaginatedWithFilter($page_type,$start_from, $per_page,$filter_text,$key_text,$key_value,$BID): JsonResponse
    {
        $qry = "select * from products where product_status=1 ";
        $finalArray = [];
        $tot_count = 0;
        /*$all_products = DB::select($qry);
        if (count($all_products) != 0) {
            $tot_count = count($all_products);
        }*/
        if($page_type=="product"||$page_type=="Product")
        {
             if($key_text=="")
             {
                 $qry = "select * from products where product_status=1 ";
             }
                else if($key_text=="latestproducts"||$key_text="latestproductsbymember")
                {
                    $qry="SELECT  products.*,DATE_FORMAT(product_creation_date, '%m/%d/%Y') FROM products WHERE product_creation_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE() ";
                }
                else if($key_text=="productcategory")
                {
                    $qry.= " and product_category_id=".$key_value;
                }
                else if($key_text=="productsubcategory")
                {
                    $qry.= " and product_sub_category_id=".$key_value;
                }
                else if($key_text=="productBID")
                {


                $qry.= " and BID='$key_value'";


                }
                if($BID!="")
                        {

                $qry.= " and BID='$BID'";
                    }

        }
        if($filter_text!="")
        {
            $qry.=" and english_name like '%".$filter_text."%'";
        }
        $order_by = " order by product_creation_date DESC ";

        $lmt = " LIMIT " . $start_from . "," . $per_page;

        $products = DB::select($qry . $order_by . $lmt);

        if (count($products) != 0) {
            foreach ($products as $product) {
                //$product->tot_count = $tot_count;
                $product->product_category_name = app(\App\Http\Controllers\ProductController::class)->get_category_subcategory($product->product_category_id, "categories", "category_english_name", "category_identifier");
                $product->product_sub_category_name = app(\App\Http\Controllers\ProductController::class)->get_category_subcategory($product->product_sub_category_id, "sub_categories", "category_name", "category_id");

                $productImages = ProductImages::where('product_identifier', $product->product_identifier)->get();
                $product->images = $productImages;

                $product->product_category_id = app(\App\Http\Controllers\ProductController::class)->get_category_subcategory($product->product_category_id, "categories", "category_english_name", "category_identifier");
                $product->product_sub_category_id = app(\App\Http\Controllers\ProductController::class)->get_category_subcategory($product->product_sub_category_id, "sub_categories", "category_name", "category_id");


                array_push($finalArray, $product);
            }
            return $this->successResponse($products);
        } else {
            return $this->errorResponse('no products found', Response::HTTP_NOT_FOUND);
        }
    }
    public function getAllBusinessPaginatedWithFilter($page_type,$start_from, $per_page,$filter_text,$key_text,$key_value,$BID): JsonResponse
    {
        $qry = "";
        $order_by="";
        if($page_type=="business")
        {
            $qry = "select * from business where business_account_status=1 ";

            if($key_text=="latestbusiness")
            {
                $qry="SELECT  business.*,DATE_FORMAT(created_at, '%m/%d/%Y') FROM business WHERE created_at BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE() ";
            }
            else if($key_text=="recommendedbusiness")
            {
                $qry="select * from business where 1 ";
                $qry.=" and business_account_status=1";
                //$order_by=" order by created_at DESC ";
            }
            else if($key_text=="membercategory")//businessbyactivity by sub activity.
            {
                $qry.=" and business_sub_activity_id=".$key_value;
            }
            else if($key_text=="businessbyactivity")
            {
                $qry.=" and business_sub_activity_id=".$key_value;
            }
            else if($key_text=="latestproductsbymember")
            {
                $qry = "select * from business where business_account_status=1 and BID='0dd3a082-41c3-4055-b99f-5782d4e34d96_a24300c0-817c-11eb-9487-e1ea84824c75'";
            }
            else if($key_text=="announcementslistbymember")
            {
                $qry = "select business.* from business join view_post_all on business.BID=view_post_all.BID where post_type=1 group by business.BID";
            }
            else if($key_text=="needlistbymember")
            {
                $qry = "select business.* from business join view_post_all on business.BID=view_post_all.BID where post_type=3 group by business.BID";
            }
            else if($key_text=="eventlistbymember")
            {
                $qry = "select business.* from business join view_post_all on business.BID=view_post_all.BID where post_type=2 group by business.BID";
            }


        }
        else if($page_type=="subactivity")
        {

            $qry="select * from business join sub_activities on business.business_sub_activity_id=sub_activities.id where business_account_status=1";

        }


        $order_by=" order by business.created_at DESC ";
        $finalArray = [];
        $tot_count = 0;
        $all_products = DB::select($qry);
        if (count($all_products) != 0) {
            $tot_count = count($all_products);
        }
        if($filter_text!="")
        {
            if($page_type=="business")
            {
                $qry.=" and (business_name like '%".$filter_text."%' or business_sme_type like '%".$filter_text."%')";

            }
            else
            {
                $qry.=" and activity_english_name like '%".$filter_text."%'";
            }
        }
        //$order_by = "";

        $lmt = " LIMIT " . $start_from . "," . $per_page;

        $business_list = DB::select($qry . $order_by . $lmt);

        if (count($business_list) != 0) {


                foreach ($business_list as $bsns)
                {
                    //$bsns['follow']=$this->getFollowstatus($bsns->BID,$mybid);
                //$bsns->follow= app(\App\Http\Controllers\BusinessController::class)->getFollowstatus($bsns->BID,$mybid);

                $bsns->follow= false;
                }
                //array_push($finalArray, $product);

            return $this->successResponse($business_list,$key_text." with ".$key_value);
        } else {
            return $this->errorResponse('no business found ', Response::HTTP_NOT_FOUND);
        }
    }
    public function getAllLiveFeedsPaginatedWithFilter($page_type,$start_from, $per_page,$filter_text,$key_text,$key_value,$BID): JsonResponse
    {
        $qry = "select * from view_post_all where post_status=1 ";
        $order_by=" order by p_id desc";
        $lmt = " LIMIT " . $start_from . "," . $per_page;
        //1-Announcement,2-Event,3-Needs
        if($key_value!="")
        {
            $qry.= " and post_type=$key_value";
        }
       /* if($key_text=="postcategory")
        {
            $qry.= " and post_type=$key_value";
        }*/

        if($BID!="")
        {
            $qry.= " and BID='$BID'";
        }

        /*$finalArray = [];

        array_push($finalArray,array (
            "p_id"=> 49,
            "business_name"=> "The Library Fragrance Boutique",
            "business_logo"=> "images/The_Library_Fragrance_Boutique/business_identity/B-business_logo.png",
            "BID"=> "0dd3a082-41c3-4055-b99f-5782d4e34d96_a24300c0-817c-11eb-9487-e1ea84824c75",
            "post_text"=> "The Aromatic Weaved is a combination of authentic and cultural \"Palm Fronds\" hand-knitted baskets drenched in aromatic oils and prepared for the special occasion of Ramadan to enlighten your homes with LIMITED-EDITION HAMPER, we have handpicked all the elements to bring a Luxurious and Prestigious mixture to the best Elevate for your home environment.\n\nProducts=>\n\n1.PLAM FRONDS BASKETS (Hand-Made)\n2. MABKHARA\n3. OUD 12G\n4. ZENOLOGY ROOM SPRAY 300ML\n5. LINANRI DIFFUSER 500ML\n6. UNIQUE ELEMENT",
            "post_type"=> 1,
            "post_image"=> "images/Advertisement/ads-2022-04-14_17:38:35-ad_image.png",
            "post_status"=> "1",
            "category_name"=> "Announcement"
        ));
        array_push($finalArray,array (
            "p_id"=> 48,
            "business_name"=> "The Scent Library Trading",
            "business_logo"=> "images/The_Scent_Library_Trading/business_identity/B-business_logo.jpg",
            "BID"=> "47bdd74a-92f3-4e8a-994f-38e282643455_100f7500-84a9-11eb-aa40-cbf44ea24688",
            "post_text"=> "The Library Perfume\n📍Gshar Shop, Souq Alshanasiyah, Sharjah",
            "post_type"=> 1,
            "post_image"=> "images/Advertisement/ads-2022-04-14_17:51:37-ad_image.png",
            "post_status"=> "1",
            "category_name"=> "Announcement"
        ));
        array_push($finalArray,array (
            "p_id"=> 47,
            "business_name"=> "MNCIS LLC",
            "business_logo"=> "images/MNCIS/business_identity/B-business_logo.jpg",
            "BID"=> "28018bef-814d-451c-ba32-18b863f7b86f_48b78210-e202-11eb-ae64-33fc1a326139",
            "post_text"=> "يعقد #النعيم_مول شراكة مع صندوق خليفة لتطوير المشاريع،  مبادرة منتدى لرواد الأعمال الشباب في إماراة رأس الخيمة. كن جزءاً من هذا المشروع وحقق طموحك في الانطلاق بأعمالك الإبداعية. \nانضم الآن عبر إرسال اسم المشروع على الرقم التالي 0529063000",
            "post_type"=> 1,
            "post_image"=> "images/Advertisement/ads-2022-04-14_17:50:27-ad_image.png",
            "post_status"=> "1",
            "category_name"=> "Announcement"
        ));
        return $this->successResponse($finalArray,$key_text." with ".$BID);  */

        $results = DB::select($qry . $order_by . $lmt);
		if (count($results) != 0)
		{
		return $this->successResponse($results,$key_text." with ".$BID);
		}
		else
		{
            return $this->errorResponse('no posts found'.$key_text." with ".$BID, Response::HTTP_NOT_FOUND);
        }
    }
    public function getSingleFeed($pid): JsonResponse
    {
        $results = DB::select("select * from view_post_all where p_id=".$pid." order by p_id desc");

		if (count($results) != 0)
		{
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('no posts found', Response::HTTP_NOT_FOUND);
        }
    }

    public function getSingleProduct($pid): JsonResponse{
        $finalArray = [];
        $qry = "select * from products where product_status=1 and product_identifier=".$pid."";


        $products = DB::select($qry);

        if (count($products) != 0) {
            foreach ($products as $product) {
                //$product->tot_count = $tot_count;
                $product->product_category_name = app(\App\Http\Controllers\ProductController::class)->get_category_subcategory($product->product_category_id, "categories", "category_english_name", "category_identifier");
                $product->product_sub_category_name = app(\App\Http\Controllers\ProductController::class)->get_category_subcategory($product->product_sub_category_id, "sub_categories", "category_name", "category_id");

                $productImages = ProductImages::where('product_identifier', $product->product_identifier)->get();
                $product->images = $productImages;

                $product->product_category_id = app(\App\Http\Controllers\ProductController::class)->get_category_subcategory($product->product_category_id, "categories", "category_english_name", "category_identifier");
                $product->product_sub_category_id = app(\App\Http\Controllers\ProductController::class)->get_category_subcategory($product->product_sub_category_id, "sub_categories", "category_name", "category_id");


                array_push($finalArray, $product);
            }
            return $this->successResponse($products);
        } else {
            return $this->errorResponse('no products found', Response::HTTP_NOT_FOUND);
        }
    }

    public function activeCollaboration($bid): JsonResponse{
       /* $qry="";
        $result = DB::select($qry);
        if (count($result) != 0) {
            return $this->successResponse($result);
        } else {
            return $this->errorResponse('no products found', Response::HTTP_NOT_FOUND);
        }   */

        $finalArray = [];

        $bids=[

            "fddcc53f-cbf3-4d97-8acf-6debef041060_d111bbe0-9f16-11ec-b045-17c363713087",//syspos
            "0dd3a082-41c3-4055-b99f-5782d4e34d96_a24300c0-817c-11eb-9487-e1ea84824c75", //library

            "28018bef-814d-451c-ba32-18b863f7b86f_48b78210-e202-11eb-ae64-33fc1a326139",  //mncis
            "6409a680-0230-4d08-8fd1-8595df26aff3_1e690c30-e4b0-11eb-97ff-cf6db45a9988",  //vivikola

            "28018bef-814d-451c-ba32-18b863f7b86f_48b78210-e202-11eb-ae64-33fc1a326139",  //mncis
            "8ae118b8-0e56-4577-9aa1-80826ff6a5e5_5b0d75b0-bfb4-11ec-b3e2-d9a7d2e11739",  //naeem mall

            "0dd3a082-41c3-4055-b99f-5782d4e34d96_a24300c0-817c-11eb-9487-e1ea84824c75", //library
            "a3470534-08b5-4276-8c2b-48a453d17778_d778e850-e3f5-11eb-a677-3da3e5dd1771",  //urlich

            "9d403d1d-42a4-46ef-92d4-0a520be38d38_14783cd0-3723-11ec-b037-87f917cf4149", //arcadia
            "0dd3a082-41c3-4055-b99f-5782d4e34d96_a24300c0-817c-11eb-9487-e1ea84824c75", //library

            "c22b2986-fa15-4cd7-80ad-456202926a7b_5228c500-e4b1-11eb-a2d1-69a837f4e9c2", //ojar
            "0dd3a082-41c3-4055-b99f-5782d4e34d96_a24300c0-817c-11eb-9487-e1ea84824c75", //library


            ];
        foreach ($bids as $business) {
            $qry = "select * from business where bid='" . $business . "'";

            //$results['business'] = DB::select($qry_bsn);
            $data1 = DB::select($qry);
            foreach ($data1 as $res) {
                array_push($finalArray, $res);
            }

        }
        /*
        array_push($finalArray,array (
            "uni_id"=> 32,
            "BID"=> "0dd3a082-41c3-4055-b99f-5782d4e34d96_a24300c0-817c-11eb-9487-e1ea84824c75",
            "business_email"=> "kara@thelibraryboutique.ae",
            "business_main_phone_number"=> "589839648",
            "business_address"=> "Abu Dhabi",
            "business_lat"=> "100",
            "business_lng"=> "100",
            "business_web_site"=> "https=>//thelibraryboutique.ae/",
            "business_name"=> "The Library Fragrance Boutique",
            "business_username"=> "thelibrary",
            "business_account_status"=> 1,
            "business_bio"=> "The Library Fragrance Boutique was an idea that evolved in the minds of three brothers, two of them are perfume collectors, and all of them are business oriented.",
            "business_logo"=> "images/The_Library_Fragrance_Boutique/business_identity/B-business_logo.png",
            "business_cover_image"=> "images/The_Library_Fragrance_Boutique/business_identity/B-business_cover_image.jpg",
            "business_country"=> "United Arab Emirates",
            "business_country_code"=> "+971",
            "business_city"=> null,
            "business_main_activity_id"=> "3",
            "business_sub_activity_id"=> "31",
            "business_facebook_url"=> "collab.ae",
            "business_linkedin_url"=> "collab.ae",
            "business_instagram_url"=> "https=>//instagram.com/theli3rary?utm_medium=copy_link",
            "business_google_map"=> null,
            "business_mode"=> null,
            "business_sme"=> null,
            "business_sme_type"=> null,
            "business_creation_date"=> "2021-03-10 08=>43=>09",
            "business_subscriptions_renew_date"=> null,
            "business_exp_date"=> null,
            "fcm_token"=> "c7Nr7DjkS0ZGg_DNb1MGam=>APA91bE3k9w8PV9AIrSbyYvglRpLtU8EP7TBaTSQ9n4ji1Nq4Q4p0z0yEzLorLEtJsqLuQ_MXtp8Q8BeTKKmlVen4SARRUcjF-MrMh3qCEcaRDArGw_khT5-E3IFoAzJFYP7WHIDo6P5",
            "socket_id"=> "",
            "last_scene"=> "2021-11-29 09=>10=>39",
            "created_at"=> "2021-03-10T08=>43=>09.000000Z",
            "updated_at"=> "2022-03-15T06=>04=>30.000000Z"));
        array_push($finalArray,array (
            "uni_id"=> 70,
            "BID"=> "a3470534-08b5-4276-8c2b-48a453d17778_d778e850-e3f5-11eb-a677-3da3e5dd1771",
            "business_email"=> "info@ulrichlangnewyork.com",
            "business_main_phone_number"=> "2122280222",
            "business_address"=> "N/A",
            "business_lat"=> "100",
            "business_lng"=> "100",
            "business_web_site"=> null,
            "business_name"=> "Ulrich Lang New York",
            "business_username"=> "ulrichlangnewyork",
            "business_account_status"=> 1,
            "business_bio"=> "Ulrich Lang New York Fragrances is a fusion of fine fragrances and contemporary art. Established in 2002. The line can be found at The Library of Noses and Scents in the UAE.",
            "business_logo"=> "images/Ulrich_Lang_New_York/business_identity/B-business_logo.jpg",
            "business_cover_image"=> "images/Ulrich_Lang_New_York/business_identity/B-business_cover_image.jpg",
            "business_country"=> "United States",
            "business_country_code"=> "+1",
            "business_city"=> null,
            "business_main_activity_id"=> "3",
            "business_sub_activity_id"=> "31",
            "business_facebook_url"=> null,
            "business_linkedin_url"=> null,
            "business_instagram_url"=> null,
            "business_google_map"=> null,
            "business_mode"=> null,
            "business_sme"=> null,
            "business_sme_type"=> null,
            "business_creation_date"=> "2021-07-13 16=>17=>39",
            "business_subscriptions_renew_date"=> null,
            "business_exp_date"=> null,
            "fcm_token"=> "eRvQ0-b8PkDhj6BdL4ZHUl=>APA91bFF8SBIDwQ_bMx6T28rQIFKE-sCvOzy7CkiTYrBxoDjyx17RRXL9LceQBDBy15RSDZrzIl627ql76A1HB3M-H2C2yoLu7wd1_wUI9XM_fICYZrczXaajoMiVejrZMmayyxEBejv",
            "socket_id"=> null,
            "last_scene"=> "2021-08-24 11=>29=>01",
            "created_at"=> "2021-07-13T16=>17=>39.000000Z",
            "updated_at"=> "2021-07-13T16=>17=>39.000000Z"
        ));array_push($finalArray,array (
        "uni_id"=> 74,
        "BID"=> "97c47a71-eec5-4286-999f-0a74d8f20af8_875c0f00-e486-11eb-9aed-57cfd638b748",
        "business_email"=> "info@marwankhaled.com",
        "business_main_phone_number"=> "553929911",
        "business_address"=> "lebanon",
        "business_lat"=> "100",
        "business_lng"=> "100",
        "business_web_site"=> "www.marwankhaled.com",
        "business_name"=> "Marwan and khaled",
        "business_username"=> "Mkcouture",
        "business_account_status"=> 1,
        "business_bio"=> "fashion business",
        "business_logo"=> "images/Marwan_and_khaled/business_identity/B-business_logo.jpg",
        "business_cover_image"=> "images/Marwan_and_khaled/business_identity/B-business_cover_image.jpg",
        "business_country"=> "Saudi Arabia",
        "business_country_code"=> "+966",
        "business_city"=> null,
        "business_main_activity_id"=> "3",
        "business_sub_activity_id"=> "52",
        "business_facebook_url"=> "marwankhaledcouture",
        "business_linkedin_url"=> null,
        "business_instagram_url"=> "marwankhaledcouture",
        "business_google_map"=> null,
        "business_mode"=> null,
        "business_sme"=> null,
        "business_sme_type"=> null,
        "business_creation_date"=> "2021-07-14 09=>33=>22",
        "business_subscriptions_renew_date"=> null,
        "business_exp_date"=> null,
        "fcm_token"=> "fZ1ppwr5qkqDmXOAGu0iEp=>APA91bEeCs_C8qmzCUy6sLw4N6bBQ9-xSvmtrvrtZOEPsvQKXyAfcUKecoDNFVSerNmhnsioQiDoaM711tUoS4embATVXUAO3XWkUXbPnRP9xBbesNSlyp0PxR5UsBSenpsotM6iqc7C",
        "socket_id"=> "",
        "last_scene"=> "2021-08-24 11=>29=>01",
        "created_at"=> "2021-07-14T09=>33=>22.000000Z",
        "updated_at"=> "2021-07-14T09=>33=>22.000000Z"
    ));array_push($finalArray,array (
        "uni_id"=> 82,
        "BID"=> "6409a680-0230-4d08-8fd1-8595df26aff3_1e690c30-e4b0-11eb-97ff-cf6db45a9988",
        "business_email"=> "contact@celestial-uae.com",
        "business_main_phone_number"=> "505065595",
        "business_address"=> "N/A",
        "business_lat"=> "100",
        "business_lng"=> "100",
        "business_web_site"=> "https=>//www.celestial-uae.com/",
        "business_name"=> "Vivi Kola",
        "business_username"=> "Vivi Kola",
        "business_account_status"=> 1,
        "business_bio"=> "THE EXCLUSIVE PARTNER FOR VIVI KOLA IN THE UNITED ARAB EMIRATES.\nVIVI KOLA is based on the original recipe from 1938 and uses meticulously sourced ingredients and aromas to create a Distinctive, Delecios & Fizzy Cola",
        "business_logo"=> "images/Vivi_Kola/business_identity/B-business_logo.jpg",
        "business_cover_image"=> "images/Vivi_Kola/business_identity/B-business_cover_image.jpg",
        "business_country"=> "United Arab Emirates",
        "business_country_code"=> "+971",
        "business_city"=> null,
        "business_main_activity_id"=> "3",
        "business_sub_activity_id"=> "30",
        "business_facebook_url"=> null,
        "business_linkedin_url"=> null,
        "business_instagram_url"=> "https=>//instagram.com/vivikola.ae?utm_medium=copy_link",
        "business_google_map"=> null,
        "business_mode"=> null,
        "business_sme"=> null,
        "business_sme_type"=> null,
        "business_creation_date"=> "2021-07-14 14=>31=>07",
        "business_subscriptions_renew_date"=> null,
        "business_exp_date"=> null,
        "fcm_token"=> "drsBwT5g30MhmQfZKV_M34=>APA91bE8Wd6mb0btIdOayMCurTnOAKqPGhNVhAbcbHRt8FX_21xFyNj5jUOqK-FZb17rvtPSJhLcsIJ64kc84dTs8U8gBjAZeMJf6qDDHidU3SfWrtYvuuEw0GQtJQ781LsOJxMZp71N",
        "socket_id"=> "",
        "last_scene"=> "2021-12-20 10=>46=>09",
        "created_at"=> "2021-07-14T14=>31=>07.000000Z",
        "updated_at"=> "2022-01-25T11=>50=>09.000000Z"
    ));array_push($finalArray,array (
        "uni_id"=> 85,
        "BID"=> "c22b2986-fa15-4cd7-80ad-456202926a7b_5228c500-e4b1-11eb-a2d1-69a837f4e9c2",
        "business_email"=> "dory.younes@bahwanlifestyle.com",
        "business_main_phone_number"=> "564554566",
        "business_address"=> "N/A",
        "business_lat"=> "100",
        "business_lng"=> "100",
        "business_web_site"=> null,
        "business_name"=> "OJAR",
        "business_username"=> "doryyounes",
        "business_account_status"=> 1,
        "business_bio"=> "OJAR is a fusion of fragrances from the East and the West. Created as a statement of modernity and traditional harmony the brand pays tribute to the art and rituals of Middle Eastern perfume making.",
        "business_logo"=> "images/OJAR/business_identity/B-business_logo.jpg",
        "business_cover_image"=> "images/OJAR/business_identity/B-business_cover_image.jpg",
        "business_country"=> "United Arab Emirates",
        "business_country_code"=> "+971",
        "business_city"=> null,
        "business_main_activity_id"=> "3",
        "business_sub_activity_id"=> "31",
        "business_facebook_url"=> null,
        "business_linkedin_url"=> null,
        "business_instagram_url"=> null,
        "business_google_map"=> null,
        "business_mode"=> null,
        "business_sme"=> null,
        "business_sme_type"=> null,
        "business_creation_date"=> "2021-07-14 14=>39=>41",
        "business_subscriptions_renew_date"=> null,
        "business_exp_date"=> null,
        "fcm_token"=> null,
        "socket_id"=> null,
        "last_scene"=> "2021-08-24 11=>29=>01",
        "created_at"=> "2021-07-14T14=>39=>41.000000Z",
        "updated_at"=> "2021-07-14T14=>39=>41.000000Z"
    ));
        array_push($finalArray,array (
            "uni_id"=> 82,
            "BID"=> "6409a680-0230-4d08-8fd1-8595df26aff3_1e690c30-e4b0-11eb-97ff-cf6db45a9988",
            "business_email"=> "contact@celestial-uae.com",
            "business_main_phone_number"=> "505065595",
            "business_address"=> "N/A",
            "business_lat"=> "100",
            "business_lng"=> "100",
            "business_web_site"=> "https=>//www.celestial-uae.com/",
            "business_name"=> "Vivi Kola",
            "business_username"=> "Vivi Kola",
            "business_account_status"=> 1,
            "business_bio"=> "THE EXCLUSIVE PARTNER FOR VIVI KOLA IN THE UNITED ARAB EMIRATES.\nVIVI KOLA is based on the original recipe from 1938 and uses meticulously sourced ingredients and aromas to create a Distinctive, Delecios & Fizzy Cola",
            "business_logo"=> "images/Vivi_Kola/business_identity/B-business_logo.jpg",
            "business_cover_image"=> "images/Vivi_Kola/business_identity/B-business_cover_image.jpg",
            "business_country"=> "United Arab Emirates",
            "business_country_code"=> "+971",
            "business_city"=> null,
            "business_main_activity_id"=> "3",
            "business_sub_activity_id"=> "30",
            "business_facebook_url"=> null,
            "business_linkedin_url"=> null,
            "business_instagram_url"=> "https=>//instagram.com/vivikola.ae?utm_medium=copy_link",
            "business_google_map"=> null,
            "business_mode"=> null,
            "business_sme"=> null,
            "business_sme_type"=> null,
            "business_creation_date"=> "2021-07-14 14=>31=>07",
            "business_subscriptions_renew_date"=> null,
            "business_exp_date"=> null,
            "fcm_token"=> "drsBwT5g30MhmQfZKV_M34=>APA91bE8Wd6mb0btIdOayMCurTnOAKqPGhNVhAbcbHRt8FX_21xFyNj5jUOqK-FZb17rvtPSJhLcsIJ64kc84dTs8U8gBjAZeMJf6qDDHidU3SfWrtYvuuEw0GQtJQ781LsOJxMZp71N",
            "socket_id"=> "",
            "last_scene"=> "2021-12-20 10=>46=>09",
            "created_at"=> "2021-07-14T14=>31=>07.000000Z",
            "updated_at"=> "2022-01-25T11=>50=>09.000000Z"
        )); */


        return $this->successResponse($finalArray);
    }
    public function changeLogStatus($bid){
        $mybid=$bid;
        //$mybid="'.$bid.'";
        $data=array(
            // 'id' => $business['id'],
            'last_scene' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        );
        DB::table('business')->where('BID', $mybid)->update($data);
    }
    public function getMyNearPlaces(Request $request)
    {
        try
        {
            $myplace=[];
            $types=[];
            $rcvd = $request->toArray();
            $stored_keyword=1;
            //$types=["establishment"];
          /*  array_push($types, "restaurant");
            array_push($types, "bakery");
            array_push($types, "clothing_store");
            array_push($types, "lodging");   */

            if(isset($rcvd['mykeywords']))
            {
                if($rcvd['mykeywords']!='')
                {
                    $stored_keyword=0;
                    array_push($types, $rcvd['mykeywords']);
                }

            }
            if(isset($rcvd['BID'])&&$stored_keyword==1) {


                $results1 = DB::select("select business_interests from business where BID='" . $rcvd['BID'] . "'");

                if (count($results1) != 0) {
                    //$latest_date=$results1[0]->business_interests;
                    $types = explode(",", $results1[0]->business_interests);

                }
            }
            //$types=[];

           // array_push($types, "leasing");


            //$types=["restaurant","bakery","clothing_store","store"];
            foreach ($types as $type) {
                foreach ($this->getMyNearPlaceData($request, $type) as $res) {
                    array_push($myplace, $res);
                }
            }
            //array_push($myplace, $this->getMyNearPlaceData($request,"cafe"));
        return $this->successResponse($myplace);
    } catch (ValidationException $e)
        {
return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
}
    }
    public function getMyNearPlaceData(Request $request,$type)
    {
        $rcvd = $request->toArray();
        $places = [];
        $api_key='AIzaSyBVgxU6mGfw09H-NeuQJPB7NIUwCeO7kqc';
        $latitude = $rcvd['latitude'];
        $longitude = $rcvd['longitude'];

        //$latitude = '24.4646';
        //$longitude = '54.3284';

          $radius=3000;
        $name="";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$latitude.'%2C'.$longitude.'&radius='.$radius.'&keyword='.$type.'&key='.$api_key);
        //curl_setopt($ch, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$latitude.'%2C'.$longitude.'&radius='.$radius.'&type='.$type.'&key='.$api_key);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);



        curl_close($ch);

        $json_object_result = json_decode($result,true);
       // return $json_object_result;
        if (isset($json_object_result['status'])) {
            if ($json_object_result['status'] == 'OK') {
                for ($i = 0; $i < count($json_object_result); $i++) {

                    if (isset($json_object_result['results'][$i]['name'])) {
                        $plac['name'] = $json_object_result['results'][$i]['name'];

                        $plac['latitude'] = $json_object_result['results'][$i]['geometry']['location']['lat'];
                        $plac['longitude'] = $json_object_result['results'][$i]['geometry']['location']['lng'];
                        $plac['place_id'] = $json_object_result['results'][$i]['place_id'];
                        $plac['type'] = $json_object_result['results'][$i]['types'];
                    } else {
                        continue;
                    }
                    if (isset($json_object_result['results'][$i]['photos'][0]['photo_reference'])) {
                        $plac['photo_ref'] = $json_object_result['results'][$i]['photos'][0]['photo_reference'];
                        $plac['photo'] = 'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photo_reference=' . $plac['photo_ref'] . '&key=' . $api_key;

                    } else {
                        $plac['photo'] = 'https://ugtechmag.com/wp-content/uploads/2021/07/google_maps_featured_image.jpeg';
                    }


                    //$plac['rating'] = $json_object_result['results'][$i]['rating'];
                    //$plac['icon'] = $json_object_result['results'][$i]['icon'];
                    //$plac['types'] = $json_object_result['results'][$i]['types'];


                    array_push($places, $plac);

                }
                // Get Lat & Long

            }
        }
        else{

        }

       // $key = array_rand($places);
       // $name= $places[$key]['name'];
       // app(\App\Http\Controllers\AdminController::class)->sendChatNotification($rcvd['BID'],$name.' is near to you',$rcvd['BID']);

       return $places;
    }
    public function getMyPlaceInfo(Request $request)
    {
        $rcvd = $request->toArray();
        $places = array();
        $api_key='AIzaSyBVgxU6mGfw09H-NeuQJPB7NIUwCeO7kqc';
        $latitude = NULL;
        $longitude = NULL;
        $name="";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/place/details/json?fields=formatted_address%2Cwebsite%2Cformatted_phone_number&place_id='.$rcvd['place_id'].'&key='.$api_key);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        $json_object_result = json_decode($result,true);
        // return $json_object_result;

        $plac['address']= $json_object_result['result']['formatted_address'];
        $plac['phone']='no number';
        $plac['website']='no web';

       if(isset($json_object_result['result']['formatted_phone_number']))
       {
           $plac['phone']= $json_object_result['result']['formatted_phone_number'];
       }
        if(isset($json_object_result['result']['website']))
        {
            $plac['website']= $json_object_result['result']['website'];
        }

        array_push($places, $plac);

        return $this->successResponse($places);
        // return $json_object_result;
        /*if ($json_object_result['status'] == 'OK') {
            for ($i=0;$i < count($json_object_result);$i++)
            {

                if(isset($json_object_result['results'][$i]['name'])) {
                    $plac['name'] = $json_object_result['results'][$i]['name'];

                    $plac['latitude'] = $json_object_result['results'][$i]['geometry']['location']['lat'];
                    $plac['longitude'] = $json_object_result['results'][$i]['geometry']['location']['lng'];
                    $plac['place_id'] = $json_object_result['results'][$i]['place_id'];
                }
                else
                {
                    continue;
                }
                if(isset($json_object_result['results'][$i]['photos'][0]['photo_reference']))
                {
                    $plac['photo_ref'] = $json_object_result['results'][$i]['photos'][0]['photo_reference'];
                    $plac['photo']  ='https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photo_reference='.$plac['photo_ref'].'&key='.$api_key;

                }
                else
                {
                    $plac['photo']='https://ugtechmag.com/wp-content/uploads/2021/07/google_maps_featured_image.jpeg';
                }


                //$plac['rating'] = $json_object_result['results'][$i]['rating'];
                //$plac['icon'] = $json_object_result['results'][$i]['icon'];
                //$plac['types'] = $json_object_result['results'][$i]['types'];

                array_push($places, $plac);

            }
            // Get Lat & Long

        }else{
            $latitude = NULL;
            $longitude = NULL;
        }

        // $key = array_rand($places);
        // $name= $places[$key]['name'];
        // app(\App\Http\Controllers\AdminController::class)->sendChatNotification($rcvd['BID'],$name.' is near to you',$rcvd['BID']);

        return $places;  */
    }
    public function getActivityInfo($activityid)
    {
        $actname="No Activity found";
        $sub_act = DB::select("select * from sub_activities where id='".$activityid."' or activity_code='".$activityid."'");

        if (count($sub_act) != 0)
        {
            $actname=$sub_act[0]->activity_english_name;

        }
        return $actname;
    }

}
