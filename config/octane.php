<?php

use Laravel\Octane\Contracts\OperationTerminated;
use Laravel\Octane\Events\RequestHandled;
use Laravel\Octane\Events\RequestReceived;
use Laravel\Octane\Events\RequestTerminated;
use Laravel\Octane\Events\TaskReceived;
use Laravel\Octane\Events\TaskTerminated;
use Laravel\Octane\Events\TickReceived;
use Laravel\Octane\Events\TickTerminated;
use Laravel\Octane\Events\WorkerErrorOccurred;
use Laravel\Octane\Events\WorkerStarting;
use Laravel\Octane\Events\WorkerStopping;
use Laravel\Octane\Listeners\CloseMonologHandlers;
use Laravel\Octane\Listeners\CollectGarbage;
use Laravel\Octane\Listeners\DisconnectFromDatabases;
use Laravel\Octane\Listeners\EnsureUploadedFilesAreValid;
use Laravel\Octane\Listeners\EnsureUploadedFilesCanBeMoved;
use Laravel\Octane\Listeners\FlushOnce;
use Laravel\Octane\Listeners\FlushTemporaryContainerInstances;
use Laravel\Octane\Listeners\FlushUploadedFiles;
use Laravel\Octane\Listeners\ReportException;
use Laravel\Octane\Listeners\StopWorkerIfNecessary;
use Laravel\Octane\Octane;

return [

    /*
    |--------------------------------------------------------------------------
    | Octane Server
    |--------------------------------------------------------------------------
    |
    | Supported: "roadrunner", "swoole", "frankenphp"
    |
    | RoadRunner is selected because the server runs standard PHP 8.4
    | behind Nginx/Valet. FrankenPHP requires its own PHP binary and
    | would replace the existing server infrastructure.
    |
    */

    'server' => env('OCTANE_SERVER', 'roadrunner'),

    /*
    |--------------------------------------------------------------------------
    | Force HTTPS
    |--------------------------------------------------------------------------
    */

    'https' => env('OCTANE_HTTPS', false),

    /*
    |--------------------------------------------------------------------------
    | Octane Listeners
    |--------------------------------------------------------------------------
    |
    | These listeners reset application state between requests. The
    | DisconnectFromDatabases and CollectGarbage listeners are enabled
    | to prevent stale MySQL connections and memory buildup in this
    | long-running news application.
    |
    */

    'listeners' => [
        WorkerStarting::class => [
            EnsureUploadedFilesAreValid::class,
            EnsureUploadedFilesCanBeMoved::class,
        ],

        RequestReceived::class => [
            ...Octane::prepareApplicationForNextOperation(),
            ...Octane::prepareApplicationForNextRequest(),
        ],

        RequestHandled::class => [
            //
        ],

        RequestTerminated::class => [
            FlushUploadedFiles::class,
        ],

        TaskReceived::class => [
            ...Octane::prepareApplicationForNextOperation(),
        ],

        TaskTerminated::class => [
            //
        ],

        TickReceived::class => [
            ...Octane::prepareApplicationForNextOperation(),
        ],

        TickTerminated::class => [
            //
        ],

        OperationTerminated::class => [
            FlushOnce::class,
            FlushTemporaryContainerInstances::class,
            DisconnectFromDatabases::class,
            CollectGarbage::class,
        ],

        WorkerErrorOccurred::class => [
            ReportException::class,
            StopWorkerIfNecessary::class,
        ],

        WorkerStopping::class => [
            CloseMonologHandlers::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Warm / Flush Bindings
    |--------------------------------------------------------------------------
    |
    | Flushed bindings are re-resolved on every request. The Localizer
    | singleton is flushed so its in-memory locale cache does not leak
    | across requests serving different languages.
    |
    */

    'warm' => [
        ...Octane::defaultServicesToWarm(),
    ],

    'flush' => [
        \App\Actions\Localizer::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Octane Swoole Tables (unused with RoadRunner)
    |--------------------------------------------------------------------------
    */

    'tables' => [],

    /*
    |--------------------------------------------------------------------------
    | Octane Swoole Cache (unused with RoadRunner)
    |--------------------------------------------------------------------------
    */

    'cache' => [
        'rows' => 1000,
        'bytes' => 10000,
    ],

    /*
    |--------------------------------------------------------------------------
    | File Watching
    |--------------------------------------------------------------------------
    |
    | Watched paths for --watch mode during local development.
    | Includes the modules directory for nwidart/laravel-modules.
    |
    */

    'watch' => [
        'app',
        'bootstrap',
        'config/**/*.php',
        'database/**/*.php',
        'modules',
        'public/**/*.php',
        'resources/**/*.php',
        'routes',
        'composer.lock',
        '.env',
    ],

    /*
    |--------------------------------------------------------------------------
    | Garbage Collection Threshold
    |--------------------------------------------------------------------------
    |
    | Force garbage collection when a worker exceeds this many MB.
    | 50 MB is conservative and suitable for a news application with
    | image processing and RSS feed parsing.
    |
    */

    'garbage' => (int) env('OCTANE_GARBAGE_MB', 50),

    /*
    |--------------------------------------------------------------------------
    | Maximum Execution Time
    |--------------------------------------------------------------------------
    |
    | Timeout per request in seconds. 30s matches the existing PHP
    | configuration and allows for RSS feed fetching / PDF generation.
    |
    */

    'max_execution_time' => (int) env('OCTANE_MAX_EXECUTION_TIME', 30),

    /*
    |--------------------------------------------------------------------------
    | Octane Server State File
    |--------------------------------------------------------------------------
    */

    'state_file' => env('OCTANE_STATE_FILE', storage_path('logs/octane-server-state.json')),

    /*
    |--------------------------------------------------------------------------
    | RoadRunner Options
    |--------------------------------------------------------------------------
    */

    'roadrunner' => [
        'command' => env('OCTANE_ROADRUNNER_COMMAND', 'vendor/bin/roadrunner-worker'),
        'http_middleware' => env('OCTANE_ROADRUNNER_HTTP_MIDDLEWARE', 'static'),
    ],

];
