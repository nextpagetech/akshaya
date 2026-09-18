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
}
?>
    <?php if ($showSiteShell ?? true): ?>
    <footer class="site-footer bg-technical" id="site-footer">
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

        <div class="container footer-main">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a class="footer-logo" href="<?= site_escape(site_url('index.php')) ?>" aria-label="Akshaya Floor Solutions — Home">
                        <img src="<?= site_escape(asset_url('images/logo/logo.jpg')) ?>" alt="Akshaya Floor Solutions" width="220" height="159" loading="lazy">
                    </a>
                    <p class="footer-company"><?= site_escape($siteConfig['company_name']) ?></p>
                    <p class="footer-positioning">Commercial &amp; Industrial Flooring and Surface Protection Solutions</p>
                    <address class="footer-contact">
                        <p class="footer-contact-person"><?= site_escape($siteConfig['contact_person']) ?></p>
                        <a href="<?= site_escape($footerCallUrl) ?>"><span class="footer-contact-label">Call</span><span><?= site_escape($siteConfig['phone']) ?></span></a>
                        <a href="<?= site_escape($footerWhatsappUrl) ?>"><span class="footer-contact-label">WhatsApp</span><span><?= site_escape($siteConfig['whatsapp']) ?></span></a>
                        <?php if ($siteConfig['email'] !== ''): ?>
                        <a href="<?= site_escape('mailto:' . $siteConfig['email']) ?>"><?= site_escape($siteConfig['email']) ?></a>
                        <?php endif; ?>
                        <?php if ($siteConfig['address'] !== ''): ?>
                        <p class="footer-address"><?= site_escape($siteConfig['address']) ?></p>
                        <?php endif; ?>
                    </address>
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
    <script src="<?= site_escape(asset_url('js/home-industries-images.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/home-real-visuals.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/home-industries-video-grid.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/home-operation-3d-final.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/home-work-video-final.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/home-assessment-video-final.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/inner-page-visual-story.js')) ?>" defer></script>
    <script src="<?= site_escape(asset_url('js/inner-page-meaningful-visuals.js')) ?>" defer></script>
</body>
</html>