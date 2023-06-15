<?php

namespace App\Http\Controllers;

use App\Http\Kernel;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    protected $currentUser;
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
        $data = $r->only(['title','description']);
        if(count($data) != 2){
            return response()->json([
                'status' => 'error',
                'msg' => 'invalid data input',
            ]);
        }
        $skill = new Skill($data);
        $skill->save();
        return $skill;
    }

    public function edit(Request $r):array|object
    {
        $data = $r->only(['title','description','id']);
        if(!isset($data['id']) || count($data) < 2 ){
            return response()->json([
                'status' => 'error',
                'msg' => 'invalid data input',
            ]);
        }
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
        $skill->save();
        return $skill;

    }
    public function delete(Request $r):array|object
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
    public function view(Request $r) //:array|object
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
