(() => {
  'use strict';
  const serviceMain = document.querySelector('.service-main');
  const industryMain = document.querySelector('.industry-main');
  const main = serviceMain || industryMain;
  if (!main) return;

  const body = document.body;
  const cls = [...body.classList];
  const has = (name) => cls.includes(name);

  const iconSvg = {
    traffic:'<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 17h16M6 17l2-8h8l2 8M9 9V6h6v3M8 13h8"/></svg>',
    hygiene:'<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v18M5 8l14 8M19 8L5 16M7 5l10 14M17 5L7 19"/></svg>',
    moisture:'<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3s5 5.4 5 9a5 5 0 0 1-10 0c0-3.6 5-9 5-9Z"/><path d="M9.5 14.5c.7 1 1.5 1.5 2.5 1.5"/></svg>',
    static:'<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m13 2-6 11h5l-1 9 6-11h-5l1-9Z"/></svg>',
    shield:'<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v5c0 4.5 2.9 8 7 10 4.1-2 7-5.5 7-10V6l-7-3Z"/><path d="m9 12 2 2 4-4"/></svg>',
    layers:'<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m4 8 8-4 8 4-8 4-8-4Z"/><path d="m4 12 8 4 8-4M4 16l8 4 8-4"/></svg>',
    clean:'<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19h16M6 19V6h12v13M9 9h6M9 12h6"/><path d="M4 19c2-2 3-3 5-3"/></svg>',
    maintenance:'<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 6a4 4 0 0 0-5 5L4 16l4 4 5-5a4 4 0 0 0 5-5l-3 3-3-3 2-4Z"/></svg>'
  };

  const profiles = {
    epoxy:{scene:'layers',title:'Build the system from the substrate upward.',kicker:'System build-up',desc:'The finished surface is only one part of the flooring system. Substrate condition, preparation, intermediate layers and finish all work together.',icons:[['layers','Layer build-up','Substrate, preparation and coating layers should be treated as one system.'],['maintenance','Preparation','Surface preparation strongly affects bond and finish quality.'],['traffic','Service conditions','Traffic and daily use influence the appropriate finish and build-up.'],['shield','Finish protection','The selected top layer protects the prepared system beneath it.']]},
    pu:{scene:'layers',title:'Resilience depends on the complete floor build-up.',kicker:'Performance structure',desc:'PU flooring should be understood as a layered industrial system designed around use, substrate and environmental conditions.',icons:[['traffic','Traffic load','Operational movement should guide system selection.'],['layers','System depth','The build-up matters as much as the visible finish.'],['maintenance','Preparation','A sound prepared base supports the installed system.'],['shield','Operational durability','The finished surface must suit the actual working environment.']]},
    esd:{scene:'esd',title:'Static control works through a conductive path.',kicker:'Grounding logic',desc:'An ESD floor is meaningful only when the conductive layer, grounding path and final surface work together as a controlled system.',icons:[['static','Static control','The floor should form part of a planned electrostatic control strategy.'],['layers','Conductive build-up','Conductive components sit within the flooring system, not only at the surface.'],['shield','Grounding path','Electrical continuity and grounding need to be designed and checked.'],['maintenance','Verification','Post-installation checks are part of controlled execution.']]},
    dielectric:{scene:'insulation',title:'Insulation is created by controlled separation.',kicker:'Electrical separation',desc:'Dielectric flooring is about creating a suitable insulating barrier between personnel, equipment and the substrate where required.',icons:[['shield','Insulation barrier','The selected system is intended to create controlled electrical separation.'],['layers','Layer integrity','Continuity of the insulating layer is critical to the concept.'],['maintenance','Substrate review','Defects and preparation affect the final installation.'],['static','Electrical context','The exact requirement should be confirmed against the project need.']]},
    pvc:{scene:'surface',title:'Room use should drive the finished-floor choice.',kicker:'Resilient finish',desc:'PVC flooring is selected around room function, traffic, cleaning, transitions and substrate condition rather than appearance alone.',icons:[['traffic','Movement pattern','People, trolleys and furniture influence the floor requirement.'],['hygiene','Cleaning routine','Cleaning expectations should be part of the selection.'],['maintenance','Transitions','Edges and adjoining finishes need practical detailing.'],['layers','Substrate condition','Flatness and moisture affect the finished installation.']]},
    cleanroom:{scene:'cove',title:'Cleanability depends on continuity at the edges.',kicker:'Wall + floor interface',desc:'In controlled environments, wall-floor junctions, corners, coves and smooth transitions are as important as the main surface.',icons:[['hygiene','Cleanable surfaces','Surface geometry should support the intended cleaning routine.'],['clean','Cove continuity','Floor-to-wall transitions should avoid weak, dirt-trapping details.'],['layers','Coating continuity','Wall and floor systems should be planned as connected surfaces where required.'],['maintenance','Inspection points','Junctions and penetrations deserve special attention.']]},
    waterproofing:{scene:'water',title:'Waterproofing is about controlling the path of water.',kicker:'Ingress control',desc:'A waterproofing system should address how water reaches, moves across and potentially passes through the structure.',icons:[['moisture','Water ingress','Identify where moisture is entering before choosing the treatment.'],['shield','Barrier continuity','Membrane continuity is central to the protection concept.'],['layers','Substrate condition','Cracks, joints and surface defects affect the waterproofing detail.'],['maintenance','Critical junctions','Edges, penetrations and upturns need careful execution.']]},
    vdf:{scene:'surface',title:'Heavy-duty floors start with the slab and wear zone.',kicker:'Dense wear surface',desc:'VDF performance depends on the concrete floor build, execution conditions, hardener integration and the service environment.',icons:[['traffic','Heavy traffic','Wheel loads and repetitive movement shape the floor requirement.'],['layers','Monolithic build','The wear surface works with the concrete slab beneath it.'],['maintenance','Execution control','Timing and finishing quality influence the final surface.'],['shield','Wear resistance','The dense finished surface is intended for demanding floor use.']]},
    industry:{scene:'traffic',title:'The floor should support the operation around it.',kicker:'Operational floor map',desc:'Instead of selecting a floor in isolation, the better approach is to understand traffic, equipment, cleaning, access and critical zones.',icons:[['traffic','Traffic & movement','Map people, trolleys, vehicles and equipment movement.'],['hygiene','Cleaning & housekeeping','Cleaning methods and contamination concerns affect the floor requirement.'],['maintenance','Access & shutdown','Execution should be planned around production and access constraints.'],['shield','Critical zones','Different areas may need different floor characteristics.']]}
  };

  let profile = profiles.industry;
  if (serviceMain) {
    if (has('service-epoxy')) profile=profiles.epoxy;
    else if (has('service-pu')) profile=profiles.pu;
    else if (has('service-esd')) profile=profiles.esd;
    else if (has('service-dielectric')) profile=profiles.dielectric;
    else if (has('service-pvc')) profile=profiles.pvc;
    else if (has('service-clean-room-wall-coating')) profile=profiles.cleanroom;
    else if (has('service-waterproofing')) profile=profiles.waterproofing;
    else if (has('service-vdf')) profile=profiles.vdf;
  } else if (industryMain) {
    if (has('industry-electronics') || has('industry-data-centres') || has('industry-laboratories')) profile={...profiles.industry,scene:'esd',title:'Controlled zones need floors planned around the operating risk.',kicker:'Critical-zone logic',icons:[['static','Electrical / equipment risk','Sensitive environments may require static-control or electrically considered flooring.'],['traffic','Movement pattern','Equipment and personnel movement affect zoning and finish selection.'],['hygiene','Cleaning control','Cleaning and contamination expectations should be understood.'],['shield','Critical areas','Not every area in the same facility needs the same floor system.']]};
    else if (has('industry-pharma') || has('industry-food-beverage') || has('industry-healthcare')) profile={...profiles.industry,scene:'cove',title:'Cleanable transitions matter as much as the main floor.',kicker:'Hygiene-zone logic',icons:[['hygiene','Hygiene requirement','The cleaning regime should influence the floor and detailing.'],['clean','Wall-floor junctions','Coves and transitions may be important in controlled zones.'],['moisture','Wet conditions','Washdown or moisture exposure should be considered where relevant.'],['maintenance','Inspection & upkeep','Maintenance access and repair strategy matter over time.']]};
    else if (has('industry-warehouses') || has('industry-manufacturing') || has('industry-automobile') || has('industry-airports') || has('industry-seaports')) profile={...profiles.industry,scene:'traffic',title:'Traffic routes and work zones should shape the floor strategy.',kicker:'Movement + load map',icons:[['traffic','Vehicle movement','Forklifts, trolleys and heavy movement create defined wear paths.'],['shield','Load zones','Loading, turning and work zones may need different attention.'],['maintenance','Downtime planning','Floor work should be coordinated around operations.'],['layers','Surface condition','Existing damage and substrate condition influence the solution.']]};
  }

  const makeIconStrip = () => {
    const section=document.createElement('section'); section.className='inner-meaning-strip';
    const shell=document.createElement('div'); shell.className='container im-shell';
    const intro=document.createElement('div'); intro.className='im-intro'; intro.innerHTML=`<span class="im-kicker">At a glance</span><h2>What actually drives the floor requirement.</h2>`;
    const grid=document.createElement('div'); grid.className='im-icon-grid';
    profile.icons.forEach(([icon,title,text])=>{const card=document.createElement('article');card.className='im-icon-card';card.innerHTML=`<div class="im-icon">${iconSvg[icon]||iconSvg.layers}</div><strong>${title}</strong><span>${text}</span>`;grid.append(card);});
    shell.append(intro,grid); section.append(shell); return section;
  };

  const makeScene = () => {
    const section=document.createElement('section'); section.className='inner-engineering-visual'; section.setAttribute('aria-label',profile.title);
    section.innerHTML=`<div class="container iev-shell"><div class="iev-copy"><span class="im-kicker">${profile.kicker}</span><h2>${profile.title}</h2><p>${profile.desc}</p><small>Concept visual for explanation only. Final system selection and specification depend on site conditions and technical assessment.</small></div><div class="iev-stage" data-scene="${profile.scene}"><div class="iev-scene" aria-hidden="true"><span class="iev-slab"></span><span class="iev-layer"></span><span class="iev-overlay"></span><span class="iev-line iev-line--a"></span><span class="iev-node iev-node--a"></span><span class="iev-node iev-node--b"></span><span class="iev-label iev-label--a">substrate / condition</span><span class="iev-label iev-label--b">working surface / requirement</span></div></div></div>`;
    return section;
  };

  const sections=[...main.querySelectorAll(':scope > .section')];
  const introTarget=serviceMain ? main.querySelector('.service-problems') : main.querySelector('.industry-challenges');
  (introTarget || sections[1])?.insertAdjacentElement('beforebegin',makeIconStrip());
  // Keep the explanatory engineering scene on service pages only.
  // Industry pages already contain their own assessment/execution sections, so inserting
  // this additional scene duplicates the content and makes the page unnecessarily long.
  if (serviceMain) {
    const sceneTarget=main.querySelector('.service-process') || sections[5];
    sceneTarget?.insertAdjacentElement('beforebegin',makeScene());
  }
})();
