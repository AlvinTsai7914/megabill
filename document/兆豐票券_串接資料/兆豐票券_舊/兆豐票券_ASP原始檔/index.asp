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
<title>���ײ���--����</title>
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
                                <td width="338" valign="top"><a href="news.asp#w" class="link12gray">����ʺA�G<%=Replace(rs1("brief").value, Chr(10), "<BR>")%>...</a></td>
                                </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                         </table>
                          <table width="345" border="0" cellspacing="0"  cellpadding="0" onmouseover="marq1.stop();" onmouseout="marq1.start();">
                              <tr>
                                <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td width="335" valign="top"><a href="news.asp#x" class="link12gray">��ڦ污�G<%=Replace(rs2("brief").value, Chr(10), "<BR>")%>...</a></td>
                                </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                          </table>
                            <table width="345" border="0" cellspacing="0"  cellpadding="0" onmouseover="marq1.stop();" onmouseout="marq1.start();">
                              <tr>
                                <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td width="335" valign="top"><a href="news.asp#y" class="link12gray">�ץ��污�G<%=Replace(rs3("brief").value, Chr(10), "<BR>")%>...</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                            </table><% IF Not RS4.EOF THEN %>
                            <table width="345" border="0" cellspacing="0"  cellpadding="0" onmouseover="marq1.stop();" onmouseout="marq1.start();">
                              <tr>
                                <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td width="335" valign="top"><a href="news.asp#z" class="link12gray">�Ũ�污�G<%=Replace(rs4("brief").value, Chr(10), "<BR>")%>...</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                            </table><% end if %>
                            <table width="345" border="0" cellspacing="0"  cellpadding="0" onmouseover="marq1.stop();" onmouseout="marq1.start();">
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top"><a href="pdf/�ĤQ���׷~���o��.pdf" target="_blank" class="style4">�����q�a��ĤQ���׷~���u�̨β�����ļ��v�u���C</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <!--�ݨD��19494 �޲z���c�ʴ� -->
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="http://info.csa.org.tw" target="_blank" class="link12gray">��U�Ҩ餽�|���s�u�Ҩ���϶B�F�M�ϡvhttp://info.csa.org.tw</a></td>
                              </tr>
							  
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  					  
							  
							  
							  <!--�ݨD��19238 ������������ -->
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="pdf/���ײ���P�����}�Mñ�p������Ƴs���ӷ~����.pdf?v=zf7SD17o8jI" target="_blank" class="link12gray">���ײ���P�����}�Mñ�p������Ƴs���ӷ~�����A����~���o�A���������ġC</a></td>
                              </tr>
							  
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>							  
							  
							  <!--�ݨD��18510 �޲z�������� -->
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.trust.org.tw/tw/news/671" target="_blank" class="link12gray">��U���s�H�U���|���u�֧Q�H�U�žɵu��</a></td>
                              </tr>
							  
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  
							  <!--�ݨD��18462 �޲z���c�ʴ�1100131 -->
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="pdf/2021_18462.pdf" target="_blank" class="link12gray">��U���s���F���u�s���~�ӤH�f�Τ@�Ҹ��v���</a></td>
                              </tr>
							  
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  
							   <!--�ݨD��18321 �޲z���B�p�� -->
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="pdf/���q�v�z3_0.jpg" target="_blank" class="link12gray">��U���s��F�|�u���ʤ��q�v�z3.0�v���</a></td>
                              </tr>
							  
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              
							  <!--�ݨD��18194 �޲z���c�ʴ� -->
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1">�u�Ҩ�ӵ��藍�|�V�������λȦ�b��A�ЫȤ�Ũ��F�W��A�H�O�٦ۨ��v�q�v</td>
                              </tr>
							  
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              
							  
                              
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top"><a href="http://moneywise.fsc.gov.tw" target="_blank" class="link12gray">���Ĵ��z�� http://moneywise.fsc.gov.tw</a>�C</td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>    
							  
							   <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top"><a href="http://www.aml-ba.org.tw" target="_blank" class="link12gray">�Ȧ椽�|����~���Υ����ꮣ�M�� http://www.aml-ba.org.tw</a>�C</td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>                            
                             
							  <tr>
                                <td width="10" valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td width="335" valign="top"><a href="http://www.fsc.gov.tw/ch/home.jsp?id=400&amp;parentpath=0,2&amp;dataserno=201306140001" target="_blank" class="link12gray">���޷|�u1998���ĪA�ȱM�u�v�~�w�}�q�ҥΡA�����p�����ĿԸߪA�ȡA�Щ�W�Z�ɶ������q�ܸ��X�u1998�v�C</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top"><a href=# onClick=window.open('foi.html','foi','width=650,height=260,directories=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,resizable=no,left=120,top=150,screenX=0,screenY=0');return false class="link12gray">���Į��O��ĳ�B�z�M�� http://www.foi.org.tw</a>�C</td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="link12gray"><a href="https://www.facebook.com/fsc.gov.tw" target="_blank" class="link12gray">�u���޷|�v�y�ѯ����M���C</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="link12gray"><a href="http://www.banking.gov.tw/ch/home.jsp?id=181&amp;parentpath=0,5" target="_blank" class="link12gray">���޷|�Ȧ槽����/���O��a/�žɵu���C</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="link12gray"><a href="http://www.cdic.gov.tw/main_guide/video.aspx?uid=52&amp;pid=52" target="_blank" class="link12gray">�����s�O���q/�ŶǱM��/�ŶǼv��/�u�@�g(106�~)�C</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="link12gray"><a href="pdf/amlo_n.pdf" target="_blank" class="link12gray">1���������~������s�k�C</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="link12gray"><a href="pdf/amlo2.jpg" target="_blank" class="link12gray">��F�|�~������줽�ǫŶǮ����C</a></td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="link12gray style6">��F�|�~������s�������ɡG<a href="pdf/��|���ͬ~������g-�s��.mp3" target="_blank" class="link12gray">�|���ͬ~������g</a>�B<a href="pdf/������I�~�ŷ�H�Y�g-�s��.mp3" target="_blank" class="link12gray">�����U�ŷ�H�Y�g</a>�C</td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1">���F����106 �~7 ��3 ��_�A���ѡu�տ�����ӿ��~�Ӯץ���y�å��v�@�~�A�տ������6�Ӥ�A�����i�󤺬F����F�q���y��T���H�۵M�H���Һ����ӿ��~�Ӯץ���y�å��A�ȡA���ϥλݭn�̡A�Цh�[�Q�ΡC</td>
                              </tr>
                              <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="download/money.zip" class="link12gray">��U���s��F�|�~������줽�ǤΦ�F�|�s�D�Ǽ��B���~������k�s��žɸ��(�u�~������k�s��I�������v�T�ݵ����v��U�B9�ڮ����P3��y���s���ɵ�)�C</a></td>
                              </tr>
                               <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
                              <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="pdf/����~�����.zip" target="_blank" class="link12gray">��U�žɦ�F�|�~������줽�Ǥ��q�l�����B��T�Ϫ�B�i�H�]</a>�B<a href="https://eywebstorage.ey.gov.tw/navigate/s/0BA4E89B2A7F4FEAA596E260405D6B266BL" target="_blank" class="link12gray">�u��</a>�@10�ڤ�šC</td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  
							   <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://eywebstorage.ey.gov.tw/navigate/s/6CBC0D53BAF94192B851BE3CE02E70186BL" target="_blank" class="link12gray">��U�žɦ�F�|�~������줽�Ǥ�107�~�~������žɮ����v�������</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="http://gcis.nat.gov.tw/mainNew/subclassNAction.do?method=getFile&amp;pk=922" target="_blank" class="link12gray">�s���q�k��107�~11��1��I��A���q����108�~1��31��e�b�i���q�t�d�H�ΥD�n�ѪF��T�ӳ����O�j������ƥӳ��A�Ա��ФW���}�Ghttp://ctp.tdcc.com.tw�ιq��4121166�C</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.tdcc.com.tw/portal/zh/publish/calendar" target="_blank" class="link12gray">�O�W���O�����2019�~�žɦ~��d�C</a></td>
                              </tr>
							  <tr>
                                <td colspan="2">&nbsp;</td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.aac.moj.gov.tw/ct.asp?xItem=536954&amp;ctNode=36887&amp;mp=289" target="_blank" class="link12gray">��U�žɪk�ȳ��G�F�p�u���~�۫H�v�z�[�ϳg�G�B�Ϭ~���v�žɵu���C</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							   <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.youtube.com/watch?v=u7RvclNWT54" target="_blank" class="link12gray">��U�žɪk�ȳ��G�F�p�s�@���F����P�L�q�v�u�����ѥ]�������v�C</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.moj.gov.tw/cp-272-120662-d3561-001.html" target="_blank" class="link12gray">��U�k�ȳ��žɥ��k�N�w���@��� https://www.moj.gov.tw/cp-272-120662-d3561-001.html�C</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>							  
							  
							  <!--�ݨD��17500 �޲z���c�ʴ� -->
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.youtube.com/watch?v=ZdlJ2lZep_I" target="_blank" class="link12gray">�]�F���I�F�z���ζH�v���u�~��²��-�]�F���M�A�b�@�_�v</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>
							  
							   <!--�ݨD��17516 �޲z���c�ʴ� -->
							   <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.youtube.com/watch?v=pNJs33OaSyg" target="_blank" class="link12gray">��U�k�ȳ��G�F�p�žɳz�������D�D�q�v�u�֩궧�� ���੯�֡vhttps://www.youtube.com/watch?v=pNJs33OaSyg</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>		
							  
							  <!--�ݨD��17517 �޲z���c�ʴ� -->
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://drive.google.com/drive/folders/1E9zjD3uQiu22VUaTbJhMUAArFFmDZ9ev" target="_blank" class="link12gray">��U��F�|�~������줽�ǫžɡu�~������O��~������--���W�U�g�v</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>	
							  
							  
							  <!--�ݨD��17563 �޲z���c�ʴ� -->
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="https://www.sfipc.org.tw/MainWeb/Article.aspx?L=1&amp;SNO=lQ7Pk+xS3CL7JASsn2uZ9w==" target="_blank" class="link12gray">��U�]�Ϊk�H����H�δ��f����H�O�@���߫žɡu���ߧζH�v</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>	
							  
							 
							   <!--�ݨD��17983 �k�� ���۵� -->
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="pdf/1090005121-0-1.pdf" target="_blank" class="link12gray">��U�žɧڰ�u��ڳz����´2019�~�M�G�L�H����
(CPI)�v���Z�C</a></td>
                              </tr>
							  <tr>
                                <td colspan="2"><img src="images/index_47.gif" width="338" height="14" /></td>
                              </tr>	
							   <!--�ݨD��17983 �k�� ���۵� -->
							  <tr>
                                <td valign="top"><img src="images/index_46.gif" width="7" height="12" /></td>
                                <td valign="top" class="text12gray1"><a href="pdf/0000151a00.pdf" target="_blank" class="link12gray">109�~��F�|�~������줽�ǫŶǮ����C</a></td>
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
                    <td width="265"><a href="pdf/�Q�`���Y�H�M�� - 110.pdf" target="_blank"><img src="images/index_67.gif" alt="" width="265" height="39" border="0" /></a><br />					  <a href="pdf/1110104����g��M��.pdf" target="_blank"><img src="images/index_68.JPG" alt="" width="265" height="39" border="0" /></a><br />					  <a href="pdf/1101228�����ݫȭ�h.pdf" target="_blank"><img src="images/index_69.JPG" alt="" width="265" height="39" border="0" /></a><br />                      

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
					  <!--�ݨD��18109 �Ũ� ��ʦ� -->
					  <table width="209" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                            <td width="199"><a href="pdf/1090828�o���T�����e.pdf" target="_blank" class="link12gray">��������ɶ����i</a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><img src="images/index_50.gif" width="209" height="11" /></td>
                          </tr>
                        </table>
                        <table width="209" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                            <td width="199"><a href="pdf/���ת��ı��Ѫѥ��������q�Ȥ��ƫO�K���I1090709.pdf" target="_blank" class="link12gray">���ת��ı��Ѫѥ��������q�Ȥ��ƫO�K���I</a></td>
                          </tr>
                          <tr>
                            <td colspan="2"><img src="images/index_50.gif" width="209" height="11" /></td>
                          </tr>
                        </table>
                          <table width="209" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                              <td width="199" valign="top"><a href="news.asp" class="link12gray">�w���ƫ����d���U���A�Ȥ�i�̭Ӯױ��λP��ڻݨD��ܽոѡB����ζD�^����ĳ�ѨM�覡�C</a></td>
                            </tr>
                            <tr>
                              <td colspan="2"><img src="images/index_50.gif" width="209" height="11" /></td>
                            </tr>
                          </table>
                          <table width="209" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                              <td width="199" valign="top"><a href="news.asp" class="link12gray">�ȶD�p���H���f�G�޲z���A�a�}�G�x�_���Ŷ���91��5�ӡA�p���q�ܡG(02)2381-0033�A</a><a href="mailto:mb01@megabills.com.tw" class="link12gray">�q�l�H�c:mb01@megabills.com.tw</a></td>
                            </tr>
                            <tr>
                              <td colspan="2"><img src="images/index_50.gif" width="209" height="11" /></td>
                            </tr>
                          </table>
                          <table width="209" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                              <td width="199" valign="top"><a href="news.asp" class="link12gray">���v�ŰȨ�ӤγB�z�Ѳ���ɼȦ�ɥR��h���ԸߥӶD��յ��f�G�������A�p���H�G�L�F�ݡA�p���q�ܡG02-2316-8830<br />
                                ���}���v���ӶD�B�z���f�G�������A�p���H�G�}�ݴ��A�p���q�ܡG02-2316-8825</a></td>
                            </tr>
                            <tr>
                              <td colspan="2"><img src="images/index_50.gif" width="209" height="11" /></td>
                            </tr>
                          </table>
                          <table width="209" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                              <td width="199" valign="top"><a href="FILE/person10212a.pdf" class="link12gray">�`���B�z�ΧQ�έӤH��Ƨi���ƶ�</a><span class="text12gray1">�[</span><a href="FILE/person10212b.pdf" class="link12gray">��ƤH��ϭӸ�k�ĤT���W�w�v�Q�ӽЮ�</a></td>
                            </tr>
                            <tr>
                              <td colspan="2"><img src="images/index_50.gif" width="209" height="11" /></td>
                            </tr>
                          </table>
                          <table width="209" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                              <td width="199" valign="top"><a href="pdf/W-8BEN-E2022216.pdf" target="_blank" class="link12gray">�����q�w�V�����|��(Internal Revenue Service�A²��IRS)�ӽеn�O��FATCA�k�צX�W�����ľ��c(Participating Foreign Financial Institution�A²��PFFI)����GIIN�X�C�����q��W-8BEN-E�v���A�p�U�ѰѡGW-8BEN-E</a></td>
                            </tr>
                            <tr>
                              <td colspan="2"><img src="images/index_50.gif" width="209" height="11" /></td>
                            </tr>
                          </table>
                          <table width="209" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="13" valign="top"><img src="images/index_51.gif" width="13" height="15" /></td>
                              <td width="199" valign="top" class="text12gray1"><p>�����q���|�q�l�H�c�Gaudit01@megabills.com.tw<br />
                                �M�u�q�ܡG02-2382-5449<br />
                                �a�}�G�x�_���Ŷ���91��2��<br />
                              ���z���G�]�֫�</p>
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
