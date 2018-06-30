<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kontingen".
 *
 * @property string $kontingen_id
 * @property string $kontingen_nama
 * @property string $kontingen_official
 * @property string $kontingen_cp
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 *
 * @property KtgAtlet[] $ktgAtlets
 */
 use  \yii\db\ActiveRecord;
class Kontingen  extends ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kontingen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kontingen_id', 'kontingen_nama', 'kontingen_official', 'kontingen_cp', 'username', 'password'], 'required'],
            [['username'], 'email'],
            [['kontingen_id'], 'string', 'max' => 11],
            [['kontingen_nama', 'kontingen_official', 'password', 'authKey', 'accessToken'], 'string', 'max' => 100],
            [['kontingen_cp'], 'string', 'max' => 13],
            [['username'], 'string', 'max' => 50],
            [['kontingen_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kontingen_id' => 'Kontingen ID',
            'kontingen_nama' => 'Nama Kontingen',
            'kontingen_official' => 'Nama Official',
            'kontingen_cp' => 'Kontak',
            'username' => 'E-mail',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKtgAtlets()
    {
        return $this->hasMany(KtgAtlet::className(), ['kontingen_id' => 'kontingen_id']);
    }

    public function getLast() //untuk mengambil data terakhir dr database
    {
        $query = (new \yii\db\Query())
        ->select('kontingen_id')
        ->from('kontingen')
        ->orderBy(['kontingen_id'=>SORT_DESC])
        ->limit(1)
        ->one();
        $id = $query['kontingen_id'];
        return $id;
    }

    public function autonumber($id_terakhir, $panjang_kode, $panjang_angka, $id_ktg)
    {
        //Menambah huruf
        $huruf = "KT";

        //mengambil tanggal sekarang
        $date = Yii::$app->formatter->asDate('now', 'yyMMdd');

        // mengambil nilai kode ex: KNS0015 hasil KNS
        //$kode = substr($id_terakhir, 0, $panjang_kode);

        // mengambil nilai angka
        // ex: KNS0015 hasilnya 0015
        $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);

        // menambahkan nilai angka dengan 1
        // kemudian memberikan string 0 agar panjang string angka menjadi 4
        // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
        // sehingga menjadi 0006
        if($id_ktg == $date){
            $angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
        } else {
            $angka_baru = "0"."0"."1";
    }
        // menggabungkan kode dengan nilang angka baru
        $id_baru = $huruf.$date.$angka_baru;

        return $id_baru;
    }

    public static function findIdentity($id)
    {
      //mencari user login berdasarkan IDnya dan hanya dicari 1.
      $user = Kontingen::findOne($id);
      if($user != null){
          return new static($user);
      }
      return null;
    }
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
      //mencari user login berdasarkan accessToken dan hanya dicari 1.
        $user = Kontingen::find()->where(['accessToken'=>$token])->one();
        if($user != null){
            return new static($user);
        }
        return null;
    }
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
      //mencari user login berdasarkan username dan hanya dicari 1.
        $user = Kontingen::find()->where(['username'=>$username])->one();
        if($user !==null){
            return new static($user);
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    /**
    * Generates password hash from password and sets it to the model
    *
    * @param string $password
    */
   public function setPassword($password)
   {
       $this->$password;//Security::generatePasswordHash($password);
   }

   /**
    * Generates "remember me" authentication key
    */
   public function generateAuthKey()
   {
       $this->auth_key = Security::generateRandomKey();
   }

   /**
    * Generates new password reset token
    */
   public function generatePasswordResetToken()
   {
       $this->password_reset_token = Security::generateRandomKey() . '_' . time();
   }

   /**
    * Removes password reset token
    */
   public function removePasswordResetToken()
   {
       $this->password_reset_token = null;
   }
}
