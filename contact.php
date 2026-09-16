<?php
$pageTitle = 'Contact Us';
$pageDescription = 'Contact Akshaya Floor Solutions about industrial flooring, wall coating, waterproofing or a site assessment.';
$bodyClass = 'support-page contact-page';
$assetPrefix = '.';
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
$emailUrl = site_escape('mailto:' . $siteConfig['email']);
?>

<main class="support-main" id="main-content">
    <section class="support-hero" aria-labelledby="contact-title"><div class="container-wide support-hero-grid"><div class="support-hero-copy"><span class="support-kicker">Contact Akshaya</span><h1 id="contact-title">Tell Us About the <em>Floor.</em></h1><p>For a useful first conversation, share what the facility is used for, what is happening on the existing floor and what constraints the project needs to work around.</p><div class="support-actions"><a class="btn btn-primary" href="<?= site_escape(site_url('schedule-visit.php')) ?>">Schedule Site Visit</a><a class="btn btn-outline" href="<?= $phoneUrl ?>">Call Now</a></div></div><div class="support-hero-media" role="img" aria-label="Akshaya flooring project source photograph"></div></div></section>

    <section class="section" aria-labelledby="contact-form-title"><div class="container support-contact-grid"><div><span class="section-eyebrow">01 / Contact details</span><h2 class="section-title" id="contact-form-title">Start with a simple requirement.</h2><div class="contact-details"><div class="contact-row"><span>Contact person</span><strong><?= site_escape($siteConfig['contact_person']) ?></strong></div><div class="contact-row"><span>Phone</span><a href="<?= $phoneUrl ?>">+91 <?= site_escape($siteConfig['phone']) ?></a></div><div class="contact-row"><span>Email</span><a href="<?= $emailUrl ?>"><?= site_escape($siteConfig['email']) ?></a></div><div class="contact-row"><span>Company</span><strong><?= site_escape($siteConfig['company_name']) ?></strong></div></div></div><div>
        <form class="support-form" method="post" action="#contact-form-title" novalidate>
            <?php if ($formResult['submitted']): ?><div class="form-status<?= $formResult['success'] ? '' : ' is-error' ?>" role="status"><?= site_escape($formResult['message']) ?></div><?php endif; ?>
            <div class="form-honeypot" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
            <div class="field"><label for="contact-name">Name *</label><input id="contact-name" name="name" required maxlength="100" value="<?= site_escape($formValues['name'] ?? '') ?>"></div>
            <div class="field"><label for="contact-company">Company</label><input id="contact-company" name="company" maxlength="150" value="<?= site_escape($formValues['company'] ?? '') ?>"></div>
            <div class="field"><label for="contact-phone">Phone *</label><input id="contact-phone" name="phone" type="tel" required maxlength="30" value="<?= site_escape($formValues['phone'] ?? '') ?>"></div>
            <div class="field"><label for="contact-email">Email</label><input id="contact-email" name="email" type="email" maxlength="150" value="<?= site_escape($formValues['email'] ?? '') ?>"></div>
            <div class="field field-full"><label for="contact-requirement">Flooring problem or requirement *</label><textarea id="contact-requirement" name="requirement" required maxlength="1000"><?= site_escape($formValues['requirement'] ?? '') ?></textarea></div>
            <p class="form-note">Please do not send confidential production data through this form. Technical system selection is confirmed only after the relevant project conditions are reviewed.</p>
            <div class="field-full"><button class="btn btn-primary" type="submit">Send Enquiry</button></div>
        </form>
    </div></div></section>
</main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
