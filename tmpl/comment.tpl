<div class="post-comment">
    <a class="pull-left" href="#">
        <img class="media-object" width="100" src="template/images/blog/02_photo/no_photo.jpg" alt="">
    </a>
    <div class="media-body">
    		<!-- $row["comment_sender_name"] -->
        <span><i class="fa fa-user"></i>Posted by <a href="#">$comment_sender_name$</a></span>
        <!-- $row["comment"] -->
        <p>$comment$</p>
        <ul class="nav navbar-nav post-nav">
        		<!-- $row["date"] -->
            <li><a><i class="fa fa-clock-o"></i>$date$</a></li>
            <!-- $row["comment_id"] -->
            <li><a class="reply" id="$comment_id$"><i class="fa fa-reply"></i>Reply</a></li>
        </ul>
    </div>
</div>