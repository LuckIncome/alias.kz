<?php

namespace App\Orchid\Layouts\Contacts;

/* Laravel */
use App\Models\ContactPhone;

/* Orchid */
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

class ContactPhoneLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'contact_phone';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            /* Checkbox and ID */
            TD::make('id', '#')->render(function (ContactPhone $contact_phone) {
                return CheckBox::make('contact_phone[]')
                    ->value($contact_phone->id)
                    ->checked(false);
            })->align('right')->width('10px')->cantHide(),
            TD::make('id', __('platform.id'))->sort()->cantHide(),

            /* Relation */
            TD::make('contact_id', __('platform.city'))->render(function (ContactPhone $contact_phone) {
                return $contact_phone->contact->city;
            })->sort(),

            /* Value */
            TD::make('value', __('platform.contacts_phone'))->filter(TD::FILTER_TEXT)->render(function (ContactPhone $contact_phone) {
                return ModalToggle::make($contact_phone->value)
                    ->modal('asyncEditContactPhone')
                    ->modalTitle(__('platform.edit'))
                    ->method('upsert')
                    ->asyncParameters([
                        'id' => $contact_phone->id,
                    ]);
            }),

            /* Timestamp */
            TD::make('created_at', __('platform.created_at'))->defaultHidden(),
            TD::make('updated_at', __('platform.updated_at'))->defaultHidden(),

            /* Action Edit/Update */
            TD::make(__('platform.edit'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (ContactPhone $contact_phone) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            ModalToggle::make(__('Edit'))
                            ->icon('pencil')
                            ->modal('asyncEditContactPhone')
                            ->modalTitle(__('platform.edit'))
                            ->method('upsert')
                            ->asyncParameters([
                                'id' => $contact_phone->id,
                            ]),

                            Button::make(__('Delete'))
                            ->icon('trash')
                            ->method('delete')
                            ->confirm(__('platform.delete'))
                            ->parameters([
                                'id' => $contact_phone->id,
                            ]),
                        ]);
                }),
        ];
    }
}
