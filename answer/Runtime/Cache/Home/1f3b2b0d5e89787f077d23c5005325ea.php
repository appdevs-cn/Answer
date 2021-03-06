<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>后台管理的主页面</title>

    <!-- Bootstrap Core CSS -->
    <link href="/Answer/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/Answer/Public/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Answer/Public/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/Answer/Public/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Answer/Public/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">


<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">后台管理系统</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
     <!--       <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>-->
            <ul class="dropdown-menu dropdown-messages">
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="#">
                        <div>
                            <strong>John Smith</strong>
                            <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                        </div>
                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>Read All Messages</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-messages -->
        </li>
        <!-- /.dropdown -->
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" href="<?php echo U('Home/Index/question/act/home');?>">
                <i class="fa fa-home">首页</i>
            </a>
            <!-- /.dropdown-user -->
        </li>


        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <!-- 判断身份，跳转到不同的个人中心 -->
                <?php if($userinfo['type'] == 'admin'): ?><li><a href="<?php echo U('Home/Admin/home');?>"><i class="fa fa-user fa-fw"></i> <?php echo ($userinfo["realname"]); ?>  </a></li>
                    <li class="divider"><a href="<?php echo U('Home/Admin/home');?>"> <?php echo ($userinfo["realname"]); ?> </a></li>
                <?php elseif($userinfo['type'] == 'teacher'): ?>
                    <li><a href="<?php echo U('Home/Teach/asked');?>"><i class="fa fa-user fa-fw"></i> <?php echo ($userinfo["realname"]); ?>  </a></li>
                    <li class="divider"><a href="<?php echo U('Home/Teach/asked');?>"> <?php echo ($userinfo["realname"]); ?> </a></li>
                <?php elseif($userinfo['type'] == 'student'): ?>
                    <li><a href="<?php echo U('Home/Stu/ask');?>"><i class="fa fa-user fa-fw"></i> <?php echo ($userinfo["realname"]); ?>  </a></li>
                    <li class="divider"><a href="<?php echo U('Home/Stu/ask');?>"> <?php echo ($userinfo["realname"]); ?> </a></li><?php endif; ?>

                <li>
                    <!--href="<?php echo U('Home/Login/loginOut');?>"-->
                    <a data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->









    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav in" id="side-menu">
                <!--<li class="sidebar-search">-->
                <!--<div class="input-group custom-search-form">-->
                <!--<input type="text" class="form-control" placeholder="Search...">-->
                <!--<span class="input-group-btn">-->
                <!--<button class="btn btn-default" type="button">-->
                <!--<i class="fa fa-search"></i>-->
                <!--</button>-->
                <!--</span>-->
                <!--</div>-->
                <!--&lt;!&ndash; /input-group &ndash;&gt;-->
                <!--</li>-->
                <div class="sidebar-nav navbar-collapse">
                    <?php if($userinfo["type"] == 'admin' and $act != 'home'): ?><!--管理员-->
                        <ul class="nav in" id="side-menu">
                            <li>
                                <a href="#"><i class="fa fa-dashboard fa-fw"></i> 学生管理<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                    <li>
                                        <a href="/Answer/Home/Admin/stu_add" class="<?php echo ($ad_adds); ?>">学生添加</a>
                                    </li>
                                    <li>
                                        <a href="/Answer/Home/Admin/stu_table" class="<?php echo ($ad_table); ?>">学生列表</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#" ><i class="fa fa-files-o fa-fw"></i> 教师管理<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                    <li>
                                        <a href="/Answer/Home/Admin/teach_add" class="<?php echo ($teach_add); ?>">教师添加</a>
                                    </li>
                                    <li>
                                        <a href="/Answer/Home/Admin/teach_table" class="<?php echo ($teach_table); ?>">教师列表</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="/Answer/Home/Admin/article" class="<?php echo ($teach_article); ?>"><i class="fa fa-files-o fa-fw"></i> 文章列表</a>
                            </li>
                            <li>
                                <a href="/Answer/Home/Admin/question" class="<?php echo ($question); ?>"><i class="fa fa-sitemap fa-fw"></i> 问题列表</a>
                            </li>
                            <li>
                                <a href="/Answer/Home/Admin/order" class="<?php echo ($order); ?>"><i class="fa fa-sitemap fa-fw"></i> 预约列表</a>
                            </li>
                            <li class="">
                                <a href="#"><i class="fa fa-tasks fa-fw"></i> 关键字管理<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                    <li>
                                        <a href="/Answer/Home/Admin/add_keys" class="<?php echo ($add_keys); ?>">关键字添加</a>
                                    </li>
                                    <li>
                                        <a href="/Answer/Home/Admin/keys_table" class="<?php echo ($keys_table); ?>">关键字列表</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li class="">
                                <a href="#"><i class="fa fa-tasks fa-fw"></i> 班级管理<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                    <li>
                                        <a href="/Answer/Home/Admin/add_tie" class="<?php echo ($add_tie); ?>">添加系</a>
                                    </li>
                                    <li>
                                        <a href="/Answer/Home/Admin/add_grade" class="<?php echo ($add_grade); ?>">添加年级</a>
                                    </li>
                                    <li>
                                        <a href="/Answer/Home/Admin/add_class" class="<?php echo ($add_class); ?>">添加班级</a>
                                    </li>
                                    <li>
                                        <a href="/Answer/Home/Admin/classList" class="<?php echo ($classList); ?>">班级列表</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                        <?php elseif($userinfo["type"] == 'teacher' and $act != 'home'): ?>
                        <!--教师-->
                        <ul class="nav in" id="side-menu">
                            <li>
                                <a href="<?php echo u('Teach/asked');?>" class="<?php echo ($tea_asked); ?>"><i class="fa fa-edit fa-fw"></i> 回答问题</a>
                            </li>
                            <li>
                                <a href="<?php echo u('Teach/collect');?>" class="<?php echo ($tea_collect); ?>"><i class="fa fa-bar-chart-o fa-fw"></i> 收藏夹<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level collapse">
                                    <li>
                                        <a href="<?php echo u('Teach/question');?>" class="<?php echo ($tea_question); ?>"> 问题</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo u('Teach/article');?>" class="<?php echo ($tea_article); ?>"> 文章</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="<?php echo u('Teach/publics');?>" class="<?php echo ($tea_publics); ?>"><i class="fa fa-wrench fa-fw"></i> 发表文章</a>
                            </li>
                            <li>
                                <a href="<?php echo u('Teach/questioned');?>" class="<?php echo ($tea_questioned); ?>"><i class="fa fa-table fa-fw"></i> 已回答问题</a>
                            </li>
                            <li>
                                <a href="<?php echo u('Teach/setTime');?>" class="<?php echo ($tea_questioned); ?>"><i class="fa fa-wrench fa-fw"></i> 设置可预约时间</a>
                            </li>
                            <li>
                                <a href="<?php echo u('Teach/appointmentList');?>" class="<?php echo ($tea_questioned); ?>"><i class="fa fa-table fa-fw"></i> 预约列表</a>
                            </li>
                        </ul>

                        <?php elseif($userinfo["type"] == 'student' and $act != 'home'): ?>
                        <!--学生-->
                        <ul class="nav in" id="side-menu">
                            <li>
                                <a href="<?php echo u('Stu/ask');?>" class="<?php echo ($active); ?>"><i class="fa fa-edit fa-fw"></i> 提问</a>
                            </li>
                            <li>
                                <a href="<?php echo u('Stu/collect');?>" class="<?php echo ($collect); ?>"><i class="fa fa-files-o fa-fw"></i> 收藏夹</a>
                            </li>
                            <li>
                                <a href="<?php echo u('Stu/find');?>" class="<?php echo ($find); ?>"><i class="fa fa-wrench fa-fw"></i> 寻找教师</a>
                            </li>
                            <li>
                                <a href="<?php echo u('Stu/question');?>" class="<?php echo ($question); ?>"><i class="fa fa-table fa-fw"></i> 历史问题</a>
                            </li>
                        </ul>

                        <?php elseif($act == 'home'): ?>
                        <!--首页-->
                        <ul class="nav in" id="side-menu">
                            <li>
                                <a href="<?php echo u('Home/Index/question/act/home');?>" class="<?php echo ($active); ?>"><i class="fa fa-times"></i> 待解答问题</a>
                            </li>
                            <li>
                                <a href="<?php echo u('Home/Index/overQuestion/act/home');?>" class="<?php echo ($collect); ?>"><i class="fa fa-check"></i> 已解答问题</a>
                            </li>
                            <li>
                                <a href="<?php echo u('Home/Index/article/act/home');?>" class="<?php echo ($find); ?>"><i class="fa fa-stack-exchange"></i> 文章列表</a>
                            </li>
                            <li>
                                <a href="<?php echo u('Home/Index/select/act/home');?>" class="<?php echo ($find); ?>"><i class="fa fa-search"></i> 内容搜索</a>
                            </li>
                        </ul><?php endif; ?>
                </div>

                <!--      <li>
                          <a href="index.html" class="active"><i class="fa fa-edit fa-fw"></i> 提问</a>
                      </li>
                      <li>
                          <a href="index.html" class="active"><i class="fa fa-files-o fa-fw"></i>收藏夹</a>
                      </li>
                      <li>
                          <a href="index.html" class="active"><i class="fa fa-wrench fa-fw"></i>寻找教师</a>
                      </li>
                      <li>
                          <a href="index.html" class="active"><i class="fa fa-table fa-fw"></i>历史问题</a>
                      </li>-->

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper" style="min-height: 475px;">
    <div class="col-lg-12">
        <h1 class="page-header">已回答问题</h1>
    </div>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                已回答问题列表
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>题目(title)</th>
                            <th>内容(content)</th>
                            <th>类型(type)</th>
                            <th>时间(time)</th>
                            <th>操作(action)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($reply_list)): $i = 0; $__LIST__ = $reply_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($vo["title"]); ?></td>
                                <td><?php echo ($vo["content"]); ?></td>
                                <td><?php echo ($vo["type"]); ?></td>
                                <td><?php echo ($vo["time"]); ?></td>
                                <td><a href="<?php echo U('Home/Teach/detail/id/' . $vo['id']);?>">详情</a></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
</div>


<!--底部-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">确认退出</h4>
            </div>
            <div class="modal-body">
                退出后，可重新登录
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <a href="<?php echo U('Home/Login/loginOut');?>" type="button" class="btn btn-primary">确定</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- jQuery -->
<script src="/Answer/Public/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/Answer/Public/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/Answer/Public/js/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="/Answer/Public/js/raphael.min.js"></script>
<script src="/Answer/Public/js/morris.min.js"></script>
<script src="/Answer/Public/js/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/Answer/Public/js/sb-admin-2.js"></script>

<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    // popover demo
    $("[data-toggle=popover]")
        .popover()
</script>


</body>

</html>