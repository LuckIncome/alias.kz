<?php

namespace App\Orchid\Layouts\Promotions;

/* Orchid */
use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Upload;

class CreateOrUpdatePromotionLayot extends Rows
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

            Input::make('elements.title')
                ->type('text')
                ->required()
                ->title(__('platform.title'))
                ->placeholder(__('platform.title')),

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

            Quill::make('elements.text')
                ->rows(5)
                ->type('text')
                ->required()
                ->title(__('platform.text'))
                ->placeholder(__('platform.text')),

            Upload::make('elements.image')
                ->maxFiles(1)
                ->acceptedFiles('image/*')
                ->title('Загрузить изображение акции')
                ->type('file')
                ->required()
                ->multiple(false),

            CheckBox::make('elements.hide')
                ->title(__('platform.hide_header'))
                ->placeholder(__('platform.hide'))
                ->help(__('platform.hide_description'))
                ->sendTrueOrFalse(),
        ];
    }
}
