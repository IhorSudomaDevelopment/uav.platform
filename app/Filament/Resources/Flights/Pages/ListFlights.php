<?php

namespace App\Filament\Resources\Flights\Pages;

use App\Filament\Resources\Flights\FlightResource;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

/**
 *
 */
class ListFlights extends ListRecords
{
    /*** @var string */
    protected static string $resource = FlightResource::class;

    /*** @var string|null */
    protected static ?string $title = 'Польоти';

    /*** @return array|string[] */
    public function getBreadcrumbs(): array
    {
        return [];
    }

    /*** @return array|Action[]|ActionGroup[] */
    protected function getHeaderActions(): array
    {
        $actions[] = CreateAction::make()
            ->label('Додати')
            ->icon('heroicon-o-plus');
        return $actions;
    }
}
