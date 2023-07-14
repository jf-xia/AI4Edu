<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/t', function () {
//    \Illuminate\Support\Facades\Redis::set('name', 'Taylor');
//    dd(\Illuminate\Support\Facades\Redis::get('name'));
//    dd(dispatch(new \App\Jobs\ProcessTest()));
    $client = OpenAI::factory()
        ->withBaseUri(env('OPENAI_BASE_URL'))
        ->withHttpHeader('api-key', env('OPENAI_API_KEY'))
        ->withQueryParam('api-version', '2023-03-15-preview')
//        ->withHttpClient($client = new \GuzzleHttp\Client([])) // default: HTTP client found using PSR-18 HTTP Client Discovery
//        ->withStreamHandler(fn (RequestInterface $request): ResponseInterface => $client->send($request, [
//            'stream' => true // Allows to provide a custom stream handler for the http client.
//        ]))
        ->make();
    $result = $client->completions()->create([
        'prompt' => 'PHP is'
    ]);
    dd($result);
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
