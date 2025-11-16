<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ProductController as PublicProductController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Testimoni;
use App\Models\Faq;

// PUBLIC ROUTES
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/menu', [PublicProductController::class, 'index'])->name('menu');
Route::get('/menu/{product}', [PublicProductController::class, 'show'])->name('product.detail');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'storeContact'])->name('contact.store');
Route::get('/testimonial', [ContactController::class, 'testimonial'])->name('testimonial');
Route::post('/testimonial', [ContactController::class, 'storeTestimonial'])->name('testimonial.store');

// ADMIN ROUTES
Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        // Products
        Route::resource('products', ProductController::class, ['as' => 'admin']);
        
        // Categories
        Route::resource('categories', CategoryController::class, ['as' => 'admin']);
        
        // Testimoni
        Route::get('/testimoni', [TestimoniController::class, 'index'])->name('admin.testimoni.index');
        Route::post('/testimoni/{testimoni}/approve', [TestimoniController::class, 'approve'])->name('admin.testimoni.approve');
        Route::delete('/testimoni/{testimoni}/reject', [TestimoniController::class, 'reject'])->name('admin.testimoni.reject');
        
        // FAQ
        Route::resource('faqs', FaqController::class, ['as' => 'admin']);
        
        // Contact Messages
        Route::get('/contact', [AdminContactController::class, 'index'])->name('admin.contact.index');
        Route::get('/contact/{message}', [AdminContactController::class, 'show'])->name('admin.contact.show');
        Route::delete('/contact/{message}', [AdminContactController::class, 'destroy'])->name('admin.contact.destroy');
    });
});

// API untuk Frontend
Route::prefix('v1')->group(function () {
    // Products API
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{product}', [ProductController::class, 'show']);
    
    // Categories API
    Route::get('/categories', function () {
        return response()->json(\App\Models\Category::all());
    });
    
    // Testimoni API
    Route::get('/testimonials', function () {
        return response()->json(Testimoni::where('is_approved', true)->get());
    });
    
    // FAQ API
    Route::get('/faqs', function () {
        return response()->json(Faq::orderBy('order')->get());
    });
    
    // Search Products
    Route::get('/search', function (Request $request) {
        $search = $request->query('q');
        $category = $request->query('category');
        
        $query = \App\Models\Product::with('category');
        
        if ($search) {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
        }
        
        if ($category) {
            $query->where('category_id', $category);
        }
        
        return response()->json($query->get());
    });
});

// Admin Management (Hanya Superadmin)
Route::resource('admins', AdminController::class, ['as' => 'admin']);