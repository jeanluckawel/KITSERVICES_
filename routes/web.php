<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeCardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeEntrepriseController;
use App\Http\Controllers\EmployeeImportController;
use App\Http\Controllers\FamillyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SalaryGridController;
use App\Http\Controllers\TimeSheetController;
use Illuminate\Support\Facades\Route;



Route::view('employees/card', 'h');

Route::get('/login', function () {
    return view('dashboard');
});

//Route::get('/dashboard', [DashboardController::class, 'index'])
//    ->middleware(['auth', 'verified'])
//    ->name('dashboard');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');



// Affiche le formulaire de création d'employé
Route::get('/employees/create', [\App\Http\Controllers\EmployeeController::class, 'create'])->name('employees.create')->middleware(['auth', 'verified']);

// Enregistre un nouvel employé dans la base de données
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store')->middleware(['auth', 'verified']);

// search employee
Route::get('/employees/search', [EmployeeController::class, 'search'])->name('employees.search')->middleware(['auth', 'verified']);
Route::post('/employees/search', [EmployeeController::class, 'search'])->name('employees.search')->middleware(['auth', 'verified']);

// (Optionnel) Liste des employés
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index')->middleware(['auth', 'verified']);

Route::get('employees/card', [EmployeeCardController::class, 'index'])->name('employees.card');



//import Employee

Route::get('/employees/import', [EmployeeImportController::class, 'showForm'])->name('employees.import.form')->middleware(['auth', 'verified']);;
Route::post('/employees/import', [EmployeeImportController::class, 'import'])->name('employees.import')->middleware(['auth', 'verified']);;
// address

Route::get('/employees/{employee}/address', [AddressController::class, 'create'])->name('addresses.create')->middleware(['auth', 'verified']);
Route::post('/employees/{employee}/address', [AddressController::class, 'store'])->name('addresses.store')->middleware(['auth', 'verified']);
// Show un employé (édition, infos admin)
Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show')->middleware(['auth', 'verified']);

// Profil public / carte de service
Route::get('/employees/{employee}/profile', [EmployeeController::class, 'profile'])->name('employees.profile')->middleware(['auth', 'verified']);

// familly

Route::get('/employees/{employee}/families', [\App\Http\Controllers\FamillyController::class, 'create'])->name('families.create')->middleware(['auth', 'verified']);
Route::post('/employees/{employee}/families', [FamillyController::class, 'store'])->name('families.store')->middleware(['auth', 'verified']);

// urgence

Route::get('/employees/{employee}/emergency', [\App\Http\Controllers\EmergencyController::class, 'create'])->name('emergency.create')->middleware(['auth', 'verified']);
Route::post('/employees/{employee}/emergency', [\App\Http\Controllers\EmergencyController::class, 'store'])->name('emergency.store')->middleware(['auth', 'verified']);

// urgence

Route::get('/employees/{employee}/children', [\App\Http\Controllers\ChildController::class, 'create'])->name('children.create')->middleware(['auth', 'verified']);
Route::post('/employees/{employee}/children', [\App\Http\Controllers\ChildController::class, 'store'])->name('children.store')->middleware(['auth', 'verified']);

// employee_entreprise
Route::get('/employees/{employee}/entreprise', [\App\Http\Controllers\EmployeeEntrepriseController::class, 'create'])->name('entreprises.create')->middleware(['auth', 'verified']);
Route::post('/employees/{employee}/entreprise', [EmployeeEntrepriseController::class, 'store'])->name('entreprises.store')->middleware(['auth', 'verified']);

//// Items Routes
//Route::resource('items', \App\Http\Controllers\ItemsController::class);

// Purchase Orders Routes
Route::resource('purchase-orders', \App\Http\Controllers\PurchaseOrdersController::class)->except(['edit', 'update', 'destroy'])->middleware(['auth', 'verified']);
Route::get('purchase-orders/{id}/statement', [\App\Http\Controllers\PurchaseOrdersController::class, 'show'])->name('purchase-orders.show')->middleware(['auth', 'verified']);



// Clients
Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index')->middleware(['auth', 'verified']);
Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create')->middleware(['auth', 'verified']);
Route::post('/clients', [ClientsController::class, 'store'])->name('clients.store')->middleware(['auth', 'verified']);

// Invoices
//Route::get('/invoices', [InvoicesController::class, 'index'])->name('invoices.index')->middleware(['auth', 'verified']);
//Route::get('/invoices/create/{id}', [InvoicesController::class, 'create'])->name('invoices.create')->middleware(['auth', 'verified']);
//Route::post('/invoices', [InvoicesController::class, 'store'])->name('invoices.store')->middleware(['auth', 'verified']);
////  Invoices liées à un client
//Route::get('/clients/{client}/invoices/create', [InvoicesController::class, 'create'])->name('clients.invoices.create')->middleware(['auth', 'verified']);
//Route::get('/clients/{client}/invoice', [InvoicesController::class, 'show'])->name('invoices.show')->middleware(['auth', 'verified']);
//
//
//
//Route::get('/invoices', [InvoicesController::class, 'index'])->name('invoices.index')->middleware(['auth', 'verified']);
//Route::get('/invoices/create/{id}', [InvoicesController::class, 'create'])->name('invoices.create')->middleware(['auth', 'verified']);
//Route::post('/invoices', [InvoicesController::class, 'store'])->name('invoices.store')->middleware(['auth', 'verified']);
//Route::get('/invoices/{invoice}', [InvoicesController::class, 'show'])->name('invoices.show')->middleware(['auth', 'verified']);



//Route::get('/invoices/{invoice}', [InvoicesController::class, 'show'])
//    ->name('invoices.show');



// Voir toutes les factures d'un client (entreprise)
Route::get('/clients/{client}/invoices', [InvoicesController::class, 'listByClient'])->name('clients.invoices.index');

//// Voir le détail d'une facture
//Route::get('/invoices/{invoice}', [InvoicesController::class, 'show'])->name('invoices.show');

//download PDF

Route::get('invoices/{invoice}/download-pdf', [InvoicesController::class, 'downloadPdf'])->name('invoices.downloadPdf');

//payroll

Route::get('payroll', [PayrollController::class, 'index'])->name('payroll.index');

Route::get('/employees/{employee}/payroll', [PayrollController::class, 'oneEmployee'])->name('payroll.oneEmployee');

Route::post('/payroll/{employee}', [PayrollController::class, 'store'])->name('payroll.store');

Route::get('/payroll/{employee}/show', [PayrollController::class, 'show'])->name('payroll.show');

Route::post('/payroll/send-pdf/{id}', [PayrollController::class, 'sendPdf'])->name('payroll.sendPdf');


Route::get('/employees/{employee}/edit', [\App\Http\Controllers\EmployeeController::class, 'edit'])->name('employees.edit');


// Address
Route::get('/test',[AddressController::class, 'test'])->name('test');


Route::get('/files',function(){
    return view('file.file');
});

Route::get('/employees/template/file', [EmployeeController::class, 'file'])->name('employees.download.file');
Route::get('/employees/template/download', [EmployeeController::class, 'downloadTemplate'])->name('employees.download.template');

Route::get('customers/create', [\App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create');
Route::get('customers/{id}/show', [\App\Http\Controllers\CustomerController::class, 'show'])->name('customers.show');
Route::post('customers/create', [\App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store');
Route::get('customers/', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/search', [\App\Http\Controllers\CustomerController::class, 'search'])->name('customers.search');


Route::post('customers/{customer}/invoice', [InvoiceController::class, 'store'])->name('invoices.store');


Route::get('invoices/create/{customer}', [InvoiceController::class, 'create'])->name('invoices.create')->middleware(['auth', 'verified']);
Route::get('invoices/show/{customer}', [InvoiceController::class, 'show'])->name('invoices.show');

//Route::post('/customers/{customer}/invoice', [InvoiceController::class, 'store'])->name('invoices.store');
// web.php
Route::get('/invoices/detail/{numero_invoice}', [InvoiceController::class, 'detail'])->name('invoices.detail')->middleware(['auth', 'verified']);




Route::get('/clients/{client}/invoices', [InvoicesController::class, 'listByClient'])
    ->name('clients.invoices.index')->middleware(['auth', 'verified']);

Route::get('/invoices/{invoice}', [InvoicesController::class, 'show'])
    ->name('invoices.show')->middleware(['auth', 'verified']);



Route::get('/timesheet/login', [TimeSheetController::class, 'loginForm'])->name('timesheets.login');
Route::post('/timesheet/login', [TimeSheetController::class, 'login'])->name('timesheets.login.submit');


Route::get('/timesheet/dashboard', [TimeSheetController::class, 'dashboard'])->name('timesheets.dashboard');
Route::post('/timesheet/start', [TimeSheetController::class, 'start'])->name('timesheets.start');
Route::post('/timesheet/end', [TimeSheetController::class, 'end'])->name('timesheets.end');
// routes/web.php
Route::get('/timesheets/all', [TimeSheetController::class, 'all'])->name('timesheets.all');


//
//Route::get('employees/card',function (){
//    return view('employees.card');
//});
//


Route::prefix('admin')->group(function () {

    Route::resource('departments', \App\Http\Controllers\DepartmentController::class)->only(['create', 'store']);
    Route::resource('functions', \App\Http\Controllers\FonctionController::class)->only(['create', 'store']);
    Route::resource('niveaux', \App\Http\Controllers\NiveauController::class)->only(['create', 'store']);
    Route::resource('echelons', \App\Http\Controllers\EchelonController::class)->only(['create', 'store']);
    Route::resource('salary_grids', \App\Http\Controllers\SalaryGridController::class)->only(['create', 'store']);

});


Route::get('/departments/{id}/functions', [SalaryGridController::class, 'getFunctions']);
Route::get('/niveaux/{id}/echelons', [SalaryGridController::class, 'getEchelons']);






Route::get('/functions/{department}', [SalaryController::class, 'getFunctions']);
Route::get('/levels-echelons/{department}/{fonction}', [SalaryController::class, 'getLevelsEchelons']);
Route::get('/salary/{department}/{fonction}/{niveau}/{echelon}', [SalaryController::class, 'getSalary']);


Route::get('/invoices/{invoice}', [InvoicesController::class, 'seeInvoice'])->name('invoices.show');





require __DIR__.'/auth.php';
