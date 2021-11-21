<?php

namespace App\Orchid\Screens\Settings;

/* Laravel */
use App\Models\Header;
use App\Http\Requests\Settings\HeaderRequest;
use Illuminate\Http\Request;

/* Orchid */
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

use App\Orchid\Layouts\Settings\HeaderLayout;
use App\Orchid\Layouts\Settings\CreateOrUpdateHeaderLayot;
use Symfony\Component\Mime\Header\Headers;

class HeaderScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Header';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Headers Element List';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'header' => Header::filters()->defaultSort('id')->paginate()
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
            HeaderLayout::class,

            /* Modal Window Edit*/
            Layout::modal('asyncEditHeader', CreateOrUpdateHeaderLayot::class)->async('asyncGetHeader'),
        ];
    }

    /* Model CRUD */
    public function asyncGetHeader(Header $header): array
    {
        return [
            'elements' => $header,
        ];
    }

    public function upsert(Header $header, HeaderRequest $request): void
    {
        Header::updateOrCreate(['id' => $header->id], array_merge($request->validated()['elements']));

        if ($header->id == null) {
            Toast::info(__('miscellaneous.success_header'));
        } else {
            Toast::info(__('platform.success_updated'));
        }
    }
}
