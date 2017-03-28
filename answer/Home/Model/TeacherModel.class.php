<?php
    namespace Home\Model;

    use Think\Model;

    class TeacherModel extends Model
    {
        // 查询所有教师信息
        public function getTeacherList(){

            return $this->order('`time` DESC')->select();

        }

        // 验证登录是否成功
        public function verifyLogin($phone , $password)
        {
            $where['phone'] = $phone;
            $where['password'] = md5($password);

            $teainfo = $this->where($where)->find();

            if($teainfo){
                $teainfo['type'] = 'teacher';
                cookie('userinfo' , $teainfo , 24*60*60*7);
                return true;
            }else{
                return false;
            }
        }

        // 入参id获取信息
        public function getTeacherInfo($teacherid)
        {
            $where['id'] = $teacherid;

            return $this->where($where)->field('id,realname,classid,phone,time')->find();
        }
    }
?>