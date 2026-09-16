# Akshaya Enterprises Website — PROJECT_CONTEXT.md

> **Purpose of this file**  
> This file is the single source of project context for Codex while developing the Akshaya Enterprises / Akshaya Floor Solutions website.  
> Codex should read this file before making any major design, layout, content, component, PHP, CSS, JavaScript, or responsive changes.

---

# 1. Project Overview

## Company
**Akshaya Enterprises / Akshaya Floor Solutions**

## Business
Commercial and industrial flooring, surface protection, and related flooring systems.

## Website Type
Premium B2B industrial website focused on:

- technical credibility,
- flooring problem recognition,
- solution discovery,
- industry relevance,
- execution proof,
- project credibility,
- qualified site-visit enquiries.

This is **not** a simple brochure website and should **not** look like an old-style construction/contractor website.

## Core Positioning
Akshaya should be positioned as a **technical flooring partner**, not merely as a flooring applicator or coating contractor.

Recommended strategic positioning:

> **From Floor Problem to Engineered Solution**

## Primary Website Goal
Help visitors answer:

1. Can Akshaya solve my flooring problem?
2. Have they worked in an environment similar to mine?
3. Can I trust their technical and execution capability?
4. How do I arrange a technical site visit?

## Primary Conversion
**Schedule Site Visit**

## Secondary Conversion Actions
- Talk to a Flooring Expert
- WhatsApp
- Call
- Explore Flooring Solutions
- View Relevant Project / Case Study

---

# 2. Development Technology

Use a lightweight custom implementation.

## Core Stack
- HTML5
- CSS3
- Bootstrap
- Vanilla JavaScript
- PHP only where useful

## PHP Use
PHP can be used for:

- common header,
- common footer,
- reusable shared page sections,
- simple configuration,
- Contact form email sending,
- Schedule Site Visit form email sending.

Do **not** introduce a heavy CMS, framework, database, or SPA architecture unless explicitly requested later.

---

# 3. Development Philosophy

The website will be developed with Codex using **multiple controlled prompts**, not one large prompt for the entire site.

Development pattern:

> **Build → Review → Approve → Reuse**

Important reusable parts:

- one global design system,
- one common header,
- one common footer,
- one service-detail page layout,
- one industry-detail page layout,
- one project-detail page layout,
- consistent cards, CTA blocks, forms, headings, buttons, animation behavior, and responsive rules.

Do not allow each page to invent its own design language.

---

# 4. Brand & Logo Direction

The official Akshaya logo has already been supplied for the project.

## Brand Rules

- Use the **logo as the main visual branding reference**.
- Website colors should be derived from the logo.
- The logo uses a blue / cyan / cool industrial visual family.
- Supporting neutrals can include white, off-white, light grey, charcoal, and dark navy where needed.
- Do not introduce unrelated dominant brand colors.

## Typography

The website should use:

- a distinctive display / heading style inspired by the logo typography,
- a modern, highly readable web font for body content, navigation, forms, and long text.

The exact logo font is **not confirmed**.  
Do not falsely claim an exact typeface match.

The logo-style/display treatment can be used selectively for:

- major section headings,
- highlighted words,
- key brand statements,
- hero messaging.

Do not overuse decorative typography.

## Visual Personality

The site should feel:

- modern,
- premium,
- technical,
- industrial,
- elegant,
- spacious,
- trustworthy,
- enterprise-grade,
- human-designed,
- visually strong without becoming flashy.

Avoid:

- outdated industrial templates,
- excessive gradients,
- cluttered cards,
- too many borders,
- overuse of glassmorphism,
- cartoon-style illustrations,
- random bright colors,
- excessive animation,
- cramped spacing,
- generic AI-looking artwork.

---

# 5. Design & Motion Direction

The website should include modern interaction and selective 3D depth.

## Desired Interactive Elements
Use where appropriate:

- subtle 3D depth,
- layered hero compositions,
- interactive cards,
- hover depth / tilt,
- scroll reveals,
- number counters,
- image zoom,
- parallax-like movement,
- before/after image comparison,
- timeline interactions,
- accordion / tabs,
- smooth transitions,
- animated statistics,
- micro-interactions,
- responsive mega menus.

## Animation Rules

Animations must:

- support the content,
- remain professional,
- not distract from technical messaging,
- not slow the website,
- work on desktop and mobile,
- degrade gracefully on low-power devices,
- respect `prefers-reduced-motion`,
- never make important information hover-only.

Avoid:

- constant motion,
- excessive floating elements,
- heavy WebGL unless later explicitly approved,
- long intro loaders,
- animation that blocks interaction,
- excessive 3D effects on every section.

---

# 6. Responsive Design Requirements

The website must be fully responsive.

## Required Targets
Test at minimum:

- 320px mobile,
- 375px mobile,
- 390px mobile,
- 414px mobile,
- tablet portrait,
- tablet landscape,
- laptop,
- desktop,
- large desktop.

## Responsive Rules

- No horizontal page scrolling.
- Typography must scale gracefully.
- Buttons must remain touch-friendly.
- Mobile should not simply be a shrunk desktop design.
- Navigation must be purpose-built for mobile.
- Mega menus should transform appropriately.
- Cards should remain readable without hover.
- Process timelines should become vertical or otherwise mobile-friendly.
- Forms should use single-column layouts on small screens.
- Images should not crop important visual information.
- Section spacing must remain balanced on mobile.

---

# 7. User Personas

Use these six primary role-based personas across the website.

## Persona 1 — Plant / Factory Owner / Senior Management
Cares about:

- business reliability,
- long-term value,
- total cost,
- durability,
- downtime,
- company credibility,
- execution capability,
- warranty,
- post-project support.

## Persona 2 — Facility / Maintenance Manager
Cares about:

- cracks,
- dust,
- peeling,
- worn floor,
- water leakage,
- damaged surfaces,
- slippery flooring,
- maintenance effort,
- practical repair and replacement options.

## Persona 3 — Production / Operations Manager
Cares about:

- shutdown duration,
- installation duration,
- curing time,
- production disruption,
- traffic movement,
- operational continuity,
- execution planning,
- safety during work,
- fast return to operation.

## Persona 4 — Quality / EHS / Compliance Manager
Cares about:

- hygiene,
- safety,
- GMP,
- ESD,
- clean-room suitability,
- chemical resistance,
- quality checks,
- compliance,
- testing,
- documentation.

## Persona 5 — Purchase / Procurement Manager
Cares about:

- vendor credibility,
- scope clarity,
- quotation,
- warranty,
- past customers,
- relevant projects,
- technical documentation,
- delivery timeline,
- dependability,
- value.

## Persona 6 — Consultant / Architect / Project Engineer / Civil Engineer
Cares about:

- flooring system,
- thickness,
- substrate preparation,
- material system,
- application process,
- performance,
- limitations,
- technical suitability,
- project-specific recommendations.

## Persona Strategy
These are **role-based personas** and should cover Akshaya's industries broadly.

Do **not** create separate personas for every industry unless specifically needed later.

The industry changes the requirement; the role in the buying journey often remains similar.

---

# 8. Services

Current working service list:

1. Epoxy Flooring
2. PU Flooring
3. ESD / Antistatic Flooring
4. Dielectric Flooring
5. PVC Flooring
6. Clean Room Wall Coating
7. Waterproofing
8. VDF Flooring

VDF Flooring was added later in the client clarification document and should be included in the website service structure.

---

# 9. Industries

Current working industry list:

1. Manufacturing
2. Pharma
3. Food & Beverage
4. Electronics
5. Automobile
6. Warehouses & Logistics
7. Hospitals & Healthcare
8. Data Centres
9. Laboratories
10. Airports
11. Seaports
12. Commercial Spaces
13. Textiles
14. Educational Institutions
15. Defence Sector

## Important Content Rule
The client document listed these industries, but it did **not** clearly confirm one-by-one that Akshaya has completed projects in every single sector.

Therefore:

- do not invent project claims,
- do not claim completed work in a specific industry unless supported by approved client material,
- wording can use "solutions for", "serving", or "flooring requirements across" only when approved,
- project proof should be connected only to verified projects.

---

# 10. Website Navigation

## Main Header Menu

1. Home
2. About Us
3. Flooring Solutions
4. Industries
5. Projects
6. Gallery
7. Blog / Knowledge Centre
8. Contact Us

Primary header CTA:

**Schedule Site Visit**

Optional quick actions:

- Call
- WhatsApp

---

# 11. Flooring Solutions Mega Menu

Use one visual mega menu containing:

- Epoxy Flooring
- PU Flooring
- ESD / Antistatic Flooring
- Dielectric Flooring
- PVC Flooring
- Clean Room Wall Coating
- Waterproofing
- VDF Flooring

The menu should be clean and visual, not a crowded list.

---

# 12. Industries Mega Menu

Use a grouped mega menu.

## Manufacturing & Industrial
- Manufacturing
- Automobile
- Textiles

## Controlled & Critical Environments
- Pharma
- Food & Beverage
- Electronics
- Hospitals & Healthcare
- Laboratories
- Data Centres

## Infrastructure & Logistics
- Warehouses & Logistics
- Airports
- Seaports
- Defence Sector

## Commercial & Institutional
- Commercial Spaces
- Educational Institutions

Avoid a single long vertical list when a grouped mega menu is more usable.

---

# 13. Home Page Strategy

The Home Page should support the complete B2B buying committee.

## Main Flow

> **Hero → Trust → Problem → Solutions → Industries → Why Akshaya → Technical Confidence → Process → Projects → Customers → Testimonials → Post-Care → Site Visit**

## Section 1 — Hero

### Purpose
Immediately establish:

- what Akshaya does,
- technical credibility,
- the primary customer outcome,
- the main conversion action.

### Suggested Positioning
**From Floor Problem to Engineered Solution**

### Content
Include:

- strong industrial project image or controlled video,
- concise supporting message,
- Schedule Site Visit CTA,
- Explore Solutions CTA,
- carefully verified trust metrics.

### Persona Coverage
All personas.

---

## Section 2 — Trust / Proof Strip

### Content
Use only verified values such as:

- years of experience,
- completed projects,
- installed area,
- trained team,
- quality / warranty support.

### Purpose
Build trust immediately before asking users to explore deeper.

### Main Personas
Owners, Procurement, Consultants.

---

## Section 3 — What Problem Are You Facing?

### Possible Problems
- floor cracking,
- floor dusting,
- peeling,
- chemical damage,
- static control,
- hygiene / GMP requirement,
- water penetration,
- clean-room wall requirement,
- electrical insulation,
- oil damage,
- slippery floor,
- forklift / heavy traffic damage,
- uneven floors.

Only include items approved as relevant.

### Purpose
Many customers know their problem but do not know which flooring system they need.

### Behavior
Selecting a problem can:

- highlight the problem,
- show a short preliminary guidance message,
- link to relevant solutions,
- encourage a site visit.

Do not present the result as a final technical recommendation.

---

## Section 4 — Flooring Solutions

Display the eight service categories.

### Purpose
Serve visitors who already know the flooring system they are looking for.

### UX
Use:

- real project images,
- concise benefit statements,
- interactive cards,
- clean hover/tap states.

---

## Section 5 — Industries We Serve

Display the main sectors in a premium visual grid or interactive layout.

### Purpose
Answer:

> "Do they understand an environment like mine?"

### UX
Each industry links to its dedicated industry-detail page.

---

## Section 6 — Why Akshaya / Business Outcomes

Use approved customer-value themes such as:

- hygiene,
- safety,
- compliance,
- durability,
- low maintenance,
- professional execution,
- trained manpower,
- quality assurance,
- production planning / minimum disruption.

### Purpose
Translate technical flooring work into business outcomes.

---

## Section 7 — Technical Assessment & Quality Confidence

This is an important addition for technical personas.

Suggested heading:

> **We Don't Recommend a System Without Understanding the Floor**

Possible steps:

1. Surface Condition
2. Moisture / Site Assessment
3. Operating Environment
4. Correct System Selection
5. Controlled Application
6. Final Inspection

### Purpose
Show that Akshaya evaluates the facility before recommending a solution.

### Main Personas
Quality / EHS, Consultants, Engineers, Procurement, Facility Managers.

---

## Section 8 — How We Work

Working process:

1. Site Survey
2. Surface Testing
3. Moisture Testing
4. Recommendation
5. Mock-up — optional
6. Installation
7. Inspection
8. Warranty & Maintenance Tips

### Purpose
Demonstrate a disciplined technical process.

---

## Section 9 — Featured Projects / Case Studies

Projects should show more than images.

Recommended project storytelling:

> **Challenge → Assessment → Solution → Execution → Result**

Include where approved:

- industry,
- location,
- flooring/service,
- area,
- duration,
- challenge,
- result,
- before / during / after imagery.

### Purpose
Proof is one of the strongest conversion factors for B2B buyers.

---

## Section 10 — Customers / Brands Served

Use only approved customer logos.

### Purpose
Third-party credibility.

Optional:
Link a logo to a case study only when approval exists.

---

## Section 11 — Customer Feedback

Use:

- video testimonial where available,
- written testimonials,
- company / designation only when approved.

### Purpose
Provide human proof before final conversion.

---

## Section 12 — Post-Flooring Care & Warranty

Show:

- maintenance guidance,
- inspection support,
- warranty approach,
- service support.

### Purpose
Differentiate Akshaya beyond installation.

---

## Section 13 — Final Technical Site Visit CTA

Suggested message:

> **Let us assess your floor before recommending the system.**

Actions:

- Schedule Site Visit
- Call an Expert
- WhatsApp

---

# 14. Service Detail Page — Reusable Template

All service pages must use one reusable design structure.

Use one page first, preferably **Epoxy Flooring**, as the reference implementation.

## Recommended Sections

### 1. Service Hero
Include:

- service name,
- real project image / visual,
- concise benefit statement,
- Schedule Site Visit,
- Talk to Expert.

### 2. What Is This Flooring System?
Simple, clear explanation for non-technical visitors.

### 3. What Problems Does It Solve?
Examples vary by service:

- dust,
- cracks,
- chemical exposure,
- static,
- hygiene,
- abrasion,
- water penetration,
- electrical insulation,
- etc.

### 4. Key Benefits
Use 4–6 concise benefit cards.

### 5. Types / Systems Available
Use:

- tabs,
- cards,
- accordion,

depending on the amount of content.

### 6. Where Is It Suitable?
Display relevant industries and applications.

### 7. Technical Options
Possible fields:

- thickness,
- finish,
- texture,
- color,
- anti-slip option,
- system type.

Use only client-approved data.

### 8. Our Assessment Approach
Explain that recommendation depends on:

- substrate,
- moisture,
- traffic,
- chemicals,
- hygiene requirements,
- shutdown time,
- operating environment.

### 9. Installation Process
Show a clean visual sequence.

### 10. Performance / Lifespan Guidance
Keep wording project-dependent.

### 11. Maintenance & Care
Useful for Facility / Maintenance personas.

### 12. Related Projects
Show verified projects using that service.

### 13. FAQ
Service-specific questions.

### 14. Final CTA
Example:

> **Not sure if this system is right for your floor?**

Action:
**Schedule a Site Visit**

## Important Technical Disclaimer
Do not state that a flooring system is definitely suitable merely because the user selected it.

Final:

- system,
- thickness,
- suitability,
- lifespan,
- compliance,

may depend on site assessment and project conditions.

---

# 15. Industry Detail Page — Reusable Template

All industry pages must use one reusable structure.

Use **Pharma** or **Manufacturing** as the first reference implementation.

## Recommended Sections

### 1. Industry Hero
Include:

- relevant facility visual,
- industry name,
- industry-specific message,
- Site Visit CTA.

### 2. Flooring Challenges in This Industry
Show realistic operating challenges.

### 3. What Your Facility Needs
Examples:

- hygiene,
- durability,
- ESD,
- chemical resistance,
- slip resistance,
- cleanability,
- heavy-load capability,
- temperature resistance.

Only include what applies to that industry.

### 4. Areas Within the Facility
This is a key section.

Examples:

#### Pharma
- Production Areas
- Clean Rooms
- Laboratories
- Packaging Areas
- Warehouses
- Utility Areas

#### Automobile
- Assembly
- Machine Shops
- Paint Areas
- Warehouses
- Service Bays
- Parking

#### Food
- Processing
- Production
- Cold Areas
- Kitchens
- Packaging
- Warehouses

Use correct industry-specific areas only.

### 5. Recommended Flooring Solutions
Map relevant Akshaya services to facility requirements.

Keep recommendations preliminary where site assessment is necessary.

### 6. How We Select the Right System
Consider:

- traffic,
- chemicals,
- temperature,
- substrate,
- hygiene,
- static,
- moisture,
- shutdown time.

### 7. Compliance / Quality Considerations
Where relevant:

- GMP,
- ESD,
- hygiene,
- safety,
- testing,
- documentation,
- cleanability.

Do not invent certifications.

### 8. Installation & Execution Approach
Explain:

- survey,
- testing,
- recommendation,
- planning,
- installation,
- inspection.

### 9. Relevant Projects
Show verified projects from the same or related industry.

### 10. Why Akshaya for This Industry?
Tie Akshaya strengths to the sector.

### 11. FAQ
Industry-specific questions.

### 12. Final CTA
Example:

> **Let us assess your facility requirements.**

---

# 16. Service Page vs Industry Page

These two page types must not feel duplicated.

## Service Page Answers
> What is this flooring system, what does it solve, and where can it be used?

## Industry Page Answers
> What flooring challenges exist in my industry, what performance do I need, and which Akshaya solutions may be relevant?

---

# 17. About Us Page

Recommended areas:

- Company introduction
- History / experience
- What Akshaya does
- Technical capability
- Working approach
- Experience and achievements
- Quality and safety
- Trained workforce
- Technical support
- Customer focus
- Post-flooring care
- Approved brand / product associations where appropriate

Do not copy old company-profile claims blindly.

---

# 18. Projects

## Project Listing Page
Should support filters such as:

- industry,
- solution,
- location where useful.

Use strong real project photography.

## Project Detail Template

Recommended flow:

1. Project Hero
2. Customer / Industry / Location
3. Challenge
4. Assessment
5. Recommended System
6. Execution
7. Area / Duration
8. Outcome
9. Before / During / After Media
10. Customer Feedback
11. Related Projects
12. Site Visit CTA

Do not invent numerical outcomes.

---

# 19. Gallery

Possible categories:

- Completed Floors
- Work in Progress
- Working Videos
- Before / After
- Customer Feedback Videos

Features:

- filters,
- image lightbox,
- video modal,
- captions,
- related-project linking.

---

# 20. Blog / Knowledge Centre

Use a professional editorial layout.

Possible topics include:

- flooring selection,
- maintenance,
- moisture testing,
- ESD,
- PU vs Epoxy,
- floor failure causes,
- hygiene / cleanability,
- project lessons.

Support:

- listing page,
- detail page,
- categories,
- related articles,
- SEO metadata.

---

# 21. Contact Page

Include:

- company name,
- contact person where approved,
- phone,
- WhatsApp,
- email,
- address when confirmed,
- working hours if approved,
- service area,
- map when confirmed,
- enquiry form.

---

# 22. Schedule Site Visit Page

This is a high-priority conversion page.

## Suggested Fields

- Company Name
- Contact Person
- Mobile
- Email
- Location
- Industry
- Preferred Date
- Preferred Time
- Approximate Area
- Flooring Problem / Requirement
- Available Shutdown Time
- Additional Comments
- Photo / Video upload if implemented later

## Principle
Do not ask the customer to choose exact flooring technical specifications.

The form should capture the operational problem and site context.

---

# 23. Form Handling

Use simple PHP mail functionality.

## Requirements
- server-side validation,
- input sanitization,
- required-field checking,
- valid email checking,
- phone validation,
- honeypot or basic anti-spam protection,
- safe error handling,
- clear success state,
- clear failure state,
- no exposure of server errors to end users.

If file upload is later enabled:

- validate file type,
- validate file size,
- store safely,
- never execute uploaded files.

---

# 24. CRM Direction — Future / Optional

The website plan supports a future CRM pipeline:

> **New Enquiry → Qualified → Site Visit Scheduled → Survey Completed → Quotation Submitted → Won / Lost → Project Execution → Warranty / Maintenance**

The current lightweight PHP implementation does not need to implement the entire CRM unless requested.

---

# 25. Solution Finder — Future Phase

The Solution Finder should initially be **rule-based**, not an unrestricted AI recommendation engine.

## Inputs
- Industry
- Floor Problem
- Approximate Area
- Exposure / Operating Conditions
- Photos
- Contact / Site Visit Details

## Output
- preliminary suitable solution categories,
- short reasoning,
- related service pages,
- related projects,
- site-visit CTA.

## Important Rule
Final flooring recommendation depends on site inspection, substrate condition, and testing where required.

---

# 26. Client-Provided / Clarified Facts

Use carefully.

## Branding
- No fixed brand colors were confirmed.
- Client said they follow the **RAL chart**.
- No confirmed tagline.
- Website branding should therefore derive from the supplied logo and approved industrial visual direction.

## Services
Client confirmed the listed services and added:

- VDF Flooring

## Warranty
Client stated:

- warranty is provided,
- approximately **12 to 60 months**,
- depends on the flooring system / project.

Avoid presenting a universal fixed warranty.

## Why Customers Choose Akshaya
Client confirmed these themes:

- Hygiene
- Safety
- Compliance
- Durability
- Low Maintenance
- Professional Execution
- Trained Manpower
- Quality Assurance
- Production planning / minimum disruption

## Public Contact Information Provided
- Contact Name: **S. Chandrakanth Reddy**
- Phone: **9866076372**
- WhatsApp: **9866076372**

Email / address / map should be confirmed before final publication if not provided in final content pack.

---

# 27. Experience / Achievement Figures — Needs Final Confirmation

There is a conflict between planning materials.

One document referenced:

- 15+ years

Another client clarification document referenced:

- 25+ years experience
- 300+ projects
- 1.8M+ sq. ft.
- 98% customer satisfaction

Do **not** silently resolve this conflict.

Before production content is finalized:

- confirm years of experience,
- confirm project count,
- confirm installed area,
- confirm customer satisfaction figure.

Until confirmed, use placeholders or neutral copy rather than publishing possibly incorrect numbers.

---

# 28. Historical Company Profile Context

An older Akshaya profile states:

- association with **CIPY & Floor Care**,
- activity dating back to **1996**,
- service to government, commercial, industrial and institutional customers,
- emphasis on factory-trained applicators,
- technical assistance,
- quality assurance,
- customer service.

It also contains technical claims around seamless epoxy / PU flooring, including:

- durability,
- hygiene,
- chemical resistance,
- easy maintenance,
- quick installation / curing,
- seamless / non-porous finish,
- slip resistance,
- resistance to oil / abrasion / impact,
- application over certain existing substrates,
- reduced operational disruption.

## Important Rule
Treat the old profile as **background source material**, not automatically as approved current website claims.

Any technical statement involving:

- VOC,
- fire resistance,
- antimicrobial properties,
- contamination claims,
- installation speed,
- lifespan,
- unlimited life,
- exact physical performance,
- substrate compatibility,
- no-primer requirement,
- safety claims,

must be reviewed and approved before publication.

---

# 29. Content Safety / Accuracy Rules

This is a technical B2B website.

Do not invent:

- certifications,
- warranties,
- compliance claims,
- customer logos,
- project names,
- project figures,
- installation times,
- thickness values,
- chemical resistance values,
- testing results,
- product brands,
- lifespan,
- safety certifications.

Where the correct answer depends on the site:

Use language such as:

> "Final system selection and specification depend on substrate condition, operational exposure, and site assessment."

---

# 30. SEO Requirements

Implement basic technical SEO from the beginning.

## Required
- unique page titles,
- meta descriptions,
- semantic HTML,
- clean heading hierarchy,
- descriptive URLs,
- image alt text,
- canonical URLs where required,
- Open Graph tags,
- sitemap.xml,
- robots.txt,
- internal linking,
- service pages,
- industry pages,
- project pages,
- FAQ structured data where appropriate,
- article structured data where appropriate.

Do not keyword-stuff.

---

# 31. Accessibility Requirements

At minimum:

- semantic HTML,
- keyboard-accessible navigation,
- visible focus states,
- correct labels,
- alt text,
- sufficient contrast,
- readable font sizes,
- touch-friendly controls,
- reduced-motion support,
- forms with clear errors,
- no essential hover-only content.

---

# 32. Performance Requirements

The site should feel premium **and** remain fast.

Use:

- optimized images,
- modern image formats where possible,
- lazy loading,
- responsive images,
- compressed CSS / JS for production,
- minimal JavaScript,
- restrained animation,
- deferred non-critical scripts,
- no unnecessarily heavy libraries.

Avoid loading large animation libraries only for simple effects that CSS / vanilla JS can handle.

---

# 33. Suggested Project Structure

A simple structure can be:

```text
/
├── index.php
├── about.php
├── projects.php
├── gallery.php
├── contact.php
├── schedule-visit.php
├── services/
│   ├── epoxy-flooring.php
│   ├── pu-flooring.php
│   ├── esd-flooring.php
│   ├── dielectric-flooring.php
│   ├── pvc-flooring.php
│   ├── clean-room-wall-coating.php
│   ├── waterproofing.php
│   └── vdf-flooring.php
├── industries/
│   ├── manufacturing.php
│   ├── pharma.php
│   ├── food-beverage.php
│   ├── electronics.php
│   ├── automobile.php
│   ├── warehouses-logistics.php
│   ├── hospitals-healthcare.php
│   ├── data-centres.php
│   ├── laboratories.php
│   ├── airports.php
│   ├── seaports.php
│   ├── commercial-spaces.php
│   ├── textiles.php
│   ├── educational-institutions.php
│   └── defence.php
├── blog/
│   ├── index.php
│   └── detail-template.php
├── project/
│   └── detail-template.php
├── includes/
│   ├── header.php
│   ├── footer.php
│   ├── config.php
│   └── reusable-components.php
├── assets/
│   ├── css/
│   │   ├── style.css
│   │   └── responsive.css
│   ├── js/
│   │   └── main.js
│   ├── images/
│   └── icons/
└── PROJECT_CONTEXT.md
```

This is a recommendation, not a rigid requirement. Keep the structure simple and maintainable.

---

# 34. Coding Rules for Codex

Codex must:

1. Read this file before major implementation changes.
2. Reuse existing components before creating new ones.
3. Keep CSS centralized.
4. Avoid duplicated styles.
5. Use semantic class names.
6. Keep Bootstrap overrides intentional.
7. Avoid excessive inline CSS.
8. Avoid excessive inline JavaScript.
9. Use reusable PHP includes.
10. Preserve responsive behavior when changing desktop design.
11. Preserve accessibility.
12. Do not add heavy dependencies without need.
13. Do not invent business content.
14. Do not change approved page structure casually.
15. Do not redesign header/footer differently on individual pages.
16. Keep service pages consistent.
17. Keep industry pages consistent.
18. Maintain brand color consistency.
19. Keep animations subtle and purposeful.
20. Test mobile after every major component.

---

# 35. Implementation Order

Develop in this order:

1. Project context
2. Base folder structure
3. Common PHP includes
4. Global design system
5. Header / navigation
6. Footer
7. Home Page
8. Home Page review / correction
9. One Service Detail template — Epoxy
10. Service template review
11. Reuse for remaining services
12. One Industry Detail template — Pharma or Manufacturing
13. Industry template review
14. Reuse for remaining industries
15. About Us
16. Projects listing
17. Project detail template
18. Gallery
19. Blog listing / detail
20. Contact
21. Schedule Site Visit
22. PHP form handling
23. Animation / interaction refinement
24. Responsive audit
25. Performance optimization
26. Accessibility review
27. SEO setup
28. Content verification
29. Final QA
30. Deployment

---

# 36. Final Design Principle

Every important page should combine:

> **Technical Explanation + Relevant Proof + Clear Enquiry Action**

The website should make each visitor feel:

> **"Akshaya understands my problem, understands my environment, has the technical capability to assess it, and has enough proof for me to contact them."**

---

# 37. Current Project Baseline

Use the following as the project baseline until explicitly changed:

**Technology**  
HTML + CSS + Bootstrap + Vanilla JavaScript + minimal PHP

**Design**  
Premium + modern + technical + industrial + interactive + selective 3D depth

**Branding**  
Logo-derived colors + logo-inspired display headings + highly readable body typography

**Responsive**  
Fully responsive, mobile-first corrections, no horizontal overflow

**Primary CTA**  
Schedule Site Visit

**Core UX Journey**  
Problem → Solution → Industry Relevance → Technical Confidence → Proof → Process → Site Visit

**Reusable Templates**  
One layout for all services  
One layout for all industries  
One layout for all project details

**Content Rule**  
Never invent technical or business claims.

