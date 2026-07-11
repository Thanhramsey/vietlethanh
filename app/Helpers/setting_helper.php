<?php

use App\Models\SettingModel;

if (! function_exists('get_setting')) {
    /**
     * Retrieve a site setting by its key, cached for efficiency.
     *
     * @param string $key
     * @param mixed  $default
     * @return mixed
     */
    function get_setting(string $key, $default = '')
    {
        static $cachedSettings = null;

        if ($cachedSettings === null) {
            $model = new SettingModel();
            $settings = $model->findAll();
            $cachedSettings = [];
            foreach ($settings as $setting) {
                $cachedSettings[$setting['key']] = $setting['value'];
            }
        }

        return $cachedSettings[$key] ?? $default;
    }
}
