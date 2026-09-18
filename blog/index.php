<?php
$pageTitle = 'Flooring Knowledge Centre';
$pageDescription = 'Practical guidance from Akshaya Floor Solutions on floor assessment, preparation, system selection, execution planning and maintenance.';
$bodyClass = 'support-page support-v2 blog-page';
$assetPrefix = '..';
$showFooterCta = false;
require __DIR__ . '/../includes/reusable-components.php';
require __DIR__ . '/../includes/header.php';

$articles = blog_articles();
$featuredSlug = array_key_first($articles);
$featured = $articles[$featuredSlug];
$rest = array_diff_key($articles, [$featuredSlug => true]);

$categories = ['all' => 'All Articles'];
foreach ($articles as $article) {
    $categories[$article['category']] = $article['categoryLabel'];
}
$arrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
?>

<main class="support-main" id="main-content">
    <section class="support-hero" aria-labelledby="knowledge-title">
        <div class="container-wide support-hero-grid">
            <div class="support-hero-copy">
                <span class="support-kicker">Knowledge Centre</span>
                <h1 id="knowledge-title">Understand the Floor Before the <em>Product.</em></h1>
                <p>Practical guidance for facility teams, procurement teams and project stakeholders who need to understand what influences an industrial flooring decision.</p>
                <div class="support-actions"><a class="btn btn-primary" href="<?= site_escape(site_url('schedule-visit.php')) ?>">Schedule Site Visit</a><a class="btn btn-outline" href="<?= site_escape(site_url('services/epoxy-flooring.php')) ?>">Explore Flooring Solutions</a></div>
            </div>
            <div class="support-hero-media" role="img" aria-label="Industrial flooring project source photograph" style="background-image:url('../website_assets/Selected Pics from _23/006.JPG')"></div>
        </div>
    </section>

    <section class="section" aria-labelledby="knowledge-topics" data-filter-group>
        <div class="container">
            <span class="section-eyebrow">01 / Articles</span>
            <h2 class="section-title" id="knowledge-topics">Questions worth asking before a flooring specification is final.</h2>
            <div class="filter-bar blog-toolbar" data-filter-bar role="group" aria-label="Filter articles by topic">
                <?php foreach ($categories as $slug => $label): ?>
                <button class="chip" type="button" data-filter="<?= site_escape($slug) ?>" aria-pressed="<?= $slug === 'all' ? 'true' : 'false' ?>"><?= site_escape($label) ?></button>
                <?php endforeach; ?>
            </div>
            <p class="filter-count" data-filter-count></p>

            <article class="blog-featured" data-filter-item data-category="<?= site_escape($featured['category']) ?>">
                <a class="blog-featured-media" href="detail-template.php?post=<?= site_escape($featuredSlug) ?>" style="background-image:url('<?= site_escape(site_url($featured['image'])) ?>')" aria-hidden="true" tabindex="-1"></a>
                <div class="blog-featured-copy">
                    <span class="badge"><?= site_escape($featured['categoryLabel']) ?></span>
                    <h3><a href="detail-template.php?post=<?= site_escape($featuredSlug) ?>" style="color:inherit;text-decoration:none"><?= site_escape($featured['title']) ?></a></h3>
                    <p><?= site_escape($featured['excerpt']) ?></p>
                    <div class="blog-meta"><span><?= site_escape($featured['readTime']) ?></span></div>
                    <a class="link-arrow" href="detail-template.php?post=<?= site_escape($featuredSlug) ?>">Read Article <?= $arrow ?></a>
                </div>
            </article>

            <div class="blog-list">
                <?php foreach ($rest as $slug => $article): ?>
                <a class="blog-row" data-filter-item data-category="<?= site_escape($article['category']) ?>" href="detail-template.php?post=<?= site_escape($slug) ?>">
                    <div class="blog-row-media" style="background-image:url('<?= site_escape(site_url($article['image'])) ?>')"></div>
                    <div>
                        <span class="badge tag-neutral"><?= site_escape($article['categoryLabel']) ?></span>
                        <h4><?= site_escape($article['title']) ?></h4>
                        <p><?= site_escape($article['excerpt']) ?></p>
                        <div class="blog-meta"><span><?= site_escape($article['readTime']) ?></span></div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section support-dark" aria-labelledby="knowledge-selection"><div class="container"><span class="section-eyebrow">02 / Selection logic</span><h2 class="section-title" id="knowledge-selection">Epoxy, PU, ESD, PVC or another route?</h2><div class="support-principles"><article class="support-principle"><span>A</span><strong>Start with the use</strong><p>Define what happens in the area and what the floor must support.</p></article><article class="support-principle"><span>B</span><strong>Check the substrate</strong><p>Understand whether the existing base is suitable and what preparation may be needed.</p></article><article class="support-principle"><span>C</span><strong>Define special requirements</strong><p>Static control, electrical insulation, hygiene or waterproofing needs must be clearly identified.</p></article><article class="support-principle"><span>D</span><strong>Plan execution</strong><p>Access, curing, shutdown and phased work affect the practical project plan.</p></article></div></div></section>

    <section class="section support-cta"><div class="container support-cta-grid"><div><span class="section-eyebrow">03 / Need project-specific guidance?</span><h2 class="section-title">Bring the floor condition into the discussion.</h2></div><div><p>Generic guidance can narrow the options, but the final recommendation should reflect the actual site and operating requirement.</p><div class="support-actions"><a class="btn btn-primary" href="<?= site_escape(site_url('schedule-visit.php')) ?>">Schedule Site Visit</a><a class="btn btn-outline" href="<?= site_escape(site_url('contact.php')) ?>">Contact Akshaya</a></div></div></div></section>
</main>
<?php require __DIR__ . '/../includes/footer.php'; ?>
