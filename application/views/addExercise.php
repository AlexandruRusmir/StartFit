<?php
?>
<h1>
    Add a new Exercise
</h1>

<div class="form-container">
    <div class="input-group">
        <input id='exercise-name' type="text" placeholder="Exercise Name" name="username" required>
    </div>

    <div class="input-group">
        <input id='exercise-gif' type="text" placeholder="Exercise GIF" name="username" required>
    </div>

    <div class="input-group">
        <input id='exercise-duration' type="text" placeholder="Exercise Duration(in seconds)" name="username" required>
    </div>

    <div class="input-group">
        <input id='exercise-break-time' type="text" placeholder="Post-exercise Break Time(in seconds)" name="username"
               required>
    </div>

    <div class="input-group position-relative">
        <input id='input-search' type="text" placeholder="Search for categories" autocomplete="off" required>
        <div id='matching-categories' class="categories">

        </div>
    </div>


    <div style="display: flex">
        <button type="submit" class="submit-btn">Add Exercise</button>
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

        allReceivedCategories: [],
        selectedReceivedCategories: [],

        selectedCategories: [],

        categoryClick: function (event) {
            console.log(this.selectedCategories)
            event.preventDefault();
            let targetCategory = event.target.result;
            console.log(targetCategory);
            let alreadyInArray = false;
            this.selectedCategories.forEach((category) => {
                console.log(category.id);
                if (category.id == targetCategory.id) {
                    alreadyInArray = true;
                }
            });
            if (!alreadyInArray) {
                this.selectedCategories.push(targetCategory);
            }
        },

        onSuccessExerciseListRequest: function (responseJSON, responseText) {
            this.allReceivedCategories = responseJSON;

            this.matchingCategoriesDiv.innerHTML = '';
            responseJSON.forEach((category) => {
                categoryHTML = `<div><a href="#" class='row'> ${category.name} </a></div>`

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
        }

    };

    window.addEvent('domready', function () {
        exercisesViewHandler.init();
    });
</script>