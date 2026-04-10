<?php
  class Pages extends Controller {
    private $newHireModel;

    public function __construct(){
      $this->newHireModel = $this->model('NewHire');
    }
    
    public function index(){
      // if(isLoggedIn()){
      //   redirect('posts');
      // }
      // $data = [
      //   'agent' => strtolower(trim($agent))
      // ];
     
      $this->view('pages/index');
    }

    public function indexcheck(){
      
          $this->view('pages/indexcheck');
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to share posts with other users'
      ];

      $this->view('pages/about', $data);
    }
    
  public function privacy()
    {
        $data = ['title' => 'Privacy Policy'];
        $this->view('pages/privacy', $data);
    }

   public function terms()
    {
        $data = ['title' => 'Terms of Service'];
        $this->view('pages/terms', $data);
    }

    public function accessibility(){
      $data = ['title' => 'Accessibility'];
      $this->view('pages/accessibility', $data);
    }

    public function workwithus(){
      $data = ['title' => 'Work With Us'];
      $this->view('pages/workwithus', $data);
    }

    public function workwithusthankyou($newHireId = ''){
      $data = [
        'title' => 'Thank You',
        'newhire_id' => trim($newHireId)
      ];

      $this->view('pages/workwithusthankyou', $data);
    }

    public function saveWorkwithus(){
      if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        $this->jsonResponse([
          'status' => 'error',
          'msg' => 'Method not allowed.'
        ], 405);
      }

      $firstName = trim($_POST['first_name'] ?? '');
      $lastName = trim($_POST['last_name'] ?? '');
      $email = trim(strtolower($_POST['email'] ?? ''));
      $phoneNumber = preg_replace('/\D+/', '', $_POST['mobile_number'] ?? '');
      $address1 = trim($_POST['residence_address'] ?? '');

      $errors = [];

      if($firstName === ''){
        $errors['first_name'] = 'First name is required.';
      }

      if($lastName === ''){
        $errors['last_name'] = 'Last name is required.';
      }

      if($phoneNumber === ''){
        $errors['mobile_number'] = 'Mobile number is required.';
      }elseif(strlen($phoneNumber) < 10){
        $errors['mobile_number'] = 'Enter at least 10 digits.';
      }

      if($email === ''){
        $errors['email'] = 'Email is required.';
      }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Enter a valid email address.';
      }

      if($address1 === ''){
        $errors['residence_address'] = 'Residence address is required.';
      }

      if(trim($_POST['proof_of_address_base64'] ?? '') === ''){
        $errors['proof_of_address_token'] = 'Proof of address is required.';
      }

      if(!empty($errors)){
        $this->jsonResponse([
          'status' => 'error',
          'msg' => 'Please correct the highlighted fields.',
          'errors' => $errors
        ], 422);
      }

      $newHireId = $this->newHireModel->generateNewHireId();
      $uploadFolder = '../public/uploads/' . $newHireId . '/';

      $proofFilePath = $this->saveBase64File(
        $_POST['proof_of_address_base64'] ?? '',
        $_POST['proof_of_address_name'] ?? '',
        $uploadFolder,
        $newHireId,
        'proof_of_address'
      );

      if($proofFilePath === false){
        $this->jsonResponse([
          'status' => 'error',
          'msg' => 'Unable to save proof of address file.'
        ], 500);
      }

      $resumeFilePath = $this->saveBase64File(
        $_POST['resume_base64'] ?? '',
        $_POST['resume_name'] ?? '',
        $uploadFolder,
        $newHireId,
        'resume'
      );

      if($resumeFilePath === false){
        $this->jsonResponse([
          'status' => 'error',
          'msg' => 'Unable to save resume file.'
        ], 500);
      }

      $leadData = [
        'newhire_id' => $newHireId,
        'first_name' => ucfirst(strtolower($firstName)),
        'last_name' => ucfirst(strtolower($lastName)),
        'email' => $email,
        'phone_number' => $phoneNumber,
        'address1' => $address1,
        'address2' => trim($_POST['apartment'] ?? ''),
        'city' => trim($_POST['city'] ?? ''),
        'state' => strtoupper(trim($_POST['state'] ?? '')),
        'zipcode' => trim($_POST['zipcode'] ?? ''),
        'date_create' => date('Y-m-d H:i:s'),
        'own_team' => $this->normalizeChoice($_POST['own_team'] ?? null),
        'acp_inthepast' => $this->normalizeChoice($_POST['distributed_before'] ?? null),
        'own_devicewdata' => $this->normalizeChoice($_POST['smartphone_tablet'] ?? null),
        'transportation' => $this->normalizeChoice($_POST['transportation'] ?? null),
        'have_team' => $this->normalizeChoice($_POST['has_team'] ?? null),
        'travel_available' => $this->normalizeChoice($_POST['willing_to_travel'] ?? null),
        'customerservice_experience' => $this->normalizeChoice($_POST['customer_service_experience'] ?? null),
        'additional_info' => trim($_POST['additional_information'] ?? ''),
        'resume' => $resumeFilePath,
        'file_path' => $proofFilePath
      ];

      if(!$this->newHireModel->saveLead($leadData)){
        $this->jsonResponse([
          'status' => 'error',
          'msg' => 'Unable to save the lead at this time.'
        ], 500);
      }

      if(!$this->sendWorkWithUsEmail($leadData)){
        error_log('Work With Us email send failed for ' . $newHireId);
      }

      $this->jsonResponse([
        'status' => 'success',
        'msg' => 'Application submitted successfully.',
        'newhire_id' => $newHireId
      ]);
    }


    public function contact(){
      $data = [
          'title' => 'Contact Us',
          'description' => 'You can contact us through this medium',
          'info' => 'You can contact me with the following details below if you like my program and willing to offer me a contract and work on your project',
          'name' => 'Omonzebaguan Emmanuel',
          'location' => 'Nigeria, Edo State',
          'contact' => '+2348147534847',
          'mail' => 'emmizy2015@gmail.com'
      ];

      $this->view('pages/contact', $data);
    }

    public function saveContact(){
      if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        $this->jsonResponse([
          'status' => 'error',
          'msg' => 'Method not allowed.'
        ], 405);
      }

      $firstName = trim($_POST['first_name'] ?? '');
      $lastName = trim($_POST['last_name'] ?? '');
      $email = trim(strtolower($_POST['email'] ?? ''));
      $phone = preg_replace('/\D+/', '', $_POST['phone'] ?? '');

      $errors = [];

      if($firstName === ''){
        $errors['first_name'] = 'First name is required.';
      }

      if($lastName === ''){
        $errors['last_name'] = 'Last name is required.';
      }

      if($phone === ''){
        $errors['phone'] = 'Phone is required.';
      }elseif(strlen($phone) < 10){
        $errors['phone'] = 'Enter a valid phone number.';
      }

      if($email === ''){
        $errors['email'] = 'Email is required.';
      }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Enter a valid email address.';
      }

      if(!empty($errors)){
        $this->jsonResponse([
          'status' => 'error',
          'msg' => 'Please correct the highlighted fields.',
          'errors' => $errors
        ], 422);
      }

      $contactData = [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'phone' => $phone,
        'submitted_at' => date('Y-m-d H:i:s')
      ];

      if(!$this->sendContactFormEmail($contactData)){
        $this->jsonResponse([
          'status' => 'error',
          'msg' => 'Unable to send your message right now. Please try again later.'
        ], 500);
      }

      $this->jsonResponse([
        'status' => 'success',
        'msg' => 'Your contact request was sent successfully.'
      ]);
    }

    private function jsonResponse($payload, $statusCode = 200){
      http_response_code($statusCode);
      header('Content-Type: application/json');
      echo json_encode($payload);
      exit;
    }

    private function sendContactFormEmail($data){
      try {
        $mailer = new PHPMailer_Lib();
        $mail = $mailer->load();
        $fullName = trim($data['first_name'] . ' ' . $data['last_name']);

        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = SMTP_ENCRYPTION;
        $mail->Port = SMTP_PORT;
        $mail->setFrom(MAIL_FROM_ADDRESS, MAIL_FROM_NAME_DOCS);
        $mail->addReplyTo($data['email'], $fullName);

        //foreach($this->contactNotificationRecipients as $recipient){
        $mail->addAddress(MAIL_TO);
        //}
        $mail->addBCC(MAIL_TO_2);
        $mail->addBCC(MAIL_BCC);
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission - ' . $fullName;
        $mail->Body = $this->buildContactEmailBody($data);

        return $mail->send();
      } catch (Exception $exception) {
        error_log('Contact email send failed: ' . $exception->getMessage());
        return false;
      }
    }

    private function buildContactEmailBody($data){
      $fullName = htmlspecialchars(trim($data['first_name'] . ' ' . $data['last_name']), ENT_QUOTES, 'UTF-8');
      $email = htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8');
      $phone = htmlspecialchars($data['phone'], ENT_QUOTES, 'UTF-8');
      $submittedAt = htmlspecialchars($data['submitted_at'], ENT_QUOTES, 'UTF-8');

      return "<div style='font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#1f2937;'>"
        . "<h2 style='margin:0 0 16px;color:#0a72c0;'>New Contact Form Submission</h2>"
        . "<p style='margin:0 0 14px;'>A visitor submitted the contact form with the following details.</p>"
        . "<table style='border-collapse:collapse;width:100%;max-width:640px;'>"
        . "<tr><td style='padding:8px 12px;border:1px solid #d1d5db;font-weight:700;width:180px;'>First Name</td><td style='padding:8px 12px;border:1px solid #d1d5db;'>" . htmlspecialchars($data['first_name'], ENT_QUOTES, 'UTF-8') . "</td></tr>"
        . "<tr><td style='padding:8px 12px;border:1px solid #d1d5db;font-weight:700;'>Last Name</td><td style='padding:8px 12px;border:1px solid #d1d5db;'>" . htmlspecialchars($data['last_name'], ENT_QUOTES, 'UTF-8') . "</td></tr>"
        . "<tr><td style='padding:8px 12px;border:1px solid #d1d5db;font-weight:700;'>Email</td><td style='padding:8px 12px;border:1px solid #d1d5db;'><a href='mailto:" . $email . "' style='color:#0a72c0;text-decoration:none;'>" . $email . "</a></td></tr>"
        . "<tr><td style='padding:8px 12px;border:1px solid #d1d5db;font-weight:700;'>Phone</td><td style='padding:8px 12px;border:1px solid #d1d5db;'>" . $phone . "</td></tr>"
        . "<tr><td style='padding:8px 12px;border:1px solid #d1d5db;font-weight:700;'>Submitted At</td><td style='padding:8px 12px;border:1px solid #d1d5db;'>" . $submittedAt . "</td></tr>"
        . "</table>"
        . "<p style='margin:14px 0 0;'>Reply directly to this email to contact " . $fullName . ".</p>"
        . "</div>";
    }

    private function sendWorkWithUsEmail($data){
      try {
        $mailer = new PHPMailer_Lib();
        $mail = $mailer->load();
        $fullName = trim(($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? ''));
        //$recipient = MAIL_BCC;

        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = SMTP_ENCRYPTION;
        $mail->Port = SMTP_PORT;
        $mail->setFrom(MAIL_FROM_ADDRESS, MAIL_FROM_NAME_DOCS);

        if(!empty($data['email'])){
          $mail->addReplyTo($data['email'], $fullName);
        }

        $mail->addAddress(MAIL_TO);
        //}
        $mail->addBCC(MAIL_TO_2);
        $mail->addBCC(MAIL_BCC);
        $mail->isHTML(true);
        $mail->Subject = 'New Work With Us Application - ' . ($data['newhire_id'] ?? $fullName);
        $mail->Body = $this->buildWorkWithUsEmailBody($data);

        foreach (['file_path', 'resume'] as $attachmentKey) {
          if(empty($data[$attachmentKey])){
            continue;
          }

          $absolutePath = $this->resolvePublicUploadPath($data[$attachmentKey]);

          if($absolutePath !== null && file_exists($absolutePath)){
            $mail->addAttachment($absolutePath, basename($absolutePath));
          }
        }

        return $mail->send();
      } catch (Exception $exception) {
        error_log('Work With Us email send failed: ' . $exception->getMessage());
        return false;
      }
    }

    private function buildWorkWithUsEmailBody($data){
      $rows = [
        'Lead ID' => $data['newhire_id'] ?? '',
        'First Name' => $data['first_name'] ?? '',
        'Last Name' => $data['last_name'] ?? '',
        'Email' => $data['email'] ?? '',
        'Mobile Number' => $data['phone_number'] ?? '',
        'Residence Address' => $data['address1'] ?? '',
        'Apartment / Suite' => $data['address2'] ?? '',
        'City' => $data['city'] ?? '',
        'State' => $data['state'] ?? '',
        'Zipcode' => $data['zipcode'] ?? '',
        'Own Team' => $data['own_team'] ?? '',
        'Distributed Lifeline or ACP Before' => $data['acp_inthepast'] ?? '',
        'Own Smartphone or Tablet With Data' => $data['own_devicewdata'] ?? '',
        'Reliable Transportation' => $data['transportation'] ?? '',
        'Have a Team' => $data['have_team'] ?? '',
        'Willing to Travel' => $data['travel_available'] ?? '',
        'Customer Service Experience' => $data['customerservice_experience'] ?? '',
        'Additional Information' => $data['additional_info'] ?? '',
        'Submitted At' => $data['date_create'] ?? ''
      ];

      $html = "<div style='font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#1f2937;'>"
        . "<h2 style='margin:0 0 16px;color:#0a72c0;'>New Work With Us Application</h2>"
        . "<p style='margin:0 0 14px;'>A new application has been submitted. Attached files are included when provided.</p>"
        . "<table style='border-collapse:collapse;width:100%;max-width:760px;'>";

      foreach($rows as $label => $value){
        $safeLabel = htmlspecialchars($label, ENT_QUOTES, 'UTF-8');
        $safeValue = nl2br(htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'));
        $html .= "<tr><td style='padding:8px 12px;border:1px solid #d1d5db;font-weight:700;width:240px;vertical-align:top;'>" . $safeLabel . "</td><td style='padding:8px 12px;border:1px solid #d1d5db;'>" . ($safeValue === '' ? '&nbsp;' : $safeValue) . "</td></tr>";
      }

      $html .= "</table>"
        . "<p style='margin:14px 0 0;'>Proof of address is attached when available. Resume is attached when provided by the applicant.</p>"
        . "</div>";

      return $html;
    }

    private function resolvePublicUploadPath($relativePath){
      $normalizedPath = trim((string)$relativePath);

      if($normalizedPath === ''){
        return null;
      }

      return dirname(APPROOT) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, ltrim($normalizedPath, '/\\'));
    }

    private function saveBase64File($base64Data, $originalName, $uploadFolder, $customerId, $baseName){
      if(empty($base64Data)){
        return null;
      }

      if(!preg_match('/^data:(.*?);base64,(.*)$/', $base64Data, $matches)){
        return false;
      }

      $mimeType = $matches[1];
      $binaryData = base64_decode($matches[2], true);

      if($binaryData === false){
        return false;
      }

      if(!is_dir($uploadFolder) && !mkdir($uploadFolder, 0755, true)){
        return false;
      }

      $extension = $this->resolveUploadExtension($mimeType, $originalName);
      $fileName = $baseName . '.' . $extension;
      $absolutePath = rtrim($uploadFolder, '/\\') . DIRECTORY_SEPARATOR . $fileName;

      if(file_put_contents($absolutePath, $binaryData) === false){
        return false;
      }

      return 'uploads/' . $customerId . '/' . $fileName;
    }

    private function resolveUploadExtension($mimeType, $originalName){
      $mimeMap = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/gif' => 'gif',
        'image/webp' => 'webp',
        'application/pdf' => 'pdf',
        'application/msword' => 'doc',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx'
      ];

      if(isset($mimeMap[$mimeType])){
        return $mimeMap[$mimeType];
      }

      $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

      if($extension !== ''){
        return preg_replace('/[^a-z0-9]/', '', $extension);
      }

      return 'bin';
    }

    private function normalizeChoice($value){
      if($value === null){
        return null;
      }

      $normalized = strtoupper(trim((string)$value));

      return $normalized === '' ? null : $normalized;
    }
  }