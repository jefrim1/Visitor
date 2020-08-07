<?php
 abstract class Visitor{
  abstract function Akun($email);
  abstract function Password($pass);
 }

 abstract class Akun{
  public abstract function Display($visitor);
 }

 class email {
  function __construct($name){
   $this->name = $name;
  }
  
  public $name;
  
  function Display($visitor)
  {
   $visitor->Akun($this);
  }
 }

 class pass{
  function __construct($name){
   $this->name = $name;
  }
  
  public $name;
  
  function Display($visitor)
  {
   $visitor->Password($this);
  }
 }

 class VisitorA{
  function __construct($name){
   $this->name = $name;
  }
  
  private $name;
  
  function Akun($email)
  {
   echo($email->name." adalah ".$this->name.'<br/>');
  }
  
  function Password($pass)
  {
   echo($pass->name." adalah ".$this->name.'<br/>');
  }
 }

 class Contorller{
  private $list_Akun = Array();
  function Add($Akun){
   $this->list_Akun[] = $Akun;
  }
  function Remove($index){
   unset($this->list_Akun[$index]);
  }
  function Display($visitor){
   foreach($this->list_Akun as $list){
    $list->Display($visitor);
   }
  }
 }
 
 $controller = new Contorller();
 $controller->Add(new email("Emailnya "));
 $controller->Add(new pass("Passwordnya"));
  
 $controller->Display(new VisitorA("admin@gmail.com"));
 $controller->Display(new VisitorA("admin123"));
?>  
