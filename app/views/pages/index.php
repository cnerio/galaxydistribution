<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>

    <main>
      <section class="hero-panel relative isolate overflow-hidden bg-hero-glow">
        <div class="hero-stars absolute inset-0"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/20"></div>
        <button type="button" class="hero-nav absolute left-4 top-1/2 z-10 inline-flex h-12 w-12 items-center justify-center rounded-full border border-white/35 bg-black/30 text-xl text-white backdrop-blur-sm hover:bg-black/45 focus:opacity-100 focus:outline-none focus:ring-2 focus:ring-white/70 sm:left-6" data-hero-prev aria-label="Previous hero slide">
          &#8249;
        </button>
        <button type="button" class="hero-nav absolute right-4 top-1/2 z-10 inline-flex h-12 w-12 items-center justify-center rounded-full border border-white/35 bg-black/30 text-xl text-white backdrop-blur-sm hover:bg-black/45 focus:opacity-100 focus:outline-none focus:ring-2 focus:ring-white/70 sm:right-6" data-hero-next aria-label="Next hero slide">
          &#8250;
        </button>
        <div class="relative mx-auto flex min-h-[330px] max-w-7xl flex-col items-center justify-center px-4 py-16 text-center text-white sm:min-h-[360px] sm:px-6 lg:px-8">
          <img src="<?php echo URLROOT; ?>/img/Logo_White.png" alt="Galaxy" class="mb-4 h-24 w-auto opacity-95">
          
          <div class="relative mt-4 h-[160px] w-full max-w-3xl sm:h-[180px]">
            <div class="hero-slide is-active space-y-1 text-lg font-medium text-white/90 sm:text-[1.75rem] sm:leading-9 text-left" data-hero-slide>
              <h1 class="font-display text-4xl font-bold uppercase tracking-[0.04em] sm:text-5xl lg:text-6xl text-shadow">Galaxy <span style="color: #0c71c3;">noun</span></h1>
              <p class="text-shadow"><span style="color: #0c71c3;">gal-axy</span> ('ga-lək-sẽ)</p>
              <p class="text-shadow">An assemblage of brilliant or notable stars</p>
            </div>
            <div class="hero-slide space-y-1 text-lg font-medium text-white/90 sm:text-[1.75rem] sm:leading-9 text-center" data-hero-slide>
              <h1 class="font-display text-4xl font-bold uppercase tracking-[0.04em] sm:text-5xl  text-shadow">Acquisition to Delivery</h1>
              <p class="text-shadow">Field and Online Marketing</p>
              <p class="text-shadow">Airtime and Devices</p>
              <p class="text-shadow">Warehouse and Fulfillment</p>
            </div>
          </div>
          <div class="mt-8 flex items-center gap-2" aria-label="Hero slides">
            <span class="hero-dot is-active h-3 w-3 rounded-full border border-white/80 bg-transparent" data-hero-dot></span>
            <span class="hero-dot h-3 w-3 rounded-full border border-white/80 bg-transparent" data-hero-dot></span>
          </div>
        </div>
      </section>

      <section class="bg-white px-4 py-20 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-5xl">
          <div class="grid gap-5 md:grid-cols-3">
            <article class="rounded-sm border border-brand-border bg-white p-6 shadow-card shadow-slate-100/40">
              <h2 class="text-[1.55rem] font-bold text-brand-navy">Acquisition to Delivery</h2>
              <p class="mt-4 text-lg leading-8 text-slate-500">Galaxy Distribution will provide you with all or any of the pieces needed to grow your customer&nbsp;base.</p>
            </article>

            <article class="rounded-sm border border-brand-border bg-white p-6 shadow-card shadow-slate-100/40">
              <h2 class="text-[1.55rem] font-bold text-brand-navy">Field and Online Marketing</h2>
              <p class="mt-4 text-lg leading-8 text-slate-500">Galaxy Distribution has a vast network of field marketing resources in every state. We train and audit our network to make sure they are compliant with both program and provider requirements. Our online marketing team provides qualified leads that make it easier to convert to an enrollment. You can target one zip code or the entire United States and&nbsp;beyond.</p>
            </article>

            <article class="rounded-sm border border-brand-border bg-white p-6 shadow-card shadow-slate-100/40">
              <h2 class="text-[1.55rem] font-bold text-brand-navy">Device Procurement</h2>
              <p class="mt-4 text-lg leading-8 text-slate-500">Deeply forged partnerships with manufacturers and wholesalers across the United States let Galaxy secure devices for our customers at or below direct pricing. We offer warehouse and 3PL services in Oklahoma and Tennessee, which makes receiving and distributing more cost-effective for our&nbsp;customers.</p>
            </article>
          </div>

          <div class="mx-auto mt-6 grid max-w-3xl gap-5 md:grid-cols-2">
            <article class="rounded-sm border border-brand-border bg-white p-6 shadow-card shadow-slate-100/40">
              <h2 class="text-[1.55rem] font-bold text-brand-navy">Carrier Services</h2>
              <p class="mt-4 text-lg leading-8 text-slate-500">Galaxy Distribution is proud to offer competitively priced carrier services through our partnerships with major&nbsp;carriers.</p>
            </article>

            <article class="rounded-sm border border-brand-border bg-white p-6 shadow-card shadow-slate-100/40">
              <h2 class="text-[1.55rem] font-bold text-brand-navy">Fulfillment</h2>
              <p class="mt-4 text-lg leading-8 text-slate-500">Our fulfillment team in Shawnee, OK can handle all or any parts of your fulfillment process; whatever you need, we can provide. From enrollment to shipping and everything in&nbsp;between.</p>
            </article>
          </div>

          
        </div>
      </section>
    </main>

<?php require APPROOT . '/views/inc/footer.php'; ?>
  </div>

  <script>
    (function() {
      const slides = Array.from(document.querySelectorAll('[data-hero-slide]'));
      const dots = Array.from(document.querySelectorAll('[data-hero-dot]'));
      const prevButton = document.querySelector('[data-hero-prev]');
      const nextButton = document.querySelector('[data-hero-next]');
      const intervalMs = 6500;

      if (!slides.length || slides.length !== dots.length) {
        return;
      }

      let currentIndex = 0;
      let timerId;

      function setActiveSlide(index) {
        slides.forEach((slide, slideIndex) => {
          slide.classList.toggle('is-active', slideIndex === index);
        });

        dots.forEach((dot, dotIndex) => {
          dot.classList.toggle('is-active', dotIndex === index);
        });
      }

      function showNextSlide(step) {
        currentIndex = (currentIndex + step + slides.length) % slides.length;
        setActiveSlide(currentIndex);
      }

      function restartTimer() {
        window.clearInterval(timerId);
        timerId = window.setInterval(function() {
          showNextSlide(1);
        }, intervalMs);
      }

      setActiveSlide(currentIndex);
      restartTimer();

      if (prevButton) {
        prevButton.addEventListener('click', function() {
          showNextSlide(-1);
          restartTimer();
        });
      }

      if (nextButton) {
        nextButton.addEventListener('click', function() {
          showNextSlide(1);
          restartTimer();
        });
      }
    })();
  </script>
</body>
</html>


