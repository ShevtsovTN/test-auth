<?php

namespace Modules\Auth\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Auth\Contracts\ServiceConfigContract;
use Modules\Auth\Dto\Astroway\Configs\ConfigDto as AstrowayConfigDto;
use Modules\Auth\Dto\ConfigDTO;
use Modules\Auth\Dto\MindHealthy\Configs\ConfigDto as MindHealthyConfigDto;
use Modules\Auth\Dto\MyDream\Configs\ConfigDto as MyDreamConfigDto;
use Modules\Auth\Dto\PastLife\Configs\ConfigDto as PastLifeConfigDto;
use Modules\Auth\Dto\SurnameMystery\Configs\ConfigDto as SurnameMysteryConfigDto;
use Modules\Auth\Services\AstrowayAuthService;
use Modules\Auth\Services\MindHealthyAuthService;
use Modules\Auth\Services\MyDreamAuthService;
use Modules\Auth\Services\PastLifeAuthService;
use Modules\Auth\Services\SurnameMysteryAuthService;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(AuthRouteServiceProvider::class);


        $this->app->when(AstrowayAuthService::class)
            ->needs(ServiceConfigContract::class)
            ->give(function () {
                return new ConfigDTO(
                    new AstrowayConfigDto(
                        config('subscription.astroway.basic')
                    ),
                    new AstrowayConfigDto(
                        config('subscription.astroway.temporary')
                    )
                );
            });

        $this->app->when(PastLifeAuthService::class)
            ->needs(ServiceConfigContract::class)
            ->give(function () {
                return new ConfigDTO(
                    new PastLifeConfigDto(
                        config('subscription.past_life.basic')
                    ),
                    new PastLifeConfigDto(
                        config('subscription.past_life.temporary')
                    )
                );
            });

        $this->app->when(MyDreamAuthService::class)
            ->needs(ServiceConfigContract::class)
            ->give(function () {
                return new ConfigDTO(
                    new MyDreamConfigDto(
                        config('subscription.my_dream.basic')
                    ),
                    new MyDreamConfigDto(
                        config('subscription.my_dream.temporary')
                    )
                );
            });

        $this->app->when(SurnameMysteryAuthService::class)
            ->needs(ServiceConfigContract::class)
            ->give(function () {
                return new ConfigDTO(
                    new SurnameMysteryConfigDto(
                        config('subscription.surname_mystery.basic')
                    ),
                    new SurnameMysteryConfigDto(
                        config('subscription.surname_mystery.temporary')
                    )
                );
            });

        $this->app->when(MindHealthyAuthService::class)
            ->needs(ServiceConfigContract::class)
            ->give(function () {
                return new ConfigDTO(
                    new MindHealthyConfigDto(
                        config('subscription.mind_healthy.basic')
                    ),
                    new MindHealthyConfigDto(
                        config('subscription.mind_healthy.temporary')
                    )
                );
            });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
