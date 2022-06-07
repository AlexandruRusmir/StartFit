<?php
?>

<h1>
    Animations
</h1>

<div class="form-container" id="add-exercise-input-container">
    <div>
        <label>Provide new exercise name: </label>
        <div class="input-group">
            <input id='animation-name' type="text" placeholder="Animation Name" autocomplete="off"
                   class='form-control' required>
            <div class="invalid-feedback">Please provide a valid animation name!</div>
        </div>
    </div>

    <div>
        <label>Provide animation URL: </label>
        <div class="input-group">
            <input id='animation-url' type="text" placeholder="Animation URL" autocomplete="off"
                   class='form-control' required>
            <div class="invalid-feedback">Please provide an animation URL!</div>
        </div>
    </div>

    <div class="d-flex">
        <button type="submit" class="add-button" id="add-animation-button">Add Exercise</button>
    </div>
</div>

<h4>Existent animations</h4>
<div class="form-container">
    <div class="input-group">
        <input id='input-search' type="text" placeholder="Search by animation name" name="username" required>
    </div>
</div>

<div id="animations-list">

</div>

<script>
    const animationsViewHandler = {

        inputSearch: $('input-search'),
        animationNameInput: $('animation-name'),
        animationURLInput: $('animation-url'),
        selectedCategoriesDiv: $('animations-list'),
        addButton: $('add-animation-button'),

        allAnimations: [],

        validateInputs: function () {
            let isValid = true;

            !this.animationNameInput.value && this.animationNameInput.addClass('is-invalid') && (isValid = false);

            !this.animationURLInput.value && this.animationURLInput.addClass('is-invalid') && (isValid = false);

            return isValid;
        },

        animationPostRequest: new Request({
            url: '<?= URL::site('exerciseHandling/add_animation')?>',
            method: 'post',
            onSuccess: (response) => {
                animationsViewHandler.animationNameInput.value = '';
                animationsViewHandler.animationURLInput.value = '';

                // animationsViewHandler.updateSelectedCategoriesDiv();

                animationsViewHandler.addButton.removeClass('disabled');
            }
        }),

        onSuccessAnimationsListRequest: function (responseJSON, responseText) {
            this.allAnimations = responseJSON;
            console.log(responseJSON[0])
            //this.updateAllExercisesList();
        },

        animationsListRequest: new Request.JSON({
            url: '<?= URL::site('exerciseHandling/get_animations_json_by_keyword')?>',
            method: 'get',
            onSuccess: function (responseJSON, responseText) {
                animationsViewHandler.onSuccessAnimationsListRequest(responseJSON, responseText);
            },
        }),

        submitButtonClick: function () {
            if (!this.validateInputs()) {
                return;
            }

            let animationObject = {
                name: this.animationNameInput.value,
                gifUrl: this.animationURLInput.value,
            };

            animationJSON = JSON.stringify(animationObject);

            this.addButton.addClass('disabled');
            this.animationPostRequest.send({
                data: {'animation': animationJSON}
            });
        },

        init: function () {
            this.inputSearch.addEvent('keyup', () => {
                this.animationsListRequest.send({
                    data: {'keyword': this.inputSearch.value},
                });
            });

            $$('.form-control').addEvent('focus', (event) => {
                event.target.removeClass('is-invalid');
            });

            this.addButton.addEvent('click', () => this.submitButtonClick());
        }
    };

    window.addEvent('domready', function () {
        animationsViewHandler.init();
    });
</script>