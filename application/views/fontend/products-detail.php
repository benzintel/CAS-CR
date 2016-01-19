<style>
    table{
        width: 100% !important;
    }
    table,tr,td{
        border: 1px solid #666666;
    }
</style>
<? foreach($select as $data){ ?>
    <div class="detail-item">
        <h3><a href="#"></a><?= $data['pro_name'];?></h3>
        <img src="http://<?= $_SERVER["HTTP_HOST"] ?>/upload/<?= $data['pro_pic']; ?>" alt="">
        <p>
            <?= $data['pro_title']; ?>
        </p>
    </div>
    <div class="detail-box">
        <ul>
            <?= $data['pro_detail']; ?>
        </ul>
    </div>
    <?php if($data['pdf']){ ?>

        <object data="http://<?= $_SERVER["HTTP_HOST"] ?>/upload/<?= $data['pdf']; ?>" type="application/pdf" width="100%" height="800">
            <p>Alternative text - include a link <a href="http://<?= $_SERVER["HTTP_HOST"] ?>/upload/<?= $data['pdf']; ?>">to the PDF!</a></p>
        </object>

    <?php } ?>
    <div class="detail-vdo">
<!--        <div class="detail-vdo-box">-->
            <? if($data['youtube']){
                $youtube = 'https://www.youtube.com/embed/';
                $youtube .= end(explode("/",$data['youtube']));
                echo "<h4>VDO details</h4>";
                echo '<iframe width="240" height="150" src="'.$youtube.'" frameborder="0" allowfullscreen></iframe>';
            } ?>
<!--        </div>-->
<? } ?>