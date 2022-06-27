<?php
$receivedID = $receivedID ?? 0;

?>

<div class="container">
    <h1 id="title" class="mb-3">

    </h1>

    <div class="workout-content row">
        <div class="col-12 col-sm-9 px-3">
            <div id="main-display" class="workout-main-display">

            </div>
            <div id="timer" class="timer mb-4">

            </div>
        </div>
        <div class="col-12 col-sm-3">
            <div class="workout-exercises-list" id="exercises-list">

            </div>
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

        breakTime: '<?= HTML::image('html/images/break.svg',
            array('alt' => 'Break Time', 'class' => 'break-time-picture'));?>',

        workoutExercises: [],

        workoutExerciseOrder: 0,
        workoutPauseExecuted: false,

        exercisesListDiv: $('exercises-list'),
        mainDisplay: $('main-display'),
        timerDiv: $('timer'),

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

        createExerciseItemHtml: function (exercise, order) {
            return `<div class="workout-exercise-box" id="workout-exercise-${order}">
                            <b>${exercise.name}</b>
                            <label>Duration: ${exercise.duration}s, Break: ${exercise.breakTime}s</label>
                        </div>
                        `;
        },

        createExerciseMainDisplay: function (exercise) {
            return `<div class="centered-div w-100 flex-column">
                        <h3 class="mb-5">${exercise.name}</h3>
                        <img src="${exercise.gifUrl}" class="workout-exercise-picture px-2">
                    </div>
                    `;
        },

        getBreakTimeDisplay: function () {
            return `<div class="centered-div w-100 flex-column">
                        <h3 class="mb-5">Break time! Grab a water sip.</h3>
                        ${this.breakTime}
                    </div>
            `;
        },

        createWorkoutEndDisplay: function () {
            return `<div class="centered-div d-flex flex-column w-100">
                        <h3>Congratulations!</h3>
                        <h4>You have successfully finished this workout.</h4>
                        <button id="back-to-workouts" class="add-button">Back to Workouts</button>
                     </div>
            `;
        },

        fillExercisesList: function () {
            let order = 0;
            this.workoutExercises.forEach(exercise => {
                let exerciseHtml = this.createExerciseItemHtml(exercise, order);
                order++;
                let exerciseElement = createElementFromHTML(exerciseHtml);
                this.exercisesListDiv.appendChild(exerciseElement)
            });
        },

        populatePageIfIdIsValid: function () {
            this.fillExercisesList();

            this.mainDisplay.innerHTML = this.createExerciseMainDisplay(this.workoutExercises[0]);
            this.workoutPauseExecuted = false;
            this.workoutExerciseOrder = 0;

            $(`workout-exercise-0`).addClass('workout-current-exercise');

            new Timer(this.timerDiv, this.workoutExercises[0].duration, this.timerEnd, this.playButton,
                this.pauseButton, this.resetButton, this.skipButton);
        },

        timerEnd: function () {
            let workoutOrder = workoutViewHandler.workoutExerciseOrder;
            let pauseExecuted = workoutViewHandler.workoutPauseExecuted;

            if (workoutOrder === workoutViewHandler.workoutExercises.length - 1) {
                $(`workout-exercise-${workoutOrder}`).addClass('workout-passed-exercise');

                workoutViewHandler.mainDisplay.innerHTML = '';

                let endMainDisplayHtml = workoutViewHandler.createWorkoutEndDisplay();
                let endMainDisplayElement = createElementFromHTML(endMainDisplayHtml);
                endMainDisplayElement.querySelector('#back-to-workouts').addEvent('click', () => {
                   window.location.href = "<?= URL::site('workouts/my_workouts'); ?>";
                });
                workoutViewHandler.mainDisplay.appendChild(endMainDisplayElement)

                workoutViewHandler.timerDiv.addClass('d-none');

                return;
            }

            if (!pauseExecuted) {
                workoutViewHandler.mainDisplay.innerHTML = workoutViewHandler.getBreakTimeDisplay();

                workoutViewHandler.workoutPauseExecuted = true;

                new Timer(workoutViewHandler.timerDiv, workoutViewHandler.workoutExercises[workoutOrder].breakTime,
                    workoutViewHandler.timerEnd, workoutViewHandler.playButton,
                    workoutViewHandler.pauseButton, workoutViewHandler.resetButton, workoutViewHandler.skipButton).start();

                return;
            }

            $(`workout-exercise-${workoutOrder}`).addClass('workout-passed-exercise');
            $(`workout-exercise-${workoutOrder}`).removeClass('workout-current-exercise');
            workoutViewHandler.workoutPauseExecuted = false;

            workoutViewHandler.workoutExerciseOrder++;

            $(`workout-exercise-${workoutViewHandler.workoutExerciseOrder}`).addClass('workout-current-exercise');
            workoutViewHandler.mainDisplay.innerHTML =
                workoutViewHandler.createExerciseMainDisplay(
                    workoutViewHandler.workoutExercises[workoutViewHandler.workoutExerciseOrder]);

            new Timer(workoutViewHandler.timerDiv,
                workoutViewHandler.workoutExercises[workoutViewHandler.workoutExerciseOrder].duration,
                workoutViewHandler.timerEnd, workoutViewHandler.playButton, workoutViewHandler.pauseButton,
                workoutViewHandler.resetButton, workoutViewHandler.skipButton).start();
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