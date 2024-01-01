<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Following;
use App\Models\Business;
use Illuminate\Support\Facades\DB;
use App\Utils\ApiResponder;
class FollowingController extends Controller
{
    //
    use ApiResponder;
    /*public function addFolowStatus($BID,$follows,$status)
    {

    }*/
    public function createFollowing(Request $request)
    {
		
		try {
            //$this->validate($request, $rules);
			$follows = $request->toArray();

           if (!Business::where([
                ['BID', $follows['BID']],
            ])->first()) {
                return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
            }
             
			if($follows['status']=="1")
            {
                if (Following::where([
                    'BID' =>$follows['BID'],
                    'follows'=>$follows['follows']
                ])->first()) {
                    return $this->errorResponse('Already Exist', Response::HTTP_BAD_REQUEST);
                }  
                $data=array(
                    
                    'BID' => $follows['BID'],
                    'follows' => $follows['follows'],
                   
                    );
                $follows= Following::create($data);
			
                return $this->successResponse($follows, 'Following added successfully');
            }
           
            else
            {
                return $this->unFollow($request);
            }
			
        
			} catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
            
        }
    }

    public function getAllFollowing()
    {
		$results = DB::select('select * from following');
		
		if (count($results) != 0) 
		{
		return $this->successResponse($results);
		}
		else 
		{
            return $this->errorResponse('no data found', Response::HTTP_NOT_FOUND);
        }
	}
    public function getAllFollowingByBid($BID)
    {
        $results=[];
        
        if (!Business::where([
            ['BID', $BID],
        ])->first()) {
            return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
        }
            
        else
        {
             //varaibles for random adds

         $btwn=1;
         $adds_indx=0;
        
         $add_list = DB::select("select * from advertisement where ad_status='1' order by ad_id desc");
         $tot_ads=count($add_list);
         $i=0;
         //end
                    $feeds_count=0;
                    
                    
                    $filter_list=[1,3];//announcement and Needs

                    $filter_cat=implode(",",$filter_list);
                    
                    $filter_not_in="";
                    $filter_not_in=" and post_type not in (".$filter_cat.")";

                    $gen="select * from view_post_all where post_status='1' ";

                    $order_by=" order by p_id desc";
                    //general feeds in which the BID follows
                    
                    $qry=$gen." and post_type in (".$filter_cat.")";
                    $gen_feeds = DB::select($qry.$order_by);
                                                
                    if (count($gen_feeds) != 0) 
                    {
                        $feeds_count++;
                        
                        foreach ($gen_feeds as $gfeeds) 
                        {
                            
                            array_push($results, $gfeeds);
                    ///for adds
                    $i++;
                    if($i%$btwn==0)
                        {
        
                            
                            if($adds_indx<$tot_ads)
                            {
        
                    
                            $adds=array(
                                'p_id' => 1,
                                'business_name' => $add_list[$adds_indx]->ad_title,
                                'business_logo' => $add_list[$adds_indx]->ad_image,
                                //'BID' => $BID,
                                'BID' => $add_list[$adds_indx]->BID,
                                'post_text' => 'Advertisement',
                                'post_type' => 99,
                                'post_image' =>$add_list[$adds_indx]->ad_image,
                                'post_status' => "1",
                                'category_name' => 'Advertisement',
                                );
                        array_push($results, $adds);
                                    $adds_indx++;
                            }
                        } //end random adds.
               
                        }
                    }  
                    //end of general feeds  

                //own live feeds in which the BID follows
                 $qry=$gen." and BID='".$BID."'"; 

                 

                $own_feeds = DB::select($qry.$filter_not_in.$order_by);
                            
                if (count($own_feeds) != 0) 
                {
                    $feeds_count++;
                    foreach ($own_feeds as $ofeeds) 
                    {
                        array_push($results, $ofeeds);
                        ///for adds
                    $i++;
                    if($i%$btwn==0)
                        {
        
                            
                            if($adds_indx<$tot_ads)
                            {
        
                    
                            $adds=array(
                                'p_id' => 1,
                                'business_name' => $add_list[$adds_indx]->ad_title,
                                'business_logo' => $add_list[$adds_indx]->ad_image,
                                //'BID' => $BID,
                                'BID' => $add_list[$adds_indx]->BID,
                                'post_text' => 'Advertisement',
                                'post_type' => 99,
                                'post_image' =>$add_list[$adds_indx]->ad_image,
                                'post_status' => "1",
                                'category_name' => 'Advertisement',
                                );
                        array_push($results, $adds);
                                    $adds_indx++;
                            }
                        } //end random adds.
                    }
                }  
                //end of own feeds          
                $following = DB::select("select follows from following where BID='".$BID."'");
                
                if (count($following) != 0) 
                {
                
                        foreach ($following as $fol) 
                        {
                            //live feeds in which the BID follows
                            $qry=$gen." and BID='".$fol->follows."'"; 

                            $livefeeds = DB::select($qry.$filter_not_in.$order_by);
                            //$livefeeds = DB::select("select * from view_post_all where post_status='1' and BID='".$fol->follows."' order by p_id desc");
                            
                            if (count($livefeeds) != 0) 
                            {
                                $feeds_count++;
                                foreach ($livefeeds as $feeds) 
                                {
                                    array_push($results, $feeds);
                                    ///for adds
                    $i++;
                    if($i%$btwn==0)
                        {
        
                            
                            if($adds_indx<$tot_ads)
                            {
        
                    
                            $adds=array(
                                'p_id' => 1,
                                'business_name' => $add_list[$adds_indx]->ad_title,
                                'business_logo' => $add_list[$adds_indx]->ad_image,
                                //'BID' => $BID,
                                'BID' => $add_list[$adds_indx]->BID,
                                
                                'post_text' => 'Advertisement',
                                'post_type' => 99,
                                'post_image' =>$add_list[$adds_indx]->ad_image,
                                'post_status' => "1",
                                'category_name' => 'Advertisement',
                                );
                        array_push($results, $adds);
                                    $adds_indx++;
                            }
                        } //end random adds.
                                }
                            }
                        
                            
                        }
                }
                
                if($feeds_count>0)
                {
                return $this->successResponse($results);
                }
                else 
                {
                    return $this->errorResponse('no data found', Response::HTTP_NOT_FOUND);
                }
        }
	}
    public function unFollow(Request $request)
    {
        //return $this->successResponse('Unfollow Successfully',$request);
        $rules = [
            'BID' => 'required',
            'follows' => 'required',
		
            
        ];
		try {
            //$this->validate($request, $rules);
                $unf = $request->toArray();

            
                $followed = Following::where([
                    'follows' => $unf['follows'],
                    'BID' => $unf['BID'],
                ])->first();
                
            
                if($followed) {
                    
                Following::where([
                        'follows' => $unf['follows'],
                        'BID' => $unf['BID'],
                    ])->delete();
                    return $this->successResponse('Unfollow Successfully',$followed);
                } else {
                    return $this->errorResponse('no data found with given id', 404);
                }
    } catch (ValidationException $e) {
        return $this->errorResponse("Please fill all the required fields", $e->getCode(), $request->all());
    }

    }
}
