<?php
    $categoryListViews = $categoryListViews ?? [];
?>

<?php forEach ($categoryListViews as $listView): ?>
    <?= $listView?>
<?php endforeach; ?>

<?php if(!count($categoryListViews)): ?>
    <p>No categories existent</p>
<?php endif; ?>