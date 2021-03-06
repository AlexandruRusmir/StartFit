<?php
?>

<div class="wrapper">
    <div class="bgimg-1">
        <div class="caption">
            <div>
                <h1 class="text-light">The time to become <span class="text-danger"> Fitter</span> is  <span class="text-danger"> Now!</span></h1>
            </div>
        </div>
    </div>

    <div class="bg-dark text-light text-center">
        <h2 class="text-light py-3">Create your home workout!</h2>
        <div class="mx-5 pb-3">
            <p>
                Once you start working out from home, you may never want to return to the gym again. Think about it: there’s no need to get in a cold car, change into gym clothes, wait for machines, or breathe in all those curious aromas.
            </p>
            <p>
                You spend a lot of time preparing for a workout: you have to pack your gym bag, get in the car, drive to the gym, park, change, and then, finally, hit the floor. Exercising at home allows you to bypass all those inconveniences and focus your time and energy on your workout routine.
            </p>
            <p>
                Exercising around others can be exhilarating, but it can also be intimidating and discouraging. When working out at home, you can go at your own pace, and you don’t have to worry about the judgement of others.
            </p>
        </div>
    </div>

    <div class="bgimg-2">
        <div class="caption">
            <div>
                <h1 class="text-light">Enjoy the process!</h1>
            </div>
        </div>
    </div>

    <div class="bg-dark text-light text-center">
        <h2 class="text-light py-3">No excuses!</h2>
        <div class="mx-5 pb-3">
            <p>
                Exercising from home allows you to fit in a workout whenever you’re feeling particularly inspired or energized. Many websites offer pre-recorded classes, which means no more fretting over the class filling up. You can also fit in fitness throughout your day, by getting in a couple of quick sets while you wait for your coffee to brew, oatmeal to cook, or Zoom meeting to start.        </p>
            <p>
                A cold night or a particularly difficult day at work may be enough to keep you from going to the gym. But when it comes to meeting your personal fitness goals, consistency is key. A home exercise routine provides the convenience necessary to never miss a workout.
            </p>
        </div>
    </div>

    <div class="bgimg-3">
        <div class="caption">
            <div>
                <h1 class="text-light">Challenge Yourself!</h1>
            </div>
        </div>
    </div>

    <div id="viewer-or-login-div" class="bg-dark text-light text-center">

    </div>

    <div class="bgimg-1">
        <div class="caption">
            <div>
                <h1 class="text-light">What are you waiting for? Start now!</h1>
            </div>
        </div>
    </div>
</div>

<script>
    const homeViewHandler = {
        userContentAccordingToRoleDiv: $('viewer-or-login-div'),

        populateUserContentDivAccordingToRole: function (role) {
            if(role === 'viewer') {
                const htmlToBeInserted = `<div>
                                            <h2 class="text-light py-3">Start your journey!</h2>
                                            <p>You are currently not logged in. Log in to create your home workout!</p>
                                            <div class="mx-5 d-flex">
                                                <button class="centered add-button" id="login-button">
                                                    Register here</button>
                                            </div>
                                           </div>`;

                const viewerElement = createElementFromHTML(htmlToBeInserted);
                this.userContentAccordingToRoleDiv.appendChild(viewerElement);

                $('login-button').addEvent('click', () => {
                    window.location.href = "<?= URL::site('register/display_register')?>";
                });

                return;
            }

            const htmlToBeInserted = `<div>
                                            <h2 class="text-light py-3">Get in better shape right now!</h2>
                                            <p>Would you like to create a workout to complete at home right now?</p>
                                            <div class="mx-5 d-flex">
                                                <button class="centered add-button" id="start-workout-button">
                                                    Create a Workout</button>
                                            </div>
                                           </div>`;

            const viewerElement = createElementFromHTML(htmlToBeInserted);
            this.userContentAccordingToRoleDiv.appendChild(viewerElement);

            $('start-workout-button').addEvent('click', () => {
                window.location.href = "<?= URL::site('workouts')?>";
            });
        },

        onSuccessUserDetailsRequest: function (responseText, responseXML) {
            this.populateUserContentDivAccordingToRole(responseText);
        },

        userDetailsRequest: new Request({
            url: '<?= URL::site('index/get_current_user_information')?>',
            method: 'get',
            onSuccess: function (responseText, responseXML) {
                homeViewHandler.onSuccessUserDetailsRequest(responseText, responseXML);
            },
        }),

        init: function () {
            this.userDetailsRequest.send();
        }
    };


    window.addEvent('domready', function () {
        homeViewHandler.init();
    });
</script>