<?php

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make(__('Users'))
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Access rights')),

            Menu::make(__('Roles'))
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles'),

            Menu::make('Категории')
                ->icon('layers')
                ->route('platform.category')
                ->title('Каталог товаров'),

            Menu::make('Субкатегории')
                ->icon('list')
                ->route('platform.subcategory'),

            Menu::make('Товары')
                ->icon('basket-loaded')
                ->route('platform.products'),

                Menu::make('Список заявок')
                ->icon('envelope-letter')
                ->route('platform.applications'),

            Menu::make('Отзывы')
                ->icon('magnifier')
                ->route('platform.reviews')
                ->title('Страницы сайта'),

            Menu::make('Новости')
                ->icon('paper-plane')
                ->route('platform.news'),

            Menu::make('Акции')
                ->icon('event')
                ->route('platform.promotions'),

            Menu::make('Сертификаты')
                ->icon('notebook')
                ->route('platform.certificates'),

            Menu::make('Контакты')
                ->icon('phone')
                ->route('platform.contacts')
                ->title('Контакты'),

            Menu::make('Номер телефона')
                ->icon('number-list')
                ->route('platform.phone'),

            Menu::make('Почта')
                ->icon('envelope')
                ->route('platform.email'),

            Menu::make('Адрес')
                ->icon('map')
                ->route('platform.address'),

            Menu::make('SEO')
                ->icon('magnifier')
                ->title('Настройки сайта')
                ->route('platform.seo'),

            Menu::make('Верхний колонтитул')
                ->icon('browser')
                ->route('platform.header'),

            Menu::make('Нижний колонтитул')
                ->icon('browser')
                ->route('platform.footer'),

            Menu::make('Социальные сети')
                ->icon('bubbles')
                ->route('platform.social_networks'),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }

    /**
     * @return string[]
     */
    public function registerSearchModels(): array
    {
        return [
            // ...Models
            // \App\Models\User::class
        ];
    }
}
