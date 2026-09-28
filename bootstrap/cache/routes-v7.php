<?php

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/_debugbar/open' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.openhandler',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/cache' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.cache.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/queries/explain' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.queries.explain',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire-17995f36/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'default-livewire.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire-17995f36/livewire.js' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xjo6vaNiDBYCEXGc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire-17995f36/livewire.min.js.map' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hqdIR8iDR2kWzQtg',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire-17995f36/livewire.csp.min.js.map' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gTHnQMRHobmRDVCB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire-17995f36/upload-file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.upload-file',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/advertisement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IY1fdYd8FBgbQfeH',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/advertise/view_ads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertise.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/advertise/show' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertise.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/advertise/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertise.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/advertise/get-page-positions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertise.get.page.positions',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/archive' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::L0vz9ZGUhod0ZbVQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/archive/maximum_archive_settings_view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'archive.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/archive/show' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'archive.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/archive/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'archive.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/archive/save-max-archive-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'archive.save_max_archive_settings',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/autopost' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8m1s19pEurqYA2L5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/autopost/posting-media' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'autopost.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/autopost/posting-media/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'autopost.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::po3DradCobHPgjeV',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/category/list_of_categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/category/show' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/category/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/category/category-status-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.status.check',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/category/parent-menu-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.menu.check',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/localize/language-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.localize.languagelist',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/localize' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.localize.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/localize/language-string-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.localize.languagestringlist',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/localize/store-lang-string' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.localize.storelanstring',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/localize/store/langstring/value' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.localize.lanstrvaluestore',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/language/language-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.language.languagelist',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/language' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.language.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/language/language-string-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.language.languagestringlist',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/language/store-lang-string' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.language.storelanstring',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/language/store/langstring/value' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.language.lanstrvaluestore',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/language/language/import' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.language.import',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/menu' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BYgnR3PlXpcwvWL7',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/menu' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hA5ukQL5tb6wlpWr',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/news/position' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.position.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/news/position/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.position.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/news/breaking-news/toggle-ticker' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.breaking-news.toggle-ticker',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/news/breaking-news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.breaking-news.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'news.breaking-news.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/news/post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.post.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'news.post.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/news/post/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.post.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/ai/ai_settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ai.ai_settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/ai/settings/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ai.settings.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/news/store-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.storeReport',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'news.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/news/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/admin/ai/generate' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.ai.generate',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bulk/post/upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bulk.post.upload.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bulk.post.upload.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/bulk/post/upload/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bulk.post.upload.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/opinion' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RyNBAtBYnES9gfjz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/opinion/opinion-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'opinion.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/opinion/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'opinion.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/opinion/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'opinion.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Un84gJsYl2VOXkt0',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/page/pages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'page.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/page/create-new-page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'page.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/page/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'page.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/page/page/ckeditor_upload' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'page.ckeditor_upload',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/poll' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ofm5P56m16OpIsLg',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/poll/poll-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'poll.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/poll/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'poll.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/poll/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'poll.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/probashijanala' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MtjIjhHJ9JYNYthK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/probashijanala' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::A4w5bfDN4YUPqNMa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/probashijanala/probashijanala-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'probashijanala.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/probashijanala/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'probashijanala.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/probashijanala/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'probashijanala.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/reporter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DZKrdlsckMmHwN0I',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reporter/reporter-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reporter.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reporter/show' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reporter.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reporter/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reporter.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reporter/last-20-access' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reporter.last_20_access',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/rssfeeds' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rt1ukeWursr1Z7PI',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rss_feeds/rss-links' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rss_feeds.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rss_feeds/external-rss-feeds' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rss_feeds.show',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rss_feeds/create-external-rss-feeds' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rss_feeds.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/rss_feeds/store-external-rss-feeds' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rss_feeds.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/seo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::whBs8lwLX2FP2g6n',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/seo/meta-setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'seo.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/seo/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'seo.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/seo/social-sites' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'seo.social_sites',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/seo/social-site-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'seo.social_site_store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/seo/social-link' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'seo.social_link',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/seo/social-link-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'seo.social_link_store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/seo/sitemap-links' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'seo.sitemap_links',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/seo/script-manager' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'seo.script_manager',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/seo/script-manager-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'seo.script_manager_store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AZCAgaWLqEB4DPob',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/applications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'applications.application',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/apps' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'app.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'app.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/currencies' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'currencies.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'currencies.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/currencies/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'currencies.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/mails' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mails.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mails.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/mails/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mails.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/countries' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'countries.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'countries.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/countries/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'countries.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/social-api-keys' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'social_api_keys.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'social_api_keys.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/social-api-keys/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'social_api_keys.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/space-credential' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'space-credential.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'space-credential.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/space-credential/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'space-credential.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/database-backup-reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backup.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/database-backup-reset/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backup.create',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/database-backup-reset/download' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backup.download',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/database-backup-reset/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backup.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/database-backup-reset/delete-all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backup.delete.all',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/database-backup-reset/factory-reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backup.factory_reset',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/database-backup-reset/database-import' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backup.database_import',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/database-backup-reset/database-import-by-name' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backup.database_import_by_name',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/database-backup-reset/password-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backup.password_check',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/database-backup-reset/demo/restore' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'backup.demo.restore.ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/sale-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sale.setting.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/store-sale-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sale.setting.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/tax-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sale.setting.tax',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/get-tax-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sale.setting.tax.get',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/get-tax-settings-for-group' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sale.setting.tax.for.group',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/save-tax-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sale.setting.tax.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/store-tax-group' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sale.tax.group.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/delete-tax-group' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sale.tax.group.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/get-tax-group-by-id' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sale.tax.group.get',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/product-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product.setting.product',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/product-settings-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'product.setting.product.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/purchase-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'purchase.setting.purchase',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/purchase-settings-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'purchase.setting.purchase.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/invoice-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.setting.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/invoice-settings-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.setting.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/pos-invoice-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pos_invoice.setting.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/pos-invoice-settings-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pos_invoice.setting.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/apimenuszkt/zkt/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'zktSetup.add',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/apimenuszkt/zkt/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'zktSetup.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/apimenuszkt/zkt/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'zktSetup.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/docexpired-setup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'docexpired-setup.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'docexpired-setup.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/setting/subscriber-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscriber.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/web-setup/setup-top-breaking' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'view_setup.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/web-setup/top-breaking/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'view_setup.top_breaking_store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/web-setup/contact-page-setup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'view_setup.contact_page_setup',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/web-setup/contact-page-setup/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'view_setup.contact_page_setup_store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/web-setup/home-page-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'view_setup.home_page_setup',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/web-setup/save_home_page_settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'view_setup.save_home_page_settings',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/web-setup/home-page-setup/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'view_setup.home_page_setup_store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/access-log' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activity_log',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/multiple-activity-log-destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'multiple_delete_activity_log',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cookie-content' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cookie.content',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/cookie-content/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'cookie.content.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/comments/comments_manage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'comments.comments_manage',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/subscription/subscription_manage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscription.subscription_manage',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/font/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.font.settings.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.font.settings.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/font/settings/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.font.settings.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/font/site/setup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.font.site.setup.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.font.site.setup.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/font/site/setup/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.font.site.setup.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/story' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Voox1WF4pSvvvGzr',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/story' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.story.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.story.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/story/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.story.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/theme' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5CZLIuHPFB6Ajas5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/theme' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.theme.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.theme.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/theme/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.theme.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/theme/{}' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.theme.show',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.theme.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'admin.theme.destroy',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/theme/{}/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.theme.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/theme/update-active' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'themes.updateActive',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/theme/update-colors' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'themes.updateColors',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/theme/settings/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'themes.reset',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/usermanagement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZE93sB3BLXH0Dn1N',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-types' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-types.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user-types.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-types/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-types.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/password-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password-settings.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password-settings.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/password-settings/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password-settings.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-user-by-ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-profile-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-change-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.changePassword',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/role-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/role-add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.add',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/role-view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.view',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/role-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/role-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/role-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/menu-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.menu.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/menu-add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.menu.add',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/menu-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.menu.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/menu-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.menu.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permission-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.permission.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permission-add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.permission.add',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permission-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.permission.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permission-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.permission.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.user.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.user.add',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.user.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.user.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/videonews' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2A5IdwX1dUz9K6qk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/videonews' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YFKkKttqN7BRFsyX',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/videonews/videonews-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'videonews.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/videonews/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'videonews.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/videonews/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'videonews.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Sj9OE7oPEIG3Guj4',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2aPjqF6pjZa8LaLQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/category-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pGF7V1uqSmj0w9Dg',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/sidebar-categories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zSrd9h0eMvT7vk0w',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/home-page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::o1TCTri022M2kQpb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/latest-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RoeCaoQLLC9nsRrd',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/populer-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oqGurcwYiRHr5IPM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/web-setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::My1CDKW6YNGd9trD',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/page-link' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WFgzOPaXw1Fx4T6q',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/contact-us' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zB0wKjIOaG5UjNPO',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/trending-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::slGysoesFOlXNkpB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/archive-posts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::w30Kw8jNFHgWX8Us',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/teams' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zxTA4WQNwxEq0T7O',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5o0C2WrIiDLmY4gf',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/social-link' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Fhhz0FXwFJecGGSc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/divisions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GWOFBdSYVJCqV8CP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/search-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::agddOe0jgXR4g4Qb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/photo-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IEoUI8SLhyNXf08O',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/photo-home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BFbUE8E3m6lzm0CJ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/xml-category-all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tDLBnHPp4Reoxl6v',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/xml-category-post' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fH5MQjBs34x702dg',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/metadata' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mwndN9HKhf7Miwr5',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/update/guides' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update.guides',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/latest/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GFPinHVMOuGM8Cwz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dev/artisan-http/storage-link' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MF1YoeSVCKgknkm3',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8Vd0m4BVYNXK8Num',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Np68XMXbfugJlb50',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::k87WGDlZi2BvtiVH',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/password/confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IVE2PwPUK4hnFUCM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/get-localization-strings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-localization-strings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gceHsxd5pT3fxfLW',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/dashboard/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staffHome',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/dashboard/employee' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'myProfile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/dashboard/employee/edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'editMyProfile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/dashboard/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'empProfile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/photo-library/view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'photo-library.view',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/photo-library' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'photo-library.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'photo-library.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/photo-library/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'photo-library.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/all-clear' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'all_clear',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/insert-language' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pPzAVvQhLNignlXS',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/insert-language-value' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Yw7ko9qSBRYYm7M8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/test1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XRIeCk54XbSskZKp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sitemap_index.xml' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sitemap.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sitemap_pages.xml' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sitemap.pages',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sitemap_categories.xml' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sitemap.categories',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sitemap_news.xml' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sitemap.news',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sitemap_videos.xml' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sitemap.videos',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sitemap_opinions.xml' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sitemap.opinions',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sitemap_probashi.xml' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sitemap.probashi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/probashi-janala-news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.probashi-janala-news',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/registration' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7Z5goWDyJR94k3RV',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/account/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account.setting',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/account/probashi-news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account.probashi.news',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/account/probashi-news/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account.probashi.news.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/account/settings/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account.setting.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/account/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account.setting.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/news/comments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.news.comments.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/news/comment-reply' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.news.reply.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/connect-with-google' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'connect-with-google',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/google/callback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'google-callback',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/connect-with-facebook' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'connect-with-facebook',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/facebook/callback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'facebook-callback',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/registration/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'webuser.registration',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'webuser.login',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web/user/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'webuser.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ajax/section-four-news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ajax.section-four-news',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ajax/section-five-first-news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ajax.section-five-first-news',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ajax/section-five-second-news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ajax.section-five-second-news',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ajax/section-five-third-news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ajax.section-five-third-news',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ajax/section-five-fourth-news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ajax.section-five-fourth-news',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/load-more-category-news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'load.more.category.news',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/load-more-probashi-news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'load.more.probashi.news',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ajax/vote' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ajax.poll.vote',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/load-more-video-news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'load.more.video.news',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/subscribe' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'subscribe.ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/rss.xml' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'google.news.rss',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/archive' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.archive.news',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/404-page-not-found' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.error-page',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/web-stories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.story-details.news',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/probashi-news-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.probashi-news',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/district-news-filter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.district.filter',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot/password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web.forgot.password',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web.password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/webuser/reset-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'webuser.password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/xmlrpc.php' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ASC5v4xGrjspTynQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/_debugbar/clockwork/([^/]++)(*:36)|/livewire\\-17995f36/(?|preview\\-file/([^/]++)(*:88)|js/([^/\\.]++)\\.js(*:112)|css/([^/\\.]++)\\.(?|css(*:142)|global\\.css(*:161)))|/a(?|dmin/(?|a(?|dvertise/(?|edit/([^/]++)(*:213)|update/([^/]++)(*:236)|delete/([^/]++)(*:259)|ad/update_(?|lg_status/([^/]++)(*:298)|sm_status/([^/]++)(*:324)))|rchive/(?|archive\\-newses\\-by\\-category/([^/]++)(*:382)|delete/([^/]++)(*:405))|pplications/([^/]++)(*:434)|ctivity\\-log\\-destroy/([^/]++)(*:472))|c(?|ategory/(?|edit/([^/]++)(*:509)|update/([^/]++)(*:532)|delete/([^/]++)(*:555)|save\\-category\\-img\\-status/([^/]++)(*:599))|urrencies/([^/]++)(?|(*:629)|/edit(*:642)|(*:650))|o(?|untries/([^/]++)(?|(*:682)|/edit(*:695)|(*:703))|mments/(?|comments_manage/update/([^/]++)(*:753)|destroy/([^/]++)(*:777)|reply/(?|update/([^/]++)(*:809)|destroy/([^/]++)(*:833)))))|l(?|ocalize/language(?|/string\\-list/value/([^/]++)(*:896)|\\-(?|string\\-list/([^/]++)(*:930)|list/([^/]++)(*:951)))|anguage/lang(?|uage(?|/(?|string\\-list/value/([^/]++)(*:1014)|export/([^/]++)(*:1038))|\\-(?|string\\-list/([^/]++)(*:1074)|list(?|/([^/]++)(*:1099)|\\-update/([^/]++)(*:1125))))|/getAllData/([^/]++)(*:1157)))|m(?|enu(?|/(?|setup/([^/]++)(?|(*:1199)|/(?|edit/([^/]++)(*:1225)|update(?|/([^/]++)(*:1252)|\\-position(*:1271))|destroy/([^/]++)(*:1297)|store\\-(?|category\\-menu\\-content(*:1339)|page\\-menu\\-content(*:1367)|link(?|\\-menu\\-content(*:1398)|(*:1407))|archive\\-menu\\-content(*:1439))))|([^/]++)/update\\-status(*:1474)|setup/language(*:1497))|\\-(?|edit/([^/]++)(*:1525)|update/([^/]++)(*:1549)))|ails/([^/]++)(?|(*:1576)|/edit(*:1590)|(*:1599)))|news/(?|pos(?|ition/([^/]++)/destroy(*:1646)|t/([^/]++)(?|/edit(*:1673)|(*:1682)))|breaking\\-news/([^/]++)(?|/(?|edit(*:1727)|status(*:1742))|(*:1752))|([^/]++)(?|/(?|update\\-status(*:1791)|edit(*:1804))|(*:1814))|sub\\-category/([^/]++)(*:1846)|category\\-by\\-language/([^/]++)(*:1886)|districts\\-by\\-division/([^/]++)(*:1927)|([^/]++)/social\\-post(*:1957))|bulk/post/upload/([^/]++)(?|(*:1995)|/edit(*:2009)|(*:2018))|opinion/(?|edit/([^/]++)(*:2052)|update/([^/]++)(*:2076)|delete/([^/]++)(*:2100)|opinion\\-status\\-update/([^/]++)(*:2141))|p(?|a(?|ge/(?|edit/([^/]++)(*:2178)|update/([^/]++)(*:2202)|page/update\\-page\\-status/([^/]++)(*:2245)|delete/([^/]++)(*:2269))|ssword(?|\\-settings/([^/]++)(?|(*:2310)|/edit(*:2324)|(*:2333))|/reset/([^/]++)(*:2358)))|oll/(?|edit/([^/]++)(*:2389)|update/([^/]++)(*:2413)|delete/([^/]++)(*:2437)|poll\\-status\\-update/([^/]++)(*:2475)|result/([^/]++)(*:2499))|robashijanala/(?|edit/([^/]++)(*:2539)|update/([^/]++)(*:2563)|delete/([^/]++)(*:2587)|probashijanala\\-status\\-update/([^/]++)(*:2635)|([^/]++)/delete\\-(?|video(*:2669)|image(*:2683)))|ermission\\-(?|edit/([^/]++)(*:2721)|update/([^/]++)(*:2745))|hoto\\-library/([^/]++)(*:2777))|r(?|eporter/(?|report(?|/([^/]++)(*:2820)|er\\-status\\-edit/([^/]++)(*:2854))|edit/([^/]++)(*:2877)|update/([^/]++)(*:2901)|delete/([^/]++)(*:2925))|ss_feeds/(?|e(?|dit\\-external\\-rss\\-feeds/([^/]++)(*:2985)|xternal\\-rss\\-status\\-update/([^/]++)(*:3031))|update\\-external\\-rss\\-feeds/([^/]++)(*:3078)|delete\\-external\\-rss\\-feeds/([^/]++)(*:3124))|ole\\-edit/([^/]++)(*:3152))|s(?|ocial\\-api\\-keys/([^/]++)(?|(*:3194)|/edit(*:3208)|(*:3217))|pace\\-credential/([^/]++)(?|/(?|update\\-status(*:3273)|edit(*:3286))|(*:3296))|etting/apimenuszkt/zkt/(?|edit/([^/]++)(*:3345)|update/([^/]++)(*:3369)|destroy/([^/]++)(*:3394))|tory/([^/]++)(?|(*:3420)|/edit(*:3434)|(*:3443)))|font/s(?|ettings/([^/]++)(?|(*:3482)|/edit(*:3496)|(*:3505))|ite/setup/([^/]++)(?|(*:3536)|/edit(*:3550)|(*:3559)))|user\\-(?|types/([^/]++)(?|(*:3596)|/edit(*:3610)|(*:3619))|profile\\-(?|image\\-update/([^/]++)(*:3663)|cover\\-image\\-update/([^/]++)(*:3701))|edit/([^/]++)(*:3724)|update/([^/]++)(*:3748))|videonews/(?|edit/([^/]++)(*:3784)|update/([^/]++)(*:3808)|delete/([^/]++)(*:3832)|videonews\\-status\\-update/([^/]++)(*:3875)|([^/]++)/delete\\-(?|video(*:3909)|image(*:3923))))|pi/(?|p(?|ost\\-detail/([^/]++)(*:3965)|age\\-data/([^/]++)(*:3992))|category\\-post/([^/]++)(*:4025)|t(?|opic(?|s\\-post/([^/]++)(*:4061)|\\-posts/([^/]++)(*:4086))|ag\\-posts/([^/]++)(*:4114))|districts/([^/]++)(*:4142)|upazilas/([^/]++)(*:4168)))|/sitemap_posts_([^/\\.]++)\\.xml(*:4209)|/([^/]++)/(?|registration(?|(*:4246)|/store(*:4261))|account/settings(*:4287)|web/user/logout(*:4311))|/ajax/vote/result/([^/]++)(*:4347)|/mode/change/([^/]++)(*:4377)|/([a-zA-Z]{2})/(?|search(*:4410)|archive(*:4426))|/([^/]++)/(?|404\\-page\\-not\\-found(*:4470)|web\\-stories(*:4491))|/web\\-stories/([\\p{L}\\p{M}\\p{N}_\\-]+)(*:4538)|/([a-zA-Z]{2})/web\\-stories/(.*)(*:4579)|/probash\\-news\\-tv/([\\p{L}\\p{M}\\p{N}_\\-]+)(*:4630)|/([a-zA-Z]{2})/probash(?|\\-news\\-tv/([\\p{L}\\p{M}\\p{N}_\\-]+)(*:4698)|i\\-news\\-list(*:4720))|/district/([^/]++)(*:4748)|/([a-zA-Z]{2})/district/([^/]++)(*:4789)|/([\\p{L}\\p{M}\\p{N}_\\-]+)(*:4822)|/([a-zA-Z]{2})/(.*)(*:4850)|/webuser/reset\\-password/([^/]++)(*:4892)|/probashi\\-news(?|(*:4919)))/?$}sDu',
    ),
    3 => 
    array (
      36 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.clockwork',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      88 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.preview-file',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      112 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4sJMVLHLdGQpAQVJ',
          ),
          1 => 
          array (
            0 => 'component',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      142 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YwMQVWqhSlmkogbM',
          ),
          1 => 
          array (
            0 => 'component',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      161 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ITlqJpm6ErWYaBGf',
          ),
          1 => 
          array (
            0 => 'component',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      213 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertise.edit',
          ),
          1 => 
          array (
            0 => 'advertise',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      236 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertise.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      259 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertise.destroy',
          ),
          1 => 
          array (
            0 => 'advertise',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      298 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertise.update_lg_status',
          ),
          1 => 
          array (
            0 => 'advertise',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      324 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertise.update_sm_status',
          ),
          1 => 
          array (
            0 => 'advertise',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      382 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'archive.archive_newses_by_category',
          ),
          1 => 
          array (
            0 => 'cat_id_available',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      405 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'archive.destroy',
          ),
          1 => 
          array (
            0 => 'archive',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      434 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'applications.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      472 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'activity_log_destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      509 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.edit',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      532 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      555 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.destroy',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      599 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'category.save_category_img_status',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      629 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'currencies.show',
          ),
          1 => 
          array (
            0 => 'currency',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      642 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'currencies.edit',
          ),
          1 => 
          array (
            0 => 'currency',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      650 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'currencies.update',
          ),
          1 => 
          array (
            0 => 'currency',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'currencies.destroy',
          ),
          1 => 
          array (
            0 => 'currency',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      682 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'countries.show',
          ),
          1 => 
          array (
            0 => 'country',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      695 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'countries.edit',
          ),
          1 => 
          array (
            0 => 'country',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      703 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'countries.update',
          ),
          1 => 
          array (
            0 => 'country',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'countries.destroy',
          ),
          1 => 
          array (
            0 => 'country',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      753 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'comments.update',
          ),
          1 => 
          array (
            0 => 'com_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      777 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'comments.destroy',
          ),
          1 => 
          array (
            0 => 'comment',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      809 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'comments.reply.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      833 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'comments.reply.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      896 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.localize.languageStringValueindex',
          ),
          1 => 
          array (
            0 => 'localize',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      930 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.localize.stringDestroy',
          ),
          1 => 
          array (
            0 => 'localize',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      951 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.localize.langDestroy',
          ),
          1 => 
          array (
            0 => 'localize',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1014 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.language.languageStringValueindex',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1038 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.language.export',
          ),
          1 => 
          array (
            0 => 'locale',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1074 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.language.stringDestroy',
          ),
          1 => 
          array (
            0 => 'language',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1099 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.language.langDestroy',
          ),
          1 => 
          array (
            0 => 'language',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1125 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.language.langUpdate',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1157 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'setting.language.getAllData',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1199 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.setup.create',
          ),
          1 => 
          array (
            0 => 'menu',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1225 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.setup.edit',
          ),
          1 => 
          array (
            0 => 'menu',
            1 => 'menu_content',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1252 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.setup.update',
          ),
          1 => 
          array (
            0 => 'menu',
            1 => 'menu_content',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1271 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.setup.update-position',
          ),
          1 => 
          array (
            0 => 'menu',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1297 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.setup.destroy',
          ),
          1 => 
          array (
            0 => 'menu',
            1 => 'menu_content',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1339 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.setup.storeCategoryMenuContent',
          ),
          1 => 
          array (
            0 => 'menu',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1367 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.setup.storePageMenuContent',
          ),
          1 => 
          array (
            0 => 'menu',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1398 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.setup.storeLinkMenuContent',
          ),
          1 => 
          array (
            0 => 'menu',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1407 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.setup.storeLink',
          ),
          1 => 
          array (
            0 => 'menu',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1439 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.setup.storeArchiveMenuContent',
          ),
          1 => 
          array (
            0 => 'menu',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1474 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.update-status',
          ),
          1 => 
          array (
            0 => 'menu',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1497 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'menu.setup.language',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1525 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.menu.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1549 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.menu.update',
          ),
          1 => 
          array (
            0 => 'menupermission',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1576 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mails.show',
          ),
          1 => 
          array (
            0 => 'mail',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1590 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mails.edit',
          ),
          1 => 
          array (
            0 => 'mail',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1599 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mails.update',
          ),
          1 => 
          array (
            0 => 'mail',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mails.destroy',
          ),
          1 => 
          array (
            0 => 'mail',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1646 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.position.destroy',
          ),
          1 => 
          array (
            0 => 'news_position',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1673 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.post.edit',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1682 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.post.update',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'news.post.destroy',
          ),
          1 => 
          array (
            0 => 'post',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1727 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.breaking-news.edit',
          ),
          1 => 
          array (
            0 => 'breaking_news',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1742 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.breaking-news.update-status',
          ),
          1 => 
          array (
            0 => 'breaking_news',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1752 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.breaking-news.update',
          ),
          1 => 
          array (
            0 => 'breaking_news',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'news.breaking-news.destroy',
          ),
          1 => 
          array (
            0 => 'breaking_news',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1791 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.update-status',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1804 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.edit',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1814 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.show',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'news.update',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'news.destroy',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1846 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.news.sub_category.details',
          ),
          1 => 
          array (
            0 => 'categoryId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1886 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fyVcnKzrwdOZ3XGh',
          ),
          1 => 
          array (
            0 => 'languageId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1927 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.news.districts_by_division',
          ),
          1 => 
          array (
            0 => 'divisionId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1957 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'news.social.post',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1995 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bulk.post.upload.show',
          ),
          1 => 
          array (
            0 => 'upload',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2009 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bulk.post.upload.edit',
          ),
          1 => 
          array (
            0 => 'upload',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2018 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bulk.post.upload.update',
          ),
          1 => 
          array (
            0 => 'upload',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bulk.post.upload.destroy',
          ),
          1 => 
          array (
            0 => 'upload',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2052 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'opinion.edit',
          ),
          1 => 
          array (
            0 => 'opinion',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2076 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'opinion.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2100 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'opinion.destroy',
          ),
          1 => 
          array (
            0 => 'opinion',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2141 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'opinion.status.update',
          ),
          1 => 
          array (
            0 => 'opinion',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2178 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'page.edit',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2202 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'page.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2245 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'page.update_page_status',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2269 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'page.destroy',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2310 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password-settings.show',
          ),
          1 => 
          array (
            0 => 'password_setting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2324 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password-settings.edit',
          ),
          1 => 
          array (
            0 => 'password_setting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2333 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password-settings.update',
          ),
          1 => 
          array (
            0 => 'password_setting',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password-settings.destroy',
          ),
          1 => 
          array (
            0 => 'password_setting',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2358 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2389 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'poll.edit',
          ),
          1 => 
          array (
            0 => 'poll',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2413 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'poll.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2437 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'poll.destroy',
          ),
          1 => 
          array (
            0 => 'poll',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2475 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'poll.status.update',
          ),
          1 => 
          array (
            0 => 'poll',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2499 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'poll.result',
          ),
          1 => 
          array (
            0 => 'poll',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2539 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'probashijanala.edit',
          ),
          1 => 
          array (
            0 => 'probashiNews',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2563 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'probashijanala.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2587 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'probashijanala.destroy',
          ),
          1 => 
          array (
            0 => 'probashiNews',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2635 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'probashijanala.status.update',
          ),
          1 => 
          array (
            0 => 'probashiNews',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2669 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'probashijanala.delete.video',
          ),
          1 => 
          array (
            0 => 'probashiNews',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2683 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'probashijanala.delete.image',
          ),
          1 => 
          array (
            0 => 'probashiNews',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2721 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.permission.edit',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2745 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.permission.update',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2777 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'photo-library.destroy',
          ),
          1 => 
          array (
            0 => 'photo_library',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2820 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reporter.report',
          ),
          1 => 
          array (
            0 => 'reporter',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2854 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reporter.reporter_status_edit',
          ),
          1 => 
          array (
            0 => 'reporter',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2877 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reporter.edit',
          ),
          1 => 
          array (
            0 => 'reporter',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2901 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reporter.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2925 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reporter.destroy',
          ),
          1 => 
          array (
            0 => 'reporter',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2985 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rss_feeds.edit',
          ),
          1 => 
          array (
            0 => 'rss',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3031 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rss_feeds.status.update',
          ),
          1 => 
          array (
            0 => 'rss',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3078 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rss_feeds.update',
          ),
          1 => 
          array (
            0 => 'rss',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3124 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'rss_feeds.destroy',
          ),
          1 => 
          array (
            0 => 'rss',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3152 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.edit',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3194 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'social_api_keys.show',
          ),
          1 => 
          array (
            0 => 'social_api_key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3208 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'social_api_keys.edit',
          ),
          1 => 
          array (
            0 => 'social_api_key',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3217 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'social_api_keys.update',
          ),
          1 => 
          array (
            0 => 'social_api_key',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'social_api_keys.destroy',
          ),
          1 => 
          array (
            0 => 'social_api_key',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3273 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'space-credential.update-status',
          ),
          1 => 
          array (
            0 => 'space_credential',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3286 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'space-credential.edit',
          ),
          1 => 
          array (
            0 => 'space_credential',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3296 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'space-credential.show',
          ),
          1 => 
          array (
            0 => 'space_credential',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'space-credential.update',
          ),
          1 => 
          array (
            0 => 'space_credential',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'space-credential.destroy',
          ),
          1 => 
          array (
            0 => 'space_credential',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3345 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'zktSetup.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3369 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'zktSetup.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3394 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'zktSetup.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3420 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.story.show',
          ),
          1 => 
          array (
            0 => 'story',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3434 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.story.edit',
          ),
          1 => 
          array (
            0 => 'story',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3443 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.story.update',
          ),
          1 => 
          array (
            0 => 'story',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.story.destroy',
          ),
          1 => 
          array (
            0 => 'story',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3482 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.font.settings.show',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3496 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.font.settings.edit',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3505 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.font.settings.update',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.font.settings.destroy',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3536 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.font.site.setup.show',
          ),
          1 => 
          array (
            0 => 'setup',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3550 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.font.site.setup.edit',
          ),
          1 => 
          array (
            0 => 'setup',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3559 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.font.site.setup.update',
          ),
          1 => 
          array (
            0 => 'setup',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.font.site.setup.destroy',
          ),
          1 => 
          array (
            0 => 'setup',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3596 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-types.show',
          ),
          1 => 
          array (
            0 => 'user_type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3610 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-types.edit',
          ),
          1 => 
          array (
            0 => 'user_type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3619 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-types.update',
          ),
          1 => 
          array (
            0 => 'user_type',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user-types.destroy',
          ),
          1 => 
          array (
            0 => 'user_type',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3663 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile_image.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3701 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile_cover_image.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3724 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.user.edit',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3748 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'role.user.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3784 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'videonews.edit',
          ),
          1 => 
          array (
            0 => 'videonews',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3808 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'videonews.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3832 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'videonews.destroy',
          ),
          1 => 
          array (
            0 => 'videonews',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3875 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'videonews.status.update',
          ),
          1 => 
          array (
            0 => 'videonews',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3909 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'videonews.delete.video',
          ),
          1 => 
          array (
            0 => 'videonews',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3923 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'videonews.delete.image',
          ),
          1 => 
          array (
            0 => 'videonews',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      3965 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XZfQuVBSBsO3do3d',
          ),
          1 => 
          array (
            0 => 'encode_title',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      3992 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xLcT1y6QwmRzuHTd',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4025 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rtnSjhePBFiGLQ7A',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4061 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::e0lcoG1g2g1wiuUR',
          ),
          1 => 
          array (
            0 => 'tag',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4086 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lZGW5YRVYDh4qVPk',
          ),
          1 => 
          array (
            0 => 'topic',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4114 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WaaSmmHE7ByPfj8n',
          ),
          1 => 
          array (
            0 => 'topic',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4142 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sE4cUDfWnrhrhULz',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4168 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pHbFIuHnWj7jwgkq',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4209 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sitemap.posts',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4246 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lOINzdySZ9r8zPfM',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4261 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'webuser.lang.registration',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4287 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account.lang.setting',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4311 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'webuser.lang.logout',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4347 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ajax.poll.result',
          ),
          1 => 
          array (
            0 => 'poll',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4377 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.change.mode',
          ),
          1 => 
          array (
            0 => 'mode',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4410 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.lang.search',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4426 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.lang.archive.news',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4470 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.lang.error-page',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4491 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.story-details.lang.news',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4538 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.story-gallery',
          ),
          1 => 
          array (
            0 => 'param',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4579 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.lang.story-gallery',
          ),
          1 => 
          array (
            0 => 'lang',
            1 => 'param',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4630 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.probash-news-tv',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4698 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.lang.probash-news-tv',
          ),
          1 => 
          array (
            0 => 'lang',
            1 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4720 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.lang.probashi-news',
          ),
          1 => 
          array (
            0 => 'lang',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      4748 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.district.news',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4789 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.lang.district.news',
          ),
          1 => 
          array (
            0 => 'lang',
            1 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4822 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.handle',
          ),
          1 => 
          array (
            0 => 'param',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4850 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website._handle',
          ),
          1 => 
          array (
            0 => 'lang',
            1 => 'param',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4892 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'webuser.password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      4919 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'web.probashi-news.store',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'web.probashi-news.edit',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'web.probashi-news.destroy',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        3 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'debugbar.openhandler' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/open',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Fruitcake\\LaravelDebugbar\\Middleware\\DebugbarEnabled',
          1 => 'Fruitcake\\LaravelDebugbar\\Middleware\\StopRecordingTelescope',
        ),
        'uses' => 'Fruitcake\\LaravelDebugbar\\Controllers\\OpenHandlerController@handle',
        'controller' => 'Fruitcake\\LaravelDebugbar\\Controllers\\OpenHandlerController@handle',
        'namespace' => NULL,
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
        'as' => 'debugbar.openhandler',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.cache.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '_debugbar/cache',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Fruitcake\\LaravelDebugbar\\Middleware\\DebugbarEnabled',
          1 => 'Fruitcake\\LaravelDebugbar\\Middleware\\StopRecordingTelescope',
        ),
        'uses' => 'Fruitcake\\LaravelDebugbar\\Controllers\\CacheController@delete',
        'controller' => 'Fruitcake\\LaravelDebugbar\\Controllers\\CacheController@delete',
        'namespace' => NULL,
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
        'as' => 'debugbar.cache.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.queries.explain' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_debugbar/queries/explain',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Fruitcake\\LaravelDebugbar\\Middleware\\DebugbarEnabled',
          1 => 'Fruitcake\\LaravelDebugbar\\Middleware\\StopRecordingTelescope',
        ),
        'uses' => 'Fruitcake\\LaravelDebugbar\\Controllers\\QueriesController@explain',
        'controller' => 'Fruitcake\\LaravelDebugbar\\Controllers\\QueriesController@explain',
        'namespace' => NULL,
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
        'as' => 'debugbar.queries.explain',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.clockwork' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/clockwork/{id}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Fruitcake\\LaravelDebugbar\\Middleware\\DebugbarEnabled',
          1 => 'Fruitcake\\LaravelDebugbar\\Middleware\\StopRecordingTelescope',
        ),
        'uses' => 'Fruitcake\\LaravelDebugbar\\Controllers\\OpenHandlerController@clockwork',
        'controller' => 'Fruitcake\\LaravelDebugbar\\Controllers\\OpenHandlerController@clockwork',
        'namespace' => NULL,
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
        'as' => 'debugbar.clockwork',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Fruitcake\\LaravelDebugbar\\Middleware\\DebugbarEnabled',
          1 => 'Fruitcake\\LaravelDebugbar\\Middleware\\StopRecordingTelescope',
        ),
        'uses' => 'Fruitcake\\LaravelDebugbar\\Controllers\\AssetController@getAssets',
        'controller' => 'Fruitcake\\LaravelDebugbar\\Controllers\\AssetController@getAssets',
        'namespace' => NULL,
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
        'as' => 'debugbar.assets',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'default-livewire.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire-17995f36/update',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\HandleRequests\\HandleRequests@handleUpdate',
        'controller' => 'Livewire\\Mechanisms\\HandleRequests\\HandleRequests@handleUpdate',
        'middleware' => 
        array (
          0 => 'web',
          1 => 'Livewire\\Mechanisms\\HandleRequests\\RequireLivewireHeaders',
        ),
        'as' => 'default-livewire.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xjo6vaNiDBYCEXGc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire-17995f36/livewire.js',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@returnJavaScriptAsFile',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@returnJavaScriptAsFile',
        'as' => 'generated::xjo6vaNiDBYCEXGc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hqdIR8iDR2kWzQtg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire-17995f36/livewire.min.js.map',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@maps',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@maps',
        'as' => 'generated::hqdIR8iDR2kWzQtg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gTHnQMRHobmRDVCB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire-17995f36/livewire.csp.min.js.map',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@cspMaps',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@cspMaps',
        'as' => 'generated::gTHnQMRHobmRDVCB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.upload-file' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire-17995f36/upload-file',
      'action' => 
      array (
        'uses' => 'Livewire\\Features\\SupportFileUploads\\FileUploadController@handle',
        'controller' => 'Livewire\\Features\\SupportFileUploads\\FileUploadController@handle',
        'as' => 'livewire.upload-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.preview-file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire-17995f36/preview-file/{filename}',
      'action' => 
      array (
        'uses' => 'Livewire\\Features\\SupportFileUploads\\FilePreviewController@handle',
        'controller' => 'Livewire\\Features\\SupportFileUploads\\FilePreviewController@handle',
        'as' => 'livewire.preview-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4sJMVLHLdGQpAQVJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire-17995f36/js/{component}.js',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:905:"function ($component) {
            $component = str_replace(\'----\', \':\', $component);
            $component = str_replace(\'---\', \'::\', $component);
            $component = str_replace(\'--\', \'.\', $component);

            $instance = app(\'livewire\')->new($component);

            if (! method_exists($instance, \'scriptModuleSrc\')) {
                throw new \\Exception(\'Component \'.$component.\' does not have a script source.\');
            }

            $path = $instance->scriptModuleSrc();

            if (! file_exists($path)) {
                throw new \\Exception(\'Script file not found: \'.$path);
            }

            $source = file_get_contents($path);

            $filemtime = filemtime($path);

            return \\Livewire\\Drawer\\Utils::pretendResponseIsFileFromString(
                $source,
                $filemtime,
                $component.\'.js\',
            );
        }";s:5:"scope";s:51:"Livewire\\Features\\SupportJsModules\\SupportJsModules";s:4:"this";N;s:4:"self";s:32:"0000000000000a0c0000000000000000";}}',
        'as' => 'generated::4sJMVLHLdGQpAQVJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YwMQVWqhSlmkogbM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire-17995f36/css/{component}.css',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:1074:"function ($component) {
            $component = str_replace(\'----\', \':\', $component);
            $component = str_replace(\'---\', \'::\', $component);
            $component = str_replace(\'--\', \'.\', $component);

            $instance = app(\'livewire\')->new($component);

            if (! method_exists($instance, \'styleModuleSrc\')) {
                throw new \\Exception(\'Component \'.$component.\' does not have a style source.\');
            }

            $path = $instance->styleModuleSrc();

            if (! file_exists($path)) {
                throw new \\Exception(\'Style file not found: \'.$path);
            }

            $css = file_get_contents($path);

            // Wrap in component selector for scoping
            $wrappedCss = "[wire\\\\:name=\\"{$component}\\"] {\\n{$css}\\n}";

            $filemtime = filemtime($path);

            return \\Livewire\\Drawer\\Utils::pretendResponseIsFileFromString(
                $wrappedCss,
                $filemtime,
                $component.\'.css\',
                \'text/css; charset=utf-8\',
            );
        }";s:5:"scope";s:53:"Livewire\\Features\\SupportCssModules\\SupportCssModules";s:4:"this";N;s:4:"self";s:32:"0000000000000a0e0000000000000000";}}',
        'as' => 'generated::YwMQVWqhSlmkogbM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ITlqJpm6ErWYaBGf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire-17995f36/css/{component}.global.css',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:972:"function ($component) {
            $component = str_replace(\'----\', \':\', $component);
            $component = str_replace(\'---\', \'::\', $component);
            $component = str_replace(\'--\', \'.\', $component);

            $instance = app(\'livewire\')->new($component);

            if (! method_exists($instance, \'globalStyleModuleSrc\')) {
                throw new \\Exception(\'Component \'.$component.\' does not have a global style source.\');
            }

            $path = $instance->globalStyleModuleSrc();

            if (! file_exists($path)) {
                throw new \\Exception(\'Global style file not found: \'.$path);
            }

            $css = file_get_contents($path);

            $filemtime = filemtime($path);

            return \\Livewire\\Drawer\\Utils::pretendResponseIsFileFromString(
                $css,
                $filemtime,
                $component.\'.global.css\',
                \'text/css; charset=utf-8\',
            );
        }";s:5:"scope";s:53:"Livewire\\Features\\SupportCssModules\\SupportCssModules";s:4:"this";N;s:4:"self";s:32:"0000000000000a100000000000000000";}}',
        'as' => 'generated::ITlqJpm6ErWYaBGf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IY1fdYd8FBgbQfeH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/advertisement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000a8d0000000000000000";}}',
        'namespace' => 'Modules\\Advertisement\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::IY1fdYd8FBgbQfeH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertise.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/advertise/view_ads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@index',
        'controller' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@index',
        'as' => 'advertise.index',
        'namespace' => 'Modules\\Advertisement\\Http\\Controllers',
        'prefix' => 'admin/advertise',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertise.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/advertise/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@create',
        'controller' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@create',
        'as' => 'advertise.create',
        'namespace' => 'Modules\\Advertisement\\Http\\Controllers',
        'prefix' => 'admin/advertise',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertise.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/advertise/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@store',
        'controller' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@store',
        'as' => 'advertise.store',
        'namespace' => 'Modules\\Advertisement\\Http\\Controllers',
        'prefix' => 'admin/advertise',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertise.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/advertise/edit/{advertise}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@edit',
        'controller' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@edit',
        'as' => 'advertise.edit',
        'namespace' => 'Modules\\Advertisement\\Http\\Controllers',
        'prefix' => 'admin/advertise',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'advertise' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertise.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/advertise/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@update',
        'controller' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@update',
        'as' => 'advertise.update',
        'namespace' => 'Modules\\Advertisement\\Http\\Controllers',
        'prefix' => 'admin/advertise',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertise.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/advertise/delete/{advertise}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@destroy',
        'controller' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@destroy',
        'as' => 'advertise.destroy',
        'namespace' => 'Modules\\Advertisement\\Http\\Controllers',
        'prefix' => 'admin/advertise',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'advertise' => 'uuid',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertise.update_lg_status' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/advertise/ad/update_lg_status/{advertise}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@updateLgStatus',
        'controller' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@updateLgStatus',
        'as' => 'advertise.update_lg_status',
        'namespace' => 'Modules\\Advertisement\\Http\\Controllers',
        'prefix' => 'admin/advertise',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'advertise' => 'uuid',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertise.update_sm_status' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/advertise/ad/update_sm_status/{advertise}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@updateSmStatus',
        'controller' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@updateSmStatus',
        'as' => 'advertise.update_sm_status',
        'namespace' => 'Modules\\Advertisement\\Http\\Controllers',
        'prefix' => 'admin/advertise',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'advertise' => 'uuid',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertise.get.page.positions' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/advertise/get-page-positions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@getPagePositions',
        'controller' => 'Modules\\Advertisement\\Http\\Controllers\\AdvertisementController@getPagePositions',
        'as' => 'advertise.get.page.positions',
        'namespace' => 'Modules\\Advertisement\\Http\\Controllers',
        'prefix' => 'admin/advertise',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::L0vz9ZGUhod0ZbVQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/archive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000a9e0000000000000000";}}',
        'namespace' => 'Modules\\Archive\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::L0vz9ZGUhod0ZbVQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'archive.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/archive/maximum_archive_settings_view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Archive\\Http\\Controllers\\ArchiveController@index',
        'controller' => 'Modules\\Archive\\Http\\Controllers\\ArchiveController@index',
        'as' => 'archive.index',
        'namespace' => 'Modules\\Archive\\Http\\Controllers',
        'prefix' => 'admin/archive',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'archive.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/archive/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Archive\\Http\\Controllers\\ArchiveController@create',
        'controller' => 'Modules\\Archive\\Http\\Controllers\\ArchiveController@create',
        'as' => 'archive.create',
        'namespace' => 'Modules\\Archive\\Http\\Controllers',
        'prefix' => 'admin/archive',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'archive.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/archive/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Archive\\Http\\Controllers\\ArchiveController@store',
        'controller' => 'Modules\\Archive\\Http\\Controllers\\ArchiveController@store',
        'as' => 'archive.store',
        'namespace' => 'Modules\\Archive\\Http\\Controllers',
        'prefix' => 'admin/archive',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'archive.save_max_archive_settings' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/archive/save-max-archive-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Archive\\Http\\Controllers\\ArchiveController@saveMaxArchiveSettings',
        'controller' => 'Modules\\Archive\\Http\\Controllers\\ArchiveController@saveMaxArchiveSettings',
        'as' => 'archive.save_max_archive_settings',
        'namespace' => 'Modules\\Archive\\Http\\Controllers',
        'prefix' => 'admin/archive',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'archive.archive_newses_by_category' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/archive/archive-newses-by-category/{cat_id_available}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Archive\\Http\\Controllers\\ArchiveController@archiveNewsesByCategory',
        'controller' => 'Modules\\Archive\\Http\\Controllers\\ArchiveController@archiveNewsesByCategory',
        'as' => 'archive.archive_newses_by_category',
        'namespace' => 'Modules\\Archive\\Http\\Controllers',
        'prefix' => 'admin/archive',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'archive.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/archive/delete/{archive}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Archive\\Http\\Controllers\\ArchiveController@destroy',
        'controller' => 'Modules\\Archive\\Http\\Controllers\\ArchiveController@destroy',
        'as' => 'archive.destroy',
        'namespace' => 'Modules\\Archive\\Http\\Controllers',
        'prefix' => 'admin/archive',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'archive' => 'uuid',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8m1s19pEurqYA2L5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/autopost',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000aac0000000000000000";}}',
        'namespace' => 'Modules\\AutoPost\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::8m1s19pEurqYA2L5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'autopost.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/autopost/posting-media',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\AutoPost\\Http\\Controllers\\AutoPostController@index',
        'controller' => 'Modules\\AutoPost\\Http\\Controllers\\AutoPostController@index',
        'as' => 'autopost.index',
        'namespace' => 'Modules\\AutoPost\\Http\\Controllers',
        'prefix' => 'admin/autopost',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'autopost.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/autopost/posting-media/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\AutoPost\\Http\\Controllers\\AutoPostController@update',
        'controller' => 'Modules\\AutoPost\\Http\\Controllers\\AutoPostController@update',
        'as' => 'autopost.update',
        'namespace' => 'Modules\\AutoPost\\Http\\Controllers',
        'prefix' => 'admin/autopost',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::po3DradCobHPgjeV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000ab60000000000000000";}}',
        'namespace' => 'Modules\\Category\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::po3DradCobHPgjeV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/category/list_of_categories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Category\\Http\\Controllers\\CategoryController@index',
        'controller' => 'Modules\\Category\\Http\\Controllers\\CategoryController@index',
        'as' => 'category.index',
        'namespace' => 'Modules\\Category\\Http\\Controllers',
        'prefix' => 'admin/category',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/category/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Category\\Http\\Controllers\\CategoryController@create',
        'controller' => 'Modules\\Category\\Http\\Controllers\\CategoryController@create',
        'as' => 'category.create',
        'namespace' => 'Modules\\Category\\Http\\Controllers',
        'prefix' => 'admin/category',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/category/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Category\\Http\\Controllers\\CategoryController@store',
        'controller' => 'Modules\\Category\\Http\\Controllers\\CategoryController@store',
        'as' => 'category.store',
        'namespace' => 'Modules\\Category\\Http\\Controllers',
        'prefix' => 'admin/category',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/category/edit/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Category\\Http\\Controllers\\CategoryController@edit',
        'controller' => 'Modules\\Category\\Http\\Controllers\\CategoryController@edit',
        'as' => 'category.edit',
        'namespace' => 'Modules\\Category\\Http\\Controllers',
        'prefix' => 'admin/category',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'category' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/category/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Category\\Http\\Controllers\\CategoryController@update',
        'controller' => 'Modules\\Category\\Http\\Controllers\\CategoryController@update',
        'as' => 'category.update',
        'namespace' => 'Modules\\Category\\Http\\Controllers',
        'prefix' => 'admin/category',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/category/delete/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Category\\Http\\Controllers\\CategoryController@destroy',
        'controller' => 'Modules\\Category\\Http\\Controllers\\CategoryController@destroy',
        'as' => 'category.destroy',
        'namespace' => 'Modules\\Category\\Http\\Controllers',
        'prefix' => 'admin/category',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'category' => 'uuid',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.save_category_img_status' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/category/save-category-img-status/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Category\\Http\\Controllers\\CategoryController@saveCategoryImgStatus',
        'controller' => 'Modules\\Category\\Http\\Controllers\\CategoryController@saveCategoryImgStatus',
        'as' => 'category.save_category_img_status',
        'namespace' => 'Modules\\Category\\Http\\Controllers',
        'prefix' => 'admin/category',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'category' => 'uuid',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.status.check' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/category/category-status-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Category\\Http\\Controllers\\CategoryController@checkCategoryStatus',
        'controller' => 'Modules\\Category\\Http\\Controllers\\CategoryController@checkCategoryStatus',
        'as' => 'category.status.check',
        'namespace' => 'Modules\\Category\\Http\\Controllers',
        'prefix' => 'admin/category',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'category.menu.check' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/category/parent-menu-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Category\\Http\\Controllers\\CategoryController@checkParentMenu',
        'controller' => 'Modules\\Category\\Http\\Controllers\\CategoryController@checkParentMenu',
        'as' => 'category.menu.check',
        'namespace' => 'Modules\\Category\\Http\\Controllers',
        'prefix' => 'admin/category',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.localize.languagelist' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/localize/language-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@languagelist',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@languagelist',
        'as' => 'setting.localize.languagelist',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/localize',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.localize.languageStringValueindex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/localize/language/string-list/value/{localize}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@languageStringValueindex',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@languageStringValueindex',
        'as' => 'setting.localize.languageStringValueindex',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/localize',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.localize.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/localize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@languageStore',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@languageStore',
        'as' => 'setting.localize.store',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/localize',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.localize.languagestringlist' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/localize/language-string-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@languageStringList',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@languageStringList',
        'as' => 'setting.localize.languagestringlist',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/localize',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.localize.storelanstring' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/localize/store-lang-string',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@storelanstring',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@storelanstring',
        'as' => 'setting.localize.storelanstring',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/localize',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.localize.lanstrvaluestore' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/localize/store/langstring/value',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@lanstrvaluestore',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@lanstrvaluestore',
        'as' => 'setting.localize.lanstrvaluestore',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/localize',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.localize.stringDestroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/localize/language-string-list/{localize}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@languageStringDestroy',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@languageStringDestroy',
        'as' => 'setting.localize.stringDestroy',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/localize',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'localize' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.localize.langDestroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/localize/language-list/{localize}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@languageDestroy',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LocalizeController@languageDestroy',
        'as' => 'setting.localize.langDestroy',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/localize',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'localize' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.language.languagelist' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/language/language-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@languagelist',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@languagelist',
        'as' => 'setting.language.languagelist',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/language',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.language.languageStringValueindex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/language/language/string-list/value/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@languageStringValueindex',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@languageStringValueindex',
        'as' => 'setting.language.languageStringValueindex',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/language',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.language.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/language',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@languageStore',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@languageStore',
        'as' => 'setting.language.store',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/language',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.language.languagestringlist' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/language/language-string-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@languageStringList',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@languageStringList',
        'as' => 'setting.language.languagestringlist',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/language',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.language.storelanstring' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/language/store-lang-string',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@storelanstring',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@storelanstring',
        'as' => 'setting.language.storelanstring',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/language',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.language.lanstrvaluestore' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/language/store/langstring/value',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@lanstrvaluestore',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@lanstrvaluestore',
        'as' => 'setting.language.lanstrvaluestore',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/language',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.language.stringDestroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/language/language-string-list/{language}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@languageStringDestroy',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@languageStringDestroy',
        'as' => 'setting.language.stringDestroy',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/language',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'language' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.language.langDestroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/language/language-list/{language}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@languageDestroy',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@languageDestroy',
        'as' => 'setting.language.langDestroy',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/language',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'language' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.language.getAllData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/language/lang/getAllData/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@getAllData',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@getAllData',
        'as' => 'setting.language.getAllData',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/language',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.language.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/language/language/export/{locale}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@export',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@export',
        'as' => 'setting.language.export',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/language',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.language.import' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/language/language/import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@import',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@import',
        'as' => 'setting.language.import',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/language',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'setting.language.langUpdate' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/language/language-list-update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@languageListUpdate',
        'controller' => 'Modules\\Localize\\Http\\Controllers\\LanguageController@languageListUpdate',
        'as' => 'setting.language.langUpdate',
        'namespace' => 'Modules\\Localize\\Http\\Controllers',
        'prefix' => 'admin/language',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BYgnR3PlXpcwvWL7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/menu',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000ab90000000000000000";}}',
        'namespace' => 'Modules\\Menu\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::BYgnR3PlXpcwvWL7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.setup.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/menu/setup/{menu}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@create',
        'controller' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@create',
        'namespace' => 'Modules\\Menu\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'menu.setup.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.setup.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/menu/setup/{menu}/edit/{menu_content}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@edit',
        'controller' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@edit',
        'namespace' => 'Modules\\Menu\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'menu.setup.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.setup.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/menu/setup/{menu}/update/{menu_content}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@update',
        'controller' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@update',
        'namespace' => 'Modules\\Menu\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'menu.setup.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.setup.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/menu/setup/{menu}/destroy/{menu_content}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@destroy',
        'controller' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@destroy',
        'namespace' => 'Modules\\Menu\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'menu.setup.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.setup.update-position' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/menu/setup/{menu}/update-position',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@updatePosition',
        'controller' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@updatePosition',
        'namespace' => 'Modules\\Menu\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'menu.setup.update-position',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.setup.storeCategoryMenuContent' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/menu/setup/{menu}/store-category-menu-content',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@storeCategoryMenuContent',
        'controller' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@storeCategoryMenuContent',
        'namespace' => 'Modules\\Menu\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'menu.setup.storeCategoryMenuContent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.setup.storePageMenuContent' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/menu/setup/{menu}/store-page-menu-content',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@storePageMenuContent',
        'controller' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@storePageMenuContent',
        'namespace' => 'Modules\\Menu\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'menu.setup.storePageMenuContent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.setup.storeLinkMenuContent' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/menu/setup/{menu}/store-link-menu-content',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@storeLinkMenuContent',
        'controller' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@storeLinkMenuContent',
        'namespace' => 'Modules\\Menu\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'menu.setup.storeLinkMenuContent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.setup.storeArchiveMenuContent' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/menu/setup/{menu}/store-archive-menu-content',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@storeArchiveMenuContent',
        'controller' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@storeArchiveMenuContent',
        'namespace' => 'Modules\\Menu\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'menu.setup.storeArchiveMenuContent',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.setup.storeLink' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/menu/setup/{menu}/store-link',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@storeLink',
        'controller' => 'Modules\\Menu\\Http\\Controllers\\MenuSetupController@storeLink',
        'namespace' => 'Modules\\Menu\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'menu.setup.storeLink',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.update-status' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/menu/{menu}/update-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Menu\\Http\\Controllers\\MenuController@updateStatus',
        'controller' => 'Modules\\Menu\\Http\\Controllers\\MenuController@updateStatus',
        'namespace' => 'Modules\\Menu\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'menu.update-status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/menu',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Menu\\Http\\Controllers\\MenuController@index',
        'controller' => 'Modules\\Menu\\Http\\Controllers\\MenuController@index',
        'namespace' => 'Modules\\Menu\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'menu.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'menu.setup.language' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/menu/setup/language',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:580:"function (\\Illuminate\\Http\\Request $request) {
            // Validate the request
            $validated = $request->validate([
                \'language_id\' => [\'required\', \'integer\', \\Illuminate\\Validation\\Rule::exists(\\Modules\\Setting\\Entities\\Language::class, \'id\')],
            ]);

            // Set session variable
            \\session([\'language_id\' => $validated[\'language_id\']]);

            return \\response()->json([
                \'success\' => true,
                \'message\' => \\localize("language_changed_successfully"),
            ]);
            
        }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000af00000000000000000";}}',
        'namespace' => 'Modules\\Menu\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'menu.setup.language',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hA5ukQL5tb6wlpWr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000af50000000000000000";}}',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::hA5ukQL5tb6wlpWr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.position.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news/position',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsPositionController@index',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsPositionController@index',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'news.position.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.position.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/news/position/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsPositionController@update',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsPositionController@update',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'news.position.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.position.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/news/position/{news_position}/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsPositionController@destroy',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsPositionController@destroy',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'news.position.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.breaking-news.toggle-ticker' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/news/breaking-news/toggle-ticker',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\News\\Http\\Controllers\\BreakingNewsController@toggleTicker',
        'controller' => 'Modules\\News\\Http\\Controllers\\BreakingNewsController@toggleTicker',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'news.breaking-news.toggle-ticker',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.breaking-news.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news/breaking-news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.breaking-news.index',
        'uses' => 'Modules\\News\\Http\\Controllers\\BreakingNewsController@index',
        'controller' => 'Modules\\News\\Http\\Controllers\\BreakingNewsController@index',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/news',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.breaking-news.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/news/breaking-news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.breaking-news.store',
        'uses' => 'Modules\\News\\Http\\Controllers\\BreakingNewsController@store',
        'controller' => 'Modules\\News\\Http\\Controllers\\BreakingNewsController@store',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/news',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.breaking-news.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news/breaking-news/{breaking_news}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.breaking-news.edit',
        'uses' => 'Modules\\News\\Http\\Controllers\\BreakingNewsController@edit',
        'controller' => 'Modules\\News\\Http\\Controllers\\BreakingNewsController@edit',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/news',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.breaking-news.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/news/breaking-news/{breaking_news}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.breaking-news.update',
        'uses' => 'Modules\\News\\Http\\Controllers\\BreakingNewsController@update',
        'controller' => 'Modules\\News\\Http\\Controllers\\BreakingNewsController@update',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/news',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.breaking-news.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/news/breaking-news/{breaking_news}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.breaking-news.destroy',
        'uses' => 'Modules\\News\\Http\\Controllers\\BreakingNewsController@destroy',
        'controller' => 'Modules\\News\\Http\\Controllers\\BreakingNewsController@destroy',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/news',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.breaking-news.update-status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/news/breaking-news/{breaking_news}/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\News\\Http\\Controllers\\BreakingNewsController@updateStatus',
        'controller' => 'Modules\\News\\Http\\Controllers\\BreakingNewsController@updateStatus',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'news.breaking-news.update-status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.post.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news/post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.post.index',
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsPostController@index',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsPostController@index',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/news',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.post.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news/post/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.post.create',
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsPostController@create',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsPostController@create',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/news',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.post.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/news/post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.post.store',
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsPostController@store',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsPostController@store',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/news',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.post.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news/post/{post}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.post.edit',
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsPostController@edit',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsPostController@edit',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/news',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.post.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/news/post/{post}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.post.update',
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsPostController@update',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsPostController@update',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/news',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.post.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/news/post/{post}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.post.destroy',
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsPostController@destroy',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsPostController@destroy',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/news',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ai.ai_settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/ai/ai_settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\News\\Http\\Controllers\\AIController@index',
        'controller' => 'Modules\\News\\Http\\Controllers\\AIController@index',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'ai.ai_settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ai.settings.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/ai/settings/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\News\\Http\\Controllers\\AIController@update',
        'controller' => 'Modules\\News\\Http\\Controllers\\AIController@update',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'ai.settings.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.storeReport' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/news/store-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsController@storeReport',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsController@storeReport',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'news.storeReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.update-status' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/news/{news}/update-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsController@updateStatus',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsController@updateStatus',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'news.update-status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.index',
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsController@index',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsController@index',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.create',
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsController@create',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsController@create',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.store',
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsController@store',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsController@store',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news/{news}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.show',
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsController@show',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsController@show',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news/{news}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.edit',
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsController@edit',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsController@edit',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/news/{news}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.update',
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsController@update',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsController@update',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/news/{news}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'news.destroy',
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsController@destroy',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsController@destroy',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.news.sub_category.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news/sub-category/{categoryId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsController@getSubCategories',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsController@getSubCategories',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.news.sub_category.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fyVcnKzrwdOZ3XGh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news/category-by-language/{languageId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsController@getCategoriesByLanguage',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsController@getCategoriesByLanguage',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::fyVcnKzrwdOZ3XGh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.news.districts_by_division' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news/districts-by-division/{divisionId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsController@getDistrictsByDivision',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsController@getDistrictsByDivision',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.news.districts_by_division',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.ai.generate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/admin/ai/generate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\News\\Http\\Controllers\\AIController@generateText',
        'controller' => 'Modules\\News\\Http\\Controllers\\AIController@generateText',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'admin.ai.generate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bulk.post.upload.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bulk/post/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'bulk.post.upload.index',
        'uses' => 'Modules\\News\\Http\\Controllers\\BulkPostController@index',
        'controller' => 'Modules\\News\\Http\\Controllers\\BulkPostController@index',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/bulk/post',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bulk.post.upload.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bulk/post/upload/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'bulk.post.upload.create',
        'uses' => 'Modules\\News\\Http\\Controllers\\BulkPostController@create',
        'controller' => 'Modules\\News\\Http\\Controllers\\BulkPostController@create',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/bulk/post',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bulk.post.upload.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/bulk/post/upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'bulk.post.upload.store',
        'uses' => 'Modules\\News\\Http\\Controllers\\BulkPostController@store',
        'controller' => 'Modules\\News\\Http\\Controllers\\BulkPostController@store',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/bulk/post',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bulk.post.upload.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bulk/post/upload/{upload}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'bulk.post.upload.show',
        'uses' => 'Modules\\News\\Http\\Controllers\\BulkPostController@show',
        'controller' => 'Modules\\News\\Http\\Controllers\\BulkPostController@show',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/bulk/post',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bulk.post.upload.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/bulk/post/upload/{upload}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'bulk.post.upload.edit',
        'uses' => 'Modules\\News\\Http\\Controllers\\BulkPostController@edit',
        'controller' => 'Modules\\News\\Http\\Controllers\\BulkPostController@edit',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/bulk/post',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bulk.post.upload.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/bulk/post/upload/{upload}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'bulk.post.upload.update',
        'uses' => 'Modules\\News\\Http\\Controllers\\BulkPostController@update',
        'controller' => 'Modules\\News\\Http\\Controllers\\BulkPostController@update',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/bulk/post',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bulk.post.upload.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/bulk/post/upload/{upload}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'bulk.post.upload.destroy',
        'uses' => 'Modules\\News\\Http\\Controllers\\BulkPostController@destroy',
        'controller' => 'Modules\\News\\Http\\Controllers\\BulkPostController@destroy',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => 'admin/bulk/post',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'news.social.post' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/news/{news}/social-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\News\\Http\\Controllers\\NewsController@socialPost',
        'controller' => 'Modules\\News\\Http\\Controllers\\NewsController@socialPost',
        'namespace' => 'Modules\\News\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'news.social.post',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RyNBAtBYnES9gfjz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/opinion',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000dc50000000000000000";}}',
        'namespace' => 'Modules\\Opinion\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::RyNBAtBYnES9gfjz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'opinion.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/opinion/opinion-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Opinion\\Http\\Controllers\\OpinionController@index',
        'controller' => 'Modules\\Opinion\\Http\\Controllers\\OpinionController@index',
        'as' => 'opinion.index',
        'namespace' => 'Modules\\Opinion\\Http\\Controllers',
        'prefix' => 'admin/opinion',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'opinion.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/opinion/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Opinion\\Http\\Controllers\\OpinionController@create',
        'controller' => 'Modules\\Opinion\\Http\\Controllers\\OpinionController@create',
        'as' => 'opinion.create',
        'namespace' => 'Modules\\Opinion\\Http\\Controllers',
        'prefix' => 'admin/opinion',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'opinion.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/opinion/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Opinion\\Http\\Controllers\\OpinionController@store',
        'controller' => 'Modules\\Opinion\\Http\\Controllers\\OpinionController@store',
        'as' => 'opinion.store',
        'namespace' => 'Modules\\Opinion\\Http\\Controllers',
        'prefix' => 'admin/opinion',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'opinion.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/opinion/edit/{opinion}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Opinion\\Http\\Controllers\\OpinionController@edit',
        'controller' => 'Modules\\Opinion\\Http\\Controllers\\OpinionController@edit',
        'as' => 'opinion.edit',
        'namespace' => 'Modules\\Opinion\\Http\\Controllers',
        'prefix' => 'admin/opinion',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'opinion' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'opinion.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/opinion/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Opinion\\Http\\Controllers\\OpinionController@update',
        'controller' => 'Modules\\Opinion\\Http\\Controllers\\OpinionController@update',
        'as' => 'opinion.update',
        'namespace' => 'Modules\\Opinion\\Http\\Controllers',
        'prefix' => 'admin/opinion',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'opinion.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/opinion/delete/{opinion}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Opinion\\Http\\Controllers\\OpinionController@destroy',
        'controller' => 'Modules\\Opinion\\Http\\Controllers\\OpinionController@destroy',
        'as' => 'opinion.destroy',
        'namespace' => 'Modules\\Opinion\\Http\\Controllers',
        'prefix' => 'admin/opinion',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'opinion' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'opinion.status.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/opinion/opinion-status-update/{opinion}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Opinion\\Http\\Controllers\\OpinionController@updateStatus',
        'controller' => 'Modules\\Opinion\\Http\\Controllers\\OpinionController@updateStatus',
        'as' => 'opinion.status.update',
        'namespace' => 'Modules\\Opinion\\Http\\Controllers',
        'prefix' => 'admin/opinion',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Un84gJsYl2VOXkt0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000ddb0000000000000000";}}',
        'namespace' => 'Modules\\Page\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Un84gJsYl2VOXkt0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'page.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/page/pages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Page\\Http\\Controllers\\PageController@index',
        'controller' => 'Modules\\Page\\Http\\Controllers\\PageController@index',
        'as' => 'page.index',
        'namespace' => 'Modules\\Page\\Http\\Controllers',
        'prefix' => 'admin/page',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'page.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/page/create-new-page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Page\\Http\\Controllers\\PageController@create',
        'controller' => 'Modules\\Page\\Http\\Controllers\\PageController@create',
        'as' => 'page.create',
        'namespace' => 'Modules\\Page\\Http\\Controllers',
        'prefix' => 'admin/page',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'page.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/page/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Page\\Http\\Controllers\\PageController@store',
        'controller' => 'Modules\\Page\\Http\\Controllers\\PageController@store',
        'as' => 'page.store',
        'namespace' => 'Modules\\Page\\Http\\Controllers',
        'prefix' => 'admin/page',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'page.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/page/edit/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Page\\Http\\Controllers\\PageController@edit',
        'controller' => 'Modules\\Page\\Http\\Controllers\\PageController@edit',
        'as' => 'page.edit',
        'namespace' => 'Modules\\Page\\Http\\Controllers',
        'prefix' => 'admin/page',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'page' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'page.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/page/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Page\\Http\\Controllers\\PageController@update',
        'controller' => 'Modules\\Page\\Http\\Controllers\\PageController@update',
        'as' => 'page.update',
        'namespace' => 'Modules\\Page\\Http\\Controllers',
        'prefix' => 'admin/page',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'page.update_page_status' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/page/page/update-page-status/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Page\\Http\\Controllers\\PageController@updatePageStatus',
        'controller' => 'Modules\\Page\\Http\\Controllers\\PageController@updatePageStatus',
        'as' => 'page.update_page_status',
        'namespace' => 'Modules\\Page\\Http\\Controllers',
        'prefix' => 'admin/page',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'page' => 'uuid',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'page.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/page/delete/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Page\\Http\\Controllers\\PageController@destroy',
        'controller' => 'Modules\\Page\\Http\\Controllers\\PageController@destroy',
        'as' => 'page.destroy',
        'namespace' => 'Modules\\Page\\Http\\Controllers',
        'prefix' => 'admin/page',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'page' => 'uuid',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'page.ckeditor_upload' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/page/page/ckeditor_upload',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Page\\Http\\Controllers\\PageController@upload_ckeditor_data',
        'controller' => 'Modules\\Page\\Http\\Controllers\\PageController@upload_ckeditor_data',
        'as' => 'page.ckeditor_upload',
        'namespace' => 'Modules\\Page\\Http\\Controllers',
        'prefix' => 'admin/page',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ofm5P56m16OpIsLg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/poll',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000deb0000000000000000";}}',
        'namespace' => 'Modules\\Poll\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ofm5P56m16OpIsLg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'poll.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/poll/poll-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Poll\\Http\\Controllers\\PollController@index',
        'controller' => 'Modules\\Poll\\Http\\Controllers\\PollController@index',
        'as' => 'poll.index',
        'namespace' => 'Modules\\Poll\\Http\\Controllers',
        'prefix' => 'admin/poll',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'poll.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/poll/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Poll\\Http\\Controllers\\PollController@create',
        'controller' => 'Modules\\Poll\\Http\\Controllers\\PollController@create',
        'as' => 'poll.create',
        'namespace' => 'Modules\\Poll\\Http\\Controllers',
        'prefix' => 'admin/poll',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'poll.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/poll/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Poll\\Http\\Controllers\\PollController@store',
        'controller' => 'Modules\\Poll\\Http\\Controllers\\PollController@store',
        'as' => 'poll.store',
        'namespace' => 'Modules\\Poll\\Http\\Controllers',
        'prefix' => 'admin/poll',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'poll.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/poll/edit/{poll}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Poll\\Http\\Controllers\\PollController@edit',
        'controller' => 'Modules\\Poll\\Http\\Controllers\\PollController@edit',
        'as' => 'poll.edit',
        'namespace' => 'Modules\\Poll\\Http\\Controllers',
        'prefix' => 'admin/poll',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'poll' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'poll.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/poll/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Poll\\Http\\Controllers\\PollController@update',
        'controller' => 'Modules\\Poll\\Http\\Controllers\\PollController@update',
        'as' => 'poll.update',
        'namespace' => 'Modules\\Poll\\Http\\Controllers',
        'prefix' => 'admin/poll',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'poll.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/poll/delete/{poll}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Poll\\Http\\Controllers\\PollController@destroy',
        'controller' => 'Modules\\Poll\\Http\\Controllers\\PollController@destroy',
        'as' => 'poll.destroy',
        'namespace' => 'Modules\\Poll\\Http\\Controllers',
        'prefix' => 'admin/poll',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'poll' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'poll.status.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/poll/poll-status-update/{poll}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Poll\\Http\\Controllers\\PollController@updateStatus',
        'controller' => 'Modules\\Poll\\Http\\Controllers\\PollController@updateStatus',
        'as' => 'poll.status.update',
        'namespace' => 'Modules\\Poll\\Http\\Controllers',
        'prefix' => 'admin/poll',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'poll.result' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/poll/result/{poll}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Poll\\Http\\Controllers\\PollController@pollResult',
        'controller' => 'Modules\\Poll\\Http\\Controllers\\PollController@pollResult',
        'as' => 'poll.result',
        'namespace' => 'Modules\\Poll\\Http\\Controllers',
        'prefix' => 'admin/poll',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'poll' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MtjIjhHJ9JYNYthK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/probashijanala',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000dfb0000000000000000";}}',
        'namespace' => 'Modules\\ProbashiJanala\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::MtjIjhHJ9JYNYthK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::A4w5bfDN4YUPqNMa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/probashijanala',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@index',
        'controller' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@index',
        'namespace' => 'Modules\\ProbashiJanala\\Http\\Controllers',
        'prefix' => 'admin/probashijanala',
        'where' => 
        array (
        ),
        'as' => 'generated::A4w5bfDN4YUPqNMa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'probashijanala.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/probashijanala/probashijanala-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@index',
        'controller' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@index',
        'as' => 'probashijanala.index',
        'namespace' => 'Modules\\ProbashiJanala\\Http\\Controllers',
        'prefix' => 'admin/probashijanala',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'probashijanala.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/probashijanala/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@create',
        'controller' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@create',
        'as' => 'probashijanala.create',
        'namespace' => 'Modules\\ProbashiJanala\\Http\\Controllers',
        'prefix' => 'admin/probashijanala',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'probashijanala.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/probashijanala/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@store',
        'controller' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@store',
        'as' => 'probashijanala.store',
        'namespace' => 'Modules\\ProbashiJanala\\Http\\Controllers',
        'prefix' => 'admin/probashijanala',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'probashijanala.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/probashijanala/edit/{probashiNews}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@edit',
        'controller' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@edit',
        'as' => 'probashijanala.edit',
        'namespace' => 'Modules\\ProbashiJanala\\Http\\Controllers',
        'prefix' => 'admin/probashijanala',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'probashiNews' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'probashijanala.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/probashijanala/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@update',
        'controller' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@update',
        'as' => 'probashijanala.update',
        'namespace' => 'Modules\\ProbashiJanala\\Http\\Controllers',
        'prefix' => 'admin/probashijanala',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'probashijanala.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/probashijanala/delete/{probashiNews}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@destroy',
        'controller' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@destroy',
        'as' => 'probashijanala.destroy',
        'namespace' => 'Modules\\ProbashiJanala\\Http\\Controllers',
        'prefix' => 'admin/probashijanala',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'probashiNews' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'probashijanala.status.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/probashijanala/probashijanala-status-update/{probashiNews}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@updateStatus',
        'controller' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@updateStatus',
        'as' => 'probashijanala.status.update',
        'namespace' => 'Modules\\ProbashiJanala\\Http\\Controllers',
        'prefix' => 'admin/probashijanala',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'probashijanala.delete.video' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/probashijanala/{probashiNews}/delete-video',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@deleteVideo',
        'controller' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@deleteVideo',
        'as' => 'probashijanala.delete.video',
        'namespace' => 'Modules\\ProbashiJanala\\Http\\Controllers',
        'prefix' => 'admin/probashijanala',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'probashijanala.delete.image' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/probashijanala/{probashiNews}/delete-image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@deleteImage',
        'controller' => 'Modules\\ProbashiJanala\\Http\\Controllers\\ProbashiJanalaController@deleteImage',
        'as' => 'probashijanala.delete.image',
        'namespace' => 'Modules\\ProbashiJanala\\Http\\Controllers',
        'prefix' => 'admin/probashijanala',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DZKrdlsckMmHwN0I' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/reporter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000e0d0000000000000000";}}',
        'namespace' => 'Modules\\Reporter\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::DZKrdlsckMmHwN0I',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reporter.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reporter/reporter-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@index',
        'controller' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@index',
        'as' => 'reporter.index',
        'namespace' => 'Modules\\Reporter\\Http\\Controllers',
        'prefix' => 'admin/reporter',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reporter.report' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reporter/report/{reporter}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@report',
        'controller' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@report',
        'as' => 'reporter.report',
        'namespace' => 'Modules\\Reporter\\Http\\Controllers',
        'prefix' => 'admin/reporter',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'reporter' => 'uuid',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reporter.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reporter/show',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@create',
        'controller' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@create',
        'as' => 'reporter.create',
        'namespace' => 'Modules\\Reporter\\Http\\Controllers',
        'prefix' => 'admin/reporter',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reporter.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/reporter/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@store',
        'controller' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@store',
        'as' => 'reporter.store',
        'namespace' => 'Modules\\Reporter\\Http\\Controllers',
        'prefix' => 'admin/reporter',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reporter.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reporter/edit/{reporter}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@edit',
        'controller' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@edit',
        'as' => 'reporter.edit',
        'namespace' => 'Modules\\Reporter\\Http\\Controllers',
        'prefix' => 'admin/reporter',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'reporter' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reporter.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/reporter/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@update',
        'controller' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@update',
        'as' => 'reporter.update',
        'namespace' => 'Modules\\Reporter\\Http\\Controllers',
        'prefix' => 'admin/reporter',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reporter.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/reporter/delete/{reporter}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@destroy',
        'controller' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@destroy',
        'as' => 'reporter.destroy',
        'namespace' => 'Modules\\Reporter\\Http\\Controllers',
        'prefix' => 'admin/reporter',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'reporter' => 'uuid',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reporter.reporter_status_edit' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/reporter/reporter-status-edit/{reporter}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@reporterStatusEdit',
        'controller' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@reporterStatusEdit',
        'as' => 'reporter.reporter_status_edit',
        'namespace' => 'Modules\\Reporter\\Http\\Controllers',
        'prefix' => 'admin/reporter',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'reporter' => 'uuid',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reporter.last_20_access' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reporter/last-20-access',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@last-20-access',
        'controller' => 'Modules\\Reporter\\Http\\Controllers\\ReporterController@last-20-access',
        'as' => 'reporter.last_20_access',
        'namespace' => 'Modules\\Reporter\\Http\\Controllers',
        'prefix' => 'admin/reporter',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rt1ukeWursr1Z7PI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/rssfeeds',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000e1e0000000000000000";}}',
        'namespace' => 'Modules\\RssFeeds\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::rt1ukeWursr1Z7PI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rss_feeds.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rss_feeds/rss-links',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@index',
        'controller' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@index',
        'as' => 'rss_feeds.index',
        'namespace' => 'Modules\\RssFeeds\\Http\\Controllers',
        'prefix' => 'admin/rss_feeds',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rss_feeds.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rss_feeds/external-rss-feeds',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@show',
        'controller' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@show',
        'as' => 'rss_feeds.show',
        'namespace' => 'Modules\\RssFeeds\\Http\\Controllers',
        'prefix' => 'admin/rss_feeds',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rss_feeds.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rss_feeds/create-external-rss-feeds',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@create',
        'controller' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@create',
        'as' => 'rss_feeds.create',
        'namespace' => 'Modules\\RssFeeds\\Http\\Controllers',
        'prefix' => 'admin/rss_feeds',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rss_feeds.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/rss_feeds/store-external-rss-feeds',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@store',
        'controller' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@store',
        'as' => 'rss_feeds.store',
        'namespace' => 'Modules\\RssFeeds\\Http\\Controllers',
        'prefix' => 'admin/rss_feeds',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rss_feeds.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/rss_feeds/edit-external-rss-feeds/{rss}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@edit',
        'controller' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@edit',
        'as' => 'rss_feeds.edit',
        'namespace' => 'Modules\\RssFeeds\\Http\\Controllers',
        'prefix' => 'admin/rss_feeds',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rss_feeds.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/rss_feeds/update-external-rss-feeds/{rss}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@update',
        'controller' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@update',
        'as' => 'rss_feeds.update',
        'namespace' => 'Modules\\RssFeeds\\Http\\Controllers',
        'prefix' => 'admin/rss_feeds',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rss_feeds.status.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/rss_feeds/external-rss-status-update/{rss}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@updateStatus',
        'controller' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@updateStatus',
        'as' => 'rss_feeds.status.update',
        'namespace' => 'Modules\\RssFeeds\\Http\\Controllers',
        'prefix' => 'admin/rss_feeds',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'rss_feeds.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/rss_feeds/delete-external-rss-feeds/{rss}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@destroy',
        'controller' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@destroy',
        'as' => 'rss_feeds.destroy',
        'namespace' => 'Modules\\RssFeeds\\Http\\Controllers',
        'prefix' => 'admin/rss_feeds',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::whBs8lwLX2FP2g6n' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/seo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000e2e0000000000000000";}}',
        'namespace' => 'Modules\\Seo\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::whBs8lwLX2FP2g6n',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'seo.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/seo/meta-setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Seo\\Http\\Controllers\\SeoController@index',
        'controller' => 'Modules\\Seo\\Http\\Controllers\\SeoController@index',
        'as' => 'seo.index',
        'namespace' => 'Modules\\Seo\\Http\\Controllers',
        'prefix' => 'admin/seo',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'seo.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/seo/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Seo\\Http\\Controllers\\SeoController@store',
        'controller' => 'Modules\\Seo\\Http\\Controllers\\SeoController@store',
        'as' => 'seo.store',
        'namespace' => 'Modules\\Seo\\Http\\Controllers',
        'prefix' => 'admin/seo',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'seo.social_sites' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/seo/social-sites',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Seo\\Http\\Controllers\\SeoController@socialSites',
        'controller' => 'Modules\\Seo\\Http\\Controllers\\SeoController@socialSites',
        'as' => 'seo.social_sites',
        'namespace' => 'Modules\\Seo\\Http\\Controllers',
        'prefix' => 'admin/seo',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'seo.social_site_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/seo/social-site-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Seo\\Http\\Controllers\\SeoController@socialSiteStore',
        'controller' => 'Modules\\Seo\\Http\\Controllers\\SeoController@socialSiteStore',
        'as' => 'seo.social_site_store',
        'namespace' => 'Modules\\Seo\\Http\\Controllers',
        'prefix' => 'admin/seo',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'seo.social_link' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/seo/social-link',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Seo\\Http\\Controllers\\SeoController@socialLink',
        'controller' => 'Modules\\Seo\\Http\\Controllers\\SeoController@socialLink',
        'as' => 'seo.social_link',
        'namespace' => 'Modules\\Seo\\Http\\Controllers',
        'prefix' => 'admin/seo',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'seo.social_link_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/seo/social-link-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Seo\\Http\\Controllers\\SeoController@socialLinkStore',
        'controller' => 'Modules\\Seo\\Http\\Controllers\\SeoController@socialLinkStore',
        'as' => 'seo.social_link_store',
        'namespace' => 'Modules\\Seo\\Http\\Controllers',
        'prefix' => 'admin/seo',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'seo.sitemap_links' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/seo/sitemap-links',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Seo\\Http\\Controllers\\SeoController@sitemapLinks',
        'controller' => 'Modules\\Seo\\Http\\Controllers\\SeoController@sitemapLinks',
        'as' => 'seo.sitemap_links',
        'namespace' => 'Modules\\Seo\\Http\\Controllers',
        'prefix' => 'admin/seo',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'seo.script_manager' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/seo/script-manager',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Seo\\Http\\Controllers\\SeoController@scriptManager',
        'controller' => 'Modules\\Seo\\Http\\Controllers\\SeoController@scriptManager',
        'as' => 'seo.script_manager',
        'namespace' => 'Modules\\Seo\\Http\\Controllers',
        'prefix' => 'admin/seo',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'seo.script_manager_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/seo/script-manager-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Seo\\Http\\Controllers\\SeoController@scriptManagerStore',
        'controller' => 'Modules\\Seo\\Http\\Controllers\\SeoController@scriptManagerStore',
        'as' => 'seo.script_manager_store',
        'namespace' => 'Modules\\Seo\\Http\\Controllers',
        'prefix' => 'admin/seo',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::AZCAgaWLqEB4DPob' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000e3f0000000000000000";}}',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::AZCAgaWLqEB4DPob',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@settings',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@settings',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'applications.application' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/applications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ApplicationController@application',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ApplicationController@application',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'applications.application',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'applications.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/applications/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ApplicationController@update',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ApplicationController@update',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'applications.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'id' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'app.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/apps',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ApplicationController@appSetting',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ApplicationController@appSetting',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'app.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'app.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/apps',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ApplicationController@updateAppSetting',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ApplicationController@updateAppSetting',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'app.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'currencies.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/currencies',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'currencies.index',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CurrencyController@index',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CurrencyController@index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'currencies.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/currencies/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'currencies.create',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CurrencyController@create',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CurrencyController@create',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'currencies.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/currencies',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'currencies.store',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CurrencyController@store',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CurrencyController@store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'currencies.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/currencies/{currency}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'currencies.show',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CurrencyController@show',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CurrencyController@show',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'currencies.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/currencies/{currency}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'currencies.edit',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CurrencyController@edit',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CurrencyController@edit',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'currencies.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/currencies/{currency}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'currencies.update',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CurrencyController@update',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CurrencyController@update',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'currencies.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/currencies/{currency}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'currencies.destroy',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CurrencyController@destroy',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CurrencyController@destroy',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mails.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/mails',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'mails.index',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\MailController@index',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\MailController@index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mails.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/mails/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'mails.create',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\MailController@create',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\MailController@create',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mails.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/mails',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'mails.store',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\MailController@store',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\MailController@store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mails.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/mails/{mail}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'mails.show',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\MailController@show',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\MailController@show',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mails.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/mails/{mail}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'mails.edit',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\MailController@edit',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\MailController@edit',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mails.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/mails/{mail}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'mails.update',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\MailController@update',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\MailController@update',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mails.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/mails/{mail}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'mails.destroy',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\MailController@destroy',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\MailController@destroy',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'countries.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/countries',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'countries.index',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CountryController@index',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CountryController@index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'countries.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/countries/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'countries.create',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CountryController@create',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CountryController@create',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'countries.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/countries',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'countries.store',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CountryController@store',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CountryController@store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'countries.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/countries/{country}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'countries.show',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CountryController@show',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CountryController@show',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'countries.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/countries/{country}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'countries.edit',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CountryController@edit',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CountryController@edit',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'countries.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/countries/{country}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'countries.update',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CountryController@update',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CountryController@update',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'countries.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/countries/{country}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'countries.destroy',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CountryController@destroy',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CountryController@destroy',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social_api_keys.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/social-api-keys',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'social_api_keys.index',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SocialLoginApiController@index',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SocialLoginApiController@index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social_api_keys.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/social-api-keys/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'social_api_keys.create',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SocialLoginApiController@create',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SocialLoginApiController@create',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social_api_keys.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/social-api-keys',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'social_api_keys.store',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SocialLoginApiController@store',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SocialLoginApiController@store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social_api_keys.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/social-api-keys/{social_api_key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'social_api_keys.show',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SocialLoginApiController@show',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SocialLoginApiController@show',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social_api_keys.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/social-api-keys/{social_api_key}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'social_api_keys.edit',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SocialLoginApiController@edit',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SocialLoginApiController@edit',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social_api_keys.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/social-api-keys/{social_api_key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'social_api_keys.update',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SocialLoginApiController@update',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SocialLoginApiController@update',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'social_api_keys.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/social-api-keys/{social_api_key}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'social_api_keys.destroy',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SocialLoginApiController@destroy',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SocialLoginApiController@destroy',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'space-credential.update-status' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/space-credential/{space_credential}/update-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@updateStatus',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@updateStatus',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'space-credential.update-status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'space-credential.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/space-credential',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'space-credential.index',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@index',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'space-credential.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/space-credential/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'space-credential.create',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@create',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@create',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'space-credential.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/space-credential',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'space-credential.store',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@store',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'space-credential.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/space-credential/{space_credential}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'space-credential.show',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@show',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@show',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'space-credential.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/space-credential/{space_credential}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'space-credential.edit',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@edit',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@edit',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'space-credential.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/space-credential/{space_credential}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'space-credential.update',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@update',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@update',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'space-credential.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/space-credential/{space_credential}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'space-credential.destroy',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@destroy',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SpaceCredentialController@destroy',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backup.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/database-backup-reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\BackupController@index',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\BackupController@index',
        'as' => 'backup.index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/database-backup-reset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backup.create' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/database-backup-reset/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\BackupController@createBackup',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\BackupController@createBackup',
        'as' => 'backup.create',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/database-backup-reset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backup.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/database-backup-reset/download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\BackupController@download',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\BackupController@download',
        'as' => 'backup.download',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/database-backup-reset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backup.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/database-backup-reset/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\BackupController@destroy',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\BackupController@destroy',
        'as' => 'backup.delete',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/database-backup-reset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backup.delete.all' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/database-backup-reset/delete-all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\BackupController@destroyAll',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\BackupController@destroyAll',
        'as' => 'backup.delete.all',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/database-backup-reset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backup.factory_reset' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/database-backup-reset/factory-reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\BackupController@factoryReset',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\BackupController@factoryReset',
        'as' => 'backup.factory_reset',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/database-backup-reset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backup.database_import' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/database-backup-reset/database-import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\BackupController@databaseImport',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\BackupController@databaseImport',
        'as' => 'backup.database_import',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/database-backup-reset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backup.database_import_by_name' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/database-backup-reset/database-import-by-name',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\BackupController@databaseImportByName',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\BackupController@databaseImportByName',
        'as' => 'backup.database_import_by_name',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/database-backup-reset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backup.password_check' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/database-backup-reset/password-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\BackupController@passwordCheck',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\BackupController@passwordCheck',
        'as' => 'backup.password_check',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/database-backup-reset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'backup.demo.restore.ajax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/database-backup-reset/demo/restore',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\BackupController@ajaxRestore',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\BackupController@ajaxRestore',
        'as' => 'backup.demo.restore.ajax',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/database-backup-reset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sale.setting.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/setting/sale-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@sale_settings',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@sale_settings',
        'as' => 'sale.setting.index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sale.setting.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/setting/store-sale-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@store_sale_settings',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@store_sale_settings',
        'as' => 'sale.setting.store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sale.setting.tax' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/setting/tax-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@tax_settings',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@tax_settings',
        'as' => 'sale.setting.tax',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sale.setting.tax.get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/setting/get-tax-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@getTaxSettings',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@getTaxSettings',
        'as' => 'sale.setting.tax.get',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sale.setting.tax.for.group' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/setting/get-tax-settings-for-group',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@getTaxSettingsForTaxGroup',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@getTaxSettingsForTaxGroup',
        'as' => 'sale.setting.tax.for.group',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sale.setting.tax.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/setting/save-tax-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@store_tax_settings',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@store_tax_settings',
        'as' => 'sale.setting.tax.store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sale.tax.group.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/setting/store-tax-group',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@store_tax_group',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@store_tax_group',
        'as' => 'sale.tax.group.store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sale.tax.group.delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/setting/delete-tax-group',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@deleteTaxGroup',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@deleteTaxGroup',
        'as' => 'sale.tax.group.delete',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sale.tax.group.get' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/setting/get-tax-group-by-id',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@getTaxGroupById',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@getTaxGroupById',
        'as' => 'sale.tax.group.get',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product.setting.product' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/setting/product-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@product_settings',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@product_settings',
        'as' => 'product.setting.product',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'product.setting.product.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/setting/product-settings-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@product_settings_store',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@product_settings_store',
        'as' => 'product.setting.product.store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'purchase.setting.purchase' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/setting/purchase-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@purchase_settings',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@purchase_settings',
        'as' => 'purchase.setting.purchase',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'purchase.setting.purchase.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/setting/purchase-settings-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@purchase_settings_store',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@purchase_settings_store',
        'as' => 'purchase.setting.purchase.store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.setting.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/setting/invoice-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@invoiceSettings',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@invoiceSettings',
        'as' => 'invoice.setting.index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.setting.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/setting/invoice-settings-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@invoiceSettingUpdate',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@invoiceSettingUpdate',
        'as' => 'invoice.setting.update',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pos_invoice.setting.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/setting/pos-invoice-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@posInvoiceSettings',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@posInvoiceSettings',
        'as' => 'pos_invoice.setting.index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pos_invoice.setting.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/setting/pos-invoice-settings-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@posInvoiceSettingUpdate',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@posInvoiceSettingUpdate',
        'as' => 'pos_invoice.setting.update',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'zktSetup.add' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/setting/apimenuszkt/zkt/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ZktController@create',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ZktController@create',
        'as' => 'zktSetup.add',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting/apimenuszkt',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'zktSetup.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/setting/apimenuszkt/zkt/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ZktController@store',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ZktController@store',
        'as' => 'zktSetup.store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting/apimenuszkt',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'zktSetup.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/setting/apimenuszkt/zkt/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ZktController@index',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ZktController@index',
        'as' => 'zktSetup.list',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting/apimenuszkt',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'zktSetup.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/setting/apimenuszkt/zkt/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ZktController@edit',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ZktController@edit',
        'as' => 'zktSetup.edit',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting/apimenuszkt',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'id' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'zktSetup.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/setting/apimenuszkt/zkt/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ZktController@update',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ZktController@update',
        'as' => 'zktSetup.update',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting/apimenuszkt',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'id' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'zktSetup.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/setting/apimenuszkt/zkt/destroy/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ZktController@destroy',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ZktController@destroy',
        'as' => 'zktSetup.destroy',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting/apimenuszkt',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'id' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'docexpired-setup.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/setting/docexpired-setup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\DocExpiredSettingController@index',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\DocExpiredSettingController@index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
        'as' => 'docexpired-setup.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'docexpired-setup.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/setting/docexpired-setup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\DocExpiredSettingController@store',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\DocExpiredSettingController@store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
        'as' => 'docexpired-setup.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'subscriber.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/setting/subscriber-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SubscriberController@index',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SubscriberController@index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/setting',
        'where' => 
        array (
        ),
        'as' => 'subscriber.list',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'view_setup.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/web-setup/setup-top-breaking',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ViewSetupController@setupTopBreaking',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ViewSetupController@setupTopBreaking',
        'as' => 'view_setup.index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/web-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'view_setup.top_breaking_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/web-setup/top-breaking/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ViewSetupController@store',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ViewSetupController@store',
        'as' => 'view_setup.top_breaking_store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/web-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'view_setup.contact_page_setup' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/web-setup/contact-page-setup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ViewSetupController@contactPageSetup',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ViewSetupController@contactPageSetup',
        'as' => 'view_setup.contact_page_setup',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/web-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'view_setup.contact_page_setup_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/web-setup/contact-page-setup/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ViewSetupController@contactPageSetupStore',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ViewSetupController@contactPageSetupStore',
        'as' => 'view_setup.contact_page_setup_store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/web-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'view_setup.home_page_setup' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/web-setup/home-page-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ViewSetupController@homePageSettings',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ViewSetupController@homePageSettings',
        'as' => 'view_setup.home_page_setup',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/web-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'view_setup.save_home_page_settings' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/web-setup/save_home_page_settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ViewSetupController@homePageSettingsSave',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ViewSetupController@homePageSettingsSave',
        'as' => 'view_setup.save_home_page_settings',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/web-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'view_setup.home_page_setup_store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/web-setup/home-page-setup/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\ViewSetupController@homePageSettingsStore',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\ViewSetupController@homePageSettingsStore',
        'as' => 'view_setup.home_page_setup_store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/web-setup',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activity_log' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/access-log',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@activityLog',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@activityLog',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'activity_log',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'activity_log_destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/activity-log-destroy/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@activityLogDestroy',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@activityLogDestroy',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'activity_log_destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'id' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'multiple_delete_activity_log' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/multiple-activity-log-destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@multipleDeleteActivityLog',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@multipleDeleteActivityLog',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'multiple_delete_activity_log',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cookie.content' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/cookie-content',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@cookieContent',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@cookieContent',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'cookie.content',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'cookie.content.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/cookie-content/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SettingController@cookieContentUpdate',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SettingController@cookieContentUpdate',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'cookie.content.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'comments.comments_manage' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/comments/comments_manage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CommentsInfoController@index',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CommentsInfoController@index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'comments.comments_manage',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'comments.update' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/comments/comments_manage/update/{com_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CommentsInfoController@update',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CommentsInfoController@update',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'comments.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'comments.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/comments/destroy/{comment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\CommentsInfoController@destroy',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\CommentsInfoController@destroy',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'comments.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'comment' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'comments.reply.update' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/comments/reply/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\NewsCommentReplyController@update',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\NewsCommentReplyController@update',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'comments.reply.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'comments.reply.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/comments/reply/destroy/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\NewsCommentReplyController@destroy',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\NewsCommentReplyController@destroy',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'comments.reply.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'subscription.subscription_manage' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/subscription/subscription_manage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\Setting\\Http\\Controllers\\SubscriptionController@index',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\SubscriptionController@index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'subscription.subscription_manage',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.font.settings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/font/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'admin.font.settings.index',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\FontSettingController@index',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\FontSettingController@index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/font',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.font.settings.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/font/settings/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'admin.font.settings.create',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\FontSettingController@create',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\FontSettingController@create',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/font',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.font.settings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/font/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'admin.font.settings.store',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\FontSettingController@store',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\FontSettingController@store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/font',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.font.settings.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/font/settings/{setting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'admin.font.settings.show',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\FontSettingController@show',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\FontSettingController@show',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/font',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.font.settings.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/font/settings/{setting}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'admin.font.settings.edit',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\FontSettingController@edit',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\FontSettingController@edit',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/font',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.font.settings.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/font/settings/{setting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'admin.font.settings.update',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\FontSettingController@update',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\FontSettingController@update',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/font',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.font.settings.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/font/settings/{setting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'admin.font.settings.destroy',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\FontSettingController@destroy',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\FontSettingController@destroy',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/font',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.font.site.setup.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/font/site/setup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'admin.font.site.setup.index',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\FontSetupController@index',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\FontSetupController@index',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/font/site',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.font.site.setup.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/font/site/setup/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'admin.font.site.setup.create',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\FontSetupController@create',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\FontSetupController@create',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/font/site',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.font.site.setup.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/font/site/setup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'admin.font.site.setup.store',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\FontSetupController@store',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\FontSetupController@store',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/font/site',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.font.site.setup.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/font/site/setup/{setup}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'admin.font.site.setup.show',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\FontSetupController@show',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\FontSetupController@show',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/font/site',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.font.site.setup.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/font/site/setup/{setup}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'admin.font.site.setup.edit',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\FontSetupController@edit',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\FontSetupController@edit',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/font/site',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.font.site.setup.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/font/site/setup/{setup}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'admin.font.site.setup.update',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\FontSetupController@update',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\FontSetupController@update',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/font/site',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.font.site.setup.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/font/site/setup/{setup}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'admin.font.site.setup.destroy',
        'uses' => 'Modules\\Setting\\Http\\Controllers\\FontSetupController@destroy',
        'controller' => 'Modules\\Setting\\Http\\Controllers\\FontSetupController@destroy',
        'namespace' => 'Modules\\Setting\\Http\\Controllers',
        'prefix' => 'admin/font/site',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Voox1WF4pSvvvGzr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/story',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000ea50000000000000000";}}',
        'namespace' => 'Modules\\Story\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Voox1WF4pSvvvGzr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.story.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/story',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'admin.story.index',
        'uses' => 'Modules\\Story\\Http\\Controllers\\StoryController@index',
        'controller' => 'Modules\\Story\\Http\\Controllers\\StoryController@index',
        'namespace' => 'Modules\\Story\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.story.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/story/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'admin.story.create',
        'uses' => 'Modules\\Story\\Http\\Controllers\\StoryController@create',
        'controller' => 'Modules\\Story\\Http\\Controllers\\StoryController@create',
        'namespace' => 'Modules\\Story\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.story.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/story',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'admin.story.store',
        'uses' => 'Modules\\Story\\Http\\Controllers\\StoryController@store',
        'controller' => 'Modules\\Story\\Http\\Controllers\\StoryController@store',
        'namespace' => 'Modules\\Story\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.story.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/story/{story}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'admin.story.show',
        'uses' => 'Modules\\Story\\Http\\Controllers\\StoryController@show',
        'controller' => 'Modules\\Story\\Http\\Controllers\\StoryController@show',
        'namespace' => 'Modules\\Story\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.story.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/story/{story}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'admin.story.edit',
        'uses' => 'Modules\\Story\\Http\\Controllers\\StoryController@edit',
        'controller' => 'Modules\\Story\\Http\\Controllers\\StoryController@edit',
        'namespace' => 'Modules\\Story\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.story.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/story/{story}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'admin.story.update',
        'uses' => 'Modules\\Story\\Http\\Controllers\\StoryController@update',
        'controller' => 'Modules\\Story\\Http\\Controllers\\StoryController@update',
        'namespace' => 'Modules\\Story\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.story.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/story/{story}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'admin.story.destroy',
        'uses' => 'Modules\\Story\\Http\\Controllers\\StoryController@destroy',
        'controller' => 'Modules\\Story\\Http\\Controllers\\StoryController@destroy',
        'namespace' => 'Modules\\Story\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5CZLIuHPFB6Ajas5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/theme',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000ec20000000000000000";}}',
        'namespace' => 'Modules\\Theme\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::5CZLIuHPFB6Ajas5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.theme.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/theme',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'admin.theme.index',
        'uses' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@index',
        'controller' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@index',
        'namespace' => 'Modules\\Theme\\Http\\Controllers',
        'prefix' => 'admin/theme/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.theme.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/theme/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'admin.theme.create',
        'uses' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@create',
        'controller' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@create',
        'namespace' => 'Modules\\Theme\\Http\\Controllers',
        'prefix' => 'admin/theme/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.theme.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/theme',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'admin.theme.store',
        'uses' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@store',
        'controller' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@store',
        'namespace' => 'Modules\\Theme\\Http\\Controllers',
        'prefix' => 'admin/theme/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.theme.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/theme/{}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'admin.theme.show',
        'uses' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@show',
        'controller' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@show',
        'namespace' => 'Modules\\Theme\\Http\\Controllers',
        'prefix' => 'admin/theme/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.theme.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/theme/{}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'admin.theme.edit',
        'uses' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@edit',
        'controller' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@edit',
        'namespace' => 'Modules\\Theme\\Http\\Controllers',
        'prefix' => 'admin/theme/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.theme.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/theme/{}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'admin.theme.update',
        'uses' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@update',
        'controller' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@update',
        'namespace' => 'Modules\\Theme\\Http\\Controllers',
        'prefix' => 'admin/theme/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.theme.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/theme/{}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'as' => 'admin.theme.destroy',
        'uses' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@destroy',
        'controller' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@destroy',
        'namespace' => 'Modules\\Theme\\Http\\Controllers',
        'prefix' => 'admin/theme/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'themes.updateActive' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/theme/update-active',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@updateActiveTheme',
        'controller' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@updateActiveTheme',
        'namespace' => 'Modules\\Theme\\Http\\Controllers',
        'prefix' => 'admin/theme',
        'where' => 
        array (
        ),
        'as' => 'themes.updateActive',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'themes.updateColors' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/theme/update-colors',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@updateColors',
        'controller' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@updateColors',
        'namespace' => 'Modules\\Theme\\Http\\Controllers',
        'prefix' => 'admin/theme',
        'where' => 
        array (
        ),
        'as' => 'themes.updateColors',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'themes.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/theme/settings/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'web',
          2 => 'auth',
        ),
        'uses' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@resetThemeSettings',
        'controller' => 'Modules\\Theme\\Http\\Controllers\\ThemeController@resetThemeSettings',
        'namespace' => 'Modules\\Theme\\Http\\Controllers',
        'prefix' => 'admin/theme',
        'where' => 
        array (
        ),
        'as' => 'themes.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZE93sB3BLXH0Dn1N' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/usermanagement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000ecd0000000000000000";}}',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ZE93sB3BLXH0Dn1N',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-types.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-types',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'user-types.index',
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserTypeController@index',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserTypeController@index',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-types.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-types/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'user-types.create',
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserTypeController@create',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserTypeController@create',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-types.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user-types',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'user-types.store',
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserTypeController@store',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserTypeController@store',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-types.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-types/{user_type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'user-types.show',
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserTypeController@show',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserTypeController@show',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-types.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-types/{user_type}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'user-types.edit',
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserTypeController@edit',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserTypeController@edit',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-types.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/user-types/{user_type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'user-types.update',
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserTypeController@update',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserTypeController@update',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-types.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/user-types/{user_type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'user-types.destroy',
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserTypeController@destroy',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserTypeController@destroy',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password-settings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/password-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'password-settings.index',
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\PasswordSettingController@index',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\PasswordSettingController@index',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password-settings.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/password-settings/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'password-settings.create',
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\PasswordSettingController@create',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\PasswordSettingController@create',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password-settings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/password-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'password-settings.store',
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\PasswordSettingController@store',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\PasswordSettingController@store',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password-settings.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/password-settings/{password_setting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'password-settings.show',
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\PasswordSettingController@show',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\PasswordSettingController@show',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password-settings.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/password-settings/{password_setting}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'password-settings.edit',
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\PasswordSettingController@edit',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\PasswordSettingController@edit',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password-settings.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/password-settings/{password_setting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'password-settings.update',
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\PasswordSettingController@update',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\PasswordSettingController@update',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password-settings.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/password-settings/{password_setting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'password-settings.destroy',
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\PasswordSettingController@destroy',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\PasswordSettingController@destroy',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-user-by-ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@getUserByAjax',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@getUserByAjax',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'user.search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user-profile-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@update',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@update',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'profile.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile_image.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user-profile-image-update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@profilePictureUpdate',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@profilePictureUpdate',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'profile_image.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'id' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile_cover_image.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user-profile-cover-image-update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@coverImageUpdate',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@coverImageUpdate',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'profile_cover_image.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'id' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.changePassword' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user-change-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@updatePassword',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@updatePassword',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'profile.changePassword',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/role-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@roleList',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@roleList',
        'as' => 'role.list',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.add' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/role-add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@roleCreate',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@roleCreate',
        'as' => 'role.add',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/role-view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@roleView',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@roleView',
        'as' => 'role.view',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/role-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@roleStore',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@roleStore',
        'as' => 'role.store',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/role-edit/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@roleEdit',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@roleEdit',
        'as' => 'role.edit',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/role-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@roleUpdate',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@roleUpdate',
        'as' => 'role.update',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/role-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@roleDelete',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@roleDelete',
        'as' => 'role.delete',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.menu.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/menu-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@menuList',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@menuList',
        'as' => 'role.menu.list',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.menu.add' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/menu-add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@menuCreate',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@menuCreate',
        'as' => 'role.menu.add',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.menu.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/menu-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@menuStore',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@menuStore',
        'as' => 'role.menu.store',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.menu.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/menu-edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@menuEdit',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@menuEdit',
        'as' => 'role.menu.edit',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.menu.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/menu-update/{menupermission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@menuUpdate',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@menuUpdate',
        'as' => 'role.menu.update',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'menupermission' => 'uuid',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.menu.delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/menu-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@menuDelete',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@menuDelete',
        'as' => 'role.menu.delete',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.permission.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permission-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@permissionList',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@permissionList',
        'as' => 'role.permission.list',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.permission.add' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permission-add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@permissionCreate',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@permissionCreate',
        'as' => 'role.permission.add',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.permission.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/permission-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@permissionStore',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@permissionStore',
        'as' => 'role.permission.store',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.permission.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permission-edit/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@permissionEdit',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@permissionEdit',
        'as' => 'role.permission.edit',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.permission.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/permission-update/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@permissionUpdate',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@permissionUpdate',
        'as' => 'role.permission.update',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'permission' => 'uuid',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.permission.delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/permission-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@permissionDelete',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\RoleManagementController@permissionDelete',
        'as' => 'role.permission.delete',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.user.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@userList',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@userList',
        'as' => 'role.user.list',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.user.add' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@userCreate',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@userCreate',
        'as' => 'role.user.add',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.user.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@userStore',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@userStore',
        'as' => 'role.user.store',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.user.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-edit/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@userEdit',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@userEdit',
        'as' => 'role.user.edit',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.user.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user-update/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@userUpdate',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@userUpdate',
        'as' => 'role.user.update',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'role.user.delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user-delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@userDelete',
        'controller' => 'Modules\\UserManagement\\Http\\Controllers\\UserManagementController@userDelete',
        'as' => 'role.user.delete',
        'namespace' => 'Modules\\UserManagement\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2A5IdwX1dUz9K6qk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/videonews',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000eef0000000000000000";}}',
        'namespace' => 'Modules\\VideoNews\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::2A5IdwX1dUz9K6qk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YFKkKttqN7BRFsyX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/videonews',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@index',
        'controller' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@index',
        'namespace' => 'Modules\\VideoNews\\Http\\Controllers',
        'prefix' => 'admin/videonews',
        'where' => 
        array (
        ),
        'as' => 'generated::YFKkKttqN7BRFsyX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'videonews.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/videonews/videonews-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@index',
        'controller' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@index',
        'as' => 'videonews.index',
        'namespace' => 'Modules\\VideoNews\\Http\\Controllers',
        'prefix' => 'admin/videonews',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'videonews.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/videonews/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@create',
        'controller' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@create',
        'as' => 'videonews.create',
        'namespace' => 'Modules\\VideoNews\\Http\\Controllers',
        'prefix' => 'admin/videonews',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'videonews.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/videonews/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@store',
        'controller' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@store',
        'as' => 'videonews.store',
        'namespace' => 'Modules\\VideoNews\\Http\\Controllers',
        'prefix' => 'admin/videonews',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'videonews.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/videonews/edit/{videonews}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@edit',
        'controller' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@edit',
        'as' => 'videonews.edit',
        'namespace' => 'Modules\\VideoNews\\Http\\Controllers',
        'prefix' => 'admin/videonews',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'videonews' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'videonews.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/videonews/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@update',
        'controller' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@update',
        'as' => 'videonews.update',
        'namespace' => 'Modules\\VideoNews\\Http\\Controllers',
        'prefix' => 'admin/videonews',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'videonews.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/videonews/delete/{videonews}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@destroy',
        'controller' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@destroy',
        'as' => 'videonews.destroy',
        'namespace' => 'Modules\\VideoNews\\Http\\Controllers',
        'prefix' => 'admin/videonews',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'videonews' => 'id',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'videonews.status.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/videonews/videonews-status-update/{videonews}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@updateStatus',
        'controller' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@updateStatus',
        'as' => 'videonews.status.update',
        'namespace' => 'Modules\\VideoNews\\Http\\Controllers',
        'prefix' => 'admin/videonews',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'videonews.delete.video' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/videonews/{videonews}/delete-video',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@deleteVideo',
        'controller' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@deleteVideo',
        'as' => 'videonews.delete.video',
        'namespace' => 'Modules\\VideoNews\\Http\\Controllers',
        'prefix' => 'admin/videonews',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'videonews.delete.image' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/videonews/{videonews}/delete-image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@deleteImage',
        'controller' => 'Modules\\VideoNews\\Http\\Controllers\\VideoNewsController@deleteImage',
        'as' => 'videonews.delete.image',
        'namespace' => 'Modules\\VideoNews\\Http\\Controllers',
        'prefix' => 'admin/videonews',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Sj9OE7oPEIG3Guj4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000fac0000000000000000";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Sj9OE7oPEIG3Guj4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2aPjqF6pjZa8LaLQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:63:"function () {
    return \\sendSuccessResponse(\'Okay\',\'\',200);
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000fab0000000000000000";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::2aPjqF6pjZa8LaLQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pGF7V1uqSmj0w9Dg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/category-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@categoryList',
        'controller' => 'App\\Http\\Controllers\\ApiController@categoryList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::pGF7V1uqSmj0w9Dg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zSrd9h0eMvT7vk0w' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/sidebar-categories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@sidebarCategories',
        'controller' => 'App\\Http\\Controllers\\ApiController@sidebarCategories',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::zSrd9h0eMvT7vk0w',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::o1TCTri022M2kQpb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/home-page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@homeData',
        'controller' => 'App\\Http\\Controllers\\ApiController@homeData',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::o1TCTri022M2kQpb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::RoeCaoQLLC9nsRrd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/latest-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@latestPost',
        'controller' => 'App\\Http\\Controllers\\ApiController@latestPost',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::RoeCaoQLLC9nsRrd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oqGurcwYiRHr5IPM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/populer-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@popularPost',
        'controller' => 'App\\Http\\Controllers\\ApiController@popularPost',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::oqGurcwYiRHr5IPM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::My1CDKW6YNGd9trD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/web-setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@webSetting',
        'controller' => 'App\\Http\\Controllers\\ApiController@webSetting',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::My1CDKW6YNGd9trD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XZfQuVBSBsO3do3d' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/post-detail/{encode_title}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@newsDetails',
        'controller' => 'App\\Http\\Controllers\\ApiController@newsDetails',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::XZfQuVBSBsO3do3d',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rtnSjhePBFiGLQ7A' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/category-post/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@categoryPost',
        'controller' => 'App\\Http\\Controllers\\ApiController@categoryPost',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::rtnSjhePBFiGLQ7A',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WFgzOPaXw1Fx4T6q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/page-link',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@pageLink',
        'controller' => 'App\\Http\\Controllers\\ApiController@pageLink',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::WFgzOPaXw1Fx4T6q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xLcT1y6QwmRzuHTd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/page-data/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@pageData',
        'controller' => 'App\\Http\\Controllers\\ApiController@pageData',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::xLcT1y6QwmRzuHTd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zB0wKjIOaG5UjNPO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/contact-us',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@contactUs',
        'controller' => 'App\\Http\\Controllers\\ApiController@contactUs',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::zB0wKjIOaG5UjNPO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::e0lcoG1g2g1wiuUR' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/topics-post/{tag}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@tagPost',
        'controller' => 'App\\Http\\Controllers\\ApiController@tagPost',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::e0lcoG1g2g1wiuUR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::slGysoesFOlXNkpB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/trending-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@trendingPost',
        'controller' => 'App\\Http\\Controllers\\ApiController@trendingPost',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::slGysoesFOlXNkpB',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::WaaSmmHE7ByPfj8n' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/tag-posts/{topic}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@tagPost',
        'controller' => 'App\\Http\\Controllers\\ApiController@tagPost',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::WaaSmmHE7ByPfj8n',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lZGW5YRVYDh4qVPk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/topic-posts/{topic}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@topicPost',
        'controller' => 'App\\Http\\Controllers\\ApiController@topicPost',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::lZGW5YRVYDh4qVPk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::w30Kw8jNFHgWX8Us' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/archive-posts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@archivePosts',
        'controller' => 'App\\Http\\Controllers\\ApiController@archivePosts',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::w30Kw8jNFHgWX8Us',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zxTA4WQNwxEq0T7O' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/teams',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@ourTeam',
        'controller' => 'App\\Http\\Controllers\\ApiController@ourTeam',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::zxTA4WQNwxEq0T7O',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5o0C2WrIiDLmY4gf' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/user-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@userPost',
        'controller' => 'App\\Http\\Controllers\\ApiController@userPost',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::5o0C2WrIiDLmY4gf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Fhhz0FXwFJecGGSc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/social-link',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@socialLink',
        'controller' => 'App\\Http\\Controllers\\ApiController@socialLink',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Fhhz0FXwFJecGGSc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GWOFBdSYVJCqV8CP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/divisions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@divisions',
        'controller' => 'App\\Http\\Controllers\\ApiController@divisions',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::GWOFBdSYVJCqV8CP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sE4cUDfWnrhrhULz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/districts/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@districts',
        'controller' => 'App\\Http\\Controllers\\ApiController@districts',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::sE4cUDfWnrhrhULz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pHbFIuHnWj7jwgkq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/upazilas/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@upazilas',
        'controller' => 'App\\Http\\Controllers\\ApiController@upazilas',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::pHbFIuHnWj7jwgkq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::agddOe0jgXR4g4Qb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/search-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@postSearch',
        'controller' => 'App\\Http\\Controllers\\ApiController@postSearch',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::agddOe0jgXR4g4Qb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IEoUI8SLhyNXf08O' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/photo-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@photoPosts',
        'controller' => 'App\\Http\\Controllers\\ApiController@photoPosts',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::IEoUI8SLhyNXf08O',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::BFbUE8E3m6lzm0CJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/photo-home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@photoHomePosts',
        'controller' => 'App\\Http\\Controllers\\ApiController@photoHomePosts',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::BFbUE8E3m6lzm0CJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tDLBnHPp4Reoxl6v' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/xml-category-all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@sitemapXmlCategory',
        'controller' => 'App\\Http\\Controllers\\ApiController@sitemapXmlCategory',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::tDLBnHPp4Reoxl6v',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fH5MQjBs34x702dg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/xml-category-post',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@sitemapXml',
        'controller' => 'App\\Http\\Controllers\\ApiController@sitemapXml',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::fH5MQjBs34x702dg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mwndN9HKhf7Miwr5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/metadata',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\ApiController@metaAllData',
        'controller' => 'App\\Http\\Controllers\\ApiController@metaAllData',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::mwndN9HKhf7Miwr5',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'update.guides' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/update/guides',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\UpdateGuides@index',
        'controller' => 'App\\Http\\Controllers\\UpdateGuides@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'update.guides',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::GFPinHVMOuGM8Cwz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'latest/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\UpdateGuides@runUpdatedCommand',
        'controller' => 'App\\Http\\Controllers\\UpdateGuides@runUpdatedCommand',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::GFPinHVMOuGM8Cwz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MF1YoeSVCKgknkm3' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dev/artisan-http/storage-link',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:211:"function () {
    \\Illuminate\\Support\\Facades\\Artisan::call(\'module:asset-link\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'storage:unlink\');
    \\Illuminate\\Support\\Facades\\Artisan::call(\'storage:link\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000fce0000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::MF1YoeSVCKgknkm3',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8Vd0m4BVYNXK8Num' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:63:"function () {
        return \\redirect()->route(\'login\');
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000fd20000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::8Vd0m4BVYNXK8Num',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'throttle:5,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Np68XMXbfugJlb50' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'throttle:5,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Np68XMXbfugJlb50',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'throttle:5,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'throttle:5,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::k87WGDlZi2BvtiVH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'throttle:5,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::k87WGDlZi2BvtiVH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'throttle:5,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/password/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'throttle:5,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/password/reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'throttle:5,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'throttle:5,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'throttle:5,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::IVE2PwPUK4hnFUCM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'throttle:5,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::IVE2PwPUK4hnFUCM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-localization-strings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/get-localization-strings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LocalizationController@index',
        'controller' => 'App\\Http\\Controllers\\LocalizationController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'get-localization-strings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gceHsxd5pT3fxfLW' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/get-localization-strings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LocalizationController@store',
        'controller' => 'App\\Http\\Controllers\\LocalizationController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::gceHsxd5pT3fxfLW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'isAdmin',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staffHome' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/dashboard/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@staffHome',
        'controller' => 'App\\Http\\Controllers\\HomeController@staffHome',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'staffHome',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'myProfile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/dashboard/employee',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@myProfile',
        'controller' => 'App\\Http\\Controllers\\HomeController@myProfile',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'myProfile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'editMyProfile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/dashboard/employee/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@editMyProfile',
        'controller' => 'App\\Http\\Controllers\\HomeController@editMyProfile',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'editMyProfile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'empProfile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/dashboard/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@empProfile',
        'controller' => 'App\\Http\\Controllers\\HomeController@empProfile',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'empProfile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'photo-library.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/photo-library/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\PhotoLibraryController@show',
        'controller' => 'App\\Http\\Controllers\\PhotoLibraryController@show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'photo-library.view',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'photo-library.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/photo-library',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'photo-library.index',
        'uses' => 'App\\Http\\Controllers\\PhotoLibraryController@index',
        'controller' => 'App\\Http\\Controllers\\PhotoLibraryController@index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'photo-library.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/photo-library/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'photo-library.create',
        'uses' => 'App\\Http\\Controllers\\PhotoLibraryController@create',
        'controller' => 'App\\Http\\Controllers\\PhotoLibraryController@create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'photo-library.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/photo-library',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'photo-library.store',
        'uses' => 'App\\Http\\Controllers\\PhotoLibraryController@store',
        'controller' => 'App\\Http\\Controllers\\PhotoLibraryController@store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'photo-library.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/photo-library/{photo_library}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'as' => 'photo-library.destroy',
        'uses' => 'App\\Http\\Controllers\\PhotoLibraryController@destroy',
        'controller' => 'App\\Http\\Controllers\\PhotoLibraryController@destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'all_clear' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/all-clear',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@allClear',
        'controller' => 'App\\Http\\Controllers\\HomeController@allClear',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'all_clear',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pPzAVvQhLNignlXS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/insert-language',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:358:"function () {
        \\Illuminate\\Support\\Facades\\DB::table(\'langstrings\')->truncate();
        $lang_strs = \\__(\'language\');
        foreach ($lang_strs as $i => $str) {
            $lang = new \\Modules\\Localize\\Entities\\Langstring();
            $lang->key = $i;
            $lang->save();
        }
        return \'Phrase Inserted Successfully..!!\';
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000fe90000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::pPzAVvQhLNignlXS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Yw7ko9qSBRYYm7M8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/insert-language-value',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:472:"function () {
        // DB::table(\'langstrvals\')->truncate();
        $lang_strs = \\__(\'language\');

        $key = 0;
        foreach ($lang_strs as $i => $str) {
            $lang = new \\Modules\\Localize\\Entities\\Langstrval();
            $lang->localize_id = 2;
            $lang->langstring_id = $key + 1;
            $lang->phrase_value = $str;
            $lang->save();

            $key++;
        }

        return \'Phrase Value Inserted Successfully..!!\';
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000fea0000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::Yw7ko9qSBRYYm7M8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XRIeCk54XbSskZKp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/test1',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:136:"function () {
        \\session()->put(\'test1\', \'Phrase Value Inserted Successfully..!!\');
        return \\session()->get(\'test1\');
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000ff00000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
        'as' => 'generated::XRIeCk54XbSskZKp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sitemap.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sitemap_index.xml',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\SitemapController@index',
        'controller' => 'App\\Http\\Controllers\\Website\\SitemapController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'sitemap.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sitemap.posts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sitemap_posts_{page}.xml',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\SitemapController@posts',
        'controller' => 'App\\Http\\Controllers\\Website\\SitemapController@posts',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'sitemap.posts',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sitemap.pages' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sitemap_pages.xml',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\SitemapController@pages',
        'controller' => 'App\\Http\\Controllers\\Website\\SitemapController@pages',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'sitemap.pages',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sitemap.categories' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sitemap_categories.xml',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\SitemapController@categories',
        'controller' => 'App\\Http\\Controllers\\Website\\SitemapController@categories',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'sitemap.categories',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sitemap.news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sitemap_news.xml',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\SitemapController@news',
        'controller' => 'App\\Http\\Controllers\\Website\\SitemapController@news',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'sitemap.news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sitemap.videos' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sitemap_videos.xml',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\SitemapController@videos',
        'controller' => 'App\\Http\\Controllers\\Website\\SitemapController@videos',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'sitemap.videos',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sitemap.opinions' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sitemap_opinions.xml',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\SitemapController@opinions',
        'controller' => 'App\\Http\\Controllers\\Website\\SitemapController@opinions',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'sitemap.opinions',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sitemap.probashi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sitemap_probashi.xml',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\SitemapController@probashi',
        'controller' => 'App\\Http\\Controllers\\Website\\SitemapController@probashi',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'sitemap.probashi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.probashi-janala-news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'probashi-janala-news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@probashiJanalaIndex',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@probashiJanalaIndex',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.probashi-janala-news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::lOINzdySZ9r8zPfM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{lang}/registration',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@Registration',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@Registration',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::lOINzdySZ9r8zPfM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7Z5goWDyJR94k3RV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'registration',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@Registration',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@Registration',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::7Z5goWDyJR94k3RV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account.lang.setting' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{lang}/account/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:webuser',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\ProfileController@index',
        'controller' => 'App\\Http\\Controllers\\Website\\ProfileController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'account.lang.setting',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account.setting' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'account/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:webuser',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\ProfileController@index',
        'controller' => 'App\\Http\\Controllers\\Website\\ProfileController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'account.setting',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account.probashi.news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'account/probashi-news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:webuser',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\ProbashiNewsController@index',
        'controller' => 'App\\Http\\Controllers\\Website\\ProbashiNewsController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'account.probashi.news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account.probashi.news.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'account/probashi-news/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:webuser',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\ProbashiNewsController@create',
        'controller' => 'App\\Http\\Controllers\\Website\\ProbashiNewsController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'account.probashi.news.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account.setting.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'account/settings/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:webuser',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\ProfileController@update',
        'controller' => 'App\\Http\\Controllers\\Website\\ProfileController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'account.setting.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account.setting.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'account/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:webuser',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\ProfileController@destroy',
        'controller' => 'App\\Http\\Controllers\\Website\\ProfileController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'account.setting.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.news.comments.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/news/comments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:webuser',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\NewsCommentController@store',
        'controller' => 'App\\Http\\Controllers\\Website\\NewsCommentController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user.news.comments.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.news.reply.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/news/comment-reply',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:webuser',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\NewsCommentReplyController@store',
        'controller' => 'App\\Http\\Controllers\\Website\\NewsCommentReplyController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user.news.reply.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'connect-with-google' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'connect-with-google',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@redirectToGoogle',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@redirectToGoogle',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'connect-with-google',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'google-callback' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'google/callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@handleGoogleCallback',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@handleGoogleCallback',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'google-callback',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'connect-with-facebook' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'connect-with-facebook',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@redirectToFacebook',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@redirectToFacebook',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'connect-with-facebook',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'facebook-callback' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'facebook/callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@handleFacebookCallback',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@handleFacebookCallback',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'facebook-callback',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'webuser.lang.registration' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '{lang}/registration/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'throttle:5,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@store',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'webuser.lang.registration',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'webuser.registration' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'registration/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'throttle:5,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@store',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'webuser.registration',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'webuser.login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'throttle:5,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@manualLogin',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@manualLogin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'webuser.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'webuser.lang.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '{lang}/web/user/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'webuser.lang.logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'webuser.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'web/user/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'webuser.logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ajax.section-four-news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ajax/section-four-news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@getSectionFourNewsAjax',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@getSectionFourNewsAjax',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ajax.section-four-news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ajax.section-five-first-news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ajax/section-five-first-news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@getSectionFiveFirstNewsAjax',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@getSectionFiveFirstNewsAjax',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ajax.section-five-first-news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ajax.section-five-second-news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ajax/section-five-second-news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@getSectionFiveSecondNewsAjax',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@getSectionFiveSecondNewsAjax',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ajax.section-five-second-news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ajax.section-five-third-news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ajax/section-five-third-news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@getSectionFiveThirdNewsAjax',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@getSectionFiveThirdNewsAjax',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ajax.section-five-third-news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ajax.section-five-fourth-news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ajax/section-five-fourth-news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@getSectionFiveFourthNewsAjax',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@getSectionFiveFourthNewsAjax',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ajax.section-five-fourth-news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'load.more.category.news' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'load-more-category-news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@loadMoreCategoryNewsAjax',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@loadMoreCategoryNewsAjax',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'load.more.category.news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'load.more.probashi.news' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'load-more-probashi-news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@loadMoreProbashiNewsAjax',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@loadMoreProbashiNewsAjax',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'load.more.probashi.news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ajax.poll.vote' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'ajax/vote',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@ajaxVote',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@ajaxVote',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ajax.poll.vote',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ajax.poll.result' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ajax/vote/result/{poll}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@ajaxVoteResult',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@ajaxVoteResult',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ajax.poll.result',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'load.more.video.news' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'load-more-video-news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@loadMoreVideoNewsAjax',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@loadMoreVideoNewsAjax',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'load.more.video.news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'subscribe.ajax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'subscribe',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@ajaxSubscribe',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@ajaxSubscribe',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'subscribe.ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'google.news.rss' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'rss.xml',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@googleNewsRss',
        'controller' => 'Modules\\RssFeeds\\Http\\Controllers\\RssFeedsController@googleNewsRss',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'google.news.rss',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.change.mode' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mode/change/{mode}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@changeMode',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@changeMode',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.change.mode',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@search',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@search',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.lang.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{lang}/search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@search',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@search',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.lang.search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'lang' => '[a-zA-Z]{2}',
        'param' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.archive.news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'archive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@archiveNews',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@archiveNews',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.archive.news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.lang.archive.news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{lang}/archive',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@archiveNews',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@archiveNews',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.lang.archive.news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'lang' => '[a-zA-Z]{2}',
        'param' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.error-page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '404-page-not-found',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@errorPage',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@errorPage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.error-page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.lang.error-page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{lang}/404-page-not-found',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@langErrorPage',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@langErrorPage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.lang.error-page',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.story-details.news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-stories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@storyDetailsNews',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@storyDetailsNews',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.story-details.news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.story-details.lang.news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{lang}/web-stories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@storyDetailsLangNews',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@storyDetailsLangNews',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.story-details.lang.news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.story-gallery' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'web-stories/{param}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@storyGallery',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@storyGallery',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.story-gallery',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'param' => '[\\p{L}\\p{M}\\p{N}_\\-]+',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.lang.story-gallery' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{lang}/web-stories/{param}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@storyLangGallery',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@storyLangGallery',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.lang.story-gallery',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'lang' => '[a-zA-Z]{2}',
        'param' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.probash-news-tv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'probash-news-tv/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@probashNewsTvDetails',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@probashNewsTvDetails',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.probash-news-tv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'slug' => '[\\p{L}\\p{M}\\p{N}_\\-]+',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.lang.probash-news-tv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{lang}/probash-news-tv/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@probashNewsTvDetailsLang',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@probashNewsTvDetailsLang',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.lang.probash-news-tv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'lang' => '[a-zA-Z]{2}',
        'slug' => '[\\p{L}\\p{M}\\p{N}_\\-]+',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.probashi-news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'probashi-news-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@probashiNewsList',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@probashiNewsList',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.probashi-news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.lang.probashi-news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{lang}/probashi-news-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@probashiNewsListLang',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@probashiNewsListLang',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.lang.probashi-news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'lang' => '[a-zA-Z]{2}',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.district.filter' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'district-news-filter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@filterDistrictNews',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@filterDistrictNews',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.district.filter',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.district.news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'district/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@districtNews',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@districtNews',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.district.news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.lang.district.news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{lang}/district/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@districtNews',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@districtNews',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.lang.district.news',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'lang' => '[a-zA-Z]{2}',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.handle' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{param}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@handle',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@handle',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.handle',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'param' => '[\\p{L}\\p{M}\\p{N}_\\-]+',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website._handle' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{lang}/{param}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\HomeController@_handle',
        'controller' => 'App\\Http\\Controllers\\Website\\HomeController@_handle',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website._handle',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'lang' => '[a-zA-Z]{2}',
        'param' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web.forgot.password' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'forgot/password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Website\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'web.forgot.password',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web.password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forgot/password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Website\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'web.password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'webuser.password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'webuser/reset-password/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Website\\ResetPasswordController@showResetForm',
        'as' => 'webuser.password.reset',
        'namespace' => NULL,
        'prefix' => '/webuser',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'webuser.password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'webuser/reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Website\\ResetPasswordController@reset',
        'as' => 'webuser.password.update',
        'namespace' => NULL,
        'prefix' => '/webuser',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web.probashi-news.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'probashi-news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:webuser',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\ProbashiNewsController@store',
        'controller' => 'App\\Http\\Controllers\\Website\\ProbashiNewsController@store',
        'as' => 'web.probashi-news.store',
        'namespace' => NULL,
        'prefix' => '/probashi-news',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web.probashi-news.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'probashi-news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:webuser',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\ProbashiNewsController@edit',
        'controller' => 'App\\Http\\Controllers\\Website\\ProbashiNewsController@edit',
        'as' => 'web.probashi-news.edit',
        'namespace' => NULL,
        'prefix' => '/probashi-news',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'web.probashi-news.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'probashi-news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:webuser',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\ProbashiNewsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Website\\ProbashiNewsController@destroy',
        'as' => 'web.probashi-news.destroy',
        'namespace' => NULL,
        'prefix' => '/probashi-news',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ASC5v4xGrjspTynQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => 'xmlrpc.php',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:28:"function () { \\abort(403); }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000102f0000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ASC5v4xGrjspTynQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
