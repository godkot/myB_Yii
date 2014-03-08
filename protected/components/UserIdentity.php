<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
    private $_id;
    public function authenticate()
    {
        $record=UsersStatistic::model()->findByAttributes(array('email_userstat'=>$this->username));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else
        {
            $this->_id=$record->id_userstat;
            $this->username = $record->name_userstat;
            $this->setState('name', $record->name_userstat);
            $this->setState('email', $record->email_userstat);
            $this->setState('web', $record->web_userstat);
            $this->setState('ip', $record->ip_userstat);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}