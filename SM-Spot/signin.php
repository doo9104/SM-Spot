<?php

include 'db.php';

session_start(); //���ǽ���


//index.php���� ���� id�� pw ����������
$id = $_POST[user_id];

$pw = $_POST[user_pw]; //md5���ѻ���


//user���̺��� �Է¹��� ���̵�,����� ��ġ�ϴ� ������ �˻�
$sql = "SELECT * FROM user WHERE user_id = '{$id}' and user_pw = md5('{$pw}')";
// $sql = "SELECT * FROM user WHERE user_id = '{$id}' and user_pw = md5('{$pw}')";

$resource = mysql_query( $sql ); //��������

$num = mysql_num_rows( $resource ); // num_rows ������ ���� ����



$row = mysql_fetch_row( $resource );


if( $num > 0 ) {

  // ������ ������ ���

  // �ߺ� üũ

  $sql = "SELECT * FROM session WHERE user_id = '{$id}'";

  $resource = mysql_query( $sql );

  $num = mysql_num_rows( $resource );

  if( $num > 0 ) {

    // �̹� �α����� ������� ���

    echo "<script> alert('�ش� ���̵�� �̹� �α����� �����Դϴ�'); </script>";



  } else {

    // ���� �α������� ���� ���

    // 1. ���� ���̺� ����� ������ �Է�(insert)

    $sess_id = session_id();

    $sql = "INSERT INTO session VALUE( $row[no], '$id', '$sess_id' )";

    $ret = mysql_query( $sql );



    // 2. ���� ������ ���̵� �߰�

    $_SESSION[user_id] = $id;

    $_SESSION[is_login] = 1;



    // 3. �α��� ȯ�� �޽��� ���

    echo "<script> alert('�α��� �Ǿ����ϴ�'); </script>";
	 echo "<meta http-equiv='refresh' content=\"0;url=http://localhost/index.php\">";


  }



} else {

  // ������ ������ ���

  echo "<script> alert('���̵� �Ǵ� �н����尡 �ùٸ��� �ʽ��ϴ�!'); </script>";
  echo "<script> window.history.back(); </script>";


}



?>



<!--<meta http-equiv='refresh' content="0;url='http://localhost/index.php'">-->