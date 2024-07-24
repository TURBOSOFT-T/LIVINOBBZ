<?php

use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;
use App\Http\Controllers\Front\{
    PostController as FrontPostController,
    CommentController as FrontCommentController,
    ContactController as FrontContactController,
    PageController as FrontPageController,
    InfosController,
    NewsController,
    ShopController,
    ProductController as FrontProduct,
    CartController as backcart,
    OrderController,
};
use App\Http\Controllers\Back\{
    AdminController,
    PostController as BackPostController,
    ResourceController as BackResourceController,
    UserController as BackUserController,
    HeroPageController,
    ProjectController,
    ServiceController,
    CategoryController,
    ProductController,
    ShopController as BackShopping,
};

use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\CartController;

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => 'auth'], function () {
    Lfm::routes();
});

//Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');

// Home
Route::name('home')->get('/', [FrontPostController::class, 'index']);
//Route::name('category')->get('category/{category:slug}', [FrontPostController::class, 'category']);
Route::name('author')->get('author/{user}', [FrontPostController::class, 'user']);
Route::name('tag')->get('tag/{tag:slug}', [FrontPostController::class, 'tag']);
Route::name('page')->get('page/{page:slug}', FrontPageController::class);
Route::name('follow')->get('page/{page:slug}', FrontPageController::class);

Route::prefix('posts')->group(function () {
    Route::name('posts.display')->get('{slug}', [FrontPostController::class, 'show']);
    Route::name('posts.search')->get('', [FrontPostController::class, 'search']);
    Route::name('posts.comments')->get('{post}/comments', [FrontCommentController::class, 'comments']);
    Route::name('posts.comments.store')->post('{post}/comments', [FrontCommentController::class, 'store'])->middleware('auth');
});
Route::name('front.comments.destroy')->delete('comments/{comment}', [FrontCommentController::class, 'destroy']);

// Contact
Route::resource('contacts', FrontContactController::class, ['only' => ['create', 'store']]);

// Shoppings
Route::resource('shoppings', ShopController::class);

// Products
Route::get('AllProducts', [ShopController::class, 'AllProducts']);
Route::get('detailsProduct/{id}', [ShopController::class, 'detailsProduct']);
//Route::get('/apply_posts/{id}', [FrontCandidatureController::class, 'apply_post']);
Route::get('/category/{id}', [ShopController::class, 'products'])->where('id', '[0-9]+');
//Route::name('produits.show')->get('produits/{produit}', 'ProductController');
Route::get('products/{product}', FrontProduct::class)->name('detailsproducts.show');
//Route::name('produits.show')->get('produits/{produit}', 'ProductController');


//Route::get('/', [FrontProduct::class, 'index']);
Route::get('cart', [FrontProduct::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [FrontProduct::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [FrontProduct::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [FrontProduct::class, 'remove'])->name('remove.from.cart');
Route::post('clear', [FrontProduct::class, 'clearAllCart'])->name('cart.clear');

//Route::get('/', [FrontProduct::class, 'showProducts']);
//Route::get('cart', [FrontProduct::class, 'showCartTable']);
Route::get('checkout', [FrontProduct::class, 'proceed']);
Route::get('/cart-count', [FrontProduct::class, 'cartCount'])->name('cart.count');
//Route::get('add-to-cart/{id}', [FrontProduct::class, 'addToCart']);
//Route::patch('update-cart', [FrontProduct::class, 'updateCart']);
//Route::delete('remove-from-cart', [FrontProduct::class, 'removeCartItem']);
//Route::get('clear-cart', [FrontProduct::class, 'clearCart']);
Route::post('/order', [OrderController::class, 'confirmOrder'])->name('order.confirm');
Route::get('/thank-you', [FrontProduct::class, 'index'])->name('thank-you');


/////Cart
//Route::resource('paniers', 'CartController')->only(['index', 'store', 'update', 'destroy']);
Route::resource('panier', backcart::class);
///Route::resource('panier', 'CartController')->only(['index', 'store', 'update', 'destroy']);
Route::resource('paniers', CartController::class);

// Utilisateur authentifié
Route::middleware('auth')->group(function () {
    // Commandes
    Route::resource('commandes', OrderController::class);
});

// Infos
Route::resource('infos', InfosController::class, ['only' => ['create', 'store']]);
Route::resource('news', NewsController::class, ['only' => ['create', 'store']]);

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
 */
require __DIR__ . '/auth.php';

//Route::view('admin', 'back.layout');
// Laguages
Route::name('language')->get('language/{lang}', 'HomeController@language');
/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------|
*/

Route::prefix('admin')->group(function () {

    Route::middleware('redac')->group(function () {

        // Dashboard
        Route::name('admin')->get('/', [AdminController::class, 'index']);
        // Purge
        Route::name('purge')->put('purge/{model}', [AdminController::class, 'purge']);
        // Posts
        Route::resource('posts', BackPostController::class)->except(['show', 'create']);
        Route::name('posts.create')->get('posts/create/{id?}', [BackPostController::class, 'create']);
        //Projects
        Route::resource('projects', 'ProductController')->except('show');
        // Users
        Route::name('users.valid')->put('valid/{user}', [BackUserController::class, 'valid']);
        Route::name('users.unvalid')->put('unvalid/{user}', [BackUserController::class, 'unvalid']);
        // Comments
        Route::resource('comments', BackResourceController::class)->except(['show', 'create', 'store']);
        Route::name('comments.indexnew')->get('newcomments', [BackResourceController::class, 'index']);
    });

    Route::middleware('admin')->group(function () {

        // Posts
        Route::name('posts.indexnew')->get('newposts', [BackPostController::class, 'index']);
        // Categories
        Route::resource('categories', BackResourceController::class)->except(['show']);
        Route::resource('savecategories', CategoryController::class);

        // Products
        Route::resource('products', ProductController::class);
        Route::name('products.indexnew')->get('newproducts', [ProductController::class, 'index']);
        Route::resource('saveproducts', ProductController::class);

        Route::get('product-image/{productImageId}/delete', [App\Http\Controllers\ProductImageController::class, 'destroy']);
        // Users
        Route::resource('users', BackUserController::class)->except(['show', 'create', 'store']);
        Route::name('users.indexnew')->get('newusers', [BackResourceController::class, 'index']);
        // Contacts
        Route::resource('contacts', BackResourceController::class)->only(['index', 'destroy']);
        Route::name('contacts.indexnew')->get('newcontacts', [BackResourceController::class, 'index']);
        // Follows
        Route::resource('follows', BackResourceController::class)->except(['show']);
        // Pages
        Route::resource('pages', BackResourceController::class)->except(['show']);

        // Heros
        Route::resource('homes', BackResourceController::class)->except(['show']);
        Route::resource('heros', HeroPageController::class);


        // Services
        Route::resource('services', BackResourceController::class)->except(['show']);
        Route::resource('services', ServiceController::class);
    });
});

Route::middleware('ajax')->group(function () {
    Route::post('message', 'UserController@message')->name('message');
});
// Home page
//Route::view('/', 'home')->name('home');