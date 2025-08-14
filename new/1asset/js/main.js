// Parallax scroll (untuk elemen yg punya data-parallax)
(function(){
  const layers = document.querySelectorAll('[data-parallax]');
  function onScroll(){
    const y = window.scrollY || window.pageYOffset;
    layers.forEach(el=>{
      const speed = parseFloat(el.getAttribute('data-speed')) || 0.2;
      el.style.transform = `translate3d(0, ${y * speed}px, 0)`;
    });
  }
  onScroll();
  window.addEventListener('scroll', onScroll, {passive:true});
})();

// Tilt effect sederhana tanpa lib (untuk .tilt)
(function(){
  const tiltEls = document.querySelectorAll('.tilt[data-tilt]');
  const constrain = 15; // derajat max

  tiltEls.forEach((card)=>{
    let rect;
    function calc(e){
      rect = card.getBoundingClientRect();
      const cx = rect.left + rect.width/2;
      const cy = rect.top + rect.height/2;
      const dx = (e.clientX - cx) / (rect.width/2);
      const dy = (e.clientY - cy) / (rect.height/2);
      const rx = (+dy * constrain).toFixed(2);
      const ry = (-dx * constrain).toFixed(2);
      card.style.transform = `rotateX(${rx}deg) rotateY(${ry}deg) translateZ(0)`;
    }
    function reset(){
      card.style.transform = 'rotateX(0) rotateY(0)';
    }
    card.addEventListener('mousemove', calc);
    card.addEventListener('mouseleave', reset);
    card.addEventListener('touchmove', (e)=>{ if(e.touches[0]) calc(e.touches[0]) }, {passive:true});
    card.addEventListener('touchend', reset);
  });
})();

// Reveal on scroll
(function(){
  const items = document.querySelectorAll('.reveal');
  const io = new IntersectionObserver((entries)=>{
    entries.forEach(en=>{
      if(en.isIntersecting){ en.target.classList.add('is-visible'); io.unobserve(en.target); }
    });
  }, {threshold: 0.15});
  items.forEach(i=>io.observe(i));
})();
