<style>
    .red{
        color: red;
    }
</style>
<div class="page-header">
    <h3><span class="glyphicon glyphicon-th-list"></span> เพิ่มรูปภาพเข้าสู่ระบบ</h3>
</div>

<form action="index.php/backend/uploadimage" class="form-horizontal" id="form" name="form" method="post" enctype="multipart/form-data">
    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">รูปภาพ</label>
        <div class="col-sm-5">
            <input class="form-control" id="pimage" type="file" name="pimage[]" multiple>
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
</form>
<br><br><br>
<table id="myTable" class="table table-striped" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>ลำดับ</th>
        <th>ที่อยู่</th>
        <th>รูป</th>
        <th>ลบ</th>
    </tr>
    </thead>

    <tbody>
    <? $i=0; foreach($image as $data){ ?>
    <tr>
        <th><?= ++$i; ?></th>
        <th><?= $_SERVER["HTTP_HOST"]."/library_images/".$data['img_name']; ?></th>
        <th><img border="3" width="120px" height="60px" src="library_images/<?= $data['img_name']; ?>"/></th>
        <th><a onclick="return confirm('ยืนยันการลบข้อมูล?');" href="index.php/backend/delete_images/<?= $data['img_id']; ?>"><span class="glyphicon glyphicon-remove red "></span></a></th>
    </tr>
    <? } ?>
    </tbody>
</table>

<script>
    function Cancel(){
        if(confirm('cancel')==true){
            window.location = 'index.php/backend/root_menu';
        }
    }
    $(document).ready(function(){
        $('#myTable').DataTable(
            { "order": [[ 0, "asc" ]] }
        );
    });
</script>