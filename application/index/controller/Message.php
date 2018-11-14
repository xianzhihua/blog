<?php
namespace app\index\controller;
use app\index\controller\Base;
use phpmailer\phpmailer;
use think\Db;
class Message extends Base
{
    public function index(){

        $message = db('message')->alias('a')->join('tp_message b','a.pid=b.id','LEFT')->field('b.name as Aname,a.*')->where("a.articleid = 0 and a.show=1")->order('id desc')->select();
        //转换时间格式
        for($i=0;$i<count($message);$i++){
            $message[$i]['time'] = $this->wordTime($message[$i]['time']);
        }
        $message = $this->catetree($message);
        $count = db('message')->alias('a')->join('tp_message b','a.pid=b.id','LEFT')->where("a.articleid = 0 and a.show=1")->count();
        $this->assign([
            'message'=>$message,
            'count'=>$count,
        ]);
        return $this->fetch('message');

    }

    //添加评论
    public function add_message(){
        $time = time();
        $img=input('img');
        $content=input('content');
        $data = [
            'name'=>input('name'),
            'content'=>$content,
            'email'=>input('email'),
            'web'=>input('web'),
            'time'=>time(),
            'img'=>$img,
            'articleid'=>input('articleid'),
        ];
        if(db('message')->insert($data)){
            $res = db('message')->where('time',$time)->find();
            $res['time'] = $this->wordTime($res['time']);
            $this->email($content);
            return json_encode($res);
        };
    }

    //添加评论
    public function add_message2(){
        $time=time();
        $img=input('img');
        $content=input('content');
        $data = [
            'name'=>input('name'),
            'content'=>$content,
            'email'=>input('email'),
            'web'=>input('web'),
            'pid'=>input('pid'),
            'time'=>time(),
            'img'=>$img,
            'articleid'=>input('articleid'),
        ];
        $id = input('pid');
        if(db('message')->insert($data)){
            $data = db('message')->find($id);
            $res = db('message')->where('time',$time)->find();
            $res['Aname']=$data['name'];
            $res['time'] = $this->wordTime($res['time']);
            $this->email($content);
            return json_encode($res);
        };
    }

    //无限级
    public function catetree($cateRes){
        return $this->sort($cateRes);
    }

    //无限级
    public function sort($cateRes,$pid=0,$level=0){
        static $arr=array();
        foreach ($cateRes as $k => $v) {
            if($v['pid']==$pid){
                $v['level']=$level;
                $arr[]=$v;
                $this->sort($cateRes,$v['id'],$level+1);
            }
        }
        return $arr;
    }

    //点赞
    public function love(){
        $id = input('id');
        $data = db('message')->where('id',$id)->setInc('love');
        if($data){
            return 1;
        }
    }

    //取消点赞
    public function removelove(){
        $id = input('id');
        $data = db('message')->where('id',$id)->setDec('love');
        if($data){
            return 1;
        }
    }


    //获取QQ昵称QQ头像
    public function qq(){

        header('content-type:text/html;charset=utf-8');
        $qq = input('post.qq');
        //向接口发起请求获取json数据
        $get_info = file_get_contents('http://users.qzone.qq.com/fcg-bin/cgi_get_portrait.fcg?uins='.$qq);
        //转换编码
        $get_info = mb_convert_encoding($get_info, "UTF-8", "GBK");
        //对获取的json数据进行截取并解析成数组
        $name = json_decode(substr($get_info,17,-1),true);
        if($name and $qq){
            $txUrl = 'http://q.qlogo.cn/headimg_dl?dst_uin='.$qq.'&spec=100';
            $arr = array(
                'code' => 1,
                'msg' => 'Success',
                'txUrl' => $txUrl,
                'name' => urlencode($name[$qq][6])
            );
          return (stripslashes(urldecode(json_encode($arr))));
         }else{
            $arr = array(
                'code' => -1,
                'msg' => 'Error'
            );
            exit(stripslashes(urldecode(json_encode($arr))));
        }
    }

    public function setCookie(){
        $name = input('name');
        $email = input('email');
        $img = input('img');
        $web = input('web');
        //return $name.$email.$img.$web;
        session('zhihuas_name',$name);
        session('zhihuas_email',$email);
        session('zhihuas_img',$img);
        session('zhihuas_web',$web);
    }

    public function wordTime($time) {
        $time = (int) substr($time, 0, 10);
        $int = time() - $time;
        $str = '';
        if ($int <= 2){
            $str = sprintf('刚刚', $int);
        }elseif ($int < 60){
            $str = sprintf('%d秒前', $int);
        }elseif ($int < 3600){
            $str = sprintf('%d分钟前', floor($int / 60));
        }elseif ($int < 86400){
            $str = sprintf('%d小时前', floor($int / 3600));
        }elseif ($int < 2592000){
            $str = sprintf('%d天前', floor($int / 86400));
        }else{
            $str = date('Y-m-d', $time);
        }
        return $str;
    }

    //发送邮箱            留言内容
    public function email($contentAdress){  
        $toemail = "1103223758@qq.com";//定义收件人的邮箱  
    
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
    
    
        $mail->Subject = "[智铧博客]你的博客有人发表了留言";// 邮件标题  
        $mail->Body = '你的博客有人发表了留言：'.$contentAdress;// 邮件正文  
        //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用  
    
        if(!$mail->send()){// 发送邮件  
            echo "Message could not be sent.";  
            echo "Mailer Error: ".$mail->ErrorInfo;// 输出错误信息  
        }else{  
            //echo '发送成功';
            //$this->success('回复成功','/');
        }  
    } 
}
