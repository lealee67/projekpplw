<?php
use App\Http\Controllers\{AuthController, PartnerController, ProfileController, RequestJoinController, RoomController, TeamSpaceController};
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/rooms');

// ---------- Guest ----------
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// ---------- Harus login ----------
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

    // Partner & Room
    Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/saya', [RoomController::class, 'saya'])->name('rooms.saya');
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');

    // Pengajuan & notifikasi
    Route::get('/notifikasi', [RequestJoinController::class, 'index'])->name('requests.index');
    Route::post('/rooms/{room}/join', [RequestJoinController::class, 'store'])->name('requests.store');

    // Hanya pemilik room
    Route::middleware('room.owner')->group(function () {
        Route::post('/rooms/{room}/requests/{requestJoin}/approve', [RequestJoinController::class, 'approve'])->name('requests.approve');
        Route::post('/rooms/{room}/requests/{requestJoin}/reject', [RequestJoinController::class, 'reject'])->name('requests.reject');
    });

    // Hanya anggota room (Team Space)
    Route::middleware('room.member')->prefix('/rooms/{room}/team-space')->name('team.')->group(function () {
        Route::get('/', [TeamSpaceController::class, 'show'])->name('show');
        Route::post('/tasks', [TeamSpaceController::class, 'storeTask'])->name('tasks.store');
        Route::put('/tasks/{task}', [TeamSpaceController::class, 'updateTask'])->name('tasks.update');
        Route::delete('/tasks/{task}', [TeamSpaceController::class, 'destroyTask'])->name('tasks.destroy');
        Route::put('/resources', [TeamSpaceController::class, 'updateResources'])->name('resources');
    });
});
