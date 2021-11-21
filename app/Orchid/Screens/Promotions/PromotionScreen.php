<?php

namespace App\Orchid\Screens\Promotions;

/* Laravel */
use App\Models\Promotions;
use App\Http\Requests\Promotions\PromotionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Orchid\Attachment\Models\Attachment;

/* Orchid */
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Layouts\Modal;

use App\Orchid\Layouts\Promotions\PromotionLayout;
use App\Orchid\Layouts\Promotions\CreateOrUpdatePromotionLayot;

class PromotionScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Promotion';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Promotion List';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'promotion' => Promotions::filters()->defaultSort('id')->paginate()
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
            ModalToggle::make(__('miscellaneous.create_promotion'))->modal('createPromotion')->method('upsert')->icon('plus'),
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
            //
            PromotionLayout::class,

            /* Modal Window Edit*/
            Layout::modal('createPromotion', CreateOrUpdatePromotionLayot::class)->title(__('miscellaneous.create_promotion'))->size(Modal::SIZE_LG)->applyButton(__('platform.create')),
            Layout::modal('asyncEditPromotion', CreateOrUpdatePromotionLayot::class)->size(Modal::SIZE_LG)->async('asyncGetPromotion'),
        ];
    }

    /* Model CRUD */
    public function asyncGetPromotion(Promotions $promotions): array
    {
        return [
            'elements' => $promotions,
        ];
    }

    public function upsert(Promotions $promotions, PromotionRequest $request): void
    {
        $request->validated();
        Promotions::updateOrCreate(['id' => $promotions->id], array_merge($request->validated()['elements'], ['image' => array_shift($request->validated()['elements']['image'])]));

        if ($promotions->id == null) {
            Toast::info(__('miscellaneous.success_promotion'));
        } else {
            Toast::info(__('platform.success_updated'));
        }
    }

    public function delete(Request $request)
    {
        if ($request->id != null) {
            $buildPath = Attachment::select(['path', 'name', 'extension'])->find(Promotions::find($request->id)->image);

            $data = Promotions::find($request->id);

            if ($buildPath != null) {
                $path = $buildPath->path . $buildPath-> name . "." . $buildPath->extension;

                Storage::disk('public')->delete($path);
                $data->image()->delete();
            }

            $data->delete();


            Toast::success(__('platform.success_deleted'));
        } elseif ($request->promotions == null) {
            Toast::warning(__('platform.not_selected'));
        } else {
            foreach ($request->promotions as $key => $value) {
                $buildPath = Attachment::select(['path', 'name', 'extension'])->find(Promotions::find($value)->image);

                $data = Promotions::find($value);

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
