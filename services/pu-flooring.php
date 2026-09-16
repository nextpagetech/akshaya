<?php
$pageTitle = 'PU Flooring Solutions';
$pageDescription = 'Explore polyurethane flooring solutions for demanding industrial and process environments. Akshaya assesses the floor, operating conditions and project requirements before recommending a system.';
$bodyClass = 'service-page service-pu';
$assetPrefix = '..';
require __DIR__ . '/../includes/header.php';

$arrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
$visitUrl = site_escape(site_url('schedule-visit.php'));
$callUrl = site_escape('tel:+' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['phone']));

$problems = [
    ['Demanding operating conditions', 'The environment, cleaning routine, traffic and exposure need to be reviewed before a PU system is selected.'],
    ['Existing floor deterioration', 'Cracks, worn areas and failed coatings can affect preparation and the final flooring recommendation.'],
    ['Production constraints', 'Available shutdown time and access conditions should be understood before planning preparation and application.'],
    ['Cleaning and finish needs', 'The selected finish should work with the way the area is cleaned and used every day.'],
];

$benefits = [
    ['Project-specific resin system', 'PU flooring can be considered where the operating environment calls for a resin flooring approach tailored to the area.'],
    ['Continuous floor concept', 'A seamless surface can be considered where joints and cleaning interfaces need to be reduced.'],
    ['Finish selected around use', 'Texture, colour and finish should be chosen around traffic, cleaning and operational requirements.'],
    ['Planned application', 'Surface preparation, material selection and execution should be coordinated around the site and shutdown window.'],
];

$suitability = [
    ['Production areas', 'Where operating exposure, cleaning and production planning need to be considered together.'],
    ['Process environments', 'Where the floor is part of an active working area and system selection must reflect the site conditions.'],
    ['Food-related facilities', 'Where cleaning routines and operating conditions are important inputs to the flooring decision.'],
    ['Pharma / controlled spaces', 'Where cleanability, detailing and project-specific requirements need review.'],
    ['Industrial utility areas', 'Where floor condition, maintenance and operating exposure influence the system choice.'],
    ['High-use work zones', 'Where traffic routes and daily activity should be assessed before specifying the floor.'],
];

$assessment = [
    ['Substrate condition', 'Review the concrete or existing finish, cracks, weak areas, contamination and previous repairs.'],
    ['Moisture / site condition', 'Check site conditions that may affect preparation, application or the selected system.'],
    ['Operational exposure', 'Understand traffic, cleaning, loads, temperature conditions and other relevant operating factors.'],
    ['Shutdown and execution plan', 'Match the proposed approach to access, production planning and the available work window.'],
];

$process = [
    ['01', 'Site survey', 'Review the floor, area use and operating conditions.'],
    ['02', 'Surface preparation', 'Prepare the existing floor to the agreed repair and preparation method.'],
    ['03', 'System application', 'Apply the selected PU flooring build-up in controlled stages.'],
    ['04', 'Finish review', 'Check the agreed finish, detailing and visual requirement.'],
    ['05', 'Inspection & care', 'Inspect the completed floor and explain project-specific maintenance guidance.'],
];
?>

<main class="service-main" id="main-content">
    <section class="service-hero" aria-labelledby="service-title">
        <div class="container-wide service-hero-grid">
            <div class="service-hero-copy">
                <span class="service-kicker">Flooring Solution / Polyurethane</span>
                <h1 id="service-title">PU <em>Flooring</em></h1>
                <p>A polyurethane resin-flooring approach considered for industrial and process environments after reviewing the substrate, operating conditions and project needs.</p>
                <div class="service-hero-actions">
                    <a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a>
                    <a class="btn btn-outline" href="<?= $callUrl ?>">Talk to Our Team <?= $arrow ?></a>
                </div>
                <p class="service-hero-note">Final system selection and specification depend on site conditions and technical assessment.</p>
            </div>
            <div class="service-hero-media" role="img" aria-label="Technical illustration representing a layered PU flooring system">
                <div class="service-hero-badge"><span>Operating conditions first</span><strong>Floor condition, cleaning, traffic, exposure and shutdown planning guide the discussion.</strong></div>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="what-is-pu">
        <div class="container service-intro-grid">
            <div><span class="section-eyebrow">01 / What it is</span><h2 class="section-title" id="what-is-pu">A resin-flooring system selected around the environment.</h2></div>
            <div class="service-copy">
                <p class="service-definition">PU flooring is a <strong>polyurethane-based flooring system</strong> considered where the floor must be matched carefully to the operating conditions.</p>
                <p>The exact build-up should not be selected only from a product name. Existing floor condition, cleaning routine, daily use, exposure and the available installation window all influence the recommendation.</p>
                <p>For that reason, Akshaya starts with the site and the operating requirement before discussing the final system.</p>
            </div>
        </div>
    </section>

    <section class="section service-problems" aria-labelledby="pu-problems">
        <div class="container">
            <span class="section-eyebrow">02 / Problems to assess</span>
            <h2 class="section-title" id="pu-problems">The environment matters as much as the floor itself.</h2>
            <div class="service-problem-grid">
                <?php foreach ($problems as $i => [$title, $description]): ?>
                <article class="service-problem"><span><?= sprintf('%02d', $i + 1) ?></span><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="pu-benefits">
        <div class="container">
            <span class="section-eyebrow">03 / Why it may be considered</span>
            <h2 class="section-title" id="pu-benefits">A system discussion built around the way the area operates.</h2>
            <div class="service-benefits-grid">
                <div class="service-benefits-list">
                    <?php foreach ($benefits as $i => [$title, $description]): ?>
                    <article class="service-benefit"><span><?= sprintf('%02d', $i + 1) ?></span><div><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></div></article>
                    <?php endforeach; ?>
                </div>
                <div class="service-benefits-media" role="img" aria-label="Technical illustration of flooring system layers"></div>
            </div>
        </div>
    </section>

    <section class="section service-suitability" aria-labelledby="pu-suitable">
        <div class="container">
            <span class="section-eyebrow">04 / Where it may be suitable</span>
            <h2 class="section-title" id="pu-suitable">Suitable use starts with understanding the operating area.</h2>
            <p class="section-description">These are common environments for discussion. They are not automatic suitability or performance guarantees.</p>
            <div class="service-suitability-grid">
                <?php foreach ($suitability as [$title, $description]): ?><div class="service-suitability-item"><strong><?= site_escape($title) ?></strong><span><?= site_escape($description) ?></span></div><?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="pu-assessment">
        <div class="container service-assessment-grid">
            <div><span class="section-eyebrow">05 / Assessment approach</span><h2 class="section-title" id="pu-assessment">We assess the floor and the process around it.</h2><p class="section-description">A technically sound recommendation needs both the substrate condition and the day-to-day operating requirement.</p></div>
            <div class="service-assessment-steps">
                <?php foreach ($assessment as $i => [$title, $description]): ?><article class="service-assessment-step"><span><?= sprintf('%02d', $i + 1) ?></span><div><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></div></article><?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section service-process" aria-labelledby="pu-process">
        <div class="container">
            <span class="section-eyebrow">06 / Installation pathway</span>
            <h2 class="section-title" id="pu-process">A controlled sequence from preparation to handover.</h2>
            <div class="service-process-grid">
                <?php foreach ($process as [$number, $title, $description]): ?><article class="service-process-item"><span><?= site_escape($number) ?></span><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></article><?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="pu-care">
        <div class="container service-maintenance-grid">
            <div><span class="section-eyebrow">07 / Maintenance & care</span><h2 class="section-title" id="pu-care">Floor care should match the installed system and daily use.</h2><p class="section-description">Cleaning routine, traffic and operating exposure should be discussed at handover so maintenance supports the selected flooring system.</p></div>
            <div>
                <div class="service-note-box">A flooring system should be maintained according to its actual finish and operating environment. Cleaning methods and service expectations should be confirmed for the specific project.</div>
                <div class="service-faq">
                    <details><summary>How is PU flooring different from epoxy flooring?</summary><p>They are different resin-flooring categories. The appropriate choice depends on the substrate, operating environment and project requirements rather than the product name alone.</p></details>
                    <details><summary>Is PU flooring suitable for every production area?</summary><p>No. The floor condition, cleaning, traffic, exposure and project specification should be assessed before deciding suitability.</p></details>
                    <details><summary>Can PU flooring be applied over an existing floor?</summary><p>That depends on the existing substrate or coating, its condition and the preparation required. A site assessment is needed before confirming the approach.</p></details>
                    <details><summary>How long does PU flooring installation take?</summary><p>The execution and return-to-service window depends on preparation, area, selected system, site conditions and the agreed work sequence.</p></details>
                </div>
            </div>
        </div>
    </section>

    <section class="section service-final" aria-labelledby="pu-final-title">
        <div class="container service-final-grid">
            <div><span class="section-eyebrow">08 / Start with assessment</span><h2 class="section-title" id="pu-final-title">Before choosing PU, let us understand the operating environment.</h2></div>
            <div><p>Share the floor condition, facility use, approximate area, cleaning routine and available shutdown window. We can then discuss the appropriate next step.</p><div class="service-hero-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= $callUrl ?>">Call an Expert <?= $arrow ?></a></div></div>
        </div>
    </section>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>