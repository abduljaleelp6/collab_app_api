<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\ApiResponder;
use Illuminate\Support\Facades\DB;
use App\Models\Business;
use App\Models\Advertisement;
use Illuminate\Http\Response;
class AdvertisementController extends Controller
{
    //
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
    public function create_add(Request $request)
    {
		 /*if($request->ajax()){
			 $post = $request->toArray();
                return $this->successResponse($post, 'From ajax');
            }*/
         $rules = [
            'BID' => 'required',
            'ad_title' => 'required',
            'ad_text' => 'required',
            'ad_image' => 'required',
			
            
        ];
		try {
            //$this->validate($request, $rules);
			$adds = $request->toArray();
			//$post = $request->all();

           if (!Business::where([
                ['BID', $request->input('BID')],
            ])->first()) {
                return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
            }
                
            else
            {
            $business = Business::where('BID', $request->input('BID'))->firstOrFail();
            $postName=$business['business_name'];
			$adds['ad_image'] = self::uploadImage($request, 'ad_image', $postName);
            
            $adds = Advertisement::create($adds);
            return $this->successResponse($adds, 'Advertisement added successfully');
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
                $destination_path = 'images/Advertisement/';
                $image = 'ads-' . str_replace(' ', '_', date('Y-m-d H:i:s')) . '-' . $key . '.' . $file_ext;

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
    
    public function get_adds_category(): \Illuminate\Http\JsonResponse
    {
        
        $qry='select * from advertisement_category';
        $results = DB::select($qry);
		
		if (count($results) != 0) 
		{
           
		return $this->successResponse($results);
		}
		else 
		{
            return $this->errorResponse('no categories found', Response::HTTP_NOT_FOUND);
        }
	}
    public function get_All_Adds()
    {
		$results = DB::select('select * from advertisement where ad_status=1 order by ad_id desc');
		
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
	}
    public function get_All_Adds_List($country_code)
    {
        $qry="select * from advertisement ";
        $join=" join business on";
        $order_by=" order by ad_id desc";
		$results = DB::select('select * from advertisement order by ad_id desc');
		
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
	}
    public function change_adds_status(Request $request)
    {
        $tbl="advertisement";
		 
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
                'ad_status' => $post['ad_status'],
                'updated_at' => date('Y-m-d H:i:s'),
                );
			
            DB::table($tbl)->where('ad_id', $post['ad_id'])->update($data);  
			
            return $this->successResponse($post, 'Advertisement status updated successfully');
			
			} catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }
    public function delete_Adds(Request $request)
    {
        $advr = $request->toArray();
       // return $this->successResponse($advr);
       $ad_id=$advr['ad_id'];
        $adv = Advertisement::where('ad_id', $ad_id)->first();
      
        if ($adv) {
              
            
              Advertisement::where('ad_id', $ad_id)->delete();
              if(file_exists('ad_image')){
                unlink($adv['ad_image']);
            }
           // $this->removeImage($product['product_main_image']);
            return $this->successResponse('Advertisement deleted successfully',$adv);
        } else {
            return $this->errorResponse('no data found with given id', 404);
        }

    }
}
