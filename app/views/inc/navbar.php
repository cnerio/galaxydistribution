<body class="font-sans text-slate-800 antialiased">
  <div class="min-h-screen bg-white">
    <div class="bg-brand-blue text-white">
      <div class="mx-auto flex max-w-7xl flex-col items-end justify-end gap-2 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.18em] sm:flex-row sm:px-6 lg:px-8">
        <a href="mailto:info@galaxydistribution.com" class="transition hover:text-sky-100"><i class="fa fa-envelope"></i> Email: info@galaxydistribution.com</a>
        <a href="tel:+18303345600" class="transition hover:text-sky-100"><i class="fa fa-phone-square"></i> Contact: (830) 334-5600</a>
      </div>
    </div>

    <header class="border-b border-slate-100 bg-white">
      <div class="mx-auto max-w-7xl px-4 py-5 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
        <a href="<?php echo URLROOT; ?>" class="flex items-center">
          <img src="<?php echo URLROOT; ?>/img/GalaxyLogo.png" alt="Galaxy Distribution" class="h-11 w-auto sm:h-14">
        </a>
        <button type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-slate-200 text-brand-navy transition hover:border-brand-blue hover:text-brand-blue focus:outline-none focus:ring-2 focus:ring-brand-blue/30 md:hidden" data-menu-toggle aria-expanded="false" aria-controls="mobile-nav" aria-label="Toggle navigation menu">
          <span class="sr-only">Open navigation menu</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
          </svg>
        </button>
        <nav class="hidden items-center gap-8 text-sm font-bold uppercase tracking-[0.16em] text-brand-navy md:flex">
          <a href="<?php echo URLROOT; ?>/pages/contact" class="transition hover:text-brand-blue">Support</a>
          <a href="<?php echo URLROOT; ?>/pages/work" class="transition hover:text-brand-blue">Work With Us</a>
        </nav>
      </div>
        <nav id="mobile-nav" class="mobile-nav hidden flex-col gap-3 border-t border-slate-100 pt-4 text-sm font-bold uppercase tracking-[0.16em] text-brand-navy md:hidden">
          <a href="<?php echo URLROOT; ?>/pages/contact" class="transition hover:text-brand-blue">Support</a>
          <a href="<?php echo URLROOT; ?>/pages/work" class="transition hover:text-brand-blue">Work With Us</a>
        </nav>
      </div>
    </header>

