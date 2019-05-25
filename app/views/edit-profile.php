<?php $this->layout('layout', ['title' => 'Edit Profile']); ?>
<div class="col-sm-8">
    <article class="single-blog">
        <div class="post-content">
            <div class="entry-header text-center text-uppercase">
                <div><?php echo flash()->display(); //Вывод исключений ?></div>
                <h2>updated avatar</h2>
                <form action="/update-info-profile" method="post" enctype="multipart/form-data">
                    <p><input name="id" type="hidden" value="<?=$auth->getUserId();?>"></p>
                    <p><img src="../assets/images/avatars/<?=$avatar;?>" </p>
                    <p><input class="imageupload" type="file" name="pictures" accept="image/*"/></p>
                    <p><input type="submit" value="Update avatar"
                              class="kotha-sidebar widget news-letter-widget btn-subscribe"></p>
                </form>
            </div>
        </div>
    </article>
</div>