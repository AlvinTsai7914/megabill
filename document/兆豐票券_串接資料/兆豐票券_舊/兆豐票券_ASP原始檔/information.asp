<%
  const adCmdText = 1
  const RecordsAffected = 20
  Set conn = Server.CreateObject("ADODB.Connection")
  conn.open "Data Source=ebond;Password=eceric;User ID=ec"
  'CommandText1 = "select to_char(max(tr_date),'yyyymmdd'),max(tr_date) from cm010 where tr_date <= to_date(" + tmp_date+",'yyyymmdd')" 
  CommandText1 = "select * from cm028 order by yymm desc"
  Set rs1 = Server.CreateObject("ADODB.Recordset")
  rs1.Open commandtext1,conn
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/page1.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>兆豐票券--金融資訊</title>
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
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body onload="MM_preloadImages('images/index_10a.gif','images/index_11a.gif','images/index_12a.gif','images/index_13a.gif','images/index_22.gif','images/index_25.gif','images/index_27.gif','images/index_29.gif','images/index_31.gif','images/index_33.gif','images/index_52.gif','images/index_14a.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_03.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_04.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_05.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_06.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_07.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_08.gif','images/index_15a.gif','images/information/information_a_05.gif','images/information/information_a_06.gif','images/information/information_a_07.gif')">
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
                  <td width="357"><!-- InstanceBeginEditable name="EditRegion1" --><img src="images/information.jpg" width="357" height="147" /><!-- InstanceEndEditable --></td>
                  <td><!-- InstanceBeginEditable name="EditRegion2" -->
                    <table width="438" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><img src="images/information/information_03.gif" width="179" height="40" /></td>
                        <td rowspan="4" align="left"><img src="images/information/information_04.jpg" width="259" height="146" /></td>
                      </tr>
                      <tr>
                        <td><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image97','','images/information/information_a_06.gif',1)"></a><a href="#a" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image51','','images/information/information_a_05.gif',1)"><img src="images/information/information_05.gif" name="Image51" width="179" height="34" border="0" id="Image51" /></a></td>
                      </tr>
                      <tr>
                        <td><a href="#b" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image52','','images/information/information_a_06.gif',1)"><img src="images/information/information_06.gif" name="Image52" width="179" height="30" border="0" id="Image52" /></a><a href="#b" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image98','','images/information/information_a_07.gif',1)"></a></td>
                      </tr>
                      <tr>
                        <td><a href="#c" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image53','','images/information/information_a_07.gif',1)"><img src="images/information/information_07.gif" name="Image53" width="179" height="42" border="0" id="Image53" /></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image99','','images/information/information_a_08.gif',1)"></a></td>
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
                    <table width="795" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20" rowspan="16"><img src="images/space.gif" width="20" height="20" /></td>
                        <td height="10" valign="top" class="tutle_12b"><img src="images/space.gif" width="10" height="10" /></td>
                      </tr>
                      <tr>
                        <td height="20" class="tutle_12b"><p>總體經濟指標 </p></td>
                      </tr>
                      <tr>
                        <td class="text12gray1">單位％</td>
                      </tr>
                      
                      <tr>
                        <td><table width="775" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td bgcolor="#FFFFFF"><table width="775" border="0" cellspacing="1" cellpadding="5">
                                      <tr> 
                                        <td width="55" height="25" align="center" bgcolor="#DCD2A7" class="text12b_brown">日期</td>
                                        <td width="140" align="center" bgcolor="#DCD2A7" class="text12b_brown">景氣對策信號分數</td>
                                        <td width="140" align="center" bgcolor="#DCD2A7" class="text12b_brown">領先指標綜合指數</td>
                                        <td width="140" align="center" bgcolor="#DCD2A7" class="text12b_brown">消費者物價指數年增率</td>
                                        <td width="140" align="center" bgcolor="#DCD2A7" class="text12b_brown">躉售物價指數年增率</td>
                                        <td width="86" align="center" bgcolor="#DCD2A7" class="text12b_brown">失業率</td>
                                      </tr>
                                    </table></td>
                            </tr>
                            <% k=1
                               Do until rs1.EOF or k > 13    %>
                              <tr>
                              <td bgcolor="#FFFFFF"><table width="775" border="0" cellspacing="1" cellpadding="5">
                                      <tr bgcolor="#E7E2C5"> 
                                        <td width="55" height="25" align="center" class="text12b_brown"><%=rs1("yymm")%></td>
                                        <td width="140" align="center" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("ind_no")%></td>
                                        <td width="140" align="center" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("leading_idx")%></td>
                                        <td width="140" align="center" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("cpi")%></td>
                                        <td width="140" align="center" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("wpi")%></td>
                                        <td width="86" align="center" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("un_rate")%></td>
                                      </tr>
                                    </table></td>
                            </tr>
                            <% k=k+1 
                               rs1.movenext
                               loop
                             %>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="right"><a href="#top"><img src="images/top_1.gif" width="46" height="15" border="0" /></a></td>
                      </tr>
                      <tr>
                        <td><a name="b" id="b"></a></td>
                      </tr>
                      <tr>
                        <td height="20" class="tutle_12b">金融及貿易指標</td>
                      </tr>
                      <tr>
                        <td valign="top"><p class="text12gray1">單位％ </p></td>
                      </tr>
                      <tr>
                        <td valign="top"><table width="775" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td bgcolor="#FFFFFF"><table width="775" border="0" cellspacing="1" cellpadding="5">
                                  <tr>
                                    <td width="55" height="25" align="center" bgcolor="#DCD2A7" class="text12b_brown">日期</td>
                                    <td width="135" align="center" bgcolor="#DCD2A7" class="text12b_brown">Ｍ１Ａ年增率</td>
                                    <td width="135" align="center" bgcolor="#DCD2A7" class="text12b_brown">Ｍ１Ｂ年增率</td>
                                    <td width="135" align="center" bgcolor="#DCD2A7" class="text12b_brown">Ｍ２年增率</td>
                                    <td width="135" align="center" bgcolor="#DCD2A7" class="text12b_brown">進口貿易年增率</td>
                                    <td align="center" bgcolor="#DCD2A7" class="text12b_brown">出口貿易年增率</td>
                                  </tr>
                              </table></td>
                            </tr>
                            <% rs1.movefirst
                               k=1
                               Do until rs1.EOF or k > 13    %>
                            <tr>
                              <td bgcolor="#FFFFFF"><table width="775" border="0" cellspacing="1" cellpadding="5">
                                  <tr bgcolor="#E7E2C5">
                                    <td width="55" height="25" align="center" class="text12b_brown"><%=rs1("yymm")%></td>
                                    <td width="135" align="center" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("m1a")%></td>
                                    <td width="135" align="center" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("m1b")%></td>
                                    <td width="135" align="center" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("m2")%></td>
                                    <td width="135" align="center" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("imp_rate")%></td>
                                    <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("exp_rate")%></td>
                                  </tr>
                              </table></td>
                            </tr>
                        <% k=k+1 
                               rs1.movenext
                               loop
                             %>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="right"><a href="#top"><img src="images/top_1.gif" width="46" height="15" border="0" /></a></td>
                      </tr>
                      <tr>
                        <td><a name="c" id="c"></a></td>
                      </tr>
                      <tr>
                        <td height="20" class="tutle_12b">貨幣市場利率指標</td>
                      </tr>
                      <tr>
                        <td height="20" class="text12gray1">單位％</td>
                      </tr>
                      <tr>
                        <td valign="top"><table width="775" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td bgcolor="#FFFFFF"><table width="775" border="0" cellspacing="1" cellpadding="5">
                                <tr>
                                  <td width="51" height="25" rowspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown">項目</td>
                                  <td width="116" rowspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown">隔夜拆款<br />
            平均利率</td>
                                  <td colspan="3" align="center" bgcolor="#DCD2A7" class="text12b_brown">商業本票初級市場平均發行利率</td>
                                  <td colspan="3" align="center" bgcolor="#DCD2A7" class="text12b_brown">商業本票次級市場平均發行利率</td>
                                </tr>
                                <tr>
                                  <td width="85" align="center" bgcolor="#DCD2A7" class="text12b_brown">1-30天</td>
                                  <td width="85" align="center" bgcolor="#DCD2A7" class="text12b_brown">31-90天</td>
                                  <td width="85" align="center" bgcolor="#DCD2A7" class="text12b_brown">91-180天</td>
                                  <td width="85" align="center" bgcolor="#DCD2A7" class="text12b_brown">1-30天</td>
                                  <td width="85" align="center" bgcolor="#DCD2A7" class="text12b_brown">31-90天</td>
                                  <td width="85" align="center" bgcolor="#DCD2A7" class="text12b_brown">91-180天</td>
                                </tr>
                                <% rs1.movefirst
                               k=1
                               Do until rs1.EOF or k > 13    %>
                                <tr>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12b_brown2"><%=rs1("yymm")%></td>
                                  <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("on_rate")%></td>
                                  <td align="center" valign="top" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("p30")%></td>
                                  <td align="center" valign="top" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("p90")%></td>
                                  <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("p180")%></td>
                                  <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("s30")%></td>
                                  <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("s90")%></td>
                                  <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=rs1("s180")%></td>
                                </tr>
                            <% k=k+1 
                               rs1.movenext
                               loop
                             %>
                            </table></td>
                          </tr>
                        </table></td>
                      </tr>
                      
                      
                      
                      <tr>
                        <td align="right"><a href="#top"><img src="images/top_1.gif" width="46" height="15" border="0" /></a></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
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
