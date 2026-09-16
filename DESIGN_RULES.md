# DESIGN_RULES.md

> Compact visual-development rules for the Akshaya Enterprises / Akshaya Floor Solutions website.
> Use this file for most UI/UX implementation tasks.
> Do not reread `PROJECT_CONTEXT.md` unless business/content validation is specifically required.

## 1. Brand Direction
The website must feel premium, modern, technical, industrial, elegant, enterprise-grade, precise, and confident.

Avoid generic Bootstrap, old construction/contractor websites, SaaS dashboards, gaming/futuristic UI, excessive glassmorphism, giant rounded cards, random gradients, clutter, cartoon illustrations, and repetitive card grids.

## 2. Technology
Use HTML5, CSS3, Bootstrap, Vanilla JavaScript, and PHP only for shared includes/forms/config.

Do not add jQuery, GSAP, Three.js, AOS, WOW.js, Animate.css, heavy slider libraries, or unnecessary UI frameworks.

Prefer CSS transforms, CSS perspective, SVG, IntersectionObserver, requestAnimationFrame, and lightweight reusable JS.

## 3. Brand Colors
Primary visual family:
- Deep Navy
- Akshaya Blue
- Cyan / Bright Blue
- White
- Cool Light Neutrals

Secondary micro-accents:
- Yellow
- Red

Recommended balance:
- 70–80% blue/navy/cyan/white
- 15–20% neutral
- 5–10% yellow/red accents

Use red/yellow only for tiny active markers, technical nodes, short borders, or micro brand details.

## 4. Typography
Use two font roles.

Display / heading font:
- geometric/technical
- visually complements the logo
- Hero, major section titles, strategic statements, selected large numbers

Body font:
- highly readable modern sans-serif
- body copy, navigation, forms, buttons, FAQs, technical information

Do not claim the heading font is the exact logo font unless confirmed.

## 5. Typography Scale
Use `clamp()` where practical.

Hero:
- Desktop: 64–90px
- Tablet: 50–64px
- Mobile: 40–52px

Major H2:
- Desktop: 44–60px
- Tablet: 38–48px
- Mobile: 30–40px

Body:
- Desktop: 16–18px
- Lead: 18–20px
- Mobile body: minimum 16px

Card / Feature Titles:
- 20–28px

Micro Labels:
- 12–14px

Avoid tiny secondary text.

## 6. Spacing
Desktop major sections: 100–140px vertical spacing.
Mobile: 64–88px.

Use deliberate variation and keep layouts spacious without creating dead space.

## 7. Visual Rhythm
Do not repeat white section → cards → white section → cards.

Use a controlled mix of:
- white
- soft cool blue
- deep navy
- technical surfaces
- image-led sections
- split editorial layouts
- strong CTA sections

## 8. 3D / Depth
Use 3D only where it explains or enhances the idea.

Use:
- `perspective`
- `transform-style: preserve-3d`
- layered planes
- offset frames
- subtle translateZ
- controlled shadows
- isometric floor surfaces
- exploded layer views

Primary 3D targets:
- Hero
- Problem diagnostic
- Flooring-system explorer
- Operational floor scene
- Technical assessment
- How We Work floor transformation
- selected project visuals

Maximum pointer rotation generally 2–5 degrees.

## 9. Pointer Interaction
Use one reusable pointer-depth system.
Desktop only.

Use requestAnimationFrame and configurable strength.

Disable on touch devices, `pointer: coarse`, `hover: none`, and reduced-motion environments.

Return smoothly to neutral on pointer leave.

## 10. Scroll Motion
Use IntersectionObserver.

Reusable motion types:
- reveal-up
- reveal-left/right
- image-mask reveal
- staggered items
- line draw
- depth enter
- layer assembly

Do not make every section use the same fade-up.

## 11. Motion Timing
- Micro-hover: 180–260ms
- Selection changes: 300–500ms
- Section reveal: 650–900ms
- 3D reset: 450–650ms
- Technical transformation: 700–1400ms maximum

Preferred easing:
`cubic-bezier(0.22, 1, 0.36, 1)`

## 12. Images
Real Akshaya images should replace placeholders later.

Dummy images are allowed during development, but must behave like real images:
- correct aspect ratio
- `object-fit: cover`
- overlay
- depth
- reveal
- responsive sizing

Use comments like:
`<!-- Replace with approved Akshaya image -->`

Do not leave empty colored boxes.

## 13. Cards
Do not turn every section into rounded cards.

Prefer:
- editorial panels
- image-led compositions
- technical rows
- isometric visuals
- interactive selectors
- split layouts

Avoid giant radii, generic white cards, repeated shadows, and SaaS-style tiles.

## 14. Buttons
Primary CTA:
- Akshaya blue / subtle blue gradient
- white text
- moderate radius
- arrow micro-motion
- strong but not oversized

Secondary CTA:
- outline or text + arrow
- lower visual weight

Avoid glowing buttons and pill buttons everywhere.

## 15. Header
Final direction:
- compact mini header
- compact white main header
- thin cyan separator
- sticky main nav
- mini header disappears on scroll

Desktop main header: 72–76px
Sticky: 66–70px
Logo: 100–110px
Navigation: 15–16px
CTA: 44–46px
Mini header: 30–32px

No floating pill header or giant glass shell.

## 16. Mobile
Mobile must be intentionally designed.

Requirements:
- no horizontal overflow
- body text minimum 16px
- strong headings
- comfortable touch targets
- pointer tilt disabled
- simplified 3D
- vertical timelines
- horizontal scroll selectors where appropriate
- full-width / stacked imagery

Test 320, 375, 390, 414, 768, 1024, 1440, and 1920px.

## 17. Accessibility
Always preserve:
- semantic HTML
- keyboard navigation
- visible focus
- adequate contrast
- real `<button>` elements for interactions
- ARIA where dynamic panels require it
- useful alt text
- no hover-only essential content
- touch-friendly controls

Respect `prefers-reduced-motion`.

## 18. Reduced Motion
Disable/simplify:
- pointer tilt
- continuous floating
- parallax
- line drawing
- long staged reveals
- moving floor machinery

Show final static states immediately.

## 19. Performance
Prefer animating transform, opacity, and clip-path.

Avoid continuously animating width, height, top, left, or large shadow changes.

Lazy-load below-the-fold images.
Do not initialize mouse interactions on touch devices.

## 20. CSS Rules
Do not stack endless overrides.

Before redesigning a section:
- inspect current styles
- remove obsolete CSS
- keep one active implementation

Organize styles by section.

## 21. JavaScript Rules
Use organized initialization functions such as:
- `initScrollReveal()`
- `initPointerDepth()`
- `initProblemFinder()`
- `initSystemExplorer()`
- `initIndustryExplorer()`
- `initOperationalFloor()`
- `initTechnicalAssessment()`
- `initHowWeWork3D()`
- `initProjectInteractions()`
- `initTestimonials()`

Each feature initializes once.
Remove obsolete event listeners from earlier designs.

## 22. Content Accuracy
Do not invent:
- certifications
- customer names
- project facts
- warranty terms
- technical values
- thickness values
- performance figures
- compliance claims
- experience metrics

Use safe wording where needed:
> Final system selection and specification depend on site conditions and technical assessment.

## 23. Acceptance Standard
Every major section should answer:
- Why does this section exist?
- Does the interaction explain the idea?
- Does it feel modern?
- Does it feel industrial?
- Does it feel like Akshaya?
- Is the interaction purposeful?
- Does mobile remain usable?

Do not accept a section merely because it has animation.
