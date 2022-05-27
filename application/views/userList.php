<?php
    $userListViews = $userListViews ?? [];
?>

<?php forEach ($userListViews as $listView): ?>
        <?= $listView?>
<?php endforeach; ?>

<?php if(!count($userListViews)): ?>
    <p>No users found for the search input provided!</p>
<?php endif; ?>
