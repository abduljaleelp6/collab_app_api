<?php


namespace App\Http\Controllers;


use App\Models\Activity;
use App\Models\SubActivity;
use App\Models\User;
use App\Utils\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ActivityController extends Controller
{
    use ApiResponder;

    public function __construct()
    {
        $this->middleware('auth', [
            'only' => [
                'getAll',
                'create',
                'getAllBusiness',
                'getBusinessByBID',
                'getBusinessByMainActivity',
                'getBusinessBySubActivity',
            ]
        ]);

    }

    public function getAll(): \Illuminate\Http\JsonResponse
    {
        $cnt=0;
        $activitys = Activity::all();
        foreach ($activitys as $activity) {
            $cnt++;
            $subActivitys = SubActivity::where('main_activity_id', $activity['activity_code'])->get();
            $activity['sub_activitys'] = $subActivitys;
        }
        $activity['sub_activity_count'] = $cnt;
        return $this->successResponse($activitys, 'there is ' . count($activitys));
    }

    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
       /* $rules = [
            'activity_name' => 'required|max:255|unique:business',//do email verification on mobile side
            'activity_code' => 'required|max:255|unique:business',
            'activity_description' => 'required',
        ];*/
        try {
           // $this->validate($request, $rules);
            return $activity = Activity::create($request->all());
        } catch (ValidationException $e) {
            return $this->errorResponse($e->response, 404, $request->all());
        }

    }

}
