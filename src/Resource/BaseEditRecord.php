<?php

namespace NootPro\FilamentBase\Resource;

use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Enums\MaxWidth;
use LaraZeus\Popover\Form\PopoverForm;
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
