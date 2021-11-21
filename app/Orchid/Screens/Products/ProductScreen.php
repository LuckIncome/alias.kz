<?php

namespace App\Orchid\Screens\Products;

/* Laravel */
use App\Models\Products;
use App\Http\Requests\Products\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Orchid\Attachment\Models\Attachment;

/* Orchid */
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Actions\Link;

use App\Orchid\Layouts\Products\ProductLayout;

class ProductScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Products';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Products List';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'products' => Products::filters()->defaultSort('id')->paginate()
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
            Link::make(__('miscellaneous.create_product'))->icon('plus')->route('product.create'),
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
            ProductLayout::class,
        ];
    }

    /* Model CRUD */
    public function asyncGetProduct(Products $products): array
    {
        $products->load('image');

        return [
            'elements' => $products,
        ];
    }

    public function asyncBlank(): array
    {
        return [
            'elements' => 1,
        ];
    }

    public function upsert(Products $products, ProductRequest $request): void
    {
        Products::updateOrCreate(['id' => $products->id], array_merge($request->validated()['elements'], ['image' => array_shift($request->validated()['elements']['image'])]));

        if ($products->id == null) {
            Toast::info(__('miscellaneous.success_product'));
        } else {
            Toast::info(__('platform.success_updated'));
        }
    }

    public function delete(Request $request)
    {
        if ($request->id != null) {
            $buildPath = Attachment::select(['path', 'name', 'extension'])->find(Products::find($request->id)->image);

            $data = Products::find($request->id);

            if ($buildPath != null) {
                $path = $buildPath->path . $buildPath-> name . "." . $buildPath->extension;

                Storage::disk('public')->delete($path);
                $data->image()->delete();
            }

            $data->delete();


            Toast::success(__('platform.success_deleted'));
        } elseif ($request->products == null) {
            Toast::warning(__('platform.not_selected'));
        } else {
            foreach ($request->products as $key => $value) {
                $buildPath = Attachment::select(['path', 'name', 'extension'])->find(Products::find($value)->image);

                $data = Products::find($value);

                if ($buildPath != null) {
                    $path = $buildPath->path . $buildPath-> name . "." . $buildPath->extension;

                    Storage::disk('public')->delete($path);
                    $data->image()->delete();
                }

                $data->delete();
            }
            Toast::success(__('platform.success_mass_deleted'));
        }
    }
}
