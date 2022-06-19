<?php
?>

<div class="container">
    <h1>
        Create your workout!
    </h1>

    <div class="form-container">
        <div class="input-group">
            <input id='input-search' type="text" placeholder="Search for exercises by name" required>
        </div>

        <div id="categories-boxes" class="row">

        </div>

        <div class="d-flex">
            <button type="submit" id='search-button' class="add-button">Start the Search</button>
        </div>
    </div>

    <div class="d-flex">
        <p class="error-message" id="error-paragraph"></p>
    </div>

    <h5>Choose exercises for your workout:</h5>
    <div class="row mb-5" id="exercises-list">

    </div>

    <div class="fixed-bottom bg-dark pt-1 px-2 text-white" id="selected-exercises-box">
        <div class="centered-div">
            <h3 class="text-white">Your workout exercises:</h3>
        </div>

        <div class="row" id="selected-exercises"></div>

        <div class="d-flex">
            <button id='start-workout-button' class="add-button">Start the Workout!</button>
        </div>
    </div>
</div>

<script>
    const createWorkoutViewHandler = {
        inputSearch: $('input-search'),
        categoriesBoxes: $('categories-boxes'),
        searchButton: $('search-button'),
        exercisesListDiv: $('exercises-list'),

        selectedCategoryIDs: [],

        selectedExercisesBox: $('selected-exercises-box'),
        selectedExercisesDiv: $('selected-exercises'),
        selectedExercisesForWorkout: [],

        addClickEventToExerciseRemoveOverlay: function () {
            $$('.remove-from-workout-overlay').addEvent('click', (event) => {
                let exerciseToBeRemoved = event.target.result;
                this.selectedExercisesForWorkout.splice(exerciseToBeRemoved.workoutOrder - 1, 1);

                for (let i = exerciseToBeRemoved.workoutOrder - 1; i<this.selectedExercisesForWorkout.length; i++) {
                    this.selectedExercisesForWorkout[i].workoutOrder -= 1;
                }

                this.updateSelectedExercisesDiv();
            });
        },

        returnHTMLStringForSelectedExercise: function (exercise) {
            exerciseHTML = `<div class="col-2">
                                <div class="centered exercise-card position-relative">
                                    <div class="h-40 centered-div exercise-card-text">
                                        <p class="centered">Place: ${exercise.workoutOrder}</p>
                                    </div>
                                    <div class="h-60 centered-div">
                                        <p class="centered">${exercise.name}</p>
                                    </div>
                                    <div class="position-absolute centered-div w-100 h-100">
                                    <div class="remove-from-workout-overlay d-flex align-items-center">
                                        <div class="centered">
                                            <?= HTML::image('html/images/remove.svg',
                array('alt' => 'Remove button', 'class' => 'remove-button-overlay')); ?>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>`;

            return exerciseHTML;
        },

        updateSelectedExercisesDiv: function () {
            if (!this.selectedExercisesForWorkout.length) {
                this.selectedExercisesBox.addClass('d-none');
                return;
            }

            this.selectedExercisesBox.removeClass('d-none');
            this.selectedExercisesDiv.innerHTML = '';

            this.selectedExercisesForWorkout.forEach(exercise => {
                let selectedExerciseHTML = this.returnHTMLStringForSelectedExercise(exercise);
                let selectedExerciseElement = createElementFromHTML(selectedExerciseHTML);

                selectedExerciseElement.querySelector('.remove-from-workout-overlay').result = exercise;
                selectedExerciseElement.querySelector('.remove-button-overlay').result = exercise;

                this.selectedExercisesDiv.appendChild(selectedExerciseElement);
            });

            this.addClickEventToExerciseRemoveOverlay();
        },

        handleCategoryClick: function (event) {
            let targetedCategoryID = event.target.result;
            let alreadySelectedCategory = false;
            for (let i = 0; i < this.selectedCategoryIDs.length; i++) {
                if (targetedCategoryID === this.selectedCategoryIDs[i]) {
                    alreadySelectedCategory = true;
                    this.selectedCategoryIDs.splice(i, 1);
                    break;
                }
            }

            if (!alreadySelectedCategory) {
                this.selectedCategoryIDs.push(targetedCategoryID);
            }
        },

        onSuccessCategoriesListRequest: function (responseJSON, responseText) {
            this.categoriesBoxes.innerHTML = '';
            responseJSON.forEach((category) => {
                const categoryHTML = `<div class="ml-3 mr-1"><input type="checkbox"><span>${category.name}</span></div>`

                const categoryElement = createElementFromHTML(categoryHTML);
                categoryElement.firstChild.result = category.id;

                categoryElement.firstChild.addEvent("click", (event) => this.handleCategoryClick(event));
                this.categoriesBoxes.appendChild(categoryElement);
            });
        },

        categoriesListRequest: new Request.JSON({
            method: 'get',
            url: "<?= URL::site('workouts/get_categories_list') ?>",
            onSuccess: function (responseJSON, responseText) {
                createWorkoutViewHandler.onSuccessCategoriesListRequest(responseJSON, responseText);
            },
        }),

        returnHTMLStringForExercise: function (exercise) {
            exerciseHTML = `<div class="col-4">
                                <div class="centered exercise-card position-relative">
                                    <div class="h-75 centered-div py-2">
                                        <img class="exercise-card-animation" " src="${exercise.gifUrl}">
                                    </div>
                                    <div class="h-25 centered-div exercise-card-text">
                                        <p class="centered">${exercise.name}</p>
                                    </div>
                                    <div class="position-absolute centered-div w-100 h-100">
                                    <div class="add-to-workout-overlay d-flex align-items-center">
                                        <div class="centered">
                                            <?= HTML::image('html/images/add.svg',
                array('alt' => 'Add button', 'class' => 'add-button-overlay')); ?>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>`;

            return exerciseHTML;
        },

        addClickEventToExercisesOverlays: function () {
            $$('.add-to-workout-overlay').addEvent('click', (event) => {
                if (this.selectedExercisesForWorkout.length === 12) {
                    alert('Can not add more than 12 exercises to your workout.')
                    return;
                }

                let exerciseToBeAdded = event.target.result;
                let exercise = {
                    name: exerciseToBeAdded.name,
                    exerciseId: exerciseToBeAdded.id,
                    workoutOrder: this.selectedExercisesForWorkout.length + 1
                };

                this.selectedExercisesForWorkout.push(exercise);
                this.updateSelectedExercisesDiv();
            });
        },

        onSuccessSearchForExercisesRequest: function (responseJSON, responseText) {
            this.exercisesListDiv.innerHTML = '';

            responseJSON.forEach(exercise => {
                let exerciseHtml = this.returnHTMLStringForExercise(exercise);
                let exerciseElement = createElementFromHTML(exerciseHtml);

                exerciseElement.querySelector('.add-to-workout-overlay').result = exercise;
                exerciseElement.querySelector('.add-button-overlay').result = exercise;

                this.exercisesListDiv.appendChild(exerciseElement);
            });

            this.addClickEventToExercisesOverlays();
        },

        searchForExercisesRequest: new Request.JSON({
            method: 'post',
            url: "<?= URL::site('workouts/get_matching_exercises') ?>",
            onSuccess: function (responseJSON, responseText) {
                createWorkoutViewHandler.onSuccessSearchForExercisesRequest(responseJSON, responseText);
            },
        }),

        handleSearchButtonClick: function () {
            let searchDetailsObject = {
                searchText: this.inputSearch.value,
                selectedCategoryIDsArray: this.selectedCategoryIDs
            };

            let searchDetailsJSON = JSON.stringify(searchDetailsObject);

            this.searchForExercisesRequest.send({
                data: {"searchDetails": searchDetailsJSON}
            });
        },

        init: function () {
            createWorkoutViewHandler.categoriesListRequest.send();

            createWorkoutViewHandler.searchButton.addEvent('click',
                () => createWorkoutViewHandler.handleSearchButtonClick());

            this.selectedExercisesBox.addClass('d-none');
        }
    };

    window.addEvent('domready', function () {
        createWorkoutViewHandler.init();
    });
</script>