<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Mail;
use App\Utils\ApiResponder;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
	use ApiResponder;
	public function __construct()
    {
       //$this->middleware('auth');
	   /*$this->middleware('auth', [
            'only' => [
                'getPostCategory',
                'getAllPostRandom',

            ]
        ]);*/
    }
    public function createContact(Request $request)
	{


		try {
            $rcvd = $request->toArray();
            $op_type=$rcvd['operation_type'];
            if(isset($rcvd['contact_list']))
            {


            if($op_type=="create")
            {
                foreach($rcvd['contact_list'] as $contact_data)
                {

                    DB::table('business_contact')->insert([
                       'BID'=>$rcvd['BID'],
                        'contactName' => $contact_data['contactName'],
                        'customerID' => $contact_data['customerID'],
                        'contactPhoneCode' => $contact_data['contactPhoneCode'],
                        'contactPhone' =>$contact_data['contactPhone'],
                        'contactEmail' => $contact_data['contactEmail'],
                    ]);
                }
            }
            else if($op_type=="update")
            {
                foreach($rcvd['contact_list'] as $contact_data)
                {
                $data=array(

                    'contactName' => $contact_data['contactName'],
                    'customerID' => $contact_data['customerID'],
                    'contactPhoneCode' => $contact_data['contactPhoneCode'],
                    'contactPhone' =>$contact_data['contactPhone'],
                    'contactEmail' => $contact_data['contactEmail'],
                    'updated_at' => date('Y-m-d H:i:s'),

                );
                $res=DB::table('business_contact')->where('contact_id', $contact_data['contactID'])
          // ->where('business_password',$password)
           ->update($data);
            }
          }
          else if($op_type=="delete")
          {
            foreach($rcvd['contact_list'] as $contact_data)
            {

            DB::table('business_contact')->where('contact_id', $contact_data['contactID'])->delete();
            }
          }

        }
            return $this->successResponse($rcvd, 'test');
        } catch (Exception $exception) {
            return $this->errorResponse('Error', $exception->getCode(), $exception->getTrace());
        }

    }
    public function getContactByID(Request $request): JsonResponse
    {
        $rcvd = $request->toArray();
        $BID=$rcvd['BID'];

        //$BID="24c3a3c7-b913-4a1f-9a85-d23ebd07615a_1ecb2710-e3b8-11eb-bf79-09c326791bd3";
        $BID="0dd3a082-41c3-4055-b99f-5782d4e34d96_a24300c0-817c-11eb-9487-e1ea84824c75";
        $qry="select * from business_contact where contact_status=1 and BID='".$BID."'";

        if($rcvd['filter_text']!="")
        {
            $qry.=" and (contactName like '%".$rcvd['filter_text']."%' or contactPhone like '%".$rcvd['filter_text']."%')";
        }

        $order_by = " order by contactName ASC ";

        $lmt = " LIMIT " . $rcvd['start_from']. "," . $rcvd['per_page'];

       // $strt="2000";
       // $perpage="500";
       // $strt= $rcvd['start_from'];

        //$lmt = " LIMIT " . $rcvd['start_from']. "," . $rcvd['per_page'];
        //$lmt = " LIMIT " . $strt. "," . $perpage;

        //delete business_contact from business_contact join sms_report on business_contact.contactPhone=sms_report.contact_no WHERE sms_report.STATUS!='DELIVERED'
        //SELECT * from business_contact join sms_report on business_contact.contactPhone=sms_report.contact_no WHERE sms_report.STATUS!='DELIVERED'
        //UPDATE business_contact SET contactPhone = SUBSTRING(contactPhone, 4);

        $results = DB::select($qry . $order_by . $lmt);
        //$results = DB::select($qry);
		if (count($results) != 0)
		{
		return $this->successResponse($results);
		}
		else
		{
            return $this->errorResponse('business_contact', Response::HTTP_NOT_FOUND);
        }
	}
    public function getSMSMessageReport(Request $request): JsonResponse
    {
        $rcvd = $request->toArray();
       $BID=$rcvd['BID'];
       $fromDate=$rcvd['fromDate'];
       $toDate=$rcvd['toDate'];
        $sts=$rcvd['statusType'];
        $senderID=$rcvd['senderID'];
        $transferMode=$rcvd['transferMode'];

        $BID="24c3a3c7-b913-4a1f-9a85-d23ebd07615a_1ecb2710-e3b8-11eb-bf79-09c326791bd3";
        //$qry="select * from sms_report where status!='".$sts."'";
        $qry="select * from sms_report where 1";
           //$qry.=" and status!='".$sts."'";

        if($rcvd['filter_text']!="")
        {
            $qry.=" and (status like '%".$rcvd['filter_text']."%' or contact_no like '%".$rcvd['filter_text']."%')";
        }

        //SELECT * from sms_report WHERE STR_TO_DATE(send_time,'%d/%m/%Y')>'2022-03-20'
        //$order_by = " order by report_id ASC ";
        $order_by = " order by report_id DESC ";

       // $lmt = " LIMIT " . $rcvd['start_from']. "," . $rcvd['per_page'];

        // $strt="0";
         //$perpage="1000";
        // $strt= $rcvd['start_from'];

        $lmt = " LIMIT " . $rcvd['start_from']. "," . $rcvd['per_page'];
       // $lmt = " LIMIT " . $strt. "," . $perpage;


        $results = DB::select($qry . $order_by . $lmt);
        //$results = DB::select($qry . $order_by . $lmt);
        //$results = DB::select($qry);
        if (count($results) != 0)
        {
            return $this->successResponse($results);
        }
        else
        {
            return $this->errorResponse('business_contact', Response::HTTP_NOT_FOUND);
        }
    }
}
