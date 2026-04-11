<?php

$projectRoot = realpath(__DIR__ . '/..');
$requested = isset($_GET['route']) && $_GET['route'] !== ''
	? $_GET['route']
	: 'STARRY.php';

$requested = ltrim($requested, '/');
$requested = str_replace("\0", '', $requested);

if ($requested === '' || substr($requested, -1) === '/') {
	$requested .= 'index.php';
}

$target = realpath($projectRoot . DIRECTORY_SEPARATOR . $requested);

if ($target === false || strpos($target, $projectRoot) !== 0 || !is_file($target) || pathinfo($target, PATHINFO_EXTENSION) !== 'php') {
	http_response_code(404);
	echo '404 Not Found';
	exit;
}

$_SERVER['SCRIPT_NAME'] = '/' . $requested;
$_SERVER['PHP_SELF'] = '/' . $requested;
$_SERVER['SCRIPT_FILENAME'] = $target;
$_SERVER['DOCUMENT_ROOT'] = $projectRoot;

chdir(dirname($target));
require $target;
