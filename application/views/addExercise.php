<?php
    $receivedID = $receivedID ?? 0;
?>

<div class="container">
    <h1 id="title">
        Add a new Exercise
    </h1>

    <div class="form-container" id="add-exercise-input-container">
        <div>
            <label>Provide new exercise name: </label>
            <div class="input-group">
                <input id='exercise-name' type="text" placeholder="Exercise Name" autocomplete="off"
                       class='form-control' required>
                <div class="invalid-feedback">Please provide a valid exercise name!</div>
            </div>
        </div>

        <div>
            <label>Provide an exercise animation: </label>
            <div class="input-group">
                <input id='exercise-animation' type="text" placeholder="Search for animation" autocomplete="off"
                       class='form-control' required>
                <div id='matching-animations' class="search-results position-absolute">

                </div>
                <div class="invalid-feedback">Please choose an animation for the exercise!</div>
            </div>
        </div>
        <div id="selected-animation">

        </div>

        <div>
            <label>Provide new exercise duration: </label>
            <div class="input-group">
                <input id='exercise-duration' type="number" placeholder="Exercise Duration(in seconds)"
                       class='form-control' autocomplete="off" required>
                <div class="invalid-feedback">Please provide a duration for the new exercise!</div>
            </div>
        </div>

        <div>
            <label>Provide new exercise break time: </label>
            <div class="input-group">
                <input id='exercise-break-time' type="number" placeholder="Post-exercise Break Time(in seconds)"
                       class='form-control' autocomplete="off" required>
                <div class="invalid-feedback">Please provide break time for the new exercise!</div>
            </div>
        </div>

        <div>
            <label>Select desired new exercise categories: </label>
            <div class="input-group position-relative">
                <input id='input-search' type="text" placeholder="Search by category name" autocomplete="off"
                       class="form-control">
                <div id='matching-categories' class="search-results position-absolute">

                </div>
                <div class="invalid-feedback">Please provide at least one category!</div>

            </div>
        </div>
        <div id="selected-categories" class="text-nowrap">

        </div>

        <div class="d-flex">
            <button type="submit" class="add-button" id="add-exercise-button">Add Exercise</button>
        </div>
    </div>
</div>

<script>
    const exercisesViewHandler = {

        inputSearch: $('input-search'),
        exerciseNameInput: $('exercise-name'),
        exerciseAnimationInputSearch: $('exercise-animation'),
        matchingAnimationsDiv: $('matching-animations'),
        selectedAnimationDiv: $('selected-animation'),
        exerciseDurationInput: $('exercise-duration'),
        exerciseBreakTime: $('exercise-break-time'),
        matchingCategoriesDiv: $('matching-categories'),
        selectedCategoriesDiv: $('selected-categories'),
        addButton: $('add-exercise-button'),
        errorMessage: $('error'),

        selectedAnimationID: null,
        selectedCategories: [],

        validateInputs: function () {
            let isValid = true;

            !this.exerciseNameInput.value && this.exerciseNameInput.addClass('is-invalid') && (isValid = false);

            !this.selectedAnimationID && this.exerciseAnimationInputSearch.addClass('is-invalid') && (isValid = false);

            !this.exerciseDurationInput.value && this.exerciseDurationInput.addClass('is-invalid') && (isValid = false);

            !this.exerciseBreakTime.value && this.exerciseBreakTime.addClass('is-invalid') && (isValid = false);

            !this.selectedCategories.length && this.inputSearch.addClass('is-invalid') && (isValid = false);

            return isValid;
        },

        categoryRemove: function (event) {
            toBeDeletedCategory = event.target.result;

            for (let i = 0; i < this.selectedCategories.length; i++) {
                if (this.selectedCategories[i].id == toBeDeletedCategory.id) {
                    this.selectedCategories.splice(i, 1);
                }
            }

            this.updateSelectedCategoriesDiv();
        },

        updateSelectedCategoriesDiv: function () {
            this.selectedCategoriesDiv.innerHTML = '';

            this.selectedCategories.forEach((category) => {
                categoryHTML = `<div class="d-inline-block"><span class="selected-category"> ${category.name} </span>
                                        <button class="remove-category-button"> X </button></div>`;
                categoryElement = createElementFromHTML(categoryHTML);
                categoryElement.lastChild.result = category;

                categoryElement.lastChild.addEventListener("click", (event) => this.categoryRemove(event));
                this.selectedCategoriesDiv.appendChild(categoryElement);
            });

        },

        handleAnimationClick: function (event) {
            event.preventDefault();

            this.exerciseAnimationInputSearch.value = '';

            let animation = event.target.result;
            this.selectedAnimationDiv.innerHTML = '';
            animationHTML = `<div class="d-inline-block mb-4"><span class="selected-category"> ${animation.name} </span></div>`;
            animationElement = createElementFromHTML(animationHTML);
            this.selectedAnimationDiv.appendChild(animationElement);

            this.selectedAnimationID = animation.id;

            this.matchingAnimationsDiv.addClass('d-none');
        },

        handleCategoryClick: function (event) {
            event.preventDefault();

            this.inputSearch.value = '';

            let targetCategory = event.target.result;
            let alreadyInArray = false;
            this.selectedCategories.forEach((category) => {
                if (category.id == targetCategory.id) {
                    alreadyInArray = true;
                }
            });
            if (!alreadyInArray) {
                this.selectedCategories.push(targetCategory);
            }

            this.matchingCategoriesDiv.addClass('d-none');

            this.updateSelectedCategoriesDiv();
        },

        onSuccessAnimationsListRequest: function (responseJSON, responseText) {
            this.matchingAnimationsDiv.innerHTML = '';

            responseJSON.forEach((animation) => {
                animationHTML = `<div><a href="#"> ${animation.name} </a></div>`

                animationElement = createElementFromHTML(animationHTML);
                animationElement.firstChild.result = animation;

                animationElement.firstChild.addEventListener("click", (event) => this.handleAnimationClick(event));
                this.matchingAnimationsDiv.appendChild(animationElement);
            });
        },

        animationsListRequest: new Request.JSON({
            url: '<?= URL::site('exerciseHandling/get_animations_json_by_keyword')?>',
            method: 'get',
            onSuccess: function (responseJSON, responseText) {
                exercisesViewHandler.onSuccessAnimationsListRequest(responseJSON, responseText);
            },
        }),

        onSuccessCategoriesListRequest: function (responseJSON, responseText) {
            this.matchingCategoriesDiv.innerHTML = '';
            responseJSON.forEach((category) => {
                const categoryHTML = `<div><a href="#"> ${category.name} </a></div>`

                const categoryElement = createElementFromHTML(categoryHTML);
                categoryElement.firstChild.result = category;


                categoryElement.firstChild.addEvent("click", (event) => this.handleCategoryClick(event));
                this.matchingCategoriesDiv.appendChild(categoryElement);
            });
        },

        categoriesListRequest: new Request.JSON({
            onSuccess: function (responseJSON, responseText) {
                exercisesViewHandler.onSuccessCategoriesListRequest(responseJSON, responseText);
            },
        }),

        exercisePostRequest: new Request({
            url: '<?= URL::site('exerciseHandling/add_exercise')?>',
            method: 'post',
            onSuccess: (response) => {
                exercisesViewHandler.exerciseNameInput.value = '';
                exercisesViewHandler.exerciseAnimationInputSearch.value = '';
                exercisesViewHandler.exerciseDurationInput.value = '';
                exercisesViewHandler.exerciseBreakTime.value = '';
                exercisesViewHandler.selectedAnimationDiv.innerHTML = '';
                exercisesViewHandler.selectedCategories = [];
                exercisesViewHandler.updateSelectedCategoriesDiv();

                exercisesViewHandler.addButton.removeClass('disabled');
            }
        }),

        exerciseEditRequest: new Request({
            url: '<?= URL::site('exerciseHandling/edit_exercise')?>',
            method: 'post',
            onSuccess: (response) => {
                exercisesViewHandler.addButton.removeClass('disabled');
                window.location.href = "<?= URL::site('exerciseHandling/display_exercises') ?>"
            }
        }),

        submitButtonClick: function () {

            if (!this.validateInputs()) {
                return;
            }

            let exerciseObject = {
                name: this.exerciseNameInput.value,
                animationID: this.selectedAnimationID,
                duration: this.exerciseDurationInput.value,
                breakTime: this.exerciseBreakTime.value,
                categories: this.selectedCategories
            };

            let exerciseJSON = JSON.stringify(exerciseObject);

            this.addButton.addClass('disabled');
            this.exercisePostRequest.send({
                data: {'exercise': exerciseJSON}
            });
        },

        submitButtonEditExerciseClick: function (exerciseToBeEditedID) {
            if (!this.validateInputs()) {
                return;
            }

            let exerciseObject = {
                id: exerciseToBeEditedID,
                name: this.exerciseNameInput.value,
                animationID: this.selectedAnimationID,
                duration: this.exerciseDurationInput.value,
                breakTime: this.exerciseBreakTime.value,
                categories: this.selectedCategories
            };

            let exerciseJSON = JSON.stringify(exerciseObject);
            this.addButton.addClass('disabled');

            this.exerciseEditRequest.send({
               data: {'exerciseToBeEdited': exerciseJSON}
            });
        },

        onSuccessEditableExerciseRequest: function (responseJSON, responseText) {
            const exerciseToEdit = responseJSON;

            $('title').innerText = `Edit exercise with id: ${exerciseToEdit.id}`;
            this.exerciseNameInput.value = exerciseToEdit.name;
            this.selectedAnimationID = exerciseToEdit.animationID;

            this.selectedAnimationDiv.innerHTML = '';
            animationHTML = `<div class="d-inline-block mb-4"><span class="selected-category"> ${exerciseToEdit.animationName} </span></div>`;
            animationElement = createElementFromHTML(animationHTML);
            this.selectedAnimationDiv.appendChild(animationElement);

            this.exerciseDurationInput.value = exerciseToEdit.duration;
            this.exerciseBreakTime.value = exerciseToEdit.breakTime;

            this.selectedCategories = exerciseToEdit.categories;
            this.updateSelectedCategoriesDiv();

            this.addButton.innerText = 'Modify exercise';

            this.addButton.result = exerciseToEdit.id;
            this.addButton.addEvent('click', () => this.submitButtonEditExerciseClick(exerciseToEdit.id));
        },

        editableExerciseRequest: new Request.JSON({
            url: '<?= URL::site('exerciseHandling/get_exercise_to_edit_by_post_id')?>',
            method: 'post',
            onSuccess: function (responseJSON, responseText) {
                exercisesViewHandler.onSuccessEditableExerciseRequest(responseJSON, responseText);
            },
        }),

        checkIfExerciseNeedsToBeEdited: function () {
            let receivedExerciseID = <?= $receivedID?>;

            if(!receivedExerciseID) {
                this.addButton.addEvent('click', () => this.submitButtonClick());
                return;
            }

            this.editableExerciseRequest.send({
                data: {'id': receivedExerciseID}
            })
        },

        init: function () {
            this.checkIfExerciseNeedsToBeEdited();

            this.inputSearch.addEvent('keyup', () => {
                this.matchingCategoriesDiv.removeClass('d-none');
                this.categoriesListRequest.send({
                    method: 'get',
                    url: "<?= URL::site('exerciseHandling/return_categories_json_by_keyword') ?>",
                    data: {'keyword': this.inputSearch.value},
                });
            });

            this.exerciseAnimationInputSearch.addEvent('keyup', () => {
                this.matchingAnimationsDiv.removeClass('d-none');
                if(this.exerciseAnimationInputSearch.value.length < 2) {
                    this.matchingAnimationsDiv.innerHTML = '';
                    return;
                }
                this.animationsListRequest.send({
                    data: {'keyword': this.exerciseAnimationInputSearch.value},
                });
            });


            $$('.form-control').addEvent('focus', (event) => {
                event.target.removeClass('is-invalid');
            });
        }
    };

    window.addEvent('domready', function () {
        exercisesViewHandler.init();
    });
</script>