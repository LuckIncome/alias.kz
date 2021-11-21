<?php

namespace App\Orchid\Screens\Category;

/* Laravel */
use App\Models\Category;
use App\Http\Requests\Category\CategoryRequest;
use Illuminate\Http\Request;

/* Orchid */
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

use App\Orchid\Layouts\Category\CategoryLayout;
use App\Orchid\Layouts\Category\CreateOrUpdateCategoryLayot;

class CategoryScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Category';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Category List';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'category' => Category::filters()->defaultSort('id')->paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            ModalToggle::make(__('miscellaneous.create_category'))->modal('createCategory')->method('upsert')->icon('plus'),
            Button::make(__('platform.delete'))->method('delete')->icon('minus')
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            CategoryLayout::class,

            /* Modal Window Edit*/
            Layout::modal('createCategory', CreateOrUpdateCategoryLayot::class)->title(__('miscellaneous.create_category'))->applyButton(__('platform.create')),
            Layout::modal('asyncEditCategory', CreateOrUpdateCategoryLayot::class)->async('asyncGetCategory'),

        ];
    }

    /* Model CRUD */
    public function asyncGetCategory(Category $сategory): array
    {
        return [
            'elements' => $сategory,
        ];
    }

    public function upsert(Category $category, CategoryRequest $request): void
    {
        Category::updateOrCreate(['id' => $category->id], array_merge($request->validated()['elements']));

        if ($category->id == null) {
            Toast::info(__('miscellaneous.success_category'));
        } else {
            Toast::info(__('platform.success_updated'));
        }
    }

    public function delete(Request $request)
    {
        if ($request->id != null) {
            $data = Category::find($request->id);
            $data->delete();

            Toast::success(__('platform.success_deleted'));
        } elseif ($request->categories == null) {
            Toast::warning(__('platform.not_selected'));
        } else {
            foreach ($request->categories as $key => $value) {
                $data = Category::find($value);
                $data->delete();
            }
            Toast::success(__('platform.success_mass_deleted'));
        }
    }
}
