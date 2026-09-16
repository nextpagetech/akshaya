# Akshaya design system — Step 4

## Review

Run `php -n -S 127.0.0.1:8094 -t .` from the project root, then open
`http://127.0.0.1:8094/design-system.php`. The `-n` flag bypasses the existing
local PHP configuration's duplicate OpenSSL warning; this foundation needs no extensions.

The preview is internal, unlinked from public navigation, and marked `noindex,
nofollow` in both its response header and document metadata. It reuses the common
document/assets with `$showSiteShell = false`. Public shells keep their default
behavior. The specimen has no forms that submit, no business claims, and no real metrics.

## Source and tokens

- `assets/images/logo/logo.jpg` is the supplied logo and remains unchanged.
- `--color-primary: #166ba2` and `--color-navy: #152836` are sampled from its blue
  and dark areas. JPEG compression produces nearby shades; these are representative samples.
- Dark blue `#10517d`, pale blue `#e8f3fa`, and cyan `#65cbe3` extend the sampled
  palette. Cyan is a supporting tint, not a sampled logo color. Red/yellow details
  remain in the original logo rather than becoming decorative UI colors.
- Light backgrounds use `--color-accent-ink: #146579` for readable accent text.
- Neutral text, muted text, surfaces, backgrounds, decorative borders, and stronger
  control borders have separate variables. Dark contexts use light text tokens.
- Success, warning, and danger tokens are reserved for state messages.

The start of `style.css` groups brand, neutral, semantic, typography, geometry,
spacing, containers, depth, motion, and Bootstrap bridge variables. Component rules
reference these variables. Bootstrap source is unchanged. RGB bridge values match
their corresponding brand/semantic colors and must be updated with them.

## Typography

**Space Grotesk**, weights 500/600, supplies a geometric display voice for major
headings and metrics. **Manrope**, weights 400/500/600/700, provides readable body,
control, navigation, and smaller-heading text. Neither is claimed to be the logo
typeface. Both are replaceable through `--font-display` and `--font-body`.

The common head loads only those weights from Google Fonts with `display=swap`,
preconnects, and system fallbacks. No supplied font files or confirmed logo font
were available. Font access requires a network connection; fallback text remains usable.

Display and H1–H4 scale with `clamp()`. H5, body, labels, small text, and captions
use rem values. Body starts at 16px with 1.7 line height; captions start at 13px.
Major headings use tighter line heights. Long copy uses `.text-measure` (64ch).

## Reusable patterns

| Purpose | Classes / usage |
| --- | --- |
| Section spacing | `.section`, `.section-sm`, `.section-lg` |
| Containers | Bootstrap `.container`; optional `.container-wide`, `.container-narrow` |
| Grids | Bootstrap grid or `.component-grid` plus `--two`, `--three`, `--four` modifiers |
| Section headings | `.section-header`, `.section-eyebrow`, `.section-title`, `.section-description`; `section-header--center` or `section-header--split` |
| Text | `.display-title`, `.type-h1` through `.type-h5`, `.body-large`, `.text-small`, `.text-label`, `.caption`, `.text-brand`, `.text-accent` |
| Backgrounds | `.bg-white`, `.bg-soft`, `.bg-technical`; selective `.bg-brand`, `.technical-grid` |
| Buttons | `.btn` plus `.btn-primary`, `.btn-secondary`, `.btn-outline`; `.link-arrow` for text links |
| Cards | `.card-base`, `.card-body`; `.card-interactive` on a real anchor for a clickable card |
| Media | `.image-frame`, `.image-rounded`, `.image-contain`, `.card-image`, `.aspect-wide`, `.aspect-landscape`, `.aspect-square` |
| Optional image effects | `.image-zoom`, `.image-overlay`, `.image-caption` |
| Form fields | Bootstrap `.form-control`, `.form-select`, `.form-label`, `.form-text`, `.form-check`; `.form-grid`, `.form-field-full` |
| Validation display | `.is-invalid`, `.is-valid`, `.invalid-feedback`, `.valid-feedback`; pair errors with `aria-invalid` and `aria-describedby` |
| Status | `.status-message` plus `.status-success`, `.status-warning`, `.status-danger` |
| Labels/selection | `.tag`, `.tag-neutral`, `.badge`; actual `<button class="chip" aria-pressed="false">` for selectable chips |
| Metrics | `.stat`, `.stat-value`, `.stat-label`; approved figures only |
| Icons | `.icon` on a 24×24 inline line SVG; optional `.icon-box`; decorative icons use `aria-hidden="true"` |
| Depth | `.depth-scene`, `.depth-layer`, `.depth-tilt`, `.floating-layer` |

Use modifiers with their base class, e.g. `component-grid component-grid--three`.
Use real anchors for navigation and real buttons for actions. Avoid nested links in
interactive cards. Never make an essential caption/action hover-only. Form controls
need associated labels; state messages need text, not just a colored border.

Preview-specific `.ds-*` styles live at the end of `style.css` and must not become
public page layouts. `design-system-sample.svg` is a small authored vector specimen,
not project photography or a technical specification. Its standalone palette mirrors
the UI tokens. All actual page imagery is deferred to the relevant implementation step.

## Motion and accessibility

Add `.reveal`, `.reveal-up`, `.reveal-left`, `.reveal-right`, or `.scale-in` only where
appropriate. The small IntersectionObserver adds `.is-revealed` once and unobserves.
Markup starts visible: without JavaScript or observer support, it stays visible.
There is no hidden-until-JS state and no animation delay that blocks content.

The observer uses 550ms entry animations with at most 18px travel or 2% scale.
Reduced-motion settings disable animations/transitions and hover transforms; runtime
preference changes disconnect the observer. Focus inside a revealing element stops
its entry animation. Pointer hover effects apply only to fine pointers with hover.
No continuous animation, timers, global pointer tracking, or animation library is used.

Focus uses a visible offset outline. Buttons, chips, inputs and checkbox labels have
at least a 44px touch target. Images have intrinsic dimensions and aspect-ratio frames.
Success/error specimens use labels and associated text. The preview's chip behavior
only toggles `aria-pressed`; it does not implement future filtering or form handling.

## Responsive foundation

`responsive.css` extends the mobile-first base at Bootstrap's 576, 768, 992, and
1200px breakpoints, with a 1600px container adjustment. Grids start in one column;
forms become two columns at 576px. Buttons fill their action row on small screens,
section headings stack, and fluid typography/spacing have upper and lower limits.
No overflow-hiding rule masks sizing problems.

## Scope boundary

This step supplies reusable visual foundations and the internal specimen only.
The Home page, public header/footer, mega menus, service/industry layouts, and form
functionality remain for later approved steps. `PROJECT_CONTEXT.md` is unchanged.

## Verification performed

- PHP syntax: all 37 PHP files passed; shared JavaScript passed `node --check`.
- HTTP: all 33 page routes and their local assets returned 200; public main areas
  remain empty, have no preview links, and do not inherit preview-only robots tags.
- Chromium screenshots and DOM sizing checks at 320, 375, 390, 414, 768, 992,
  1200, 1440, and 1920px: no horizontal overflow or clipped content after fixes.
- Fonts and all specimen images loaded; no JavaScript or failed-request errors.
- Keyboard focus, chip selection, reveal entry, runtime reduced-motion preference,
  and JavaScript-disabled visibility were checked.
- An axe-core automated WCAG A/AA scan of the preview returned no violations.
  This is a foundation check, not a full accessibility certification of future pages.
- The project context's SHA-256 remains unchanged.

Browser verification tools were installed in a temporary directory, not as website
dependencies. Browser screenshots also remain outside the project source tree.
