<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\phpstudy_pro\WWW\priactise\public/../application/admin\view\newtype\ajax_update.html";i:1650557685;}*/ ?>
<div class="form-group ">
    <label for="">书籍分类名</label>
    <input type="text" name="name" class="form-control addAdmin" placeholder="请输入书籍分类名" value="<?php echo $data['name']; ?>">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    <div class="alert alert-warning"></div>

</div>


<div class="form-group pull-right">
    <input type="button" onclick="add()" value="提交" class="btn btn-success">
    <input type="reset" value="重置" class="btn btn-danger">
</div>

<div style="clear:both"></div>

<script>
    function add() {
        let str = $("#editAdminForm").serializeArray(); //获取表单总的所有内容

        // ajax提交到处理页面

        $.post("<?php echo url('Newtype/ajax_save'); ?>", str, function(data) {

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