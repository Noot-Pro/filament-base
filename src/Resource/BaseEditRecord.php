<?php

namespace NootPro\FilamentBase\Resource;

use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use NootPro\FilamentBase\Actions\RecordInformationAction;

class BaseEditRecord extends EditRecord
{
    protected function getHeaderActions(): array
    {
        return [
            ...parent::getHeaderActions(),
            ViewAction::make()->visible(static::getResource()::hasPage('view')),
            DeleteAction::make(),
            RecordInformationAction::make(),
        ];
    }
}
