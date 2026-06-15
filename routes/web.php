<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\BrrowedBookController;
use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\User\UserPanelController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;
//reset password
use App\Http\Controllers\Authentication\PasswordResetLinkController;
use App\Http\Controllers\Authentication\NewPasswordController;



Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

// Route for login
Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthenticationController::class, 'showRegistrationForm'])->name('authentication.register.form');
Route::post('/register/registration', [AuthenticationController::class, 'registration'])->name('authentication.registration');
Route::post('/post/login', [AuthenticationController::class, 'login'])->name('post.login');
Route::get('/contact', [AuthenticationController::class, 'contact'])->name('authentication.contact');
//reste password 
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
//



Route::get('/', [UserPanelController::class, 'index'])->name('home');
Route::get('/about', [UserPanelController::class, 'about'])->name('about');
Route::get('/contact', [UserPanelController::class, 'contact'])->name('contact');
Route::post('/contact/store', [UserPanelController::class, 'contactStore'])->name('contact.store');






Route::middleware(['auth'])->group(function () {
  Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');



  // Routes For Category;
  Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
  Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
  Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
  Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
  Route::get('/admin/categories/delete/{id}', [CategoryController::class, 'delete'])->name('admin.categories.delete');
  Route::get('/admin/categories/show/{id}', [CategoryController::class, 'show'])->name('admin.categories.show');
  Route::get('/admin/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
  Route::post('/admin/categories/update', [CategoryController::class, 'update'])->name('admin.categories.update');

  // Routes For Role

  Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index');
  Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
  Route::post('/admin/roles/store', [RoleController::class, 'store'])->name('admin.roles.store');
  Route::get('/admin/roles/delete/{id}', [RoleController::class, 'delete'])->name('admin.roles.delete');
  Route::get('/admin/roles/show/{id}', [RoleController::class, 'show'])->name('admin.roles.show');
  Route::get('/admin/roles/edit/{id}', [RoleController::class, 'edit'])->name('admin.roles.edit');
  Route::post('/admin/roles/update', [RoleController::class, 'update'])->name('admin.roles.update');

  // Routes For User

  Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
  Route::get('admin/borrowed-books', [AdminController::class, 'borrowedBooks'])->name('admin.borrowed.books');
  Route::get('/admin/borrowed-books', [AdminController::class, 'allBorrowedBooks'])->name('admin.borrowed.books');


  Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
  Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store');
  Route::get('/admin/users/delete/{id}', [UserController::class, 'delete'])->name('admin.users.delete');
  Route::get('/admin/users/show/{id}', [UserController::class, 'show'])->name('admin.users.show');
  Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
  Route::post('/admin/users/update', [UserController::class, 'update'])->name('admin.users.update');
  Route::get('/admin/users/profile', [UserController::class, 'profile'])->name('admins.users.profile');
  Route::post('/admin/users/profile/update', [UserController::class, 'profileUpdate'])->name('admins.users.profile.update');
  Route::get('/borrowed/books', [UserController::class, 'borrowedBooks'])->name('admins.users.borrowed');




  // Routes For Books
  Route::get('/admin/books', [BookController::class, 'index'])->name('admin.books.index');
  Route::get('/admin/books/create', [BookController::class, 'create'])->name('admin.books.create');
  Route::post('/admin/books/store', [BookController::class, 'store'])->name('admin.books.store');
  Route::get('/admin/books/delete/{id}', [BookController::class, 'delete'])->name('admin.books.delete');
  Route::get('/admin/books/show/{id}', [BookController::class, 'show'])->name('admin.books.show');
  Route::get('/admin/books/edit/{id}', [BookController::class, 'edit'])->name('admin.books.edit');
  Route::post('/admin/books/update', [BookController::class, 'update'])->name('admin.books.update');

  // Routes for Contact Us
  Route::get('/admin/contact', [ContactUsController::class, 'index'])->name('admins.contact.index');
  Route::get('/admin/contact/create', [ContactUsController::class, 'create'])->name('admins.contact.create');
  Route::post('/admin/contact/store', [ContactUsController::class, 'store'])->name('admins.contact.store');
  Route::get('/admin/contact/delete/{id}', [ContactUsController::class, 'delete'])->name('admins.contact.delete');
  Route::get('/admin/contact/show/{id}', [ContactUsController::class, 'show'])->name('admins.contact.show');

  Route::get('/admin/borrowed/book/{bookId}', [BrrowedBookController::class, 'borrowedBook'])->name('admins.borrowed.Book');
  Route::get('/admin/return/book/{id}', [BrrowedBookController::class, 'returnBook'])->name('admins.return.Book');


  Route::get('/checkout', [PaymentController::class, 'showCheckoutForm']);
  Route::post('/create-checkout-session', [PaymentController::class, 'createCheckoutSession']);
  Route::get('/success/{id}', [PaymentController::class, 'success'])->name('success');
  Route::get('/cancel', [PaymentController::class, 'cancel'])->name('cancel');
  Route::get('/payment/choice', [PaymentController::class, 'showPaymentChoice'])->name('payment.choice');




  Route::get('notifications/ll', [NotificationController::class, 'index'])->name('notifications');
  Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
  Route::get('/generate-report', [ReportController::class, 'showForm'])->name('report.form');
  Route::post('/generate-report', [ReportController::class, 'generatePDF'])->name('report.generate');

});
