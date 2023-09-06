<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChildcategoryController;
use App\Http\Controllers\Admin\CuponController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\PickuppointController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('admin-login', [LoginController::class,'adminlogin'])->name('admin-login');
Route::group(['namespace'=>'App\Http\Controllers\HomeController\Admin', 'middleware'=>'is_admin'], function(){
    Route::get('/admin/home', [AdminController::class, 'admin'])->name('admin-home');
    Route::get('dashboard-logout', [AdminController::class, 'dashboardlogout'])->name('dashboard-logout');
    Route::post('/password-update', [AdminController::class, 'passwordupdate'])->name('password-update');
    Route::prefix('profile')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('profile');
        // Route::post('/category-store', [CategoryController::class, 'categorystore'])->name('category-store');
        // Route::get('/category-delete/{id}', [CategoryController::class, 'categorydelete'])->name('category-delete');
        // Route::get('/category-edit/{id}', [CategoryController::class, 'categoryedit'])->name('category-edit');
        Route::post('/profile-update', [AdminController::class, 'profileupdate'])->name('profile-update');
    });
    // category route
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::post('/category-store', [CategoryController::class, 'categorystore'])->name('category-store');
        Route::get('/category-edit/{id}', [CategoryController::class, 'categoryedit'])->name('category-edit');
        Route::post('/category-update', [CategoryController::class, 'categoryupdate'])->name('category-update');
        Route::get('/category_soft_delete/{id}', [CategoryController::class, 'category_soft_delete'])->name('category.soft.delete');
        Route::get('/category_trash', [CategoryController::class, 'category_trash'])->name('category.trash');
        Route::get('/category_restore/{id}', [CategoryController::class, 'category_restore'])->name('category.restore');
        Route::get('/category-delete/{id}', [CategoryController::class, 'categorydelete'])->name('category-delete');
        Route::post('/checked_delete', [CategoryController::class, 'checked_delete'])->name('checked.delete');
        // Route::post('/checked_resotre', [CategoryController::class, 'checked_resotre'])->name('checked.resotre');
        Route::post('/selected_resotre_from_trash', [CategoryController::class, 'selected_resotre_from_trash'])->name('selected.resotre.from.trash');
    });
    // subcategory route 
    Route::prefix('subcategory')->group(function () {
        Route::get('/', [SubcategoryController::class, 'index'])->name('subcategory');
        Route::post('/subcategory-store', [SubcategoryController::class, 'subcategorystore'])->name('subcategory-store');
        Route::get('/subcategory-edit/{id}', [SubcategoryController::class, 'subcategoryedit'])->name('subcategory-edit');
        Route::post('/subcategory-update', [SubcategoryController::class, 'subcategoryupdate'])->name('subcategory-update');
        Route::get('/subcategory_soft_delete{id}', [SubcategoryController::class, 'subcategory_soft_delete'])->name('subcategory.soft.delete');
        Route::post('/selected_subcategory_soft_delete', [SubcategoryController::class, 'selected_subcategory_soft_delete'])->name('selected.subcategory.soft.delete');
        // trash subcategory 
        Route::get('subcategory_trash', [SubcategoryController::class, 'subcategory_trash'])->name('subcategory.trash');
        Route::get('subcategory_restore/{id}', [SubcategoryController::class, 'subcategory_restore'])->name('subcategory.restore');
        Route::get('/subcategory_delete_from_trash/{id}', [SubcategoryController::class, 'subcategory_delete_from_trash'])->name('subcategory.delete.from.trash');
        Route::post('/subcategory_selected_restore_from_trash', [SubcategoryController::class, 'subcategory_selected_restore_from_trash'])->name('subcategory.restore.from.trash');
    });
    Route::prefix('childcategory')->group(function () {
        Route::get('/', [ChildcategoryController::class, 'index'])->name('childcategory');
        Route::post('/childcategory-store', [ChildcategoryController::class, 'childcategorystore'])->name('childcategory-store');
        // Route::get('/brand-delete/{id}', [BrandController::class, 'branddelete'])->name('brand-delete');
        Route::get('/childcategory-edit/{id}', [ChildcategoryController::class, 'childcategoryedit'])->name('childcategory-edit');
        Route::post('/childcategory-update', [ChildcategoryController::class, 'childcategoryupdate'])->name('childcategory-update');
        Route::get('/childcategory_soft_delete/{id}', [ChildcategoryController::class, 'childcategory_soft_delete'])->name('childcategory.soft.delete');
        Route::get('/trash_childcategory', [ChildcategoryController::class, 'trash_childcategory'])->name('trash.childcategory');
        Route::get('/childcategory_restore/{id}', [ChildcategoryController::class, 'childcategory_restore'])->name('childcategory.restore');
        Route::post('/selected_from_trash', [ChildcategoryController::class, 'selected_from_trash'])->name('selected.from.trash');
    });
    // brand route
    Route::prefix('brand')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('brand');
        Route::post('/brand-store', [BrandController::class, 'brandstore'])->name('brand-store');
        Route::get('/brand-delete/{id}', [BrandController::class, 'branddelete'])->name('brand-delete');
        Route::get('/brand-edit/{id}', [BrandController::class, 'brandedit'])->name('brand-edit');
        Route::post('/brand-update', [BrandController::class, 'brandupdate'])->name('brand-update');
    });
    Route::prefix('product')->group(function () {
        Route::get('/add/product', [ProductController::class, 'add_product'])->name('add.product');
        Route::post('/product/store', [ProductController::class, 'product_store'])->name('product.store');
        Route::get('/manage/product', [ProductController::class, 'manage_product'])->name('manage.product');
        Route::get('/color_size', [InventoryController::class, 'color_size'])->name('color.size');
        Route::post('/color/store', [InventoryController::class, 'color_store'])->name('color.store');
        Route::get('/color/delete/{id}', [InventoryController::class, 'color_delete'])->name('color.delete');
        Route::post('/size/store', [InventoryController::class, 'size_store'])->name('size.store');
        Route::get('/inventory/{id}', [InventoryController::class, 'inventory'])->name('inventory');
        Route::post('/inventory/store', [InventoryController::class, 'inventory_store'])->name('inventory.store');
        Route::get('/delete/product/{id}', [ProductController::class, 'delete_product'])->name('delete.product');

        // ajax coling 
        Route::post('/getsubcategory', [ProductController::class, 'getsubcategory']);
        Route::post('/getchildcategory', [ProductController::class, 'getchildcategory']);

    });
    
    Route::prefix('warehouse')->group(function () {
        Route::get('/', [WarehouseController::class, 'index'])->name('warehouse');
        Route::post('/warehouse-store', [WarehouseController::class, 'warehousestore'])->name('warehouse-store');
        Route::get('/warehouse-delete/{id}', [WarehouseController::class, 'warehousedelete'])->name('warehouse-delete');
        Route::get('/warehouse-edit/{id}', [WarehouseController::class, 'warehouseedit'])->name('warehouse-edit');
        Route::post('/warehouse-update', [WarehouseController::class, 'warehouseupdate'])->name('warehouse-update');
    });
    Route::prefix('pickuppoint')->group(function () {
        Route::get('/', [PickuppointController::class, 'index'])->name('pickuppoint');
        Route::post('/pickuppoint-store', [PickuppointController::class, 'pickuppointstore'])->name('pickuppoint-store');
        Route::get('/pickuppoint-delete/{id}', [PickuppointController::class, 'pickuppointdelete'])->name('pickuppoint-delete');
        Route::get('/pickuppoint-edit/{id}', [PickuppointController::class, 'pickuppointedit'])->name('pickuppoint-edit');
        Route::post('/pickuppoint-update', [PickuppointController::class, 'pickuppointupdate'])->name('pickuppoint-update');
    });
    Route::prefix('coupon')->group(function () {
        Route::get('/', [CuponController::class, 'coupon'])->name('coupon');
        Route::post('/coupon/add', [CuponController::class, 'coupon_add'])->name('coupon.add');
        Route::get('/coupon/delete{id}', [CuponController::class, 'coupon_delete'])->name('coupon.delete');
        // Route::post('/pickuppoint-store', [PickuppointController::class, 'pickuppointstore'])->name('pickuppoint-store');
        // Route::get('/pickuppoint-delete/{id}', [PickuppointController::class, 'pickuppointdelete'])->name('pickuppoint-delete');
        // Route::get('/pickuppoint-edit/{id}', [PickuppointController::class, 'pickuppointedit'])->name('pickuppoint-edit');
        // Route::post('/pickuppoint-update', [PickuppointController::class, 'pickuppointupdate'])->name('pickuppoint-update');
    });
   
    Route::prefix('setting')->group(function(){
        Route::prefix('seo')->group(function () {
            Route::get('/', [SeoController::class, 'index'])->name('seo');
            // Route::post('/childcategory-store', [ChildcategoryController::class, 'childcategorystore'])->name('childcategory-store');
            // // Route::get('/brand-delete/{id}', [BrandController::class, 'branddelete'])->name('brand-delete');
            // Route::get('/childcategory-edit/{id}', [ChildcategoryController::class, 'childcategoryedit'])->name('childcategory-edit');
            // Route::post('/childcategory-update', [ChildcategoryController::class, 'childcategoryupdate'])->name('childcategory-update');
        });
        Route::prefix('setting')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('setting');
            Route::post('/update-setting', [SettingController::class, 'updatesetting'])->name('update-setting');
            // Route::post('/childcategory-store', [ChildcategoryController::class, 'childcategorystore'])->name('childcategory-store');
            // // Route::get('/brand-delete/{id}', [BrandController::class, 'branddelete'])->name('brand-delete');
            // Route::get('/childcategory-edit/{id}', [ChildcategoryController::class, 'childcategoryedit'])->name('childcategory-edit');
            // Route::post('/childcategory-update', [ChildcategoryController::class, 'childcategoryupdate'])->name('childcategory-update');
        });
    });
    
});
