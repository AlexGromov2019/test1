<?php if ($auth->isLoggedIn()):?>
    <aside class="widget about-me-widget  text-center">
        <div class="about-me-content">
            <div class="about-me-img">
                <?php foreach ($getUserAvatar as $avatar):?>

                    <script>
                        window.onload = function () {
                            //Картинка поверх картинки

                            let avatar = document.getElementById("avatar");
                            let box = document.getElementById("box");
                            avatar.onmouseover = function () {
                                box.style.display = "block";
                            }
                            box.onmouseover = function () {
                                box.style.display = "block";
                            }
                            avatar.onmouseout = function () {
                                box.style.display = "none";
                            }
                        }
                    </script>


                <img src="../assets/images/avatars/<?=$avatar['avatar'];?>" alt="Avatar" id="avatar" class="img-me img-circle" width="169">
                <a href="/edit-profile"><img src="../assets/images/avatars/imgupdate.png" id="box"></a>
                <? endforeach; ?>
                <h2 class="text-uppercase">Heelo, <?=$auth->getUsername();?></h2>
                <?php if ($auth->hasAnyRole(\Delight\Auth\Role::ADMIN)): ?>
                    <p><a href="/admin" style="text-decoration: underline;"><strong>ADMINISTRATIVE SECTION</strong></a></p>
                <? endif; ?>
                <p><a href="/logout" class="logout">LOGOUT</a></p>

            </div>
        </div>
        <div class="social-share">
            <ul class="list-inline">
                <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </aside>
<? endif; ?>
