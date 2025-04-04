<?php

class Users extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            // fullname, password, email, dan role_id wajib diisi
            array('fullname, password, email, role_id', 'required'),
            array('fullname', 'length', 'max' => 50),
            array('password', 'length', 'max' => 255),
            array('email', 'length', 'max' => 100),
            array('email', 'unique'),
            array('is_active', 'boolean'),
            array('role_id', 'numerical', 'integerOnly' => true),
            // Field photo dianggap aman (tidak wajib)
            array('photo', 'safe'),
            // Atribut tambahan untuk keperluan pencarian
            array('id, fullname, email, role_id, photo, created_at, updated_at', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
            // Relasi ke model Roles melalui kolom role_id
            'role' => array(self::BELONGS_TO, 'Roles', 'role_id'),
            // Relasi ke model Doctors jika ada (misal, user yang merupakan dokter)
            'doctor' => array(self::HAS_ONE, 'Doctors', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'         => 'ID',
            'fullname'   => 'Nama Lengkap',
            'password'   => 'Password',
            'email'      => 'Email',
            'role_id'    => 'Role',
            'photo'      => 'Photo',
            'created_at' => 'Dibuat',
            'updated_at' => 'Diupdate',
            'is_active'  => 'Aktif',
        );
    }
}
