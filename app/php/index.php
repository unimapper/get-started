<?php

use GetStarted\Model;
use UniMapper\NamingConvention as UNC;

UNC::setMask("Model\Entity\*", UNC::ENTITY_MASK);
UNC::setMask("Model\Repository\*Repository", UNC::REPOSITORY_MASK);

require_once __DIR__ . '/vendor/autoload.php';

$modelDir = __DIR__ . '/../..';
require_once $modelDir . '/entity/Customer.php';
require_once $modelDir . '/entity/Invoice.php';
require_once $modelDir . '/entity/Order.php';
require_once $modelDir . '/repository/CustomerRepository.php';
require_once $modelDir . '/repository/OrderRepository.php';

date_default_timezone_set('Europe/Prague');

// Define connection
$connection = new UniMapper\Connection(new UniMapper\Mapper);
$connection->registerAdapter(
    "Dibi",
    new UniMapper\Dibi\Adapter(['username' => 'root', 'database' => 'get_started'])
);

// Create repository
$orderRepository = new Model\Repository\OrderRepository($connection);

// Get data
$orders = $orderRepository->find([], [], 0, 0, ["customer", "invoice"]);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Get started</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Get started</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Orders <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li>Default</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="page-header">Orders</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Created</th>
                    <th>Customer</th>
                    <th>Invoice</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo $order->id ?></td>
                    <td><?php echo $order->time->format('Y-m-d H:i:s') ?></td>
                    <td><?php if ($order->customer) { echo $order->customer->fullName; } ?></td>
                    <td><?php if ($order->invoice) { ?>Yes<?php } ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>