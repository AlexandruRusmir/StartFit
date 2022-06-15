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
    <div id="exercises-list">

    </div>
</div>

<script>
    const createWorkoutViewHandler = {
        inputSearch: $('input-search'),
        categoriesBoxes: $('categories-boxes'),
        searchButton: $('search-button'),
        exercisesListDiv: $('exercises-list'),

        selectedCategoryIDs: [],

        selectedExercisesForWorkout: [],

        handleCategoryClick: function (event) {
            let targetedCategoryID = event.target.result;
            let alreadySelectedCategory = false;
            for(let i=0; i<this.selectedCategoryIDs.length; i++) {
                if(targetedCategoryID === this.selectedCategoryIDs[i]) {
                    alreadySelectedCategory = true;
                    this.selectedCategoryIDs.splice(i, 1);
                    break;
                }
            }

            if(!alreadySelectedCategory) {
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
            exerciseHTML = ``;

            return exerciseHTML;
        },

        addClickEventToButtons: function () {
            exerciseElement.querySelector('.add-button').addEvent('click', (event) => {
                this.selectedExercisesForWorkout.forEach( exercise => {
                    if (exercise.id === event.target.result.id) {
                        return;
                    }
                });

                this.selectedExercisesForWorkout.push(event.target.result);
            });
        },

        onSuccessSearchForExercisesRequest: function (responseJSON, responseText) {
            this.exercisesListDiv.innerHTML = '';

            console.log(responseJSON)
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
    };

    window.addEvent('domready', function () {
        createWorkoutViewHandler.categoriesListRequest.send();

        createWorkoutViewHandler.searchButton.addEvent('click', () => createWorkoutViewHandler.handleSearchButtonClick());
    });
</script>