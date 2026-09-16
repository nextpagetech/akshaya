<?php
$pageTitle = 'Electronics Flooring Solutions';
$pageDescription = 'Flooring solutions for electronics and sensitive manufacturing environments, selected around electrostatic-control requirements, traffic, cleaning, substrate condition and project specifications.';
$bodyClass = 'industry-page industry-electronics';
$assetPrefix = '..';
require __DIR__ . '/../includes/header.php';

$arrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
$visitUrl = site_escape(site_url('schedule-visit.php'));
$callUrl = site_escape('tel:+' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['phone']));

$challenges = [
    ['Electrostatic-control requirement', 'Sensitive production areas may call for a flooring system designed around a documented electrostatic-control brief.'],
    ['Surface continuity', 'Joints, repairs and damaged coatings can affect both cleaning and specialist floor-system detailing.'],
    ['Traffic & equipment', 'Workstations, carts, equipment and repeated movement influence the practical floor requirement.'],
    ['Project verification', 'Resistance targets, test methods and acceptance criteria should come from the approved project specification.'],
];

$zones = [
    ['Assembly areas', 'Workstation layout, traffic and the project electrostatic-control strategy should be considered together.'],
    ['Sensitive production zones', 'Specialist flooring may be required where electrostatic control forms part of the facility brief.'],
    ['Testing / inspection', 'Equipment use, cleaning and local control requirements can influence the floor approach.'],
    ['Stores / component handling', 'Movement, packaging and sensitive-component requirements should be understood before system selection.'],
    ['Utility / support areas', 'These areas may not require the same specialist build-up as controlled production zones.'],
    ['Movement corridors', 'Repeated trolley and personnel movement can create different wear and maintenance patterns.'],
];

$solutions = [
    ['ESD / Antistatic Flooring', 'A specialist flooring route to assess where electrostatic-control requirements are defined for the project.', 'services/esd-flooring.php'],
    ['Epoxy Flooring', 'A seamless resin-flooring option for general production or support zones where specialist ESD control is not required.', 'services/epoxy-flooring.php'],
    ['PU Flooring', 'An alternative resin-flooring route to assess around operating conditions and project requirements.', 'services/pu-flooring.php'],
    ['VDF Flooring', 'A concrete-flooring route to discuss for industrial support areas where the slab and finish requirement call for it.', 'services/vdf-flooring.php'],
];

$assessment = [
    ['Project requirement', 'Confirm whether the area has a documented electrostatic-control or specialist flooring requirement.'],
    ['Substrate condition', 'Inspect cracks, moisture, old coatings, contamination and preparation requirements.'],
    ['Traffic / workstation use', 'Understand equipment, personnel, carts and how the area operates day to day.'],
    ['Testing / acceptance criteria', 'Agree any performance testing and acceptance method from the approved project specification.'],
];

$process = [
    ['01', 'Requirement review', 'Understand the area function and any specialist electrostatic-control brief.'],
    ['02', 'Site assessment', 'Review the substrate, moisture, repairs and preparation requirement.'],
    ['03', 'System recommendation', 'Select the flooring approach around the documented project need.'],
    ['04', 'Controlled application', 'Coordinate preparation and installation around access and production planning.'],
    ['05', 'Inspection / verification', 'Complete project-specific inspection and any agreed testing before handover.'],
];
?>

<main class="industry-main" id="main-content">
<section class="industry-hero" aria-labelledby="industry-title"><div class="container-wide industry-hero-grid"><div class="industry-hero-copy"><span class="industry-kicker">Industry / Electronics</span><h1 id="industry-title">Electronics &amp; <em>Sensitive Production</em></h1><p>Electronics facilities can contain both general industrial areas and specialist zones where electrostatic-control requirements form part of the project brief. The floor should be selected accordingly.</p><div class="industry-hero-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= $callUrl ?>">Talk to Our Team <?= $arrow ?></a></div><p class="industry-hero-note">Any electrical or electrostatic performance requirement must be tied to the approved system and project specification.</p></div><div class="industry-hero-media" role="img" aria-label="Industrial flooring source photograph"><div class="industry-hero-badge"><span>Requirement-led</span><strong>Specialist ESD flooring should follow a defined project brief, substrate review and agreed verification method.</strong></div></div></div></section>
<section class="section"><div class="container industry-intro-grid"><div><span class="section-eyebrow">01 / Facility needs</span><h2 class="section-title">Not every electronics area needs the same floor.</h2></div><div class="industry-copy"><p class="industry-definition">The first question is whether the area needs a <strong>general industrial finish or a specialist electrostatic-control system.</strong></p><p>That distinction should be made from the facility and project requirement, not assumed from the industry name alone.</p></div></div></section>
<section class="section industry-challenges"><div class="container"><span class="section-eyebrow">02 / Common challenges</span><h2 class="section-title">Specialist requirements need specialist verification.</h2><div class="industry-challenge-grid"><?php foreach ($challenges as $i=>[$title,$description]): ?><article class="industry-challenge"><span><?= sprintf('%02d',$i+1) ?></span><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></article><?php endforeach; ?></div></div></section>
<section class="section"><div class="container"><span class="section-eyebrow">03 / Areas within the facility</span><h2 class="section-title">Zone the requirement before choosing the system.</h2><div class="industry-zone-grid"><?php foreach ($zones as [$title,$description]): ?><div class="industry-zone"><strong><?= site_escape($title) ?></strong><span><?= site_escape($description) ?></span></div><?php endforeach; ?></div></div></section>
<section class="section industry-solutions"><div class="container"><span class="section-eyebrow">04 / Solution routes</span><h2 class="section-title">Use specialist flooring only where the requirement calls for it.</h2><p class="section-description">These are solution routes to assess after the facility zones and project criteria are understood.</p><div class="industry-solution-list"><?php foreach ($solutions as $i=>[$title,$description,$path]): ?><article class="industry-solution"><span><?= sprintf('%02d',$i+1) ?></span><div><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></div><a href="<?= site_escape(site_url($path)) ?>">Explore <?= $arrow ?></a></article><?php endforeach; ?></div></div></section>
<section class="section"><div class="container industry-assessment-grid"><div><span class="section-eyebrow">05 / Technical assessment</span><h2 class="section-title">Start from the approved requirement and the actual floor.</h2></div><div class="industry-assessment-steps"><?php foreach ($assessment as $i=>[$title,$description]): ?><article class="industry-assessment-step"><span><?= sprintf('%02d',$i+1) ?></span><div><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></div></article><?php endforeach; ?></div></div></section>
<section class="section industry-execution"><div class="container"><span class="section-eyebrow">06 / Execution approach</span><h2 class="section-title">Control the installation and the verification pathway.</h2><div class="industry-process-grid"><?php foreach ($process as [$number,$title,$description]): ?><article class="industry-process-item"><span><?= site_escape($number) ?></span><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></article><?php endforeach; ?></div></div></section>
<section class="section"><div class="container industry-intro-grid"><div><span class="section-eyebrow">07 / Performance considerations</span><h2 class="section-title">Do not guess electrical performance from the product category.</h2></div><div><div class="industry-note">We do not publish universal resistance values, grounding arrangements, test limits or compliance claims for ESD / antistatic flooring. Those requirements should come from the approved project specification and be matched to the selected system and verification method.</div><div class="industry-faq"><details><summary>Does every electronics facility require ESD flooring?</summary><p>No. Specialist electrostatic-control flooring should be used where the facility or project brief calls for it.</p></details><details><summary>Can general epoxy be used in non-sensitive areas?</summary><p>It may be considered for suitable general-purpose zones after the substrate and operating conditions are assessed.</p></details><details><summary>Will you publish a standard resistance value?</summary><p>No. The required electrical performance and testing criteria should be project-specific and documented.</p></details></div></div></div></section>
<section class="section industry-final"><div class="container industry-final-grid"><div><span class="section-eyebrow">08 / Start with assessment</span><h2 class="section-title">Have an electronics or ESD flooring requirement?</h2></div><div><p>Share the area use, current floor condition, specialist requirement if available, approximate area and shutdown window. We can then discuss the appropriate assessment path.</p><div class="industry-hero-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= $callUrl ?>">Call an Expert <?= $arrow ?></a></div></div></div></section>
</main>
<?php require __DIR__ . '/../includes/footer.php'; ?>
