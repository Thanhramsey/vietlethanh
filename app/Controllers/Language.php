<?php

namespace App\Controllers;

class Language extends BaseController
{
    public function switch(string $locale = 'vi')
    {
        $allowed = ['vi', 'en'];
        if (!in_array($locale, $allowed, true)) {
            $locale = 'vi';
        }

        session()->set('site_locale', $locale);

        $redirect = $this->request->getGet('redirect');
        if (empty($redirect)) {
            $redirect = previous_url() ?: base_url();
        }

        return redirect()->to($redirect);
    }
}
