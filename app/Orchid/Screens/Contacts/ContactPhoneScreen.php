<?php

namespace App\Orchid\Screens\Contacts;

/* Laravel */
use App\Models\ContactPhone;
use App\Http\Requests\Contacts\ContactPhoneRequest;
use Illuminate\Http\Request;

/* Orchid */
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

use App\Orchid\Layouts\Contacts\ContactPhoneLayout;
use App\Orchid\Layouts\Contacts\CreateOrUpdateContactPhoneLayot;

class ContactPhoneScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Contacts Phone';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Contacts Phone';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'contact_phone' => ContactPhone::filters()->defaultSort('id')->paginate()
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
            ModalToggle::make(__('miscellaneous.create_contact_phone'))->modal('createContactPhone')->method('upsert')->icon('plus'),
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
            ContactPhoneLayout::class,

            /* Modal Window Edit*/
            Layout::modal('createContactPhone', CreateOrUpdateContactPhoneLayot::class)->title(__('miscellaneous.create_contact_phone'))->applyButton(__('platform.create')),
            Layout::modal('asyncEditContactPhone', CreateOrUpdateContactPhoneLayot::class)->async('asyncGetContactPhone'),
        ];
    }

    /* Model CRUD */
    public function asyncGetContactPhone(ContactPhone $contact_phone): array
    {
        return [
            'elements' => $contact_phone,
        ];
    }

    public function upsert(ContactPhone $contact_phone, ContactPhoneRequest $request): void
    {
        ContactPhone::updateOrCreate(['id' => $contact_phone->id], array_merge($request->validated()['elements']));

        if ($contact_phone->id == null) {
            Toast::info(__('miscellaneous.success_contact_phone'));
        } else {
            Toast::info(__('platform.success_updated'));
        }
    }

    public function delete(Request $request)
    {
        if ($request->id != null) {
            $data = ContactPhone::find($request->id);
            $data->delete();

            Toast::success(__('platform.success_deleted'));
        } elseif ($request->contact_phone == null) {
            Toast::warning(__('platform.not_selected'));
        } else {
            foreach ($request->contact_phone as $key => $value) {
                $data = ContactPhone::find($value);
                $data->delete();
            }
            Toast::success(__('platform.success_mass_deleted'));
        }
    }
}
