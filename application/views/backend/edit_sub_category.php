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
    <h3><span class="glyphicon glyphicon-th-list"></span> เพื่มหมวดหมู่ย่อย</h3>
</div>

<form action="index.php/backend/edit_sub_category_save" class="form-horizontal" id="form" name="form" method="post" enctype="multipart/form-data">
<? foreach($sub as $data){ ?>
    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">หมวดหมู่หลัก</label>
        <div class="col-sm-5">
            <select name="pcat" id="pcat" class="form-control">
                <? foreach($cat as $category){ ?>
                    <option value="<?= $category['cat_id'];?>" <? if($data['cat_id'] == $category['cat_id']){ echo "selected"; } ?>><?= $category['cat_name']; ?></option>
                <? } ?>
            </select>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">ชิ่อหมวดย่อย</label>
        <div class="col-sm-5">
            <input class="form-control" type="text" name="pname" id="pname" placeholder="ชิ้อหมวดย่อย" value="<?= $data['sub_name'] ?>">
        </div>
        <div class="col-sm-1 starred">
            <label>*</label>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">แสดงผล</label>
        <div class="col-sm-5">
            <select name="show" id="show" class="form-control">
                <option <? if($data['sub_show'] == 0){ echo "selected"; } ?> value="0">ไม่แสดงผล</option>
                <option <? if($data['sub_show'] == 1){ echo "selected"; } ?> value="1">แสดงผล</option>
            </select>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <div class="col-sm-2 control-label">
            <button onclick="JavaScript:Cancel();" value="cancel" type="button" class="btn btn-danger">ยกเลิก</button>
        </div>
        <div class="col-sm-1 control-label">
            <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
    </div>

    <input type="hidden" id="id" name="id" value="<? echo $data['sub_id']; ?>" />
<? } ?>

</form>

<script type="text/javascript">
    $( document ).ready(function(){
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
