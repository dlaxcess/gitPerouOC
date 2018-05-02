<?php?>

<ul class="pagination pagination-sm">
    <?php
        if ($pageId > 1) {
    ?>
            <li><a href="index.php?id=<?= strval($pageId - 1) ?>">&laquo;</a></li>
    <?php
        }
        else {
    ?>
            <li class="disabled"><span style="background-color: lightgrey">&laquo;</span></li>
    <?php
        }
        for ($i = 1; $i <= $pagesAmount; $i++) {
            if ($i == $pageId) {
    ?>
                <li class="active"><a href="index.php?id=<?= strval($i) ?>"><?= strval($i) ?></a></li>
    <?php
            }
            else {
    ?>
                <li><a href="index.php?id=<?= strval($i) ?>"><?= strval($i) ?></a></li>
    <?php
            }
        }
        if ($pageId != $pagesAmount) {
    ?>
            <li><a href="index.php?id=<?= strval($pageId + 1) ?>">&raquo;</a></li>
    <?php
        }
        else {
    ?>
            <li class="disabled"><span style="background-color: lightgrey">&raquo;</span></li>
    <?php
        }
    ?>
</ul>