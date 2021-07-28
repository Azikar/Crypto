<?php

namespace App\Providers;

use App\Http\Resources\AssetsResource;
use App\Http\Resources\AssetsResourceInterface;
use App\Models\Rates\Rates;
use App\Models\Rates\RatesInterface;
use App\Repositories\Rates\RatesRepository;
use App\Repositories\Rates\RatesRepositoryInterface;
use App\Services\Api\GeckoRequestUrlBuilder;
use App\Services\Api\GuzzleApiRequest;
use App\Models\Asset\Asset;
use App\Models\Asset\AssetInterface;
use App\Repositories\Assets\AssetRepositoryInterface;
use App\Repositories\Assets\AssetsRepository;
use App\Services\Api\ApiInterface;
use App\Services\Api\RequestUrlBuilderInterface;
use App\Services\SaveExchangeRates\CurrencyConverter;
use App\Services\SaveExchangeRates\CurrencyConverterInterface;
use App\Services\SaveExchangeRates\EuToUsdConverter;
use App\Services\SaveExchangeRates\ProcessCryptoExchangeRates;
use App\Services\SaveExchangeRates\ProcessExchangeRatesInterface;
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
        $this->app->bind(AssetInterface::class, Asset::class);
        $this->app->bind(AssetRepositoryInterface::class, AssetsRepository::class);
        $this->app->bind(ApiInterface::class, GuzzleApiRequest::class);

        $this->app->when([CurrencyConverter::class])
            ->needs(CurrencyConverterInterface::class)
            ->give(function ($app) {
                return [
                    $app->make(EuToUsdConverter::class)
                ];
            });

        $this->app->bind(ProcessExchangeRatesInterface::class, ProcessCryptoExchangeRates::class);
        $this->app->bind(RequestUrlBuilderInterface::class, GeckoRequestUrlBuilder::class);

        $this->app->bind(RatesInterface::class, Rates::class);
        $this->app->bind(RatesRepositoryInterface::class, RatesRepository::class);

        $this->app->bind(AssetsResourceInterface::class, AssetsResource::class);
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
