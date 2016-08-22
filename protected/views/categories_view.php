<div class="categories-container">
    <? foreach ($categoriesList as $categoriesItem): ?>
        <a class="category-link" href=<?='/categories/'.$categoriesItem['id'];?>>
            <div class="category-div">
                <img class="category-img" src=<?='/img/categories/'.$categoriesItem['id'].'.png';?> alt="img-of-category">
                <p class="category-name"><?=$categoriesItem['name']; ?></p>
            </div>
        </a>
    <? endforeach; ?>
</div>