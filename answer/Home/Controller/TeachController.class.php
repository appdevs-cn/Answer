<?php
namespace Home\Controller;

use Think\Controller;

class TeachController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $userinfo = cookie('userinfo');

        // 是否登录
        if (!$userinfo) {
            $this->redirect('Home/Login/login');
        }

        // 是否对应权限
        if($userinfo['type'] != 'teacher'){
            $this->error('您不是教师，无权访问此页面','Home/Login/login',3);
        }
    }

    // 后台主页面---回答问题
    public function asked()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        // 查出所有未被回答的问题
        $article = D('article');
        $data = $article->getAwaitArticleList();

        $list = $data['list'];
        $show = $data['show'];

        dump($list[0]);

        // 分配信息到模板
        $active='active';

        $this->assign('list',$list);// 赋值数据集
        $this->assign('show',$show);// 赋值分页输出
        $this->assign('tea_asked', $active);
        $this->assign('userinfo', $userinfo);
        $this->display();
    }

    //收藏夹
    public function collect()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('tea_collect', $active);
        $this->assign('userinfo', $userinfo);
        $this->display();
    }

    //收藏夹-问题
    public function question()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        // 查询出所有收藏的内容
        $collect = D('collect');
        $collect_list = $collect->getCollectList();

        // 查询出所有内容的详情
        $article = D('article');
        $article_lists = array();

        // 遍历存查询出所有详情
        foreach($collect_list as $key => $val){
            $info = $article->getArticleDetail($val['articleid']);

            if($info['type'] == '问题' || $info['type'] == '已解答的问题'){
                $article_lists[] = $info;
            }
        }

        dump($article_lists);

        // 分配信息到模板
        $active='active';
        $this->assign('tea_question', $active);
        $this->assign('userinfo', $userinfo);
        $this->assign('article_lists', $article_lists);
        $this->display();
    }

    //收藏夹-文章
    public function article()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        // 查询出所有收藏的内容
        $collect = D('collect');
        $collect_list = $collect->getCollectList();

        // 查询出所有内容的详情
        $article = D('article');
        $article_lists = array();

        // 遍历存查询出所有详情
        foreach($collect_list as $key => $val){
            $info = $article->getArticleDetail($val['articleid']);

            if($info['type'] == '文章'){
                $article_lists[] = $info;
            }
        }

        dump($article_lists);

        // 分配信息到模板
        $active='active';
        $this->assign('tea_article', $active);
        $this->assign('article_lists', $article_lists);
        $this->assign('userinfo', $userinfo);
        $this->display();
    }

    //发表文章
    public function publics()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('tea_publics', $active);
        $this->assign('userinfo', $userinfo);
        $this->display();
    }

    //已回答问题
    public function questioned()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        // 查询出当前登录用户的回答
        $reply = D('reply');
        $infos = $reply->getReplyUserReplyList();

        // 遍历存查询出所有详情
        $article = D('article');
        $reply_list = array();
        foreach($infos as $key => $val){
            $reply_list[] = $article->getArticleDetail($val['articleid']);
        }

        dump($reply_list);

        // 分配信息到模板
         $active='active';
        $this->assign('tea_questioned', $active);
        $this->assign('userinfo', $userinfo);
        $this->assign('reply_list', $reply_list);
        $this->display();
    }













    // 获取系信息
    public function getSeriesList()
    {
        $series = D("series");
        $series_list = $series->getGradeList();

        $this->ajaxReturn($series_list);
    }

    // 获取年级信息
    public function getGradeList()
    {
        $grade = D("grade");
        $grade_list = $grade->getGradeList();

        $this->ajaxReturn($grade_list);
    }

    // 获取班级信息
    public function getClassList()
    {

        $class = D("class");
        $class_list = $class->getGradeList();

        $this->ajaxReturn($class_list);
    }

}

?>