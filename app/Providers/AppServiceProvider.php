<?php

namespace App\Providers;

use App\Support\Site;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use RalphJSmit\Laravel\SEO\Facades\SEOManager;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureDefaults();
        $this->configureSeo();

        Blade::anonymousComponentPath(__DIR__.'/../../resources/views/partials', 'partials');
        Blade::anonymousComponentPath(__DIR__.'/../../resources/views/sections', 'sections');
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null,
        );
    }

    protected function configureSeo(): void
    {
        Site::configureSeo();

        SEOManager::SEODataTransformer(function (SEOData $SEOData): SEOData {
            $ogTitle = Site::seoSettings()->og_title;

            if (filled($ogTitle) && blank($SEOData->openGraphTitle)) {
                $SEOData->openGraphTitle = $ogTitle;
            }

            return $SEOData;
        });
    }
}
