<?php

class CalculatorController
{
    public function __construct(private CurrencyRepository $currencyRepository, private ResultRepository $resultRepository)
    {
    }

    public function convertCurrency(): void
    {
        $amount = $_POST['amount'];
        $sourceCurrency = $_POST['source_currency'];
        $targetCurrency = $_POST['target_currency'];

        $sourceCurrencyRate = $this->currencyRepository->getCurrency($sourceCurrency);
        $targetCurrencyRate = $this->currencyRepository->getCurrency($targetCurrency);

        $result = ($sourceCurrencyRate['mid'] / $targetCurrencyRate['mid']) * $amount;
        $this->resultRepository->saveResult($sourceCurrency, $targetCurrency, $amount, $result);

        echo $result;
    }

    public function showResults(): void
    {
        $results = $this->resultRepository->getResults();
        include_once '../templates/showResults.php';
    }
}