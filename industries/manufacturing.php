<?php
$pageTitle = 'Manufacturing Flooring Solutions';
$pageDescription = 'Industrial flooring solutions for manufacturing environments, selected around traffic, surface condition, production needs, cleaning, exposure and shutdown planning.';
$bodyClass = 'industry-page industry-manufacturing';
$assetPrefix = '..';
require __DIR__ . '/../includes/header.php';

$arrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
$visitUrl = site_escape(site_url('schedule-visit.php'));
$callUrl = site_escape('tel:+' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['phone']));

$challenges = [
    ['Heavy movement', 'Forklifts, trolleys, equipment and repeated traffic can create different wear patterns across the same facility.'],
    ['Surface damage', 'Cracks, dusting, worn coatings and local repairs should be understood before a new system is selected.'],
    ['Production continuity', 'Execution planning needs to consider access, shutdown windows and how work areas are isolated.'],
    ['Cleaning / exposure', 'Oil, process residue, cleaning methods or other exposure should be discussed before recommending a finish.'],
];

$zones = [
    ['Production areas', 'The floor should be considered around traffic, machinery, cleaning and operating exposure.'],
    ['Material movement routes', 'Forklift and trolley movement can make local wear and surface condition especially important.'],
    ['Assembly / work cells', 'Finish, cleaning and workstation requirements may differ from general circulation areas.'],
    ['Warehousing / staging', 'Traffic, loading and existing slab condition influence system selection.'],
    ['Maintenance / utility areas', 'Localized spills, equipment servicing and cleaning routines can change the requirement.'],
    ['Inspection / controlled zones', 'Some areas may need a cleaner or more controlled finish than general production space.'],
];

$solutions = [
    ['Epoxy Flooring', 'A seamless resin-flooring route to assess where a controlled continuous finish is required.', 'services/epoxy-flooring.php'],
    ['PU Flooring', 'A resin-flooring alternative to assess around project-specific operating and exposure conditions.', 'services/pu-flooring.php'],
    ['VDF Flooring', 'A concrete-flooring route to discuss for industrial areas where the slab and finish requirement call for it.', 'services/vdf-flooring.php'],
    ['ESD / Antistatic Flooring', 'A specialist system to assess where electrostatic-control requirements are part of the facility brief.', 'services/esd-flooring.php'],
];

$assessment = [
    ['Traffic & load pattern', 'Understand forklifts, trolleys, equipment and the locations where repeated movement occurs.'],
    ['Existing floor condition', 'Inspect cracks, dusting, damage, contamination and previous coatings or repairs.'],
    ['Operating exposure', 'Discuss cleaning, spills, process residues and other conditions relevant to the area.'],
    ['Shutdown / sequencing', 'Plan preparation and application around available access and production windows.'],
];

$process = [
    ['01', 'Site survey', 'Map the facility zones, traffic routes and existing floor condition.'],
    ['02', 'Surface assessment', 'Identify preparation, repairs, contamination and moisture concerns.'],
    ['03', 'System selection', 'Match the flooring approach to the area requirement rather than applying one system everywhere.'],
    ['04', 'Execution planning', 'Coordinate work areas, access and shutdown sequencing before application.'],
    ['05', 'Inspection & support', 'Review the finished floor and provide project-specific care guidance.'],
];
?>

<main class="industry-main" id="main-content">
    <section class="industry-hero" aria-labelledby="industry-title">
        <div class="container-wide industry-hero-grid">
            <div class="industry-hero-copy">
                <span class="industry-kicker">Industry / Manufacturing</span>
                <h1 id="industry-title">Manufacturing <em>Flooring Solutions</em></h1>
                <p>Industrial floors work across production, material movement, maintenance and inspection zones. The right approach depends on how each area is used, what condition the existing floor is in, and how the work can be executed around operations.</p>
                <div class="industry-hero-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= $callUrl ?>">Talk to Our Team <?= $arrow ?></a></div>
                <p class="industry-hero-note">Final system selection and specification depend on site conditions and technical assessment.</p>
            </div>
            <div class="industry-hero-media" role="img" aria-label="Akshaya industrial flooring project source photograph"><div class="industry-hero-badge"><span>Zone by zone</span><strong>Traffic, substrate condition, exposure and production planning shape the recommendation.</strong></div></div>
        </div>
    </section>

    <section class="section" aria-labelledby="manufacturing-needs"><div class="container industry-intro-grid"><div><span class="section-eyebrow">01 / Facility needs</span><h2 class="section-title" id="manufacturing-needs">One factory can contain several different flooring requirements.</h2></div><div class="industry-copy"><p class="industry-definition">A production floor is not only a finished surface. It is part of <strong>movement, maintenance, cleaning and day-to-day operations.</strong></p><p>That is why the assessment should separate production zones, movement routes, work cells and support areas instead of assuming the same system belongs everywhere.</p><p>The existing slab and available shutdown window are just as important as the desired final appearance.</p></div></div></section>

    <section class="section industry-challenges" aria-labelledby="manufacturing-challenges"><div class="container"><span class="section-eyebrow">02 / Common challenges</span><h2 class="section-title" id="manufacturing-challenges">Understand how the floor is actually being used.</h2><div class="industry-challenge-grid"><?php foreach ($challenges as $i => [$title,$description]): ?><article class="industry-challenge"><span><?= sprintf('%02d',$i+1) ?></span><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></article><?php endforeach; ?></div></div></section>

    <section class="section" aria-labelledby="manufacturing-zones"><div class="container"><span class="section-eyebrow">03 / Areas within the facility</span><h2 class="section-title" id="manufacturing-zones">Different operational zones create different floor demands.</h2><div class="industry-zone-grid"><?php foreach ($zones as [$title,$description]): ?><div class="industry-zone"><strong><?= site_escape($title) ?></strong><span><?= site_escape($description) ?></span></div><?php endforeach; ?></div></div></section>

    <section class="section industry-solutions" aria-labelledby="manufacturing-solutions"><div class="container"><span class="section-eyebrow">04 / Solution routes</span><h2 class="section-title" id="manufacturing-solutions">Select the system after understanding the zone.</h2><p class="section-description">These are flooring categories to evaluate. Suitability depends on the actual floor, traffic, exposure and project requirement.</p><div class="industry-solution-list"><?php foreach ($solutions as $i => [$title,$description,$path]): ?><article class="industry-solution"><span><?= sprintf('%02d',$i+1) ?></span><div><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></div><a href="<?= site_escape(site_url($path)) ?>">Explore <?= $arrow ?></a></article><?php endforeach; ?></div></div></section>

    <section class="section" aria-labelledby="manufacturing-assessment"><div class="container industry-assessment-grid"><div><span class="section-eyebrow">05 / Technical assessment</span><h2 class="section-title" id="manufacturing-assessment">The floor condition and the operation must be assessed together.</h2><p class="section-description">A visually similar area can require a different solution because of traffic, contamination, equipment or execution constraints.</p></div><div class="industry-assessment-steps"><?php foreach ($assessment as $i => [$title,$description]): ?><article class="industry-assessment-step"><span><?= sprintf('%02d',$i+1) ?></span><div><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></div></article><?php endforeach; ?></div></div></section>

    <section class="section industry-execution" aria-labelledby="manufacturing-execution"><div class="container"><span class="section-eyebrow">06 / Execution approach</span><h2 class="section-title" id="manufacturing-execution">Plan around production, not after it.</h2><div class="industry-process-grid"><?php foreach ($process as [$number,$title,$description]): ?><article class="industry-process-item"><span><?= site_escape($number) ?></span><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></article><?php endforeach; ?></div></div></section>

    <section class="section" aria-labelledby="manufacturing-quality"><div class="container industry-intro-grid"><div><span class="section-eyebrow">07 / Why Akshaya</span><h2 class="section-title" id="manufacturing-quality">A considered approach from survey to aftercare.</h2></div><div><div class="industry-note">Akshaya’s profile material emphasizes trained applicators, technical support, quality assurance and customer service. On the website, we translate that into a practical project approach: assess the floor, plan around operations, execute with trained manpower and support the client after handover.</div><div class="industry-faq"><details><summary>Can one flooring system be used across the whole factory?</summary><p>Sometimes one system may cover several areas, but it should not be assumed. Traffic, exposure, slab condition and cleaning requirements can differ by zone.</p></details><details><summary>Can work be planned around production shutdowns?</summary><p>Yes. Shutdown and access planning should be discussed during assessment so the execution sequence can be built around the available window.</p></details><details><summary>Do you recommend epoxy for every industrial floor?</summary><p>No. Epoxy, PU, VDF or another approach should be considered only after the floor and operating requirement are understood.</p></details></div></div></div></section>

    <section class="section industry-final" aria-labelledby="manufacturing-final-title"><div class="container industry-final-grid"><div><span class="section-eyebrow">08 / Start with assessment</span><h2 class="section-title" id="manufacturing-final-title">Planning a new floor or replacing an existing one?</h2></div><div><p>Share the production area, current floor condition, main traffic, approximate area and available shutdown window. We can then discuss the right assessment path.</p><div class="industry-hero-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= $callUrl ?>">Call an Expert <?= $arrow ?></a></div></div></div></section>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>
