<?php  

$mes = null;
if (!empty($res)) { $mes = $res; }

?>
<?php require_once(ROOT.'/views/layouts/header.php'); ?>

    <?php require_once(ROOT.'/views/layouts/heading.php'); ?>   
    
    <section id="blog" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <div class="row">
                        <?php if (is_array($res)): ?>
                            <?php foreach ($res as $item): ?>
                                <?php 
                                    $date = explode('-', $item->date);
                                    list($year, $month, $day) = $date;
                                ?>
                                <div class="col-sm-12 col-md-12">
                                    <div class="single-blog single-column">
                                        <div class="post-thumb">
                                            <a href="#">
                                                <img src="<?php  
                                                        if (!empty($item->picture)) {
                                                            echo $item->picture;
                                                        } else {
                                                            echo '/template/images/blog/9.jpg';
                                                        }
                                                        ?>" 
                                                     class="img-responsive" 
                                                     alt=""></a>
                                            <div class="post-overlay">
                                                <span class="uppercase">
                                                    <a href="#"><?=date('d', mktime(0, 0, 0, 0, $day, $year)) ?> <br><small><?=date('M', mktime(0, 0, 0, 0, $day, $year)) ?></small></a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="post-content overflow">
                                            <h2 class="post-title bold"><a href="?action=detail&amp;item=<?=$item->id ?>"><?=$item->caption ?></a></h2>
                                            <h3 class="post-author"><a href="#">Posted by micron News</a></h3>
                                            <p><?=mb_strimwidth($item->description, 0, 450, "..."); ?></p>
                                            <a href="#" class="read-more">View More</a>
                                            <div class="post-bottom overflow">
                                                <ul class="nav navbar-nav post-nav">
                                                    <li><a href="#"><i class="fa fa-tag"></i>Creative</a></li>
                                                    <!--
                                                    <li><a href="#"><i class="fa fa-heart"></i>32 Love</a></li>
                                                    <li><a href="#"><i class="fa fa-comments"></i>3 Comments</a></li>
                                                    -->
                                                    <?php if (isset($_SESSION['session_username'])): ?>
                                                        <?php if ($item->author == $_SESSION['session_username']): ?>
                                                            <li><a href="?action=edit&amp;itemID=<?=$item->id ?>"><i class="fa fa-tag"></i>Редактировать новость</a></li>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if (isset($mes) && !empty($mes) && !is_array($mes)): ?>
                            <?php echo $mes ?>
                        <?php endif; ?>
                    </div>
                    
                    <?php require_once(ROOT.'/views/layouts/pagination.php'); ?>
                 </div>
                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        
                        <div class="sidebar-item categories">
                            <h3>Categories</h3>
                            <ul class="nav navbar-stacked">
                                <!--
                                <li><a href="#">Lorem ipsum<span class="pull-right">(1)</span></a></li>
                                <li class="active"><a href="#">Dolor sit amet<span class="pull-right">(8)</span></a></li>
                                <li><a href="#">Adipisicing elit<span class="pull-right">(4)</span></a></li>
                                <li><a href="#">Sed do<span class="pull-right">(9)</span></a></li>
                                <li><a href="#">Eiusmod<span class="pull-right">(3)</span></a></li>
                                <li><a href="#">Mockup<span class="pull-right">(4)</span></a></li>
                                <li><a href="#">Ut enim ad minim <span class="pull-right">(2)</span></a></li>
                                <li><a href="#">Veniam, quis nostrud <span class="pull-right">(8)</span></a></li>
                                -->
                                <?php require_once(ROOT.'/views/layouts/categories.php');?>   
                            </ul>
                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#blog-->

<?php require_once(ROOT.'/views/layouts/footer.php'); ?>