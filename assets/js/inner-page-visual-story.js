(() => {
    'use strict';

    const serviceMain = document.querySelector('.service-main');
    const industryMain = document.querySelector('.industry-main');
    const main = serviceMain || industryMain;
    if (!main) return;

    const currentScript = document.currentScript;
    const asset = (path) => currentScript?.src ? new URL(`../../${path}`, currentScript.src).href : `../${path}`;

    const imagePool = [
        ['website_assets/Selected Pics from _23/006.JPG', 'Project execution view'],
        ['website_assets/Selected Pics from _23/038.JPG', 'Finished floor reference'],
        ['website_assets/Selected Pics from _23/045.JPG', 'Flooring execution reference'],
        ['website_assets/Selected Pics from _23/060820091425.jpg', 'Site surface reference'],
        ['website_assets/Selected Pics from _23/080720091212.jpg', 'Project floor view'],
        ['website_assets/Selected Pics from _23/080720091213.jpg', 'Execution detail'],
        ['website_assets/Selected Pics from _23/122.JPG', 'Finished surface view'],
        ['website_assets/Selected Pics from _23/123.JPG', 'Project source photograph'],
        ['website_assets/Selected Pics from _23/14062008255.jpg', 'Site execution reference'],
        ['website_assets/Amritha Tools/IMG-20190714-WA0024.jpg', 'Application-stage reference'],
        ['website_assets/Amritha Tools/IMG-20190714-WA0025.jpg', 'Floor preparation reference'],
        ['website_assets/Amritha Tools/IMG-20190721-WA0003.jpg', 'Project floor reference'],
        ['website_assets/Amritha Tools/IMG-20190721-WA0004.jpg', 'Execution-stage reference'],
        ['website_assets/Amritha Tools/IMG-20190726-WA0040.jpg', 'Industrial floor view'],
        ['website_assets/Amritha Tools/IMG-20190726-WA0041.jpg', 'Site-floor reference'],
        ['website_assets/Amritha Tools/IMG-20190727-WA0007.jpg', 'Project source photograph'],
        ['website_assets/Amritha Tools/IMG-20190727-WA0008.jpg', 'Flooring reference view'],
        ['website_assets/Epoxy Coating Pics/IMG20190903120103.jpg', 'Surface application reference'],
        ['website_assets/Epoxy Coating Pics/IMG20190903134334.jpg', 'Coating execution reference'],
        ['website_assets/Epoxy Coating Pics/IMG20190903135838.jpg', 'Finished coating reference'],
        ['website_assets/Epoxy Coating Pics/IMG20190904110926.jpg', 'Project execution photograph']
    ];

    const pageKey = [...document.body.classList].join('|');
    let seed = 0;
    for (let i = 0; i < pageKey.length; i += 1) seed = (seed * 31 + pageKey.charCodeAt(i)) >>> 0;
    const pick = (offset) => imagePool[(seed + offset * 7) % imagePool.length];

    const makeFigure = ([path, caption], index) => {
        const figure = document.createElement('figure');
        figure.className = `ivs-figure ivs-figure-${index + 1}`;
        const img = document.createElement('img');
        img.src = asset(path);
        img.alt = caption;
        img.loading = 'lazy';
        img.decoding = 'async';
        const cap = document.createElement('figcaption');
        cap.textContent = caption;
        figure.append(img, cap);
        return figure;
    };

    const createStory = ({ alt = false, kicker, title, intro, note, start = 0 }) => {
        const section = document.createElement('section');
        section.className = `inner-visual-story${alt ? ' ivs-alt' : ''}`;
        section.setAttribute('aria-label', title);
        const shell = document.createElement('div');
        shell.className = 'container ivs-shell';
        const copy = document.createElement('div');
        copy.className = 'ivs-copy';
        const eyebrow = document.createElement('span');
        eyebrow.className = 'ivs-kicker';
        eyebrow.textContent = kicker;
        const heading = document.createElement('h2');
        heading.textContent = title;
        const p = document.createElement('p');
        p.textContent = intro;
        const small = document.createElement('span');
        small.className = 'ivs-note';
        small.textContent = note;
        copy.append(eyebrow, heading, p, small);
        const collage = document.createElement('div');
        collage.className = 'ivs-collage';
        [pick(start), pick(start + 1), pick(start + 2)].forEach((img, i) => collage.append(makeFigure(img, i)));
        shell.append(copy, collage);
        section.append(shell);
        return section;
    };

    if (serviceMain) {
        const firstTarget = serviceMain.querySelector('.service-problems') || serviceMain.querySelectorAll('.section')[1];
        const secondTarget = serviceMain.querySelector('.service-suitability') || serviceMain.querySelectorAll('.section')[3];
        const first = createStory({
            kicker: 'Project photography / execution context',
            title: 'See the floor, not only the specification.',
            intro: 'Real project photography gives a better sense of surface condition, preparation, application and finished-floor character than text alone.',
            note: 'Source project photography is shown as visual context only. Final system selection and specification depend on site conditions and technical assessment.',
            start: 1
        });
        const second = createStory({
            alt: true,
            kicker: 'From preparation to finish',
            title: 'Execution quality is visible in the details.',
            intro: 'Preparation, edge treatment, application control and finish quality all influence how the completed floor performs in day-to-day use.',
            note: 'Images are execution references and do not imply a specific client, sector or technical specification unless stated elsewhere.',
            start: 5
        });
        firstTarget?.insertAdjacentElement('afterend', first);
        secondTarget?.insertAdjacentElement('afterend', second);
    }

    if (industryMain) {
        const firstTarget = industryMain.querySelector('.industry-challenges') || industryMain.querySelectorAll('.section')[1];
        const secondTarget = industryMain.querySelector('.industry-solutions') || industryMain.querySelectorAll('.section')[3];
        const first = createStory({
            kicker: 'Flooring in use',
            title: 'Operational conditions shape the floor requirement.',
            intro: 'Traffic, equipment movement, cleaning, access and surface condition are easier to understand when the discussion is grounded in real flooring environments.',
            note: 'Project source photography is used as general flooring execution context and should not be read as proof of work in this specific industry.',
            start: 2
        });
        const second = createStory({
            alt: true,
            kicker: 'Execution reference',
            title: 'The right floor is more than a material choice.',
            intro: 'Surface preparation, site access, sequencing, detailing and handover all contribute to the completed flooring outcome.',
            note: 'Final system selection and specification depend on the actual facility, operating conditions and technical assessment.',
            start: 8
        });
        firstTarget?.insertAdjacentElement('afterend', first);
        secondTarget?.insertAdjacentElement('afterend', second);
    }
})();
