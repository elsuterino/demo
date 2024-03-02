<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTinyUrlRequest;
use App\Models\TinyUrl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class TinyUrlController extends Controller
{
    public function store(StoreTinyUrlRequest $request): JsonResponse
    {
        $url = new TinyUrl();

        $url->url = $request->input('url');
        $url->slug = $request->input('slug') ?: Str::ulid();
        $url->expires_at = $request->date('expires_at') ?: now()->addMonth();

        $url->save();

        return response()->json([
            'slug' => $url->slug,
        ], 201);
    }

    public function show(TinyUrl $url): RedirectResponse
    {
        if ($url->expires_at->lt(now())) {
            abort(410);
        }

        return response()->redirectTo($url->url);
    }

    public function destroy(TinyUrl $url): JsonResponse
    {
        if ($url->expires_at->lt(now())) {
            abort(410);
        }

        $url->expires_at = now();
        $url->save();

        return response()->json();
    }
}
