<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliverEmployeeController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShippingDepController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserContoller;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//})
Route::view('/', 'home');

Route::middleware('auth')->group(function(){
    Route::resource('items',ItemsController::class);
    Route::resource('user',UserContoller::class)->only(['show','update','destroy']);
    Route::resource('customer',CustomerController::class)->only(['store','update']);
    Route::post('/order/{item}',[CustomerController::class,'order'])->name('customer.order');
});

Route::controller(UserContoller::class)->group(function() {
    Route::get('/login','loginUi')->name('login');
    Route::post('/login','login')->name('login.user');
    Route::get('/register','registerUi')->name('register');
    Route::post('/register','register')->name('register.user');
    Route::get('/logout','logout')->name('logout.user');
});

Route::middleware('admin','auth')->group(function(){
    Route::resource('/category',CategoryController::class)->except(['show','index']);
    Route::resource('/deliver_employee',DeliverEmployeeController::class)->except(['show','index']);
    Route::resource('/order',OrderController::class)->except(['show','index']);
    Route::resource('/shipping_dep',ShippingDepController::class)->except(['show','index']);
    Route::resource('/supplier',SupplierController::class)->except(['show','index']);

    Route::get('/dashboard',function(){
        return view('dashboard');
    });
    Route::get('/dashboard/items', function () {
        $items = App\Models\Item::simplePaginate(10); // Fetch items from the database
        return view('sections.items', compact('items'));
    });
    
    // Customers Section
    Route::get('/dashboard/customers', function () {
        $customers = App\Models\Customer::simplePaginate(10); // Fetch customers from the database
        return view('sections.customers', compact('customers'));
    });
    
    // Users Section
    Route::get('/dashboard/users', function () {
        $users = App\Models\User::simplePaginate(10); // Fetch users from the database
        return view('sections.users', compact('users'));
    });
    Route::get('/dashboard/categories', function () {
        $categories = App\Models\Category::simplePaginate(10); // Fetch categories from the database
        return view('sections.categories', compact('categories'));
    });
    Route::get('/dashboard/delivery_employees', function () {
        $delivery_employees = App\Models\DeliverEmployee::with('shipping_dep')->simplePaginate(10); // Fetch delivery_employees from the database
        return view('sections.delivery_employees', compact('delivery_employees'));
    });
    Route::get('/dashboard/orders', function () {
        $orders = App\Models\Order::simplePaginate(10); // Fetch orders from the database
        return view('sections.orders', compact('orders'));
    });
    Route::get('/dashboard/shipping_deps', function () {
        $shipping_deps = App\Models\ShippingDep::simplePaginate(10); // Fetch shipping_deps from the database
        return view('sections.shipping_deps', compact('shipping_deps'));
    });
    Route::get('/dashboard/suppliers', function () {
        $suppliers = App\Models\Supplier::simplePaginate(10); // Fetch suppliers from the database
        return view('sections.suppliers', compact('suppliers'));
    });
    
});