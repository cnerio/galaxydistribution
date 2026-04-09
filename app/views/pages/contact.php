<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

  <main class="px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
    <section class="mx-auto max-w-7xl">
      <div class="grid gap-12 lg:grid-cols-[1.02fr_0.98fr] lg:gap-10 xl:gap-16">
        <div id="contact-form" class="max-w-xl">
          <h1 class="font-display text-4xl font-bold uppercase tracking-[0.04em] text-brand-blue sm:text-[2.65rem]">Contacting Us</h1>

          <form id="contactForm" class="mt-10 space-y-7" method="post" novalidate>
            <div>
              <label for="first-name" class="mb-2 block text-sm font-semibold uppercase tracking-[0.14em] text-brand-slate">First Name*</label>
              <input id="first-name" name="first_name" type="text" class="h-14 w-full border border-slate-300 px-4 text-lg outline-none transition focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/15" aria-label="First Name" required>
            </div>

            <div>
              <label for="last-name" class="mb-2 block text-sm font-semibold uppercase tracking-[0.14em] text-brand-slate">Last Name*</label>
              <input id="last-name" name="last_name" type="text" class="h-14 w-full border border-slate-300 px-4 text-lg outline-none transition focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/15" aria-label="Last Name" required>
            </div>

            <div>
              <label for="phone" class="mb-2 block text-sm font-semibold uppercase tracking-[0.14em] text-brand-slate">Phone*</label>
              <input id="phone" name="phone" type="tel" class="h-14 w-full border border-slate-300 px-4 text-lg outline-none transition focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/15" aria-label="Phone" required>
            </div>

            <div>
              <label for="email" class="mb-2 block text-sm font-semibold uppercase tracking-[0.14em] text-brand-slate">Your Email*</label>
              <input id="email" name="email" type="email" class="h-14 w-full border border-slate-300 px-4 text-lg outline-none transition focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/15" aria-label="Email" required>
            </div>

            <div id="contact-form-response" class="hidden rounded-md border px-4 py-3 text-sm font-medium"></div>

            <button id="contact-submit" type="submit" class="inline-flex h-14 w-full items-center justify-center bg-brand-blue px-6 text-base font-bold uppercase tracking-[0.18em] text-white transition hover:bg-[#0965b0] focus:outline-none focus:ring-2 focus:ring-brand-blue focus:ring-offset-2">Submit</button>
          </form>
        </div>

        <div id="faq" class="pt-1">
          <div class="space-y-7">
            <details class="group border-b border-transparent pb-2" open>
              <summary class="flex cursor-pointer list-none items-start gap-4 font-display text-[1.7rem] font-bold uppercase leading-8 text-brand-blue marker:content-none">
                <span class="mt-0.5 text-4xl font-normal leading-none text-black transition group-open:rotate-45">+</span>
                <span>How do I sign up ?</span>
              </summary>
              <div class="pl-11 pt-3 text-lg leading-8 text-brand-slate">
                Complete the contact form and our team will follow up with the next steps for your enrollment or account request.
              </div>
            </details>

            <details class="group border-b border-transparent pb-2">
              <summary class="flex cursor-pointer list-none items-start gap-4 font-display text-[1.7rem] font-bold uppercase leading-8 text-brand-blue marker:content-none">
                <span class="mt-0.5 text-4xl font-normal leading-none text-black transition group-open:rotate-45">+</span>
                <span>Is this really the same towers, same coverage, same equipment, same quality and same speeds?</span>
              </summary>
              <div class="pl-11 pt-3 text-lg leading-8 text-brand-slate">
                Yes. Service plans use the same major carrier infrastructure, so coverage and overall network performance remain comparable.
              </div>
            </details>

            <details class="group border-b border-transparent pb-2">
              <summary class="flex cursor-pointer list-none items-start gap-4 font-display text-[1.7rem] font-bold uppercase leading-8 text-brand-blue marker:content-none">
                <span class="mt-0.5 text-4xl font-normal leading-none text-black transition group-open:rotate-45">+</span>
                <span>What will happen if my payment is unable to be processed?</span>
              </summary>
              <div class="pl-11 pt-3 text-lg leading-8 text-brand-slate">
                We will notify you and provide options to update your payment method so service is not interrupted.
              </div>
            </details>

            <details class="group border-b border-transparent pb-2" open>
              <summary class="flex cursor-pointer list-none items-start gap-4 font-display text-[1.7rem] font-bold uppercase leading-8 text-brand-blue marker:content-none">
                <span class="mt-0.5 text-4xl font-normal leading-none text-black transition group-open:rotate-45">+</span>
                <span>How long does it take to receive my SIM card or device?</span>
              </summary>
              <div class="pl-11 pt-3 text-lg leading-8 text-brand-slate">
                Your device and SIM typically arrives within 5-7 business days.
              </div>
            </details>
          </div>
        </div>
      </div>
    </section>
  </main>

<style>
  #contactForm label.error {
    display: block;
    margin-top: 0.5rem;
    color: #dc2626;
    font-size: 0.875rem;
    font-weight: 500;
    text-transform: none;
    letter-spacing: normal;
  }

  #contactForm input.error {
    border-color: #dc2626;
  }
</style>

<script src="<?php echo URLROOT; ?>/js/jquery.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/jquery.mask.js"></script>
<script src="<?php echo URLROOT; ?>/js/jquery.validate.js"></script>
<script>
  $(function() {
    const $form = $('#contactForm');
    const $submitButton = $('#contact-submit');
    const $responseBox = $('#contact-form-response');
    const endpoint = '<?php echo URLROOT; ?>/pages/saveContact';
    let responseTimeoutId = null;

    $('#phone').mask('(000) 000-0000');

    function setResponse(message, type) {
      if (responseTimeoutId) {
        window.clearTimeout(responseTimeoutId);
        responseTimeoutId = null;
      }

      $responseBox
        .removeClass('hidden border-emerald-200 bg-emerald-50 text-emerald-700 border-red-200 bg-red-50 text-red-700')
        .addClass(type === 'success' ? 'border-emerald-200 bg-emerald-50 text-emerald-700' : 'border-red-200 bg-red-50 text-red-700')
        .text(message);

      if (type === 'success') {
        responseTimeoutId = window.setTimeout(function() {
          $responseBox.addClass('hidden').text('');
          responseTimeoutId = null;
        }, 5000);
      }
    }

    $form.validate({
      errorClass: 'error',
      rules: {
        first_name: {
          required: true
        },
        last_name: {
          required: true
        },
        phone: {
          required: true,
          minlength: 10,
          normalizer: function(value) {
            return value.replace(/\D+/g, '');
          }
        },
        email: {
          required: true,
          email: true
        }
      },
      messages: {
        first_name: {
          required: 'First name is required.'
        },
        last_name: {
          required: 'Last name is required.'
        },
        phone: {
          required: 'Phone is required.',
          minlength: 'Enter a valid phone number.'
        },
        email: {
          required: 'Email is required.',
          email: 'Enter a valid email address.'
        }
      },
      submitHandler: function(formElement) {
        $responseBox.addClass('hidden').text('');
        $submitButton.prop('disabled', true).text('Submitting...');

        (async function() {
          try {
            const response = await fetch(endpoint, {
              method: 'POST',
              headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
              },
              body: new URLSearchParams(new FormData(formElement)).toString()
            });

            const payload = await response.json();

            if (!response.ok || payload.status !== 'success') {
              if (payload.errors) {
                Object.keys(payload.errors).forEach(function(fieldName) {
                  const validator = $form.validate();
                  validator.showErrors({ [fieldName]: payload.errors[fieldName] });
                });
              }

              setResponse(payload.msg || 'Unable to submit the form right now.', 'error');
              return;
            }

            formElement.reset();
            $form.validate().resetForm();
            $form.find('.error').removeClass('error');
            setResponse(payload.msg || 'Your contact request was sent successfully.', 'success');
          } catch (error) {
            setResponse('A network error occurred. Please try again.', 'error');
          } finally {
            $submitButton.prop('disabled', false).text('Submit');
          }
        })();

        return false;
      }
    });
  });
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>