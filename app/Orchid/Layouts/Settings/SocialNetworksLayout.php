<?php

namespace App\Orchid\Layouts\Settings;

/* Laravel */
use App\Models\SocialNetworks;

/* Orchid */
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\DropDown;

class SocialNetworksLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'social_networks';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            /* ID */
            TD::make('id', __('platform.id'))->cantHide(),

            /* Hide boolean */
            TD::make('hide', __('platform.hide'))->render(function (SocialNetworks $socialNetworks) {
                return $socialNetworks->hide == '1' ? 'Да' : 'Нет';
            }),

            /* Description */
            TD::make('description', __('platform.description'))->render(function (SocialNetworks $socialNetworks) {
                return ModalToggle::make($socialNetworks->description)
                    ->modal('AsyncEditSocialNetworks')
                    // ->modalTitle($products->presenter()->title())
                    ->modalTitle('Редактировать')
                    ->method('upsert')
                    ->asyncParameters([
                        'id' => $socialNetworks->id,
                    ]);
            }),

            /* Name */
            TD::make('name', __('platform.name')),

            /* Link */
            TD::make('link', __('platform.link')),

            /* Image */
            TD::make('image', __('platform.image')),

            /* Timestamp */
            TD::make('created_at', 'Создано')->defaultHidden(),
            TD::make('updated_at', 'Обновлено')->defaultHidden(),

            /* Action Edit/Update */
            TD::make(__('platform.edit'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (SocialNetworks $socialNetworks) {
                    return  ModalToggle::make(__('Edit'))
                                ->icon('pencil')
                                ->modal('AsyncEditSocialNetworks')
                                ->modalTitle(__('platform.edit'))
                                ->method('upsert')
                                ->asyncParameters([
                                    'id' => $socialNetworks->id,
                                ]);
                }),
        ];
    }
}
