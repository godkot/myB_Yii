<?php

/**
 * This is the model class for table "blog".
 *
 * The followings are the available columns in table 'blog':
 * @property integer $id_blog
 * @property integer $partition_blog
 * @property integer $cat_blog
 * @property integer $type_blog
 * @property string $date_blog
 * @property integer $author_blog
 * @property string $titletxt_blog
 * @property string $anons_blog
 * @property string $text_blog
 * @property string $titleimg_blog
 * @property string $image_blog
 * @property string $gallery_blog
 * @property string $videolink_blog
 * @property string $videofile_blog
 * @property string $audiolink_blog
 * @property string $audiofile_blog
 * @property string $link_blog
 * @property string $quote_blog
 * @property string $related_blog
 * @property string $permalink_blog
 * @property integer $show_blog
 * @property integer $sort_blog
 * @property integer $countview_blog
 * @property string $tags_blog
 * @property string $uri_blog
 * @property string $seotitle_blog
 * @property string $seokeywords_blog
 * @property string $seodesc_blog
 * @property integer $footer_blog
 *
 * The followings are the available model relations:
 * @property Partition $partitionBlog
 * @property CategoryBlog $catBlog
 * @property TypeBlog $typeBlog
 * @property AdminUsers $authorBlog
 */
class Blog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'blog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('partition_blog, cat_blog, type_blog, date_blog, author_blog, titletxt_blog, anons_blog, text_blog, titleimg_blog, image_blog, gallery_blog, videolink_blog, videofile_blog, audiolink_blog, audiofile_blog, link_blog, quote_blog, related_blog, permalink_blog, show_blog, sort_blog, countview_blog, tags_blog, uri_blog, seotitle_blog, seokeywords_blog, seodesc_blog', 'required'),
			array('partition_blog, cat_blog, type_blog, author_blog, show_blog, sort_blog, countview_blog, footer_blog', 'numerical', 'integerOnly'=>true),
			array('titletxt_blog, titleimg_blog, image_blog, videolink_blog, videofile_blog, audiolink_blog, audiofile_blog, link_blog, quote_blog, related_blog, permalink_blog, tags_blog, uri_blog, seotitle_blog, seokeywords_blog, seodesc_blog', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_blog, partition_blog, cat_blog, type_blog, date_blog, author_blog, titletxt_blog, anons_blog, text_blog, titleimg_blog, image_blog, gallery_blog, videolink_blog, videofile_blog, audiolink_blog, audiofile_blog, link_blog, quote_blog, related_blog, permalink_blog, show_blog, sort_blog, countview_blog, tags_blog, uri_blog, seotitle_blog, seokeywords_blog, seodesc_blog, footer_blog', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'partitionBlog' => array(self::BELONGS_TO, 'Partition', 'partition_blog'),
			'catBlog' => array(self::BELONGS_TO, 'CategoryBlog', 'cat_blog'),
			'typeBlog' => array(self::BELONGS_TO, 'TypeBlog', 'type_blog'),
			'authorBlog' => array(self::BELONGS_TO, 'AdminUsers', 'author_blog'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_blog' => 'Id Blog',
			'partition_blog' => 'Partition Blog',
			'cat_blog' => 'Cat Blog',
			'type_blog' => 'Type Blog',
			'date_blog' => 'Date Blog',
			'author_blog' => 'Author Blog',
			'titletxt_blog' => 'Titletxt Blog',
			'anons_blog' => 'Anons Blog',
			'text_blog' => 'Text Blog',
			'titleimg_blog' => 'Titleimg Blog',
			'image_blog' => 'Image Blog',
			'gallery_blog' => 'Gallery Blog',
			'videolink_blog' => 'Videolink Blog',
			'videofile_blog' => 'Videofile Blog',
			'audiolink_blog' => 'Audiolink Blog',
			'audiofile_blog' => 'Audiofile Blog',
			'link_blog' => 'Link Blog',
			'quote_blog' => 'Quote Blog',
			'related_blog' => 'Похожие статьи блога (1,2,3)',
			'permalink_blog' => 'Permalink Blog',
			'show_blog' => 'Show Blog',
			'sort_blog' => 'Sort Blog',
			'countview_blog' => 'Countview Blog',
			'tags_blog' => 'Tags Blog',
			'uri_blog' => 'Uri Blog',
			'seotitle_blog' => 'Seotitle Blog',
			'seokeywords_blog' => 'Seokeywords Blog',
			'seodesc_blog' => 'Seodesc Blog',
            'footer_blog' => 'Footer Blog',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_blog',$this->id_blog);
		$criteria->compare('partition_blog',$this->partition_blog);
		$criteria->compare('cat_blog',$this->cat_blog);
		$criteria->compare('type_blog',$this->type_blog);
		$criteria->compare('date_blog',$this->date_blog,true);
		$criteria->compare('author_blog',$this->author_blog);
		$criteria->compare('titletxt_blog',$this->titletxt_blog,true);
		$criteria->compare('anons_blog',$this->anons_blog,true);
		$criteria->compare('text_blog',$this->text_blog,true);
		$criteria->compare('titleimg_blog',$this->titleimg_blog,true);
		$criteria->compare('image_blog',$this->image_blog,true);
		$criteria->compare('gallery_blog',$this->gallery_blog,true);
		$criteria->compare('videolink_blog',$this->videolink_blog,true);
		$criteria->compare('videofile_blog',$this->videofile_blog,true);
		$criteria->compare('audiolink_blog',$this->audiolink_blog,true);
		$criteria->compare('audiofile_blog',$this->audiofile_blog,true);
		$criteria->compare('link_blog',$this->link_blog,true);
		$criteria->compare('quote_blog',$this->quote_blog,true);
		$criteria->compare('related_blog',$this->related_blog,true);
		$criteria->compare('permalink_blog',$this->permalink_blog,true);
		$criteria->compare('show_blog',$this->show_blog);
		$criteria->compare('sort_blog',$this->sort_blog);
		$criteria->compare('countview_blog',$this->countview_blog);
		$criteria->compare('tags_blog',$this->tags_blog,true);
		$criteria->compare('uri_blog',$this->uri_blog,true);
		$criteria->compare('seotitle_blog',$this->seotitle_blog,true);
		$criteria->compare('seokeywords_blog',$this->seokeywords_blog,true);
		$criteria->compare('seodesc_blog',$this->seodesc_blog,true);
        $criteria->compare('footer_blog',$this->footer_blog);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Blog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getBlogPosts($id_partition, $pageSize=5, $id_category=0, $id_author=0){
        $criteria = new CDbCriteria();
        if(!empty($id_category)) {
            $criteria->condition = 'partition_blog=:id_partition and cat_blog=:id_category';
            $criteria->order = 'sort_blog DESC';
            $criteria->params = array(':id_partition'=>$id_partition, ':id_category'=>$id_category);
        }
        else if(!empty($id_author)) {
            $criteria->condition = 'partition_blog=:id_partition and author_blog=:id_author';
            $criteria->order = 'sort_blog DESC';
            $criteria->params = array(':id_partition'=>$id_partition, ':id_author'=>$id_author);
        }
        else {
            $criteria->condition = 'partition_blog=:id_partition';
            $criteria->order = 'sort_blog DESC';
            $criteria->params = array(':id_partition'=>$id_partition);
        }

        $pages = new ReverseCPagination($this->model()->count($criteria));
        // элементов на страницу
        $pages->pageSize = $pageSize;
        $pages->applyLimit($criteria);
        $postsObj = $this->model()->findAll($criteria);

        return array('postsObj'=>$postsObj,'pages'=>$pages);
    }

    public function getBlogOnePost($id_partition, $post){
        $criteria = new CDbCriteria();
        $criteria->condition = 'partition_blog=:id_partition and uri_blog=:post';
        $criteria->params = array(':id_partition'=>$id_partition,':post'=>$post);

        $postObj = $this->model()->find($criteria);

        return $postObj;
    }

    public function getBlogRelatedPosts($idPosts){
        $criteria = new CDbCriteria();
        $criteria->condition = "id_blog in ($idPosts)";
        //$criteria->params = array(':idPosts'=>"$idPosts");
        $postsObj = $this->model()->findAll($criteria);
        return $postsObj;
    }

}
