(() => {
  'use strict';

  const section = document.querySelector('.home-page #why-akshaya');
  const wrap = section?.querySelector('.operation-scene-wrap');
  const scene = wrap?.querySelector('.operation-scene');
  if (!section || !wrap || !scene) return;

  scene.classList.remove('has-real-photo');
  scene.querySelectorAll(':scope > .real-photo-fill, :scope > .operation-3d-world').forEach((node) => node.remove());

  const world = document.createElement('div');
  world.className = 'operation-3d-world operation-story-world';
  world.setAttribute('aria-hidden', 'true');
  world.innerHTML = `
    <div class="operation-story operation-story--0 is-active" data-operation-story="0">
      <div class="operation-story-caption"><strong>Operations continue</strong><span>Only one clearly separated zone is under flooring work.</span></div>
      <svg class="operation-story-svg" viewBox="0 0 1200 620" role="presentation">
        <defs>
          <linearGradient id="floorA" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#667985"/><stop offset="1" stop-color="#2c424f"/></linearGradient>
          <linearGradient id="coatA" x1="0" y1="0" x2="1" y2="0"><stop stop-color="#5ebed4"/><stop offset="1" stop-color="#2c758f"/></linearGradient>
          <pattern id="hazardA" width="28" height="28" patternUnits="userSpaceOnUse" patternTransform="rotate(45)"><rect width="14" height="28" fill="#f2b721"/><rect x="14" width="14" height="28" fill="#182c38"/></pattern>
        </defs>
        <polygon points="110,130 1030,95 1120,500 165,555" fill="url(#floorA)" stroke="#86d8e8" stroke-opacity=".45" stroke-width="2"/>
        <g class="scene-machines" opacity=".95">
          <g transform="translate(215 175)"><rect width="155" height="100" rx="8" fill="#d8e2e7"/><rect x="20" y="18" width="72" height="24" rx="4" fill="#153e54"/><rect x="104" y="8" width="32" height="84" fill="#81949f"/></g>
          <g transform="translate(415 155)"><rect width="150" height="110" rx="8" fill="#cfd9de"/><rect x="18" y="16" width="68" height="24" rx="4" fill="#17465f"/><rect x="99" y="10" width="34" height="90" fill="#798d98"/></g>
          <g transform="translate(760 145)"><rect width="120" height="82" rx="6" fill="#cbd5da"/><rect x="18" y="18" width="58" height="20" rx="4" fill="#153f55"/></g>
        </g>
        <g class="scene-racks" fill="#96652f"><rect x="155" y="305" width="165" height="105" rx="5"/><rect x="345" y="300" width="130" height="100" rx="5"/></g>
        <g class="work-zone"><polygon points="670,285 1015,265 1050,455 700,485" fill="#8e9ca3" stroke="#f2b721" stroke-width="7" stroke-dasharray="18 12"/><polygon class="work-zone-coat" points="706,317 984,300 1010,425 728,448" fill="url(#coatA)" opacity=".92"/><rect x="690" y="274" width="332" height="18" fill="url(#hazardA)"/><rect x="706" y="462" width="340" height="18" fill="url(#hazardA)"/></g>
        <g class="worker worker--a" transform="translate(825 355)"><circle r="14" cy="-24" fill="#f4d0a4"/><rect x="-13" y="-12" width="26" height="42" rx="9" fill="#e8e8e8"/><rect x="-15" y="-15" width="30" height="12" rx="6" fill="#f2b721"/><line x1="0" y1="30" x2="-15" y2="58" stroke="#d8e1e6" stroke-width="8"/><line x1="0" y1="30" x2="18" y2="58" stroke="#d8e1e6" stroke-width="8"/><line x1="12" y1="6" x2="45" y2="36" stroke="#d8e1e6" stroke-width="7"/><line x1="45" y1="36" x2="88" y2="37" stroke="#d8e1e6" stroke-width="5"/></g>
        <path class="active-route" d="M155 475 C280 420 410 475 535 420 S760 405 905 470" fill="none" stroke="#64d9ec" stroke-width="13" stroke-linecap="round" stroke-dasharray="22 18"/>
        <g class="forklift" transform="translate(170 420)"><rect width="95" height="48" rx="8" fill="#e6ad21"/><rect x="58" y="-45" width="30" height="45" fill="none" stroke="#172c38" stroke-width="8"/><rect x="88" y="-42" width="7" height="92" fill="#172c38"/><rect x="95" y="35" width="55" height="7" fill="#172c38"/><circle cx="20" cy="52" r="13" fill="#17242b"/><circle cx="72" cy="52" r="13" fill="#17242b"/></g>
        <g class="scene-label label-route" transform="translate(145 510)"><rect width="260" height="58" rx="8" fill="#08293a" stroke="#65cbe3"/><text x="18" y="25" fill="#fff" font-size="18" font-weight="700">ACTIVE MOVEMENT ROUTE</text><text x="18" y="45" fill="#b9d1dc" font-size="14">Forklifts and people keep moving</text></g>
        <g class="scene-label label-zone" transform="translate(760 235)"><rect width="280" height="58" rx="8" fill="#08293a" stroke="#f2b721"/><text x="18" y="25" fill="#fff" font-size="18" font-weight="700">PROTECTED WORK ZONE</text><text x="18" y="45" fill="#b9d1dc" font-size="14">Flooring is isolated and phased</text></g>
        <g class="scene-label label-production" transform="translate(370 105)"><rect width="250" height="58" rx="8" fill="#08293a" stroke="#65cbe3"/><text x="18" y="25" fill="#fff" font-size="18" font-weight="700">PRODUCTION AREA</text><text x="18" y="45" fill="#b9d1dc" font-size="14">Surrounding operation stays active</text></g>
      </svg>
    </div>

    <div class="operation-story operation-story--1" data-operation-story="1">
      <div class="operation-story-caption"><strong>Quality is checked step by step</strong><span>The visual follows the real sequence: test, verify, apply, inspect.</span></div>
      <svg class="operation-story-svg" viewBox="0 0 1200 620" role="presentation">
        <defs><linearGradient id="floorB" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#7b8c95"/><stop offset="1" stop-color="#344b57"/></linearGradient></defs>
        <polygon points="115,120 1035,95 1115,505 165,555" fill="url(#floorB)" stroke="#78d2e5" stroke-opacity=".45" stroke-width="2"/>
        <polygon points="560,165 995,145 1040,470 590,495" fill="#5b9caf" opacity=".8"/>
        <g class="qa-step qa-step--1" transform="translate(235 320)"><circle r="46" fill="#0c3448" stroke="#65cbe3" stroke-width="4"/><text text-anchor="middle" y="8" fill="#fff" font-size="28" font-weight="800">1</text><rect x="-75" y="62" width="150" height="55" rx="7" fill="#08293a" stroke="#65cbe3"/><text text-anchor="middle" y="86" fill="#fff" font-size="17" font-weight="700">MOISTURE TEST</text><text text-anchor="middle" y="105" fill="#b9d1dc" font-size="13">Check slab condition</text></g>
        <g class="qa-step qa-step--2" transform="translate(470 280)"><circle r="46" fill="#0c3448" stroke="#65cbe3" stroke-width="4"/><text text-anchor="middle" y="8" fill="#fff" font-size="28" font-weight="800">2</text><rect x="-78" y="62" width="156" height="55" rx="7" fill="#08293a" stroke="#65cbe3"/><text text-anchor="middle" y="86" fill="#fff" font-size="17" font-weight="700">LEVEL CHECK</text><text text-anchor="middle" y="105" fill="#b9d1dc" font-size="13">Verify flatness</text></g>
        <g class="qa-step qa-step--3" transform="translate(720 250)"><circle r="46" fill="#0c3448" stroke="#65cbe3" stroke-width="4"/><text text-anchor="middle" y="8" fill="#fff" font-size="28" font-weight="800">3</text><rect x="-82" y="62" width="164" height="55" rx="7" fill="#08293a" stroke="#65cbe3"/><text text-anchor="middle" y="86" fill="#fff" font-size="17" font-weight="700">THICKNESS CHECK</text><text text-anchor="middle" y="105" fill="#b9d1dc" font-size="13">Measure coating</text></g>
        <g class="qa-step qa-step--4" transform="translate(960 220)"><circle r="46" fill="#0c3448" stroke="#f2b721" stroke-width="4"/><text text-anchor="middle" y="8" fill="#fff" font-size="28" font-weight="800">4</text><rect x="-80" y="62" width="160" height="55" rx="7" fill="#08293a" stroke="#f2b721"/><text text-anchor="middle" y="86" fill="#fff" font-size="17" font-weight="700">FINAL QA</text><text text-anchor="middle" y="105" fill="#b9d1dc" font-size="13">Approve completion</text></g>
        <path class="qa-flow" d="M280 320 C340 290 385 290 425 280 M515 280 C580 260 625 255 675 250 M765 250 C835 235 875 225 915 220" fill="none" stroke="#65cbe3" stroke-width="8" stroke-linecap="round" stroke-dasharray="14 14"/>
        <g class="qa-worker" transform="translate(225 440)"><circle r="13" cy="-22" fill="#f2d0a6"/><rect x="-12" y="-10" width="24" height="38" rx="8" fill="#f2b721"/><line x1="0" y1="28" x2="-18" y2="55" stroke="#e9f2f5" stroke-width="7"/><line x1="0" y1="28" x2="16" y2="55" stroke="#e9f2f5" stroke-width="7"/></g>
        <g class="qa-worker" transform="translate(955 400)"><circle r="13" cy="-22" fill="#f2d0a6"/><rect x="-12" y="-10" width="24" height="38" rx="8" fill="#f2b721"/><rect x="20" y="0" width="34" height="44" rx="4" fill="#d7e7ec" stroke="#163e52" stroke-width="4"/></g>
      </svg>
    </div>

    <div class="operation-story operation-story--2" data-operation-story="2">
      <div class="operation-story-caption"><strong>Different people, one coordinated process</strong><span>Preparation, mixing, application and supervision each have a clear role.</span></div>
      <svg class="operation-story-svg" viewBox="0 0 1200 620" role="presentation">
        <defs><linearGradient id="floorC" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#748792"/><stop offset="1" stop-color="#314854"/></linearGradient></defs>
        <polygon points="115,120 1035,95 1115,505 165,555" fill="url(#floorC)" stroke="#78d2e5" stroke-opacity=".45" stroke-width="2"/>
        <g class="team-zone team-zone--prep"><polygon points="165,210 390,190 425,465 190,490" fill="#64747d" stroke="#65cbe3" stroke-width="3"/><text x="225" y="180" fill="#fff" font-size="18" font-weight="800">1 · SURFACE PREP</text><g class="prep-machine" transform="translate(250 325)"><circle r="38" fill="#263741"/><rect x="-30" y="-70" width="60" height="62" rx="8" fill="#d6e0e4"/><path d="M24 -50 L90 -95" stroke="#d6e0e4" stroke-width="12" stroke-linecap="round"/></g></g>
        <g class="team-zone team-zone--mix"><polygon points="410,180 615,168 642,445 438,462" fill="#5a7280" stroke="#65cbe3" stroke-width="3"/><text x="455" y="153" fill="#fff" font-size="18" font-weight="800">2 · MIXING</text><g transform="translate(510 300)"><ellipse rx="54" ry="22" fill="#cbd6db"/><rect x="-54" y="-5" width="108" height="95" fill="#b7c5cb"/><ellipse cy="90" rx="54" ry="22" fill="#879ba5"/><line x1="0" y1="-20" x2="0" y2="55" stroke="#173e52" stroke-width="9"/><circle cy="-35" r="18" fill="#f2b721"/></g></g>
        <g class="team-zone team-zone--apply"><polygon points="635,155 860,145 892,430 665,447" fill="#397f96" stroke="#65cbe3" stroke-width="3"/><text x="690" y="130" fill="#fff" font-size="18" font-weight="800">3 · APPLICATION</text><g class="apply-worker" transform="translate(745 300)"><circle r="13" cy="-22" fill="#f2d0a6"/><rect x="-12" y="-10" width="24" height="38" rx="8" fill="#f2b721"/><line x1="10" y1="5" x2="65" y2="45" stroke="#dce8ec" stroke-width="7"/><line x1="65" y1="45" x2="118" y2="45" stroke="#dce8ec" stroke-width="5"/><line x1="0" y1="28" x2="-15" y2="55" stroke="#e9f2f5" stroke-width="7"/><line x1="0" y1="28" x2="18" y2="55" stroke="#e9f2f5" stroke-width="7"/></g></g>
        <g class="team-zone team-zone--supervise"><polygon points="875,140 1000,132 1030,415 905,425" fill="#4d6572" stroke="#f2b721" stroke-width="3"/><text x="895" y="115" fill="#fff" font-size="18" font-weight="800">4 · SUPERVISION</text><g transform="translate(945 280)"><circle r="13" cy="-22" fill="#f2d0a6"/><rect x="-12" y="-10" width="24" height="38" rx="8" fill="#f2b721"/><rect x="20" y="-5" width="42" height="50" rx="5" fill="#d5e4e9" stroke="#173e52" stroke-width="4"/></g></g>
        <path class="team-flow" d="M250 520 L500 500 L755 480 L955 460" fill="none" stroke="#65cbe3" stroke-width="10" stroke-dasharray="18 16"/>
        <text x="240" y="548" fill="#9de7f4" font-size="16" font-weight="700">PREPARE</text><text x="485" y="525" fill="#9de7f4" font-size="16" font-weight="700">MIX</text><text x="745" y="505" fill="#9de7f4" font-size="16" font-weight="700">APPLY</text><text x="925" y="485" fill="#9de7f4" font-size="16" font-weight="700">CHECK</text>
      </svg>
    </div>

    <div class="operation-story operation-story--3" data-operation-story="3">
      <div class="operation-story-caption"><strong>Support continues after the floor is finished</strong><span>Inspection, cleaning guidance, service and documentation stay connected.</span></div>
      <svg class="operation-story-svg" viewBox="0 0 1200 620" role="presentation">
        <defs><linearGradient id="floorD" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#67808d"/><stop offset="1" stop-color="#2e4652"/></linearGradient></defs>
        <polygon points="115,120 1035,95 1115,505 165,555" fill="url(#floorD)" stroke="#78d2e5" stroke-opacity=".45" stroke-width="2"/>
        <path class="support-route" d="M215 450 C350 390 455 420 555 360 S760 300 930 350" fill="none" stroke="#65cbe3" stroke-width="11" stroke-linecap="round" stroke-dasharray="20 18"/>
        <g class="support-card support-card--inspect" transform="translate(180 245)"><rect width="215" height="92" rx="10" fill="#08293a" stroke="#65cbe3"/><circle cx="42" cy="42" r="22" fill="none" stroke="#65cbe3" stroke-width="6"/><line x1="58" y1="58" x2="75" y2="75" stroke="#65cbe3" stroke-width="6"/><text x="92" y="35" fill="#fff" font-size="18" font-weight="800">INSPECTION</text><text x="92" y="58" fill="#b9d1dc" font-size="14">Check floor condition</text></g>
        <g class="support-card support-card--clean" transform="translate(455 205)"><rect width="215" height="92" rx="10" fill="#08293a" stroke="#65cbe3"/><rect x="26" y="28" width="48" height="32" rx="8" fill="#e0a820"/><circle cx="36" cy="66" r="8" fill="#17242b"/><circle cx="66" cy="66" r="8" fill="#17242b"/><text x="92" y="35" fill="#fff" font-size="18" font-weight="800">CLEANING</text><text x="92" y="58" fill="#b9d1dc" font-size="14">Maintenance guidance</text></g>
        <g class="support-card support-card--service" transform="translate(730 175)"><rect width="215" height="92" rx="10" fill="#08293a" stroke="#65cbe3"/><rect x="24" y="26" width="52" height="36" rx="5" fill="#dbe5e9"/><circle cx="35" cy="68" r="8" fill="#17242b"/><circle cx="66" cy="68" r="8" fill="#17242b"/><text x="92" y="35" fill="#fff" font-size="18" font-weight="800">SERVICE VISIT</text><text x="92" y="58" fill="#b9d1dc" font-size="14">On-site support</text></g>
        <g class="support-card support-card--docs" transform="translate(855 370)"><rect width="215" height="92" rx="10" fill="#08293a" stroke="#f2b721"/><rect x="28" y="20" width="44" height="56" rx="4" fill="#dce8ec"/><line x1="37" y1="35" x2="62" y2="35" stroke="#2b566b" stroke-width="4"/><line x1="37" y1="48" x2="62" y2="48" stroke="#2b566b" stroke-width="4"/><text x="92" y="35" fill="#fff" font-size="18" font-weight="800">WARRANTY / RECORDS</text><text x="92" y="58" fill="#b9d1dc" font-size="14">Project communication</text></g>
        <g class="cleaner" transform="translate(520 410)"><rect width="80" height="40" rx="10" fill="#e0a820"/><circle cx="20" cy="44" r="10" fill="#17242b"/><circle cx="62" cy="44" r="10" fill="#17242b"/></g>
        <g class="inspector" transform="translate(305 420)"><circle r="13" cy="-22" fill="#f2d0a6"/><rect x="-12" y="-10" width="24" height="38" rx="8" fill="#f2b721"/><line x1="0" y1="28" x2="-16" y2="56" stroke="#e9f2f5" stroke-width="7"/><line x1="0" y1="28" x2="16" y2="56" stroke="#e9f2f5" stroke-width="7"/></g>
      </svg>
    </div>`;

  scene.appendChild(world);

  const stories = [...world.querySelectorAll('[data-operation-story]')];
  const labels = [
    '01 / Minimum Production Disruption',
    '02 / Quality-Controlled Execution',
    '03 / Trained Application Team',
    '04 / Support Beyond Installation'
  ];

  const updateContext = () => {
    const raw = Number(wrap.getAttribute('data-operation-state'));
    const index = Number.isFinite(raw) ? Math.max(0, Math.min(3, raw)) : 0;
    stories.forEach((story, i) => story.classList.toggle('is-active', i === index));
    const readout = wrap.querySelector('[data-operation-readout]');
    if (readout) readout.textContent = labels[index];
    world.setAttribute('data-active-story', String(index));
  };

  new MutationObserver(updateContext).observe(wrap, {
    attributes: true,
    attributeFilter: ['data-operation-state']
  });
  updateContext();
})();
