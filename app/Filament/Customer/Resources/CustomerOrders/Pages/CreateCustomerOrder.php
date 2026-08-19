<?php

namespace App\Filament\Customer\Resources\CustomerOrders\Pages;

use App\Filament\Customer\Resources\CustomerOrders\CustomerOrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerOrder extends CreateRecord
{
    protected static string $resource = CustomerOrderResource::class;
}
