<?php
?>
<h1>
    Add a new Exercise
</h1>

<div class="form-container">
    <div>
        <label>Provide new exercise name: </label>
        <div class="input-group">
            <input id='exercise-name' type="text" placeholder="Exercise Name" name="username" required>
        </div>
    </div>

    <div>
        <label>Provide new exercise GIF Url: </label>
        <div class="input-group">
            <input id='exercise-gif' type="text" placeholder="Exercise GIF" name="username" required>
        </div>
    </div>

    <div>
        <label>Provide new exercise duration: </label>
        <div class="input-group">
            <input id='exercise-duration' type="text" placeholder="Exercise Duration(in seconds)" name="username"
                   autocomplete="off" required>
        </div>
    </div>


    <div>
        <label>Provide new exercise break time: </label>
        <div class="input-group">
            <input id='exercise-break-time' type="text" placeholder="Post-exercise Break Time(in seconds)"
                   autocomplete="off" name="username" required>
        </div>
    </div>

    <div>
        <label>Select desired categories: </label>
        <div class="input-group position-relative">
            <input id='input-search' type="text" placeholder="Search by category name" autocomplete="off">
            <div id='matching-categories' class="categories">

            </div>
        </div>
    </div>

    <div id="selected-categories" class="text-nowrap">

    </div>

    <div class="d-flex">
        <button type="submit" class="add-button" id="add-exercise-button">Add Exercise</button>
    </div>

    <div class="d-flex">
        <p class="error-message" id="error"></p>
    </div>
</div>

<script>
    const exercisesViewHandler = {

        inputSearch: $('input-search'),
        exerciseNameInput: $('exercise-name'),
        exerciseGifInput: $('exercise-gif'),
        exerciseDurationInput: $('exercise-duration'),
        exerciseBreakTime: $('exercise-break-time'),
        matchingCategoriesDiv: $('matching-categories'),
        selectedCategoriesDiv: $('selected-categories'),
        addButton: $('add-exercise-button'),
        errorMessage: $('error'),

        allReceivedCategories: [],
        selectedCategories: [],

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
                categoryHTML = createElementFromHTML(categoryHTML);
                categoryHTML.lastChild.result = category;

                categoryHTML.lastChild.addEventListener("click", (event) => this.categoryRemove(event));
                this.selectedCategoriesDiv.appendChild(categoryHTML);
            });

        },

        categoryClick: function (event) {
            event.preventDefault();
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

        onSuccessExerciseListRequest: function (responseJSON, responseText) {
            this.allReceivedCategories = responseJSON;

            this.matchingCategoriesDiv.innerHTML = '';
            responseJSON.forEach((category) => {
                categoryHTML = `<div><a href="#"> ${category.name} </a></div>`

                categoryHTML = createElementFromHTML(categoryHTML);
                categoryHTML.firstChild.result = category;

                categoryHTML.addEventListener("click", (event) => this.categoryClick(event));
                this.matchingCategoriesDiv.appendChild(categoryHTML);
            });
        },

        categoryListRequest: new Request.JSON({
            onSuccess: function (responseJSON, responseText) {
                exercisesViewHandler.onSuccessExerciseListRequest(responseJSON, responseText);
            },
        }),

        init: function () {
            this.inputSearch.addEvent('keyup', () => {
                this.categoryListRequest.send({
                    method: 'get',
                    url: "<?= URL::site('exerciseHandling/returnCategoriesJsonByKeyword') ?>",
                    data: {'keyword': this.inputSearch.value},
                });
            });

            this.addButton.addEvent('click', () => {
                if(!this.exerciseNameInput.value) {
                    this.errorMessage.innerText = 'Please provide an exercise name!';
                    return;
                }

                let exerciseObject = {
                    name: this.exerciseNameInput.value,
                    gifUrl: this.exerciseGifInput,
                    duration: this.exerciseDurationInput,
                    breakTime: this.exerciseBreakTime,
                    categories: this.selectedCategories
                };

                console.log(exerciseObject);
            });
        }

    };

    window.addEvent('domready', function () {
        exercisesViewHandler.init();
    });
</script>