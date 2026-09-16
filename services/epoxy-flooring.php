<?php
$pageTitle = 'Epoxy Flooring Solutions';
$pageDescription = 'Explore epoxy flooring for industrial, commercial and controlled environments. Akshaya assesses the substrate, operating conditions and project requirements before recommending the system.';
$bodyClass = 'service-page service-epoxy';
$assetPrefix = '..';
require __DIR__ . '/../includes/header.php';

$arrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
$visitUrl = site_escape(site_url('schedule-visit.php'));
$callUrl = site_escape('tel:+' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['phone']));

$problems = [
    ['Worn or damaged floor', 'Existing coatings, cracks and surface wear need to be understood before selecting a new finish.'],
    ['Dusting concrete', 'A weak or dusty surface may require preparation and repair before a resin flooring system can be considered.'],
    ['Cleaning difficulty', 'A seamless floor concept can be considered where joints and difficult-to-clean interfaces are a concern.'],
    ['Finish requirement', 'Smooth or textured finishes can be reviewed around cleaning, traffic and area-use requirements.'],
];

$benefits = [
    ['Seamless surface concept', 'Epoxy systems can create a continuous floor finish where the project and substrate are suitable.'],
    ['Finish options', 'Smooth and textured finishes can be considered, with colour selected around the project requirement.'],
    ['Maintenance planning', 'Floor finish and care requirements can be considered alongside the facility cleaning routine.'],
    ['Repair and levelling scope', 'Depressions, local repairs or levelling requirements can be assessed as part of surface preparation.'],
];

$suitability = [
    ['Manufacturing areas', 'Where traffic, surface wear, cleaning and shutdown planning need to be considered.'],
    ['Warehouses', 'Where handling routes and the existing concrete condition influence the approach.'],
    ['Commercial / institutional areas', 'Where appearance, maintenance and daily use need to be balanced.'],
    ['Pharma / controlled areas', 'Where cleaning, floor-to-wall details and project-specific quality requirements matter.'],
    ['Food-related environments', 'Where cleaning routines and operating exposure need assessment before system selection.'],
    ['Utility / support spaces', 'Where a practical resin finish may be considered after reviewing the substrate and use.'],
];

$assessment = [
    ['Surface condition', 'Review the substrate, existing coating, cracks, contamination and visible damage.'],
    ['Moisture / site condition', 'Check whether moisture or other site conditions could affect preparation or application.'],
    ['Operating environment', 'Discuss traffic, loads, cleaning, exposure and shutdown availability.'],
    ['Finish and system selection', 'Agree the finish concept and system approach only after the floor and use are understood.'],
];

$process = [
    ['01', 'Site review', 'Understand the area, existing condition and operational requirement.'],
    ['02', 'Surface preparation', 'Prepare the substrate to the agreed project method and repair scope.'],
    ['03', 'System application', 'Apply the selected flooring build-up with trained manpower and site coordination.'],
    ['04', 'Finish control', 'Review the selected smooth or textured finish and agreed visual requirements.'],
    ['05', 'Inspection & handover', 'Inspect the finished work and discuss project-specific care and warranty terms.'],
];
?>

<main class="service-main" id="main-content">
    <section class="service-hero" aria-labelledby="service-title">
        <div class="container-wide service-hero-grid">
            <div class="service-hero-copy">
                <span class="service-kicker">Flooring Solution / Epoxy</span>
                <h1 id="service-title">Epoxy <em>Flooring</em></h1>
                <p>A seamless resin-flooring approach for industrial, commercial and controlled environments, selected around the existing floor, operating conditions and project requirements.</p>
                <div class="service-hero-actions">
                    <a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a>
                    <a class="btn btn-outline" href="<?= $callUrl ?>">Talk to Our Team <?= $arrow ?></a>
                </div>
                <p class="service-hero-note">Final system selection and specification depend on site conditions and technical assessment.</p>
            </div>
            <div class="service-hero-media" role="img" aria-label="Akshaya flooring project photograph">
                <div class="service-hero-badge"><span>Start with the floor</span><strong>Surface condition, moisture, use and shutdown window guide the recommendation.</strong></div>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="what-is-epoxy">
        <div class="container service-intro-grid">
            <div><span class="section-eyebrow">01 / What it is</span><h2 class="section-title" id="what-is-epoxy">A continuous resin floor, not a one-size-fits-all coating.</h2></div>
            <div class="service-copy">
                <p class="service-definition">Epoxy flooring is a <strong>mixed and applied resin system</strong> that can form a continuous surface with smooth or textured finish options.</p>
                <p>The exact build-up, surface preparation, finish and application method should be decided after the actual floor and operating environment are assessed.</p>
                <p>This is especially important when the existing substrate has cracks, moisture, old coatings, contamination or uneven areas.</p>
            </div>
        </div>
    </section>

    <section class="section service-problems" aria-labelledby="epoxy-problems">
        <div class="container">
            <span class="section-eyebrow">02 / Problems to assess</span>
            <h2 class="section-title" id="epoxy-problems">Start with what is happening on the floor.</h2>
            <div class="service-problem-grid">
                <?php foreach ($problems as $i => [$title, $description]): ?>
                <article class="service-problem"><span><?= sprintf('%02d', $i + 1) ?></span><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="epoxy-benefits">
        <div class="container">
            <span class="section-eyebrow">03 / Why it may be considered</span>
            <h2 class="section-title" id="epoxy-benefits">Useful where the finish and the operating requirement need to work together.</h2>
            <div class="service-benefits-grid">
                <div class="service-benefits-list">
                    <?php foreach ($benefits as $i => [$title, $description]): ?>
                    <article class="service-benefit"><span><?= sprintf('%02d', $i + 1) ?></span><div><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></div></article>
                    <?php endforeach; ?>
                </div>
                <div class="service-benefits-media" role="img" aria-label="Akshaya flooring application photograph"></div>
            </div>
        </div>
    </section>

    <section class="section service-suitability" aria-labelledby="epoxy-suitable">
        <div class="container">
            <span class="section-eyebrow">04 / Where it may be suitable</span>
            <h2 class="section-title" id="epoxy-suitable">Different environments create different requirements.</h2>
            <p class="section-description">These are common discussion areas, not automatic suitability claims. The floor condition and project requirements still need to be assessed.</p>
            <div class="service-suitability-grid">
                <?php foreach ($suitability as [$title, $description]): ?><div class="service-suitability-item"><strong><?= site_escape($title) ?></strong><span><?= site_escape($description) ?></span></div><?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="epoxy-assessment">
        <div class="container service-assessment-grid">
            <div><span class="section-eyebrow">05 / Assessment approach</span><h2 class="section-title" id="epoxy-assessment">We recommend after understanding the floor.</h2><p class="section-description">The right flooring approach starts with a site review, followed by a technical recommendation based on the actual floor and operating requirement.</p></div>
            <div class="service-assessment-steps">
                <?php foreach ($assessment as $i => [$title, $description]): ?><article class="service-assessment-step"><span><?= sprintf('%02d', $i + 1) ?></span><div><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></div></article><?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section service-process" aria-labelledby="epoxy-process">
        <div class="container">
            <span class="section-eyebrow">06 / Installation pathway</span>
            <h2 class="section-title" id="epoxy-process">From existing floor to controlled application.</h2>
            <div class="service-process-grid">
                <?php foreach ($process as [$number, $title, $description]): ?><article class="service-process-item"><span><?= site_escape($number) ?></span><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></article><?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="epoxy-care">
        <div class="container service-maintenance-grid">
            <div><span class="section-eyebrow">07 / Maintenance & care</span><h2 class="section-title" id="epoxy-care">The finished floor still needs the right care routine.</h2><p class="section-description">Cleaning method, traffic and operating exposure should be considered alongside the selected finish. Maintenance guidance should be specific to the installed system.</p></div>
            <div>
                <div class="service-note-box">A smoother finish may simplify routine cleaning in some environments, while other areas may call for more texture. The correct balance should be decided around actual use and cleaning needs.</div>
                <div class="service-faq">
                    <details><summary>Can epoxy flooring be used over an existing floor?</summary><p>It can be considered on some existing substrates, but only after checking soundness, contamination, moisture and preparation requirements.</p></details>
                    <details><summary>Can the finish be smooth or textured?</summary><p>Yes. Smooth and textured finish options can be discussed. The appropriate finish depends on cleaning, use and project requirements.</p></details>
                    <details><summary>How quickly can the area return to service?</summary><p>This depends on the selected material, site conditions, preparation and project scope. The reopening window should be confirmed for the specific system.</p></details>
                    <details><summary>Is epoxy the right solution for every industrial floor?</summary><p>No. Substrate condition, moisture, loads, traffic, operating exposure and shutdown planning all affect the recommendation.</p></details>
                </div>
            </div>
        </div>
    </section>

    <section class="section service-final" aria-labelledby="epoxy-final-title">
        <div class="container service-final-grid">
            <div><span class="section-eyebrow">08 / Start with assessment</span><h2 class="section-title" id="epoxy-final-title">Before choosing epoxy, let us understand the floor.</h2></div>
            <div><p>Share the current floor condition, facility use, approximate area and available shutdown window. We can then discuss the appropriate next step.</p><div class="service-hero-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= $callUrl ?>">Call an Expert <?= $arrow ?></a></div></div>
        </div>
    </section>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>