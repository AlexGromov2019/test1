<?php $this->layout('layout', ['title' => 'Views SinglePage']); ?>
<?php use App\models\DateBuilder;?>

<div class="col-sm-8">
    <?php foreach ($getOnePost as $data): ?>
    <article class="single-blog">
        <div class="post-thumb">
            <img src="../assets/images/posts/<?=$this->e($data['images'])?>" alt="">
        </div>
        <div class="post-content">
            <div class="entry-header text-center text-uppercase">
                <a href="/category/<?=$this->e($data['category'])?>" class="post-cat"><?=$this->e($data['category'])?></a>
                <h2><?=$this->e($data['title'])?></h2>
            </div>
            <div class="entry-content">
                <p><?=$this->e($data['full_text'])?></p>
            </div>

            <div class="post-meta">
                <ul class="pull-left list-inline author-meta">
                    <li class="author">By <a href="#"><?=$this->e($data['author'])?> </a></li>
                    <li class="date"> On <?=DateBuilder::convertDate($this->e($data['creation_date'])); ?></li>
                </ul>
                <ul class="pull-right list-inline social-share">
                    <li><span style="color: #777;">Views:</span> <span><?=$data['views_post']; ?></span></li>
                </ul>
            </div>
        </div>
    </article>
    <? endforeach; ?>
    <div class="top-comment"><!--top comment-->
        <img src="../assets/images/avatars/<?=$userInfo[0][avatar]?>" width="100" class="pull-left img-circle" alt="">
        <h4><a href="#"><?=$userInfo[0][username]?></a></h4>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy hello ro mod tempor
            invidunt ut labore et dolore magna aliquyam erat.</p>
        <ul class="list-inline social-share">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        </ul>
    </div>
    <div class="row"><!--blog next previous-->

        <div class="col-md-6">
            <?php if ($prev):?>
            <div class="single-blog-box">
                <a href="/page/<?=$prev[0]['id']?>">
                    <img src="../assets/images/posts/<?=$prev[0]['images']?>" alt="" width="360" height="134">
                    <div class="overlay">
                        <div class="promo-text">
                            <p><i class=" pull-left fa fa-angle-left"></i></p>
                            <h5><?=$prev[0]['title']?></h5>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif;?>
        </div>

        <div class="col-md-6">
            <?php if ($next):?>
            <div class="single-blog-box">
                <a href="/page/<?=$next[0]['id']?>">
                    <img src="../assets/images/posts/<?=$next[0]['images']?>" alt="" width="360" height="134">
                    <div class="overlay">
                        <div class="promo-text">
                            <p><i class="pull-right fa fa-angle-right"></i></p>
                            <h5><?=$next[0]['title']?></h5>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif;?>
        </div>

    </div>
    <div class="related-post-carousel"><!--related post carousel-->
        <div class="related-heading">
            <h4>You might also like</h4>
        </div>
        <div class="related-post-carousel-items">
            <div class="single-item">
                <a href="#">
                    <img src="../assets/images/p-1.jpg" alt="">
                    <h4>Lorem ipsum dolor sit amet,</h4>
                </a>
            </div>
            <div class="single-item">
                <a href="#">
                    <img src="../assets/images/p-2.jpg" alt="">
                    <h4>Just Wondering at Beach</h4>
                </a>
            </div>
            <div class="single-item">
                <a href="#">
                    <img src="../assets/images/p-3.jpg" alt="">
                    <h4>Nonumy eirmod tempor invidunt</h4>
                </a>
            </div>
            <div class="single-item">
                <a href="#">
                    <img src="../assets/images/p-1.jpg" alt="">
                    <h4>Justo duo dolores et ea rebum</h4>
                </a>
            </div>
            <div class="single-item">
                <a href="#">
                    <img src="../assets/images/p-2.jpg" alt="">
                    <h4>Duo dolores justo t ea rebum</h4>
                </a>
            </div>
            <div class="single-item">
                <a href="#">
                    <img src="../assets/images/p-3.jpg" alt="">
                    <h4>Duo dolores justo t ea rebum</h4>
                </a>
            </div>
        </div>
    </div>

    <div class="comment-area">
        <a name="commentyakor"></a>
        <div class="comment-heading">
            <h3><?=$countComments[0]['COUNT(*)']?> Thoughts</h3>
        </div>

        <script type="text/javascript">
            //Меняем parent_id, если нажата кнопка ответить на комментарий
            $(document).ready(function () {

                $( "a.reply" ).click(function() {
                    var id = $(this).attr("id");
                    $("#parent_id").attr("value",id);
                });

            });
        </script>

        <?php foreach ($comments->GetParentComments($getOnePost[0]['id']) as $com):?>

        <div class="single-comment">
            <div class="media">
                <div class="media-left text-center">
                    <a href="#"><img class="media-object" width="80" src="../assets/images/avatars/<?=$com['author_img']?>" alt=""></a>
                </div>
                <div class="media-body">
                    <div class="media-heading">
                        <h3 class="text-uppercase">
                            <a href="#"><?=$com['author']?></a>
                            <a href="#bottomform" class="pull-right reply-btn reply" id="<?=$com['id']?>">reply</a>
                        </h3>
                    </div>
                    <p class="comment-date"><?=$com['datetime']?></p>
                    <p class="comment-p"><?=$com['text']?></p>
                </div>
            </div>
        </div>

            <?php foreach ($comments->GetSubComments($com['id']) as $SubCom):?>

        <div class="single-comment single-comment-reply">
            <div class="media">
                <div class="media-left text-center">
                    <a href="#"><img class="media-object" width="80" src="../assets/images/avatars/<?=$SubCom['author_img']?>" alt=""></a>
                </div>
                <div class="media-body">
                    <div class="media-heading">
                        <h3 class="text-uppercase"><a href="#"><?=$SubCom['author']?></a></h3>
                    </div>
                    <p class="comment-date">Published <?=$time->showDate($SubCom['datetime'])?> ago</p>
                    <p class="comment-p"><?=$SubCom['text']?></p>
                </div>
            </div>
        </div>
            <?php endforeach;?>
        <?php endforeach;?>

    </div>
    <a name="bottomform"></a>
    <!--leave comment-->
    <?php if($auth->isLoggedIn()): //Если залогинен?>
    <div class="leave-comment">
            <h4>Leave a reply</h4>
            <form class="form-horizontal contact-form"   method="post" action="/addcomment">
                <div class="form-group">
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="form-control" rows="6" name="text" placeholder="Write Massage" required></textarea>
                        <input type="hidden" name="post_id" value="<?=$getOnePost[0]['id']?>">
                        <input type="hidden" name="parent_id" value="0" id="parent_id">
                        <input type="hidden" name="datetime" value="<?=date("Y-m-d H:i:s")?>">
                        <input type="hidden" name="author" value="<?=$auth->getUsername();?>">
                        <input type="hidden" name="author_img" value="<?=$getUserAvatar[0]['avatar'];?>">
                    </div>
                </div>
                <button type="submit" class="btn send-btn">Post Comment</button>
            </form>
        </div>
    <?php else: //Если не залогинен?>
    <div class="leave-comment">
            <h4>Leave a reply</h4>
            <form class="form-horizontal contact-form"   method="post" action="/addcomment">
                <div class="form-group">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="name" name="author" placeholder="Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="form-control" rows="6" name="text" placeholder="Write Massage" required></textarea>
                        <input type="hidden" name="post_id" value="<?=$getOnePost[0]['id']?>">
                        <input type="hidden" name="parent_id" value="0" id="parent_id">
                        <input type="hidden" name="datetime" value="<?=date("Y-m-d H:i:s")?>">
                        <input type="hidden" name="author_img" value="noavatar.jpg">
                    </div>
                </div>
                <button type="submit" class="btn send-btn">Post Comment</button>
            </form>
        </div>
    <?php endif; ?>
</div>


