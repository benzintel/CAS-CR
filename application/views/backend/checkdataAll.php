<style>
.red{
    color: #ff0000;
}
.green{
    color: green;
}
</style>
<div class="page-header" xmlns="http://www.w3.org/1999/html">
    <h3><span class="glyphicon glyphicon-th-list"></span> ตรวจสอบรายการสินค้า</h3>
</div>

<table id="myTable" class="table table-striped" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>รหัสสินค้า</th>
        <th>รุ่นสินค้า</th>
        <th>ชื่อสินค้า</th>
        <th>กลุ่มสินค้า</th>
        <th>แสดงผล</th>
        <th>ภาพสินค้า</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
    </tr>
    </thead>

    <tbody>
    <? $note = array('<label class="red">ไม่แสดงผล</label>','<label class="green">แสดงผล</label>'); ?>
    <? foreach($pro as $i => $data) { ?>
        <tr>
            <td><?= $data['pro_id'] ?></td>
            <td><?= $data['pro_name']; ?></td>
            <td><?= $data['pro_title']; ?></td>
            <td><?= $data['cat_name']; ?></td>
            <td><?= $note[$data['pro_show']]; ?></td>
            <td><img border="3" width="120px" height="60px" src="upload/<?=$data['pro_pic'];?>"/></td>
            <td><a href="index.php/backend/edit_Pdata/<?= $data['pro_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
            <td><a onclick="return confirm('ยืนยันการลบข้อมูล?');" href="index.php/backend/delete_Pdata/<?= $data['pro_id']; ?>"><span class="glyphicon glyphicon-remove red "></span></a></td>
        </tr>
    <? } ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable(
            { "order": [[ 0, "asc" ]] }
        );
    });
</script>