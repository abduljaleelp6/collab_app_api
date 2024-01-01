<?php


namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Utils\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
class ProductCategoryController extends Controller

{
    use ApiResponder;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function createCategory(Request $request)
    {
		
         $rules = [
            'category_english_name' => 'required',
            'category_arabic_name' => '',
            'category_description' => 'required',
		
            
        ];
		try {
            //$this->validate($request, $rules);
			$category = $request->toArray();
			$category = Category::create($category);
            return $this->successResponse($category, 'Category added successfully');
			} catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }
    function getMainCategories(): \Illuminate\Http\JsonResponse
    {
        $response = [];
        $categories = Category::all();
        
        foreach ($categories->toArray() as $cat) {
            $cat['subCategories'] = $this->getSubCategories($cat['category_identifier']);
            array_push($response, $cat);
        }
        return $this->successResponse($response);
    }
    public function getMainCategoriesWithSubCount(): \Illuminate\Http\JsonResponse
    {
        
        $qry='select * from categories';
        $results = DB::select($qry);
		
		if (count($results) != 0) 
		{
            foreach ($results as $res) 
                {
                  $post = DB::select("select count(*) as tot from sub_categories where main_category_id=".$res->category_identifier);
                  $rcount=$post[0]->tot;
                  $res->sub_categ_count=$rcount;

                 
                }
		return $this->successResponse($results);
		}
		else 
		{
            return $this->errorResponse('no posts found', Response::HTTP_NOT_FOUND);
        }
	}
    function getSubCategories($mainCatId): array
    {
        return SubCategory::where('main_category_id', $mainCatId)->get()->toArray();
    }
}
