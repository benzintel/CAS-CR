<div class="row">
    <? if(isset($alert)){ ?>
        <div class="text-center"><?= $alert ?></div>
    <? } ?>

    <? foreach($data as $pro){ ?>
    <div class="col-md-4 product-item">
        <a href="index.php/welcome/select_data_detail/<?= $pro['pro_id']; ?>" ><img src="upload/<?=$pro['pro_pic'];?>" alt=""></a>
        <h3><a href="index.php/welcome/select_data_detail/<?= $pro['pro_id']; ?>"><?=$pro['pro_name']; ?></a></h3>
        <p>
            <?=$pro['pro_title']; ?>
        </p>
    </div>
    <? } ?>

</div>

<? echo $this->pagination->create_links(); ?>
<!--<ul class="pagination">-->
<!--    <li><a href="#">Prev</a></li>-->
<!--    <li><a href="#">1</a></li>-->
<!--    <li><a href="#">2</a></li>-->
<!--    <li><a href="#">3</a></li>-->
<!--    <li><a href="#">4</a></li>-->
<!--    <li><a href="#">5</a></li>-->
<!--    <li><a href="#">Next</a></li>-->
<!--</ul>-->