<!--#INCLUDE FILE="db.asp" -->
<%
  CommandText1 = "select dton(tr_date) m_tr_date,text_1 from nt009 where id_type = 'W' and tr_date = (select max(tr_date) from nt009 where id_type = 'W')" 
  Set rs1 = Server.CreateObject("ADODB.Recordset")
  rs1.Open commandtext1,conn
  
  CommandText2 = "select dton(tr_date) m_tr_date,text_1 from nt009 where id_type = 'X' and tr_date = (select max(tr_date) from nt009 where id_type = 'X')" 
  Set rs2 = Server.CreateObject("ADODB.Recordset")
  rs2.Open commandtext2,conn
  
  CommandText3 = "select dton(tr_date) m_tr_date,text_1 from nt009 where id_type = 'Y' and tr_date = (select max(tr_date) from nt009 where id_type = 'Y')" 
  Set rs3 = Server.CreateObject("ADODB.Recordset")
  rs3.Open commandtext3,conn
  
  CommandText4 = "select dton(tr_date) m_tr_date,text_1 from nt009 where id_type = 'Z' and tr_date = (select max(tr_date) from nt009 where id_type = 'Z')" 
  Set rs4 = Server.CreateObject("ADODB.Recordset")
  rs4.Open commandtext4,conn
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/page1.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>兆豐票券--最新消息</title>
<!-- InstanceEndEditable -->
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
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.style1 {font-size: 12px}
-->
</style>
<!-- InstanceEndEditable -->
</head>

<body onload="MM_preloadImages('images/index_10a.gif','images/index_11a.gif','images/index_12a.gif','images/index_13a.gif','images/index_22.gif','images/index_25.gif','images/index_27.gif','images/index_29.gif','images/index_31.gif','images/index_33.gif','images/index_52.gif','images/index_14a.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_03.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_04.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_05.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_06.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_07.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_08.gif','images/index_15a.gif','images/news/news_a_07.gif','images/news/news_a_09.gif')">
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
        <td width="108"><a href="index.asp" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image32','','images/index_15a.gif',1)"><img src="images/index_15.gif" name="Image32" width="108" height="35" border="0" id="Image32" /></a></td>
        <td width="110"><a href="about.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image10','','images/index_10a.gif',1)"><img src="images/index_10.gif" name="Image10" width="110" height="35" border="0" id="Image10" /></a></td>
        <td><a href="service.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image11','','images/index_11a.gif',1)"><img src="images/index_11.gif" name="Image11" width="110" height="35" border="0" id="Image11" /></a></td>
        <td><a href="information.asp" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image12','','images/index_12a.gif',1)"><img src="images/index_12.gif" name="Image12" width="110" height="35" border="0" id="Image12" /></a></td>
        <td><a href="member.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image281','','images/index_14a.gif',1)"><img src="images/index_14.gif" name="Image281" width="110" height="35" border="0" id="Image281" /></a></td>
        <td width="110" background="images/index_09.gif"><a href="member.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image28','','images/index_14a.gif',1)"><img src="images/index_16.gif" width="52" height="35" border="0" /></a></td>
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
                  <td width="357"><!-- InstanceBeginEditable name="EditRegion1" --><img src="images/news/news_03.jpg" width="357" height="147" /><!-- InstanceEndEditable --></td>
                  <td><!-- InstanceBeginEditable name="EditRegion2" -->
                    <table width="438" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20"><img src="images/red.gif" width="20" height="40" /></td>
                        <td width="189" align="left" bgcolor="#900044"><img src="images/news/news_05.gif" width="189" height="40" /></td>
                        <td align="left" bgcolor="#900044"><img src="images/news/news_06.jpg" width="229" height="40" /></td>
                      </tr>
                      <tr>
                        <td rowspan="2"><img src="images/link_back.gif" width="20" height="107" /></td>
                        <td valign="top" bgcolor="#FCFBF0"><a href="#a" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image124','','images/news/news_a_07.gif',1)"><img src="images/news/news_07.gif" name="Image124" width="190" height="55" border="0" id="Image124" /></a></td>
                        <td rowspan="2" valign="top" bgcolor="#FCFBF0"><img src="images/news/news_08.jpg" width="228" height="106" /></td>
                      </tr>
                      <tr>
                        <td valign="top" bgcolor="#FCFBF0"><a href="#b" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image125','','images/news/news_a_09.gif',1)"><img src="images/news/news_09.gif" name="Image125" width="190" height="52" border="0" id="Image125" /></a></td>
                      </tr>
                    </table>
                  <!-- InstanceEndEditable --></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td valign="top"><table width="795" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="3" valign="top" background="images/index_40.gif"><img src="images/index_35.gif" width="3" height="39" /></td>
                  <td width="792" rowspan="2" valign="top" bgcolor="#F4F4E8"><!-- InstanceBeginEditable name="EditRegion5" -->
                    <table width="795" border="0" cellpadding="0" cellspacing="0" bgcolor="#F4F4E8">
                      <tr>
                        <td width="20"><img src="images/box.gif" width="20" height="20" /></td>
                        <td colspan="2" rowspan="2"><strong class="title_red_13b">動態訊息<a name="a" id="a"></a></strong></td>
                      </tr>
                      <tr>
                        <td width="20" rowspan="6">&nbsp;</td>
                      </tr>
                      <tr>
                        <td width="751">
                        
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="50" class="text12gray1"><%=rs1("m_tr_date")%></td>
                              <td width="15"><img src="images/index_46.gif" width="7" height="12" /></td>
                              <td width="705" class="text12red1">央行動態<strong class="title_red_13b"><a name="w" id="w"></a></strong></td>
                            </tr>
                            <tr>
                              <td width="50" valign="top" class="text12gray1"><img src="images/box.gif" width="50" height="5" /></td>
                              <td width="15" rowspan="2" valign="top"><img src="images/box.gif" width="15" height="5" /></td>
                              <td rowspan="2" class="text12gray1"><%=Replace(rs1("text_1").value, Chr(10), "<BR>")%></tr>
                            <tr>
                              <td valign="bottom" class="text12gray1">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="3" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                            </tr>
                          </table>                        
                        
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="50" class="text12gray1"><%=rs2("m_tr_date")%></td>
                            <td width="15"><img src="images/index_46.gif" width="7" height="12" /></td>
                            <td width="705" class="text12red1">拆款行情<strong class="title_red_13b"><a name="x" id="x"></a></strong></td>
                          </tr>
                          <tr>
                            <td width="50" valign="top" class="text12gray1"><img src="images/box.gif" width="50" height="5" /></td>
                            <td width="15" rowspan="2" valign="top"><img src="images/box.gif" width="15" height="5" /></td>
                            <td rowspan="2" class="text12gray1"><%=Replace(rs2("text_1").value, Chr(10), "<BR>")%></td>
                          </tr>
                          <tr>
                            <td valign="bottom" class="text12gray1">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="3" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="50" class="text12gray1"><%=rs3("m_tr_date")%></td>
                            <td width="15"><img src="images/index_46.gif" width="7" height="12" /></td>
                            <td width="705" class="text12red1">匯市行情<strong class="title_red_13b"><a name="x" id="x"></a></strong></td>
                          </tr>
                          <tr>
                            <td width="50" valign="top" class="text12gray1"><img src="images/box.gif" width="50" height="5" /></td>
                            <td width="15" rowspan="2" valign="top"><img src="images/box.gif" width="15" height="5" /></td>
                            <td rowspan="2" class="text12gray1"><%=Replace(rs3("text_1").value, Chr(10), "<BR>")%></td>
                          </tr>
                          <tr>
                            <td valign="bottom" class="text12gray1">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="3" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="50" class="text12gray1"><%=rs4("m_tr_date")%></td>
                            <td width="15"><img src="images/index_46.gif" width="7" height="12" /></td>
                            <td width="705" class="text12red1">債券行情<strong class="title_red_13b"><a name="z" id="z"></a></strong></td>
                          </tr>
                          <tr>
                            <td width="50" valign="top" class="text12gray1"><img src="images/box.gif" width="50" height="5" /></td>
                            <td width="15" rowspan="2" valign="top"><img src="images/box.gif" width="15" height="5" /></td>
                            <td rowspan="2" class="text12gray1"><%=Replace(rs4("text_1").value, Chr(10), "<BR>")%></td>
                          </tr>
                          <tr>
                            <td valign="bottom" class="text12gray1">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="3" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="right" valign="top"><span class="title_red_13b"><a name="b" id="b"></a><a href="#top"><img src="images/top_1.gif" width="46" height="15" border="0" /></a></span></td>
                      </tr>
                      <tr>
                        <td valign="top"><div class="title_red_13b">重要事項<a name="b" id="b"></a></div></td>
                      </tr>
                      <tr>
                        <td valign="top"><table width="750" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="375" valign="top"><table width="350" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="15" valign="top" class="text12gray1"><img src="images/index_46.gif" width="7" height="12" /></td>
                                    <td width="350" class="text12gray1"><a href="pdf/兆豐金融控股股份有限公司客戶資料保密措施1090709.pdf" target="_blank" class="link12gray">兆豐金融控股公司及其子公司客戶資料保密措施</a> </td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                  </tr>
                                </table>
                                  <table width="350" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="15" valign="top" class="text12gray1"><img src="images/index_46.gif" width="7" height="12" /></td>
                                      <td width="350" class="text12gray1">客訴聯絡人窗口：管理部，聯絡電話：(02)2381-0033</td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                    </tr>
                                  </table>
                                  <table width="350" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="15" valign="top" class="text12gray1"><img src="images/index_46.gif" width="7" height="12" /></td>
                                      <td width="350"><span class="text12gray1">定型化契約</span>(<a href="FILE/agree.pdf" target="_blank" class="link12gray">委任保證發行商業本票約定書</a>、<a href="FILE/bond.pdf" target="_blank" class="link12gray">債券及固定收益有價證券附條件買賣總契約</a><span class="text12gray1">及其</span><a href="FILE/bond2.pdf" target="_blank" class="link12gray">補充約定</a>、<a href="FILE/bill.pdf" target="_blank" class="link12gray">票券附條件買賣總契約</a><span class="text12gray1">及其</span><a href="FILE/bill2.pdf" target="_blank" class="link12gray">補充約定</a>)<span class="text12gray1">範本下載</span></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                    </tr>
                                  </table></td>
                              <td width="375" valign="top"><table width="350" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="15" valign="top" class="text12gray1"><img src="images/index_46.gif" width="7" height="12" /></td>
                                      <td width="350" class="text12gray1"><a href="news.asp" class="link12gray">債權債務協商及處理股票質借暫行補充原則之諮詢申訴協調窗口：風控部，聯絡人：林政毅，聯絡電話：02-2316-8830<br />
不良債權售後申訴處理窗口：風控部，聯絡人：徐毅智，聯絡電話：02-2316-8825</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                    </tr>
                                  </table>
                                  <table width="350" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="15" valign="top" class="text12gray1"><img src="images/index_46.gif" width="7" height="12" /></td>
                                      <td width="350" class="text12gray1"><a href="pdf/公務機關查詢解繳扣押款收費標準.pdf" class="link12gray">公務機關查詢解繳扣押款收費標準</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                    </tr>
                                </table>
                                  <table width="350" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="15" valign="top" class="text12gray1"><img src="images/index_46.gif" width="7" height="12" /></td>
                                      <td width="350" class="text12gray1"><a href="file/20121228.pdf" class="link12gray"></a><a href="FILE/person10212a.pdf" class="link12gray">蒐集處理及利用個人資料告知事項</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                    </tr>
                                  </table>
                                  <table width="350" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="15" valign="top" class="text12gray1"><img src="images/index_46.gif" width="7" height="12" /></td>
                                      <td width="350" class="text12gray1"><a href="file/20121228.pdf" class="link12gray"></a><a href="pdf/W-8BEN-E2022216.pdf" class="link12gray">本公司已向美國國稅局(Internal Revenue Service，簡稱IRS)申請登記為FATCA法案合規之金融機構(Participating Foreign Financial Institution，簡稱PFFI)並獲給GIIN碼。本公司之W-8BEN-E影本，如下供參：W-8BEN-E</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                    </tr>
                                  </table></td>
                            </tr>
                        </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="50" class="text12gray1">98/08/24</td>
                              <td width="15"><img src="images/index_46.gif" width="7" height="12" /></td>
                              <td width="705" class="text12red1">本公司辦理減資<strong class="title_red_13b"><a name="a" id="a"></a></strong></td>
                            </tr>
                            <tr>
                              <td width="50" valign="top" class="text12gray1"><img src="images/box.gif" width="50" height="5" /></td>
                              <td width="15" rowspan="2" valign="top"><img src="images/box.gif" width="15" height="5" /></td>
                              <td rowspan="2" class="text12gray1">本公司辦理減資20億元案業經主管機關核准後，於98年6月23日第12屆第5次董事會代
                                行股東會職權決議通過，98年8月3日為減資基準日，減資後本公司資本額為
                                13,114,410,840元。</td>
                            </tr>
                            <tr>
                              <td valign="bottom" class="text12gray1">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="3" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                            </tr>
                          </table>
                          <br />
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="50" class="text12gray1">96/05/30</td>
                              <td width="15"><img src="images/index_46.gif" width="7" height="12" /></td>
                              <td width="705" class="text12red1">本公司辦理減資<strong class="title_red_13b"><a name="a" id="a"></a></strong></td>
                            </tr>
                            <tr>
                              <td width="50" valign="top" class="text12gray1"><img src="images/box.gif" width="50" height="5" /></td>
                              <td width="15" rowspan="2" valign="top"><img src="images/box.gif" width="15" height="5" /></td>
                              <td rowspan="2" class="text12gray1">本公司辦理減資50億元案業經主管機關核准後，於96年5月29日第11屆第15次董事會代
                                行股東會職權決議通過，96年7月2日為減資基準日，減資後本公司資本額為
                                15,114,410,840元。</td>
                            </tr>
                            <tr>
                              <td valign="bottom" class="text12gray1">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="3" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                            </tr>
                          </table>
                          <br />
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="50" class="text12gray1">95/6/26</td>
                              <td width="15"><img src="images/index_46.gif" width="7" height="12" /></td>
                              <td width="705" class="text12red1">本公司將於6月26日正式更名為「兆豐票券金融股份有限公司」<strong class="title_red_13b"><a name="a" id="a"></a></strong></td>
                            </tr>
                            <tr>
                              <td width="50" valign="top" class="text12gray1"><img src="images/box.gif" width="50" height="5" /></td>
                              <td width="15" rowspan="2" valign="top"><img src="images/box.gif" width="15" height="5" /></td>
                              <td rowspan="2" class="text12gray1">親愛的客戶，您好：<br />
                                中興票券創業至今，已歷經三十年，由衷感謝您長久以來對本公司的愛護及支持，如今為配合兆豐金融集團建立整體一致企業形象，強化客戶對本金融集團之認同與信任，並為客戶提供完整金融服務，本公司預計於95年6月26日正式更名為「兆豐票券金融股份有限公司」。<br />
                                更名後之兆豐票券，經營主體完全不變，對您的權益有任何影響，全體同仁仍將秉持既有優良的經營理念，結合集團力量，持續為您提供最好的服務，期待您繼續給予本公司支持及指教。</td>
                            </tr>
                            <tr>
                              <td valign="bottom" class="text12gray1">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="3" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="50" class="text12gray1">95/3/28</td>
                              <td width="15"><img src="images/index_46.gif" width="7" height="12" /></td>
                              <td width="708" class="text12red1">本公司總公司遷址啟事<span class="text12gray1"><a name="b" id="b"></a></span></td>
                            </tr>
                            <tr>
                              <td width="50" valign="top" class="text12gray1"><img src="images/box.gif" width="50" height="5" /></td>
                              <td width="15" rowspan="2" valign="top"><img src="images/box.gif" width="15" height="5" /></td>
                              <td rowspan="2" class="text12gray1">本公司總公司原預定於94年12月26日遷至台北市衡陽路91號「交通銀行大樓」地下一樓、地上二至五樓、九至十樓新址營業案，業經94年10月25日第10屆第32次董事會決議通過，並獲主管機關以94年11月29日金管銀（六）字第0940032003號函復准予照辦。茲因配合金控母公司集團整體規劃時程安排，經95年3月28日第10屆第37次董事會決議通過，修正於新址營業之預定日為95年5月2日。</td>
                            </tr>
                            <tr>
                              <td valign="bottom" class="text12gray1">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="3" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="50" class="text12gray1">94/4/26</td>
                              <td width="15"><img src="images/index_46.gif" width="7" height="12" /></td>
                              <td width="705" class="text12red1">本公司辦理減資<span class="text12gray1"><a name="c" id="c"></a></span></td>
                            </tr>
                            <tr>
                              <td valign="top" class="text12gray1"><img src="images/box.gif" width="50" height="5" /></td>
                              <td width="15" rowspan="2" valign="top"><img src="images/box.gif" width="15" height="5" /></td>
                              <td width="695" rowspan="2" class="text12gray1">本公司辦理減資50億元案業經主管機關核准後，於94年3月29第10屆第26次董事會代行股東會職權決議通過，94年5月3日為減資基準日，減資後本公司資本額為20,114,410,840元。</td>
                            </tr>
                            <tr>
                              <td valign="bottom" class="text12gray1">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="3" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="50" class="text12gray1">93/8/28</td>
                              <td width="15"><img src="images/index_46.gif" width="7" height="12" /></td>
                              <td width="705" class="text12red1">本公司辦理減資<span class="text12gray1"><a name="d" id="d"></a></span></td>
                            </tr>
                            <tr>
                              <td valign="top" class="text12gray1"><img src="images/box.gif" width="50" height="5" /></td>
                              <td width="15" rowspan="2" valign="top"><img src="images/box.gif" width="15" height="5" /></td>
                              <td width="695" rowspan="2" class="text12gray1">本公司辦理減資30億元案業經主管機關核准後，於93年8月27第10屆第18次董事會代行股東會職權決議通過，93年9月1日為減資基準日，減資後本公司資本額為25,114,410,840元。</td>
                            </tr>
                            <tr>
                              <td valign="bottom" class="text12gray1">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="3" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="50" class="text12gray1">91/7/9</td>
                              <td width="15"><img src="images/index_46.gif" width="7" height="12" /></td>
                              <td width="705" class="text12red1">本公司加入交銀金控<span class="text12gray1"><a name="e" id="e"></a></span></td>
                            </tr>
                            <tr>
                              <td valign="top" class="text12gray1"><img src="images/box.gif" width="50" height="5" /></td>
                              <td width="15" rowspan="2" valign="top"><img src="images/box.gif" width="15" height="5" /></td>
                              <td width="695" rowspan="2" class="text12gray1"> 公告本公司第九屆第三次臨時董事會訂定91.8.22.為中興票券金融(股)公司轉換為交銀金融控股(股)公司子公司之股份轉換基準日。
                                本股份轉換日由交銀金融控股(股)公司及中興票券金融(股)公司於91.06.12.九十一年度股東常會決議通過授權各該董事會訂定同一日為股份轉換基準日。 </td>
                            </tr>
                            <tr>
                              <td valign="bottom" class="text12gray1">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="3" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="30" colspan="2" align="right"><span class="title_red_13b"><a href="#top"><img src="images/top_1.gif" width="46" height="15" border="0" /></a></span></td>
                      </tr>
                    </table>
                  <!-- InstanceEndEditable --></td>
                </tr>
                <tr>
                  <td valign="top" bgcolor="#4C4C4C"><img src="images/index_40.gif" width="3" height="193" /></td>
                </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30" align="center" bgcolor="#5B5B5B"><img src="images/index_64.gif" width="228" height="20" /></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
