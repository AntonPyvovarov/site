<div class="row">
    <div class="col-md-offset-2 ">
        <div class="col-sm-10 ">
            <form role="form" enctype="multipart/form-data" action="Admin/createNews" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="title">
                </div>
                <div class="form-group">
                    <label for="short_content">Short_content</label>
                    <input name="short_content" type="text" class="form-control" id="short_content" placeholder="short_content">
                </div>
                <div>
                    <label for="text">Input text</label>
                    <textarea name="text" class="form-control" rows="3"></textarea>
                </div>
                <div>
                    <label for="Category">Select Category</label>
                    <select class="form-control" name="category_id">
                        <?php foreach ($data['menu'] as $category){ ?>
                            <option value="<?php echo $category['id'] ?>"><?php echo $category['category'] ?></option>
                        <?php } ?>
                    </select>
                </div>


                <div class="form-group">
                    <label for="photo"> Photo </label>
                    <input name="photo" type="file" class="form-control" id="photo" placeholder="photo">
                </div>
                <br>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>