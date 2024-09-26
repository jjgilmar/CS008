<nav>
    <a class="<?php if($pathParts['filename'] == 'index') {
        print 'activePage';
    }
    ?>" href="index.php">His Life</a>

    <a class="<?php if($pathParts['filename'] == 'detail') {
        print 'activePage';
    }
    ?>" href="detail.php">Albums</a>

<a class="<?php if($pathParts['filename'] == 'detail2') {
        print 'activePage';
    }
    ?>" href="detail2.php">Other Media</a>

    <a class="<?php if($pathParts['filename'] == 'form') {
        print 'activePage';
    }
    ?>" href="form.php">Survey</a>
</nav>