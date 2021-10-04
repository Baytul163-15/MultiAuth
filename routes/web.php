<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController; 
use App\Http\Controllers\Backend\BrandController;    
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;  
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;

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

Route::group(['prefix'=>'admin', 'middleware'=>['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});





################################################################################
############################### Backend All Routes ###############################
################################################################################


############################### Admin Profile All Routes ###############################

Route::middleware(['auth:admin'])->group(function(){
    
    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
    #Admin_Logout
    Route::get('/admin/logut', [AdminController::class, 'destroy'])->name('admin.logout');

    #Admin_Profile
    Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

    #Admin_Profile_Edit
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

    #Admin_Profile_Edit
    Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

    #Admin_Profile_Edit
    Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

    #Admin_Profile_Edit
    Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');
});

############################### Brand All Routs ################################

Route::prefix('brand')->group(function(){

    #Brand_View_page
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');

    #Brand_Add_Page
    Route::get('/add', [BrandController::class, 'AddBrand'])->name('brand.add');

    #Brand_View_Store/Insert Route
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');

    #Brand_View_Edit
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');

    #Brand_View_Update
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');

    #Brand_View_Delete
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
});

############################### Category All Routs ################################

Route::prefix('category')->group(function(){

    #Category_View_page
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');

    #Category_Add_Page
    Route::get('/add', [CategoryController::class, 'AddCategory'])->name('category.add');

    #Category_View_Store/Insert Route
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.sore');

    #Category_View_Edit
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');

    #Category_View_Update
    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');

    #Category_View_Delete
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
});

############################### SubCategory All Routs ################################

Route::prefix('subcategory')->group(function(){

    #SubCategory_View_page
    Route::get('/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');

    #SubCategory_Add_Page
    Route::get('/add', [SubCategoryController::class, 'AddSubCategory'])->name('subcategory.add');

    #SubCategory_View_Store/Insert Route
    Route::post('/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');

    #SubCategory_View_Edit
    Route::get('/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');

    #SubCategory_View_Update
    Route::post('/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');

    #SubCategory_View_Delete
    Route::get('/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
});

############################### SubSubCategory All Routs ################################

Route::prefix('subsubcategory')->group(function(){

    #SubCategory_View_page
    Route::get('/view', [SubSubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');

    #SubCategory_Add_Page
    Route::get('/add', [SubSubCategoryController::class, 'AddSubSubCategory'])->name('subsubcategory.add');

    #SubCategory_View_Store/Insert Route
    Route::post('/store', [SubSubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');

    #SubCategory_View_Edit
    Route::get('/edit/{id}', [SubSubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');

    #SubCategory_View_Update
    Route::post('/update', [SubSubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');

    #SubCategory_View_Delete
    Route::get('/delete/{id}', [SubSubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
});

############################## Subcategory Data Show ##########################

#SubCategory_View_Delete
Route::get('/category/subcategory/ajax/{category_id}', [SubSubCategoryController::class, 'GetSubCategory']);

#SubCategory_View_Delete
Route::get('/category/sub-subcategory/ajax/{subcategory_id}', [SubSubCategoryController::class, 'GetSubSubCategory']);

############################### Product All Routs ################################

Route::prefix('product')->group(function(){

    #Product_Add_Page
    Route::get('/add', [ProductController::class, 'AddProduct'])->name('product.add');

    #Product_Store
    Route::post('/store', [ProductController::class, 'ProductStore'])->name('product.store');

    #Product_Mange
    Route::get('/manage', [ProductController::class, 'ProductManage'])->name('product.manage');

    #Product_Edit
    Route::get('/edit/{id}', [ProductController::class, 'ProductEdit'])->name('product.edit');

    #Product_Update
    Route::post('/update', [ProductController::class, 'ProductUpdate'])->name('product.update'); 
    
    #Product_Edit
    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');

    #Product_Multiimage_update
    Route::post('/img/update', [ProductController::class, 'MultiImgUpdate'])->name('product.img.update');
    
    #Product_Multiimage_update
    Route::post('/thambnail/update', [ProductController::class, 'ThamblineUpdate'])->name('product.thambnail.update');

    #Product_Multiimage_Delete
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiimgDelete'])->name('product.multiimg.delete');

    #Product_Inactive
    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');

    #Product_Active
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
});

############################### Sliders All Routs ################################

Route::prefix('slider')->group(function(){

    #Slider_View_Page
    Route::get('/view', [SliderController::class, 'SliderView'])->name('slider.view');

    #Slider_Add_Page
    Route::get('/add', [SliderController::class, 'SliderAdd'])->name('slider.add');

    #Slider_Add_Page
    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');

    #Slider_Add_Page
    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');

    #Slider_Add_Page
    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');

    #Slider_Add_Page
    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');

    #Slider_Add_Page
    Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');

    #Slider_Add_Page
    Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
});

##################################################################################
############################### User All Routes ##################################
##################################################################################

#User_Dashbord
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function(){
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
	$id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

#Home_Page
Route::get('/', [IndexController::class, 'index']);

#User_Logout
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');

#User_Profile_Show
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');

#User_Profile_Store/Update
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');

#User_Change_Password_Show
Route::get('/user/change/password', [IndexController::class, 'UserPasswordChange'])->name('user.change.password');

#User_Change_Password_Show
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');


############################### Multi-Language #########################

#Bnagla/Hindi Language
Route::get('/hindi/language', [LanguageController::class, 'HindiLanguage'])->name('hindi.language');

#English Language Route
Route::get('/english/language', [LanguageController::class, 'EnglishLanguage'])->name('english.language');

################################## Product Details ######################

#Pproduct_details_Page
Route::get('product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);