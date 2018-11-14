<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use phpmailer\phpmailer;  
class Message extends Base
{
    public function lst()
    {
    	$list = db('message')->order('id desc')->paginate(10);
    	$this->assign('list',$list);
        return $this->fetch();
    }

    public function sp(){
        $id = input('id');
        if(db('message')->where('id',$id)->setField('show','1')){
            return 1;
        }
    }

    //删除
    public function del(){
    	$id = input('id');
        if(db('message')->delete($id)){
            db('message')->where('pid','=',$id)->delete();
			$this->success('删除留言成功','lst');
    	}else{
    		$this->error('删除留言失败');
    	}
    }

    //博主回复
    public function huifu(){
        if(request()->isPost()){
            $oldcontent = input('oldcontent');
            $content= input('content');
            $email = input('email');
            $data = [
                'show'=>'1',
                'articleid'=>input('articleid'),
                'pid'=>input('id'),
                'content'=>$content,
                'time' => time(),
                'email' => '1103223758@qq.com',
                'web' => 'http://www.zhihuas.com',
                'img' => 'http://q.qlogo.cn/headimg_dl?dst_uin=1103223758&spec=100',
                'name' => 'zhihua',
                'isadmin' => '1',
            ];
            if(db('message')->insert($data)){
                $this->email($email,$oldcontent,$content);
            }
        }
        $id = input('id');
        $data = db('message')->find($id);
        $this->assign([
            'data'=>$data,
        ]);
        return view();
    }

    //发送邮箱             你的邮箱    你的留言       博主的回复
    public function email($emailAdress,$contentAdress,$content){  
        $toemail = $emailAdress;//定义收件人的邮箱  
    
        $mail = new PHPMailer();  
    
        $mail->isSMTP();// 使用SMTP服务  
        $mail->CharSet = "utf8";// 编码格式为utf8，不设置编码的话，中文会出现乱码  
        $mail->Host = "smtp.163.com";// 发送方的SMTP服务器地址  
        $mail->SMTPAuth = true;// 是否使用身份验证  
        $mail->Username = "qq1103223758@163.com";// 发送方的163邮箱用户名，就是你申请163的SMTP服务使用的163邮箱  
        $mail->Password = "xianzhihua122497";// 发送方的邮箱密码，注意用163邮箱这里填写的是“客户端授权密码”而不是邮箱的登录密码！  
        $mail->SMTPSecure = "ssl";// 使用ssl协议方式  
        $mail->Port = 994;// 163邮箱的ssl协议方式端口号是465/994  
    
        $mail->setFrom("qq1103223758@163.com","智铧博客");// 设置发件人信息，如邮件格式说明中的发件人，这里会显示为Mailer(xxxx@163.com），Mailer是当做名字显示  
        $mail->addAddress($toemail,'zhihuas');// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@163.com)  
        $mail->addReplyTo("qq1103223758@163.com","zhihuas");// 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址  
        //$mail->addCC("xxx@163.com");// 设置邮件抄送人，可以只写地址，上述的设置也可以只写地址(这个人也能收到邮件)  
        //$mail->addBCC("xxx@163.com");// 设置秘密抄送人(这个人也能收到邮件)  
        //$mail->addAttachment("bug0.jpg");// 添加附件  
    
    
        $mail->Subject = "[智铧博客]你发表的评论有了新回复。";// 邮件标题  
        $mail->Body = '你在智铧博客上发表的留言：'.$contentAdress.'，博主回复：'.$content;// 邮件正文  
        //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用  
    
        if(!$mail->send()){// 发送邮件  
            echo "Message could not be sent.";  
            echo "Mailer Error: ".$mail->ErrorInfo;// 输出错误信息  
        }else{  
            //echo '发送成功';
            $this->success('回复成功','admin/message/lst');
        }  
    } 
}
