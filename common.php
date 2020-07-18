<?php

use App\Http\OfferHttpHandler;
use App\Repository\Brand\BrandRepository;
use App\Repository\Offer\OfferRepository;
use App\Service\Brand\BrandService;
use App\Service\Offer\OfferService;

session_start();
spl_autoload_register();

$template = new \Core\Template();
$dataBinder = new \Core\DataBinder();

$dbInfo = parse_ini_file("Config/db.ini");
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dbInfo['dsn'], $dbInfo['user'], $dbInfo['pass'], $options);

$db = new \Database\PDODatabase($pdo);
$session = new Core\Session();

//User Dependencies
$userRepository = new \App\Repository\User\UserRepository($db, $dataBinder);
$encryptionService = new \App\Service\Encryption\ArgonEncryptionService();
$userService = new \App\Service\User\UserService($userRepository, $encryptionService, $session);
$userHttpHandler = new \App\Http\UserHttpHandler($template, $dataBinder, $session, $userService);


// Offer Dependencies
$offerRepository = new OfferRepository($db, $dataBinder);
$offerService = new OfferService($offerRepository);

$brandRepository = new BrandRepository($db, $dataBinder);
$brandService = new BrandService($brandRepository);

$offerHttpHandler = new OfferHttpHandler($template, 
                                        $dataBinder, 
                                        $session, 
                                        $userService, 
                                        $offerService, 
                                        $brandService);