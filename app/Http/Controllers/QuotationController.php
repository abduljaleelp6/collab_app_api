<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utils\ApiResponder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Models\Quotation;
use App\Models\QuotationDetails;
use App\Models\Business;
//use PDF;
class QuotationController extends Controller
{
    //
    use ApiResponder;
    
    public function getQuotationList(Request $request)
    {
        $rcvd = $request->toArray();
       //$data=array();
       $qry="SELECT quotations.*,count(pid) as tot_items FROM quotations join quotation_details on quotations.rfq_id=quotation_details.rfq_id where 1";
       if(isset($rcvd ['ReceiverBID']))
       {
        $qry.=" and ReceiverBID='".$rcvd ['ReceiverBID']."'";
       }
       
       $qry.=" group by quotations.rfq_id";
       $results = DB::select($qry);
        
       foreach ($results as $res) 
                {
                    $res->sender_name=$this->get_Business_Info($results[0]->RequestedBID)[0]->business_name;  
                    $res->receiver_name=$this->get_Business_Info($results[0]->ReceiverBID)[0]->business_name; 
                    //array_push($data,$res)
                }
    
      return $this->successResponse($results);
    }
    public function getQuotationList_BID(Request $request)
    {
        $rcvd = $request->toArray();
       //$data=array();
       $qry="SELECT quotations.*,count(pid) as tot_items FROM quotations join quotation_details on quotations.rfq_id=quotation_details.rfq_id where 1";
       if(isset($rcvd ['ReceiverBID']))
       {
        $qry.=" and ReceiverBID='".$rcvd ['ReceiverBID']."'";
       }
       
       $qry.=" group by quotations.rfq_id";
       $results = DB::select($qry);
        
       foreach ($results as $res) 
                {
                    $res->sender_name=$this->get_Business_Info($results[0]->RequestedBID)[0]->business_name;  
                    $res->receiver_name=$this->get_Business_Info($results[0]->ReceiverBID)[0]->business_name; 
                    //array_push($data,$res)
                }
    
      return $this->successResponse($results);
    }
    public function delete_quote(Request $request)
    {
        $advr = $request->toArray();
       // return $this->successResponse($advr);
       $ad_id=$advr['p_id'];
        $adv = Post::where('p_id', $ad_id)->first();
      
        if ($adv) {
              
            
              Post::where('p_id', $ad_id)->delete();

              if(file_exists('post_image')){
                unlink($adv['post_image']);
            }
              
             
           // $this->removeImage($product['product_main_image']);
            return $this->successResponse('Post deleted successfully',$adv);
        } else {
            return $this->errorResponse('no data found with given id', 404);
        }

    }
    public function edit_quote_status()
    {
        
    }
    public function viewQuote($qid)
    {
      return $this->successResponse($qid);
    }
    public function create_quotation(Request $request): JsonResponse
    {

       /* $rules = [
//        http://pub.dartlang.org/packages/uuid to create BUID in flutter use this and device uid
            'RequestedBID' => 'bail|required|unique:business',  //bail to stop operation when first validation failure
            'ReceiverBID' => 'bail|required|unique:business', 
            'business_email' => 'required|max:255|unique:business',//do email verification on mobile side
            'business_main_phone_number' => 'required|max:255|unique:business',
            'business_address' => 'nullable',
            'business_lat' => 'required',
            'business_lng' => 'required',
          
        
           // 'fcm_token' => 'nullable',
        ];*/
        try {
            //$this->validate($request, $rules);
            $rcvd = $request->toArray();

           if (!Business::where([
                ['BID', $rcvd['RequestedBID']],
            ])->first()) {
                return $this->errorResponse('Invalid Requested BID', Response::HTTP_BAD_REQUEST);
            }

            if (!Business::where([
                ['BID', $rcvd['ReceiverBID']],
            ])->first()) {
                return $this->errorResponse('Invalid Receiver BID', Response::HTTP_BAD_REQUEST);
            }
            $quotation=array(
            
                'RequestedBID' => $rcvd['RequestedBID'],
                'ReceiverBID' => $rcvd['ReceiverBID'],
            );
                
            $result = Quotation::create($quotation);
            
                        $quotation_details = $rcvd['details'];
                        $rfq="";
                        foreach($quotation_details as $details) 
                        {
                            $rfq=$result['id'];
                            $quote_details=array(
                                'rfq_id' =>$result['id'],
                                'pid' => $details['pid'],
                                'quantity' => $details['quantity'],
                                'rate' => 0,
                            );
                            $qt = QuotationDetails::create($quote_details);  
                        }

                        $rcvd['rfq_id']=$rfq;
                        
            return $this->successResponse($rcvd, 'Quotation Successfully Created', $request);

        } catch (ValidationException $e) {
            return $this->errorResponse("Please fill all the required fields", $e->getCode(), $request->all());
        }
    }

    public function get_Business_Info($bid)
    {
        $qry1="select * from business where BID='".$bid."'";
        $results=DB::select($qry1);
        return $results;
    }
    
    public function getSingleQuoteData($qid)
    {
       
       $qry="SELECT * FROM quotations join quotation_details on quotations.rfq_id=quotation_details.rfq_id join products on products.product_identifier=quotation_details.pid where quotations.rfq_id=".$qid;
       $results = DB::select($qry);
       
       $quotation=array();
      
       if (count($results) != 0) 
		{
           
            $quotation['sender']=$this->get_Business_Info($results[0]->RequestedBID);

           
            $quotation['receiver']=$this->get_Business_Info($results[0]->ReceiverBID);

            $quotation['quotation_details']=$results;
           /* foreach ($results as $res) 
                {
                }*/
        }
    
      //return $results;
      return $quotation;
    }
    public function generateQuotation($qid)
    {
       
        
        $results=$this->getSingleQuoteData($qid);
      
       //$this->generate_pdf_format($results);
       //print_r($results);
       //$this->generate_html_format($results);
       return view('rfq_single', ['result' => $results]); 
    }
    public function generate_html_format($results)
    {
        
       
        $tbl_top='<html>

                <head>
                <link rel="stylesheet" type="text/css"
                        href="https://fonts.googleapis.com/css?family=Tangerine">

                <style>
                .round-corner {
                    -webkit-border-radius: 5px 5px 5px 5px; 
                    -moz-border-radius: 5px 5px 5px 5px;
                    -o-border-radius: 5px 5px 5px 5px;
                    border-radius: 5px 5px 5px 5px;
                }
                @font-face { font-family: JuneBug; src: url("JUNEBUG.TTF"); } 
                body{
                //font-family: "Arvo", serif;
                //font-size: 48px;
                //@import url("https://fonts.googleapis.com/css?family=Open+Sans");
                @import url("http://fonts.googleapis.com/css?family=Kavoon");
                //color:#566573;


                }

                </style>
                </head><body><div style="margin: auto;width: 10px;border: 3px solid green;padding: 10px;">';

                $content= '<div style="text-align:center;"><table style="width:100%;margin-left: auto;
                margin-right: auto;" border="0">
                <tr><td style=""><img style="width:150px;height:100px;" src="/'.$results['sender'][0]->business_logo.'"><br/><br/></td></tr>
                <tr><td style="width:10%">Name</td><td> : '.$results['sender'][0]->business_name.'</td></tr>
                <tr><td style="width:10%">Address</td><td> : '.$results['sender'][0]->business_city.','.$results['sender'][0]->business_country.'</td></tr>
                <tr><td style="width:10%">Email</td><td> : '.$results['sender'][0]->business_email.'</td></tr>
                <tr><td style="width:10%">Phone</td><td> : '.$results['sender'][0]->business_main_phone_number.'</td></tr></table>
                </div>';

                $content.= '<div style="text-align:center;"><h1><u>Request For Quote</u></h1></div>';

          
           $content.= '<div><table style="width:100%;" border="0">
           <tr><td style="">To<br/>'.$results['receiver'][0]->business_name.'</td></tr>
           <tr><td style="">Dubai,United Arab Emirates</td></tr>
           <tr><td style="">'.$results['receiver'][0]->business_email.'</td></tr>
           <tr><td style="">'.$results['receiver'][0]->business_main_phone_number.'</td></tr>
           </table></div>';
       

        $content.= '<div style="text-align:center;"><table style="width:500px;" border="1">
        <thead>
        <tr style="font-size:12px;background-color:#6c9ecf;color:white;">
        <th style="width:5%;text-align:center;">#</th>
        <th style="width:60%"><b>Particulars</b></th>
        <th style="width:35%"><b>Quantity</b></th>
       
        </thead>
        </tr>';

      
        $i=0;
        $count=0;
        foreach ($results['quotation_details'] as $quote_details) 
        {
            $i++;
            $amount=($quote_details->quantity)*($quote_details->rate);
            $amount=number_format((float)$amount, 2, '.', '');

            $count++;
         
            $content.= '<tr style="font-size:10px;">
            <td style="width:5%;text-align:center;">'.$i.'</td>
            <td style="width:60%">'.$quote_details->english_name.'</td>
            <td style="width:35%">'.$quote_details->quantity.'</td>
           
            </tr>';

        }
       while($i<10)
        {
            $i++;
            $content.= '<tr style="font-size:10px;height:10px;">
            <td style="width:5%"></td>
            <td style="width:60%"></td>
            <td style="width:35%"></td>
           
            </tr>';
        }
        $content.= '<tr style="font-size:12px;background-color:#6c9ecf;color:white;">
        
        <td style="width:65%;text-align:right;" span="2"><b>Total Items</b></td>
        <td style="width:35%">'.$count.'</td>
       
        </tr>';
        $content.='</table></div><br/>
        <p>
        We hope to hear from you soon regarding this quote request. 
        We also look forward to a long-standing business relationship with you if this transaction is a success. 
        </p></div></body></html>';

        echo $content;

       
    }
    public function generate_pdf_format($results)
    {
        //$results=$this->getSingleQuoteData($qid);
        //return $results;
        //return $this->successResponse($results);
        $tbl_top='<html>

                <head>
                <link rel="stylesheet" type="text/css"
                        href="https://fonts.googleapis.com/css?family=Tangerine">

                <style>
                .round-corner {
                    -webkit-border-radius: 5px 5px 5px 5px; 
                    -moz-border-radius: 5px 5px 5px 5px;
                    -o-border-radius: 5px 5px 5px 5px;
                    border-radius: 5px 5px 5px 5px;
                }
                @font-face { font-family: JuneBug; src: url("JUNEBUG.TTF"); } 
                body{
                //font-family: "Arvo", serif;
                //font-size: 48px;
                //@import url("https://fonts.googleapis.com/css?family=Open+Sans");
                @import url("http://fonts.googleapis.com/css?family=Kavoon");
                //color:#566573;


                }

                </style>
                </head><body>';

                

                $content= '<div><table style="width:100%;" border="0">
                <tr><td style=""><img style="width:150px;height:50px;" src="/'.$results['sender'][0]->business_logo.'"><br/><br/></td></tr>
                <tr><td style="width:10%">Name</td><td> : '.$results['sender'][0]->business_name.'</td></tr>
                <tr><td style="width:10%">Address</td><td> : '.$results['sender'][0]->business_city.','.$results['sender'][0]->business_country.'</td></tr>
                <tr><td style="width:10%">Email</td><td> : '.$results['sender'][0]->business_email.'</td></tr>
                <tr><td style="width:10%">Phone</td><td> : '.$results['sender'][0]->business_main_phone_number.'</td></tr>
                </div>';

                $content.= '<div style="text-align:center;"><h1><u>Request For Quote</u></h1></div>';

                $content.= '<div><table style="width:100%;" border="0">
           <tr><td style="">To<br/>'.$results['receiver'][0]->business_name.'</td></tr>
           <tr><td style="">Dubai,United Arab Emirates</td></tr>
           <tr><td style="">'.$results['receiver'][0]->business_email.'</td></tr>
           <tr><td style="">'.$results['receiver'][0]->business_main_phone_number.'</td></tr>
           </table></div>';
        /*$content.= '<div><table style="width:100%;" border="1">
        <thead>
        <tr style="font-size:14px;background-color:#B2B2B2">
        <th style="width:5%">#</th>
        <th style="width:30%">Particulars</th>
        <th style="width:20%">Quantity</th>
        <th style="width:20%;">Rate</th>
        <th style="width:25%;">Amount</th>
        </thead>
        </tr>';*/

        $content.= '<div><table style="width:500px;" border="1">
        <thead>
        <tr style="font-size:12px;background-color:#6c9ecf;color:white;">
        <th style="width:5%;text-align:center;">#</th>
        <th style="width:60%"><b>Particulars</b></th>
        <th style="width:35%"><b>Quantity</b></th>
       
        </thead>
        </tr>';

        /*$qry="SELECT * FROM quotations join quotation_details on quotations.rfq_id=quotation_details.rfq_id join products on products.product_identifier=quotation_details.pid;";
        $results = DB::select($qry);*/

        $i=0;
        $count=0;
        foreach ($results['quotation_details'] as $quote_details) 
        {
            $i++;
            $amount=($quote_details->quantity)*($quote_details->rate);
            $amount=number_format((float)$amount, 2, '.', '');

            $count++;
           /* $content.= '<tr >
            <td style="width:5%">'.$i.'</td>
            <td style="width:30%">Product-'.$i.'</td>
            <td style="width:20%">'.$quote_details->quantity.'</td>
            <td style="width:20%;">'.$quote_details->rate.'</td>
            <td style="width:25%;">'.$amount.'</td>
            </tr>';*/
            $content.= '<tr style="font-size:10px;">
            <td style="width:5%;text-align:center;">'.$i.'</td>
            <td style="width:60%">'.$quote_details->english_name.'</td>
            <td style="width:35%">'.$quote_details->quantity.'</td>
           
            </tr>';

        }
       while($i<10)
        {
            $i++;
            $content.= '<tr style="font-size:10px;height:10px;">
            <td style="width:5%"></td>
            <td style="width:60%"></td>
            <td style="width:35%"></td>
           
            </tr>';
        }
        $content.= '<tr style="font-size:12px;background-color:#6c9ecf;color:white;">
        
        <td style="width:65%;text-align:right;" span="2"><b>Total Items</b></td>
        <td style="width:35%">'.$count.'</td>
       
        </tr>';
        $content.='</table><br/>
        <p>
        We hope to hear from you soon regarding this quote request. 
        We also look forward to a long-standing business relationship with you if this transaction is a success. 
        </p></div>';

      

        PDF::SetTitle('Quotation');
        PDF::AddPage();
        PDF::writeHTML($content, true, false, true, false, '');

        PDF::Output('RFQ_Collab_APP.pdf');
    }
}
