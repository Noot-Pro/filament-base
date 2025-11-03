<?php

namespace NootPro\FilamentBase\Resource;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class BaseListRecords extends ListRecords
{
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
