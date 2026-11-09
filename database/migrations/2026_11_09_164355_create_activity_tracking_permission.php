<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Modules\UserManagement\Entities\PerMenu;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Create PerMenu entry if not exists
        $perMenu = PerMenu::firstOrCreate(
            ['menu_name' => 'Activity Tracking'],
            ['uuid' => (string) \Illuminate\Support\Str::uuid(), 'lable' => 0]
        );

        // 2. Create Permission
        $permission = Permission::firstOrCreate(
            ['name' => 'read_activity_tracking', 'guard_name' => 'web'],
            ['per_menu_id' => $perMenu->id]
        );

        // 3. Assign to Super Admin and Admin
        $superAdmin = Role::where('name', 'Super Admin')->first();
        if ($superAdmin) {
            $superAdmin->givePermissionTo($permission);
        }

        $admin = Role::where('name', 'Admin')->first();
        if ($admin) {
            $admin->givePermissionTo($permission);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $permission = Permission::where('name', 'read_activity_tracking')->first();
        if ($permission) {
            $permission->delete();
        }

        $perMenu = PerMenu::where('menu_name', 'Activity Tracking')->first();
        if ($perMenu) {
            $perMenu->delete();
        }
    }
};
