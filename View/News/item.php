<div class="row">
    <?php if($data['item']){
        foreach ($data ['item'] as $key => $item) { ?>

            <h2 class="text-primary "><?php echo $item ['title'] ?></h2>
            <br>

            <img src="http://localhost/mySite/View/img/<?php echo $item['photo'] ?>"
                 class="img-responsive " alt="Responsive image">
            <br>


            <div class="text-justify ">
                <?php echo $item['text'] ?>
            </div>
        <?php }} ?>

    <hr>
    <?php if($data['comment']){
        foreach($data['comment'] as $comment){ ?>

            <div class="col-xs-8 col-md-8 col-lg-8">

                <div class="well well-sm">
                    <div class="pull-left comment-name" > <?php echo $comment['name'] ?></div>
                    <div class="pull-right comment-date"><?php echo $comment ['date']   ?></div>
                    <br>
                    <div class="text-justify ">
                        <p ><?php echo $comment['text'] ?></p>
                    </div>
                </div>
            </div>

        <?php }} ?>
    <?php if(\Common\Session::get ( 'user' )){?>
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form accept-charset="UTF-8" action="" method="POST">
                    <textarea class="form-control counted text-comment" name="message"
                              placeholder="Type in your message" rows="5" ></textarea>
                        <h6 class="pull-right" id="counter">320 characters remaining</h6>
                        <button class="btn btn-info" type="submit">Post New Message</button>
                    </form>
                </div>
            </div>
        </div>

    <?php }else{?>

        <div class="alert alert-warning col-sm-12 col-md-12" role="alert">
            <p>Щоб залишити повідомлення потрібно увійти!</p>
        </div>
    <?php } ?>
</div>
