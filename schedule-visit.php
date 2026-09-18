<?php
$pageTitle = 'Schedule Site Visit';
$pageDescription = 'Request a flooring site visit with Akshaya Floor Solutions and share your facility, floor condition, area and preferred schedule.';
$bodyClass = 'support-page support-v2 visit-page visit-v3';
$assetPrefix = '.';
$showFooterCta = false;
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
$whatsappUrl = site_escape('https://wa.me/' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['whatsapp']));
$arrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
$backIcon = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m11 6-6 6 6 6M5 12h14"/></svg>';
?>

<main class="visit-v3-main" id="main-content">
    <div class="container-wide visit-v3-shell visit-v3-shell--compact">
        <div class="visit-v3-content">
            <section class="visit-v3-hero visit-v3-hero--compact" aria-labelledby="visit-title">
                <span class="visit-v3-kicker">Schedule a Technical Site Visit</span>
                <h1 id="visit-title">Let us understand the <em>floor first.</em></h1>
                <p class="visit-v3-lead">Share what is happening on the existing floor, how the area is used and when the work can be accessed. You do not need to know the flooring system before requesting a visit.</p>
                <div class="visit-v3-actions">
                    <a class="btn btn-primary" href="#visit-request">Request Site Visit <?= $arrow ?></a>
                    <a class="visit-v3-contact-link" href="<?= $phoneUrl ?>">Call <?= site_escape($siteConfig['phone']) ?></a>
                </div>
            </section>

            <section class="visit-v3-essentials" aria-labelledby="visit-essential-title">
                <span class="visit-v3-section-no">What helps us assess the site</span>
                <h2 id="visit-essential-title">Four things are enough to start.</h2>
                <div class="visit-v3-essential-list">
                    <article><span>01</span><div><strong>Current floor condition</strong><p>Cracks, dusting, peeling, wear, water ingress or another visible issue.</p></div></article>
                    <article><span>02</span><div><strong>How the area is used</strong><p>Production, warehouse movement, hygiene, static control or another operating need.</p></div></article>
                    <article><span>03</span><div><strong>Approximate area</strong><p>A rough size is enough for the first discussion.</p></div></article>
                    <article><span>04</span><div><strong>Access / shutdown window</strong><p>Any known timing or operational restrictions around the work area.</p></div></article>
                </div>
            </section>

            <section class="visit-v3-help visit-v3-help--compact" aria-labelledby="visit-help-title">
                <div>
                    <span class="visit-v3-section-no">Prefer to talk first?</span>
                    <h2 id="visit-help-title">Call or WhatsApp the team.</h2>
                    <p>We can first understand the requirement and then guide you on whether a site visit is the right next step.</p>
                </div>
                <div class="visit-v3-help-actions">
                    <a class="btn btn-primary" href="<?= $phoneUrl ?>">Call Our Team</a>
                    <a class="btn btn-outline" href="<?= $whatsappUrl ?>" target="_blank" rel="noopener noreferrer">WhatsApp Us</a>
                </div>
            </section>
        </div>

        <aside class="visit-v3-form-column" id="visit-request" aria-labelledby="visit-form-title">
            <div class="visit-v3-form-card">
                <div class="visit-v3-form-head">
                    <span>Site Visit Request</span>
                    <h2 id="visit-form-title">Share the project context.</h2>
                    <p>Complete four short steps. Nothing is submitted until the final review.</p>
                </div>

                <form class="support-form visit-v3-form" method="post" action="#visit-request" novalidate data-visit-form>
                    <?php if ($formResult['submitted']): ?><div class="form-status<?= $formResult['success'] ? '' : ' is-error' ?>" role="status"><?= site_escape($formResult['message']) ?></div><?php endif; ?>
                    <div class="form-honeypot" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

                    <div class="visit-progress" role="list" aria-label="Site visit request progress">
                        <div class="visit-progress-step" aria-current="true" role="listitem"><span class="bar"></span><span>Company</span></div>
                        <div class="visit-progress-step" role="listitem"><span class="bar"></span><span>Site</span></div>
                        <div class="visit-progress-step" role="listitem"><span class="bar"></span><span>Schedule</span></div>
                        <div class="visit-progress-step" role="listitem"><span class="bar"></span><span>Review</span></div>
                    </div>

                    <fieldset class="visit-step" data-step="1">
                        <p class="visit-v3-step-title">Step 1 of 4 <strong>Company &amp; contact</strong></p>
                        <div class="field"><label for="visit-company">Company Name *</label><input id="visit-company" name="company" required maxlength="150" value="<?= site_escape($formValues['company'] ?? '') ?>"></div>
                        <div class="field"><label for="visit-contact">Contact Person *</label><input id="visit-contact" name="contact_person" required maxlength="100" value="<?= site_escape($formValues['contact_person'] ?? '') ?>"></div>
                        <div class="field"><label for="visit-phone">Mobile *</label><input id="visit-phone" name="phone" type="tel" required pattern="[0-9+()\-\s]{7,20}" maxlength="30" value="<?= site_escape($formValues['phone'] ?? '') ?>"></div>
                        <div class="field"><label for="visit-email">Email</label><input id="visit-email" name="email" type="email" maxlength="150" value="<?= site_escape($formValues['email'] ?? '') ?>"></div>
                    </fieldset>

                    <fieldset class="visit-step" data-step="2">
                        <p class="visit-v3-step-title">Step 2 of 4 <strong>Site &amp; problem</strong></p>
                        <div class="field"><label for="visit-location">Location *</label><input id="visit-location" name="location" required maxlength="180" value="<?= site_escape($formValues['location'] ?? '') ?>"></div>
                        <div class="field"><label for="visit-industry">Industry</label><input id="visit-industry" name="industry" maxlength="120" value="<?= site_escape($formValues['industry'] ?? '') ?>"></div>
                        <div class="field field-full"><label for="visit-problem">Flooring Problem / Requirement *</label><textarea id="visit-problem" name="problem" required maxlength="1200"><?= site_escape($formValues['problem'] ?? '') ?></textarea></div>
                    </fieldset>

                    <fieldset class="visit-step" data-step="3">
                        <p class="visit-v3-step-title">Step 3 of 4 <strong>Schedule &amp; scope</strong></p>
                        <div class="field"><label for="visit-date">Preferred Date</label><input id="visit-date" name="preferred_date" type="date" value="<?= site_escape($formValues['preferred_date'] ?? '') ?>"></div>
                        <div class="field"><label for="visit-time">Preferred Time</label><input id="visit-time" name="preferred_time" type="time" value="<?= site_escape($formValues['preferred_time'] ?? '') ?>"></div>
                        <div class="field"><label for="visit-area">Approximate Area</label><input id="visit-area" name="area" maxlength="80" placeholder="e.g. 5,000 sq ft" value="<?= site_escape($formValues['area'] ?? '') ?>"></div>
                        <div class="field"><label for="visit-shutdown">Shutdown Time</label><input id="visit-shutdown" name="shutdown" maxlength="120" placeholder="e.g. weekend / night shift" value="<?= site_escape($formValues['shutdown'] ?? '') ?>"></div>
                        <div class="field field-full"><label for="visit-comments">Additional Comments</label><textarea id="visit-comments" name="comments" maxlength="1000"><?= site_escape($formValues['comments'] ?? '') ?></textarea></div>
                    </fieldset>

                    <fieldset class="visit-step" data-step="4">
                        <p class="visit-v3-step-title">Step 4 of 4 <strong>Review &amp; send</strong></p>
                        <div class="visit-review-grid" data-visit-review></div>
                        <p class="form-note">Submitting this form requests contact from Akshaya; it does not confirm an appointment or technical specification. Our team will coordinate availability with you.</p>
                    </fieldset>

                    <div class="visit-nav">
                        <button class="btn btn-outline" type="button" data-step-back><?= $backIcon ?> Back</button>
                        <button class="btn btn-primary" type="button" data-step-next>Next <?= $arrow ?></button>
                    </div>

                    <div class="field-full" data-visit-submit><button class="btn btn-primary" type="submit">Send Site Visit Request</button></div>
                </form>
            </div>
        </aside>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
