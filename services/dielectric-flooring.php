<?php
$pageTitle = 'Dielectric Flooring Solutions';
$pageDescription = 'Explore dielectric flooring for electrical rooms and areas where insulating floor performance may be required. Final system selection depends on site conditions, equipment, voltage and approved project specifications.';
$bodyClass = 'service-page service-dielectric';
$assetPrefix = '..';
require __DIR__ . '/../includes/header.php';

$arrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
$visitUrl = site_escape(site_url('schedule-visit.php'));
$callUrl = site_escape('tel:+' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['phone']));

$problems = [
    ['Electrical-area requirement', 'Some electrical rooms and equipment zones may require an insulating floor system as part of the facility safety design.'],
    ['Unknown existing floor', 'The substrate, old coating, moisture and floor condition should be understood before any dielectric system is selected.'],
    ['Project specification', 'Voltage class, test method and required performance should come from the approved project or electrical safety requirement.'],
    ['Maintenance condition', 'Damage, wear, contamination or later repairs can affect how the installed floor should be inspected and maintained.'],
];

$benefits = [
    ['Requirement-led selection', 'The flooring approach is selected around the electrical safety requirement rather than by appearance alone.'],
    ['Continuous floor concept', 'A resin-based dielectric finish can be considered where a continuous treated floor is appropriate for the project.'],
    ['Defined application area', 'Electrical rooms, panels and equipment zones can be reviewed as clearly identified work areas.'],
    ['Inspection planning', 'The finished system should be handed over with the project-specific inspection and maintenance requirements.'],
];

$suitability = [
    ['Electrical rooms', 'Where the approved electrical safety design calls for an insulating floor finish.'],
    ['Panel / switchgear areas', 'Where equipment layout and the specified safety requirement need to be understood together.'],
    ['Utility areas', 'Where a project-specific dielectric flooring requirement has been defined.'],
    ['Industrial facilities', 'Where designated electrical zones form part of a broader production environment.'],
    ['Plant rooms', 'Where substrate condition, access and operating equipment influence application planning.'],
    ['Project-specific zones', 'Any location should be reviewed against the approved electrical specification before selection.'],
];

$assessment = [
    ['Electrical requirement', 'Confirm the project-defined voltage, testing requirement and acceptance criteria before recommending a system.'],
    ['Substrate condition', 'Review cracks, moisture, contamination, previous coatings and repair requirements.'],
    ['Area and equipment', 'Understand panel locations, access restrictions, edges, penetrations and shutdown conditions.'],
    ['System and test plan', 'Agree the proposed build-up and required post-installation verification with the project team.'],
];

$process = [
    ['01', 'Requirement review', 'Understand the approved electrical and project requirement.'],
    ['02', 'Floor assessment', 'Inspect substrate condition, moisture and repair needs.'],
    ['03', 'Preparation', 'Prepare the floor to the agreed method and application requirement.'],
    ['04', 'System application', 'Apply the selected dielectric flooring build-up under controlled site conditions.'],
    ['05', 'Inspection & handover', 'Complete project-specific checks and communicate maintenance requirements.'],
];
?>

<main class="service-main" id="main-content">
<section class="service-hero" aria-labelledby="service-title"><div class="container-wide service-hero-grid"><div class="service-hero-copy"><span class="service-kicker">Flooring Solution / Dielectric</span><h1 id="service-title">Dielectric <em>Flooring</em></h1><p>A requirement-led flooring approach for designated electrical areas where insulating floor performance forms part of the approved project or safety specification.</p><div class="service-hero-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= $callUrl ?>">Talk to Our Team <?= $arrow ?></a></div><p class="service-hero-note">Electrical performance values and test criteria must be confirmed from the approved project requirement before system selection.</p></div><div class="service-hero-media service-technical-media" role="img" aria-label="Technical layered flooring visual"><div class="service-hero-badge"><span>Specification first</span><strong>Voltage requirement, test method, substrate condition and equipment layout guide the flooring approach.</strong></div></div></div></section>

<section class="section" aria-labelledby="what-is-dielectric"><div class="container service-intro-grid"><div><span class="section-eyebrow">01 / What it is</span><h2 class="section-title" id="what-is-dielectric">A specialist floor for a defined electrical requirement.</h2></div><div class="service-copy"><p class="service-definition">Dielectric flooring should be treated as a <strong>project-specified electrical safety system</strong>, not as a decorative resin floor with a generic performance claim.</p><p>The required insulating performance, test method and acceptance criteria should be established before the flooring build-up is selected.</p><p>Akshaya's role begins with the floor condition and site constraints, then aligns the application approach with the approved technical requirement.</p></div></div></section>

<section class="section service-problems" aria-labelledby="dielectric-problems"><div class="container"><span class="section-eyebrow">02 / What needs to be understood</span><h2 class="section-title" id="dielectric-problems">Electrical safety starts with a clear specification.</h2><div class="service-problem-grid"><?php foreach ($problems as $i => [$title,$description]): ?><article class="service-problem"><span><?= sprintf('%02d',$i+1) ?></span><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></article><?php endforeach; ?></div></div></section>

<section class="section" aria-labelledby="dielectric-benefits"><div class="container"><span class="section-eyebrow">03 / Why this approach matters</span><h2 class="section-title" id="dielectric-benefits">The floor has to match the electrical requirement and the site.</h2><div class="service-benefits-grid"><div class="service-benefits-list"><?php foreach ($benefits as $i => [$title,$description]): ?><article class="service-benefit"><span><?= sprintf('%02d',$i+1) ?></span><div><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></div></article><?php endforeach; ?></div><div class="service-benefits-media service-technical-media" role="img" aria-label="Technical dielectric flooring concept visual"></div></div></div></section>

<section class="section service-suitability" aria-labelledby="dielectric-suitable"><div class="container"><span class="section-eyebrow">04 / Where it may be required</span><h2 class="section-title" id="dielectric-suitable">Defined electrical zones, not general-purpose flooring.</h2><p class="section-description">Suitability depends on the approved electrical design and project requirement. These are discussion areas, not universal recommendations.</p><div class="service-suitability-grid"><?php foreach($suitability as [$title,$description]): ?><div class="service-suitability-item"><strong><?= site_escape($title) ?></strong><span><?= site_escape($description) ?></span></div><?php endforeach; ?></div></div></section>

<section class="section" aria-labelledby="dielectric-assessment"><div class="container service-assessment-grid"><div><span class="section-eyebrow">05 / Assessment approach</span><h2 class="section-title" id="dielectric-assessment">Confirm the requirement before selecting the build-up.</h2><p class="section-description">A safe recommendation needs both the electrical specification and the actual site condition.</p></div><div class="service-assessment-steps"><?php foreach($assessment as $i => [$title,$description]): ?><article class="service-assessment-step"><span><?= sprintf('%02d',$i+1) ?></span><div><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></div></article><?php endforeach; ?></div></div></section>

<section class="section service-process" aria-labelledby="dielectric-process"><div class="container"><span class="section-eyebrow">06 / Installation pathway</span><h2 class="section-title" id="dielectric-process">From approved requirement to controlled handover.</h2><div class="service-process-grid"><?php foreach($process as [$number,$title,$description]): ?><article class="service-process-item"><span><?= site_escape($number) ?></span><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></article><?php endforeach; ?></div></div></section>

<section class="section" aria-labelledby="dielectric-care"><div class="container service-maintenance-grid"><div><span class="section-eyebrow">07 / Maintenance & verification</span><h2 class="section-title" id="dielectric-care">A specialist floor needs controlled maintenance.</h2><p class="section-description">Cleaning, damage repair, later modifications and any required periodic verification should follow the installed system and project specification.</p></div><div><div class="service-note-box">We do not publish a universal voltage rating or resistance value. Those values must come from the selected system, approved specification and agreed test method.</div><div class="service-faq"><details><summary>Is dielectric flooring the same as ESD flooring?</summary><p>No. They address different electrical requirements. The correct system depends on the project specification and intended safety function.</p></details><details><summary>Can you recommend a voltage rating from the website?</summary><p>No. The required rating and test method must be confirmed from the project or electrical safety requirement before selection.</p></details><details><summary>Does the existing floor matter?</summary><p>Yes. Moisture, contamination, cracks, old coatings and surface condition can affect preparation and application.</p></details><details><summary>Can the floor be repaired later?</summary><p>Repairs should be reviewed against the installed system and project requirements so the intended performance is not assumed after an uncontrolled repair.</p></details></div></div></div></section>

<section class="section service-final" aria-labelledby="dielectric-final"><div class="container service-final-grid"><div><span class="section-eyebrow">08 / Start with the requirement</span><h2 class="section-title" id="dielectric-final">Share the electrical specification and the floor condition.</h2></div><div><p>We can review the designated area, substrate and project requirement before discussing an appropriate flooring approach.</p><div class="service-hero-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= $callUrl ?>">Call an Expert <?= $arrow ?></a></div></div></div></section>
</main>
<?php require __DIR__ . '/../includes/footer.php'; ?>