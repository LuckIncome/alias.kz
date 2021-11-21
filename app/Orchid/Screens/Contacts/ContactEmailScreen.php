<?php

namespace App\Orchid\Screens\Contacts;

/* Laravel */
use App\Models\ContactEmail;
use App\Http\Requests\Contacts\ContactEmailRequest;
use Illuminate\Http\Request;

/* Orchid */
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

use App\Orchid\Layouts\Contacts\ContactEmailLayout;
use App\Orchid\Layouts\Contacts\CreateOrUpdateContactEmailLayot;

class ContactEmailScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Contacts Email';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Contacts Email List';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'contact_email' => ContactEmail::filters()->defaultSort('id')->paginate()
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
            ModalToggle::make(__('miscellaneous.create_contact_email'))->modal('createContactEmail')->method('upsert')->icon('plus'),
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
            ContactEmailLayout::class,

            /* Modal Window Edit*/
            Layout::modal('createContactEmail', CreateOrUpdateContactEmailLayot::class)->title(__('miscellaneous.create_contact_email'))->applyButton(__('platform.create')),
            Layout::modal('asyncEditContactEmail', CreateOrUpdateContactEmailLayot::class)->async('asyncGetContactEmail'),
        ];
    }

    /* Model CRUD */
    public function asyncGetContactEmail(ContactEmail $contact_email): array
    {
        return [
            'elements' => $contact_email,
        ];
    }

    public function upsert(ContactEmail $contact_email, ContactEmailRequest $request): void
    {
        ContactEmail::updateOrCreate(['id' => $contact_email->id], array_merge($request->validated()['elements']));

        if ($contact_email->id == null) {
            Toast::info(__('miscellaneous.success_contact_email'));
        } else {
            Toast::info(__('platform.success_updated'));
        }
    }

    public function delete(Request $request)
    {
        if ($request->id != null) {
            $data = ContactEmail::find($request->id);
            $data->delete();

            Toast::success(__('platform.success_deleted'));
        } elseif ($request->contact_email == null) {
            Toast::warning(__('platform.not_selected'));
        } else {
            foreach ($request->contact_email as $key => $value) {
                $data = ContactEmail::find($value);
                $data->delete();
            }
            Toast::success(__('platform.success_mass_deleted'));
        }
    }
}
