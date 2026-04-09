    <footer class="bg-[#2a2f36] text-slate-300">
      <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-5 text-center text-sm sm:px-6 md:flex-row md:items-center md:justify-between md:text-left lg:px-8">
        <p>Galaxy Distribution LLC &copy; 2026.</p>
        <div class="flex flex-wrap items-center justify-center gap-3 md:justify-end">
          <a href="<?php echo URLROOT; ?>/privacy" class="transition hover:text-white">Privacy Policy</a>
          <span class="hidden text-slate-500 md:inline">|</span>
          <a href="<?php echo URLROOT; ?>/terms" class="transition hover:text-white">Terms of Service</a>
          <span class="hidden text-slate-500 md:inline">|</span>
          <a href="<?php echo URLROOT; ?>/pages/accessibility" class="transition hover:text-white">Accessibility</a>
        </div>
      </div>
    </footer>

<script>
    (function(){
    const menuToggle = document.querySelector('[data-menu-toggle]');
    const mobileNav = document.querySelector('#mobile-nav');

      if (menuToggle && mobileNav) {
        menuToggle.addEventListener('click', function() {
          const isOpen = mobileNav.classList.toggle('is-open');
          mobileNav.classList.toggle('hidden', !isOpen);
          menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
      }

      
    })();
</script>