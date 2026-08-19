<?php

namespace App\Filament\Customer\Resources\CustomerOrders\Pages;

use App\Filament\Customer\Resources\CustomerOrders\CustomerOrderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCustomerOrder extends EditRecord
{
    protected static string $resource = CustomerOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
