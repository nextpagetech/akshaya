<?php
// Shared final footer and pre-footer CTA. Include after each page's main element.
// Reuse the navigation data and configuration; never maintain a second service list.
if ($showSiteShell ?? true) {
    $footerCtaCompact = $compactFooterCta ?? false;
    $footerNavigation = site_navigation();
    $footerIndustries = array_merge(...array_values($footerNavigation['industries']['groups']));
    $footerIndustrySlugs = ['manufacturing', 'pharma', 'food-beverage', 'electronics', 'automobile', 'warehouses-logistics'];
    $footerQuickSections = ['about', 'projects', 'gallery', 'blog', 'contact'];
    $footerCallUrl = 'tel:+' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['phone']);
    $footerWhatsappUrl = 'https://wa.me/' . $siteConfig['phone_country_code'] . preg_replace('/\D+/', '', $siteConfig['whatsapp']);
    $footerArrow = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14m-5-5 5 5-5 5"/></svg>';
    $footerPhoneIcon = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 3h3l1.5 4-2 1.5a14 14 0 0 0 6 6l1.5-2L21 14v3c0 2.2-1.8 4-4 4A14 14 0 0 1 3 7c0-2.2 1.8-4 4-4Z"/></svg>';
    $footerWhatsappIcon = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M21 11.5a8.4 8.4 0 0 1-12.6 7.3L3 20l1.3-5.2A8.4 8.4 0 1 1 21 11.5Z"/></svg>';
    $footerMailIcon = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 5h18v14H3V5Zm1 1 8 7 8-7"/></svg>';
    $effectiveShowFooterCta = $showFooterCta ?? !in_array(($currentSection ?? ''), ['services', 'industries'], true);
}
?>
    <?php if ($showSiteShell ?? true): ?>
    <footer class="site-footer bg-technical" id="site-footer">
        <?php if ($effectiveShowFooterCta ?? true): ?>
        <section class="footer-cta section technical-grid<?= $footerCtaCompact ? ' footer-cta--compact' : '' ?>" aria-labelledby="footer-cta-title">
            <div class="container footer-cta-inner">
                <div class="footer-cta-copy">
                    <span class="section-eyebrow">Arrange a technical site visit</span>
                    <h2 class="section-title" id="footer-cta-title"><?= $footerCtaCompact ? 'A conversation is a good place to start.' : 'Not sure which flooring system is right for your facility?' ?></h2>
                    <?php if (!$footerCtaCompact): ?>
                    <p class="section-description">Let our technical team assess your floor conditions and recommend the right approach.</p>
                    <?php endif; ?>
                </div>
                <div class="action-group footer-cta-actions">
                    <a class="btn btn-primary" href="<?= site_escape($footerCtaCompact ? $footerCallUrl : site_url('schedule-visit.php')) ?>"><?= $footerCtaCompact ? 'Call Our Team' : 'Schedule Site Visit' ?> <?= $footerArrow ?></a>
                    <a class="btn btn-outline" href="<?= site_escape($footerWhatsappUrl) ?>">WhatsApp Us</a>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <div class="container footer-main">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a class="footer-logo" href="<?= site_escape(site_url('index.php')) ?>" aria-label="Akshaya Floor Solutions — Home">
                        <img src="<?= site_escape(asset_url('images/logo/logo.jpg')) ?>" alt="Akshaya Floor Solutions" width="220" height="159" loading="lazy">
                    </a>
                    <p class="footer-company"><?= site_escape($siteConfig['company_name']) ?></p>
                    <p class="footer-positioning">Commercial &amp; Industrial Flooring and Surface Protection Solutions</p>

                </div>

                <nav class="footer-link-group" aria-label="Footer flooring solutions">
                    <h2 class="footer-heading">Flooring Solutions</h2>
                    <ul>
                        <?php foreach ($footerNavigation['services']['groups']['Flooring Solutions'] as $slug => $label): ?>
                        <li><a href="<?= site_escape(site_url('services/' . $slug . '.php')) ?>"><?= site_escape($label) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </nav>

                <nav class="footer-link-group" aria-label="Footer industries">
                    <h2 class="footer-heading">Industries</h2>
                    <ul>
                        <?php foreach ($footerIndustrySlugs as $slug): ?>
                        <li><a href="<?= site_escape(site_url('industries/' . $slug . '.php')) ?>"><?= site_escape($footerIndustries[$slug]) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </nav>

                <div class="footer-link-group footer-contact-column" aria-label="Footer contact us">
                    <h2 class="footer-heading">Contact Us</h2>
                    <div class="footer-contact-links">
                        <a href="<?= site_escape($footerCallUrl) ?>"><?= $footerPhoneIcon ?><span><small>Call</small><strong><?= site_escape($siteConfig['phone']) ?></strong></span></a>
                        <a href="<?= site_escape($footerWhatsappUrl) ?>" target="_blank" rel="noopener noreferrer"><?= $footerWhatsappIcon ?><span><small>WhatsApp</small><strong><?= site_escape($siteConfig['whatsapp']) ?></strong></span></a>
                        <?php if ($siteConfig['email'] !== ''): ?>
                        <a href="<?= site_escape('mailto:' . $siteConfig['email']) ?>"><?= $footerMailIcon ?><span><small>Email</small><strong><?= site_escape($siteConfig['email']) ?></strong></span></a>
                        <?php endif; ?>
                    </div>
                </div>

                <nav class="footer-link-group" aria-label="Footer quick links">
                    <h2 class="footer-heading">Quick Links</h2>
                    <ul>
                        <?php foreach ($footerQuickSections as $section): $item = $footerNavigation[$section]; ?>
                        <li><a href="<?= site_escape(site_url($item['path'])) ?>"><?= site_escape($section === 'blog' ? 'Blog / Knowledge Centre' : $item['label']) ?></a></li>
                        <?php endforeach; ?>
                        <li><a href="<?= site_escape(site_url('schedule-visit.php')) ?>">Schedule Site Visit</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="footer-bottom">
                <p>&copy; <?= date('Y') ?> <?= site_escape($siteConfig['company_name']) ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous" defer></script>
    <script src="<?= site_escape(asset_url('js/main.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/experience-fixes.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/support-depth.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/interactive-pages.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/home-3d-qa.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/home-semantic-scenes.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/home-problem-visuals.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/home-system-tabs.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/home-industries-video-grid.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/home-operation-illustrations-final.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/home-assessment-illustrations-final.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/home-care-illustrations-final.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/home-workflow-3d-final.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/inner-page-visual-story.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/inner-page-meaningful-visuals.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/home-premium-redesign.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/premium-support.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/support-redesign-v2.js')) ?>" defer></script>
</body>
</html>