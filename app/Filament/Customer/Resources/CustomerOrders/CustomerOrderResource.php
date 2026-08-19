<?php

namespace App\Filament\Customer\Resources\CustomerOrders;

use App\Filament\Customer\Resources\CustomerOrders\Pages\CreateCustomerOrder;
use App\Filament\Customer\Resources\CustomerOrders\Pages\EditCustomerOrder;
use App\Filament\Customer\Resources\CustomerOrders\Pages\ListCustomerOrders;
use App\Filament\Customer\Resources\CustomerOrders\Schemas\CustomerOrderForm;
use App\Filament\Customer\Resources\CustomerOrders\Tables\CustomerOrdersTable;
use App\Models\Order;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CustomerOrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingCart;

    protected static string|UnitEnum|null $navigationGroup = 'Order Saya';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return CustomerOrderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CustomerOrdersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCustomerOrders::route('/'),
            'create' => CreateCustomerOrder::route('/create'),
            'edit' => EditCustomerOrder::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }
}