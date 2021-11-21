<?php

namespace App\Orchid\Screens\Contacts;

/* Laravel */
use App\Models\Contacts;
use App\Http\Requests\Contacts\ContactRequest;
use Illuminate\Http\Request;

/* Orchid */
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

use App\Orchid\Layouts\Contacts\ContactLayout;
use App\Orchid\Layouts\Contacts\CreateOrUpdateContactLayot;

class ContactScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Contacts';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Contacts List';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'contacts' => Contacts::filters()->defaultSort('id')->paginate()
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
            ModalToggle::make(__('miscellaneous.create_contact'))->modal('createContact')->method('upsert')->icon('plus'),
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
            ContactLayout::class,

            /* Modal Window Edit*/
            Layout::modal('createContact', CreateOrUpdateContactLayot::class)->title(__('miscellaneous.create_contact'))->applyButton(__('platform.create')),
            Layout::modal('asyncEditContact', CreateOrUpdateContactLayot::class)->async('asyncGetContact'),
        ];
    }

    /* Model CRUD */
    public function asyncGetContact(Contacts $contacts): array
    {
        return [
            'elements' => $contacts,
        ];
    }

    public function upsert(Contacts $contacts, ContactRequest $request): void
    {
        Contacts::updateOrCreate(['id' => $contacts->id], array_merge($request->validated()['elements']));

        if ($contacts->id == null) {
            Toast::info(__('miscellaneous.success_contact'));
        } else {
            Toast::info(__('platform.success_updated'));
        }
    }

    public function delete(Request $request)
    {
        if ($request->id != null) {
            $data = Contacts::find($request->id);
            $data->delete();

            Toast::success(__('platform.success_deleted'));
        } elseif ($request->contacts == null) {
            Toast::warning(__('platform.not_selected'));
        } else {
            foreach ($request->contacts as $key => $value) {
                $data = Contacts::find($value);
                $data->delete();
            }
            Toast::success(__('platform.success_mass_deleted'));
        }
    }
}
