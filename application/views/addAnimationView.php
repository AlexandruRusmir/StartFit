<?php
?>

<div class="container">
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
            <button type="submit" class="add-button" id="add-animation-button">Add Animation</button>
        </div>

        <div class="d-flex">
            <p class="error-message" id="error-paragraph"></p>
        </div>
    </div>
</div>


<script>
    const animationsViewHandler = {

        animationNameInput: $('animation-name'),
        animationURLInput: $('animation-url'),
        addButton: $('add-animation-button'),

        validateInputs: function () {
            let isValid = true;

            !this.animationNameInput.value && this.animationNameInput.addClass('is-invalid') && (isValid = false);

            !this.animationURLInput.value && this.animationURLInput.addClass('is-invalid') && (isValid = false);

            return isValid;
        },

        animationPostRequest: new Request({
            url: '<?= URL::site('exerciseHandling/add_animation')?>',
            method: 'post',
            onSucces: (response) => {
                animationsViewHandler.animationNameInput.value = '';
                animationsViewHandler.animationURLInput.value = '';

                animationsViewHandler.addButton.removeClass('disabled');
            },
            onFailure: (xhr) => {
                $('error-paragraph').innerText = `Responded with status: ${xhr.status}, ${xhr.statusText}`;
                animationsViewHandler.addButton.removeClass('disabled');
            }
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