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
    <h3><span class="glyphicon glyphicon-th-list"></span> เพิ่มผู้ใช้งาน</h3>
</div>

<form action="index.php/backend/user_add_data" class="form-horizontal" id="form" name="form" method="post" enctype="multipart/form-data">


    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">Username</label>
        <div class="col-sm-5">
            <input class="form-control" type="text" name="username" id="username" placeholder="Username">
        </div>
        <div class="col-sm-1 starred">
            <label>*</label>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">Name</label>
        <div class="col-sm-5">
            <input class="form-control" type="text" name="name" id="name" placeholder="name">
        </div>
        <div class="col-sm-1 starred">
            <label>*</label>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">Password</label>
        <div class="col-sm-5">
            <input class="form-control" type="password" name="password" id="password" placeholder="กรอกขั้นต่ำ 5 อักษร">
        </div>
        <div class="col-sm-1 starred">
            <label>*</label>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="col-sm-2 control-label" for="formGroupInputSmall">Re-Password</label>
        <div class="col-sm-5">
            <input class="form-control" type="password" name="repassword" id="repassword" placeholder="กรุณาใส่รหัสผ่านซ้ำอีกครั้ง">
        </div>
        <div class="col-sm-1 starred">
            <label>*</label>
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


<script>
    $(document).ready(function(){
        $("#form").validate({
            rules: {
                username:{
                    minlength : 5
                },
                name: "required",
                password:    {
                    minlength : 5
                },
                repassword: {
                    minlength : 5,
                    equalTo : "#password"
                }
            },
            messages: {
                username:   "<p class='red'>กรุณากรอกผู้ใช้งาน</p>",
                name:   "<p class='red'>กรุณากรอกชื่อ</p>",
                password: "<p class='red'>กรุณากรอกรหัสผ่าน</p>",
                repassword: "<p class='red'>รหัสที่ใส่ไม่ตรงกันค่ะ</p>"
            },
        });
    });
    function Cancel(){
        if(confirm('cancel')==true){
            window.location = 'index.php/backend/root_menu';
        }
    }
</script>