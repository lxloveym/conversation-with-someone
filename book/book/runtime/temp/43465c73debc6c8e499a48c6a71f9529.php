<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/priactise/public/../application/admin/view/said/ajax_find.html";i:1650902067;}*/ ?>
<div class="form-group ">
    <label for="">名人名言内容</label>
    <input type="text" name="content" class="form-control editAdmin" placeholder="请输入内容" id="" value="<?php echo $data['content']; ?>">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

</div>

<div class="form-group">
    <label for="">状态</label>
    <div>
        <?php if($data['status'] == 1): ?>

        <label><input type="radio" name="status" value="2" id="">不显示</label>
        <label><input type="radio" name="status" checked value="1" id="">显示</label><?php else: ?><label><input type="radio"
                name="status" value="1" id="">显示</label>
        <label><input type="radio" name="status" checked value="2" id="">不显示</label><?php endif; ?>

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

        $.post("<?php echo url('said/ajax_save'); ?>", str, function(data) {

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