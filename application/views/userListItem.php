<?php

$user = $user ?? null;

$isAdmin = str_contains($user->roles, 'admin');
?>

<div class="row user-box">
    <div class="col-2">
        <p>ID: <?= $user->id ?> </p>
    </div>
    <div class="col-2">
        <p>Username: <?= $user->username ?> </p>
    </div>
    <div class="col-3">
        <p>Email: <?= $user->email ?> </p>
    </div>
    <div class="col-3">
        <p class="roles">Roles: <?= $user->roles ?> </p>
    </div>
    <div>
        <button data-id=<?="{$user->id}" ?> class='remove-admin-button <?= $isAdmin ? '' : 'd-none' ?>'>Remove admin</button>
        <button data-id=<?="{$user->id}" ?> class='add-admin-button <?= $isAdmin ? 'd-none' : '' ?>' >Add admin</button>
    </div>

</div>
