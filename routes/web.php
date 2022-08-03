<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Dashboard;

use App\Http\Livewire\Merk\Index as MerkIndex;
use App\Http\Livewire\Merk\Create as MerkCreate;
use App\Http\Livewire\Merk\Edit as MerkEdit;

use App\Http\Livewire\Category\Index as CategoryIndex;
use App\Http\Livewire\Category\Create as CategoryCreate;
use App\Http\Livewire\Category\Edit as CategoryEdit;

use App\Http\Livewire\Subcategory\Index as SubcategoryIndex;
use App\Http\Livewire\Subcategory\Create as SubcategoryCreate;
use App\Http\Livewire\Subcategory\Edit as SubcategoryEdit;

use App\Http\Livewire\Tag\Index as TagIndex;
use App\Http\Livewire\Tag\Create as TagCreate;
use App\Http\Livewire\Tag\Edit as TagEdit;

use App\Http\Livewire\Product\Index as ProductIndex;
use App\Http\Livewire\Product\Create as ProductCreate;
use App\Http\Livewire\Product\Edit as ProductEdit;
use App\Http\Livewire\Product\Show as ProductShow;
use App\Http\Livewire\Product\WholesalePrice\Index as ProductWholesalePriceIndex;
use App\Http\Livewire\Product\WholesalePrice\Create as ProductWholesalePriceCreate;
use App\Http\Livewire\Product\WholesalePrice\Edit as ProductWholesalePriceEdit;

use App\Http\Livewire\Outlet\Index as OutletIndex;
use App\Http\Livewire\Outlet\Create as OutletCreate;
use App\Http\Livewire\Outlet\Edit as OutletEdit;
use App\Http\Livewire\Outlet\Show as OutletShow;
use App\Http\Livewire\Outlet\Stock\Index as OutletStockIndex;
use App\Http\Livewire\Outlet\Stock\Create as OutletStockCreate;
use App\Http\Livewire\Outlet\Stock\Edit as OutletStockEdit;
use App\Http\Livewire\Outlet\Stock\Add as OutletStockAdd;
use App\Http\Livewire\Outlet\Stock\Send as OutletStockSend;

use App\Http\Livewire\RefillPrice\Index as RefillPriceIndex;
use App\Http\Livewire\RefillPrice\Create as RefillPriceCreate;
use App\Http\Livewire\RefillPrice\Edit as RefillPriceEdit;

use App\Http\Livewire\Order\Retail as OrderRetail;
use App\Http\Livewire\Order\Wholesale as OrderWholesale;

use App\Http\Livewire\Report\Transaction as ReportTransaction;
use App\Http\Livewire\Report\Income as ReportIncome;

use App\Http\Livewire\User\Index as UserIndex;
use App\Http\Livewire\User\Create as UserCreate;
use App\Http\Livewire\User\Edit as UserEdit;

use App\Http\Livewire\Member\Index as MemberIndex;
use App\Http\Livewire\Member\Show as MemberShow;
use App\Http\Livewire\Member\Create as MemberCreate;
use App\Http\Livewire\Member\Edit as MemberEdit;

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

Route::middleware('auth')->group(function() {
    Route::get('/', Dashboard::class)->name('dashboard');
    
    Route::prefix('merk')->name('merk.')->group(function() {
        Route::get('', MerkIndex::class)->name('index');
        Route::get('create', MerkCreate::class)->name('create');
        Route::get('edit/{merk}', MerkEdit::class)->name('edit');
    }); 

    Route::prefix('category')->name('category.')->group(function() {
        Route::get('', CategoryIndex::class)->name('index');
        Route::get('create', CategoryCreate::class)->name('create');
        Route::get('edit/{category}', CategoryEdit::class)->name('edit');
    });

    Route::prefix('subcategory')->name('subcategory.')->group(function() {
        Route::get('', SubcategoryIndex::class)->name('index');
        Route::get('create', SubcategoryCreate::class)->name('create');
        Route::get('edit/{subcategory}', SubcategoryEdit::class)->name('edit');
    });

    Route::prefix('tag')->name('tag.')->group(function() {
        Route::get('', TagIndex::class)->name('index');
        Route::get('create', TagCreate::class)->name('create');
        Route::get('edit/{tag}', TagEdit::class)->name('edit');
    });
    
    Route::prefix('product')->name('product.')->group(function() {
        Route::get('', ProductIndex::class)->name('index');
        Route::get('create', ProductCreate::class)->name('create');
        Route::get('edit/{product}', ProductEdit::class)->name('edit');
        Route::get('{product}', ProductShow::class)->name('show');
        Route::get('{product}/wholesale-price', ProductWholesalePriceIndex::class)->name('wholesale-price.index');
        Route::get('{product}/wholesale-price/create', ProductWholesalePriceCreate::class)->name('wholesale-price.create');
        Route::get('{product}/wholesale-price/edit/{merk}', ProductWholesalePriceEdit::class)->name('wholesale-price.edit');
    }); 
    
    Route::prefix('outlet')->name('outlet.')->group(function() {
        Route::get('', OutletIndex::class)->name('index');
        Route::get('create', OutletCreate::class)->name('create');
        Route::get('edit/{outlet}', OutletEdit::class)->name('edit');
        Route::get('{outlet}', OutletShow::class)->name('show');
        Route::get('{outlet}/stock', OutletStockIndex::class)->name('stock.index');
        Route::get('{outlet}/stock/create', OutletStockCreate::class)->name('stock.create');
        Route::get('{outlet}/stock/edit/{product}', OutletStockEdit::class)->name('stock.edit');
        Route::get('{outlet}/stock/add/{product}', OutletStockAdd::class)->name('stock.add');
        Route::get('{outlet}/stock/send', OutletStockSend::class)->name('stock.send');
    }); 

    Route::prefix('refill-price')->name('refill-price.')->group(function() {
        Route::get('', RefillPriceIndex::class)->name('index');
        Route::get('create', RefillPriceCreate::class)->name('create');
        Route::get('edit/{refill_price}', RefillPriceEdit::class)->name('edit');
    });

    Route::prefix('order')->name('order.')->group(function() {
        Route::get('retail', OrderRetail::class)->name('retail');
        Route::get('wholesale', OrderWholesale::class)->name('wholesale');
    }); 

    Route::prefix('report')->name('report.')->group(function() {
        Route::get('transaction', ReportTransaction::class)->name('transaction');
        Route::get('income', ReportIncome::class)->name('income');
    }); 
    
    Route::prefix('user')->name('user.')->group(function() {
        Route::get('', UserIndex::class)->name('index');
        Route::get('create', UserCreate::class)->name('create');
        Route::get('edit/{user}', UserEdit::class)->name('edit');
    }); 
    
    Route::prefix('member')->name('member.')->group(function() {
        Route::get('', MemberIndex::class)->name('index');
        Route::get('create', MemberCreate::class)->name('create');
        Route::get('edit/{member}', MemberEdit::class)->name('edit');
        Route::get('{member}', MemberShow::class)->name('show');
    }); 
});

require __DIR__.'/auth.php';
