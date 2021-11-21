<?php

namespace App\Orchid\Screens\Settings;

/* Laravel */
use App\Models\Footer;
use App\Http\Requests\Settings\FooterRequest;
use Illuminate\Http\Request;

/* Orchid */
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

use App\Orchid\Layouts\Settings\FooterLayout;
use App\Orchid\Layouts\Settings\CreateOrUpdateFooterLayot;

class FooterScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Footer';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Footers Element List';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'footer' => Footer::filters()->defaultSort('id')->paginate()
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
            FooterLayout::class,

            /* Modal Window Edit*/
            Layout::modal('asyncEditFooter', CreateOrUpdateFooterLayot::class)->async('asyncGetFooter'),
        ];
    }

    /* Model CRUD */
    public function asyncGetFooter(Footer $footer): array
    {
        return [
            'elements' => $footer,
        ];
    }

    public function upsert(Footer $footer, FooterRequest $request): void
    {
        Footer::updateOrCreate(['id' => $footer->id], array_merge($request->validated()['elements']));

        if ($footer->id == null) {
            Toast::info(__('miscellaneous.success_footer'));
        } else {
            Toast::info(__('platform.success_updated'));
        }
    }
}
