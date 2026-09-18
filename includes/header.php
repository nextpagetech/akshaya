<?php
// Common document head and final shared navigation. Page content follows this include.
require_once __DIR__ . '/reusable-components.php';

// Pages may supply a short title and an approved description before this include.
$documentTitle = trim($pageTitle ?? '') !== ''
    ? $pageTitle . ' | ' . $siteConfig['site_name']
    : $siteConfig['default_page_title'];
$documentDescription = trim($pageDescription ?? '');
$showSiteShell = $showSiteShell ?? true;
if ($showSiteShell) {
    $navigation = site_navigation();
    $currentPage = site_current_page();
    $currentSection = $currentSection ?? site_current_section($currentPage);
    $callUrl = 'tel:+' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['phone']);
    $whatsappUrl = 'https://wa.me/' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['whatsapp']);
    $phoneDigits = preg_replace('/\D+/', '', $siteConfig['phone']);
    $displayPhone = strlen($phoneDigits) === 10 ? substr($phoneDigits, 0, 5) . ' ' . substr($phoneDigits, 5) : $siteConfig['phone'];
    $publicEmail = trim($siteConfig['email'] ?? '');
    $socialLinks = array_filter($siteConfig['social_links'] ?? [], static fn ($url) => trim((string) $url) !== '');
    $contactPhoneIcon = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 3h3l1.5 4-2 1.5a14 14 0 0 0 6 6l1.5-2L21 14v3c0 2.2-1.8 4-4 4A14 14 0 0 1 3 7c0-2.2 1.8-4 4-4Z"/></svg>';
    $contactMailIcon = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 5h18v14H3V5Zm1 1 8 7 8-7"/></svg>';
    $socialIcons = [
        'linkedin' => '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 9v9M6 6v.1M10 18v-5c0-2.2 4-3 4 0v5M10 9v9M3 3h18v18H3z"/></svg>',
        'facebook' => '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M14 8h3V4h-3c-3 0-5 2-5 5v3H6v4h3v5h4v-5h3l1-4h-4V9c0-.7.3-1 1-1Z"/></svg>',
        'instagram' => '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><path d="M17.5 6.5h.01"/></svg>',
        'youtube' => '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M21 12c0 3-.4 5-1 5.5S16.5 18 12 18s-7.4 0-8-.5S3 15 3 12s.4-5 1-5.5S7.5 6 12 6s7.4 0 8 .5 1 2.5 1 5.5Z"/><path d="m10 9 5 3-5 3V9Z"/></svg>',
    ];
    $navChevron = '<svg class="icon nav-chevron" viewBox="0 0 24 24" aria-hidden="true"><path d="m7 10 5 5 5-5"/></svg>';
    $navArrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
    $navLayer = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m3 8 9-5 9 5-9 5-9-5Zm0 4 9 5 9-5M3 16l9 5 9-5"/></svg>';
    $serviceMenuDescriptions = [
        'epoxy-flooring' => 'Resin flooring category',
        'pu-flooring' => 'Polyurethane flooring category',
        'esd-flooring' => 'Static-control flooring category',
        'dielectric-flooring' => 'Electrical insulation category',
        'pvc-flooring' => 'PVC flooring category',
        'clean-room-wall-coating' => 'Controlled-environment wall coating',
        'waterproofing' => 'Water protection category',
        'vdf-flooring' => 'Industrial flooring category',
    ];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= site_escape($documentTitle) ?></title>
    <?php if (!empty($pageNoIndex)): ?>
    <meta name="robots" content="noindex, nofollow">
    <?php endif; ?>
    <?php if ($documentDescription !== ''): ?>
    <meta name="description" content="<?= site_escape($documentDescription) ?>">
    <?php endif; ?>
    <!-- Set $pageDescription in the page when approved metadata is available. -->
    <?php if ($siteConfig['favicon'] !== ''): ?>
    <link rel="icon" href="<?= site_escape(asset_url($siteConfig['favicon'])) ?>">
    <?php endif; ?>
    <!-- Favicon placeholder: configure its asset path after the file is supplied. -->
    <!-- Bootstrap CSS, followed by the reserved project stylesheets. -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="<?= site_escape(asset_url('css/style.css')) ?>" rel="stylesheet">
    <link href="<?= site_escape(asset_url('css/responsive.css')) ?>" rel="stylesheet">
</head>
<body<?= !empty($bodyClass) ? ' class="' . site_escape($bodyClass) . '"' : '' ?>>
    <?php if ($showSiteShell): ?>
    <header class="site-header" data-site-header data-current-section="<?= site_escape($currentSection) ?>">
        <div class="header-mini" data-header-mini>
            <div class="container-wide header-mini-inner">
                <p class="header-positioning"><i aria-hidden="true"></i>Industrial Flooring &amp; Surface Protection</p>
                <div class="header-mini-contact">
                    <a href="<?= site_escape($callUrl) ?>"><?= $contactPhoneIcon ?><span><?= site_escape($displayPhone) ?></span></a>
                    <?php if ($publicEmail !== ''): ?>
                    <span class="header-mini-divider" aria-hidden="true"></span>
                    <a class="header-mini-email" href="mailto:<?= site_escape($publicEmail) ?>"><?= $contactMailIcon ?><span><?= site_escape($publicEmail) ?></span></a>
                    <?php endif; ?>
                    <?php if ($socialLinks): ?>
                    <span class="header-mini-divider" aria-hidden="true"></span>
                    <div class="header-socials" aria-label="Akshaya social profiles">
                        <?php foreach ($socialLinks as $network => $url): if (!isset($socialIcons[$network])) continue; ?>
                        <a href="<?= site_escape($url) ?>" target="_blank" rel="noopener noreferrer" aria-label="Akshaya on <?= site_escape(ucfirst($network)) ?>"><?= $socialIcons[$network] ?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="container-wide header-inner">
            <div class="header-row">
                <a class="site-logo" href="<?= site_escape(site_url('index.php')) ?>" aria-label="Akshaya Floor Solutions — Home">
                    <img src="<?= site_escape(asset_url('images/logo/logo.jpg')) ?>" alt="Akshaya Floor Solutions" width="220" height="159" fetchpriority="high">
                </a>
                <nav class="desktop-navigation" aria-label="Main navigation">
                    <ul class="primary-navigation">
                        <?php foreach ($navigation as $section => $item): ?>
                        <li<?= isset($item['groups']) ? ' class="nav-disclosure" data-mega-item' : '' ?>>
                            <?php if (isset($item['path'])): ?>
                            <a class="primary-link<?= $currentSection === $section ? ' is-active' : '' ?>" href="<?= site_escape(site_url($item['path'])) ?>"<?= $currentPage === $item['path'] ? ' aria-current="page"' : '' ?>><?= site_escape($item['label']) ?></a>
                            <?php else: ?>
                            <button class="primary-link mega-toggle<?= $currentSection === $section ? ' is-active' : '' ?>" type="button" id="desktop-<?= site_escape($section) ?>-toggle" aria-expanded="false" aria-controls="desktop-<?= site_escape($section) ?>-panel">
                                <?= site_escape($item['label']) ?><?= $navChevron ?>
                                <?php if ($currentSection === $section): ?><span class="visually-hidden">(current section)</span><?php endif; ?>
                            </button>
                            <div class="mega-panel mega-panel--<?= site_escape($section) ?>" id="desktop-<?= site_escape($section) ?>-panel" aria-labelledby="desktop-<?= site_escape($section) ?>-toggle" hidden>
                                <?php if ($section === 'services'): ?>
                                <div class="mega-intro">
                                    <span class="section-eyebrow">Flooring Solutions</span>
                                    <p class="mega-title">Systems built around the floor.</p>
                                    <p>Engineered flooring and surface protection systems for demanding environments.</p>
                                    <span class="mega-visual" aria-hidden="true"><i></i><i></i><i></i></span>
                                    <a class="link-arrow" href="<?= site_escape(site_url('schedule-visit.php')) ?>">Schedule Site Visit <?= $navArrow ?></a>
                                </div>
                                <ul class="service-menu-grid">
                                    <?php $serviceIndex = 0; foreach ($item['groups']['Flooring Solutions'] as $slug => $label): $linkPath = 'services/' . $slug . '.php'; ?>
                                    <li><a class="service-menu-link" href="<?= site_escape(site_url($linkPath)) ?>"<?= $currentPage === $linkPath ? ' aria-current="page"' : '' ?>>
                                        <span class="menu-icon" aria-hidden="true"><?= sprintf('%02d', ++$serviceIndex) ?></span><span class="service-menu-copy"><strong><?= site_escape($label) ?></strong><small><?= site_escape($serviceMenuDescriptions[$slug]) ?></small></span><?= $navArrow ?>
                                    </a></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php else: ?>
                                <div class="industry-menu-heading"><span class="section-eyebrow">Industries</span><p>Explore by operating environment.</p></div>
                                <div class="industry-menu-grid">
                                    <?php $industryGroupIndex = 0; foreach ($item['groups'] as $group => $links): ?>
                                    <div class="industry-menu-group">
                                        <p class="menu-group-title"><span aria-hidden="true"><?= sprintf('%02d', ++$industryGroupIndex) ?></span><?= site_escape($group) ?></p>
                                        <ul>
                                            <?php foreach ($links as $slug => $label): $linkPath = 'industries/' . $slug . '.php'; ?>
                                            <li><a href="<?= site_escape(site_url($linkPath)) ?>"<?= $currentPage === $linkPath ? ' aria-current="page"' : '' ?>><?= site_escape($label) ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
                <a class="btn btn-primary header-cta" href="<?= site_escape(site_url('schedule-visit.php')) ?>"<?= $currentPage === 'schedule-visit.php' ? ' aria-current="page"' : '' ?>>Schedule Site Visit <?= $navArrow ?></a>
                <a class="mobile-header-call" href="<?= site_escape($callUrl) ?>" aria-label="Call Akshaya Floor Solutions at <?= site_escape($siteConfig['phone']) ?>"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 3h3l1.5 4-2 1.5a14 14 0 0 0 6 6l1.5-2L21 14v3c0 2.2-1.8 4-4 4A14 14 0 0 1 3 7c0-2.2 1.8-4 4-4Z"/></svg></a>
                <button class="mobile-menu-toggle" type="button" aria-controls="mobile-navigation" aria-expanded="false" aria-haspopup="dialog" hidden>
                    <span>Menu</span><span class="menu-trigger-lines" aria-hidden="true"><i></i><i></i><i></i></span>
                </button>
            </div>
        </div>
        <!-- Native modal dialog provides focus containment and an inert background. -->
        <dialog class="mobile-navigation" id="mobile-navigation" aria-labelledby="mobile-navigation-title">
            <div class="mobile-menu-heading">
                <div><span class="mobile-menu-kicker">Akshaya Floor Solutions</span><p id="mobile-navigation-title">Navigation</p></div>
                <button class="mobile-menu-close" type="button" aria-label="Close navigation" autofocus><svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m6 6 12 12M6 18 18 6"/></svg></button>
            </div>
            <div class="mobile-menu-content">
                <nav aria-label="Mobile navigation">
                    <ul class="mobile-menu-list">
                        <?php foreach ($navigation as $section => $item): ?>
                        <li>
                            <?php if (isset($item['path'])): ?>
                            <a class="mobile-primary-link<?= $currentSection === $section ? ' is-active' : '' ?>" href="<?= site_escape(site_url($item['path'])) ?>"<?= $currentPage === $item['path'] ? ' aria-current="page"' : '' ?>><?= site_escape($item['label']) ?></a>
                            <?php else: ?>
                            <button class="mobile-primary-link mobile-accordion-toggle<?= $currentSection === $section ? ' is-active' : '' ?>" type="button" aria-expanded="false" aria-controls="mobile-<?= site_escape($section) ?>-panel">
                                <?= site_escape($item['label']) ?><?= $navChevron ?>
                                <?php if ($currentSection === $section): ?><span class="visually-hidden">(current section)</span><?php endif; ?>
                            </button>
                            <div class="mobile-submenu" id="mobile-<?= site_escape($section) ?>-panel" hidden>
                                <?php foreach ($item['groups'] as $group => $links): ?>
                                <?php if ($section === 'industries'): ?><p class="menu-group-title"><?= site_escape($group) ?></p><?php endif; ?>
                                <ul>
                                    <?php foreach ($links as $slug => $label): $linkPath = $section . '/' . $slug . '.php'; ?>
                                    <li><a href="<?= site_escape(site_url($linkPath)) ?>"<?= $currentPage === $linkPath ? ' aria-current="page"' : '' ?>><?= site_escape($label) ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <a class="btn btn-primary mobile-cta" href="<?= site_escape(site_url('schedule-visit.php')) ?>"<?= $currentPage === 'schedule-visit.php' ? ' aria-current="page"' : '' ?>>Schedule Site Visit <?= $navArrow ?></a>
                </nav>
                <div class="mobile-contact-area">
                    <p class="text-small text-muted">Discuss your flooring requirement</p>
                    <div class="mobile-contact-actions"><a href="<?= site_escape($callUrl) ?>">Call <?= site_escape($displayPhone) ?></a><a href="<?= site_escape($whatsappUrl) ?>">WhatsApp <?= $navArrow ?></a></div>
                    <?php if ($publicEmail !== ''): ?><a class="mobile-contact-email" href="mailto:<?= site_escape($publicEmail) ?>"><?= $contactMailIcon ?><?= site_escape($publicEmail) ?></a><?php endif; ?>
                    <?php if ($socialLinks): ?>
                    <div class="header-socials mobile-socials" aria-label="Akshaya social profiles">
                        <?php foreach ($socialLinks as $network => $url): if (!isset($socialIcons[$network])) continue; ?>
                        <a href="<?= site_escape($url) ?>" target="_blank" rel="noopener noreferrer" aria-label="Akshaya on <?= site_escape(ucfirst($network)) ?>"><?= $socialIcons[$network] ?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </dialog>
        <span class="header-scroll-progress" data-header-progress aria-hidden="true"></span>
    </header>
    <noscript>
        <nav class="navigation-fallback container-wide" aria-label="Site navigation without JavaScript">
            <?php foreach ($navigation as $section => $item): ?>
            <?php if (isset($item['path'])): ?>
            <a href="<?= site_escape(site_url($item['path'])) ?>"><?= site_escape($item['label']) ?></a>
            <?php else: ?>
            <details><summary><?= site_escape($item['label']) ?></summary>
                <?php foreach ($item['groups'] as $group => $links): ?>
                <p class="menu-group-title"><?= site_escape($group) ?></p><ul>
                    <?php foreach ($links as $slug => $label): ?><li><a href="<?= site_escape(site_url($section . '/' . $slug . '.php')) ?>"><?= site_escape($label) ?></a></li><?php endforeach; ?>
                </ul>
                <?php endforeach; ?>
            </details>
            <?php endif; ?>
            <?php endforeach; ?>
            <a class="btn btn-primary" href="<?= site_escape(site_url('schedule-visit.php')) ?>">Schedule Site Visit</a>
        </nav>
    </noscript>
    <?php endif; ?>