<?php

/**
 * This is the model class for table "{{member}}".
 *
 * The followings are the available columns in table '{{member}}':
 * @property string $userid
 * @property string $username
 * @property string $passport
 * @property string $company
 * @property string $password
 * @property string $payword
 * @property string $email
 * @property integer $message
 * @property integer $chat
 * @property integer $sound
 * @property integer $online
 * @property integer $gender
 * @property string $truename
 * @property string $mobile
 * @property string $msn
 * @property string $qq
 * @property string $ali
 * @property string $skype
 * @property string $department
 * @property string $career
 * @property integer $admin
 * @property string $role
 * @property string $aid
 * @property integer $groupid
 * @property integer $regid
 * @property string $areaid
 * @property integer $sms
 * @property integer $credit
 * @property string $money
 * @property string $locking
 * @property string $bank
 * @property string $account
 * @property string $edittime
 * @property string $regip
 * @property string $regtime
 * @property string $loginip
 * @property string $logintime
 * @property string $logintimes
 * @property string $black
 * @property integer $send
 * @property string $auth
 * @property string $authvalue
 * @property string $authtime
 * @property integer $vemail
 * @property integer $vmobile
 * @property integer $vtruename
 * @property integer $vbank
 * @property integer $vcompany
 * @property integer $vtrade
 * @property string $trade
 * @property string $support
 * @property string $inviter
 */
class Member extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Member the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{member}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('message, chat, sound, online, gender, admin, groupid, regid, sms, credit, send, vemail, vmobile, vtruename, vbank, vcompany, vtrade', 'numerical', 'integerOnly'=>true),
			array('username, passport, ali, skype, department, career, bank, account, inviter', 'length', 'max'=>30),
			array('company, authvalue', 'length', 'max'=>100),
			array('password, payword, auth', 'length', 'max'=>32),
			array('email, mobile, msn, regip, loginip, trade, support', 'length', 'max'=>50),
			array('truename, qq', 'length', 'max'=>20),
			array('role, black', 'length', 'max'=>255),
			array('aid, areaid, money, locking, edittime, regtime, logintime, logintimes, authtime', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userid, username, passport, company, password, payword, email, message, chat, sound, online, gender, truename, mobile, msn, qq, ali, skype, department, career, admin, role, aid, groupid, regid, areaid, sms, credit, money, locking, bank, account, edittime, regip, regtime, loginip, logintime, logintimes, black, send, auth, authvalue, authtime, vemail, vmobile, vtruename, vbank, vcompany, vtrade, trade, support, inviter', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userid' => 'Userid',
			'username' => 'Username',
			'passport' => 'Passport',
			'company' => 'Company',
			'password' => 'Password',
			'payword' => 'Payword',
			'email' => 'Email',
			'message' => 'Message',
			'chat' => 'Chat',
			'sound' => 'Sound',
			'online' => 'Online',
			'gender' => 'Gender',
			'truename' => 'Truename',
			'mobile' => 'Mobile',
			'msn' => 'Msn',
			'qq' => 'Qq',
			'ali' => 'Ali',
			'skype' => 'Skype',
			'department' => 'Department',
			'career' => 'Career',
			'admin' => 'Admin',
			'role' => 'Role',
			'aid' => 'Aid',
			'groupid' => 'Groupid',
			'regid' => 'Regid',
			'areaid' => 'Areaid',
			'sms' => 'Sms',
			'credit' => 'Credit',
			'money' => 'Money',
			'locking' => 'Locking',
			'bank' => 'Bank',
			'account' => 'Account',
			'edittime' => 'Edittime',
			'regip' => 'Regip',
			'regtime' => 'Regtime',
			'loginip' => 'Loginip',
			'logintime' => 'Logintime',
			'logintimes' => 'Logintimes',
			'black' => 'Black',
			'send' => 'Send',
			'auth' => 'Auth',
			'authvalue' => 'Authvalue',
			'authtime' => 'Authtime',
			'vemail' => 'Vemail',
			'vmobile' => 'Vmobile',
			'vtruename' => 'Vtruename',
			'vbank' => 'Vbank',
			'vcompany' => 'Vcompany',
			'vtrade' => 'Vtrade',
			'trade' => 'Trade',
			'support' => 'Support',
			'inviter' => 'Inviter',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('passport',$this->passport,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('payword',$this->payword,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('message',$this->message);
		$criteria->compare('chat',$this->chat);
		$criteria->compare('sound',$this->sound);
		$criteria->compare('online',$this->online);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('truename',$this->truename,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('msn',$this->msn,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('ali',$this->ali,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('career',$this->career,true);
		$criteria->compare('admin',$this->admin);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('aid',$this->aid,true);
		$criteria->compare('groupid',$this->groupid);
		$criteria->compare('regid',$this->regid);
		$criteria->compare('areaid',$this->areaid,true);
		$criteria->compare('sms',$this->sms);
		$criteria->compare('credit',$this->credit);
		$criteria->compare('money',$this->money,true);
		$criteria->compare('locking',$this->locking,true);
		$criteria->compare('bank',$this->bank,true);
		$criteria->compare('account',$this->account,true);
		$criteria->compare('edittime',$this->edittime,true);
		$criteria->compare('regip',$this->regip,true);
		$criteria->compare('regtime',$this->regtime,true);
		$criteria->compare('loginip',$this->loginip,true);
		$criteria->compare('logintime',$this->logintime,true);
		$criteria->compare('logintimes',$this->logintimes,true);
		$criteria->compare('black',$this->black,true);
		$criteria->compare('send',$this->send);
		$criteria->compare('auth',$this->auth,true);
		$criteria->compare('authvalue',$this->authvalue,true);
		$criteria->compare('authtime',$this->authtime,true);
		$criteria->compare('vemail',$this->vemail);
		$criteria->compare('vmobile',$this->vmobile);
		$criteria->compare('vtruename',$this->vtruename);
		$criteria->compare('vbank',$this->vbank);
		$criteria->compare('vcompany',$this->vcompany);
		$criteria->compare('vtrade',$this->vtrade);
		$criteria->compare('trade',$this->trade,true);
		$criteria->compare('support',$this->support,true);
		$criteria->compare('inviter',$this->inviter,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function validatePassword($password) 
	{
		return $this->hashPassword($password) === $this->password;
	}
	
	public function hashPassword($password)
	{
		return md5($password);
	}
}