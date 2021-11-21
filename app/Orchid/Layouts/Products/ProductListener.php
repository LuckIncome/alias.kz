<?php

namespace App\Orchid\Layouts\Products;

/* Laravel */
use App\Models\Category;
use App\Models\Subcategory;


/* Orchid */
use Orchid\Screen\Layouts\Listener;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Relation;

use Orchid\Screen\Layouts\Modal;

class ProductListener extends Listener
{
    /**
     * List of field names for which values will be listened.
     *
     * @var string[]
     */
    protected $targets = [
        'elements.category_id',
    ];

    /**
     * What screen method should be called
     * as a source for an asynchronous request.
     *
     * The name of the method must
     * begin with the prefix "async"
     *
     * @var string
     */
    protected $asyncMethod = 'asyncRelationCategory';

    /**
     * @return Layout[]
     */
    protected function layouts(): array
    {
        return [
            Layout::rows([
                Relation::make('elements.category_id')
                    ->fromModel(Category::class, 'name')
                    ->value($this->query['category_id'])
                    ->title(__('miscellaneous.category_relation'))
                    ->help(__('miscellaneous.category_relation_help'))
                    ->required(),

                Relation::make('elements.subcategory_id')
                    ->fromModel(Subcategory::class, 'name')
                    ->applyScope('filter', $this->query['category_id'])
                    // ->canSee($this->query->has('category_id'))
                    ->title(__('miscellaneous.subcategory_relation'))
                    ->help(__('miscellaneous.subcategory_relation_help'))
                    ->required(),
            ]),
        ];
    }
}
