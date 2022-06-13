<?php
?>

<div class="container">
    <h1>
        Registered Users
    </h1>

    <div class="input-group">
        <input id='input-search' type="text" placeholder="Search by username" name="username" required>
    </div>


    <div id="users-list">

    </div>
</div>

<script>
    const usersViewHandler = {
        inputSearch: $('input-search'),
        selectedCategories: [],
        removeAdminRole: function (button) {
            return new Request({
                url: '<?= URL::site('usersHandling/remove_admin_by_post_ID')?>',
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
            })
        },
        addAdminRole: function (button) {
            return new Request({
                url: '<?= URL::site('usersHandling/add_admin_by_post_ID')?>',
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
        },

        onSuccessUserListRequest: function (response) {
            const removeAdminButtons = $$('#users-list .remove-admin-button');
            const addAdminButtons = $$('#users-list .add-admin-button');


            removeAdminButtons.addEvent('click', function () {
                this.addClass('disabled');
                usersViewHandler.removeAdminRole(this).send();
            });

            addAdminButtons.addEvent('click', function () {
                this.addClass('disabled');
                usersViewHandler.addAdminRole(this).send();
            });
        },

        userListRequest: new Request.HTML({
            update: $('users-list'),
            onSuccess: function (response) {
                console.log(this);
                usersViewHandler.onSuccessUserListRequest(response);
            },
        }),

        init: function () {
            this.inputSearch.addEvent('keyup', () => {
                this.userListRequest.send({
                    method: 'get',
                    url: "<?= URL::site('usersHandling/return_users_list') ?>",
                    data: {'keyword': this.inputSearch.value},
                });
            });

            this.userListRequest.send({
                method: 'get',
                url: '<?= URL::site('usersHandling/return_users_List')?>',
            });
        }

    };


    window.addEvent('domready', function () {
        usersViewHandler.init();
    });
</script>