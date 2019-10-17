<?php
namespace Admin\Model;
use Think\Model;
use Think\Upload;

final class UploadsModel extends Model
{
  protected $tableName = 'user';
  protected $fields = array(
    'id',
    'name',
    'avatar'
  );
  // 使用模型钩子函数处理图片上传
  public function _before_insert(&$data, $options)
  {
    parent::_before_insert($data, $options); // TODO: Change the autogenerated stub
    // 实现图片上传功能
    // 实例化图片上传对象
    // 关于图片上传的根目录需要手动创建，TP不会自动创建上传的和根目录
    $config = array(
      'exts'          =>array('jpg','gif'), // 配置文件上传的文件后缀名
    );
    $upload = new Upload($config);
    $info = $upload->uploadOne($_FILES['file']);
    if (!$info) {
      $this->error = $upload->getError();
      return false;
    }
    $data['avatar'] = 'Uploads/'.$info['savepath'].$info['savename'];
    dump($data);
  }
}
