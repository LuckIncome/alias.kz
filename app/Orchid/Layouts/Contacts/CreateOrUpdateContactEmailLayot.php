<?php

namespace App\Orchid\Layouts\Contacts;

/* Laravel */
use App\Models\Contacts;

/* Orchid */
use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;

class CreateOrUpdateContactEmailLayot extends Rows
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
            Relation::make('elements.contact_id')
                ->fromModel(Contacts::class, 'city')
                ->title(__('miscellaneous.category_relation'))
                ->help(__('miscellaneous.category_relation_help'))
                ->required(),

            Input::make('elements.value')
                ->type('email')
                ->required()
                ->title(__('platform.contacts_email'))
                ->placeholder(__('platform.contacts_email')),
        ];
    }
}
