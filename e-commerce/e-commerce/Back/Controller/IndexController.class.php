<?php

namespace Back\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$array['nowtime'] = date("Y-m-d h:i:s");
			$array['localip']= get_client_ip();
			$array['servername']= $_SERVER['SERVER_NAME'];
			$array['versions']=phpversion();
			$array['mysqlversions'] = 5.6;
			$array['servicesoftware']= "phpstudy +nginx ";
			$this -> assign($array);

        
    	$this ->sessionUsername();
    	$this -> display();
    }


  	public function goodslist() {
    	$linkDB =M("indexshowgoods");
    
    	if(IS_POST) {
    		$sename= I("SEGoodsName");
    		$map['goodsname'] = array("like","%$sename%");
    		$count   = $linkDB -> where($map) -> count();
    		$this -> postpageshow($count,8,$map);
    		
    
    	}else{
    		$count   = $linkDB -> where(1) -> count();
    		$this -> postpageshow($count,8,"1");	
    	}

    	$this ->sessionUsername();
    	$this -> display();
    }
    public function deletedata() {
    	$linkDB =M("indexshowgoods");
    	if(I("get.id")) {
    		$deleteid = I("get.id");
    		$linkDB -> where("id = '$deleteid'") -> delete();
    		$this ->  success("删除成功","/admin.php/Index/goodslist");
    	}else{
    		$this -> error("非法操作",__CONTROLLER__/Index/goodslist);
    	}
    }
    public function postpageshow($count,$limitnumber,$map) {
    	$linkDB =M("indexshowgoods");
		$Page       = new \BootstarpPage\BootstarpStylePage($count,$limitnumber);// 
		   $Page->setConfig('header','<span class="hwh-page-info">共<em>%TOTAL_ROW%</em>条  <em>%NOW_PAGE%</em>/%TOTAL_PAGE%页</span>');
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $Page->setConfig('last','末页');
        $Page->setConfig('first','首页');
        $Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% ');
		$show       = $Page->show();// 
		$list = $linkDB ->where($map)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('list',$list);// 
			$this->assign('page',$show);
    }
    public function modeladdgoods() {
    	$linkDB =M("indexshowgoods");
    	if(IS_POST ){

    		$data['goodsname'] =  I("goodsname");

    	     $data['goodsprice'] = I("goodsprice");
    	    $priceflag = preg_match("/[0-9]{1,}/",$data['goodsprice']);
    	     $data['goodsweight'] = I("goodsweight");
    	     $weightflag =preg_match("/[0-9]{1,}/", $data['goodsweight']);
    	     $resultfiledata = $this -> uploadimg();
    	     if ($data["goodsname"] == "") {
    	     	
    	     		echo "<script>alert('商品名称不能为空');</script>";
    	     }else if($data['goodsprice']  ==  "") {

    	     	echo "<script>alert('商品价格不能为空');</script>";

    	     }else if($priceflag  == false) {

    	     	echo "<script>alert('商品价格只能整数和小数');</script>";
    	     }else if( $data['goodsweight']  == ""){

    	     	echo "<script>alert('商品重量不能为空');</script>";

    	     }else if( $weightflag== false) {

    	     	echo "<script>alert('商品重量只能整数和小数');</script>";
    	     }else {
    	     		if($resultfiledata){
    	    				$data['goodsurl'] = "/Back/Public/upload/".$resultfiledata['goodsfile']['savename'];
    	     				$linkDB -> add($data);
    	     				$this -> error("添加商品成功","/admin.php/Index/goodslist",1);
				
    	     		}else {

    	     			$this -> error("添加商品失败",__CONTROLLER__/modeladdgoods);
    	   		  }


    	     }
    	     
    	    
    	

    	}
    	  


    	$this ->sessionUsername();
    
    	$this -> display();
    }
     
     public function sessionUsername() {

     	if (I("get.adminexit") == "yes") {

    		session("adminusername",null);
    		
    	}

    	if(session("?adminusername")) {

    		$this -> assign("adminusername",session("adminusername"));
    	}else{

    		$this -> redirect("Adminsignin/adminlogin");
   	 }
     	$this -> assign("adminusername",session("adminusername"));
     }


     public function modifygoods() {
     		$linkDB = M("indexshowgoods");
     		if(IS_GET) {
     			if(isset($_GET['id'])) {
     				$modify_id = I("id");
     				$result = $linkDB -> where("id = $modify_id") -> find();
     				$array['goodsnameoldvalue'] = $result['goodsname'];
     				$array['goodspriceoldvalue'] = $result['goodsprice'];
     				$array['goodsweightoldvalue'] = $result['goodsweight'];
     				$array['goodsoldurl'] =$result['goodsurl'];
     				$array['goodsid'] = $result['id'];
     				$this -> assign($array);
     				
     			}

     	}

     		if(isset($_POST['modifygoods'])) {
     			$data['id']=I("goodsid");
    			$data['goodsname'] =  I("goodsname");
    		   	 $data['goodsprice'] = (int)I("goodsprice");
    		   	   $priceflag = preg_match("/[0-9]{1,}/",$data['goodsprice']);
    		     $data['goodsweight'] = round(I("goodsweight"),2);
    		     $weightflag =preg_match("/[0-9]{1,}/", $data['goodsweight']);
    		 
    		        $ResultModifyUpload = $this ->uploadimg();
    		     if ($data["goodsname"] == "") {
    	     	
    	     		echo "<script>alert('商品名称不能为空');</script>";
    	    	 }else if($data['goodsprice']  ==  "") {

    	     		echo "<script>alert('商品价格不能为空');</script>";

    	    	 }else if($priceflag  == false) {

    	     	echo "<script>alert('商品价格只能整数和小数');</script>";
    	    	 }else if( $data['goodsweight']  == ""){

    	     	echo "<script>alert('商品重量不能为空');</script>";

    	    	 }else if( $weightflag== false) {

    	     	echo "<script>alert('商品重量只能整数和小数');</script>";
    	   	  }else {
    	     	
    		     if( $ResultModifyUpload){
    		     	  $data['goodsurl'] = "/Back/Public/upload/".$ResultModifyUpload['goodsfile']['savename'];
    		     	 
     				$echo = $linkDB -> where("id = $data[id]") -> save($data);
     				$resultid = $linkDB -> where("goodsname = '$data[goodsname]'") -> find();	
     				$this -> error("修改成功","/admin.php/Index/goodslist");
     				
    		     }else{

    		     	$this -> error("修改图片不能为空",__CONTROLLER__/modifygoods/id/$resultid['id'],1);
    		     }

    	     }
    		   
     }
     	
     	   	$this ->sessionUsername();
     		$this -> display();
     }



     public function uploadimg() {


   		$Upload = new \Think\Upload();

        $Upload ->rootPath = "./Back/Public/upload/";
        $Upload ->autoSub   =   false;
        $datafile = $Upload ->upload();


        return $datafile;
     }
}