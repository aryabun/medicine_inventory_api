<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\DosageForm;
use App\Models\Facility;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Role;
use App\Policies\CategoryPolicy;
use App\Policies\DosageFormPolicy;
use App\Policies\FacilityPolicy;
use App\Policies\InventoryPolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::policy(Product::class, ProductPolicy::class);
        Gate::policy(Category::class, CategoryPolicy::class);
        Gate::policy(DosageForm::class, DosageFormPolicy::class);
        Gate::policy(Facility::class, FacilityPolicy::class);
        Gate::policy(Role::class, RolePolicy::class);
        Gate::policy(Inventory::class, InventoryPolicy::class);
    }
}
