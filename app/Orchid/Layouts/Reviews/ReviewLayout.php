<?php

namespace App\Orchid\Layouts\Reviews;

/* Laravel */
use App\Models\Reviews;
use Illuminate\Support\Str;

/* Orchid */
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

class ReviewLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'review';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            /* Checkbox and ID */
            TD::make('id', '#')->render(function (Reviews $reviews) {
                return CheckBox::make('reviews[]')
                    ->value($reviews->id)
                    ->checked(false);
            })->align('right')->width('10px')->cantHide(),
            TD::make('id', __('platform.id'))->sort()->cantHide(),

            /* Hide boolean */
            TD::make('hide', __('platform.hide'))->render(function (Reviews $reviews) {
                return $reviews->hide == '1' ? 'Да' : 'Нет';
            })->sort(),

            /* Name */
            TD::make('author', __('platform.name'))->filter(TD::FILTER_TEXT)->render(function (Reviews $reviews) {
                return ModalToggle::make($reviews->author)
                    ->modal('asyncEditReview')
                    ->modalTitle(__('platform.edit'))
                    ->method('upsert')
                    ->asyncParameters([
                        'id' => $reviews->id,
                    ]);
            }),

            /* Quote */
            TD::make('quote', __('platform.description'))->render(function (Reviews $reviews) {
                $text = Str::limit($reviews->quote, 30, '...');
                return $text;
            }),

            /* Link */
            TD::make('link', __('platform.description'))->render(function (Reviews $reviews) {
                $text = Str::limit($reviews->link, 30, '...');
                return $text;
            }),

            /* Timestamp */
            TD::make('created_at', __('platform.created_at'))->defaultHidden(),
            TD::make('updated_at', __('platform.updated_at'))->defaultHidden(),

            /* Action Edit/Update */
            TD::make(__('platform.edit'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Reviews $reviews) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            ModalToggle::make(__('Edit'))
                            ->icon('pencil')
                            ->modal('asyncEditReview')
                            ->modalTitle(__('platform.edit'))
                            ->method('upsert')
                            ->asyncParameters([
                                'id' => $reviews->id,
                            ]),

                            Button::make(__('Delete'))
                            ->icon('trash')
                            ->method('delete')
                            ->confirm(__('platform.delete'))
                            ->parameters([
                                'id' => $reviews->id,
                            ]),
                        ]);
                }),
        ];
    }
}
