
<?php if (isset($data['page'])) { ?>
    <?php if ($data['page']): ?>
        <div class="blog-pagination">
            <ul class="pagination">
                <?php if ($data['curpage'] != $data['startpage']) { ?>
                    <li class="startpage"><a href="?action=page&amp;page=<?php echo $data['startpage'] ?>">left</a></li>
                <?php } ?>
                <?php if ($data['curpage'] >= 2) { ?>
                    <li><a href="?action=page&amp;page=<?php echo $data['previouspage'] ?>"><?php echo $data['previouspage'] ?></a></li>
                <?php } ?>
                <li class="active"><a href="?action=page&amp;page=<?php echo $data['curpage'] ?>"><?php echo $data['curpage'] ?></a></li>
                <?php if ($data['curpage'] != $data['endpage']) { ?>
                    <li><a href="?action=page&amp;page=<?php echo $data['nextpage'] ?>"><?php echo $data['nextpage'] ?></a></li>
                    <li class="endpage"><a href="?action=page&amp;page=<?php echo $data['endpage'] ?>">right</a></li>
                <?php } ?>
            </ul>
        </div>
    <?php endif; ?>
<?php } ?>

<?php if (isset($data['category'])) { ?>
    <?php if ($data['category']): ?>
        <div class="blog-pagination">
            <ul class="pagination">
                <?php if ($data['curpage'] != $data['startpage']) { ?>
                    <li class="startpage"><a href="?action=category&amp;categoryID=<?=$categoryID ?>&amp;page=<?php echo $data['startpage'] ?>">left</a></li>
                <?php } ?>
                <?php if ($data['curpage'] >= 2) { ?>
                    <li><a href="?action=category&amp;categoryID=<?=$categoryID ?>&amp;page=<?php echo $data['previouspage'] ?>"><?php echo $data['previouspage'] ?></a></li>
                <?php } ?>
                <li class="active"><a href="?action=category&amp;categoryID=<?=$categoryID ?>&amp;page=<?php echo $data['curpage'] ?>"><?php echo $data['curpage'] ?></a></li>
                <?php if ($data['curpage'] != $data['endpage']) { ?>
                    <li><a href="?action=category&amp;categoryID=<?=$categoryID ?>&amp;page=<?php echo $data['nextpage'] ?>"><?php echo $data['nextpage'] ?></a></li>
                    <li class="endpage"><a href="?action=category&amp;categoryID=<?=$categoryID ?>&amp;page=<?php echo $data['endpage'] ?>">right</a></li>
                <?php } ?>
            </ul>
        </div>
    <?php endif; ?>
<?php } ?>