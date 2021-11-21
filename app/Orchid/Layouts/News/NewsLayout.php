<?php

namespace App\Orchid\Layouts\News;

/* Laravel */
use App\Models\News;
use Illuminate\Support\Str;

/* Orchid */
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

class NewsLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'news';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            /* Checkbox and ID */
            TD::make('id', '#')->render(function (News $news) {
                return CheckBox::make('news[]')
                    ->value($news->id)
                    ->checked(false);
            })->align('right')->width('10px')->cantHide(),
            TD::make('id', __('platform.id'))->sort()->cantHide(),

            /* Hide boolean */
            TD::make('hide', __('platform.hide'))->render(function (News $news) {
                return $news->hide == '1' ? 'Да' : 'Нет';
            })->sort(),

            /* Name */
            TD::make('name', __('platform.name'))->filter(TD::FILTER_TEXT)->render(function (News $news) {
                return ModalToggle::make($news->name)
                    ->modal('asyncEditNews')
                    ->modalTitle(__('platform.edit'))
                    ->method('upsert')
                    ->asyncParameters([
                        'id' => $news->id,
                    ]);
            }),

            /* Quote */
            TD::make('text', __('platform.description'))->render(function (News $news) {
                $text = Str::limit($news->quote, 30, '...');
                return $text;
            }),

            /* Timestamp */
            TD::make('created_at', __('platform.created_at'))->defaultHidden(),
            TD::make('updated_at', __('platform.updated_at'))->defaultHidden(),

            /* Action Edit/Update */
            TD::make(__('platform.edit'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (News $news) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            ModalToggle::make(__('Edit'))
                            ->icon('pencil')
                            ->modal('asyncEditNews')
                            ->modalTitle(__('platform.edit'))
                            ->method('upsert')
                            ->asyncParameters([
                                'id' => $news->id,
                            ]),

                            Button::make(__('Delete'))
                            ->icon('trash')
                            ->method('delete')
                            ->confirm(__('platform.delete'))
                            ->parameters([
                                'id' => $news->id,
                            ]),
                        ]);
                }),
        ];
    }
}
