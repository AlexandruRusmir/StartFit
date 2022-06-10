<?php
?>

<div class="container">
    <h1>
        Exercise Categories
    </h1>

    <div class="form-container">
        <div class="input-group">
            <input id='input-search' type="text" placeholder="Add an exercise category" name="username" required>
        </div>

        <div class="d-flex">
            <button type="submit" id='category-add-button' class="add-button">Add Category</button>
        </div>
    </div>

    <h5>Current exercise categories:</h5>
    <div id="categories-list">

    </div>
</div>

<script>
    window.addEvent('domready', function () {

        const deleteCategory = (button) => {
            return new Request({
                url: '<?= URL::site('exerciseHandling/delete_category_by_post_ID')?>',
                method: 'post',
                data: {'id': button.dataset.id},
                onSuccess: (response) => {
                    button.removeClass('disabled');
                    categoryListRequest.send({
                        method: 'get',
                        url: '<?= URL::site('exerciseHandling/return_categories_list')?>',
                    });
                }
            });
        }

        const onSuccessCategoryListRequest = (response) => {
            const deleteCategoryButtons = $$('#categories-list .delete-button');
            deleteCategoryButtons.addEvent('click', function () {
                this.addClass('disabled');
                deleteCategory(this).send();
            });

        }

        const categoryListRequest = new Request.HTML({
            update: $('categories-list'),
            onSuccess: onSuccessCategoryListRequest,
        });

        const categoryAddButton = $('category-add-button');

        const inputSearch = document.getElementById('input-search');

        const addCategoryItem = (button) => {
            return new Request({
                url: '<?= URL::site('exerciseHandling/add_category')?>',
                method: 'post',
                data: {'category': inputSearch.value},
                onSuccess: (response) => {
                    inputSearch.value = '';
                    button.removeClass('disabled');
                    categoryListRequest.send({
                        method: 'get',
                        url: '<?= URL::site('exerciseHandling/return_categories_list')?>',
                    });
                }
            });
        }

        categoryAddButton.addEvent('click', function () {
            this.addClass('disabled');
            addCategoryItem(this).send();
        });

        categoryListRequest.send({
            method: 'get',
            url: '<?= URL::site('exerciseHandling/return_categories_list')?>',
        });
    });
</script>