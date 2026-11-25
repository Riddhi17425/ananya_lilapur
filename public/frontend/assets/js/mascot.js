(function(){
  var doc=document, reduce=window.matchMedia&&matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* hero greeter: click/tap to hop and cycle messages */
  var hero=doc.querySelector('.tiger-hero');
  if(hero){
    var b=hero.querySelector('.bubble'),i=0,msgs=[
      'Hi! Welcome to <b>Ananya</b>',
      'Every child is <b>born curious</b>!',
      'Admissions open for <b>April 2027</b>',
      'Let’s go on a <b>QUEST</b>!',
      'Growing beyond <b>what we are</b>'];
    hero.addEventListener('click',function(){
      i=(i+1)%msgs.length;b.innerHTML=msgs[i];
      hero.classList.remove('hop');void hero.offsetWidth;hero.classList.add('hop');
    });
    hero.addEventListener('animationend',function(e){if(e.animationName==='tgHop')hero.classList.remove('hop')});
  }

  /* section companions hop in when they scroll into view */
  var pals=[].slice.call(doc.querySelectorAll('.tiger-pal'));
  if(pals.length){
    if('IntersectionObserver' in window&&!reduce){
      var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.35});
      pals.forEach(function(p){io.observe(p)});
    } else pals.forEach(function(p){p.classList.add('in')});
  }

  /* floating helper: rises after the first screen, says hello once per visit */
  var help=doc.querySelector('.tiger-help');
  if(help){
    var said=false;
    function seen(){try{return sessionStorage.getItem('ananya-tiger')}catch(e){return null}}
    function mark(){try{sessionStorage.setItem('ananya-tiger','1')}catch(e){}}
    function onScroll(){
      var show=window.scrollY>window.innerHeight*.6;
      help.classList.toggle('show',show);
      if(show&&!said&&!seen()){said=true;mark();
        setTimeout(function(){help.classList.add('talk')},700);
        setTimeout(function(){help.classList.remove('talk')},5200)}
    }
    onScroll();window.addEventListener('scroll',onScroll,{passive:true});
  }
})();
