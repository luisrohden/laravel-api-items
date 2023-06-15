<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobsController extends Controller
{
    private $validatingFields = [
        'company',
        'position',
        'started_at',
        'ended_at',
        'description',
        'user_id'
    ];
    private $validatingRules = [
        'company' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'started_at' => 'required|date_format:Y-m-d',
        'ended_at' => 'nullable|date_format:Y-m-d',
        'id' => 'required|exists:users',
    ];
    protected $currentUser;
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index','view','listby']]);
        $this->currentUser = auth()->user();
    }
    public function index(Request $r) :object{

        return Job::all();
    }
    public function listby(Request $r) :object{
        $user = User::find($r->user_id);
        if(!$user){
            return response()->json([
                'status' => 'error',
                'msg' => 'invalid user',
            ]);
        }
        $jobs = Job::where('user_id','=',$r->user_id)->get();
        return $jobs;
    }
    public function create(Request $r):object
    {
        $data = $r->only($this->validatingFields);
        $data['id'] = $data['user_id'];
        $validator = Validator::make($data,$this->validatingRules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'msg' => $validator->errors()->first(),
            ]);
        }
        $job = new Job($data);
        $job->save();
        return $job;

    }

    public function edit(Request $r) :object
    {
        $data = $r->only($this->validatingFields);
        $data['id'] = $data['user_id'];
        //

        $job = Job::where('id','=',$r->job_id)
            ->where('user_id','=',$this->currentUser->id)
            ->get();
        if(!$job){
            return response()->json([
                'status' => 'error',
                'msg' => 'job not available',
            ]);
        }
        $job = $job[0];
        $rules = [];
        foreach($data as $index => $value){
            if(isset($this->validatingRules[$index])){
                $rules[$index] = $this->validatingRules[$index];
            }
        }
        $validator = Validator::make($data,$rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'msg' => $validator->errors()->first(),
            ]);
        }
        unset($data['id'],$data['user_id']);
        foreach($data as $index => $value){
            $job->$index = $value;
        }
        $job->save();
        return $job;

    }
    public function delete(Request $r) :object
    {
        $data = $r->only(['jobs']);
        $jobs = str_replace(' ','',$data['jobs']);
        $jobs = explode(',',$jobs);
        $deleted = Job::whereIn('id', $jobs)
            ->where('user_id','=',$this->currentUser->id)
            ->delete();
        if($deleted){
            return response()->json([
                'status' => 'success',
                'msg' => $deleted .' jobs deleted with sucess',
            ]);
        }
        return response()->json([
            'status' => 'error',
            'msg' => 'no jobs founded',
        ]);
    }
}
