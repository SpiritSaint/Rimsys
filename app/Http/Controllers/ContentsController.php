<?php

namespace App\Http\Controllers;

use acidjazz\metapi\MetApi;
use App\Models\Content;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ContentsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, MetApi;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $contents = Content::all();
        return $this->render($contents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $content = Content::create([
            'type' => $request->input('type'),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);
        return $this->render($content, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Content $content
     * @return JsonResponse
     */
    public function show(Content $content): JsonResponse
    {
        return $this->render($content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Content $content
     * @return JsonResponse
     */
    public function update(Request $request, Content $content): JsonResponse
    {
        $content->update([
            'type' => $request->filled('type') ? $request->input('type') : $content->type,
            'title' => $request->filled('title') ? $request->input('title') : $content->title,
            'body' => $request->filled('body') ? $request->input('body') : $content->body,
        ]);
        return $this->render($content);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Content $content
     * @return JsonResponse
     */
    public function destroy(Content $content): JsonResponse
    {
        $content->delete();
        return $this->render([], 204);
    }
}
