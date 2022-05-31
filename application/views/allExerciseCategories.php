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
        <button type="submit" class="submit-btn">Add Category</button>
    </div>
</div>

<h5>Current exercise categories:</h5>
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
                    button.removeClass('disabled');
                    categoryListRequest.send({
                        method: 'get',
                        url:'<?= URL::site('exerciseHandling/returnCategoriesList')?>',
                    });
                }
            });
        }

        const onSuccessCategoryListRequest = (response) => {
            const deleteCategoryButtons = $$('#categories-list .delete-category-button');
            deleteCategoryButtons.addEvent('click', function () {
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
                    categoryListRequest.send({
                        method: 'get',
                        url:'<?= URL::site('exerciseHandling/returnCategoriesList')?>',
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
            url:'<?= URL::site('exerciseHandling/returnCategoriesList')?>',
        });
    });
</script>