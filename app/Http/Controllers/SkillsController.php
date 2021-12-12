<?php

namespace App\Http\Controllers;

use acidjazz\metapi\MetApi;
use App\Models\Skill;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class SkillsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, MetApi;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $skills = Skill::all();
        return $this->render($skills);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $skill = Skill::create([
            'icon' => $request->input('icon'),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);
        return $this->render($skill, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Skill $skill
     * @return JsonResponse
     */
    public function show(Skill $skill): JsonResponse
    {
        return $this->render($skill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Skill $skill
     * @return JsonResponse
     */
    public function update(Request $request, Skill $skill): JsonResponse
    {
        $skill->update([
            'icon' => $request->filled('icon') ? $request->input('icon') : $skill->icon,
            'title' => $request->filled('title') ? $request->input('title') : $skill->title,
            'body' => $request->filled('body') ? $request->input('body') : $skill->body,
        ]);
        return $this->render($skill);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Skill $skill
     * @return JsonResponse
     */
    public function destroy(Skill $skill): JsonResponse
    {
        $skill->delete();
        return $this->render([], 204);
    }
}
