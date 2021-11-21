<?php

namespace App\Orchid\Screens\Products;

use Orchid\Screen\Screen;

/* Laravel */
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Requests\Products\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Orchid\Attachment\Models\Attachment;

/* Orchid */
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Upload;

use App\Orchid\Layouts\Products\ProductListener;

class ProductEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Edit product';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Products displayed on the home page';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Products $products): array
    {
        $this->products = $products;

        if (! $products->exists) {
        $this->name = 'Create a new product';
        }

        return [
            'elements' => Products::find($products->id)
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
            Button::make(__('Remove'))
                ->icon('minus')
                ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                ->method('delete', 25)
                ->canSee($this->products->exists),

            Button::make(__('platform.save'))
                ->icon('check')
                ->method('upsert'),
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
            Layout::rows([
                Input::make('elements.name')
                    ->type('text')
                    ->required()
                    ->title(__('platform.name'))
                    ->placeholder(__('platform.name')),

                Input::make('elements.title')
                    ->type('text')
                    ->required()
                    ->title(__('platform.title'))
                    ->placeholder(__('platform.title')),

                Input::make('elements.slug')
                    ->type('text')
                    ->required()
                    ->title(__('platform.slug'))
                    ->placeholder(__('platform.slug')),

                Input::make('elements.seo_keywords')
                    ->type('text')
                    ->required()
                    ->title(__('platform.seo_keywords'))
                    ->placeholder(__('platform.seo_keywords')),

                Input::make('elements.seo_description')
                    ->type('text')
                    ->required()
                    ->title(__('platform.seo_description'))
                    ->placeholder(__('platform.seo_description')),

                Quill::make('elements.description')
                    ->toolbar(["text", "header", "list", "format"])
                    ->type('text')
                    ->title(__('platform.description'))
                    ->placeholder(__('platform.description')),

                Upload::make('elements.image')
                    ->maxFiles(1)
                    ->acceptedFiles('image/*')
                    ->title('Загрузить изображение товара')
                    ->type('file')
                    ->required()
                    ->multiple(false),

                CheckBox::make('elements.hide')
                    ->title(__('platform.hide_header'))
                    ->placeholder(__('platform.hide'))
                    ->help(__('platform.hide_description'))
                    ->sendTrueOrFalse(),

                CheckBox::make('elements.popular')
                ->title(__('platform.popular_header'))
                ->placeholder(__('platform.popular'))
                ->help(__('platform.popular_description'))
                ->sendTrueOrFalse(),
            ]),

            ProductListener::class,
        ];
    }

    /* Model CRUD */
    public function asyncRelationCategory($data)
    {
        return [
            'category_id' => $data['category_id'],
        ];
    }

    public function upsert(Products $products, ProductRequest $request)
    {
        Products::updateOrCreate(['id' => $products->id], array_merge($request->validated()['elements'], ['image' => array_shift($request->validated()['elements']['image'])]));

        if ($products->id == null) {
            Toast::info(__('miscellaneous.success_product'));
        } else {
            Toast::info(__('platform.success_updated'));
        }

        return redirect()->route('platform.products');
    }

    public function delete(Products $products, Request $request)
    {
        $products->delete();

        $buildPath = Attachment::select(['path', 'name', 'extension'])->find($products->image);
        $path = $buildPath->path . $buildPath-> name . "." . $buildPath->extension;

        Storage::disk('public')->delete($path);
        $products->image()->delete();

        Toast::success(__('platform.success_deleted'));

        return redirect()->route('platform.products');
    }
}
