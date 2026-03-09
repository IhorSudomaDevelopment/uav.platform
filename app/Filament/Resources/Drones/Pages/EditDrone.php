<?php

namespace App\Filament\Resources\Drones\Pages;

use App\Filament\Resources\Drones\DroneResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDrone extends EditRecord
{
    protected static string $resource = DroneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
