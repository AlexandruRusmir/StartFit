<?php
?>

<div class="container">
    <div class="row float-right">
        <a href="<?= URL::site('exerciseHandling/display_add_exercise') ?>"
           class="go-to-add-exercise-page-button d-inline-block">Add exercise</a>
    </div>

    <h1>
        Stored Exercises
    </h1>

    <div class="input-group">
        <input id='input-search' type="text" placeholder="Search for exercise by name" required>
    </div>


    <div id="exercises-list">

    </div>
</div>

<script>
    const exercisesViewHandler = {
        allExercisesDiv: $('exercises-list'),
        inputSearch: $('input-search'),

        allExercises: [],

        deleteExerciseByID: new Request({
            url: '<?= URL::site('exerciseHandling/delete_exercise_by_post_id')?>',
            method: 'post',
            onSuccess: (response) => {
                exercisesViewHandler.updateAllExercisesList();

            }
        }),

        returnHTMLStringForExercise: function (exercise) {
            exerciseHTML = `<div class='row exercise-box'>
                                    <div class="col-3">
                                        <img src="${exercise.gifURL}" width="200" height="auto"></img>
                                    </div>

                                    <div class="col-2">
                                        <div class="centered-div">
                                            ${exercise.name}
                                        </div>
                                    </div>

                                    <div class="col-1">
                                        <div class="centered-div">
                                            ${exercise.defaultDuration}
                                        </div class="centered-div">
                                    </div>

                                    <div class="col-1">
                                        <div class="centered-div">
                                            ${exercise.defaultBreakTime}
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="centered-div">
                                            <div>`;
                    exercise.categories.forEach((category) => {
                        exerciseHTML += `
                                                <div>
                                                        ${category.name}
                                                </div>
                                            `
                });
            exerciseHTML += `                </div>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="centered-div">
                                            <div>
                                                <button class="delete-button mb-4">Delete exercise</button>
                                                <button class="modify-button">Modify exercise</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;


            return exerciseHTML;
        },

        exerciseRemove: function (event) {
            toBeDeletedExercise = event.target.result;

            for (let i = 0; i < this.allExercises.length; i++) {
                if (this.allExercises[i].id == toBeDeletedExercise.id) {
                    this.allExercises.splice(i, 1);
                }
            }

            this.updateAllExercisesList
        },


        addListenersToButtons: function (exerciseElement) {
            exerciseElement.querySelector('.delete-button').addEvent('click', (event) => {
                if (!confirm("Are you sure you want to delete this exercise?")) {
                    return;
                }

                this.exerciseRemove(event);
                this.deleteExerciseByID.send({
                    data: {'id': event.target.result}
                });
            });

            exerciseElement.querySelector('.modify-button').addEvent('click', (event) => {
                window.location.href = "<?= URL::site('exerciseHandling/display_edit_exercise')?>"
                    + "/" + event.target.result;
            });
        },

        updateAllExercisesList: function () {
            this.allExercisesDiv.innerHTML = '';

            this.allExercises.forEach(exercise => {
                let exerciseHTML = this.returnHTMLStringForExercise(exercise);
                let exerciseElement = createElementFromHTML(exerciseHTML);

                this.allExercisesDiv.appendChild(exerciseElement);

                exerciseElement.querySelector('.delete-button').result = exercise.id;
                exerciseElement.querySelector('.modify-button').result = exercise.id;

                this.addListenersToButtons(exerciseElement);
            });
        },

        onSuccessExercisesListRequest: function (responseJSON, responseText) {
            this.allExercises = responseJSON;

            this.updateAllExercisesList();
        },

        exercisesListRequest: new Request.JSON({
            onSuccess: function (responseJSON, responseText) {
                exercisesViewHandler.onSuccessExercisesListRequest(responseJSON, responseText);
            },
        }),

        init: function () {
            this.exercisesListRequest.send({
                method: 'get',
                url: "<?= URL::site('exerciseHandling/get_exercises_json_by_keyword') ?>",
                data: {'keyword': ''}
            });

            this.inputSearch.addEvent('keyup', function () {
                exercisesViewHandler.exercisesListRequest.send({
                    method: 'get',
                    url: "<?= URL::site('exerciseHandling/get_exercises_json_by_keyword') ?>",
                    data: {'keyword': exercisesViewHandler.inputSearch.value}
                });
            });
        }

    };

    window.addEvent('domready', function () {
        exercisesViewHandler.init();
    });
</script>