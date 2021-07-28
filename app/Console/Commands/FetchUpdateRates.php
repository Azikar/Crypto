<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Enum\CurrencyEnum;
use App\Repositories\Rates\RatesRepositoryInterface;
use App\Services\Api\ApiInterface;
use App\Services\Api\RequestUrlBuilderInterface;
use App\Services\SaveExchangeRates\ProcessExchangeRatesInterface;
use Illuminate\Console\Command;
/**
 * Class AddFakeModelMedia
 * @package App\Console\Commands
 */
class FetchUpdateRates extends Command
{
    protected $signature = 'fetch:UsaRates';
    private ApiInterface $api;
    private ProcessExchangeRatesInterface $processExchangeRates;
    private RequestUrlBuilderInterface $requestUrlBuilder;
    private RatesRepositoryInterface $ratesRepository;

    public function __construct(
        ApiInterface $api,
        ProcessExchangeRatesInterface $processExchangeRates,
        RequestUrlBuilderInterface $requestUrlBuilder,
        RatesRepositoryInterface $ratesRepository
    )
    {
        parent::__construct();
        $this->api = $api;
        $this->processExchangeRates = $processExchangeRates;
        $this->requestUrlBuilder = $requestUrlBuilder;
        $this->ratesRepository = $ratesRepository;
    }

    public function handle(): void
    {
        $this->api->setUrl( $this->requestUrlBuilder->build(CurrencyEnum::CURRENCIES_FULL_NAMES, [CurrencyEnum::USD]));
        $result = $this->api->execute();

        foreach ($this->processExchangeRates->execute($result) as $rate) {
            $this->ratesRepository->createOrUpdate(['label' => $rate['label'], 'currency' => $rate['currency']], $rate);
        }
    }
}
