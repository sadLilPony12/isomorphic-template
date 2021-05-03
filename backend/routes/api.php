<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotController;

/***
 * Actions
 */
use App\Http\Controllers\Actor\RoleController;
use App\Http\Controllers\Actor\SchoolController;
use App\Http\Controllers\Actor\LevelController;
use App\Http\Controllers\Actor\SectionController;
use App\Http\Controllers\Actor\SubjectController;
use App\Http\Controllers\Actor\SurnameController;
use App\Http\Controllers\Actor\VendorController;
use App\Http\Controllers\Actor\RoomController;
use App\Http\Controllers\Actor\StudentController;
use App\Http\Controllers\Actor\UserController;
use App\Http\Controllers\Actor\FacultyController;
use App\Http\Controllers\Actor\GuardianController;
use App\Http\Controllers\Actor\BatchController;

// Registration
use App\Http\Controllers\Enrollment\RegistryController;

//Classroom
use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Classroom\AdvisoryController;

//Enrollment
use App\Http\Controllers\Enrollment\LoadController;

// DTR
use App\Http\Controllers\DTR\ArticleController;
use App\Http\Controllers\DTR\AttendanceController;
use App\Http\Controllers\DTR\SettingController;
use App\Http\Controllers\DTR\MessagelogController;

// Headquarter
use App\Http\Controllers\Headquarter\CalendarController;
use App\Http\Controllers\Headquarter\Academic\SpecializationController;
use App\Http\Controllers\Headquarter\Academic\StrandController;
use App\Http\Controllers\Headquarter\Hr\AspirantController;
use App\Http\Controllers\Headquarter\AccessController;
use App\Http\Controllers\Actor\DepartmentController;
use App\Http\Controllers\Actor\PdsController;
use App\Http\Controllers\Enrollment\DesignationController;

// Tracking
use App\Http\Controllers\Tracking\DocumentController;
use App\Http\Controllers\Tracking\DllController;
use App\Http\Controllers\Tracking\MemoController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    Route::prefix('/auth')->group(function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/forgot', [ForgotController::class, 'forgot']);
        Route::post('/reset', [ForgotController::class, 'reset']);
        Route::post('/exist', [AuthController::class, 'exist']);
        Route::post('/upload', [AuthController::class, 'upload']);
    });

// Route::group(['middleware' => 'auth:sanctum'], function (){
    /**
     * Actions
     */
    Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/superadmin', [UserController::class, 'superadmin']);
        Route::get('/promotion', [UserController::class, 'promotion']);
        Route::get('/list', [UserController::class, 'list']);
        Route::get('/representative', [UserController::class, 'representative']);
        Route::post('/save', [UserController::class, 'save']);
        Route::put('/{user}/update', [UserController::class, 'update']);
        Route::post('/upload', [UserController::class, 'upload']);
        Route::delete('/{user}/destroy', [UserController::class, 'destroy']);
        Route::get('/{school}/staff', [UserController::class, 'staff']);
        Route::get('/faculty', [UserController::class, 'faculty']);
        Route::get('/designation', [UserController::class, 'designation']);
        Route::get('/{user}/immediate/supervisor', [UserController::class, 'supervisor']);
    });

    Route::prefix('/faculties')->group(function () {
        Route::get('/position',[FacultyController::class, 'position']);
        Route::get('/', [FacultyController::class, 'index']);
        Route::get('/list', [FacultyController::class, 'list']);
        Route::get('/department', [FacultyController::class, 'department']);
        Route::get('/look', [FacultyController::class, 'look']);
        Route::post('/save', [FacultyController::class, 'save']);
        Route::put('/{faculty}/update', [FacultyController::class, 'update']);
        Route::delete('/{faculty}/destroy', [FacultyController::class, 'destroy']);
    });
/**
 * Forbidden Routes
 */
    Route::prefix('/forbidden/attached/authority')->group(function () { // Only Developers
        Route::prefix('/schools')->group(function () {
            Route::get('/', [SchoolController::class, 'index']);
            Route::post('/save', [SchoolController::class, 'save']);
            Route::put('/{school}/update', [SchoolController::class, 'update']);
            Route::delete('/{school}/destroy', [SchoolController::class, 'destroy']); 
        });
        Route::prefix('/roles')->group(function () {
            Route::get('/', [RoleController::class, 'index']);
            Route::post('/save', [RoleController::class, 'save']);
            Route::put('/{role}/update', [RoleController::class, 'update']);
            Route::delete('/{role}/destroy', [RoleController::class, 'destroy']);
        });
        Route::prefix('/levels')->group(function () {
            Route::get('/', [LevelController::class, 'index']);
            Route::post('/save', [LevelController::class, 'save']);
            Route::put('/{level}/update', [LevelController::class, 'update']);
            Route::delete('/{level}/destroy', [LevelController::class, 'destroy']);
        });        
    Route::prefix('/specializations')->group(function () {
        Route::get('/', [SpecializationController::class, 'index']);
        Route::get('/list', [SpecializationController::class, 'list']);
        Route::post('/save', [SpecializationController::class, 'save']);
        Route::put('/{specialization}/find', [SpecializationController::class, 'find']);
        Route::put('/{specialization}/update', [SpecializationController::class, 'update']);
        Route::delete('/{specialization}/destroy', [SpecializationController::class, 'destroy']);
    });
    Route::prefix('/strands')->group(function () {
        Route::get('/', [StrandController::class, 'index']);
        Route::get('/list', [StrandController::class, 'list']);
        Route::post('/save', [StrandController::class, 'save']);
        Route::put('/{strand}/update', [StrandController::class, 'update']);
        Route::delete('/{strand}/destroy', [StrandController::class, 'destroy']);
    });
    });

    // SCHOOL INFO BREAD //
    Route::get('/levels/list', [LevelController::class, 'list']);
    Route::get('/roles/list', [RoleController::class, 'list']);
    Route::prefix('/schools/details')->group(function () {
        Route::get('/', [SchoolController::class, 'officer']);
        Route::get('/list', [SchoolController::class, 'list']);
        Route::get('{school}/find', [SchoolController::class, 'find']);
        Route::post('/save', [SchoolController::class, 'save']);
        Route::post('/{school}/upload', [SchoolController::class, 'upload']);
        Route::put('/{school}/update', [SchoolController::class, 'update']);
    });
    Route::prefix('/students')->group(function () {
        Route::get('/', [StudentController::class, 'index']);
        Route::get('/list', [StudentController::class, 'list']);
        Route::get('/{student}/find', [StudentController::class, 'find']);
        Route::post('/save', [StudentController::class, 'save']);
        Route::put('/{student}/update', [StudentController::class, 'update']);
        Route::delete('/{student}/destroy', [StudentController::class, 'destroy']);
    });
    Route::prefix('/batches')->group(function () {
        Route::get('/', [BatchController::class, 'index']);
        Route::get('/list', [BatchController::class, 'list']);
        Route::post('/save', [BatchController::class, 'save']);
        Route::put('/{batch}/update', [BatchController::class, 'update']);
        Route::delete('/{batch}/destroy', [BatchController::class, 'destroy']);
    });
     Route::prefix('/registries')->group(function () {
        Route::get('/', [RegistryController::class, 'index']);
        Route::get('/list', [RegistryController::class, 'list']);
        Route::get('/faculty', [RegistryController::class, 'faculty']);
         Route::get('/look', [RegistryController::class, 'look']);
         Route::get('/{student}/find', [RegistryController::class, 'find']);
        Route::post('/save', [RegistryController::class, 'save']);
        Route::put('/{registry}/update', [RegistryController::class, 'update']);
        Route::delete('/{registry}/destroy', [RegistryController::class, 'destroy']);
    });
    Route::prefix('/sections')->group(function () {
        Route::get('/', [SectionController::class, 'index']);
        Route::get('/list', [SectionController::class, 'list']);
        Route::get('/sections', [SectionController::class, 'sections']);
        Route::post('/save', [SectionController::class, 'save']);
        Route::put('/{section}/update', [SectionController::class, 'update']);
        Route::delete('/{section}/destroy', [SectionController::class, 'destroy']);
    });

    Route::prefix('/rooms')->group(function () {
            Route::get('/', [RoomController::class, 'index']);
            Route::get('{school}/find', [RoomController::class, 'find']);
            Route::get('/list', [RoomController::class, 'list']);
            Route::get('/levels', [RoomController::class, 'levels']);
            Route::post('/save', [RoomController::class, 'save']);            
            Route::put('/{room}/update', [RoomController::class, 'update']); 
            Route::delete('/{room}/destroy', [RoomController::class, 'destroy']);
    });

    Route::prefix('/accesses')->group(function () {
            Route::get('/', [AccessController::class, 'index']);
            Route::get('{access}/find', [AccessController::class, 'find']);
            Route::get('/list', [AccessController::class, 'list']);
            Route::get('/levels', [AccessController::class, 'levels']);
            Route::post('/save', [AccessController::class, 'save']);            
            Route::put('/{access}/update', [AccessController::class, 'update']);
            Route::delete('/{access}/destroy', [AccessController::class, 'destroy']);
    });

    Route::prefix('/subjects')->group(function () {
        Route::get('/', [SubjectController::class, 'index']);
        Route::get('/{school}/list', [SubjectController::class, 'list']);
        Route::get('/look', [SubjectController::class, 'look']);
        Route::get('/{subject}/find', [SubjectController::class, 'find']);
        Route::post('/save', [SubjectController::class, 'save']);
        Route::put('/{subject}/update', [SubjectController::class, 'update']);
        Route::delete('/{subject}/destroy', [SubjectController::class, 'destroy']);
    });
    
    Route::prefix('/surnames')->group(function () {
        Route::get('/', [SurnameController::class, 'index']);
        Route::post('/save', [SurnameController::class, 'save']);
        Route::get('/list', [SurnameController::class, 'list']);
    });
    /**
     * Classroom
     */
    Route::prefix('/classrooms')->group(function () {
        Route::get('/', [ClassroomController::class, 'index']);
        Route::get('/list', [ClassroomController::class, 'list']); 
        Route::get('/{classroom}/find', [ClassroomController::class, 'find']);
        Route::get('/look', [ClassroomController::class, 'look']);
        Route::put('/updateOrCreate', [ClassroomController::class, 'updateOrCreate']);
        Route::post('/save', [ClassroomController::class, 'save']);
        Route::put('/{classroom}/update', [ClassroomController::class, 'update']);
        Route::delete('/{classroom}/destroy', [ClassroomController::class, 'destroy']);
    });
    
    /**
     * Enrollment Details
     */

    Route::prefix('/batches')->group(function () {
        Route::get('/', [BatchController::class, 'index']);
        Route::get('/list', [BatchController::class, 'list']);
        Route::get('/{batch}/find', [BatchController::class, 'find']);
        Route::post('/save', [BatchController::class, 'save']);
        Route::put('/{batch}/update', [BatchController::class, 'update']);
        Route::delete('/{batch}/destroy', [BatchController::class, 'destroy']);
    });
    Route::prefix('/designations')->group(function () {
        Route::get('/', [DesignationController::class, 'index']);
        Route::get('/list', [DesignationController::class, 'list']); 
        Route::get('/{designation}/find', [DesignationController::class, 'find']);
        Route::get('/look', [DesignationController::class, 'look']);
        Route::put('/updateOrCreate', [DesignationController::class, 'updateOrCreate']);
        Route::delete('/{designation}/destroy', [DesignationController::class, 'destroy']);
    });
    Route::prefix('/schedulers')->group(function () {
        Route::get('/', [SchedulerController::class, 'index']);
        Route::get('/list', [SchedulerController::class, 'list']);
        Route::get('/{scheduler}/find', [SchedulerController::class, 'find']);
        Route::post('/save', [SchedulerController::class, 'save']);
        Route::put('/{scheduler}/update', [SchedulerController::class, 'update']);
        Route::delete('/{scheduler}/destroy', [SchedulerController::class, 'destroy']);
    });
    Route::prefix('/loads')->group(function () {
        Route::get('/', [LoadController::class, 'index']);
        Route::get('/access', [LoadController::class, 'access']);
        Route::get('/list', [LoadController::class, 'list']);
        Route::get('/active', [LoadController::class, 'active']);
        Route::get('/{load}/find', [LoadController::class, 'find']);
        Route::post('/save', [LoadController::class, 'save']);
        Route::put('/{load}/update', [LoadController::class, 'update']);
        Route::put('/updateOrCreate', [LoadController::class, 'updateOrCreate']);
        Route::delete('/{load}/destroy', [LoadController::class, 'destroy']);
    });
    Route::prefix('/applications')->group(function () {
        Route::get('/', [ApplicationController::class, 'index']);
        Route::post('/upload', [ApplicationController::class, 'upload']);
        Route::get('/admission', [ApplicationController::class, 'admission']);
        Route::get('/takers', [ApplicationController::class, 'takers']);
        Route::get('/student', [ApplicationController::class, 'student']);
        Route::get('/list', [ApplicationController::class, 'list']);
        Route::get('/{application}/find', [ApplicationController::class, 'find']);
        Route::post('/save', [ApplicationController::class, 'save']);
        Route::put('/{application}/update', [ApplicationController::class, 'update']);
        Route::delete('/{application}/destroy', [ApplicationController::class, 'destroy']);
    });

    Route::prefix('/advisories')->group(function () {
        Route::get('/', [AdvisoryController::class, 'index']);
        Route::get('/list', [AdvisoryController::class, 'list']);
        Route::get('/active', [AdvisoryController::class, 'active']);
        Route::get('/{advisory}/find', [AdvisoryController::class, 'find']);
        Route::get('/{student}/history', [AdvisoryController::class, 'history']);
        Route::post('/save', [AdvisoryController::class, 'save']);
        Route::put('/{advisory}/update', [AdvisoryController::class, 'update']);
        Route::delete('/{advisory}/destroy', [AdvisoryController::class, 'destroy']);
    });
    
    Route::prefix('/classroom')->group(function () {
        Route::prefix('/advisories')->group(function () {
            Route::get('/find', [AdvisoryController::class, 'find']);
            Route::get('/look', [AdvisoryController::class, 'look']);
            Route::get('/active', [ClassroomController::class, 'active']);
        });  
    });
    /**
     * Calendars
     */
    Route::prefix('/calendars')->group(function () {
        Route::get('/{batch}/find', [CalendarController::class, 'find']);
        Route::get('/list', [CalendarController::class, 'list']);
        Route::post('/save', [CalendarController::class, 'save']);
        Route::put('/{role}/update', [CalendarController::class, 'update']);
        Route::delete('/{role}/destroy', [CalendarController::class, 'destroy']);
    });
    
    /**
     * Admission
     */
    Route::prefix('/admissions')->group(function () {
    Route::get('/', [AdmissionController::class, 'index']);
    Route::get('/list', [AdmissionController::class, 'list']);
    Route::post('/save', [AdmissionController::class, 'save']);
    Route::put('/{admission}/update', [AdmissionController::class, 'update']);
    Route::delete('/{admission}/destroy', [AdmissionController::class, 'destroy']);
    });
    Route::prefix('/questionares')->group(function () {
    Route::get('/{school}', [QuestionaireController::class, 'index']);
    Route::get('/list', [QuestionaireController::class, 'list']);
    Route::post('/save', [QuestionaireController::class, 'save']);
    Route::put('/{questionare}/update', [QuestionaireController::class, 'update']);
    Route::delete('/{questionare}/destroy', [QuestionaireController::class, 'destroy']);
    });
    Route::prefix('/banks')->group(function () {
    Route::get('/', [BankController::class, 'index']);
    Route::get('/list', [BankController::class, 'list']);
    Route::post('/save', [BankController::class, 'save']);
    Route::put('/{bank}/update', [BankController::class, 'update']);
    Route::delete('/{bank}/destroy', [BankController::class, 'destroy']);
    });
   // });
    Route::prefix('/aspirants')->group(function () {
        Route::get('/', [AspirantController::class, 'index']) ;
        Route::get('/list', [AspirantController::class, 'list']);
        Route::post('/save', [AspirantController::class, 'save']);
        Route::put('/{aspirant}/update', [AspirantController::class, 'update']);
        Route::delete('/{aspirant}/destroy', [AspirantController::class, 'destroy']);
    });
    Route::prefix('/tracking')->group(function () {
            Route::prefix('/documents')->group(function () {
                Route::get('/', [DocumentController::class, 'index']);
                Route::get('/{document}/find', [DocumentController::class, 'find']);
                Route::get('/list', [DocumentController::class, 'list']);
                Route::get('/modules', [DocumentController::class, 'modules']);
                Route::post('/save', [DocumentController::class, 'save']);
                Route::put('/{document}/update', [DocumentController::class, 'update']);
                Route::delete('/{document}/destroy', [DocumentController::class, 'destroy']);
            });
            Route::prefix('/dlls')->group(function () {
                Route::get('/', [DllController::class, 'index']);
                Route::get('/master', [DllController::class, 'master']);
                Route::get('/head', [DllController::class, 'head']);
                Route::get('/{dll}/find', [DllController::class, 'find']);
                Route::get('/list', [DllController::class, 'list']);
                Route::post('/save', [DllController::class, 'save']);
                Route::put('/{dll}/update', [DllController::class, 'update']);
                Route::delete('/{dll}/destroy', [DllController::class, 'destroy']);
            });
        });

    Route::prefix('/pdses')->group(function () {
            Route::get('/', [PdsController::class, 'index']);
            Route::get('/{pds}/find', [PdsController::class, 'find']);
        });
    Route::prefix('/departments')->group(function ()
    {
            Route::get('/',[DepartmentController::class, 'index']);
            Route::get('/list',[DepartmentController::class, 'list']);
            Route::get('/look',[DepartmentController::class, 'look']);
            Route::post('/save',[DepartmentController::class, 'save']);
            Route::put('/{department}/update',[DepartmentController::class, 'update']);
    });



// for outsider to verify the certificate
Route::get('/online/verifications/letter', [AspirantController::class, 'index']);