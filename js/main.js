/* ============================================================
   RAW GLOBAL TECH · shared site-wide behaviour
   ============================================================ */
(function () {
  'use strict';

  /* ===== Theme controller: Auto (device) / Light / Dark ===== */
  var THEME_KEY = 'rgt-theme';
  var themeMedia = window.matchMedia ? window.matchMedia('(prefers-color-scheme: light)') : null;

  function getStoredTheme() {
    try { return localStorage.getItem(THEME_KEY); } catch (err) { return null; }
  }
  function storeTheme(value) {
    try { localStorage.setItem(THEME_KEY, value); } catch (err) { /* storage unavailable */ }
  }
  function currentMode() {
    var stored = getStoredTheme();
    return (stored === 'light' || stored === 'dark') ? stored : 'auto';
  }
  function resolveTheme(mode) {
    if (mode === 'light' || mode === 'dark') return mode;
    return themeMedia && themeMedia.matches ? 'light' : 'dark';
  }
  function syncThemeToggle(mode) {
    var btn = document.getElementById('themeToggle');
    if (!btn) return;
    var config = {
      auto:  { icon: 'fa-circle-half-stroke', label: 'Auto',  title: 'Theme: Auto (follows your device)' },
      light: { icon: 'fa-sun',                label: 'Light', title: 'Theme: Light' },
      dark:  { icon: 'fa-moon',               label: 'Dark',  title: 'Theme: Dark' }
    }[mode];
    if (!config) config = { icon: 'fa-circle-half-stroke', label: 'Auto', title: 'Theme: Auto (follows your device)' };
    var icon = btn.querySelector('i');
    var label = btn.querySelector('.theme-toggle-label');
    if (icon) icon.setAttribute('class', 'fas ' + config.icon);
    if (label) label.textContent = config.label;
    btn.dataset.mode = mode;
    btn.title = config.title;
    btn.setAttribute('aria-label', 'Change theme. Current: ' + config.label);
  }
  function syncThemeColorMeta(resolved) {
    var meta = document.querySelector('meta[name="theme-color"]');
    if (!meta) {
      meta = document.createElement('meta');
      meta.setAttribute('name', 'theme-color');
      document.head.appendChild(meta);
    }
    meta.setAttribute('content', resolved === 'light' ? '#eef4fa' : '#0a0e1a');
  }
  function applyTheme() {
    var mode = currentMode();
    var resolved = resolveTheme(mode);
    document.documentElement.setAttribute('data-theme', resolved);
    syncThemeToggle(mode);
    syncThemeColorMeta(resolved);
  }
  document.addEventListener('click', function (event) {
    var btn = event.target && event.target.closest ? event.target.closest('#themeToggle') : null;
    if (!btn) return;
    var order = ['auto', 'light', 'dark'];
    var next = order[(order.indexOf(btn.dataset.mode || 'auto') + 1) % order.length];
    storeTheme(next);
    applyTheme();
    if (window.showToast) {
      window.showToast('Theme set to ' + next + (next === 'auto' ? ' \u2014 following your device.' : '.'), 'info');
    }
  });
  if (themeMedia) {
    var onSystemThemeChange = function () {
      if (currentMode() === 'auto') applyTheme();
    };
    if (themeMedia.addEventListener) themeMedia.addEventListener('change', onSystemThemeChange);
    else if (themeMedia.addListener) themeMedia.addListener(onSystemThemeChange);
  }
  applyTheme();

  /* ===== AOS scroll animations ===== */
  if (window.AOS) {
    AOS.init({ duration: 800, easing: 'ease-in-out', once: true, offset: 100 });
  }

  /* ===== Navbar shadow on scroll ===== */
  const nav = document.getElementById('mainNav');
  function syncNavbar() {
    if (!nav) return;
    if (window.scrollY > 50) nav.classList.add('scrolled');
    else nav.classList.remove('scrolled');
  }
  window.addEventListener('scroll', syncNavbar);
  syncNavbar();

  /* ===== Hero particles (home page only — no-op elsewhere) ===== */
  (function generateParticles() {
    const container = document.getElementById('particleContainer');
    if (!container) return;
    for (let i = 0; i < 60; i++) {
      const p = document.createElement('div');
      p.classList.add('particle');
      const size = Math.random() * 5 + 2;
      p.style.width = size + 'px';
      p.style.height = size + 'px';
      const rand = () => Math.random() * 100 + 'vw';
      const rand2 = () => Math.random() * 100 + 'vh';
      p.style.setProperty('--x-start', rand()); p.style.setProperty('--y-start', rand2());
      p.style.setProperty('--x-mid1', rand()); p.style.setProperty('--y-mid1', rand2());
      p.style.setProperty('--x-mid2', rand()); p.style.setProperty('--y-mid2', rand2());
      p.style.setProperty('--x-mid3', rand()); p.style.setProperty('--y-mid3', rand2());
      p.style.setProperty('--x-mid4', rand()); p.style.setProperty('--y-mid4', rand2());
      p.style.setProperty('--x-end', rand()); p.style.setProperty('--y-end', rand2());
      p.style.animationDelay = Math.random() * 20 + 's';
      p.style.animationDuration = (Math.random() * 15 + 20) + 's';
      container.appendChild(p);
    }
  })();

  /* ===== Floating decorative shapes in hero ===== */
  (function addShapes() {
    const hero = document.querySelector('.hero');
    if (!hero) return;
    const chars = ['✦', '◆', '▲', '●', '★'];
    for (let i = 0; i < 6; i++) {
      const s = document.createElement('div');
      s.className = 'floating-shape';
      s.textContent = chars[i % chars.length];
      s.style.fontSize = (Math.random() * 25 + 20) + 'px';
      s.style.left = (Math.random() * 90 + 5) + '%';
      s.style.top = (Math.random() * 90 + 5) + '%';
      s.style.animation = 'floatShape ' + (Math.random() * 15 + 20) + 's ease-in-out infinite';
      s.style.animationDelay = Math.random() * 10 + 's';
      hero.appendChild(s);
    }
  })();

  /* ===== Auto year in footers ===== */
  document.querySelectorAll('.footer-year').forEach(function (el) {
    el.textContent = new Date().getFullYear();
  });

  /* ===== Toast notifications ===== */
  window.showToast = function (message, type) {
    type = type || 'success';
    let container = document.getElementById('toastContainer');
    if (!container) {
      container = document.createElement('div');
      container.id = 'toastContainer';
      container.className = 'toast-container';
      document.body.appendChild(container);
    }
    const toast = document.createElement('div');
    toast.className = 'toast-custom ' + type;
    const icons = { success: 'fa-check-circle', error: 'fa-exclamation-circle', info: 'fa-info-circle' };
    toast.innerHTML =
      '<div class="d-flex align-items-center">' +
        '<span class="toast-icon"><i class="fas ' + (icons[type] || icons.success) + '"></i></span>' +
        '<span style="flex:1;">' + message + '</span>' +
        '<button type="button" class="toast-close" onclick="this.closest(\'.toast-custom\').remove()">&times;</button>' +
      '</div>';
    container.appendChild(toast);
    setTimeout(function () {
      if (toast.parentElement) {
        toast.style.animation = 'slideOutRight 0.5s ease forwards';
        setTimeout(function () { toast.remove(); }, 500);
      }
    }, 6000);
  };

  /* ===== Contact form (contact.html) — opens mail client to rawglobalt@gmail.com ===== */
  window.handleContact = function (e) {
    e.preventDefault();
    const nameEl = document.getElementById('contactName');
    const emailEl = document.getElementById('contactEmail');
    const subjectEl = document.getElementById('contactSubject');
    const messageEl = document.getElementById('contactMessage');
    if (!nameEl || !emailEl || !subjectEl || !messageEl) return false;

    const name = nameEl.value.trim();
    const email = emailEl.value.trim();
    const subject = subjectEl.value.trim();
    const message = messageEl.value.trim();

    if (!name || !email || !subject || !message) {
      window.showToast('Please fill in all required fields.', 'error');
      return false;
    }
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      window.showToast('Please enter a valid email address.', 'error');
      return false;
    }

    const submitBtn = document.getElementById('submitBtn');
    const spinner = document.getElementById('sendSpinner');

    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
    }

    const mailtoSubject = encodeURIComponent('RAW GLOBAL TECH Contact: ' + subject);
    const mailtoBody = encodeURIComponent(
      'Name: ' + name + '\n' +
      'Email: ' + email + '\n\n' +
      'Message:\n' + message
    );
    window.open('mailto:rawglobalt@gmail.com?subject=' + mailtoSubject + '&body=' + mailtoBody, '_blank');

    setTimeout(function () {
      if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Send Message';
      }
      if (spinner) spinner.classList.add('d-none');
    }, 3000);

    window.showToast('Thank you! Your email client is opening. Please send the message.', 'success');

    nameEl.value = '';
    emailEl.value = '';
    subjectEl.value = '';
    messageEl.value = '';

    return false;
  };
})();
