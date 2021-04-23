<?php
use Illuminate\Support\Facades\Mail;
use App\Helpers\NepaliCalendar;
use App\Models\User;


function getApplicationBaseURL(){
	$prefix = (isset($_SERVER['HTTPS']) ? "https" : "http");
	$host = (isset($_SERVER['HTTP_HOST']))?$_SERVER['HTTP_HOST']:null;
	return $prefix."://".$host.'/';
}

function getApplicationPathWithPort($path){
	$urlParts = parse_url(getApplicationBaseURL());
	$path = trim($path,'/');
	if(isset($urlParts['port']) && $urlParts['port']!=""){
		return $path.":".$urlParts['port']."/";
	}else{
		return $path."/";
	}
	echo $urlParts['port'];exit;
	$urlString = $urlParts['scheme']."://".$_SERVER['HTTP_HOST']."/";
	return $urlString;
}
function startSession(){
	if (session_status() == PHP_SESSION_NONE) {
	    			session_start();
		}
}

function getDaysDifference($date){
	$now = time();
	$your_date = strtotime($date);
	$datediff = $now - $your_date;
	return round($datediff / (60 * 60 * 24));
}
function getMonthDifference($date){
	return round(getDaysDifference($date)/30);
}
function getYearDifference($date){
	$now = new DateTime(date('Y-m-d'));
	$your_date = new DateTime($date);
	$datediff = $now ->diff($your_date);
	return $datediff->format('%y');
}

function getGUID(){
	return rand(11111, 99999) .rand(2323232, 78787878).rand(4545454, 90907989);
}
function sendMail($to,$toName,$from,$fromName,$subject,$data){
	Mail::send(['text'=>'mail'],$data,function($message) use($to,$toName,$from,$fromName,$subject){
			$message->to($to,$toName)->subject($subject);
			$message->from($from,$fromName);
		});
}

function __setLink($link,$params=array()){
	return BASE_URL.$link."?token=".getToken($params);
}
function __decryptToken(){
	if(isset($_GET['token'])){
		return \JWT::decode($_GET['token'], TOKEN_SECRET_KEY);
	}else{
		return null;
	}
}
function getToken($param = array()){
		startSession();
		$time = strtotime(date('Y-m-d', strtotime("+30 days")));
		$token['iat'] = $time;
		$token['expire'] = $time;
		$token['user_code'] = isset($_SESSION['code'])?$_SESSION['code']:null;
		$token['renew_date'] = isset($_SESSION['renew'])?$_SESSION['renew']:null;
		$token['expiry_date'] = isset($_SESSION['expiry'])?$_SESSION['expiry']:null;
		
		if(isset($_GET['dbyear'])){
			$token['dbyear'] = $_GET['dbyear'];	
		}else{

			if(isset($_GET['token'])){
				$tmpParams = __decryptToken();
				if(isset($tmpParams->dbyear)){
					$token['dbyear'] = $tmpParams->dbyear;	
				}else{
					$token['dbyear'] = date('Y');
				}
			}else{
				$token['dbyear'] = date('Y');
			}
		}
		
	
		$token = array_merge($token,$param);
		return \JWT::encode($token, TOKEN_SECRET_KEY);
}

function fileUpload($file,$folderPath){
	$name = getGUID() . '.' . $file->getClientOriginalExtension();
	if ($file->move(public_path($folderPath), $name)) {
	    return $name;
	} else {
	    return false;
	}
}

function validateToken($type=null){
		$response = null;
		if(isset($_GET['token']) && $_GET['token']!=""){
			$token = \JWT::decode($_GET['token'], TOKEN_SECRET_KEY);
			if($token && time()<$token->expire){
				return $token;
			}else{
				if($type=="web"){
					return null;
				}
				$response = array(
								'message'=>'Not Valid Request',
								'error_code'=>'453'
							);
				header("HTTP/1.1 453 Not Valid Request");
			}
		}else{
			if($type=="web"){
				return null;
			}
			$response = array(
								'message'=>'Not Valid Request',
								'error_code'=>'453'
							);
			header("HTTP/1.1 453 Not Valid Request");
		}
		return json_encode($response);
		
}

function spellOut($number){
	$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
	$number=number_format((float)$number, 2, '.', '');
	$parts=explode(".",$number);
	$before=$parts[0];
	if(isset($parts[1])){
	$after=$parts[1];
	}else{
		$after=0;
	}
	$inWordsBefore= $f->format($before);
	$inWordsAfter= $f->format($after);
	$currencyUnit="rupees";
	$currencySubunit="paisa";
	$terminator="only";
	if($after>0){
		$string =  $inWordsBefore." ".$currencyUnit." ".$inWordsAfter." ".$currencySubunit." ".$terminator;
	}
	else{
		$string = $inWordsBefore." ".$currencyUnit." ".$terminator;	
	}
	return ucfirst($string);
}


function daysDifference($start_date, $end_date)
{
    // calulating the difference in timestamps 
    $diff = strtotime($start_date) - strtotime($end_date);
     
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds
    $days=ceil(abs($diff / 86400));
    $daysLeft=$days%365;
    if($days>0)
    $year=ceil($days/365)-1;
    else
    $year=ceil($days/365);
    
    if($year>0)return $year." Year".($year>1?"s":"")." and ".$daysLeft." Day".($daysLeft>1?"s":"");
    else return $daysLeft." Day".($daysLeft>1?"s":"");
}

/**
 * SendMail the desired user
 *
 * @param  int  $id, $view
 * @return $data
 */
function __sendMail($data, $view)
 {
    \Mail::send('mail.'.$view, $data->toArray(), function ($message) use ($data) {
                $message->to($data->email);
                $message->subject('Notice From School.');
    });
    return $data;
}

 


