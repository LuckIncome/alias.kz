<?php

namespace App\Orchid\Screens\Application;

/* Laravel */
use App\Models\Application;
use App\Http\Requests\SEO\SEORequest;
use Illuminate\Http\Request;

/* Orchid */
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use App\Orchid\Layouts\Application\ApplicationLayout;
use App\Orchid\Layouts\Application\CreateOrUpdateApplicationLayot;

class ApplicationScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Application';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Application List';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'application' => Application::filters()->orderBy('id', 'desc')->paginate()
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
            ApplicationLayout::class,
        ];
    }

    /* Model CRUD */
    public function delete(Request $request)
    {
        if ($request->id != null) {
            $data = Application::find($request->id);
            $data->delete();

            Toast::success(__('platform.success_deleted'));
        } elseif ($request->application == null) {
            Toast::warning(__('platform.not_selected'));
        } else {
            foreach ($request->application as $key => $value) {
                $data = Application::find($value);
                $data->delete();
            }
            Toast::success(__('platform.success_mass_deleted'));
        }
    }
}
