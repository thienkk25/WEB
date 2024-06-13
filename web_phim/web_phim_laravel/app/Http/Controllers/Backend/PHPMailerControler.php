<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\Users;
use Illuminate\Support\Facades\Cache;

class PHPMailerControler extends Controller
{
    public function forgot()
    {
        return view('clients.login.forgot');
    }
    public function postForgetPassword(Request $request, Users $users)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = env('MAIL_HOST');
            $mail->SMTPAuth   = true;
            $mail->Username   = env('MAIL_USERNAME');
            $mail->Password   = env('MAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = env('MAIL_PORT');

            $mail->setFrom('thien789987@gmail.com', 'Web Phim');
            $mail->addAddress($request->email);

            $tokenForget = [];
            for ($j = 0; $j < 6; $j++) {
                $tokenForget[] = rand(0, 9);
            }

            $tokenForgot = join('', $tokenForget);
            $users->insertTokenForgot($request->email, $tokenForgot);
            // Lưu trữ thời gian hết hạn vào cache
            Cache::put($tokenForgot, now()->addMinutes(3));

            $mail->isHTML(true);
            $mail->Subject = 'Quen mat khau';
            $mail->Body    = '<div><h2 style="color: #7BD3EA">Mã</h2><h1 style="text-align:center;">' . $tokenForgot . '</h1><a href="' . route('updateAccount', ['tokenForgot' => $tokenForgot, 'email' => $request->email]) . '" style="padding: 10px;height: 10px;width: 60px;background-color: blue;color:#ffffff;border: 1px solid #000;border-radius: 10px;text-decoration: none;text-align:center;">Nhấn vào đây lấy lại mật khẩu</a></div>';
            $mail->AltBody = 'Mã : ' . $tokenForgot . ' ' . route('updateAccount', ['tokenForgot' => $tokenForgot, 'email' => $request->email]);

            if ($mail->send()) {
                return back()->with('msg', 'Đã gửi thành công vui lòng kiểm tra email của bạn');
            } else {
                return redirect()->back()->with('msg', 'Có lỗi xảy ra vui lòng thử lại sau. ' . $mail->ErrorInfo);
            }
        } catch (Exception $e) {

            return redirect()->back()->with('msg', 'Vui lòng nhập email của bạn');
        }
    }
}
