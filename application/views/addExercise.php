<?php
    $receivedID = $receivedID ?? null;
?>
<h1>
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

        updateAnimationsList: function () {
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

            console.log(event.target.result);
            let animation = event.target.result;
            this.selectedAnimationDiv.innerHTML = '';
            animationHTML = `<div class="d-inline-block"><span class="selected-category"> ${animation.name} </span></div>`;
            animationElement = createElementFromHTML(animationHTML);
            this.selectedAnimationDiv.appendChild(animationElement);

            this.selectedAnimationID = animation.id;
            console.log(this.selectedAnimationID);
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

                console.log(categoryElement);
                console.log(categoryElement.firstChild);
                console.log(categoryElement.firstChild.result);

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

            exerciseObject = JSON.stringify(exerciseObject);

            this.addButton.addClass('disabled');
            this.exercisePostRequest.send({
                data: {'exercise': exerciseObject}
            });
        },

        init: function () {
            this.inputSearch.addEvent('keyup', () => {
                this.categoriesListRequest.send({
                    method: 'get',
                    url: "<?= URL::site('exerciseHandling/return_categories_json_by_keyword') ?>",
                    data: {'keyword': this.inputSearch.value},
                });
            });

            let alreadyLoaded = <?php ?>

            this.exerciseAnimationInputSearch.addEvent('keyup', () => {
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

            this.addButton.addEvent('click', () => this.submitButtonClick());
        }
    };

    window.addEvent('domready', function () {
        exercisesViewHandler.init();
    });
</script>