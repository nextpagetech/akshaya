<?php
$pageTitle = 'About Akshaya Floor Solutions';
$pageDescription = 'Learn how Akshaya approaches industrial flooring through site assessment, trained application manpower, quality-controlled execution and project-specific recommendations.';
$bodyClass = 'support-page about-page';
$assetPrefix = '.';
require_once __DIR__ . '/includes/header.php';

$visitUrl = site_escape(site_url('schedule-visit.php'));
$callUrl = site_escape('tel:+' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['phone']));
?>

<main class="support-main" id="main-content">
    <section class="support-hero" aria-labelledby="about-title">
        <div class="container-wide support-hero-grid">
            <div class="support-hero-copy">
                <span class="support-kicker">About Akshaya</span>
                <h1 id="about-title">Built Around the <em>Floor.</em></h1>
                <p>Akshaya Enterprises works on industrial, commercial and controlled-environment flooring requirements with a practical sequence: understand the floor, understand the operation, recommend the system, plan the execution and support the finished work.</p>
                <div class="support-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit</a><a class="btn btn-outline" href="<?= $callUrl ?>">Talk to Our Team</a></div>
            </div>
            <div class="support-hero-media" role="img" aria-label="Akshaya flooring project source photograph"></div>
        </div>
    </section>

    <section class="section" aria-labelledby="about-approach">
        <div class="container support-split">
            <div><span class="section-eyebrow">01 / Our approach</span><h2 class="section-title" id="about-approach">Technical recommendation starts before application.</h2></div>
            <div class="support-copy"><p class="support-lead">The proposal material used by Akshaya follows a clear logic: site visit first, technical proposal next, and commercial proposal after the technical direction is understood.</p><p>That sequence is important because flooring decisions depend on the actual substrate, moisture, existing coating, operating environment, cleaning routine, traffic, exposure and available shutdown window.</p><p>Rather than positioning every product as suitable for every floor, the website follows the same assessment-led approach.</p></div>
        </div>
    </section>

    <section class="section support-dark" aria-labelledby="about-principles">
        <div class="container"><span class="section-eyebrow">02 / What guides the work</span><h2 class="section-title" id="about-principles">A considered path from assessment to aftercare.</h2><div class="support-principles">
            <article class="support-principle"><span>01</span><strong>Trained Manpower</strong><p>Execution quality depends on the people preparing and applying the system on site.</p></article>
            <article class="support-principle"><span>02</span><strong>Quality Assurance</strong><p>Surface preparation, application control and final inspection are treated as one continuous process.</p></article>
            <article class="support-principle"><span>03</span><strong>Production Planning</strong><p>Work sequencing should consider access, shutdown windows and the surrounding operation.</p></article>
            <article class="support-principle"><span>04</span><strong>Support After Installation</strong><p>Maintenance guidance, warranty communication and service support continue after handover.</p></article>
        </div></div>
    </section>

    <section class="section" aria-labelledby="about-work">
        <div class="container support-split"><div><span class="section-eyebrow">03 / What we work on</span><h2 class="section-title" id="about-work">Flooring and surface-protection requirements across different environments.</h2></div><div class="support-copy"><p>Akshaya's current solution portfolio includes Epoxy Flooring, PU Flooring, ESD / Antistatic Flooring, Dielectric Flooring, PVC Flooring, Clean Room Wall Coating, Waterproofing and VDF Flooring.</p><p>The same product category can have very different requirements in a production plant, warehouse, pharma area, hospital, laboratory or electronics environment. For that reason, system selection remains project-specific.</p><p>Where technical values, certifications, resistance levels or exact performance criteria are required, they should be confirmed against the approved system and project specification rather than assumed from a generic website description.</p></div></div>
    </section>

    <section class="section support-cta" aria-labelledby="about-cta"><div class="container support-cta-grid"><div><span class="section-eyebrow">04 / Start with the site</span><h2 class="section-title" id="about-cta">Tell us what is happening on the floor.</h2></div><div><p>Share the floor condition, facility use, approximate area and shutdown constraints. We can then discuss the right next step.</p><div class="support-actions"><a class="btn btn-primary" href="<?= $visitUrl ?>">Schedule Site Visit</a><a class="btn btn-outline" href="<?= site_escape(site_url('contact.php')) ?>">Contact Us</a></div></div></div></section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
