<?php

namespace App\Orchid\Layouts\Category;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\TextArea;

class CreateOrUpdateCategoryLayot extends Rows
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

            Input::make('elements.slug')
                ->type('text')
                ->required()
                ->title(__('platform.slug'))
                ->placeholder(__('platform.slug')),

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

            TextArea::make('elements.description')
                ->rows(5)
                ->type('text')
                ->title(__('platform.description'))
                ->placeholder(__('platform.description')),

            CheckBox::make('elements.hide')
                ->title(__('platform.hide_header'))
                ->placeholder(__('platform.hide'))
                ->help(__('platform.hide_description'))
                ->sendTrueOrFalse(),

            CheckBox::make('elements.popular')
                ->title(__('platform.popular_header'))
                ->placeholder(__('platform.popular'))
                ->help(__('platform.popular_description'))
                ->sendTrueOrFalse(),
        ];
    }
}
