<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\phpstudy_pro\WWW\priactise\public/../application/admin\view\column\ajax_find.html";i:1650813748;}*/ ?>
<div class="form-group ">
    <label for="">栏目名</label>
    <input type="text" name="name" class="form-control addAdmin" value="<?php echo $data['name']; ?>">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    <div class="alert alert-warning"></div>

</div>
<div class="form-group ">
    <label for="">栏目跳转链接</label>
    <input type="text" name="goto" class="form-control addAdmin" value="<?php echo $data['goto']; ?>">
    <!-- <input type="hidden" name="id" value="<?php echo $data['id']; ?>"> -->
    <div class="alert alert-warning"></div>

</div>
<div class="form-group">
    <label for="">栏目是否显示</label>
    <input type="radio" name="is_display" value="1" <?php if($data['is_display'] == 1): ?>checked<?php endif; ?>>是 <input type="radio" name="is_display" value="2" <?php if($data['is_display'] == 2): ?>checked<?php endif; ?>>否
    <div class="alert alert-warning"></div>

</div>
<div class="form-group">
    <label for="">栏目排序</label>
    <input type="text" name="sort" class="form-control addAdmin" value="<?php echo $data['sort']; ?>">
    <div class="alert alert-warning"></div>

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

        $.post("<?php echo url('Column/ajax_save'); ?>", str, function(data) {

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