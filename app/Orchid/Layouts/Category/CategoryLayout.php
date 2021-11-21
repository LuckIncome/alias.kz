<?php

namespace App\Orchid\Layouts\Category;

/* Laravel */
use App\Models\Category;
use Illuminate\Support\Str;

/* Orchid */
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

class CategoryLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'category';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            /* Checkbox and ID */
            TD::make('id', '#')->render(function (Category $category) {
                return CheckBox::make('categories[]')
                    ->value($category->id)
                    ->checked(false);
            })->align('right')->width('10px')->cantHide(),
            TD::make('id', __('platform.id'))->sort()->cantHide(),

            /* Hide boolean */
            TD::make('hide', __('platform.hide'))->render(function (Category $category) {
                return $category->hide == '1' ? 'Да' : 'Нет';
            })->sort(),

            /* Popular boolean */
            TD::make('popular', __('platform.popular'))->render(function (Category $category) {
                return $category->popular == '1' ? 'Да' : 'Нет';
            })->sort(),

            /* Name */
            TD::make('name', __('platform.name'))->filter(TD::FILTER_TEXT)->render(function (Category $category) {
                return ModalToggle::make($category->name)
                    ->modal('asyncEditCategory')
                    ->modalTitle(__('platform.edit'))
                    ->method('upsert')
                    ->asyncParameters([
                        'category' => $category->id,
                    ]);
            }),

            /* Description */
            TD::make('description', __('platform.description'))->render(function (Category $category) {
                $text = Str::limit($category->description, 30, '...');
                return $text;
            }),

            /* Timestamp */
            TD::make('created_at', __('platform.created_at'))->defaultHidden(),
            TD::make('updated_at', __('platform.updated_at'))->defaultHidden(),

            /* Action Edit/Update */
            TD::make(__('platform.edit'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Category $category) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            ModalToggle::make(__('Edit'))
                            ->icon('pencil')
                            ->modal('asyncEditCategory')
                            ->modalTitle(__('platform.edit'))
                            ->method('upsert')
                            ->asyncParameters([
                                'id' => $category->id,
                            ]),

                            Button::make(__('Delete'))
                            ->icon('trash')
                            ->method('delete')
                            ->confirm(__('platform.delete'))
                            ->parameters([
                                'id' => $category->id,
                            ]),


                        ]);
                }),
        ];
    }
}
