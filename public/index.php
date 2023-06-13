<?php
require_once '../src/Controllers/CalculatorController.php';
require_once '../src/Database/DbConnection.php';
require_once '../src/Repositories/CurrencyRepository.php';
require_once '../src/Api/ApiNbpService.php';
require_once '../src/Controllers/CurrencyController.php';
require_once '../src/Repositories/ResultRepository.php';

$db = new DbConnection();
$connection = $db->getConn();
$currencyRepository = new CurrencyRepository($connection);
$apiNbpService = new ApiNbpService($currencyRepository);
$apiNbpService->processData();
$currencyController = new CurrencyController(new CurrencyRepository($connection));
$calculatorController = new CalculatorController(new CurrencyRepository($connection), new ResultRepository($connection));
$action = $_GET['action'] ?? '';

switch ($action) {
    case 'handleConversion' :
        $calculatorController->convertCurrency();
        break;
    case 'calculator' :
        $currencyController->getCurrenciesCode();
        break;
    case 'showResults' :
        $calculatorController->showResults();
        break;
    default:
        $currencyController->showCurrencies();
        break;
}
