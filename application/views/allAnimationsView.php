<?php
?>
<div class="container">
    <div class="row float-right">
        <a href="<?= URL::site('exerciseHandling/display_add_animation_view') ?>"
           class="go-to-add-exercise-page-button d-inline-block">Add animation</a>
    </div>

    <h1>
        Stored Animations
    </h1>

    <div class="input-group">
        <input id='input-search' type="text" placeholder="Search for animation by name" required>
    </div>


    <div id="animations-list">

    </div>
</div>

<script>
    const animationsViewHandler = {
        allAnimationsDiv: $('animations-list'),
        inputSearch: $('input-search'),

        allAnimations: [],

        onSuccessAnimationsListRequest: function (responseJSON, responseText) {
            this.allAnimations = responseJSON;
            this.updateAllAnimationsList();
        },

        animationsListRequest: new Request.JSON({
            url: '<?= URL::site('exerciseHandling/get_animations_json_by_keyword')?>',
            method: 'get',
            onSuccess: function (responseJSON, responseText) {
                animationsViewHandler.onSuccessAnimationsListRequest(responseJSON, responseText);
            },
        }),

        deleteAnimationByID: new Request({
            url: '<?= URL::site('exerciseHandling/delete_animation_by_post_id')?>',
            method: 'post',
            onSuccess: (response) => {
                animationsViewHandler.updateAllAnimationsList();
            }
        }),

        returnHTMLStringForAnimation: function (animation) {
            animationHTML = `<div class='row exercise-box'>
                                    <div class="col-3 exercise-card-animation">
                                        <img src="${animation.gifURL}" width="200" height="auto"/>
                                    </div>

                                    <div class="col-3">
                                        <div class="centered-div">
                                            id: ${animation.id}
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="centered-div">
                                            name: ${animation.name}
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="centered-div">
                                            <button class="delete-button">Delete</button>
                                        </div>
                                    </div>
                                </div>`;


            return animationHTML;
        },

        animationRemove: function (event) {
            toBeDeletedAnimation = event.target.result;

            for (let i = 0; i < this.allAnimations.length; i++) {
                if (this.allAnimations[i].id == toBeDeletedAnimation.id) {
                    this.allAnimations.splice(i, 1);
                }
            }
        },

        addListenerToButton: function (animationElement) {
            animationElement.querySelector('.delete-button').addEvent('click', (event) => {
                if (!confirm("Are you sure you want to delete this animation?")) {
                    return;
                }

                this.animationRemove(event);
                this.deleteAnimationByID.send({
                    data: {'id': event.target.result}
                });
            });
        },

        updateAllAnimationsList: function () {
            this.allAnimationsDiv.innerHTML = '';

            this.allAnimations.forEach(animation => {
                animationHTML = this.returnHTMLStringForAnimation(animation);
                animationElement = createElementFromHTML(animationHTML);

                this.allAnimationsDiv.appendChild(animationElement);

                animationElement.querySelector('.delete-button').result = animation.id;

                this.addListenerToButton(animationElement);
            });
        },


        init: function () {
            this.animationsListRequest.send({
                data: {'keyword': ''}
            });

            this.inputSearch.addEvent('keyup', function () {
                animationsViewHandler.animationsListRequest.send({
                    data: {'keyword': animationsViewHandler.inputSearch.value}
                });
            });
        }

    };

    window.addEvent('domready', function () {
        animationsViewHandler.init();
    });
</script>
