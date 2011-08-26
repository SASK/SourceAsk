<?php /* Smarty version 2.6.26, created on 2011-08-11 02:30:49
         compiled from question.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['host']; ?>
css/main.css" type="text/css" />
<title>首页</title>
</head>

<body>
	<div class="wrapper">
    	<div class="header">
        	<div class="nav">
            	<a href="#" class="username">Alice</a>|<a href="#">提问</a>|<a href="#">账号设置</a>|<a href="#">退出</a>
            </div>
            <div class="search">
            	<div class="logo"><img src="<?php echo $this->_tpl_vars['host']; ?>
image/logo.jpg" width="170" /></div>
                <div class="searchcontent">
                	<form>
                        <input type="text" value="请输入您要搜索的问题" />
                        <a href="#" class="searchbtn">搜索</a>
                	</form>
                </div>
                <div class="ask">
                	<a href="#">我要提问</a>
                </div>
            </div>
            <div class="tab">
            	<a href="#">问题</a><a href="#">标签</a><a href="#">用户</a><a href="#">勋章</a>
            </div>
        </div>
        <div class="content">
            <div class="left">
                <div class="second_tab">
                    <div class="tab_title">所有问题</div>
                    <div class="tab_list">
                    	<a href="http://127.0.0.1/CodeIgniter/question/" <?php if ($this->_tpl_vars['tag'] == hot): ?>class="current"<?php endif; ?>>热门问题</a>
                    	<a href="http://127.0.0.1/CodeIgniter/question/latest" <?php if ($this->_tpl_vars['tag'] == latest): ?>class="current"<?php endif; ?>>最新问题</a>
                    	<a href="http://127.0.0.1/CodeIgniter/question/weekrank" <?php if ($this->_tpl_vars['tag'] == week): ?>class="current"<?php endif; ?>>本周热门</a>
                    	<a href="http://127.0.0.1/CodeIgniter/question/monthrank" <?php if ($this->_tpl_vars['tag'] == month): ?>class="current"<?php endif; ?>>本月热门</a>
                    </div>
                </div>
                <ul class="question">
				<?php $_from = $this->_tpl_vars['questions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                    <li class="q">
                        <ul class="q_state">
                            <li>
                                <span class="num num1"><?php echo $this->_tpl_vars['item']['votes']; ?>
</span>
                                <span class="num1">投票</span>
                            </li>
                            <li class="noanswer">
                                <span class="num num2"><?php echo $this->_tpl_vars['item']['answer']; ?>
</span>
                                <span class="num2">回答</span>
                            </li>
                            <li>
                                <span class="num num3"><?php echo $this->_tpl_vars['item']['view']; ?>
</span>
                                <span class="num3">关注</span>
                            </li>
                        </ul>
                        <div class="qi">
                            <h2 class="q_title"><a href="#"><?php echo $this->_tpl_vars['item']['title']; ?>
</a></h2>
                            <div class="q_other">
                                <div class="q_tag">
                                    <a class="tag" href="#">互联网</a>
                                    <a class="tag" href="#">php</a>
                                    <a class="tag" href="#">iphone</a>
                                </div>
                                <div class="q_author">10分钟前<a href="#">Alice</a>提问</div>
                            </div>
                        </div>
                    </li>
                 <?php endforeach; endif; unset($_from); ?>
                </ul>
            </div>
            <div class="right">
                <div class="adv">
                    <img src="" />
                </div>
                <div class="adv">
                    <img src="" />
                </div>
                <div class="addtag">
                    <h2>感兴趣的标签</h2>
                    <div>
                    	<span href="#" class="tag">互联网aaaaa<a href="#" class="deltag"></a></span>
                    	<span href="#" class="tag">互联网 <a href="#" class="deltag"></a></span>
                    	<span href="#" class="tag">互联网 <a href="#" class="deltag"></a></span>
                    	<span href="#" class="tag">互联网 <a href="#" class="deltag"></a></span>
                    	<span href="#" class="tag">互联网 <a href="#" class="deltag"></a></span>
                    </div>
                    <div class="addaction">
                    	<input type="text" /><a href="#">添加</a>
                    </div>
                </div>
                
                <div class="hottag">
                    <h2>热门标签</h2>
                    <div class="tags">
					<?php $_from = $this->_tpl_vars['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                        <div><a href="#" class="tag"><?php echo $this->_tpl_vars['item']->name; ?>
</a><span>×<?php echo $this->_tpl_vars['item']->q_total; ?>
</span></div>
					<?php endforeach; endif; unset($_from); ?>
                    </div>
                </div>
        	</div>
    	</div>
    </div>
</body>
</html>