<?php include APPROOT.'/views/inc/header.php'; ?>
<?php include APPROOT.'/views/inc/navbar.php'; ?>

<main class="bg-white px-4 py-16 sm:px-6 lg:px-8">
  <section class="mx-auto max-w-3xl">
    <div class="rounded-2xl border border-slate-200 bg-white p-8 text-center shadow-card sm:p-12">
      <p class="text-sm font-semibold uppercase tracking-[0.22em] text-brand-blue">Application Received</p>
      <h1 class="mt-4 font-display text-4xl font-bold uppercase tracking-[0.03em] text-brand-navy sm:text-5xl">Thank You</h1>
      <p class="mt-5 text-lg leading-8 text-brand-slate">We received your Work With Us information successfully. Our team will review your application and contact you if additional details are needed.</p>

      <!-- <?php //if(!empty($data['newhire_id'])) : ?>
        <div class="mt-8 rounded-xl border border-slate-200 bg-slate-50 px-5 py-4">
          <p class="text-sm uppercase tracking-[0.18em] text-slate-500">Reference ID</p>
          <p class="mt-2 text-2xl font-bold tracking-[0.08em] text-brand-navy"><?php //echo htmlspecialchars($data['newhire_id']); ?></p>
        </div>
      <?php //endif; ?> -->

      <div class="mt-8 space-y-3 text-sm text-brand-slate">
        <p>Please keep this information for your records.</p>
        <p>You can return to the homepage at any time while we process your submission.</p>
      </div>

      <div class="mt-10">
        <a href="<?php echo URLROOT; ?>" class="inline-flex items-center justify-center rounded-full bg-brand-blue px-6 py-3 text-sm font-bold uppercase tracking-[0.16em] text-white transition hover:bg-sky-700">Back to Home</a>
      </div>
    </div>
  </section>
</main>

<?php include APPROOT.'/views/inc/footer.php'; ?>