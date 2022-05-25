<?php
    $users = $users ?? [];
?>

<div class="container">
    <h1>
        Registered users
    </h1>


    <div id="users-list">
        <?= View::factory('userlist', ['users' => $users ]) ?>
    </div>
</div>

<script>
    window.addEvent('domready', function() {


        const req = new Request.HTML({

            update: $('users-list'),
            url:'<?= URL::site()?>',

            onSuccess: function(txt){

            },

            // Our request will most likely succeed, but just in case, we'll add an
            // onFailure method which will let the user know what happened.
            onFailure: function(){

            }

        });

        let inputValue = '';
        //onkeypress pe input:
        $('makeRequest').addEvent('click', function(){
            req.get({'keyword': inputValue});
        });



        req.send();

    });
</script>