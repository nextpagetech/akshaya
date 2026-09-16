<?php
// Step 7: Home only. Shared identity, paths and visual tokens are reused.
$pageTitle = 'Commercial & Industrial Flooring Solutions';
$pageDescription = 'Explore flooring and surface protection with Akshaya Enterprises. Discover solutions for your operating requirements and arrange a technical site visit.';
$bodyClass = 'home-page';
$compactFooterCta = true; // Home already closes with a full assessment CTA.
$assetPrefix = '.';
require_once __DIR__ . '/includes/header.php';

$homeNavigation = site_navigation();
$homeServices = $homeNavigation['services']['groups']['Flooring Solutions'];
$homeIndustries = array_merge(...array_values($homeNavigation['industries']['groups']));
$arrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
$visitUrl = site_escape(site_url('schedule-visit.php'));
$homeCallUrl = site_escape('tel:+' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['phone']));

// Preliminary categories only; these are not specifications or suitability guarantees.
$problems = [
    ['Floor Cracking', 'Start with the substrate.', 'Understand the cracks and the underlying surface before considering a new finish. Preparation and repair requirements come first.', ['epoxy-flooring', 'pu-flooring']],
    ['Dust Generation', 'Look beneath the dust.', 'Assess the existing surface, wear and cleaning routine before reviewing a flooring or coating approach.', ['epoxy-flooring', 'pu-flooring']],
    ['Peeling / Damaged Coating', 'Understand why the coating failed.', 'Review the existing coating, surface condition and moisture before discussing preparation and replacement.', ['epoxy-flooring', 'pu-flooring']],
    ['Static Control Requirement', 'Define the static-control need.', 'Discuss the operating environment and project requirements before selecting an antistatic flooring approach.', ['esd-flooring']],
    ['Hygiene Requirement', 'Begin with your cleaning requirements.', 'Review the facility use, cleaning routine and floor-to-wall requirements. Any compliance requirements need project-specific evaluation.', ['pu-flooring', 'epoxy-flooring', 'clean-room-wall-coating']],
    ['Water Penetration', 'Trace the source of moisture.', 'Understand where water enters and how the surface is used before considering a waterproofing approach.', ['waterproofing']],
    ['Electrical Insulation', 'Clarify the electrical requirements.', 'Share the project specification and operating conditions for assessment before selecting a dielectric flooring system.', ['dielectric-flooring']],
    ['Heavy Traffic / Forklift Wear', 'Map the movement across your floor.', 'Discuss loads, traffic routes and existing wear alongside the available installation window.', ['epoxy-flooring', 'pu-flooring', 'vdf-flooring']],
];
$serviceDescriptions = [
    'epoxy-flooring' => 'Resin flooring options for commercial and industrial spaces.',
    'pu-flooring' => 'Polyurethane flooring, selected around operating conditions.',
    'esd-flooring' => 'Flooring options for project-specific static-control requirements.',
    'dielectric-flooring' => 'Flooring for assessed electrical insulation requirements.',
    'pvc-flooring' => 'PVC flooring options for your facility requirements.',
    'clean-room-wall-coating' => 'Wall coating systems for clean room environments.',
    'waterproofing' => 'Surface protection approaches for water penetration concerns.',
    'vdf-flooring' => 'VDF flooring options for assessed project needs.',
];
$serviceContexts = [
    'epoxy-flooring' => ['Industrial and commercial floor areas', ['Seamless surface concept', 'Finish selected around site use']],
    'pu-flooring' => ['Production and process environments', ['Operating conditions guide selection', 'Surface and exposure require assessment']],
    'esd-flooring' => ['Static-sensitive operating areas', ['Static-control requirement first', 'Project specification requires review']],
    'dielectric-flooring' => ['Assessed electrical work areas', ['Electrical requirement requires clarification', 'System suitability remains project-specific']],
    'pvc-flooring' => ['Commercial and controlled interiors', ['Sheet or tile surface concept', 'Area use guides the flooring discussion']],
    'clean-room-wall-coating' => ['Controlled wall and floor environments', ['Wall-to-floor condition matters', 'Cleaning requirements inform selection']],
    'waterproofing' => ['Areas affected by water penetration', ['Moisture source should be understood', 'Substrate condition informs the approach']],
    'vdf-flooring' => ['Industrial movement and working areas', ['Traffic and loads require assessment', 'Surface condition sets the starting point']],
];
$industryDescriptions = [
    'manufacturing' => ['Production floors. Practical requirements.', 'Discuss machine areas, traffic routes, operational exposure and shutdown planning.'],
    'pharma' => ['Understand the controlled environment.', 'Bring together cleaning, hygiene and project-specific quality requirements before system selection.'],
    'food-beverage' => ['Start with the operating conditions.', 'Review cleaning routines, production use and exposure across processing and storage areas.'],
    'electronics' => ['Consider the environment around the process.', 'Discuss static-control requirements, production areas and facility-specific specifications.'],
    'automobile' => ['Plan around movement and activity.', 'Review working areas, vehicle movement and operating exposure across the facility.'],
    'warehouses-logistics' => ['Follow the movement of goods.', 'Discuss traffic routes, handling equipment, surface wear and the available work window.'],
    'hospitals-healthcare' => ['Consider care, cleaning and daily use.', 'Review area-specific requirements, cleaning routines and how installation can be planned.'],
    'data-centres' => ['Clarify the critical requirements.', 'Discuss the facility specification, operating conditions and access requirements before selection.'],
];
// Topics to assess, not guaranteed outcomes or final system recommendations.
$industryNeeds = [
    'manufacturing' => [['Traffic & loads', 'Surface wear', 'Production planning', 'Maintenance'], ['epoxy-flooring', 'pu-flooring', 'vdf-flooring'], 'facility'],
    'pharma' => [['Hygiene', 'Cleanability', 'Chemical exposure', 'Controlled environment'], ['epoxy-flooring', 'pu-flooring', 'clean-room-wall-coating'], 'clean-environment'],
    'food-beverage' => [['Cleaning routines', 'Process exposure', 'Hygiene', 'Shutdown planning'], ['pu-flooring', 'epoxy-flooring'], 'clean-environment'],
    'electronics' => [['Static control', 'Cleanability', 'Durability', 'Operational safety'], ['esd-flooring', 'epoxy-flooring'], 'clean-environment'],
    'automobile' => [['Vehicle movement', 'Working loads', 'Operating exposure', 'Surface wear'], ['epoxy-flooring', 'pu-flooring', 'vdf-flooring'], 'facility'],
    'warehouses-logistics' => [['Forklift routes', 'Handling loads', 'Surface wear', 'Work windows'], ['epoxy-flooring', 'vdf-flooring'], 'facility'],
    'hospitals-healthcare' => [['Cleanability', 'Daily use', 'Hygiene', 'Access planning'], ['pvc-flooring', 'epoxy-flooring'], 'clean-environment'],
    'data-centres' => [['Static requirements', 'Access', 'Operating conditions', 'Facility specification'], ['esd-flooring', 'dielectric-flooring'], 'surface-detail'],
];
$assessmentFocus = ['Substrate / Existing finish / Visible damage', 'Moisture / Site conditions / Testing needs', 'Traffic / Exposure / Shutdown window', 'System / Specification / Scope', 'Preparation / Application / Quality checks', 'Agreed scope / Finished surface / Floor care'];
$assessment = [
    ['Surface Condition', 'Understand what is already there.', 'Review the substrate, existing finish, cracks and visible damage. The surface sets the starting point for the recommendation.'],
    ['Moisture / Site Assessment', 'Investigate the site conditions.', 'Assess moisture and site conditions, with testing where required, before deciding on the flooring approach.'],
    ['Operating Environment', 'Understand what the floor must face.', 'Discuss traffic, loads, cleaning, exposure and the available shutdown window.'],
    ['Correct System Selection', 'Bring the requirements together.', 'Select the system and specification around the assessed surface and operating requirements.'],
    ['Controlled Application', 'Translate the plan into application.', 'Plan preparation and application with trained manpower, site coordination and quality checks.'],
    ['Final Inspection', 'Review the finished work.', 'Inspect the completed application against the agreed project scope and discuss care requirements.'],
];
$journey = [
    ['Site Survey', 'Discuss the requirement and review the working area.'],
    ['Surface Testing', 'Evaluate the existing surface with testing where required.'],
    ['Moisture Testing', 'Check moisture conditions relevant to the proposed work.'],
    ['Recommendation', 'Agree the system approach, scope and execution plan.'],
    ['Mock-up — Optional', 'Review a sample application where the project calls for it.'],
    ['Installation', 'Coordinate preparation and application around the agreed plan.'],
    ['Inspection', 'Review completed work against the project requirements.'],
    ['Warranty & Maintenance Tips', 'Explain project-specific warranty terms and floor care.'],
];
?>

<a class="home-skip" href="#main-content">Skip to Home page content</a>
<main id="main-content" class="home-main" tabindex="-1">
    <!-- 01 / Hero. The image remains illustrative until approved project photography is supplied. -->
    <section class="ae-hero" aria-labelledby="hero-title">
        <div class="container-wide ae-hero-layout">
            <div class="ae-hero-copy">
                <span class="ae-hero-eyebrow">Industrial Flooring &amp; Surface Protection</span>
                <h1 class="ae-hero-title" id="hero-title">
                    <span>From Floor Problem</span>
                    <span>to <em>Engineered</em></span>
                    <span>Solution.</span>
                </h1>
                <p class="ae-hero-lead">Akshaya provides commercial and industrial flooring solutions based on floor condition, operational environment and project requirements.</p>
                <div class="ae-hero-actions">
                    <a class="btn btn-primary ae-hero-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a>
                    <a class="ae-hero-secondary" href="#flooring-solutions">Explore Flooring Solutions <?= $arrow ?></a>
                </div>
                <p class="ae-hero-trust"><span>Site Assessment</span><i aria-hidden="true"></i><span>Technical Recommendation</span><i aria-hidden="true"></i><span>Professional Execution</span></p>
            </div>

            <div class="ae-hero-scene" data-hero-scene aria-label="Illustrative layered view of an industrial flooring environment">
                <div class="ae-hero-grid" aria-hidden="true"></div>
                <div class="ae-hero-plane ae-hero-plane--navy" data-hero-layer data-depth="0.45" aria-hidden="true"></div>
                <div class="ae-hero-plane ae-hero-plane--cyan" data-hero-layer data-depth="1.2" aria-hidden="true"></div>
                <div class="ae-hero-image" data-hero-layer data-depth="1">
                    <?= home_demo_media('facility', true) ?>
                    <span class="ae-hero-image-index" aria-hidden="true">01 / 03</span>
                </div>
                <div class="ae-hero-card ae-hero-card--assessment" data-hero-layer data-depth="1.5" aria-hidden="true">
                    <span>Site Assessment</span><strong>Surface <i></i> Moisture <i></i> Environment</strong>
                </div>
                <div class="ae-hero-card ae-hero-card--system" data-hero-layer data-depth="1.3" aria-hidden="true">
                    <span>Engineered System</span><strong>Selected after technical evaluation</strong>
                </div>
                <div class="ae-hero-layers" data-hero-layer data-depth="1.65" aria-hidden="true">
                    <span>Engineered flooring system</span>
                    <ol><li>Top Coat</li><li>System Layer</li><li>Prepared Substrate</li></ol>
                </div>
                <span class="ae-hero-geometry ae-hero-geometry--yellow" data-hero-layer data-depth="1.8" aria-hidden="true"></span>
                <span class="ae-hero-geometry ae-hero-geometry--red" data-hero-layer data-depth="1.1" aria-hidden="true"></span>
            </div>
        </div>
    </section>

    <!-- 02 / Approved qualitative proof. Figures require client confirmation;
         no numerical claims or counters are published. -->
    <section class="home-trust" aria-label="Our working priorities"><div class="container-wide home-trust-grid">
        <div class="home-trust-intro"><span>A considered approach</span><strong>From assessment<br>to aftercare.</strong></div>
        <div class="home-trust-capabilities reveal-group">
            <?php foreach (['Trained Manpower', 'Quality Assurance', 'Production Planning', 'Warranty Support'] as $i => $strength): ?><div class="home-trust-item"><span class="home-trust-number" aria-hidden="true"><?= sprintf('%02d', $i + 1) ?></span><i aria-hidden="true"></i><strong><?= site_escape($strength) ?></strong></div><?php endforeach; ?>
        </div>
    </div></section>

    <!-- 03 / Interactive diagnosis; guidance remains preliminary. -->
    <section class="section home-diagnostic" id="floor-problems" aria-labelledby="problems-title" data-problem-explorer><div class="container">
        <div class="home-diagnostic-intro js-reveal"><span class="section-eyebrow">01 / Start with the problem</span><h2 class="section-title" id="problems-title">What Problem<br>Are You Facing?</h2><p class="section-description">You don't need to know the flooring system. Start with what is happening on the floor.</p></div>
        <div class="home-diagnostic-layout"><div class="diagnostic-tabs js-reveal-stagger" role="tablist" aria-label="Choose a floor problem"><?php foreach (array_slice($problems, 0, 6) as $i => [$label]): ?><button type="button" role="tab" id="problem-tab-<?= $i ?>" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>" aria-controls="problem-panel-<?= $i ?>" data-problem-index="<?= $i ?>"><span><?= sprintf('%02d', $i + 1) ?></span><strong><?= site_escape($label) ?></strong><i aria-hidden="true"></i><b aria-hidden="true">→</b></button><?php endforeach; ?></div>
            <div class="diagnostic-stage js-depth-enter" data-depth-scene data-depth-max="2" data-problem-state="0"><div class="diagnostic-floor scene-3d" data-depth-layer aria-hidden="true"><span class="diagnostic-shadow"></span><span class="diagnostic-side"></span><span class="diagnostic-surface layer-3d"></span><span class="diagnostic-wear"></span><span class="diagnostic-peel"></span><span class="diagnostic-field"></span><span class="diagnostic-moisture"></span><span class="diagnostic-sweep"></span><svg viewBox="0 0 620 280"><path d="M72 166l92-28 48 31 67-89 74 118 63-69 62 43 70-82"/><circle cx="165" cy="138" r="7"/><circle cx="416" cy="129" r="7"/></svg><em></em><em></em><em></em></div><div class="diagnostic-readout"><span>Floor diagnostic</span><strong data-problem-readout>01 / Floor Cracking</strong></div>
                <div class="diagnostic-panels"><?php foreach (array_slice($problems, 0, 6) as $i => [$label, $title, $description, $slugs]): ?><article id="problem-panel-<?= $i ?>" role="tabpanel" aria-labelledby="problem-tab-<?= $i ?>"<?= $i ? ' hidden' : '' ?>><span class="home-detail-label">What it may indicate</span><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p><span class="home-detail-label">Possible next steps</span><div class="diagnostic-steps"><span>Site Assessment</span><span>Surface Review</span><span>System Discussion</span></div><div class="home-solution-links"><?php foreach ($slugs as $slug): ?><a href="<?= site_escape(site_url('services/' . $slug . '.php')) ?>"><?= site_escape($homeServices[$slug]) ?> <?= $arrow ?></a><?php endforeach; ?></div><p class="diagnostic-disclaimer">Final system selection depends on site conditions and technical assessment.</p><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Assessment <?= $arrow ?></a></article><?php endforeach; ?></div>
            </div>
        </div>
    </div></section>

    <!-- 04 / One transforming system slab replaces the former service-card gallery. -->
    <section class="section home-systems" id="flooring-solutions" aria-labelledby="solutions-title" data-system-explorer><div class="container">
        <div class="section-header section-header--split js-reveal"><span class="section-eyebrow">02 / Flooring Solutions</span><h2 class="section-title" id="solutions-title">Different requirements.<br>The right system.</h2><p class="section-description">Explore flooring and surface protection systems designed around different operating conditions. Final selection depends on site assessment.</p></div>
        <div class="system-explorer-layout"><div class="system-visual js-depth-enter" data-depth-scene data-depth-max="2" data-system-state="0"><div class="system-scene scene-3d" data-depth-layer aria-hidden="true"><span class="system-grid"></span><span class="system-shadow"></span><span class="system-wall"></span><span class="system-slab system-substrate"></span><span class="system-slab system-layer"></span><span class="system-slab system-finish"></span><span class="system-shield"></span><span class="system-ground"></span></div><div class="system-visual-head"><span>System study</span><strong data-system-readout>01 / Epoxy Flooring</strong></div><button class="system-layers-toggle" type="button" aria-pressed="false"><span>View System Layers</span><i aria-hidden="true">↕</i></button><div class="system-layer-labels" aria-hidden="true"><span>Finish Layer</span><span>System Layer</span><span>Prepared Substrate</span></div></div>
            <div class="system-interface"><div class="system-tabs js-reveal-stagger" role="tablist" aria-label="Choose a flooring system"><?php $i = 0; foreach ($homeServices as $slug => $label): ?><button type="button" role="tab" id="system-tab-<?= $i ?>" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>" aria-controls="system-panel-<?= $i ?>" data-system-index="<?= $i ?>"><span><?= sprintf('%02d', $i + 1) ?></span><strong><?= site_escape($label) ?></strong></button><?php $i++; endforeach; ?></div><div class="system-panels"><?php $i = 0; foreach ($homeServices as $slug => $label): ?><article id="system-panel-<?= $i ?>" role="tabpanel" aria-labelledby="system-tab-<?= $i ?>"<?= $i ? ' hidden' : '' ?>><span class="home-detail-label">Selected system</span><h3><?= site_escape($label) ?></h3><p><?= site_escape($serviceDescriptions[$slug]) ?></p><span class="home-detail-label">Common environments</span><p><?= site_escape($serviceContexts[$slug][0]) ?></p><ul><?php foreach ($serviceContexts[$slug][1] as $point): ?><li><?= site_escape($point) ?></li><?php endforeach; ?></ul><a class="link-arrow" href="<?= site_escape(site_url('services/' . $slug . '.php')) ?>">Explore <?= site_escape($label) ?> <?= $arrow ?></a></article><?php $i++; endforeach; ?></div></div>
        </div>
    </div></section>

    <!-- 05 / Sector requirements do not imply verified projects in every sector. -->
    <section class="section bg-technical" id="industries" aria-labelledby="industries-title"><div class="container">
        <div class="section-header section-header--split reveal-up"><span class="section-eyebrow">03 / Industries We Serve</span><h2 class="section-title" id="industries-title">The environment<br>changes the requirement.</h2><p class="section-description">Explore flooring requirements across different sectors, from production floors to controlled environments.</p></div>
        <div class="home-selector home-industries reveal-group" data-home-selector data-selector-label="Choose an industry"><div class="home-selector-options" hidden></div><div class="home-selector-panels">
            <?php foreach ($industryDescriptions as $slug => [$title, $description]): ?><article class="home-selector-panel home-industry-panel" id="industry-<?= $slug ?>" data-selector-label="<?= site_escape($homeIndustries[$slug]) ?>" aria-labelledby="industry-title-<?= $slug ?>">
                <?= home_demo_media($industryNeeds[$slug][2]) ?>
                <div class="home-industry-copy"><span class="section-eyebrow"><?= site_escape($homeIndustries[$slug]) ?></span><h3 id="industry-title-<?= $slug ?>"><?= site_escape($title) ?></h3><p data-selector-summary><?= site_escape($description) ?></p>
                    <span class="home-detail-label">Operational needs to assess</span><ul class="home-needs-list"><?php foreach ($industryNeeds[$slug][0] as $need): ?><li><?= site_escape($need) ?></li><?php endforeach; ?></ul>
                    <span class="home-detail-label">Possible solution categories</span><div class="home-solution-links"><?php foreach ($industryNeeds[$slug][1] as $service): ?><a href="<?= site_escape(site_url('services/' . $service . '.php')) ?>"><?= site_escape($homeServices[$service]) ?> <?= $arrow ?></a><?php endforeach; ?></div>
                    <p class="home-industry-disclaimer">Final system selection depends on site assessment.</p><a class="link-arrow" href="<?= site_escape(site_url('industries/' . $slug . '.php')) ?>">Explore <?= site_escape($homeIndustries[$slug]) ?> <?= $arrow ?></a>
                </div>
            </article><?php endforeach; ?>
        </div></div>
        <details class="home-more-industries"><summary>Explore More Industries <?= $arrow ?></summary><div class="home-more-links"><?php foreach ($homeIndustries as $slug => $label): if (isset($industryDescriptions[$slug])) continue; ?><a href="<?= site_escape(site_url('industries/' . $slug . '.php')) ?>"><?= site_escape($label) ?> <?= $arrow ?></a><?php endforeach; ?></div></details>
    </div></section>

    <!-- 06 / Operational floor map; outcomes are priorities rather than guarantees. -->
    <section class="section home-operation" id="why-akshaya" aria-labelledby="why-title" data-operation-explorer><div class="container">
        <div class="section-header section-header--split js-reveal"><span class="section-eyebrow">04 / Why Akshaya</span><h2 class="section-title" id="why-title">The floor is part<br>of your operation.</h2><p class="section-description">A flooring system must work with the people, equipment and processes that use it every day.</p></div>
        <?php $operationOutcomes = [['Minimum Production Disruption', 'Execution planning should consider operational continuity and available shutdown windows.'], ['Quality-Controlled Execution', 'Surface checkpoints, coordinated application and final inspection support controlled execution.'], ['Trained Application Team', 'Trained manpower and a staged application process help translate the agreed plan into site work.'], ['Support Beyond Installation', 'Inspection, maintenance guidance and project-specific warranty communication continue after execution.']]; ?>
        <div class="operation-layout"><div class="operation-scene-wrap js-depth-enter" data-depth-scene data-depth-max="2" data-operation-state="0"><div class="operation-scene scene-3d" data-depth-layer aria-hidden="true"><span class="operation-base"></span><span class="operation-zone operation-zone--production"><b>Production</b></span><span class="operation-zone operation-zone--route"><b>Movement Route</b></span><span class="operation-zone operation-zone--clean"><b>Controlled Zone</b></span><span class="operation-zone operation-zone--inspection"><b>Inspection</b></span><svg viewBox="0 0 720 360"><path class="operation-route" d="M72 270C180 160 260 284 365 176S548 98 650 166"/><circle cx="148" cy="218" r="7"/><circle cx="365" cy="176" r="7"/><circle cx="582" cy="130" r="7"/></svg><i class="operation-marker operation-marker--one"></i><i class="operation-marker operation-marker--two"></i><i class="operation-marker operation-marker--three"></i></div><div class="operation-readout"><span>Operational focus</span><strong data-operation-readout>01 / Minimum Production Disruption</strong></div></div>
            <div class="operation-interface"><div class="operation-tabs" role="tablist" aria-label="Choose an operational outcome"><?php foreach ($operationOutcomes as $i => [$title]): ?><button type="button" role="tab" id="operation-tab-<?= $i ?>" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>" aria-controls="operation-panel-<?= $i ?>" data-operation-index="<?= $i ?>"><span><?= sprintf('%02d', $i + 1) ?></span><strong><?= site_escape($title) ?></strong><i aria-hidden="true"></i></button><?php endforeach; ?></div><div class="operation-panels"><?php foreach ($operationOutcomes as $i => [$title, $description]): ?><article id="operation-panel-<?= $i ?>" role="tabpanel" aria-labelledby="operation-tab-<?= $i ?>"<?= $i ? ' hidden' : '' ?>><span class="home-detail-label">Operational outcome</span><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></article><?php endforeach; ?></div><a class="link-arrow" href="<?= site_escape(site_url('about.php')) ?>">About Akshaya <?= $arrow ?></a></div></div>
    </div></section>

    <!-- 07 / Evaluation pathway is distinct from the customer journey below. -->
    <section class="section assessment-lab" id="technical-assessment" aria-labelledby="assessment-title" data-assessment-lab><div class="container">
        <div class="section-header section-header--split js-reveal"><span class="section-eyebrow">05 / Interactive Floor Analysis Lab</span><h2 class="section-title" id="assessment-title">We Don't Recommend a System Without Understanding the Floor.</h2><p class="section-description">Six connected considerations. One floor model. A site-specific recommendation.</p></div>
        <div class="assessment-lab-layout"><div class="assessment-rail js-reveal-stagger" role="tablist" aria-label="Choose an assessment stage"><?php foreach ($assessment as $i => [$label]): ?><button type="button" role="tab" id="lab-tab-<?= $i ?>" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>" aria-controls="lab-panel-<?= $i ?>" data-lab-index="<?= $i ?>"><span><?= sprintf('%02d', $i + 1) ?></span><strong><?= site_escape($label) ?></strong><i aria-hidden="true"></i></button><?php endforeach; ?></div>
            <div class="assessment-lab-stage js-depth-enter" data-depth-scene data-depth-max="2" data-lab-state="0"><div class="lab-readout"><span>Floor analysis</span><strong data-lab-readout>01 / Surface Condition</strong></div><div class="lab-scene scene-3d" data-depth-layer aria-hidden="true"><span class="lab-grid"></span><span class="lab-shadow"></span><span class="lab-plane lab-substrate"></span><span class="lab-plane lab-moisture"></span><span class="lab-plane lab-environment"></span><span class="lab-plane lab-system"></span><span class="lab-plane lab-finish"></span><span class="lab-application"></span><span class="lab-scan"></span><svg viewBox="0 0 620 260"><path d="M58 159l90-24 45 30 62-80 73 104 56-61 67 39 90-91"/><path class="lab-route" d="M70 210C180 145 260 228 370 148S505 114 565 130"/><circle cx="145" cy="136" r="7"/><circle cx="382" cy="130" r="7"/><circle cx="515" cy="113" r="7"/></svg><em></em><em></em><em></em><b class="lab-callout lab-callout--one">Surface point</b><b class="lab-callout lab-callout--two">Review zone</b></div>
                <div class="assessment-lab-panels"><?php foreach ($assessment as $i => [$label, $title, $description]): ?><article id="lab-panel-<?= $i ?>" role="tabpanel" aria-labelledby="lab-tab-<?= $i ?>"<?= $i ? ' hidden' : '' ?>><span class="home-detail-label">Stage <?= sprintf('%02d', $i + 1) ?> / 06</span><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p><div><span class="home-detail-label">Assessment focus</span><strong><?= site_escape($assessmentFocus[$i]) ?></strong></div></article><?php endforeach; ?></div>
            </div>
        </div>
    </div></section>

    <!-- 08 / Scroll-led floor transformation. Visuals are illustrative and contain no measured claims. -->
    <section class="section home-work" id="how-we-work" aria-labelledby="work-title" data-work-journey><div class="container">
        <div class="home-work-heading js-reveal"><span class="section-eyebrow">06 / How We Work</span><h2 class="section-title" id="work-title">A clear path.<br>From first visit to aftercare.</h2><p class="section-description">See how we assess, prepare and transform the floor through each stage.</p></div>
        <div class="home-work-layout">
            <ol class="home-work-stages" aria-label="Project stages"><?php foreach ($journey as $i => [$label, $description]): ?><li class="home-work-stage<?= $i === 0 ? ' is-active' : '' ?>" data-work-stage="<?= $i ?>">
                <button type="button" aria-controls="work-floor-visual" aria-pressed="<?= $i === 0 ? 'true' : 'false' ?>"><span class="home-work-number"><?= sprintf('%02d', $i + 1) ?></span><span class="home-work-stage-copy"><strong><?= site_escape($label) ?></strong><small><?= site_escape($description) ?></small></span><i aria-hidden="true"></i></button>
            </li><?php endforeach; ?></ol>
            <div class="home-work-visual" id="work-floor-visual" data-active-stage="0" aria-live="polite">
                <div class="home-work-readout"><span>Project stage</span><strong data-work-readout>01 / Site Survey</strong></div>
                <div class="floor-scene scene-3d" aria-hidden="true">
                    <div class="floor-grid"></div><div class="floor-shadow"></div>
                    <div class="floor-slab"><span class="floor-side floor-side--front"></span><span class="floor-side floor-side--right"></span><span class="floor-substrate layer-3d"></span><span class="floor-prepared layer-3d"></span><span class="floor-system layer-3d"></span><span class="floor-finish layer-3d"></span><span class="floor-damage"></span><span class="floor-mockup"></span><span class="floor-application"></span><span class="floor-scan"></span>
                        <span class="floor-crack floor-crack--one"></span><span class="floor-crack floor-crack--two"></span>
                        <span class="floor-test floor-test--one"></span><span class="floor-test floor-test--two"></span><span class="floor-test floor-test--three"></span>
                        <span class="floor-grinder"><b></b><i></i><em></em></span><span class="floor-support floor-support--one">Care</span><span class="floor-support floor-support--two">Support</span>
                    </div>
                    <div class="floor-callout"><span data-floor-callout>Existing surface condition</span></div>
                </div>
                <p class="home-work-visual-note">Illustrative process visual · final approach depends on site conditions.</p>
            </div>
        </div>
    </div></section>

    <!-- 09 / Replace only with verified case data. No fabricated project facts. -->
    <section class="section bg-soft" id="featured-projects" aria-labelledby="projects-title"><div class="container">
        <div class="home-heading-row reveal-up"><div><span class="section-eyebrow">07 / Featured Projects</span><h2 class="section-title" id="projects-title">The challenge.<br>The approach. The result.</h2></div><a class="link-arrow" href="<?= site_escape(site_url('projects.php')) ?>">Explore Projects <?= $arrow ?></a></div>
        <div class="home-projects-grid reveal-group"><?php for ($i = 1; $i <= 3; $i++): ?><article class="home-project<?= $i === 1 ? ' home-project--featured' : '' ?>" data-depth-scene data-depth-max="2">
            <?= home_demo_media(['facility', 'clean-environment', 'surface-detail'][$i - 1]) ?>
            <div class="home-project-copy"><span class="home-development-label">Case study placeholder / <?= sprintf('%02d', $i) ?></span><h3><?= $i === 1 ? 'From challenge to finished floor.' : 'Project study ' . sprintf('%02d', $i) ?></h3><p>Case study details will be updated after client approval.</p>
                <dl class="home-project-facts"><div><dt>Industry / Flooring type</dt><dd>Awaiting approval</dd></div><div><dt>Challenge</dt><dd>Site requirement to be added</dd></div><div><dt>Solution</dt><dd>Assessed system to be added</dd></div><div><dt>Outcome</dt><dd>Verified result to be added</dd></div></dl>
                <a class="link-arrow" href="<?= $visitUrl ?>">Discuss Your Project <?= $arrow ?></a>
            </div>
        </article><?php endfor; ?></div>
    </div></section>

    <!-- 10 / Add approved customer logos only. No invented brands or marquee. -->
    <section class="section home-customers" aria-labelledby="customers-title"><div class="container"><div class="home-heading-row"><div><span class="section-eyebrow">08 / Customers &amp; Brands Served</span><h2 id="customers-title">Relationships,<br>built through work.</h2></div><p class="home-development-note">Customer identities and logos<br>will be added after approval.</p></div><div class="home-logo-grid reveal-group" aria-label="Reserved customer logo positions"><?php for ($i = 1; $i <= 4; $i++): ?><div class="home-logo-slot"><span class="home-logo-slot-number" aria-hidden="true"><?= sprintf('%02d', $i) ?></span><span>Client Logo</span><span class="caption">Placeholder · Approval pending</span></div><?php endfor; ?></div></div></section>

    <!-- 11 / No quotes, identities, stars or video controls until approved. -->
    <section class="section bg-technical home-feedback" aria-labelledby="feedback-title"><div class="container"><div class="section-header"><span class="section-eyebrow">09 / Customer Feedback</span><h2 class="section-title" id="feedback-title">The experience,<br>in our customers' words.</h2></div><div class="home-feedback-grid" data-feedback-selector>
        <div class="home-feedback-panels"><?php foreach (['A customer’s perspective. In their own words.', 'Execution feedback belongs here.', 'Aftercare feedback belongs here.'] as $i => $feedbackTitle): ?><article class="home-feedback-feature" id="feedback-panel-<?= $i ?>" data-feedback-label="Feedback <?= $i + 1 ?>"<?= $i ? ' hidden' : '' ?>><span class="home-quote-mark" aria-hidden="true">“</span><span class="home-development-label">Customer Feedback Placeholder <?= sprintf('%02d', $i + 1) ?></span><h3><?= site_escape($feedbackTitle) ?></h3><p>Testimonial content will be updated after client approval.</p><div class="home-feedback-attribution"><span class="home-attribution-mark" aria-hidden="true"></span><span class="caption">Customer name &amp; company<br>Awaiting publication approval</span></div></article><?php endforeach; ?></div>
        <div class="home-feedback-support" role="group" aria-label="Choose customer feedback"><?php for ($i = 0; $i < 3; $i++): ?><button type="button" aria-controls="feedback-panel-<?= $i ?>" aria-pressed="<?= $i === 0 ? 'true' : 'false' ?>"><span><?= sprintf('%02d', $i + 1) ?></span><strong>Customer feedback placeholder</strong><small>Content awaiting approval</small></button><?php endfor; ?></div>
    </div></div></section>

    <!-- 12 / Warranty is project dependent; no universal 5-year promise. -->
    <section class="section care-experience" id="floor-care" aria-labelledby="care-title" data-care-explorer><div class="container"><div class="section-header section-header--split js-reveal"><span class="section-eyebrow">10 / Post-Flooring Care &amp; Warranty</span><h2 class="section-title" id="care-title">Support beyond<br>the finished floor.</h2><p class="section-description">Care, inspection and communication continue around the completed floor and its project-specific requirements.</p></div>
        <?php $careItems = [['Maintenance Guidance', 'Discuss cleaning routines and care suited to the installed system.'], ['Inspection Support', 'Speak with our team about floor condition and inspection needs.'], ['Warranty Communication', 'Warranty terms depend on the selected flooring system and project conditions.'], ['Service Support', 'Keep in touch as your facility requirements evolve.']]; ?>
        <div class="care-layout"><div class="care-stage js-depth-enter" data-depth-scene data-depth-max="2" data-care-state="0"><div class="care-scene scene-3d" data-depth-layer aria-hidden="true"><span class="care-grid"></span><span class="care-shadow"></span><span class="care-floor"></span><span class="care-route"></span><span class="care-scan"></span><span class="care-timeline"></span><i></i><i></i><i></i><i></i></div><div class="care-readout"><span>Finished-floor support</span><strong data-care-readout>01 / Maintenance Guidance</strong></div></div>
            <div class="care-interface"><div class="care-tabs" role="tablist" aria-label="Choose a support area"><?php foreach ($careItems as $i => [$label]): ?><button type="button" role="tab" id="care-tab-<?= $i ?>" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>" aria-controls="care-panel-<?= $i ?>" data-care-index="<?= $i ?>"><span><?= sprintf('%02d', $i + 1) ?></span><strong><?= site_escape($label) ?></strong><i aria-hidden="true"></i></button><?php endforeach; ?></div><div class="care-panels"><?php foreach ($careItems as $i => [$label, $description]): ?><article id="care-panel-<?= $i ?>" role="tabpanel" aria-labelledby="care-tab-<?= $i ?>"<?= $i ? ' hidden' : '' ?>><span class="home-detail-label">Support area</span><h3><?= site_escape($label) ?></h3><p><?= site_escape($description) ?></p></article><?php endforeach; ?></div><p class="care-note">Project-specific warranty and support terms depend on the selected system and agreed scope.</p><a class="link-arrow" href="<?= site_escape(site_url('contact.php')) ?>">Talk to Our Team <?= $arrow ?></a></div></div>
    </div></section>

    <!-- 13 / Editorial white close followed by the unchanged navy global CTA. -->
    <section class="section bg-brand technical-grid home-final-cta" aria-labelledby="home-cta-title"><span class="home-cta-orb" aria-hidden="true"></span><div class="container home-final-grid"><div><span class="section-eyebrow">11 / Start with a site visit</span><h2 class="section-title" id="home-cta-title">Let Us Assess the Floor Before Recommending the System.</h2></div><div><p class="body-large">The right approach starts with your substrate, operating conditions, traffic, exposure and site requirements.</p><p>Bring us the problem. Let's understand the floor together.</p><div class="action-group"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= $homeCallUrl ?>">Call an Expert <?= $arrow ?></a></div></div></div></section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
