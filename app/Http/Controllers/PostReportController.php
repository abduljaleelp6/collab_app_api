<?php

namespace App\Http\Controllers;
use App\Models\Business;
use App\Models\ReportPost;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Utils\ApiResponder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;


class PostReportController extends Controller
{
    //
    use ApiResponder;
    public function createReport(Request $request)
    {
		
		try {
            //$this->validate($request, $rules);
			$postReport = $request->toArray();

           if (!Business::where([
                ['BID', $postReport['reporter_bid']],
            ])->first()) {
                return $this->errorResponse('Invalid Business ID', Response::HTTP_BAD_REQUEST);
            }
                
			
            $postReport= ReportPost::create($postReport);
			
			return $this->successResponse($postReport, 'Reported the post successfully');
			
        
			} catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
            
        }
    }
    public function getAllPostReport(Request $request)
    {
        $rcvd = $request->toArray();
        $results = [];
        $qry='select * from post_reports where 1 ';
        if(isset($rcvd ['search']))
        {
            //$qry.=' and business_account_status='.$rcvd ['search'];
        }
		$reports = DB::select($qry);

		$total = count((array)$reports);
		if ($total != 0) 
		{
            
                foreach ($reports as $rpt) 
                {
                    $reported_by="";
                    $post = DB::select("select * from posts where p_id=".$rpt->post_id);
                    $posted = DB::select("select * from business where BID='".$rpt->poster_bid."'");
                    $rpt->post_text=$post[0]->post_text;
                    $rpt->posted_by=$posted[0]->business_name;
                    
                    if($rpt->reporter_bid=="0")
                    {
                        $reported_by="Admin";
                    }
                    else
                    {
                        $reported = DB::select("select * from business where BID='".$rpt->reporter_bid."'");
                        $reported_by=$reported[0]->business_name;
                    }

                    $rpt->reported_by=$reported_by;
                    $rpt->post_status=$post[0]->post_status;
                    
                    array_push($results, $rpt);
                }
		return $this->successResponse($results);
		}
		else 
		{
            return $this->errorResponse('no post report found', Response::HTTP_NOT_FOUND);
        }
	}
    
}
