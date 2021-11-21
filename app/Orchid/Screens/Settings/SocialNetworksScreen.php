<?php

namespace App\Orchid\Screens\Settings;

/* Laravel */
use App\Models\SocialNetworks;
use App\Http\Requests\Settings\StoreSocialNetworksRequest;
use Illuminate\Http\Request;

/* Orchid */
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Facades\Layout;
use App\Orchid\Layouts\Settings\SocialNetworksLayout;
use App\Orchid\Layouts\Settings\SocialNetworksEditLayot;

class SocialNetworksScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Social networks';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Settings for displayed links on the main page';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'social_networks' => SocialNetworks::filters()->defaultSort('id')->paginate()
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
            SocialNetworksLayout::class,

            /* Modal Window Edit*/
            Layout::modal('AsyncEditSocialNetworks', SocialNetworksEditLayot::class)->async('asyncGetSocialNetworks'),
        ];
    }

    /* Model CRUD */
    public function asyncGetSocialNetworks(SocialNetworks $socialnetworks): array
    {
        return [
            'elements' => $socialnetworks,
        ];
    }

    public function upsert(SocialNetworks $socialnetworks, StoreSocialNetworksRequest $request): void
    {
        SocialNetworks::updateOrCreate(['id' => $socialnetworks->id], array_merge($request->validated()['elements']));

        if ($socialnetworks->id == null) {
            Toast::info(__('miscellaneous.success_socialnetwork'));
        } else {
            Toast::info(__('platform.success_updated'));
        }
    }
}
