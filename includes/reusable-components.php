<?php
// Shared output/path helpers; approved visual components will be added later.
require_once __DIR__ . '/config.php';

// Escape plain text or a helper-generated URL when inserting it into HTML.
function site_escape($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// Accept a site-relative path, e.g. site_url('schedule-visit.php').
// Filesystem includes continue to use __DIR__; URLs never depend on the PHP cwd.
function site_url($path = '')
{
    global $siteConfig, $assetPrefix;

    $base = $siteConfig['base_url'] !== ''
        ? $siteConfig['base_url']
        : ($assetPrefix ?? '.');

    return rtrim($base, '/') . '/' . ltrim($path, '/');
}

// Accept an asset-relative path, e.g. asset_url('images/logo/approved-logo.svg').
function asset_url($path = '')
{
    global $siteConfig;

    return site_url(trim($siteConfig['asset_path'], '/') . '/' . ltrim($path, '/'));
}

// One navigation definition feeds desktop, mobile, and the no-JavaScript fallback.
function site_navigation()
{
    return [
        'home' => ['label' => 'Home', 'path' => 'index.php'],
        'about' => ['label' => 'About Us', 'path' => 'about.php'],
        'services' => ['label' => 'Flooring Solutions', 'groups' => [
            'Flooring Solutions' => [
                'epoxy-flooring' => 'Epoxy Flooring',
                'pu-flooring' => 'PU Flooring',
                'esd-flooring' => 'ESD / Antistatic Flooring',
                'dielectric-flooring' => 'Dielectric Flooring',
                'pvc-flooring' => 'PVC Flooring',
                'clean-room-wall-coating' => 'Clean Room Wall Coating',
                'waterproofing' => 'Waterproofing',
                'vdf-flooring' => 'VDF Flooring',
            ],
        ]],
        'industries' => ['label' => 'Industries', 'groups' => [
            'Manufacturing & Industrial' => [
                'manufacturing' => 'Manufacturing', 'automobile' => 'Automobile', 'textiles' => 'Textiles',
            ],
            'Controlled & Critical Environments' => [
                'pharma' => 'Pharma', 'food-beverage' => 'Food & Beverage', 'electronics' => 'Electronics',
                'hospitals-healthcare' => 'Hospitals & Healthcare', 'laboratories' => 'Laboratories', 'data-centres' => 'Data Centres',
            ],
            'Infrastructure & Logistics' => [
                'warehouses-logistics' => 'Warehouses & Logistics', 'airports' => 'Airports',
                'seaports' => 'Seaports', 'defence' => 'Defence Sector',
            ],
            'Commercial & Institutional' => [
                'commercial-spaces' => 'Commercial Spaces', 'educational-institutions' => 'Educational Institutions',
            ],
        ]],
        'projects' => ['label' => 'Projects', 'path' => 'projects.php'],
        'gallery' => ['label' => 'Gallery', 'path' => 'gallery.php'],
        'blog' => ['label' => 'Blog', 'path' => 'blog/index.php'],
        'contact' => ['label' => 'Contact Us', 'path' => 'contact.php'],
    ];
}

// Derive the page from the executing file, independent of URL deployment subfolders.
function site_current_page()
{
    $root = str_replace('\\', '/', dirname(__DIR__)) . '/';
    // Canonicalize Windows separators/double separators and relative CLI paths.
    $scriptFile = realpath($_SERVER['SCRIPT_FILENAME'] ?? '') ?: '';
    $script = str_replace('\\', '/', $scriptFile);
    return strpos($script, $root) === 0 ? substr($script, strlen($root)) : basename($script);
}

function site_current_section($page)
{
    $directory = dirname($page);
    if (in_array($directory, ['services', 'industries', 'blog'], true)) {
        return $directory;
    }
    if ($directory === 'project') {
        return 'projects';
    }
    return $page === 'index.php' ? 'home' : basename($page, '.php');
}

// Shared media slot: supply an approved asset-relative path and useful alt text
// together. Until then display an honest placeholder, never a fabricated photo.
function site_media($label, $path = '', $alt = '', $priority = false)
{
    if ($path !== '' && $alt !== '') {
        return '<div class="home-media image-frame image-zoom"><img src="' . site_escape(asset_url($path))
            . '" alt="' . site_escape($alt) . '" width="1200" height="900" '
            . ($priority ? 'fetchpriority="high"' : 'loading="lazy"') . ' decoding="async"></div>';
    }
    return '<!-- Replace with approved Akshaya ' . site_escape($label) . ' -->'
        . '<div class="home-media home-media-placeholder"><span class="media-registration" aria-hidden="true"></span>'
        . '<span class="media-placeholder-copy"><span class="media-placeholder-label">Development placeholder</span>'
        . '<span>' . site_escape($label) . '</span><span class="caption">Approved image to be added</span></span></div>';
}

// Home development imagery is explicitly illustrative, never project evidence.
// Replace these entries with approved client photos and remove the demo badge then.
// Two local WebP sizes avoid downloading desktop-sized media on small screens.
function home_demo_media($key, $priority = false)
{
    $images = [
        'facility' => 'Illustrative AI-generated industrial hall with a blue-grey floor; not an Akshaya project',
        'clean-environment' => 'Illustrative AI-generated controlled production corridor; not an Akshaya project',
        'surface-detail' => 'Illustrative AI-generated industrial floor surface detail; not an Akshaya project',
    ];
    if (!isset($images[$key])) return site_media('Industrial flooring image');
    $base = 'images/home/demo/' . $key;
    return '<!-- Replace with approved Akshaya project image; illustrative development asset only. -->'
        . '<div class="home-media home-demo-media image-frame image-zoom"><img src="' . site_escape(asset_url($base . '-1440.webp'))
        . '" srcset="' . site_escape(asset_url($base . '-720.webp')) . ' 720w, ' . site_escape(asset_url($base . '-1440.webp'))
        . ' 1440w" sizes="(max-width: 575px) 100vw, (max-width: 991px) 70vw, 50vw" alt="' . site_escape($images[$key])
        . '" width="1440" height="960" ' . ($priority ? 'fetchpriority="high"' : 'loading="lazy"')
        . ' decoding="async"><span class="home-image-disclosure">Illustrative image</span></div>';
}
