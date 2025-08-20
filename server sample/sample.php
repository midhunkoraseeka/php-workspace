<?php
// 📡 REQUEST method used by the client (e.g., GET, POST, PUT, DELETE)
$requestMethod =  $_SERVER['REQUEST_METHOD'] ?? '' ;

// 🔁 Protocol version used by the server (e.g., HTTP/1.1)
$serverProtocol =  $_SERVER["SERVER_PROTOCOL"] ?? '';

// 🌐 Name of the server host under which the current script is executing
$serverName =  $_SERVER["SERVER_NAME"] ?? '';

// 🔢 Port on the server machine being used by the web server (usually 80 or 443)
$serverPort = $_SERVER["SERVER_PORT"] ?? '';

// 🧠 Info about the web server software (e.g., Apache/2.4.41 (Ubuntu))
$serverSoftware =  $_SERVER["SERVER_SOFTWARE"] ?? '';

// 📧 Email address of the server administrator (set in php.ini or Apache config)
$serverAdmin =  $_SERVER["SERVER_ADMIN"] ?? '';

// 📂 Root directory of your web server — like the home base for your website files
$documentRoot = $_SERVER["DOCUMENT_ROOT"] ?? '';

// 📁 Full path of the current script file (includes filename)
$scriptFilename = $_SERVER["SCRIPT_FILENAME"] ?? '';

// 📜 Name of the script being executed, relative to the document root
$scriptName = $_SERVER["SCRIPT_NAME"] ?? '';

// 👣 The same as $scriptName, but it's what's displayed in the browser (can differ in some setups)
$phpSelf =  $_SERVER["PHP_SELF"] ?? '';

// 🌍 IP address of the client making the request (a.k.a. where your user is coming from)
$remoteAddr = $_SERVER["REMOTE_ADDR"] ?? '';

// 🔌 Shows type of HTTP connection (e.g., keep-alive or close)
$connection = $_SERVER["CONNECTION"] ?? '';

// 🏠 The Host header from the HTTP request (usually same as $serverName but from client side)
$host = $_SERVER["HOST"] ?? '';

// 🔙 The URL of the page that linked to your script (can be empty if typed directly)
$referer = $_SERVER["REFER"] ?? '';

// 🤖 Info about the user's browser, device, and OS (like Chrome, Safari, mobile, Windows, etc.)
$userAgent = $_SERVER["USER_AGENT"] ?? '';

// ❓The query string in the URL (the part after the `?`)
$queryString = $_SERVER["QUERY_STRING"] ?? '';

// 📎 The full requested URI (everything after your domain name, including query string)
$requestUri = $_SERVER["REQUEST_URI"] ?? '';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Information</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-8 bg-white shadow-md mt-10 rounded-lg">
        <h1 class="text-3xl font-semibold mb-4 text-center">Server Information</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">Request Method:</strong>
                <?= $requestMethod ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">Server Protocol:</strong>
                <?= $serverProtocol ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">Server Name:</strong>
                <?= $serverName ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">Server Port:</strong>
                <?= $serverPort ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">Server Software:</strong>
                <?= $serverSoftware ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">Server Admin:</strong>
                <?= $serverAdmin ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">Document Root:</strong>
                <?= $documentRoot ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">Script Filename:</strong>
                <?= $scriptFilename ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">Script Name:</strong>
                <?= $scriptName ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">PHP Self:</strong>
                <?= $phpSelf ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">Remote Addr:</strong>
                <?= $remoteAddr ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">Connection:</strong>
                <?= $connection ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">Host:</strong>
                <?= $host ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">Referer:</strong>
                <?= $referer ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">User Agent:</strong>
                <?= $userAgent ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">Query String:</strong>
                <?= $queryString ?>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg">
                <strong class="block mb-2">Request Uri:</strong>
                <?= $requestUri ?>
            </div>
        </div>
</body>

</html>