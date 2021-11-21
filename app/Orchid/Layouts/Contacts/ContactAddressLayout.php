<?php

namespace App\Orchid\Layouts\Contacts;

/* Laravel */
use App\Models\ContactAddress;

/* Orchid */
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

class ContactAddressLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'contact_address';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            /* Checkbox and ID */
            TD::make('id', '#')->render(function (ContactAddress $contact_address) {
                return CheckBox::make('contact_address[]')
                    ->value($contact_address->id)
                    ->checked(false);
            })->align('right')->width('10px')->cantHide(),
            TD::make('id', __('platform.id'))->sort()->cantHide(),

            /* Relation */
            TD::make('contact_id', __('platform.city'))->render(function (ContactAddress $contact_address) {
                return $contact_address->contact->city;
            })->sort(),

            /* Value */
            TD::make('value', __('platform.contacts_address'))->filter(TD::FILTER_TEXT)->render(function (ContactAddress $contact_address) {
                return ModalToggle::make($contact_address->value)
                    ->modal('asyncEditContactAddress')
                    ->modalTitle(__('platform.edit'))
                    ->method('upsert')
                    ->asyncParameters([
                        'id' => $contact_address->id,
                    ]);
            }),

            /* Timestamp */
            TD::make('created_at', __('platform.created_at'))->defaultHidden(),
            TD::make('updated_at', __('platform.updated_at'))->defaultHidden(),

            /* Action Edit/Update */
            TD::make(__('platform.edit'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (ContactAddress $contact_address) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            ModalToggle::make(__('Edit'))
                            ->icon('pencil')
                            ->modal('asyncEditContactAddress')
                            ->modalTitle(__('platform.edit'))
                            ->method('upsert')
                            ->asyncParameters([
                                'id' => $contact_address->id,
                            ]),

                            Button::make(__('Delete'))
                            ->icon('trash')
                            ->method('delete')
                            ->confirm(__('platform.delete'))
                            ->parameters([
                                'id' => $contact_address->id,
                            ]),
                        ]);
                }),
        ];
    }
}
