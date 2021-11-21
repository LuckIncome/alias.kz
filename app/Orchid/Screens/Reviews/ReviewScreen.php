<?php

namespace App\Orchid\Screens\Reviews;

/* Laravel */
use App\Models\Reviews;
use App\Http\Requests\Reviews\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Orchid\Attachment\Models\Attachment;

/* Orchid */
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

use App\Orchid\Layouts\Reviews\ReviewLayout;
use App\Orchid\Layouts\Reviews\CreateOrUpdateReviewLayot;

class ReviewScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Reviews';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Reviews List';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'review' => Reviews::filters()->defaultSort('id')->paginate()
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
            ModalToggle::make(__('miscellaneous.create_review'))->modal('createReview')->method('upsert')->icon('plus'),
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
            ReviewLayout::class,

            /* Modal Window Edit*/
            Layout::modal('createReview', CreateOrUpdateReviewLayot::class)->title(__('miscellaneous.create_review'))->applyButton(__('platform.create')),
            Layout::modal('asyncEditReview', CreateOrUpdateReviewLayot::class)->async('asyncGetReview'),
        ];
    }

    /* Model CRUD */
    public function asyncGetReview(Reviews $review): array
    {
        return [
            'elements' => $review,
        ];
    }

    public function upsert(Reviews $review, ReviewRequest $request): void
    {
        Reviews::updateOrCreate(['id' => $review->id], array_merge($request->validated()['elements'], ['image' => array_shift($request->validated()['elements']['image'])]));

        if ($review->id == null) {
            Toast::info(__('miscellaneous.success_review'));
        } else {
            Toast::info(__('platform.success_updated'));
        }
    }


    public function delete(Request $request)
    {
        if ($request->id != null) {
            $buildPath = Attachment::select(['path', 'name', 'extension'])->find(Reviews::find($request->id)->image);

            $data = Reviews::find($request->id);

            if ($buildPath != null) {
                $path = $buildPath->path . $buildPath-> name . "." . $buildPath->extension;

                Storage::disk('public')->delete($path);
                $data->image()->delete();
            }

            $data->delete();


            Toast::success(__('platform.success_deleted'));
        } elseif ($request->reviews == null) {
            Toast::warning(__('platform.not_selected'));
        } else {
            foreach ($request->reviews as $key => $value) {
                $buildPath = Attachment::select(['path', 'name', 'extension'])->find(Reviews::find($value)->image);

                $data = Reviews::find($value);

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
