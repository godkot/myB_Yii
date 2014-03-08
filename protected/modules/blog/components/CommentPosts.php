<?php
/**
 * @var $post Blog
 * */
class CommentPosts extends CWidget
{
    public $params;
    public $modelComment;
    public $modelUser;
    private $_name;
    private $_email;
    private $_web;
    private $_sub = 0;
    private $jsFile = '/vendor/js/comment-reply.js?ver=3.4';

    public function init() {
        // Подключаем стиль, если выводится HTML и если этот ваш стиль вообще задан.
        if (!is_null($this->jsFile)) {
            Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl.$this->jsFile, CClientScript::POS_END);
        }
        parent::init();
    }

    public function run()
    {
        if(!Yii::app()->user->isGuest){
            $this->_name = Yii::app()->user->name;
            $this->_email = Yii::app()->user->email;
            $this->_web = Yii::app()->user->web;
        }

        if(count($this->params)>0){
            $countComment = Comment::model()->getCountComment($this->params->partition_blog, $this->params->id_blog);
            $commentObjArr = Comment::model()->getCommentPost($this->params->partition_blog, $this->params->id_blog, 0);
            if($countComment>0){
                ?>
                    <div class="comment-holder">
                        <h3 class="comments-h"><?php echo CommentsMethod::getWordComment($countComment);?></h3>
                        <div class="pagination"></div>
                        <ol class="comment-list clearfix">
                <?php
                foreach($commentObjArr as $post){
                    if(empty($post->sub_comment)){
                    ?>
                    <li class="comment byuser comment-author-admin bypostauthor even thread-odd thread-alt depth-1 clearfix" id="li-comment-<?php echo $post->id_comment;?>">
                        <div id="comment-<?php echo $post->id_comment;?>" class="comment-body clearfix">
                            <div class="wrapper">
                                <div class="comment-author vcard">
                                    <?php echo Chtml::image(Yii::app()->baseUrl.'/'.$post->iduserComment->photo_userstat,$post->iduserComment->name_userstat,array('class'=>'avatar photo','height'=>65,'width'=>65));?>
                                    <!--<img alt='' src='http://1.gravatar.com/avatar/5cdc09662dd539303e316621ec21b6be?s=65&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D65&amp;r=G' class='avatar avatar-65 photo' height='65' width='65' />-->
                                    <span class="author"><?php echo $post->iduserComment->name_userstat;?></span>
                                </div>
                                <div class="extra-wrap">
                                    <p><?php echo $post->text_comment;?></p>
                                </div>
                            </div>
                            <div class="wrapper">
                                <div class="reply">
                                    <?php echo Chtml::link(Ответить,"#?replytocom=$post->id_comment#respond",array('class'=>'comment-reply-link','onclick'=>"return addComment.moveForm('comment-$post->id_comment', '$post->id_comment', 'respond', '77')"));?>
                                    <!--<a class='comment-reply-link' href='#?replytocom=7#respond' onclick='return addComment.moveForm("comment-7", "7", "respond", "77")'>Ответить</a>-->
                                </div>
                                <div class="comment-meta commentmetadata"><?php echo Yii::app()->dateFormatter->format('d MMMM yyyy', $post->date_comment);?></div>
                            </div>
                        </div>
                        <?php

                            $subCommentObjArr = Comment::model()->getCommentPost($this->params->partition_blog, $this->params->id_blog, $post->id_comment);
                            if(count($subCommentObjArr)>0){
                                ?><ul class='children'><?php
                                foreach($subCommentObjArr as $subPost){
                                    ?>
                                        <li class="comment byuser comment-author-admin bypostauthor odd alt depth-2 clearfix" id="li-comment-<?php echo $subPost->id_comment;?>">
                                            <div id="comment-<?php echo $subPost->id_comment;?>" class="comment-body clearfix">
                                                <div class="wrapper">
                                                    <div class="comment-author vcard">
                                                        <?php echo Chtml::image(Yii::app()->baseUrl.'/'.$subPost->iduserComment->photo_userstat,$post->iduserComment->name_userstat,array('class'=>'avatar photo','height'=>65,'width'=>65));?>
                                                        <span class="author"><?php echo $subPost->iduserComment->name_userstat;?></span>
                                                    </div>
                                                    <div class="extra-wrap">
                                                        <p><?php echo $subPost->text_comment;?></p>
                                                    </div>
                                                </div>
                                                <div class="wrapper">
                                                    <div class="reply">
                                                        <?php //echo Chtml::link(Ответить,"#?replytocom=$post->id_comment#respond",array('class'=>'comment-reply-link','onclick'=>"return addComment.moveForm('comment-$subPost->id_comment', '$subPost->id_comment', 'respond', '77')"));?>
                                                        <!--<a class='comment-reply-link' href='#?replytocom=8#respond' onclick='return addComment.moveForm("comment-8", "8", "respond", "77")'>Ответить</a>-->
                                                    </div>
                                                    <div class="comment-meta commentmetadata"><?php echo Yii::app()->dateFormatter->format('d MMMM yyyy', $subPost->date_comment);?></div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php
                                }
                                ?></ul><?php
                            }

                        ?>
                    </li>
                    <?php
                }

            }
                ?>
                        </ol>
                        <div class="pagination"></div>
                    </div>
            <?php
            }
        }

        ?>
        <div id="respond">
            <h3>Оставить коментарий</h3>
            <div class="cancel-comment-reply">
                <small>
                    <?php echo Chtml::link('Отменить реплику','/#respond',array('rel'=>'nofollow','id'=>'cancel-comment-reply-link','style'=>'display:none;'));?>
                    <!--<a rel="nofollow" id="cancel-comment-reply-link" href="/#respond" style="display:none;">Click here to cancel reply.</a>-->
                </small>
            </div>
            <?php echo CHtml::beginForm('','post',array('id'=>'commentform')); ?>
            <?php echo CHtml::errorSummary($this->modelUser); ?>
            <?php echo CHtml::errorSummary($this->modelComment); ?>

            <p class="field"> <?php echo CHtml::activeTextField($this->modelUser,'name_userstat',array('value'=>$this->_name,'placeholder'=>'Имя*','size'=>'22','tabindex'=>'1','aria-required'=>'true')); ?> </p>

            <p class="field"> <?php echo CHtml::activeTextField($this->modelUser,'email_userstat',array('value'=>$this->_email,'placeholder'=>'Email (не для публикации)*','size'=>'22','tabindex'=>'2','aria-required'=>'true')); ?> </p>

            <p class="field"> <?php echo CHtml::activeTextField($this->modelUser,'web_userstat',array('value'=>$this->_web,'placeholder'=>'Web-сайт','size'=>'22','tabindex'=>'3')); ?> </p>

            <p> <?php echo Chtml::activeTextArea($this->modelComment,'text_comment',array('placeholder'=>'Ваш комментарий*','cols'=>'58','rows'=>'10','tabindex'=>'4')); ?> </p>

            <p>
                <?php echo CHtml::activeHiddenField($this->modelComment,'partition_comment',array('value'=>$this->params->partition_blog));?>
                <?php echo CHtml::activeHiddenField($this->modelComment,'idblog_comment',array('value'=>$this->params->id_blog));?>
                <?php echo CHtml::activeHiddenField($this->modelComment,'sub_comment',array('id'=>'comment_parent','value'=>'0'));?>
                <?php echo CHtml::submitButton('Комментировать',array('class'=>'btn btn-primary','tabindex'=>'5')); ?>

                <input type='hidden' name='comment_post_ID' value='77' id='comment_post_ID' />
                <!--<input type='hidden' name='comment_parent' id='comment_parent' value='0' />-->
            </p>

            <?php echo CHtml::endForm(); ?>

        </div>
    <?php


    }
}
?>