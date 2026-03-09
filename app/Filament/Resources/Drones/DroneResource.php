<?php

namespace App\Filament\Resources\Drones;

use App\Filament\Resources\Drones\Pages\CreateDrone;
use App\Filament\Resources\Drones\Pages\EditDrone;
use App\Filament\Resources\Drones\Pages\ListDrones;
use App\Filament\Resources\Drones\Schemas\DroneForm;
use App\Filament\Resources\Drones\Tables\DronesTable;
use App\Models\Drone;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DroneResource extends Resource
{
    protected static ?string $model = Drone::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-paper-airplane';

    /*** @var string|null */
    protected static ?string $navigationLabel = 'Борти';

    /*** @return int */
    public static function getNavigationSort(): int
    {
        return 3;
    }

    public static function form(Schema $schema): Schema
    {
        return DroneForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DronesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDrones::route('/'),
            'create' => CreateDrone::route('/create'),
            'edit' => EditDrone::route('/{record}/edit'),
        ];
    }
}
