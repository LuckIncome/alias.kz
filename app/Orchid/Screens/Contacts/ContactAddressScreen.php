<?php

namespace App\Orchid\Screens\Contacts;

/* Laravel */
use App\Models\ContactAddress;
use App\Http\Requests\Contacts\ContactAddressRequest;
use App\Orchid\Layouts\Contacts\ContactAddressLayout;
use Illuminate\Http\Request;

/* Orchid */
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

use App\Orchid\Layouts\Contacts\ContactPhoneLayout;
use App\Orchid\Layouts\Contacts\CreateOrUpdateContactAddressLayot;

class ContactAddressScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Contacts Address';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Contacts Address List';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'contact_address' => ContactAddress::filters()->defaultSort('id')->paginate()
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
            ModalToggle::make(__('miscellaneous.create_contact_address'))->modal('createContactAddress')->method('upsert')->icon('plus'),
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
            ContactAddressLayout::class,

            /* Modal Window Edit*/
            Layout::modal('createContactAddress', CreateOrUpdateContactAddressLayot::class)->title(__('miscellaneous.create_contact_address'))->applyButton(__('platform.create')),
            Layout::modal('asyncEditContactAddress', CreateOrUpdateContactAddressLayot::class)->async('asyncGetContactAddress'),
        ];
    }

    /* Model CRUD */
    public function asyncGetContactAddress(ContactAddress $contact_address): array
    {
        return [
            'elements' => $contact_address,
        ];
    }

    public function upsert(ContactAddress $contact_address, ContactAddressRequest $request): void
    {
        ContactAddress::updateOrCreate(['id' => $contact_address->id], array_merge($request->validated()['elements']));

        if ($contact_address->id == null) {
            Toast::info(__('miscellaneous.success_contact_address'));
        } else {
            Toast::info(__('platform.success_updated'));
        }
    }

    public function delete(Request $request)
    {
        if ($request->id != null) {
            $data = ContactAddress::find($request->id);
            $data->delete();

            Toast::success(__('platform.success_deleted'));
        } elseif ($request->contact_address == null) {
            Toast::warning(__('platform.not_selected'));
        } else {
            foreach ($request->contact_address as $key => $value) {
                $data = ContactAddress::find($value);
                $data->delete();
            }
            Toast::success(__('platform.success_mass_deleted'));
        }
    }
}
