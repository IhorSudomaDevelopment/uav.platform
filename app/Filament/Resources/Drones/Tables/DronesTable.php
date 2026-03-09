<?php

namespace App\Filament\Resources\Drones\Tables;

use App\ValuesObject\DroneStatus;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;

class DronesTable
{
    public static function configure(Table $table): Table
    {
        $actions = [
            ViewAction::make()
                ->modalHeading('Борт')
                ->schema([
                    TextInput::make('title')->label('Назва'),
                    TextInput::make('serial_number')->label('СН'),
                    TextInput::make('kit')->label('KIT'),
                ]),
        ];
        $bulkActions = [];
        if (isRoleAdmin()) {
            $actions[] = EditAction::make();
        }
        return $table
            ->columns([
                TextColumn::make('title')->label('Назва'),
                TextColumn::make('serial_number')->label('СН'),
                TextColumn::make('kit')->label('KIT'),
                TextColumn::make('password')->label('Пароль'),
                TextColumn::make('type')->label('Тип'),
                TextColumn::make('status')->label('Статус'),
            ])->recordUrl(NULL)
            ->filters([
                SelectFilter::make('status')
                    ->label('Статус')
                    ->multiple()
                    ->options(DroneStatus::getList()),
            ])
            ->recordActions($actions)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Записів не знайдено');
    }
}
