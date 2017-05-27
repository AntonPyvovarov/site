<h1>This is Admin</h1>

<table class="table table-hover ">
    <thead >
    <tr>
    <th class="text-center" >  ID </th>
    <th class="text-center"> Категорія </th>
    <th class="text-center"> Змінити </th>
    <th class="text-center"> Видалити </th>
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
            <td><a class="btn btn-warning" href="#" role="button">Змінити</a></td>
            <td><a class="btn btn-danger" href="#" role="button">Видалити</a></td>
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
    <button type="submit" class=" btn btn-success pull">Submit</button>
        </div>
    </div>
</form>