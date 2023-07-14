<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Http\Resources\SkillResource;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SkillResource::collection(Skill::all());
    }


    public function store(StoreSkillRequest $request)
    {

        $skill= Skill::create( $request -> validated());
        return response()-> json([
            'status' => 'skill created succesfully',
            'skill' => $skill
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(skill $skill)
    {
     return new SkillResource($skill);

    }


    public function update(UpdateSkillRequest $request, string $id)
    {
        $skill = Skill::find($id);
        $skill->update($request -> validated());
        return response()->json([
            'status' => 200,
            'message' => 'skill Updated succesfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(skill $skill)
    {
        $skill-> delete();
        return response()->json([
            "skill deleted"
        ]);
    }
}
