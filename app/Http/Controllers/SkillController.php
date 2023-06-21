<?php

namespace App\Http\Controllers;

use App\Http\Kernel;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    protected $currentUser;
    private $validatingRules = [
        'title' => 'required',
        'type', 'required',
        'description' => 'required|string|max:255',
    ];
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index','view']]);
        $this->currentUser = auth()->user();

    }
    public function index(Request $r){
        return Skill::all();
    }
    public function create(Request $r) :object
    {
        $data = $r->only(['title','type','description']);
        $validator = Validator::make($data,$this->validatingRules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'msg' => $validator->errors()->first(),
            ]);
        }

        $skill = new Skill($data);
        $skill->save();
        return $skill;
    }

    public function edit(Request $r) :object
    {
        $data = $r->only(['title','description','id','type']);

        $skill = Skill::find($data['id']);
        if(!$skill){
            return response()->json([
                'status' => 'error',
                'msg' => 'invalid skill id',
            ]);
        }
        if(isset($data['title'])){
            $skill->title = $data['title'];
        }
        if(isset($data['description'])){
            $skill->description = $data['description'];
        }
        if(isset($data['type'])){
            $skill->type = $data['type'];
        }
        $skill->save();
        return $skill;

    }
    public function delete(Request $r) :object
    {
        $data = $r->only(['id']);
        if(!isset($data['id'])){
            return response()->json([
                'status' => 'error',
                'msg' => 'invalid data input',
            ]);
        }
        $skill = Skill::find($data['id']);
        if(!$skill){
            return response()->json([
                'status' => 'error',
                'msg' => 'invalid data input',
            ]);
        }
        $skill->delete();
        return $skill;

    }
    public function view(Request $r) :object
    {
        if(!isset($r->id)){
            return response()->json([
                'status' => 'error',
                'msg' => 'invalid skill id',
            ]);
        }
        $skill = Skill::find($r->id);
        if(!$skill){
            return response()->json([
                'status' => 'error',
                'msg' => 'invalid skill id',
            ]);
        }
        return $skill;
    }
}
