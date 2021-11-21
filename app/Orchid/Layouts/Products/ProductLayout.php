<?php

namespace App\Orchid\Layouts\Products;

/* Laravel */
use App\Models\Products;
use Illuminate\Support\Str;

/* Orchid */
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\DropDown;

class ProductLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'products';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            /* Checkbox and ID */
            TD::make('id', '#')->render(function (Products $products) {
                return CheckBox::make('products[]')
                    ->value($products->id)
                    ->checked(false);
            })->align('right')->width('10px')->cantHide(),
            TD::make('id', __('platform.id'))->sort()->cantHide(),

            /* Hide boolean */
            TD::make('hide', __('platform.hide'))->render(function (Products $products) {
                return $products->hide == '1' ? 'Да' : 'Нет';
            })->sort(),

            /* Popular boolean */
            TD::make('popular', __('platform.popular'))->render(function (Products $products) {
                return $products->popular == '1' ? 'Да' : 'Нет';
            })->sort(),

            /* Category */
            TD::make('category_id', __('platform.category'))->render(function (Products $products) {
                return $products->category->name;
            })->sort(),

            /* Subcategory */
            TD::make('subcategory_id', __('platform.subcategory'))->render(function (Products $products) {
                return $products->subcategory->name;
            })->sort(),

            /* Name */
            TD::make('name', __('platform.name'))->filter(TD::FILTER_TEXT)->render(function (Products $products) {
                return Link::make($products->name)
                    ->route('product.edit', $products->id);
            }),

            /* Description */
            TD::make('description', __('platform.description'))->render(function (Products $products) {
                $text = Str::limit($products->description, 30, '...');
                return $text;
            }),

            /* Timestamp */
            TD::make('created_at', __('platform.created_at'))->defaultHidden(),
            TD::make('updated_at', __('platform.updated_at'))->defaultHidden(),

            /* Action Edit/Update */
            TD::make(__('platform.edit'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(function (Products $products) {
                    return DropDown::make()
                        ->icon('options-vertical')
                        ->list([
                            Link::make(__('Edit'))
                            ->icon('pencil')
                            ->route('product.edit', $products->id),

                            Button::make(__('Delete'))
                            ->icon('trash')
                            ->method('delete')
                            ->confirm(__('platform.delete'))
                            ->parameters([
                                'id' => $products->id,
                            ]),
                        ]);
                }),
        ];
    }
}
