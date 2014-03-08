<?php

class PostsController extends Controller
{
    private $_pageSize = 4;

    public function actionIndex($category='', $post='', $author='')
    {
        $this->typePage = 'blog';
        $this->_namePartition = 'blog';

        $this->menu = MainMenu::model()->getMenuItems($this->_namePartition);
        $currentPartObj = Partition::model()->getCurrentPart($this->_namePartition);
        $this->_idPartition = $currentPartObj->id_partition;
        $this->seoPartArr = Partition::model()->getSeoPart($currentPartObj);

        $categoryObj = CategoryBlog::model()->getCategoryBlog($this->_idPartition);

        $this->layout = '//layouts/page';

        if(!empty($category)) {
            $category = parent::getSaveVar($category);
            $this->breadcrumbs=array('Блог'=>array('/blog'),$category,);
            $id_category = CategoryBlog::model()->getIdCategory($category);
            $postsArr = Blog::model()->getBlogPosts($this->_idPartition, $this->_pageSize, $id_category);
        }
        else if(!empty($author)) {
            $author = parent::getSaveVar($author);
            $this->breadcrumbs=array('Блог'=>array('/blog'),$author,);
            $id_author = AdminUsers::model()->getIdUser($author);
            $postsArr = Blog::model()->getBlogPosts($this->_idPartition, $this->_pageSize, 0, $id_author);
        }
        else if(!empty($post)) {
            $post = parent::getSaveVar($post);
            $postObj = Blog::model()->getBlogOnePost($this->_idPartition, $post);
            $this->breadcrumbs=array('Блог'=>array('/blog'),$postObj->titletxt_blog);

            $modelUser = new UsersStatistic;
            $modelComment = new Comment;

            if(isset($_POST['UsersStatistic']) and isset($_POST['Comment'])){
                $modelUser = CommentsMethod::userComment($_POST['UsersStatistic']);
                $modelComment = CommentsMethod::addComment($_POST['Comment']);
            }

            $this->render('post', array('postObj'=>$postObj, 'categoryObj'=>$categoryObj,'modelComment'=>$modelComment,'modelUser'=>$modelUser));
            exit();
        }
        else {
            $this->breadcrumbs=array('Блог',);
            $postsArr = Blog::model()->getBlogPosts($this->_idPartition, $this->_pageSize);
        }

        $this->render('posts', array('postsObj'=>$postsArr['postsObj'], 'pages'=>$postsArr['pages'], 'categoryObj'=>$categoryObj));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
}