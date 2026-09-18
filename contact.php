<?php
$pageTitle = 'Contact Us';
$pageDescription = 'Contact Akshaya Floor Solutions about industrial flooring, wall coating, waterproofing or a site assessment.';
$bodyClass = 'support-page support-v2 contact-page contact-v2';
$assetPrefix = '.';
$showFooterCta = false;
require_once __DIR__ . '/includes/reusable-components.php';
require_once __DIR__ . '/includes/form-handler.php';

$formFields = [
    'name' => ['label' => 'Name', 'required' => true, 'max' => 100],
    'company' => ['label' => 'Company', 'required' => false, 'max' => 150],
    'phone' => ['label' => 'Phone', 'required' => true, 'type' => 'phone', 'max' => 30],
    'email' => ['label' => 'Email', 'required' => false, 'type' => 'email', 'max' => 150],
    'requirement' => ['label' => 'Requirement', 'required' => true, 'max' => 1000],
];
$formResult = site_form_submit($formFields, 'General Contact', $siteConfig);
$formValues = $formResult['values'] ?? [];
require_once __DIR__ . '/includes/header.php';

$phoneUrl = site_escape('tel:+' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['phone']));
$whatsappUrl = site_escape('https://wa.me/' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['whatsapp']));
$emailUrl = site_escape('mailto:' . $siteConfig['email']);
$mapQuery = rawurlencode($siteConfig['address'] !== '' ? $siteConfig['address'] : $siteConfig['company_name']);
$mapSrc = 'https://www.google.com/maps?q=' . $mapQuery . '&output=embed';

$callIcon = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 3h3l1.5 4-2 1.5a14 14 0 0 0 6 6l1.5-2L21 14v3c0 2.2-1.8 4-4 4A14 14 0 0 1 3 7c0-2.2 1.8-4 4-4Z"/></svg>';
$whatsappIcon = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M21 11.5a8.4 8.4 0 0 1-12.6 7.3L3 20l1.3-5.2A8.4 8.4 0 1 1 21 11.5Z"/></svg>';
$mailIcon = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 5h18v14H3V5Zm1 1 8 7 8-7"/></svg>';
$pinIcon = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s6-5.2 6-11a6 6 0 1 0-12 0c0 5.8 6 11 6 11Zm0-8.5A2.5 2.5 0 1 0 12 7a2.5 2.5 0 0 0 0 5.5Z"/></svg>';
?>

<main class="support-main contact-v2-main" id="main-content">
    <section class="contact-v2-hero" aria-labelledby="contact-title">
        <div class="container-wide contact-v2-hero-grid">
            <div>
                <span class="support-kicker">Contact Akshaya</span>
                <h1 id="contact-title">Tell us what is happening on the <em>floor.</em></h1>
            </div>
            <p>Share the requirement, current floor condition or project context. Our team can review the enquiry and guide you on the appropriate next step.</p>
        </div>
    </section>

    <section class="contact-v2-main-section" aria-labelledby="contact-form-title">
        <div class="container contact-v2-grid">
            <div class="contact-v2-form-wrap">
                <span class="section-eyebrow">01 / Send an enquiry</span>
                <h2 id="contact-form-title">Start with the essentials.</h2>
                <form class="support-form contact-v2-form" method="post" action="#contact-form-title" novalidate>
                    <?php if ($formResult['submitted']): ?><div class="form-status<?= $formResult['success'] ? '' : ' is-error' ?>" role="status"><?= site_escape($formResult['message']) ?></div><?php endif; ?>
                    <div class="form-honeypot" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
                    <div class="field"><label for="contact-name">Name *</label><input id="contact-name" name="name" required maxlength="100" value="<?= site_escape($formValues['name'] ?? '') ?>"></div>
                    <div class="field"><label for="contact-company">Company</label><input id="contact-company" name="company" maxlength="150" value="<?= site_escape($formValues['company'] ?? '') ?>"></div>
                    <div class="field"><label for="contact-phone">Phone *</label><input id="contact-phone" name="phone" type="tel" required pattern="[0-9+()\-\s]{7,20}" maxlength="30" value="<?= site_escape($formValues['phone'] ?? '') ?>"></div>
                    <div class="field"><label for="contact-email">Email</label><input id="contact-email" name="email" type="email" maxlength="150" value="<?= site_escape($formValues['email'] ?? '') ?>"></div>
                    <div class="field field-full"><label for="contact-requirement">Message / Requirement *</label><textarea id="contact-requirement" name="requirement" required maxlength="1000" placeholder="Tell us briefly about the floor or project requirement."><?= site_escape($formValues['requirement'] ?? '') ?></textarea></div>
                    <div class="field-full"><button class="btn btn-primary" type="submit">Send Enquiry</button></div>
                </form>
            </div>

            <aside class="contact-v2-details" aria-label="Contact details">
                <span class="section-eyebrow">02 / Contact details</span>
                <h2>Reach the team directly.</h2>

                <a class="contact-v2-detail" href="<?= $phoneUrl ?>">
                    <span class="contact-v2-icon"><?= $callIcon ?></span>
                    <span><small>Call</small><strong>+91 <?= site_escape($siteConfig['phone']) ?></strong></span>
                </a>

                <a class="contact-v2-detail" href="<?= $whatsappUrl ?>" target="_blank" rel="noopener noreferrer">
                    <span class="contact-v2-icon"><?= $whatsappIcon ?></span>
                    <span><small>WhatsApp</small><strong><?= site_escape($siteConfig['whatsapp']) ?></strong></span>
                </a>

                <a class="contact-v2-detail" href="<?= $emailUrl ?>">
                    <span class="contact-v2-icon"><?= $mailIcon ?></span>
                    <span><small>Email</small><strong><?= site_escape($siteConfig['email']) ?></strong></span>
                </a>

                <?php if ($siteConfig['address'] !== ''): ?>
                <div class="contact-v2-detail">
                    <span class="contact-v2-icon"><?= $pinIcon ?></span>
                    <span><small>Address</small><strong><?= site_escape($siteConfig['address']) ?></strong></span>
                </div>
                <?php endif; ?>

                <div class="contact-v2-company">
                    <span>Contact person</span>
                    <strong><?= site_escape($siteConfig['contact_person']) ?></strong>
                    <span>Company</span>
                    <strong><?= site_escape($siteConfig['company_name']) ?></strong>
                </div>
            </aside>
        </div>
    </section>

    <section class="contact-v2-map" aria-label="Location map">
        <iframe
            src="<?= site_escape($mapSrc) ?>"
            title="<?= site_escape($siteConfig['company_name']) ?> location map"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            allowfullscreen>
        </iframe>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
