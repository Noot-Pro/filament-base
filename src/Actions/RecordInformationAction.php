<?php

namespace NootPro\FilamentBase\Actions;

use Filament\Actions\Action;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\Width;
use LaraZeus\Popover\Form\PopoverForm;

class RecordInformationAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'record_information';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label(__('Record info'))
            ->icon('heroicon-o-information-circle')
            ->slideOver()
            ->modalWidth(Width::Small)
            ->modalCancelActionLabel(__('Close'))
            ->modalSubmitAction(false)
            ->schema(function () {
                return [
                    Grid::make()
                        ->schema([
                            Section::make(__('Record info'))
                                ->columnSpanFull()
                                ->compact()
                                ->schema([
                                    TextEntry::make('created_at')
                                        ->label(__('Created at'))
                                        ->placeholder('-')
                                        ->dateTime('Y/m/d - h:i A'),

                                    PopoverForm::make('created_by')
                                        ->icon('heroicon-m-user')
                                        ->formatStateUsing(fn ($record) => $record?->createdBy?->name)
                                        ->placement('right')
                                        ->content(fn ($record) => view('filament-base::user-card', [
                                            'user' => $record?->createdBy,
                                            'column' => 'created-by',
                                            'record' => $record,
                                        ]))
                                        ->label(__('Created by')),

                                    TextEntry::make('updated_at')
                                        ->label(__('Updated at'))
                                        ->placeholder('-')
                                        ->dateTime('Y/m/d - h:i A'),

                                    PopoverForm::make('updated_by')
                                        ->icon('heroicon-m-user')
                                        ->formatStateUsing(fn ($record) => $record?->updatedBy?->name)
                                        ->placement('right')
                                        ->content(fn ($record) => view('filament-base::user-card', [
                                            'user' => $record?->updatedBy,
                                            'column' => 'updated-by',
                                            'record' => $record,
                                        ]))
                                        ->label(__('Updated by')),
                                ])
                                ->icon('heroicon-o-information-circle')
                                ->collapsible(),
                        ]),
                ];
            });
    }
}
