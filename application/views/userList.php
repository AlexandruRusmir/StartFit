<?php
    $userListViews = $userListViews ?? [];
?>

<?php forEach ($userListViews as $listView): ?>
        <?= $listView?>
<?php endforeach; ?>