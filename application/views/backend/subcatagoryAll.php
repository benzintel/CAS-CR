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
    .green{
        color: green;
    }
</style>


<div class="page-header">
    <h3><span class="glyphicon glyphicon-th-list"></span> เพื่มหมวดหมู่</h3>
</div>

<table id="myTable" class="table table-striped" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>รหัสหมวดย่อย</th>
        <th>ชื่อหมวดย่อย</th>
        <th>หมวดหลัก</th>
        <th>แสดงผล</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
    </tr>
    </thead>

    <tbody>
    <? $note = array('<label class="red">ไม่แสดงผล</label>','<label class="green">แสดงผล</label>'); ?>
    <? foreach($cat as $i => $data) { ?>
        <tr>
            <td><? ++$i; if($i <= 9){echo "0";} echo $i; ?></td>
            <td><?= $data['sub_name']; ?></td>
            <td><? if($data['cat_id'] == 99){echo '';}else{ echo $data['cat_name']; } ?></td>
            <td><?= $note[$data['sub_show']];?></td>
            <td><a href="index.php/backend/edit_sub_category/<?= $data['sub_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
            <td><a onclick="return confirm('ยืนยันการลบข้อมูล?');" href="index.php/backend/delete_sub_category/<?= $data['sub_id']; ?>"><span class="glyphicon glyphicon-remove red "></span></a></td>
        </tr>
    <? } ?>
    </tbody>
</table>

<script type="text/javascript">
    $( document ).ready(function() {
        $('#myTable').DataTable(
            { "order": [[ 0, "asc" ]] }
        );
    });
    function Cancel(){
        if(confirm('cancel')==true){
            window.location = 'index.php/backend/root_menu';
        }
    }
</script>
