<?php
$receivedID = $receivedID ?? 0;
?>

<div class="container">
    <h1 id="title">
        Workout with id <?= $receivedID ?>
    </h1>

</div>

<script>
    const workoutViewHandler = {
        pageTitle: $('title'),

        validateWorkoutIdRequest: new Request.JSON({
            method: 'post',
            url: "<?= URL::site('workouts/get_workout_details') ?>",
            onSuccess: function (responseJSON, responseText) {
                console.log(responseJSON)
            },
            onFailure: (xhr) => {
                if(xhr.status === 404) {
                    workoutViewHandler.pageTitle.addClass('error-message');
                    workoutViewHandler.pageTitle.innerText = 'No workout with this ID registered for this account!';
                }
            }
        }),

        init: function () {
            this.validateWorkoutIdRequest.send({
                data: {'id': <?= $receivedID ?>}
            });
        }

    };

    window.addEvent('domready', function () {
        workoutViewHandler.init();
    });
</script>