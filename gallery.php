<?php
$pageTitle = 'Project Gallery';
$pageDescription = 'Browse and filter Akshaya flooring project and execution photographs.';
$bodyClass = 'support-page gallery-page';
$assetPrefix = '.';
require_once __DIR__ . '/includes/header.php';

$galleryImages = [
    ['website_assets/Epoxy Coating Pics/IMG20190903120103.jpg', 'Project source image 01', 'completed'],
    ['website_assets/Epoxy Coating Pics/IMG20190903134334.jpg', 'Project source image 02', 'progress'],
    ['website_assets/Epoxy Coating Pics/IMG20190903135838.jpg', 'Project source image 03', 'detail'],
    ['website_assets/Selected Pics from _23/006.JPG', 'Project source image 04', 'completed'],
    ['website_assets/Selected Pics from _23/038.JPG', 'Project source image 05', 'progress'],
    ['website_assets/Selected Pics from _23/045.JPG', 'Project source image 06', 'completed'],
    ['website_assets/Amritha Tools/IMG-20190714-WA0024.jpg', 'Project source image 07', 'detail'],
    ['website_assets/Amritha Tools/IMG-20190721-WA0003.jpg', 'Project source image 08', 'progress'],
    ['website_assets/Amritha Tools/IMG-20190726-WA0040.jpg', 'Project source image 09', 'completed'],
    ['website_assets/Amritha Tools/IMG-20190727-WA0007.jpg', 'Project source image 10', 'detail'],
];
$categories = ['all' => 'All Images', 'completed' => 'Completed Floors', 'progress' => 'Work in Progress', 'detail' => 'Surface Detail'];
?>

<main class="support-main" id="main-content">
    <section class="support-hero" aria-labelledby="gallery-title">
        <div class="container-wide support-hero-grid">
            <div class="support-hero-copy">
                <span class="support-kicker">Project Gallery</span>
                <h1 id="gallery-title">Real Work.<br>Real <em>Surfaces.</em></h1>
                <p>A visual archive built from project and execution photographs supplied by Akshaya. Filter by category, then open any frame to study it at a larger scale.</p>
                <div class="support-actions"><a class="btn btn-primary" href="#visual-archive">Explore Gallery</a><a class="btn btn-outline" href="<?= site_escape(site_url('projects.php')) ?>">View Projects</a></div>
            </div>
            <div class="support-hero-media" role="img" aria-label="Akshaya flooring project source photograph"></div>
        </div>
    </section>

    <section class="section" id="visual-archive" aria-labelledby="gallery-work" data-filter-group>
        <div class="container">
            <div class="gallery-toolbar">
                <div><span class="section-eyebrow">01 / Visual archive</span><h2 class="section-title" id="gallery-work">Execution seen through the work itself.</h2></div>
                <p class="section-description">Imagery is presented without unverified client names, industries or technical specifications. The focus here is the visual record of execution.</p>
            </div>
            <div class="filter-bar" data-filter-bar role="group" aria-label="Filter gallery by category">
                <?php foreach ($categories as $slug => $label): ?>
                <button class="chip" type="button" data-filter="<?= site_escape($slug) ?>" aria-pressed="<?= $slug === 'all' ? 'true' : 'false' ?>"><?= site_escape($label) ?></button>
                <?php endforeach; ?>
            </div>
            <p class="filter-count" data-filter-count></p>
            <div class="support-gallery-grid" aria-label="Akshaya flooring project image gallery">
                <?php foreach ($galleryImages as $index => [$src, $alt, $category]): $url = site_escape(site_url($src)); ?>
                <button class="gallery-tile" type="button" data-filter-item data-category="<?= site_escape($category) ?>" style="background-image:url('<?= $url ?>')" data-index="<?= sprintf('%02d', $index + 1) ?>" data-gallery-src="<?= $url ?>" data-gallery-alt="<?= site_escape($alt) ?>" data-gallery-caption="Akshaya project source photograph <?= sprintf('%02d', $index + 1) ?> — <?= site_escape($categories[$category]) ?>" aria-label="Open project source image <?= $index + 1 ?>"></button>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section support-dark" aria-labelledby="gallery-context">
        <div class="container">
            <div class="section-header--split"><div><span class="section-eyebrow">02 / Reading the work</span><h2 class="section-title" id="gallery-context">A finished floor is only one part of the story.</h2></div><p class="section-description">Floor condition, preparation, application control and the intended operating environment all influence the final flooring approach.</p></div>
            <div class="support-principles">
                <article class="support-principle"><span>01</span><strong>Existing condition</strong><p>The substrate and existing coating shape the preparation requirement.</p></article>
                <article class="support-principle"><span>02</span><strong>Preparation</strong><p>Repair, cleaning and surface preparation influence the finished system.</p></article>
                <article class="support-principle"><span>03</span><strong>Application control</strong><p>Work sequencing, manpower and site conditions matter during installation.</p></article>
                <article class="support-principle"><span>04</span><strong>Finished use</strong><p>The completed surface should suit the actual traffic, cleaning and operating environment.</p></article>
            </div>
        </div>
    </section>

    <dialog class="gallery-dialog" aria-label="Expanded project image">
        <span class="gallery-dialog-count" data-gallery-count aria-live="polite"></span>
        <button class="gallery-dialog-nav prev" type="button" aria-label="Previous image"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m15 6-6 6 6 6"/></svg></button>
        <button class="gallery-dialog-nav next" type="button" aria-label="Next image"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m9 6 6 6-6 6"/></svg></button>
        <button class="gallery-dialog-close" type="button" aria-label="Close image">×</button>
        <figure><img src="" alt=""><figcaption></figcaption></figure>
    </dialog>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
