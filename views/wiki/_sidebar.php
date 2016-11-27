<?php

use app\models\WikiCategory;
use yii\helpers\Html;

?>
<?= Html::a('<span class="big">Write</span><span class="small">new article</span>', ['create'], ['class' => 'btn btn-block btn-new-wiki-article']) ?>
<input type="text" class="form-control wiki-search" id="search" name="q" placeholder="Search wiki…" autocomplete="off" value="">

<?php if (isset($sort)): ?>
    <h3 class="wiki-side-title">Sorting by</h3>
    <ul class="wiki-side-menu">
        <li class="active"><a href="#">Date</a></li>
        <li><a href="#">Rating</a></li>
        <li><a href="#">Comments</a></li>
        <li><a href="#">Views</a></li>
    </ul>

    <?= \yii\widgets\LinkSorter::widget([
        'sort' => $sort,
        'options' => [
            'class' => 'wiki-side-menu',
        ],
    ]) ?>

<?php endif; ?>

<h3 class="wiki-side-title">Categories</h3>

<ul class="wiki-side-menu">
    <li<?= empty($category) ? ' class="active"' : '' ?>><a href="<?= \yii\helpers\Url::to(['wiki/index'])?>">All</a></li>
    <?php foreach(WikiCategory::findWithCountData()->all() as $cat): ?>
        <li<?= isset($category) && $category == $cat->id ? ' class="active"' : '' ?>>
            <a href="<?= \yii\helpers\Url::to(['wiki/index', 'category' => $cat->id])?>"><?= Html::encode($cat->name) ?> <span class="count">(<?= (int) $cat->count ?>)</span></a>
        </li>
    <?php endforeach; ?>
</ul>

<h3 class="wiki-side-title">Popular Tags</h3>
<ul class="wiki-side-menu last-side-menu">
    <li><a href="#">Ajax <span class="count">(52)</span></a></li>
    <li><a href="#">Authentification <span class="count">(23)</span></a></li>
</ul>
