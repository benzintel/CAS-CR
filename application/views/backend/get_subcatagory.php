<? if(isset($sub)){ ?>
<div class="form-group form-group-sm">
    <label class="col-sm-2 control-label" for="formGroupInputSmall">หมวดหมู่</label>
    <div class="col-sm-5">
        <select name="s_pcat" id="s_pcat" class="form-control">
            <? foreach($s_cat as $s_category){ ?>
                <option <? if($sub ==  $s_category['sub_id']){ echo "selected"; } ?>  value="<?= $s_category['sub_id']; ?>"><?= $s_category['sub_name']; ?></option>
            <? } ?>
        </select>
    </div>
</div>

<? }else{ ?>
<div class="form-group form-group-sm">
    <label class="col-sm-2 control-label" for="formGroupInputSmall">หมวดหมู่</label>
    <div class="col-sm-5">
        <select name="s_pcat" id="s_pcat" class="form-control">
            <? foreach($s_cat as $s_category){ ?>
                <option value="<?= $s_category['sub_id']; ?>"><?= $s_category['sub_name']; ?></option>
            <? } ?>
        </select>
    </div>
</div>
<? } ?>