<%
  const adCmdText = 1
  const RecordsAffected = 20
  tmp_y= datepart("yyyy",date)
  tmp_m= datepart("m",date)
  tmp_d= datepart("d",date)
  tmp_date = cstr(tmp_y*10000+tmp_m*100+tmp_d)
  Set conn = Server.CreateObject("ADODB.Connection")
  conn.open "Data Source=ebond;Password=eceric;User ID=ec"
  CommandText1 = "select to_char(max(tr_date),'yyyymmdd'),max(tr_date) from cm010 where tr_date <= to_date(" + tmp_date+",'yyyymmdd')"   
  Set rs1 = Server.CreateObject("ADODB.Recordset")  
  rs1.Open commandtext1,conn
  tmp_y= datepart("yyyy",rs1(1).Value)
  tmp_m= datepart("m",rs1(1).Value)
  tmp_d= datepart("d",rs1(1).Value)
  tmp_c_date1 = cstr(tmp_y-1911)+"/"+cstr(tmp_m)+"/"+cstr(tmp_d)
  tmp_c_date = rs1(0).value
  
  CommandText1n = "select to_char(min(tr_date),'yyyymmdd'),min(tr_date) from cm010 where tr_date > to_date(" + tmp_date+",'yyyymmdd')" 
  Set rs1n = Server.CreateObject("ADODB.Recordset")
  rs1n.Open commandtext1n,conn
  tmp_yn= datepart("yyyy",rs1n(1).Value)
  tmp_mn= datepart("m",rs1n(1).Value)
  tmp_dn= datepart("d",rs1n(1).Value)
  tmp_c_date1n = cstr(tmp_y-1911)+"/"+cstr(tmp_m)+"/"+cstr(tmp_d)
  tmp_c_daten = rs1n(0).value
  
  '算出美元票券最近有利率報價之日期
  CommandText_us_date = "select to_char(max(tr_date),'yyyymmdd')max_tr_date,max(tr_date) from fcm010 where cp2_rate is not null and dl_type = 'USD' and tr_date <= to_date(" + tmp_date+",'yyyymmdd')"   
  'CommandText_us_date = "select to_char(max(tr_date),'yyyymmdd')max_tr_date,max(tr_date) from cm010 where cp2_rate is not null and tr_date <= to_date(" + tmp_date+",'yyyymmdd')" 
  Set rs_us_date = Server.CreateObject("ADODB.Recordset")
  rs_us_date.Open commandtext_us_date,conn 
  tmp_y= datepart("yyyy",rs_us_date(1).Value)
  tmp_m= datepart("m",rs_us_date(1).Value)
  tmp_d= datepart("d",rs_us_date(1).Value)
  tmp_us_date = cstr(tmp_y-1911)+"/"+cstr(tmp_m)+"/"+cstr(tmp_d)
  
  CommandText_us_daten = "select to_char(min(tr_date),'yyyymmdd')max_tr_date,min(tr_date) from fcm010 where cp2_rate is not null and dl_type = 'USD' and tr_date > to_date(" + tmp_date+",'yyyymmdd')" 
  Set rs_us_daten = Server.CreateObject("ADODB.Recordset")
  rs_us_daten.Open commandtext_us_daten,conn 
  tmp_yn= datepart("yyyy",rs_us_date(1).Value)
  tmp_mn= datepart("m",rs_us_date(1).Value)
  tmp_dn= datepart("d",rs_us_date(1).Value)
  tmp_us_daten = cstr(tmp_y-1911)+"/"+cstr(tmp_m)+"/"+cstr(tmp_d)

Function bi_rate(day,bi_type)
  'CommandText = "select nvl("+ bi_type + ",0) from cm010 where tr_date = to_date(" + tmp_c_date + ",'yyyymmdd') and rate_Day =" + cstr(day)
  if bi_type = "bi_b_rate" or bi_type = "bi_s_rate" or bi_type = "abcp_b_rate" or bi_type = "abcp_s_rate" or bi_type = "bd_b_rate" or bi_type = "bd_s_rate"then
    CommandText = "select nvl("+ bi_type + ",0) from cm010 where tr_date = to_date(" + tmp_c_date + ",'yyyymmdd') and rate_Day =" + cstr(day)
  else
    'CommandText = "select nvl("+ bi_type + ",0) from cm010 where tr_date = to_date(" + tmp_c_date + ",'yyyymmdd')+1 and rate_Day =" + cstr(day)
	CommandText = "select nvl("+ bi_type + ",0) from cm010 where tr_date = to_date(" + tmp_c_daten + ",'yyyymmdd') and rate_Day =" + cstr(day)
  end if
  Set rs = Server.CreateObject("ADODB.Recordset")
  rs.Open commandtext,conn
  
  if cstr(rs(0)) = "0" then
    bi_rate = "-"
  else
    bi_rate = FormatNumber(rs(0),3,,,-1)
  end if  
End Function


Function us_bi_rate(day,bi_type)
  if bi_type = "bi_b_rate" or bi_type = "bi_s_rate" or bi_type = "abcp_b_rate" or bi_type = "abcp_s_rate" or bi_type = "bd_b_rate" or bi_type = "bd_s_rate"then
    CommandText_us_rate = "select nvl("+ bi_type + ",0) from fcm010 where dl_type = 'USD' and tr_date = to_date(" + rs_us_date(0) + ",'yyyymmdd') and rate_Day =" + cstr(day)
  else
    'CommandText_us_rate = "select nvl("+ bi_type + ",0) from fcm010 where dl_type = 'USD' and tr_date = to_date(" + rs_us_date(0) + ",'yyyymmdd')+1 and rate_Day =" + cstr(day)
	CommandText_us_rate = "select nvl("+ bi_type + ",0) from fcm010 where dl_type = 'USD' and tr_date = to_date(" + rs_us_daten(0) + ",'yyyymmdd') and rate_Day =" + cstr(day)
  end if
  'CommandText_us_rate = "select nvl("+ bi_type + ",0) from cm010 where tr_date = to_date(" + rs_us_date(0) + ",'yyyymmdd') and rate_Day =" + cstr(day)
  
  Set rs_us_rate = Server.CreateObject("ADODB.Recordset")
  rs_us_rate.Open commandtext_us_rate,conn
  
  if rs_us_rate.eof then
    us_bi_rate = "--"
  else
    if cstr(rs_us_rate(0)) = "0" then
      us_bi_rate = "-"
    else
      us_bi_rate = FormatNumber(rs_us_rate(0),3,,,-1)
    end if    
  end if
End Function

Function f_cd_rate(dl_type,day,bi_type)
  CommandText_f_cd_rate = "select nvl("+ bi_type + ",0) from fcm010 where dl_type = '"+ dl_type +"' and tr_date = to_date(" + rs_us_date(0) + ",'yyyymmdd') and rate_Day =" + cstr(day)  
  
  Set rs_f_cd_rate = Server.CreateObject("ADODB.Recordset")
  rs_f_cd_rate.Open commandtext_f_cd_rate,conn
  
  if rs_f_cd_rate.eof then
    f_cd_rate = "--"
  else
    if cstr(rs_f_cd_rate(0)) = "0" then
      f_cd_rate = "-"
    else
      f_cd_rate = FormatNumber(rs_f_cd_rate(0),3,,,-1)
    end if    
  end if
End Function

%>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/page1.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>兆豐票券--法定公開揭露事項</title>
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
.style3 {
	font-size: 12px;
	color: #5A5A5A;
}
.style4 {font-size: 12px}
-->
</style>
<!-- InstanceEndEditable -->
</head>

<body onload="MM_preloadImages('images/index_10a.gif','images/index_11a.gif','images/index_12a.gif','images/index_13a.gif','images/index_22.gif','images/index_25.gif','images/index_27.gif','images/index_29.gif','images/index_31.gif','images/index_33.gif','images/index_52.gif','images/index_14a.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_03.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_04.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_05.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_06.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_07.gif','file:///E|/Shelly/shelly-work/兆豐/images/service/service_a_08.gif','images/index_15a.gif','images/disclosure/disclosure_a_07.gif','images/disclosure/disclosure_a_08.gif','images/disclosure/disclosure_a_09.gif','images/disclosure/disclosure_a_10.gif','images/disclosure/disclosure_a_11.gif')">
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
                  <td width="357"><!-- InstanceBeginEditable name="EditRegion1" --><img src="images/DISCLOSURE.jpg" width="357" height="147" /><!-- InstanceEndEditable --></td>
                  <td><!-- InstanceBeginEditable name="EditRegion2" -->
                    <table width="438" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20"><img src="images/red.gif" width="20" height="40" /></td>
                        <td width="190" align="left" bgcolor="#900044"><img src="images/disclosure/disclosure_05.gif" width="190" height="40" /></td>
                        <td align="left" bgcolor="#900044"><img src="images/disclosure/disclosure_06.gif" width="228" height="40" /></td>
                      </tr>
                      <tr>
                        <td><img src="images/link_back.gif" width="20" height="107" /></td>
                        <td colspan="2" valign="top" bgcolor="#FCFBF0"><table width="418" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><a href="#a" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image125','','images/disclosure/disclosure_a_07.gif',1)"><img src="images/disclosure/disclosure_07.gif" name="Image125" width="159" height="37" border="0" id="Image125" /></a></td>
                              <td><a href="#D" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image128','','images/disclosure/disclosure_a_08.gif',1)"><img src="images/disclosure/disclosure_08.gif" name="Image128" width="259" height="37" border="0" id="Image128" /></a></td>
                            </tr>
                            <tr>
                              <td><a href="#b" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image126','','images/disclosure/disclosure_a_09.gif',1)"><img src="images/disclosure/disclosure_09.gif" name="Image126" width="159" height="36" border="0" id="Image126" /></a></td>
                              <td rowspan="2"><a href="#E" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image129','','images/disclosure/disclosure_a_10.gif',1)"><img src="images/disclosure/disclosure_10.gif" name="Image129" width="259" height="70" border="0" id="Image129" /></a></td>
                            </tr>
                            <tr>
                              <td><a href="#c" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image127','','images/disclosure/disclosure_a_11.gif',1)"><img src="images/disclosure/disclosure_11.gif" name="Image127" width="159" height="34" border="0" id="Image127" /></a></td>
                            </tr>
                        </table></td>
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
                    <table width="790" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="20" rowspan="12"><img src="images/box.gif" width="20" height="20" /></td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><table width="700" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td colspan="2" valign="top" bgcolor="#DCD2A7"><span class="title_red_13b">財務報告</span></td>
                          </tr>
                          <tr>
                                  <td width="330" valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                      <td width="335"><a href="pdf/disclosure/financial/110.pdf" target="_blank" class="link12gray">110年度財務報告。</a></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                    </tr>
                                  </table>
                                    <table width="300" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                        <td width="335"><a href="pdf/disclosure/financial/110Q3.pdf" target="_blank" class="link12gray">110年度第三季財務報告。</a></td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                      </tr>
                                    </table>
                                    <table width="300" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                        <td width="335"><a href="pdf/disclosure/financial/110Q2.pdf" target="_blank" class="link12gray">110年度第二季財務報告。</a></td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                      </tr>
                                    </table>
                                    <table width="300" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                        <td width="335"><a href="pdf/disclosure/financial/110Q1.pdf" target="_blank" class="link12gray">110年度第一季財務報告。</a></td>
                                      </tr>
                                      <tr>
                                        <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                      </tr>
                                    </table>
                                    <table width="300" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                        <td width="335"><a href="pdf/disclosure/financial/109.pdf" target="_blank" class="link12gray">109年度財務報告。</a></td>
                                      </tr>
                                    <tr>
                                      <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                      </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/109Q3.pdf" target="_blank" class="link12gray">109年度第三季財務報告。</a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/109Q2.pdf" target="_blank" class="link12gray">109年度第二季財務報告。</a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/109Q1.pdf" target="_blank" class="link12gray">109年度第一季財務報告。</a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/108.pdf" target="_blank" class="link12gray">108年度財務報告。</a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/108Q3.pdf" target="_blank" class="link12gray">108年度第三季財務報告。</a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/108Q2.pdf" target="_blank" class="link12gray">108年度第二季財務報告。</a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/108Q1.pdf" target="_blank" class="link12gray">108年度第一季財務報告。</a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/107.pdf" target="_blank" class="link12gray">107年度財務報告。</a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/107Q3.pdf" target="_blank" class="link12gray">107年度第三季財務報告。</a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/107Q2.pdf" target="_blank" class="link12gray">107年度第二季財務報告。</a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/107Q1.pdf" target="_blank" class="link12gray">107年度第一季財務報告。</a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/106.pdf" target="_blank" class="link12gray">106年度財務報告。</a><a href="#" class="link12gray"></a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/106Q3.pdf" target="_blank" class="link12gray">106年度第三季財務報告。</a><a href="#" class="link12gray"></a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/106Q2.pdf" target="_blank" class="link12gray">106年度第二季財務報告。</a><a href="#" class="link12gray"></a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/106Q1.pdf" target="_blank" class="link12gray">106年度第一季財務報告。</a><a href="#" class="link12gray"></a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/105.pdf" target="_blank" class="link12gray">105年度財務報告。</a><a href="#" class="link12gray"></a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/105Q3.pdf" target="_blank" class="link12gray">105年度第三季財務報告。</a><a href="#" class="link12gray"></a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/105Q2.pdf" target="_blank" class="link12gray">105年度第二季財務報告。</a><a href="#" class="link12gray"></a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/105Q1.pdf" target="_blank" class="link12gray">105年度第一季財務報告。</a><a href="#" class="link12gray"></a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/104.pdf" target="_blank" class="link12gray">104年度財務報告。</a><a href="#" class="link12gray"></a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/104Q3.pdf" target="_blank" class="link12gray">104年度第三季財務報告。</a><a href="#" class="link12gray"></a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                          <td width="335"><a href="pdf/disclosure/financial/104Q2.pdf" target="_blank" class="link12gray">104年度第二季財務報告。</a><a href="#" class="link12gray"></a></td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                        </tr>
                                    </table>
                                        <table width="300" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                            <td width="335"><a href="pdf/disclosure/financial/104Q1.pdf" target="_blank" class="link12gray">104年度第一季財務報告。</a><a href="#" class="link12gray"></a></td>
                                          </tr>
                                          <tr>
                                            <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                          </tr>
                                    </table>
                                          <table width="300" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                              <td width="335"><a href="pdf/disclosure/financial/103.pdf" target="_blank" class="link12gray">103年度財務報告。</a><a href="#" class="link12gray"></a></td>
                                            </tr>
                                            <tr>
                                              <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                            </tr>
                                    </table>
                                          <table width="300" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                              <td width="335"><a href="pdf/disclosure/financial/103Q3.pdf" target="_blank" class="link12gray">103年度第三季財務報告。</a><a href="#" class="link12gray"></a></td>
                                            </tr>
                                            <tr>
                                              <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                            </tr>
                                    </table>
                                            <table width="300" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                                <td width="335"><a href="pdf/disclosure/financial/103Q2.pdf" target="_blank" class="link12gray">103年度第二季財務報告。</a><a href="#" class="link12gray"></a></td>
                                              </tr>
                                              <tr>
                                                <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                              </tr>
                                    </table>
                                              <table width="300" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                                  <td width="335"><a href="pdf/disclosure/financial/103Q1.pdf" target="_blank" class="link12gray">103年度第一季財務報告。</a><a href="#" class="link12gray"></a></td>
                                                </tr>
                                                <tr>
                                                  <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                                </tr>
                                    </table>
                                                <table width="300" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                                    <td width="335"><a href="pdf/disclosure/financial/102.pdf" target="_blank" class="link12gray">102年度財務報告。</a><a href="#" class="link12gray"></a></td>
                                                  </tr>
                                                  <tr>
                                                    <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                                  </tr>
                                    </table>
                                                  <table width="300" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                      <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                                      <td width="335"><a href="pdf/disclosure/financial/102Q3.pdf" target="_blank" class="link12gray">102年度第三季財務報告。</a><a href="#" class="link12gray"></a></td>
                                                    </tr>
                                                    <tr>
                                                      <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                                    </tr>
                                    </table>
                                                    <table width="300" border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                        <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                                        <td width="335"><a href="pdf/disclosure/financial/102Q2.pdf" target="_blank" class="link12gray">102年度第二季財務報告。</a><a href="#" class="link12gray"></a></td>
                                                      </tr>
                                                      <tr>
                                                        <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                                      </tr>
                                    </table>
                                                    <table width="300" border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                        <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                                        <td width="335"><a href="pdf/disclosure/financial/102Q1.pdf" target="_blank" class="link12gray">102年度第一季財務報告。</a><a href="#" class="link12gray"></a></td>
                                                      </tr>
                                                      <tr>
                                                        <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                                      </tr>
                                    </table>
                                                    <table width="300" border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                        <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                                        <td width="335"><a href="pdf/disclosure/financial/101.pdf" target="_blank" class="link12gray">101年度財務報告。</a><a href="#" class="link12gray"></a></td>
                                                      </tr>
                                                      <tr>
                                                        <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                                      </tr>
                                    </table>
                                                      <table width="300" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                          <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                                          <td width="335"><a href="pdf/disclosure/financial/101Q3.pdf" target="_blank" class="link12gray">101年度第三季財務報告。</a><a href="#" class="link12gray"></a></td>
                                                        </tr>
                                                        <tr>
                                                          <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                                        </tr>
                                    </table>
                                                        <table width="300" border="0" cellspacing="0" cellpadding="0">
                                                          <tr>
                                                            <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                                            <td width="335"><a href="pdf/disclosure/financial/101Q2.pdf" target="_blank" class="link12gray">101年度上半年財務報告。</a><a href="#" class="link12gray"></a></td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                                          </tr>
                                    </table>
                                                          <table width="300" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                              <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                                              <td width="335"><a href="pdf/disclosure/financial/101Q1.pdf" target="_blank" class="link12gray">101年度第一季財務報告。</a><a href="#" class="link12gray"></a></td>
                                                            </tr>
                                                            <tr>
                                                              <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                                            </tr>
                                    </table>
                                                            <table width="300" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                                                <td width="335"><a href="pdf/disclosure/financial/100.pdf" target="_blank" class="link12gray">100年度財務報告。</a><a href="#" class="link12gray"></a></td>
                                                              </tr>
                                                              <tr>
                                                                <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                                              </tr>
                                    </table>
                                                              <table width="300" border="0" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                  <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                                                  <td width="335"><a href="pdf/disclosure/financial/100Q3.pdf" target="_blank" class="link12gray">100年度第三季財務報告。</a><a href="#" class="link12gray"></a></td>
                                                                </tr>
                                                                <tr>
                                                                  <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                                                </tr>
                                    </table>
                                                                <table width="300" border="0" cellspacing="0" cellpadding="0">
                                                                  <tr>
                                                                    <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                                                    <td width="335"><a href="pdf/disclosure/financial/100Q2.pdf" target="_blank" class="link12gray">100年度上半年財務報告。</a><a href="#" class="link12gray"></a></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                                                  </tr>
                                    </table>
                                                                  <table width="300" border="0" cellspacing="0" cellpadding="0">
                                                                    <tr>
                                                                      <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                                                      <td width="335"><a href="pdf/disclosure/financial/100Q1.pdf" target="_blank" class="link12gray">100年度第一季財務報告。</a><a href="#" class="link12gray"></a></td>
                                                                    </tr>
                                                                    <tr>
                                                                      <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                                                    </tr>
                                    </table>
                                  </td><td width="312" valign="top">&nbsp;</td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td><a name="b" id="b"></a></td>
                      </tr>
                      <tr>
                        <td><table width="700" border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td valign="top" bgcolor="#DCD2A7" class="title_red_13b">年報</td>
                          </tr>
                          <tr>
                            <td valign="top" bgcolor="#EEEAD5"><span class="tutle_12b">中文年報 </span></td>
                          </tr>
                          <tr>
                            <td valign="top"><span class="text12gray1">備註：請選擇所欲查詢年度 </span><span class="text12red1">(請下載acrobat reader軟體)</span></td>
                          </tr>
                          <tr>
                            <td><table width="300" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td width="335" height="20"><a href="pdf/disclosure/annual/chinese/109.pdf" target="_blank" class="link12gray">一百零九年度年報 (PDF 檔案)</a></td>
                              </tr>
                              <tr>
                                <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                              </tr>
                            </table>
                              <table width="300" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                  <td width="335" height="20"><a href="pdf/disclosure/annual/chinese/108.pdf" target="_blank" class="link12gray">一百零八年度年報 (PDF 檔案)</a></td>
                                </tr>
                                <tr>
                                  <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                </tr>
                              </table>
                              <table width="300" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                  <td width="335" height="20"><a href="pdf/disclosure/annual/chinese/107.pdf" target="_blank" class="link12gray">一百零七年度年報 (PDF 檔案)</a></td>
                                </tr>
                                <tr>
                                  <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                </tr>
                              </table>
                              <table width="300" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                  <td width="335" height="20"><a href="pdf/disclosure/annual/chinese/106.pdf" target="_blank" class="link12gray">一百零六年度年報 (PDF 檔案)</a></td>
                                </tr>
                                <tr>
                                  <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                </tr>
                              </table>
                              <table width="300" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                  <td width="335" height="20"><a href="pdf/disclosure/annual/chinese/105.pdf" target="_blank" class="link12gray">一百零五年度年報 (PDF 檔案)</a></td>
                                </tr>
                                <tr>
                                  <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                </tr>
                              </table>
                              <table width="300" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                  <td width="335" height="20"><a href="pdf/disclosure/annual/chinese/104.pdf" target="_blank" class="link12gray">一百零四年度年報 (PDF 檔案)</a></td>
                                </tr>
                                <tr>
                                  <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                </tr>
                              </table>
                              <table width="300" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                  <td width="335" height="20"><a href="pdf/disclosure/annual/chinese/103.pdf" target="_blank" class="link12gray">一百零三年度年報 (PDF 檔案)</a></td>
                                </tr>
                                <tr>
                                  <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                </tr>
                              </table>
                              <table width="300" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                  <td width="335" height="20"><a href="pdf/disclosure/annual/chinese/102.pdf" target="_blank" class="link12gray">一百零二年度年報 (PDF 檔案)</a></td>
                                </tr>
                                <tr>
                                  <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                </tr>
                              </table>
                              <table width="300" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                  <td width="335" height="20"><a href="pdf/disclosure/annual/chinese/101.pdf" target="_blank" class="link12gray">一百零一年度年報 (PDF 檔案)</a></td>
                                </tr>
                                <tr>
                                  <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                </tr>
                              </table>
                              <table width="300" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                    <td width="335" height="20"><a href="pdf/disclosure/annual/chinese/100.pdf" target="_blank" class="link12gray">一百年度年報 (PDF 檔案)</a></td>
                                  </tr>
                              <tr>
                                <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="300" height="14" /></td>
                                  </tr>
                            </table>
                              </td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td width="750" align="right"><a name="c" id="c"></a><a href="#top"><img src="images/top_1.gif" width="46" height="15" border="0" /></a></td>
                      </tr>
                      <tr>
                        <td valign="top"><table width="750" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td bgcolor="#DCD2A7"><span class="title_red_13b"><a name="C" id="C"></a>利率報價</span></td>
                          </tr>
                          <tr>
                            <td><span class="title_red_13b">新台幣利率報價</span><span class="text12gray1"><%=tmp_c_date1%> 票券利率表</span></td>
                          </tr>
                          <tr>
                            <td><table width="750" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td bgcolor="#FFFFFF"><table width="750" border="0" cellpadding="3" cellspacing="1">
                                    <tr>
                                      <td height="30" colspan="3" align="center" bgcolor="#DCD2A7" class="text12b_brown"><strong>距　到　期　日</strong></td>
                                      <td width="48" align="center" bgcolor="#DCD2A7" class="text12b_brown">10天</td>
                                      <td width="48" align="center" bgcolor="#DCD2A7" class="text12b_brown">20天</td>
                                      <td width="46" align="center" bgcolor="#DCD2A7" class="text12b_brown">30天</td>
                                      <td width="46" align="center" bgcolor="#DCD2A7" class="text12b_brown">60天</td>
                                      <td width="46" align="center" bgcolor="#DCD2A7" class="text12b_brown">90天</td>
                                      <td width="47" align="center" bgcolor="#DCD2A7" class="text12b_brown">120天</td>
                                      <td width="49" align="center" bgcolor="#DCD2A7" class="text12b_brown">150天</td>
                                      <td width="48" align="center" bgcolor="#DCD2A7" class="text12b_brown">180天</td>
                                      <td width="48" align="center" bgcolor="#DCD2A7" class="text12b_brown">270天</td>
                                      <td width="48" align="center" bgcolor="#DCD2A7" class="text12b_brown">365天</td>
                                    </tr>
                                    <tr>
                                      <td width="28" height="30" rowspan="5" align="center" bgcolor="#E7E2C5" class="text12b_brown2"><strong>初 </strong><strong><br />
                                            <strong>級 </strong><br />
                                            <strong>市 </strong><br />
                                            <strong>場 </strong><br />
                                            <strong>買 </strong><br />
                                            <strong>入</strong></strong></td>
                                      <td height="30" colspan="2" align="center" bgcolor="#E7E2C5" class="text12gray1b">整<img src="images/space.gif" width="2" height="10" />批<img src="images/space.gif" width="2" height="10" />發<img src="images/space.gif" width="2" height="10" />行<img src="images/space.gif" width="2" height="10" />商<img src="images/space.gif" width="2" height="10" />業<img src="images/space.gif" width="2" height="10" />本<img src="images/space.gif" width="2" height="10" />票</td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(10,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(20,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(30,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(60,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(90,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(120,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(150,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(180,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(270,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(365,"cp2_rate")%></td>
                                    </tr>
                                    <tr>
                                      <td height="30" colspan="2" align="center" bgcolor="#E7E2C5" class="text12gray1b">交<img src="images/space.gif" width="20" height="10" />易<img src="images/space.gif" width="20" height="10" />票<img src="images/space.gif" width="20" height="10" />據</td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(10,"cp1_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(20,"cp1_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(30,"cp1_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(60,"cp1_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(90,"cp1_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(120,"cp1_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(150,"cp1_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(180,"cp1_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(270,"cp1_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(365,"cp1_rate")%></td>
                                    </tr>
                                    <tr>
                                      <td height="30" colspan="2" align="center" bgcolor="#E7E2C5" class="text12gray1b">銀<img src="images/space.gif" width="7" height="10" />行<img src="images/space.gif" width="7" height="10" />承<img src="images/space.gif" width="7" height="10" />兌<img src="images/space.gif" width="7" height="10" />匯<img src="images/space.gif" width="7" height="10" />票</td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(10,"ba_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(20,"ba_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(30,"ba_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(60,"ba_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(90,"ba_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(120,"ba_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(150,"ba_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(180,"ba_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(270,"ba_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(365,"ba_rate")%></td>
                                    </tr>
                                    <tr>
                                      <td height="30" colspan="2" align="center" bgcolor="#E7E2C5" class="text12gray1b">銀行可轉讓定期存單</td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(10,"cd_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(20,"cd_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(30,"cd_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(60,"cd_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(90,"cd_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(120,"cd_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(150,"cd_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(180,"cd_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(270,"cd_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(365,"cd_rate")%></td>
                                    </tr>
                                    <tr>
                                      <td height="30" colspan="2" align="center" bgcolor="#E7E2C5" class="text12gray1b">資<img src="images/space.gif" width="2" height="10" />產<img src="images/space.gif" width="2" height="10" />基<img src="images/space.gif" width="2" height="10" />礎<img src="images/space.gif" width="2" height="10" />商<img src="images/space.gif" width="2" height="10" />業<img src="images/space.gif" width="2" height="10" />本<img src="images/space.gif" width="2" height="10" />票</td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(10,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(20,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(30,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(60,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(90,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(120,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(150,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(180,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(270,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=bi_rate(365,"abcp_rate")%></td>
                                    </tr>
                                    <tr>
                                      <td height="25" rowspan="8" align="center" bgcolor="#DCD2A7" class="text12b_brown2"><strong>次 </strong><strong><br />
                                            <strong>級 </strong><br />
                                            <strong>市 </strong><br />
                                            <strong>場</strong></strong></td>
                                      <td width="96" height="25" rowspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown2">CP2</td>
                                      <td width="65" height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">買進</td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(10,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(20,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(30,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(60,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(90,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(120,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(150,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(180,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(270,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(365,"bi_b_rate")%></td>
                                    </tr>
                                    <tr>
                                      <td width="65" height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">賣出</td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(10,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(20,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(30,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(60,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(90,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(120,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(150,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(180,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(270,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(365,"bi_s_rate")%></td>
                                    </tr>
                                    <tr>
                                      <td rowspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown2">BA</td>
                                      <td height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">買進</td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(10,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(20,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(30,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(60,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(90,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(120,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(150,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(180,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1">-</td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1">-</td>
                                    </tr>
                                    <tr>
                                      <td height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">賣出</td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(10,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(20,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(30,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(60,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(90,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(120,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(150,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(180,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1">-</td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1">-</td>
                                    </tr>
                                    <tr>
                                      <td height="2" rowspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown2">ABCP及證券化商品</td>
                                      <td width="65" height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">買進</td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(10,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(20,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(30,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(60,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(90,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(120,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(150,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(180,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(270,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(365,"abcp_b_rate")%></td>
                                    </tr>
                                    <tr>
                                      <td width="65" height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">賣出</td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(10,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(20,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(30,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(60,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(90,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(120,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(150,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(180,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(270,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(365,"abcp_s_rate")%></td>
                                    </tr>
                                    <tr>
                                      <td height="5" rowspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown2">債券</td>
                                      <td height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">買進</td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(10,"bd_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(20,"bd_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(30,"bd_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(60,"bd_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(90,"bd_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(120,"bd_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(150,"bd_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(180,"bd_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(270,"bd_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(365,"bd_b_rate")%></td>
                                    </tr>
                                    <tr>
                                      <td height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">賣出</td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(10,"bd_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(20,"bd_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(30,"bd_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(60,"bd_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(90,"bd_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(120,"bd_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(150,"bd_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(180,"bd_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(270,"bd_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=bi_rate(365,"bd_s_rate")%></td>
                                    </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="30" align="center">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="30" align="center"><div align="left"><span class="title_red_13b">美元利率報價 </span><span class="text12gray1"><%=tmp_us_date%>票券利率表</span></div></td>
                          </tr>
                          <tr>
                            <td height="30" align="center"><table width="750" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td bgcolor="#FFFFFF"><table width="750" border="0" cellpadding="3" cellspacing="1">
                                    <tr>
                                      <td height="30" colspan="3" align="center" bgcolor="#DCD2A7" class="text12b_brown"><strong>距　到　期　日</strong></td>
                                      <td width="48" align="center" bgcolor="#DCD2A7" class="text12b_brown">10天</td>
                                      <td width="48" align="center" bgcolor="#DCD2A7" class="text12b_brown">20天</td>
                                      <td width="46" align="center" bgcolor="#DCD2A7" class="text12b_brown">30天</td>
                                      <td width="46" align="center" bgcolor="#DCD2A7" class="text12b_brown">60天</td>
                                      <td width="46" align="center" bgcolor="#DCD2A7" class="text12b_brown">90天</td>
                                      <td width="47" align="center" bgcolor="#DCD2A7" class="text12b_brown">120天</td>
                                      <td width="49" align="center" bgcolor="#DCD2A7" class="text12b_brown">150天</td>
                                      <td width="48" align="center" bgcolor="#DCD2A7" class="text12b_brown">180天</td>
                                      <td width="48" align="center" bgcolor="#DCD2A7" class="text12b_brown">270天</td>
                                      <td width="48" align="center" bgcolor="#DCD2A7" class="text12b_brown">360天</td>
                                    </tr>
                                    <tr>
                                      <td width="28" height="30" rowspan="2" align="center" bgcolor="#E7E2C5" class="text12b_brown2"><strong>初 </strong><strong><br />
                                            <strong>級 </strong><br />
                                            <strong>市 </strong><br />
                                            <strong>場 </strong><br />
                                            <strong>買 </strong><br />
                                            <strong>入</strong></strong></td>
                                      <td height="30" colspan="2" align="center" bgcolor="#E7E2C5" class="text12gray1b"><img src="images/space.gif" width="2" height="10" />商<img src="images/space.gif" width="2" height="10" />業<img src="images/space.gif" width="2" height="10" />本<img src="images/space.gif" width="2" height="10" />票(CP)</td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(10,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(20,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(30,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(60,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(90,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(120,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(150,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(180,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(270,"cp2_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(360,"cp2_rate")%></td>
                                    </tr>
                                    
                                    <tr>
                                      <td height="30" colspan="2" align="center" bgcolor="#E7E2C5" class="text12gray1b">資<img src="images/space.gif" width="2" height="10" />產<img src="images/space.gif" width="2" height="10" />基<img src="images/space.gif" width="2" height="10" />礎<img src="images/space.gif" width="2" height="10" />商<img src="images/space.gif" width="2" height="10" />業<img src="images/space.gif" width="2" height="10" />本<img src="images/space.gif" width="2" height="10" />票<br />
                                        (ABCP)</td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(10,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(20,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(30,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(60,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(90,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(120,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(150,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(180,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(270,"abcp_rate")%></td>
                                      <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=us_bi_rate(360,"abcp_rate")%></td>
                                    </tr>
                                    <tr>
                                      <td height="30" rowspan="4" align="center" bgcolor="#DCD2A7" class="text12b_brown2"><strong>次 </strong><strong><br />
                                            <strong>級 </strong><br />
                                            <strong>市 </strong><br />
                                            <strong>場</strong></strong></td>
                                      <td width="96" rowspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown2">CP</td>
                                      <td width="65" height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">買進</td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(10,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(20,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(30,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(60,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(90,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(120,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(150,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(180,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(270,"bi_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(360,"bi_b_rate")%></td>
                                    </tr>
                                    <tr>
                                      <td width="65" height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">賣出</td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(10,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(20,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(30,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(60,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(90,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(120,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(150,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(180,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(270,"bi_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(360,"bi_s_rate")%></td>
                                    </tr>
                                    
                                    <tr>
                                      <td rowspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown2">ABCP</td>
                                      <td width="65" height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">買進</td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(10,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(20,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(30,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(60,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(90,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(120,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(150,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(180,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(270,"abcp_b_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(360,"abcp_b_rate")%></td>
                                    </tr>
                                    <tr>
                                      <td width="65" height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">賣出</td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(10,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(20,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(30,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(60,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(90,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(120,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(150,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(180,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(270,"abcp_s_rate")%></td>
                                      <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=us_bi_rate(360,"abcp_s_rate")%></td>
                                    </tr>
                                    
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td height="30" align="center"><p><span class="text12gray1">以上報價為本公司牌告利率，實際承做利率請洽本公司各</span> <a href="location.html" class="link12brown">服務據點</a><br />
                                <span class="text12gray1">註：初級市場之利率係指次一營業日發行參考利率</span></p>                              </td>
                          </tr>
                          <tr>
                            <td align="right"><a href="#top"><img src="images/top_1.gif" width="46" height="15" border="0" /></a></td>
                          </tr>
                          <tr>
                            <td><span class="title_red_13b"><span class="text12gray1"><%=tmp_us_date%></span>外幣可轉讓定期存單牌告利率表報價</span></td>
                          </tr>
                          <tr>
                            <td><table width="750" border="0" cellpadding="3" cellspacing="1">
                              <tr>
                                <td height="25" colspan="3" align="center" bgcolor="#DCD2A7" class="text12b_brown"><strong>距　到　期　日</strong></td>
                                <td width="48" align="center" bgcolor="#DCD2A7" class="text12b_brown">10天</td>
                                <td width="48" align="center" bgcolor="#DCD2A7" class="text12b_brown">20天</td>
                                <td width="46" align="center" bgcolor="#DCD2A7" class="text12b_brown">30天</td>
                                <td width="46" align="center" bgcolor="#DCD2A7" class="text12b_brown">60天</td>
                                <td width="46" align="center" bgcolor="#DCD2A7" class="text12b_brown">90天</td>
                                <td width="47" align="center" bgcolor="#DCD2A7" class="text12b_brown">120天</td>
                                <td width="49" align="center" bgcolor="#DCD2A7" class="text12b_brown">150天</td>
                                <td width="48" align="center" bgcolor="#DCD2A7" class="text12b_brown">180天</td>
                                <td width="48" align="center" bgcolor="#DCD2A7" class="text12b_brown">270天</td>
                                <td width="48" align="center" bgcolor="#DCD2A7" class="text12b_brown">360天</td>
                              </tr>
                              <tr>
                                <td width="28" height="30" rowspan="3" align="center" bgcolor="#E7E2C5" class="text12b_brown2"><strong>美<br />
                                  元</strong></td>
                                <td height="30" colspan="2" align="center" bgcolor="#E7E2C5" class="text12gray1b"><img src="images/space.gif" width="2" height="10" />初級市場</td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",10,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",20,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",30,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",60,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",90,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",120,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",150,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",180,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",270,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",360,"cd_rate")%></td>
                              </tr>
                              <tr>
                                <td width="96" rowspan="2" align="center" bgcolor="#E7E2C5" class="text12gray1b">次級市場</td>
                                <td height="30" align="center" bgcolor="#E7E2C5" class="text12gray1b">買進</td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",10,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",20,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",30,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",60,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",90,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",120,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",150,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",180,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",270,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",360,"cd_b_rate")%></td>
                              </tr>
                              <tr>
                                <td height="30" align="center" bgcolor="#E7E2C5" class="text12gray1b">賣出</td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",10,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",20,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",30,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",60,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",90,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",120,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",150,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",180,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",270,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("USD",360,"cd_s_rate")%></td>
                              </tr>
                              <tr>
                                <td height="30" rowspan="3" align="center" bgcolor="#DCD2A7" class="text12b_brown2"><strong>人<br />
                                  民<br />
                                    幣</strong></td>
                                <td height="30" colspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown2"><span class="text12gray1b">初級市場</span></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",10,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",20,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",30,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",60,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",90,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",120,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",150,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",180,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",270,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",360,"cd_rate")%></td>
                              </tr>
                              
                              <tr>
                                <td rowspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown2"><span class="text12gray1b">次級市場</span></td>
                                <td width="65" height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">買進</td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",10,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",20,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",30,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",60,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",90,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",120,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",150,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",180,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",270,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",360,"cd_b_rate")%></td>
                              </tr>
                              <tr>
                                <td width="65" height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">賣出</td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",10,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",20,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",30,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",60,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",90,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",120,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",150,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",180,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",270,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("CNH",360,"cd_s_rate")%></td>
                              </tr>
							  <tr>
                                <td width="28" height="30" rowspan="3" align="center" bgcolor="#E7E2C5" class="text12b_brown2"><strong>日<br />
                                  圓</strong></td>
                                <td height="30" colspan="2" align="center" bgcolor="#E7E2C5" class="text12gray1b"><img src="images/space.gif" width="2" height="10" />初級市場</td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",10,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",20,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",30,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",60,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",90,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",120,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",150,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",180,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",270,"cd_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",360,"cd_rate")%></td>
							  </tr>
                              <tr>
                                <td width="96" rowspan="2" align="center" bgcolor="#E7E2C5" class="text12gray1b">次級市場</td>
                                <td height="30" align="center" bgcolor="#E7E2C5" class="text12gray1b">買進</td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",10,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",20,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",30,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",60,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",90,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",120,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",150,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",180,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",270,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",360,"cd_b_rate")%></td>
                              </tr>
                              <tr>
                                <td height="30" align="center" bgcolor="#E7E2C5" class="text12gray1b">賣出</td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",10,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",20,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",30,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",60,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",90,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",120,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",150,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",180,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",270,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#E7E2C5" class="text12gray1"><%=f_cd_rate("JPY",360,"cd_s_rate")%></td>
                              </tr>
							  <tr>
                                <td width="28" height="30" rowspan="3" align="center" bgcolor="#DCD2A7" class="text12b_brown2"><strong>歐<br />
                                  元</strong></td>
                                <td height="30" colspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown2"><span class="text12gray1b">初級市場</span></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",10,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",20,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",30,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",60,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",90,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",120,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",150,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",180,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",270,"cd_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",360,"cd_rate")%></td>
							  </tr>
                              
                              <tr>
                                <td rowspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown2"><span class="text12gray1b">次級市場</span></td>
                                <td width="65" height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">買進</td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",10,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",20,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",30,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",60,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",90,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",120,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",150,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",180,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",270,"cd_b_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",360,"cd_b_rate")%></td>
                              </tr>
                              <tr>
                                <td width="65" height="30" align="center" bgcolor="#DCD2A7" class="text12gray1b">賣出</td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",10,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",20,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",30,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",60,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",90,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",120,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",150,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",180,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",270,"cd_s_rate")%></td>
                                <td align="center" bgcolor="#DCD2A7" class="text12gray1"><%=f_cd_rate("EUR",360,"cd_s_rate")%></td>
                              </tr>
                            </table>                              </td>
                          </tr>
                          <tr>
                            <td><span class="title_red_13b">新台幣債券利率表</span></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><%
  tmp_y= datepart("yyyy",date)
  tmp_m= datepart("m",date)
  tmp_d= datepart("d",date)
  tmp_date = cstr(tmp_y*10000+tmp_m*100+tmp_d)
Set conn = Server.CreateObject("ADODB.Connection")
conn.open "Data Source=ebond;Password=eceric;User ID=ec"
CommandText1 = "select to_char(max(conf_date),'yyyymmdd'),max(conf_date) from bd007 where conf_date <= to_date(" + tmp_date+",'yyyymmdd')" 
Set rs1 = Server.CreateObject("ADODB.Recordset")
rs1.Open commandtext1,conn
  tmp_y= datepart("yyyy",rs1(1).Value)
  tmp_m= datepart("m",rs1(1).Value)
  tmp_d= datepart("d",rs1(1).Value)
  tmp_c_date1 = cstr(tmp_y-1911)+"/"+cstr(tmp_m)+"/"+cstr(tmp_d)
  tmp_c_date = rs1(0).value 
Response.write  tmp_c_date1 + " 債券買賣斷參考利率表(按到期日排序)<br>"

CommandText = "select a.bd_name as 債券名稱,to_char(add_months(a.issu_date,-22932),'yyy/mm/dd') 發行日,to_char(add_months(a.expi_date,-22932),'yyy/mm/dd')到期日,a.par_rate 票面利率,b.rate_buy 買進利率,b.rate_sale 賣出利率 from bd005 a,bd007 b where a.bd_no = b.bd_no  and b.conf_date = to_date(" + tmp_c_date + ",'yyyymmdd') and b.status = 1 and b.comp_no = 0 order by 3"
'CommandText = "select a.bd_name as 債券名稱,to_char(add_months(a.issu_date,-22932),'yy/mm/dd') 發行日,to_char(add_months(a.expi_date,-22932),'yyy/mm/dd')到期日,a.par_rate 票載利率,b.rate_buy 買進利率,b.rate_sale 賣出利率 from b0.bd005 a,bd007 b where a.bd_no = b.bd_no  and b.conf_date = to_date(&rs1(0).Value&) and b.status = 1 and b.comp_no = 0 order by 3"
Set rs = Server.CreateObject("ADODB.Recordset")
'rs.Open "select a.bd_name 債券名稱,dtoc(a.issu_date)發行日,dtoc(a.expi_date)到期日,a.par_rate 票載利率(%),b.rate_buy 買進利率,b.rate_sale 賣出利率 from bd005 a,bd007 b where a.bd_no = b.bd_no  and b.conf_date = ntod(901106) order by 債券名稱",conn
rs.Open commandtext,conn
Response.write "<table border='0' cellspacing='1' cellpadding='5' width= '90%'>"
Response.write "<tr>"
For I = 0 To rs.Fields.Count -1
  if i <= 2 then
      Response.write  "<td align='center' bgcolor='#DCD2A7' class='text12b_brown'>" & Ucase(rs(I).Name) & "</td>"
  else
      Response.write  "<td align='center' bgcolor='#DCD2A7' class='text12b_brown'>" & Ucase(rs(I).Name) & "(%)</td>"
  end if  
Next
Response.write "</tr>"

While Not rs.EOF
Response.write "<tr >"
For i =0 to rs.fields.Count -1
  'Rsponse.write "<td width="200">" & rs(I).Value &"</td>"
  Response.write  "<td align='center' bgcolor='#E7E2C5' class='text12gray1'>" & rs(I).Value & "</td>"
next
rs.MoveNext
Response.write"</tr>"
Wend
Response.write"</table>"
Set conn = nothing
%></td>
                          </tr>
                          <tr>
                            <td height="30" align="right"><a href="#top"><img src="images/top_1.gif" width="46" height="15" border="0" /></a></td>
                          </tr>
                          <tr>
                            <td height="30"><span class="title_red_13b">外幣債券利率表</span></td>
                          </tr>
                          <tr>
                            <td height="30"><%
  tmp_y= datepart("yyyy",date)
  tmp_m= datepart("m",date)
  tmp_d= datepart("d",date)
  tmp_date = cstr(tmp_y*10000+tmp_m*100+tmp_d)
Set conn = Server.CreateObject("ADODB.Connection")
conn.open "Data Source=ebond;Password=eceric;User ID=ec"
CommandText1 = "select to_char(max(conf_date),'yyyymmdd'),max(conf_date) from bd007 where conf_date <= to_date(" + tmp_date+",'yyyymmdd')" 
Set rs1 = Server.CreateObject("ADODB.Recordset")
rs1.Open commandtext1,conn
  tmp_y= datepart("yyyy",rs1(1).Value)
  tmp_m= datepart("m",rs1(1).Value)
  tmp_d= datepart("d",rs1(1).Value)
  tmp_c_date1 = cstr(tmp_y-1911)+"/"+cstr(tmp_m)+"/"+cstr(tmp_d)
  tmp_c_date = rs1(0).value 
Response.write  tmp_c_date1 + " 債券買賣斷參考利率表(按到期日排序)<br>"

CommandText = "select decode(a.dl_type,'USD','美元','CNH','人民幣',a.dl_type) as 幣別,a.bd_name as 債券名稱,to_char(add_months(a.issu_date,-22932),'yyy/mm/dd') 發行日,to_char(add_months(a.expi_date,-22932),'yyy/mm/dd')到期日,a.par_rate 票面利率,b.rate_buy 買進利率,b.rate_sale 賣出利率 from fbd005 a,bd007 b where a.bd_no = b.bd_no  and b.conf_date = to_date(" + tmp_c_date + ",'yyyymmdd') and b.status = 1 and b.comp_no = 0 order by 3"
'CommandText = "select a.bd_name as 債券名稱,to_char(add_months(a.issu_date,-22932),'yy/mm/dd') 發行日,to_char(add_months(a.expi_date,-22932),'yyy/mm/dd')到期日,a.par_rate 票載利率,b.rate_buy 買進利率,b.rate_sale 賣出利率 from b0.bd005 a,bd007 b where a.bd_no = b.bd_no  and b.conf_date = to_date(&rs1(0).Value&) and b.status = 1 and b.comp_no = 0 order by 3"
Set rs = Server.CreateObject("ADODB.Recordset")
'rs.Open "select a.bd_name 債券名稱,dtoc(a.issu_date)發行日,dtoc(a.expi_date)到期日,a.par_rate 票載利率(%),b.rate_buy 買進利率,b.rate_sale 賣出利率 from bd005 a,bd007 b where a.bd_no = b.bd_no  and b.conf_date = ntod(901106) order by 債券名稱",conn
rs.Open commandtext,conn
Response.write "<table border='0' cellspacing='1' cellpadding='5' width= '90%'>"
Response.write "<tr>"
For I = 0 To rs.Fields.Count -1
  if i <= 3 then
      Response.write  "<td align='center' bgcolor='#DCD2A7' class='text12b_brown'>" & Ucase(rs(I).Name) & "</td>"
  else
      Response.write  "<td align='center' bgcolor='#DCD2A7' class='text12b_brown'>" & Ucase(rs(I).Name) & "(%)</td>"
  end if  
Next
Response.write "</tr>"

While Not rs.EOF
Response.write "<tr >"
For i =0 to rs.fields.Count -1
  'Rsponse.write "<td width="200">" & rs(I).Value &"</td>"
  Response.write  "<td align='center' bgcolor='#E7E2C5' class='text12gray1'>" & rs(I).Value & "</td>"
next
rs.MoveNext
Response.write"</tr>"
Wend
Response.write"</table>"
Set conn = nothing
%></td>
                          </tr>
                          <tr>
                            <td height="30" align="right"><a href="#top"><img src="images/top_1.gif" width="46" height="15" border="0" /></a></td>
                          </tr>
                          <tr>
                            <td align="left"><span class="title_red_13b">新台幣債券附條件交易利率表</span></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><span class="text12gray1">
                              <%
  tmp_y= datepart("yyyy",date)
  tmp_m= datepart("m",date)
  tmp_d= datepart("d",date)
  tmp_date = cstr(tmp_y*10000+tmp_m*100+tmp_d)
  Set conn = Server.CreateObject("ADODB.Connection")  
  conn.open "Data Source=ebond;Password=eceric;User ID=ec"
    
  '算出table內最近有資料之日期
  CommandText2 = "select to_char(max(tr_date),'yyyymmdd')max_tr_date from cm010 where tr_date <= to_date(" + tmp_date+",'yyyymmdd')" 
  Set rs2 = Server.CreateObject("ADODB.Recordset")
  rs2.Open commandtext2,conn
  
  CommandText1 = "select tr_date,rate_day 天期,bd_b_rate 附賣回利率,bd_s_rate 附買回利率 from cm010 where tr_Date = to_date(" + rs2(0) + ",'yyyymmdd')"
  CommandText2 = "select tr_date,rate_day 天期,abcp_b_rate 買進 ,abcp_s_rate 賣出 from cm010 where tr_Date = to_date(" + rs2(0) + ",'yyyymmdd')"
  
  Set rs = Server.CreateObject("ADODB.Recordset")
  Set rs3 = Server.CreateObject("ADODB.Recordset")
  'response.write commandtext1
  rs.Open commandtext1,conn
  rs3.Open commandtext1,conn
  'rs3.Open commandtext2,conn
  tmp_y= datepart("yyyy",rs(0).Value)
  tmp_m= datepart("m",rs(0).Value)
  tmp_d= datepart("d",rs(0).Value)
  tmp_c_date1 = cstr(tmp_y-1911)+"/"+cstr(tmp_m)+"/"+cstr(tmp_d)
  tmp_c_date = rs(0).value 
%>
                              <%
  Response.write  tmp_c_date1 + " 債券附條件利率表<br>"

  Response.write "<table border='0' cellspacing='1' cellpadding='5' width= '80%'>"
  Response.write "<tr>"
  For I = 1 To rs.Fields.Count -1
    if i <= 1 then
        Response.write  "<td align='center' bgcolor='#DCD2A7' class='text12b_brown'>" & Ucase(rs(I).Name) & "</td>"
    else
        Response.write  "<td align='center' bgcolor='#DCD2A7' class='text12b_brown'>" & Ucase(rs(I).Name) & "(%)</td>"
    end if  
  Next
  Response.write "</tr>"
  While Not rs.EOF
  Response.write "<tr >"
  For i =1 to rs.fields.Count -1
    'Rsponse.write "<td width="200">" & rs(I).Value &"</td>"
    Response.write  "<td align='center' bgcolor='#E7E2C5' class='text12gray1'>" & rs(I).Value & "</td>"
  next
  rs.MoveNext
  Response.write"</tr>"
  Wend
  Response.write"</table>"
  'Set conn = nothing
%>
                              <br />
                            </span></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><div align="right"><a href="#top"><img src="images/top_1.gif" width="46" height="15" border="0" /></a></div></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><span class="title_red_13b">                              新台幣證券化商品附條件交易利率表</span></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><span class="text12gray1">
                              <%
  Response.write  tmp_c_date1 + " 證券化商品附條件利率表<br>"

  Response.write "<table border='0' cellspacing='1' cellpadding='5' width= '80%'>"
  Response.write "<tr>"
  For I = 1 To rs3.Fields.Count -1
    if i <= 1 then
        Response.write  "<td align='center' bgcolor='#DCD2A7' class='text12b_brown'>" & Ucase(rs3(I).Name) & "</td>"
    else
        Response.write  "<td align='center' bgcolor='#DCD2A7' class='text12b_brown'>" & Ucase(rs3(I).Name) & "(%)</td>"
    end if  
  Next
  Response.write "</tr>"
  While Not rs3.EOF
  Response.write "<tr >"
  For i =1 to rs3.fields.Count -1
    'Rsponse.write "<td width="200">" & rs3(I).Value &"</td>"
    Response.write  "<td align='center' bgcolor='#E7E2C5' class='text12gray1'>" & rs3(I).Value & "</td>"
  next
  rs3.MoveNext
  Response.write"</tr>"
  Wend
  Response.write"</table>"
  'Set conn = nothing
%>
                            </span></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><div align="right"><a href="#top"><img src="images/top_1.gif" width="46" height="15" border="0" /></a></div></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><span class="title_red_13b">美元債券利率牌告表</span></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><span class="text12gray1">
                              <%
  tmp_y= datepart("yyyy",date)
  tmp_m= datepart("m",date)
  tmp_d= datepart("d",date)
  tmp_date = cstr(tmp_y*10000+tmp_m*100+tmp_d)
  Set conn = Server.CreateObject("ADODB.Connection")  
  conn.open "Data Source=ebond;Password=eceric;User ID=ec"
    
  '算出table內最近有資料之日期
  CommandText4 = "select to_char(max(tr_date),'yyyymmdd')max_tr_date from fcm010 where bd_b_rate is not null and dl_type = 'USD' and tr_date <= to_date(" + tmp_date+",'yyyymmdd')" 
  Set rs4 = Server.CreateObject("ADODB.Recordset")
  rs4.Open commandtext4,conn
  
  CommandText5 = "select tr_date,rate_day 天期,bd_b_rate 附賣回利率,bd_s_rate 附買回利率 from fcm010 where dl_type = 'USD' and rate_day <> 365 and tr_Date = to_date(" + rs2(0) + ",'yyyymmdd')"
  
  Set rs5 = Server.CreateObject("ADODB.Recordset")  
  rs5.Open commandtext5,conn
  tmp_y= datepart("yyyy",rs5(0).Value)
  tmp_m= datepart("m",rs5(0).Value)
  tmp_d= datepart("d",rs5(0).Value)
  tmp_c_date1 = cstr(tmp_y-1911)+"/"+cstr(tmp_m)+"/"+cstr(tmp_d)
  tmp_c_date = rs4(0).value 
%>
                              <%
  Response.write  tmp_c_date1 + " 債券附條件利率表<br>"

  Response.write "<table border='0' cellspacing='1' cellpadding='5' width= '80%'>"
  Response.write "<tr>"
  For I = 1 To rs5.Fields.Count -1
    if i <= 1 then
        Response.write  "<td align='center' bgcolor='#DCD2A7' class='text12b_brown'>" & Ucase(rs5(I).Name) & "</td>"
    else
        Response.write  "<td align='center' bgcolor='#DCD2A7' class='text12b_brown'>" & Ucase(rs5(I).Name) & "(%)</td>"
    end if  
  Next
  Response.write "</tr>"
  While Not rs5.EOF
  Response.write "<tr >"
  For i =1 to rs5.fields.Count -1
    'Rsponse.write "<td width="200">" & rs(I).Value &"</td>"
    Response.write  "<td align='center' bgcolor='#E7E2C5' class='text12gray1'>" & rs5(I).Value & "</td>"
  next
  rs5.MoveNext
  Response.write"</tr>"
  Wend
  Response.write"</table>"
  Set conn = nothing
%>
                            </span></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><div align="right"><a href="#top"><img src="images/top_1.gif" width="46" height="15" border="0" /></a></div></td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top"><div align="right"><a href="#top"></a></div></td>
                          </tr>
                        </table></td>
                      </tr>
                      
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><table width="750" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td colspan="2" valign="top" bgcolor="#DCD2A7"><span class="title_red_13b"><a name="D" id="D"></a>公司治理相關資訊</span></td>
                          </tr>
                          <tr>
                            <td width="370" valign="top"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                  <td width="625" class="link12gray"><span class="style4">公司治理之架構及規則</span><br />
                                    <span class="style3">．<a href="company_info/110/組織系統.pdf" target="_blank" class="link12gray">組織系統</a><br />
                                    ．<a href="company_info/109/兆豐票券金融股份有限公司章程1090623.pdf" target="_blank" class="link12gray">公司章程</a><br />
                                    ．<a href="company_info/110/董事會議事規則110.05.25.pdf" target="_blank" class="link12gray">董事會議事規則</a><br />
                                    ．<a href="company_info/110/公司治理實務守則110.12.28.pdf" target="_blank" class="link12gray">公司治理實務守則</a></span></td>
                                </tr>
                                <tr>
                                  <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                </tr>
                              </table>
                                <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                    <td width="625"><a href="company_info/109/兆豐票券金融公司股權結構及股東權益.pdf" target="_blank" class="link12gray">公司股權結構及股東權益 </a></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                  </tr>
                                </table>
                              <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                    <td width="625"><a href="company_info/109/109年度年報-公司治理報告0_3董監事結構及獨立性.pdf" target="_blank" class="link12gray">董事會、監察人之結構及獨立性</a></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                  </tr>
                              </table>
                              <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                  <td width="625"><a href="company_info/109/董事會、監察人及經理人之職責.pdf" target="_blank" class="link12gray">董事會、監察人及經理人之職責</a><a href="http://www.chbfc.com.tw/company_info/03.doc" class="link12gray"></a></td>
                                </tr>
                                <tr>
                                  <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                </tr>
                              </table>
                              <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                  <td width="625"><span class="style4">支付董事、監察人、總經理及副總經理酬金之相關資訊(參照本公司網站年報之公司治理報告)</span></td>
                                </tr>
                                <tr>
                                  <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                </tr>
                              </table>
                              <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                  <td width="625"><a href="company_info/109/109年度董監進修情形.pdf" target="_blank" class="link12gray">董事會、監察人之進修情形</a><a href="http://www.chbfc.com.tw/company_info/03.doc" class="link12gray"></a></td>
                                </tr>
                                <tr>
                                  <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                </tr>
                              </table>
                              <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                  <td width="625"><p class="style4">大額曝險之揭露、關係人交易相關資訊及資本適足性之揭露(參照本公司網站財務報告之附註)</p></td>
                                </tr>
                                <tr>
                                  <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                </tr>
                              </table></td>
                            <td width="380" valign="top"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td width="625"><a href="company_info/109/109年度年報-公司治理報告0_2差異情形.pdf" target="_blank" class="link12gray">公司治理實務守則差異情形 </a></td>
                              </tr>
                              <tr>
                                <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                              </tr>
                            </table>
                              <table width="96%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                      <td width="350"><p class="text12gray1"><a href="company_info/98/07.doc" target="_blank" class="link12gray">改進公司治理之具體計畫及措施</a></p></td>
                                    </tr>
                              <tr>
                                <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                    </tr>
                              </table>
                                  <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                      <td width="350"><span class="style4">風險管理相關資訊(參照本公司網站年報之風險管理事項)</span></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                    </tr>
                                    </table>
							    <table width="96%" border="0" cellspacing="0" cellpadding="0">
							      <tr>
							        <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                      <td width="350"><p class="text12gray1"><a href="company_info/110/110年度內控聲明書.pdf" target="_blank" class="link12gray">內部控制制度聲明書</a></p></td>
                                    </tr>
							      <tr>
							        <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                    </tr>
							      </table>
                                  <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                      <td width="350"><p><span class="style4">其它公司治理之相關資訊</span><br />
                                        ．<a href="company_info/109/109年度年報-公司治理報告0_5董事會重大決議事項.pdf" target="_blank" class="link12gray">董事會重大決議事項</a><br />
                                        ．<a href="company_info/110/兆豐票券金融公司內部稽核組織 - 1101229.pdf" target="_blank" class="link12gray">內部稽核組織及運作</a><br />
                                        ．<a href="company_info/109/109年度年報-公司治理報告0_6履行社會責任.pdf" target="_blank" class="link12gray">履行社會責任情形</a><br />
                                        ．<a href="company_info/109/109年度年報-公司治理報告0_7落實誠信經營.pdf" target="_blank" class="link12gray">落實誠信經營情形</a><br />
                                      ．<a href="company_info/110/兆豐票券金融公司公司治理主管 - 110.pdf" target="_blank" class="link12gray">公司治理主管</a></p>                                      </td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                    </tr>
                                    </table>
								  
								  <table width="96%" border="0" cellspacing="0" cellpadding="0">
								  <tr>
								    <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                      <td width="350"><p class="text12gray1"><a href="company_info/109/兆豐票券金融股份有限公司誠信經營守則.pdf" target="_blank" class="link12gray">兆豐票券金融公司公司誠信經營守則</a></p></td>
                                    </tr>
								  <tr>
								    <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                    </tr>
								  </table>
								  <table width="96%" border="0" cellspacing="0" cellpadding="0">
								    <tr>
								      <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                      <td width="350"><p class="text12gray1"><a href="company_info/109/兆豐票券金融股份有限公司誠信經營作業程序及行為指南.pdf" target="_blank" class="link12gray">兆豐票券金融公司誠信經營作業程序及行為指南</a></p></td>
                                    </tr>
								    <tr>
								      <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                    </tr>
								    </table>
								  <table width="96%" border="0" cellspacing="0" cellpadding="0">
								    <tr>
								      <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                      <td width="350"><p class="text12gray1"><a href="company_info/110/110年防制洗錢及打擊資恐內部控制制度聲明書.pdf" target="_blank" class="link12gray">110年防制洗錢及打擊資恐內部控制制度聲明書</a></p></td>
                                    </tr>
								    <tr>
								      <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                    </tr>
								    </table>                                
                                  
								
                                  <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                      <td width="350"><p class="text12gray1">機構投資人盡職治理</p>
                                        <p class="text12gray1"><a href="company_info/110/本公司「機構投資人盡職治理守則」遵循聲明.pdf" target="_blank" class="link12gray">．「機構投資人盡職治理守則」遵循聲明</a></p>
                                        <p class="text12gray1"><a href="company_info/110/110年度履行機構投資人盡職治理報告.pdf" target="_blank" class="link12gray">．110年度履行機構投資人盡職治理報告</a><br />
                                            <br />
                                        </p></td>
                                    </tr>
                                    <tr>
                                      <td colspan="2" background="images/index_47.gif"><img src="images/space.gif" width="320" height="14" /></td>
                                    </tr>
                                  </table>
                                  <br />
                                  <p>&nbsp;</p></td></tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td valign="top" bgcolor="#DCD2A7"><span class="title_red_13b">信用評等資訊<a name="E" id="E"></a></span></td>
                          </tr>
                          <tr>
                            <td><table width="558" border="0" cellspacing="1" cellpadding="5">
                                <tr>
                                  <td width="119" height="25" rowspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown">信用評等機構</td>
                                  <td width="96" rowspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown">評等日期</td>
                                  <td colspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown">發行體信用評等</td>
                                  <td width="95" rowspan="2" align="center" bgcolor="#DCD2A7" class="text12b_brown">評等展望</td>
                                  </tr>
                                <tr>
                                  <td width="101" align="center" bgcolor="#DCD2A7" class="text12b_brown">長期</td>
                                  <td width="91" align="center" bgcolor="#DCD2A7" class="text12b_brown">短期</td>
                                </tr>
                                <tr>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12b_brown2">中華信用評等公司</td>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12gray1">2021/09/24</td>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12gray1">twAA+</td>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12gray1">twA-1+</td>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12gray1">穩定</td>
                                </tr>
                                <tr>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12b_brown2">中華信用評等公司</td>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12gray1">2020/09/29</td>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12gray1">twAA+</td>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12gray1">twA-1+</td>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12gray1">穩定</td>
                                </tr>
                                <tr>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12b_brown2">中華信用評等公司</td>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12gray1">2019/09/27</td>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12gray1">twAA+</td>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12gray1">twA-1+</td>
                                  <td height="20" align="center" bgcolor="#E7E2C5" class="text12gray1">穩定</td>
                                </tr>
                                
                            </table></td>
                          </tr>
                        </table></td>
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
