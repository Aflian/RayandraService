<?php

use App\Providers\AppServiceProvider;
use App\Providers\Filament\AdminPanelProvider;
use App\Providers\Filament\CustomerPanelProvider;
use App\Providers\Filament\InvitationPanelProvider;
use App\Providers\Filament\WorkspacePanelProvider;

return [
    AppServiceProvider::class,
    AdminPanelProvider::class,
    WorkspacePanelProvider::class,
    CustomerPanelProvider::class,
    InvitationPanelProvider::class,
];
