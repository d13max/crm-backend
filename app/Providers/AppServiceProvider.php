<?php declare(strict_types=1);

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Override;

class AppServiceProvider extends ServiceProvider
{
    #[Override]
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Model::shouldBeStrict(!$this->app->isProduction());
        DB::prohibitDestructiveCommands($this->app->isProduction());
        Relation::requireMorphMap(!$this->app->isProduction());
        Model::unguard();
        Date::use(CarbonImmutable::class);
        URL::forceHttps();
    }
}
