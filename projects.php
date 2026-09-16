<?php
$pageTitle = 'Flooring Projects';
$pageDescription = 'Explore selected Akshaya flooring execution imagery and project approaches across industrial and commercial environments.';
$bodyClass = 'support-page projects-page';
$assetPrefix = '.';
require_once __DIR__ . '/includes/header.php';
$visitUrl = site_escape(site_url('schedule-visit.php'));
?>

<main class="support-main" id="main-content">
    <section class="support-hero" aria-labelledby="projects-title"><div class="container-wide support-hero-grid"><div class="support-hero-copy"><span class="support-kicker">Projects</span><h1 id="projects-title">The Challenge. The Approach. The <em>Result.</em></h1><p>Project photography gives context to Akshaya's execution work. Until project names, sectors and technical details are approved for publication, the case-study text remains intentionally generic.</p><div class="support-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Discuss Your Project</a><a class="btn btn-outline" href="<?= site_escape(site_url('gallery.php')) ?>">View Gallery</a></div></div><div class="support-hero-media" role="img" aria-label="Akshaya flooring project source photograph"></div></div></section>

    <section class="section" aria-labelledby="project-selection"><div class="container"><span class="section-eyebrow">01 / Selected work</span><h2 class="section-title" id="project-selection">Execution shown without invented project claims.</h2><p class="section-description">The images below come from the supplied Akshaya project/source folders. Client names, industries, area, system build-up and performance outcomes will only be added once those details are confirmed for public use.</p><div class="support-project-grid">
        <article class="support-project-card"><div class="support-project-copy"><span>Project View 01</span><h2>Surface preparation and resin-floor execution</h2><p>Project-specific preparation, application and finish depend on the floor condition and selected system.</p></div></article>
        <article class="support-project-card"><div class="support-project-copy"><span>Project View 02</span><h3>Industrial floor context</h3><p>Real supplied project imagery used as visual evidence of execution work.</p></div></article>
        <article class="support-project-card"><div class="support-project-copy"><span>Project View 03</span><h3>Finished-floor context</h3><p>Project identity and technical details remain unpublished until confirmed.</p></div></article>
    </div></div></section>

    <section class="section support-dark" aria-labelledby="project-method"><div class="container"><span class="section-eyebrow">02 / Case-study method</span><h2 class="section-title" id="project-method">Every published project should explain more than a photograph.</h2><div class="support-principles">
        <article class="support-principle"><span>01</span><strong>Challenge</strong><p>What was happening on the existing floor and what did the operation need?</p></article>
        <article class="support-principle"><span>02</span><strong>Assessment</strong><p>What site conditions, substrate factors and operating constraints were reviewed?</p></article>
        <article class="support-principle"><span>03</span><strong>Approach</strong><p>What flooring route and execution plan were selected for the project?</p></article>
        <article class="support-principle"><span>04</span><strong>Outcome</strong><p>What was completed, with only client-approved facts and measurable results published?</p></article>
    </div></div></section>

    <section class="section support-cta" aria-labelledby="project-cta"><div class="container support-cta-grid"><div><span class="section-eyebrow">03 / Your requirement</span><h2 class="section-title" id="project-cta">Have a floor that needs assessment?</h2></div><div><p>Send us the current floor condition, facility use, approximate area and preferred work window.</p><div class="support-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit</a><a class="btn btn-outline" href="<?= site_escape(site_url('contact.php')) ?>">Contact Us</a></div></div></div></section>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
