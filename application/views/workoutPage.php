<?php
$receivedID = $receivedID ?? 0;

?>

<div class="container">
    <h1 id="title">

    </h1>

    <div class="d-flex">
        <div class="col-12 col-sm-9 px-3">

            <div id="timer" class="timer">

            </div>
        </div>
        <div class="col-12 col-sm-3 d-flex" id="exercises-list">

        </div>
    </div>
</div>

<script>
    const workoutViewHandler = {
        pageTitle: $('title'),
        playButton: '<?= HTML::image('html/images/start.svg',
            array('alt' => 'Start Button', 'class' => 'timer-picture'));?>',
        pauseButton: '<?= HTML::image('html/images/pause.svg',
            array('alt' => 'Pause Button', 'class' => 'timer-picture'));?>',
        resetButton: '<?= HTML::image('html/images/reset.svg',
            array('alt' => 'Reset Button', 'class' => 'timer-picture'));?>',
        skipButton: '<?= HTML::image('html/images/skip.svg',
            array('alt' => 'Skip Button', 'class' => 'timer-picture'));?>',

        workoutExercises: [],
        currenWorkoutExercise: {
            order: 0,
            breakTimeFinished: false
        },

        exercisesListDiv: $('exercises-list'),

        timerEnd: function () {
            console.log(2)
        },

        validateWorkoutIdRequest: new Request.JSON({
            method: 'post',
            url: "<?= URL::site('workouts/get_workout_details') ?>",
            onSuccess: function (responseJSON, responseText) {
                console.log(responseJSON)
                workoutViewHandler.workoutExercises = responseJSON.exercisesArray;

                workoutViewHandler.pageTitle.innerText = `Workout: ${responseJSON.name}`;
                workoutViewHandler.populatePageIfIdIsValid();
            },
            onFailure: (xhr) => {
                if (xhr.status === 404) {
                    workoutViewHandler.pageTitle.addClass('error-message');
                    workoutViewHandler.pageTitle.innerText = 'No workout with this ID registered for this account!';
                }
            }
        }),


        createExerciseItemHtml: function (exercise) {
                return `
                    <div>
                        <label>${exercise.name}</label>
                    </div>
                `;
        },

        fillExercisesList: function () {
            this.workoutExercises.forEach(exercise => {
                let exerciseHtml = this.createExerciseItemHtml(exercise);
                let exerciseElement = createElementFromHTML(exerciseHtml);
                this.exercisesListDiv.appendChild(exerciseElement);
            });
        },

        populatePageIfIdIsValid: function () {
            new Timer($('timer'), 5, this.timerEnd, this.playButton, this.pauseButton, this.resetButton, this.skipButton);
            this.fillExercisesList();
        },

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