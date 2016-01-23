<style>
    table {
        width: 100% !important;
    }

    table, tr, td {
        border: 1px solid #666666;
    }
</style>
<? foreach ($news as $data) { ?>
    <div class="detail-item">
        <h3><a href="#"></a><?= $data['data_name']; ?></h3>
        <img src="http://<?= $_SERVER["HTTP_HOST"] ?>/upload/<?= $data['data_pic']; ?>" alt="">
    </div>
    <div class="detail-box">
        <ul>
            <?= $data['news_detail']; ?>
        </ul>
    </div>

<? } ?>
