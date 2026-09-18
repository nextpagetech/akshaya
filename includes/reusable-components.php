<?php
// Shared output/path helpers; approved visual components will be added later.
require_once __DIR__ . '/config.php';

// Escape plain text or a helper-generated URL when inserting it into HTML.
function site_escape($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

// Accept a site-relative path, e.g. site_url('schedule-visit.php').
// Filesystem includes continue to use __DIR__; URLs never depend on the PHP cwd.
function site_url($path = '')
{
    global $siteConfig, $assetPrefix;

    $base = $siteConfig['base_url'] !== ''
        ? $siteConfig['base_url']
        : ($assetPrefix ?? '.');

    return rtrim($base, '/') . '/' . ltrim($path, '/');
}

// Accept an asset-relative path, e.g. asset_url('images/logo/approved-logo.svg').
function asset_url($path = '')
{
    global $siteConfig;

    return site_url(trim($siteConfig['asset_path'], '/') . '/' . ltrim($path, '/'));
}

// One navigation definition feeds desktop, mobile, and the no-JavaScript fallback.
function site_navigation()
{
    return [
        'home' => ['label' => 'Home', 'path' => 'index.php'],
        'about' => ['label' => 'About Us', 'path' => 'about.php'],
        'services' => ['label' => 'Flooring Solutions', 'groups' => [
            'Flooring Solutions' => [
                'epoxy-flooring' => 'Epoxy Flooring',
                'pu-flooring' => 'PU Flooring',
                'esd-flooring' => 'ESD / Antistatic Flooring',
                'dielectric-flooring' => 'Dielectric Flooring',
                'pvc-flooring' => 'PVC Flooring',
                'clean-room-wall-coating' => 'Clean Room Wall Coating',
                'waterproofing' => 'Waterproofing',
                'vdf-flooring' => 'VDF Flooring',
            ],
        ]],
        'industries' => ['label' => 'Industries', 'groups' => [
            'Manufacturing & Industrial' => [
                'manufacturing' => 'Manufacturing', 'automobile' => 'Automobile', 'textiles' => 'Textiles',
            ],
            'Controlled & Critical Environments' => [
                'pharma' => 'Pharma', 'food-beverage' => 'Food & Beverage', 'electronics' => 'Electronics',
                'hospitals-healthcare' => 'Hospitals & Healthcare', 'laboratories' => 'Laboratories', 'data-centres' => 'Data Centres',
            ],
            'Infrastructure & Logistics' => [
                'warehouses-logistics' => 'Warehouses & Logistics', 'airports' => 'Airports',
                'seaports' => 'Seaports', 'defence' => 'Defence Sector',
            ],
            'Commercial & Institutional' => [
                'commercial-spaces' => 'Commercial Spaces', 'educational-institutions' => 'Educational Institutions',
            ],
        ]],
        'projects' => ['label' => 'Projects', 'path' => 'projects.php'],
        'gallery' => ['label' => 'Gallery', 'path' => 'gallery.php'],
        'blog' => ['label' => 'Blog', 'path' => 'blog/index.php'],
        'contact' => ['label' => 'Contact Us', 'path' => 'contact.php'],
    ];
}

// Derive the page from the executing file, independent of URL deployment subfolders.
function site_current_page()
{
    $root = str_replace('\\', '/', dirname(__DIR__)) . '/';
    // Canonicalize Windows separators/double separators and relative CLI paths.
    $scriptFile = realpath($_SERVER['SCRIPT_FILENAME'] ?? '') ?: '';
    $script = str_replace('\\', '/', $scriptFile);
    return strpos($script, $root) === 0 ? substr($script, strlen($root)) : basename($script);
}

function site_current_section($page)
{
    $directory = dirname($page);
    if (in_array($directory, ['services', 'industries', 'blog'], true)) {
        return $directory;
    }
    if ($directory === 'project') {
        return 'projects';
    }
    return $page === 'index.php' ? 'home' : basename($page, '.php');
}

// Shared media slot: supply an approved asset-relative path and useful alt text
// together. Until then display an honest placeholder, never a fabricated photo.
function site_media($label, $path = '', $alt = '', $priority = false)
{
    if ($path !== '' && $alt !== '') {
        return '<div class="home-media image-frame image-zoom"><img src="' . site_escape(asset_url($path))
            . '" alt="' . site_escape($alt) . '" width="1200" height="900" '
            . ($priority ? 'fetchpriority="high"' : 'loading="lazy"') . ' decoding="async"></div>';
    }
    return '<!-- Replace with approved Akshaya ' . site_escape($label) . ' -->'
        . '<div class="home-media home-media-placeholder"><span class="media-registration" aria-hidden="true"></span>'
        . '<span class="media-placeholder-copy"><span class="media-placeholder-label">Development placeholder</span>'
        . '<span>' . site_escape($label) . '</span><span class="caption">Approved image to be added</span></span></div>';
}

// Shared project case-study data reused by the Projects listing and the
// single reusable Project Detail template (?id=<slug>). Wording stays
// generic and assessment-led per PROJECT_CONTEXT content-accuracy rules:
// no invented client names, figures, or confirmed suitability claims.
function project_case_studies()
{
    return [
        'surface-preparation-resin-floor' => [
            'title' => 'Surface Preparation & Resin-Floor Execution',
            'category' => 'epoxy-flooring',
            'categoryLabel' => 'Epoxy Flooring',
            'industry' => 'Manufacturing',
            'location' => 'Shared at technical assessment',
            'area' => 'Confirmed after site survey',
            'duration' => 'Planned around shutdown window',
            'image' => 'website_assets/Selected Pics from _23/006.JPG',
            'beforeImage' => 'website_assets/Amritha Tools/IMG20190620110511.jpg',
            'afterImage' => 'website_assets/Epoxy Coating Pics/IMG20190903120103.jpg',
            'challenge' => 'The existing floor showed visible wear, isolated cracking and an inconsistent surface that made cleaning and material movement more difficult than the operation needed.',
            'assessment' => "Akshaya's team reviewed the substrate condition, checked for surface contamination and moisture, and discussed the facility's traffic pattern and available shutdown window before proposing a direction.",
            'system' => 'A resin-flooring approach was discussed after the substrate review, with the finish and build-up to be confirmed against the assessed condition and the facility’s cleaning and traffic requirements.',
            'execution' => "Preparation, repair and application were sequenced around the site's access and shutdown constraints, with trained manpower coordinating each stage and quality checks between steps.",
            'outcome' => 'The completed surface was handed over with project-specific maintenance guidance. Final performance and lifespan depend on the confirmed system, substrate and operating conditions.',
        ],
        'industrial-floor-finish-control' => [
            'title' => 'Water Ingress Review & Surface Finish Control',
            'category' => 'waterproofing',
            'categoryLabel' => 'Waterproofing',
            'industry' => 'Warehousing & Logistics',
            'location' => 'Shared at technical assessment',
            'area' => 'Confirmed after site survey',
            'duration' => 'Planned around shutdown window',
            'image' => 'website_assets/Selected Pics from _23/045.JPG',
            'beforeImage' => 'website_assets/Selected Pics from _23/Image009.jpg',
            'afterImage' => 'website_assets/Selected Pics from _23/045.JPG',
            'challenge' => 'Localised dampness and past water ingress had affected part of the floor, raising questions about the substrate underneath and the surrounding drainage.',
            'assessment' => 'The review covered visible moisture zones, likely ingress paths and how the affected area related to the surrounding structure, ahead of any waterproofing recommendation.',
            'system' => 'A waterproofing approach was discussed for the affected zone, with the exact system and detailing to depend on the confirmed moisture source and substrate condition.',
            'execution' => 'Work was planned to isolate and treat the affected area with minimum disruption to the surrounding operation, coordinating access with the site team.',
            'outcome' => 'The treated area was handed over with guidance on monitoring and maintenance. Long-term performance depends on the confirmed system and ongoing site conditions.',
        ],
        'static-control-floor-review' => [
            'title' => 'Static-Sensitive Area Floor Review',
            'category' => 'esd-flooring',
            'categoryLabel' => 'ESD / Antistatic Flooring',
            'industry' => 'Electronics',
            'location' => 'Shared at technical assessment',
            'area' => 'Confirmed after site survey',
            'duration' => 'Planned around shutdown window',
            'image' => 'website_assets/Amritha Tools/IMG20190723161129.jpg',
            'beforeImage' => 'website_assets/Amritha Tools/IMG20190716095632.jpg',
            'afterImage' => 'website_assets/Amritha Tools/IMG20190723161129.jpg',
            'challenge' => 'The facility needed a floor finish considered around static-sensitive handling areas, alongside the existing substrate’s condition and daily traffic.',
            'assessment' => 'Discussion covered the layout of static-sensitive zones, existing floor condition and how the requirement would interact with cleaning and movement routes.',
            'system' => 'An ESD / antistatic flooring route was discussed as a category to evaluate further, with suitability depending on substrate testing and the facility’s specific handling requirements.',
            'execution' => 'Any application would be sequenced with attention to continuity of the grounding path and coordination with the facility’s operating schedule.',
            'outcome' => 'This entry reflects the assessment stage. Final system, testing values and handover documentation depend on the confirmed project scope.',
        ],
        'pu-flooring-assessment' => [
            'title' => 'Wash-Down Area Flooring Assessment',
            'category' => 'pu-flooring',
            'categoryLabel' => 'PU Flooring',
            'industry' => 'Food & Beverage',
            'location' => 'Shared at technical assessment',
            'area' => 'Confirmed after site survey',
            'duration' => 'Planned around shutdown window',
            'image' => 'website_assets/Epoxy Coating Pics/IMG20190904110926.jpg',
            'beforeImage' => 'website_assets/Epoxy Coating Pics/IMG20190904120725.jpg',
            'afterImage' => 'website_assets/Epoxy Coating Pics/IMG20190904110926.jpg',
            'challenge' => 'A wash-down area needed a floor finish that could stand up to frequent cleaning, thermal cycling and the existing substrate’s condition.',
            'assessment' => 'The review looked at cleaning chemicals and frequency, thermal exposure, drainage falls and the substrate’s current condition before discussing a system category.',
            'system' => 'A PU flooring route was discussed as a relevant category for the exposure described, with the final build-up subject to substrate testing.',
            'execution' => 'Any installation would need to be coordinated around production cycles and cleaning schedules to minimise disruption.',
            'outcome' => 'This entry reflects the assessment stage. Final specification depends on confirmed site testing and project approval.',
        ],
        'pvc-flooring-review' => [
            'title' => 'Cleanroom-Adjacent Floor Review',
            'category' => 'pvc-flooring',
            'categoryLabel' => 'PVC Flooring',
            'industry' => 'Pharma',
            'location' => 'Shared at technical assessment',
            'area' => 'Confirmed after site survey',
            'duration' => 'Planned around shutdown window',
            'image' => 'website_assets/Amritha Tools/IMG20191002104052.jpg',
            'beforeImage' => 'website_assets/Amritha Tools/IMG20190725110647.jpg',
            'afterImage' => 'website_assets/Amritha Tools/IMG20191002104052.jpg',
            'challenge' => 'A corridor adjoining a controlled area needed a floor finish considered around cleanability and seam detailing.',
            'assessment' => 'The review discussed cleaning routine, foot and trolley traffic, and how the floor-to-wall junction should be treated for easier cleaning.',
            'system' => 'A PVC flooring route was discussed as a relevant category, with seam welding and coving detail to be confirmed against the approved project specification.',
            'execution' => 'Sequencing would need to respect access restrictions around the adjoining controlled area.',
            'outcome' => 'This entry reflects the assessment stage. Final specification and compliance documentation depend on the approved project scope.',
        ],
        'vdf-flooring-review' => [
            'title' => 'Heavy-Traffic Bay Flooring Review',
            'category' => 'vdf-flooring',
            'categoryLabel' => 'VDF Flooring',
            'industry' => 'Automobile',
            'location' => 'Shared at technical assessment',
            'area' => 'Confirmed after site survey',
            'duration' => 'Planned around shutdown window',
            'image' => 'website_assets/Selected Pics from _23/Steel.jpg',
            'beforeImage' => 'website_assets/Selected Pics from _23/122.JPG',
            'afterImage' => 'website_assets/Selected Pics from _23/Steel.jpg',
            'challenge' => 'A heavy-traffic bay showed surface wear consistent with sustained loading, prompting a review of the flooring category before further use.',
            'assessment' => 'Discussion covered load type, frequency, existing substrate strength and how the bay fits into the wider facility traffic pattern.',
            'system' => 'A VDF flooring route was discussed as a relevant category for heavy-duty use, with final design load and thickness subject to structural review.',
            'execution' => 'Any works would be planned around the bay’s operating schedule to limit disruption to the wider facility.',
            'outcome' => 'This entry reflects the assessment stage. Final specification depends on confirmed structural and operational review.',
        ],
    ];
}

// Shared blog/knowledge-centre article data reused by the listing page and
// the single reusable article template (?post=<slug>). Content is general
// flooring-education material, not a business or performance claim.
function blog_articles()
{
    return [
        'moisture-testing-before-resin-flooring' => [
            'title' => 'Why Moisture Testing Comes Before Resin Flooring',
            'category' => 'technical',
            'categoryLabel' => 'Technical',
            'excerpt' => 'Resin flooring is applied on top of a substrate that may be carrying moisture you cannot see. Here is why that matters before a system is chosen.',
            'readTime' => '5 min read',
            'image' => 'website_assets/Epoxy Coating Pics/IMG20190903134334.jpg',
            'body' => [
                'A resin floor is only as reliable as the substrate underneath it. Concrete can look dry to the eye and still be carrying enough moisture to interfere with how a resin system bonds and cures.',
                'Moisture in a slab can come from several places: residual construction water that has not fully dissipated, rising damp from the ground below, or a leak or wash-down routine that keeps re-wetting the surface layer. Each of these has a different implication for how — or whether — a resin system should proceed.',
                'This is why a site assessment typically includes a moisture check before any system is proposed, rather than after. Understanding where the moisture is coming from can change the recommended preparation method, the choice of system, or the sequencing of the work.',
            ],
            'callout' => 'A floor that "looks fine" on the surface can still be unsuitable for immediate resin application. The substrate condition should be assessed, not assumed.',
            'closingHeading' => 'What this means for your project',
            'closing' => 'If your facility has a history of dampness, recent wash-down use, or sits on grade without a confirmed damp-proof membrane, it is worth raising this during the site visit rather than after a system has already been selected.',
        ],
        'pu-vs-epoxy-flooring' => [
            'title' => 'PU or Epoxy? Questions Worth Asking First',
            'category' => 'selection',
            'categoryLabel' => 'Selection Guidance',
            'excerpt' => 'PU and epoxy are both resin-flooring routes, but they respond differently to heat, chemicals and impact. The right starting point is the operating environment, not the material name.',
            'readTime' => '4 min read',
            'image' => 'website_assets/Epoxy Coating Pics/IMG20190904144410.jpg',
            'body' => [
                'It is common for a facility team to arrive at a flooring conversation already asking "should we go with PU or epoxy?" It is a reasonable question, but it usually gets answered better by first describing the floor\'s working conditions.',
                'Thermal cycling, wash-down frequency, cleaning chemicals, impact from dropped tools or pallets, and the general traffic pattern of an area all influence which resin category tends to suit it better. Neither system is universally "better" — they respond differently to different stresses.',
                'The substrate condition matters just as much as the choice between the two. A resin system, whichever family it belongs to, still depends on proper surface preparation, moisture control and correct application to perform as intended.',
            ],
            'callout' => 'Start by describing what happens on the floor — temperature swings, cleaning chemicals, impact, traffic — before deciding between material families.',
            'closingHeading' => 'A practical way to approach it',
            'closing' => 'Bring a description of the area\'s daily use to the site visit. That context, combined with a substrate check, gives our team a realistic basis to discuss which category may be worth exploring further.',
        ],
        'common-causes-of-floor-failure' => [
            'title' => 'Five Common Reasons Industrial Floors Fail Early',
            'category' => 'site-insights',
            'categoryLabel' => 'Site Insights',
            'excerpt' => 'Cracking, dusting and peeling rarely appear without a reason. A look at the patterns that tend to show up during floor assessments.',
            'readTime' => '6 min read',
            'image' => 'website_assets/Selected Pics from _23/038.JPG',
            'body' => [
                'When a facility calls about a failing floor, a handful of patterns tend to repeat across very different industries. None of them are unusual — most are the result of a decision made earlier in the floor\'s life that did not account for how the area would actually be used.',
                'Common contributors include: preparation that did not fully remove a weak or contaminated surface layer; a coating applied over a substrate that still had residual moisture; a system selected for light foot traffic but exposed to forklift or trolley loads; joints and floor-to-wall junctions that were not detailed for the cleaning routine; and general wear from traffic or chemicals the original system was not intended to resist.',
                'None of these are unusual, but each one is easier to prevent at the assessment stage than to fix after installation. This is the main reason a site visit and substrate review are treated as the starting point for any recommendation, rather than skipped in favour of a quick like-for-like replacement.',
            ],
            'callout' => 'Most early floor failures trace back to a mismatch between the original system and how the area is actually used — not a flaw in resin flooring itself.',
            'closingHeading' => 'If your floor is already showing damage',
            'closing' => 'A failing floor can usually be diagnosed by reviewing the crack pattern, the areas affected and the operating history of the space. That review is a reasonable first step before deciding on a repair or replacement approach.',
        ],
        'floor-maintenance-guidance' => [
            'title' => 'Getting the Most Life Out of a Resin Floor',
            'category' => 'maintenance',
            'categoryLabel' => 'Maintenance',
            'excerpt' => 'A resin floor is low-maintenance, not maintenance-free. A few routine habits make a measurable difference to how it ages.',
            'readTime' => '4 min read',
            'image' => 'website_assets/Amritha Tools/IMG-20190727-WA0007.jpg',
            'body' => [
                'Resin flooring is often chosen because it simplifies cleaning compared with tiled or jointed alternatives. That advantage still depends on a basic maintenance routine being followed once the floor is handed over.',
                'Grit and abrasive debris left on the surface act like sandpaper under wheeled or foot traffic, gradually dulling the finish faster than the material itself would otherwise wear. Regular sweeping or dust-mopping before wet cleaning reduces this effect considerably.',
                'Cleaning chemicals should also match what the installed system was designed to tolerate. A chemical that is too aggressive — or used at the wrong dilution — can affect the surface gloss or, over time, the coating itself.',
            ],
            'callout' => 'The two habits that extend a resin floor\'s life the most: keeping abrasive grit off the surface, and using the cleaning chemicals confirmed for that specific system.',
            'closingHeading' => 'Project-specific guidance is still the right reference',
            'closing' => 'General habits help, but the maintenance guidance provided at handover for your specific system should always take priority over generic advice.',
        ],
        'hygiene-cleanability-controlled-environments' => [
            'title' => 'What "Cleanable" Actually Means for a Floor',
            'category' => 'technical',
            'categoryLabel' => 'Technical',
            'excerpt' => 'In hygiene-sensitive environments, cleanability is decided by details most visitors never notice — joints, coving and finish texture.',
            'readTime' => '5 min read',
            'image' => 'website_assets/Selected Pics from _23/122.JPG',
            'body' => [
                'When a facility describes a floor as needing to be "hygienic" or "cleanable," the requirement usually comes down to a small number of physical details rather than the flooring material\'s brand or category.',
                'A seamless surface reduces the number of joints where residue can collect. Coving at the floor-to-wall junction removes the hard-to-clean right angle that a skirting board would otherwise leave behind. Finish texture matters too — a smoother finish is generally easier to wipe down, while a textured finish may be chosen deliberately for slip resistance in wet areas, trading off some ease of cleaning.',
                'None of these details can be assumed from a product name alone. They need to be specified deliberately for the area\'s actual cleaning routine and the standards the facility needs to meet.',
            ],
            'callout' => 'Cleanability is a detailing decision — seamlessness, coving and finish texture — not a property that comes automatically with any one flooring category.',
            'closingHeading' => 'Confirming the right detail for your space',
            'closing' => 'If your facility has specific hygiene or compliance requirements, raise them early so the floor-to-wall detailing and finish can be planned around them from the start.',
        ],
    ];
}

// Home development imagery is explicitly illustrative, never project evidence.
// Replace these entries with approved client photos and remove the demo badge then.
// Two local WebP sizes avoid downloading desktop-sized media on small screens.
function home_demo_media($key, $priority = false)
{
    $images = [
        'facility' => 'Illustrative AI-generated industrial hall with a blue-grey floor; not an Akshaya project',
        'clean-environment' => 'Illustrative AI-generated controlled production corridor; not an Akshaya project',
        'surface-detail' => 'Illustrative AI-generated industrial floor surface detail; not an Akshaya project',
    ];
    if (!isset($images[$key])) return site_media('Industrial flooring image');
    $base = 'images/home/demo/' . $key;
    return '<!-- Replace with approved Akshaya project image; illustrative development asset only. -->'
        . '<div class="home-media home-demo-media image-frame image-zoom"><img src="' . site_escape(asset_url($base . '-1440.webp'))
        . '" srcset="' . site_escape(asset_url($base . '-720.webp')) . ' 720w, ' . site_escape(asset_url($base . '-1440.webp'))
        . ' 1440w" sizes="(max-width: 575px) 100vw, (max-width: 991px) 70vw, 50vw" alt="' . site_escape($images[$key])
        . '" width="1440" height="960" ' . ($priority ? 'fetchpriority="high"' : 'loading="lazy"')
        . ' decoding="async"><span class="home-image-disclosure">Illustrative image</span></div>';
}
