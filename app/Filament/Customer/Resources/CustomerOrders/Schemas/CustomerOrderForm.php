<?php

namespace App\Filament\Customer\Resources\CustomerOrders\Schemas;

use App\Enums\OrderStatus;
use App\Models\ServiceCategory;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CustomerOrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('service_category_id')
                    ->label('Kategori Layanan')
                    ->relationship('serviceCategory', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->nullable()
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->label('Harga (Rp)')
                    ->numeric()
                    ->prefix('Rp')
                    ->nullable(),
                Select::make('status')
                    ->options(collect(OrderStatus::cases())->mapWithKeys(fn ($s) => [$s->value => $s->label()]))
                    ->required()
                    ->default('pending')
                    ->disabled(),
                TextInput::make('due_date')
                    ->label('Estimasi Selesai')
                    ->type('datetime-local')
                    ->nullable()
                    ->disabled(),
            ]);
    }
}