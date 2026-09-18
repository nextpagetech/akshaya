(() => {
  'use strict';

  const visual = document.querySelector('.home-page #how-we-work .home-work-visual');
  const scene = visual?.querySelector('.floor-scene');
  if (!visual || !scene) return;

  const stages = [
    {
      key:'survey', title:'Site Survey',
      caption:'Measure the working area, review access and identify visible floor problems before planning the work.',
      markup:`
        <span class="workflow-worker wf-worker-a"><i></i></span>
        <span class="wf-laser"></span>
        <span class="workflow-line wf-measure-a"></span>
        <span class="workflow-line wf-measure-b"></span>
        <span class="wf-crack"></span>
        <span class="workflow-label" style="left:59%;top:47%">Measure area</span>
        <span class="workflow-label" style="left:54%;top:64%">Check cracks</span>`
    },
    {
      key:'surface', title:'Surface Testing',
      caption:'Test and prepare the existing surface so weak coating, contamination and damaged material are clearly identified.',
      markup:`
        <span class="workflow-worker wf-worker-a"><i></i></span>
        <span class="wf-grinder"></span><span class="wf-dust"></span>
        <span class="workflow-label" style="left:37%;top:63%">Surface preparation</span>`
    },
    {
      key:'moisture', title:'Moisture Testing',
      caption:'Use floor testing equipment to check substrate moisture before the flooring system is confirmed.',
      markup:`
        <span class="workflow-worker wf-worker-a"><i></i></span>
        <span class="workflow-device wf-meter"></span><span class="workflow-pulse"></span><span class="wf-drop"></span>
        <span class="workflow-label" style="left:47%;top:66%">Moisture reading</span>`
    },
    {
      key:'recommendation', title:'Recommendation',
      caption:'Bring site findings together, compare the system layers and agree the proposed flooring approach and scope.',
      markup:`
        <span class="workflow-worker wf-worker-a"><i></i></span><span class="workflow-worker wf-worker-b"><i></i></span>
        <span class="wf-board"></span>
        <span class="workflow-label" style="left:44%;top:67%">Assessment → System</span>`
    },
    {
      key:'mockup', title:'Mock-up — Optional',
      caption:'Create and review a small sample area when the project needs confirmation of finish, appearance or application.',
      markup:`
        <span class="workflow-worker wf-worker-a"><i></i></span>
        <span class="wf-sample-grid"><i></i><i></i><i></i><i></i></span>
        <span class="workflow-label" style="left:57%;top:65%">Sample finish area</span>`
    },
    {
      key:'installation', title:'Installation',
      caption:'Apply the flooring in a controlled work zone, with preparation, coating and finishing progressing across the area.',
      markup:`
        <span class="workflow-worker wf-worker-a"><i></i></span><span class="workflow-worker wf-worker-b"><i></i></span>
        <span class="wf-coat"></span>
        <span class="workflow-label" style="left:49%;top:67%">Coating progress</span>`
    },
    {
      key:'inspection', title:'Inspection',
      caption:'Inspect the completed surface and verify the finish, completed areas and agreed scope before handover.',
      markup:`
        <span class="workflow-worker wf-worker-a"><i></i></span>
        <span class="wf-inspect-line"></span>
        <span class="workflow-check wf-check-1">✓</span><span class="workflow-check wf-check-2">✓</span><span class="workflow-check wf-check-3">✓</span>
        <span class="workflow-label" style="left:55%;top:67%">Final quality check</span>`
    },
    {
      key:'warranty', title:'Warranty & Maintenance Tips',
      caption:'Complete handover with project-specific warranty communication and practical guidance for cleaning and future care.',
      markup:`
        <span class="workflow-worker wf-worker-a"><i></i></span><span class="workflow-worker wf-worker-b"><i></i></span>
        <span class="wf-certificate"></span>
        <span class="wf-care-icons"><i>✓</i><i>⌁</i><i>☷</i></span>
        <span class="workflow-label" style="left:53%;top:69%">Handover & care</span>`
    }
  ];

  const layer = document.createElement('div');
  layer.className = 'workflow-3d-layer';
  scene.appendChild(layer);

  const render = () => {
    const raw = Number(visual.getAttribute('data-active-stage'));
    const index = Number.isFinite(raw) ? Math.max(0, Math.min(stages.length - 1, raw)) : 0;
    const item = stages[index];

    layer.classList.remove('is-changing');
    layer.innerHTML = `
      <div class="workflow-stage-kicker"><b>${String(index + 1).padStart(2,'0')}</b><span>${item.title}</span></div>
      <div class="workflow-world" data-wf-scene="${item.key}">
        <span class="workflow-floor"></span>
        ${item.markup}
      </div>
      <div class="workflow-caption"><strong>${item.title}</strong><span>${item.caption}</span></div>`;
    void layer.offsetWidth;
    layer.classList.add('is-changing');
  };

  new MutationObserver(render).observe(visual,{attributes:true,attributeFilter:['data-active-stage']});
  render();
})();