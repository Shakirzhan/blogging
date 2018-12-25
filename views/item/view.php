<?php require_once(ROOT.'/views/layouts/header.php'); ?>    
   
    <?php require_once(ROOT.'/views/layouts/heading.php'); ?>

    <section id="blog-details" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                            <div class="single-blog blog-details two-column">
                                <div class="post-thumb">
                                    <a href="#"><img src="<?=$res['picture'] ?>" class="img-responsive" alt=""></a>
                                    <div class="post-overlay">
                                        <span class="uppercase"><a href="#">14 <br><small>Feb</small></a></span>
                                    </div>
                                </div>
                                <div class="post-content overflow">
                                    <h2 class="post-title bold"><a href="#"><?=$res['caption'] ?></a></h2>
                                    <h3 class="post-author"><a href="#">Posted by micron News</a></h3>
                                    <p><?=$res['description'] ?></p>
                                    <div class="post-bottom overflow">
                                        <ul class="nav navbar-nav post-nav">
                                            <li><a href="#"><i class="fa fa-tag"></i>Creative</a></li>
                                            <li><a href="#"><i class="fa fa-heart"></i>32 Love</a></li>
                                            <li><a href="#"><i class="fa fa-comments"></i>3 Comments</a></li>
                                        </ul>
                                    </div>
                                    <div class="blog-share">
                                        <span class='st_facebook_hcount'></span>
                                        <span class='st_twitter_hcount'></span>
                                        <span class='st_linkedin_hcount'></span>
                                        <span class='st_pinterest_hcount'></span>
                                        <span class='st_email_hcount'></span>
                                    </div>
                                    <div class="author-profile padding">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <img src="/template/images/blogdetails/1.png" alt="">
                                            </div>
                                            <div class="col-sm-10">
                                                <h3>Rodrix Hasel</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                                                <span>Website:<a href="www.jooomshaper.com"> www.jooomshaper.com</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="response-area">
                                        <h2 class="bold">Comments</h2>
                                        <?php if (isset($_SESSION['session_username'])): ?>
                                            <form id="main-contact-form" name="comment_form" method="post">
                                                <input type="hidden" name="itemID" id="itemID" value="<?=$res['id'] ?>">
                                                <div class="form-group">
                                                    <input type="email" name="email" id="comment_email" class="form-control" required="required" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="comment_content" id="message" required="required" class="form-control" rows="8" placeholder="Your text here"></textarea>
                                                </div>                        
                                                <div class="form-group">
                                                    <input type="hidden" name="comment_id" id="comment_id" value="0" />
                                                    <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                                                </div>
                                            </form>
                                        <?php else: ?>
                                            <input type="hidden" name="itemID" id="itemID" value="<?=$res['id'] ?>">
                                            <div class="alert alert-danger" role="alert">Незарегистрированные пользователи не могут оставлять комментарии!</div>
                                        <?php endif; ?>
                                        <span id="comment_message"></span>
                                        <ul class="media-list">
                                            <li class="media" id="display_comment"></li>
                                        </ul>         
                                    </div><!--/Response-area-->
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item categories">
                            <h3>Categories</h3>
                            <ul class="nav navbar-stacked">
                                <li><a href="#">Lorem ipsum<span class="pull-right">(1)</span></a></li>
                                <li class="active"><a href="#">Dolor sit amet<span class="pull-right">(8)</span></a></li>
                                <li><a href="#">Adipisicing elit<span class="pull-right">(4)</span></a></li>
                                <li><a href="#">Sed do<span class="pull-right">(9)</span></a></li>
                                <li><a href="#">Eiusmod<span class="pull-right">(3)</span></a></li>
                                <li><a href="#">Mockup<span class="pull-right">(4)</span></a></li>
                                <li><a href="#">Ut enim ad minim <span class="pull-right">(2)</span></a></li>
                                <li><a href="#">Veniam, quis nostrud <span class="pull-right">(8)</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->
<?php require_once(ROOT.'/views/layouts/footer.php'); ?>