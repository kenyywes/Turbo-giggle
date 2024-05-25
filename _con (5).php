if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
    $from                                = $_POST['email'];
    $message                              = $_POST['message'];
    $errors = ['email'] = Validate::IsEmail($from)            ? '' : 'Email is not valid';
    $errors['message'] = Validate::IsText($message, 1, 1000) ? ''  : 'Please enter a message up to 10000 characters';
    $invalid = implode($errors);
    if ($invalid) {
        $errors['warning'] = 'Please correct the errors';

     } else {
        $subject = "Contact from message from" .$from;
        $email = new /phpBook\Email/Email($email_config);
        $email->sendEmail($email_config['admin_email'], $email_config['admin_email'],
        $subject, $message);
        $success = 'Your message has been sent';

    }
}

$data['navigation'] = $cms->getCategory()->getAll();

$data['from'] = $from;
$data['message'] = $message;
$data['errors'] = $errors;
$data['success'] = $success
echo $twig->render('contact.html, $data');