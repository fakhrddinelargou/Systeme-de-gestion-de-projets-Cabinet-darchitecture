<?php

use App\Http\Controllers\admin\ProjectController as AdminProjectController;
use App\Http\Controllers\client\ProjectController as ClientProjectController ;
use App\Http\Controllers\architecte\ProjectController as ArchitecteProjectController ;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\client\DashboardController as ClientDashboarController;
use App\Http\Controllers\architecte\DashboardController as ArchitecteDashboarController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\UsersController;
use App\Models\Project;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'registerPage'])->name('register.page');
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login.page');
    Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forget.password');
    Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset.password');
    Route::post('/change-password', [AuthController::class, 'updatePassword'])->name('update.password');
    Route::post('/send-mail', [AuthController::class, 'sendMail'])->name('send.mail');
    Route::post('/register', [AuthController::class, 'store'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::get('/', function () {
    if (auth()->check()) {
        $role = auth()->user()->role->name;
        $direction = $role . '.dashboard';
        return redirect()->route($direction);
    }

    return redirect()->route('login');
});



Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('projects/search/{title}', [AdminProjectController::class, 'search'])->name('projects.search.title');

    Route::middleware('role:admin')->group(function () {
        Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/admin/users', [UsersController::class, 'index'])->name('users');
        Route::delete('/admin/users/{id}', [UsersController::class, 'destroy'])->name('delete.user');
        Route::post('/admin/add/users', [UsersController::class, 'store'])->name('store.user');
        Route::put('/admin/update/users/{id}', [UsersController::class, 'updateRole'])->name('user.update.role');

        Route::put('/admin/users/{id}/block', [UsersController::class, 'block'])->name('block.user');
        Route::get('/pagination', [UsersController::class, 'pagination'])->name('pagination');
        Route::get('/admin/search/{name}', [UsersController::class, 'search'])->name('search.user');
        Route::get('/users/filter', [UsersController::class, 'searchByrole'])->name('search.user.role');

        Route::get('admin/projects', [AdminProjectController::class, 'index'])->name('admin.projects');
        Route::get('projects/update/{id}', [AdminProjectController::class, 'update'])->name('projects.update');
        Route::put('projects/edite/{id}', [AdminProjectController::class, 'edite'])->name('projects.edite');

        
        Route::put('projects/accept/status/{id}', [AdminProjectController::class, 'acceptStatus'])->name('admin.accept.status');
        Route::put('projects/refuser/status/{id}', [AdminProjectController::class, 'refuserStatus'])->name('admin.refuser.status');

        
        
        Route::post('/project/add/worker/{id}', [AdminProjectController::class, 'storeWorker'])->name('project.add.worker');
        Route::delete('project-assignments/{id}', [AdminProjectController::class, 'deleteAssignments'])->name('project.assignments');
        
  
        
        
        });
        
    Route::middleware('role:client')->group(function (){

        Route::get('client/dashboard', [ClientDashboarController::class, 'index'])->name('client.dashboard');
        
        Route::get('client/projects', [ClientProjectController::class, 'index'])->name('client.projects');
        Route::get('projects/create', [ClientProjectController::class, 'create'])->name('create.projects');
        Route::post('projects/store', [ClientProjectController::class, 'store'])->name('store.projects');

        Route::get('client/projects/details/{id}', [clientProjectController::class, 'show'])->name('client.project.show');



    });

    Route::middleware('role:architecte')->group(function(){
        Route::get('architecte/dashboard', [ArchitecteDashboarController::class, 'index'])->name('architecte.dashboard');

        Route::get('architecte/projects', [ArchitecteProjectController::class, 'index'])->name('architecte.projects');

        Route::get('architecte/projects/details/{id}', [AdminProjectController::class, 'show'])->name('architecte.projects.show');
        

    });


    Route::middleware('role:admin,architecte')->group(function (){
    
          // admin/architecte
        Route::get('admin/projects/details/{id}', [AdminProjectController::class, 'show'])->name('admin.projects.show');
        Route::get('projects/filter/status/{status}', [AdminProjectController::class, 'filterByStatus'])->name('projects.filter.status');
        Route::post('projects/phases', [PhaseController::class, 'store'])->name('phases.store');
        Route::get('/show-sprint/{id}', [PhaseController::class, 'show'])->name('show.sprint');
        Route::post('/project-sprint', [PhaseController::class, 'store'])->name('project.sprint.create');
        Route::post('/project-task-create', [TaskController::class, 'store'])->name('project.task.create');
        Route::put('/project-sprint-update/{id}', [PhaseController::class, 'update'])->name('project.sprint.update');
        Route::delete('/project-sprint-delete/{id}', [PhaseController::class, 'destroy'])->name('project.sprint.delete');
      
        Route::put('/project-task-update', [TaskController::class, 'update'])->name('project.task.update');
        Route::put('/project-task-delete', [TaskController::class, 'update'])->name('project.task.delete');


    });


    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile/info', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::put('/profile/image', [ProfileController::class, 'updateImage'])->name('profile.image');



});