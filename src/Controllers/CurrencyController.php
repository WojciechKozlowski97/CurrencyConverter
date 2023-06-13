<?php

class CurrencyController
{
    public function __construct(private CurrencyRepository $currencyRepository)
    {
    }

    public function showCurrencies(): void
    {
        $currencies = $this->currencyRepository->getAllCurrencies();
        include_once '../templates/currencyTable.php';
    }

    public function getCurrenciesCode(): void
    {
        $allCurrencies = $this->currencyRepository->getAllCurrencies();
        include_once '../templates/calculator.php';
    }
}
