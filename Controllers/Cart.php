<?php

namespace Controllers;

use Service\Order;
use Classes\ControllerBase;

class ControllerCart extends ControllerBase
{
    private $sendto   = "mr.mmd13@gmail.com, sbak4857@gmail.com"; 
    private $usermail = 'singlepage@bbstore.kl.com.ua';
    private $subject  = "Новое сообщение";

    public function index(){

    }

    public function checkout()
    {
        $format = '<tr><td class="text-left">%s</td><td class="text-right">%s</td><td class="text-right">%s</td></tr>';

        $responce = "Basket is empty";
        if ($_SESSION['bbstore_order'])
        {
            $responce = "";
            foreach($_SESSION['bbstore_order'] as $key => $order)
            {
                $o = unserialize($order);
                $name  = $o->name;
                $price = $o->price;
                $qty   = 1;
                $responce .= sprintf($format, $name, $price, $qty);
            }
            unset($_SESSION['bbstore_order']);
        }
        $msg  = "<html><body style='font-family:Arial,sans-serif;'>";
        $msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Cообщение с сайта".$_POST['name']."</h2>\r\n";
        $msg .= "<table><tr><th>Name</th><th>price</th><th>qty</th></tr>".$responce."</table>";
        $msg .= "<h4>Name:  ".$_POST['name']."</h4>";
        $msg .= "<h4>Phone:  ".$_POST['phone']."</h4>";
        $msg .= "</body></html>";

        echo $this->mail($msg);
    }    
    public function consult()
    {
        $msg  = "<html><body style='font-family:Arial,sans-serif;'>";
        $msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Заявка на консультацію".$_POST['phone']."</h2>\r\n";
        $msg .= "<h4>Phone:  ".$_POST['phone']."</h4>";
        $msg .= "</body></html>";

        echo $this->mail($msg);
    }    
    public function countItem()
    {
        if (isset($_SESSION['bbstore_order']))
            echo count($_SESSION['bbstore_order']);
        else
            echo 0;
    }
    public function getBack()
    {
        $format = '<tr>
            <td class="text-left">%s</td>
            <td class="text-right">%s</td>
            <td class="text-right">%s</td>
            <td class="text-center">
                <button type="button" onclick="cart.remove(%d);" title="Удалить" class="btn btn-danger btn-xs">
                    <i class="fa fa-times"></i>
                </button>
            </td>
        </tr>';

        $responce = "";
        if ($_SESSION['bbstore_order'])
        {
            foreach($_SESSION['bbstore_order'] as $key => $order)
            {
                $o = unserialize($order);
                $name  = $o->name;
                $price = $o->price;
                $qty   = 1;
                $responce .= sprintf($format, $name, $price, $qty, $key);
            }
        } else {
            $responce = "Ваш кошик пустий";
        }
        echo $responce;
    }   
    public function removeItem()
    {
        if ($_SESSION['bbstore_order'])
        {
            unset($_SESSION['bbstore_order'][$_GET['id']]);
            echo count($_SESSION['bbstore_order']);
        }
    } 
    public function addItem()
    {
        $order = new Order(
            $_GET['name'],
            $_GET['price'],
            $_GET['qty']
        );
        if (!$_SESSION['bbstore_order'])
            $_SESSION['bbstore_order']  = [];

        array_push($_SESSION['bbstore_order'],  serialize($order));
        
        echo count($_SESSION['bbstore_order']);
    }
    private function mail($m)
    {
        $headers  = "From:".$this->usermail."\r\n";
        $headers .= "Reply-To:".$this->usermail. "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html;charset=utf-8 \r\n";

        if(mail($this->sendto, $this->subject, $m, $headers)) {
            return file_get_contents(site_path."views".DIRSEP."modal".DIRSEP."_thanks.php");
        } else {
            return file_get_contents(site_path."views".DIRSEP."modal".DIRSEP."_fail.php");
        }
    }   
}

?>