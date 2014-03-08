<?php
/**
 * Created by PhpStorm.
 * User: KoT
 * Date: 04.03.14
 * Time: 14:51
 */
class CommentsMethod{
    public function userComment($data){
        $datetime = new DateTime();
        $modelUser = new UsersStatistic;
        $modelUser->attributes=$data;
        $modelUser->ip_userstat = ip2long(CHttpRequest::getUserHostAddress());
        $modelUser->photo_userstat = 'images/author.png';
        $modelUser->fierstdate_userstat = $datetime->format('Y-m-d H:i:s');
        $modelUser->lastdate_userstat = $datetime->format('Y-m-d H:i:s');

        if($modelUser->validate()){
            Yii::app()->user->allowAutoLogin = true;
            $identity=new UserIdentity($modelUser->email_userstat,'');
            if($identity->authenticate()){
                Yii::app()->user->login($identity,3600*24*30);
                $modelUser->updateByPk(Yii::app()->user->getId(),array('lastdate_userstat'=>$modelUser->lastdate_userstat));
            }
            else{
                $modelUser->save(false);
                if($identity->authenticate())
                    Yii::app()->user->login($identity,3600*24*30);
                else
                    echo $identity->errorMessage;
            }
        }
        return $modelUser;
    }

    public function addComment($data){
        $datetime = new DateTime();
        $modelComment = new Comment;
        $modelComment->attributes=$data;
        $modelComment->iduser_comment = Yii::app()->user->getId();
        $modelComment->date_comment = $datetime->format('Y-m-d H:i:s');
        $modelComment->enable_comment = 1;
        $modelComment->show_comment = 1;

        if($modelComment->validate()){
            $modelComment->save(false);
            $modelComment->unsetAttributes();
        }
        return $modelComment;
    }

    /**
     * @param $number int число чего-либо
     * @param $titles array варинаты написания для количества 1, 2 и 5
     * @return string
     */
    public function getWordComment($number, $titles=array('комментарий','комментария','комментариев')){
        if(!empty($number)){
            $cases = array (2, 0, 1, 1, 1, 2);
            return $number." ".$titles[ ($number%100 >4 && $number%100< 20)? 2 : $cases[min($number%10, 5)] ];
        }
        else return 'нет коментариев';
    }
}