<?php
$receivedID = $receivedID ?? 0;

?>

<div class="container">
    <h1 id="title">
        Workout with id <?= $receivedID ?>
    </h1>

    <div id="timer" class="d-flex flex-row align-items-center">

    </div>
</div>

<script>
    const workoutViewHandler = {
        pageTitle: $('title'),

        timerEnd: function () {
            console.log(2)
        },

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
            let playButton = '<?= HTML::image('html/images/start.svg',
                    array('alt' => 'Start Button', 'class' => 'timer-picture'));?>';
            let pauseButton = '<?= HTML::image('html/images/pause.svg',
                array('alt' => 'Pause Button', 'class' => 'timer-picture'));?>';
            let resetButton = '<?= HTML::image('html/images/reset.svg',
                array('alt' => 'Reset Button', 'class' => 'timer-picture'));?>';
            let skipButton = '<?= HTML::image('html/images/skip.svg',
                array('alt' => 'Skip Button', 'class' => 'timer-picture'));?>';

            new Timer($('timer'), 15, this.timerEnd, playButton, pauseButton, resetButton, skipButton);
        }

    };

    window.addEvent('domready', function () {
        workoutViewHandler.init();
    });
</script>