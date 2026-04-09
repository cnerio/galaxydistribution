<?php include APPROOT . '/views/inc/header.php'; ?>

<?php include APPROOT . '/views/inc/navbar.php'; ?> 
  <main class="px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
    <section class="mx-auto max-w-7xl" id="hearing-aid-compatibility">
      <div class="max-w-5xl">
        <h1 class="font-display text-3xl font-bold text-black sm:text-4xl">Hearing Aid Compatibility</h1>

        <div class="mt-6 space-y-6 text-[17px] leading-8 text-brand-slate">
          <p>The Federal Communications Commission (FCC) has implemented rules and a rating system for Hearing aid-compatible (HAC) devices designed to enable people who wear hearing aids to use these wireless telecommunications devices more effectively. The American National Standard Institute (ANSI) sets the standards for compatibility of digital wireless phones with hearing aids - ANSI standard C63.19.</p>

          <p>Previously, two sets of ANSI standards, an “M” rating for reducing interference making it easier to use the hearing aid microphone, and a “T” rating for reducing unwanted background noise. As both hearing aid and device technology has improved, to be considered “good” or “excellent,” wireless devices are expected to have a T3, T4 or M3, M4 rating.</p>

          <div>
            <p>Information about Hearing Aid Compatibility rules, can be found on the FCC’s website at:</p>
            <a href="https://www.fcc.gov/hearing-aid-compatibility-wireless-telephones" target="_blank" rel="noopener noreferrer" class="mt-2 inline-block text-brand-blue transition hover:underline">https://www.fcc.gov/hearing-aid-compatibility-wireless-telephones</a>
          </div>
        </div>

        <div class="mt-10 overflow-x-auto">
          <table class="min-w-full border border-slate-300 text-left text-[15px] text-brand-slate">
            <thead class="bg-brand-blue text-white">
              <tr>
                <th class="border border-slate-300 px-4 py-3 font-bold uppercase tracking-[0.06em]">Make</th>
                <th class="border border-slate-300 px-4 py-3 font-bold uppercase tracking-[0.06em]">Model</th>
                <th class="border border-slate-300 px-4 py-3 font-bold uppercase tracking-[0.06em]">Network Type</th>
                <th class="border border-slate-300 px-4 py-3 font-bold uppercase tracking-[0.06em]">HAC</th>
                <th class="border border-slate-300 px-4 py-3 font-bold uppercase tracking-[0.06em]">HAC Rating</th>
                <th class="border border-slate-300 px-4 py-3 font-bold uppercase tracking-[0.06em]">FCC ID</th>
              </tr>
            </thead>
            <tbody class="bg-white">
              <tr>
                <td class="border border-slate-300 px-4 py-3">BLU</td>
                <td class="border border-slate-300 px-4 py-3">C5L Max</td>
                <td class="border border-slate-300 px-4 py-3">GSM</td>
                <td class="border border-slate-300 px-4 py-3">YES</td>
                <td class="border border-slate-300 px-4 py-3">M4 , T3</td>
                <td class="border border-slate-300 px-4 py-3">YHLBLUC5LMAX</td>
              </tr>
              <tr>
                <td class="border border-slate-300 px-4 py-3">BLU</td>
                <td class="border border-slate-300 px-4 py-3">G33</td>
                <td class="border border-slate-300 px-4 py-3">GSM</td>
                <td class="border border-slate-300 px-4 py-3">YES</td>
                <td class="border border-slate-300 px-4 py-3">M3 , T3</td>
                <td class="border border-slate-300 px-4 py-3">YHLBLUG33092</td>
              </tr>
              <tr>
                <td class="border border-slate-300 px-4 py-3">Emblem</td>
                <td class="border border-slate-300 px-4 py-3">YES</td>
                <td class="border border-slate-300 px-4 py-3">GSM</td>
                <td class="border border-slate-300 px-4 py-3">YES</td>
                <td class="border border-slate-300 px-4 py-3">M3 , T4</td>
                <td class="border border-slate-300 px-4 py-3">XD6U318AA</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="mt-14" id="devices-no-longer-offered">
          <h2 class="font-display text-xl font-bold text-brand-coral underline decoration-[1.5px] underline-offset-4">Devices No Longer Offered</h2>

          <div class="mt-8 overflow-x-auto">
            <table class="min-w-[760px] border border-slate-300 text-left text-[15px] text-brand-slate sm:min-w-0 sm:w-[86%]">
              <thead class="bg-brand-blue text-white">
                <tr>
                  <th class="border border-slate-300 px-4 py-3 font-bold uppercase tracking-[0.06em]">Make</th>
                  <th class="border border-slate-300 px-4 py-3 font-bold uppercase tracking-[0.06em]">Model</th>
                  <th class="border border-slate-300 px-4 py-3 font-bold uppercase tracking-[0.06em]">Network Type</th>
                  <th class="border border-slate-300 px-4 py-3 font-bold uppercase tracking-[0.06em]">HAC</th>
                  <th class="border border-slate-300 px-4 py-3 font-bold uppercase tracking-[0.06em]">FCC ID</th>
                </tr>
              </thead>
              <tbody class="bg-white">
                <tr>
                  <td class="border border-slate-300 px-4 py-3">Axia</td>
                  <td class="border border-slate-300 px-4 py-3">QS5509A</td>
                  <td class="border border-slate-300 px-4 py-3">GSM</td>
                  <td class="border border-slate-300 px-4 py-3">NO</td>
                  <td class="border border-slate-300 px-4 py-3">2A06NA001</td>
                </tr>
                <tr>
                  <td class="border border-slate-300 px-4 py-3">Maxwest</td>
                  <td class="border border-slate-300 px-4 py-3">Astro 55R</td>
                  <td class="border border-slate-300 px-4 py-3">GSM</td>
                  <td class="border border-slate-300 px-4 py-3">NO</td>
                  <td class="border border-slate-300 px-4 py-3">2ASP8ASTRO55R</td>
                </tr>
                <tr>
                  <td class="border border-slate-300 px-4 py-3">Maxwest</td>
                  <td class="border border-slate-300 px-4 py-3">Nitro 55A</td>
                  <td class="border border-slate-300 px-4 py-3">GSM</td>
                  <td class="border border-slate-300 px-4 py-3">NO</td>
                  <td class="border border-slate-300 px-4 py-3">2ASP8NITRO55A</td>
                </tr>
                <tr>
                  <td class="border border-slate-300 px-4 py-3">Maxwest</td>
                  <td class="border border-slate-300 px-4 py-3">Nitro 55E</td>
                  <td class="border border-slate-300 px-4 py-3">GSM</td>
                  <td class="border border-slate-300 px-4 py-3">NO</td>
                  <td class="border border-slate-300 px-4 py-3">2ASP8NITRO55E</td>
                </tr>
                <tr>
                  <td class="border border-slate-300 px-4 py-3">Maxwest</td>
                  <td class="border border-slate-300 px-4 py-3">Nitro 5P</td>
                  <td class="border border-slate-300 px-4 py-3">GSM</td>
                  <td class="border border-slate-300 px-4 py-3">NO</td>
                  <td class="border border-slate-300 px-4 py-3">2ASP8NITRO5P</td>
                </tr>
                <tr>
                  <td class="border border-slate-300 px-4 py-3">True Slim</td>
                  <td class="border border-slate-300 px-4 py-3">5516D</td>
                  <td class="border border-slate-300 px-4 py-3">GSM</td>
                  <td class="border border-slate-300 px-4 py-3">NO</td>
                  <td class="border border-slate-300 px-4 py-3">2AL4OSSB-508</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include APPROOT . '/views/inc/footer.php'; ?>