<nav>
    <a class="<?php if($pathParts['filename'] == 'index') {
        print 'activePage';
    }
    ?>" href="index.php">Home</a>

    <a class="<?php if($pathParts['filename'] == 'detail') {
        print 'activePage';
    }
    ?>" href="detail.php">Wind&nbsp;Energy</a>

    <a class="<?php if($pathParts['filename'] == 'form') {
        print 'activePage';
    }
    ?>" href="form.php">Survey</a>

    <a class="<?php if($pathParts['filename'] == 'array') {
        print 'activePage';
    }
    ?>" href="array.php">Emissions</a>
</nav>