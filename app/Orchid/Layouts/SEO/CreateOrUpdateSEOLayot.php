<?php

namespace App\Orchid\Layouts\SEO;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\CheckBox;

class CreateOrUpdateSEOLayot extends Rows
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
            Input::make('elements.page')
                ->type('text')
                ->required()
                ->title(__('platform.page'))
                ->placeholder(__('platform.page')),

            Input::make('elements.title')
                ->type('text')
                ->required()
                ->title(__('platform.title'))
                ->placeholder(__('platform.title')),

            Input::make('elements.seo_keywords')
                ->type('text')
                ->required()
                ->title(__('platform.seo_keywords'))
                ->placeholder(__('platform.seo_keywords')),

            Input::make('elements.seo_description')
                ->type('text')
                ->required()
                ->title(__('platform.seo_description'))
                ->placeholder(__('platform.seo_description')),
        ];
    }
}
