<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){	
  		$this -> sessionuser();

  		$linkDB= M("indexshowgoods");

  		$goodsshow= $linkDB -> limit(5) ->select();
        if($_GET['exit'] =="yes") {

            session("user",null);
            if(!session("?user")){
               $this -> error("请登录","/index.php/Home/Signinout/login");
            }
        }
 		$this -> assign("indexgoods",$goodsshow);

  		$this -> display();
  		
    }
    public function shopcart() {//购物车
    	if(!session("?user")) {

    		$this -> error("请登录","/index.php/Home/Signinout/login");

    	}else {

    	$linkcart =M("shopcart");

    	$linkuser =M("shopgoodsuser");

    	$user_session= session("user");

    	$result = $linkuser -> where("shopusername = '$user_session'") -> find();

    	$shopcartlist = $linkcart ->join("indexshowgoods on  shopcart.goodsname = indexshowgoods.goodsname  and pid=$result[id]") ->field("shopcart.id as scid,indexshowgoods.id as showgoodid,shopcart.goodsprice,shopcart.goodstotal,shopcart.goodsnumber,shopcart.goodsurl,shopcart.goodsname") ->select();
        
    	$total = $linkcart ->where("pid = $result[id]") -> sum("goodstotal");

    	if($shopcartlist) {

    		$this -> assign("sumtotal",$total);

    		$this -> assign("shoplist",$shopcartlist);

            $this -> assign("shopurl",'/index.php/Home/Index/longGoodsShow/goodsid/');

    	}else{
    		$this -> assign("shoplist","none");

    	}
    	
    	if($_POST['reducenum'] == "reduce") {//购物车商品数量-1
				$reduceid= I("reduceid");
				
    		$linkcart -> where("id = $reduceid") ->setDec("goodsnumber",1);

           $getgoodstotal = $linkcart -> where("id = $reduceid") -> find();

            $linkcart  -> where("id = $reduceid") -> setDec("goodstotal",$getgoodstotal['goodsprice']);

    		$shopcartResult = $linkcart -> where("id = $reduceid") -> find();
            $datashow['cartdata']=$shopcartResult;
           
           $datashow['goodssum'] = $linkcart ->where("pid = $result[id]") ->sum("goodstotal");
            
    		$this -> ajaxReturn($datashow);

    		

    	}
    	if( I("addnumid") ){//购物车商品数量增加+1
            $addnumid =I("addnumid"); 
            $linkcart -> where("id = $addnumid") ->setInc("goodsnumber",1);

           $getgoodstotal = $linkcart -> where("id = $addnumid") -> find();

            $linkcart  -> where("id = $addnumid") -> setInc("goodstotal",$getgoodstotal['goodsprice']);

            $shopcartResult = $linkcart -> where("id = $addnumid") -> find();
            $datashow['cartdata']=$shopcartResult;
           
           $datashow['goodssum'] = $linkcart ->where("pid = $result[id]") ->sum("goodstotal");
            
            $this -> ajaxReturn($datashow);

    	
    }

       if(I("removeid")) {
         $removeid =I("removeid");
        $deletegoodscartflag =  $linkcart -> where("id = $removeid") -> delete();
        $pidresult= $linkcart -> field("pid") -> find();
     
        if($pidresult) {
            $selecttotal = $linkcart -> where("pid = $pidresult[pid]") -> sum("goodstotal");
            //dump($selecttotal);
            if($deletegoodscartflag) {
                $deletedata['status'] = "1";
                $deletedata['findtotal'] =$selecttotal; 
                $this -> ajaxReturn($deletedata);
            }else{
                $deletedata['status'] = "0";
                $this -> ajaxReturn($deletedata);
            }
        }else{
            $deletedata['status'] = "2";
             $this -> ajaxReturn($deletedata);
        }
      
       }
    	
  		$this -> sessionuser();
  		
    	$this -> display();
    }
}    
    public function longGoodsShow() {
    	$linkDB = M("indexshowgoods");

    	$s_user = "";

		if(session("?user")) {

			$linkcart =M("shopcart");

			$linkuser =M("shopgoodsuser");

			$s_user =session("user");

			$result = $linkuser -> where("shopusername = '$s_user'") -> find();

			$shopcartcount = $linkcart -> where("pid = $result[id]") ->count();

    		$this-> assign("shopcartnumber",$shopcartcount."件");
   		 }
    	$this -> sessionuser();

    	if(IS_GET) {

    		if(I("get.goodsid")) {
    			$goodsid= I("get.goodsid") ;
    			$result =$linkDB -> where("id = $goodsid") -> find();
    			$array['bigimgphone']= $result['goodsurl'];
    			$array["goodsname"] =$result['goodsname'];
    			$array['goodsprice'] =$result['goodsprice'];
                $array['goodsid'] =$result['id'];
    			$this -> assign($array);
    		}	
    
    		
    	}
    	if(isset($_POST['goodstotal'])) {
    		$linkuser =M("shopgoodsuser");
    		$addshopcartdata="";
    		if(session("?user")) {
    			
    			$result = $linkuser -> where("shopusername = '$s_user'") -> find();
    			$data['pid'] = $result['id'];
    			$data['goodsname'] = I("goodsname");
    			$data['goodsprice'] = I("goodsprice");
    			$data['goodsweight'] = I("intelnalstorage");
    			$data['goodsurl'] = I("imgurl");
    			$data['goodsnumber'] = I("number");
    			$data['goodstotal'] = I("goodstotal");
    			$linkshopcart =M("shopcart");
    			$findshopflag = $linkshopcart -> where("goodsname = '$data[goodsname]'") ->find();

    			if($findshopflag ) {
    				 $data['goodstotal']+=$findshopflag['goodstotal'];
    				 $data['goodsnumber']+=$findshopflag['goodsnumber'];
    				$addshopcartdata =  $linkshopcart -> where("id= $findshopflag[id]") ->save($data);
    			
    			}else {
    				
    				$addshopcartdata = $linkshopcart -> add($data);

    			}
    				
    				if($addshopcartdata) {
    					
    					$data['status'] ="1";
    					$data['success'] ="加入购物车成功";
                        $findshopflag = $linkshopcart -> where("goodsname = '$data[goodsname]'") ->find();
    					$data['shopcartnumber'] = $linkshopcart -> where("pid = $findshopflag[pid]") ->count();
    				
    					$this -> ajaxReturn($data);
    				}
    		}else{
    			$data['status']="0";
    			$data['loginurl']="/index.php/Home/Signinout/login";
    			$this -> ajaxReturn($data);//0代表没有登录

    		}

    	}

    	$this -> display();

    }

    public function sessionuser() {
    	if(session("?user")) {
				$user = session("user");	
  			$this -> assign("username","<a href='/index.php/Home/Signinout/login' id='exitlogin'>{$user}</a>");
  		}else{

  			$this -> assign("username","<a href='/index.php/Home/Signinout/login'>请登录</a>");
  		}
    }

}