<?php

namespace App\Orchid\Screens\SEO;

/* Laravel */
use App\Models\SEO;
use App\Http\Requests\SEO\SEORequest;
use Illuminate\Http\Request;

/* Orchid */
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Facades\Layout;
use App\Orchid\Layouts\SEO\SEOLayout;
use App\Orchid\Layouts\SEO\CreateOrUpdateSEOLayot;

class SEOScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'SEO';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'SEO List';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'seo' => SEO::filters()->defaultSort('id')->paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            SEOLayout::class,

            /* Modal Window Edit*/
            Layout::modal('asyncEditSEO', CreateOrUpdateSEOLayot::class)->async('asyncGetSEO'),
        ];
    }

    /* Model CRUD */
    public function asyncGetSEO(SEO $seo): array
    {
        return [
            'elements' => $seo,
        ];
    }

    public function upsert(SEO $seo, SEORequest $request): void
    {
        SEO::updateOrCreate(['id' => $seo->id], array_merge($request->validated()['elements']));

        if ($seo->id == null) {
            Toast::info(__('miscellaneous.success_seo'));
        } else {
            Toast::info(__('platform.success_updated'));
        }
    }
}
