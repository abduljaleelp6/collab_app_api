<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\SubActivity;
use Illuminate\Http\Request;
use App\Utils\ApiResponder;
use Illuminate\Support\Facades\DB;
class SubActivityController extends Controller
{
    use ApiResponder;

    //
    public function getAll(): \Illuminate\Http\JsonResponse
    {
        $subactivitys = SubActivity::all();
       /* foreach ($activitys as $activity) {
            $subActivitys = SubActivity::where('main_activity_id', $activity['activity_code'])->get();
            $activity['sub_activitys'] = $subActivitys;
        }*/
        return $this->successResponse($subactivitys, 'there is ');
    }
    public function editsubactivity(Request $request)
    {
        $tbl="sub_activities";

       /* $rules = [

            'activity_code' => 'required|max:255',
            'main_activity_id' => 'required|max:255',
            //'activity_arabic_name' => 'required|max:255|unique:business',
            'activity_english_name' => 'required|max:255',
            'activity_description' => 'required',

        ];*/
		try {
            //$this->validate($request, $rules);
			$subactivity = $request->toArray();

           $data=array(

                'activity_code' => $subactivity['activity_code'],
                'main_activity_id' => $subactivity['main_activity_id'],
                'activity_english_name' => $subactivity['activity_english_name'],
                'activity_arabic_name' => $subactivity['activity_arabic_name'],
                'activity_description' => $subactivity['activity_description'],
                'activity_keywords' => $subactivity['activity_keywords'],
                'updated_at' => date('Y-m-d H:i:s'),
                );

            DB::table($tbl)->where('id', $subactivity['id'])->update($data);

            return $this->successResponse($subactivity, 'Subactivity updated successfully');

			} catch (ValidationException $e) {
            return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
        }
    }
    public function deleteItem($subId): JsonResponse
    {
        try {
        SubActivity::where('id', $subId)->delete();
        return $this->successResponse($subactivity, 'Subactivity updated successfully');

    } catch (ValidationException $e) {
    return $this->errorResponse($e->getResponse(), $e->getCode(), $request->all());
   }
    }

    public function create(Request $request)
    {
        $rules = [

            'activity_code' => 'required|max:255',
            'main_activity_id' => 'required|max:255',
            //'activity_arabic_name' => 'required|max:255|unique:business',
            'activity_english_name' => 'required|max:255',
            'activity_description' => 'required',

        ];
        try {
            //$this->validate($request, $rules);
            $subactivity = $request->toArray();
            $subactivity = SubActivity::create($subactivity);
            return $this->successResponse($subactivity, 'Subactivity Successfully Added', $request);

        } catch (ValidationException $e) {
            return $this->errorResponse($e->response, 404, $request->all());
        }

    }

}
