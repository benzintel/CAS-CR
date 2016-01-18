<style>
    .red{
        color: #ff0000;
    }
    .green{
        color: green;
    }
</style>
<div class="page-header" xmlns="http://www.w3.org/1999/html">
    <h3><span class="glyphicon glyphicon-th-list"></span> ระบบจัดการข่าวสาร</h3>
</div>

<table id="myTable" class="table table-striped" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>รหัสข่าว</th>
        <th>เรื่อง</th>
        <th>แสดงผล</th>
        <th>วันที่สร้างข่าว</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
    </tr>
    </thead>

    <tbody>
    <? $note = array('<label class="red">ไม่แสดงผล</label>','<label class="green">แสดงผล</label>'); ?>
    <? foreach($pro as $i => $data) { ?>
        <tr>
            <td><?= $data['news_id'] ?></td>
            <td><?= $data['news_name']; ?></td>
            <td><?= $note[$data['news_show']]; ?></td>
            <td><?= $data['news_create']; ?></td>
            <td><a href="index.php/backend/edit_news/<?= $data['news_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
            <td><a onclick="return confirm('ยืนยันการลบข้อมูล?');" href="index.php/backend/delete_data_news/<?= $data['news_id']; ?>"><span class="glyphicon glyphicon-remove red "></span></a></td>
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