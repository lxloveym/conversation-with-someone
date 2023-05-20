<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"D:\phpstudy_pro\WWW\priactise\public/../application/admin\view\admin\ajax_find.html";i:1648746008;}*/ ?>
<div class="form-group ">
    <label for="">用户名</label>
    <input type="text" name="username" class="form-control editAdmin" placeholder="请输入管理员账号名" id="" value="<?php echo $data['username']; ?>" readonly>
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

</div>
<div class="form-group">
    <label for="">密码</label>
    <input type="password" name="password" class="form-control editAdmin" placeholder="请输入管理员密码" id="">

</div>
<div class="form-group">
    <label for="">确认密码</label>
    <input type="password" name="repassword" class="form-control editAdmin" placeholder="请再次输入密码" id="">

</div>

<div class="form-group">
    <label for="">状态</label>
    <div>
        <?php if($data['status'] == 1): ?>

        <label><input type="radio" name="status" value="2" id="">未登录</label>
        <label><input type="radio" name="status" value="3" id="">黑名单</label>
        <label><input type="radio" name="status" checked value="1" id="">已登录</label> <?php elseif($data['status'] == 3): ?>
        <label><input type="radio" name="status" value="2" id="">未登录</label>
        <label><input type="radio" name="status" value="1" id="">已登录</label>
        <label><input type="radio" name="status" checked value="3" id="">黑名单</label> <?php else: ?>
        <label><input type="radio" name="status" value="3" id="">黑名单</label>
        <label><input type="radio" name="status" value="1" id="">已登录</label>
        <label><input type="radio" name="status" checked value="2" id="">未登录</label> <?php endif; ?>

    </div>

</div>
<div class="form-group pull-right">
    <input type="button" onclick="save()" value="提交" class="btn btn-success">
    <input type="reset" value="重置" class="btn btn-danger">
</div>

<div style="clear:both"></div>
<script>
    function save() {
        // 获取表单的所有数据
        let str = $("#editAdminForm").serializeArray();

        // ajax提交到处理页面

        $.post("<?php echo url('admin/ajax_save'); ?>", str, function(data) {

            // 判断是否成功
            if (data.code == 200) {
                layer.msg(data.info, {
                    time: 1000
                }, function() {
                    window.location.reload();
                })
            } else {
                layer.msg(data.info);
            }
        });


    }
</script>