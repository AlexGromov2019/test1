<?php $this->layout('layout', ['title' => 'Edit post']) ?>

<div class="col-sm-8">
    <article class="single-blog">
        <div class="post-content">
            <div class="entry-header text-center text-uppercase">
                <div><?php echo flash()->display(); //Вывод исключений ?></div>
                <h2>Administration, <?=$this->e($name)?></h2>
                <p>Edit Post</p>

                <form action="/update-post" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?= $onePost[0]['id'] ?>">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" name="title" value="<?=$onePost[0]['title']?>" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea">Preview text</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3" name="preview_text" required><?=$onePost[0]['preview_text']?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea">Full text</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3" name="full_text" required><?=$onePost[0]['full_text']?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Category</label>
                        <select class="form-control" id="exampleSelect1" name="category" value="<?=$onePost[0]['category']?>" required>
                            <option>animal</option>
                            <option>flowers</option>
                            <option>nature</option>
                        </select>
                    </div>

                    <input type="hidden" name="creation_date" value="<?=date("Y-m-d");?>">
                    <input type="hidden" name="author" value="<?=$auth->getUsername();?>">
                    <p>Images</p>
                    <p><img src="../assets/images/posts/<?= $onePost[0]['images'] ?>"></p>
                    <p><input class="imageupload" type="file" name="pictures" /></p>
                    <input type="hidden" name="defaultimage" value="<?= $onePost[0]['images'] ?>">
                    <p>
                        <button type="submit" class="btn btn-success">EDIT POST</button>
                        <a class="btn btn-primary btn-info" href="/admin" role="button">Back to admin panel</a>
                    </p>
                </form>

            </div>
        </div>
    </article>
</div>


