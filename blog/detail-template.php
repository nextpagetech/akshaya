<?php
// Reusable Blog Article template. Pass ?post=<slug> (see blog_articles() in
// includes/reusable-components.php); falls back to the first article.
$assetPrefix = '..';
require_once __DIR__ . '/../includes/reusable-components.php';

$articles = blog_articles();
$requestedPost = isset($_GET['post']) ? (string) $_GET['post'] : '';
$activeSlug = array_key_exists($requestedPost, $articles) ? $requestedPost : array_key_first($articles);
$article = $articles[$activeSlug];

$pageTitle = $article['title'];
$pageDescription = $article['excerpt'];
$bodyClass = 'support-page article-page';
require __DIR__ . '/../includes/header.php';

$arrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
$visitUrl = site_escape(site_url('schedule-visit.php'));
$mailUrl = site_escape('mailto:' . $siteConfig['email'] . '?subject=' . rawurlencode($article['title']));
$related = array_diff_key($articles, [$activeSlug => true]);
$related = array_slice($related, 0, 4, true);
?>

<span class="article-progress" data-reading-progress aria-hidden="true"></span>

<main class="support-main" id="main-content">
    <section class="article-hero">
        <div class="container-narrow">
            <span class="badge"><?= site_escape($article['categoryLabel']) ?></span>
            <h1><?= site_escape($article['title']) ?></h1>
            <div class="blog-meta"><span><?= site_escape($article['readTime']) ?></span><span>Akshaya Knowledge Centre</span></div>
        </div>
        <div class="container-wide">
            <div class="article-media" style="background-image:url('<?= site_escape(site_url($article['image'])) ?>')" role="img" aria-label="<?= site_escape($article['title']) ?>"></div>
        </div>
    </section>

    <article class="article-body">
        <?php foreach ($article['body'] as $i => $paragraph): ?>
        <p><?= site_escape($paragraph) ?></p>
        <?php if ($i === 0 && !empty($article['callout'])): ?>
        <p class="article-callout"><?= site_escape($article['callout']) ?></p>
        <?php endif; ?>
        <?php endforeach; ?>

        <?php if (!empty($article['closingHeading'])): ?>
        <h2><?= site_escape($article['closingHeading']) ?></h2>
        <p><?= site_escape($article['closing']) ?></p>
        <?php endif; ?>

        <div class="article-tags">
            <span class="tag tag-neutral"><?= site_escape($article['categoryLabel']) ?></span>
            <span class="tag tag-neutral">Flooring Assessment</span>
            <span class="tag tag-neutral">Industrial Flooring</span>
        </div>

        <div class="article-share">
            <span>Share this article:</span>
            <a href="<?= $mailUrl ?>" aria-label="Share via email"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 5h18v14H3V5Zm1 1 8 7 8-7"/></svg></a>
            <a href="<?= site_escape('https://wa.me/?text=' . rawurlencode($article['title'] . ' — ' . site_url('blog/detail-template.php?post=' . $activeSlug))) ?>" target="_blank" rel="noopener noreferrer" aria-label="Share on WhatsApp"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M21 11.5a8.4 8.4 0 0 1-12.6 7.3L3 20l1.3-5.2A8.4 8.4 0 1 1 21 11.5Z"/></svg></a>
        </div>
    </article>

    <?php if ($related): ?>
    <section class="section" aria-labelledby="article-related">
        <div class="container">
            <span class="section-eyebrow">More from the Knowledge Centre</span>
            <h2 class="section-title" id="article-related">Related reading.</h2>
            <div class="related-scroller-wrap">
                <div class="related-scroller">
                    <?php foreach ($related as $relSlug => $relArticle): ?>
                    <a class="related-card" href="detail-template.php?post=<?= site_escape($relSlug) ?>" style="background-image:url('<?= site_escape(site_url($relArticle['image'])) ?>')">
                        <div class="related-card-copy"><span><?= site_escape($relArticle['categoryLabel']) ?></span><strong><?= site_escape($relArticle['title']) ?></strong></div>
                    </a>
                    <?php endforeach; ?>
                </div>
                <div class="related-nav"><button type="button" data-scroll-prev aria-label="Scroll related articles left"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m15 6-6 6 6 6"/></svg></button><button type="button" data-scroll-next aria-label="Scroll related articles right"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m9 6 6 6-6 6"/></svg></button></div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="section support-cta" aria-labelledby="article-cta">
        <div class="container support-cta-grid">
            <div><span class="section-eyebrow">Start with your floor</span><h2 class="section-title" id="article-cta">Have a similar question about your facility?</h2></div>
            <div><p>Bring your specific floor condition and operating requirement to a technical site visit.</p><div class="support-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= site_escape(site_url('blog/index.php')) ?>">More Articles</a></div></div>
        </div>
    </section>
</main>
<?php require __DIR__ . '/../includes/footer.php'; ?>
