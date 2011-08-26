<?php
/**
 * 创建验证码
 */
class authImage
{
	var $length = 4;		//验证码个数
	var $font_size = 18;		//字体大小,需要根据验证码个数和图片大小灵活调节
	var $type = "LETTER";			//验证码类型,NUMBER为数字,LETTER为字母,缺省为中文
	var $expiredTime = 60000;		//验证码有效时间,默认一分钟
		
	var $bgEnable = 0;		//是否使用背景图片		
	var $width = 100;		//验证码宽度(如使用背景图片,则等于背景图片宽度)
	var $height = 30;		//验证码高度(如使用背景图片,则等于背景图片高度)

	var $randColorEnable = 1;		//验证码使用多彩随机颜色,为0使用黑色,有背景图片时不建议使用
	var $security_key = SECURITY_KEY;		//附加安全码,以防止加密被破解,可设为任意值,但需要与auth.php文件中设置一致.
		
        function authImage(){
			
	}
	function showImage() {
		if(!$this->gdCheck()){
			return false;
		}
		$code = $this->generateCode();
		$total = strlen($code);		//验证码UTF8格式时的长度,一般为中文字数*3
		$encrypt = $this->encrypt($code, $this->security_key);

           	/* 如果使用背景图片 */
		if($this->bgEnable){
				define( "AUTHIMAGE_BACKGROUND_FOLDER", IMGDIR."/backgrounds/" );	//设置背景图片存放目录
				if ($handle = opendir(AUTHIMAGE_BACKGROUND_FOLDER)) {
					$i = 0;
					while (false !== ($file = readdir($handle))) {
						if (preg_match("/\.(jpg)|(gif)|(png)$/i",$file)) {
							$backgroundimg[$i] = $file;
							$i++;
						}
					}
					closedir($handle);
				}
				$bg = $backgroundimg[mt_rand(0,count($backgroundimg)-1)];
				preg_match("/\.([\w]+)$/i",$bg,$ext_temp);
				$bg_ext = $ext_temp[1];						//获得背景图片扩展名
				$background = AUTHIMAGE_BACKGROUND_FOLDER.$bg; 
				if($bg_ext == 'jpg' && function_exists ( 'imagecreatefromjpeg' )){
					$image = @imagecreatefromjpeg($background) or die("This server doesn't support JPEG image stream");
				}
				else if($bg_ext == 'gif' && function_exists ( 'imagecreatefromgif' )){
					$image = @imagecreatefromgif($background) or die("This server doesn't support GIF image stream"); 
				}
				else if($bg_ext == 'png' && function_exists ( 'imagecreatefrompng' )){
					$image = @imagecreatefrompng($background) or die("This server doesn't support PNG image stream"); 
				}
				else {
				  die("Server doesn't support JPEG or GIF or PNG creation. Sorry.");
				}
				$imginfo = getimagesize($background);
				$this->width = $imginfo[0];
				$this->height = $imginfo[1];
			}

			/* 如果不使用背景图片 */
			else{
				
				$image = imagecreatetruecolor($this->width, $this->height);
				$white = ImageColorAllocate($image,255,255,255); 
				$black = ImageColorAllocate($image,0,0,0); 
				imagefilledrectangle($image,0,0,$this->width,$this->height,$white);		//填充背景色
				imagerectangle($image,0,0,$this->width - 1,$this->height - 1,$black);  //加个边框
				
			}

			
			
		
			 //加入杂点	
			 $noise_num = $this->length * 10;		//杂点数量,设置为验证码个数的10倍
			 for($i=0;$i<$noise_num;$i++){			
				$rand_noise_color = $this->randColorEnable ? imagecolorallocate($image,mt_rand(0,240),mt_rand(0,240),mt_rand(0,240)) : imagecolorallocate($image,0,0,0);	//创建杂点随机颜色
				imagesetpixel($image,mt_rand(0,$this->width),mt_rand(0,$this->height),$rand_noise_color);
			 }

			//加入干扰线
			$line_num = $this->length - 1;				//干扰线数量,设置为等于验证码个数减1
			for($i=0;$i<$line_num;$i++)	{
				$rand_line_color = $this->randColorEnable ? imagecolorallocate($image,mt_rand(0,240),mt_rand(0,240),mt_rand(0,240)) : imagecolorallocate($image,0,0,0);	 //创建干扰线随机颜色
				imageline($image,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$rand_line_color);
			}
		
					
			
			/** 加入文字 **/
			$font = ($this->type == "NUMBER" | $this->type == "LETTER") ? APPPATH."views/fonts/timesbd.ttf" : APPPATH."views/fonts/simfang.ttf" ;	//设定字体
			$step = ($this->type == "NUMBER" | $this->type == "LETTER") ? 1 : 3 ;
			$font_x = 5;
			$font_y = $this->height-($this->font_size/4);
			for( $i=0; $i<$total; $i = $i+$step ){
				$letter = substr($code,$i,$step);
				$angle = mt_rand(0,25);
				$rand_text_color = $this->randColorEnable ? imagecolorallocate($image,mt_rand(50,255),mt_rand(0,120),mt_rand(50,255)) : imagecolorallocate($image,213,005,145);	 //创建字体随机颜色
				$ttf=ImageTTFText($image,$this->font_size,$angle,$font_x,$font_y,$rand_text_color, $font,$letter);
				$font_width = $ttf[2] - $ttf[0];
				$font_height = $ttf[1] - $ttf[7];
				$font_x = $font_width/($step+0.5) + $ttf[2];
				$font_y = mt_rand($font_height,$this->height);
			
			}

            session_start();
			$_SESSION['authcode'] = $encrypt; 
			ImagePNG($image);
			imagedestroy($image);

        }

        /* 对字符MD5加密 */
        function encrypt($string, $key) {
            $plainText = $string.$key;
            $encodeText = md5($plainText);
            return $encodeText;
        }

        /* 生成字符 */	
        function generateCode() {
            $code = "";
            for($i=0; $i < $this->length; $i++) {
				switch($this->type){
					case 'NUMBER':
						$code .= mt_rand(0,9);
						break;
					case 'LETTER':
						$code .= chr(mt_rand(97,122));
						break;
					default :
						$character_cn = chr(mt_rand(180,200)).chr(mt_rand(180,200));
						$code .= iconv("GB2312", "UTF-8", $character_cn);
				}
			}
            return $code;
        }        
        
		function gdCheck(){
			if ( !function_exists ('gd_info') ) {
                $this->error = "You don't have GD support compiled in, we cannot create an image.";
                return false;
            }
			else{
				$gdinfo = gd_info();
				if(!$gdinfo["FreeType Support"]){
					 $this->error = "You don't have Freetype support compiled in, we cannot create an image.";
					 return false;
				}
			}

			if( !((function_exists('imagecreatefrompng') |function_exists('imagecreatefromjpeg') |function_exists('imagecreatefromgif')) && function_exists('imagecreatetruecolor') && function_exists('imagecolorallocate')  && function_exists('imagefilledrectangle')  && function_exists('imagerectangle') && function_exists('imagesetpixel') && function_exists('imageline') && function_exists('imagepng') && function_exists('imagedestroy')  && function_exists('ImageTTFText')) ){
				$this->error = "You have GD support compiled in, but cannot Initialize new GD image stream.";
				return false;
			}
			else{				
				return true;
			}
		}
		function generateImageUrl()
        {


            if ( !function_exists ('gd_info') ) {
                // We don't have gd support compiled in, lets inform the user about it
                return false;
            }

            return $imageUrl;
        }

        function show() {
            $authImageUrl = $this->generateImageUrl();
            if ( $authImageUrl )
                return '<img src="'.$authImageUrl.'" style="vertical-align:middle;" width="70px" height="20px" alt="authimage" id="p_validcode"/><span class="change-img"><a href="javascript:am('.$_REQUEST[blogId].');">&nbsp;&nbsp;看不清楚，换张图片</a></span>
			
			'; 
            else
                return 'You don\'t have GD support compiled in, we cannot create an authimage. Please activate GD Support.';
        }
        function deleteExpiredAuthImage( $expiretime ) {
            $path = $this->cacheFolder;
            if ( is_dir($path) ) 
            { 
                $handle=opendir($path); 
                while (false!==($file = readdir($handle))) { 
                    if ($file != "." && $file != "..") {  
                        $diff = time() - filectime("$path/$file");
                        if ($diff > $expiretime) unlink("$path/$file");
                    } 
                }
                closedir($handle); 
            }
        }           
    }
 


?>
