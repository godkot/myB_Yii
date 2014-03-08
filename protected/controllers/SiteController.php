<?php

class SiteController extends Controller
{
    /**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $this->typePage = 'home';
        $this->_namePartition = 'main';
        $this->menu = MainMenu::model()->getMenuItems($this->_namePartition);
        $currentPartObj = Partition::model()->getCurrentPart($this->_namePartition);
        $this->_idPartition = $currentPartObj->id_partition;
        $this->seoPartArr = Partition::model()->getSeoPart($currentPartObj);

        $mainTextObj = Text::model()->getTextPart($this->_idPartition);
        $skillsObj = Skills::model()->findAll();
        $this->render('index', array('mainTextObj' => $mainTextObj, 'skillsObj' => $skillsObj));
	}

    public function actionContact()
    {
        $this->typePage = 'page';
        $this->_namePartition = 'contact';
        $this->menu = MainMenu::model()->getMenuItems($this->_namePartition);
        $currentPartObj = Partition::model()->getCurrentPart($this->_namePartition);
        $this->_idPartition = $currentPartObj->id_partition;
        $this->seoPartArr = Partition::model()->getSeoPart($currentPartObj);

        $contactObj = Contact::model()->getContact($this->_idPartition);
        $this->breadcrumbs=array('Контакты',);

        $model=new ContactForm;
        if(isset($_POST['ContactForm']))
        {
            $model->attributes=$_POST['ContactForm'];
            if($model->validate())
            {
                $name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                $subject='=?UTF-8?B?'.base64_encode('Письмо с Блога').'?=';
                $headers="From: $name <{$model->email}>\r\n".
                    "Reply-To: {$model->email}\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
                Yii::app()->user->setFlash('contact','Спасибо за сообщение. Я отвечу Вам сразу как только смогу.');
                $this->refresh();
            }
        }
        $this->layout = 'page';
        $this->render('Contact',array('model'=>$model,'contactObj'=>$contactObj));
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