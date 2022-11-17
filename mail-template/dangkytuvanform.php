<?php

function prefix_send_email_to_admin()
{
    if (!function_exists('tg_sent_email')) {
        return;
    }
    $preLink = $_POST['prelink'];

    if (isset($_POST['email']) && ($clientMail = $_POST['email']) != '') {

        $clientName = $_POST['name'];
        $clientPhone = $_POST['phone'];
        $science_care = $_POST['science_care'];
        $message = $_POST['message'];
        $bodyContent = '<b>Dear admin,</b></br>
<p>Hệ thống vừa ghi nhận được một lời nhắn từ khách hàng trong form đăng ký tư vấn, mong <b>admin</b> kiểm tra và phản
    hồi với khách hàng.</p><br>
<p>Thông tin khách hàng và lời nhắn:</p></br>
<p>Tên khách hàng: <b>' . $clientName . '</b></p></br>
<p>Số điện thoại: <b>' . $clientPhone . '</b></p></br>
<p>Email: <b>' . $clientMail . '</b></p></br>
<p>Ngành quan tâm: <b>' . $science_care . '</b></p></br>
<p>Lời nhắn: <b>' . $message . '</b></p><br>
<p>Lời nhắn được được gửi từ form đăng ký từ vấn, link: https:' . $preLink . ' </p>';
        $subject = 'Khách hàng đăng ký tư vấn ' . $clientName;
        $mailTo = get_option( 'admin_email' )??'Uoedata@gmail.com';


        if (boolval(tg_sent_email($mailTo, $bodyContent, $subject)) == true) {
            header('location:'.$preLink.'?success=yes');
        }
        else {
            header('location:'.$preLink.'#'.'?success=no');
        }
    }

}

add_action('admin_post_nopriv_dangkytuvan', 'prefix_send_email_to_admin');
add_action('admin_post_dangkytuvan', 'prefix_send_email_to_admin');