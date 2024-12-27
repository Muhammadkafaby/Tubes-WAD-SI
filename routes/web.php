<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RekruitController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Forum;
use App\Models\Event;
use App\Models\Testimonial;
use App\Models\Rekruit;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// controller
Route::resource('testimonials', TestimonialController::class);
Route::resource('events', EventController::class);

// NAVIGASI LINE ----------------------------
// navigasi event
Route::get('/event', function () {
    $events = Event::all();
    return view('events.index', compact('events'));
})->name('event');

// navigasi course
Route::resource('courses', CourseController::class);

// navigasi testimoni
Route::get('/testimoni', function () {
    $testimonials = Testimonial::all();
    return view('testimonials.index', compact('testimonials'));
})->name('testimoni');

// navigasi forum
Route::get('/forum', function () {
    Route::resource('forums', ForumController::class)->middleware('auth');

    // Route untuk menyimpan pertanyaan di forum
    Route::post('forums/{forum}/questions', [QuestionController::class, 'store'])->name('questions.store')->middleware('auth');

    // Route untuk menyimpan jawaban pada pertanyaan
    Route::post('questions/{question}/answers', [AnswerController::class, 'store'])->name('answers.store')->middleware('auth');

    $forums = Forum::with('user')->latest()->get();
    return view('forums.index', compact('forums'));
})->name('forum');

// navigasi rekruitasi
Route::get('/rekruitasi', function () {
    $rekruits = Rekruit::all();
    return view('rekruits.index', compact('rekruits)'));
})->name('rekruitasi');

// navigasi article
Route::get('/article', function () {
    $events = Event::all(); // ubah sesuai controller masing2
    return view('article', compact('article'));
})->name('article');
// NAVIGASI LINE ----------------------------

// Spatie Permission Routes
Route::group(['middleware' => ['permission:create users|view users|edit users|delete users']], function () {
    Route::get('/add-user',function(){
        return "add user";
    });
});

require __DIR__ . '/auth.php';

// Rekruit Routes
Route::get('/rekruit', [RekruitController::class, 'index'])->name('rekruits.index');
Route::get('/rekruit/create', [RekruitController::class, 'create'])->name('rekruits.create');
Route::post('/rekruit', [RekruitController::class, 'store'])->name('rekruits.store');
Route::get('/rekruit/{rekruit}/edit', [RekruitController::class, 'edit'])->name('rekruits.edit');
Route::put('/rekruit/{rekruit}', [RekruitController::class, 'update'])->name('rekruits.update');
Route::delete('/rekruit/{rekruit}', [RekruitController::class, 'destroy'])->name('rekruits.destroy');

// Testimonial Routes
Route::group(['prefix' => 'testimonials', 'as' => 'testimonials.'], function () {
// Menampilkan semua testimonial
Route::get('/', [TestimonialController::class, 'index'])->name('index');
// Menampilkan form untuk membuat testimonial baru
Route::get('/create', [TestimonialController::class, 'create'])->name('create');
// Menyimpan testimonial baru ke database
Route::post('/', [TestimonialController::class, 'store'])->name('store');
// Menampilkan testimonial tertentu
Route::get('/{testimonial}', [TestimonialController::class, 'show'])->name('show');
// Menampilkan form untuk mengedit testimonial
Route::get('/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('edit');
// Memperbarui testimonial yang ada
Route::put('/{testimonial}', [TestimonialController::class, 'update'])->name('update');
// Menghapus testimonial
Route::delete('/{testimonial}', [TestimonialController::class, 'destroy'])->name('destroy');
});