<?php
?>

<div class="container">
    <div class="row float-right">
        <a href="<?= URL::site('workouts') ?>"
           class="go-to-add-exercise-page-button d-inline-block">Add Workout</a>
    </div>

    <h1>
        Your Workouts List
    </h1>

    <div class="input-group">
        <input id='input-search' type="text" placeholder="Search for workouts by name" required>
    </div>
    <div class="d-flex">
        <button type="submit" id='search-button' class="add-button">Start the Search</button>
    </div>


    <div id="workouts-list">

    </div>
</div>