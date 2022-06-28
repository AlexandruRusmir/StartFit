<?php
?>

<div class="container">
    <div id="workout-name-input">
        <h1>Ready to create a new Workout?</h1>
        <div class="form-container">
            <div class="input-group">
                <label>Provide new workout desired name:</label>
                <input id='name-input' type="text" placeholder="Enter Workout Name" required autocomplete="off">
            </div>

            <div class="d-flex">
                <button type="submit" id='submit-name-button' class="add-button">Confirm Name!</button>
            </div>

            <div class="d-flex">
                <p class="error-message" id="name-error-paragraph"></p>
            </div>
        </div>
    </div>

    <div id="exercise-selection">
        <h1 id="page-title">
        </h1>

        <div class="form-container">
            <div class="input-group">

                <input id='input-search' type="text" placeholder="Search for exercises by name" required>
                <button class="position-absolute px-3 filter-button" id="filter-button">Filter</button>
                <div id="categories-boxes" class="py-2 filter-categories">

                </div>
            </div>

            <div class="d-flex">
                <button type="submit" id='search-button' class="add-button">Start the Search</button>
            </div>
        </div>

        <div class="d-flex">
            <p class="error-message" id="error-paragraph"></p>
        </div>

        <div class="row" id="exercises-list">

        </div>

        <div class="fixed-bottom bg-dark pt-1 px-2 text-white" id="selected-exercises-box">
            <div class="row py-3">
                <div class="col-12 col-md-10">
                    <div class="px-3">
                        <h3 class="text-white">Workout duration: <label id="workout-duration"></label>:</h3>
                    </div>
                </div>
                <div class="col-12 col-md-2 d-flex">
                    <div class="btn-group-toggle d-flex flex-column px-3 centered-div w-100" data-toggle="buttons">
                        <h6>Reorder exercises</h6>
                        <div class="centered-div">
                            <label class="switch">
                                <input type="checkbox" id="reorder-checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="selected-exercises"></div>

            <div class="d-flex">
                <button id='save-workout-button' class="add-button">Save Workout!</button>
            </div>
        </div>
    </div>
</div>

<script>
    const createWorkoutViewHandler = {
        workoutNameDiv: $('workout-name-input'),
        exerciseSelectionDiv: $('exercise-selection'),
        confirmWorkoutNameButton: $('submit-name-button'),
        workoutNameInput: $('name-input'),

        inputSearch: $('input-search'),
        categoriesBoxes: $('categories-boxes'),
        searchButton: $('search-button'),
        exercisesListDiv: $('exercises-list'),
        filterButton: $('filter-button'),

        selectedCategoryIDs: [],

        selectedExercisesBox: $('selected-exercises-box'),
        selectedExercisesDiv: $('selected-exercises'),
        selectedExercisesForWorkout: [],
        workoutDuration: $('workout-duration'),
        totalWorkoutTimeInSeconds: 0,

        reorderCheckbox: $('reorder-checkbox'),
        reorderToggle: false,

        saveWorkoutButton: $('save-workout-button'),

        addClickEventToExerciseRemoveOverlay: function () {
            $$('.remove-button-overlay').addEvent('click', (event) => {
                let exerciseToBeRemoved = event.target.result;
                this.selectedExercisesForWorkout.splice(exerciseToBeRemoved.workoutOrder - 1, 1);
                this.totalWorkoutTimeInSeconds -= parseInt(exerciseToBeRemoved.duration) + parseInt(exerciseToBeRemoved.breakTime);

                for (let i = exerciseToBeRemoved.workoutOrder - 1; i < this.selectedExercisesForWorkout.length; i++) {
                    this.selectedExercisesForWorkout[i].workoutOrder -= 1;
                }

                this.updateSelectedExercisesDiv();
            });
        },

        returnHTMLStringForSelectedExercise: function (exercise) {
            exerciseHTML = `<div class="col-4 col-sm-3 col-md-2" id='exercise-${exercise.workoutOrder}'>
                                <div class="centered exercise-card position-relative d-flex flex-column">
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

        updateSortablesList: function () {
            let sortables = new Sortables(this.selectedExercisesDiv, {
                clone: true,
                opacity: 0.6,
                onComplete: () => {
                    this.selectedExercisesForWorkout.empty();
                    let k = 0;
                    sortables.serialize().forEach(exerciseId => {
                        let exercise = $(`${exerciseId}`).result;
                        exercise.workoutOrder = ++k;
                        this.selectedExercisesForWorkout.push(exercise);
                    });

                    this.selectedExercisesDiv.innerHTML = '';
                    this.updateSelectedExercisesDiv(false);
                }
            });
            if (!this.reorderToggle) {
                sortables.detach();
            }
        },

        updateSelectedExercisesDiv: function (updateSortables = true) {
            if (!this.selectedExercisesForWorkout.length) {
                this.selectedExercisesBox.addClass('d-none');
                this.exercisesListDiv.style.marginBottom = "3rem";
                return;
            }

            this.selectedExercisesBox.removeClass('d-none');
            this.selectedExercisesDiv.innerHTML = '';

            this.exercisesListDiv.style.marginBottom = this.selectedExercisesBox.clientHeight + "px";

            this.workoutDuration.innerText = parseInt(this.totalWorkoutTimeInSeconds / 60) + 'mins and ' +
                parseInt(this.totalWorkoutTimeInSeconds % 60) + ' seconds';
            this.selectedExercisesForWorkout.forEach(exercise => {
                let selectedExerciseHTML = this.returnHTMLStringForSelectedExercise(exercise);
                let selectedExerciseElement = createElementFromHTML(selectedExerciseHTML);

                selectedExerciseElement.firstChild.parentElement.result = exercise;
                selectedExerciseElement.querySelector('.remove-button-overlay').result = exercise;

                this.selectedExercisesDiv.appendChild(selectedExerciseElement);
            });

            this.addClickEventToExerciseRemoveOverlay();

            if (!this.reorderToggle) {
                $$('.remove-button-overlay').removeClass('d-none');
            }
            else {
                $$('.remove-button-overlay').addClass('d-none');
                this.updateSortablesList();
            }


            if (!updateSortables) {
                return;
            }

            this.updateSortablesList();
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
                const categoryHTML = `<div class="ml-3 mr-1"><label><input type="checkbox">${category.name}</label></div>`

                const categoryElement = createElementFromHTML(categoryHTML);
                let categoryCheckbox = categoryElement.firstChild.firstChild;
                categoryCheckbox.result = category.id;

                categoryCheckbox.addEvent("click", (event) => this.handleCategoryClick(event));
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
            exerciseHTML = `<div class="col-6 col-md-4 col-lg-3">
                                <div class="centered exercise-card position-relative d-flex flex-column">
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
                    workoutOrder: this.selectedExercisesForWorkout.length + 1,
                    duration: exerciseToBeAdded.duration,
                    breakTime: exerciseToBeAdded.breakTime
                };

                this.totalWorkoutTimeInSeconds +=
                    parseInt(exerciseToBeAdded.duration) + parseInt(exerciseToBeAdded.breakTime);
                this.selectedExercisesForWorkout.push(exercise);
                this.updateSelectedExercisesDiv();
            });
        },

        onSuccessSearchForExercisesRequest: function (responseJSON, responseText) {
            this.exercisesListDiv.innerHTML = '';
            this.categoriesBoxes.addClass('d-none');

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

        saveWorkoutRequest: new Request({
            method: 'post',
            url: "<?= URL::site('workouts/save_workout') ?>",
            onSuccess: function () {
                console.log(1)
                window.location.href = "<?= URL::site('workouts/my_workouts') ?>";
            },
            onComplete: () => {
                console.log(1)
            }
        }),

        checkWorkoutNamesRequest: new Request({
            method: 'post',
            url: "<?= URL::site('workouts/check_workout_name') ?>",
            onSuccess: function () {
                createWorkoutViewHandler.workoutNameDiv.addClass('d-none');
                createWorkoutViewHandler.exerciseSelectionDiv.removeClass('d-none');
            },
            onFailure: (xhr) => {
                createWorkoutViewHandler.workoutNameInput.innerText = '';
                if (xhr.status === 409) {
                    $('name-error-paragraph').innerText = 'You already have a workout saved with this name!';
                    return;
                }
                if (xhr.status === 404) {
                    $('name-error-paragraph').innerText = 'No workout name provided!';
                    return;
                }
            }
        }),

        init: function () {
            this.exerciseSelectionDiv.addClass('d-none');
            this.confirmWorkoutNameButton.addEvent('click', () => {
                let workoutName = this.workoutNameInput.value;
                this.checkWorkoutNamesRequest.send({
                    data: {'name': workoutName}
                });
                $('page-title').innerText = `Select exercises for: ${workoutName}`;
            });

            createWorkoutViewHandler.categoriesListRequest.send();

            createWorkoutViewHandler.searchButton.addEvent('click',
                () => createWorkoutViewHandler.handleSearchButtonClick());

            this.selectedExercisesBox.addClass('d-none');
            this.categoriesBoxes.addClass('d-none');
            this.filterButton.addEvent('click', () => {
                this.categoriesBoxes.toggleClass('d-none');
            });

            this.saveWorkoutButton.addEvent('click', () => {
                let workoutDetails = {
                    'name': this.workoutNameInput.value,
                    'workoutExercises': this.selectedExercisesForWorkout
                }
                const workoutDetailsJson = JSON.stringify(workoutDetails);
                this.saveWorkoutRequest.send({
                    data: {'workout': workoutDetailsJson},
                })
            });

            this.reorderCheckbox.addEvent('click', () => {
                if (this.reorderCheckbox.checked) {
                    this.reorderToggle = true;
                    this.updateSelectedExercisesDiv();
                    return;
                }

                this.reorderToggle = false;
                this.updateSelectedExercisesDiv();
            });
        }
    };

    window.addEvent('domready', function () {
        createWorkoutViewHandler.init();
    });
</script>