<?php
$pageTitle = 'Pharma Flooring & Wall Coating Solutions';
$pageDescription = 'Flooring and wall-coating solutions for pharmaceutical and controlled environments, selected around cleaning, floor-to-wall detailing, substrate condition and project requirements.';
$bodyClass = 'industry-page industry-pharma';
$assetPrefix = '..';
require __DIR__ . '/../includes/header.php';

$arrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
$visitUrl = site_escape(site_url('schedule-visit.php'));
$callUrl = site_escape('tel:+' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['phone']));

$challenges = [
    ['Cleaning & hygiene', 'The selected finish and detailing should support the facility cleaning routine and area-use requirements.'],
    ['Floor-to-wall junctions', 'Coving and transition details may be important where cleanable interfaces are required.'],
    ['Existing substrate', 'Cracks, moisture, old coatings and uneven surfaces can affect preparation and system selection.'],
    ['Shutdown planning', 'Application sequencing must be coordinated around access, isolation and available production windows.'],
];

$zones = [
    ['Processing / manufacturing rooms', 'Floor and wall finishes should be discussed around cleaning, exposure and operational requirements.'],
    ['Sterile / controlled rooms', 'Surface continuity, detailing and project-specific quality requirements need careful review.'],
    ['Laboratory areas', 'Cleaning routine, traffic, equipment and local exposure influence the floor approach.'],
    ['Utility / service spaces', 'Practical durability and maintenance requirements can differ from controlled rooms.'],
    ['Corridors / movement routes', 'Traffic, trolley movement and cleaning frequency should be considered together.'],
    ['Wall-to-floor transitions', 'Coving may be considered where the project calls for easier-to-clean junctions.'],
];

$solutions = [
    ['Epoxy Flooring', 'A seamless resin-flooring option where substrate and project requirements are suitable.', 'services/epoxy-flooring.php'],
    ['PU Flooring', 'A resin-flooring route to assess where operating conditions call for a different system approach.', 'services/pu-flooring.php'],
    ['Clean Room Wall Coating', 'Wall-surface treatment for controlled spaces, selected around substrate, cleaning and project requirements.', 'services/clean-room-wall-coating.php'],
    ['Coving / transition detailing', 'Floor-to-wall detailing can be included where the project requires cleanable transitions.', 'services/epoxy-flooring.php'],
];

$assessment = [
    ['Area classification & use', 'Understand how the room is used, cleaned and accessed before discussing a finish.'],
    ['Substrate review', 'Inspect floor and wall conditions, existing coatings, cracks, moisture and repair requirements.'],
    ['Cleaning / exposure review', 'Discuss wash-down, cleaning chemicals, traffic and other operating conditions relevant to the area.'],
    ['Detailing & finish', 'Confirm coving, transitions, texture and finish expectations after the site conditions are understood.'],
];

$process = [
    ['01', 'Site survey', 'Review room use, current surfaces and access conditions.'],
    ['02', 'Surface assessment', 'Identify preparation, repairs, moisture concerns and interface details.'],
    ['03', 'System recommendation', 'Propose the floor / wall approach around the agreed project requirement.'],
    ['04', 'Controlled execution', 'Coordinate preparation and application with access and shutdown planning.'],
    ['05', 'Inspection & handover', 'Review the completed finish and project-specific care guidance.'],
];
?>

<main class="industry-main" id="main-content">
    <section class="industry-hero" aria-labelledby="industry-title">
        <div class="container-wide industry-hero-grid">
            <div class="industry-hero-copy">
                <span class="industry-kicker">Industry / Pharmaceutical</span>
                <h1 id="industry-title">Pharma &amp; <em>Controlled Environments</em></h1>
                <p>Flooring and wall-surface solutions should be selected around the room function, cleaning routine, substrate condition, floor-to-wall detailing and the project’s own quality requirements.</p>
                <div class="industry-hero-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= $callUrl ?>">Talk to Our Team <?= $arrow ?></a></div>
                <p class="industry-hero-note">Final system selection and specification depend on site conditions and project assessment.</p>
            </div>
            <div class="industry-hero-media" role="img" aria-label="Akshaya flooring project source photograph">
                <div class="industry-hero-badge"><span>Assessment first</span><strong>Cleaning, substrate condition, room use and interface detailing shape the recommendation.</strong></div>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="pharma-needs">
        <div class="container industry-intro-grid">
            <div><span class="section-eyebrow">01 / Facility needs</span><h2 class="section-title" id="pharma-needs">The room requirement matters as much as the flooring material.</h2></div>
            <div class="industry-copy"><p class="industry-definition">Akshaya’s proposal material treats pharmaceutical flooring as a <strong>site-specific technical selection</strong>, with the technical proposal following the site visit.</p><p>For controlled spaces, the discussion can include floor finish, cleanability, wall coating, coving and how the work will be coordinated around access and operating conditions.</p><p>We do not present one flooring system as automatically suitable for every pharmaceutical area.</p></div>
        </div>
    </section>

    <section class="section industry-challenges" aria-labelledby="pharma-challenges">
        <div class="container"><span class="section-eyebrow">02 / Common challenges</span><h2 class="section-title" id="pharma-challenges">The floor becomes part of the room strategy.</h2><div class="industry-challenge-grid"><?php foreach ($challenges as $i => [$title,$description]): ?><article class="industry-challenge"><span><?= sprintf('%02d',$i+1) ?></span><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></article><?php endforeach; ?></div></div>
    </section>

    <section class="section" aria-labelledby="pharma-zones">
        <div class="container"><span class="section-eyebrow">03 / Areas within the facility</span><h2 class="section-title" id="pharma-zones">Different zones can need different surface decisions.</h2><div class="industry-zone-grid"><?php foreach ($zones as [$title,$description]): ?><div class="industry-zone"><strong><?= site_escape($title) ?></strong><span><?= site_escape($description) ?></span></div><?php endforeach; ?></div></div>
    </section>

    <section class="section industry-solutions" aria-labelledby="pharma-solutions">
        <div class="container"><span class="section-eyebrow">04 / Solution routes</span><h2 class="section-title" id="pharma-solutions">Match the surface system to the room requirement.</h2><p class="section-description">These are solution categories to assess, not automatic recommendations.</p><div class="industry-solution-list"><?php foreach ($solutions as $i => [$title,$description,$path]): ?><article class="industry-solution"><span><?= sprintf('%02d',$i+1) ?></span><div><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></div><a href="<?= site_escape(site_url($path)) ?>">Explore <?= $arrow ?></a></article><?php endforeach; ?></div></div>
    </section>

    <section class="section" aria-labelledby="pharma-assessment">
        <div class="container industry-assessment-grid"><div><span class="section-eyebrow">05 / Technical assessment</span><h2 class="section-title" id="pharma-assessment">We start with the room, not a product name.</h2><p class="section-description">The objective is to understand what the surface must support before recommending the flooring or wall-coating approach.</p></div><div class="industry-assessment-steps"><?php foreach ($assessment as $i => [$title,$description]): ?><article class="industry-assessment-step"><span><?= sprintf('%02d',$i+1) ?></span><div><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></div></article><?php endforeach; ?></div></div>
    </section>

    <section class="section industry-execution" aria-labelledby="pharma-execution">
        <div class="container"><span class="section-eyebrow">06 / Execution approach</span><h2 class="section-title" id="pharma-execution">Plan the work around the environment.</h2><div class="industry-process-grid"><?php foreach ($process as [$number,$title,$description]): ?><article class="industry-process-item"><span><?= site_escape($number) ?></span><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></article><?php endforeach; ?></div></div>
    </section>

    <section class="section" aria-labelledby="pharma-quality">
        <div class="container industry-intro-grid"><div><span class="section-eyebrow">07 / Quality considerations</span><h2 class="section-title" id="pharma-quality">Project requirements must be confirmed before we make performance claims.</h2></div><div><div class="industry-note">Akshaya’s supplied proposal material references sterile rooms, clean rooms, processing rooms and drug-manufacturing spaces. It also contains strong technical and standards-related statements. On this website, we intentionally keep those claims project-dependent unless a specific approved specification or test document supports them.</div><div class="industry-faq"><details><summary>Do all pharma areas need the same flooring system?</summary><p>No. Room use, cleaning, substrate condition, traffic, exposure and project requirements can differ substantially.</p></details><details><summary>Can floor-to-wall coving be included?</summary><p>Yes, coving can be discussed where the project requires a continuous, easier-to-clean floor-to-wall transition.</p></details><details><summary>Do you publish universal pharma compliance claims?</summary><p>No. Any compliance or performance requirement should be tied to the actual selected system and approved project documentation.</p></details></div></div></div>
    </section>

    <section class="section industry-final" aria-labelledby="pharma-final-title"><div class="container industry-final-grid"><div><span class="section-eyebrow">08 / Start with assessment</span><h2 class="section-title" id="pharma-final-title">Planning a controlled or pharmaceutical area?</h2></div><div><p>Share the room use, current floor and wall condition, approximate area, cleaning requirement and available shutdown window. We can then discuss the right assessment path.</p><div class="industry-hero-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= $callUrl ?>">Call an Expert <?= $arrow ?></a></div></div></div></section>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>
