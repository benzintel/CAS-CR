<style>
    table {
        width: 100% !important;
    }

    table, tr, td {
        border: 1px solid #666666;
    }
</style>
<? foreach ($news_data as $data) { ?>
    <div class="detail-item">
        <h3><a href="#"></a><?= $data['news_name']; ?></h3>
        <img src="http://<?= $_SERVER["HTTP_HOST"] ?>/upload/<?= $data['news_pic']; ?>" alt="">

        <div class="detail-box">
            <ul>
                <?= $data['news_detail']; ?>
            </ul>
        </div>

        <div class="detail-vdo">
            <? if($data['news_youtube']){
                $youtube = 'https://www.youtube.com/embed/';
                $youtube .= end(explode("/",$data['news_youtube']));
                echo "<h4>VDO details</h4>";
                echo '<iframe width="240" height="150" src="'.$youtube.'" frameborder="0" allowfullscreen></iframe>';
            } ?>
        </div>
    </div>

<? } ?>
