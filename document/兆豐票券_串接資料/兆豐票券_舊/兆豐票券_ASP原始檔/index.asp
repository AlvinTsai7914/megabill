<!--#INCLUDE FILE="db.asp" -->
<%
  CommandText1 = "select substr(text_1,1,22) brief,text_1 from nt009 where id_type = 'W' and tr_date = (select max(tr_date) from nt009 where id_type = 'W')" 
  Set rs1 = Server.CreateObject("ADODB.Recordset")
  rs1.Open commandtext1,conn
  
  CommandText2 = "select substr(text_1,1,22) brief,text_1 from nt009 where id_type = 'X' and tr_date = (select max(tr_date) from nt009 where id_type = 'X')" 
  Set rs2 = Server.CreateObject("ADODB.Recordset")
  rs2.Open commandtext2,conn
  
  CommandText3 = "select substr(text_1,1,22) brief,text_1 from nt009 where id_type = 'Y' and tr_date = (select max(tr_date) from nt009 where id_type = 'Y')" 
  Set rs3 = Server.CreateObject("ADODB.Recordset")
  rs3.Open commandtext3,conn
  
  CommandText4 = "select substr(text_1,1,22) brief,text_1 from nt009 where id_type = 'Z' and tr_date = (select max(tr_date) from nt009 where id_type = 'Z')" 
  Set rs4 = Server.CreateObject("ADODB.Recordset")
  rs4.Open commandtext4,conn
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5" />
<title>兆豐票券--首頁</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	background-repeat: repeat-y;
	margin-right: 0px;
	margin-bottom: 0px;
}
#Layer1 {
	position:absolute;
	left:229px;
	top:173px;
	width:364px;
	height:223px;
	z-index:1;
}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style4 {color: #FF0000;font-size: 12px;text-decoration: none;}
.style6 {
	font-size: 12px;
	color: #5A5A5A;
}
.style7 {color: #FF0000}
-->
</style>
</head>

<body onload="MM_preloadImages('images/index_10a.gif','images/index_11a.gif','images/index_12a.gif','images/index_13a.gif','images/index_22.gif','images/index_25.gif','images/index_27.gif','images/index_29.gif','images/index_31.gif','images/index_33.gif','images/index_52.gif','images/index_14a.gif','images/index_23.gif','images/index_26.gif','images/index_28.gif','images/index_30.gif','images/index_32.gif')">
<table width="1000" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1004"><table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="202"><img src="images/index_01.gif" width="202" height="65" /></td>
        <td><img src="images/index_02.gif" width="418" height="65" /></td>
        <td><img src="images/index_03.gif" width="380" height="65" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="1004"><table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="206"><img src="images/index_04.gif" width="206" height="70" /></td>
        <td width="414"><img src="images/index_05.gif" width="414" height="70" /></td>
        <td><a href="english.html"><img src="images/index_06.gif" width="115" height="70" border="0" /></a></td>
        <td><a href="contact.html"><img src="images/index_07.gif" width="105" height="70" border="0" /></a></td>
        <td><a href="sitemap.html"><img src="images/index_08.gif" width="160" height="70" border="0" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="290"><img src="images/index_09.gif" width="290" height="35" /></td>
        <td width="108"><img src="images/index_09.gif" width="108" height="35" /></td>
        <td width="110"><a href="about.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image10','','images/index_10a.gif',1)"><img src="images/index_10.gif" name="Image10" width="110" height="35" border="0" id="Image10" /></a></td>
        <td><a href="service.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image11','','images/index_11a.gif',1)"><img src="images/index_11.gif" name="Image11" width="110" height="35" border="0" id="Image11" /></a></td>
        <td><a href="information.asp" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image12','','images/index_12a.gif',1)"><img src="images/index_12.gif" name="Image12" width="110" height="35" border="0" id="Image12" /></a></td>
        <td><a href="member.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image281','','images/index_14a.gif',1)"><img src="images/index_14.gif" name="Image281" width="110" height="35" border="0" id="Image281" /></a></td>
        <td width="110" background="images/index_09.gif"><a href="member.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image28','','images/index_14a.gif',1)"></a><img src="images/index_16.gif" width="52" height="35" /></td>
        <td width="52" background="images/index_09.gif">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td width="1000" height="3"><img src="images/index_17.gif" width="1000" height="3" /></td>
  </tr>
  <tr>
    <td width="1000"><table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="206" valign="top" bgcolor="#E1D7B8"><table width="202" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="images/index_18.gif" width="202" height="38" /></td>
          </tr>
          <tr>
            <td><a href="location.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image19','','images/index_22.gif',1)"><img src="images/index_22a.gif" name="Image19" width="202" height="26" border="0" id="Image19" /></a></td>
          </tr>
          <tr>
            <td><a href="disclosure.asp" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image20','','images/index_25.gif',1)"><img src="images/index_25a.gif" name="Image20" width="202" height="40" border="0" id="Image20" /></a></td>
          </tr>
          <tr>
            <td><a href="cambist.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image21','','images/index_27.gif',1)"><img src="images/index_27a.gif" name="Image21" width="202" height="37" border="0" id="Image21" /></a></td>
          </tr>
          <tr>
            <td><a href="estimation.asp" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image22','','images/index_29.gif',1)"><img src="images/index_29a.gif" name="Image22" width="202" height="40" border="0" id="Image22" /></a></td>
          </tr>
          <tr>
            <td><a href="join.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image23','','images/index_31.gif',1)"><img src="images/index_31a.gif" name="Image23" width="202" height="37" border="0" id="Image23" /></a></td>
          </tr>
          <tr>
            <td><a href="link.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image24','','images/index_33.gif',1)"><img src="images/index_33a.gif" name="Image24" width="202" height="40" border="0" id="Image24" /></a></td>
          </tr>
          <tr>
            <td><a href=" http://mops.twse.com.tw/mops/web/index" target="_blank" onmouseover="MM_swapImage('Image27','','images/index_52.gif',1)" onmouseout="MM_swapImgRestore()"><img src="images/index_52a.gif" name="Image27" width="202" height="121" border="0" id="Image27" /></a></td>
          </tr>
        </table></td>
        <td width="3"><img src="images/index_19.gif" width="3" height="457" /></td>
        <td valign="top"><table width="795" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><table width="795" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="357"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="357" height="222">
                  <param name="movie" value="intro.swf" />
                  <param name="quality" value="high" />
                  <embed src="intro.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="357" height="222"></embed>
                </object></td>
                <td><table width="438" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2"><img src="images/index_21.gif" width="438" height="38" /></td>
                    </tr>
                  <tr>
                    <td><a href="disclosure.asp" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image30','','images/index_23.gif',1)"><img src="images/index_23a.gif" name="Image30" width="168" height="30" border="0" id="Image30" /></a></td>
                    <td width="270" rowspan="5" valign="top"><img src="images/index_24.gif" width="270" height="184" /></td>
                  </tr>
                  <tr>
                    <td><a href="disclosure.asp#b" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image31','','images/index_26.gif',1)"><img src="images/index_26a.gif" name="Image31" width="168" height="36" border="0" id="Image31" /></a></td>
                    </tr>
                  <tr>
                    <td><a href="disclosure.asp#C" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image32','','images/index_28.gif',1)"><img src="images/index_28a.gif" name="Image32" width="168" height="37" border="0" id="Image32" /></a></td>
                    </tr>
                  <tr>
                    <td><a href="disclosure.asp#D" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image33','','images/index_30.gif',1)"><img src="images/index_30a.gif" name="Image33" width="168" height="40" border="0" id="Image33" /></a></td>
                    </tr>
                  <tr>
                    <td><a href="disclosure.asp#E" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image34','','images/index_32.gif',1)"><img src="images/index_32a.gif" name="Image34" width="168" height="41" border="0" id="Image34" /></a></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td valign="top" background="images/index_65.gif"><table width="795" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="3" valign="top"><table width="3" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="images/index_35.gif" width="3" height="39" /></td>
                  </tr>
                  <tr>
                    <td width="3" valign="top" background="images/index_40.gif"><img src="images/index_40.gif" width="3" height="193" /></td>
                  </tr>
                </table></td>
                <td width="345" valign="top"><table width="472" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2"><img src="images/index_36a.gif" width="472" height="39" /></td>
                  </tr>
                  <tr>
                    <td width="127"><img src="images/p2.jpg" width="127" height="193" /></td>
                    <td width="345" bgcolor="#F4F4E8" class="link12gray"><marquee direction="up" scrollamount="5" id="marq1" height="550" >
                          <table width="345" border="0" cellspacing="0"  cellpadding="0" onmouseover="marq1.stop();" onmouseout="marq1.start();">
                              <tr>
                                <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td width="338" valign="top"><a href="news.asp#w" class="link12gray">央行動態：<%=Replace(rs1("brief").value, Chr(10), "<BR>")%>...</a></td>
                                </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                         </table>
                          <table width="345" border="0" cellspacing="0"  cellpadding="0" onmouseover="marq1.stop();" onmouseout="marq1.start();">
                              <tr>
                                <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td width="335" valign="top"><a href="news.asp#x" class="link12gray">拆款行情：<%=Replace(rs2("brief").value, Chr(10), "<BR>")%>...</a></td>
                                </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                          </table>
                            <table width="345" border="0" cellspacing="0"  cellpadding="0" onmouseover="marq1.stop();" onmouseout="marq1.start();">
                              <tr>
                                <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td width="335" valign="top"><a href="news.asp#y" class="link12gray">匯市行情：<%=Replace(rs3("brief").value, Chr(10), "<BR>")%>...</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                            </table><% IF Not RS4.EOF THEN %>
                            <table width="345" border="0" cellspacing="0"  cellpadding="0" onmouseover="marq1.stop();" onmouseout="marq1.start();">
                              <tr>
                                <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td width="335" valign="top"><a href="news.asp#z" class="link12gray">債券行情：<%=Replace(rs4("brief").value, Chr(10), "<BR>")%>...</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                            </table><% end if %>
                            <table width="345" border="0" cellspacing="0"  cellpadding="0" onmouseover="marq1.stop();" onmouseout="marq1.start();">
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top"><a href="pdf/第十屆菁業獎得獎.pdf" target="_blank" class="style4">本公司榮獲第十屆菁業獎「最佳票券金融獎」優等。</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <!--需求單19494 管理部盧銘森 -->
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="http://info.csa.org.tw" target="_blank" class="link12gray">協助證券公會推廣「證券投資反詐騙專區」http://info.csa.org.tw</a></td>
                              </tr>
							  
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  					  
							  
							  
							  <!--需求單19238 企劃部陳郁喬 -->
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="pdf/兆豐票券與中租迪和簽署永續指數連結商業本票.pdf?v=zf7SD17o8jI" target="_blank" class="link12gray">兆豐票券與中租迪和簽署永續指數連結商業本票，票券業首發，落實永續金融。</a></td>
                              </tr>
							  
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>							  
							  
							  <!--需求單18510 管理部王美智 -->
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.trust.org.tw/tw/news/671" target="_blank" class="link12gray">協助推廣信託公會員工福利信託宣導短片</a></td>
                              </tr>
							  
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  
							  <!--需求單18462 管理部盧銘森1100131 -->
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="pdf/2021_18462.pdf" target="_blank" class="link12gray">協助推廣內政部「新式外來人口統一證號」文宣</a></td>
                              </tr>
							  
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  
							   <!--需求單18321 管理部劉聯旭 -->
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="pdf/公司治理3_0.jpg" target="_blank" class="link12gray">協助推廣行政院「推動公司治理3.0」文宣</a></td>
                              </tr>
							  
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              
							  <!--需求單18194 管理部盧銘森 -->
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1">「證券商絕對不會向民眾租用銀行帳戶，請客戶勿受騙上當，以保障自身權益」</td>
                              </tr>
							  
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              
							  
                              
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top"><a href="http://moneywise.fsc.gov.tw" target="_blank" class="link12gray">金融智慧網 http://moneywise.fsc.gov.tw</a>。</td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>    
							  
							   <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top"><a href="http://www.aml-ba.org.tw" target="_blank" class="link12gray">銀行公會防制洗錢及打擊資恐專區 http://www.aml-ba.org.tw</a>。</td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>                            
                             
							  <tr>
                                <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td width="335" valign="top"><a href="http://www.fsc.gov.tw/ch/home.jsp?id=400&amp;parentpath=0,2&amp;dataserno=201306140001" target="_blank" class="link12gray">金管會「1998金融服務專線」業已開通啟用，民眾如有金融諮詢服務，請於上班時間撥打電話號碼「1998」。</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top"><a href=# onClick=window.open('foi.html','foi','width=650,height=260,directories=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,resizable=no,left=120,top=150,screenX=0,screenY=0');return false class="link12gray">金融消費爭議處理專區 http://www.foi.org.tw</a>。</td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="link12gray"><a href="https://www.facebook.com/fsc.gov.tw" target="_blank" class="link12gray">「金管會」臉書粉絲專頁。</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="link12gray"><a href="http://www.banking.gov.tw/ch/home.jsp?id=181&amp;parentpath=0,5" target="_blank" class="link12gray">金管會銀行局首頁/消費園地/宣導短片。</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="link12gray"><a href="http://www.cdic.gov.tw/main_guide/video.aspx?uid=52&amp;pid=52" target="_blank" class="link12gray">中央存保公司/宣傳專區/宣傳影片/守護篇(106年)。</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="link12gray"><a href="pdf/amlo_n.pdf" target="_blank" class="link12gray">1分鐘看懂洗錢防制新法。</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="link12gray"><a href="pdf/amlo2.jpg" target="_blank" class="link12gray">行政院洗錢防制辦公室宣傳海報。</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="link12gray style6">行政院洗錢防制廣播錄音檔：<a href="pdf/賴院長談洗錢防制篇-廣播.mp3" target="_blank" class="link12gray">院長談洗錢防制篇</a>、<a href="pdf/陳美鳳呼籲勿當人頭篇-廣播.mp3" target="_blank" class="link12gray">美鳳勸勿當人頭篇</a>。</td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1">內政部自106 年7 月3 日起，提供「試辦網路申辦繼承案件戶籍謄本」作業，試辦期間為6個月，民眾可於內政部戶政司全球資訊網以自然人憑證網路申辦繼承案件戶籍謄本服務，有使用需要者，請多加利用。</td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="download/money.zip" class="link12gray">協助推廣行政院洗錢防制辦公室及行政院新聞傳播處之洗錢防制法新制宣導資料(「洗錢防制法新制施行對民眾影響問答集」手冊、9款海報與3支語音廣播檔等)。</a></td>
                              </tr>
                               <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="pdf/防制洗錢文宣.zip" target="_blank" class="link12gray">協助宣導行政院洗錢防制辦公室之電子海報、資訊圖表、懶人包</a>、<a href="https://eywebstorage.ey.gov.tw/navigate/s/0BA4E89B2A7F4FEAA596E260405D6B266BL" target="_blank" class="link12gray">短片</a>共10款文宣。</td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  
							   <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://eywebstorage.ey.gov.tw/navigate/s/6CBC0D53BAF94192B851BE3CE02E70186BL" target="_blank" class="link12gray">協助宣導行政院洗錢防制辦公室之107年洗錢防制宣導海報影片等文宣</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="http://gcis.nat.gov.tw/mainNew/subclassNAction.do?method=getFile&amp;pk=922" target="_blank" class="link12gray">新公司法自107年11月1日施行，公司應於108年1月31日前在【公司負責人及主要股東資訊申報平臺】完成資料申報，詳情請上網址：http://ctp.tdcc.com.tw或電洽4121166。</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.tdcc.com.tw/portal/zh/publish/calendar" target="_blank" class="link12gray">臺灣集保結算所2019年宣導年曆卡。</a></td>
                              </tr>
							  <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.aac.moj.gov.tw/ct.asp?xItem=536954&amp;ctNode=36887&amp;mp=289" target="_blank" class="link12gray">協助宣導法務部廉政署「企業誠信治理暨反貪腐、反洗錢」宣導短片。</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							   <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.youtube.com/watch?v=u7RvclNWT54" target="_blank" class="link12gray">協助宣導法務部廉政署製作之政策行銷微電影「蔥花麵包的滋味」。</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.moj.gov.tw/cp-272-120662-d3561-001.html" target="_blank" class="link12gray">協助法務部宣導民法意定監護資料 https://www.moj.gov.tw/cp-272-120662-d3561-001.html。</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>							  
							  
							  <!--需求單17500 管理部盧銘森 -->
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.youtube.com/watch?v=ZdlJ2lZep_I" target="_blank" class="link12gray">財政部施政理念形象影片「業務簡介-財政部和你在一起」</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  
							   <!--需求單17516 管理部盧銘森 -->
							   <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.youtube.com/watch?v=pNJs33OaSyg" target="_blank" class="link12gray">協助法務部廉政署宣導透明陽光主題電影「擁抱陽光 輪轉幸福」https://www.youtube.com/watch?v=pNJs33OaSyg</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>		
							  
							  <!--需求單17517 管理部盧銘森 -->
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://drive.google.com/drive/folders/1E9zjD3uQiu22VUaTbJhMUAArFFmDZ9ev" target="_blank" class="link12gray">協助行政院洗錢防制辦公室宣導「洗錢防制別當洗錢車手--恰恰規勸篇」</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>	
							  
							  
							  <!--需求單17563 管理部盧銘森 -->
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.sfipc.org.tw/MainWeb/Article.aspx?L=1&amp;SNO=lQ7Pk+xS3CL7JASsn2uZ9w==" target="_blank" class="link12gray">協助財團法人券投資人及期貨交易人保護中心宣導「中心形象」</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>	
							  
							 
							   <!--需求單17983 法遵 黃彥翔 -->
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="pdf/1090005121-0-1.pdf" target="_blank" class="link12gray">協助宣導我國「國際透明組織2019年清廉印象指數
(CPI)」佳績。</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>	
							   <!--需求單17983 法遵 黃彥翔 -->
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="pdf/0000151a00.pdf" target="_blank" class="link12gray">109年行政院洗錢防制辦公室宣傳海報。</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>	
							  
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>                                 
                            </table>
                            </marquee></td>
                  </tr>
                </table></td>
                <td width="320" valign="top"><table width="320" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="55"><img src="images/index_37.gif" width="55" height="39" /></td>
                    <td width="265"><a href="pdf/利害關係人專區 - 110.pdf" target="_blank"><img src="images/index_67.gif" alt="" width="265" height="39" border="0" /></a><br />					  <a href="pdf/1110104永續經營專區.pdf" target="_blank"><img src="images/index_68.JPG" alt="" width="265" height="39" border="0" /></a><br />					  <a href="pdf/1101228公平待客原則.pdf" target="_blank"><img src="images/index_69.JPG" alt="" width="265" height="39" border="0" /></a><br />                      

                      <img src="images/index_38.gif" width="265" height="39" border="0" /></td>
                  </tr>
                  
                  
                </table>
				
                  <table width="320" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="55"><img src="images/index_43.gif" width="55" height="72" /></td>
                      <td width="56"><img src="images/index_44.gif" width="56" height="72" /></td>
                      <td rowspan="2" valign="top" bgcolor="#E2E2C8"><table width="209" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="20">&nbsp;</td>
                        </tr>
                      </table>
					  <!--需求單18109 債券 唐銘成 -->
					  <table width="209" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                            <td width="199"><a href="pdf/1090828發布訊息內容.pdf" target="_blank" class="link12gray">延長交易時間公告</a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><img src="images/index_50.gif" width="209" height="11" /></td>
                          </tr>
                        </table>
                        <table width="209" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                            <td width="199"><a href="pdf/兆豐金融控股股份有限公司客戶資料保密措施1090709.pdf" target="_blank" class="link12gray">兆豐金融控股股份有限公司客戶資料保密措施</a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><img src="images/index_50.gif" width="209" height="11" /></td>
                          </tr>
                        </table>
                          <table width="209" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                              <td width="199" valign="top"><a href="news.asp" class="link12gray">定型化契約範本下載，客戶可依個案情形與實際需求選擇調解、仲裁或訴訟等爭議解決方式。</a></td>
                            </tr>
                            <tr>
                              <td colspan="2"><img src="images/index_50.gif" width="209" height="11" /></td>
                            </tr>
                          </table>
                          <table width="209" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                              <td width="199" valign="top"><a href="news.asp" class="link12gray">客訴聯絡人窗口：管理部，地址：台北市衡陽路91號5樓，聯絡電話：(02)2381-0033，</a><a href="mailto:mb01@megabills.com.tw" class="link12gray">電子信箱:mb01@megabills.com.tw</a></td>
                            </tr>
                            <tr>
                              <td colspan="2"><img src="images/index_50.gif" width="209" height="11" /></td>
                            </tr>
                          </table>
                          <table width="209" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                              <td width="199" valign="top"><a href="news.asp" class="link12gray">債權債務協商及處理股票質借暫行補充原則之諮詢申訴協調窗口：風控部，聯絡人：林政毅，聯絡電話：02-2316-8830<br />
                                不良債權售後申訴處理窗口：風控部，聯絡人：徐毅智，聯絡電話：02-2316-8825</a></td>
                            </tr>
                            <tr>
                              <td colspan="2"><img src="images/index_50.gif" width="209" height="11" /></td>
                            </tr>
                          </table>
                          <table width="209" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                              <td width="199" valign="top"><a href="FILE/person10212a.pdf" class="link12gray">蒐集處理及利用個人資料告知事項</a><span class="text12gray1">暨</span><a href="FILE/person10212b.pdf" class="link12gray">當事人行使個資法第三條規定權利申請書</a></td>
                            </tr>
                            <tr>
                              <td colspan="2"><img src="images/index_50.gif" width="209" height="11" /></td>
                            </tr>
                          </table>
                          <table width="209" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                              <td width="199" valign="top"><a href="pdf/W-8BEN-E2022216.pdf" target="_blank" class="link12gray">本公司已向美國國稅局(Internal Revenue Service，簡稱IRS)申請登記為FATCA法案合規之金融機構(Participating Foreign Financial Institution，簡稱PFFI)並獲給GIIN碼。本公司之W-8BEN-E影本，如下供參：W-8BEN-E</a></td>
                            </tr>
                            <tr>
                              <td colspan="2"><img src="images/index_50.gif" width="209" height="11" /></td>
                            </tr>
                          </table>
                          <table width="209" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                              <td width="199" valign="top" class="text12gray1"><p>本公司檢舉電子信箱：audit01@megabills.com.tw<br />
                                專線電話：02-2382-5449<br />
                                地址：台北市衡陽路91號2樓<br />
                              受理單位：稽核室</p>
                                </td>
                            </tr>
                            <tr>
                              <td colspan="2"><img src="images/index_50.gif" width="209" height="11" /></td>
                            </tr>
                          </table>
                          <br />
                          <table width="209" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="right"><a href="news.asp"><img src="images/index_58.gif" width="52" height="9" border="0" /></a></td>
                            </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td><img src="images/index_53.gif" width="55" height="121" /></td>
                      <td><img src="images/index_54.gif" width="56" height="121" /></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30" align="center" bgcolor="#5B5B5B"><img src="images/index_64.gif" width="228" height="20" /><img src="images/index_66.gif" width="300" height="20" /></td>
  </tr>
</table>
</body>
</html>
