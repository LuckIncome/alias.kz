<?php

namespace App\Orchid\Layouts\Reviews;

/* Orchid */
use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;

class CreateOrUpdateReviewLayot extends Rows
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
            Input::make('elements.author')
                ->type('text')
                ->required()
                ->title(__('platform.author'))
                ->placeholder(__('platform.author')),

            TextArea::make('elements.quote')
                ->rows(5)
                ->type('text')
                ->required()
                ->title(__('platform.quote'))
                ->placeholder(__('platform.quote')),

            Upload::make('elements.image')
                ->maxFiles(1)
                ->acceptedFiles('image/*')
                ->title('Загрузить изображение отзывы')
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
