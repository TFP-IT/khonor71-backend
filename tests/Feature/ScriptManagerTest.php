<?php

namespace Tests\Feature;

use App\Models\User;
use Modules\Setting\Entities\Setting;
use Tests\TestCase;

class ScriptManagerTest extends TestCase
{
    public function test_save_script_manager_with_full_meta_tag(): void
    {
        config(['firewall.enabled' => true]);

        $user = User::find(1);

        $response = $this->actingAs($user)->post(route('seo.script_manager_store'), [
            'search_console_meta' => '<meta name="google-site-verification" content="test-verification-code-123" />',
            'ga4_id' => 'G-TEST12345',
            'custom_head_scripts' => '<script>console.log("head");</script>',
            'custom_body_scripts' => '<script src="https://example.com/widget.js"></script>',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['error' => false]);

        $setting = Setting::find(121);
        $this->assertNotNull($setting);
        $details = json_decode($setting->details, true);
        $this->assertEquals('<meta name="google-site-verification" content="test-verification-code-123" />', $details['search_console_meta']);
        $this->assertEquals('G-TEST12345', $details['ga4_id']);
    }

    public function test_save_script_manager_with_bare_token(): void
    {
        config(['firewall.enabled' => true]);

        $user = User::find(1);

        $response = $this->actingAs($user)->post(route('seo.script_manager_store'), [
            'search_console_meta' => 'bare-google-token-456',
        ]);

        $response->assertStatus(200);
        $response->assertJson(['error' => false]);

        $setting = Setting::find(121);
        $details = json_decode($setting->details, true);
        $this->assertEquals('<meta name="google-site-verification" content="bare-google-token-456" />', $details['search_console_meta']);
    }
}

