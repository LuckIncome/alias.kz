<?php

namespace App\Orchid\Layouts\Certificates;

/* Orchid */
use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Upload;

class CreateOrUpdateCertificateLayot extends Rows
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
