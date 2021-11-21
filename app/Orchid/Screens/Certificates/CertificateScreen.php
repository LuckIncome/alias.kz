<?php

namespace App\Orchid\Screens\Certificates;

/* Laravel */
use App\Models\Certificates;
use App\Http\Requests\Certificates\CertificateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Orchid\Attachment\Models\Attachment;

/* Orchid */
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

use App\Orchid\Layouts\Certificates\CertificateLayout;
use App\Orchid\Layouts\Certificates\CreateOrUpdateCertificateLayot;

class CertificateScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Certificates';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Certificates List';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'certificates' => Certificates::filters()->defaultSort('id')->paginate()
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
            ModalToggle::make(__('miscellaneous.create_certificate'))->modal('createCertificate')->method('upsert')->icon('plus'),
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
            CertificateLayout::class,

            /* Modal Window Edit*/
            Layout::modal('createCertificate', CreateOrUpdateCertificateLayot::class)->title(__('miscellaneous.create_certificate'))->applyButton(__('platform.create')),
            Layout::modal('asyncEditCertificate', CreateOrUpdateCertificateLayot::class)->async('asyncGetCertificate'),
        ];
    }

    /* Model CRUD */
    public function asyncGetCertificate(Certificates $certificates): array
    {
        return [
            'elements' => $certificates,
        ];
    }

    public function upsert(Certificates $certificates, CertificateRequest $request): void
    {
        $request->validated();
        Certificates::updateOrCreate(['id' => $certificates->id], array_merge($request->validated()['elements'], ['image' => array_shift($request->validated()['elements']['image'])]));

        if ($certificates->id == null) {
            Toast::info(__('miscellaneous.success_certificate'));
        } else {
            Toast::info(__('platform.success_updated'));
        }
    }

    public function delete(Request $request)
    {
        if ($request->id != null) {
            $buildPath = Attachment::select(['path', 'name', 'extension'])->find(Certificates::find($request->id)->image);

            $data = Certificates::find($request->id);

            if ($buildPath != null) {
                $path = $buildPath->path . $buildPath-> name . "." . $buildPath->extension;

                Storage::disk('public')->delete($path);
                $data->image()->delete();
            }

            $data->delete();


            Toast::success(__('platform.success_deleted'));
        } elseif ($request->certificates == null) {
            Toast::warning(__('platform.not_selected'));
        } else {
            foreach ($request->certificates as $key => $value) {
                $buildPath = Attachment::select(['path', 'name', 'extension'])->find(Certificates::find($value)->image);

                $data = Certificates::find($value);

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
