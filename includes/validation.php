<?php
class SimaNet_Validate{
	
	public function email($email=NULL){
		$result=false;
		//if(preg_match("/^([a-z A-Z 0-9 . - _ @])+$/",$email)){
			if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				$result=true;
			}
		//}
		return $result;
	}
	//====================================
	public function Valid_Alphabet($alphabet=NULL){
		if(preg_match("/^([a-zA-Z])+$/",$alphabet)){
			return 1;
		}else{
			return false;
		}
	}

	public function Persian_Alphabet($Persian_Alphabet=NULL){ // PA Persian_Alphabet
	if(preg_match("/^([ا آ ب پ ت ث ج چ ‌ح خ د ذ ر ز‌ ژ س ش ص ض ط ظ ع غ ف ق ک ك گ ل م ن و ه ة ی ي ئ ء])+$/",$Persian_Alphabet))
			return 1;
		else
			return 0;
	}
	public function Persian_Number_Alphabet($Persian_Alphabet=NULL){ // PA Persian_Alphabet
	if(preg_match("/^([ا آ ب پ ت ث ج چ ‌ح خ د ذ ر ز‌ ژ س ش ص ض ط ظ ع غ ف ق ک ك گ ل م ن و ه ة ی ي ئ ء 0-9 |])+$/",$Persian_Alphabet))
			return 1;
		else
			return 0;
	}
	public function English_Alphabet($English_Alphabet=NULL){
		if(preg_match("/^([a-zA-Z])+$/",$English_Alphabet))
					return 1;
				else
					return 0;
	}
	public function English_number_Alphabet($English_Alphabet=NULL){
		if(preg_match("/^([0-9 . a-zA-Z])+$/",$English_Alphabet))
					return 1;
				else
					return 0;
	}
	//================================================================	
	public function Persian_English_Alphabet($Persian_English_Alphabet=NULL){// Prsian And English Alphabet
		if(preg_match("/^([ا آ ب پ ت ث ج چ ‌ح خ د ذ ر ز‌ ژ س ش ص ض ط ظ ع غ ف ق ک ك گ ل م ن و ه ة ی ي ئ ء . - ! a-z A-Z])+$/",$Persian_English_Alphabet))
			return 1;
		else
			return 0;
	}
	public function Persian_English_Number_Alphabet($Persian_English_Number_Alphabet=NULL){// Prsian And English Alphabet
		if( $Persian_English_Number_Alphabet == ''){
			return 1;
		}else{
			if(preg_match("/^([ا آ ب پ ت ث ج چ ‌ح خ د ذ ر ز‌ ژ س ش ص ض ط ظ ع غ ف ق ک ك گ ل م ن و ه ة ی ي ئ ء ؟ ، ؛ : . - ! a-z A-Z 0-9 \r\n \n \r \\S ])+$/",$Persian_English_Number_Alphabet))
				return 1;
			else
				return 0;
		}
	}
	public function Mobile($mobile=NULL){
		if(preg_match("/^([0-9 + .])+$/",$mobile)){
			if( strlen($mobile) == 11 ){
				if( (substr($mobile,0,2) == '09') || (substr($mobile,0,2) == '98') ){
					return true;
				}else{
					return false;
				}
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	public function Valid_Pass($Valid_Pass=NULL){// Valid_Pass
		if(preg_match("/^([a-z A-Z _ , . ? { } ~ ! @ # $ % ^ & * - | + = 0-9])+$/",$Valid_Pass))
			return 1;
		else
			return 0;
	}
	public function Number($number=NULL){// UN is unlimit number
		if(preg_match("/^([0-9])+$/",$number))//"/^([0-9]){1,50}$/"
					return 1;
				else
					return 0;
	}
	public function amount($amount=NULL){
		if(preg_match("/^([0-9])+$/",$amount)){
			if( ($amount < 100) || ($amount > 999999999) ){
				return false;
			}
			else{
				return true;
			}
		}
		else{
			return 0;
		}
	}
}
function Persian_Alphabet($string=NULL){ // PA Persian_Alphabet
$string 	= str_replace(' ', '', $string);
$string 	= preg_replace('/\s+/', '', $string);
$pattern 	= "/^[ا آ ب پ ت ث ج چ ‌ح خ د ذ ر ز‌ ژ س ش ص ض ط ظ ع غ ف ق ک ك گ ل م ن و ه ة ي ي ی ئ ء ]+$/";
if(preg_match($pattern,$string))
		return 1;
	else
		return 0;
}
function validate_amount($amount=NULL){
	if(preg_match("/^([0-9])+$/",$amount)){
		if( ($amount < 100) || ($amount > 50000) ){
			return false;
		}
		else{
			return true;
		}
	}
	else{
		return 0;
	}
}
function validate_Number($number=NULL){// UN is unlimit number
	if(preg_match("/^([0-9])+$/",$number))//"/^([0-9]){1,50}$/"
		return 1;
	else
		return 0;
}
function Valid_Alphabet($alphabet=NULL){
	if(preg_match("/^([a-zA-Z])+$/",$alphabet)){
		return 1;
	}else{
		return false;
	}
}
function validate_Mobile($mobile=NULL){
	if(preg_match("/^([0-9 + . ۰ ۱ ۲ ۳ ۴ ۵ ۶ ۷ ۸ ۹ ٠ ١ ٢ ٣ ٤ ٥ ٦ ٧ ۸ ٩])+$/",$mobile)){
		//$mobile = convert_fa_to_en($mobile);
		if( strlen($mobile) == 11 ){
			if( (substr($mobile,0,2) == '09') || (substr($mobile,0,2) == '98') ){
				return true;
			}else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	else{
		return false;
	}
}
function bot_name($string=NULL){
	if(preg_match("/^([a-zA-Z 0-9 _ ])+$/",$string)){
		return 1;
	}else{
		return false;
	}
}
function valid_token($string=NULL){
	$string = str_replace(array("-" , "_" , ":"),array("","",""),$string);//مواردي که در توکن مي تواند باشد را پاک ميکنم زيرا پريگ مچ خط تيره رو تشخيص نميده
	if(preg_match("/^([ a-z A-Z 0-9])+$/",$string)){
		return true;
	}else{
		return false;
	}
}
?>