<?php

namespace App\Orchid\Layouts\Settings;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\CheckBox;


class CreateOrUpdateHeaderLayot extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): array
    {
        return [
            Input::make('elements.name')
                ->type('text')
                ->required()
                ->title(__('platform.name'))
                ->placeholder(__('platform.name')),

            Input::make('elements.description')
                ->type('text')
                ->required()
                ->title(__('platform.description'))
                ->placeholder(__('platform.description')),

            Input::make('elements.value')
                ->type('text')
                ->required()
                ->title(__('platform.value'))
                ->placeholder(__('platform.value')),

            CheckBox::make('elements.hide')
                ->title(__('platform.hide_header'))
                ->placeholder(__('platform.hide'))
                ->help(__('platform.hide_description'))
                ->sendTrueOrFalse(),
        ];
    }
}
