<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utils\ApiResponder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
class ChatController extends Controller
{
    use ApiResponder;
    public function getData_Curl($url_slug,$data)
    {
        $results=array();
        $url='http://192.168.0.102:3000/'.$url_slug;
        //$url='http://localhost:3000/'.$url_slug;
        $headers = [
            // 'Authorization: key=' . $SERVER_API_KEY,
             'Content-Type: application/json',
         ];
         $dataString = json_encode($data);


         $ch = curl_init();

          curl_setopt($ch, CURLOPT_URL, $url);

          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

          $response = curl_exec($ch);
         // $response = json_decode(curl_exec($ch),true);
         return $response;









    }
    public function getMessages(Request $request)
    {
        $rcvd = $request->toArray();
        $fromUserId=$rcvd['userId'];
        $to_user_id=$rcvd['toUserId'];



        $data = [

            "userId" => $fromUserId,
            "toUserId" => $to_user_id,
           ];


           $response = json_decode($this->getData_Curl("getMessages",$data),true);

          return $this->successResponse($response['messages']);


	}
    public function setSocket(Request $request)
    {
        //`UPDATE user SET socketid = ?, online= ? WHERE id = ?`, [userSocketId, 1, userId]
        return $this->successResponse($request);
    }
    public function setSceneStatus(Request $request)
    {
        //``UPDATE message SET message_status = 1 WHERE from_user_id = ? AND to_user_id = ?`, [params.toUserId, params.fromUserId]);
        return $this->successResponse($request);
    }
    public function setMessageStatus(Request $request)
    {
        //`UPDATE user SET socketid = ?, online= ? WHERE id = ?`, [userSocketId, 1, userId]
        $tbl="message";
        $affected1 =DB::table($tbl)->where('message_status', 0)->update($data1);

        return $this->successResponse("",$affected1." Rows Affected in ".$tbl);

    }
    public function getChatUserList(Request $request)
    {
        //this.db.query(`SELECT id,username,online,socketid,business_logo,business_name FROM user join business on business.BID=user.BID WHERE id = ?`, [userId]),

       // this.db.query(`SELECT id,username,online,socketid,business_logo,business_name FROM user join business on business.BID=user.BID WHERE online = ? and id != ?`, [1, userId])

       $qry="select * from ";

       $results = DB::select($qry);

      return $this->successResponse($results);
    }
    public function addMessages(Request $request)
    {

    }
    public function get_Group_List(Request $request)
    {

     $qry="select * from chat_group";

       $results = DB::select($qry);

      return $this->successResponse($results);
    }
    public function get_Group_List_with_count(Request $request)
    {

     $qry="select * from chat_group where 1";
     $results = DB::select($qry);
     foreach ($results as $res)
     {
     }



      return $this->successResponse($results);
    }

    static function uploadChatAttachments(Request $request): string
    {
        $key="files";
        if ($request->hasFile($key)) {
            $allowedExt = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG','pdf'];
            $orgRxt = $request->file($key)->getClientOriginalExtension();

            //$businessName = str_replace(' ', '_', $request->input('senderName'));
            //$receiverName = str_replace(' ', '_', $request->input('receiverName'));

            if (in_array($orgRxt, $allowedExt)) {
                $original_filename = $request->file($key)->getClientOriginalName();
                $original_filename_arr = explode('.', $original_filename);
                $file_ext = end($original_filename_arr);
               // $destination_path = 'attatchments/' . $businessName . '/' . 'chat' . '/' . $receiverName . '/';
                $destination_path = 'attatchments/chat/' ;
                $image = 'Collab' . '-' . date('Y-m-d H:i:s') . '.' . $file_ext;
                $image = str_replace(' ', '_', $image);
                if ($request->file($key)->move($destination_path, $image)) {
                    return $destination_path . $image;
                } else {
                    return 'Cannot upload file';
                }
            } else {
                return false;
            }
        } else {
            return 'File not found';
        }
    }


    //
}
