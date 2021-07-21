<?php

namespace Database\Seeders;

use App\Models\System\Setting;
use Illuminate\Database\Seeder;

class SystemDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => 'Product',
            'slug' => 'product',
            'meta' => [
                'product_logo' => $this->default_product_logo(),
                'product_name' => $this->default_product_name(),
                'product_theme' => $this->default_product_theme(),
                'text_color' => $this->default_text_color(),
                'welcome_text' => $this->default_welcome_text(),
                'workunit_name' => $this->default_workunit_name(),
                'workunit_region' => $this->default_workunit_region(),
            ]
        ]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function default_product_logo()
    {
        return env('APP_ENV') === 'local' ?
            env('MIX_DEV_PROTOCOL') . '://' . env('MIX_DEV_DOMAIN') . '/asset/product_logo' :
            env('MIX_PRD_PROTOCOL') . '://' . env('MIX_PRD_DOMAIN') . '/asset/product_logo';
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function default_product_name()
    {
        return env('APP_ENV') === 'local' ?
            env('MIX_DEV_NAME') :
            env('MIX_PRD_NAME');
    }

    protected function default_product_theme()
    {
        return 'light-blue';
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function default_text_color()
    {
        return 'white--text';
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function default_welcome_text()
    {
        $message = 'Monoland dirancang bangun dalam rangka 
        <span class="font-weight-medium font-italic">
            "Menciptakan tata kelola pemerintahan yang baik (Good Governance)"
        </span> 
        guna mewujudkan 
        <span class="font-weight-medium font-italic">
            "Indonesia yang maju, mandiri, berdaya saing, sejahtera dan berakhlaqul karimah".
        </span>';

        $message = str_replace("\n", "", $message);

        return preg_replace("/\s+/", " ", $message);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function default_workunit_name()
    {
        return env('WORKUNIT_NAME');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function default_workunit_region()
    {
        return env('WORKUNIT_REGION');
    }
}
