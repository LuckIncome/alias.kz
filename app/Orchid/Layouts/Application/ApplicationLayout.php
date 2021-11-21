<?php

namespace App\Orchid\Layouts\Application;

/* Laravel */
use App\Models\Application;
use Illuminate\Support\Str;

/* Orchid */
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Actions\ModalToggle;

class ApplicationLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'application';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            /* Checkbox and ID */
            TD::make('id', '#')->render(function (Application $application) {
                return CheckBox::make('application[]')
                    ->value($application->id)
                    ->checked(false);
            })->align('right')->width('10px')->cantHide(),
            TD::make('id', __('platform.id'))->sort()->cantHide(),

            /* Company */
            TD::make('company', __('platform.company'))->render(function (Application $application) {
                $text = Str::limit($application->company, 30, '...');
                return $text;
            })->filter(TD::FILTER_TEXT),

            /* Description */
            TD::make('phone', __('platform.phone'))->render(function (Application $application) {
                $text = Str::limit($application->phone, 30, '...');
                return $text;
            })->filter(TD::FILTER_TEXT),

            /* Value */
            TD::make('email', __('platform.email'))->render(function (Application $application) {
                $text = Str::limit($application->email, 30, '...');
                return $text;
            })->filter(TD::FILTER_TEXT),

            /* Timestamp */
            TD::make('created_at', __('platform.created_at'))->defaultHidden(),
            TD::make('updated_at', __('platform.updated_at'))->defaultHidden(),
        ];
    }
}
