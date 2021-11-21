<?php

namespace App\Orchid\Layouts\Category;

/* Laravel */
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

/* Orchid */
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;

class SubcategoryLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'subcategory';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            /* Checkbox and ID */
            TD::make('id', '#')->render(function (Subcategory $subcategory) {
                return CheckBox::make('subcategories[]')
                    ->value($subcategory->id)
                    ->checked(false);
            })->align('right')->width('10px')->cantHide(),
            TD::make('id', __('platform.id'))->sort()->cantHide(),

            /* Hide boolean */
            TD::make('hide', __('platform.hide'))->render(function (Subcategory $subcategory) {
                return $subcategory->hide == '1' ? 'Да' : 'Нет';
            })->sort(),

            /* Name */
            TD::make('name', __('platform.name'))->filter(TD::FILTER_TEXT)->render(function (Subcategory $subcategory) {
                return ModalToggle::make($subcategory->name)
                    ->modal('asyncEditSubcategory')
                    ->modalTitle(__('platform.edit'))
                    ->method('upsert')
                    ->asyncParameters([
                        'id' => $subcategory->id,
                    ]);
            }),

            /* Subcategory */
            TD::make('category_id', __('platform.category'))->render(function (Subcategory $subcategory) {
                return $subcategory->category->name;
            })->sort(),

            /* Description */
            TD::make('description', __('platform.description'))->render(function (Subcategory $subcategory) {
                $text = Str::limit($subcategory->description, 30, '...');
                return $text;
            }),

            /* Timestamp */
            TD::make('created_at', __('platform.created_at'))->defaultHidden(),
            TD::make('updated_at', __('platform.updated_at'))->defaultHidden(),

            /* Action Edit/Update */
            TD::make(__('platform.edit'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Subcategory $subcategory) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            ModalToggle::make(__('Edit'))
                            ->icon('pencil')
                            ->modal('asyncEditSubcategory')
                            ->modalTitle(__('platform.edit'))
                            ->method('upsert')
                            ->asyncParameters([
                                'id' => $subcategory->id,
                            ]),

                            Button::make(__('Delete'))
                            ->icon('trash')
                            ->method('delete')
                            ->confirm(__('platform.delete'))
                            ->parameters([
                                'id' => $subcategory->id,
                            ]),
                        ]);
                }),
        ];
    }
}
