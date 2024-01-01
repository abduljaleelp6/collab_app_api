<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use App\Utils\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
class SubCategoryController extends Controller
{
    use ApiResponder;
    public function createSubCategory(Request $request)
    {
		
         $rules = [
            'category_english_name' => 'required',
            'category_arabic_name' => '',
            'category_description' => 'required',
		
            
        ];
		try {
            //$this->validate($request, $rules);
			$subcategory = $request->toArray();
			$subcategory = SubCategory::create($subcategory);
            return $this->successResponse($subcategory, 'Sub Category added successfully');
			} catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }
    function getSubCategoryold(): \Illuminate\Http\JsonResponse
    {
        $response = [];
        $categories = SubCategory::all();

        foreach ($categories->toArray() as $cat) {
            $cat['subCategories'] = $this->getSubCategories($cat['category_identifier']);
            array_push($response, $cat);
        }
        return $this->successResponse($response);
    }
    public function getSubCategory(): JsonResponse
    {
		$qry="select * from sub_categories where 1 ";
        
		$results = DB::select($qry);
		
		if (count($results) != 0) 
		{
            
            //$activity['sub_activitys'] = $subActivitys;
            foreach ($results as $res) {
                $mainCategory = Category::where('category_identifier', $res->main_category_id)->get();
                $res->main_category=$mainCategory[0]['category_english_name'];
            }
           
		return $this->successResponse($results);
		}
		else 
		{
            return $this->errorResponse('no posts category found', Response::HTTP_NOT_FOUND);
        }
	}
    public function EditSubCategory($SID)
    {
        $data= DB::select('select * from sub_categories where category_id='.$SID);
        return view('editsubcategory', ['result' => $data]);
       
    }
    public function editsubcateg(Request $request)
    {
        $tbl="sub_categories";
		 
         /*$rules = [
            'category_id' => 'required',
            'post_text' => 'required',
			'post_image' => 'required|file',
            'post_type' => '',
            
        ];*/
		try {
            //$this->validate($request, $rules);
			$post = $request->toArray();

           $data=array(
                'category_id' => $post['category_id'],
                'main_category_id' => $post['main_category_id'],
                'category_name' => $post['category_name'],
                'category_description' => $post['category_description'],
                'category_arabic_name' => $post['category_arabic_name'],
                'updated_at' => date('Y-m-d H:i:s'),
                );
			
            DB::table($tbl)->where('category_id', $post['category_id'])->update($data);  
			
            return $this->successResponse($post, 'Sub Category updated successfully');
			
			} catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }
    public function deleteSubCategory($category_id): JsonResponse
    {
        try {
            if (!SubCategory::where([
                ['category_id', $category_id],
            ])->first()) {
                return $this->errorResponse('Invalid Sub Category ID', Response::HTTP_BAD_REQUEST);
            }
            else
            {
                SubCategory::where('category_id', $category_id)->delete();
                return $this->successResponse($category_id, 'Sub Category Deleted Successfully');
            }
           
			
    } catch (ValidationException $e) {
    return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
    }
    }

}
