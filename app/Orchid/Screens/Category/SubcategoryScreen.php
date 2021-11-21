<?php

namespace App\Orchid\Screens\Category;

/* Laravel */
use App\Models\Subcategory;
use App\Http\Requests\Category\SubcategoryRequest;
use Illuminate\Http\Request;

/* Orchid */
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

use App\Orchid\Layouts\Category\SubcategoryLayout;
use App\Orchid\Layouts\Category\CreateOrUpdateSubcategoryLayot;

class SubcategoryScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Subcategory';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Subcategory List';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'subcategory' => Subcategory::filters()->defaultSort('id')->paginate()
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
            ModalToggle::make(__('miscellaneous.create_subcategory'))->modal('createSubcategory')->method('upsert')->icon('plus'),
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
            SubcategoryLayout::class,

            /* Modal Window Edit*/
            Layout::modal('createSubcategory', CreateOrUpdateSubcategoryLayot::class)->title(__('miscellaneous.create_subcategory'))->applyButton(__('platform.create')),
            Layout::modal('asyncEditSubcategory', CreateOrUpdateSubcategoryLayot::class)->async('asyncGetSubcategory'),
        ];
    }

   /* Model CRUD */
   public function asyncGetSubcategory(Subcategory $subcategory): array
   {
       return [
           'elements' => $subcategory,
       ];
   }

   public function upsert(Subcategory $subcategory, SubcategoryRequest $request): void
   {
    Subcategory::updateOrCreate(['id' => $subcategory->id], array_merge($request->validated()['elements']));

       if ($subcategory->id == null) {
           Toast::info(__('miscellaneous.success_subcategory'));
       } else {
           Toast::info(__('platform.success_updated'));
       }
   }

   public function delete(Request $request)
   {
       if ($request->id != null) {
           $data = Subcategory::find($request->id);
           $data->delete();

           Toast::success(__('platform.success_deleted'));
       } elseif ($request->subcategories == null) {
           Toast::warning(__('platform.not_selected'));
       } else {
           foreach ($request->subcategories as $key => $value) {
               $data = Subcategory::find($value);
               $data->delete();
           }
           Toast::success(__('platform.success_mass_deleted'));
       }
   }
}
