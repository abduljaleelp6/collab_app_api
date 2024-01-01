<?php


namespace App\Http\Controllers;


use App\Models\Business;
use App\Models\Product;
use App\Models\ProductImages;
use App\Utils\ApiResponder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use League\Flysystem\Exception;

class ProductController extends Controller
{
    use ApiResponder;

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('auth', ['except' => ['single_product_dashboard']]);
    }

    public static function uploadImages(Request $request)
    {


    }

    public function getAllProductRandom(): JsonResponse
    {
        $finalArray = [];
        $products = Product::orderByRaw("RAND()")
            ->where('product_status', '=', 1)
            ->take(13)->get();
        if (count($products) != 0) {
            foreach ($products as $product) {
                $product['product_category_name'] = $this->get_category_subcategory($product['product_category_id'], "categories", "category_english_name", "category_identifier");
                $product['product_sub_category_name'] = $this->get_category_subcategory($product['product_sub_category_id'], "sub_categories", "category_name", "category_id");

                $productImages = ProductImages::where('product_identifier', $product['product_identifier'])->get();
                $product['images'] = $productImages;
                //for temporary
                $product['product_category_id'] = $this->get_category_subcategory($product['product_category_id'], "categories", "category_english_name", "category_identifier");
                $product['product_sub_category_id'] = $this->get_category_subcategory($product['product_sub_category_id'], "sub_categories", "category_name", "category_id");

                array_push($finalArray, $product);
            }
            return $this->successResponse($products);
        } else {
            return $this->errorResponse('no products found', Response::HTTP_NOT_FOUND);
        }
        return $this->getAllProductPaginated(0, 1);
    }

    public function get_category_subcategory($id, $tbl, $col_name, $where_col_name)
    {
        $name = "";


        $qry = "select " . $col_name . " as name from " . $tbl . " where " . $where_col_name . "='" . $id . "'";
        $result = DB::select($qry);
        if (count($result) != 0) {
            $name = $result[0]->name;
        }
        return $name;
    }

    public function getAllProductPaginated($start_from, $per_page): JsonResponse
    {
        $qry = "select * from products where product_status=1 ";
        $finalArray = [];
        $tot_count = 0;
        $all_products = DB::select($qry);
        if (count($all_products) != 0) {
            $tot_count = count($all_products);
        }

        $order_by = " order by product_creation_date DESC";

        $lmt = " LIMIT " . $start_from . "," . $per_page;

        $products = DB::select($qry . $order_by . $lmt);

        if (count($products) != 0) {
            foreach ($products as $product) {
                //$product->tot_count=$tot_count;
                $product->product_category_name = $this->get_category_subcategory($product->product_category_id, "categories", "category_english_name", "category_identifier");
                $product->product_sub_category_name = $this->get_category_subcategory($product->product_sub_category_id, "sub_categories", "category_name", "category_id");

                $productImages = ProductImages::where('product_identifier', $product->product_identifier)->get();
                $product->tot_count = $tot_count;
                $product->images = $productImages;
                $product->product_category_id = $this->get_category_subcategory($product->product_category_id, "categories", "category_english_name", "category_identifier");
                $product->product_sub_category_id = $this->get_category_subcategory($product->product_sub_category_id, "sub_categories", "category_name", "category_id");


                array_push($finalArray, $product);
            }
            return $this->successResponse($products);
        } else {
            return $this->errorResponse('no products found', Response::HTTP_NOT_FOUND);
        }
    }

    public function createProduct(Request $request): JsonResponse
    {
        $rules = [
            'BID' => 'required',
            'hs_code' => '',
            'arabic_name' => '',
            'english_name' => 'required',
            'product_category_id' => 'required',
            'product_sub_category_id' => 'required',
            'product_description' => 'required',
            'product_main_image' => 'required|file',
            'images' => '',
            'product_price' => '',
            'product_status' => '',
        ];
        try {
            $this->validate($request, $rules);
            $product = $request->toArray();
            if (Product::where([
                ['BID', $request->input('BID')],
                ['english_name', $request->input('english_name')],
            ])->first()) {
                return $this->errorResponse('Product with identical information is already exits', Response::HTTP_BAD_REQUEST);
            }
            $business = Business::where('BID', $request->input('BID'));
            $businessName = str_replace(' ', '_', $business->pluck('business_name')[0]);
            $product['product_main_image'] = self::uploadImage($request, 'product_main_image', $businessName);

            if ($product['product_main_image']) {
                $product = Product::create($product);
            } else {
                return $this->errorResponse('unsupported main image file format', 500);
            }
            /*
             *
        $id = $request['product_identifier'];
        $businessName = $request['business_name'];*/
            $request['product_identifier'] = $product['id'];
            $request['business_name'] = $businessName;
            $product['images'] = self::add_product_images($request);
            $product['product_it_self'] = json_encode($product->toArray());
            $product['request'] = json_encode($request->toArray());


            return $this->successResponse($product, 'Product added successfully');
        } catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }

    static function uploadImage(Request $request, $key, $businessName): string
    {
        /**
         * // every business has sprite folder by its name in public __DIR__ ech folder contents 3 subFolder
         * // (1) business_identity,(2) business_products and (3) business_authentication_docs
         * // (1) business_identity  contents of two files
         * //   -    business_logo
         * //   -    business_cover
         * //(2) business_products contents a folder foreach product
         */
        if ($request->hasFile($key)) {
            $allowedExt = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'];
            $orgRxt = $request->file($key)->getClientOriginalExtension();
            $businessName = str_replace(' ', '_', $businessName);

            if (in_array($orgRxt, $allowedExt)) {
                $original_filename = $request->file($key)->getClientOriginalName();
                $original_filename_arr = explode('.', $original_filename);
                $file_ext = end($original_filename_arr);
                $destination_path = 'images/' . $businessName . '/' . 'products' . '/' . $request->input('english_name') . '/';
                $image = 'P-' . str_replace(' ', '_', $request->input('english_name')) . '-' . $key . '.' . $file_ext;

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

    public function add_product_images(Request $request): JsonResponse
    {
        $id = $request['product_identifier'];
        $businessName = $request['business_name'];

        $this->uploadAdditionalImages($request, $id, $businessName);
        return $this->successResponse($request, 'Product Images successfully updated');
    }

    public function uploadAdditionalImages(Request $request, $id, $businessName)
    {
        $counter = 0;
        $result = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $orgName = $file->getClientOriginalName();
                $orgExt = $file->getClientOriginalExtension();
                $allowedExt = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'];
                $destination_path = 'images/' . $businessName . '/' . 'products' . '/' . $request->input('english_name') . '/';
                $image = 'p-' . str_replace(' ', '_', $request->input('english_name')) . '-' . $counter . '.' . $orgExt;
                if (in_array($orgExt, $allowedExt)) {
                    if ($file->move($destination_path, $image)) {
                        array_push($result, ProductImages::create([
                            'product_identifier' => $id,
                            'image_path' => $destination_path . $image
                        ]));
                    }
                } else {
                    return 'file ext not allowed';
                }
                $counter++;
            }

            return $result;
        } else {
            return 'no images found';
        }
    }

    public function updateProductDashboard(Request $request)
    {
        try {
            $pid = $request['product_identifier'];
            $rcvd = $request->toArray();
            //return $this->successResponse($rcvd, 'test');
            /*$rules = [
                'hs_code' => 'required|max:255',
                'arabic_name' => 'max:255',
                'english_name' => 'max:255',
                'product_category_id' => 'max:255',
                'product_sub_category_id' => 'max:255',
                'product_description' => 'max:255',
                'product_main_image' => 'max:255',
            ];
            $this->validate($request, $rules);*/

            $data = array(
                'hs_code' => $rcvd['hs_code'],
                'arabic_name' => $rcvd['arabic_name'],
                'english_name' => $rcvd['english_name'],
                'product_description' => $rcvd['product_description'],
                'product_price' => $rcvd['product_price'],

                //'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table('products')->where('product_identifier', $rcvd['product_identifier'])->update($data);
            /*$product = Product::where('product_identifier', $pid)->update(
               // ['hs_code' => $request['hs_code']],
                //['arabic_name' => $request['arabic_name']],
                ['english_name' => $request['english_name']],
                ['product_description' => $rcvd['product_description']],
                //['product_category_id' => $request['product_category_id']],
                //['product_sub_category_id' => $request['product_sub_category_id']],

                ['product_main_image' => $request['product_main_image']]
            );*/
            $product = Product::where('product_identifier', $pid)->first();
            $product = $product->fill($request->all());
            return $this->successResponse([$pid, $product], 'product successfully updated');
        } catch (Exception $e) {
            $this->errorResponse('business not  found', 404);
        }
    }

    public function getBusinessByBid($BID): JsonResponse
    {
        $finalArray = [];
        $products = Product::where('BID', $BID)
        ->where('product_status', '=', 1)
        ->orderBy('product_creation_date', 'DESC')
        ->get();
        foreach ($products as $product) {
            $product['images'] = ProductImages::where('product_identifier', $product['product_identifier'])->get();
            $product['product_category_name'] = $this->get_category_subcategory($product['product_category_id'], "categories", "category_english_name", "category_identifier");
            $product['product_sub_category_name'] = $this->get_category_subcategory($product['product_sub_category_id'], "sub_categories", "category_name", "category_id");
            //for temporary
            $product['product_category_id'] = $this->get_category_subcategory($product['product_category_id'], "categories", "category_english_name", "category_identifier");
            $product['product_sub_category_id'] = $this->get_category_subcategory($product['product_sub_category_id'], "sub_categories", "category_name", "category_id");

            array_push($finalArray, $product);
        }
        if (count($finalArray) == 0) {
            return $this->errorResponse('no Business found with given BID', 404);
        }
        return $this->successResponse($finalArray);
    }

    public function updateProduct(Request $request, $pid)
    {
        try {
            $rules = [
                'hs_code' => 'required|max:255',
                'arabic_name' => 'max:255',
                'english_name' => 'max:255',
                'product_category_id' => 'max:255',
                'product_sub_category_id' => 'max:255',
                'product_description' => 'max:255',
                'product_main_image' => 'max:255',
            ];
            $this->validate($request, $rules);
            $product = Product::where('product_identifier', $pid)->update(
                ['hs_code' => $request['hs_code']],
                ['arabic_name' => $request['arabic_name']],
                ['english_name' => $request['english_name']],
                ['product_category_id' => $request['product_category_id']],
                ['product_sub_category_id' => $request['product_sub_category_id']],
                ['product_description' => $request['product_description']],
                ['product_main_image' => $request['product_main_image']]
            );
            $product = Product::where('product_identifier', $pid)->first();
            $product = $product->fill($request->all());
            return $this->successResponse([$pid, $product], 'product successfully updated');
        } catch (Exception $e) {
            $this->errorResponse('business not  found', 404);
        }
    }

    public function deleteProduct($productId): JsonResponse
    {
        $product = Product::where('product_identifier', $productId)->first();
        if ($product) {

            $productImage = ProductImages::where('product_identifier', $product['product_identifier'])->get();


            if (count($productImage) !== 0) {
                foreach ($productImage as $image) {

                    if (file_exists(public_path($image['image_path']))) {
                        unlink($image['image_path']);
                    }
                    ProductImages::where('product_image_identifier', $image['product_image_identifier'])->delete();
                }
            }
            if (file_exists(public_path($product['product_main_image']))) {
                unlink($product['product_main_image']);
            }
            Product::where('product_identifier', $productId)->delete();
            //$this->removeImage($product['product_main_image']);
            return $this->successResponse(['product' => $product, 'images' => $productImage], 'Product deleted successfully');
        } else {
            return $this->errorResponse('no product found with given id', 404);
        }

    }

    public function deleteProductImages($productId): JsonResponse
    {
        $product = Product::where('product_identifier', $productId)->first();
        if ($product) {
            $productImage = ProductImages::where('product_identifier', $product['product_identifier'])->get();
            if (file_exists(public_path($product['product_main_image']))) {
                unlink($product['product_main_image']);
            }

            if ($productImage) {
                foreach ($productImage as $image) {

                    if (file_exists(public_path($$image['image_path']))) {
                        unlink($image['image_path']);
                    }
                    ProductImages::where('product_image_identifier', $image['product_image_identifier'])->delete();
                }
            }
            Product::where('product_identifier', $productId)->delete();
            //$this->removeImage($product['product_main_image']);
            return $this->successResponse(['product' => $product, 'images' => $productImage], 'Product deleted successfully');
        } else {
            return $this->errorResponse('no product found with given id', 404);
        }

    }

    public function removeImage($filePath)
    {


        if (file_exists(public_path($filePath))) {
            unlink(public_path($filePath));
        } else {
            dd('File does not exists.');
        }

    }

    public function removeDirectory($filePath)
    {
        if (file_exists(public_path($filePath))) {

            $response = File::deleteDirectory($folderPath);
        } else {
            dd('File does not exists.');
        }

    }

    /*  public function getProductByMainCat()
      {

      }

      public function getProductBySubCat()
      {
      }*/
    public function getProductByCategory1($categoryId): JsonResponse
    {
        try {
            $products = Product::where('product_category_id', $categoryId)
                ->where('product_status', '=', 1)
                ->orderBy('product_creation_date', 'ASC')
                ->get();

            return $this->successResponse($products);
        } catch (Exception $e) {
            return $this->errorResponse('No product available with selected category', 404);
        }
    }

    public function getProductByCategory($categoryId): JsonResponse
    {
        if($categoryId==1000)
        {
            try {
                $products = Product::where('product_status', '=', 1)
                    ->orderBy('product_creation_date', 'DESC')
                    ->take(30)->get();
                foreach ($products as $product) {
                    //$product->tot_count=$tot_count;
                    $product['product_category_id'] = $this->get_category_subcategory($product['product_category_id'], "categories", "category_english_name", "category_identifier");
                    $product['product_sub_category_id'] = $this->get_category_subcategory($product['product_sub_category_id'], "sub_categories", "category_name", "category_id");
                }
                return $this->successResponse($products);
            } catch (Exception $e) {
                return $this->errorResponse('No product available with selected category', 404);
            }
        }
        else
        {
        try {
            $products = Product::where('product_category_id', $categoryId)
                ->where('product_status', '=', 1)
                ->orderBy('product_creation_date', 'DESC')
                ->get();
            foreach ($products as $product) {
                //$product->tot_count=$tot_count;
                $product['product_category_id'] = $this->get_category_subcategory($product['product_category_id'], "categories", "category_english_name", "category_identifier");
                $product['product_sub_category_id'] = $this->get_category_subcategory($product['product_sub_category_id'], "sub_categories", "category_name", "category_id");
            }
            return $this->successResponse($products);
        } catch (Exception $e) {
            return $this->errorResponse('No product available with selected category', 404);
        }
     }
    }

    public function getProductBySubcategory($subcategoryId): JsonResponse
    {
        try {
            $product = Product::where('product_sub_category_id', $subcategoryId)
                //->orderByAesc('product_creation_date')
                ->where('product_status', '=', 1)
                ->orderBy('product_creation_date', 'DESC')
                ->get();
            return $this->successResponse([$product], Response::HTTP_OK);
        } catch (Exception $e) {
            return $this->errorResponse('No product available with selected category', 404);
        }

    }

    public function getAllProducts(): JsonResponse
    {
        $finalArray = [];
        //$products = Product::orderByRaw("RAND()")->get();
        $products = DB::select('select * from products');;

        if (count($products) != 0) {
            foreach ($products as $product) {
                $productImages = ProductImages::where('product_identifier', $product->product_identifier)->get();
                $product->images = $productImages;
                array_push($finalArray, $product);
            }
            return $this->successResponse($products);
        } else {
            return $this->errorResponse('no products found', Response::HTTP_NOT_FOUND);
        }
    }

    public function editproductstatus(Request $request)
    {
        $tbl = "products";

        /*$rules = [
           'BID' => 'required',
           'post_text' => 'required',
           'post_image' => 'required|file',
           'post_type' => '',

       ];*/
        try {
            //$this->validate($request, $rules);
            $post = $request->toArray();

            $data = array(
                'product_status' => $post['product_status'],
                //'updated_at' => date('Y-m-d H:i:s'),
            );

            DB::table($tbl)->where('product_identifier', $post['product_identifier'])->update($data);

            return $this->successResponse($post, 'Product status updated successfully');

        } catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }

    public function single_product_dashboard($pid)
    {
        $finalArray = [];
        $products = Product::where('product_identifier', $pid)->get();
        foreach ($products as $product) {
            $product['images'] = ProductImages::where('product_identifier', $product['product_identifier'])->get();

            $product['product_category_name'] = $this->get_category_subcategory($product['product_category_id'], "categories", "category_english_name", "category_identifier");
            $product['product_sub_category_name'] = $this->get_category_subcategory($product['product_sub_category_id'], "sub_categories", "category_name", "category_id");

            $product['business'] = Business::where('BID', $product['BID'])->get();

            array_push($finalArray, $product);
        }

        return view('edit_product', ['result' => $finalArray]);


    }
}
