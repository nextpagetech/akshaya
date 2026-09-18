<?php
$pageTitle = 'Schedule Site Visit';
$pageDescription = 'Request a flooring site visit with Akshaya Floor Solutions and share your facility, floor condition, area and preferred schedule.';
$bodyClass = 'support-page visit-page';
$assetPrefix = '.';
require_once __DIR__ . '/includes/reusable-components.php';
require_once __DIR__ . '/includes/form-handler.php';

$formFields = [
    'company' => ['label' => 'Company Name', 'required' => true, 'max' => 150],
    'contact_person' => ['label' => 'Contact Person', 'required' => true, 'max' => 100],
    'phone' => ['label' => 'Mobile', 'required' => true, 'type' => 'phone', 'max' => 30],
    'email' => ['label' => 'Email', 'required' => false, 'type' => 'email', 'max' => 150],
    'location' => ['label' => 'Location', 'required' => true, 'max' => 180],
    'industry' => ['label' => 'Industry', 'required' => false, 'max' => 120],
    'preferred_date' => ['label' => 'Preferred Date', 'required' => false, 'max' => 40],
    'preferred_time' => ['label' => 'Preferred Time', 'required' => false, 'max' => 40],
    'area' => ['label' => 'Approximate Area', 'required' => false, 'max' => 80],
    'problem' => ['label' => 'Flooring Problem / Requirement', 'required' => true, 'max' => 1200],
    'shutdown' => ['label' => 'Available Shutdown Time', 'required' => false, 'max' => 120],
    'comments' => ['label' => 'Additional Comments', 'required' => false, 'max' => 1000],
];
$formResult = site_form_submit($formFields, 'Site Visit Request', $siteConfig);
$formValues = $formResult['values'] ?? [];
require_once __DIR__ . '/includes/header.php';
$phoneUrl = site_escape('tel:+' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['phone']));
$arrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
$backIcon = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m11 6-6 6 6 6M5 12h14"/></svg>';
?>

<main class="support-main" id="main-content">
    <section class="support-hero" aria-labelledby="visit-title"><div class="container-wide support-hero-grid"><div class="support-hero-copy"><span class="support-kicker">Site Assessment</span><h1 id="visit-title">Let Us See the Floor <em>First.</em></h1><p>A site visit helps us understand the substrate, visible damage, operating environment, access and shutdown constraints before discussing the flooring route.</p><div class="support-actions"><a class="btn btn-primary" href="#visit-form">Request Site Visit</a><a class="btn btn-outline" href="<?= $phoneUrl ?>">Call Our Team</a></div></div><div class="support-hero-media" role="img" aria-label="Akshaya flooring project source photograph"></div></div></section>

    <section class="section support-dark" aria-labelledby="visit-why"><div class="container"><span class="section-eyebrow">01 / Why assess first</span><h2 class="section-title" id="visit-why">The same flooring product is not automatically right for every floor.</h2><div class="support-principles"><article class="support-principle"><span>01</span><strong>Surface condition</strong><p>Existing coating, cracks, dusting, contamination and repairs need to be understood.</p></article><article class="support-principle"><span>02</span><strong>Moisture & site condition</strong><p>Site conditions can affect preparation, application and system selection.</p></article><article class="support-principle"><span>03</span><strong>Operating requirement</strong><p>Traffic, cleaning, exposure, hygiene or electrical requirements influence the recommendation.</p></article><article class="support-principle"><span>04</span><strong>Execution window</strong><p>Access, shutdown and phased working requirements need to be planned around the operation.</p></article></div></div></section>

    <section class="section" id="visit-form" aria-labelledby="visit-form-title">
        <div class="container support-contact-grid">
            <div><span class="section-eyebrow">02 / Request a visit</span><h2 class="section-title" id="visit-form-title">Share the project context.</h2><p class="section-description">You do not need to know the exact flooring system. Tell us what is happening, where the area is and what the operation needs. The form below is a short, guided sequence — nothing is submitted until the final review step.</p></div>
            <div>
        <form class="support-form" method="post" action="#visit-form-title" novalidate data-visit-form>
            <?php if ($formResult['submitted']): ?><div class="form-status<?= $formResult['success'] ? '' : ' is-error' ?>" role="status" style="grid-column:1/-1"><?= site_escape($formResult['message']) ?></div><?php endif; ?>
            <div class="form-honeypot" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

            <div class="visit-progress" role="list" aria-label="Site visit request progress">
                <div class="visit-progress-step" aria-current="true" role="listitem"><span class="bar"></span><span>1. Company</span></div>
                <div class="visit-progress-step" role="listitem"><span class="bar"></span><span>2. Site &amp; Problem</span></div>
                <div class="visit-progress-step" role="listitem"><span class="bar"></span><span>3. Schedule</span></div>
                <div class="visit-progress-step" role="listitem"><span class="bar"></span><span>4. Review</span></div>
            </div>

            <fieldset class="visit-step" data-step="1">
                <p class="text-label" style="grid-column:1/-1;margin:0 0 -.25rem">Step 1 of 4 — Company &amp; contact</p>
                <div class="field"><label for="visit-company">Company Name *</label><input id="visit-company" name="company" required maxlength="150" value="<?= site_escape($formValues['company'] ?? '') ?>"></div>
                <div class="field"><label for="visit-contact">Contact Person *</label><input id="visit-contact" name="contact_person" required maxlength="100" value="<?= site_escape($formValues['contact_person'] ?? '') ?>"></div>
                <div class="field"><label for="visit-phone">Mobile *</label><input id="visit-phone" name="phone" type="tel" required pattern="[0-9+()\-\s]{7,20}" maxlength="30" value="<?= site_escape($formValues['phone'] ?? '') ?>"></div>
                <div class="field"><label for="visit-email">Email</label><input id="visit-email" name="email" type="email" maxlength="150" value="<?= site_escape($formValues['email'] ?? '') ?>"></div>
            </fieldset>

            <fieldset class="visit-step" data-step="2">
                <p class="text-label" style="grid-column:1/-1;margin:0 0 -.25rem">Step 2 of 4 — Site &amp; problem</p>
                <div class="field"><label for="visit-location">Location *</label><input id="visit-location" name="location" required maxlength="180" value="<?= site_escape($formValues['location'] ?? '') ?>"></div>
                <div class="field"><label for="visit-industry">Industry</label><input id="visit-industry" name="industry" maxlength="120" value="<?= site_escape($formValues['industry'] ?? '') ?>"></div>
                <div class="field field-full"><label for="visit-problem">Flooring Problem / Requirement *</label><textarea id="visit-problem" name="problem" required maxlength="1200"><?= site_escape($formValues['problem'] ?? '') ?></textarea></div>
            </fieldset>

            <fieldset class="visit-step" data-step="3">
                <p class="text-label" style="grid-column:1/-1;margin:0 0 -.25rem">Step 3 of 4 — Schedule &amp; scope</p>
                <div class="field"><label for="visit-date">Preferred Date</label><input id="visit-date" name="preferred_date" type="date" value="<?= site_escape($formValues['preferred_date'] ?? '') ?>"></div>
                <div class="field"><label for="visit-time">Preferred Time</label><input id="visit-time" name="preferred_time" type="time" value="<?= site_escape($formValues['preferred_time'] ?? '') ?>"></div>
                <div class="field"><label for="visit-area">Approximate Area</label><input id="visit-area" name="area" maxlength="80" placeholder="e.g. 5,000 sq ft" value="<?= site_escape($formValues['area'] ?? '') ?>"></div>
                <div class="field"><label for="visit-shutdown">Available Shutdown Time</label><input id="visit-shutdown" name="shutdown" maxlength="120" placeholder="e.g. weekend / night shift" value="<?= site_escape($formValues['shutdown'] ?? '') ?>"></div>
                <div class="field field-full"><label for="visit-comments">Additional Comments</label><textarea id="visit-comments" name="comments" maxlength="1000"><?= site_escape($formValues['comments'] ?? '') ?></textarea></div>
            </fieldset>

            <fieldset class="visit-step" data-step="4">
                <p class="text-label" style="grid-column:1/-1;margin:0 0 -.25rem">Step 4 of 4 — Review &amp; send</p>
                <div class="visit-review-grid" data-visit-review></div>
                <p class="form-note">Submitting this form requests contact from Akshaya; it does not confirm an appointment or technical specification. Our team will coordinate availability with you.</p>
            </fieldset>

            <div class="visit-nav">
                <button class="btn btn-outline" type="button" data-step-back><?= $backIcon ?> Back</button>
                <button class="btn btn-primary" type="button" data-step-next>Next <?= $arrow ?></button>
            </div>

            <div class="field-full" data-visit-submit><button class="btn btn-primary" type="submit">Send Site Visit Request</button></div>
        </form>
    </div></div></section>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
