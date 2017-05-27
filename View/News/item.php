

<div class="row">
    <?php if($data['item']){
        foreach ($data ['item'] as $key => $item) { ?>

    <h2 class="text-primary "><?php echo $item ['title'] ?></h2>
    <div class="col-md-10 pull-right">
        <img src="<?php echo $item['photo']  ?>" class="img-responsive " alt="Responsive image">
    </div>

    <div class="text-justify ">
    <?php echo $item['text'] ?>
    </div>
    <?php }} ?>

    <hr>
    <?php if($data['comment']){
    foreach($data['comment'] as $comment){ ?>
        <div class="well well-large">
            <?php echo $comment['text'] ?>
        </div>

    <?php }} ?>
<?php if(\Common\Session::get ( 'user' )){?>
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form accept-charset="UTF-8" action="" method="POST">
                    <textarea class="form-control counted" name="message" placeholder="Type in your message" rows="5
" style="margin-bottom:10px;"></textarea>
                    <h6 class="pull-right" id="counter">320 characters remaining</h6>
                    <button class="btn btn-info" type="submit">Post New Message</button>
                </form>
            </div>
        </div>
    </div>

    <?php }else{?>

<div class="alert alert-warning" role="alert">
   <p>Щоб залишити повідомлення потрібно увійти!</p>
</div>
<?php } ?>
</div>

