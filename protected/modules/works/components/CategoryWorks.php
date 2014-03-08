<?php
/**
 * Виджет Категории раздела Works.
 * Выводит список категорий раздела Works.
 * @param array $categoryObj Массив объектов (ActiveRecord) категорий раздела Works.
 * @var CategoryPortfolio $item Объект (ActiveRecord) категория раздела Works.
 * */
class CategoryWorks extends CWidget
{
    public $categoryObj;

    public function run()
    {
        if(count($this->categoryObj)>0){
            ?>
            <div class="filter-wrapper clearfix">
                <div class="pull-right">
                    <strong>Категории: </strong>
                    <ul id="filters" class="filter nav nav-pills">
                        <li class="active"><a href="#" data-filter="">Все</a></li>
            <?php
            foreach($this->categoryObj as $item){
                echo "<li><a href='#' data-filter='.works-category-$item->id_catport'>$item->title_catport</a></li>";
            }
            ?>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            <?php
        }
    }
}