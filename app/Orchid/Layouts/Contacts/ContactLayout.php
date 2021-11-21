<?php

namespace App\Orchid\Layouts\Contacts;

/* Laravel */
use App\Models\Contacts;

/* Orchid */
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

class ContactLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'contacts';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            /* Checkbox and ID */
            TD::make('id', '#')->render(function (Contacts $contacts) {
                return CheckBox::make('contacts[]')
                    ->value($contacts->id)
                    ->checked(false);
            })->align('right')->width('10px')->cantHide(),
            TD::make('id', __('platform.id'))->sort()->cantHide(),

            /* Hide boolean */
            TD::make('hide', __('platform.hide'))->render(function (Contacts $contacts) {
                return $contacts->hide == '1' ? 'Да' : 'Нет';
            })->sort(),

            /* Name */
            TD::make('city', __('platform.city'))->filter(TD::FILTER_TEXT)->render(function (Contacts $contacts) {
                return ModalToggle::make($contacts->city)
                    ->modal('asyncEditContact')
                    ->modalTitle(__('platform.edit'))
                    ->method('upsert')
                    ->asyncParameters([
                        'id' => $contacts->id,
                    ]);
            }),

            /* Timestamp */
            TD::make('created_at', __('platform.created_at'))->defaultHidden(),
            TD::make('updated_at', __('platform.updated_at'))->defaultHidden(),

            /* Action Edit/Update */
            TD::make(__('platform.edit'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Contacts $contacts) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            ModalToggle::make(__('Edit'))
                            ->icon('pencil')
                            ->modal('asyncEditContact')
                            ->modalTitle(__('platform.edit'))
                            ->method('upsert')
                            ->asyncParameters([
                                'id' => $contacts->id,
                            ]),

                            Button::make(__('Delete'))
                            ->icon('trash')
                            ->method('delete')
                            ->confirm(__('platform.delete'))
                            ->parameters([
                                'id' => $contacts->id,
                            ]),
                        ]);
                }),
        ];
    }
}
