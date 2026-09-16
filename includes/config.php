<?php
// Shared identity, contact details, and deployment placeholders.
$siteConfig = [
    'site_name' => 'Akshaya Floor Solutions',
    'company_name' => 'Akshaya Enterprises',
    'contact_person' => 'S. Chandrakanth Reddy',
    'default_page_title' => 'Akshaya Floor Solutions',
    'phone' => '9866076372',
    'whatsapp' => '9866076372',
    'phone_country_code' => '91', // Confirmed India dialing prefix for Call/WhatsApp links.
    'email' => 'akshaya.ckr@gmail.com', // Confirmed in current client proposal/profile documents.
    'address' => '', // Keep hidden until the current public postal address is reconfirmed.
    // Social links remain hidden until approved public URLs are supplied.
    'social_links' => [
        'linkedin' => '',
        'facebook' => '',
        'instagram' => '',
        'youtube' => '',
    ],
    // Empty uses each page's $assetPrefix: '.' at root, '..' one directory down.
    // For deployment, optionally set an absolute site URL or /subfolder path.
    'base_url' => '',
    'asset_path' => 'assets', // Relative to the site root.
    'favicon' => '', // Asset-relative path once supplied, e.g. images/common/favicon.ico.
];
