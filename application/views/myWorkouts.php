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


    <div id="workouts-list" class="mb-5">
    </div>
</div>

<script>
    const workoutsViewHandler = {
        allWorkoutsDiv: $('workouts-list'),
        inputSearch: $('input-search'),
        searchButton: $('search-button'),

        allWorkouts: [],

        updateAllWorkoutsList: function () {
            this.allWorkoutsDiv.innerHTML = '';

            this.allWorkouts.forEach(workout => {
                let workoutHTML = this.returnHTMLStringForWorkout(workout);
                let workoutElement = createElementFromHTML(workoutHTML);

                this.allWorkoutsDiv.appendChild(workoutElement);

                workoutElement.querySelector('.delete-button').result = workout.id;
                workoutElement.querySelector('.start-button').result = workout.id;

                this.addListenersToButtons(workoutElement);
            });
        },

        returnHTMLStringForWorkout: function (workout) {
            let totalWorkoutTimeInSeconds = 0;
            let workoutExercises = workout.exercisesArray;
            workoutExercises.forEach((exercise) => {
                totalWorkoutTimeInSeconds += parseInt(exercise.duration) + parseInt(exercise.breakTime);
            });
            totalWorkoutTimeInSeconds -= parseInt(workoutExercises[workoutExercises.length - 1].breakTime);
            let workoutTime = parseInt(totalWorkoutTimeInSeconds / 60) + " minutes and " +
                parseInt(totalWorkoutTimeInSeconds % 60) + " seconds";

            workoutHTML = `<div class='row exercise-box my-4'>
                                    <div class="col-3">
                                        <div class="centered-div">
                                            Workout name:&nbsp <b> ${workout.name} </b>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="centered-div">
                                            Duration: ${workoutTime}
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="centered-div flex-column">
                                            <div>`;
            workoutExercises.forEach((exercise) => {
                workoutHTML += `
                                                <div>
                                                        ${exercise.name}
                                                </div>
                                            `
            });
            workoutHTML += `                </div>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="centered-div">
                                            <div>
                                                <button class="start-button mb-4">Start workout</button>
                                                <button class="delete-button">Delete workout</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

            return workoutHTML;
        },

        deleteWorkoutRequest: new Request({
            url: '<?= URL::site('workouts/delete_workout_by_id')?>',
            method: 'post',
            onSuccess: (response) => {
                workoutsViewHandler.updateAllWorkoutsList();
            }
        }),

        onSuccessWorkoutsListRequest: function (responseJSON, responseText) {
            this.allWorkouts = responseJSON;
            this.updateAllWorkoutsList();
        },

        workoutRemove: function (event) {
            let toBeDeletedWorkoutId = event.target.result;

            for (let i = 0; i < this.allWorkouts.length; i++) {
                if (this.allWorkouts[i].id == toBeDeletedWorkoutId) {
                    this.allWorkouts.splice(i, 1);
                }
            }

            this.updateAllWorkoutsList();
        },


        addListenersToButtons: function (workoutElement) {
            workoutElement.querySelector('.delete-button').addEvent('click', (event) => {
                if (!confirm("Are you sure you want to delete this workout?")) {
                    return;
                }

                this.workoutRemove(event);
                this.deleteWorkoutRequest.send({
                    data: {'id': event.target.result}
                });
            });

            workoutElement.querySelector('.start-button').addEvent('click', (event) => {
                window.location.href = "<?= URL::site('workouts/workout_page')?>" +  "/" + event.target.result;
            });
        },

        workoutsListRequest: new Request.JSON({
            method: 'post',
            url: "<?= URL::site('workouts/get_workouts_by_keyword') ?>",
            onSuccess: function (responseJSON, responseText) {
                workoutsViewHandler.onSuccessWorkoutsListRequest(responseJSON, responseText);
            },
        }),

        init: function () {
            this.workoutsListRequest.send({
                data: {'keyword': ''}
            });

            this.searchButton.addEvent('click', function () {
                workoutsViewHandler.workoutsListRequest.send({
                    data: {'keyword': workoutsViewHandler.inputSearch.value}
                });
            });
        }

    };

    window.addEvent('domready', function () {
        var mySort = new Sortables($('SortableExample'), {
            clone: true,
            opacity: 0.6,
            onComplete: function(){
                console.log(mySort.serialize())
            }
        });
        workoutsViewHandler.init();
    });
</script>