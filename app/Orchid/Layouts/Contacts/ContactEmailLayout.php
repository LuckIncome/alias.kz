<?php

namespace App\Orchid\Layouts\Contacts;

/* Laravel */
use App\Models\ContactEmail;

/* Orchid */
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

class ContactEmailLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'contact_email';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            /* Checkbox and ID */
            TD::make('id', '#')->render(function (ContactEmail $contact_email) {
                return CheckBox::make('contact_email[]')
                    ->value($contact_email->id)
                    ->checked(false);
            })->align('right')->width('10px')->cantHide(),
            TD::make('id', __('platform.id'))->sort()->cantHide(),

            /* Relation */
            TD::make('contact_id', __('platform.city'))->render(function (ContactEmail $contact_email) {
                return $contact_email->contact->city;
            })->sort(),

            /* Value */
            TD::make('value', __('platform.contacts_email'))->filter(TD::FILTER_TEXT)->render(function (ContactEmail $contact_email) {
                return ModalToggle::make($contact_email->value)
                    ->modal('asyncEditContactEmail')
                    ->modalTitle(__('platform.edit'))
                    ->method('upsert')
                    ->asyncParameters([
                        'id' => $contact_email->id,
                    ]);
            }),

            /* Timestamp */
            TD::make('created_at', __('platform.created_at'))->defaultHidden(),
            TD::make('updated_at', __('platform.updated_at'))->defaultHidden(),

            /* Action Edit/Update */
            TD::make(__('platform.edit'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (ContactEmail $contact_email) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            ModalToggle::make(__('Edit'))
                            ->icon('pencil')
                            ->modal('asyncEditContactEmail')
                            ->modalTitle(__('platform.edit'))
                            ->method('upsert')
                            ->asyncParameters([
                                'id' => $contact_email->id,
                            ]),

                            Button::make(__('Delete'))
                            ->icon('trash')
                            ->method('delete')
                            ->confirm(__('platform.delete'))
                            ->parameters([
                                'id' => $contact_email->id,
                            ]),
                        ]);
                }),
        ];
    }
}
