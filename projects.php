<?php
$pageTitle = 'Flooring Projects';
$pageDescription = 'Explore Akshaya flooring project case studies across industrial and commercial environments, filterable by flooring solution.';
$bodyClass = 'support-page projects-page';
$assetPrefix = '.';
require_once __DIR__ . '/includes/header.php';

$visitUrl = site_escape(site_url('schedule-visit.php'));
$arrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
$cases = project_case_studies();

$filters = ['all' => 'All Projects'];
foreach ($cases as $case) {
    $filters[$case['category']] = $case['categoryLabel'];
}

$method = [
    ['01', 'Challenge', 'What was happening on the existing floor, and what did the operation need from a replacement or repair?'],
    ['02', 'Assessment', 'What substrate condition, moisture, traffic and operating constraints were reviewed on site?'],
    ['03', 'Approach', 'What flooring category and execution plan were discussed for the specific project?'],
    ['04', 'Outcome', 'What was completed and handed over, using only confirmed, client-approved facts.'],
];
?>

<main class="support-main" id="main-content">
    <section class="support-hero" aria-labelledby="projects-title">
        <div class="container-wide support-hero-grid">
            <div class="support-hero-copy">
                <span class="support-kicker">Projects</span>
                <h1 id="projects-title">The Challenge. The Approach. The <em>Result.</em></h1>
                <p>Each entry below follows the same assessment-led structure. Filter by flooring solution to see relevant case studies, then open a project to read the full challenge-to-outcome story.</p>
                <div class="support-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Discuss Your Project</a><a class="btn btn-outline" href="<?= site_escape(site_url('gallery.php')) ?>">View Gallery</a></div>
            </div>
            <div class="support-hero-media" role="img" aria-label="Akshaya flooring project source photograph"></div>
        </div>
    </section>

    <section class="section" aria-labelledby="project-selection" data-filter-group>
        <div class="container">
            <div class="projects-toolbar">
                <div><span class="section-eyebrow">01 / Selected work</span><h2 class="section-title" id="project-selection">Filter by flooring solution.</h2></div>
                <p class="section-description">Project identity, exact figures and outcomes are published only once client-approved. Case studies below use safe, assessment-led wording throughout.</p>
            </div>
            <div class="filter-bar" data-filter-bar role="group" aria-label="Filter projects by flooring solution">
                <?php foreach ($filters as $slug => $label): ?>
                <button class="chip" type="button" data-filter="<?= site_escape($slug) ?>" aria-pressed="<?= $slug === 'all' ? 'true' : 'false' ?>"><?= site_escape($label) ?></button>
                <?php endforeach; ?>
            </div>
            <p class="filter-count" data-filter-count></p>

            <div class="projects-grid">
                <?php foreach ($cases as $slug => $case): ?>
                <article class="project-card" data-filter-item data-category="<?= site_escape($case['category']) ?>" style="background-image:url('<?= site_escape(site_url($case['image'])) ?>')">
                    <span class="badge project-card-tag"><?= site_escape($case['categoryLabel']) ?></span>
                    <div class="project-card-copy">
                        <span><?= site_escape($case['industry']) ?></span>
                        <h3><?= site_escape($case['title']) ?></h3>
                        <p><?= site_escape($case['challenge']) ?></p>
                        <a class="project-card-link" href="<?= site_escape(site_url('project/detail-template.php?id=' . $slug)) ?>">View Case Study <?= $arrow ?></a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section support-dark" aria-labelledby="project-method">
        <div class="container">
            <span class="section-eyebrow">02 / Case-study method</span>
            <h2 class="section-title" id="project-method">Every published project explains more than a photograph.</h2>
            <div class="method-stepper">
                <div class="method-tabs" role="tablist" aria-label="Case-study method stages">
                    <?php foreach ($method as $i => [$num, $label, $desc]): ?>
                    <button class="method-tab" type="button" role="tab" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>"><span><?= site_escape($num) ?></span><strong><?= site_escape($label) ?></strong></button>
                    <?php endforeach; ?>
                </div>
                <div class="method-panels">
                    <?php foreach ($method as $i => [$num, $label, $desc]): ?>
                    <div class="method-panel<?= $i === 0 ? ' is-active' : '' ?>"><p><?= site_escape($desc) ?></p></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section support-cta" aria-labelledby="project-cta">
        <div class="container support-cta-grid">
            <div><span class="section-eyebrow">03 / Your requirement</span><h2 class="section-title" id="project-cta">Have a floor that needs assessment?</h2></div>
            <div><p>Send us the current floor condition, facility use, approximate area and preferred work window.</p><div class="support-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit</a><a class="btn btn-outline" href="<?= site_escape(site_url('contact.php')) ?>">Contact Us</a></div></div>
        </div>
    </section>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
