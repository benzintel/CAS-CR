<style>
    .control-label{
        margin-top: 5.5px;
    }
    .starred{
        padding-left: 0px !important;
        font-size: 50px !important;
        color: red;
    }
    .red{
        color: red;
    }
</style>

<div class="page-header">
    <h3><span class="glyphicon glyphicon-th-list"></span> เพิ่มข่าวสู่ระบบ</h3>
</div>

<form action="index.php/backend/edit_newssave/" class="form-horizontal" id="form" name="form" method="post">

<? foreach($data as $n){ ?>
    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">ชื่อข่าว</label>
        <div class="col-sm-5">
            <input class="form-control" type="text" name="pname" id="pname" placeholder="ชื่อข่าว" value="<?= $n['news_name']; ?>">
        </div>
        <div class="col-sm-1 starred">
            <label>*</label>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">รูปภาพ</label>
        <div class="col-sm-5">
            <input type="file" class="form-control" id="pimage" name="pimage">
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">youtube</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" id="youtube" name="youtube" value="<?= $n['news_youtube']; ?>">
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">รายละเอียด</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="editor1" name="editor1"><?= $n['news_detail']; ?></textarea>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">แสดงผล</label>
        <div class="col-sm-5">
            <select name="show" id="show" class="form-control">
                <option <? if($n['news_show'] == 0){ echo "selected"; } ?> value="0">ไม่แสดงผล</option>
                <option <? if($n['news_show'] == 1){ echo "selected"; } ?> value="1">แสดงผล</option>
            </select>
        </div>
    </div>

    <input type="hidden" id="id" name="id" value="<?= $n['news_id']; ?>" />
    <input type="hidden" id="oldpic" name="oldpic" value="<?= $n['news_pic']; ?>" />
<? } ?>

    <div class="form-group form-group-sm">
        <div class="col-sm-2 control-label">
            <button onclick="JavaScript:Cancel();" value="cancel" type="button" class="btn btn-danger">ยกเลิก</button>
        </div>
        <div class="col-sm-1 control-label">
            <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
    </div>

</form>

<script type="text/javascript">
    CKEDITOR.replace( 'editor1', {
        toolbarGroups: [
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ], groups: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
            { name: 'links' },
            { name: 'clipboard',   groups: ['basicstyles', 'undo' ] },
            { name: 'insert', groups: [ 'Image', 'Table', 'Iframe' ] }
        ]
    });

    $( document ).ready(function() {
        $("#form").validate({
            rules: {
                pname:      "required"
            },
            messages: {
                pname:   "<p class='red'>กรุณากรอกชื่อ</p>"
            },
        });
    });
    function Cancel(){
        if(confirm('cancel')==true){
            window.location = 'index.php/backend/root_menu';
        }
    }
</script>