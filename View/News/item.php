
<?php foreach ($data ['item'] as $key => $item) { ?>

<div class="row">
    <h2 class="text-primary "><?php echo $item ['title'] ?></h2>
    <div class="col-md-10 pull-right">
        <img src="<?php echo $item['photo']  ?>" class="img-responsive " alt="Responsive image">
    </div>

    <div class="text-justify ">
    <?php echo $item['text'] ?>
    </div>

    <?php } ?>

</div>

