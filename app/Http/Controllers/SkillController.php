<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    private $defaultError = [
        'status' => 'error',
        'msg' => 'Invalid input data'
    ];
    public function index(Request $r){
        return Skill::all();
    }
    public function create(Request $r):array|object
    {
        $data = $r->only(['title','description']);
        if(count($data) != 2){
            return $this->defaultError;
        }else{
            $skill = new Skill($data);
            $skill->save();
            return $skill;
        }
    }

    public function edit(Request $r):array|object
    {
        $data = $r->only(['title','description','id']);
        if(!isset($data['id']) || count($data) < 2 ){
            return $this->defaultError;
        }
        $skill = Skill::find($data['id']);
        if(!$skill){
            return $this->defaultError;
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
            return $this->defaultError;
        }
        $skill = Skill::find($data['id']);
        if(!$skill){
            return $this->defaultError;
        }
        $skill->delete();
        return $skill;

    }
    public function view(Request $r) //:array|object
    {
        if(!isset($r->id)){
            return $this->defaultError;
        }
        $skill = Skill::find($r->id);
        if(!$skill){
            return $this->defaultError;
        }
        return $skill;
    }
}
