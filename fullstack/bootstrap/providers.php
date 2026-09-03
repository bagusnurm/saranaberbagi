<?php

use App\Providers\AppServiceProvider;
use App\Providers\Filament\AdminPanelProvider;
use App\Providers\Filament\AuthPanelProvider;

return [
    AppServiceProvider::class,
    AdminPanelProvider::class,
    AuthPanelProvider::class,
];
