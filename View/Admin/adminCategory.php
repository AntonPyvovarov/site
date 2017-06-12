<h1>This is Admin</h1>

<table class="table table-hover ">
    <thead>
    <tr>
        <th class="text-center"> ID</th>
        <th class="text-center"> Категорія</th>
        <th class="text-center"> Змінити</th>
        <th class="text-center"> Видалити</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data['menu'] as $category) { ?>
        <tr>
            <td><?php echo $category['id'] ?></td>
            <td>
                <a class="" href="Admin/news/<?php echo $category['id'] ?>" role="button">
                    <?php echo $category['category'] ?>
                </a>
            </td>

            <td><a class="btn btn-warning" href="#" role="button">Редагувати</a></td>

            <td>
                <form class="form-inline" role="form" method="post">
                    <input type="hidden" name="action" value="deleteCat"/>
                    <input type="hidden" name="id" value="<?php echo $category['id'] ?>"/>
                    <button class="btn btn-danger" type="submit">Удалить</button>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<form class="form-inline" role="form" method="post">
    <div>
        <div class="  form-group  pull-left ">
            <label class="sr-only " for="category">Категорія</label>
            <input name="category" type="text" class="form-control " id="category" placeholder="Введіть Категорію">
        </div>
        <div>
            <button type="submit" class=" btn btn-success ">Submit</button>
        </div>
    </div>
</form>