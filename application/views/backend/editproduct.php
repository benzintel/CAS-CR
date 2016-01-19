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
    <h3><span class="glyphicon glyphicon-th-list"></span> แก้ไขสินค้าในระบบ</h3>
</div>

<form action="index.php/backend/save_edit_data" class="form-horizontal" id="form" name="form" method="post" enctype="multipart/form-data">

<? foreach($pro as $data){ ?>
    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">ชื่อสินค้า</label>
        <div class="col-sm-5">
            <input class="form-control" type="text" name="pname" id="pname" value="<?= $data['pro_name']; ?>" placeholder="ชื่อสินค้า">
        </div>
        <div class="col-sm-1 starred">
            <label>*</label>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">รายละเอียดย่อ</label>
        <div class="col-sm-5">
            <input class="form-control" type="text" name="pdetail" id="pdetail" value="<?= $data['pro_title']; ?>"  placeholder="รายละเอียดย่อ">
        </div>
        <div class="col-sm-1 starred">
            <label>*</label>
        </div>
    </div>

    <?php if($data['pro_pic']){ ?>
    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">รูปภาพที่อยู่ในระบบ</label>
        <div class="col-sm-5">
            <img width="150" height="150" src="upload/<?= $data['pro_pic']; ?>"/>
        </div>
    </div>
    <?php } ?>

    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">รูปภาพ</label>
        <div class="col-sm-5">
            <input type="file" class="form-control" id="pimage" name="pimage">
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">PDF</label>
        <div class="col-sm-5">
            <input type="file" class="form-control" id="pdf" name="pdf">
            <?php if($data['pdf']){ echo "<span class='red' id='pdf_name'>".$data['pdf']."</span>"; ?>
            <button  type="button" class="btn btn-danger" id="remove_pdf" name="remove_pdf">ลบไฟล์</button>
            <?php } ?>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">รายละเอียด</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="editor1" name="editor1"><?= $data['pro_detail']; ?></textarea>
        </div>
    </div>


    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">Youtube</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="youtube" name="youtube"><?= $data['youtube']; ?></textarea>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">แสดงผล</label>
        <div class="col-sm-5">
            <select name="show" id="show" class="form-control">
                <option <? if($data['pro_show'] == 0){ echo "selected"; } ?> value="0">ไม่แสดงผล</option>
                <option <? if($data['pro_show'] == 1){ echo "selected"; } ?> value="1">แสดงผล</option>
            </select>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">หมวดหมู่</label>
        <div class="col-sm-5">
            <select name="pcat" id="pcat" class="form-control">
                <? foreach($cat as $category){ ?>
                    <option <? if($data['cat_id'] == $category['cat_id']){ echo "selected"; } ?> value="<?= $category['cat_id']; ?>"><?= $category['cat_name']; ?></option>
                <? } ?>
            </select>
        </div>
    </div>

    <div id="test"></div>

    <div class="form-group form-group-sm">
        <div class="col-sm-2 control-label">
            <button onclick="JavaScript:Cancel();" value="cancel" type="button" class="btn btn-danger">ยกเลิก</button>
        </div>
        <div class="col-sm-1 control-label">
            <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
    </div>

    <input type="hidden" id="id" name="id" value="<?= $data['pro_id']; ?>" />
    <input type="hidden" id="cat" name="cat" value="<?= $data['cat_id']; ?>" />
    <input type="hidden" id="sub" name="sub" value="<?= $data['sub_id']; ?>" />
    <input type="hidden" id="oldpic" name="oldpic" value="<?= $data['pro_pic']; ?>" />
    <input type="hidden" id="oldpdf" name="oldpdf" value="<?= $data['pdf']; ?>" />
<? } ?>

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
                pname:      "required",
                pdetail:    "required"
            },
            messages: {
                pname:   "<p class='red'>กรุณากรอกชื่อสินค้า</p>",
                pdetail: "<p class='red'>กรุณากรอกข้อมูลโดยย่อ</p>"
            },
        });
        var cat = $("#cat").val();
        var sub = $("#sub").val();
        $.post( "index.php/backend/get_catagory_editpage", {name: cat, sub:sub} ,function(data){
            $("#test").html(data);
        });

        $("#pcat").change(function(){
            var i = $("#pcat").val();
            $.post( "index.php/backend/get_catagory", {name:i} ,function(data){
                $("#test").html(data);
            });
        });

        $("#remove_pdf").click(function(){
           var pdf_name = $("#pdf_name").text();
           var id =  $("#id").val();
           $.post("index.php/backend/remove_pdf" ,{ name: pdf_name, id:id } , function (data) {
               alert(data);
           });
           $('#oldpdf').val("");
           $('#pdf_name').remove();
           $('#remove_pdf').remove();
        });
    });

    function Cancel(){
        if(confirm('cancel')==true){
            window.location = 'index.php/backend/root_menu';
        }
    }
</script>