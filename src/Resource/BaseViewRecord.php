<?php

namespace NootPro\FilamentBase\Resource;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use NootPro\FilamentBase\Actions\RecordInformationAction;

class BaseViewRecord extends ViewRecord
{
    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            RecordInformationAction::make(),
        ];
    }
}
