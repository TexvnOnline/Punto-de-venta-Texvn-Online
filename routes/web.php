<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ShoppingCartDetailController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebBlogController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WebShopController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::resource('users', UserController::class)->names('users');
    Route::get('dashboard', [HomeController::class, 'index'])->name('home');
    Route::resource('brands', BrandController::class)->except([
        'show'
    ])->names('brands');
    Route::resource('tags', TagController::class)->except([
        'show'
    ])->names('tags');
    Route::resource('categories', CategoryController::class)->names('categories');
    Route::resource('products', ProductController::class)->except([
        'create'
    ])->names('products');
    Route::resource('posts', PostController::class)->except([
        'create'
    ])->names('posts');
    Route::resource('social_media', SocialMediaController::class)->except([
        'show'
    ])->names('social_medias');
    Route::resource('sliders', SliderController::class)->except([
        'show', 'create'
    ])->names('sliders');
    Route::resource('promotions', PromotionController::class)->except([
        'show'
    ])->names('promotions');
    Route::resource('clients', ClientController::class)->names('clients');
    Route::resource('providers', ProviderController::class)->names('providers');
    Route::resource('roles', RoleController::class)->only([
        'index', 'show'
    ])->names('roles');
    Route::resource('printers', PrinterController::class)->names('printers')->only([
        'index', 'update'
    ]);
    Route::resource('orders', OrderController::class)->names('orders')->only([
        'index', 'show'
    ]);
    Route::resource('sales', SaleController::class)->names('sales')->except([
        'edit', 'update', 'destroy'
    ]);
    Route::resource('purchases', PurchaseController::class)->names('purchases')->except([
        'edit', 'update', 'destroy'
    ]);
    Route::resource('business', BusinessController::class)->names('business')->only([
        'index', 'update'
    ]);
    Route::resource('subscriptions', SubscriptionController::class)->only([
        'index', 'destroy'
    ])->names('subscriptions');
    Route::put('update_product_status/{id}', [ProductController::class, 'update_product_status'])->name('update_product_status');
    Route::get('mark_all_notifications', [NotificationController::class , 'mark_all_notifications'])->name('mark_all_notifications');
    Route::get('mark_a_notification/{notification_id}/{order_id}', [NotificationController::class, 'mark_a_notification'])->name('mark_a_notification');

    Route::put('update_profile/{profile}/update', [ProfileController::class, 'update'])->name('update_profile');

    Route::put('orders_update/{id}', [OrderController::class, 'orders_update'])->name('orders_update');
    Route::get('reports_day', [ReportController::class, 'reports_day'])->name('reports.day');
    Route::get('reports_date', [ReportController::class , 'reports_date'])->name('reports.date');
    Route::post('sales/report_results', [ReportController::class, 'report_results'])->name('report.results');
    Route::post('upload_image/{id}', [AjaxController::class, 'upload_image'])->name('upload.image');
    Route::post('upload_images_product/{id}', [AjaxController::class, 'upload_images_product'])->name('upload_images_product');
    Route::get('get_images/{id}', [AjaxController::class, 'get_images'])->name('get.images');
    Route::post('file_delete', [AjaxController::class, 'file_delete'])->name('file.delete');
    Route::get('purchases/pdf/{purchase}', [PurchaseController::class, 'pdf'])->name('purchases.pdf');
    Route::get('sales/pdf/{sale}', [SaleController::class, 'pdf'])->name('sales.pdf');
    Route::get('sales/print/{sale}', [SaleController::class, 'print'])->name('sales.print');
    Route::get('purchases/upload/{purchase}', [PurchaseController::class, 'upload'])->name('upload.purchases');
    Route::get('change_status/products/{product}', [ProductController::class, 'change_status'])->name('change.status.products');
    Route::get('change_status/purchases/{purchase}', [PurchaseController::class, 'change_status'])->name('change.status.purchases');
    Route::get('change_status/sales/{sale}', [SaleController::class, 'change_status'])->name('change.status.sales');
    Route::get('get_products_by_barcode', [ProductController::class, 'get_products_by_barcode'])->name('get_products_by_barcode');
    Route::get('get_products_by_id', [ProductController::class, 'get_products_by_id'])->name('get_products_by_id');
    Route::get('print_barcode', [ProductController::class, 'print_barcode'])->name('print_barcode');
    Route::get('get_subcategories', [AjaxController::class, 'get_subcategories'])->name('get_subcategories');
    Route::get('get_products_by_subcategory', [AjaxController::class, 'get_products_by_subcategory'])->name('get_products_by_subcategory');
});

Route::prefix('client')->middleware(['verified'])->group(function () {
    Route::post('/payments/pay', [PaymentController::class, 'pay'])->name('pay');
    Route::get('/payments/approval', [PaymentController::class, 'approval'])->name('approval');
    Route::get('/payments/cancelled', [PaymentController::class, 'cancelled'])->name('cancelled');
    Route::get('micuenta', [MyAccountController::class, 'my_account'])->name('web.my_account');
    Route::get('pagar', [MyAccountController::class, 'checkout'])->name('web.checkout');
    Route::get('mis_ordenes', [MyAccountController::class, 'orders'])->name('web.orders');
    Route::get('mis_ordenes/pedido/{order}', [MyAccountController::class, 'order_details'])->name('web.order_details');
    Route::get('detalles_de_la_cuenta', [MyAccountController::class, 'account_info'])->name('web.account_info');
    Route::get('editar_direccion', [MyAccountController::class, 'address_edit'])->name('web.address_edit');
    Route::get('cambiar_contrasena', [MyAccountController::class, 'change_password'])->name('web.change_password');
    Route::post('rate_product/{product}', [MyAccountController::class, 'rate_product'])->name('web.rate_product');

    Route::put('update_client/{user}/update', [UserController::class, 'update_client'])->name('web.update_client');
    Route::put('update_password/{user}/update', [UserController::class, 'update_password'])->name('web.update_password');

});

// Route::prefix('texvnonline')->group(function () {
    Route::resource('contact_mail', MailController::class)
    ->only([
        'store'
    ])
    ->names('contact.mail');
    Route::get('publicaciones/categoria/{category}', [WebBlogController::class, 'get_posts_category'])->name('web.get_posts_category');
    Route::get('publicaciones/etiqueta/{tag}', [WebBlogController::class, 'get_posts_tag'])->name('web.get_posts_tag');
    Route::get('posts_json', [WebBlogController::class, 'posts_json'])->name('posts.json');
    Route::get('blog/resultados/', [WebBlogController::class, 'search_posts'])->name('web.search_posts');
    Route::get('blog/publicaciones/{date}', [WebBlogController::class, 'get_posts_month'])->name('web.get_posts_month');
    Route::get('blog_detalles/{post}', [WebBlogController::class, 'blog_details'])->name('web.blog_details');
    Route::get('blog', [WebBlogController::class, 'blog'])->name('web.blog');
    Route::get('products_json', [WebShopController::class, 'products_json'])->name('products.json');
    Route::get('tienda/resultados/', [WebShopController::class, 'search_products'])->name('web.search_products');
    Route::get('productos/categoria/{category}', [WebShopController::class, 'get_products_category'])->name('web.get_products_category');
    Route::get('productos/etiqueta/{tag}', [WebShopController::class, 'get_products_tag'])->name('web.get_products_tag');
    Route::get('productos', [WebShopController::class, 'shop_grid'])->name('web.shop_grid');
    Route::get('producto/{product}', [WebShopController::class, 'product_details'])->name('web.product_details');
    Route::get('/', [WebShopController::class, 'welcome'])->name('web.welcome');
    route::get('productos/marcas/{brand}', [WebShopController::class, 'get_products_brand'])->name('web.get_products_brand');
    Route::post('subscription_email', [WebController::class, 'subscription_email'])->name('web.subscription_email');
    Route::get('nosotros', [WebController::class, 'about_us'])->name('web.about_us');
    Route::get('contacto', [WebController::class, 'contact_us'])->name('web.contact_us');
    Route::get('registro', [WebController::class, 'login_register'])->name('web.login_register');
    Route::get('mi_carrito_de_compras', [WebController::class, 'cart'])->name('web.cart');
    Route::resource('shopping_cart_detail', ShoppingCartDetailController::class)->only([
    'update'
    ])->names('shopping_cart_details');
    route::get('shopping_cart_detail/{shopping_cart_detail}/destroy', [ShoppingCartDetailController::class, 'destroy'])->name('shopping_cart_details.destroy');
    Route::post('add_to_shopping_cart/{product}/store', [ShoppingCartDetailController::class, 'store'])->name('shopping_cart_details.store');
    Route::get('add_a_product_to_the_shopping_cart/{product}/store', [ShoppingCartDetailController::class, 'store_a_product'])->name('store_a_product');
    Route::post('shopping_cart/update', [ShoppingCartController::class, 'update'])->name('shopping_cart.update');
    Route::get('login_error', [WebController::class, 'login_error'])->name('web.login_error');
// });
// Auth::routes();
Auth::routes(['verify' => true]);
// Auth::routes(['register' => false]);

Route::get('/prueba', function () {
    return view('prueba');
});
// Route::get('/barcode', function () {
//     $products = Product::get();
//     return view('admin.product.barcode', compact('products'));
// });

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

// Route::get('routes', function () {
//     $routeCollection = Route::getRoutes();

//     echo "<table style='width:100%'>";
//     echo "<tr>";
//     echo "<td width='10%'><h4>HTTP Method</h4></td>";
//     echo "<td width='10%'><h4>Route</h4></td>";
//     echo "<td width='10%'><h4>Name</h4></td>";
//     echo "<td width='70%'><h4>Corresponding Action</h4></td>";
//     echo "</tr>";
//     foreach ($routeCollection as $value) {
//         echo "<tr>";
//         echo "<td>" . $value->methods()[0] . "</td>";
//         echo "<td>" . $value->uri() . "</td>";
//         echo "<td>" . $value->getName() . "</td>";
//         echo "<td>" . $value->getActionName() . "</td>";
//         echo "</tr>";
//     }
//     echo "</table>";
// });