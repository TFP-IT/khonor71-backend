<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;
use Modules\UserManagement\Entities\PerMenu;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $superAdmin = Role::where('name', 'Super Admin')->first();

        // 1. Helper to find or create PerMenu
        $getOrCreateMenu = function ($name, $parentId = null, $label = 1) {
            $menu = PerMenu::where('menu_name', $name)->first();
            if (!$menu) {
                $menu = PerMenu::create([
                    'uuid' => (string) Str::uuid(),
                    'menu_name' => $name,
                    'parentmenu_id' => $parentId,
                    'lable' => $label,
                ]);
            } else {
                $menu->update([
                    'parentmenu_id' => $parentId,
                    'lable' => $label,
                ]);
            }
            return $menu;
        };

        // 2. Helper to assign or create 4 standard CRUD permissions
        $syncMenuPermissions = function ($menuModel, $baseName) use ($superAdmin) {
            $actions = ['create', 'read', 'update', 'delete'];
            foreach ($actions as $action) {
                $permName = "{$action}_{$baseName}";
                $permission = Permission::firstOrCreate(
                    ['name' => $permName, 'guard_name' => 'web'],
                    ['per_menu_id' => $menuModel->id]
                );

                if ($permission->per_menu_id !== $menuModel->id) {
                    $permission->update(['per_menu_id' => $menuModel->id]);
                }

                if ($superAdmin && !$superAdmin->hasPermissionTo($permName)) {
                    $superAdmin->givePermissionTo($permission);
                }
            }
        };

        // 3. Fix Probashi News
        $probashiMenu = $getOrCreateMenu('Probashi News', null, 1);
        $syncMenuPermissions($probashiMenu, 'probashi_news');

        // 4. Fix News submenus: Story Manage, AI News Review, and AI RSS Sources
        $newsMenu = PerMenu::where('menu_name', 'News')->first();
        $newsParentId = $newsMenu ? $newsMenu->id : null;

        $storyMenu = $getOrCreateMenu('Story Manage', $newsParentId, 2);
        $syncMenuPermissions($storyMenu, 'story');

        $aiNewsMenu = $getOrCreateMenu('AI News Review', $newsParentId, 2);
        $syncMenuPermissions($aiNewsMenu, 'ai_news');

        $aiSourcesMenu = $getOrCreateMenu('AI RSS Sources', $newsParentId, 2);
        $syncMenuPermissions($aiSourcesMenu, 'ai_rss_sources');

        // 5. Fix AI Writer
        $aiWriterMenu = $getOrCreateMenu('AI Writer', null, 1);
        $syncMenuPermissions($aiWriterMenu, 'ai_writer');

        // 6. Fix Web Setup and its submenus
        $webSetupMenu = $getOrCreateMenu('Web Setup', null, 1);
        $syncMenuPermissions($webSetupMenu, 'web_setup');

        $topBreakingMenu = $getOrCreateMenu('Setup Top Breaking Post', $webSetupMenu->id, 2);
        $syncMenuPermissions($topBreakingMenu, 'setup_top_breaking_post');

        $homePageMenu = $getOrCreateMenu('Home Page', $webSetupMenu->id, 2);
        $syncMenuPermissions($homePageMenu, 'home_page');

        $contactPageMenu = $getOrCreateMenu('Contact Page Setup', $webSetupMenu->id, 2);
        $syncMenuPermissions($contactPageMenu, 'contact_page_setup');

        // 7. Fix Script Manager under SEO
        $seoMenu = PerMenu::where('menu_name', 'SEO')->first();
        if ($seoMenu) {
            $scriptManagerMenu = $getOrCreateMenu('Script Manager', $seoMenu->id, 2);
            $syncMenuPermissions($scriptManagerMenu, 'script_manager');
        }

        // 8. Re-align shifted settings and user management permissions
        $mappings = [
            'Backup And Reset'    => 'backup_and_reset',
            'Factory Reset'       => 'factory_reset',
            'Access Log'          => 'access_log',
            'User Management'     => 'user_management',
            'User List'           => 'user_list',
            'Role List'           => 'role_list',
            'Language Strings'    => 'language_strings',
            'Language'            => 'language',
            'Add Language'        => 'add_language',
            'Password Setting'    => 'password_setting',
            'SMS Setup'           => 'sms_setup',
            'Mail Setup'          => 'mail_setup',
            'Currency'            => 'currency',
            'Application'         => 'application',
            'App Setting'         => 'apps_setting',
            'Theme Setup'         => 'theme_setup',
            'Software Setup'      => 'software_setup',
            'Panel Face'          => 'panel_face',
            'Date Field Setup'    => 'date_field_setup',
            'Cache System'        => 'cache_system',
            'Social auth setting' => 'social_auth_setting',
            'Color Setting'       => 'color_setting',
            '404 Page Setting'    => '404_page_setting',
        ];

        foreach ($mappings as $menuName => $baseName) {
            $menu = PerMenu::where('menu_name', $menuName)->first();
            if ($menu) {
                $syncMenuPermissions($menu, $baseName);
            }
        }

        // 9. Ensure Super Admin has all permissions in the system
        if ($superAdmin) {
            $allPermissions = Permission::all();
            $superAdmin->syncPermissions($allPermissions);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Safe to leave intact or rollback if needed
    }
};

