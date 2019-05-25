<?php $this->layout('layout', ['title' => 'Add post']) ?>

<div class="col-sm-8">
    <article class="single-blog">
        <div class="post-content">
            <div class="entry-header text-center text-uppercase">
                <div><?php echo flash()->display(); //Вывод исключений ?></div>
                <h2>Administration, <?=$this->e($name)?></h2>
                <p>Add Post</p>

                <form action="/add-post" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea">Preview text</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3" name="preview_text" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea">Full text</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3" name="full_text" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Category</label>
                        <select class="form-control" id="exampleSelect1" name="category" required>
                            <option>animal</option>
                            <option>flowers</option>
                            <option>nature</option>
                        </select>
                    </div>

                    <input type="hidden" name="creation_date" value="<?=date("Y-m-d");?>">
                    <input type="hidden" name="author" value="<?=$auth->getUsername();?>">
                    <p>Images</p>
                    <p><input class="imageupload" type="file" name="pictures" required /></p>
                    <p>
                        <button type="submit" class="btn btn-success">ADD POST</button>
                        <a class="btn btn-primary btn-info" href="/admin" role="button">Back to admin panel</a>
                    </p>
                </form>

            </div>
        </div>
    </article>
</div>


