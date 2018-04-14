<?php

use Phalcon\Config;
use Phalcon\Db\Adapter\Pdo\Mysql as MySQLDatabaseAdapter;
use Phalcon\Di\FactoryDefault as ServiceContainer;
use Phalcon\Flash\Direct as FlashDirect;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Mvc\View;
use Phalcon\Security;
use Phalcon\Session\Adapter\Files as SessionFileAdapter;
use PWSZ\Helpers\RepositoryDispatcher;

$di = new ServiceContainer();

$di->set("config", function() use($config) {
	return $config;
}, true);

$di->set("db", function() use($config) {
	return new MySQLDatabaseAdapter(
		[
			"host" => $config->database->host,
			"username" => $config->database->username,
			"password" => $config->database->password,
			"dbname" => $config->database->name,
			"options" => [
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
			],
		]
	);
});

$di->Set("dispatcher", function() {
	$dispatcher = new Dispatcher();
	return $dispatcher;
}, true);

$di->set("router", function() use($di) {
	$router = require APP_PATH . "/app/router.php";
	return $router;
});

$di->set("security", function() {
	$security = new Security();
	$security->setWorkFactor(12);
	return $security;
}, true);

$di->set("session", function() {
	$session = new SessionFileAdapter();
	$session->start();
	return $session;
});

$di->set("url", function() use($config) {
	$url = new UrlProvider();
	$url->setBaseUri("/");
	return $url;
});

$di->set("view", function() use($config) {
	return new View();
});

$di->set("repository", function() {
	return new RepositoryDispatcher();
});

return $di;
