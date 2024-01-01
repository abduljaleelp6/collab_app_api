<?php


namespace App\Http\Controllers;


use App\Models\AuthenticationDocument;
use App\Utils\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use League\Flysystem\Exception;

class AuthController extends Controller
{
    use ApiResponder;

    public function __construct()
    {
        $this->middleware('auth');
    }

    function uploadTradeLicence(Request $request): \Illuminate\Http\JsonResponse
    {
        $message="";
        //return $this->successResponse($request, 'Authentication Documents successfully added', 200);
        $rules = [
            'BID' => 'required',
            'image_url' => 'file',
            'business_name' => 'required',
            //'image2_url' => 'file',
            'expiry_date' => '',

        ];
        try {
            $this->validate($request, $rules);
            $document = $request->toArray();
            $document['image_url'] = $this->uploadImages($request, 'image_url');
            $document['image2_url'] = $this->uploadImages($request, 'image2_url');
            $sub_act = DB::select("select * from authentication_docs where BID='".$document['BID']."'");

            if (count($sub_act) != 0)
            {
                $data1=array(
                    'image_url' => $document['image_url'],
                    'image2_url' => $document['image2_url'],
                    'updated_at' => date('Y-m-d H:i:s'),
                );

                $response =DB::table('authentication_docs')->where('BID', $document['BID'])->update($data1);
                $message='Authentication Documents successfully Updated';
            }
            else
            {

                $response = AuthenticationDocument::create($document);
                $message='Authentication Documents successfully added';
            }

            return $this->successResponse($response, $message, 200);
        } catch (ValidationException $e) {
            return $this->errorResponse($e->getMessage(), $e->getCode(), $e->response);
        }

    }

    function uploadImages(Request $request, $key): string
    {
        // every business has sprite folder by its name in public __DIR__ ech folder contents 3 subFolder
        // (1) business_identity,(2) business_products and (3) business_authentication_docs
        if ($request->hasFile($key)) {
            $original_filename = $request->file($key)->getClientOriginalName();
            $original_filename_arr = explode('.', $original_filename);
            $file_ext = end($original_filename_arr);
            $destination_path = 'images/' . str_replace(' ', '_', $request->input('business_name') .
                    '/' . 'business_authentication_docs' . '/');
            $image = time().'-'.'B-' . $key . '.' . $file_ext;

            if ($request->file($key)->move($destination_path, $image)) {
                return $destination_path . $image;
            } else {
                return 'Cannot upload file';
            }
        } else {
            return 'File not found';
        }
    }

    function getBusinessTradeLicence($BID): \Illuminate\Http\JsonResponse
    {
        try {
            $authDoc = AuthenticationDocument::where([
                ['BID', $BID]
            ])->firstOrFail();
            return $this->successResponse($authDoc, 'BID' . $BID);
        } catch (Exception $exception) {
            return $this->errorResponse('No trade license found for this business', $exception->getCode(), $exception->getTrace());
        }
    }
}
