<?php
$pageTitle = 'Food & Beverage Flooring Solutions';
$pageDescription = 'Flooring solutions for food and beverage environments, selected around cleaning routines, wet areas, traffic, substrate condition and production planning.';
$bodyClass = 'industry-page industry-food-beverage';
$assetPrefix = '..';
require __DIR__ . '/../includes/header.php';

$arrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
$visitUrl = site_escape(site_url('schedule-visit.php'));
$callUrl = site_escape('tel:+' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['phone']));

$challenges = [
    ['Cleaning frequency', 'Frequent wash-down or cleaning routines can influence finish, detailing and maintenance planning.'],
    ['Wet / spill-prone areas', 'Water, product residue or process spills should be discussed before selecting a floor system.'],
    ['Traffic & movement', 'Trolleys, pallets and repeated movement can create concentrated wear in production and dispatch routes.'],
    ['Shutdown windows', 'Preparation and application must be coordinated around available production and hygiene windows.'],
];

$zones = [
    ['Processing areas', 'Cleaning routine, traffic and local operating exposure shape the floor requirement.'],
    ['Packing areas', 'Movement, cleaning and visual finish may differ from wet processing zones.'],
    ['Cold / support rooms', 'Temperature and operating conditions should be reviewed before system selection.'],
    ['Wash / utility zones', 'Wet exposure and maintenance access can change the finish requirement.'],
    ['Storage / warehousing', 'Traffic and existing slab condition influence the flooring approach.'],
    ['Dispatch routes', 'Repeated pallet, trolley or forklift movement should be considered in the assessment.'],
];

$solutions = [
    ['Epoxy Flooring', 'A seamless resin-flooring option to assess where a continuous finish is required.', 'services/epoxy-flooring.php'],
    ['PU Flooring', 'A resin-flooring route to evaluate where operating conditions call for a different system approach.', 'services/pu-flooring.php'],
    ['Waterproofing', 'A separate treatment to assess where water ingress or leakage is part of the problem.', 'services/waterproofing.php'],
    ['Coving / detail treatment', 'Floor-to-wall transitions can be reviewed where the project needs easier-to-clean interfaces.', 'services/epoxy-flooring.php'],
];

$assessment = [
    ['Cleaning method', 'Understand wash-down frequency, cleaning approach and how the area is maintained.'],
    ['Wet / process exposure', 'Review water, product residue, local spills and any operating exposure relevant to the floor.'],
    ['Substrate condition', 'Inspect cracks, moisture, old coatings, contamination and repair requirements.'],
    ['Production planning', 'Confirm available shutdown windows, access and sequencing before finalizing the approach.'],
];

$process = [
    ['01', 'Site survey', 'Review room use, existing floor condition and cleaning environment.'],
    ['02', 'Surface assessment', 'Identify preparation, moisture, repairs and local detailing requirements.'],
    ['03', 'System selection', 'Choose the flooring route around the actual operating requirement.'],
    ['04', 'Coordinated execution', 'Plan preparation and application around access and production windows.'],
    ['05', 'Inspection & support', 'Review the finish and provide project-specific care guidance.'],
];
?>

<main class="industry-main" id="main-content">
<section class="industry-hero" aria-labelledby="industry-title"><div class="container-wide industry-hero-grid"><div class="industry-hero-copy"><span class="industry-kicker">Industry / Food &amp; Beverage</span><h1 id="industry-title">Food &amp; Beverage <em>Flooring Solutions</em></h1><p>Floors in food and beverage facilities should be assessed around cleaning routines, wet exposure, traffic, surface condition and production planning rather than selected by product name alone.</p><div class="industry-hero-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= $callUrl ?>">Talk to Our Team <?= $arrow ?></a></div><p class="industry-hero-note">Final system selection and specification depend on site conditions and technical assessment.</p></div><div class="industry-hero-media" role="img" aria-label="Industrial flooring source photograph"><div class="industry-hero-badge"><span>Cleaning + operation</span><strong>Wet exposure, traffic, substrate condition and shutdown planning shape the floor approach.</strong></div></div></div></section>

<section class="section"><div class="container industry-intro-grid"><div><span class="section-eyebrow">01 / Facility needs</span><h2 class="section-title">The cleaning routine is part of the flooring brief.</h2></div><div class="industry-copy"><p class="industry-definition">A floor in a food or beverage facility needs to be considered around <strong>how the area is cleaned, used and exposed during production.</strong></p><p>Different zones can experience very different traffic, wet conditions and maintenance routines, so one system should not be assumed for the whole facility.</p></div></div></section>
<section class="section industry-challenges"><div class="container"><span class="section-eyebrow">02 / Common challenges</span><h2 class="section-title">Understand what the floor faces every day.</h2><div class="industry-challenge-grid"><?php foreach ($challenges as $i=>[$title,$description]): ?><article class="industry-challenge"><span><?= sprintf('%02d',$i+1) ?></span><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></article><?php endforeach; ?></div></div></section>
<section class="section"><div class="container"><span class="section-eyebrow">03 / Areas within the facility</span><h2 class="section-title">Different zones, different surface decisions.</h2><div class="industry-zone-grid"><?php foreach ($zones as [$title,$description]): ?><div class="industry-zone"><strong><?= site_escape($title) ?></strong><span><?= site_escape($description) ?></span></div><?php endforeach; ?></div></div></section>
<section class="section industry-solutions"><div class="container"><span class="section-eyebrow">04 / Solution routes</span><h2 class="section-title">Assess the right flooring route for the actual area.</h2><p class="section-description">These are categories to evaluate, not automatic suitability claims.</p><div class="industry-solution-list"><?php foreach ($solutions as $i=>[$title,$description,$path]): ?><article class="industry-solution"><span><?= sprintf('%02d',$i+1) ?></span><div><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></div><a href="<?= site_escape(site_url($path)) ?>">Explore <?= $arrow ?></a></article><?php endforeach; ?></div></div></section>
<section class="section"><div class="container industry-assessment-grid"><div><span class="section-eyebrow">05 / Technical assessment</span><h2 class="section-title">The floor, cleaning routine and operating exposure belong in one discussion.</h2></div><div class="industry-assessment-steps"><?php foreach ($assessment as $i=>[$title,$description]): ?><article class="industry-assessment-step"><span><?= sprintf('%02d',$i+1) ?></span><div><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></div></article><?php endforeach; ?></div></div></section>
<section class="section industry-execution"><div class="container"><span class="section-eyebrow">06 / Execution approach</span><h2 class="section-title">Plan the work around production and hygiene windows.</h2><div class="industry-process-grid"><?php foreach ($process as [$number,$title,$description]): ?><article class="industry-process-item"><span><?= site_escape($number) ?></span><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></article><?php endforeach; ?></div></div></section>
<section class="section"><div class="container industry-intro-grid"><div><span class="section-eyebrow">07 / Quality considerations</span><h2 class="section-title">Performance claims should match the selected system and project documentation.</h2></div><div><div class="industry-note">We intentionally avoid universal claims about food safety, chemical resistance, slip resistance or reopening time. Those points should be confirmed against the actual selected system, finish and approved project documentation.</div><div class="industry-faq"><details><summary>Do all food-production areas need the same floor?</summary><p>No. Processing, packing, wet areas, storage and dispatch can have different requirements.</p></details><details><summary>Can a textured finish be considered?</summary><p>Yes, finish texture can be discussed around cleaning and operational requirements, but the final choice should be project-specific.</p></details><details><summary>Can work be planned around shutdowns?</summary><p>Yes. Available access and shutdown windows should be discussed during the assessment so execution can be sequenced appropriately.</p></details></div></div></div></section>
<section class="section industry-final"><div class="container industry-final-grid"><div><span class="section-eyebrow">08 / Start with assessment</span><h2 class="section-title">Planning a food or beverage flooring project?</h2></div><div><p>Share the current floor condition, area use, cleaning routine, approximate area and available shutdown window. We can then discuss the appropriate next step.</p><div class="industry-hero-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= $callUrl ?>">Call an Expert <?= $arrow ?></a></div></div></div></section>
</main>
<?php require __DIR__ . '/../includes/footer.php'; ?>
