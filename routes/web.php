<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\SecretaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/testing/{id}', function () {
    return view('test');
});

Route::get('/', function () {
    return view('welcome');
});

// Route::view('admin','Admin');
// Route::get('users', 'ManagerController@getUsers')->name('users');



Route::get('/popup',[ManagerController::class,'popup'])->name('open-popup');


// Manager Routes
    // Route::get('admin',[ManagerController::class,'to_manager_dashboard']);

    Route::get('/ManagerSalesReport',[ManagerController::class,'to_manager_sales_report'])->name('ManagerSalesReport');;

    Route::get('/ManagerDashboard',[ManagerController::class,'to_manager_dashboard']);

    Route::get('/ManagerTransactionHistory',[ManagerController::class,'to_manager_transaction_history']);

    Route::get('/ManagerCreateAccount',[ManagerController::class,'to_manager_create_account_form']);

    Route::post('/ManagerAccountRegister',[ManagerController::class,'manager_register_account_submit']);

    Route::get('/ManagerToWaitingList',[ManagerController::class,'getUsers'])->name('users');

    Route::post('/ManagerAddWaitingList',[ManagerController::class,'manager_add_waiting_list_submit']);

    Route::get('/ManagerRemoveWaitingListClient/{id}',[ManagerController::class,'manager_remove_waiting_list_client']);

    Route::post('/ManagerEditClientWaitingList/{id}',[ManagerController::class,'manager_edit_client_waiting_list']);

    Route::get('/ManagerManageAccounts',[ManagerController::class,'manager_manage_employee_accounts']);

    Route::get('/ManagerMarkedCheckedUpClient/{id}',[ManagerController::class,'manager_marked_checked_up_client']);

    Route::get('/ManagerScheduledList',[ManagerController::class,'manager_scheduled_list_view']);

    Route::get('/ManagerInputCheckUpDetails',[ManagerController::class,'manager_input_check_up_details']);

    Route::post('/ManagerClientImageUpload',[ManagerController::class,'manager_client_image_upload']);

    Route::post('/ManagerAddScheduledList',[ManagerController::class,'manager_add_waiting_list']);

    Route::post('/ManagerInputCheckUpDetailsSubmit',[ManagerController::class,'manager_input_check_up_details_submit']);

    Route::get('/ManagerViewCheckUpDetails/{id}',[ManagerController::class,'manager_view_check_up_details'])->name('ManagerViewCheckUpDetails');

    Route::get('/ManagerRemoveCheckUpRecords/{id}',[ManagerController::class,'manager_remove_check_up_records']);

    Route::post('/ManagerScheduledEventDelete',[ManagerController::class,'manager_scheduled_event_delete']);

    Route::get('/ManagerInitialViewCheckUpDetails/{id}',[ManagerController::class,'manager_initial_view_check_up_details'])->name('ManagerInitialViewCheckUpDetails');

    Route::post('/ManagerPrescriptionPrint',[ManagerController::class,'manager_prescription_print_form']);

    Route::post('/ManagerDeleteImage',[ManagerController::class,'manager_delete_image']);

    Route::post('/ManagerUploadImage', [ManagerController::class,'manager_upload_image'])->name('managerUploadImage');
    
    Route::post('/ManagerDeleteAllSelectedData',[ManagerController::class,'manager_delete_all_selected_data'])->name('managerDeleteAllSelectedImages');

    Route::post('/ManagerEditPatientInformations', [ManagerController::class,'manager_edit_patient_informations'])->name('managerEditPatientInformations');

    Route::post('/ManagerUploadPatientProfilePicture', [ManagerController::class,'manager_upload_patient_profile_picture'])->name('uploadPatientProfilePicture');

    Route::post('/ManagerMarkAsCheckedUp', [ManagerController::class,'manager_mark_as_checked_up'])->name('markAsCheckedUp');

    Route::delete('/ManagerDeleteScheduledRecord', [ManagerController::class,'manager_delete_scheduled_record'])->name('managerDeleteScheduledRecord');

    
    

// Manager Routes





// Secretary Routes

    Route::get('/SecretaryDashboard',[SecretaryController::class,'secretary_dashboard_content']);

    Route::get('/SecretarySalesReport',[SecretaryController::class,'secretary_sales_report_content']);

    Route::get('/SecretaryToWaitingList',[SecretaryController::class,'secretary_waiting_list_content']);
    
    
    Route::post('/SecretaryAddWaitingList',[SecretaryController::class,'secretary_add_waiting_list_submit']);

    Route::get('/SecretaryProceedWaitingListClient/{id}',[SecretaryController::class,'secretary_proceed_waiting_list_client']);

    Route::get('/SecretaryScheduledList',[SecretaryController::class,'secretary_scheduled_list_client']);

    Route::get('/SecretaryMarkAsWaitingClient/{id}',[SecretaryController::class,'secretary_mark_as_waiting_client']);

    

    
    
    



// Secretary Routes











