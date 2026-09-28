<?php return array (
  'images' => 
  array (
    'default' => 'gd',
  ),
  'concurrency' => 
  array (
    'default' => 'process',
  ),
  'app' => 
  array (
    'name' => 'Khobor71',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://127.0.0.1:8000/',
    'frontend_url' => 'http://localhost:3000',
    'asset_url' => NULL,
    'timezone' => 'Asia/Dhaka',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'cipher' => 'AES-256-CBC',
    'key' => 'base64:fPrxaMzCQW7IOwTnwrZuhsgZaejAfcKnZZU0ztm39dC=',
    'previous_keys' => 
    array (
    ),
    'maintenance' => 
    array (
      'driver' => 'file',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'LaravelLux\\Html\\HtmlServiceProvider',
      23 => 'RealRashid\\SweetAlert\\SweetAlertServiceProvider',
      24 => 'App\\Providers\\AppServiceProvider',
      25 => 'App\\Providers\\AuthServiceProvider',
      26 => 'App\\Providers\\EventServiceProvider',
      27 => 'App\\Providers\\RouteServiceProvider',
      28 => 'Nwidart\\Modules\\LaravelModulesServiceProvider',
      29 => 'Brian2694\\Toastr\\ToastrServiceProvider',
      30 => 'Maatwebsite\\Excel\\ExcelServiceProvider',
      31 => 'App\\Providers\\MailServiceConfigProvider',
      32 => 'Spatie\\Permission\\PermissionServiceProvider',
      33 => 'Yajra\\DataTables\\DataTablesServiceProvider',
      34 => 'Yajra\\DataTables\\ButtonsServiceProvider',
      35 => 'Milon\\Barcode\\BarcodeServiceProvider',
      36 => 'App\\Support\\Feeds\\FeedsServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Benchmark' => 'Illuminate\\Support\\Benchmark',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Concurrency' => 'Illuminate\\Support\\Facades\\Concurrency',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Context' => 'Illuminate\\Support\\Facades\\Context',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Image' => 'Illuminate\\Support\\Facades\\Image',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Number' => 'Illuminate\\Support\\Number',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Process' => 'Illuminate\\Support\\Facades\\Process',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schedule' => 'Illuminate\\Support\\Facades\\Schedule',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'Uri' => 'Illuminate\\Support\\Uri',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
      'Module' => 'Nwidart\\Modules\\Facades\\Module',
      'Toastr' => 'Brian2694\\Toastr\\Facades\\Toastr',
      'Excel' => 'Maatwebsite\\Excel\\Facades\\Excel',
      'DNS1D' => 'Milon\\Barcode\\Facades\\DNS1DFacade',
      'DNS2D' => 'Milon\\Barcode\\Facades\\DNS2DFacade',
      'SEOMeta' => 'Artesaos\\SEOTools\\Facades\\SEOMeta',
      'OpenGraph' => 'Artesaos\\SEOTools\\Facades\\OpenGraph',
      'Twitter' => 'Artesaos\\SEOTools\\Facades\\TwitterCard',
      'JsonLd' => 'Artesaos\\SEOTools\\Facades\\JsonLd',
      'SEOTools' => 'Artesaos\\SEOTools\\Facades\\SEOTools',
      'Form' => 'LaravelLux\\Html\\FormFacade',
      'Html' => 'LaravelLux\\Html\\HtmlFacade',
      'Feeds' => 'App\\Support\\Feeds\\Facades\\FeedsFacade',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'webuser' => 
      array (
        'driver' => 'session',
        'provider' => 'web_users',
      ),
      'sanctum' => 
      array (
        'driver' => 'sanctum',
        'provider' => NULL,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
      'web_users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\WebUser',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
      ),
      'web_users' => 
      array (
        'provider' => 'web_users',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'backup' => 
  array (
    'backup' => 
    array (
      'name' => 'Khobor71',
      'source' => 
      array (
        'files' => 
        array (
          'include' => 
          array (
            0 => '/var/www/khonor71-backend',
          ),
          'exclude' => 
          array (
            0 => '/var/www/khonor71-backend/vendor',
            1 => '/var/www/khonor71-backend/node_modules',
          ),
          'follow_links' => false,
          'ignore_unreadable_directories' => false,
          'relative_path' => NULL,
        ),
        'databases' => 
        array (
          0 => 'mysql',
        ),
      ),
      'database_dump_compressor' => NULL,
      'database_dump_file_extension' => '',
      'destination' => 
      array (
        'filename_prefix' => '',
        'disks' => 
        array (
          0 => 'local',
        ),
      ),
      'temporary_directory' => '/var/www/khonor71-backend/storage/app/backup-temp',
      'password' => NULL,
      'encryption' => 'default',
    ),
    'notifications' => 
    array (
      'notifications' => 
      array (
        'Spatie\\Backup\\Notifications\\Notifications\\BackupHasFailedNotification' => 
        array (
          0 => 'mail',
        ),
        'Spatie\\Backup\\Notifications\\Notifications\\UnhealthyBackupWasFoundNotification' => 
        array (
          0 => 'mail',
        ),
        'Spatie\\Backup\\Notifications\\Notifications\\CleanupHasFailedNotification' => 
        array (
          0 => 'mail',
        ),
        'Spatie\\Backup\\Notifications\\Notifications\\BackupWasSuccessfulNotification' => 
        array (
          0 => 'mail',
        ),
        'Spatie\\Backup\\Notifications\\Notifications\\HealthyBackupWasFoundNotification' => 
        array (
          0 => 'mail',
        ),
        'Spatie\\Backup\\Notifications\\Notifications\\CleanupWasSuccessfulNotification' => 
        array (
          0 => 'mail',
        ),
      ),
      'notifiable' => 'Spatie\\Backup\\Notifications\\Notifiable',
      'mail' => 
      array (
        'to' => 'your@example.com',
        'from' => 
        array (
          'address' => '',
          'name' => 'Khobor71',
        ),
      ),
      'slack' => 
      array (
        'webhook_url' => '',
        'channel' => NULL,
        'username' => NULL,
        'icon' => NULL,
      ),
      'discord' => 
      array (
        'webhook_url' => '',
        'username' => '',
        'avatar_url' => '',
      ),
    ),
    'log_channel' => NULL,
    'monitor_backups' => 
    array (
      0 => 
      array (
        'name' => 'Khobor71',
        'disks' => 
        array (
          0 => 'local',
        ),
        'health_checks' => 
        array (
          'Spatie\\Backup\\Tasks\\Monitor\\HealthChecks\\MaximumAgeInDays' => 1,
          'Spatie\\Backup\\Tasks\\Monitor\\HealthChecks\\MaximumStorageInMegabytes' => 5000,
        ),
      ),
    ),
    'cleanup' => 
    array (
      'strategy' => 'Spatie\\Backup\\Tasks\\Cleanup\\Strategies\\DefaultStrategy',
      'default_strategy' => 
      array (
        'keep_all_backups_for_days' => 7,
        'keep_daily_backups_for_days' => 16,
        'keep_weekly_backups_for_weeks' => 8,
        'keep_monthly_backups_for_months' => 4,
        'keep_yearly_backups_for_years' => 2,
        'delete_oldest_backups_when_using_more_megabytes_than' => 5000,
      ),
    ),
  ),
  'barcode' => 
  array (
    'store_path' => '/var/www/khonor71-backend/public/',
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'reverb' => 
      array (
        'driver' => 'reverb',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'host' => NULL,
          'port' => 443,
          'scheme' => 'https',
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'host' => 'api-mt1.pusher.com',
          'port' => '443',
          'scheme' => 'https',
          'encrypted' => true,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'mercure' => 
      array (
        'driver' => 'mercure',
        'url' => NULL,
        'public_url' => NULL,
        'secret' => NULL,
        'encryption_key' => NULL,
        'claims' => 
        array (
          'iss' => NULL,
          'client_id' => 'Khobor71',
        ),
        'cookie_name' => NULL,
        'subscribe_expiration' => 5,
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'session' => 
      array (
        'driver' => 'session',
        'key' => '_cache',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
        'lock_connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/var/www/khonor71-backend/storage/framework/cache/data',
      ),
      'storage' => 
      array (
        'driver' => 'storage',
        'disk' => NULL,
        'path' => 'framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
      'failover' => 
      array (
        'driver' => 'failover',
        'stores' => 
        array (
          0 => 'database',
          1 => 'array',
        ),
      ),
      'apc' => 
      array (
        'driver' => 'apc',
      ),
    ),
    'prefix' => 'khobor71_cache_',
  ),
  'company' => 
  array (
    'name' => 'Company',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'khabor71',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'khabor71',
        'username' => 'root',
        'password' => 'P@ssw0rd',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => false,
        'engine' => 'InnoDB',
        'options' => 
        array (
        ),
      ),
      'mariadb' => 
      array (
        'driver' => 'mariadb',
        'url' => NULL,
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'khabor71',
        'username' => 'root',
        'password' => 'P@ssw0rd',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'mask_bindings_in_exception_messages' => false,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'khabor71',
        'username' => 'root',
        'password' => 'P@ssw0rd',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => 'localhost',
        'port' => '3306',
        'database' => 'khabor71',
        'username' => 'root',
        'password' => 'P@ssw0rd',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'khobor71_database_',
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'datatables' => 
  array (
    'search' => 
    array (
      'smart' => true,
      'multi_term' => true,
      'case_insensitive' => true,
      'use_wildcards' => false,
      'starts_with' => false,
    ),
    'index_column' => 'DT_RowIndex',
    'max_length' => NULL,
    'engines' => 
    array (
      'eloquent' => 'Yajra\\DataTables\\EloquentDataTable',
      'query' => 'Yajra\\DataTables\\QueryDataTable',
      'collection' => 'Yajra\\DataTables\\CollectionDataTable',
      'resource' => 'Yajra\\DataTables\\ApiResourceDataTable',
    ),
    'builders' => 
    array (
    ),
    'nulls_last_sql' => ':column :direction NULLS LAST',
    'error' => NULL,
    'columns' => 
    array (
      'excess' => 
      array (
        0 => 'rn',
        1 => 'row_num',
      ),
      'escape' => '*',
      'raw' => 
      array (
        0 => 'action',
      ),
      'blacklist' => 
      array (
        0 => 'password',
        1 => 'remember_token',
      ),
      'whitelist' => '*',
    ),
    'json' => 
    array (
      'header' => 
      array (
      ),
      'options' => 0,
    ),
    'callback' => 
    array (
      0 => '$',
      1 => '$.',
      2 => 'function',
    ),
  ),
  'datatables-buttons' => 
  array (
    'namespace' => 
    array (
      'base' => 'DataTables',
      'model' => '',
    ),
    'pdf_generator' => 'snappy',
    'snappy' => 
    array (
      'options' => 
      array (
        'no-outline' => true,
        'margin-left' => '0',
        'margin-right' => '0',
        'margin-top' => '10mm',
        'margin-bottom' => '10mm',
      ),
      'orientation' => 'landscape',
    ),
    'parameters' => 
    array (
      'dom' => 'Bfrtip',
      'order' => 
      array (
        0 => 
        array (
          0 => 0,
          1 => 'desc',
        ),
      ),
      'buttons' => 
      array (
        0 => 'excel',
        1 => 'csv',
        2 => 'pdf',
        3 => 'print',
        4 => 'reset',
        5 => 'reload',
      ),
    ),
    'generator' => 
    array (
      'columns' => 'id,add your columns,created_at,updated_at',
      'buttons' => 'excel,csv,pdf,print,reset,reload',
      'dom' => 'Bfrtip',
    ),
  ),
  'debugbar' => 
  array (
    'enabled' => NULL,
    'collect_jobs' => false,
    'except' => 
    array (
      0 => 'telescope*',
      1 => 'horizon*',
    ),
    'collectors' => 
    array (
      'phpinfo' => true,
      'messages' => true,
      'time' => true,
      'memory' => true,
      'exceptions' => true,
      'log' => true,
      'db' => true,
      'views' => true,
      'route' => true,
      'auth' => false,
      'gate' => true,
      'session' => true,
      'symfony_request' => true,
      'mail' => true,
      'laravel' => false,
      'events' => false,
      'default_request' => false,
      'logs' => false,
      'files' => false,
      'config' => false,
      'cache' => false,
      'models' => true,
      'livewire' => true,
      'jobs' => false,
    ),
    'options' => 
    array (
      'time' => 
      array (
        'memory_usage' => false,
      ),
      'messages' => 
      array (
        'trace' => true,
      ),
      'memory' => 
      array (
        'reset_peak' => false,
        'with_baseline' => false,
        'precision' => 0,
      ),
      'auth' => 
      array (
        'show_name' => true,
        'show_guards' => true,
      ),
      'db' => 
      array (
        'with_params' => true,
        'backtrace' => true,
        'backtrace_exclude_paths' => 
        array (
        ),
        'timeline' => false,
        'duration_background' => true,
        'explain' => 
        array (
          'enabled' => false,
          'types' => 
          array (
            0 => 'SELECT',
          ),
        ),
        'hints' => false,
        'show_copy' => false,
        'slow_threshold' => false,
        'memory_usage' => false,
        'soft_limit' => 100,
        'hard_limit' => 500,
      ),
      'mail' => 
      array (
        'timeline' => false,
        'show_body' => true,
      ),
      'views' => 
      array (
        'timeline' => false,
        'data' => false,
        'group' => 50,
        'exclude_paths' => 
        array (
          0 => 'vendor/filament',
        ),
      ),
      'route' => 
      array (
        'label' => true,
      ),
      'session' => 
      array (
        'hiddens' => 
        array (
        ),
      ),
      'symfony_request' => 
      array (
        'hiddens' => 
        array (
        ),
      ),
      'events' => 
      array (
        'data' => false,
      ),
      'logs' => 
      array (
        'file' => NULL,
      ),
      'cache' => 
      array (
        'values' => true,
      ),
    ),
    'custom_collectors' => 
    array (
    ),
    'editor' => 'vscode',
    'capture_ajax' => true,
    'add_ajax_timing' => false,
    'ajax_handler_auto_show' => true,
    'ajax_handler_enable_tab' => true,
    'capture_streamed' => false,
    'streamed_content_types' => 
    array (
      0 => 'text/event-stream',
    ),
    'defer_datasets' => false,
    'remote_sites_path' => NULL,
    'local_sites_path' => NULL,
    'storage' => 
    array (
      'enabled' => true,
      'open' => NULL,
      'driver' => 'file',
      'path' => '/var/www/khonor71-backend/storage/debugbar',
      'connection' => NULL,
      'provider' => '',
      'hostname' => '127.0.0.1',
      'port' => 2304,
    ),
    'force_allow_enable' => false,
    'use_dist_files' => true,
    'include_vendors' => true,
    'error_handler' => false,
    'error_level' => 30719,
    'clockwork' => false,
    'inject' => true,
    'route_prefix' => '_debugbar',
    'route_middleware' => 
    array (
    ),
    'route_domain' => NULL,
    'theme' => 'auto',
    'debug_backtrace_limit' => 50,
  ),
  'demo' => 
  array (
    'demo_mode' => false,
  ),
  'dompdf' => 
  array (
    'show_warnings' => false,
    'public_path' => NULL,
    'convert_entities' => true,
    'options' => 
    array (
      'font_dir' => '/var/www/khonor71-backend/storage/fonts',
      'font_cache' => '/var/www/khonor71-backend/storage/fonts',
      'temp_dir' => '/tmp',
      'chroot' => '/var/www/khonor71-backend',
      'allowed_protocols' => 
      array (
        'file://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'http://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'https://' => 
        array (
          'rules' => 
          array (
          ),
        ),
      ),
      'log_output_file' => NULL,
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_paper_orientation' => 'portrait',
      'default_font' => 'SolaimanLipi',
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => true,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => true,
    ),
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'chunk_size' => 1000,
      'pre_calculate_formulas' => false,
      'strict_null_comparison' => false,
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'line_ending' => '
',
        'use_bom' => true,
        'include_separator_line' => false,
        'excel_compatibility' => false,
        'output_encoding' => '',
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'imports' => 
    array (
      'read_only' => true,
      'ignore_empty' => false,
      'heading_row' => 
      array (
        'formatter' => 'slug',
      ),
      'csv' => 
      array (
        'delimiter' => NULL,
        'enclosure' => '"',
        'escape_character' => '\\',
        'contiguous' => false,
        'input_encoding' => 'UTF-8',
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'extension_detector' => 
    array (
      'xlsx' => 'Xlsx',
      'xlsm' => 'Xlsx',
      'xltx' => 'Xlsx',
      'xltm' => 'Xlsx',
      'xls' => 'Xls',
      'xlt' => 'Xls',
      'ods' => 'Ods',
      'ots' => 'Ods',
      'slk' => 'Slk',
      'xml' => 'Xml',
      'gnumeric' => 'Gnumeric',
      'htm' => 'Html',
      'html' => 'Html',
      'csv' => 'Csv',
      'tsv' => 'Csv',
      'pdf' => 'Dompdf',
    ),
    'value_binder' => 
    array (
      'default' => 'Maatwebsite\\Excel\\DefaultValueBinder',
    ),
    'cache' => 
    array (
      'driver' => 'memory',
      'batch' => 
      array (
        'memory_limit' => 60000,
      ),
      'illuminate' => 
      array (
        'store' => NULL,
      ),
    ),
    'transactions' => 
    array (
      'handler' => 'db',
      'db' => 
      array (
        'connection' => NULL,
      ),
    ),
    'temporary_files' => 
    array (
      'local_path' => '/var/www/khonor71-backend/storage/framework/cache/laravel-excel',
      'remote_disk' => NULL,
      'remote_prefix' => NULL,
      'force_resync_remote' => NULL,
    ),
  ),
  'feeds' => 
  array (
    'cache.location' => '/var/www/khonor71-backend/storage/framework/cache',
    'cache.life' => 3600,
    'cache.disabled' => false,
    'ssl_check.disabled' => false,
    'strip_html_tags.disabled' => false,
    'strip_html_tags.tags' => 
    array (
      0 => 'base',
      1 => 'blink',
      2 => 'body',
      3 => 'doctype',
      4 => 'embed',
      5 => 'font',
      6 => 'form',
      7 => 'frame',
      8 => 'frameset',
      9 => 'html',
      10 => 'iframe',
      11 => 'input',
      12 => 'marquee',
      13 => 'meta',
      14 => 'noscript',
      15 => 'object',
      16 => 'param',
      17 => 'script',
      18 => 'style',
    ),
    'strip_attribute.disabled' => false,
    'strip_attribute.tags' => 
    array (
      0 => 'bgsound',
      1 => 'class',
      2 => 'expr',
      3 => 'id',
      4 => 'style',
      5 => 'onclick',
      6 => 'onerror',
      7 => 'onfinish',
      8 => 'onmouseover',
      9 => 'onmouseout',
      10 => 'onfocus',
      11 => 'onblur',
      12 => 'lowsrc',
      13 => 'dynsrc',
    ),
    'curl.options' => NULL,
    'curl.timeout' => NULL,
    'user_agent' => NULL,
  ),
  'ffmpeg' => 
  array (
    'ffmpeg.binaries' => '/usr/local/bin/ffmpeg',
    'ffprobe.binaries' => '/usr/local/bin/ffprobe',
    'timeout' => 3600,
    'threads' => 12,
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/khonor71-backend/storage/app',
        'throw' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/khonor71-backend/storage/app/public',
        'url' => 'http://127.0.0.1:8000//storage',
        'visibility' => 'public',
        'throw' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
      ),
    ),
    'links' => 
    array (
      '/var/www/khonor71-backend/public/storage' => '/var/www/khonor71-backend/storage/app/public',
    ),
  ),
  'firewall' => 
  array (
    'enabled' => true,
    'whitelist' => 
    array (
      0 => '',
    ),
    'models' => 
    array (
      'user' => '\\App\\Models\\User',
    ),
    'log' => 
    array (
      'max_request_size' => 2048,
    ),
    'cron' => 
    array (
      'enabled' => true,
      'expression' => '* * * * *',
    ),
    'responses' => 
    array (
      'block' => 
      array (
        'view' => NULL,
        'redirect' => NULL,
        'abort' => false,
        'code' => 403,
      ),
    ),
    'notifications' => 
    array (
      'mail' => 
      array (
        'enabled' => false,
        'name' => 'Laravel Firewall',
        'from' => 'firewall@mydomain.com',
        'to' => 'admin@mydomain.com',
        'queue' => 'default',
      ),
      'slack' => 
      array (
        'enabled' => false,
        'emoji' => ':fire:',
        'from' => 'Laravel Firewall',
        'to' => NULL,
        'channel' => NULL,
        'queue' => 'default',
      ),
    ),
    'all_middleware' => 
    array (
      0 => 'firewall.ip',
      1 => 'firewall.agent',
      2 => 'firewall.bot',
      3 => 'firewall.geo',
      4 => 'firewall.lfi',
      5 => 'firewall.php',
      6 => 'firewall.referrer',
      7 => 'firewall.rfi',
      8 => 'firewall.session',
      9 => 'firewall.sqli',
      10 => 'firewall.swear',
      11 => 'firewall.xss',
    ),
    'middleware' => 
    array (
      'ip' => 
      array (
        'enabled' => true,
        'methods' => 
        array (
          0 => 'all',
        ),
        'routes' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
      ),
      'agent' => 
      array (
        'enabled' => false,
        'methods' => 
        array (
          0 => 'all',
        ),
        'routes' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'browsers' => 
        array (
          'allow' => 
          array (
          ),
          'block' => 
          array (
          ),
        ),
        'platforms' => 
        array (
          'allow' => 
          array (
          ),
          'block' => 
          array (
          ),
        ),
        'devices' => 
        array (
          'allow' => 
          array (
          ),
          'block' => 
          array (
          ),
        ),
        'properties' => 
        array (
          'allow' => 
          array (
          ),
          'block' => 
          array (
          ),
        ),
        'auto_block' => 
        array (
          'attempts' => 5,
          'frequency' => 60,
          'period' => 1800,
        ),
      ),
      'bot' => 
      array (
        'enabled' => true,
        'methods' => 
        array (
          0 => 'all',
        ),
        'routes' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'crawlers' => 
        array (
          'allow' => 
          array (
          ),
          'block' => 
          array (
          ),
        ),
        'auto_block' => 
        array (
          'attempts' => 5,
          'frequency' => 60,
          'period' => 1800,
        ),
      ),
      'geo' => 
      array (
        'enabled' => true,
        'methods' => 
        array (
          0 => 'all',
        ),
        'routes' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'continents' => 
        array (
          'allow' => 
          array (
          ),
          'block' => 
          array (
          ),
        ),
        'regions' => 
        array (
          'allow' => 
          array (
          ),
          'block' => 
          array (
          ),
        ),
        'countries' => 
        array (
          'allow' => 
          array (
          ),
          'block' => 
          array (
          ),
        ),
        'cities' => 
        array (
          'allow' => 
          array (
          ),
          'block' => 
          array (
          ),
        ),
        'service' => 'ipapi',
        'auto_block' => 
        array (
          'attempts' => 3,
          'frequency' => 300,
          'period' => 1800,
        ),
      ),
      'lfi' => 
      array (
        'enabled' => true,
        'methods' => 
        array (
          0 => 'get',
          1 => 'delete',
        ),
        'routes' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'inputs' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'patterns' => 
        array (
          0 => '#\\.\\/#is',
        ),
        'auto_block' => 
        array (
          'attempts' => 3,
          'frequency' => 300,
          'period' => 1800,
        ),
      ),
      'login' => 
      array (
        'enabled' => true,
        'auto_block' => 
        array (
          'attempts' => 5,
          'frequency' => 60,
          'period' => 1800,
        ),
      ),
      'php' => 
      array (
        'enabled' => true,
        'methods' => 
        array (
          0 => 'get',
          1 => 'post',
          2 => 'delete',
        ),
        'routes' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'inputs' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'patterns' => 
        array (
          0 => 'bzip2://',
          1 => 'expect://',
          2 => 'glob://',
          3 => 'phar://',
          4 => 'php://',
          5 => 'ogg://',
          6 => 'rar://',
          7 => 'ssh2://',
          8 => 'zip://',
          9 => 'zlib://',
        ),
        'auto_block' => 
        array (
          'attempts' => 3,
          'frequency' => 300,
          'period' => 1800,
        ),
      ),
      'referrer' => 
      array (
        'enabled' => true,
        'methods' => 
        array (
          0 => 'all',
        ),
        'routes' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'blocked' => 
        array (
        ),
        'auto_block' => 
        array (
          'attempts' => 3,
          'frequency' => 300,
          'period' => 1800,
        ),
      ),
      'rfi' => 
      array (
        'enabled' => true,
        'methods' => 
        array (
          0 => 'get',
          1 => 'post',
          2 => 'delete',
        ),
        'routes' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'inputs' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'patterns' => 
        array (
          0 => '#(http|ftp){1,1}(s){0,1}://.*#i',
        ),
        'exceptions' => 
        array (
        ),
        'auto_block' => 
        array (
          'attempts' => 3,
          'frequency' => 300,
          'period' => 1800,
        ),
      ),
      'session' => 
      array (
        'enabled' => true,
        'methods' => 
        array (
          0 => 'get',
          1 => 'post',
          2 => 'delete',
        ),
        'routes' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'inputs' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'patterns' => 
        array (
          0 => '@[\\|:]O:\\d{1,}:"[\\w_][\\w\\d_]{0,}":\\d{1,}:{@i',
          1 => '@[\\|:]a:\\d{1,}:{@i',
        ),
        'auto_block' => 
        array (
          'attempts' => 3,
          'frequency' => 300,
          'period' => 1800,
        ),
      ),
      'sqli' => 
      array (
        'enabled' => true,
        'methods' => 
        array (
          0 => 'get',
          1 => 'delete',
        ),
        'routes' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'inputs' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'patterns' => 
        array (
          0 => '#[\\d\\W](union select|union join|union distinct)[\\d\\W]#is',
          1 => '#[\\d\\W](union|union select|insert|from|where|concat|into|cast|truncate|select|delete|having)[\\d\\W]#is',
        ),
        'auto_block' => 
        array (
          'attempts' => 3,
          'frequency' => 300,
          'period' => 1800,
        ),
      ),
      'swear' => 
      array (
        'enabled' => true,
        'methods' => 
        array (
          0 => 'post',
          1 => 'put',
          2 => 'patch',
        ),
        'routes' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'inputs' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'words' => 
        array (
        ),
        'auto_block' => 
        array (
          'attempts' => 3,
          'frequency' => 300,
          'period' => 1800,
        ),
      ),
      'url' => 
      array (
        'enabled' => true,
        'methods' => 
        array (
          0 => 'all',
        ),
        'inspections' => 
        array (
        ),
        'auto_block' => 
        array (
          'attempts' => 5,
          'frequency' => 60,
          'period' => 1800,
        ),
      ),
      'whitelist' => 
      array (
        'enabled' => true,
        'methods' => 
        array (
          0 => 'all',
        ),
        'routes' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
      ),
      'xss' => 
      array (
        'enabled' => true,
        'methods' => 
        array (
          0 => 'post',
          1 => 'put',
          2 => 'patch',
        ),
        'routes' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'inputs' => 
        array (
          'only' => 
          array (
          ),
          'except' => 
          array (
          ),
        ),
        'patterns' => 
        array (
          0 => '#(<[^>]+[\\x00-\\x20\\"\'\\/])(form|formaction|on\\w*|style|xmlns|xlink:href)[^>]*>?#iUu',
          1 => '!((java|live|vb)script|mocha|feed|data):(\\w)*!iUu',
          2 => '#-moz-binding[\\x00-\\x20]*:#u',
          3 => '#</*(applet|meta|xml|blink|link|style|script|embed|object|iframe|frame|frameset|ilayer|layer|bgsound|title|base|img)[^>]*>?#i',
        ),
        'auto_block' => 
        array (
          'attempts' => 3,
          'frequency' => 300,
          'period' => 1800,
        ),
      ),
    ),
  ),
  'flare' => 
  array (
    'key' => NULL,
    'flare_middleware' => 
    array (
      0 => 'Spatie\\FlareClient\\FlareMiddleware\\RemoveRequestIp',
      1 => 'Spatie\\FlareClient\\FlareMiddleware\\AddGitInformation',
      2 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddNotifierName',
      3 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddEnvironmentInformation',
      4 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddExceptionInformation',
      5 => 'Spatie\\LaravelIgnition\\FlareMiddleware\\AddDumps',
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddLogs' => 
      array (
        'maximum_number_of_collected_logs' => 200,
      ),
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddQueries' => 
      array (
        'maximum_number_of_collected_queries' => 200,
        'report_query_bindings' => true,
      ),
      'Spatie\\LaravelIgnition\\FlareMiddleware\\AddJobs' => 
      array (
        'max_chained_job_reporting_depth' => 5,
      ),
      'Spatie\\FlareClient\\FlareMiddleware\\CensorRequestBodyFields' => 
      array (
        'censor_fields' => 
        array (
          0 => 'password',
          1 => 'password_confirmation',
        ),
      ),
      'Spatie\\FlareClient\\FlareMiddleware\\CensorRequestHeaders' => 
      array (
        'headers' => 
        array (
          0 => 'API-KEY',
        ),
      ),
    ),
    'send_logs_as_events' => true,
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
    ),
    'rehash_on_login' => true,
  ),
  'ignition' => 
  array (
    'editor' => 'phpstorm',
    'theme' => 'auto',
    'enable_share_button' => true,
    'register_commands' => false,
    'solution_providers' => 
    array (
      0 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\BadMethodCallSolutionProvider',
      1 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\MergeConflictSolutionProvider',
      2 => 'Spatie\\Ignition\\Solutions\\SolutionProviders\\UndefinedPropertySolutionProvider',
      3 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\IncorrectValetDbCredentialsSolutionProvider',
      4 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingAppKeySolutionProvider',
      5 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\DefaultDbNameSolutionProvider',
      6 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\TableNotFoundSolutionProvider',
      7 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingImportSolutionProvider',
      8 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\InvalidRouteActionSolutionProvider',
      9 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\ViewNotFoundSolutionProvider',
      10 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\RunningLaravelDuskInProductionProvider',
      11 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingColumnSolutionProvider',
      12 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UnknownValidationSolutionProvider',
      13 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingMixManifestSolutionProvider',
      14 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingViteManifestSolutionProvider',
      15 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\MissingLivewireComponentSolutionProvider',
      16 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\UndefinedViewVariableSolutionProvider',
      17 => 'Spatie\\LaravelIgnition\\Solutions\\SolutionProviders\\GenericLaravelExceptionSolutionProvider',
    ),
    'ignored_solution_providers' => 
    array (
    ),
    'enable_runnable_solutions' => true,
    'remote_sites_path' => '/var/www/khonor71-backend',
    'local_sites_path' => '',
    'housekeeping_endpoint_prefix' => '_ignition',
    'settings_file_path' => '',
    'recorders' => 
    array (
      0 => 'Spatie\\LaravelIgnition\\Recorders\\DumpRecorder\\DumpRecorder',
      1 => 'Spatie\\LaravelIgnition\\Recorders\\JobRecorder\\JobRecorder',
      2 => 'Spatie\\LaravelIgnition\\Recorders\\LogRecorder\\LogRecorder',
      3 => 'Spatie\\LaravelIgnition\\Recorders\\QueryRecorder\\QueryRecorder',
    ),
    'open_ai_key' => NULL,
    'with_stack_frame_arguments' => true,
    'argument_reducers' => 
    array (
      0 => 'Spatie\\Backtrace\\Arguments\\Reducers\\BaseTypeArgumentReducer',
      1 => 'Spatie\\Backtrace\\Arguments\\Reducers\\ArrayArgumentReducer',
      2 => 'Spatie\\Backtrace\\Arguments\\Reducers\\StdClassArgumentReducer',
      3 => 'Spatie\\Backtrace\\Arguments\\Reducers\\EnumArgumentReducer',
      4 => 'Spatie\\Backtrace\\Arguments\\Reducers\\ClosureArgumentReducer',
      5 => 'Spatie\\Backtrace\\Arguments\\Reducers\\DateTimeArgumentReducer',
      6 => 'Spatie\\Backtrace\\Arguments\\Reducers\\DateTimeZoneArgumentReducer',
      7 => 'Spatie\\Backtrace\\Arguments\\Reducers\\SymphonyRequestArgumentReducer',
      8 => 'Spatie\\LaravelIgnition\\ArgumentReducers\\ModelArgumentReducer',
      9 => 'Spatie\\LaravelIgnition\\ArgumentReducers\\CollectionArgumentReducer',
      10 => 'Spatie\\Backtrace\\Arguments\\Reducers\\StringableArgumentReducer',
    ),
  ),
  'laravel-share' => 
  array (
    'services' => 
    array (
      'facebook' => 
      array (
        'uri' => 'https://www.facebook.com/sharer/sharer.php?u=',
      ),
      'twitter' => 
      array (
        'uri' => 'https://twitter.com/intent/tweet',
        'text' => 'Default share text',
      ),
      'linkedin' => 
      array (
        'uri' => 'https://www.linkedin.com/sharing/share-offsite',
        'extra' => 
        array (
          'mini' => 'true',
        ),
      ),
      'whatsapp' => 
      array (
        'uri' => 'https://wa.me/?text=',
        'extra' => 
        array (
          'mini' => 'true',
        ),
      ),
      'pinterest' => 
      array (
        'uri' => 'https://pinterest.com/pin/create/button/?url=',
      ),
      'reddit' => 
      array (
        'uri' => 'https://www.reddit.com/submit',
        'text' => 'Default share text',
      ),
      'telegram' => 
      array (
        'uri' => 'https://telegram.me/share/url',
        'text' => 'Default share text',
      ),
    ),
    'fontAwesomeVersion' => 5,
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => 
    array (
      'channel' => NULL,
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/var/www/khonor71-backend/storage/logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/var/www/khonor71-backend/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'monthly' => 
      array (
        'driver' => 'monthly',
        'path' => '/var/www/khonor71-backend/storage/logs/laravel.log',
        'level' => 'debug',
        'max_files' => 3,
        'replace_placeholders' => true,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => '/var/www/khonor71-backend/storage/logs/laravel.log',
      ),
      'sentry' => 
      array (
        'driver' => 'sentry',
      ),
      'sentry_logs' => 
      array (
        'driver' => 'sentry_logs',
        'level' => 'debug',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'host' => 'smtp.gmail.com',
        'port' => '465',
        'encryption' => 'tls',
        'username' => '',
        'password' => '',
        'timeout' => NULL,
        'local_domain' => NULL,
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'resend' => 
      array (
        'transport' => 'resend',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
      ),
      'roundrobin' => 
      array (
        'transport' => 'roundrobin',
        'mailers' => 
        array (
          0 => 'ses',
          1 => 'postmark',
        ),
        'retry_after' => 60,
      ),
      'mailgun' => 
      array (
        'transport' => 'mailgun',
      ),
    ),
    'from' => 
    array (
      'address' => '',
      'name' => 'Khobor71',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/var/www/khonor71-backend/resources/views/vendor/mail',
      ),
    ),
  ),
  'modules' => 
  array (
    'namespace' => 'Modules',
    'vapor_maintenance_mode' => false,
    'stubs' => 
    array (
      'enabled' => false,
      'path' => '/var/www/khonor71-backend/vendor/nwidart/laravel-modules/src/Commands/stubs',
      'files' => 
      array (
        'routes/web' => 'Routes/web.php',
        'routes/api' => 'Routes/api.php',
        'views/index' => 'Resources/views/index.blade.php',
        'views/master' => 'Resources/views/layouts/master.blade.php',
        'scaffold/config' => 'Config/config.php',
        'composer' => 'composer.json',
        'assets/js/app' => 'Resources/assets/js/app.js',
        'assets/sass/app' => 'Resources/assets/sass/app.scss',
        'vite' => 'vite.config.js',
        'package' => 'package.json',
      ),
      'replacements' => 
      array (
        'routes/web' => 
        array (
          0 => 'LOWER_NAME',
          1 => 'STUDLY_NAME',
        ),
        'routes/api' => 
        array (
          0 => 'LOWER_NAME',
        ),
        'vite' => 
        array (
          0 => 'LOWER_NAME',
        ),
        'json' => 
        array (
          0 => 'LOWER_NAME',
          1 => 'STUDLY_NAME',
          2 => 'MODULE_NAMESPACE',
          3 => 'PROVIDER_NAMESPACE',
        ),
        'views/index' => 
        array (
          0 => 'LOWER_NAME',
        ),
        'views/master' => 
        array (
          0 => 'LOWER_NAME',
          1 => 'STUDLY_NAME',
        ),
        'scaffold/config' => 
        array (
          0 => 'STUDLY_NAME',
        ),
        'composer' => 
        array (
          0 => 'LOWER_NAME',
          1 => 'STUDLY_NAME',
          2 => 'VENDOR',
          3 => 'AUTHOR_NAME',
          4 => 'AUTHOR_EMAIL',
          5 => 'MODULE_NAMESPACE',
          6 => 'PROVIDER_NAMESPACE',
        ),
      ),
      'gitkeep' => true,
    ),
    'paths' => 
    array (
      'modules' => '/var/www/khonor71-backend/modules',
      'assets' => '/var/www/khonor71-backend/public/modules',
      'migration' => '/var/www/khonor71-backend/database/migrations',
      'generator' => 
      array (
        'config' => 
        array (
          'path' => 'Config',
          'generate' => true,
        ),
        'command' => 
        array (
          'path' => 'Console',
          'generate' => true,
        ),
        'migration' => 
        array (
          'path' => 'Database/Migrations',
          'generate' => true,
        ),
        'seeder' => 
        array (
          'path' => 'Database/Seeders',
          'generate' => true,
        ),
        'factory' => 
        array (
          'path' => 'Database/factories',
          'generate' => true,
        ),
        'model' => 
        array (
          'path' => 'Entities',
          'generate' => true,
        ),
        'routes' => 
        array (
          'path' => 'Routes',
          'generate' => true,
        ),
        'controller' => 
        array (
          'path' => 'Http/Controllers',
          'generate' => true,
        ),
        'filter' => 
        array (
          'path' => 'Http/Middleware',
          'generate' => true,
        ),
        'request' => 
        array (
          'path' => 'Http/Requests',
          'generate' => true,
        ),
        'provider' => 
        array (
          'path' => 'Providers',
          'generate' => true,
        ),
        'assets' => 
        array (
          'path' => 'Resources/assets',
          'generate' => true,
        ),
        'lang' => 
        array (
          'path' => 'Resources/lang',
          'generate' => true,
        ),
        'views' => 
        array (
          'path' => 'Resources/views',
          'generate' => true,
        ),
        'test' => 
        array (
          'path' => 'Tests/Unit',
          'generate' => true,
        ),
        'test-feature' => 
        array (
          'path' => 'Tests/Feature',
          'generate' => true,
        ),
        'repository' => 
        array (
          'path' => 'Repositories',
          'generate' => false,
        ),
        'event' => 
        array (
          'path' => 'Events',
          'generate' => false,
        ),
        'listener' => 
        array (
          'path' => 'Listeners',
          'generate' => false,
        ),
        'policies' => 
        array (
          'path' => 'Policies',
          'generate' => false,
        ),
        'rules' => 
        array (
          'path' => 'Rules',
          'generate' => false,
        ),
        'jobs' => 
        array (
          'path' => 'Jobs',
          'generate' => false,
        ),
        'emails' => 
        array (
          'path' => 'Emails',
          'generate' => false,
        ),
        'notifications' => 
        array (
          'path' => 'Notifications',
          'generate' => false,
        ),
        'resource' => 
        array (
          'path' => 'Transformers',
          'generate' => false,
        ),
        'component-view' => 
        array (
          'path' => 'Resources/views/components',
          'generate' => false,
        ),
        'component-class' => 
        array (
          'path' => 'View/Components',
          'generate' => false,
        ),
      ),
    ),
    'auto-discover' => 
    array (
      'migrations' => true,
      'translations' => false,
    ),
    'commands' => 
    array (
      0 => 'Nwidart\\Modules\\Commands\\Actions\\CheckLangCommand',
      1 => 'Nwidart\\Modules\\Commands\\Actions\\DisableCommand',
      2 => 'Nwidart\\Modules\\Commands\\Actions\\DumpCommand',
      3 => 'Nwidart\\Modules\\Commands\\Actions\\EnableCommand',
      4 => 'Nwidart\\Modules\\Commands\\Actions\\InstallCommand',
      5 => 'Nwidart\\Modules\\Commands\\Actions\\ListCommand',
      6 => 'Nwidart\\Modules\\Commands\\Actions\\ListCommands',
      7 => 'Nwidart\\Modules\\Commands\\Actions\\ModelPruneCommand',
      8 => 'Nwidart\\Modules\\Commands\\Actions\\ModelShowCommand',
      9 => 'Nwidart\\Modules\\Commands\\Actions\\ModuleDeleteCommand',
      10 => 'Nwidart\\Modules\\Commands\\Actions\\UnUseCommand',
      11 => 'Nwidart\\Modules\\Commands\\Actions\\UpdateCommand',
      12 => 'Nwidart\\Modules\\Commands\\Actions\\UseCommand',
      13 => 'Nwidart\\Modules\\Commands\\Database\\MigrateCommand',
      14 => 'Nwidart\\Modules\\Commands\\Database\\MigrateRefreshCommand',
      15 => 'Nwidart\\Modules\\Commands\\Database\\MigrateResetCommand',
      16 => 'Nwidart\\Modules\\Commands\\Database\\MigrateRollbackCommand',
      17 => 'Nwidart\\Modules\\Commands\\Database\\MigrateStatusCommand',
      18 => 'Nwidart\\Modules\\Commands\\Database\\SeedCommand',
      19 => 'Nwidart\\Modules\\Commands\\Make\\ActionMakeCommand',
      20 => 'Nwidart\\Modules\\Commands\\Make\\CastMakeCommand',
      21 => 'Nwidart\\Modules\\Commands\\Make\\ChannelMakeCommand',
      22 => 'Nwidart\\Modules\\Commands\\Make\\ClassMakeCommand',
      23 => 'Nwidart\\Modules\\Commands\\Make\\CommandMakeCommand',
      24 => 'Nwidart\\Modules\\Commands\\Make\\ComponentClassMakeCommand',
      25 => 'Nwidart\\Modules\\Commands\\Make\\ComponentViewMakeCommand',
      26 => 'Nwidart\\Modules\\Commands\\Make\\ControllerMakeCommand',
      27 => 'Nwidart\\Modules\\Commands\\Make\\EventMakeCommand',
      28 => 'Nwidart\\Modules\\Commands\\Make\\EventProviderMakeCommand',
      29 => 'Nwidart\\Modules\\Commands\\Make\\EnumMakeCommand',
      30 => 'Nwidart\\Modules\\Commands\\Make\\ExceptionMakeCommand',
      31 => 'Nwidart\\Modules\\Commands\\Make\\FactoryMakeCommand',
      32 => 'Nwidart\\Modules\\Commands\\Make\\InterfaceMakeCommand',
      33 => 'Nwidart\\Modules\\Commands\\Make\\HelperMakeCommand',
      34 => 'Nwidart\\Modules\\Commands\\Make\\InertiaComponentMakeCommand',
      35 => 'Nwidart\\Modules\\Commands\\Make\\InertiaPageMakeCommand',
      36 => 'Nwidart\\Modules\\Commands\\Make\\JobMakeCommand',
      37 => 'Nwidart\\Modules\\Commands\\Make\\ListenerMakeCommand',
      38 => 'Nwidart\\Modules\\Commands\\Make\\MailMakeCommand',
      39 => 'Nwidart\\Modules\\Commands\\Make\\MiddlewareMakeCommand',
      40 => 'Nwidart\\Modules\\Commands\\Make\\MigrationMakeCommand',
      41 => 'Nwidart\\Modules\\Commands\\Make\\ModelMakeCommand',
      42 => 'Nwidart\\Modules\\Commands\\Make\\ModuleMakeCommand',
      43 => 'Nwidart\\Modules\\Commands\\Make\\NotificationMakeCommand',
      44 => 'Nwidart\\Modules\\Commands\\Make\\ObserverMakeCommand',
      45 => 'Nwidart\\Modules\\Commands\\Make\\PolicyMakeCommand',
      46 => 'Nwidart\\Modules\\Commands\\Make\\ProviderMakeCommand',
      47 => 'Nwidart\\Modules\\Commands\\Make\\RepositoryMakeCommand',
      48 => 'Nwidart\\Modules\\Commands\\Make\\RequestMakeCommand',
      49 => 'Nwidart\\Modules\\Commands\\Make\\ResourceMakeCommand',
      50 => 'Nwidart\\Modules\\Commands\\Make\\RouteProviderMakeCommand',
      51 => 'Nwidart\\Modules\\Commands\\Make\\RuleMakeCommand',
      52 => 'Nwidart\\Modules\\Commands\\Make\\ReplacementMakeCommand',
      53 => 'Nwidart\\Modules\\Commands\\Make\\ScopeMakeCommand',
      54 => 'Nwidart\\Modules\\Commands\\Make\\SeedMakeCommand',
      55 => 'Nwidart\\Modules\\Commands\\Make\\ServiceMakeCommand',
      56 => 'Nwidart\\Modules\\Commands\\Make\\TraitMakeCommand',
      57 => 'Nwidart\\Modules\\Commands\\Make\\TestMakeCommand',
      58 => 'Nwidart\\Modules\\Commands\\Make\\ViewMakeCommand',
      59 => 'Nwidart\\Modules\\Commands\\Publish\\PublishCommand',
      60 => 'Nwidart\\Modules\\Commands\\Publish\\PublishConfigurationCommand',
      61 => 'Nwidart\\Modules\\Commands\\Publish\\PublishInertiaCommand',
      62 => 'Nwidart\\Modules\\Commands\\Publish\\PublishMigrationCommand',
      63 => 'Nwidart\\Modules\\Commands\\Publish\\PublishTranslationCommand',
      64 => 'Nwidart\\Modules\\Commands\\ComposerUpdateCommand',
      65 => 'Nwidart\\Modules\\Commands\\LaravelModulesV6Migrator',
      66 => 'Nwidart\\Modules\\Commands\\SetupCommand',
      67 => 'Nwidart\\Modules\\Commands\\UpdatePhpunitCoverage',
      68 => 'Nwidart\\Modules\\Commands\\Database\\MigrateFreshCommand',
    ),
    'scan' => 
    array (
      'enabled' => false,
      'paths' => 
      array (
        0 => '/var/www/khonor71-backend/vendor/*/*',
      ),
    ),
    'composer' => 
    array (
      'vendor' => 'nwidart',
      'author' => 
      array (
        'name' => 'Nicolas Widart',
        'email' => 'n.widart@gmail.com',
      ),
      'composer-output' => false,
    ),
    'register' => 
    array (
      'translations' => true,
      'files' => 'register',
    ),
    'activators' => 
    array (
      'file' => 
      array (
        'class' => 'Nwidart\\Modules\\Activators\\FileActivator',
        'statuses-file' => '/var/www/khonor71-backend/modules_statuses.json',
        'cache-key' => 'activator.installed',
        'cache-lifetime' => 604800,
      ),
    ),
    'activator' => 'file',
    'inertia' => 
    array (
      'frontend' => 'vue',
    ),
    'cache' => 
    array (
      'enabled' => false,
      'driver' => 'file',
      'key' => 'laravel-modules',
      'lifetime' => 60,
    ),
  ),
  'octane' => 
  array (
    'server' => 'roadrunner',
    'https' => false,
    'listeners' => 
    array (
      'Laravel\\Octane\\Events\\WorkerStarting' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\EnsureUploadedFilesAreValid',
        1 => 'Laravel\\Octane\\Listeners\\EnsureUploadedFilesCanBeMoved',
      ),
      'Laravel\\Octane\\Events\\RequestReceived' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\CreateConfigurationSandbox',
        1 => 'Laravel\\Octane\\Listeners\\CreateUrlGeneratorSandbox',
        2 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToAuthorizationGate',
        3 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToBroadcastManager',
        4 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseManager',
        5 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseSessionHandler',
        6 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToFilesystemManager',
        7 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToHttpKernel',
        8 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToLogManager',
        9 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToMailManager',
        10 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToNotificationChannelManager',
        11 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToPipelineHub',
        12 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToCacheManager',
        13 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToSessionManager',
        14 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToQueueManager',
        15 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToRouter',
        16 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToValidationFactory',
        17 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToViewFactory',
        18 => 'Laravel\\Octane\\Listeners\\FlushDatabaseRecordModificationState',
        19 => 'Laravel\\Octane\\Listeners\\FlushDatabaseQueryLog',
        20 => 'Laravel\\Octane\\Listeners\\RefreshQueryDurationHandling',
        21 => 'Laravel\\Octane\\Listeners\\FlushArrayCache',
        22 => 'Laravel\\Octane\\Listeners\\FlushLogContext',
        23 => 'Laravel\\Octane\\Listeners\\FlushMonologState',
        24 => 'Laravel\\Octane\\Listeners\\FlushStrCache',
        25 => 'Laravel\\Octane\\Listeners\\FlushTranslatorCache',
        26 => 'Laravel\\Octane\\Listeners\\FlushVite',
        27 => 'Laravel\\Octane\\Listeners\\PrepareInertiaForNextOperation',
        28 => 'Laravel\\Octane\\Listeners\\PrepareLivewireForNextOperation',
        29 => 'Laravel\\Octane\\Listeners\\PrepareScoutForNextOperation',
        30 => 'Laravel\\Octane\\Listeners\\PrepareSocialiteForNextOperation',
        31 => 'Laravel\\Octane\\Listeners\\FlushLocaleState',
        32 => 'Laravel\\Octane\\Listeners\\FlushQueuedCookies',
        33 => 'Laravel\\Octane\\Listeners\\FlushSessionState',
        34 => 'Laravel\\Octane\\Listeners\\FlushAuthenticationState',
        35 => 'Laravel\\Octane\\Listeners\\EnforceRequestScheme',
        36 => 'Laravel\\Octane\\Listeners\\EnsureRequestServerPortMatchesScheme',
        37 => 'Laravel\\Octane\\Listeners\\GiveNewRequestInstanceToApplication',
        38 => 'Laravel\\Octane\\Listeners\\GiveNewRequestInstanceToPaginator',
      ),
      'Laravel\\Octane\\Events\\RequestHandled' => 
      array (
      ),
      'Laravel\\Octane\\Events\\RequestTerminated' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\FlushUploadedFiles',
      ),
      'Laravel\\Octane\\Events\\TaskReceived' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\CreateConfigurationSandbox',
        1 => 'Laravel\\Octane\\Listeners\\CreateUrlGeneratorSandbox',
        2 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToAuthorizationGate',
        3 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToBroadcastManager',
        4 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseManager',
        5 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseSessionHandler',
        6 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToFilesystemManager',
        7 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToHttpKernel',
        8 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToLogManager',
        9 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToMailManager',
        10 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToNotificationChannelManager',
        11 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToPipelineHub',
        12 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToCacheManager',
        13 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToSessionManager',
        14 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToQueueManager',
        15 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToRouter',
        16 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToValidationFactory',
        17 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToViewFactory',
        18 => 'Laravel\\Octane\\Listeners\\FlushDatabaseRecordModificationState',
        19 => 'Laravel\\Octane\\Listeners\\FlushDatabaseQueryLog',
        20 => 'Laravel\\Octane\\Listeners\\RefreshQueryDurationHandling',
        21 => 'Laravel\\Octane\\Listeners\\FlushArrayCache',
        22 => 'Laravel\\Octane\\Listeners\\FlushLogContext',
        23 => 'Laravel\\Octane\\Listeners\\FlushMonologState',
        24 => 'Laravel\\Octane\\Listeners\\FlushStrCache',
        25 => 'Laravel\\Octane\\Listeners\\FlushTranslatorCache',
        26 => 'Laravel\\Octane\\Listeners\\FlushVite',
        27 => 'Laravel\\Octane\\Listeners\\PrepareInertiaForNextOperation',
        28 => 'Laravel\\Octane\\Listeners\\PrepareLivewireForNextOperation',
        29 => 'Laravel\\Octane\\Listeners\\PrepareScoutForNextOperation',
        30 => 'Laravel\\Octane\\Listeners\\PrepareSocialiteForNextOperation',
      ),
      'Laravel\\Octane\\Events\\TaskTerminated' => 
      array (
      ),
      'Laravel\\Octane\\Events\\TickReceived' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\CreateConfigurationSandbox',
        1 => 'Laravel\\Octane\\Listeners\\CreateUrlGeneratorSandbox',
        2 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToAuthorizationGate',
        3 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToBroadcastManager',
        4 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseManager',
        5 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToDatabaseSessionHandler',
        6 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToFilesystemManager',
        7 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToHttpKernel',
        8 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToLogManager',
        9 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToMailManager',
        10 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToNotificationChannelManager',
        11 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToPipelineHub',
        12 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToCacheManager',
        13 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToSessionManager',
        14 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToQueueManager',
        15 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToRouter',
        16 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToValidationFactory',
        17 => 'Laravel\\Octane\\Listeners\\GiveNewApplicationInstanceToViewFactory',
        18 => 'Laravel\\Octane\\Listeners\\FlushDatabaseRecordModificationState',
        19 => 'Laravel\\Octane\\Listeners\\FlushDatabaseQueryLog',
        20 => 'Laravel\\Octane\\Listeners\\RefreshQueryDurationHandling',
        21 => 'Laravel\\Octane\\Listeners\\FlushArrayCache',
        22 => 'Laravel\\Octane\\Listeners\\FlushLogContext',
        23 => 'Laravel\\Octane\\Listeners\\FlushMonologState',
        24 => 'Laravel\\Octane\\Listeners\\FlushStrCache',
        25 => 'Laravel\\Octane\\Listeners\\FlushTranslatorCache',
        26 => 'Laravel\\Octane\\Listeners\\FlushVite',
        27 => 'Laravel\\Octane\\Listeners\\PrepareInertiaForNextOperation',
        28 => 'Laravel\\Octane\\Listeners\\PrepareLivewireForNextOperation',
        29 => 'Laravel\\Octane\\Listeners\\PrepareScoutForNextOperation',
        30 => 'Laravel\\Octane\\Listeners\\PrepareSocialiteForNextOperation',
      ),
      'Laravel\\Octane\\Events\\TickTerminated' => 
      array (
      ),
      'Laravel\\Octane\\Contracts\\OperationTerminated' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\FlushOnce',
        1 => 'Laravel\\Octane\\Listeners\\FlushTemporaryContainerInstances',
        2 => 'Laravel\\Octane\\Listeners\\DisconnectFromDatabases',
        3 => 'Laravel\\Octane\\Listeners\\CollectGarbage',
      ),
      'Laravel\\Octane\\Events\\WorkerErrorOccurred' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\ReportException',
        1 => 'Laravel\\Octane\\Listeners\\StopWorkerIfNecessary',
      ),
      'Laravel\\Octane\\Events\\WorkerStopping' => 
      array (
        0 => 'Laravel\\Octane\\Listeners\\CloseMonologHandlers',
      ),
    ),
    'warm' => 
    array (
      0 => 'auth',
      1 => 'cache',
      2 => 'cache.store',
      3 => 'config',
      4 => 'cookie',
      5 => 'db',
      6 => 'db.factory',
      7 => 'db.transactions',
      8 => 'encrypter',
      9 => 'files',
      10 => 'hash',
      11 => 'log',
      12 => 'router',
      13 => 'routes',
      14 => 'session',
      15 => 'session.store',
      16 => 'translator',
      17 => 'url',
      18 => 'view',
    ),
    'flush' => 
    array (
      0 => 'App\\Actions\\Localizer',
    ),
    'tables' => 
    array (
    ),
    'cache' => 
    array (
      'rows' => 1000,
      'bytes' => 10000,
    ),
    'watch' => 
    array (
      0 => 'app',
      1 => 'bootstrap',
      2 => 'config/**/*.php',
      3 => 'database/**/*.php',
      4 => 'modules',
      5 => 'public/**/*.php',
      6 => 'resources/**/*.php',
      7 => 'routes',
      8 => 'composer.lock',
      9 => '.env',
    ),
    'garbage' => 50,
    'max_execution_time' => 30,
    'state_file' => '/var/www/khonor71-backend/storage/logs/octane-server-state.json',
    'roadrunner' => 
    array (
      'command' => 'vendor/bin/roadrunner-worker',
      'http_middleware' => 'static',
    ),
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'role_pivot_key' => NULL,
      'permission_pivot_key' => NULL,
      'model_morph_key' => 'model_id',
      'team_foreign_key' => 'team_id',
    ),
    'register_permission_check_method' => true,
    'register_octane_reset_listener' => false,
    'events_enabled' => false,
    'teams' => false,
    'team_resolver' => 'Spatie\\Permission\\DefaultTeamResolver',
    'use_passport_client_credentials' => false,
    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,
    'enable_wildcard_permission' => false,
    'cache' => 
    array (
      'expiration_time' => 
      \DateInterval::__set_state(array(
         'from_string' => true,
         'date_string' => '24 hours',
      )),
      'key' => 'spatie.permission.cache',
      'store' => 'default',
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
      'deferred' => 
      array (
        'driver' => 'deferred',
      ),
      'failover' => 
      array (
        'driver' => 'failover',
        'connections' => 
        array (
          0 => 'database',
          1 => 'deferred',
        ),
      ),
    ),
    'batching' => 
    array (
      'database' => 'mysql',
      'table' => 'job_batches',
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'sanctum' => 
  array (
    'stateful' => 
    array (
      0 => 'localhost',
      1 => 'localhost:3000',
      2 => '127.0.0.1',
      3 => '127.0.0.1:8000',
      4 => '::1',
      5 => '127.0.0.1:8000',
    ),
    'guard' => 
    array (
      0 => 'web',
    ),
    'expiration' => NULL,
    'token_prefix' => '',
    'middleware' => 
    array (
      'verify_csrf_token' => 'App\\Http\\Middleware\\VerifyCsrfToken',
      'encrypt_cookies' => 'App\\Http\\Middleware\\EncryptCookies',
    ),
  ),
  'seotools' => 
  array (
    'inertia' => false,
    'meta' => 
    array (
      'defaults' => 
      array (
        'title' => false,
        'titleBefore' => false,
        'description' => false,
        'separator' => ' - ',
        'keywords' => 
        array (
        ),
        'canonical' => false,
        'robots' => false,
      ),
      'webmaster_tags' => 
      array (
        'google' => NULL,
        'bing' => NULL,
        'alexa' => NULL,
        'pinterest' => NULL,
        'yandex' => NULL,
        'norton' => NULL,
      ),
      'add_notranslate_class' => false,
    ),
    'opengraph' => 
    array (
      'defaults' => 
      array (
        'title' => false,
        'description' => false,
        'url' => false,
        'type' => false,
        'site_name' => 'Khobor71',
        'images' => 
        array (
        ),
      ),
    ),
    'twitter' => 
    array (
      'defaults' => 
      array (
      ),
    ),
    'json-ld' => 
    array (
      'defaults' => 
      array (
        'title' => false,
        'description' => false,
        'url' => false,
        'type' => 'WebPage',
        'images' => 
        array (
        ),
      ),
    ),
  ),
  'services' => 
  array (
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'resend' => 
    array (
      'key' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
    'slack' => 
    array (
      'notifications' => 
      array (
        'bot_user_oauth_token' => NULL,
        'channel' => NULL,
      ),
    ),
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
      'scheme' => 'https',
    ),
    'google' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
    ),
    'facebook' => 
    array (
      'client_id' => NULL,
      'client_secret' => NULL,
      'redirect' => NULL,
    ),
    'youtube' => 
    array (
      'api_key' => NULL,
      'playlist_id' => NULL,
    ),
    'ffmpeg' => 
    array (
      'path' => '/usr/local/bin/ffmpeg',
      'ffprobe_path' => '/usr/local/bin/ffprobe',
    ),
    'sentry' => 
    array (
      'dsn' => 'YOUR_SENTRY_DSN_HERE',
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/var/www/khonor71-backend/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'khobor71_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => 'lax',
    'partitioned' => false,
  ),
  'sweetalert' => 
  array (
    'default' => 'alert',
    'cdn' => NULL,
    'always_load_js' => false,
    'never_load_js' => false,
    'timer' => 5000,
    'width' => '32rem',
    'padding' => '1.25rem',
    'background' => '#fff',
    'show_confirm_button' => false,
    'show_close_button' => false,
    'button_text' => 
    array (
      'confirm' => 'OK',
      'cancel' => 'Cancel',
    ),
    'toast' => 
    array (
      'position' => 'top-end',
      'auto_close' => 5000,
      'show_close_button' => true,
      'show_confirm_button' => false,
      'timer_progress_bar' => true,
    ),
    'middleware' => 
    array (
      'autoClose' => false,
      'toast_position' => 'top-end',
      'toast_close_button' => true,
      'timer' => 6000,
      'auto_display_error_messages' => true,
    ),
    'confirm' => 
    array (
      'auto' => true,
      'icon' => 'question',
      'title' => 'Are you sure?',
      'text' => '',
      'confirm_button_text' => 'Yes',
      'confirm_button_color' => '#3085d6',
      'cancel_button_text' => 'Cancel',
      'show_cancel_button' => true,
      'show_close_button' => false,
    ),
    'confirm_delete' => 
    array (
      'icon' => 'warning',
      'title' => 'Are you sure?',
      'text' => 'This cannot be undone.',
      'confirm_button_text' => 'Yes, delete it!',
      'confirm_button_color' => '#d33',
      'cancel_button_text' => 'Cancel',
      'show_close_button' => false,
      'show_cancel_button' => true,
      'show_loader_on_confirm' => true,
    ),
    'animation' => 
    array (
      'enable' => false,
    ),
    'theme' => 'default',
    'presets' => 
    array (
    ),
    'js' => 
    array (
      'source' => 'cdn',
      'version' => '11',
      'cdn_provider' => 'jsdelivr',
      'custom_cdn_js' => NULL,
    ),
    'alwaysLoadJS' => false,
    'neverLoadJS' => false,
    'height_auto' => true,
    'animatecss' => 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css',
    'toast_position' => 'top-end',
    'timer_progress_bar' => false,
    'customClass' => 
    array (
      'container' => NULL,
      'popup' => NULL,
      'header' => NULL,
      'title' => NULL,
      'closeButton' => NULL,
      'icon' => NULL,
      'image' => NULL,
      'content' => NULL,
      'input' => NULL,
      'actions' => NULL,
      'confirmButton' => NULL,
      'cancelButton' => NULL,
      'footer' => NULL,
    ),
    'confirm_delete_confirm_button_text' => 'Yes, delete it!',
    'confirm_delete_confirm_button_color' => NULL,
    'confirm_delete_cancel_button_color' => '#d33',
    'confirm_delete_cancel_button_text' => 'Cancel',
    'confirm_delete_show_cancel_button' => true,
    'confirm_delete_show_close_button' => false,
    'confirm_delete_icon' => 'warning',
    'confirm_delete_show_loader_on_confirm' => true,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
    'trust_project' => 'always',
  ),
  'toastr' => 
  array (
    'options' => 
    array (
      'closeButton' => false,
      'debug' => false,
      'newestOnTop' => false,
      'progressBar' => false,
      'positionClass' => 'toast-top-right',
      'preventDuplicates' => false,
      'onclick' => NULL,
      'showDuration' => '300',
      'hideDuration' => '1000',
      'timeOut' => '5000',
      'extendedTimeOut' => '1000',
      'showEasing' => 'swing',
      'hideEasing' => 'linear',
      'showMethod' => 'fadeIn',
      'hideMethod' => 'fadeOut',
    ),
  ),
  'user-activity' => 
  array (
    'activated' => true,
    'middleware' => 
    array (
      0 => 'web',
      1 => 'auth',
    ),
    'route_path' => 'admin/user-activity',
    'admin_panel_path' => 'admin/dashboard',
    'delete_limit' => 7,
    'model' => 
    array (
      'user' => 'App\\Models\\User',
    ),
    'log_events' => 
    array (
      'on_create' => false,
      'on_edit' => true,
      'on_delete' => true,
      'on_login' => true,
      'on_lockout' => true,
    ),
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/var/www/khonor71-backend/resources/views',
    ),
    'compiled' => '/var/www/khonor71-backend/storage/framework/views',
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'livewire' => 
  array (
    'component_locations' => 
    array (
      0 => '/var/www/khonor71-backend/resources/views/components',
      1 => '/var/www/khonor71-backend/resources/views/livewire',
    ),
    'component_namespaces' => 
    array (
      'layouts' => '/var/www/khonor71-backend/resources/views/layouts',
      'pages' => '/var/www/khonor71-backend/resources/views/pages',
    ),
    'component_layout' => 'layouts::app',
    'component_placeholder' => NULL,
    'make_command' => 
    array (
      'type' => 'sfc',
      'emoji' => true,
      'with' => 
      array (
        'js' => false,
        'css' => false,
        'test' => false,
      ),
    ),
    'class_namespace' => 'App\\Livewire',
    'class_path' => '/var/www/khonor71-backend/app/Livewire',
    'view_path' => '/var/www/khonor71-backend/resources/views/livewire',
    'temporary_file_upload' => 
    array (
      'disk' => NULL,
      'rules' => NULL,
      'directory' => NULL,
      'middleware' => NULL,
      'preview_mimes' => 
      array (
        0 => 'png',
        1 => 'gif',
        2 => 'bmp',
        3 => 'svg',
        4 => 'wav',
        5 => 'mp4',
        6 => 'mov',
        7 => 'avi',
        8 => 'wmv',
        9 => 'mp3',
        10 => 'm4a',
        11 => 'jpg',
        12 => 'jpeg',
        13 => 'mpga',
        14 => 'webp',
        15 => 'wma',
      ),
      'max_upload_time' => 5,
      'cleanup' => true,
    ),
    'render_on_redirect' => false,
    'legacy_model_binding' => false,
    'inject_assets' => true,
    'navigate' => 
    array (
      'show_progress_bar' => true,
      'progress_bar_color' => '#2299dd',
    ),
    'inject_morph_markers' => true,
    'smart_wire_keys' => true,
    'pagination_theme' => 'tailwind',
    'release_token' => 'a',
    'csp_safe' => false,
    'payload' => 
    array (
      'max_size' => 1048576,
      'max_nesting_depth' => 10,
      'max_calls' => 50,
      'max_components' => 200,
    ),
  ),
  'sentry' => 
  array (
    'dsn' => 'YOUR_SENTRY_DSN_HERE',
    'release' => NULL,
    'environment' => NULL,
    'org_id' => NULL,
    'sample_rate' => 1.0,
    'traces_sample_rate' => NULL,
    'profiles_sample_rate' => NULL,
    'strict_trace_continuation' => false,
    'enable_logs' => false,
    'enable_metrics' => true,
    'log_flush_threshold' => NULL,
    'logs_channel_level' => 'debug',
    'send_default_pii' => false,
    'ignore_transactions' => 
    array (
      0 => '/up',
    ),
    'breadcrumbs' => 
    array (
      'logs' => true,
      'cache' => true,
      'livewire' => true,
      'sql_queries' => true,
      'sql_bindings' => false,
      'queue_info' => true,
      'command_info' => true,
      'http_client_requests' => true,
      'notifications' => true,
    ),
    'tracing' => 
    array (
      'queue_job_transactions' => true,
      'queue_jobs' => true,
      'sql_queries' => true,
      'sql_bindings' => false,
      'sql_origin' => true,
      'sql_origin_threshold_ms' => 100,
      'views' => true,
      'livewire' => true,
      'http_client_requests' => true,
      'cache' => true,
      'redis_commands' => false,
      'redis_origin' => true,
      'notifications' => true,
      'missing_routes' => false,
      'continue_after_response' => true,
      'gen_ai' => true,
      'gen_ai_invoke_agent' => true,
      'gen_ai_chat' => true,
      'gen_ai_execute_tool' => true,
      'gen_ai_embeddings' => true,
      'default_integrations' => true,
    ),
  ),
  'activitylog' => 
  array (
    'enabled' => true,
    'delete_records_older_than_days' => 365,
    'default_log_name' => 'default',
    'default_auth_driver' => NULL,
    'subject_returns_soft_deleted_models' => false,
    'activity_model' => 'Spatie\\Activitylog\\Models\\Activity',
    'table_name' => 'activity_log',
    'database_connection' => NULL,
  ),
  'datatables-html' => 
  array (
    'namespace' => 'LaravelDataTables',
    'table' => 
    array (
      'class' => 'table',
      'id' => 'dataTableBuilder',
    ),
    'script' => 'datatables::script',
    'editor' => 'datatables::editor',
  ),
  'datatables-export' => 
  array (
    'method' => 'lazy',
    'chunk' => 1000,
    'disk' => 'local',
    's3_disk' => '',
    'mail_from' => '',
    'default_date_format' => 'yyyy-mm-dd',
    'date_formats' => 
    array (
      0 => 'mm/dd/yyyy',
      1 => 'yyyy-mm-dd',
      2 => 'dd/mm/yyyy',
      3 => 'd/m/yy',
      4 => 'd-m-yy',
      5 => 'd-m',
      6 => 'm-yy',
      7 => 'mm-dd-yy',
      8 => 'd-mmm-yy',
      9 => 'd-mmm',
      10 => 'mmm-yy',
      11 => 'm/d/yy h:mm',
      12 => 'd/m/yy h:mm',
      13 => 'h:mm AM/PM',
      14 => 'h:mm:ss AM/PM',
      15 => 'h:mm',
      16 => 'h:mm:ss',
      17 => 'mm:ss',
      18 => 'h:mm:ss',
      19 => 'i:s.S',
      20 => 'h:mm:ss;@',
      21 => 'yyyy/mm/dd;@',
      22 => 'm/d/yy h:mm',
      23 => 'd/m/yy h:mm',
      24 => 'h:mm AM/PM',
      25 => 'h:mm:ss AM/PM',
      26 => 'h:mm',
      27 => 'h:mm:ss',
      28 => 'mm:ss',
      29 => 'h:mm:ss',
      30 => 'i:s.S',
      31 => 'h:mm:ss;@',
    ),
    'text_formats' => 
    array (
      0 => '@',
      1 => 'General',
    ),
    'purge' => 
    array (
      'days' => 1,
    ),
  ),
  'advertisement' => 
  array (
    'name' => 'Advertisement',
  ),
  'archive' => 
  array (
    'name' => 'Archive',
  ),
  'autopost' => 
  array (
    'name' => 'AutoPost',
  ),
  'category' => 
  array (
    'name' => 'Category',
  ),
  'menu' => 
  array (
    'name' => 'Menu',
  ),
  'news' => 
  array (
    'name' => 'News',
  ),
  'opinion' => 
  array (
    'name' => 'Opinion',
  ),
  'page' => 
  array (
    'name' => 'Page',
  ),
  'poll' => 
  array (
    'name' => 'Poll',
  ),
  'probashijanala' => 
  array (
    'name' => 'ProbashiJanala',
  ),
  'reporter' => 
  array (
    'name' => 'Reporter',
  ),
  'rssfeeds' => 
  array (
    'name' => 'RssFeeds',
  ),
  'seo' => 
  array (
    'name' => 'Seo',
  ),
  'setting' => 
  array (
    'name' => 'Setting',
  ),
  'story' => 
  array (
    'name' => 'Story',
  ),
  'theme' => 
  array (
    'name' => 'Theme',
  ),
  'usermanagement' => 
  array (
    'name' => 'UserManagement',
  ),
  'videonews' => 
  array (
    'name' => 'VideoNews',
  ),
  'datatables-fractal' => 
  array (
    'includes' => 'include',
    'serializer' => 'League\\Fractal\\Serializer\\DataArraySerializer',
  ),
  'html-forms' => 
  array (
    'ignore_empty_attributes' => 
    array (
      'all' => 
      array (
        0 => 'disabled',
        1 => 'checked',
      ),
      'option' => 
      array (
        0 => 'value',
      ),
      'password' => 
      array (
        0 => 'value',
      ),
      'placeholder' => 
      array (
        0 => 'value',
      ),
    ),
    'ignore_all_empty_attributes' => false,
    'allowed_boolean_values' => 
    array (
      0 => 'radio',
      1 => 'checkbox',
      2 => 'hidden',
      3 => 'option',
    ),
    'default_attributes' => 
    array (
      'all' => 
      array (
        'class' => 
        array (
        ),
      ),
      'text' => 
      array (
      ),
      'password' => 
      array (
      ),
      'range' => 
      array (
      ),
      'hidden' => 
      array (
      ),
      'search' => 
      array (
      ),
      'email' => 
      array (
      ),
      'tel' => 
      array (
      ),
      'number' => 
      array (
      ),
      'date' => 
      array (
      ),
      'datetime' => 
      array (
      ),
      'datetime-local' => 
      array (
      ),
      'time' => 
      array (
      ),
      'url' => 
      array (
      ),
      'week' => 
      array (
      ),
      'file' => 
      array (
      ),
      'textarea' => 
      array (
      ),
      'select' => 
      array (
      ),
      'optionGroup' => 
      array (
      ),
      'option' => 
      array (
      ),
      'placeholder' => 
      array (
      ),
      'checkbox' => 
      array (
      ),
      'radio' => 
      array (
      ),
      'reset' => 
      array (
      ),
      'image' => 
      array (
      ),
      'month' => 
      array (
      ),
      'color' => 
      array (
      ),
      'submit' => 
      array (
      ),
      'button' => 
      array (
      ),
    ),
  ),
);
