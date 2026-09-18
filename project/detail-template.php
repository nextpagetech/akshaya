<?php
// Reusable Project Detail template. Pass ?id=<slug> (see project_case_studies()
// in includes/reusable-components.php); falls back to the first case study.
$assetPrefix = '..';
require_once __DIR__ . '/../includes/reusable-components.php';

$cases = project_case_studies();
$requestedId = isset($_GET['id']) ? (string) $_GET['id'] : '';
$activeId = array_key_exists($requestedId, $cases) ? $requestedId : array_key_first($cases);
$case = $cases[$activeId];

$pageTitle = $case['title'] . ' — Project Case Study';
$pageDescription = 'Case study: ' . $case['title'] . '. Challenge, assessment, recommended approach and outcome, following Akshaya\'s assessment-led process.';
$bodyClass = 'support-page case-page';
require __DIR__ . '/../includes/header.php';

$arrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
$compareIcon = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M8 6 4 12l4 6M16 6l4 6-4 6"/></svg>';
$visitUrl = site_escape(site_url('schedule-visit.php'));
$callUrl = site_escape('tel:+' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['phone']));

$timeline = [
    ['Site survey', 'Understand the area, existing condition and how the space is used day to day.'],
    ['Surface & moisture testing', 'Check substrate soundness, contamination and moisture before proposing a system.'],
    ['Recommendation', 'Discuss a flooring category and build-up that fits the assessed condition and requirement.'],
    ['Controlled application', 'Sequence preparation and application around access, shutdown and site coordination.'],
    ['Inspection & handover', 'Review the completed work and share project-specific care and warranty guidance.'],
];

$related = array_diff_key($cases, [$activeId => true]);
$related = array_slice($related, 0, 4, true);
?>

<main class="support-main case-main" id="main-content">
    <section class="case-hero" style="background-image:url('<?= site_escape(site_url($case['image'])) ?>')" aria-labelledby="case-title">
        <div class="container-wide case-hero-inner">
            <div class="case-meta-row">
                <span class="badge"><?= site_escape($case['categoryLabel']) ?></span>
                <span class="badge tag-neutral"><?= site_escape($case['industry']) ?></span>
            </div>
            <h1 id="case-title"><?= site_escape($case['title']) ?></h1>
            <p><?= site_escape($case['challenge']) ?></p>
        </div>
    </section>

    <div class="container-wide">
        <div class="case-summary-grid">
            <div class="case-summary-item"><span>Industry</span><strong><?= site_escape($case['industry']) ?></strong></div>
            <div class="case-summary-item"><span>Location</span><strong><?= site_escape($case['location']) ?></strong></div>
            <div class="case-summary-item"><span>Approximate area</span><strong><?= site_escape($case['area']) ?></strong></div>
            <div class="case-summary-item"><span>Execution window</span><strong><?= site_escape($case['duration']) ?></strong></div>
        </div>
    </div>

    <section class="section case-narrative" aria-labelledby="case-story">
        <div class="container">
            <span class="section-eyebrow">01 / Case study</span>
            <h2 class="section-title" id="case-story">Challenge, assessment, approach and execution.</h2>

            <div class="editorial-row">
                <div class="editorial-copy"><span class="editorial-index">01</span><h3>The Challenge</h3><p><?= site_escape($case['challenge']) ?></p></div>
                <div class="editorial-media" style="background-image:url('<?= site_escape(site_url($case['beforeImage'])) ?>')"><span class="badge editorial-tag">Existing condition</span></div>
            </div>
            <div class="editorial-row editorial-row--reverse">
                <div class="editorial-copy"><span class="editorial-index">02</span><h3>The Assessment</h3><p><?= site_escape($case['assessment']) ?></p></div>
                <div class="editorial-media" style="background-image:url('<?= site_escape(site_url($case['image'])) ?>')"><span class="badge editorial-tag">Site review</span></div>
            </div>
            <div class="editorial-row">
                <div class="editorial-copy"><span class="editorial-index">03</span><h3>The Recommended Approach</h3><p><?= site_escape($case['system']) ?></p></div>
                <div class="editorial-media" style="background-image:url('<?= site_escape(site_url($case['afterImage'])) ?>')"><span class="badge editorial-tag"><?= site_escape($case['categoryLabel']) ?></span></div>
            </div>
        </div>
    </section>

    <section class="section support-dark" aria-labelledby="case-compare">
        <div class="container">
            <span class="section-eyebrow">02 / Before &amp; after</span>
            <h2 class="section-title" id="case-compare">Drag to compare the surface condition.</h2>
            <p class="section-description">Illustrative comparison built from Akshaya's supplied project photography. Slide to compare the existing surface against the finished result.</p>
            <div class="compare-frame">
                <img src="<?= site_escape(site_url($case['beforeImage'])) ?>" alt="Existing floor condition before work" width="1200" height="750" loading="lazy">
                <img class="compare-after" src="<?= site_escape(site_url($case['afterImage'])) ?>" alt="Floor condition after execution" width="1200" height="750" loading="lazy">
                <span class="compare-line" aria-hidden="true"></span>
                <span class="compare-handle" aria-hidden="true"><?= $compareIcon ?></span>
                <input class="compare-range" type="range" min="0" max="100" value="50" aria-label="Drag to compare before and after images">
            </div>
            <div class="compare-labels"><span>Before</span><span>After</span></div>
            <p class="compare-note">Photography is illustrative of Akshaya's supplied project archive; it is not claimed to be a matched before/after pair for this specific case unless separately confirmed.</p>
        </div>
    </section>

    <section class="section" aria-labelledby="case-execution">
        <div class="container">
            <span class="section-eyebrow">03 / Execution approach</span>
            <h2 class="section-title" id="case-execution"><?= site_escape($case['execution']) ?></h2>
            <p class="section-description">Select a stage to see how it applies to this project.</p>
            <div class="case-timeline" role="tablist" aria-label="Execution timeline">
                <?php foreach ($timeline as $i => [$label, $desc]): ?>
                <button class="timeline-step" type="button" role="tab" aria-expanded="<?= $i === 0 ? 'true' : 'false' ?>"><span class="step-num"><?= sprintf('%02d', $i + 1) ?></span><strong><?= site_escape($label) ?></strong></button>
                <?php endforeach; ?>
                <?php foreach ($timeline as $i => [$label, $desc]): ?>
                <div class="timeline-panel<?= $i === 0 ? ' is-active' : '' ?>"><p><?= site_escape($desc) ?></p></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section support-dark" aria-labelledby="case-outcome">
        <div class="container support-split">
            <div><span class="section-eyebrow">04 / Outcome &amp; support</span><h2 class="section-title" id="case-outcome">Handover is the start of the support relationship.</h2></div>
            <div class="support-copy" style="color:#d1e0e7"><p style="color:#fff"><?= site_escape($case['outcome']) ?></p><p>Beyond handover, Akshaya shares maintenance guidance specific to the installed system and remains reachable for inspection or warranty-related questions.</p></div>
        </div>
    </section>

    <?php if ($related): ?>
    <section class="section" aria-labelledby="case-related">
        <div class="container">
            <span class="section-eyebrow">05 / Related projects</span>
            <h2 class="section-title" id="case-related">More case studies to explore.</h2>
            <div class="related-scroller-wrap">
                <div class="related-scroller">
                    <?php foreach ($related as $relSlug => $relCase): ?>
                    <a class="related-card" href="<?= site_escape(site_url('project/detail-template.php?id=' . $relSlug)) ?>" style="background-image:url('<?= site_escape(site_url($relCase['image'])) ?>')">
                        <div class="related-card-copy"><span><?= site_escape($relCase['categoryLabel']) ?></span><strong><?= site_escape($relCase['title']) ?></strong></div>
                    </a>
                    <?php endforeach; ?>
                </div>
                <div class="related-nav"><button type="button" data-scroll-prev aria-label="Scroll related projects left"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m15 6-6 6 6 6"/></svg></button><button type="button" data-scroll-next aria-label="Scroll related projects right"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m9 6 6 6-6 6"/></svg></button></div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="section support-cta" aria-labelledby="case-cta">
        <div class="container support-cta-grid">
            <div><span class="section-eyebrow">06 / Start with assessment</span><h2 class="section-title" id="case-cta">Facing something similar?</h2></div>
            <div><p>Share your floor condition, facility use and approximate area. We'll discuss the right assessment path.</p><div class="support-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= $callUrl ?>">Call an Expert</a></div></div>
        </div>
    </section>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>
