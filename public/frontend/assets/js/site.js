(function(){
  var doc=document, root=doc.documentElement, reduce=window.matchMedia&&matchMedia('(prefers-reduced-motion: reduce)').matches;
  function $(s,c){return (c||doc).querySelector(s)} function $$(s,c){return [].slice.call((c||doc).querySelectorAll(s))}
  function store(k,v){try{if(v===undefined)return sessionStorage.getItem(k);sessionStorage.setItem(k,v)}catch(e){return null}}

  /* scalloped blobs (stage cards) */
  function blob(R,amp,n,ph){var p=[],N=160;for(var i=0;i<N;i++){var t=2*Math.PI*i/N,r=R*(1+amp*Math.sin(n*t+ph)+.022*Math.sin(3*t+1.3));p.push((215+r*Math.cos(t)).toFixed(1)+' '+(215+r*Math.sin(t)).toFixed(1))}return 'M'+p.join('L')+'Z'}
  $$('svg[data-blob]').forEach(function(s,i){var ph=.4+i*.9,ns='http://www.w3.org/2000/svg';
    var a=doc.createElementNS(ns,'path');a.setAttribute('d',blob(205,.05,9,ph));a.setAttribute('fill',s.dataset.blob);
    var b=doc.createElementNS(ns,'path');b.setAttribute('d',blob(184,.05,9,ph));b.setAttribute('fill','none');b.setAttribute('stroke',s.dataset.dash);b.setAttribute('stroke-width','1.6');b.setAttribute('stroke-dasharray','9 7');
    s.appendChild(a);s.appendChild(b)});

  /* header + nav */
  var header=$('.site-header');
  var hdrOn=false;function onScroll(){if(!header)return;var on=window.scrollY>60;if(on!==hdrOn){hdrOn=on;header.classList.toggle('scrolled',on)}}
  onScroll();window.addEventListener('scroll',onScroll,{passive:true});
  var toggle=$('.menu-toggle'), mq=window.matchMedia('(max-width:1380px)');
  toggle&&toggle.addEventListener('click',function(){var o=doc.body.classList.toggle('nav-open');toggle.setAttribute('aria-expanded',o);toggle.setAttribute('aria-label',o?'Close menu':'Open menu')});
  $$('.main-nav a').forEach(function(a){a.addEventListener('click',function(e){
    var li=a.parentElement;
    if(mq.matches&&li.classList.contains('has-dd')&&a.classList.contains('nav-link')&&!li.classList.contains('open')){e.preventDefault();li.classList.add('open');return}
    doc.body.classList.remove('nav-open');toggle&&toggle.setAttribute('aria-expanded','false')})});
  var top=$('.to-top'); top&&top.addEventListener('click',function(){window.scrollTo({top:0,behavior:reduce?'auto':'smooth'})});

  /* word pop headline */
  $$('.word-pop').forEach(function(h){var n=0;
    (function walk(el){[].slice.call(el.childNodes).forEach(function(c){
      if(c.nodeType===3){var parts=c.textContent.split(/(\s+)/),f=doc.createDocumentFragment();
        parts.forEach(function(p){if(!p)return;if(/^\s+$/.test(p)){f.appendChild(doc.createTextNode(p))}else{var s=doc.createElement('span');s.className='w';s.style.setProperty('--w',n++);s.textContent=p;f.appendChild(s)}});
        el.replaceChild(f,c)}else if(c.nodeType===1&&c.tagName!=='BR')walk(c)})})(h)});

  /* reveal on scroll */
  if('IntersectionObserver' in window&&!reduce){
    $$('[data-stagger]').forEach(function(g){[].slice.call(g.children).forEach(function(c,i){if(!c.classList.contains('rv'))c.classList.add('rv');c.style.setProperty('--i',i)})});
    var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.12,rootMargin:'0px 0px -30px 0px'});
    $$('.rv,.anim').forEach(function(el){io.observe(el)});
  } else {$$('.rv,.anim').forEach(function(el){el.classList.add('in')})}

  /* parallax decorations */
  var par=$$('[data-speed]');
  if(par.length&&!reduce){var ticking=false;
    function paint(){var vh=window.innerHeight,m=par.map(function(el){var r=el.getBoundingClientRect();return[el,r.top+r.height/2-vh/2]});m.forEach(function(p){p[0].style.translate='0 '+(p[1]*parseFloat(p[0].dataset.speed)).toFixed(1)+'px'});ticking=false}
    window.addEventListener('scroll',function(){if(!ticking){requestAnimationFrame(paint);ticking=true}},{passive:true});paint()}

  /* card tilt on pointer */
  if(!reduce&&window.matchMedia('(hover:hover)').matches){$$('.tilt-hover').forEach(function(c){
    c.addEventListener('pointermove',function(e){var r=c.getBoundingClientRect(),x=(e.clientX-r.left)/r.width-.5,y=(e.clientY-r.top)/r.height-.5;c.style.transform='perspective(800px) rotateY('+(x*6)+'deg) rotateX('+(-y*6)+'deg) translateY(-4px)'});
    c.addEventListener('pointerleave',function(){c.style.transform=''})})}

  /* marquee: duplicate track for a seamless loop */
  $$('.marquee-track').forEach(function(t){t.innerHTML+=t.innerHTML;[].slice.call(t.children).slice(t.children.length/2).forEach(function(c){c.setAttribute('aria-hidden','true')})});

  /* forms: validation and sending are in forms.js */

  /* enquiry modal */
  var modal=$('#enquiry-modal'),lastFocus=null;
  function openModal(opts){if(!modal)return;opts=opts||{};lastFocus=doc.activeElement;
    var t=$('[data-m-title]',modal),tx=$('[data-m-text]',modal),src=$('[data-m-source]',modal),cls=$('#m-class',modal),nt=$('[data-notify]',modal);
    t.textContent=opts.title||'Plan Your Child’s Journey With Ananya';
    tx.textContent=opts.text||'Share a few details and our admissions team will call you within one working day to answer your questions and arrange a campus visit.';
    src.value=opts.source||'enquire';
    if(nt){nt.hidden=!opts.notify;if(opts.notify)cls.value=nt.value||nt.textContent}
    var f=$('form',modal),done=$('.form-done',modal);if(done){done.remove();f.reset();f.hidden=false}
    if(opts.notify&&nt)cls.value=nt.textContent;
    modal.hidden=false;doc.body.classList.add('modal-open');setTimeout(function(){var i=(opts&&opts.source==='auto-popup')?$('button,[tabindex]',modal):$('#m-parent',modal);i&&i.focus()},60);store('ananya-popup','1')}
  function closeModal(){if(!modal||modal.hidden)return;modal.hidden=true;doc.body.classList.remove('modal-open');lastFocus&&lastFocus.focus&&lastFocus.focus()}
  doc.addEventListener('click',function(e){var b=e.target.closest('[data-enquire]');if(b){e.preventDefault();openModal({title:b.dataset.title,text:b.dataset.text,source:b.dataset.source,notify:b.hasAttribute('data-notify-me')})}
    if(e.target.closest('[data-close]'))closeModal()});
  doc.addEventListener('keydown',function(e){if(e.key==='Escape'){closeModal();closeLb()}
    if(e.key==='Tab'&&modal&&!modal.hidden){var f=$$('button,input,select,textarea,a[href]',modal).filter(function(x){return !x.hidden&&x.offsetParent!==null});if(!f.length)return;var a=f[0],z=f[f.length-1];
      if(e.shiftKey&&doc.activeElement===a){e.preventDefault();z.focus()}else if(!e.shiftKey&&doc.activeElement===z){e.preventDefault();a.focus()}}});
  if(modal&&!store('ananya-popup')&&!store('ananya-enquired')){setTimeout(function(){if(!store('ananya-enquired')&&!doc.body.classList.contains('modal-open'))openModal({source:'auto-popup'})},8000)}

  /* tabs (academics stages, generic) */
  $$('[data-tabs]').forEach(function(box){var tabs=$$('[role=tab]',box);
    function show(id,scroll){var hit=false;tabs.forEach(function(t){var on=t.getAttribute('aria-controls')===id;if(on)hit=true;t.setAttribute('aria-selected',on);t.tabIndex=on?0:-1;var p=doc.getElementById(t.getAttribute('aria-controls'));if(p)p.hidden=!on});
      if(hit&&scroll)box.scrollIntoView({behavior:reduce?'auto':'smooth',block:'start'});return hit}
    tabs.forEach(function(t,i){t.addEventListener('click',function(){show(t.getAttribute('aria-controls'))});
      t.addEventListener('keydown',function(e){var d=e.key==='ArrowRight'?1:e.key==='ArrowLeft'?-1:0;if(!d)return;var n=tabs[(i+d+tabs.length)%tabs.length];n.focus();show(n.getAttribute('aria-controls'))})});
    function fromHash(){var h=location.hash.slice(1);if(h&&doc.getElementById('panel-'+h))show('panel-'+h,true)}
    window.addEventListener('hashchange',fromHash);fromHash()});

  /* one-open-at-a-time accordions */
  $$('.faq-list').forEach(function(l){$$('details',l).forEach(function(d){d.addEventListener('toggle',function(){if(d.open)$$('details',l).forEach(function(o){if(o!==d)o.open=false})})})});

  /* careers: Apply Now prefills the position */
  $$('[data-position]').forEach(function(b){b.addEventListener('click',function(){var s=$('#cv-position');if(s){s.value=b.dataset.position;var f=$('#apply');f&&f.scrollIntoView({behavior:reduce?'auto':'smooth'});setTimeout(function(){$('#cv-name')&&$('#cv-name').focus()},500)}})});

  /* contact: subject from hash (contact.html#transport etc.) */
  var subj=$('#g-subject');if(subj){var map={transport:'Transport',careers:'Careers',admissions:'Admissions'};var k=location.hash.slice(1);if(map[k])subj.value=map[k]}

  /* gallery filter + lightbox */
  var lb=null;
  function closeLb(){if(lb){lb.remove();lb=null;doc.body.classList.remove('modal-open')}}
  $$('.filters').forEach(function(fb){var items=$$('.g-item',doc.getElementById(fb.dataset.for));
    $$('button',fb).forEach(function(b){b.addEventListener('click',function(){$$('button',fb).forEach(function(x){x.setAttribute('aria-pressed',x===b)});var c=b.dataset.cat;
      items.forEach(function(it){it.classList.toggle('out',c!=='all'&&it.dataset.cat!==c)});var empty=doc.getElementById(fb.dataset.for+'-empty');if(empty)empty.hidden=items.some(function(it){return !it.classList.contains('out')})})})});
  $$('.g-item').forEach(function(it){it.tabIndex=0;it.setAttribute('role','button');
    function open(){var img=$('img',it);lb=doc.createElement('div');lb.className='lightbox';lb.innerHTML='<button type="button" aria-label="Close">×</button><div><img alt=""><p></p></div>';$('img',lb).src=it.dataset.full||img.src;$('img',lb).alt=img.alt;$('p',lb).textContent=$('figcaption span',it).textContent;
      lb.addEventListener('click',function(e){if(e.target===lb||e.target.tagName==='BUTTON')closeLb()});doc.body.appendChild(lb);doc.body.classList.add('modal-open');$('button',lb).focus()}
    it.addEventListener('click',open);it.addEventListener('keydown',function(e){if(e.key==='Enter'||e.key===' '){e.preventDefault();open()}})});
  /* footer waves take the colour of the section above them */
  (function(){var w=$('.f-waves'),secs=$$('main > section');if(!w||!secs.length)return;var last=secs[secs.length-1].classList,
    c=last.contains('bg-sky')?'#deebf7':last.contains('bg-peach')?'#fdf1e6':last.contains('bg-navy')?'#0b2535':'';
    if(c)w.style.setProperty('--footer-top',c)})();
})();
