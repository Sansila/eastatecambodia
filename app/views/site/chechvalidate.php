<?php 
	require('phpmailer/class.phpmailer.php');
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "ssl";
    $mail->Port     = 465;
    $mail->Host     = "smtp.gmail.com";
    $mail->Mailer   = "smtp";
    $mail->SetFrom("estatecambodia168.dev@gmail.com", "Estate Cambodia");
    $mail->AddAddress("sansila.dev@gmail.com"); 
    $mail->Subject = "Check Property Info";
    $mail->WordWrap   = 80;


    $logo = "http://estatecambodia.com/assets/img/logo.png";
    $description = '<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
            <tr>
                <td style="width:8px" width="8"></td>
                <td>
                    <div align="center" class="" style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px; padding:20px;">
                        <img src="'.$logo.'" style="width: 140px;">
                        <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">
                            Please check your property info is correctly.
                        </div>
                    </div>
                                            
                </td>
                <td style="width:8px" width="8"></td>
            </tr>
        </tbody>
    </table>';

    $mail->MsgHTML($description);
    $mail->IsHTML(true);

    if(!$mail->Send()) {
        echo "<p class='error'>Problem in Sending Mail.</p>";
    } else {
        echo "<p class='success'>Mail Sent Successfully.</p>";
    }
?>