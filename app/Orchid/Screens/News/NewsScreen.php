<?php

namespace App\Orchid\Screens\News;

/* Laravel */
use App\Models\News;
use App\Http\Requests\News\NewsRequest;
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

use App\Orchid\Layouts\News\NewsLayout;
use App\Orchid\Layouts\News\CreateOrUpdateNewsLayot;

class NewsScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'News';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'News List';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'news' => News::filters()->defaultSort('id')->paginate()
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
            ModalToggle::make(__('miscellaneous.create_news'))->modal('createNews')->method('upsert')->icon('plus'),
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
            NewsLayout::class,

            /* Modal Window Edit*/
            Layout::modal('createNews', CreateOrUpdateNewsLayot::class)->title(__('miscellaneous.create_news'))->applyButton(__('platform.create'))->size(Modal::SIZE_LG),
            Layout::modal('asyncEditNews', CreateOrUpdateNewsLayot::class)->size(Modal::SIZE_LG)->async('asyncGetNews'),
        ];
    }

    /* Model CRUD */
    public function asyncGetNews(News $news): array
    {
        return [
            'elements' => $news,
        ];
    }

    public function upsert(News $news, NewsRequest $request): void
    {
        $request->validated();
        News::updateOrCreate(['id' => $news->id], array_merge($request->validated()['elements'], ['image' => array_shift($request->validated()['elements']['image'])]));

        if ($news->id == null) {
            Toast::info(__('miscellaneous.success_news'));
        } else {
            Toast::info(__('platform.success_updated'));
        }
    }

    public function delete(Request $request)
    {
        if ($request->id != null) {
            $buildPath = Attachment::select(['path', 'name', 'extension'])->find(News::find($request->id)->image);

            $data = News::find($request->id);

            if ($buildPath != null) {
                $path = $buildPath->path . $buildPath-> name . "." . $buildPath->extension;

                Storage::disk('public')->delete($path);
                $data->image()->delete();
            }

            $data->delete();


            Toast::success(__('platform.success_deleted'));
        } elseif ($request->news == null) {
            Toast::warning(__('platform.not_selected'));
        } else {
            foreach ($request->news as $key => $value) {
                $buildPath = Attachment::select(['path', 'name', 'extension'])->find(News::find($value)->image);

                $data = News::find($value);

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
