<?php
?>

<h1>
    Registered users
</h1>

<div class="input-group">
    <input class='input-search' type="text" placeholder="Search by username" name="username" required>
</div>


<div id="users-list">

</div>

<script>
    window.addEvent('domready', function() {

        const removeAdminRole = (button) => {
            return new Request({
                url:'<?= URL::site('usersHandling/removeAdminByPostID')?>',
                method: 'post',
                data: {'id': button.dataset.id},
                onSuccess: (response) => {
                    let parent = button.getParent('.user-box');
                    let addButton = parent.getElement('.add-admin-button');

                    addButton.removeClass('d-none');
                    button.addClass('d-none');
                    button.removeClass('disabled');

                    let rolesText = parent.getElement('.roles');
                    rolesText.innerText = 'Roles: login';
                }
            });
        }
        function addAdminRole(button) {
            return new Request({
                url: '<?= URL::site('usersHandling/addAdminByPostID')?>',
                method: 'post',
                data: {'id': button.dataset.id},
                onSuccess: (response) => {
                    let parent = button.getParent('.user-box');
                    let removeButton = parent.getElement('.remove-admin-button');

                    removeButton.removeClass('d-none');
                    button.addClass('d-none');
                    button.removeClass('disabled');

                    let rolesText = parent.getElement('.roles');
                    rolesText.innerText = 'Roles: login, admin';
                }
            });
        }

        const onSuccessUserListRequest = (response) => {
            const removeAdminButtons = $$('#users-list .remove-admin-button');
            const addAdminButtons = $$('#users-list .add-admin-button');

            let inputValue = '';
            //onkeypress pe input:

            removeAdminButtons.addEvent('click', function () {
                this.addClass('disabled');
                removeAdminRole(this).send();
            });

            addAdminButtons.addEvent('click', function () {
                this.addClass('disabled');
                addAdminRole(this).send();
            });
        }

        const userListRequest = new Request.HTML({
            update: $('users-list'),
            onSuccess: onSuccessUserListRequest,
        });

        const inputSearch = $$('.input-search');
        inputSearch.addEvent('keyup', function () {
            userListRequest.send({
                    method: 'get',
                    url: "<?= URL::site('usersHandling/returnUsersList') ?>",
                    data: { 'keyword': this.value },
            });
        });

        userListRequest.send({
            method: 'get',
            url:'<?= URL::site('usersHandling/returnUsersList')?>',
        });
    });
</script>