<?php
namespace App\Http\Controllers;
namespace App;

use App;
use Route;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Model\Role\SubModule;
use App\Model\Masters\Unit;
use App\Model\Masters\Component;
use App\Model\Masters\Item;
use App\Model\Admission\Batch;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

Route::get('sync', function(){
	return View('sync');
});

//Route::get('sync/get-data', 'SyncController@saveAPIData');

Route::post('sync/get-data/{data}', function($data){
	//dd($jqObj);
	//return View('sync');
	echo "Synced";
});
//OFF Index Page
//Route::get('/', function(){
//	return View('loginIndex');
//});
//Route::post('/', array('as' => 'index.login', 'uses' => 'WelcomeController@log_in'));


Route::get('/', function(){
	return View('web');
});

Route::get('/login','LoginController@ViewLogin');

Route::post('login', array('as' => 'index.login', 'uses' => 'LoginController@DoLogin'));

Route::group(['middleware' => ['web']], function () {
    
   Route::get('main','LoginController@Dashboard'); 
   Route::get('mainLogout','LoginController@Logout');
   Route::get('hcm-dashboard', 'LoginController@HCMDashboard');
   Route::get('finance-dashboard', 'LoginController@FinanceDashboard');
   Route::get('dak-dashboard', 'LoginController@dakDashboard');
});
//Route::get('/', function(){
//	return View('payroll-dashboard');
//});

//Middleware user login

//Route::group(['middleware' => ['web']], function () {
//    
//Route::get('hcm-dashboard', 'Payroll\LoginController@Dashboard');
//Route::get('hcm/logout', 'Payroll\LoginController@Logout');
//
//
//});



Route::get('role/dashboard', function(){
	return View('role/dashboard');
});

//Route::get('hcm-dashboard', function(){
//	return View('payroll-dashboard');
//});

Route::get('pis/dashboard', function(){
    $email = Auth::user()->email;
   	$data['Roledata']=DB::table('role_authorization')      
    ->join('module', 'role_authorization.module_name', '=', 'module.id')
    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
    ->where('member_id','=',$email) 
    ->get();
    
	return View('pis/dashboard',$data);
});


Route::get('employee/dashboard', function(){
    $email = Auth::user()->email;
   	$data['Roledata']=DB::table('role_authorization')      
    ->join('module', 'role_authorization.module_name', '=', 'module.id')
    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
    ->where('member_id','=',$email) 
    ->get();

    $data['employeesincrement']= DB::table('employee')
    ->whereMonth('emp_next_increament_date','=',date('m'))
    ->whereYear('emp_next_increament_date', '=', date('Y'))
    ->where('status','=','active')
	->where('emp_status','!=','TEMPORARY')
    ->where('emp_status', '!=', 'EX-EMPLOYEE')
    ->orderBy('emp_next_increament_date', 'asc')
    ->get();

    $data['employeesdob']= DB::table('employee')
    ->whereDay('emp_dob','>=',date('d'))
    ->whereMonth('emp_dob','=',date('m'))
    ->where('status','=','active')
	->where('emp_status','!=','TEMPORARY')
    ->where('emp_status', '!=', 'EX-EMPLOYEE')
    ->orderBy('emp_dob', 'desc')
    ->get();
    
    $data['employeeretirement']= DB::table('employee')
    ->where('emp_retirement_date','>=',date('Y-m-d'))
    ->whereYear('emp_retirement_date', '=', date('Y'))
    ->where('status','=','active')
    ->orderBy('emp_retirement_date', 'asc')
    ->get();

	return View('employee/dashboard',$data);
});

Route::get('payrollaccounting/dashboard', function(){
    $email = Auth::user()->email;
    $data['Roledata']=DB::table('role_authorization')      
    ->join('module', 'role_authorization.module_name', '=', 'module.id')
    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
    ->where('member_id','=',$email) 
    ->get();
    return View('payrollaccounting/dashboard',$data);
});


Route::get('stipend/dashboard', function(){
    $email = Auth::user()->email;
    $data['Roledata']=DB::table('role_authorization')      
    ->join('module', 'role_authorization.module_name', '=', 'module.id')
    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
    ->where('member_id','=',$email) 
    ->get();
    return View('stipend/dashboard',$data);
});


Route::get('gpf/dashboard', function(){
    $email = Auth::user()->email;
    $data['Roledata']=DB::table('role_authorization')      
    ->join('module', 'role_authorization.module_name', '=', 'module.id')
    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
    ->where('member_id','=',$email) 
    ->get();
    return View('gpf/dashboard',$data);
});


Route::get('accountpayable/dashboard', function(){
    $email = Auth::user()->email;
    $data['Roledata']=DB::table('role_authorization')      
    ->join('module', 'role_authorization.module_name', '=', 'module.id')
    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
    ->where('member_id','=',$email) 
    ->get();
    return View('accountpayable/dashboard',$data);
});

Route::get('accountreceivable/dashboard', function(){
    $email = Auth::user()->email;
    $data['Roledata']=DB::table('role_authorization')
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email)
        ->get();
    return View('accountreceivable/dashboard',$data);
});
Route::get('depreciation/dashboard', function(){
    $email = Auth::user()->email;
    $data['Roledata']=DB::table('role_authorization')
        ->join('module', 'role_authorization.module_name', '=', 'module.id')
        ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
        ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
        ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
        ->where('member_id','=',$email)
        ->get();
    return View('depreciation/dashboard',$data);
});


Route::get('employee/apply-increment/{emp_code}','Payroll\EmployeeController@applyIncrement');

Route::get('increment-report','Payroll\EmployeeController@viewIncrement');
Route::post('increment-report','Payroll\EmployeeController@reportIncrement');

Route::get('attendance/dashboard', function(){
	$email = Auth::user()->email;
   	$data['Roledata']=DB::table('role_authorization')      
    ->join('module', 'role_authorization.module_name', '=', 'module.id')
    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
    ->where('member_id','=',$email) 
    ->get();
	return View('attendance/dashboard',$data);
});


Route::get('leavemanagement/dashboard', function(){

	$email = Auth::user()->email;
   	$data['Roledata']=DB::table('role_authorization')      
    ->join('module', 'role_authorization.module_name', '=', 'module.id')
    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
    ->where('member_id','=',$email) 
    ->get();
	return View('leavemanagement/dashboard',$data);
});


Route::get('holiday/dashboard', function(){

	$email = Auth::user()->email;
   	$data['Roledata']=DB::table('role_authorization')      
    ->join('module', 'role_authorization.module_name', '=', 'module.id')
    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
    ->where('member_id','=',$email) 
    ->get();
	return View('holiday/dashboard',$data);
});



Route::get('hr/dashboard', function(){
	return View('hr/dashboard');
});

Route::get('masters/dashboard', function(){
	return View('masters/dashboard');
});

/*Route::get('sms-dashboard', function(){
	return View('sms-dashboard');
});

Route::get('sms/fees-management', function(){
	return View('sms/fees-management/dashboard');
});

Route::get('sms/admission', function(){
	return View('sms/admission/dashboard');
});

Route::get('sms/room-management', function(){
	return View('sms/room-management/dashboard');
});

Route::get('sms/exam-management', function(){
	return View('sms/exam-management/dashboard');
});

Route::get('procurement/indent/dashboard', function(){
	return View('procurement/indent/dashboard');
});

Route::get('procurement/procure-dashboard', function(){
	return View('procurement/procure-dashboard');
});


Route::get('procurement/inventory/dashboard', function(){
	return View('procurement/inventory/dashboard');
});

Route::get('sms/routine-management', function(){
	return View('sms/routine-management/dashboard');
});

Route::get('sms/result-management', function(){
	return View('sms/result-management/dashboard');
});

Route::get('procurement/sales/dashboard', function(){
	return View('procurement/sales/dashboard');
});*/

/*Route::get('procurement/purchase/dashboard', function(){
    return View('procurement/purchase/dashboard');
});*/

Route::get('procurement/indent/dashboard', function(){
    return View('procurement/indent/dashboard');
});
Route::get('procurement/procure-dashboard', function(){
    return View('procurement/procure-dashboard');
});
//Route::get('procurement/inventory/dashboard', function(){
    //return View('procurement/inventory/dashboard');
//});
Route::get('procurement/stock/dashboard', function(){
    return View('procurement/stock/dashboard');
});
/////////////////////////////////LOGIN////////////////////////////////////////////

Route::get('pis/login', 'Payroll\LoginController@ViewLogin');
Route::post('pis/login', 'Payroll\LoginController@DoLogin');





////////////////////////Role/////////////////////////////////////////////////

//User Role
//Route::get('role/vw-user-role','Role\UserAccessRightsController@getInstitutes');

Route::get('role/user-role','Role\UserAccessRightsController@viewUserAccessRightsForm');
//Route::post('role/user-role','Role\UserAccessRightsController@saveUserAccessRightsForm');
Route::post('role/user-role','Role\UserAccessRightsController@UserAccessRightsFormAuth');
Route::get('role/view-users-role','Role\UserAccessRightsController@viewUserAccessRights');
//Route::get('role/user-role/{role_authorization_id}','Role\UserAccessRightsController@getUserAccessRights');
Route::get('role/view-users-role/{role_authorization_id}','Role\UserAccessRightsController@deleteUserAccess');

Route::get('role/vw-users','Role\UserAccessRightsController@viewUserConfig');
Route::get('role/vw-user-config','Role\UserAccessRightsController@viewUserConfigForm');
Route::post('role/vw-user-config','Role\UserAccessRightsController@SaveUserConfigForm');
Route::get('role/vw-user-config/{user_id}','Role\UserAccessRightsController@GetUserConfigForm');
//Module
Route::get('role/vw-module','Role\ModuleController@getModules');
Route::get('role/module','Role\ModuleController@viewModuleForm');
Route::post('role/module','Role\ModuleController@saveModuleForm');

//Sub-Module
Route::get('role/vw-sub-module','Role\SubModuleController@getSubModules');
Route::get('role/sub-module','Role\SubModuleController@viewSubModuleForm');
Route::post('role/sub-module','Role\SubModuleController@saveSubModuleForm');

//Module-Config
Route::get('role/vw-module-config','Role\ModuleConfigController@getModuleConfig');
Route::get('role/module-config','Role\ModuleConfigController@viewModuleConfig');
Route::post('role/module-config','Role\ModuleConfigController@saveModuleConfig');


///////////////////////Role//////////////////////////////////////////////////////////

////////////////////////Configuration of Master/////////////////////////////////////
//Account Master
Route::get('masters/accountmasters','Masters\AccountMasterController@accountListing');
Route::get('masters/accountmaster','Masters\AccountMasterController@viewAccount');
Route::post('masters/accountmaster','Masters\AccountMasterController@saveAccount');
//Route::get('masters/accountmaster/{account_id}','Masters\AccountMasterController@getAccountById');

Route::get('masters/opening-bal-generation', 'Masters\OpenBalanceGenerationController@addbalgpfemployee');
Route::post('masters/opening-bal-generation', 'Masters\OpenBalanceGenerationController@listbalgpfemployee');
Route::get('masters/vw-opening-balance', 'Masters\OpenBalanceGenerationController@addPayrollbalgpfemployee');
Route::post('masters/vw-opening-balance', 'Masters\OpenBalanceGenerationController@listPayrollbalgpfemployee');

//COA
Route::get('masters/coas','Masters\CoaController@coaListing');
Route::get('masters/coa','Masters\CoaController@viewCoa');
Route::post('masters/coa','Masters\CoaController@saveCoa');
//Route::get('masters/coa/{coa_id}','Masters\CoaController@getCoaById');
Route::get('masters/accounttype/{account_type}','Masters\CoaController@coaAccounttype');
Route::get('masters/coacode/{account_type}/{account_name}','Masters\CoaController@getCoacode');
Route::get('masters/getbasecode/{account_type}/{account_name}','Masters\CoaController@getBasecode');

//General Ledger
Route::get('masters/ledgers','Masters\GeneralLedgerController@ledgerListing');
Route::get('masters/ledger','Masters\GeneralLedgerController@viewLedger');
Route::post('masters/ledger','Masters\GeneralLedgerController@saveLedger');
Route::get('masters/ledger/{ledger_id}','Masters\GeneralLedgerController@getLedgerById');

//Institute
Route::get('masters/vw-institute','Masters\InstituteController@getInstitutes');
Route::get('masters/institute','Masters\InstituteController@viewFormInstitutes');
Route::post('masters/institute','Masters\InstituteController@saveInstitutes');

//Faculty
Route::get('masters/vw-faculty','Masters\FacultyController@getFaculty');
Route::get('masters/add-new-faculty','Masters\FacultyController@viewFormFaculty');
Route::post('masters/add-new-faculty','Masters\FacultyController@saveFaculty');

//Course
Route::get('masters/vw-course','Masters\CourseController@getCourse');
Route::get('masters/course','Masters\CourseController@viewFormCourse');
Route::post('masters/course','Masters\CourseController@saveCourse');

//Accessories
Route::get('masters/vw-accessories','Masters\AccessoriesController@getAccessories');
Route::get('masters/accessories','Masters\AccessoriesController@formAccessories');
Route::post('masters/accessories','Masters\AccessoriesController@saveAccessories');

//Room
Route::get('masters/vw-room','Masters\RoomController@getRoom');
Route::get('masters/room','Masters\RoomController@viewFormRoom');
Route::post('masters/room','Masters\RoomController@saveRoom');

//Stream
Route::get('masters/vw-stream','Masters\StreamController@getStream');
Route::get('masters/stream','Masters\StreamController@viewFormStream');
Route::post('masters/stream','Masters\StreamController@saveStream');

//Subject
Route::get('masters/vw-subject','Masters\SubjectController@getSubject');
Route::get('masters/subject','Masters\SubjectController@viewFormSubject');
Route::post('masters/subject','Masters\SubjectController@saveSubject');

//Class
Route::get('masters/vw-class','Masters\ClassController@getClass');
Route::get('masters/class','Masters\ClassController@viewFormClass');
Route::post('masters/class','Masters\ClassController@saveClass');

//Hostel
Route::get('masters/vw-hostel','Masters\HostelController@getHostel');
Route::get('masters/hostel','Masters\HostelController@viewHostel');
Route::post('masters/hostel','Masters\HostelController@saveHostel');

//Category
Route::get('masters/vw-category','Masters\CategoryController@index');
Route::get('masters/category','Masters\CategoryController@Create');
Route::post('masters/category','Masters\CategoryController@store');
Route::get('masters/category/{id}','Masters\CategoryController@edit');


//Sub-Category
Route::get('masters/vw-sub-category','Masters\SubCategoryController@index');
Route::get('masters/sub-category','Masters\SubCategoryController@Create');
Route::post('masters/sub-category','Masters\SubCategoryController@store');
Route::get('masters/sub-category/{id}','Masters\SubCategoryController@edit');

//Supplier
Route::get('masters/vw-supplier','Masters\SupplierController@getSupplier');
Route::get('masters/supplier','Masters\SupplierController@viewSupplier');
Route::post('masters/supplier','Masters\SupplierController@saveSupplier');
Route::get('masters/supplier/{id}','Masters\SupplierController@getSupplierById');
Route::get('masters/supplier/dist/{state_id}', function($state_id){
    // dd($state_id);
    $dist_list=DB::table('district_master')->where('state_id','=',$state_id)->get();
    return $dist_list;
});
Route::get('masters/supplier/supplierinfo/{supplier_id}', function($supplier_id){
//     dd($supplier_id);
    $supplier_list=DB::table('supplier')->where('id','=',$supplier_id)->first();
    echo json_encode($supplier_list);
});

//Supplier Configuration
Route::get('masters/vw-supplier-config','Masters\SupplierConfigController@getSupplierConfig');
Route::get('masters/supplier-config','Masters\SupplierConfigController@viewSupplierConfig');
Route::post('masters/supplier-config','Masters\SupplierConfigController@saveSupplierConfig');

//Unit
Route::get('masters/vw-unit','Masters\UnitController@getUnit');
Route::get('masters/unit','Masters\UnitController@viewUnit');
Route::post('masters/unit','Masters\UnitController@saveUnit');

//Component
Route::get('masters/vw-component','Masters\ComponentController@getComponent');
Route::get('masters/component','Masters\ComponentController@viewComponent');
Route::post('masters/component','Masters\ComponentController@saveComponent');

//Item
Route::get('masters/vw-item','Masters\ItemController@getItem');
Route::get('masters/item','Masters\ItemController@viewItem');
Route::post('masters/item','Masters\ItemController@saveItem');
Route::get('masters/item/{id}','Masters\ItemController@getItemById');
Route::get('masters/subcategory/{category_id}', function($category_id){

    $subcategpories=DB::table('sub_categories')->where('cat_name','=',$category_id)->get();
    return $subcategpories;
});

//Institute Wise Configuration
Route::get('masters/institute-wise-config','Masters\InstituteWiseConfigController@getInstituteWiseConfig');
Route::get('masters/add-inst-wise-config-au','Masters\InstituteWiseConfigController@viewInstituteWiseConfig');
Route::post('masters/add-inst-wise-config-au','Masters\InstituteWiseConfigController@viewInstituteWisePageConfig');
Route::post('masters/add-inst-wise-config-au-next','Masters\InstituteWiseConfigController@saveInstituteWisePageConfig');
Route::post('masters/add-inst-wise-config-ais-next','Masters\InstituteWiseConfigController@saveSchoolWisePageConfig');

//Subject Configuration
Route::get('masters/subject-configuration','Masters\SubjectConfigController@getSubjectConfig');
Route::get('masters/add-sub-config','Masters\SubjectConfigController@viewSubjectConfig');
Route::post('masters/add-sub-config','Masters\SubjectConfigController@saveSubjectConfig');
//Route::get('masters/add-sub-config-next','Masters\SubjectConfigController@viewSubjectNextConfig');
Route::post('masters/add-sub-config-next','Masters\SubjectConfigController@viewSubjectNextConfig');
Route::post('masters/add-sub-config-ais-next','Masters\SubjectConfigController@viewSubjectNextConfig');

Route::get('masters/vw-cast', 'Masters\CastController@viewCast');
Route::get('masters/add-new-cast', 'Masters\CastController@addCast');
Route::post('masters/add-new-cast', 'Masters\CastController@addSaveCast');
Route::get('masters/vw-sub-cast', 'Masters\CastController@viewSubCast');
Route::post('masters/add-sub-cast', 'Masters\CastController@addSaveSubCast');
Route::get('masters/add-sub-cast', 'Masters\CastController@viewAddSubCast');
Route::get('masters/vw-religion', 'Masters\ReligionController@viewReligionList');
Route::get('masters/add-new-religion', 'Masters\ReligionController@addReligionForm');
Route::post('masters/add-new-religion', 'Masters\ReligionController@addReligionFormSubmit');
Route::get('masters/add-rate-details', 'Masters\RateMaster@addRateDetailsForm');
Route::post('masters/add-rate-details', 'Masters\RateMaster@SubmitRateDetailsForm');
Route::get('masters/vw-designation', 'Masters\DesignationController@getDesignations');
Route::post('masters/company', 'Masters\CompanyController@saveCompany');
Route::get('masters/vw-grade', 'Masters\GradeController@getGrades');
Route::get('masters/add-new-department', 'Masters\DepartmentMasterController@viewAddNewDepartment');
Route::post('masters/add-new-department', 'Masters\DepartmentMasterController@saveDepartmentData');
Route::post('masters/designation', 'Masters\DesignationController@saveDesignation');
Route::get('masters/designation', 'Masters\DesignationController@viewAddDesignation');
Route::get('masters/vw-department', 'Masters\DepartmentMasterController@getDepartment');
Route::get('masters/vw-company', 'Masters\CompanyController@getCompanies');
Route::get('masters/company', 'Masters\CompanyController@viewAddCompany');
Route::get('procurement/indent/add-new-item', 'Masters\ItemController@addItem');

Route::get('masters/vw-employee-type', 'Masters\EmployeeTypeController@getEmployeeTypes');
Route::get('masters/employee-type', 'Masters\EmployeeTypeController@viewAddEmployeeType');
Route::post('masters/employee-type', 'Masters\EmployeeTypeController@saveEmployeeType');
Route::get('masters/employee-type/{id}', 'Masters\EmployeeTypeController@getTypeById');

Route::get('masters/grade', 'Masters\GradeController@viewAddGrade');
Route::post('masters/grade', 'Masters\GradeController@saveGrade');
//Route::post('pis/grade', 'Payroll\GradeController@saveGrade');

Route::get('masters/ratelist', 'Masters\RateMaster@getRateList');
Route::get('masters/rate-details/{rate_id}', 'Masters\RateMaster@getRateChart');
Route::post('masters/rate-details', 'Masters\RateMaster@saveRateChart');
//bank 
Route::get('masters/bank', 'Masters\BankController@viewAddBank');
Route::post('masters/bank', 'Masters\BankController@saveBank');
Route::get('masters/vw-bank', 'Masters\BankController@getBanks');
Route::get('masters/delete-bank/{$id}', 'Masters\BankController@deleteBanks');


Route::get('masters/stipendbank', 'Masters\StipendBankController@viewAddStipendBank');
Route::post('masters/stipendbank', 'Masters\StipendBankController@saveStipendBank');
Route::get('masters/vw-stipend-bank', 'Masters\StipendBankController@getStipendBank');


Route::get('masters/company_banklisting', 'Masters\CompanyBankController@getCompanyBankListing');
Route::get('masters/companybank', 'Masters\CompanyBankController@viewCompanyAddBank');
Route::get('masters/companybank/{id}', 'Masters\CompanyBankController@getCompanyBankDtl');
Route::post('masters/companybank', 'Masters\CompanyBankController@saveCompanyBank');


Route::get('masters/tdslisting', 'Masters\TdsController@tdsListing');
Route::get('masters/tdsdetail', 'Masters\TdsController@viewTds');
Route::get('masters/tdsdetail/{id}', 'Masters\TdsController@getTdsDtl');
Route::post('masters/tdsdetail', 'Masters\TdsController@saveTds');


Route::get('masters/loanlisting', 'Masters\LoanController@loanListing');
Route::get('masters/loandetail', 'Masters\LoanController@viewLoan');
Route::get('masters/loandetail/{id}', 'Masters\LoanController@getLoanDtl');
Route::post('masters/loandetail', 'Masters\LoanController@saveLoan');

Route::get('masters/gpf-rate-listing', 'Masters\GpfRateController@gpfRateListing');
Route::get('masters/gpf-rate-detail', 'Masters\GpfRateController@viewGpfRate');
Route::post('masters/gpf-rate-save', 'Masters\GpfRateController@saveGpfRate');



Route::get('masters/gpf_banklisting', 'Masters\GpfBankController@getGpfBankListing');
Route::get('masters/gpfbank', 'Masters\GpfBankController@viewGpfAddBank');
Route::get('masters/gpfbank/{id}', 'Masters\GpfBankController@getGpfBankDtl');
Route::post('masters/gpfbank', 'Masters\GpfBankController@saveGpfBank');





////////////////////////End of Configuration/////////////////////////////

//View Add New Page for Payroll Function
Route::get('pis/company', 'Payroll\CompanyController@viewAddCompany');
Route::get('pis/branch', 'Payroll\BranchController@viewAddBranch');
Route::get('pis/add-new-branch-allocation', 'Payroll\BranchAllocationController@viewAddBranchAllocation');
Route::get('pis/designation', 'Payroll\DesignationController@viewAddDesignation');
Route::get('pis/employee-type', 'Payroll\EmployeeTypeController@viewAddEmployeeType');
//Route::get('pis/bank', 'Payroll\BankController@viewAddBank');

Route::get('pis/grade', 'Payroll\GradeController@viewAddGrade');
Route::get('pis/add-new-department', 'Payroll\DepartmentMasterController@viewAddNewDepartment');
Route::get('pis/addition-head', 'Payroll\AdditionHeadController@viewAddAdditionHead');
Route::get('pis/deduction-head', 'Payroll\DeductionHeadController@viewDeductionHead');
Route::get('employee','Payroll\EmployeeController@viewAddEmployee');			
Route::get('pis/emp-grade-allowance', 'Payroll\EmployeeGradeWiseAllowanceController@viewAddEmployeeGradeWiseAllowance');
Route::get('pis/add-payroll-generation', 'Payroll\PayrollGenerationController@viewPayroll');

Route::get('paystructure', 'Payroll\PayStructureController@getPaystructure');
Route::post('paystructure', 'Payroll\PayStructureController@savePaystructure');
Route::get('paystructure-dashboard', 'Payroll\PayStructureController@viewPayStructureDashboard');
Route::get('paystructure/paystructuredelete/{paystructure_id}','Payroll\PayStructureController@deletePaystructure');

Route::get('pis/vw-process-payroll', 'Payroll\PayrollGenerationController@getProcessPayroll');
Route::post('pis/vw-process-payroll', 'Payroll\PayrollGenerationController@vwProcessPayroll');
Route::post('pis/edit-process-payroll', 'Payroll\PayrollGenerationController@updateProcessPayroll');
Route::get('pis/payrolldelete/{payroll_id}','Payroll\PayrollGenerationController@deletePayroll');
Route::get('pis/vw-payroll-generation-for-arrear','Payroll\PayrollGenerationController@getArrearPayrollForSingle');
Route::get('pis/vw-payroll-generation-all-employee-for-arrear','Payroll\PayrollGenerationController@getArrearPayrollForAll');
Route::get('pis/add-payroll-generation-arrear', 'Payroll\PayrollGenerationController@viewPayrollForArrear');
Route::post('pis/add-payroll-generation-arrear', 'Payroll\PayrollGenerationController@savePayrollForArrear');
Route::get('pis/add-payroll-generation-all-arrear', 'Payroll\PayrollGenerationController@addPayrollallemployeeArrear');
Route::post('pis/vw-generate-arrear-payroll-all', 'Payroll\PayrollGenerationController@listArearPayrollallemployee');
Route::post('pis/save-payroll-generation-all-arrear', 'Payroll\PayrollGenerationController@SaveArrearPayrollAll');
Route::get('pis/vw-arrear-bill', 'Payroll\PayrollGenerationController@getArrearBill');
Route::post('pis/vw-arrear-bill', 'Payroll\PayrollGenerationController@saveArearBill');
Route::get('pis/vw-arrear-bill/{id}', 'Payroll\PayrollGenerationController@editArrearBill');
Route::get('pis/arear-dashboard', 'Payroll\PayrollGenerationController@viewArearBill');
Route::get('pis/arear-calculation-dashboard', 'Payroll\PayrollGenerationController@getArearCalcDashboard');
Route::post('pis/arear-calculation-dashboard', 'Payroll\PayrollGenerationController@saveArearCalcDashboard');
Route::post('pis/arear-calculation-save', 'Payroll\PayrollGenerationController@saveArearCalcMaster');



Route::get('pis/add-new-loan', 'Payroll\LoanController@viewLoan');
Route::get('pis/add-new-loan-conf', 'Payroll\LoanConfigurationController@viewLoanConf');
Route::get('pis/add-new-branch-allowance', 'Payroll\BranchAllowanceController@viewAddBranchAllowance');
Route::get('pis/add-new-extra-class', 'Payroll\ExtraClassAllowanceController@viewAddExtraClassAllowance');
Route::get('pis/vw-cast', 'Payroll\CastController@viewCast');
Route::get('pis/add-new-cast', 'Payroll\CastController@addCast');
Route::post('pis/add-new-cast', 'Payroll\CastController@addSaveCast');
Route::get('pis/vw-sub-cast', 'Payroll\CastController@viewSubCast');
Route::post('pis/add-sub-cast', 'Payroll\CastController@addSaveSubCast');
Route::get('pis/add-sub-cast', 'Payroll\CastController@viewAddSubCast');
Route::get('pis/vw-religion', 'Payroll\ReligionController@viewReligionList');
Route::get('pis/add-new-religion', 'Payroll\ReligionController@addReligionForm');
Route::post('pis/add-new-religion', 'Payroll\ReligionController@addReligionFormSubmit');
Route::get('pis/add-rate-details', 'Payroll\RateMaster@addRateDetailsForm');
Route::post('pis/add-rate-details', 'Payroll\RateMaster@saveArearBill');
Route::get('pis/view-arrear-details', 'Payroll\PayrollGenerationController@viewArearReport');
Route::post('pis/view-arrear-details', 'Payroll\PayrollGenerationController@showArearReport');
Route::get('pis/view-arrear-statement', 'Payroll\PayrollGenerationController@viewArearStatement');
Route::post('pis/view-arrear-statement', 'Payroll\PayrollGenerationController@showArearStatement');

Route::get('pis/getdate/{head_id}', function($head_id){
    // echo "1234"; exit;
    $date_list=DB::table('rate_master_history')->where('head_id','=',$head_id)->orderBy('created_at', 'ASC')->first();
    // print_r($date_list); exit;
    echo json_encode($date_list);

});

//Route::get('pis/employee/{id}','Payroll\EmployeeController@viewEditEmployee');

// Add Payroll Function Here
Route::post('pis/company', 'Payroll\CompanyController@saveCompany');
Route::post('pis/branch', 'Payroll\BranchController@saveBranch');
Route::post('pis/add-new-branch-allocation', 'Payroll\BranchAllocationController@saveBranchAllocation');
Route::post('pis/designation', 'Payroll\DesignationController@saveDesignation');
Route::post('pis/employee-type', 'Payroll\EmployeeTypeController@saveEmployeeType');
Route::post('pis/bank', 'Payroll\BankController@saveBank');
Route::post('pis/grade', 'Payroll\GradeController@saveGrade');
Route::post('pis/add-new-department', 'Payroll\DepartmentMasterController@saveDepartmentData');
Route::post('pis/addition-head', 'Payroll\AdditionHeadController@saveAdditionHead');
Route::post('pis/deduction-head', 'Payroll\DeductionHeadController@saveDeductionHead');
Route::post('employee','Payroll\EmployeeController@saveEmployee');	
Route::post('pis/emp-grade-allowance-detail', 'Payroll\EmployeeGradeWiseAllowanceController@getEmployeeGradeWiseAllowanceDetail');
Route::post('pis/emp-grade-allowance', 'Payroll\EmployeeGradeWiseAllowanceController@saveEmployeeGradeWiseAllowance');
Route::post('pis/payroll-generation-detail', 'Payroll\PayrollGenerationController@getPayrollDetail');
Route::post('pis/add-payroll-generation', 'Payroll\PayrollGenerationController@savePayrollDetails');
Route::post('pis/add-new-loan', 'Payroll\LoanController@saveLoan');
Route::post('pis/add-new-loan-conf', 'Payroll\LoanConfigurationController@saveLoanConf');
Route::post('pis/add-new-branch-allowance', 'Payroll\BranchAllowanceController@saveBranchAllowance');
Route::post('pis/add-new-extra-class', 'Payroll\ExtraClassAllowanceController@saveExtraClassAllowance');
Route::post('pis/edit-employee','Payroll\EmployeeController@updateEmployee');	
Route::get('pis/edit-employee/{empid}','Payroll\EmployeeController@viewEmployee');
Route::get('pis/employee-profile','Payroll\EmployeeController@getEmployeeById');
Route::post('pis/change-password','Payroll\EmployeeController@changePassword');
Route::get('pis/gpf-details','Payroll\EmployeeController@getPfDetails');   	

//View Payroll Function With Data
Route::get('pis/vw-company', 'Payroll\CompanyController@getCompanies');
Route::get('pis/vw-branch', 'Payroll\BranchController@getBranch');
Route::get('pis/vw-branch-allocation', 'Payroll\BranchAllocationController@getBranchAllocation');
Route::get('pis/vw-designation', 'Payroll\DesignationController@getDesignations');
Route::get('pis/vw-employee-type', 'Payroll\EmployeeTypeController@getEmployeeTypes');
Route::get('pis/vw-bank', 'Payroll\BankController@getBanks');
Route::get('pis/vw-grade', 'Payroll\GradeController@getGrades');
Route::get('pis/vw-department', 'Payroll\DepartmentMasterController@getDepartment');
Route::get('pis/vw-addition-head', 'Payroll\AdditionHeadController@getAdditionHeads');
Route::get('pis/vw-deduction-head', 'Payroll\DeductionHeadController@getDeductionHeads');
Route::get('employees', 'Payroll\EmployeeController@getEmployees');



Route::get('promotion', 'Payroll\EmployeeController@promotionView');
Route::post('promotion', 'Payroll\EmployeeController@savePromotion');
Route::get('promotionreport','Payroll\EmployeeController@viewPromotionReport');
Route::post('promotionreport','Payroll\EmployeeController@reportPromotionReport');


Route::get('macp', 'Payroll\EmployeeController@macpView');
Route::post('macp', 'Payroll\EmployeeController@saveMacp');
Route::get('macpreport','Payroll\EmployeeController@viewMcapReport');
Route::post('macpreport','Payroll\EmployeeController@reportMcapReport');


Route::get('servicebook', 'Payroll\EmployeeServicebookController@servicebook');
Route::get('empdetails/{emp_id}', 'Payroll\EmployeeServicebookController@empdetails');
Route::get('personalinfo', 'Payroll\EmployeeServicebookController@personalinfo');
Route::post('personalinfo', 'Payroll\EmployeeServicebookController@saveEmpPersonalinfo');

Route::get('educationalinfo', 'Payroll\EmployeeServicebookController@educationinfo');
Route::post('educationalinfo', 'Payroll\EmployeeServicebookController@saveEducationinfo');

Route::get('pis/vw-emp-grade-allowance', 'Payroll\EmployeeGradeWiseAllowanceController@getEmployeeGradeWiseAllowance');
Route::get('pis/vw-payroll-generation', 'Payroll\PayrollGenerationController@getPayroll');



Route::get('pis/vw-payroll-generation-all-employee', 'Payroll\PayrollGenerationController@getPayrollallemployee');
Route::get('pis/add-generate-payroll-all', 'Payroll\PayrollGenerationController@addPayrollallemployee');
Route::post('pis/vw-generate-payroll-all', 'Payroll\PayrollGenerationController@listPayrollallemployee');

Route::get('pis/vw-loan', 'Payroll\LoanController@getLoan');
Route::get('pis/vw-loan-conf', 'Payroll\LoanConfigurationController@getLoanConf');
Route::get('pis/vw-branch-wise-allocation','Payroll\BranchAllowanceController@getBranchAllowance');
Route::get('pis/vw-extra-class','Payroll\ExtraClassAllowanceController@getExtraClassAllowance');

//PIS VIEW REPORTS
Route::get('pis/vw-employeewise-view-payslip', 'Payroll\EmployeeWisePayslipController@getEmployeeWisePayslip');
Route::get('pis/vw-gradewise-view-payslip', 'Payroll\GradeWisePayslipController@getGradeWisePayslip');
Route::get('pis/vw-salary-register', 'Payroll\MonthlySalaryRegisterController@getMonthlySalaryRegister');
Route::get('pis/vw-pf-statement', 'Payroll\PfStatementController@getPfStatement');
Route::get('pis/vw-ptax-statement', 'Payroll\PtaxStatementController@getPtaxStatement');
Route::get('pis/vw-bank-statement', 'Payroll\BankWisePayslipController@getBankWisePayslip');
Route::get('pis/downloadExcel/{bank}/{month}/{year}', 'Payroll\BankWisePayslipController@downloadExcel');
Route::get('pis/opening-bal-generation', 'Payroll\PayrollGenerationController@addbalgpfemployee');
Route::post('pis/opening-bal-generation', 'Payroll\PayrollGenerationController@listbalgpfemployee');
Route::get('pis/vw-opening-bal-payroll-generation', 'Payroll\PayrollGenerationController@addPayrollbalgpfemployee');
Route::post('pis/vw-opening-bal-payroll-generation', 'Payroll\PayrollGenerationController@listPayrollbalgpfemployee');

//PIS FORM REPORTS
Route::post('pis/vw-employeewise-view-payslip', 'Payroll\EmployeeWisePayslipController@showEmployeeWisePayslip');
Route::get('pis/payslip/{emp_id}/{pay_dtl_id}', 'Payroll\EmployeeWisePayslipController@viewPayrollDetails');

Route::get('employee/payslip', 'Payroll\EmployeeWisePayslipController@showSinglePayslip');
Route::post('employee/payslip', 'Payroll\EmployeeWisePayslipController@singlePayslip');

Route::post('pis/Ptax-salary-summary', 'Payroll\PtaxStatementController@viewPtaxSummary');
Route::post('pis/pf-statement', 'Payroll\PfStatementController@viewPfSummary');
Route::post('pis/view-salary-register', 'Payroll\MonthlySalaryRegisterController@viewMonthlySalarySummary');
Route::post('pis/vw-bank-statement', 'Payroll\BankWisePayslipController@showBankWiseStatement');
Route::post('pis/view-bank-statement', 'Payroll\BankWisePayslipController@viewBankStatement');

Route::post('pis/save-payroll-all', 'Payroll\PayrollGenerationController@SavePayrollAll');
Route::get('pis/vw-p-tax-employee-wise', 'Payroll\PtaxEmployeeWiseController@ViewPtaxEmpWise');
Route::post('pis/vw-p-tax-employee-wise', 'Payroll\PtaxEmployeeWiseController@ShowReportPtaxEmpWise');
Route::get('pis/vw-p-tax-department-wise', 'Payroll\PtaxEmployeeWiseController@ViewPtaxDeptWise');
Route::post('pis/vw-p-tax-department-wise', 'Payroll\PtaxEmployeeWiseController@ShowReportPtaxDeptWise');
Route::get('pis/salary-statement', 'Payroll\PtaxEmployeeWiseController@ViewSalaryStatement');
Route::post('pis/salary-statement', 'Payroll\PtaxEmployeeWiseController@ShowSalaryStatementReport');

Route::get('pis/vw-gpf-wise', 'Payroll\PtaxEmployeeWiseController@ViewGpfMonthlyWise');
Route::post('pis/vw-gpf-wise', 'Payroll\PtaxEmployeeWiseController@ShowReportGpfMonthlyWise');

Route::get('pis/vw-gpf-emplyeewise', 'Payroll\PtaxEmployeeWiseController@ViewGpfEmployeewise');
Route::post('pis/vw-gpf-emplyeewise', 'Payroll\PtaxEmployeeWiseController@ShowReportGpfEmployeewise');


Route::get('pis/vw-nps-all', 'Payroll\PtaxEmployeeWiseController@ViewNpsAll');
Route::post('pis/vw-nps-all', 'Payroll\PtaxEmployeeWiseController@ShowReportNpsAll');

Route::get('pis/vw-nps-emplyeewise', 'Payroll\PtaxEmployeeWiseController@ViewNpsEmployeewise');
Route::post('pis/vw-nps-emplyeewise', 'Payroll\PtaxEmployeeWiseController@ShowReportNpsEmployeewise');


Route::get('pis/vw-incomtax-all', 'Payroll\PtaxEmployeeWiseController@ViewIncometaxAll');
Route::post('pis/vw-incomtax-all', 'Payroll\PtaxEmployeeWiseController@ShowReportIncomeAll');


Route::get('pis/vw-incometax-emplyeewise', 'Payroll\PtaxEmployeeWiseController@ViewIncomEmployeewise');

Route::post('pis/vw-incometax-emplyeewise', 'Payroll\PtaxEmployeeWiseController@ShowReportIncomeEmployeewise');

Route::get('pis/vw-incometax-emplyeewise', 'Payroll\PtaxEmployeeWiseController@ViewIncomEmployeewise');

Route::post('pis/vw-incometax-emplyeewise', 'Payroll\PtaxEmployeeWiseController@ShowReportIncomeEmployeewise');

Route::get('pis/vw-glsi-all', 'Payroll\PtaxEmployeeWiseController@ViewGlsiAll');
Route::post('pis/vw-glsi-all', 'Payroll\PtaxEmployeeWiseController@ShowReportGlsiAll');

Route::get('pis/vw-glsi-emplyeewise', 'Payroll\PtaxEmployeeWiseController@ViewGlsiEmployeewise');
Route::post('pis/vw-glsi-emplyeewise', 'Payroll\PtaxEmployeeWiseController@ShowReportGlsiEmployeewise');
///////////////////////// Attendance Module //////////////////////////////////

// Manage Leave Type
Route::get('leave-management/new-leave-type', 'Attendance\LeaveTypeController@viewAddLeaveType');
Route::post('leave-management/new-leave-type', 'Attendance\LeaveTypeController@saveLeaveType');
Route::get('leave-management/leave-type-listing', 'Attendance\LeaveTypeController@getLeaveType');


//View Add New Page for Attendance Function
Route::get('leave-management/save-leave-rule', 'Attendance\LeaveRuleController@leaveRules');
Route::post('leave-management/save-leave-rule', 'Attendance\LeaveRuleController@saveAddLeaveRule');
Route::get('leave-management/leave-rule-listing', 'Attendance\LeaveRuleController@getLeaveRules');
Route::get('leave-management/view-leave-rule/{leave_rule_id}', 'Attendance\LeaveRuleController@getLeaveRulesById');


Route::get('leave-management/save-leave-allocation', 'Attendance\LeaveAllocationController@viewAddLeaveAllocation');

Route::post('leave-management/get-leave-allocation', 'Attendance\LeaveAllocationController@getAddLeaveAllocation');

Route::post('leave-management/save-leave-allocation', 'Attendance\LeaveAllocationController@saveAddLeaveAllocation');

Route::get('leave-management/leave-allocation-listing', 'Attendance\LeaveAllocationController@getLeaveAllocation');

Route::get('leave-management/leave-allocation-dtl/{leave_allocation_id}', 'Attendance\LeaveAllocationController@getLeaveAllocationById');

Route::post('attendance/save-edit-leave-allocation', 'Attendance\LeaveAllocationController@editLeaveAllocation');

//View Attendance Function With Data




//Route::get('attendance/deleteleaveallocation/{leave_rule_id}','Attendance\LeaveAllocationController@deleteLeaveAllocation');

// View Time Shift management
Route::post('attendance/add-shift', 'Attendance\ShiftController@saveshiftdata');
Route::get('attendance/add-shift', 'Attendance\ShiftController@addshift');
Route::get('attendance/shift-time','Attendance\ShiftController@getShiftData');

// Offday Data
Route::get('attendance/employee-offday','Attendance\OffdayController@viewOffdayDetails');
Route::post('attendance/add-new-offday','Attendance\OffdayController@saveOffdayData');
Route::get('attendance/add-new-offday','Attendance\OffdayController@viewOffday');

// Branch Grace Period
Route::get('attendance/branch-grace-period', 'Attendance\GraceperiodController@viewGracePeriodDetails');
Route::get('attendance/add-grace-period', 'Attendance\GraceperiodController@viewAddGracePeriod');
Route::post('attendance/add-grace-period', 'Attendance\GraceperiodController@saveAddGracePeriod');

// Duty Roaster

Route::get('attendance/employee-duty-roaster', 'Attendance\DutyRoasterController@viewDutyRoaster');
Route::post('attendance/employee-duty-roaster', 'Attendance\DutyRoasterController@viewDutyRoasterDetails');
Route::get('attendance/add-duty-roaster', 'Attendance\DutyRoasterController@viewAddDutyRoaster');
Route::post('attendance/add-duty-roaster', 'Attendance\DutyRoasterController@saveDutyRoaster');

// Duty Roaster Employeewise
Route::get('attendance/add-duty-roaster-emp-wise', 'Attendance\DutyRoasterController@viewAddDutyRoasterEmpWise');
Route::post('attendance/add-duty-roaster-emp-wise', 'Attendance\DutyRoasterController@saveDutyRoasterEmpWise');

// Holiday List
Route::get('holidays','Attendance\HolidayController@viewHolidayDetails');
Route::get('holiday/add-holiday','Attendance\HolidayController@viewAddHoliday');
Route::post('holiday/add-holiday','Attendance\HolidayController@saveHolidayData');
Route::get('holiday/add-holiday/{holiday_id}','Attendance\HolidayController@getHolidayDtl');
Route::get('holiday/holidaydelete/{holiday_id}','Attendance\HolidayController@deleteHoliday');

Route::get('holidaylist', function(){
	
	$holidayslist=DB::table('holiday')->get();
	return $holidayslist;
});



// Companywise Holiday
Route::get('attendance/view-companywise-holiday','Attendance\CompanyWiseHolidayController@viewCompanyWiseHoliday');
Route::post('attendance/view-companywise-holiday','Attendance\CompanyWiseHolidayController@holidaydata');

// Gradewise Holiday
Route::get('attendance/view-gradewise-holiday','Attendance\GradeWiseHolidayController@viewGradeWiseHoliday');
Route::post('attendance/view-gradewise-holiday','Attendance\GradeWiseHolidayController@holidaydata');


// Upload Data Management
Route::get('attendance/upload-data','Attendance\UploadAttendenceController@viewUploadAttendence');
Route::post('attendance/upload-data','Attendance\UploadAttendenceController@importExcel');


// DailY Attendance Sheet
Route::get('attendance/daily-attendance','Attendance\DailyAttendanceController@viewDailyAttendance');
Route::post('attendance/daily-attendance','Attendance\DailyAttendanceController@getDailyAttandance');
Route::post('attendance/add-daily-attendance','Attendance\DailyAttendanceController@updateDailyAttendance');

// Process Attendance
Route::get('attendance/process-attendance','Attendance\ProcessAttendanceController@viewProcessAttendance');
Route::post('attendance/process-attendance','Attendance\ProcessAttendanceController@getProcessAttandance');
Route::post('attendance/add-process-attendance','Attendance\ProcessAttendanceController@updateDailyProcessAttendance');
Route::post('attendance/save-Process-Attandance','Attendance\ProcessAttendanceController@saveProcessAttandance');

// Monthly Attendance
Route::get('attendance/monthly-attendance','Attendance\MonthlyAttendanceController@viewMonthlyAttendance');
Route::post('attendance/monthly-attendance','Attendance\MonthlyAttendanceController@getMonthlyAttandance');
Route::get('attendance/delete-monthly-attandance/','Attendance\MonthlyAttendanceController@deleteMonthlyAttandance');


// DailY Late Policy
Route::get('attendance/vw-late-policy','Attendance\LatePolicyController@getLatePolicy');
Route::get('attendance/late-policy','Attendance\LatePolicyController@viewLatePolicy');
Route::post('attendance/late-policy','Attendance\LatePolicyController@saveLatePolicy');

// Leave Balance

Route::get('leave-management/leave-balance','Attendance\LeaveBalanceController@getLeaveBalance');
Route::get('leave-management/leave-balance-view','Attendance\LeaveBalanceController@leaveBalanceView');
Route::post('leave-management/leave-balance-view','Attendance\LeaveBalanceController@leaveBalanceReport');

//////////////////////////////// End Of Attendance Module ///////////////////////////////////


//////////////////////////////// Leave Application Module //////////////////////////////////

Route::get('leave/dashboard','Leave\HomeController@viewDashboard');



// View Page with data

Route::get('leave/apply-for-tour/{tour_id}','Leave\TourApplyController@viewTourApplicationById');
Route::get('leave/leave-application','Leave\LeaveApplyController@viewleaveapplication');
Route::get('leave/tour-application','Leave\TourApplyController@viewtourapplication');
Route::get('leave/view-loan','Leave\LoanApplyController@viewLoanApplication');
Route::get('leave/salary-advance','Leave\SalaryAdvanceController@viewSalaryAdvance');
Route::get('leave/vw-loan-sanction','Leave\LoanSanctionController@viewLoanSanction');
Route::get('leave/vw-login-logout-status','Leave\LoginLogutController@viewLoginLogout');
Route::get('leave/holiday-calendar','Leave\HomeController@viewHolidayCalendar');
Route::post('leave/holiday-count','Leave\LeaveApplyController@holidayLeaveApplyAjax');

//Ltc
//Route::get('leave/ltc-application','Leave\LtcApplyController@viewltcapplication');
Route::get('leave/apply-for-ltc/{ltc_id}','Leave\LtcApplyController@viewLtcApplicationById');
Route::get('leave/apply-for-ltc','Leave\LtcApplyController@viewApplyltcapplication');
Route::post('leave/apply-for-ltc','Leave\LtcApplyController@saveApplyltcapplication');
Route::get('leave-approver/ltc-approved','LeaveApprover\HomeController@ViewLtcPermission');
Route::post('leave-approver/ltc-approved','LeaveApprover\HomeController@SaveLtcPermission');

//View ADD Page
Route::get('leave/apply-leave','Leave\LeaveApplyController@viewapplyleaveapplication');
Route::get('leave/apply-for-tour','Leave\TourApplyController@viewApplytourapplication');
Route::get('leave/tourlisting','Leave\TourApplyController@tourapplicationListing');
Route::get('leave/tourdtl/{tour_id}', 'Leave\TourApplyController@getTourdtlById');
Route::get('leave/apply-loan','Leave\LoanApplyController@viewApplyLoanapplication');
Route::get('leave/apply-salary-advance','Leave\SalaryAdvanceController@viewAddSalaryAdvance');
Route::get('leave/loan-sanction','Leave\LoanSanctionController@viewFormLoanSanction');
Route::post('leave/login-logout-status','Leave\LoginLogutController@searchLoginLogout');

//save data of ADD page
Route::post('leave/apply-leave','Leave\LeaveApplyController@saveApplyLeaveData');
Route::post('leave/apply-for-tour','Leave\TourApplyController@saveApplytourapplication');
Route::post('leave/apply-loan','Leave\LoanApplyController@saveApplyLoanapplication');
Route::post('leave/apply-salary-advance','Leave\SalaryAdvanceController@saveSalaryAdvanceData');
Route::post('leave/loan-sanction','Leave\LoanSanctionController@saveLoanSanction');
Route::post('leave/loan-sanction-config', 'Leave\LoanSanctionController@saveLoanSanctionConfig');



////////////////////// End of Leave Application Module ///////////////////////////////

/////////////// Start of Leave Approver Module //////////////////////////////////
Route::get('leave-approver/dashboard','LeaveApprover\HomeController@viewDashboard');
Route::get('leave-approver/leave-approved','LeaveApprover\HomeController@viewLeaveApproved');
Route::post('leave-approver/leave-approved','LeaveApprover\HomeController@SaveLeaveApproved');
Route::get('leave-approver/leave-approved-right','LeaveApprover\HomeController@ViewLeavePermission');
Route::post('leave-approver/leave-approved-right','LeaveApprover\HomeController@SaveLeavePermission');
Route::get('leave-approver/tour-approved-right','LeaveApprover\HomeController@ViewTourPermission');
Route::post('leave-approver/tour-approved-right','LeaveApprover\HomeController@SaveTourPermission');
Route::get('leave-approver/loan-approved-right','LeaveApprover\HomeController@ViewLoanPermission');
Route::post('leave-approver/loan-approved-right','LeaveApprover\HomeController@SaveLoanPermission');
//////////////////////////////// End of Leave Approver Module ///////////////////////////////////

//////////////////////////////// Start of GPF Loan Apply Module ///////////////////////////////////
Route::get('loan/gpf-loan-apply','Leave\GpfLoanApplyController@viewLoanApply');
Route::post('loan/gpf-loan-apply','Leave\GpfLoanApplyController@saveLoanApply');



//////////////////////////////// End of GPF Loan Apply Module ///////////////////////////////////


/////////////////////////////// HR Module /////////////////////////////////////////////////////


// VIew page with Data

Route::get('hr/vw-job', 'hr\JobController@getJobs');
Route::get('hr/vw-job-description', 'hr\JobDescriptionController@getJobDescription');
Route::get('hr/vw-job-requisition', 'hr\JobRequisitionController@getJobRequisition');
Route::get('hr/vw-job-application', 'hr\JobApplicationController@getJobApplication');
Route::get('hr/remarks-history/{id?}', 'hr\JobApplicationController@historyJobApplication');
Route::get('hr/tagg-interviewer', 'hr\TagInterviewerController@viewTagInterviewer');
Route::get('hr/view_interviewer_remarks', 'hr\HRViewInterviewerRemarksController@viewInterviewerRemarks');

// Add HR Function Here

Route::get('hr/add-new-job', 'hr\JobController@viewAddJob');
Route::get('hr/add-new-job-description', 'hr\JobDescriptionController@viewAddJobDescription');
Route::get('hr/add-new-job-requisition', 'hr\JobRequisitionController@viewAddRequisition');
Route::get('hr/add-new-job-application', 'hr\JobApplicationController@viewAddJobApplication');
Route::get('hr/update-job-application/{id?}', 'hr\JobApplicationController@viewEditJobApplication');
Route::get('hr/assign-interviewer', 'hr\TagInterviewerController@viewAddAssignInterviewer');

// Save Data Here

Route::post('hr/add-new-job', 'hr\JobController@saveAddJob');
Route::post('hr/add-new-job-description', 'hr\JobDescriptionController@saveAddJobDescription');
Route::post('hr/add-new-job-requisition', 'hr\JobRequisitionController@saveAddJobRequisition');
Route::post('hr/add-new-job-application', 'hr\JobApplicationController@saveAddJobApplication');
Route::post('hr/update-job-application', 'hr\JobApplicationController@editJobApplication');
Route::post('hr/assign-interviewer', 'hr\TagInterviewerController@saveAddAssignInterviewer');





////////////////////////////////// End Of HR Module //////////////////////////////////


/////////////////////////////////// Interview Module ////////////////////////////////////////


/*Route::get('interview/dashboard', function(){
	return View('interview/dashboard');
});*/

// VIew page with Data

Route::get('interview/interviewer-remarks', 'Interviewer\InterviewerRemarksController@getInterviewerRemarks');
Route::get('interview/remarks-history/{id}', 'Interviewer\InterviewerRemarksController@getRemarksHistory');

// Add Pages

Route::get('interview/update-remarks/{id?}', 'Interviewer\InterviewerRemarksController@viewEditInterviewerRemarks');

// Save data

Route::post('interview/update-remarks', 'Interviewer\InterviewerRemarksController@editInterviewerRemarks');


////////////////////////////////////// End of Interview Module /////////////////////////////////////
/////////////////////////////////////// SMS Fees Management ////////////////////////////////////////


//Fees Head
Route::get('sms/fees-management/view-fees-head','SMS\FeesManagement\FeesHeadController@getFeesHead');
Route::get('sms/fees-management/fees-head','SMS\FeesManagement\FeesHeadController@formFeesHead');
Route::post('sms/fees-management/fees-head','SMS\FeesManagement\FeesHeadController@saveFeesHead');

//Fees Head Config
Route::get('sms/fees-management/view-fees-head-config','SMS\FeesManagement\FeesHeadConfigController@getFeesHeadConfig');

Route::get('sms/fees-management/fees-head-config','SMS\FeesManagement\FeesHeadConfigController@formFeesHeadConfig');
Route::post('sms/fees-management/fees-head-config','SMS\FeesManagement\FeesHeadConfigController@saveFeesHeadConfig');

Route::get('sms/fees-management/fees-head-university-config','SMS\FeesManagement\FeesHeadConfigController@formFeesHeadUniversityConfig');
Route::post('sms/fees-management/fees-head-university-config','SMS\FeesManagement\FeesHeadConfigController@saveFeesHeadUniversityConfig');
Route::get('sms/fees-management/fees-head-school-config','SMS\FeesManagement\FeesHeadConfigController@formFeesHeadSchoolConfig');
Route::post('sms/fees-management/fees-head-school-config','SMS\FeesManagement\FeesHeadConfigController@saveFeesHeadSchoolConfig');

//Payment Config
Route::get('sms/fees-management/view-payment-config','SMS\FeesManagement\PaymentConfigController@getPaymentConfig');

Route::get('sms/fees-management/payment-config','SMS\FeesManagement\PaymentConfigController@formPaymentConfig');
Route::post('sms/fees-management/payment-config','SMS\FeesManagement\PaymentConfigController@savePaymentConfig');

Route::get('sms/fees-management/payment-university-config','SMS\FeesManagement\PaymentConfigController@formPaymentUniversityConfig');
Route::post('sms/fees-management/payment-university-config','SMS\FeesManagement\PaymentConfigController@savePaymentUniversityConfig');
Route::get('sms/fees-management/payment-school-config','SMS\FeesManagement\PaymentConfigController@formPaymentSchoolConfig');
Route::post('sms/fees-management/payment-school-config','SMS\FeesManagement\PaymentConfigController@savePaymentSchoolConfig');


////////////////////////////////////// End SMS Fees Management /////////////////////////////////////

/////////////////////////// MIS Module /////////////////////
Route::get('mis/dashboard', function(){
    return View('mis-reports/dashboard');
});

/////////////////////////// Account Payable Module /////////////////////

Route::get('accountpayable/list','Accountpayable\AccountpayableController@listing');
Route::get('accoutpayable/view','Accountpayable\AccountpayableController@viewPayment');
Route::post('accoutpayable/save','Accountpayable\AccountpayableController@savePaymentbooking');
Route::post('accoutpayable/edit','Accountpayable\AccountpayableController@updateStatus');
Route::get('accoutpayable/view/{voucher_id}','Accountpayable\AccountpayableController@getPaymentbookingById');



Route::get('accountpayable/assetslist/{selectedaccount_grp}', function($selectedaccount_grp){
    $assetslist=DB::table('coa_master')->where('account_name','=',trim($selectedaccount_grp))->get();
    return $assetslist;
});

Route::get('accountpayable/subaccount_dtl/{selectedsub_account_head}', function($selectedsub_account_head){
    $sub_account_dtl=DB::table('coa_master')
    ->where('id','=',$selectedsub_account_head)
    ->first();
    echo json_encode($sub_account_dtl);
});

Route::get('company/get-company-bank-pay/{bank_name}', function($bank_name){

    $company_branch_list=DB::table('company_bank')->where('bank_name','=',$bank_name)->get();
    echo json_encode($company_branch_list);

});
Route::get('accountpayable/get-lastvoucherno', function(){

    $lastinsertid=DB::table('voucher_entry')->orderby('id','desc')->first();

    if(!empty($lastinsertid))
    {
        
        echo (($lastinsertid->id)+1).'-'.date('Y').'-'.(date('Y')+1);

    }else{
        echo '1-'.date('Y').'-'.(date('Y')+1);
    }
});
Route::get('purchase/purchase_order_dtl/{purchase_order_no}', function($purchase_order_no){
    $purchase_order_dtl=DB::table('purchase_item')->where('purchase_order_no','=',trim($purchase_order_no))->first();

    $purchase_payment_dtl=DB::table('grn_item') ->select(DB::raw('SUM(price) AS offer_price'))->where('purchase_order_no','=',trim($purchase_order_no))->first();
    $item=DB::table('item')->where('item_code','=',$purchase_order_dtl->item_code)->first();
    $item_details=DB::table('sub_categories')->where('sub_cat_code','=',$item->sc_id)->first();
    $item_details1=DB::table('category')->where('cat_code','=',$item->c_id)->first();
    $supplier_dtl=DB::table('supplier')->where('id','=',$purchase_order_dtl->supplier_name)->first();

    //$result=array('purchase_order_dtl'=>$purchase_order_dtl,'supplier_dtl'=>$supplier_dtl);
    echo json_encode(array('purchase_order_dtl'=>$purchase_order_dtl,'supplier_dtl'=>$supplier_dtl,'coa_code'=>$item_details->coa_code,'cat_name'=>$item_details1->cat_name,'offer_price'=>($purchase_order_dtl->offer_price*$purchase_order_dtl->qty)));

});




Route::get('accountreceivable/bank_details/{selectedsub_account_head_bank}', function($selectedsub_account_head_bank){
    $bank_details=DB::table('coa_master')
    ->where('id','=',$selectedsub_account_head_bank)
    ->where('coa_code', 'LIKE', '%S%')
    ->first();

   if(empty($bank_details) ){
    $banklistmaster = DB::table('company_bank')
    ->leftJoin('bank_masters', 'company_bank.bank_name', '=', 'bank_masters.master_bank_name')
    ->groupBy('company_bank.bank_name')
    ->get();
    echo json_encode($banklistmaster);
   }else{
    $banklistmaster = DB::table('stipend_bank')
    ->leftJoin('bank_masters', 'stipend_bank.bank_name', '=', 'bank_masters.id')
    ->groupBy('stipend_bank.bank_name')
    ->get();
    echo json_encode($banklistmaster);
   }
});



Route::get('nonapprove/list','Accountpayable\ApproveController@listing');
Route::get('nonapprove/view/{voucher_id}','Accountpayable\ApproveController@getNonapproveVoucherById');
Route::get('approve/list','Accountpayable\ApproveController@BillReleaselisting');
Route::get('approve/view/{voucher_id}','Accountpayable\ApproveController@getApproveVoucherById');
Route::post('approve/edit','Accountpayable\ApproveController@updateBillStatus');
Route::get('billpay/list','Accountpayable\ApproveController@billPaylisting');

Route::get('payment/view','Accountpayable\ApproveController@paymentView');
Route::post('payment/view','Accountpayable\ApproveController@addPayment');
Route::get('payment/view/{voucher_id}','Accountpayable\ApproveController@getPaymentById');
Route::get('payment/report/{voucher_no}','Accountpayable\ApproveController@paymentDtl');

Route::get('contra/list','Accountpayable\AccountpayableController@contraListing');
Route::get('contra/view','Accountpayable\AccountpayableController@addContra');
Route::post('contra/save','Accountpayable\AccountpayableController@saveContra');


Route::get('bank-reconcillation','Accountpayable\AccountpayableController@bankReconcillationView');
Route::post('bank-reconcillation','Accountpayable\AccountpayableController@bankReconcillationData');
Route::post('bank-reconcillation/updatedata','Accountpayable\AccountpayableController@bankReconcillationSave');



Route::get('accountpayable/balance','Accountpayable\AccountpayableController@balancePaylisting');
Route::post('accoutpayable/balsave', 'Accountpayable\AccountpayableController@SavePayrollAll');
Route::post('accoutpayable/save-payroll-all', 'Accountpayable\AccountpayableController@listPayrollAll');

Route::get('company/get-company-bank/{bank_name}/{selectedsub_account_head_bank}', function($bank_name,$selectedsub_account_head_bank){
    $bank_details=DB::table('coa_master')
    ->where('head_name','=',$selectedsub_account_head_bank)
    ->where('coa_code', 'LIKE', '%S%')
    ->first();
    if( empty($bank_details) ){
    $company_branch_list=DB::table('company_bank')->where('bank_name','=',$bank_name)->get();
    echo json_encode($company_branch_list);
    }else{


        $company_branch_list=DB::table('bank_masters')->join('stipend_bank', 'stipend_bank.bank_name', '=', 'bank_masters.id')
        ->where('bank_masters.master_bank_name', $bank_name)
        ->get();
        echo json_encode($company_branch_list);
    }
});

Route::get('bankbook/report','Accountpayable\AccountpayablereportController@bankbookView');
Route::post('bankbook/report','Accountpayable\AccountpayablereportController@showBankbookReport');



Route::get('trial-balance-report','Accountpayable\AccountpayablereportController@trialView');
Route::post('trial-balance-report','Accountpayable\AccountpayablereportController@showtrialReport');














Route::get('billregister/report','Accountpayable\AccountpayablereportController@billregisterView');
Route::post('billregister/report','Accountpayable\AccountpayablereportController@showBillRegisterReport');

Route::get('glhead/report','Accountpayable\AccountpayablereportController@glHeadView');
Route::get('glhead/report/{gl_head_type}','Accountpayable\AccountpayablereportController@getGlHeadView');
Route::post('glhead/report','Accountpayable\AccountpayablereportController@showGlHeadReport');

Route::get('liabilities-report','Accountpayable\AccountpayablereportController@libalitiesView');
Route::post('liabilities-report','Accountpayable\AccountpayablereportController@showLibalitiesReport');

Route::get('party-ledger-report','Accountpayable\AccountpayablereportController@getPartyLedgerReport');
Route::post('party-ledger-report','Accountpayable\AccountpayablereportController@showPartyLedgerReport');

Route::get('income-expenditure-report','Accountpayable\AccountpayablereportController@incomeExpenditureView');
Route::post('income-expenditure-report','Accountpayable\AccountpayablereportController@incomeExpenditureReport');

Route::get('sundry-debtors-report','Accountpayable\AccountpayablereportController@getSundryDebtorsReport');
Route::post('sundry-debtors-report','Accountpayable\AccountpayablereportController@viewSundryDebtorsReport');

Route::get('bank-reconcillation','Accountpayable\AccountpayableController@bankReconcillationView');
Route::post('bank-reconcillation','Accountpayable\AccountpayableController@bankReconcillationReport');

Route::get('receipt-voucher-report','Accountpayable\AccountpayablereportController@getReceiptVoucherReport');
Route::post('receipt-voucher-report','Accountpayable\AccountpayablereportController@viewReceiptVoucherReport');

Route::get('payment-voucher-report','Accountpayable\AccountpayablereportController@getPaymentVoucherReport');
Route::post('payment-voucher-report','Accountpayable\AccountpayablereportController@viewPaymentVoucherReport');

Route::get('income-schedules','Accountpayable\AccountpayablereportController@viewIncomeSchedules');

Route::get('bs-schedules','Accountpayable\AccountpayablereportController@viewBalanceSchedules');
Route::post('bs_schedule-code','Accountpayable\AccountpayablereportController@viewBalanceScheduleReport');



Route::get('establishment-receipt-payment','Accountpayable\AccountpayablereportController@establishmentReceiptPayment');
Route::post('establishment-receipt-payment','Accountpayable\AccountpayablereportController@establishmentReceiptPaymentReport');



Route::post('schedule-code','Accountpayable\AccountpayablereportController@viewIncomeScheduleReport');

Route::get('schedule-09','Accountpayable\AccountpayablereportController@viewSchedule09Report');

Route::get('contra-voucher-report','Accountpayable\AccountpayablereportController@getContraVoucherReport');
Route::post('contra-voucher-report','Accountpayable\AccountpayablereportController@viewContraVoucherReport');

Route::get('cash-book-report','Accountpayable\AccountpayablereportController@getCashbookReport');
Route::post('cash-book-report','Accountpayable\AccountpayablereportController@viewCashbookReport');

Route::get('petty-book-report','Accountpayable\AccountpayablereportController@getPettyCashReport');
Route::post('petty-book-report','Accountpayable\AccountpayablereportController@viewPettyCashReport');

Route::get('sumary-report-income','Accountpayable\AccountpayablereportController@getIncomeSummaryReport');
Route::post('sumary-report-income','Accountpayable\AccountpayablereportController@viewIncomeSummaryReport');

Route::get('balance-sheet-report','Accountpayable\AccountpayablereportController@balanceSheetView');
Route::post('balance-sheet-report','Accountpayable\AccountpayablereportController@balanceSheetReport');


Route::get('month-wise-gpf-summary-report','Accountpayable\GpfReportController@viewMonthwiseGpfSummary');
Route::post('month-wise-gpf-summary-report','Accountpayable\GpfReportController@monthwiseGpfSummaryReport');

Route::get('yearend-gpf-summary-report','Accountpayable\GpfReportController@viewYearendGpfSummary');
Route::post('yearend-gpf-summary-report','Accountpayable\GpfReportController@yearendGpfSummaryReport');

Route::get('employeewise-gpf-summary-report','Accountpayable\GpfReportController@viewEmployeewiseGpfSummary');
Route::post('employeewise-gpf-summary-report','Accountpayable\GpfReportController@employeewiseGpfSummaryReport');

Route::get('provident-fund-report','Accountpayable\GpfReportController@viewProvidentGpfSummary');
Route::post('provident-fund-report','Accountpayable\GpfReportController@providentGpfSummaryReport');

Route::get('provident-fund-income-expenditure-report','Accountpayable\GpfReportController@viewIncomeExpenditureProvidentSummary');
Route::post('provident-fund-income-expenditure-report','Accountpayable\GpfReportController@providentIncomeExpenditureReport');


Route::get('establishment-account-report','Accountpayable\GpfReportController@viewEstablistmentAccount');
Route::post('establishment-account-report','Accountpayable\GpfReportController@establistmentAccountReport');

Route::get('consoliated-balancesheet','Accountpayable\AccountpayablereportController@consoliatedBalancesheetView');
Route::post('consoliated-balancesheet','Accountpayable\AccountpayablereportController@consoliatedBalancesheetReport');

Route::get('receipt-payment-report','Accountpayable\AccountpayablereportController@receiptPaymentView');
Route::post('receipt-payment-report','Accountpayable\AccountpayablereportController@receiptPaymentReport');




/////////////////////////// Account Receivable Module /////////////////////////
Route::get('accountreceivable/list','Accountreceivable\AccountReceivableController@listing');
Route::get('accountreceivable/view','Accountreceivable\AccountReceivableController@viewPayment');
Route::post('accountreceivable/save','Accountreceivable\AccountReceivableController@savePaymentbooking');
Route::get('billreceivable/list','Accountreceivable\BillReceivableController@billPaylisting');

Route::get('receiveable/view','Accountreceivable\BillReceivableController@paymentView');
Route::post('receiveable/view','Accountreceivable\BillReceivableController@addPayment');
Route::get('receiveable/view/{voucher_id}','Accountreceivable\BillReceivableController@getPaymentbookingById');

 Route::get('billrecieve/list','Accountreceivable\AccountReceivableController@billPaylisting');

Route::get('receiveable/payment','Accountreceivable\AccountReceivableController@paymentViewrecieve');
Route::post('receiveable/payment','Accountreceivable\AccountReceivableController@addPayment');
Route::get('receiveable/payment/{voucher_id}','Accountreceivable\AccountReceivableController@getPaymentbookingById');
Route::get('accountreceivable/balance','Accountreceivable\AccountReceivableController@balancePaylisting');
Route::post('accountreceivable/balsave', 'Accountreceivable\AccountReceivableController@SavePayrollAll');
Route::post('accountreceivable/save-payroll-all', 'Accountreceivable\AccountReceivableController@listPayrollAll');


Route::get('accountreceivable/get-lastvoucherno', function(){

    $lastinsertid=DB::table('received_voucher_entry')->orderby('id','desc')->first();

    if(!empty($lastinsertid))
    {
        echo date('d-m-Y').'-'.($lastinsertid->id+1).'R';
    }else{
        echo date('d-m-Y').'-1R';
    }
});



Route::get('accountreceivable/get-add-row-item/{row}', function($row){

    $row=$row+1;
       $accountheadw=DB::table('account_master')

       ->where('account_code','not like','%S%')
       ->orderBy('account_name', 'asc')
       ->get();

    $result_status="<option value='' selected disabled>Select</option>";

    foreach($accountheadw as $unit)
    {
        $result_status.='<option value="'.$unit->id.'">'.$unit->account_name.'</option>';
    }

    $item_rs =DB::table('account_master')

    ->where('account_code','not like','%S%')
    ->orderBy('account_name', 'asc')
    ->get();


    $result_status1="<option value='' selected disabled>Select</option>";
    foreach($item_rs as $item)
    {
        $result_status1.='<option value="'.$item->account_code.'">'.$item->account_name.'</option>';
    }

    $tdslist=DB::table('tds_master')->get();
    $result_status3="<option value='' selected disabled>Select</option>";
    foreach($tdslist as $item)
    {
        $result_status3.='<option value="'.$item->id.'" data-rate="'.$item->tds_percentage.'">'.$item->tds_section.'('.$item->tds_percentage.')</option>';
    }


    $result='<div  class="bordr itemslot"  id='.$row.'>
    <div class="row form-group">
    <div class="col-md-3">
    <label class="form-control-label">Account Head<span>(*)</span></label>


                     <select class="form-control" name="account_head_id[]"  id="account_head_id'.$row.'" onchange="getSubhead('.$row.');">

                        '.$result_status1.'
                      </select>
                      </div>



                      <div class="col-md-3">
                      <label class="form-control-label">Sub Account <span>(*)</span></label>


                      <select class="form-control" name="sub_account_id'.$row.'"  id="sub_account_id'.$row.'" onchange="getSubaccountDtl('.$row.');">


                    </select>
                      </div>


                      <div class="col-md-3">
                      <label class=" form-control-label">Transaction Code <span>(*)</span></label>

                      <input type="text" class="form-control"   id="transaction_code'.$row.'" name="transaction_code'.$row.'" readonly >

                      </div>
                      <div class="col-md-3">
                      <label class="form-control-label">Type<span>(*)</span></label>
                      <select name="account_tool'.$row.'" id="account_tool'.$row.'" class="form-control"
                    required>

                      <option value="credit">Credit</option>
                      <option value="debit">Debit</option>



                  </select>

                      </div>

                    </div>




                    <div class="row form-group">


            <div class="col-md-3">
            <label class="form-control-label">Received Amount<span>(*)</span></label>
            <input type="text" name="bill_amt'.$row.'" class="form-control" value="0" id="bill_amt'.$row.'"  >

        </div>
        <div class="col-md-3">
        <label class="form-control-label">GST Amount</label>
        <input type="text" name="bill_gst_amt'.$row.'" id="bill_gst_amt'.$row.'" class="form-control" value="0" onblur="calculateFinalBill('.$row.');">

    </div>



    <div class="col-md-3">
    <label class="form-control-label">Total Amount<span>(*)</span></label>
    <input type="text" name="payable_amt'.$row.'" class="form-control" value="0" readonly id="payable_amt'.$row.'" required />

</div>

                    </div>



                    <div class="row form-group">







                <div class="col-md-6">
                <label class="form-control-label">Narration</label>
                <textarea rows="5" name="entry_remark'.$row.'" class="form-control" id="entry_remark'.$row.'"></textarea>

            </div>
                </div>
                    <div class="row form-group">


                      <div class="col-md-2 btn-up" style="padding-right:0;">
                        <button type="button" style="" class="btn btn-danger btn-add" id="add'.$row.'" onClick="addnewrow('.$row.')" data-id="'.$row.'"><i class="fa fa-plus" aria-hidden="true"></i>Add More</button>
                      </div>
                      <div class="col-md-2 btn-up" style="padding-left:0;">
                        <button type="button" class="btn btn-danger deleteButton" id="del'.$row.'" style="background: #d00404; border-color: #d00404; " onClick="delRow('.$row.')"> <i class="fa fa-trash-o" aria-hidden="true"></i> Remove</button>
                      </div>

                      </div>

                      </div>

                      </div>';
    echo $result;
});


/*Route::get('accountreceivable/get-lastvoucherno/{selectedsub_account_id}', function($selectedsub_account_id){

    $check_stipend_account=DB::table('coa_master')
    ->where('id','=',$selectedsub_account_id)
    ->first();
    $acctran_code= $check_stipend_account->coa_code;
    $acctrans_code= strstr( $acctran_code, 'S' );

    $lastinsertid=DB::table('received_voucher_entry')->orderby('id','desc')->first();

    if(empty($acctrans_code)){

        if(!empty($lastinsertid))
        {
            echo date('d-m-Y').'-'.($lastinsertid->id+1).'R';
        }else{
            echo date('d-m-Y').'-1R';
        }

    }else{

        if(!empty($lastinsertid))
        {
            echo date('d-m-Y').'-'.($lastinsertid->id+1).'S';
        }else{
            echo date('d-m-Y').'-1S';
        }
    }
});*/


/////////////////////////// Account Stipend Module /////////////////////////
Route::get('stipend/upload','Stipend\StipendController@viewUploadStipend');
Route::post('stipend/upload','Stipend\StipendController@importExcel');
Route::get('stipend/list','Stipend\StipendController@viewStipendData');

Route::get('stipend/listreceived','Stipend\StipendController@listing');
Route::get('stipend/view','Stipend\StipendController@viewPayment');
Route::post('stipend/save','Stipend\StipendController@savePaymentbooking');


Route::get('balance-sheet','Stipend\StipendReportController@viewBalanceSheetReport');
Route::post('balance-sheet','Stipend\StipendReportController@balanceSheetReport');

Route::get('schedule-1s','Stipend\StipendReportController@viewSchedule1s');
Route::post('schedule-1s','Stipend\StipendReportController@Schedule1s');
Route::get('stipend/get-company-bank-pay/{bank_name}', function($bank_name){



    $check_bank_balance = DB::table('bank_masters')

    ->where('master_bank_name', $bank_name)
    ->orderBy('id', 'desc')
    ->first();

    $company_branch_list=DB::table('stipend_bank')->where('bank_name','=',$check_bank_balance->id)->get();
    echo json_encode($company_branch_list);

});
Route::get('stipend/get-lastvoucherno', function(){

    $lastinsertid=DB::table('received_voucher_entry')->where('voucher_no','like','%S%')->orderby('id','desc')->first();

    if(!empty($lastinsertid))
    {
        echo date('d-m-Y').'-'.($lastinsertid->id+1).'S';
    }else{
        echo date('d-m-Y').'-1S';
    }
});


Route::get('schedule-2s','Stipend\StipendReportController@viewSchedule2s');
Route::post('schedule-2s','Stipend\StipendReportController@Schedule2s');

Route::get('schedule-3s','Stipend\StipendReportController@viewSchedule3s');
Route::post('schedule-3s','Stipend\StipendReportController@Schedule3s');


Route::get('schedule-4s','Stipend\StipendReportController@viewSchedule4s');
Route::post('schedule-4s','Stipend\StipendReportController@Schedule4s');

Route::get('schedule-5s','Stipend\StipendReportController@viewSchedule5s');
Route::post('schedule-5s','Stipend\StipendReportController@Schedule5s');

Route::get('schedule-7s','Stipend\StipendReportController@viewSchedule7s');
Route::post('schedule-7s','Stipend\StipendReportController@Schedule7s');

Route::get('income-expenditure','Stipend\StipendReportController@viewIncomeExpenditureReport');
Route::post('income-expenditure','Stipend\StipendReportController@IncomeExpenditureReport');

Route::get('schedule-6s','Stipend\StipendReportController@viewSchedule6s');
Route::post('schedule-6s','Stipend\StipendReportController@Schedule6s');

Route::get('schedule-8s','Stipend\StipendReportController@viewSchedule8s');
Route::post('schedule-8s','Stipend\StipendReportController@Schedule8s');

Route::get('schedule-9s','Stipend\StipendReportController@viewSchedule9s');
Route::post('schedule-9s','Stipend\StipendReportController@Schedule9s');
Route::get('receipt-payment','Stipend\StipendReportController@viewSchedulereceipt');
Route::post('receipt-payment','Stipend\StipendReportController@Schedulereceipt');

/////////////////////////// Depreciation Module /////////////////////////
Route::get('depreciation/show-table','Depreciation\DepreciationController@viewDepreciationData');
Route::post('depreciation/show-table-data','Depreciation\DepreciationController@populateDepreciationData');
Route::post('depreciation/save-data','Depreciation\DepreciationController@saveDepreciationData');

Route::get('depreciation/report','Depreciation\DepreciationController@depreciationReportView');
Route::post('depreciation/report','Depreciation\DepreciationController@depreciationReport');


/////////////////////////////// GPF Module //////////////////////////////////
Route::get('gpf/approvedlisting','Gpf\GpfController@viewApproveListing');
Route::get('gpf/apply/{loan_id}','Gpf\GpfController@applyGpf');
Route::post('gpf/apply','Gpf\GpfController@saveApplyGpf');

Route::get('gpf/termdepositlisting','Gpf\GpfController@termDepositListing');
Route::get('gpf/termdeposit','Gpf\GpfController@viewTermDeposit');
Route::post('gpf/termdeposit','Gpf\GpfController@saveTermDeposit');
Route::get('gpf/termdeposit/{term_id}','Gpf\GpfController@applyterm');
Route::post('gpf/termdepositupdate','Gpf\GpfController@upadteTermDeposit');

Route::get('gpf/paymententrylisting','Gpf\GpfController@viewPaymentListing');
Route::get('gpf/payment','Gpf\GpfController@viewGpfPaymentView');
Route::post('gpf/payment','Gpf\GpfController@addGpfPaymentView');

Route::get('gpf/list','Gpf\GpfController@listinggpf');
Route::get('gpf/view','Gpf\GpfController@viewgpf');
Route::post('gpf/save','Gpf\GpfController@savegpfbooking');



Route::get('gpf/paylist','Gpf\GpfController@listingpay');
Route::get('gpf/payview','Gpf\GpfController@viewpay');
Route::post('gpf/paysave','Gpf\GpfController@savepaybooking');
Route::get('gpf/get-lastvoucherno/{selectedsub_account_id}', function($selectedsub_account_id){



    $lastinsertid=DB::table('received_voucher_entry_gpf')->orderby('id','desc')->first();



        if(!empty($lastinsertid))
        {
            echo date('d-m-Y').'-'.($lastinsertid->id+1).'GPF';
        }else{
            echo date('d-m-Y').'-1GPF';
        }


});


Route::get('gpf/assetslist/{selectedaccount_grp}', function($selectedaccount_grp){
    $assetslist=DB::table('gpf_account_head')->where('account_head','=',trim($selectedaccount_grp))->get();
    return $assetslist;
});
Route::get('gpf/subaccount_dtl/{selectedsub_account_head}', function($selectedsub_account_head){
    $sub_account_dtl=DB::table('gpf_account_head')
    ->where('id','=',$selectedsub_account_head)
    ->first();
    echo json_encode($sub_account_dtl);
});


Route::get('gpf/bank_details/{selectedsub_account_head_bank}', function($selectedsub_account_head_bank){
    $bank_details=DB::table('gpf_account_head')
    ->where('id','=',$selectedsub_account_head_bank)

    ->first();

    $banklistmaster = DB::table('gpf_bank')
    ->leftJoin('bank_masters', 'gpf_bank.bank_name', '=', 'bank_masters.master_bank_name')
    ->groupBy('gpf_bank.bank_name')
    ->get();
    echo json_encode($banklistmaster);



});

Route::get('gpf/get-company-bank/{bank_name}', function($bank_name){


    $company_branch_list=DB::table('gpf_bank')->where('bank_name','=',$bank_name)->get();
    echo json_encode($company_branch_list);

});


Route::get('gpf/get-lastvoucherpqyno/{selectedsub_account_id}', function($selectedsub_account_id){



    $lastinsertid=DB::table('voucher_entry_gpf')->orderby('id','desc')->first();



        if(!empty($lastinsertid))
        {
            echo date('d-m-Y').'-'.($lastinsertid->id+1).'GPFP';
        }else{
            echo date('d-m-Y').'-1GPFP';
        }


});
/////////////////////////// Account Payroll Payment Module /////////////////////////


Route::get('payroll/accounting','Accountpayable\PayrollaccountingController@viewPayrollAccounting');

Route::get('payroll/accounting/get-add-row/{row}', function($row){

    $row=$row+1;
    $account_head_rs = DB::table('account_master')->where('account_code', 'LIKE', '%15%')->orderBy('account_name', 'asc')->get();

    $result_status="<option value=''>Select</option>";

    foreach($account_head_rs as $headkey=>$headval)
    {
        
        $result_status.='<option value="'.$headval->account_code.'">'.$headval->account_name.'</option>';
    }



    $banklist_rs = DB::table('company_bank')
            ->leftJoin('bank_masters', 'company_bank.bank_name', '=', 'bank_masters.master_bank_name')
            ->groupBy('company_bank.bank_name')
            ->get();

    //dd($component_rs);
    $result_status1="<option value='' selected disabled>Select</option>";
    foreach($banklist_rs as $bank)
    {
        $result_status1.='<option value="'.$bank->master_bank_name.'">'.$bank->master_bank_name.'</option>';
    }


    $result='<div class="row form-group itemslot lv-due-body'.$row.'">

                    <div class="col-md-3">
                        <label class=" form-control-label">Account Head</span></label>
                        <select class="form-control" name="account_head_id[]" id="account_head_id'.$row.'" onchange="getSubhead('.$row.');">'.$result_status.'
                                                          
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <label class="form-control-label">Sub Head</span></label>        
                        <select class="form-control" name="sub_account_id[]" id="sub_account_id'.$row.'" onchange="getSubaccountDtl('.$row.');">
                            <option>Select</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Transction Code</label>
                        <input type="text" name="transaction_code[]" class="form-control" id="transaction_code'.$row.'" readonly>
                                            
                    </div>  
                    <div class="col-md-3">
                        <label>Type</label>
                        <input type="text" name="account_tool[]" class="form-control" id="account_tool'.$row.'" readonly>
                    </div>                                  
                    <div class="col-md-3">
                        <label>Bank Name</label>
                        <select class="form-control" name="payment_bank_id[]" id="payment_bank_id'.$row.'" onchange="populateBranch('.$row.');">'.$result_status1.'
                                                          
                        </select>   
                    </div> 
                    <div class="col-md-3">
                        <label>Branch <span>(*)</span></label>
                        <select class="form-control" name="bank_branch_id[]" id="bank_branch_id'.$row.'" required>
                            
                        </select>   
                    </div>

                    <div class="col-md-3">
                        <label>Amount</label>
                        <input type="text" class="form-control" name="payable_amount[]" id="payable_amount'.$row.'" readonly>
                    </div>

                    <div class="col-md-3 btn-up">
                        <button type="button" class="btn btn-danger btn-add" id="add'.$row.'" onClick="addnewrow('.$row.')" data-id="'.$row.'"><i class="fa fa-plus" aria-hidden="true"></i>Add More</button>

                        <button type="button" class="btn btn-danger deleteButton" id="del'.$row.'" style="background: #d00404; border-color: #d00404;" onClick="delRow('.$row.')"> <i class="fa fa-remove" aria-hidden="true">Remove</i></button>
                    </div>
                </div>        
        </div>';
    echo $result;
});


Route::get('monthly/payroll/{month_year}', function($month_year){

    $monthyear = base64_decode($month_year);

    $monthly_salary_rs=DB::Table('payroll_details')
                ->where('month_yr','=',$monthyear)
                ->select('*')
                ->get();         
    echo json_encode($monthly_salary_rs);
});

Route::post('payroll/accounting','Accountpayable\PayrollaccountingController@savePayrollAccounting');

Route::get('payroll/accounting/payment','Accountpayable\PayrollaccountingController@viewPayrollpayment');

Route::get('payroll/accoutpayable/{voucher_id}', function($voucher_id){

   $payment_details= DB::table('payroll_payment_booking')
                ->where('voucher_no', $voucher_id)
                ->first();      
    echo json_encode($payment_details);
});

Route::post('payroll/payment','Accountpayable\PayrollaccountingController@payrollAccountingPayment');





//////////////////////////////////// SMS Admission management ///////////////////////////////////

Route::get('sms/admission/batch','SMS\Admission\BatchController@getBatch');
Route::get('sms/admission/add-new-batch','SMS\Admission\BatchController@viewAddNewBatch');
Route::post('sms/admission/add-new-batch','SMS\Admission\BatchController@saveAddNewBatch');

Route::get('sms/admission/batch-config','SMS\Admission\BatchConfigController@getBatchConfig');
Route::get('sms/admission/add-batch-config','SMS\Admission\BatchConfigController@viewAddBatchConfig');
Route::post('sms/admission/add-batch-config','SMS\Admission\BatchConfigController@saveAddBatchConfig');

Route::get('sms/admission/vw-admission','SMS\Admission\AdmissionController@getAdmission');
Route::get('sms/admission/new-admission-institute','SMS\Admission\AdmissionController@formInstitute');
Route::post('sms/admission/new-admission-institute','SMS\Admission\AdmissionController@saveInstitute');

Route::get('sms/admission/new-admission-university','SMS\Admission\AdmissionController@formAdmissionUniversity');
Route::post('sms/admission/new-admission-university','SMS\Admission\AdmissionController@saveAdmissionUniversity');

Route::post('sms/admission/new-admission-form-university','SMS\Admission\AdmissionController@saveAdmissionFormUniversity');
//Route::post('sms/admission/new-admission-form-university','SMS\Admission\AdmissionController@viewAdmissionFormUniversity');

//Route::get('sms/admission/new-admission-rice','SMS\Admission\AdmissionController@formAdmissionRice');
Route::post('sms/admission/new-admission-rice','SMS\Admission\AdmissionController@saveAdmissionRice');

Route::get('sms/admission/new-admission-form-rice','SMS\Admission\AdmissionController@saveAdmissionFormRice');
Route::post('sms/admission/new-admission-form-rice','SMS\Admission\AdmissionController@saveAdmissionFormRice');

Route::get('sms/admission/new-admission-school','SMS\Admission\AdmissionController@formAdmissionSchool');
Route::post('sms/admission/new-admission-school','SMS\Admission\AdmissionController@saveAdmissionSchool');

///////////////////////////// End Of SMS Admission Management /////////////////////////////////////


////////////////////////////////// Room Management ///////////////////////////////////////////

Route::get('sms/room-management/vw-room-management','SMS\RoomManagement\RoomConfigController@getRoomConfig');
Route::get('sms/room-management/room-config','SMS\RoomManagement\RoomConfigController@formRoomConfig');
Route::post('sms/room-management/room-config','SMS\RoomManagement\RoomConfigController@saveFormRoomConfig');

//Route::get('sms/room-management/room-config-institute','SMS\RoomManagement\RoomConfigController@getFormRoomConfigInstitute');
Route::post('sms/room-management/room-config-institute','SMS\RoomManagement\RoomConfigController@saveFormRoomConfigInstitute');
Route::post('sms/room-management/room-config-school','SMS\RoomManagement\RoomConfigController@saveFormRoomConfigSchool');

Route::get('sms/room-management/vw-room-type','SMS\RoomManagement\RoomTypeController@getRoomType');
Route::get('sms/room-management/room-type','SMS\RoomManagement\RoomTypeController@formRoomType');
Route::post('sms/room-management/room-type','SMS\RoomManagement\RoomTypeController@saveRoomType');

/////////////////////////////////////////// End Of Room Management ///////////////////////////////////////////

/////////////////////////////////////////// Exam Management //////////////////////////////////////////////////

Route::get('sms/exam-management/vw-exam-type','SMS\ExamManagement\ExamTypeController@getExamType');
Route::get('sms/exam-management/exam-type','SMS\ExamManagement\ExamTypeController@formExamType');
Route::post('sms/exam-management/exam-type','SMS\ExamManagement\ExamTypeController@saveExamType');


/////////////////////////////////////////// End Of Exam Management //////////////////////////////////////////


/////////////////////////////////////////// Routine Management //////////////////////////////////////////////////

Route::get('sms/routine-management/vw-semester','SMS\RoutineManagement\SemesterController@getSemester');
Route::get('sms/routine-management/semester','SMS\RoutineManagement\SemesterController@formSemester');
Route::post('sms/routine-management/semester','SMS\RoutineManagement\SemesterController@saveSemester');


/////////////////////////////////////////// End Of Routine Management //////////////////////////////////////////


/////////////////////////////////////////// Result Management //////////////////////////////////////////////////

Route::get('sms/result-management/vw-marks-allocation','SMS\ResultManagement\MarksAllocationController@getMarksAllocation');
Route::get('sms/result-management/institute-marks-allocation','SMS\ResultManagement\MarksAllocationController@formMarksAllocationInstitute');
Route::post('sms/result-management/institute-marks-allocation','SMS\ResultManagement\MarksAllocationController@saveMarksAllocationInstitute');
Route::post('sms/result-management/school-marks-allocation','SMS\ResultManagement\MarksAllocationController@saveMarksAllocationSchool');

//Route::get('sms/result-management/institute-config-marks','SMS\ResultManagement\MarksAllocationController@formMarksAllocateInstituteConfig');
Route::post('sms/result-management/institute-config-marks','SMS\ResultManagement\MarksAllocationController@saveMarksAllocateInstituteConfig');
Route::post('sms/result-management/institute-config-marks-data','SMS\ResultManagement\MarksAllocationController@saveMarksAllocateInstituteConfigData');

Route::post('sms/result-management/school-config-marks','SMS\ResultManagement\MarksAllocationController@saveMarksAllocateSchoolConfig');
Route::post('sms/result-management/school-config-marks-data','SMS\ResultManagement\MarksAllocationController@saveMarksAllocateSchoolConfigData');

/////////////////////////////////////////// End Of Routine Management //////////////////////////////////////////


///////////////////////////////////////// Procurement //////////////////////////////////////////////////////

//Indent-Component
Route::get('procurement/indent/indent-component','Procurement\Indent\ComponentIndentController@getIndentComponent');
Route::get('procurement/indent/add-new-indent-component','Procurement\Indent\ComponentIndentController@viewIndentComponent');
Route::post('procurement/indent/add-new-indent-component','Procurement\Indent\ComponentIndentController@saveIndentComponent');

//Indent Item
Route::get('procurement/indent/indent-item','Procurement\Indent\ItemIndentController@getIndentItem');
Route::get('procurement/indent/approve-indent-item','Procurement\Indent\ItemIndentController@getApprovedIndentItem');
Route::get('procurement/indent/add-new-indent-item','Procurement\Indent\ItemIndentController@viewIndentItem');
Route::get('procurement/indent/add-new-indent-item/{id}','Procurement\Indent\ItemIndentController@getIndentItemById');
Route::get('procurement/indent/view-indent-item/{id}','Procurement\Indent\ItemIndentController@viewIndentItemByIndentNo');
Route::post('procurement/indent/add-new-indent-item','Procurement\Indent\ItemIndentController@saveIndentItem');
Route::post('procurement/indent/vw-indent-item','Procurement\Indent\ItemIndentController@saveIndentItemByIndentNo');
Route::post('procurement/indent/edit-indent-item','Procurement\Indent\ItemIndentController@editIndentItemByIndentNo');
Route::get('procurement/indent/view-indent-item-report/{id}', 'Procurement\Indent\ItemIndentController@viewIndentReport');

//Requisition Item  
Route::get('procurement/indent/requisition-item','Procurement\Indent\ItemRequisitionController@getRequisitionItem');
Route::get('procurement/indent/add-new-requisition-item','Procurement\Indent\ItemRequisitionController@viewRequisitionItem');
Route::post('procurement/indent/add-new-requisition-item','Procurement\Indent\ItemRequisitionController@saveRequisitionItem');
Route::get('procurement/indent/edit-item-status/{id}','Procurement\Indent\ItemRequisitionController@editStatusRequisitionItem');
Route::get('procurement/indent/edit-request/{id}','Procurement\Indent\ItemRequisitionController@viewRequestItemById');
Route::post('procurement/indent/edit-request','Procurement\Indent\ItemRequisitionController@editPurchaseRequestByIndentNo');
Route::get('procurement/indent/view-requisition-item/{req_no}','Procurement\Indent\ItemRequisitionController@viewRequisitionItemByPR');
Route::get('procurement/indent/add-requisition-itemwise/{item_id}','Procurement\Indent\ItemRequisitionController@addRequisitionByItemId');
Route::post('procurement/indent/add-requisition-itemwise','Procurement\Indent\ItemRequisitionController@saveRequisitionByItemId');

//Requisition Component
Route::get('procurement/indent/requisition-component','Procurement\Indent\ComponentRequisitionController@getRequisitionComponent');
Route::get('procurement/indent/add-new-requisition-component','Procurement\Indent\ComponentRequisitionController@viewRequisitionComponent');
Route::post('procurement/indent/add-new-requisition-component','Procurement\Indent\ComponentRequisitionController@saveRequisitionComponent');
Route::get('procurement/indent/edit-comp-status/{id}','Procurement\Indent\ComponentRequisitionController@editRequisitionComponent');

//PO - Dashboard
Route::get('procurement/purchase/dashboard','Procurement\Purchase\ItemPurchaseController@getDashboard');

// PO - Component
Route::get('procurement/purchase/PO-component','Procurement\Purchase\ComponentPurchaseController@getPurchaseComponent');
Route::get('procurement/purchase/add-po-component','Procurement\Purchase\ComponentPurchaseController@viewPurchaseComponent');
Route::post('procurement/purchase/add-po-component','Procurement\Purchase\ComponentPurchaseController@savePurchaseComponent');

//PO - Item
Route::get('procurement/purchase/get-issued-po-item','Procurement\Purchase\ItemPurchaseController@getIssuedPurchaseItem');
Route::get('procurement/purchase/PO-item','Procurement\Purchase\ItemPurchaseController@getPurchaseItem');
Route::get('procurement/purchase/add-po-item','Procurement\Purchase\ItemPurchaseController@viewPurchaseItem');
Route::get('procurement/purchase/edit-po-item/{id}','Procurement\Purchase\ItemPurchaseController@viewPurchaseItemById');
Route::post('procurement/purchase/add-po-item','Procurement\Purchase\ItemPurchaseController@savePurchaseItem');
Route::post('procurement/purchase/update-po-item','Procurement\Purchase\ItemPurchaseController@updatePurchaseItem');
Route::get('procurement/purchase/view-po-item/{po_no}','Procurement\Purchase\ItemPurchaseController@viewPurchaseItemByPO');

// GRN Component
Route::get('procurement/purchase/GRN-component','Procurement\Purchase\ComponentGrnController@getGrnComponent');
Route::get('procurement/purchase/add-GRN-component-with-po','Procurement\Purchase\ComponentGrnController@viewGrnComponent');
Route::post('procurement/purchase/add-GRN-component-with-po','Procurement\Purchase\ComponentGrnController@saveGrnComponent');

// GRN Item
Route::get('procurement/purchase/GRN-item','Procurement\Purchase\ItemGrnController@getItemGrn');
Route::get('procurement/purchase/add-GRN-item','Procurement\Purchase\ItemGrnController@viewItemGrn');
Route::post('procurement/purchase/add-GRN-item','Procurement\Purchase\ItemGrnController@saveItemGrn');

//Inventory Dashboard
Route::get('procurement/inventory/dashboard','Procurement\Inventory\ItemIssueController@getDashboard');

//Issue Component
Route::get('procurement/inventory/issue-register-component','Procurement\Inventory\ComponentIssueController@getComponentIssue');
Route::get('procurement/inventory/add-issue-register-component','Procurement\Inventory\ComponentIssueController@viewComponentIssue');
Route::post('procurement/inventory/add-issue-register-component','Procurement\Inventory\ComponentIssueController@saveComponentIssue');

//Issue Item
Route::get('procurement/inventory/get-approve-indent-list','Procurement\Inventory\ItemIssueController@getIndentItemList');
Route::get('procurement/inventory/issue-register-item','Procurement\Inventory\ItemIssueController@getItemIssue');
Route::get('procurement/inventory/add-issue-register-item','Procurement\Inventory\ItemIssueController@viewItemIssue');
Route::post('procurement/inventory/add-issue-register-item','Procurement\Inventory\ItemIssueController@saveItemIssue');
Route::get('procurement/inventory/view-issue-register-item/{id}','Procurement\Inventory\ItemIssueController@viewItemIssuebyIndentNo');
Route::get('procurement/inventory/get-issue-register-report','Procurement\Inventory\ItemIssueController@getItemIssueReport');
Route::post('procurement/inventory/get-issue-register-report','Procurement\Inventory\ItemIssueController@getItemIssueResult');
Route::get('procurement/inventory/get-issue-register-report-item','Procurement\Inventory\ItemIssueController@getIssueReportItemWise');
Route::post('procurement/inventory/get-issue-register-report-item','Procurement\Inventory\ItemIssueController@getIssueResultItemWise');

// Receive Component
Route::get('procurement/inventory/receive-component','Procurement\Inventory\ComponentReceiveController@getComponentReceive');
Route::get('procurement/inventory/add-receive-component','Procurement\Inventory\ComponentReceiveController@viewComponentReceive');
Route::post('procurement/inventory/add-receive-component','Procurement\Inventory\ComponentReceiveController@saveComponentReceive');

// Receive Item
Route::get('procurement/inventory/receive-item','Procurement\Inventory\ItemReceiveController@getItemReceive');
Route::get('procurement/inventory/add-receive-item','Procurement\Inventory\ItemReceiveController@viewItemReceive');
Route::post('procurement/inventory/add-receive-item','Procurement\Inventory\ItemReceiveController@saveItemReceive');
Route::get('procurement/inventory/edit-receive-item/{itemno}','Procurement\Inventory\ItemReceiveController@viewItemReceiveByItemNo');

//Stock Register
Route::get('procurement/stock/stock-register','Procurement\Stock\ItemStockController@getItemStock');
Route::post('procurement/stock/stock-register','Procurement\Stock\ItemStockController@viewItemStockReport');
Route::get('procurement/stock/stock-register-item','Procurement\Stock\ItemStockController@getStockItemWise');
Route::post('procurement/stock/stock-register-item','Procurement\Stock\ItemStockController@viewStockReportItemWise');

// Billing
Route::get('procurement/sales/billing','Procurement\Sales\BillingController@getBill');
Route::get('procurement/sales/add-new-billing','Procurement\Sales\BillingController@viewAddBill');
Route::post('procurement/sales/add-new-billing','Procurement\Sales\BillingController@saveBill');

// Payment receive
Route::get('procurement/sales/payment-recieved','Procurement\Sales\PaymentReceiveController@getPaymentReceive');
Route::get('procurement/sales/add-new-payment-recieved','Procurement\Sales\PaymentReceiveController@viewAddPaymentReceive');
Route::post('procurement/sales/add-new-payment-recieved','Procurement\Sales\PaymentReceiveController@savePaymentReceive');



//////////////////////////////////////// End Of Procurement ///////////////////////////////////////////////


//-------------------------------AJAX------------------------------------
Route::get('attendance/get-grades/{companyid}', function($companyid){
	
	$grade_rs=Grade::where('company_id','=',$companyid)->get();
	//dd($grade_rs);
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($grade_rs as $grade)
	{
		$result .= '<option value="'.$grade->id.'" >'.$grade->grade_name.'</option>';
	}
	echo $result;
});

Route::get('attendance/get-employee-type/{companyid}', function($companyid){
	
	$employee_type_rs=EmployeeType::where('company_id','=',$companyid)->get();
	//dd($grade_rs);
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($employee_type_rs as $employee_type)
	{
		$result .= '<option value="'.$employee_type->id.'">'.$employee_type->employee_type_name.'</option>';
	}
	echo $result;
});

Route::get('attendance/get-employee-scale/{emp_payscale_id}', function($emp_payscale_id){
	
	$employee_payscale=DB::table('pay_scale_basic_master')->where('pay_scale_master_id','=',$emp_payscale_id)->get();
	return $employee_payscale;
});

Route::get('attendance/get-employee-bank/{emp_bank_id}', function($emp_bank_id){
	
	$employee_branch_name=DB::table('bank')->where('bank_name','=',$emp_bank_id)->get();
	return $employee_branch_name;
});


Route::get('attendance/get-employee-bank-ifsc-code/{emp_branch_id}', function($emp_branch_id){

	$employee_ifsc_code=DB::table('bank')->where('id','=',$emp_branch_id)->first();
	echo json_encode($employee_ifsc_code);
});


























Route::get('accountpayable/get-add-row-item/{row}', function($row){

    $row=$row+1;
       $accounthead=DB::table('account_master')
    ->where('account_type','=','assets')
    ->orWhere('account_type','=','liabilities')
    ->orWhere('account_type','=','expenses')
    ->orderBy('account_name', 'asc')
    ->get();

    $result_status="<option value='' selected disabled>Select</option>";

    foreach($accounthead as $unit)
    {
        $result_status.='<option value="'.$unit->id.'">'.$unit->account_name.'</option>';
    }

    $item_rs = DB::table('account_master')
    ->where('account_type','=','assets')
    ->orWhere('account_type','=','liabilities')
    ->orWhere('account_type','=','expenses')
    ->orderBy('account_name', 'asc')
    ->get();

    $result_status1="<option value='' selected disabled>Select</option>";
    foreach($item_rs as $item)
    {
        $result_status1.='<option value="'.$item->account_code.'">'.$item->account_name.'</option>';
    }

    $tdslist=DB::table('tds_master')->get();
    $result_status3="<option value='' selected disabled>Select</option>";
    foreach($tdslist as $item)
    {
        $result_status3.='<option value="'.$item->id.'" data-rate="'.$item->tds_percentage.'">'.$item->tds_section.'('.$item->tds_percentage.')</option>';
    }


    $result='<div  class="bordr itemslot"  id='.$row.'>
    <div class="row form-group">
    <div class="col-md-3">
    <label class="form-control-label">Account Head<span>(*)</span></label>


                     <select class="form-control" name="account_head_id[]"  id="account_head_id'.$row.'" onchange="getSubhead('.$row.');">

                        '.$result_status1.'
                      </select>
                      </div>



                      <div class="col-md-3">
                      <label class="form-control-label">Sub Account <span>(*)</span></label>


                      <select class="form-control" name="sub_account_id'.$row.'"  id="sub_account_id'.$row.'" onchange="getSubaccountDtl('.$row.');">


                    </select>
                      </div>


                      <div class="col-md-3">
                      <label class=" form-control-label">Transaction Code <span>(*)</span></label>

                      <input type="text" class="form-control"   id="transaction_code'.$row.'" name="transaction_code'.$row.'" readonly >

                      </div>
                      <div class="col-md-3">
                      <label class="form-control-label">Type<span>(*)</span></label>
                      <select name="account_tool'.$row.'" id="account_tool'.$row.'" class="form-control"
                    required>

                      <option value="credit">Credit</option>
                      <option value="debit">Debit</option>



                  </select>

                      </div>

                    </div>




                    <div class="row form-group">

            <div class="col-md-3">
            <label class="form-control-label">Bill Amount(*)<span>(*)</span></label>
            <input type="text" name="bill_amt'.$row.'" class="form-control" value="0" id="bill_amt'.$row.'"  >

        </div>

                    <div class="col-md-2">
                        <label class="form-control-label">TDS Calculate</span></label><br>

                        <label class="radio-inline">
                          <input type="radio" value="no" name="optradio'.$row.'" onchange="return radiocahange('.$row.')" id="optradio'.$row.'" >No
                        </label>
                        <label class="radio-inline">
                          <input type="radio" value="yes" name="optradio'.$row.'" id="optradio'.$row.'" onchange="return radiocahange('.($row).')">Yes
                        </label>
                    </div>


                    <div class="col-md-3">
                    <label class=" form-control-label">TDS List</label>
                      <select name="tds_id'.$row.'" id="tds_id'.$row.'" class="form-control" onchange="getRate('.$row.')" disabled>
                        <option value="">Select TDS Rate</option>
                        '.$result_status3.'
                      </select>

                </div>
                    <div class="col-md-1">
                        <label class=" form-control-label">Percentage</label>
                        <input type="text" class="form-control" name="tds_percentage'.$row.'" id="tds_percentage'.$row.'" value="" readonly />
                    </div>
                    <div class="col-md-3">
                        <label class=" form-control-label">Deduction Amount<span>(*)</span></label>
                         <input type="text" name="deduction_amt'.$row.'" class="form-control" value="0" id="deduction_amt'.$row.'" readonly />

                    </div>


                    </div>



                    <div class="row form-group">


                    <div class="col-md-3">
                        <label class="form-control-label">Bill GST Amount<span>(*)</span></label>
                        <input type="text" name="bill_gst_amt'.$row.'" id="bill_gst_amt'.$row.'" class="form-control" value="0"  onblur="calculateFinalAmount('.$row.');">

                    </div>
                    <div class="col-md-3">
                        <label class=" form-control-label">Final Bill Amount<span>(*)</span></label>
                         <input type="text" name="final_bill_amt'.$row.'" class="form-control" value="0" id="final_bill_amt'.$row.'" required readonly />

                    </div>

                     <div class="col-md-3">
                        <label class="form-control-label">Payable Amount<span>(*)</span></label>
                        <input type="text" name="payable_amt'.$row.'" class="form-control" value="0" readonly id="payable_amt'.$row.'" required />

                    </div>


                    <div class="col-md-3">
                        <label class="form-control-label">Narration</label>
                         <textarea rows="5" name="entry_remark'.$row.'" class="form-control" id="entry_remark'.$row.'">
                         </textarea>

                    </div>
                </div>
                    <div class="row form-group">


                      <div class="col-md-2 btn-up" style="padding-right:0;">
                        <button type="button" style="" class="btn btn-danger btn-add" id="add'.$row.'" onClick="addnewrow('.$row.')" data-id="'.$row.'"><i class="fa fa-plus" aria-hidden="true"></i>Add More</button>
                      </div>
                      <div class="col-md-2 btn-up" style="padding-left:0;">
                        <button type="button" class="btn btn-danger deleteButton" id="del'.$row.'" style="background: #d00404; border-color: #d00404; " onClick="delRow('.$row.')"> <i class="fa fa-trash-o" aria-hidden="true"></i> Remove</button>
                      </div>

                      </div>

                      </div>

                      </div>';
    echo $result;
});




/*Route::get('attendance/get-employee-type/{companyid}', function($companyid){
	
	$employee_type_rs=EmployeeType::where('company_id','=',$companyid)->get();
	//dd($grade_rs);
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($employee_type_rs as $employee_type)
	{
		$result .= '<option value="'.$employee_type->id.'">'.$employee_type->employee_type_name.'</option>';
	}
	echo $result;
});*/

Route::get('pis/get-all-employee', function(){
	$all_emp = DB::table('employee')
             	->select('emp_code')
     			->get();
    echo json_encode($all_emp);

});

Route::get('pis/getEmployeePayrollById/{empid}/{month}/{year}', function($empid,$month,$year){
    
  $mnth_yr=$month.'/'.$year ;
	//$tomonthyr=date("Y-m-t");
	//$formatmonthyr=date("Y-m-01");
  $tomonthyr=$year."-".$month."-31";
  $formatmonthyr=$year."-".$month."-01";

	$employee_rs=DB::table('employee')
  ->join('employee_pay_structure','employee_pay_structure.employee_code','=','employee.emp_code')
  ->where('employee.emp_code', '=',  $empid)
  ->where('employee.emp_status', '!=', 'EX-EMPLOYEE')
  ->select('employee.*','employee_pay_structure.*')->first();

  $leave_rs=DB::table('leave_apply')
  ->join('leave_type','leave_type.id','=','leave_apply.leave_type')
  ->where('leave_apply.employee_id','=',$empid)
  ->where('leave_apply.status','=','APPROVED')
  ->where('leave_apply.from_date','>=',$formatmonthyr)
  ->where('leave_apply.to_date','<=',$tomonthyr)
  ->select('leave_apply.*','leave_type.leave_type_name') 
  ->get();
  
  $process_attendance=DB::table('process_attendance')
  ->where('process_attendance.employee_code', '=',  $empid)
  ->where('process_attendance.month_yr','=',$mnth_yr)
  ->first();
	//->toSql();
  

  $rate_rs=DB::table('rate_master')
            ->join('rate_details','rate_details.rate_id','=','rate_master.id')
            ->select('rate_details.*','rate_master.head_name')
			->get();
    echo json_encode( array($employee_rs, $leave_rs,$process_attendance,$rate_rs) );

});

Route::get('attendance/get-head-names/{companyid}/{gradeid}', function($companyid,$gradeid){
	
	$additional_rs=DB::Table('emp_grade_wise_allowance')
	->select('head_name')
	->where('company_id','=',$companyid)
	->where('grade_id','=',$gradeid)
	->where('head_type','=','Additional')
	->groupBy('head_name')
	->get();
	
	$result='<legend>Addition</legend><div class="row form-group" style="padding:1.5% 0 1%;margin: 0 0 15px 0;border: 1px solid #e6e4e4;" id="addition_names" >';
	foreach($additional_rs as $additional)
	{	
		$result .= '<label class="col-md-3 checkbox-inline"><input type="checkbox" value="'.$additional->head_name.'" checked="checked" name="addition_names[]" >'.$additional->head_name.'</label>';
	}	
	$result .= '</div>';
	
	$deductione_rs=DB::Table('emp_grade_wise_allowance')
	->select('head_name')
	->where('company_id','=',$companyid)
	->where('grade_id','=',$gradeid)
	->where('head_type','=','Deduction')
	->groupBy('head_name')
	->get();
	
	$result	.='<legend>Deduction</legend><div class="row form-group" style="border: 1px solid #e6e4e4;padding:1.5% 0 1%;    margin: 0 0 15px 0;">';	
	foreach($deductione_rs as $deduction)
	{		
		$result .= '<label class="col-md-3 checkbox-inline"><input type="checkbox" value="'.$deduction->head_name.'" checked="checked" name="deduction_names[]" >'.$deduction->head_name.'</label>';
	}
	$result .='</div>';
	
	echo $result;
});

Route::get('attendance/get-reporting-names', function(){
	
	$reporting_person_rs=DB::Table('employee')
	->select('first_name','employee_id')
	->where('employee_status','=','active')
	->get();
	//dd($reporting_person_rs);
	$result='';
	
	foreach($reporting_person_rs as $reporting)
	{
		$first_name=$reporting->first_name;
		$employee_id=$reporting->employee_id;
		//echo "test";
		$result.='<option value="'.$first_name.'" data-id="'.$employee_id.'">';
	}
	
	echo $result;
	//echo json_decode(json_encode($reporting_person_rs), FALSE);
	//echo json_encode($reporting_person_rs);
});

Route::get('attendance/get-row-add-emp-grade-allowance/{row}/{head_name}/{head_id}', function($row,$head_name,$head_id){
	
	$row=$row+1;
	$result='<tr class="row'.$head_id.$row.'">
				<td><div class="checkbox">
					<label>
						<input type="checkbox" class="checkboxclass" name="head_name[]"  value="'.$head_name.'" id="check"  >
					</label>
				  </div>
				</td>
				<td>'.$head_name.'</td>
				<td><input type="text" id="in_per" name="in_per'.$head_id.'[]" 	value="0"	class="form-control"></td>
				<td><input type="text" id="in_rs" name="in_rs'.$head_id.'[]" 	value="0"	class="form-control"></td>
				<td><input type="text" id="min_basic" name="min_basic'.$head_id.'[]" value="0" class="form-control"></td>
				<td><input type="text" id="max_basic" name="max_basic'.$head_id.'[]" value="0" class="form-control"></td>
				<td>	
					<input type="hidden"  name="head_id[]"  value="'.$head_id.'" class="form-control">
					<button type="button" class="btn btn-danger" id="add'.$head_id.$row.'"  data-id="'.$head_id.'" data-head="'.$head_name.'"  onclick="addnewrow('.$row.','.$head_id.');"  ><i class="fa fa-plus" aria-hidden="true"></i></button>&nbsp;
					<button type="button" class="btn btn-danger"   id="del'.$head_id.$row.'" data-did="'.$head_id.'" data-dhead="'.$head_name.'" onclick="del('.$row.','.$head_id.')"  > <i class="fa fa-remove" aria-hidden="true" ></i></button>
				</td>
			</tr>';
	echo $result;
});

Route::get('pis/get-employee-all-details/{empid}/{month}/{year}', function($empid,$month,$year){
    
  $mnth_yr=$month.'/'.$year ;
    //$tomonthyr=date("Y-m-t");
    //$formatmonthyr=date("Y-m-01");
  $tomonthyr=$year."-".$month."-31";
  $formatmonthyr=$year."-".$month."-01";

    $employee_rs=DB::table('employee')
  ->join('employee_pay_structure','employee_pay_structure.employee_code','=','employee.emp_code')
  ->where('employee.emp_code', '=',  $empid)
  ->select('employee.*','employee_pay_structure.*')->first();

  $leave_rs=DB::table('leave_apply')
  ->join('leave_type','leave_type.id','=','leave_apply.leave_type')
  ->where('leave_apply.employee_id','=',$empid)
  ->where('leave_apply.status','=','APPROVED')
  ->where('leave_apply.from_date','>=',$formatmonthyr)
  ->where('leave_apply.to_date','<=',$tomonthyr)
  ->select('leave_apply.*','leave_type.leave_type_name') 
  ->get();
  
  $process_attendance=DB::table('process_attendance')
  ->where('process_attendance.employee_code', '=',  $empid)
  ->where('process_attendance.month_yr','=',$mnth_yr)
  ->first();
    //->toSql();

  $rate_rs=DB::table('rate_master')
            ->join('rate_details','rate_details.rate_id','=','rate_master.id')
            ->select('rate_details.*','rate_master.head_name')
            ->get();
    echo json_encode( array($employee_rs, $leave_rs,$process_attendance,$rate_rs) );

});

Route::get('pis/get-prev-rate/{head_name}', function($head_name){
    $rate_details=DB::table('rate_master')
                    ->join('rate_details','rate_details.rate_id','=','rate_master.id')
                    ->select('rate_details.*','rate_master.head_name')
                    ->where('rate_master.id','=',$head_name)
                    ->first();
    //return $loan_details_rs;
    return json_encode($rate_details);
});

Route::get('attendance/get-loan-details/{loan_applied_no}', function($loan_applied_no){
	$loan_details_rs=LoanApplyModel::where('loan_applied_no','=',$loan_applied_no)->get()->first();
	
	//return $loan_details_rs;
	return json_encode($loan_details_rs);
});

Route::get('attendance/get-shifts/{companyid}/{gradeid}', function($companyid,$gradeid){
	
	$shift_rs=ShiftModel::where('company_id','=',$companyid)->where('grade_id','=',$gradeid)->get();
	//dd($grade_rs);
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($shift_rs as $shift)
	{
		$result .= '<option value="'.$shift->shift_id.'">'.$shift->shift_name.'</option>';
	}
	echo $result;
});

Route::get('pis/get-grades/{companyid}', function($companyid){
	
	$grade_rs=Grade::where('company_id','=',$companyid)->get();
	//dd($grade_rs);
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($grade_rs as $grade)
	{
		$result .= '<option value="'.$grade->id.'">'.$grade->grade_name.'</option>';
	}
	echo $result;
}); 

Route::get('pis/get-branches/{companyid}', function($companyid){
	
	$branch_rs=DB::Table('branch_allocation')
	->leftJoin('branch','branch_allocation.branch_id','=','branch.id')
	->where('company_id','=',$companyid)
	->where('branch_allocation_status','=','active')->get();
	//dd($grade_rs);
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($branch_rs as $branch)
	{
		$result .= '<option value="'.$branch->id.'">'.$branch->branch_name.'</option>';
	}
	echo $result;
});

Route::get('role/get-row-add-user-rights/{row}', function($row){
	
	$row=$row+1;
	$result='';
	if($row <>'')
	{
		$result='
                    <div class="col-md-2">
						<label>Module</label>
						<select  class="standardSelect" name="module_name[]">
                            <option value="" selected disabled>Select Module</option>
                            <option value="Configuration">Configuration</option>
                            <option value="Human Capital Management">Human Capital Management</option>
                            <option value="Procurement">Procurement</option>
                            <option value="Student">Student</option>
                            <option value="Learning System">Learning System</option>
                        </select>
                    </div>
					
					<div class="col-md-2">
						<label>Sub Module</label>
						<select data-placeholder="Select Sub Module" multiple class="standardSelect" name="sub_module_name'.$row.'[]">
                            <option value="" label="default"></option>
                            <option value="Payroll">Payroll</option>
                            <option value="Attendance">Attendance</option>
                            <option value="Leave">Leave</option>
                            <option value="HR">HR</option>
                            <option value="Institute">Institute</option>
							<option value="Course">Course</option>
                        </select>
                    </div>
					
					<div class="col-md-2">
						<label>Menu</label>
						<select data-placeholder="Select Menu Name" multiple class="standardSelect" name="menu_name'.$row.'[]">
                             <option value="" label="default"></option>
                             <option value="Institute">Institute</option>
							 <option value="Course">Course</option>
							 <option value="Room">Room</option>
							 <option value="Stream">Stream</option>
							 <option value="Subject">Subject</option>
							 <option value="Class">Class</option>
                           
                        </select>
                    </div>
					
					<div class="col-md-3">
						<label>Rights</label>
						<select data-placeholder="Select Rights" multiple class="standardSelect" name="user_rights_name'.$row.'[]">
                            <option value="" label="default" ></option>
							<option value="Add">Add</option>
                            <option value="Edit">Edit</option>
                            <option value="Delete">Delete</option>
                        </select>
                    </div>
					
                    <div class="col-md-3">
						<label>User ID</label>
						<select data-placeholder="Select User ID" multiple class="standardSelect" name="member_id'.$row.'[]" >
                            <option value="" label="default"></option>
							<option value="Hirok.das@ext.riceindia.org">Hirok.das@ext.riceindia.org</option>
                            <option value="swadesh.singh@ext.riceindia.org">swadesh.singh@ext.riceindia.org</option>
                            <option value="sathi.majumder@ext.riceindia.org">sathi.majumder@ext.riceindia.org</option>
							<option value="Sreeparna.majumder@ext.riceindia.org">Sreeparna.majumder@ext.riceindia.org</option>
							<option value="prity.majumder@ext.riceindia.org">prity.majumder@ext.riceindia.org</option>
                        </select>
						<!-- <input type="hidden" name="user_type[]" > -->
                    </div>
                    <div class="col-md-2 btn-up">
						<button type="button" class="btn btn-danger" id="add"    onclick="addnewrow('.$row.');"  ><i class="fa fa-plus" aria-hidden="true"></i></button>&nbsp;
						<button type="button" class="btn btn-danger"  id="del"   onclick="del('.$row.');" disabled > <i class="fa fa-remove" aria-hidden="true" ></i></button>
					
					</div>
                 ';
	}
	echo $result;
});

Route::get('role/get-sub-modules/{id_module}', function($id_module){
	
	$sub_module_rs=SubModule::where('module_id','=',$id_module)->get();
	//dd($grade_rs);
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($sub_module_rs as $sub_module)
	{
		$result .= '<option value="'.$sub_module->id.'">'.$sub_module->sub_module_name.'</option>';
	}
	echo $result;
});
Route::get('role/get-menu/{id_submenu}', function($id_submenu){
	
	$module_config_rs=DB::Table('module_config')->where('sub_module_id','=',$id_submenu)->get();
	//dd($grade_rs);
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($module_config_rs as $menu)
	{
		$result .= '<option value="'.$menu->id.'">'.$menu->menu_name.'</option>';
	}
	echo $result;
});



Route::get('leave/get-leave-in-hand/{id_leave_type}', function($id_leave_type){
    $empid = Auth::user()->employee_id;
    $leaveinhand=DB::table('leave_allocation')
    ->where('leave_type_id','=',$id_leave_type)
    ->where('employee_code','=',$empid)
    ->where('month_yr','like','%'.date('Y').'%')
    ->orderBy('id','DESC')
    ->first(); 
    if(!empty($leaveinhand)){
    if($leaveinhand->leave_in_hand>0)
    {
        echo $leaveinhand->leave_in_hand;
    }
    else
    {
        echo '0';
    }
    }else{
 echo '0';
}
});



Route::get('role/get-role-menu/{id_sub_module}', function($id_sub_module){
	
	//$sub_module_rs=SubModule::where('module_id','=',$id_module)->get();
        $rolemenus=DB::table('module_config')->where('sub_module_id','=',$id_sub_module)->get();
	//dd($grade_rs);
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($rolemenus as $menu)
	{
		$result .= '<option value="'.$menu->id.'">'.$menu->menu_name.'</option>';
	}
	echo $result;
	
});


Route::get('hr/get-applicant/{jobtitle}', function($jobtitle){
	
	$applicant_rs=JobApplication::where('post','=',$jobtitle)->get();
	//dd($applicant_rs);
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($applicant_rs as $applicant)
	{
		$result .= '<option value="'.$applicant->name.'" >'.$applicant->name.'</option>';
	}
	echo $result;
});


Route::get('hr/get-jobapplyid/{applicant_name}/{job_title}', function($applicant_name,$jobtitle){
	
	$applicant_rs=JobApplication::where('post','=',$jobtitle)->where('name','=',$applicant_name)->get()->first();
	//dd($applicant_rs);
	$result=$applicant_rs->id;
		
	
	echo $result;
});

Route::get('sms/get-course/{faculty_id}', function($faculty_id){
	
	$course_rs=DB::Table('fees_head_config')
	->leftJoin('course','fees_head_config.course_code','=','course.course_code')
	->where('fees_head_config.faculty_code','=',$faculty_id)
	->groupBy('fees_head_config.course_code')->get();
	
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($course_rs as $course)
	{
		$result .= '<option value="'.$course->course_code.'">'.$course->course_name.'</option>';
	}
	
	echo $result;
});

Route::get('sms/get-fees-head/{faculty_id}/{course_id}', function($faculty_id,$course_id){
	
	$fees_head_rs=DB::Table('fees_head_config')
	->leftJoin('fees_head','fees_head_config.fees_head_code','=','fees_head.fees_head_code')
	->where('fees_head_config.faculty_code','=',$faculty_id)
	->where('fees_head_config.course_code','=',$course_id)
	->get();
	
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($fees_head_rs as $fees_head)
	{
		$result .= '<option value="'.$fees_head->fees_head_code.'">'.$fees_head->fees_head_name.'</option>';
	}
	
	echo $result;
});


Route::get('sms/get-fees-head-by-classes/{class_id}', function($class_id){
	
	$fees_head_rs=DB::Table('fees_head_config')
	->leftJoin('fees_head','fees_head_config.fees_head_code','=','fees_head.fees_head_code')
	->where('fees_head_config.class_code','=',$class_id)
	->get();
	
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($fees_head_rs as $fee_head)
	{
		$result .= '<option value="'.$fee_head->fees_head_code.'">'.$fee_head->fees_head_name.'</option>';
	}
	
	echo $result;
});

Route::get('sms/admission/get-course/{institute_code}/{faculty_id}', function($institute_code,$faculty_id){
	DB::enableQueryLog();
	$course_rs=DB::Table('institute_wise_configuration')
			->leftJoin('faculty','institute_wise_configuration.faculty_id','=','faculty.faculty_id')
			->where('institute_wise_configuration.status','=','active')
			->where('institute_wise_configuration.institute_code','=',$institute_code)
			->where('institute_wise_configuration.faculty_id','=',$faculty_id)
			->where('institute_wise_configuration.faculty_id','<>','')
			->get();
	//dd(DB::getQueryLog());
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($course_rs as $course)
	{
		$result .= '<option value="'.$course->course_code.'">'.$course->course_name.'</option>';
	}
	
	echo $result;
	
	
});

Route::get('sms/admission/fees-heads/{institute_code}/{faculty_id}/{course_code}', function($institute_code,$faculty_id,$course_code){
	$result='';
	//DB::enableQueryLog();
	$fees_head_details_rs=DB::Table('fees')
		->leftJoin('institute','fees.institute_code','=','institute.institute_code')
		->leftJoin('faculty','fees.faculty_code','=','faculty.faculty_id')
		->leftJoin('course','fees.course_code','=','course.course_code')
		->leftJoin('fees_head','fees.fees_head_code','=','fees_head.fees_head_code')
		->where('fees.institute_code','=',$institute_code)
		->where('fees.faculty_code','=',$faculty_id)
		->where('fees.course_code','=',$course_code)
		->where('fees.faculty_code','<>','')
		->orderby('no_of_installement')->get();
		//dd(DB::getQueryLog());
		//dd($fees_head_details_rs);
		$years='<option value="" selected disabled>Select</option>';
		
		for($i=2018; $i<=2030; $i++)
		{
			$years .='<option value="'.$i.'">'.$i.'</option>';
		}
		
				
		foreach($fees_head_details_rs as $fee_head_detail)
		{
			$month_year='';			
			if($fee_head_detail->no_of_installement > 1)
			{				
				$month_year='<td><select class="form-control" name="fdd[]">
							<option value="" selected disabled>Select</option>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select></td>
						<td><select class="form-control" name="fyy[]">							
							'.$years.'
						</select></td>';
						
						//dd($month_year);
			}
			else
			{
				$month_year='<td></td>
						<td></td>';
			}
			
			for($j=0; $j<$fee_head_detail->no_of_installement; $j++)
			{
				$result .='<tr>
							<td>'.$fee_head_detail->fees_head_name.'</td>
							<td>'.$fee_head_detail->ammount.'</td>
							<td><input type="text" style="text-align:center;" value="0" name="waiver_amt[]" >
								<input type="hidden" style="text-align:center;" value="'.$fee_head_detail->fees_head_name.'" name="fees_head_name[]" >
								<input type="hidden" style="text-align:center;" value="'.$fee_head_detail->ammount.'" name="actual_amt[]" >
							</td>
							<td><input type="text" style="text-align:center;" value="'.$fee_head_detail->ammount.'" name="pay_amt[]" ></td>
							<td><input type="text" style="text-align:center;" value="'.$fee_head_detail->ammount.'" name="due_amt[]" ></td>'.$month_year.'
						</tr>';
			}
		}
	echo $result;
});

Route::get('sms/admission/fees-heads-school/{institute_code}/{class_code}/{session}', function($institute_code,$class_code,$session){
	
	$result='';
	//DB::enableQueryLog();
	$fees_head_details_rs=DB::Table('fees')
		->leftJoin('institute','fees.institute_code','=','institute.institute_code')
		->leftJoin('class','fees.class_code','=','class.class_code')
		->leftJoin('fees_head','fees.fees_head_code','=','fees_head.fees_head_code')
		->where('fees.institute_code','=',$institute_code)
		->where('fees.class_code','=',$class_code)
		->where('fees.session','=',$session)
		->orderby('no_of_installement')->get();
		//dd(DB::getQueryLog());
		//dd($fees_head_details_rs);
		$years='<option value="" selected disabled>Select</option>';
		
		for($i=2018; $i<=2030; $i++)
		{
			$years .='<option value="'.$i.'">'.$i.'</option>';
		}
		
				
		foreach($fees_head_details_rs as $fee_head_detail)
		{
			$month_year='';			
			if($fee_head_detail->no_of_installement > 1)
			{				
				$month_year='<td><select class="form-control" name="dd[]">
							<option value="" selected disabled>Select</option>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select></td>
						<td><select class="form-control" name="yy[]">							
							'.$years.'
						</select></td>';
						
						//dd($month_year);
			}
			else
			{
				$month_year='<td></td>
						<td></td>';
			}
			
			for($j=0; $j<$fee_head_detail->no_of_installement; $j++)
			{
				$result .='<tr>
							<td>'.$fee_head_detail->fees_head_name.'</td>
							<td>'.$fee_head_detail->ammount.'</td>
							<td><input type="text" style="text-align:center;" value="0" name="waiver[]" ></td>
							<td><input type="text" style="text-align:center;" value="'.$fee_head_detail->ammount.'" name="pay_amount[]" ></td>
							<td><input type="text" style="text-align:center;" value="'.$fee_head_detail->ammount.'" name="due[]" ></td>'.$month_year.'
						</tr>';
			}
		}
	echo $result;
});


Route::get('sms/admission/get-course-subject/{institute_code}/{faculty_id}/{course_code}', function($institute_code,$faculty_id,$course_code){
	
	$result='<option value="" selected disabled >Select</option>';
	//DB::enableQueryLog();
	$subject_rs=DB::Table('subject_configuration')
		->leftJoin('subject','subject_configuration.subject_code','=','subject.subject_code')
		->where('subject_configuration.institute_code','=',$institute_code)
		->where('subject_configuration.faculty_id','=',$faculty_id)
		->where('subject_configuration.course_code','=',$course_code)
		->orderby('subject.subject_name')->get();
		//dd(DB::getQueryLog());
		//dd($fees_head_details_rs);
	
	foreach($subject_rs as $subject)
	{
		$result .= '<option value="'.$subject->subject_code.'">'.$subject->subject_name.'</option>';
	}
	
	
			
	echo $result;
});


/*
Route::get('sms/room/get-course-subject-room/{institute_code}/{faculty_id}/{course_code}/{subject_code}', function($institute_code,$faculty_id,$course_code,$subject_code){
	
	$result='<option value="" selected disabled >Select</option>';
	//DB::enableQueryLog();
	$room_number_rs=DB::Table('room_config')
		->leftJoin('room','room_config.room_code','=','room.room_code')
		->where('room_config.institute_code','=',$institute_code)
		->where('room_config.faculty_id','=',$faculty_id)
		->where('room_config.course_code','=',$course_code)
		->where('room_config.subject_code','=',$subject_code)
		->orderby('room.room_number')->get();
		//dd(DB::getQueryLog());
		//dd($fees_head_details_rs);
	
	foreach($room_number_rs as $room)
	{
		$result .= '<option value="'.$room->room_code.'">'.$room->room_number.'</option>';
	}
	
	
			
	echo $result;
});
*/

/************************************************************** PROCUREMENT STARTS ******************************************************/


Route::get('procurement/indent/get-add-row/{row}', function($row){
	
	$row=$row+1;
	$unit_rs = Unit::where('unit_status','=','active')->get();
	$result_status="<option value='' selected disabled>Select</option>";
	foreach($unit_rs as $unit)
	{
		$result_status.='<option value="'.$unit['id'].'">'.$unit['unit_name'].'</option>';
	}
	$component_rs = Component::where('component_status','=','active')->get();
	//dd($component_rs);
	$result_status1="<option value='' selected disabled>Select</option>";
	foreach($component_rs as $component)
	{
        $result_status1.='<option value="'.$component['id'].'">'.$component['component_name'].'</option>';
	}
						
	
	$result='<div class="row form-group lv-due-body itemslot'.$row.'">
                    <div class="col-md-3">
					
                      
                     <select class="form-control" name="component_id[]" onchange="getdetails(this.value,'.$row.');">
                        
                        '.$result_status1.'
                      </select>	
					  </div>
					  <div class="col-md-2">
                      
                      <input type="text" class="form-control" name="component_type[]" id="component_type'.$row.'">
					   
                    </div>
					  <div class="col-md-2">
                      
                      <input type="text" class="form-control" name="unit[]" id="unit'.$row.'">
						<input type="hidden" class="form-control" name="unit_id[]" id="unit_id'.$row.'">
					  
					  </div>
					  <div class="col-md-3">
                     
                      <input type="text" class="form-control" name="required_qty[]">
                    </div>
					  <div class="col-md-2" style="text-align: right;">
					  	<button type="button" class="btn btn-danger" id="add'.$row.'" onClick="addnewrow('.$row.')" data-id="'.$row.'"><i class="fa fa-plus" aria-hidden="true"></i></button>
						<button type="button" class="btn btn-danger" onClick="del('.$row.')"> <i class="fa fa-remove" aria-hidden="true"></i></button>
					  </div>
					  
					  </div>';
	echo $result;
});


Route::get('procurement/indent/get-add-row-item/{row}', function($row){

    $row=$row+1;
    $unit_rs = Unit::where('unit_status','=','active')->get();

    $result_status="<option value='' selected disabled>Select</option>";

    foreach($unit_rs as $unit)
    {
        $result_status.='<option value="'.$unit['id'].'">'.$unit['unit_name'].'</option>';
    }

    $item_rs = Item::where('status','=','active')->get();

    //dd($component_rs);
    $result_status1="<option value='' selected disabled>Select</option>";
    foreach($item_rs as $item)
    {
        $result_status1.='<option value="'.$item['item_code'].'">'.$item['name'].'</option>';
    }


    $result='<div class="row form-group itemslot lv-due-body'.$row.'" id='.$row.'>
                    <div class="col-md-3">
                    
                      
                     <select class="form-control" name="item_code[]" id="item_code'.$row.'" onchange="getdetails(this.value,'.$row.');">
                        
                        '.$result_status1.'
                      </select> 
                      </div>
                      <div class="col-md-2">
                     
                      <input type="text" class="form-control" name="item_type[]" readonly id="item_type'.$row.'">
                       
                      </div>
                      <div class="col-md-2">
                     
                      <input type="text" class="form-control" readonly  id="unit'.$row.'">
                      <input type="hidden" class="form-control" name="unit_id[]"  id="unit_id'.$row.'">
                      </div>
                      <div class="col-md-3">
                     
                      <input type="text" class="form-control" name="required_qty[]" id="required_qty'.$row.'" onkeypress="checkQuantity('.$row.')" required>
                    </div>
                      
                      <div class="col-md-2 btn-up" style="text-align: right;">
                        <button type="button" style="margin-top: -50px;" class="btn btn-danger btn-add" id="add'.$row.'" onClick="addnewrow('.$row.')" data-id="'.$row.'"><i class="fa fa-plus" aria-hidden="true"></i>Add More</button>
                      </div>
                      <div class="col-md-2 btn-up" style="text-align: right;">
                        <button type="button" class="btn btn-danger deleteButton" id="del'.$row.'" style="background: #d00404; border-color: #d00404; margin-top: -26px;" onClick="delRow('.$row.')"> <i class="fa fa-remove" aria-hidden="true">Remove</i></button>
                      </div>
                      
                      
                        
                      </div>
                      
                      </div>';
    echo $result;
});

Route::get('procurement/indent/get-add-row-req-item/{row}', function($row){

	$row=$row+1;
    // dd($row);
	$unit_rs = Unit::where('unit_status','=','active')->get();
	$result_status="<option value='' selected disabled>Select</option>";
	foreach($unit_rs as $unit)
	{
		$result_status.='<option value="'.$unit['id'].'">'.$unit['unit_name'].'</option>';
	}
	$item_rs = Item::where('status','=','active')->get();
	//dd($component_rs);
	$result_status1="<option value='' selected disabled>Select</option>";
	foreach($item_rs as $item)
	{
        $result_status1.='<option value="'.$item['item_code'].'">'.$item['name'].'</option>';
	}


	$result=' <div class="row form-group lv-due-body itemslot'.$row.'">
                    <div class="col-md-2">
					
                      <select class="form-control" name="item_code[]" onchange="getdetails(this.value,'.$row.');">
                      
                        '.$result_status1.'
                      </select>
					  
					  </div>
					  <div class="col-md-2">
                      
                      <input type="text" class="form-control" name="item_type[]" id="item_type'.$row.'" readonly>
                    </div>
					<div class="col-md-2">
						
						<input type="text" class="form-control"  id="unit'.$row.'" readonly>
					  <input type="hidden" class="form-control" name="unit_id[]" id="unit_id'.$row.'">
					   
					</div>
					<div class="col-md-1">
						
						<input type="text" class="form-control" id="price'.$row.'" name="price[]" required>
					</div>
					<div class="col-md-1">
						
						<input type="text" class="form-control" id="quantity'.$row.'" name="quantity[]" onblur="gettotal('.$row.');" required>
					</div>
					<div class="col-md-2">
						
						<input type="text" class="form-control" id="total'.$row.'" name="total[]" readonly>
					</div>
					  <div class="col-md-2">
					  	
						<button type="button" class="btn btn-danger deleteButton" onClick="del('.$row.')" style="background-color: #c53f09 !important; border-color: #c53f09 !important;"> <i class="fa fa-trash" aria-hidden="true"></i>Remove</button>
					  </div>
					  
					  </div>';
	echo $result;
});

Route::get('procurement/indent/get-add-row-req-comp/{row}', function($row){
	
	$row=$row+1;
	$unit_rs = Unit::where('unit_status','=','active')->get();
	$result_status="<option value='' selected disabled>Select</option>";
	foreach($unit_rs as $unit)
	{
		$result_status.='<option value="'.$unit['id'].'">'.$unit['unit_name'].'</option>';
	}
	$component_rs = Component::where('component_status','=','active')->get();
	//dd($component_rs);
	$result_status1="<option value='' selected disabled>Select</option>";
	foreach($component_rs as $component)
	{
        $result_status1.='<option value="'.$component['id'].'">'.$component['component_name'].'</option>';
	}
						
	
	$result=' <div class="row form-group lv-due-body itemslot'.$row.'">
                    <div class="col-md-2">
					
                      <select class="form-control" name="component_id[]" onchange="getdetails(this.value,'.$row.');">
                      
                        '.$result_status1.'
                      </select>
					  
					  </div>
					  <div class="col-md-2">
                      
                      <input type="text" class="form-control" name="component_type[]" id="component_type'.$row.'">
                    </div>
					<div class="col-md-2">
						
						<input type="text" class="form-control" name="unit[]" id="unit'.$row.'">
						<input type="hidden" class="form-control" name="unit_id[]" id="unit_id'.$row.'">
					   
					</div>
					<div class="col-md-1">
						
						<input type="text" class="form-control" id="price'.$row.'" name="price[]">
					</div>
					<div class="col-md-1">
						
						<input type="text" class="form-control" id="quantity'.$row.'" name="quantity[]" onblur="gettotal('.$row.');">
					</div>
					<div class="col-md-2">
						
						<input type="text" class="form-control" id="total'.$row.'" name="total[]">
					</div>
					  <div class="col-md-2">
					  	<button type="button" class="btn btn-danger" id="add'.$row.'" onClick="addnewrow('.$row.')" data-id="'.$row.'"><i class="fa fa-plus" aria-hidden="true"></i></button>
						<button type="button" class="btn btn-danger" onClick="del('.$row.')"> <i class="fa fa-remove" aria-hidden="true"></i></button>
					  </div>
					  
					  </div>';
	echo $result;
});

Route::get('procurement/indent/get-comp-details/{comp_id}/{row}', function($comp_id,$row){
	
	//$row=$row+1;
	$comp_detail_rs=DB::Table('component')
	->leftJoin('unit','component.unit_id','=','unit.id')
	->select('component.component_name','component.unit_id','component.rate','component.component_type','unit.unit_name')
	->where('component.id','=',$comp_id)
	->get()->first();
	//dd($comp_detail_rs);
	
	
	echo json_encode($comp_detail_rs);
});

Route::get('procurement/indent/get-item-details/{item_code}/{row}', function($item_code,$row){

	$item_detail_rs=DB::Table('item')
					->leftJoin('unit','item.unit_id','=','unit.id')
					->select('item.type as item_type','unit.unit_name','item.unit_id')
					->where('item.item_code','=',$item_code)
					->first();
//    print_r($item_detail_rs); exit;
	echo json_encode($item_detail_rs);
});

Route::get('procurement/indent/get-item-stock/{item_code}/{row}', function ($item_code,$row) {
    $item_stock_rs = $item_stocks =  DB::table('stock_masters')
                ->where('item_id', $item_code)
                ->select('closing_balance')
                ->first();
//    dd($item_stock_rs);
    if ($item_stock_rs == '')
    {
        $item_stocks = DB::table('stock_opening')
                    ->where('item_id', $item_code)
                    ->select('closing_stock')
                    ->first();
    }
//    dd($item_stocks);
    echo json_encode($item_stocks);
});

Route::get('procurement/purchase/get-comp-req-details/{req_no}', function($req_no){
	
	//$row=$row+1;
	$req_rs = DB::Table('requisition_component')
			->leftJoin('component','requisition_component.component_id','=','component.id')
			->leftJoin('unit','requisition_component.unit_id','=','unit.id')
			->where('requisition_no','=',$req_no)
			->where('requisition_component.status','=','Approved')
			->select('requisition_component.*','component.component_name','unit.unit_name')
			->get();
	//dd($req_rs);
	$result='';
	$i=1;
	foreach($req_rs as $req)
	{
		
		$result.='<div class="row form-group lv-due-body" id="itemslot'.$i.'">
                    <div class="col-md-1">
                      <label for="text-input" class=" form-control-label">Component</label>
                      <input type="text" class="form-control" readonly=""  value="'.$req->component_name.'">
					  <input type="hidden" class="form-control" readonly="" name="component_id[]" value="'.$req->component_id.'">
					  </div>
					  <div class="col-md-1">
						<label>Qty</label>
						<input type="text" class="form-control" readonly="" id="qty'.$i.'" name="qty[]" value="'.$req->quantity.'">
						<input type="hidden" class="form-control"  id="balance_qty'.$i.'" name="balance_qty[]" value="'.$req->quantity.'">
					</div>
					<div class="col-md-1">
						<label>Unit</label>
						<input type="text" readonly="" value="'.$req->unit_name.'" class="form-control">
						<input type="hidden" readonly="" name="unit_id[]" value="'.$req->unit_id.'" class="form-control">
					</div>
					<div class="col-md-1">
						<label>Price</label>
						<input type="text" class="form-control" readonly="" id="price'.$i.'" name="price[]" value="'.$req->price.'">
					</div>
					  <div class="col-md-2">
                      <label for="text-input" class=" form-control-label">Offer Price</label>
                      <input type="text" class="form-control" id="offer_price'.$i.'" name="offer_price[]" onblur="gettotalwithouttax('.$i.');">
                    </div>
					 <div class="col-md-1">
                      <label for="text-input" class=" form-control-label">Tax</label>
                      <input type="text" class="form-control" name="tax[]" id="tax'.$i.'" onblur="gettotalwithtax('.$i.')">
                    </div>
					
					
					<div class="col-md-2">
						<label>Total Without Tax</label>
						<input type="text" class="form-control" name="total_without_tax[]" id="total_without_tax'.$i.'">
					</div>
					<div class="col-md-2">
						<label>Total With Tax</label>
						<input type="text" class="form-control" name="total_with_tax[]" id="total_with_tax'.$i.'">
					</div>
					<div class="col-md-1 btn-up">
						<button type="button" class="btn btn-danger" onClick="del('.$i.')"> <i class="fa fa-remove" aria-hidden="true"></i></button>
					  </div>  
					  </div> 
					  ';
					  $i++;
	}
	echo $result;
});


Route::get('procurement/purchase/get-comp-req-info/{req_no}', function($req_no){
	
	//$row=$row+1;
	$req_info_rs = DB::Table('requisition_component')
			->where('requisition_no','=',$req_no)
			->select('requisition_component.*')
			->get()->first();
	//dd($req_info_rs);
	$result1='';
	
	$result1.='  <div class="col-md-4">
					 <label>Institute Name</label>
						<input type="text" class="form-control" readonly="" value="'.$req_info_rs->institute_name.'" name="institute_name">
					 </div>
					 <div class="col-md-4">
					 	<label>Requisition Made by Department</label>
						<input type="text" class="form-control" readonly="" value="'.$req_info_rs->department_name.'" name="department_name">
					 </div>
					  <div class="col-md-4">
					  <label>Requisition Made By</label>
					  <input type="text" class="form-control" readonly="" value="'.$req_info_rs->requisition_made_by.'" name="requisition_made_by">
					  </div>';

	echo $result1;
});

///////////////////////////////////////////////////////// PO ITEM ///////////////////////////////////////////////////////////

Route::get('procurement/purchase/get-req-details/{req_no}', function($req_no){

	//$row=$row+1;
	$req_rs = DB::Table('requisition_item')
			->leftJoin('item','requisition_item.item_code','=','item.item_code')
			->leftJoin('unit','requisition_item.unit_id','=','unit.id')
			->where('requisition_no','=',$req_no)
			->where('requisition_item.status','=','Approved')
			->select('requisition_item.*','item.name as item_name','unit.unit_name', 'item.id as item_id')
			->get();
//	 dd($req_rs);



	$result='';
	$i=1;
	foreach($req_rs as $req)
	{

		$result.='<div class="row form-group lv-due-body" id="itemslot'.$i.'">
                    <div class="col-md-1">
                      <label for="text-input" class=" form-control-label">Item</label>
                      <input type="text" class="form-control" readonly=""  value="'.$req->item_name.'">
                      <input type="hidden" class="form-control" readonly="" id="item_id'.$i.'" name="item_id[]" value="'.$req->item_id.'">
					  <input type="hidden" class="form-control" readonly="" id="item_code'.$i.'" name="item_code[]" value="'.$req->item_code.'">
					  </div>
					  <div class="col-md-1">
						<label>Qty</label>
						<input type="text" class="form-control" readonly="" id="qty'.$i.'" name="qty[]" value="'.$req->quantity.'">
						<input type="hidden" class="form-control"  id="balance_qty'.$i.'" name="balance_qty[]" value="'.$req->quantity.'">
					</div>
					<div class="col-md-1">
						<label>Unit</label>
						<input type="text" readonly="" value="'.$req->unit_name.'" class="form-control">
						<input type="hidden" readonly="" name="unit_id[]" value="'.$req->unit_id.'" class="form-control">
					</div>
					<div class="col-md-1">
						<label>Price</label>
						<input type="text" class="form-control" readonly="" id="price'.$i.'" name="price[]" value="'.$req->price.'">
					</div>
					  <div class="col-md-2">
                      <label for="text-input" class=" form-control-label">Offer Price</label>
                      <input type="text" class="form-control" id="offer_price'.$i.'" name="offer_price[]" onblur="gettotalwithouttax('.$i.');">
                    </div>
                    <div class="col-md-1">
                      <label for="text-input" class=" form-control-label">SGST</label>
                      <input type="text" class="form-control" name="sgst[]" id="sgst'.$i.'" value="0" readonly onblur="gettotalwithtax('.$i.')">
                    </div>
					 <div class="col-md-1">
                      <label for="text-input" class=" form-control-label">CGST</label>
                      <input type="text" class="form-control" name="cgst[]" id="cgst'.$i.'" value="0" readonly >
                    </div>
                    <div class="col-md-1">
                      <label for="text-input" class=" form-control-label">IGST</label>
                      <input type="text" class="form-control" name="igst[]" value="0" id="igst'.$i.'" readonly onblur="gettotalwithtax('.$i.')">
                    </div>
					
					
					<div class="col-md-3">
						<label>Total Without Tax</label>
						<input type="text" class="form-control" name="total_without_tax[]" id="total_without_tax'.$i.'" readonly required>
					</div>
					<div class="col-md-3">
						<label>Total With Tax</label>
						<input type="text" class="form-control" name="total_with_tax[]" id="total_with_tax'.$i.'" readonly required>
					</div>
					<div class="col-md-1 btn-up">
						<button type="button" class="btn btn-danger" style="background: #d00404; border-color: #d00404;" onClick="del('.$i.')"> <i class="fa fa-remove" aria-hidden="true"></i>Remove</button>
					  </div>  
					  </div> 
					  ';
					  $i++;
	}
	echo $result;
});

Route::get('procurement/purchase/get-supplier-state/{supplier_id}/{item_id}', function($supplier_id,$item_id){
//    dd($supplier_id);
    $result = array();

    $supplier = DB::Table('supplier')->where('id', $supplier_id)->first();
    $result['supplier_state'] = $supplier->supplier_state;
//    dd($result['supplier']);
    $item = DB::table('item')->where('id', $item_id)->first();

    $result['gst'] = $item->gst;
//    if($supplier->supplier_state == 'WB')
//    {
//        $result['gst'] = ($item->gst)/2;
////        dd($result['gst']);
//    }
//    else{
//        $result['gst'] = $item->gst;
//    }
//    dd($result);

    echo json_encode($result);
//    response()->json($result);
});

Route::get('procurement/purchase/get-req-info/{req_no}', function($req_no){
	
	//$row=$row+1;
	$req_info_rs = DB::Table('requisition_item')
            ->leftJoin('employee','requisition_item.requisition_made_by','=','employee.emp_code')
			->where('requisition_no','=',$req_no)
			->select('requisition_item.*', 'employee.emp_fname', 'employee.emp_mname', 'employee.emp_lname')
			->get()->first();
	//dd($req_info_rs);
	$result1='';
	
	$result1.='  
					 <div class="col-md-4">
					 	<label>Requisition Made by Department</label>
						<input type="text" class="form-control" readonly="" value="'.$req_info_rs->department_name.'" name="department_name">
					 </div>
					  <div class="col-md-4">
					  <label>Requisition Made By</label>
					  <input type="text" class="form-control" readonly="" value="'.$req_info_rs->emp_fname.' '.$req_info_rs->emp_mname.' '.$req_info_rs->emp_lname.'" name="requisition_made_by">
					  </div>';

	echo $result1;
});


//////////////////////////////////////////////////////// END OF PO ITEM ////////////////////////////////////////////////////


////////////////////////////////// GRN COMPONENT ////////////////////////////////////////////////////////////////

Route::get('procurement/purchase/grnwith-po/{po_status}', function($po_status){
	
	
	$result1='';
	$pr_no_rs = DB::Table('purchase_component')
				->where('status','!=','GRN Completed')
				->groupBy('requisition_no')
				->select('*')->get();
	if($po_status == 'with')
	{
	$result1='<label>PO Number</label>
				<select class="form-control" name="purchase_order_no" onchange="getpocomp(this.value);" required>
					<option value="" selected disabled>Select</option>';
					foreach($pr_no_rs as $pr_no)
					{
				$result1.='<option value="'.$pr_no->purchase_order_no.'">'.$pr_no->purchase_order_no.'</option>';
					}
				$result1.='</select>';
	}
	
	echo $result1;
});

Route::get('procurement/purchase/grnwith-po-details/{po_no}', function($po_no){
	
	//$row=$row+1;
	$po_info_rs = DB::Table('purchase_component')
			->leftJoin('component','purchase_component.component_id','=','component.id')
			->leftJoin('unit','purchase_component.unit_id','=','unit.id')
			->where('purchase_component.purchase_order_no','=',$po_no)
			->where('status','!=','GRN Completed')
			->select('purchase_component.*','component.component_name','unit.unit_name')
			->get();
	//dd($po_info_rs);
	$result1='';
	$i=1;
	foreach($po_info_rs as $po_info)
	{
	$result1.=' <div class="row form-group lv-due-body">
                    <div class="col-md-2">
                      <label for="text-input" class=" form-control-label">Component</label>
					  <input type="hidden" class="form-control" name="requisition_no[]" value="'.$po_info->requisition_no.'">
                      <input type="text" class="form-control" readonly="" value="'.$po_info->component_name.'">
					  <input type="hidden" class="form-control" name="component_id[]" value="'.$po_info->component_id.'">
					  </div>
					 
					<div class="col-md-2">
						<label>Unit</label>
						<input type="text" readonly="" value="'.$po_info->unit_name.'"  class="form-control">
						<input type="hidden"  value="'.$po_info->unit_id.'" name="unit_id[]"  class="form-control">
					</div>
					 <div class="col-md-2">
						<label>Order Qty</label>
						<input type="text" class="form-control" readonly="" id="order_qty'.$i.'" name="qty[]" value="'.$po_info->qty.'">
					</div>
					<div class="col-md-2">
						<label>Balance Qty</label>
						<input type="text" class="form-control" readonly="" name="balance_qty[]" id="balance_qty'.$i.'" value="'.$po_info->balance_qty.'">
					</div>
					<div class="col-md-2">
						<label>Total</label>
						<input type="hidden"  value="'.$po_info->price.'" name="price[]"  class="form-control">
						<input type="text" class="form-control" readonly="" name="total_without_tax[]" value="'.$po_info->total_without_tax.'">
					</div>
					  <div class="col-md-2">
                      <label for="text-input" class=" form-control-label">Tax</label>
                      <input type="text" class="form-control" readonly="" name="tax[]" value="'.$po_info->tax.'">
                    </div>
					 <div class="col-md-2">
                      <label for="text-input" class=" form-control-label">Tot(Inc Tax)</label>
                      <input type="text" class="form-control" readonly="" name="total_with_tax[]" value="'.$po_info->total_with_tax.'">
                    </div>
					
					
					<div class="col-md-2">
						<label>Delivery Date</label>
						<input type="text" class="form-control" readonly="" name="delivery_date[]" value="'.$po_info->delivery_date.'">
					</div>
					<div class="col-md-2">
						<label>Rcv Qty</label>
						<input type="text" class="form-control" name="receive_qty[]" id="receive_qty'.$i.'" onblur="getbalance('.$i.');">
					</div>
					  <div class="col-md-3">
						<label>Date of Rcv</label>
						<input type="date" class="form-control" name="receive_date[]">
					  </div>
					  
					  </div>
					  </div>
					  
					';
					$i++;
	}
	$result1.='<div class="row form-group">
                     <div class="col-md-4">
					 <label>Institute Name</label>
					 <input type="text" class="form-control" readonly="" name="institute_name" value="'.$po_info->institute_name.'">
					 </div>
					 <div class="col-md-4">
					 	<label>Requisition Made by Department</label>
						<input type="text" class="form-control" readonly="" name="department_name" value="'.$po_info->department_name.'">
					 </div>
					  <div class="col-md-4">
					  <label>Requisition Made By</label>
					  <input type="text" class="form-control" readonly="" name="requisition_made_by" value="'.$po_info->requisition_made_by.'">
					  </div>
					  </div>';
	echo $result1;
});


Route::get('procurement/purchase/grnwithout-po/{po_status}', function($po_status){
	
	$component_rs = DB::Table('component')
					->where('component_status','=','active')
					->select('*')
					->get();
	$tr_id = 1;
	$result1='';
	$result1.='   <div class="row form-group lv-due-body">
                    <div class="col-md-3">
                      <label for="text-input" class=" form-control-label">Select Component</label>
                      <select class="form-control" name="component_id[]" onchange="getcompinfo(this.value,'.$tr_id.');">
							<option value="" selected disabled>Select</option>';
							foreach($component_rs as $component)
							{
								
					$result1.='<option value="'.$component->id.'">'.$component->component_name.'</option>';
							}
				$result1.='</select>
					  </div>
					  <div class="col-md-2">
						<label>Price</label>
						<input type="text" class="form-control" name="price[]" id="price'.$tr_id.'">
					</div>
					<div class="col-md-1">
						<label>Qty</label>
						<input type="text" class="form-control" name="qty[]" id="qty'.$tr_id.'" onblur="getqty('.$tr_id.');">
					</div>
					<div class="col-md-1">
						<label>Tax</label>
						<input type="text" class="form-control" name="tax[]" id="tax'.$tr_id.'" onblur="gettotal('.$tr_id.');">
					</div>
					  <div class="col-md-2">
                      <label for="text-input" class=" form-control-label">Total(with tax)</label>
                      <input type="text" class="form-control" name="total_with_tax[]" id="total_with_tax'.$tr_id.'">
                    </div>
					 <div class="col-md-1">
                      <label for="text-input" class=" form-control-label">R Qty</label>
                      <input type="text" class="form-control" name="receive_qty[]" id="receive_qty'.$tr_id.'" readonly="">
                    </div>
					
					
					
					  <div class="col-md-2 btn-up">
					  <button type="button" class="btn btn-danger" id="add'.$tr_id.'" onclick="addnewrow('.$tr_id.')" data-id="1"><i class="fa fa-plus" aria-hidden="true"></i></button>
						<button type="button" class="btn btn-danger" onClick="del('.$tr_id.')"> <i class="fa fa-remove" aria-hidden="true"></i></button>
					  </div>
					  
					  </div>
					  <div class="addrow"></div>
					  </div>
					  
					';
	
	$result1.=' <div class="row form-group">
                     <div class="col-md-4">
					 <label>Institute Name</label>
					 <input type="text" class="form-control" readonly="" value="Adamas University" name="institute_name">
					 </div>
					 <div class="col-md-4">
					 	<label>Requisition Made by Department</label>
						<input type="text" class="form-control" readonly="" value="Department Name" name="department_name">
					 </div>
					  <div class="col-md-4">
					  <label>Requisition Made By</label>
					  <input type="text" class="form-control" readonly="" value="Amitava Banerjee" name="requisition_made_by">
					  </div>
					  </div>';
	$result1.='<fieldset>
					  <div class="row form-group">
					  <div class="col-md-4">
					  	<label>Receive Date  </label>
						<input type="date" class="form-control" name="receive_date">
					  </div>
						<div class="col-md-4">
					  	<label>Vendor Name</label>
						<input type="text" class="form-control" name="vendor_name">
					  </div>
					  <div class="col-md-4">
					  	<label>Supplier Address</label>
						<input type="text" class="form-control" name="supplier_address">
					  </div>
					</div>
					<div class="row form-group">
					  
						
					  <div class="col-md-4">
					  	<label>Supplier Phone</label>
						<input type="text" class="form-control" name="supplier_phone">
					  </div>
					  <div class="col-md-4">
							<label>Supplier GSTIN No.</label>
							<input type="text" class="form-control" name="supplier_gstin">
						</div>
						</div>
						</fieldset>';
	echo $result1;
});

Route::get('procurement/purchase/get-add-row-grn-comp/{row}', function($row){
	
	$row=$row+1;
	$component_rs = DB::Table('component')
					->where('component_status','=','active')
					->select('*')
					->get();
	$result='';
	
	$result='<div class="row form-group lv-due-body itemslot'.$row.'">
                    <div class="col-md-3">
                      
                      <select class="form-control" name="component_id[]" onchange="getcompinfo(this.value,'.$row.');">
							<option value="" selected disabled>Select</option>';
							foreach($component_rs as $component)
							{
								
					$result.='<option value="'.$component->id.'">'.$component->component_name.'</option>';
							}
				$result.='</select>
					  </div>
					  <div class="col-md-2">
						
						<input type="text" class="form-control" name="price[]" id="price'.$row.'">
					</div>
					<div class="col-md-1">
						
						<input type="text" class="form-control" name="qty[]" id="qty'.$row.'"  onblur="getqty('.$row.');">
					</div>
					<div class="col-md-1">
						
						<input type="text" class="form-control" name="tax[]" id="tax'.$row.'" onblur="gettotal('.$row.')">
					</div>
					  <div class="col-md-2">
                      
                      <input type="text" class="form-control" name="total_with_tax[]" id="total_with_tax'.$row.'">
                    </div>
					 <div class="col-md-1">
                     
                      <input type="text" class="form-control" name="receive_qty[]" id="receive_qty'.$row.'" readonly>
                    </div>
					
					
					
					  <div class="col-md-2">
					  <button type="button" class="btn btn-danger" id="add'.$row.'" onclick="addnewrow('.$row.')" data-id="1"><i class="fa fa-plus" aria-hidden="true"></i></button>
						<button type="button" class="btn btn-danger" onClick="del('.$row.')"> <i class="fa fa-remove" aria-hidden="true"></i></button>
					  </div>
					  
					  </div>';
	
	echo $result;

});

Route::get('procurement/purchase/get-comp-rate/{comp_id}/{row}', function($comp_id,$row){
	
	//$row=$row+1;
	$comp_detail_rs=DB::Table('component')
					->select('component.rate')
					->where('component.id','=',$comp_id)
					->get()->first();
	//dd($comp_detail_rs);
	
	
	echo json_encode($comp_detail_rs);
});

///////////////////////// End Of GRN Component //////////////////////////////////


//////////////////////////// GRN ITEM //////////////////////////////////////////

Route::get('procurement/purchase/itemgrnwith-po/{po_status}', function($po_status){
	
	
	$result1='';
	$pr_no_rs = DB::Table('purchase_item')
				->where('status','!=','GRN Completed')
				->groupBy('requisition_no')
				->select('*')->get();
	if($po_status == 'with')
	{
	$result1='<label>PO Number</label>
				<select class="form-control" name="purchase_order_no" onchange="getpoitem(this.value);">
					<option value="" selected disabled>Select</option>';
					foreach($pr_no_rs as $pr_no)
					{
				$result1.='<option value="'.$pr_no->purchase_order_no.'">'.$pr_no->purchase_order_no.'</option>';
					}
				$result1.='</select>';
	}
	
	echo $result1;
});

Route::get('procurement/purchase/itemgrnwith-po-details/{po_no}', function($po_no){
	
	//$row=$row+1;
	$po_info_rs = DB::Table('purchase_item')
			->leftJoin('item','purchase_item.item_code','=','item.item_code')
			->leftJoin('unit','purchase_item.unit_id','=','unit.id')
			->where('purchase_item.purchase_order_no','=',$po_no)
			->where('purchase_item.status','!=','GRN Completed')
			->select('purchase_item.*','item.name as item_name','unit.unit_name')
			->get();
	// dd($po_info_rs);
	$result1='';
	$i=1;
	foreach($po_info_rs as $po_info)
	{
	$result1.=' <div class="row form-group lv-due-body">
                    <div class="col-md-2">
                      <label for="text-input" class=" form-control-label">Item</label>
					  <input type="hidden" class="form-control" name="requisition_no[]" value="'.$po_info->requisition_no.'">
                      <input type="text" class="form-control" readonly="" value="'.$po_info->item_name.'">
					  <input type="hidden" class="form-control" name="item_code[]" value="'.$po_info->item_code.'">
					  </div>
					 
					<div class="col-md-2">
						<label>Unit</label>
						<input type="text" readonly="" value="'.$po_info->unit_name.'"  class="form-control">
						<input type="hidden"  value="'.$po_info->unit_id.'" name="unit_id[]"  class="form-control">
					</div>
					 <div class="col-md-2">
						<label>Order Qty</label>
						<input type="text" class="form-control" readonly="" id="order_qty'.$i.'" name="qty[]" value="'.$po_info->qty.'">
					</div>
                    <div class="col-md-2">
                        <label>Rcv Qty</label>
                        <input type="text" class="form-control" name="receive_qty[]" id="receive_qty'.$i.'" onblur="getbalance('.$i.');" required value="0">
                    </div>
					<div class="col-md-2">
						<label>Balance Qty</label>
						<input type="text" class="form-control" readonly="" name="balance_qty[]" id="balance_qty'.$i.'" value="'.$po_info->balance_qty.'">
					</div>
					<div class="col-md-2">
						<label>Total</label>
						<input type="hidden"  value="'.$po_info->price.'" name="price[]"  class="form-control">
						<input type="text" class="form-control" readonly="" name="total_without_tax[]" value="'.$po_info->total_without_tax.'">
					</div>
					 <div class="col-md-1">
                      <label for="text-input" class=" form-control-label">SGST</label>
                      <input type="text" class="form-control" name="sgst[]" id="sgst'.$i.'" value="'.$po_info->sgst.'" readonly >
                    </div>
                     <div class="col-md-1">
                      <label for="text-input" class=" form-control-label">CGST</label>
                      <input type="text" class="form-control" name="cgst[]" id="cgst'.$i.'" readonly value="'.$po_info->cgst.'" >
                    </div>
                    <div class="col-md-1">
                      <label for="text-input" class=" form-control-label">IGST</label>
                      <input type="text" class="form-control" name="igst[]" id="igst'.$i.'" readonly value="'.$po_info->igst.'">
                    </div>
                    
					 <div class="col-md-2">
                      <label for="text-input" class=" form-control-label">Tot(Inc Tax)</label>
                      <input type="text" class="form-control" readonly="" name="total_with_tax[]" value="'.$po_info->total_with_tax.'">
                    </div>
					
					
					<div class="col-md-2">
						<label>Delivery Date</label>
						<input type="text" class="form-control" readonly="" name="delivery_date[]" value="'.$po_info->delivery_date.'">
					</div>
					
					  <div class="col-md-3">
						<label>Date of Rcv</label>
						<input type="date" class="form-control" name="receive_date[]" required>
					  </div>
					  
					  </div>
					  </div>
					  
					';
					$i++;
	}
	$result1.='<div class="row form-group">
                     
					 <div class="col-md-4">
					 	<label>Purchase Order Made by Department</label>
						<input type="text" class="form-control" readonly="" name="department_name" value="'.$po_info->department_name.'">
					 </div>
					  <div class="col-md-4">
					  <label>Purchase Order Made By</label>
					  <input type="text" class="form-control" readonly="" name="requisition_made_by" value="'.$po_info->requisition_made_by.'">
					  </div>
					  </div>';
	echo $result1;
});

Route::get('procurement/purchase/get-add-row-grn-item/{row}', function($row){
	
	$row=$row+1;
	$item_rs = DB::Table('item')
					->where('item_status','=','active')
					->select('*')
					->get();
	$result='';
	
	$result='<div class="row form-group lv-due-body itemslot'.$row.'">
                    <div class="col-md-3">
                      
                      <select class="form-control" name="item_code[]" >
							<option value="" selected disabled>Select</option>';
							foreach($item_rs as $item)
							{
								
					$result.='<option value="'.$item->item_code.'">'.$item->item_name.'</option>';
							}
				$result.='</select>
					  </div>
					  <div class="col-md-2">
						
						<input type="text" class="form-control" name="price[]" id="price'.$row.'">
					</div>
					<div class="col-md-1">
						
						<input type="text" class="form-control" name="qty[]" id="qty'.$row.'"  onblur="getqty('.$row.');">
					</div>
					<div class="col-md-1">
						
						<input type="text" class="form-control" name="tax[]" id="tax'.$row.'" onblur="gettotal('.$row.')">
					</div>
					  <div class="col-md-2">
                      
                      <input type="text" class="form-control" name="total_with_tax[]" id="total_with_tax'.$row.'">
                    </div>
					 <div class="col-md-1">
                     
                      <input type="text" class="form-control" name="receive_qty[]" id="receive_qty'.$row.'" readonly>
                    </div>
					
					
					
					  <div class="col-md-2">
					  <button type="button" class="btn btn-danger" id="add'.$row.'" onclick="addnewrow('.$row.')" data-id="1"><i class="fa fa-plus" aria-hidden="true"></i></button>
						<button type="button" class="btn btn-danger" onClick="del('.$row.')"> <i class="fa fa-remove" aria-hidden="true"></i></button>
					  </div>
					  
					  </div>';
	
	echo $result;

});

Route::get('procurement/purchase/itemgrnwithout-po/{po_status}', function($po_status){
	
	$item_rs = DB::Table('item')
					->where('item_status','=','active')
					->select('*')
					->get();
	$tr_id = 1;
	$result1='';
	$result1.='   <div class="row form-group lv-due-body">
                    <div class="col-md-3">
                      <label for="text-input" class=" form-control-label">Select Item</label>
                      <select class="form-control" name="item_code[]" >
							<option value="" selected disabled>Select</option>';
							foreach($item_rs as $item)
							{
								
					$result1.='<option value="'.$item->item_code.'">'.$item->item_name.'</option>';
							}
				$result1.='</select>
					  </div>
					  <div class="col-md-2">
						<label>Price</label>
						<input type="text" class="form-control" name="price[]" id="price'.$tr_id.'">
					</div>
					<div class="col-md-1">
						<label>Qty</label>
						<input type="text" class="form-control" name="qty[]" id="qty'.$tr_id.'" onblur="getqty('.$tr_id.');">
					</div>
					<div class="col-md-1">
						<label>Tax</label>
						<input type="text" class="form-control" name="tax[]" id="tax'.$tr_id.'" onblur="gettotal('.$tr_id.');">
					</div>
					  <div class="col-md-2">
                      <label for="text-input" class=" form-control-label">Total(with tax)</label>
                      <input type="text" class="form-control" name="total_with_tax[]" id="total_with_tax'.$tr_id.'">
                    </div>
					 <div class="col-md-1">
                      <label for="text-input" class=" form-control-label">R Qty</label>
                      <input type="text" class="form-control" name="receive_qty[]" id="receive_qty'.$tr_id.'" readonly="">
                    </div>
					
					
					
					  <div class="col-md-2 btn-up">
					  <button type="button" class="btn btn-danger" id="add'.$tr_id.'" onclick="addnewrow('.$tr_id.')" data-id="1"><i class="fa fa-plus" aria-hidden="true"></i></button>
						<button type="button" class="btn btn-danger" onClick="del('.$tr_id.')"> <i class="fa fa-remove" aria-hidden="true"></i></button>
					  </div>
					  
					  </div>
					  <div class="addrow"></div>
					  </div>
					  
					';
	
	$result1.=' <div class="row form-group">
                     <div class="col-md-4">
					 <label>Institute Name</label>
					 <input type="text" class="form-control" readonly="" value="Adamas University" name="institute_name">
					 </div>
					 <div class="col-md-4">
					 	<label>Requisition Made by Department</label>
						<input type="text" class="form-control" readonly="" value="Department Name" name="department_name">
					 </div>
					  <div class="col-md-4">
					  <label>Requisition Made By</label>
					  <input type="text" class="form-control" readonly="" value="Amitava Banerjee" name="requisition_made_by">
					  </div>
					  </div>';
	$result1.='<fieldset>
					  <div class="row form-group">
					  <div class="col-md-4">
					  	<label>Receive Date  </label>
						<input type="date" class="form-control" name="receive_date">
					  </div>
						<div class="col-md-4">
					  	<label>Vendor Name</label>
						<input type="text" class="form-control" name="vendor_name">
					  </div>
					  <div class="col-md-4">
					  	<label>Supplier Address</label>
						<input type="text" class="form-control" name="supplier_address">
					  </div>
					</div>
					<div class="row form-group">
					  
						
					  <div class="col-md-4">
					  	<label>Supplier Phone</label>
						<input type="text" class="form-control" name="supplier_phone">
					  </div>
					  <div class="col-md-4">
							<label>Supplier GSTIN No.</label>
							<input type="text" class="form-control" name="supplier_gstin">
						</div>
						</div>
						</fieldset>';
	echo $result1;
});


/*Route::get('procurement/purchase/get-item-rate/{item_code}/{row}', function($item_code,$row){
	$item_detail_rs=DB::Table('item')
					->select('item.rate')
					->where('item.item_code','=',$item_code)
					->get()->first();
	
	echo json_encode($item_detail_rs);
});*/

//////////////////////////////////////////// End Of GRN ITEM ////////////////////////////////////////////////////////////




/////////////////////////////////////////// Issue Component /////////////////////////////////////////////////////////////

Route::get('procurement/inventory/get-indent-component-details/{indent_no}', function($indent_no){
	DB::enableQueryLog();
	$indent_component_rs = DB::Table('indent_component')
					->leftJoin('component','indent_component.component_id','=','component.id')
					->leftJoin('unit','indent_component.unit_id','=','unit.id')
					->where('indent_no','=',$indent_no)
					->select('indent_component.*','component.component_name','unit.unit_name')
					->get();
	//dd(DB::getQueryLog());
	$tr_id = 1;
	$result1='';
	foreach($indent_component_rs as $indent_component)
	{
		$component_stock = DB::Table('stock_of_component')
								->where('component_id','=',$indent_component->component_id)
								->orderBy('id','desc')
								->select('closing_balance')
								->first();
		if($component_stock == '')
		{
			$stock_opening_component = DB::Table('stock_opening_component')
					->where('component_id','=',$indent_component->component_id)
					->select('closing_stock')
					->first();
			if($stock_opening_component == '')
			{
				
				$opening_stock = 0;
				//echo $opening_stock;die;
			}
			else
			{
			$opening_stock = $stock_opening_component->closing_stock;
			}
		}
		else
		{
			
			$opening_stock = $component_stock->closing_balance; 
		}
	$result1.='   <div class="col-md-2">
							<label for="text-input" class=" form-control-label">Component Name</label>
							<input type="text" class="form-control" readonly="" value="'.$indent_component->component_name.'">
							<input type="hidden" class="form-control" readonly="" name="component_id[]" value="'.$indent_component->component_id.'">
							</div>
							<div class="col-md-1">
								<label>Unit</label>
								<input type="text" class="form-control" readonly="" value="'.$indent_component->unit_name.'">
								<input type="hidden" class="form-control" readonly="" name="unit_id[]" value="'.$indent_component->unit_id.'">
							</div>
							<div class="col-md-2">
								<label>Opening Stock</label>
								<input type="text" class="form-control" readonly="" name="opening_stock[]" value="'.$opening_stock.'">
							</div>
							<div class="col-md-2">
								<label>Required Qty</label>
								<input type="text" class="form-control" readonly="" name="indent_required_qty[]" value="'.$indent_component->required_qty.'">
							</div>
							<div class="col-md-2">
								<label>Issue Qty</label>
								<input type="text" class="form-control" name="issue_qty[]">
							</div>
							<div class="col-md-2">
								<label>Issue Date</label>
								<input type="date" class="form-control" name="issue_date[]">
							</div>
					';
	}
	echo $result1;
});



///////////////////////////////////////////// End of Issue Component ///////////////////////////////////////////////////


/////////////////////////////////////////// Issue item /////////////////////////////////////////////////////////////

Route::get('procurement/inventory/get-indent-item-details/{indent_no}', function($indent_no){
	DB::enableQueryLog();
	$indent_item_rs = DB::Table('indent_item')
					->leftJoin('item','indent_item.item_id','=','item.item_code')
					->leftJoin('unit','indent_item.unit_id','=','unit.id')
					->where('indent_no','=',$indent_no)
                    ->where('indent_item.status', '=',  'approved')
					->select('indent_item.*','item.name as item_name','unit.unit_name')
					->get();
	// dd($indent_item_rs);
	$tr_id = 1;
	$result1='';
	foreach($indent_item_rs as $indent_item)
	{
		$item_stock = DB::Table('stock_masters')
								->where('item_id','=',$indent_item->item_id)
								->orderBy('id','desc')
								->select('closing_balance')
								->first();
		if($item_stock == '')
		{
			$stock_opening_item = DB::Table('stock_opening')
					->where('item_id','=',$indent_item->item_id)
					->select('closing_stock')
					->first();
			if($stock_opening_item == '')
			{

				$opening_stock = 0;
				//echo $opening_stock;die;
			}
			else
			{
			$opening_stock = $stock_opening_item->closing_stock;
			}
		}
		else
		{

			$opening_stock = $item_stock->closing_balance;
		}
	$result1.='<div class="col-md-2">
						<label for="text-input" class=" form-control-label">Item Name</label>
						<input type="text" class="form-control" readonly="" name="item_name[]" value="'.$indent_item->item_name.'">
						<input type="hidden" class="form-control" readonly="" id="item_code'.$indent_item->item_id.'" name="item_code[]" value="'.$indent_item->item_id.'">
						</div>
							<div class="col-md-1">
								<label>Unit</label>
								<input type="text" class="form-control" readonly="" value="'.$indent_item->unit_name.'">
								<input type="hidden" class="form-control" readonly="" name="unit_id[]" value="'.$indent_item->unit_id.'">
							</div>
							<div class="col-md-2">
								<label>Opening Stock</label>
								<input type="text" class="form-control" readonly="" name="opening_stock[]" value="'.$opening_stock.'">
							</div>
							<div class="col-md-2">
								<label>Required Qty</label>
								<input type="text" class="form-control" readonly="" name="indent_required_qty[]" value="'.$indent_item->required_qty.'">
							</div>
							<div class="col-md-1">
								<label>Issue Qty</label>
								<input type="text" class="form-control" name="issue_qty[]">
							</div>
							<div class="col-md-2">
								<label>Issue Date</label>
								<input type="date" class="form-control" name="issue_date[]">
							</div>
							<div class="col-md-2">
								<label>Remarks</label>
								<input type="text" class="form-control"  name="remarks[]">
							</div>
                            <!--<div class="col-md-1 pl0">
            
                            <a href="#myModal1" data-toggle="modal" class="btn btn-up btn-info" >Generate PR</a>-->
                            <!-- <a href="javascript:void(0)" id="'.$indent_item->item_id.'" onclick="myfunc()">hello</a> -->

                            <!--</div> -->
					';
	}
	echo $result1;
});



///////////////////////////////////////////// End of Issue item ///////////////////////////////////////////////////

//////////////////////////////////////////// Receive Component ////////////////////////////////////////////////////

Route::get('procurement/inventory/get-rcv-component-details/{grn_no}', function($grn_no){
	DB::enableQueryLog();
	$grn_component_rs = DB::Table('grn_component')
					->leftJoin('component','grn_component.component_id','=','component.id')
					->leftJoin('unit','grn_component.unit_id','=','unit.id')
					->where('grn_no','=',$grn_no)
					->select('grn_component.*','component.component_name','unit.unit_name')
					->get();
	//dd(DB::getQueryLog());
	$tr_id = 1;
	$result1='';
	foreach($grn_component_rs as $grn_component)
	{
		$component_stock = DB::Table('stock_of_component')
								->where('component_id','=',$grn_component->component_id)
								->orderBy('id','desc')
								->select('closing_balance')
								->first();
		if($component_stock == '')
		{
			$stock_opening_component = DB::Table('stock_opening_component')
					->where('component_id','=',$grn_component->component_id)
					->select('closing_stock')
					->first();
			
			$opening_stock = $stock_opening_component->closing_stock;
			$closing_stock = $grn_component->receive_qty + $stock_opening_component->closing_stock; 
			
		}
		else
		{
			$opening_stock = $component_stock->closing_balance; 
			$closing_stock = $grn_component->receive_qty + $component_stock->closing_balance; 
		}
	
	$result1.='   <div class="col-md-3">
							<label for="text-input" class=" form-control-label">Component Name</label>
							<input type="text" class="form-control" readonly="" value="'.$grn_component->component_name.'">
							<input type="hidden" class="form-control" readonly="" name="component_id[]" value="'.$grn_component->component_id.'">
						</div>
						<div class="col-md-1">
							<label>Unit</label>
							<input type="text" class="form-control" readonly="" value="'.$grn_component->unit_name.'">
							<input type="hidden" class="form-control" readonly="" name="unit_id[]" value="'.$grn_component->unit_id.'">
						</div>
						<div class="col-md-2">
							<label>Opening Stock</label>
							<input type="text" class="form-control" readonly="" name="opening_stock[]" value="'.$opening_stock.'">
						</div>
						<div class="col-md-2">
							<label>Recieve Qty</label>
							<input type="text" class="form-control" readonly="" name="receive_stock[]" value="'.$grn_component->receive_qty.'">
						</div>
						<div class="col-md-2">
							<label>Closing Qty</label>
							<input type="text" class="form-control" readonly="" name="closing_stock[]" value="'.$closing_stock.'">
						</div>
						<div class="col-md-2">
							<label>Recieve Date</label>
							<input type="date" class="form-control" name="rcv_date[]">
						</div>
					';
	}
	echo $result1;
});


//////////////////////////////////////////// End Of Receive Component ////////////////////////////////////////////


//////////////////////////////////////////// Receive Item ////////////////////////////////////////////////////

Route::get('procurement/inventory/get-rcv-item-details/{grn_no}', function($grn_no){
	DB::enableQueryLog();
	$grn_item_rs = DB::Table('grn_item')
					->leftJoin('item','grn_item.item_code','=','item.item_code')
					->leftJoin('unit','grn_item.unit_id','=','unit.id')
					->where('grn_no','=',$grn_no)
					->select('grn_item.*','item.name as item_name', 'item.type as item_type', 'unit.unit_name')
					->get();
	//dd(DB::getQueryLog());
                    // dd($grn_item_rs);
	$tr_id = 1;
	$result1='';


	foreach($grn_item_rs as $grn_item)
	{
		$item_stock = DB::Table('stock_masters')
								->where('item_id','=',$grn_item->item_code)
								->orderBy('id','desc')
								->select('closing_balance')
								->first();
                                // dd($item_stock);

        $check_assets_code = DB::Table('grn_item')
            ->leftJoin('stock_masters', 'grn_item.item_code', '=', 'stock_masters.item_id')
            ->where('item_code','=',$grn_item->item_code)
            ->orderBy('stock_masters.id','desc')
//            ->select('id')
            ->first();

        $latest_item_code = $check_assets_code->id;
        $item_unique_code = $check_assets_code->item_unique_code;
//        dd($check_assets_code);

        if($item_unique_code == '')
        {
            $number = "BOPT-".$grn_item->item_code."-".'1'."-".date('Y');
        }
        else {
            if ($grn_item->item_type == 'assets')
            {
                $number = "BOPT-".$grn_item->item_code."-".(($latest_item_code) + 1)."-".date('Y');
            }

        }
//        dd($number);

		if(is_null($item_stock))
		{

            $stock_opening_item = DB::Table('stock_opening')
				->where('item_id','=',$grn_item->item_code)
				->first();
            // dd($stock_opening_item->closing_stock);
                if($stock_opening_item->closing_stock)
                {
                    $opening_stock = $stock_opening_item->closing_stock;
                    $closing_stock = $grn_item->receive_qty + $stock_opening_item->closing_stock;
                }


		}
		else
		{

			$opening_stock = $item_stock->closing_balance;
			$closing_stock = $grn_item->receive_qty + $item_stock->closing_balance;
		}

	$result1.='   <div class="col-md-3">
							<label for="text-input" class=" form-control-label">Item Name</label>
							<input type="text" class="form-control" name="item_name[]" readonly="" value="'.$grn_item->item_name.'">
							<input type="hidden" class="form-control" readonly="" name="item_code[]" value="'.$grn_item->item_code.'">
                            <input type="hidden" class="form-control" id="asset_type'.$grn_item->id.'" onchange="" readonly=""  name="item_type[]" value="'.$grn_item->item_type.'">
                            <input type="hidden" class="form-control"  readonly="" id="item_unique_code'.$grn_item->id.'"  name="item_unique_code[]" value="'.$number.'">
						</div>
						<div class="col-md-1">
							<label>Unit</label>
							<input type="text" class="form-control" readonly="" value="'.$grn_item->unit_name.'">
							<input type="hidden" class="form-control" readonly="" name="unit_id[]" value="'.$grn_item->unit_id.'">
						</div>
						<div class="col-md-2">
							<label>Opening Stock</label>
							<input type="text" class="form-control" readonly="" name="opening_stock[]" value="'.$opening_stock.'">
						</div>
						<div class="col-md-2">
							<label>Recieve Qty</label>
							<input type="text" class="form-control" readonly="" name="receive_stock[]" value="'.$grn_item->receive_qty.'">
						</div>
						<div class="col-md-2">
							<label>Closing Qty</label>
							<input type="text" class="form-control" readonly="" name="closing_stock[]" value="'.$closing_stock.'">
						</div>
						<div class="col-md-2">
							<label>Recieve Date</label>
							<input type="date" class="form-control" name="rcv_date[]" required>
						</div>
					';
	}
	echo $result1;
});


//////////////////////////////////////////// End Of Receive Item ////////////////////////////////////////////





/****************************************************** END OF PROCUREMENT ****************************************************************/


/***************************************************** New added For Subject Configuration ************************************************/

Route::get('masters/get-course/{ins_id}/{school_id}', function($ins_id,$school_id){
	
	$course_config_rs=DB::Table('institute_wise_configuration')
				->where('institute_code','=',$ins_id)
				->where('faculty_id','=',$school_id)
				->get();
	
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($course_config_rs as $course_config)
	{
		$result .= '<option value="'.$course_config->course_code.'">'.$course_config->course_name.'</option>';
	}
	
	echo $result;
});

Route::get('masters/get-course-rice/{ins_id}/{school_id}', function($ins_id,$school_id){
	
	$course_config_rs=DB::Table('institute_wise_configuration')
				->where('institute_code','=',$ins_id)
				->where('rice_branch_code','=',$school_id)
				->get();
	
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($course_config_rs as $course_config)
	{
		$result .= '<option value="'.$course_config->course_code.'">'.$course_config->course_name.'</option>';
	}
	
	echo $result;
});

//////////**********************************************End  Subject Configuration------********************************************////


/******************************************************  15-01-19  ***********************************************************************/
Route::get('attendance/get-emp-name-offday/{emp_code}', function($emp_code){
	
	$emp=DB::Table('employee')
			->leftJoin('company','employee.company_id','=','company.id')
			->leftJoin('grade','employee.grade_id','=','grade.id')
			->where('employee_id','=',$emp_code)
			->get()->first();
	//dd($applicant_rs);
	$result='';
		
	$result=array('name'=>$emp->first_name.' '.$emp->middle_name.' '.$emp->last_name,'company'=>$emp->company_name,'grade'=>$emp->grade_name);
	
	echo json_encode($result);
});

Route::get('attendance/get-shift/{shift_name}', function($shift_name){
	
	$shift=DB::Table('shift_management')
			->where('shift_name','=',$shift_name)
			->get()->first();
	//dd($applicant_rs);
	$result='';
		
	$result=$shift->shift_in_time;
	
	echo $result;
});

/************************************************************ 16-01-19 **************************************************************************/
Route::get('attendance/get-shift-duty-roaster/{company_id}/{grade_id}', function($company_id,$grade_id){
	DB::enableQueryLog();
	$shift_rs=DB::Table('shift_management')
			->where('company_id','=',$company_id)
			->where('grade_id','=',$grade_id)
			->get();
	//dd(DB::getQueryLog());
	$result='';
	$result .='<div class="row form-group shift-det">';	
	foreach($shift_rs as $shift)
	{
		//$result .= '<option value="'.$course->course_code.'">'.$course->course_name.'</option>';
		$result .='<label class="col-md-3 checkbox-inline"><input type="checkbox" value="'.$shift->shift_id.'" name="shift_id[]">'.$shift->shift_name.'</label>';
	}
	$result .='</div>';
	echo $result;
	
	
});

Route::get('attendance/get-emp-name/{emp_code}', function($emp_code){
	
	$emp=DB::Table('employee')
			->where('employee_id','=',$emp_code)
			->get()->first();
	//dd($applicant_rs);
	$result='';
		
	$result=$emp->first_name.' '.$emp->middle_name.' '.$emp->last_name;
	
	echo $result;
});

/************************************************************ SALES BILLING *******************************************************/
Route::get('sales/get-unit/{item_code}', function($item_code){
	
	$unit_rs=DB::Table('item')
			->leftJoin('unit','item.unit_id','=','unit.id')
			->where('item.item_code','=',$item_code)
			->get()->first();
	//dd($applicant_rs);
	$result=$unit_rs->unit_name;
		
	
	echo $result;
});

Route::get('sales/get-details/{billing_no}', function($billing_no){
	
	$billing_rs=DB::Table('billing')
			->leftJoin('item','billing.item_code','=','item.item_code')
			->where('billing.billing_no','=',$billing_no)
			->get()->first();
	//dd($billing_rs);
	$result=array('bill_to'=>$billing_rs->bill_to,'item_name'=>$billing_rs->item_name,'item_price'=>$billing_rs->item_price,
				'unit_of_measurement'=>$billing_rs->unit_of_measurement,'qty'=>$billing_rs->qty,'tot_price'=>$billing_rs->tot_price,
				'discount'=>$billing_rs->discount,'cgst'=>$billing_rs->cgst,'sgst'=>$billing_rs->sgst,
				'igst'=>$billing_rs->igst,'amt_including_tax'=>$billing_rs->amt_including_tax,'billing_dt'=>$billing_rs->billing_dt);
	
	echo json_encode($result);
});

// Dak Receipt
Route::get('dak/dashboard', function(){ return View('dak/dashboard');});

Route::get('dak/dak-receipt','Dak\ReceiptController@viewReceiptDetails');
Route::get('dak/receiptdel','Dak\ReceiptController@delete_receipt');
Route::get('dak/receipt/{id}','Dak\ReceiptController@getReceiptById');
Route::get('dak/addreceipt','Dak\ReceiptController@index');
Route::post('dak/add-receipt/','Dak\ReceiptController@saveReceipt');

// Dak Forward
Route::get('dak/dak-forward','Dak\ForwardController@viewForwardDetails');
Route::get('dak/forward/{id}','Dak\ForwardController@getForwardById');
Route::get('dak/addforward','Dak\ForwardController@index');
Route::post('dak/addforward/','Dak\ForwardController@saveForward');
Route::get('dak/forwarddtl/{id}','Dak\ForwardController@getForwarddtl');


Route::get('dak/dairy-view','Dak\ReportController@getDairyRange');
Route::post('dak/dairy-report','Dak\ReportController@getDairyReport');

Route::get('dak/forward-view','Dak\ReportController@getForwordRange');
Route::post('dak/forward-report','Dak\ReportController@getForwardReport');

Route::get('dak/dak-history','Dak\ReportController@getDakHistoryReport');
Route::post('dak/dak-history','Dak\ReportController@viewDakHistoryReport');

Route::get('dak/dak-search','Dak\ReportController@viewDakSearchHistory');

Route::get('dak/employeelist/{department_id}', function($department_id){
	
	$employee_list=DB::table('employee')->where('emp_department','=',$department_id)->get();
	return $employee_list;
});

//Dak Final
Route::get('dak/dak-final','Dak\FinalController@viewFinalDetails');
Route::get('dak/dak-final-bill','Dak\FinalController@viewFinalDetailsForBills');
Route::get('dak/dak-final-closed','Dak\FinalController@viewFinalDetailsForClosed');
Route::get('dak/dak-final-forward','Dak\FinalController@viewFinalDetailsForForward');
Route::get('dak/final/{id}','Dak\FinalController@getFinalById');
Route::get('dak/addfinal','Dak\FinalController@index');
Route::get('dak/finaldtlapprove/{id}','Dak\FinalController@approvedFinalDak');
Route::get('dak/finaldtl/{id}','Dak\FinalController@getFinaldtl');
Route::get('dak/fin/dashboard', 'Dak\FinalController@viewFinalDashboard');
Route::post('dak/addfinal','Dak\FinalController@saveFinal');
Route::get('dak/editfinal/{id}','Dak\FinalController@getFinalDetailById');
Route::post('dak/editfinal','Dak\FinalController@updateFinal');


/********************** Get SChools *******************************************/

Route::get('masters/get-schools/{ins_id}', function($ins_id){
	
	$school_rs=DB::Table('faculty')
				->where('institute_code','=',$ins_id)
				->where('faculty_status','=','active')
				->get();
	
	$result='<option value="" selected disabled >Select</option>';
		
	foreach($school_rs as $school)
	{
		$result .= '<option value="'.$school->faculty_id.'">'.$school->faculty_name.'</option>';
	}
	
	echo $result;
});