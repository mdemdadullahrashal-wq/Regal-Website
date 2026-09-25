<?php

return [
    'brand_name' => env('REGAL_BRAND_NAME', 'Regal Solution'),
    'tagline' => env('REGAL_TAGLINE', 'Your trusted automation partner'),
    'logo_path' => env('REGAL_LOGO_PATH', 'images/logo-placeholder.svg'),
    'phone' => env('REGAL_PHONE', '01786280504'),
    'phones' => ['09639666972', '01913377065'],
    'email' => env('REGAL_EMAIL', 'regal.solution247@gmail.com'),
    'office_address' => env('REGAL_OFFICE_ADDRESS', 'Bibir Bagicha 2 No gate, Jatrabari, Dhaka-1204'),
    'whatsapp_link' => env('REGAL_WHATSAPP_LINK', 'https://wa.me/8801786280504'),
    'gtm_id' => env('REGAL_GTM_ID', ''),

    // Lead capture → CRM / SMS (all env-driven; empty = disabled, logged placeholder only).
    'crm_leads_api_url' => env('CRM_LEADS_API_URL'),
    'crm_leads_api_token' => env('CRM_LEADS_API_TOKEN'),
    'bulksmsbd_api_key' => env('BULKSMSBD_API_KEY'),
    'bulksmsbd_base_url' => env('BULKSMSBD_BASE_URL'),
    'bulksmsbd_sender_id' => env('BULKSMSBD_SENDER_ID', 'RegalSol'),
    'notify_phone' => env('NOTIFY_PHONE'),

    // reCAPTCHA (optional).
    'recaptcha_enabled' => (bool) env('RECAPTCHA_ENABLED', false),
    'recaptcha_site_key' => env('RECAPTCHA_SITE_KEY'),
    'recaptcha_secret_key' => env('RECAPTCHA_SECRET_KEY'),

    'admin_name' => env('ADMIN_NAME', 'Regal Admin'),
    'admin_email' => env('ADMIN_EMAIL', 'rashal007@gmail.com'),
    'admin_password' => env('ADMIN_PASSWORD', 'Rasel@Regal26'),
];
