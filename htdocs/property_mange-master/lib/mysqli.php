<?php
class MySQLiDB
{
    protected $_link;

    public function __construct()
    {
        $config = parse_ini_file(dirname(dirname(__FILE__)) . "/lib/config.ini", true); //解析配置檔


        $this->_link = new mysqli($config["database"]["server"], $config["database"]["db_username"], $config["database"]["db_password"], $config["database"]["db"]);

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        $this->_link->query("SET NAMES utf8"); //使用 utf8 編碼
    }

    public function __destruct()
    {
        $this->_link->close(); //關閉資料庫連線
    }

    //***************************************************************[管理者]***************************************************************
    //登入管理者(查詢)
    public function login_admin($acc,$pass)
    {
        $sql = "SELECT * FROM `admin` WHERE `account`=? ";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('s', $acc);
        $stmt->bind_result($name,$account,$password,$mail,$cell);
        $stmt->execute();
        $data=[];
        while ($stmt->fetch()) {
            if($pass==$password)
            {
                $stmt->close();
                $data[]=array(
                  'name'=>$name,
                  'account'=>$account
                );
                return $data;
            }
        }
        $stmt->close();
        return 'failed';
    }

    //取得申請單
    public function get_apply_user()
    {
        $sql = "SELECT * FROM apply_user";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_result($admin_acc,$user_id,$user_name,$user_pass,$user_mail,$user_cell);
        $stmt->execute();
        $data=[];
        while ($stmt->fetch()) {
            if($admin_acc=="")
            {
                $data[]=array(
                    'user_id'=>$user_id,
                    'user_name'=>$user_name,
                    'user_pass'=>$user_pass,
                    'user_mail'=>$user_mail,
                    'user_cell'=>$user_cell
                );
            }
        }
        $stmt->close();
        return $data;
    }

    //審核帳號申請(批准)
    public function accept_apply_user($admin_acc,$user_id)
    {
        $sql = "UPDATE apply_user SET admin_acc=? WHERE user_id=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('ss', $admin_acc,$user_id);
        if($stmt->execute()) {
            $stmt->close();
            $sql2="SELECT * FROM apply_user WHERE user_id=?";
            $stmt2=$this->_link->prepare($sql2);
            $stmt2->bind_param('s',$user_id);
            $stmt2->bind_result($admin_acc,$user_id,$user_name,$user_pass,$user_mail,$user_cell);
            $stmt2->execute();
            while ($stmt2->fetch()) {
                $stmt2->close();
                $sql3 = "INSERT INTO user (user_id,user_name,user_pass,user_mail,user_cell) VALUES (?,?,?,?,?)";
                $stmt3 = $this->_link->prepare($sql3);
                $stmt3->bind_param('sssss', $user_id,$user_name,$user_pass,$user_mail,$user_cell);
                if($stmt3->execute()) {
                    $stmt3->close();
                    return 1;
                }
            }
        }
        else {
            $stmt->close();
            return 0;
        }
    }

    //拒絕申請
    public function refuse_user($user_id)
    {
        $sql = "DELETE FROM apply_user WHERE user_id=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('s',$user_id);
        if($stmt->execute())
        {
            $stmt->close();
            return 1;
        }
        $stmt->close();
        return 0;

    }

    //***************************************************************[使用者]***************************************************************
    //註冊使用者(查詢、新增)
    public function create_user($user_id,$user_name,$user_pass,$user_mail,$user_cell)
    {
        $sql1="SELECT user_id FROM user WHERE user_id=?";
        $stmt1=$this->_link->prepare($sql1);
        $stmt1->bind_param('s',$user_id);
        $stmt1->execute();
        while ($stmt1->fetch()) {
            $stmt1->close();
            return 2;
        }

        $sql2="SELECT user_id FROM apply_user WHERE user_id=?";
        $stmt2=$this->_link->prepare($sql2);
        $stmt2->bind_param('s',$user_id);
        $stmt2->execute();
        while ($stmt2->fetch()) {
            $stmt2->close();
            return 3;
        }

        $sql = "INSERT INTO apply_user (user_id,user_name,user_pass,user_mail,user_cell) VALUES (?,?,?,?,?)";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('sssss', $user_id,$user_name,$user_pass,$user_mail,$user_cell);
        if($stmt->execute()) {
            $stmt->close();
            return 1;
        }
        else {
        $stmt->close();
        return 0;
        }
    }

    //登入使用者
    public function login_user($acc,$pass)
    {
        $sql = "SELECT * FROM `user` WHERE `user_id`=? ";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('s', $acc);
        $stmt->bind_result($user_id,$user_name,$user_pass,$user_mail,$user_cell);
        $stmt->execute();
        $data=[];
        while ($stmt->fetch()) {
            if($user_pass==$pass)
            {
                $stmt->close();
                $data[]=array(
                    'user_id'=>$user_id,
                    'user_name'=>$user_name,
                    'user_pass'=>$user_pass,
                    'user_mail'=>$user_mail,
                    'user_cell'=>$user_cell
                );
                return $data;
            }
        }
        $stmt->close();
        return 'failed';
    }

    //取得某ID設備
    public function get_id_device($id)
    {
        $sql = "SELECT * FROM device WHERE id=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('s',$id);
        $stmt->bind_result( $id,$acc,$type,$name,$buy_date,$year,$price,$place,$count,$photo,$photo2,$photo3,$guarantee,$operating,$teach);
        $stmt->execute();
        $data=[];
        while($stmt->fetch())
        {
            $data[]=array(
                'id'=>$id,
                'admin_acc'=>$acc,
                'name'=>$name,
                'type'=>$type,
                'buy_date'=>$buy_date,
                'year'=>$year,
                'price'=>$price,
                'place'=>$place,
                'count'=>$count,
                'photo'=>$photo,
                'photo2'=>$photo2,
                'photo3'=>$photo3,
                'guarantee'=>$guarantee,
                'operating'=>$operating,
                'teach'=>$teach
            );
        }
        $stmt->close();
        return $data;
    }

    //新增借用單
    public function add_apply($id,$user_id,$count,$fd,$sd)
    {
        $today = getdate();
        date("Y/m/d H:i");
        $y=$today["year"];
        $m=$today["mon"];
        $d=$today["mday"];
        $n=$m.'/'.$d.'/'.$y;

        $data=$this->get_id_device($id);
        if($data[0]['count']>0) {
            $sql3 = "INSERT INTO apply_device (device_id,user_id,count,fd,sd,n) VALUES (?,?,?,?,?,?)";
            $stmt3 = $this->_link->prepare($sql3);
            $stmt3->bind_param('ssssss',$id,$user_id,$count,$fd,$sd,$n);
            if ($stmt3->execute()) {
                $stmt3->close();
                return 1;
            } else {
                $stmt3->close();
                return 0;
            }
        }
        else
            return 2;
    }

    //編輯借用單
    public function edit_apply($id,$id1,$count,$fd,$sd)
    {
        $data=$this->get_id_device($id1);
        if($data[0]['count']>0) {
            $sql3 = "UPDATE apply_device SET count=?,fd=?,sd=? WHERE id=?";
            $stmt3 = $this->_link->prepare($sql3);
            $stmt3->bind_param('ssss',$count,$fd,$sd,$id);
            if ($stmt3->execute()) {
                $stmt3->close();
                return 1;
            } else {
                $stmt3->close();
                return 0;
            }
        }
        else
            return 2;
    }

    //取得歷史紀錄
    public function get_history($id)
    {
        $sql = "SELECT * FROM history WHERE user_id=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('s',$id);
        $stmt->bind_result($id1,$device_id,$user_id,$count,$fd,$sd,$n);
        $stmt->execute();
        $data=[];
        while($stmt->fetch())
        {
            $data[]=array(
                'id'=>$id1,
                'device_id'=>$device_id,
                'user_id'=>$user_id,
                'count'=>$count,
                'fd'=>$fd,
                'sd'=>$sd,
                'n'=>$n
            );
        }
        return $data;
    }

    //***************************************************************[系統管理員]***************************************************************
    //登入系統管理者
    public function login_root($acc,$pass)
    {
        $sql = "SELECT * FROM root";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_result($account,$password);
        $stmt->execute();
        $data=[];
        while ($stmt->fetch()) {
            if($acc==$account && $pass==$password)
            {
                $stmt->close();
                return 1;
            }
        }
        $stmt->close();
        return 0;
    }

    //root修改設定
    public function root_setting($marquee_text,$precautions)
    {
        $sql = "UPDATE root_setting SET marquee_text=?,precautions=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('ss', $marquee_text,$precautions);
        if($stmt->execute()) {
            $stmt->close();
            return 1;
        }
        $stmt->close();
        return 0;
    }

    //取得root設定
    public function get_root_setting()
    {
        $sql = "SELECT * FROM root_setting";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_result( $marquee_text,$precautions);
        $stmt->execute();
        $data=[];
        while($stmt->fetch())
        {
            $data[]=array(
                'marquee_text'=>$marquee_text,
                'precautions'=>$precautions
            );
        }
        $stmt->close();
        return $data;
    }

    //新增管理者
    public function add_admin($acc,$pass,$name,$mail,$cell)
    {
        $sql2="SELECT * FROM admin WHERE account=?";
        $stmt2=$this->_link->prepare($sql2);
        $stmt2->bind_param('s',$acc);
        $stmt2->execute();
        while ($stmt2->fetch()) {
            $stmt2->close();
            return 2;
        }

        $sql3 = "INSERT INTO admin (name,account,password,mail,cell) VALUES (?,?,?,?,?)";
        $stmt3 = $this->_link->prepare($sql3);
        $stmt3->bind_param('sssss',$name,$acc,$pass,$mail,$cell);
        if($stmt3->execute()) {
            $stmt3->close();
            return 1;
        }
        else
        {
            $stmt3->close();
            return 0;
        }
    }

    //取得管理者
    public function get_admin()
    {
        $sql = "SELECT * FROM admin";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_result( $name,$account,$password,$mail,$cell);
        $stmt->execute();
        $data=[];
        while($stmt->fetch())
        {
            $data[]=array(
                'name'=>$name,
                'password'=>$password,
                'account'=>$account,
                'mail'=>$mail,
                'cell'=>$cell
            );
        }
        $stmt->close();
        return $data;
    }

    //修改管理者
    public function edit_admin($acc,$pass,$name,$mail,$cell)
    {
        $sql = "UPDATE admin SET name=?,password=?,mail=?,cell=? WHERE account=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('sssss', $name,$pass,$mail,$cell,$acc);
        if($stmt->execute()) {
            $stmt->close();
            return 1;
        }
        $stmt->close();
        return 0;
    }

    //刪除管理者
    public function delete_admin($account)
    {
        $sql = "DELETE FROM admin WHERE account=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('s',$account);
        if($stmt->execute())
        {
            $stmt->close();
            return 1;
        }
        $stmt->close();
        return 0;
    }

    //取得使用者
    public function get_user()
    {
        $sql = "SELECT * FROM user";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_result($user_id,$user_name,$user_pass,$user_mail,$user_cell);
        $stmt->execute();
        $data=[];
        while ($stmt->fetch()) {
            $data[]=array(
                'user_id'=>$user_id,
                'user_name'=>$user_name,
                'user_pass'=>$user_pass,
                'user_mail'=>$user_mail,
                'user_cell'=>$user_cell
            );
        }
        $stmt->close();
        return $data;
    }

    //新增使用者
    public function add_user($acc,$pass,$name,$mail,$cell)
    {
        $sql2="SELECT * FROM user WHERE user_id=?";
        $stmt2=$this->_link->prepare($sql2);
        $stmt2->bind_param('s',$acc);
        $stmt2->execute();
        while ($stmt2->fetch()) {
            $stmt2->close();
            return 2;
        }

        $sql3 = "INSERT INTO user (user_id,user_name,user_pass,user_mail,user_cell) VALUES (?,?,?,?,?)";
        $stmt3 = $this->_link->prepare($sql3);
        $stmt3->bind_param('sssss',$acc,$name,$pass,$mail,$cell);
        if($stmt3->execute()) {
            $stmt3->close();
            return 1;
        }
        else
        {
            $stmt3->close();
            return 0;
        }
    }

    //修改使用者
    public function edit_user($acc,$pass,$name,$mail,$cell)
    {
        $sql = "UPDATE user SET user_name=?,user_pass=?,user_mail=?,user_cell=? WHERE user_id=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('sssss', $name,$pass,$mail,$cell,$acc);
        if($stmt->execute()) {
            $stmt->close();
            return 1;
        }
        $stmt->close();
        return 0;
    }

    //刪除使用者
    public function delete_user($user_id)
    {
        $sql = "DELETE FROM user WHERE user_id=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('s',$user_id);
        if($stmt->execute())
        {
            $stmt->close();
            return 1;
        }
        $stmt->close();
        return 0;
    }

    //取得設備類型
    public function get_devicetype()
    {
        $sql = "SELECT * FROM device_type";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_result( $name);
        $stmt->execute();
        $data=[];
        while($stmt->fetch())
        {
            $data[]=array(
                'name'=>$name
            );
        }
        $stmt->close();
        return $data;
    }

    //新增設備類型
    public function add_devicetype($name)
    {
        $sql2="SELECT * FROM device_type WHERE name=?";
        $stmt2=$this->_link->prepare($sql2);
        $stmt2->bind_param('s',$name);
        $stmt2->execute();
        while ($stmt2->fetch()) {
            $stmt2->close();
            return 2;
        }

        $sql3 = "INSERT INTO device_type (name) VALUES (?)";
        $stmt3 = $this->_link->prepare($sql3);
        $stmt3->bind_param('s',$name);
        if($stmt3->execute()) {
            $stmt3->close();
            return 1;
        }
        else
        {
            $stmt3->close();
            return 0;
        }
    }

    //刪除設備類型
    public function delete_devicetype($name)
    {
        $sql = "DELETE FROM device_type WHERE name=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('s',$name);
        if($stmt->execute())
        {
            $stmt->close();
            return 1;
        }
        $stmt->close();
        return 0;
    }

    //新增設備
    public function add_device($acc,$type,$name,$buy_date,$year,$price,$place,$count,$photo,$photo2,$photo3,$guarantee,$operating,$teach)
    {
        $sql3 = "INSERT INTO device (admin_acc,type,name,buy_date,year,price,place,count,photo,photo2,photo3,guarantee,operating,teach) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt3 = $this->_link->prepare($sql3);
        $stmt3->bind_param('sssssssissssss',$acc,$type,$name,$buy_date,$year,$price,$place,$count,$photo,$photo2,$photo3,$guarantee,$operating,$teach);
        if($stmt3->execute()) {
            $stmt3->close();
            return 1;
        }
        else
        {
            $stmt3->close();
            return 0;
        }
    }

    //取得管理者設備
    public function get_device($admin_acc)
    {
        $sql = "SELECT * FROM device WHERE admin_acc=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('s',$admin_acc);
        $stmt->bind_result( $id,$acc,$type,$name,$buy_date,$year,$price,$place,$count,$photo,$photo2,$photo3,$guarantee,$operating,$teach);
        $stmt->execute();
        $data=[];
        while($stmt->fetch())
        {
            $data[]=array(
                'id'=>$id,
                'admin_acc'=>$acc,
                'name'=>$name,
                'type'=>$type,
                'buy_date'=>$buy_date,
                'year'=>$year,
                'price'=>$price,
                'place'=>$place,
                'count'=>$count,
                'photo'=>$photo,
                'photo2'=>$photo2,
                'photo3'=>$photo3,
                'guarantee'=>$guarantee,
                'operating'=>$operating,
                'teach'=>$teach
            );
        }
        $stmt->close();
        return $data;
    }

    //取得所有設備
    public function get_alldevice()
    {
        $sql = "SELECT * FROM device";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_result( $id,$acc,$type,$name,$buy_date,$year,$price,$place,$count,$photo,$photo2,$photo3,$guarantee,$operating,$teach);
        $stmt->execute();
        $data=[];
        while($stmt->fetch())
        {
            $data[]=array(
                'id'=>$id,
                'acc'=>$acc,
                'name'=>$name,
                'type'=>$type,
                'buy_date'=>$buy_date,
                'year'=>$year,
                'price'=>$price,
                'place'=>$place,
                'count'=>$count,
                'photo'=>$photo,
                'photo2'=>$photo2,
                'photo3'=>$photo3,
                'guarantee'=>$guarantee,
                'operating'=>$operating,
                'teach'=>$teach
            );
        }
        $stmt->close();
        return $data;
    }

    //取得特定設備
    public function get_anydevice($t,$n)
    {
        if($t=='')
        {
            $sql = "SELECT * FROM device WHERE name=?";
            $stmt = $this->_link->prepare($sql);
            $stmt->bind_param('s',$n);
        }
       else if($n=='')
       {
           $sql = "SELECT * FROM device WHERE type=?";
           $stmt = $this->_link->prepare($sql);
           $stmt->bind_param('s',$t);
       }
       else if($t=='' && $n=='')
       {
           $sql = "SELECT * FROM device ";
           $stmt = $this->_link->prepare($sql);
       }
       else if($t!='' && $n!='')
       {
           $sql = "SELECT * FROM device WHERE type=? and name=?";
           $stmt = $this->_link->prepare($sql);
           $stmt->bind_param('ss',$t,$n);
       }
        $stmt->bind_result( $id,$acc,$type,$name,$buy_date,$year,$price,$place,$count,$photo,$photo2,$photo3,$guarantee,$operating,$teach);
        $stmt->execute();
        $data=[];
        while($stmt->fetch())
        {
            $data[]=array(
                'id'=>$id,
                'acc'=>$acc,
                'name'=>$name,
                'type'=>$type,
                'buy_date'=>$buy_date,
                'year'=>$year,
                'price'=>$price,
                'place'=>$place,
                'count'=>$count,
                'photo'=>$photo,
                'photo2'=>$photo2,
                'photo3'=>$photo3,
                'guarantee'=>$guarantee,
                'operating'=>$operating,
                'teach'=>$teach
            );
        }
        $stmt->close();
        return $data;
    }

    //取得申請單設備
    public function get_apply_device()
    {
        $sql = "SELECT * FROM apply_device";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_result($id,$device_id,$user_id,$count,$fd,$sd,$n);
        $stmt->execute();
        $data=[];
        while($stmt->fetch())
        {
            $data[]=array(
                'id'=>$id,
                'device_id'=>$device_id,
                'user_id'=>$user_id,
                'count'=>$count,
                'fd'=>$fd,
                'sd'=>$sd,
                'n'=>$n
            );
        }
        $stmt->close();
        return $data;
    }

    //刪除某人設備
    public function delete_device($id)
    {
        $today = getdate();
        date("Y/m/d H:i");
        $y=$today["year"];
        $m=$today["mon"];
        $d=$today["mday"];
        $n=$m.'/'.$d.'/'.$y;

        $sql = "SELECT * FROM device WHERE id=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('s',$id);
        $stmt->bind_result( $id1,$acc,$type,$name,$buy_date,$year,$price,$place,$count,$photo,$photo2,$photo3,$guarantee,$operating,$teach);
        $stmt->execute();
        while($stmt->fetch())
        {
            $stmt->close();
            $sql = "DELETE FROM device WHERE id=?";
            $stmt = $this->_link->prepare($sql);
            $stmt->bind_param('s',$id);
            if($stmt->execute())
            {
                $stmt->close();
                $sql3 = "INSERT INTO delete_device (admin_acc,type,name,n) VALUES (?,?,?,?)";
                $stmt3 = $this->_link->prepare($sql3);
                $stmt3->bind_param('ssss',$acc,$type,$name,$n);
                if($stmt3->execute()) {
                    $stmt3->close();
                    return 1;
                }
            }
        }
        return 0;
    }

    //拒絕借用單
    public function refuse_apply($id)
    {
        $sql = "DELETE FROM apply_device WHERE id=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('s',$id);
        if($stmt->execute())
        {
            $stmt->close();
            return 1;
        }
        $stmt->close();
        return 0;
    }

    //同意借用單
    public function accept_apply($id)
    {
        $sql = "SELECT * FROM apply_device WHERE id=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('s',$id);
        $stmt->bind_result($id1,$device_id,$user_id,$count,$fd,$sd,$n);
        $stmt->execute();
        $data=[];
        while($stmt->fetch())
        {
            $data[]=array(
                'device_id'=>$device_id,
                'user_id'=>$user_id,
                'count'=>$count,
                'fd'=>$fd,
                'sd'=>$sd,
                'n'=>$n
            );
        }
        $stmt->close();

        $sql2 = "SELECT * FROM device WHERE id=?";
        $stmt2 = $this->_link->prepare($sql2);
        $stmt2->bind_param('s',$data[0]['device_id']);
        $stmt2->bind_result( $id1,$acc,$type,$name,$buy_date,$year,$price,$place,$count_o,$photo,$photo2,$photo3,$guarantee,$operating,$teach);
        $stmt2->execute();
        while($stmt2->fetch()) {
            $c=$count_o;
        }
        $stmt2->close();

        if($c>0 && $count<=$c) {
            $sql3 = "INSERT INTO use_device (device_id,user_id,count,fd,sd,n) VALUES (?,?,?,?,?,?)";
            $stmt3 = $this->_link->prepare($sql3);
            $stmt3->bind_param('ssssss', $data[0]['device_id'], $data[0]['user_id'], $data[0]['count'], $data[0]['fd'], $data[0]['sd'], $data[0]['n']);
            if ($stmt3->execute()) {
                $stmt3->close();

                $sql4 = "UPDATE device SET count=? WHERE id=?";
                $stmt4 = $this->_link->prepare($sql4);
                $c = $c - $count;
                $stmt4->bind_param('is', $c, $device_id);
                $stmt4->execute();
                $stmt4->close();

                $sql5 = "DELETE FROM apply_device WHERE id=?";
                $stmt5 = $this->_link->prepare($sql5);
                $stmt5->bind_param('s', $id);
                if ($stmt5->execute()) {
                    $stmt5->close();
                }
                return 1;
            }
        }
        else
            return 2;
        return 0;
    }

    //取得使用中設備
    public function get_use_device()
    {
        $sql = "SELECT * FROM use_device";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_result($id,$device_id,$user_id,$count,$fd,$sd,$n);
        $stmt->execute();
        $data=[];
        while($stmt->fetch())
        {
            $data[]=array(
                'id'=>$id,
                'device_id'=>$device_id,
                'user_id'=>$user_id,
                'count'=>$count,
                'fd'=>$fd,
                'sd'=>$sd,
                'n'=>$n
            );
        }
        $stmt->close();
        return $data;
    }

    //歸還設備
    public function add_history($admin_acc,$id)
    {
        $sql = "SELECT * FROM use_device WHERE id=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('s',$id);
        $stmt->bind_result($id1,$device_id,$user_id,$count,$fd,$sd,$n);
        $stmt->execute();
        while($stmt->fetch())
        {
            $stmt->close();

            $sql = "SELECT * FROM device WHERE admin_acc=?";
            $stmt = $this->_link->prepare($sql);
            $stmt->bind_param('s',$admin_acc);
            $stmt->bind_result( $id2,$acc,$type,$name,$buy_date,$year,$price,$place,$count2,$photo,$photo2,$photo3,$guarantee,$operating,$teach);
            $stmt->execute();
            while($stmt->fetch())
            {
                $cou=$count2;
                $stmt->close();
            }

            $sql4 = "UPDATE device SET count=? WHERE id=?";
            $stmt4 = $this->_link->prepare($sql4);
            $cc=$cou+$count;
            $stmt4->bind_param('is', $cc, $id);
            $stmt4->execute();
            $stmt4->close();

            $sql3 = "INSERT INTO history (device_id,user_id,count,fd,sd,n) VALUES (?,?,?,?,?,?)";
            $stmt3 = $this->_link->prepare($sql3);
            $stmt3->bind_param('ssssss',$device_id,$user_id,$count,$fd,$sd,$n );
            if($stmt3->execute()) {
                $stmt3->close();
                $sql = "DELETE FROM use_device WHERE id=?";
                $stmt = $this->_link->prepare($sql);
                $stmt->bind_param('s',$id);
                if($stmt->execute()){
                    $stmt->close();
                    return 1;
                }
            }
        }
        return 0;
    }

    //取得刪除設備
    public function get_delete_device($id)
    {
        $sql = "SELECT * FROM delete_device WHERE admin_acc=?";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_param('s',$id);
        $stmt->bind_result( $id1,$acc,$type,$name,$n);
        $stmt->execute();
        $data=[];
        while($stmt->fetch())
        {
            $data[]=array(
                'id'=>$id1,
                'admin_acc'=>$acc,
                'name'=>$name,
                'type'=>$type,
                'n'=>$n
            );
        }
        $stmt->close();
        return $data;
    }

    //取得所有歷史紀錄
    public function get_allhistory()
    {
        $sql = "SELECT * FROM history";
        $stmt = $this->_link->prepare($sql);
        $stmt->bind_result($id1,$device_id,$user_id,$count,$fd,$sd,$n);
        $stmt->execute();
        $data=[];
        while($stmt->fetch())
        {
            $data[]=array(
                'id'=>$id1,
                'device_id'=>$device_id,
                'user_id'=>$user_id,
                'count'=>$count,
                'fd'=>$fd,
                'sd'=>$sd,
                'n'=>$n
            );
        }
        return $data;
    }
}