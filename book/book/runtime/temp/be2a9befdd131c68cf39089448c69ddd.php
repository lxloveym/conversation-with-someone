<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpstudy_pro\WWW\priactise\public/../application/admin\view\news\ajax_find.html";i:1651176220;}*/ ?>
<form action="<?php echo url('News/ajax_save'); ?>" method="post" enctype="multipart/form-data">
    <div class="form-group ">
        <label for="">书籍名称</label>
        <input type="text" name="book_name" class="form-control addAdmin" value="<?php echo $data['book_name']; ?>">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <div class="alert alert-warning"></div>

    </div>
    <div class="form-group ">
        <label for="">书籍简介</label>
        <input type="text" name="introduction" class="form-control addAdmin" value="<?php echo $data['introduction']; ?>">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <div class="alert alert-warning"></div>

    </div>
    <div class="form-group">
        <label for="">书籍分类</label>
        <select name="cid" id="" class="form-control">
            <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo $val['id']; ?>"><?php echo $val['name']; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <div class="alert alert-warning"></div>
    </div>
    <div class="form-group">
        <label for="">书籍图片</label>
        <input type="file" name="img" id="">
        <input type="hidden" name="oldimg" value="<?php echo $data['img']; ?>">
        <br>
        <img src="/upload/tmp/<?php echo $data['img']; ?>" width="100%" alt="">
        <div class="alert alert-warning"></div>

    </div>
    <div class="form-group">
        <label for="">书籍作者</label>
        <input type="text" name="author" class="form-control addAdmin" value="<?php echo $data['author']; ?>">
        <div class="alert alert-warning"></div>

    </div>

    <div class="form-group">
        <label for="">浏览量</label>
        <input type="number" name="click_num" class="form-control addAdmin" value="<?php echo $data['click_num']; ?>">
        <div class="alert alert-warning"></div>

    </div>
    <div class="form-group">
        <label for="">点赞数</label>
        <input type="number" name="click_good" class="form-control addAdmin" value="<?php echo $data['click_good']; ?>">
        <div class="alert alert-warning"></div>

    </div>
    <div class="form-group">
        <label for="">收藏数</label>
        <input type="number" name="scollection" class="form-control addAdmin" value="<?php echo $data['collection']; ?>">
        <div class="alert alert-warning"></div>

    </div>

    <div class="form-group pull-right">
        <input type="submit" value="提交" class="btn btn-success">
        <input type="reset" value="重置" class="btn btn-danger">
    </div>
    <div style="clear:both"></div>
</form>