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

class BaseEditRecord extends EditRecord
{
    protected function getHeaderActions(): array
    {
        return [
            ...parent::getHeaderActions(),
            ViewAction::make()->visible(static::getResource()::hasPage('view')),
            DeleteAction::make(),
            $this->getRecordInformationAction(),
        ];
    }

    public function getRecordInformationAction(): Action
    {
        return Action::make('record_information')
            ->label(__('app.record_info'))
            ->icon('tabler-info-circle-filled')
            ->slideOver()
            ->modalWidth(MaxWidth::Small)
            ->modalCancelActionLabel(__('app.close'))
            ->modalSubmitAction(false)
            ->form(function () {
                return [
                    Grid::make()
                        ->schema([
                            Section::make(__('app.record_info'))
                                ->columns(1)
                                ->compact()
                                ->schema([
                                    Placeholder::make('created_at')
                                        ->label(__('app.created_at'))
                                        ->content(fn ($record): string => $record?->created_at
                                            ? $record->created_at->translatedFormat('Y/m/d - h:i A')
                                            : '-'),

                                    PopoverForm::make('created_by')
                                        ->formatStateUsing(fn ($record) => $record?->createdBy?->name)
                                        ->placement('right')
                                        ->content(fn ($record) => view('filament-base::user-card', [
                                            'user' => $record?->createdBy,
                                            'column' => 'created-by',
                                            'record' => $record,
                                        ]))
                                        ->label(__('app.created_by')),

                                    Placeholder::make('updated_at')
                                        ->label(__('app.updated_at'))
                                        ->content(fn ($record): string => $record?->updated_at
                                            ? $record->updated_at->translatedFormat('Y/m/d - h:i A')
                                            : '-'),

                                    PopoverForm::make('updated_by')
                                        ->formatStateUsing(fn ($record) => $record?->updatedBy?->name)
                                        ->placement('right')
                                        ->content(fn ($record) => view('filament-base::user-card', [
                                            'user' => $record?->updatedBy,
                                            'column' => 'updated-by',
                                            'record' => $record,
                                        ]))
                                        ->label(__('app.updated_by')),
                                ])
                                ->icon('tabler-info-circle-filled')
                                ->collapsible(),
                        ]),
                ];
            });
    }
}
