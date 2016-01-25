<h2 style="border-bottom: 1px solid #ccc; padding-bottom: 10px;">NEWS</h2><br/>

<div class="row">
    <? if (isset($alert)) { ?>
        <div class="text-center"><?= $alert ?></div>
    <? } ?>

    <? foreach ($news as $key => $data) {
        if ($key <= 8) { ?>
            <div class="news-item">
                <? if($data['news_pic']){ ?>
                <div class="col-md-5">
                    <a href="index.php/welcome/news_detail/<?php echo $data['news_id']; ?>">
                        <img src="upload/<?= $data['news_pic']; ?>" alt="">
                    </a>
                </div>
                <? } ?>

                <div class="news-item--ct col-md-7">
                    <h3 class="news-item--hd">
                        <a href="index.php/welcome/news_detail/<?php echo $data['news_id']; ?>">
                            <?= $data['news_name']; ?>
                        </a>
                    </h3>

                    <p class="news-item--dt">
                        <?= $data['news_detail']; ?>
                    </p>
                </div>
            </div>
        <? }
    }?>
</div>
