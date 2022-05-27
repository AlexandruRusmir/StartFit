<?php
?>

<h1>
    Exercise Categories
</h1>

<div class="form-container">
    <div class="input-group">
        <input id='input-search' type="text" placeholder="Add an exercise category" name="username" required>
    </div>

    <div style="display: flex">
        <input type="submit" name='submit' class="submit-btn"/>
    </div>
</div>


<div id="categories-list">

</div>

<script>
    window.addEvent('domready', function() {

        const deleteCategory = (button) => {
            return new Request({
                url:'<?= URL::site('exerciseHandling/deleteCategoryByPostID')?>',
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

        const onSuccessCategoryListRequest = (response) => {
            const removeAdminButtons = $$('#categories-list .remove-admin-button');


            removeAdminButtons.addEvent('click', function () {
                this.addClass('disabled');
                deleteCategory(this).send();
            });

        }

        const categoryListRequest = new Request.HTML({
            update: $('categories-list'),
            onSuccess: onSuccessCategoryListRequest,
        });

        const categoryAddButton = $$('.submit-btn');

        const inputSearch = document.getElementById('input-search');

        const addCategoryItem = (button) => {
            return new Request({
                url:'<?= URL::site('exerciseHandling/addCategory')?>',
                method: 'post',
                data: {'category': inputSearch.value},
                onSuccess: (response) => {
                    inputSearch.value = '';
                    button.removeClass('disabled');
                }
            });
        }

        categoryAddButton.addEvent('click', function () {
            this.addClass('disabled');
            addCategoryItem(this).send();
        });

        categoryListRequest.send({
            method: 'get',
            url:'<?= URL::site('exerciseHandling/returnCategoriesList')?>',
        });
    });
</script>