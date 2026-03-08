<?php

namespace App\Filament\Resources\Ammunitions;

use App\Filament\Resources\Ammunitions\Pages\CreateAmmunition;
use App\Filament\Resources\Ammunitions\Pages\EditAmmunition;
use App\Filament\Resources\Ammunitions\Pages\ListAmmunitions;
use App\Filament\Resources\Ammunitions\Schemas\AmmunitionForm;
use App\Filament\Resources\Ammunitions\Tables\AmmunitionsTable;
use App\Models\Ammunition;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class AmmunitionResource extends Resource
{
    /*** @var string|null */
    protected static ?string $model = Ammunition::class;

    /*** @var string|null|BackedEnum */
    protected static string|null|BackedEnum $navigationIcon = 'heroicon-o-rocket-launch';

    /*** @var string|null */
    protected static ?string $navigationLabel = 'Боєкомплект';

    /*** @return int */
    public static function getNavigationSort(): int
    {
        return 4;
    }

    public static function form(Schema $schema): Schema
    {
        return AmmunitionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AmmunitionsTable::configure($table);
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
            'index' => ListAmmunitions::route('/'),
            'create' => CreateAmmunition::route('/create'),
            'edit' => EditAmmunition::route('/{record}/edit'),
        ];
    }
}
