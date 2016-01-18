<h2 style="border-bottom: 1px solid #ccc; padding-bottom: 10px;">NEWS</h2><br/>
<?php if(empty($source)){ ?> <!-- not paramiter form url Ex. http://localhost/index.php/welcome/news/ -->
    <?php foreach($news as $data){
        echo $data['news_name'];
    }?>

<?php }else{ ?>     <!-- have paramiter form url Ex. http://localhost/index.php/welcome/news/?news=[news_id] -->

    <?php foreach($source as $data){
//        echo $data['news_name'];
//        echo $data['news_detail'];
        //1

    } ?>

<?php } ?>

<div class="row">
    <?php foreach($news as $data){ ?>

        <div class="col-md-12" style="padding-bottom: 10px;">
            <h3><a href="index.php/welcome/news/?news=<?php echo $data['news_id']; ?>"><?php echo $data['news_name']; ?></a></h3>
            <!--        --><?//=$data['news_detail']; ?>
            <?=$data['news_name']; ?>
        </div>
        <hr>
    <?php } ?>
</div>
