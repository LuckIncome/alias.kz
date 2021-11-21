<?php

namespace App\Orchid\Layouts\Settings;

/* Laravel */
use App\Models\Header;
use Illuminate\Support\Str;

/* Orchid */
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\ModalToggle;


class HeaderLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'header';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            /* Checkbox and ID */
            TD::make('id', __('platform.id'))->sort()->cantHide(),

            /* Hide boolean */
            TD::make('hide', __('platform.hide'))->render(function (Header $header) {
                return $header->hide == '1' ? 'Да' : 'Нет';
            })->sort(),

            /* Name */
            TD::make('name', __('platform.name'))->filter(TD::FILTER_TEXT)->render(function (Header $header) {
                return ModalToggle::make($header->name)
                    ->modal('asyncEditHeader')
                    ->modalTitle(__('platform.edit'))
                    ->method('upsert')
                    ->asyncParameters([
                        'id' => $header->id,
                    ]);
            }),

            /* Description */
            TD::make('description', __('platform.description'))->render(function (Header $header) {
                $text = Str::limit($header->description, 30, '...');
                return $text;
            }),

            /* Value */
            TD::make('value', __('platform.value'))->render(function (Header $header) {
                $text = Str::limit($header->value, 30, '...');
                return $text;
            }),

            /* Timestamp */
            TD::make('created_at', __('platform.created_at'))->defaultHidden(),
            TD::make('updated_at', __('platform.updated_at'))->defaultHidden(),

            /* Action Edit/Update */
            TD::make(__('platform.edit'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Header $header) {
                    return  ModalToggle::make(__('Edit'))
                                ->icon('pencil')
                                ->modal('asyncEditHeader')
                                ->modalTitle(__('platform.edit'))
                                ->method('upsert')
                                ->asyncParameters([
                                    'id' => $header->id,
                                ]);
                }),
        ];
    }
}
