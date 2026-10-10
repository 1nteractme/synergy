<?php

declare(strict_types=1);

use App\Http\Controllers\PageController;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ViewErrorBag;

$baseUrl = rtrim(getenv('PAGES_BASE_URL') ?: 'https://1nteractme.github.io/synergy', '/');

foreach ([
    'APP_ENV' => 'production',
    'APP_DEBUG' => 'false',
    'APP_KEY' => 'base64:'.base64_encode(random_bytes(32)),
    'APP_URL' => $baseUrl,
    'ASSET_URL' => $baseUrl,
] as $name => $value) {
    putenv("{$name}={$value}");
    $_ENV[$name] = $value;
    $_SERVER[$name] = $value;
}

require dirname(__DIR__).'/vendor/autoload.php';

$app = require dirname(__DIR__).'/bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$buildPath = public_path('build');
$manifestPath = $buildPath.'/manifest.json';

if (! is_file($manifestPath)) {
    throw new RuntimeException('Vite manifest is missing. Run npm run build before exporting pages.');
}

$outputPath = dirname(__DIR__).'/dist';
File::deleteDirectory($outputPath);
File::ensureDirectoryExists($outputPath);

if (! File::copyDirectory($buildPath, $outputPath.'/build')) {
    throw new RuntimeException('Could not copy the compiled Vite assets into dist/build.');
}

file_put_contents($outputPath.'/.nojekyll', '');

$controller = $app->make(PageController::class);
$pages = [
    ['view' => $controller->mainPage(), 'path' => 'index.html', 'homeUrl' => './'],
    ['view' => $controller->logPage(), 'path' => 'log/index.html', 'homeUrl' => '../'],
    ['view' => $controller->regPage(), 'path' => 'reg/index.html', 'homeUrl' => '../'],
];

foreach ($pages as $page) {
    $pagePath = $outputPath.'/'.$page['path'];
    File::ensureDirectoryExists(dirname($pagePath));

    $html = $page['view']->with([
        'staticExport' => true,
        'homeUrl' => $page['homeUrl'],
        'errors' => new ViewErrorBag(),
    ])->render();

    if (file_put_contents($pagePath, $html) === false) {
        throw new RuntimeException("Could not write static page: {$page['path']}");
    }
}

echo "Exported ".count($pages)." static pages to dist/.\n";
