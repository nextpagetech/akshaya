<?php
// Internal Step 4 specimen. Not linked publicly; no submission/business content.
$pageTitle = 'Design System Preview';
$pageDescription = '';
$pageNoIndex = true;
$showSiteShell = false; // Reuse document/assets without designing the public shell.
$bodyClass = 'design-system-preview';
$assetPrefix = '.';
header('X-Robots-Tag: noindex, nofollow');
require_once __DIR__ . '/includes/header.php';

// Consistent inline line icons; no icon library or replacement branding.
$arrowIcon = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12h15M13 6l6 6-6 6"/></svg>';
$layerIcon = '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m3 8 9-5 9 5-9 5-9-5Zm0 4 9 5 9-5M3 16l9 5 9-5"/></svg>';
$sampleImage = site_escape(asset_url('images/common/design-system-sample.svg'));
?>
<a class="ds-skip" href="#main-content">Skip to design specimens</a>
<header class="ds-masthead">
    <div class="container ds-masthead-inner">
        <img class="ds-logo" src="<?= site_escape(asset_url('images/logo/logo.jpg')) ?>" alt="Akshaya Floor Solutions" width="220" height="159">
        <div class="ds-edition"><strong>DESIGN SYSTEM / 01</strong><br>Step 04 &middot; Internal review</div>
    </div>
</header>
<main id="main-content" tabindex="-1">
    <section class="section ds-intro" aria-labelledby="preview-title">
        <div class="container">
            <div class="row align-items-end g-4">
                <div class="col-lg-7">
                    <span class="section-eyebrow">Akshaya &nbsp; / &nbsp; Visual foundation</span>
                    <h1 id="preview-title" class="display-title">Precision,<br><span class="text-brand">by design.</span></h1>
                </div>
                <div class="col-lg-5">
                    <p class="body-large text-measure">One shared language for every page.</p>
                    <p class="text-muted text-small">A working specimen of color, type, space and interaction. Review the foundations here before the website layouts begin.</p>
                    <span class="tag">Internal preview</span> <span class="tag tag-neutral">Pending visual approval</span>
                </div>
            </div>
            <nav class="ds-index" aria-label="Design specimens">
                <a href="#palette">01 &nbsp; Color</a><a href="#typography">02 &nbsp; Typography</a><a href="#components">03 &nbsp; Components</a><a href="#forms">04 &nbsp; Form controls</a><a href="#motion">05 &nbsp; Depth &amp; motion</a>
            </nav>
        </div>
    </section>

    <section id="palette" class="section-sm bg-soft ds-section" aria-labelledby="palette-title">
        <div class="container">
            <div class="ds-section-heading"><h2 id="palette-title"><span class="ds-number">01</span> A palette with purpose.</h2><span class="ds-token">Logo blue + navy / supporting cyan</span></div>
            <div class="ds-swatches">
                <?php foreach ([
                    ['primary', 'Primary', '#166BA2'], ['primary-dark', 'Primary dark', '#10517D'],
                    ['primary-light', 'Primary light', '#E8F3FA'], ['accent', 'Accent', '#65CBE3'],
                    ['navy', 'Navy', '#152836'], ['surface', 'Surface / white', '#FFFFFF'],
                    ['background', 'Background', '#F3F6F8'], ['text', 'Text', '#1D303D'],
                    ['muted', 'Muted text', '#526675'], ['border', 'Border', '#D8E2E9'],
                ] as [$token, $label, $hex]): ?>
                <figure class="ds-swatch">
                    <div class="ds-swatch-color ds-swatch-<?= site_escape($token) ?>" aria-hidden="true"></div>
                    <figcaption><?= site_escape($label) ?><code><?= site_escape($hex) ?></code></figcaption>
                </figure>
                <?php endforeach; ?>
            </div>
            <p class="text-small text-muted ds-spaced mb-0">Blue and navy are sampled from the supplied logo. Cyan and pale blue extend that palette; the logo's smaller red/yellow details stay within the original mark. Cyan uses a darker ink on light backgrounds.</p>
        </div>
    </section>

    <section id="typography" class="section bg-white ds-section" aria-labelledby="type-title">
        <div class="container">
            <div class="ds-section-heading"><h2 id="type-title"><span class="ds-number">02</span> Clarity at every scale.</h2><span class="ds-token">Space Grotesk + Manrope</span></div>
            <!-- Specimens use paragraphs to preserve the document's heading hierarchy. -->
            <div class="ds-type-row"><span class="ds-token">Display / major statements</span><p class="display-title">Made to be clear.</p></div>
            <div class="ds-type-row"><span class="ds-token">H1 / page title</span><p class="type-h1">A considered foundation.</p></div>
            <div class="ds-type-row"><span class="ds-token">H2 / section title</span><p class="type-h2">Structure meets detail.</p></div>
            <div class="ds-type-row"><span class="ds-token">H3 / content heading</span><p class="type-h3">Every element has a purpose.</p></div>
            <div class="ds-type-row"><span class="ds-token">H4 / H5</span><div><p class="type-h4">A clear next step</p><p class="type-h5 mb-0">Supporting information</p></div></div>
            <div class="ds-type-row"><span class="ds-token">Body large / body / small</span><div class="text-measure"><p class="body-large">Readable information. Comfortable space.</p><p>Body text keeps technical information approachable. A controlled line length, open spacing and a steady rhythm make longer details easier to follow.</p><p class="text-small text-muted mb-0">Small text supports the message without competing with it.</p></div></div>
            <div class="ds-type-row"><span class="ds-token">Label / caption</span><div><p class="text-label">Field label</p><p class="caption text-muted mb-0">Supporting caption &middot; 13px minimum at default settings</p></div></div>
            <div class="section-header section-header--split ds-spaced mb-0">
                <span class="section-eyebrow">Light section heading</span>
                <h3 class="section-title type-h2">A clear hierarchy.<br><span class="text-brand">Room to breathe.</span></h3>
                <p class="section-description">Eyebrow, display heading and a short description. The split variation becomes a simple vertical stack on smaller screens.</p>
            </div>
        </div>
    </section>

    <section id="components" class="section bg-soft ds-section" aria-labelledby="components-title">
        <div class="container">
            <div class="ds-section-heading"><h2 id="components-title"><span class="ds-number">03</span> A reusable kit of parts.</h2><span class="ds-token">Actions / surfaces / media</span></div>
            <div class="action-group">
                <a class="btn btn-primary" href="#forms">Primary action <?= $arrowIcon ?></a>
                <a class="btn btn-secondary" href="#forms">Secondary action</a>
                <a class="btn btn-outline" href="#forms">Outline action</a>
                <a class="link-arrow" href="#forms">Explore the specimen <?= $arrowIcon ?></a>
                <button class="btn btn-primary" type="button" disabled>Disabled</button>
            </div>
            <p class="caption text-muted ds-spaced">Tab through the controls to review focus. Active examples link to the form-control specimen below.</p>
            <div class="component-grid component-grid--three">
                <article class="card-base card-body stack">
                    <span class="icon-box"><?= $layerIcon ?></span>
                    <h3 class="ds-card-heading">The basic surface</h3>
                    <p class="text-small text-muted">A restrained border and soft shadow give related information a clear home.</p>
                    <span class="tag tag-neutral">Static specimen</span>
                </article>
                <a class="card-base card-interactive card-body stack" href="#forms">
                    <span class="icon-box"><?= $layerIcon ?></span>
                    <h3 class="ds-card-heading">A little elevation</h3>
                    <p class="text-small text-muted">Subtle depth on pointer hover. The entire card remains a visible, keyboard-accessible link.</p>
                    <span class="link-arrow">View form controls <?= $arrowIcon ?></span>
                </a>
                <article class="card-base">
                    <figure class="image-frame card-image aspect-wide image-zoom">
                        <img src="<?= $sampleImage ?>" alt="Abstract blue layered planes used as an image-style specimen" width="960" height="640" loading="lazy">
                    </figure>
                    <div class="card-body"><h3 class="ds-card-heading">Space for the visual</h3><p class="text-small text-muted">Fixed aspect ratio and optional zoom. Abstract sample only, not a project image.</p></div>
                </article>
            </div>
            <div class="row g-4 ds-spaced">
                <div class="col-lg-6">
                    <h3 class="ds-card-heading">Labels &amp; selection</h3>
                    <div class="action-group"><span class="tag">Category label</span><span class="tag tag-neutral">Technical attribute</span></div>
                    <div class="action-group mt-3" data-preview-chips role="group" aria-label="Independent selection specimens">
                        <button type="button" class="chip" aria-pressed="true">Selected</button><button type="button" class="chip" aria-pressed="false">Optional</button><button type="button" class="chip" disabled>Unavailable</button>
                    </div>
                    <p class="caption text-muted mt-2">Selectable specimens only; no content filtering.</p>
                </div>
                <div class="col-lg-6">
                    <h3 class="ds-card-heading">Placeholder metrics</h3>
                    <div class="component-grid component-grid--three">
                        <div class="stat"><span class="stat-value">XX+</span><span class="stat-label">Years placeholder</span></div>
                        <div class="stat"><span class="stat-value">XXX+</span><span class="stat-label">Projects placeholder</span></div>
                        <div class="stat"><span class="stat-value">X.XM+</span><span class="stat-label">Area placeholder</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="forms" class="section bg-white ds-section" aria-labelledby="forms-title">
        <div class="container">
            <div class="row g-4 g-lg-5">
                <div class="col-lg-4">
                    <div class="section-header"><span class="section-eyebrow">04 / Form controls</span><h2 id="forms-title" class="section-title">Clear inputs.<br><span class="text-brand">Confident actions.</span></h2><p class="section-description">Visual specimens only. No information is submitted, stored or sent.</p></div>
                    <p class="status-message status-success"><strong>Success:</strong> example confirmation.</p>
                    <p class="status-message status-warning"><strong>Attention:</strong> example guidance.</p>
                    <p class="status-message status-danger"><strong>Error:</strong> example failure message.</p>
                </div>
                <div class="col-lg-8">
                    <!-- Controls deliberately have no form owner or submit action. -->
                    <div class="form-grid">
                        <div><label class="form-label" for="sample-name">Text input</label><input class="form-control" id="sample-name" type="text" placeholder="Sample text" aria-describedby="name-help"><div class="form-text" id="name-help">A short instruction beneath the field.</div></div>
                        <div><label class="form-label" for="sample-email">Email input</label><input class="form-control" id="sample-email" type="email" placeholder="name@example.com"></div>
                        <div><label class="form-label" for="sample-phone">Phone input</label><input class="form-control" id="sample-phone" type="tel" placeholder="Sample phone number"></div>
                        <div><label class="form-label" for="sample-select">Select</label><select class="form-select" id="sample-select"><option value="">Choose a sample</option><option>Option one</option><option>Option two</option></select></div>
                        <div><label class="form-label" for="sample-date">Date</label><input class="form-control" id="sample-date" type="date"></div>
                        <div><label class="form-label" for="sample-time">Time</label><input class="form-control" id="sample-time" type="time"></div>
                        <div><label class="form-label" for="sample-error">Error state</label><input class="form-control is-invalid" id="sample-error" type="text" value="Example entry" aria-invalid="true" aria-describedby="error-help"><div class="invalid-feedback" id="error-help">Error example: check this value.</div></div>
                        <div><label class="form-label" for="sample-success">Success state</label><input class="form-control is-valid" id="sample-success" type="text" value="Example entry" aria-describedby="success-help"><div class="valid-feedback" id="success-help">Success example: accepted value.</div></div>
                        <div class="form-field-full"><label class="form-label" for="sample-message">Textarea</label><textarea class="form-control" id="sample-message" rows="3" placeholder="A little more detail..."></textarea></div>
                        <div class="form-field-full"><div class="form-check"><input class="form-check-input" type="checkbox" id="sample-check"><label class="form-check-label" for="sample-check">Example checkbox with a clear, clickable label.</label></div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="motion" class="section bg-technical technical-grid" aria-labelledby="motion-title">
        <div class="container">
            <div class="section-header section-header--split">
                <span class="section-eyebrow">05 / Depth &amp; motion</span><h2 class="section-title" id="motion-title">Quiet depth.<br><span class="text-accent">Deliberate movement.</span></h2><p class="section-description">A dark-section heading and a small set of opt-in treatments. Content remains visible with JavaScript disabled and with reduced motion enabled.</p>
            </div>
            <div class="component-grid component-grid--two">
                <figure class="image-frame aspect-wide image-overlay image-zoom">
                    <img src="<?= $sampleImage ?>" alt="Abstract blue planes demonstrating a dark image overlay" width="960" height="640" loading="lazy">
                    <figcaption class="image-caption">Overlay / caption always visible</figcaption>
                </figure>
                <div class="depth-scene">
                    <figure class="image-frame aspect-wide depth-layer depth-tilt">
                        <img src="<?= $sampleImage ?>" alt="Abstract layered planes demonstrating optional perspective and elevation" width="960" height="640" loading="lazy">
                        <figcaption class="floating-layer tag">Static floating layer</figcaption>
                    </figure>
                </div>
            </div>
            <div class="component-grid component-grid--four ds-spaced">
                <div class="ds-motion-tile reveal-up"><strong>Rise</strong><p>18px / once on entry</p></div>
                <div class="ds-motion-tile reveal-left"><strong>From the left</strong><p>Content stays in flow</p></div>
                <div class="ds-motion-tile reveal-right"><strong>From the right</strong><p>Pointer-independent</p></div>
                <div class="ds-motion-tile scale-in"><strong>Settle</strong><p>98% to 100% scale</p></div>
            </div>
            <div class="ds-surface-sample bg-brand ds-spaced reveal"><span class="section-eyebrow">Optional brand gradient</span><p class="text-small mb-0">A restrained alternative for occasional emphasis. White, soft neutral and navy remain the main section surfaces.</p></div>
        </div>
    </section>
</main>
<footer class="ds-footer"><div class="container"><p>Akshaya &middot; Design system 01 &nbsp; / &nbsp; Internal review only. All samples are illustrative; company metrics remain unconfirmed.</p></div></footer>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
