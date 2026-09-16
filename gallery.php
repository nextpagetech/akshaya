<?php
$pageTitle = 'Project Gallery';
$pageDescription = 'Browse selected Akshaya flooring project and execution photographs.';
$bodyClass = 'support-page gallery-page';
$assetPrefix = '.';
require_once __DIR__ . '/includes/header.php';

$galleryImages = [
    ['website_assets/Epoxy Coating Pics/IMG20190903120103.jpg', 'Flooring project view 1'],
    ['website_assets/Selected Pics from _23/038.JPG', 'Flooring project view 2'],
    ['website_assets/Selected Pics from _23/045.JPG', 'Flooring project view 3'],
    ['website_assets/Amritha Tools/IMG-20190714-WA0024.jpg', 'Flooring project view 4'],
    ['website_assets/Amritha Tools/IMG-20190721-WA0003.jpg', 'Flooring project view 5'],
    ['website_assets/Amritha Tools/IMG-20190726-WA0040.jpg', 'Flooring project view 6'],
];
?>

<main class="support-main" id="main-content">
    <section class="support-hero" aria-labelledby="gallery-title"><div class="container-wide support-hero-grid"><div class="support-hero-copy"><span class="support-kicker">Project Gallery</span><h1 id="gallery-title">Real Work. Real <em>Surfaces.</em></h1><p>A visual record drawn from the project/source images supplied by Akshaya. The gallery is intentionally presented without unverified client names, sectors or technical specifications.</p><div class="support-actions"><a class="btn btn-primary" href="<?= site_escape(site_url('schedule-visit.php')) ?>">Schedule Site Visit</a><a class="btn btn-outline" href="<?= site_escape(site_url('projects.php')) ?>">View Projects</a></div></div><div class="support-hero-media" role="img" aria-label="Akshaya project source photograph"></div></div></section>

    <section class="section" aria-labelledby="gallery-work"><div class="container"><span class="section-eyebrow">01 / Selected imagery</span><h2 class="section-title" id="gallery-work">Preparation, application and finished-floor context.</h2><p class="section-description">These photographs are authentic execution visuals. They are not labelled with a client, industry or technical system unless that project is later identified and approved for publication.</p><div class="support-gallery-grid" aria-label="Akshaya flooring project image gallery"><?php foreach ($galleryImages as $index => [$src, $alt]): ?><button class="gallery-tile" type="button" data-gallery-src="<?= site_escape(site_url($src)) ?>" data-gallery-alt="<?= site_escape($alt) ?>" aria-label="Open <?= site_escape(strtolower($alt)) ?>"></button><?php endforeach; ?></div></div></section>

    <section class="section support-dark" aria-labelledby="gallery-context"><div class="container"><span class="section-eyebrow">02 / What to look for</span><h2 class="section-title" id="gallery-context">A flooring project is more than its final colour.</h2><div class="support-principles"><article class="support-principle"><span>01</span><strong>Existing condition</strong><p>The substrate and existing coating shape the preparation requirement.</p></article><article class="support-principle"><span>02</span><strong>Preparation</strong><p>Repair, cleaning and surface preparation influence the success of the finished system.</p></article><article class="support-principle"><span>03</span><strong>Application control</strong><p>Work sequencing, manpower and site conditions matter during installation.</p></article><article class="support-principle"><span>04</span><strong>Finished use</strong><p>The final floor should suit the actual traffic, cleaning and operating environment.</p></article></div></div></section>

    <dialog class="gallery-dialog" data-gallery-dialog aria-label="Expanded project image"><div class="gallery-dialog-inner"><button class="gallery-dialog-close" type="button" data-gallery-close aria-label="Close image">×</button><img data-gallery-dialog-image src="" alt=""><p class="gallery-dialog-caption" data-gallery-dialog-caption></p></div></dialog>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
