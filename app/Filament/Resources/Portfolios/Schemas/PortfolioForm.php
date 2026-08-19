<?php

namespace App\Filament\Resources\Portfolios\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PortfolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Textarea::make('description')
                    ->nullable()
                    ->columnSpanFull(),
                FileUpload::make('cover_image')
                    ->image()
                    ->directory('portfolios/covers')
                    ->nullable()
                    ->columnSpanFull(),
                Select::make('service_id')
                    ->label('Related Service')
                    ->relationship('service', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                Toggle::make('is_published')
                    ->default(true),
            ]);
    }
}
