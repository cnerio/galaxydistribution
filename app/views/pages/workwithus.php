<?php include APPROOT.'/views/inc/header.php'; ?>
<?php include APPROOT.'/views/inc/navbar.php'; ?>
   <main class="bg-white px-4 py-12 sm:px-6 lg:px-8">
      <section id="application-form" class="mx-auto max-w-4xl">
        <div class="text-center">
          <h1 class="font-display text-4xl font-bold uppercase tracking-[0.03em] text-black sm:text-5xl">Apply Now</h1>
          <p class="mt-3 text-base text-brand-slate sm:text-lg">Fill out this quick form to qualify</p>
        </div>

        <form id="workWithUsForm" class="mx-auto mt-8 max-w-3xl rounded-md border border-slate-300 bg-white p-5 shadow-card sm:p-8" method="post" enctype="multipart/form-data" novalidate>
          <div class="grid gap-x-4 gap-y-5 md:grid-cols-2">
            <label class="block text-sm font-medium text-slate-800">
              <span class="mb-1 block">First Name*</span>
              <input type="text" name="first_name" id="first_name" required autocomplete="given-name" class="h-11 w-full border border-slate-300 px-3 outline-none transition focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/15">
            </label>

            <label class="block text-sm font-medium text-slate-800">
              <span class="mb-1 block">Last Name*</span>
              <input type="text" name="last_name" id="last_name" required autocomplete="family-name" class="h-11 w-full border border-slate-300 px-3 outline-none transition focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/15">
            </label>

            <label class="block text-sm font-medium text-slate-800">
              <span class="mb-1 block">Mobile Number*</span>
              <input type="tel" name="mobile_number" id="mobile_number" required autocomplete="tel" inputmode="tel" class="h-11 w-full border border-slate-300 px-3 outline-none transition focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/15">
            </label>

            <label class="block text-sm font-medium text-slate-800">
              <span class="mb-1 block">Email*</span>
              <input type="email" name="email" id="email" required autocomplete="email" class="h-11 w-full border border-slate-300 px-3 outline-none transition focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/15">
            </label>

            <label class="block text-sm font-medium text-slate-800">
              <span class="mb-1 block">Residence Address*</span>
              <input type="text" name="residence_address" id="residence_address" required autocomplete="street-address" class="h-11 w-full border border-slate-300 px-3 outline-none transition focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/15">
            </label>

            <label class="block text-sm font-medium text-slate-800">
              <span class="mb-1 block">Apartment # or Suite #</span>
              <input type="text" name="apartment" id="apartment" autocomplete="address-line2" class="h-11 w-full border border-slate-300 px-3 outline-none transition focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/15">
            </label>

            <label class="block text-sm font-medium text-slate-800">
              <span class="mb-1 block">City</span>
              <input type="text" name="city" id="city" autocomplete="address-level2" class="h-11 w-full border border-slate-300 px-3 outline-none transition focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/15">
            </label>

            <label class="block text-sm font-medium text-slate-800">
              <span class="mb-1 block">State</span>
              <select name="state" id="state" autocomplete="address-level1" class="h-11 w-full border border-slate-300 bg-white px-3 outline-none transition focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/15">
                <option value="">Select State</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
              </select>
            </label>

            <label class="block max-w-[180px] text-sm font-medium text-slate-800 md:col-span-1">
              <span class="mb-1 block">Zipcode</span>
              <input type="text" name="zipcode" id="zipcode" inputmode="numeric" autocomplete="postal-code" class="h-11 w-full border border-slate-300 px-3 outline-none transition focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/15">
            </label>
          </div>

          <div class="mt-6 space-y-5">
            <fieldset class="space-y-2">
              <legend class="text-sm font-medium text-slate-900">Do you have your own Team?</legend>
              <label class="flex items-center gap-2 text-sm text-slate-700"><input type="radio" name="own_team" value="yes" class="h-4 w-4 border-slate-300 text-brand-blue focus:ring-brand-blue"> YES</label>
              <label class="flex items-center gap-2 text-sm text-slate-700"><input type="radio" name="own_team" value="no" class="h-4 w-4 border-slate-300 text-brand-blue focus:ring-brand-blue"> NO</label>
            </fieldset>

            <fieldset class="space-y-2">
              <legend class="text-sm font-medium text-slate-900">Have you ever distributed Lifeline or ACP in the past?</legend>
              <label class="flex items-center gap-2 text-sm text-slate-700"><input type="radio" name="distributed_before" value="yes" class="h-4 w-4 border-slate-300 text-brand-blue focus:ring-brand-blue"> YES</label>
              <label class="flex items-center gap-2 text-sm text-slate-700"><input type="radio" name="distributed_before" value="no" class="h-4 w-4 border-slate-300 text-brand-blue focus:ring-brand-blue"> NO</label>
            </fieldset>

            <fieldset class="space-y-2">
              <legend class="text-sm font-medium text-slate-900">Do you own a smartphone or tablet with mobile data?</legend>
              <label class="flex items-center gap-2 text-sm text-slate-700"><input type="radio" name="smartphone_tablet" value="yes" class="h-4 w-4 border-slate-300 text-brand-blue focus:ring-brand-blue"> YES</label>
              <label class="flex items-center gap-2 text-sm text-slate-700"><input type="radio" name="smartphone_tablet" value="no" class="h-4 w-4 border-slate-300 text-brand-blue focus:ring-brand-blue"> NO</label>
            </fieldset>

            <fieldset class="space-y-2">
              <legend class="text-sm font-medium text-slate-900">Do you have reliable transportation?</legend>
              <label class="flex items-center gap-2 text-sm text-slate-700"><input type="radio" name="transportation" value="yes" class="h-4 w-4 border-slate-300 text-brand-blue focus:ring-brand-blue"> YES</label>
              <label class="flex items-center gap-2 text-sm text-slate-700"><input type="radio" name="transportation" value="no" class="h-4 w-4 border-slate-300 text-brand-blue focus:ring-brand-blue"> NO</label>
            </fieldset>

            <fieldset class="space-y-2">
              <legend class="text-sm font-medium text-slate-900">Do you have a team?</legend>
              <label class="flex items-center gap-2 text-sm text-slate-700"><input type="radio" name="has_team" value="yes" class="h-4 w-4 border-slate-300 text-brand-blue focus:ring-brand-blue"> YES</label>
              <label class="flex items-center gap-2 text-sm text-slate-700"><input type="radio" name="has_team" value="no" class="h-4 w-4 border-slate-300 text-brand-blue focus:ring-brand-blue"> NO</label>
            </fieldset>

            <fieldset class="space-y-2">
              <legend class="text-sm font-medium text-slate-900">Are you willing to travel?</legend>
              <label class="flex items-center gap-2 text-sm text-slate-700"><input type="radio" name="willing_to_travel" value="yes" class="h-4 w-4 border-slate-300 text-brand-blue focus:ring-brand-blue"> YES</label>
              <label class="flex items-center gap-2 text-sm text-slate-700"><input type="radio" name="willing_to_travel" value="no" class="h-4 w-4 border-slate-300 text-brand-blue focus:ring-brand-blue"> NO</label>
            </fieldset>

            <fieldset class="space-y-2">
              <legend class="text-sm font-medium text-slate-900">Do you have customer Service experience?</legend>
              <label class="flex items-center gap-2 text-sm text-slate-700"><input type="radio" name="customer_service_experience" value="yes" class="h-4 w-4 border-slate-300 text-brand-blue focus:ring-brand-blue"> YES</label>
              <label class="flex items-center gap-2 text-sm text-slate-700"><input type="radio" name="customer_service_experience" value="no" class="h-4 w-4 border-slate-300 text-brand-blue focus:ring-brand-blue"> NO</label>
            </fieldset>

            <label class="block text-sm font-medium text-slate-800">
              <span class="mb-1 block">Any additional information</span>
              <textarea name="additional_information" id="additional_information" rows="3" class="w-full border border-slate-300 px-3 py-3 outline-none transition focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/15"></textarea>
            </label>

            <label class="flex cursor-pointer items-center justify-center border border-brand-blue px-4 py-5 text-center text-sm text-brand-navy transition hover:bg-slate-50">
              <input type="file" name="proof_of_address" id="proof_of_address" class="hidden">
              <span id="proof_of_address_label">Click to upload your Proof of Address (for Driver License, utility door, etc.)</span>
            </label>
            <input type="text" name="proof_of_address_token" id="proof_of_address_token" class="absolute h-0 w-0 border-0 p-0 opacity-0" tabindex="-1" aria-hidden="true" readonly>
            <button type="button" id="remove_proof_of_address" class="hidden w-full border border-slate-300 px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-50">Remove proof of address</button>

            <label class="flex cursor-pointer items-center justify-center border border-brand-blue px-4 py-5 text-center text-sm text-brand-navy transition hover:bg-slate-50">
              <input type="file" name="resume" id="resume" class="hidden">
              <span id="resume_label">Click to upload you Resume ( not required )</span>
            </label>
            <button type="button" id="remove_resume" class="hidden w-full border border-slate-300 px-4 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-50">Remove resume</button>

            <div id="workWithUsResponse" class="hidden rounded-md border px-4 py-3 text-sm"></div>

            <button type="submit" id="workWithUsSubmit" class="h-12 w-full bg-red-700 text-sm font-bold uppercase tracking-[0.18em] text-white transition hover:bg-red-600">Submit</button>
          </div>
        </form>
      </section>
    </main>
<style>
  #workWithUsForm label.error {
    display: block;
    margin-top: 0.35rem;
    color: #dc2626;
    font-size: 0.875rem;
    font-weight: 500;
    text-transform: none;
    letter-spacing: normal;
  }

  #workWithUsForm input.error,
  #workWithUsForm select.error,
  #workWithUsForm textarea.error {
    border-color: #dc2626;
  }

  #workWithUsForm #proof_of_address_token.error {
    position: absolute;
    opacity: 0;
    pointer-events: none;
  }

  #workWithUsForm .is-submitting {
    opacity: 0.65;
    pointer-events: none;
  }
</style>
<script src="<?php echo URLROOT; ?>/js/jquery.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/jquery.mask.js"></script>
<script src="<?php echo URLROOT; ?>/js/jquery.validate.js"></script>
<script>
  $(function() {
    $('#mobile_number').mask('(000) 000-0000');

    const $form = $('#workWithUsForm');
    const $submitButton = $('#workWithUsSubmit');
    const $response = $('#workWithUsResponse');
    const $proofToken = $('#proof_of_address_token');
    const $removeProofButton = $('#remove_proof_of_address');
    const $removeResumeButton = $('#remove_resume');
    const uploadState = {
      proof: {
        base64: '',
        name: '',
        promise: Promise.resolve()
      },
      resume: {
        base64: '',
        name: '',
        promise: Promise.resolve()
      }
    };

    function setResponse(type, message) {
      $response
        .removeClass('hidden border-red-200 border-green-200 bg-red-50 bg-green-50 text-red-700 text-green-700')
        .addClass(type === 'success' ? 'border-green-200 bg-green-50 text-green-700' : 'border-red-200 bg-red-50 text-red-700')
        .text(message);
    }

    function resetUploadState(key, labelSelector, defaultText) {
      uploadState[key].base64 = '';
      uploadState[key].name = '';
      uploadState[key].promise = Promise.resolve();
      $(labelSelector).text(defaultText);

      if (key === 'proof') {
        $('#proof_of_address').val('');
        $proofToken.val('');
        $removeProofButton.addClass('hidden');
      }

      if (key === 'resume') {
        $('#resume').val('');
        $removeResumeButton.addClass('hidden');
      }
    }

    function fileToDataUrl(file) {
      return new Promise(function(resolve, reject) {
        const reader = new FileReader();
        reader.onload = function(event) {
          resolve(event.target.result);
        };
        reader.onerror = reject;
        reader.readAsDataURL(file);
      });
    }

    function compressImage(file) {
      return fileToDataUrl(file).then(function(dataUrl) {
        return new Promise(function(resolve, reject) {
          const image = new Image();
          image.onload = function() {
            const maxWidth = 1600;
            const maxHeight = 1600;
            let width = image.width;
            let height = image.height;

            if (width > maxWidth || height > maxHeight) {
              const ratio = Math.min(maxWidth / width, maxHeight / height);
              width = Math.round(width * ratio);
              height = Math.round(height * ratio);
            }

            const canvas = document.createElement('canvas');
            canvas.width = width;
            canvas.height = height;
            canvas.getContext('2d').drawImage(image, 0, 0, width, height);
            resolve(canvas.toDataURL('image/jpeg', 0.72));
          };
          image.onerror = reject;
          image.src = dataUrl;
        });
      });
    }

    function prepareUpload(file, stateKey, labelSelector, defaultText) {
      if (!file) {
        resetUploadState(stateKey, labelSelector, defaultText);
        return Promise.resolve();
      }

      $(labelSelector).text('Processing ' + file.name + '...');

      const promise = (file.type.indexOf('image/') === 0 ? compressImage(file) : fileToDataUrl(file))
        .then(function(base64Data) {
          uploadState[stateKey].base64 = base64Data;
          uploadState[stateKey].name = file.name;
          $(labelSelector).text(file.name);

          if (stateKey === 'proof') {
            $proofToken.val(file.name);
            $removeProofButton.removeClass('hidden');
            $form.validate().element('#proof_of_address_token');
          }

          if (stateKey === 'resume') {
            $removeResumeButton.removeClass('hidden');
          }
        })
        .catch(function() {
          resetUploadState(stateKey, labelSelector, defaultText);
          setResponse('error', 'Unable to process ' + file.name + '. Please try another file.');
        });

      uploadState[stateKey].promise = promise;
      return promise;
    }

    $('#proof_of_address').on('change', function() {
      prepareUpload(this.files[0], 'proof', '#proof_of_address_label', 'Click to upload your Proof of Address (for Driver License, utility door, etc.)');
    });

    $removeProofButton.on('click', function() {
      resetUploadState('proof', '#proof_of_address_label', 'Click to upload your Proof of Address (for Driver License, utility door, etc.)');
      $form.validate().element('#proof_of_address_token');
    });

    $('#resume').on('change', function() {
      prepareUpload(this.files[0], 'resume', '#resume_label', 'Click to upload you Resume ( not required )');
    });

    $removeResumeButton.on('click', function() {
      resetUploadState('resume', '#resume_label', 'Click to upload you Resume ( not required )');
    });

    $form.validate({
      errorElement: 'label',
      errorPlacement: function(error, element) {
        error.addClass('error');
        error.insertAfter(element);
      },
      rules: {
        first_name: {
          required: true
        },
        last_name: {
          required: true
        },
        mobile_number: {
          required: true,
          minlength: 10,
          maxlength: 10,
          normalizer: function(value) {
            return value.replace(/\D+/g, '');
          }
        },
        email: {
          required: true,
          email: true
        },
        residence_address: {
          required: true
        },
        proof_of_address_token: {
          required: true
        }
      },
      messages: {
        first_name: 'First name is required.',
        last_name: 'Last name is required.',
        mobile_number: {
          required: 'Mobile number is required.',
          minlength: 'Enter a valid 10-digit mobile number.',
          maxlength: 'Enter a valid 10-digit mobile number.'
        },
        email: {
          required: 'Email is required.',
          email: 'Enter a valid email address.'
        },
        residence_address: 'Residence address is required.',
        proof_of_address_token: 'Proof of address is required.'
      },
      submitHandler: function(form, event) {
        event.preventDefault();
        $response.addClass('hidden').text('');
        $submitButton.addClass('is-submitting').prop('disabled', true).text('Submitting...');

        Promise.all([uploadState.proof.promise, uploadState.resume.promise]).then(function() {
          const formData = $form.serializeArray();
          formData.push({ name: 'proof_of_address_base64', value: uploadState.proof.base64 });
          formData.push({ name: 'proof_of_address_name', value: uploadState.proof.name });
          formData.push({ name: 'resume_base64', value: uploadState.resume.base64 });
          formData.push({ name: 'resume_name', value: uploadState.resume.name });

          $.ajax({
            url: '<?php echo URLROOT; ?>/pages/saveWorkwithus',
            method: 'POST',
            data: $.param(formData),
            dataType: 'json'
          }).done(function(response) {
            if (response.status === 'success') {
              setResponse('success', response.msg + '. Redirecting to the thank you page in 5 seconds...');
              form.reset();
              resetUploadState('proof', '#proof_of_address_label', 'Click to upload your Proof of Address (for Driver License, utility door, etc.)');
              resetUploadState('resume', '#resume_label', 'Click to upload you Resume ( not required )');
              $form.validate().resetForm();
              $form.find('.error').removeClass('error');
              window.setTimeout(function() {
                window.location.href = '<?php echo URLROOT; ?>/pages/workwithusthankyou/' + encodeURIComponent(response.newhire_id);
              }, 5000);
            } else {
              setResponse('error', response.msg || 'Unable to submit the form.');
              if (response.errors) {
                $form.validate().showErrors(response.errors);
              }
            }
          }).fail(function(xhr) {
            const response = xhr.responseJSON || {};
            setResponse('error', response.msg || 'Something went wrong while submitting the form.');
            if (response.errors) {
              $form.validate().showErrors(response.errors);
            }
          }).always(function() {
            $submitButton.removeClass('is-submitting').prop('disabled', false).text('Submit');
          });
        });
      }
    });
  });
</script>
<?php include APPROOT.'/views/inc/footer.php'; ?>