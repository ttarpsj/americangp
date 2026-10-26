import './bootstrap';
document.addEventListener('DOMContentLoaded', () => {
  const menu = document.querySelector('[data-menu]');
  document.querySelector('[data-menu-button]')?.addEventListener('click', () => menu.classList.toggle('open'));
  document.querySelectorAll('.race-row').forEach(row => row.querySelector('button')?.addEventListener('click', () => row.classList.toggle('expanded')));
  const standings = {men:{team:[['1','Pacific Standard','12','15','—','—','—','27'],['2','Harborline Racing','15','10','—','—','—','25'],['3','Mile High Collective','10','12','—','—','—','22'],['4','Lone Star Tempo','8','8','—','—','—','16']],individual:[['1','Jordan Reed','MHC','2','48'],['2','Cameron Park','NST','2','42'],['3','Miles Carter','LFE','2','39'],['4','Evan Cole','CPV','2','34']]},women:{team:[['1','Harborline Racing','15','12','—','—','—','27'],['2','Pacific Standard','10','15','—','—','—','25'],['3','Lone Star Tempo','12','10','—','—','—','22'],['4','Lakefront Endurance','8','8','—','—','—','16']],individual:[['1','Maya Kim','PST','2','49'],['2','Nora James','HBR','2','45'],['3','Elena Torres','LST','2','40'],['4','Avery Brooks','GCR','2','35']]}};
  let division='men', view='team'; const table=document.querySelector('[data-standing-table]');
  const render=()=>{const rows=standings[division][view],head=view==='team'?['POS','TEAM','R1','R2','R3','R4','R5','TOTAL']:['POS','ATHLETE','TEAM','ROUNDS','POINTS'];table.innerHTML=`<thead><tr>${head.map(x=>`<th>${x}</th>`).join('')}</tr></thead><tbody>${rows.map(r=>`<tr>${r.map(x=>`<td>${x}</td>`).join('')}</tr>`).join('')}</tbody>`};
  document.querySelectorAll('[data-division]').forEach(b=>b.addEventListener('click',()=>{division=b.dataset.division;document.querySelectorAll('[data-division]').forEach(x=>x.classList.toggle('active',x===b));render()}));
  document.querySelectorAll('[data-view]').forEach(b=>b.addEventListener('click',()=>{view=b.dataset.view;document.querySelectorAll('[data-view]').forEach(x=>x.classList.toggle('active',x===b));render()}));render();
});
