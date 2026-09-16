<?php
$pageTitle = 'Flooring Knowledge Centre';
$pageDescription = 'Practical guidance from Akshaya Floor Solutions on floor assessment, preparation, system selection, execution planning and maintenance.';
$bodyClass = 'support-page';
$assetPrefix = '..';
require __DIR__ . '/../includes/header.php';
?>

<main class="support-main" id="main-content">
    <section class="support-hero" aria-labelledby="knowledge-title"><div class="container-wide support-hero-grid"><div class="support-hero-copy"><span class="support-kicker">Knowledge Centre</span><h1 id="knowledge-title">Understand the Floor Before the <em>Product.</em></h1><p>Practical guidance for facility teams, procurement teams and project stakeholders who need to understand what influences an industrial flooring decision.</p><div class="support-actions"><a class="btn btn-primary" href="<?= site_escape(site_url('schedule-visit.php')) ?>">Schedule Site Visit</a><a class="btn btn-outline" href="<?= site_escape(site_url('services/epoxy-flooring.php')) ?>">Explore Flooring Solutions</a></div></div><div class="support-hero-media" role="img" aria-label="Industrial flooring project source photograph" style="background-image:url('../website_assets/Selected Pics from _23/006.JPG')"></div></div></section>

    <section class="section" aria-labelledby="knowledge-topics"><div class="container"><span class="section-eyebrow">01 / Core topics</span><h2 class="section-title" id="knowledge-topics">Questions worth asking before a flooring specification is final.</h2><div class="support-principles" style="color:#102838">
        <article class="support-principle" style="border-color:#d8e5ec"><span>01</span><strong style="color:#102838">Surface condition</strong><p style="color:#607784">Cracks, dusting, contamination and old coatings can change the preparation requirement.</p></article>
        <article class="support-principle" style="border-color:#d8e5ec"><span>02</span><strong style="color:#102838">Moisture</strong><p style="color:#607784">Moisture and site conditions should be reviewed before a resin system is selected or applied.</p></article>
        <article class="support-principle" style="border-color:#d8e5ec"><span>03</span><strong style="color:#102838">Traffic & loads</strong><p style="color:#607784">Pedestrian traffic, trolleys, forklifts and equipment movement create different floor demands.</p></article>
        <article class="support-principle" style="border-color:#d8e5ec"><span>04</span><strong style="color:#102838">Cleaning & exposure</strong><p style="color:#607784">Cleaning routines, spills and operating exposure should be part of system selection.</p></article>
    </div></div></section>

    <section class="section support-dark" aria-labelledby="knowledge-selection"><div class="container"><span class="section-eyebrow">02 / Selection logic</span><h2 class="section-title" id="knowledge-selection">Epoxy, PU, ESD, PVC or another route?</h2><div class="support-principles"><article class="support-principle"><span>A</span><strong>Start with the use</strong><p>Define what happens in the area and what the floor must support.</p></article><article class="support-principle"><span>B</span><strong>Check the substrate</strong><p>Understand whether the existing base is suitable and what preparation may be needed.</p></article><article class="support-principle"><span>C</span><strong>Define special requirements</strong><p>Static control, electrical insulation, hygiene or waterproofing needs must be clearly identified.</p></article><article class="support-principle"><span>D</span><strong>Plan execution</strong><p>Access, curing, shutdown and phased work affect the practical project plan.</p></article></div></div></section>

    <section class="section support-cta"><div class="container support-cta-grid"><div><span class="section-eyebrow">03 / Need project-specific guidance?</span><h2 class="section-title">Bring the floor condition into the discussion.</h2></div><div><p>Generic guidance can narrow the options, but the final recommendation should reflect the actual site and operating requirement.</p><div class="support-actions"><a class="btn btn-primary" href="<?= site_escape(site_url('schedule-visit.php')) ?>">Schedule Site Visit</a><a class="btn btn-outline" href="<?= site_escape(site_url('contact.php')) ?>">Contact Akshaya</a></div></div></div></section>
</main>
<?php require __DIR__ . '/../includes/footer.php'; ?>
