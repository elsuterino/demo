<?php

use App\Models\TinyUrl;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('URL shortener should take long URL and create a short URL that is easy to remember and share', function () {
    post(route('tiny-url.store'), [
        'expires_at' => $expiresAt = now()->addDay(),
        'url' => 'https://google.lt/123452445656768576857696789',
        'slug' => 'one-two-three',
    ])->assertStatus(201);

    assertDatabaseHas('tiny_urls', [
        'url' => 'https://google.lt/123452445656768576857696789',
        'expires_at' => $expiresAt,
        'slug' => 'one-two-three',
    ]);
});

it('creates with random slug', function () {
    $response = post(route('tiny-url.store'), [
        'expires_at' => null,
        'url' => 'https://google.lt/123452445656768576857696789',
        'slug' => null,
    ]);

    $response->assertStatus(201);
});

it('Upon entering short URL, the user should be redirected to long URL', function () {
    $url = TinyUrl::factory()->create();

    get(route('tiny-url.show', $url->slug))->assertRedirect($url->url);
});

it('url stops working after expiration', function () {
    $url = TinyUrl::factory()->create(['expires_at' => now()->subDay()]);

    get(route('tiny-url.show', $url->slug))->assertGone();
});

it('User can delete their short URL before it expires', function () {
    $url = TinyUrl::factory()->create();

    delete(route('tiny-url.destroy', $url->slug))->assertOk();
});
