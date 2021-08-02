<?php

namespace App\Providers;

use App\Models\Rates\Rates;
use App\Repositories\Rates\RatesRepository;
use App\Repositories\Rates\RatesRepositoryInterface;
use App\Services\Api\GeckoRequestUrlBuilder;
use App\Services\Api\GuzzleApiRequest;
use App\Models\Asset\Asset;
use App\Repositories\Assets\AssetRepositoryInterface;
use App\Repositories\Assets\AssetsRepository;
use App\Services\Api\ApiInterface;
use App\Services\Api\RequestUrlBuilderInterface;
use App\Services\SaveExchangeRates\ProcessCryptoExchangeRates;
use App\Services\SaveExchangeRates\ProcessExchangeRatesInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AssetRepositoryInterface::class, AssetsRepository::class);
        $this->app->bind(ApiInterface::class, GuzzleApiRequest::class);

        $this->app->bind(ProcessExchangeRatesInterface::class, ProcessCryptoExchangeRates::class);
        $this->app->bind(RequestUrlBuilderInterface::class, GeckoRequestUrlBuilder::class);
        $this->app->when([RatesRepository::class])
        ->needs(Model::class)
        ->give(Rates::class);

        $this->app->when([AssetsRepository::class])
            ->needs(Model::class)
            ->give(Asset::class);
        $this->app->bind(RatesRepositoryInterface::class, RatesRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
