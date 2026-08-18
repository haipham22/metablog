import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

// metablog theme toggle (ported from metablog-free js/main.js)
const saved = localStorage.getItem('theme');
document.documentElement.setAttribute('data-theme', saved === 'dark' ? 'dark' : 'light');

document.addEventListener('click', (e) => {
  const btn = e.target.closest('[data-theme-toggle]');
  if (!btn) return;
  const next = document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
  localStorage.setItem('theme', next);
  document.documentElement.setAttribute('data-theme', next);
});

// hero slider (scroll-snap + autoplay)
document.querySelectorAll('[data-hero-slider]').forEach((slider) => {
  const track = slider.querySelector('[data-hero-track]');
  const slides = [...track.children];
  const dotsBox = slider.querySelector('[data-hero-dots]');
  let index = 0;
  let timer;

  const dots = slides.map((_, i) => {
    const dot = document.createElement('button');
    dot.type = 'button';
    dot.setAttribute('aria-label', `Slide ${i + 1}`);
    dot.className = 'h-2 w-2 cursor-pointer rounded-full bg-base-content/30 transition';
    dot.addEventListener('click', () => go(i));
    dotsBox.appendChild(dot);
    return dot;
  });

  const sync = () => {
    dots.forEach((d, i) => d.classList.toggle('!bg-primary', i === index));
  };

  const go = (n) => {
    index = (n + slides.length) % slides.length;
    track.scrollTo({ left: slides[index].offsetLeft, behavior: 'smooth' });
    sync();
  };

  slider.querySelector('[data-hero-prev]').addEventListener('click', () => go(index - 1));
  slider.querySelector('[data-hero-next]').addEventListener('click', () => go(index + 1));
  track.addEventListener('scroll', () => {
    index = Math.round(track.scrollLeft / track.clientWidth);
    sync();
  }, { passive: true });

  const play = () => { timer = setInterval(() => go(index + 1), 5000); };
  const stop = () => clearInterval(timer);
  slider.addEventListener('mouseenter', stop);
  slider.addEventListener('mouseleave', play);
  sync();
  play();
});
