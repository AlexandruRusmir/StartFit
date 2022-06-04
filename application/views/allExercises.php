<?php
?>
<a href="<?=URL::site('exerciseHandling/display_add_exercise')?>" class="go-to-add-exercise-page-button d-inline-block">Add exercise</a>

<?php
?>

<h1>
    Registered Users
</h1>

<div class="input-group">
    <input id='input-search' type="text" placeholder="Search by username" name="username" required>
</div>


<div id="users-list">

</div>

<script>
    const exercisesViewHandler = {


        onSuccessExercisesListRequest: function (responseJSON, responseText) {

            console.log(responseJSON);
        },

        exercisesListRequest: new Request.JSON({
            onSuccess: function (responseJSON, responseText) {
                exercisesViewHandler.onSuccessExercisesListRequest(responseJSON, responseText);
            },
        }),

        init: function () {
            this.exercisesListRequest.send({
                method: 'get',
                url: "<?= URL::site('exerciseHandling/get_exercises_json') ?>",
            });
        }

    };


    window.addEvent('domready', function () {
        exercisesViewHandler.init();
    });
</script>
