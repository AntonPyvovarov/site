<table class="table table-bordered">
    <?php foreach ($news as $news){ ?>
        <tr>
            <td><?php echo $news['title'] ?></td>
            <td><?php echo $news['date'] ?></td>
            <td><?php echo $news['raiting'] ?></td>
        </tr>
    <?php } ?>
</table>