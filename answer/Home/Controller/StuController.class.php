<?php
namespace Home\Controller;

use Think\Controller;

class StuController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // 是否登录
        if (!cookie('userinfo')) {
            $this->redirect('Home/Login/login');
        }
    }
    // 后台主页面---提问界面
    public function ask()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');

        // 获取keys数据
        $keys = D('keys');
        $keysList = $keys->getKeysList();
        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('keysList', $keysList);
        $this->assign('active', $active);
        $this->display();
    }

    // 学生提问提交处理
    public function askAct()
    {
        $article = D('article');

        $insert = $article->askAct();

        if($insert){
            $this->success('提交成功','Home/Stu/ask',2);
        }else{
            $this->error('提交失败,请检查输入');
        }
    }

    //收藏夹
    public function collect()
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
            $article_lists[] = $article->getArticleDetail($val['id']);
        }

        dump($article_lists);

        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('collect', $active);
        $this->assign('article_lists', $article_lists);
        $this->display();
    }
    //寻找老师
    public function find()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('find', $active);
        $this->display();
    }
    //历史问题
    public function question()
    {
        // 从cookie获取用户登录信息
        $userinfo = cookie('userinfo');
        // 分配信息到模板
        $active='active';
        $this->assign('userinfo', $userinfo);
        $this->assign('question', $active);
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