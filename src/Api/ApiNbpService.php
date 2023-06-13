<?php

class ApiNbpService
{
    public function __construct(private CurrencyRepository $currencyRepository)
    {
    }

    public function getExchangeRates(): array
    {
        $response = file_get_contents('https://api.nbp.pl/api/exchangerates/tables/A/');
        return json_decode($response, true);
    }

    public function processData(): void
    {
        $rates = $this->getExchangeRates();
        $exchangeRates = $rates[0]['rates'];

        foreach ($exchangeRates as $exchangeRate) {
            $currency = $exchangeRate['currency'];
            $code = $exchangeRate['code'];
            $mid = $exchangeRate['mid'];

            if ($this->currencyRepository->getCurrency($code) !== null) {
                $this->currencyRepository->updateCurrency($currency, $code, $mid);
                return;
            }
            $this->currencyRepository->saveCurrency($currency, $code, $mid);
        }
    }
}