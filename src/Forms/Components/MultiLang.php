<?php

namespace NootPro\FilamentBase\Forms\Components;

use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;

class MultiLang extends Tabs
{
    public string $langKey = '';

    public static function make(?string $label = null): static
    {
        static::configureUsing(function (self $component) use ($label) {
            if ($label !== null) {
                $component->langKey = $label;
            }
        });

        return parent::make($label);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->extraAttributes(['class' => 'fi-multi-lang-input'])
            ->tabs(function (MultiLang $multiLangComponent) {
                $tabs = [];
                /** @var array<string, array{name: string}> $locales */
                $locales = config('custom.locales') ?? ['en' => ['name' => 'English'], 'ar' => ['name' => 'Arabic']];

                foreach ($locales as $lang => $info) {
                    $langCode = (string) $lang;
                    $langName = $info['name'];

                    $tabs[] = Tab::make('tab-' . $langCode)
                        ->statePath($this->getLangKey())
                        ->label($langName)
                        ->schema(fn (Tab $tabComponent) => [
                            TextInput::make($langCode)
                                ->required(fn () => app()->getLocale() === $langCode)
                                ->label(fn () => $multiLangComponent->getLabel()),
                        ]);
                }

                return $tabs;
            });
    }

    public function getLangKey(): string
    {
        return $this->langKey;
    }
}
