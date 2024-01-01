<?php

namespace App\Http\Controllers;
use App\Models\Business;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Utils\ApiResponder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
class PostController extends Controller
{
	use ApiResponder;
    //public function getAllPostRandom(): JsonResponse
	public function __construct()
    {
        
		
		/*$this->middleware('auth', [
            'only' => [
                'getPostCategory',
                'getAllPostRandom',
                'updatePost',
               
            ]
        ]);*/
    }
	public function index()
    {

      return view('posts');
    }
    public function single_post_dashboard($pid)
    {
        $finalArray = [];
        $posts = Post::where('p_id', $pid)->get();
        foreach ($posts as $post) {

            $post['post_category_name']='Change Category';
            $post['business'] = Business::where('BID', $post['BID'])->get();
           
            array_push($finalArray, $post);
        }
       
            return view('post_single', ['result' => $finalArray]); 
        
       
        
       
    }
    
	public function getPostCategory(): JsonResponse
    {
		
		$results = DB::select('select * from posts_category');
		
		if (count($results) != 0) 
		{
		return $this->successResponse($results);
		}
		else 
		{
            return $this->errorResponse('no posts category found', Response::HTTP_NOT_FOUND);
        }
	}
    public function getAllPostRandom()
    {
        //varaibles for random adds

        $btwn=3;
        $adds_indx=0;
        $finalArray = [];
        $add_list = DB::select("select * from advertisement where ad_status='1' order by ad_id desc");
        $tot_ads=count($add_list);

        //end
               
		$results = DB::select("select * from view_post_all where post_status='1' order by p_id desc");

        $tot_live_feeds=count($results);
		
		if (count($results) != 0) 
		{
           

            //modified
            $i=0;
            foreach ($results as $res) 
                {
                   $i++; 

                    array_push($finalArray, $res);
                    //random adds
                    if($i%$btwn==0)
                    {

                    
            if($adds_indx<$tot_ads)
            {

            
            $adds=array(
                'p_id' => '1',
                'business_name' => $add_list[$adds_indx]->ad_title,
                'business_logo' => $add_list[$adds_indx]->ad_image,
                'BID' => 'b02fb50d-5e04-4d2a-9f0a-c3cf6813ec62_b819b850-8585-11eb-9ed1-8734a37ec2a0',
                'post_text' => $add_list[$adds_indx]->ad_title,
                'post_type' => 3,
                'post_image' =>$add_list[$adds_indx]->ad_image,
                'post_status' => "1",
                'category_name' => 'Advertisement',
                );
                array_push($finalArray, $adds);
                $adds_indx++;
        }
    }
    
        //end random adds.
        
            }//end of foreach

        //return $this->successResponse($results);
		return $this->successResponse($finalArray);
		}
		else 
		{
            return $this->errorResponse('no posts found', Response::HTTP_NOT_FOUND);
        }
	}
    public function get_latest_post()
    {
        $results = DB::select("select * from view_post_all where post_status='5' order by p_id desc limit 5");

        
		
		if (count($results) != 0) 
		{
       
		return $this->successResponse($results);
		}
		else 
		{
            return $this->errorResponse('no posts found', Response::HTTP_NOT_FOUND);
        }
    }
    public function get_single_post($pid)
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
    


    public function getAllPostWithReportCount(Request $request)
    {
        $rcvd = $request->toArray();
        $qry='select * from view_post_all where 1';
        if(isset($rcvd ['status_filter']))
        {
            if($rcvd ['status_filter']!="")
        {
           $qry.=' and post_status='.$rcvd ['status_filter'];
        }
        }
       
            if(isset($rcvd ['post_title']))
            {
            if($rcvd ['post_title']!="")
                  {
            
             $qry.="  and post_text like '%".$rcvd ['post_title']."%'";
                  }
                }
            $qry.=' order by p_id desc';
	
        $results = DB::select($qry);
		
		if (count($results) != 0) 
		{
            foreach ($results as $res) 
                {
                  $post = DB::select("select count(*) as tot from post_reports where post_id=".$res->p_id);
                  $rcount=$post[0]->tot;
                  $res->post_report_count=$rcount;

                  //post auto pending/////

                  if($rcount>0)
                  {
                    $data=array(
                        'post_status' => '0',
                       // 'updated_at' => date('Y-m-d H:i:s'),
                        );
                    DB::table('posts')->where('p_id', $res->p_id)->update($data); 
                    $res->post_status=3;   
                  }
                   //post auto pending/////
                }
		return $this->successResponse($results);
		}
		else 
		{
            return $this->errorResponse('no posts found', Response::HTTP_NOT_FOUND);
        }
	}
	
    public function createPost(Request $request)
    {
		 /*if($request->ajax()){
			 $post = $request->toArray();
                return $this->successResponse($post, 'From ajax');
            }*/
         $rules = [
            'BID' => 'required',
            'post_text' => 'required',
			//'post_image' => 'required|file',
            'post_type' => '',
            'post_status' => '',
            
        ];
		try {
            //$this->validate($request, $rules);
			$post = $request->toArray();
			//$post = $request->all();

           if (!Business::where([
                ['BID', $request->input('BID')],
            ])->first()) 
            {
                return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
            }
                
            else
            {
            $business = Business::where('BID', $request->input('BID'))->firstOrFail();
            $postName=$business['business_name'];
			$post['post_image'] = self::uploadImage($request, 'post_image', $postName);
            
            $post = Post::create($post);
        //app(\App\Http\Controllers\SearchController::class)->notification_mail("Need approvel in post");
            return $this->successResponse($post, 'Post added successfully');
        }
       
			
			} catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
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
                $destination_path = 'images/' . $postName . '/' . 'business_post/';
                $image = 'P-' . str_replace(' ', '_', date('Y-m-d H:i:s')) . '-' . $key . '.' . $file_ext;

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
    public function removeImage()
    {
        
            /* $filePath = "/images/idcard.jpg"; 
             if(file_exists(public_path($filePath))){
               unlink(public_path($filePath));
             } else {
               dd('File does not exists.');
             }*/
    
    $folderPath = public_path('images/test');

    $response = File::deleteDirectory($folderPath);

    dd($response);
         
    }
    public function editpost(Request $request)
    {
        $tbl="posts";
		 
         /*$rules = [
            'BID' => 'required',
            'post_text' => 'required',
			'post_image' => 'required|file',
            'post_type' => '',
            
        ];*/
		try {
            //$this->validate($request, $rules);
			$post = array_filter($request->toArray());
            //return $this->successResponse($post, 'Post tested');
           
            if($request->hasFile('post_image'))
           {
           
            $post['post_image']= self::uploadImage($request, 'post_image', $post['post_text']);
           }
           $post['updated_at']=date('Y-m-d H:i:s');
           /*$data=array(
                'p_id' => $post['p_id'],
                'post_text' => $post['post_text'],
                'post_image' => $post_image,
                'post_type' => $post['post_type'],
                'updated_at' => date('Y-m-d H:i:s'),
                );*/
			
            DB::table($tbl)->where('p_id', $post['p_id'])->update($post);  
			
            return $this->successResponse($post, 'Post updated successfully');
			
			} catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }
    public function editpoststatus(Request $request)
    {
        $tbl="posts";
		 
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
                'post_status' => $post['post_status'],
                'updated_at' => date('Y-m-d H:i:s'),
                );
			
            DB::table($tbl)->where('p_id', $post['p_id'])->update($data);  
			
            return $this->successResponse($post, 'Post status updated successfully');
			
			} catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }
    public function getSearchFilter(Request $request): JsonResponse
    {
        $filter = "";
        $results=array();
        $filter = $request->toArray();
		
        if($filter['filter_text']!="")
        {
            $results['business'] = DB::select("select BID from business where business_name like '%".$filter['filter_text']."%'");
            $results['products'] = DB::select("select arabic_name from products where english_name like '%".$filter['filter_text']."%'");
            
        }
		
       // $results['business'] = DB::select("select BID from business where business_name like '%".$filter['post_text']."%'");
        //$results = DB::select("select * from posts where post_text like '%".$filter['post_text']."%'");
		
		if (count($results) != 0) 
		{
		return $this->successResponse($results);
		}
		else 
		{
            return $this->errorResponse('no posts found', Response::HTTP_NOT_FOUND);
        }
	}
    public function delete_post(Request $request)
    {
        $advr = $request->toArray();
       // return $this->successResponse($advr);
       $ad_id=$advr['p_id'];
        $adv = Post::where('p_id', $ad_id)->first();
      
        if ($adv) {
              
            
              Post::where('p_id', $ad_id)->delete();

             /* if(file_exists('post_image')){
                unlink($adv['post_image']);
            }*/
              
             
           // $this->removeImage($product['product_main_image']);
            return $this->successResponse('Post deleted successfully',$adv);
        } else {
            return $this->errorResponse('no data found with given id', 404);
        }

    }
    public function delete_needs_BY($BID)
    {
        $results=[];
        if (!Business::where([
            ['BID', $BID],
        ])->first()) {
            return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
        }
    }
    public function getAllNeedsByBid($BID)
    {
        $results=[];
        if (!Business::where([
            ['BID', $BID],
        ])->first()) {
            return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
        }
            
        else
        {
                    $feeds_count=0;
                    
                    
                    $filter_list=[3];//announcement and Event

                    $filter_cat=implode(",",$filter_list);
                    
                   
                    $gen="select * from view_post_all where post_status='1' and BID='".$BID."'";

                    $order_by=" order by p_id desc";
                  
                    
                    $qry=$gen." and post_type in (".$filter_cat.")";
                    $gen_feeds = DB::select($qry.$order_by);
                                                
                    if (count($gen_feeds) != 0) 
                    {
                        $feeds_count++;
                        foreach ($gen_feeds as $gfeeds) 
                        {
                            array_push($results, $gfeeds);
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
}
