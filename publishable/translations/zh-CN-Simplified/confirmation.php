<?php
return [
    'email-title'   => '邮箱确认',
    'email-intro'   => '要验证您的电子邮箱点击下面的按钮',
    'email-button'  => '电子邮箱验证',
    'message'       => '感谢您的注册！请查看你的邮箱.',
    'success'       => '您已成功验证您的帐户！您现在可以登录.',
    'again'         => '您必须验证您的电子邮箱，才能访问该网站. ' .
                        '<br>如果您还没有收到确认邮件，请检查您的垃圾邮件文件夹.'.
                        '<br>需要收到新的确认邮件 <a href="' . url('confirmation/resend') . '" class="alert-link">请点击</a>.',
    'resend'        => '确认信息已发送，请查看你的邮箱.'
];