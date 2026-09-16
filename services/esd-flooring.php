<?php
$pageTitle = 'ESD / Antistatic Flooring Solutions';
$pageDescription = 'Explore ESD and antistatic flooring for static-sensitive environments. Akshaya reviews the operating requirement, substrate and project specification before recommending a system.';
$bodyClass = 'service-page service-esd';
$assetPrefix = '..';
require __DIR__ . '/../includes/header.php';

$arrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
$visitUrl = site_escape(site_url('schedule-visit.php'));
$callUrl = site_escape('tel:+' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['phone']));

$problems = [
    ['Static-sensitive operations', 'The required static-control performance should be defined before the flooring system is selected.'],
    ['Unknown existing floor condition', 'The substrate, old coatings and surface condition can affect preparation and system design.'],
    ['Critical area requirements', 'Different rooms or process zones may have different flooring and verification needs.'],
    ['Unclear project specification', 'The electrical and operational requirement should be reviewed with the client before recommendation.'],
];

$benefits = [
    ['Requirement-led selection', 'The flooring discussion starts with the static-control requirement rather than with a generic coating choice.'],
    ['Integrated floor approach', 'The surface, preparation, flooring build-up and related project requirements are considered together.'],
    ['Controlled execution', 'Application should follow the agreed project method with inspection and verification requirements defined in advance.'],
    ['Operational context', 'Cleaning, traffic, equipment use and access conditions should be considered alongside the electrical requirement.'],
];

$suitability = [
    ['Electronics environments', 'Where static-sensitive processes or equipment create a specific flooring requirement.'],
    ['Assembly / production areas', 'Where the operational specification calls for static-control flooring.'],
    ['Laboratories', 'Where room use and project-specific static requirements need to be coordinated.'],
    ['Data-centre environments', 'Where facility specifications may include static-control flooring requirements.'],
    ['Controlled technical spaces', 'Where the flooring system forms part of a broader technical environment.'],
    ['Special project areas', 'Where a defined electrical flooring requirement needs a site-specific solution.'],
];

$assessment = [
    ['Define the requirement', 'Review the project specification and clarify the static-control objective for the area.'],
    ['Assess the substrate', 'Inspect the existing floor, coatings, moisture conditions and preparation needs.'],
    ['Review the operating area', 'Understand equipment, traffic, cleaning, access and any zoning requirements.'],
    ['Confirm system and verification', 'Agree the flooring approach and the project-specific inspection or testing requirements before execution.'],
];

$process = [
    ['01', 'Requirement review', 'Clarify the static-control need and project specification.'],
    ['02', 'Floor assessment', 'Inspect the substrate and preparation requirements.'],
    ['03', 'System planning', 'Agree the flooring build-up, detailing and execution sequence.'],
    ['04', 'Controlled application', 'Apply the system to the agreed project method.'],
    ['05', 'Inspection / verification', 'Complete the project-specific checks before handover.'],
];
?>

<main class="service-main" id="main-content">
    <section class="service-hero" aria-labelledby="service-title">
        <div class="container-wide service-hero-grid">
            <div class="service-hero-copy">
                <span class="service-kicker">Flooring Solution / Static Control</span>
                <h1 id="service-title">ESD / <em>Antistatic</em> Flooring</h1>
                <p>A flooring approach for static-sensitive operating areas, selected only after the required performance, substrate condition and project specification are understood.</p>
                <div class="service-hero-actions">
                    <a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a>
                    <a class="btn btn-outline" href="<?= $callUrl ?>">Talk to Our Team <?= $arrow ?></a>
                </div>
                <p class="service-hero-note">Electrical performance requirements and acceptance criteria must be confirmed for the specific project.</p>
            </div>
            <div class="service-hero-media" role="img" aria-label="Technical illustration representing a static-control flooring system">
                <div class="service-hero-badge"><span>Define the requirement first</span><strong>Static-control flooring should be selected against the project's actual electrical and operating needs.</strong></div>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="what-is-esd">
        <div class="container service-intro-grid">
            <div><span class="section-eyebrow">01 / What it is</span><h2 class="section-title" id="what-is-esd">A technical flooring category built around static-control requirements.</h2></div>
            <div class="service-copy">
                <p class="service-definition">ESD / antistatic flooring is considered where <strong>electrostatic behaviour is part of the project requirement</strong>.</p>
                <p>The correct system cannot be chosen from the room name alone. The required electrical performance, substrate condition, operating environment and verification method all need to be agreed before installation.</p>
                <p>Akshaya therefore treats ESD flooring as a technical project decision rather than a standard finish selection.</p>
            </div>
        </div>
    </section>

    <section class="section service-problems" aria-labelledby="esd-problems">
        <div class="container">
            <span class="section-eyebrow">02 / Problems to assess</span>
            <h2 class="section-title" id="esd-problems">Static control starts with a clearly defined requirement.</h2>
            <div class="service-problem-grid">
                <?php foreach ($problems as $i => [$title, $description]): ?>
                <article class="service-problem"><span><?= sprintf('%02d', $i + 1) ?></span><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="esd-benefits">
        <div class="container">
            <span class="section-eyebrow">03 / Why a technical approach matters</span>
            <h2 class="section-title" id="esd-benefits">The floor needs to work as part of the operating environment.</h2>
            <div class="service-benefits-grid">
                <div class="service-benefits-list">
                    <?php foreach ($benefits as $i => [$title, $description]): ?>
                    <article class="service-benefit"><span><?= sprintf('%02d', $i + 1) ?></span><div><h3><?= site_escape($title) ?></h3><p><?= site_escape($description) ?></p></div></article>
                    <?php endforeach; ?>
                </div>
                <div class="service-benefits-media" role="img" aria-label="Technical illustration of a controlled flooring build-up"></div>
            </div>
        </div>
    </section>

    <section class="section service-suitability" aria-labelledby="esd-suitable">
        <div class="container">
            <span class="section-eyebrow">04 / Where it may be considered</span>
            <h2 class="section-title" id="esd-suitable">Use depends on the project's static-control specification.</h2>
            <p class="section-description">These are typical environments where a static-control requirement may arise. Suitability and performance must still be confirmed for the project.</p>
            <div class="service-suitability-grid">
                <?php foreach ($suitability as [$title, $description]): ?><div class="service-suitability-item"><strong><?= site_escape($title) ?></strong><span><?= site_escape($description) ?></span></div><?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="esd-assessment">
        <div class="container service-assessment-grid">
            <div><span class="section-eyebrow">05 / Assessment approach</span><h2 class="section-title" id="esd-assessment">Specification, substrate and operation need to align.</h2><p class="section-description">We review the technical requirement before finalising the system, execution approach and project-specific checks.</p></div>
            <div class="service-assessment-steps">
                <?php foreach ($assessment as $i => [$title, $description]): ?><article class="service-assessment-step"><span><?= sprintf('%02d', $i + 1) ?></span><div><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></div></article><?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section service-process" aria-labelledby="esd-process">
        <div class="container">
            <span class="section-eyebrow">06 / Installation pathway</span>
            <h2 class="section-title" id="esd-process">From requirement review to project verification.</h2>
            <div class="service-process-grid">
                <?php foreach ($process as [$number, $title, $description]): ?><article class="service-process-item"><span><?= site_escape($number) ?></span><strong><?= site_escape($title) ?></strong><p><?= site_escape($description) ?></p></article><?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="esd-care">
        <div class="container service-maintenance-grid">
            <div><span class="section-eyebrow">07 / Maintenance & review</span><h2 class="section-title" id="esd-care">Care should preserve the intended operating condition.</h2><p class="section-description">Cleaning methods, repairs and later changes to the area should be considered in relation to the installed system and the project's technical requirement.</p></div>
            <div>
                <div class="service-note-box">We do not publish a universal resistance value or compliance claim for ESD flooring. Those criteria should come from the specific project requirement and be verified using the agreed method.</div>
                <div class="service-faq">
                    <details><summary>Is ESD flooring the same as ordinary epoxy flooring?</summary><p>No. ESD / antistatic flooring is selected around a specific static-control requirement and should not be treated as a standard decorative or protective floor finish.</p></details>
                    <details><summary>Can you recommend an ESD floor without a project specification?</summary><p>We can review the area and discuss the requirement, but the required electrical performance and acceptance criteria should be clarified before the final system is specified.</p></details>
                    <details><summary>Does every electronics area need ESD flooring?</summary><p>No. The need depends on the process, equipment and project requirement. The environment should be reviewed rather than assumed.</p></details>
                    <details><summary>Will the finished floor be tested?</summary><p>Any inspection or electrical verification should follow the project's agreed specification and method. These requirements should be defined before execution.</p></details>
                </div>
            </div>
        </div>
    </section>

    <section class="section service-final" aria-labelledby="esd-final-title">
        <div class="container service-final-grid">
            <div><span class="section-eyebrow">08 / Start with the requirement</span><h2 class="section-title" id="esd-final-title">Tell us what the floor needs to control.</h2></div>
            <div><p>Share the area use, project specification, existing floor condition and approximate area. We can then review the appropriate next step for the static-control requirement.</p><div class="service-hero-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit <?= $arrow ?></a><a class="btn btn-outline" href="<?= $callUrl ?>">Call an Expert <?= $arrow ?></a></div></div>
        </div>
    </section>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>