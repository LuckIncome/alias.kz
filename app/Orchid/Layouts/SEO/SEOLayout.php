<?php

namespace App\Orchid\Layouts\SEO;

/* Laravel */
use App\Models\SEO;
use Illuminate\Support\Str;

/* Orchid */
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\ModalToggle;



class SEOLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'seo';

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

            /* SEO Page */
            TD::make('page', __('platform.page'))->render(function (SEO $seo) {
                return ModalToggle::make($seo->page)
                    ->modal('asyncEditSEO')
                    ->modalTitle(__('platform.edit'))
                    ->method('upsert')
                    ->asyncParameters([
                        'category' => $seo->id,
                    ]);
            }),

            /* SEO Title */
            TD::make('title', __('platform.title'))->render(function (SEO $seo) {
                $text = Str::limit($seo->title, 30, '...');
                return $text;
            }),

            /* SEO Keywords */
            TD::make('seo_keywords', __('platform.seo_keywords'))->render(function (SEO $seo) {
                $text = Str::limit($seo->seo_keywords, 30, '...');
                return $text;
            }),

            /* SEO Description */
            TD::make('seo_description', __('platform.seo_description'))->render(function (SEO $seo) {
                $text = Str::limit($seo->seo_description, 30, '...');
                return $text;
            }),

            /* Timestamp */
            TD::make('created_at', __('platform.created_at'))->defaultHidden(),
            TD::make('updated_at', __('platform.updated_at'))->defaultHidden(),

            /* Action Edit/Update */
            TD::make(__('platform.edit'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (SEO $seo) {
                    return  ModalToggle::make(__('Edit'))
                                ->icon('pencil')
                                ->modal('asyncEditSEO')
                                ->modalTitle(__('platform.edit'))
                                ->method('upsert')
                                ->asyncParameters([
                                    'id' => $seo->id,
                                ]);
                }),
        ];
    }
}
