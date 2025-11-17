<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

Route::get('/welcome', function () {
    return ['message' => "Welome to An's Project"];
});

Route::get('/products', function () {
    return [
        ['id' => 1, 'name' => 'Stone Lifter ALG40A'],
        ['id' => 2, 'name' => 'Vacuum Lifter AVLP400'],
        ['id' => 3, 'name' => 'Bundle Rack BSR010'],
    ];
});

Route::get('/posts', function () {
    return [
        [
            "id" => 1,
            "title" => "Làm blog cá nhân bằng React + Laravel",
            "excerpt" => "Hướng dẫn tạo blog cá nhân đơn giản và nhanh nhất.",
            "content" => "Đây là nội dung bài viết chi tiết cho bài viết số 1..."
        ],
        [
            "id" => 2,
            "title" => "Docker cho người mới bắt đầu",
            "excerpt" => "Giải thích Docker dễ hiểu như nói chuyện.",
            "content" => "Đây là nội dung bài viết chi tiết cho bài viết số 2..."
        ],
        [
            "id" => 3,
            "title" => "Hướng dẫn triển khai web miễn phí",
            "excerpt" => "Dùng Vercel + Render để đưa web lên mạng miễn phí.",
            "content" => "Đây là nội dung bài viết chi tiết cho bài viết số 3..."
        ],
    ];
});

Route::get('/posts/{id}', function ($id) {
    $posts = [
        1 => [
            "id" => 1,
            "title" => "Làm blog cá nhân bằng React + Laravel",
            "content" => "Đây là nội dung bài viết chi tiết cho bài viết số 1..."
        ],
        2 => [
            "id" => 2,
            "title" => "Docker cho người mới bắt đầu",
            "content" => "Đây là nội dung bài viết chi tiết cho bài viết số 2..."
        ],
        3 => [
            "id" => 3,
            "title" => "Hướng dẫn triển khai web miễn phí",
            "content" => "Đây là nội dung bài viết chi tiết cho bài viết số 3..."
        ],
    ];

    return $posts[$id] ?? abort(404, "Post not found");
});

Route::post('/contact', [ContactController::class, 'send']);
Route::post('/admin/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('/admin/me', [AuthController::class, 'me']);
Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{id}', [BlogController::class, 'show']);

Route::middleware('auth:api')->group(function () {
    Route::post('/blogs', [BlogController::class, 'store']);
    Route::put('/blogs/{id}', [BlogController::class, 'update']);
    Route::delete('/blogs/{id}', [BlogController::class, 'delete']);
});