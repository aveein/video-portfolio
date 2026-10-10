(() => {
  const $ = (s, c = document) => [...c.querySelectorAll(s)];

  // scroll reveal (staggered per parent)
  $('.reveal').forEach(el => {
    const sib = [...el.parentElement.children].filter(c => c.classList.contains('reveal'));
    el.style.setProperty('--rd', (sib.indexOf(el) % 6) * 0.08 + 's');
  });
  const io = new IntersectionObserver(es => es.forEach(e => {
    if (!e.isIntersecting) return;
    e.target.classList.add('in');
    $('.bar', e.target).forEach(b => b.style.width = b.dataset.w + '%');
    io.unobserve(e.target);
  }), { threshold: .15 });
  $('.reveal').forEach(el => io.observe(el));

  // progress bar + cursor glow
  const bar = document.getElementById('progress');
  addEventListener('scroll', () => {
    bar.style.width = scrollY / (document.documentElement.scrollHeight - innerHeight) * 100 + '%';
  }, { passive: true });
  const glow = document.getElementById('cursor-glow');
  addEventListener('pointermove', e => { glow.style.left = e.clientX + 'px'; glow.style.top = e.clientY + 'px'; });

  // mobile menu
  const mm = document.getElementById('mobile-menu');
  document.getElementById('menu-btn').onclick = () => mm.classList.toggle('hidden');
  $('a', mm).forEach(a => a.onclick = () => mm.classList.add('hidden'));

  // hover preview + 3D tilt
  $('.video-card').forEach(card => {
    const v = card.querySelector('video');
    card.addEventListener('pointerenter', () => { if (!v.src) v.src = v.dataset.src; v.play().catch(() => {}); });
    card.addEventListener('pointerleave', () => { v.pause(); card.style.transform = ''; });
    card.addEventListener('pointermove', e => {
      const r = card.getBoundingClientRect();
      const x = (e.clientX - r.left) / r.width - .5, y = (e.clientY - r.top) / r.height - .5;
      card.style.transform = `perspective(800px) rotateY(${x * 8}deg) rotateX(${-y * 8}deg) scale(1.02)`;
    });
  });

  // lightbox
  const lb = document.getElementById('lightbox'), lv = document.getElementById('lb-video');
  const close = () => { lb.classList.remove('open'); lv.pause(); lv.removeAttribute('src'); lv.load(); };
  $('.video-card').forEach(c => c.addEventListener('click', () => {
    lv.src = c.dataset.video;
    document.getElementById('lb-title').textContent = c.dataset.title;
    lb.classList.add('open'); lv.play().catch(() => {});
  }));
  document.getElementById('lb-close').onclick = close;
  lb.addEventListener('click', e => { if (e.target === lb) close(); });
  addEventListener('keydown', e => { if (e.key === 'Escape') close(); });
})();
