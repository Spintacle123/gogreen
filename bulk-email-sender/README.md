
# Project Introduction

This is a bulk email sender that uses PHPMailer.


## Configurations

To run this project, you will need to change the following configurations in your send.php file.

`$mail->Host` - your smtp hostname

`$mail->Username` - your smtp email address

`$mail->Password` - your smtp password

`$mail->SMTPSecure` - if your smtp port is 465 put `PHPMailer::ENCRYPTION_SMTPS` otherwise put `PHPMailer::ENCRYPTION_STARTTLS`

`$mail->Port` - your smtp port (it can be 465 or 587 for most of you)


## Deployment

To deploy this project run. Make sure that before running the command composer should be installed in your machine.

```bash
composer install
```

