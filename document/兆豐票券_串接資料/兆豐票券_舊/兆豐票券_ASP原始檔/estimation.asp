<!--#INCLUDE FILE="db.asp" -->
<%
  CommandText1 = "select dton(tr_date) m_tr_date,text_1 from nt009 where id_type = 'I' order by tr_date desc" 
  Set rs1 = Server.CreateObject("ADODB.Recordset")
  rs1.Open commandtext1,conn
  
  CommandText2 = "select dton(tr_date) m_tr_date,text_2,text_3,text_4 from nt009 where id_type = 'D' order by tr_date desc" 
  Set rs2 = Server.CreateObject("ADODB.Recordset")
  rs2.Open commandtext2,conn
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/page1.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>���ײ���--������լ�P</title>
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

<body onload="MM_preloadImages('images/index_10a.gif','images/index_11a.gif','images/index_12a.gif','images/index_13a.gif','images/index_22.gif','images/index_25.gif','images/index_27.gif','images/index_29.gif','images/index_31.gif','images/index_33.gif','images/index_52.gif','images/index_14a.gif','file:///E|/Shelly/shelly-work/����/images/service/service_a_03.gif','file:///E|/Shelly/shelly-work/����/images/service/service_a_04.gif','file:///E|/Shelly/shelly-work/����/images/service/service_a_05.gif','file:///E|/Shelly/shelly-work/����/images/service/service_a_06.gif','file:///E|/Shelly/shelly-work/����/images/service/service_a_07.gif','file:///E|/Shelly/shelly-work/����/images/service/service_a_08.gif','images/index_15a.gif','images/estimation/estimation_a_05.gif','images/estimation/estimation_a_07.gif')">
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
                  <td width="357"><!-- InstanceBeginEditable name="EditRegion1" --><img src="images/estimation/estimation.jpg" width="357" height="146" /><!-- InstanceEndEditable --></td>
                  <td><!-- InstanceBeginEditable name="EditRegion2" -->
                    <table width="438" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td bgcolor="#920146"><img src="images/estimation/title_estimation.gif" width="189" height="40" /></td>
                        <td rowspan="3" align="left"><img src="images/estimation/estimation_03.jpg" width="195" height="147" /></td>
                      </tr>
                      <tr>
                        <td><a href="#a" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image35','','images/estimation/estimation_a_05.gif',1)"><img src="images/estimation/estimation_05.gif" name="Image35" width="243" height="52" border="0" id="Image35" /></a></td>
                      </tr>
                      <tr>
                        <td><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image36','','images/estimation/estimation_a_07.gif',1)"><img src="images/estimation/estimation_07.gif" name="Image36" width="243" height="55" border="0" id="Image36" /></a></td>
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
                    <table width="95%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="5%">&nbsp;</td>
                        <td width="95%" colspan="2"><a name="a" id="a"></a></td>
                      </tr>
                      <tr>
                        <td><img src="images/space.gif" width="20" height="20" /></td>
                        <td width="95%" class="tutle_12b">��P�Q�v���[�����</td>
                        <td class="tutle_12b">�Q�v�v�T�]�l���R</td>
                      </tr>
                      <tr>
                        <td rowspan="4">&nbsp;</td>
                        <td width="95%" rowspan="4" valign="top"><table width="320" border="0" cellpadding="5" cellspacing="1" bgcolor="#FFFFFF">
                            <tr>
                              <td width="100" height="25" bgcolor="#E8DBB3" class="text12gray1">�v�T�]�l���O</td>
                              <td width="300" height="25" bgcolor="#E8DBB3" class="text12gray1">�[ 
                                �� �� ��</td>
                            </tr>
                            <tr>
                              <td width="100" rowspan="5" valign="middle" bgcolor="e1d09b" class="text12gray1">�g�ٴ��� </td>
                              <td width="300" height="25" bgcolor="#F2ECD0" class="text12gray1"><a href="cambist.html#a58" class="link12brown">�������</a></td>
                            </tr>
                            <tr>
                              <td width="300" height="25" bgcolor="#F2ECD0" class="text12gray1"><a href="cambist.html#a59" class="link12brown">�P�ɫ���</a></td>
                            </tr>
                            <tr>
                                  <td width="300" height="25" bgcolor="#F2ECD0" class="text12gray1"><a href="cambist.html#a55" class="link12brown">�g�٦����v</a></td>
                            </tr>
                            <tr>
                                  <td width="300" height="25" bgcolor="#F2ECD0" class="text12gray1">�~�T�X�W�ΤJ�W</td>
                            </tr>
                            <tr>
                              <td width="300" height="25" bgcolor="#F2ECD0" class="text12gray1"><a href="cambist.html#a60" class="link12brown">����ﵦ�T��</a></td>
                            </tr>
                            <tr>
                              <td rowspan="2" bgcolor="e1d09b" class="text12gray1">�q�f���ȭ�</td>
                                  <td height="25" bgcolor="#F2ECD0" class="text12gray1"><a href="cambist.html#a56" class="link12brown">���O�̪�����</a><a href="cambist.html#a57" class="link12brown">��</a></td>
                            </tr>
                            <tr>
                                  <td height="25" bgcolor="#F2ECD0" class="text12gray1"><a href="cambist.html#a57" class="link12brown">Ļ�⪫������</a></td>
                            </tr>
                            <tr>
                              <td height="25" bgcolor="e1d09b" class="text12gray1">�f�����ĭ�</td>
                              <td height="25" bgcolor="#F2ECD0" class="text12gray1">�ۢ�A�B�ۢ�B�B��2</td>
                            </tr>
                            <tr>
                              <td rowspan="2" bgcolor="e1d09b" class="text12gray1">�ײv�ܰʭ�</td>
                              <td height="25" bgcolor="#F2ECD0" class="text12gray1"><a href="cambist.html#a62" class="link12brown">�g�`�b�B�ꥻ�b</a></td>
                            </tr>
                            <tr>
                              <td height="25" bgcolor="#F2ECD0" class="text12gray1">�ɭȡB�S��</td>
                            </tr>
                            <tr>
                              <td rowspan="3" bgcolor="e1d09b" class="text12gray1">����F����</td>
                              <td height="25" bgcolor="#F2ECD0" class="text12gray1">����z�ʨƷ|ĳ����</td>
                            </tr>
                            <tr>
                              <td height="25" bgcolor="#F2ECD0" class="text12gray1">���歫�K�{�v�B�s�ڷǳƲv�վ��V</td>
                            </tr>
                            <tr>
                              <td height="25" bgcolor="#F2ECD0" class="text12gray1">�����`���B���`�������n�͸�</td>
                            </tr>
                            <tr>
                              <td rowspan="2" bgcolor="e1d09b" class="text12gray1">�w�X���G��</td>
                              <td height="25" bgcolor="#F2ECD0" class="text12gray1">���Ӥ����F���`�w��o�椽�Ū��B</td>
                            </tr>
                            <tr>
                              <td height="25" bgcolor="#F2ECD0" class="text12gray1">���Ө�������٥��I�����B</td>
                            </tr>
                            <tr>
                              <td rowspan="2" bgcolor="e1d09b" class="text12gray1">�M�Q�{�׭�</td>
                              <td height="25" bgcolor="#F2ECD0" class="text12gray1">�ꤺ���u���Q�t</td>
                            </tr>
                            <tr>
                              <td height="25" bgcolor="#F2ECD0" class="text12gray1"><a href="cambist.html#a63" class="link12brown">�ꤺ�~�Q�t</a></td>
                            </tr>
                        </table></td>
                        <td width="95%" valign="top"><table width="350" border="0" cellpadding="5" cellspacing="1" bgcolor="#FFFFFF">
                            <tr>
                              <td width="200" height="25" bgcolor="e1d09b" class="text12gray1">�U 
                                �^ �] �l</td>
                              <td width="200" height="25" bgcolor="#F2ECD0" class="text12gray1">�W 
                                �� �] �l</td>
                            </tr>
                            <tr>
                              <td width="200" height="25" bgcolor="e1d09b" class="text12gray1"><a href="cambist.html#a52" class="link12brown">�q�f�^Ţ</a><br /></td>
                              <td width="200" height="25" bgcolor="#F2ECD0" class="text12gray1"><a href="cambist.html#a43" class="link12brown">�q�f�o��</a></td>
                            </tr>
                            <tr>
                              <td width="200" height="25" bgcolor="e1d09b" class="text12gray1">��w���ڡG<br />
                                ���@�u�{�ڡB�h��ļ���<br />                              </td>
                              <td width="200" height="25" bgcolor="#F2ECD0" class="text12gray1">��ú��w�G<br />
                                �ұo�|�ڡB����Ʒ~�վlú�w</td>
                            </tr>
                            <tr>
                              <td width="200" height="25" bgcolor="e1d09b" class="text12gray1">���沼��B�Ũ���<br />                              </td>
                              <td width="200" height="25" bgcolor="#F2ECD0" class="text12gray1">���沼��B�Ũ�o��</td>
                            </tr>
                            <tr>
                              <td width="200" height="25" bgcolor="e1d09b" class="text12gray1">����ĳq�Τ��}��������<br />                              </td>
                              <td width="200" height="25" bgcolor="#F2ECD0" class="text12gray1">����^���ĳq���</td>
                            </tr>
                            <tr>
                              <td width="200" height="25" bgcolor="e1d09b" class="text12gray1">����R��<br />                              </td>
                              <td width="200" height="25" bgcolor="#F2ECD0" class="text12gray1">������</td>
                            </tr>
                            <tr>
                              <td width="200" height="25" bgcolor="e1d09b" class="text12gray1">�l�x������<br />                              </td>
                              <td width="200" height="25" bgcolor="#F2ECD0" class="text12gray1">�l�x���^��</td>
                            </tr>
                            <tr>
                              <td width="200" height="25" bgcolor="e1d09b" class="text12gray1">�ѻ����Y�A�Ȧ�s�ڵ��c��<br />
                                ���s��w�s</td>
                              <td width="200" height="25" bgcolor="#F2ECD0" class="text12gray1">�ѻ��h�Y�A�Ȧ�s�ڵ��c��<br />
                                �w�s�ଡ�s</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" class="title_red_13b">�������(<%=rs1("m_tr_date").value%>)</td>
                      </tr>
                      <tr>
                        <td valign="top" class="text12gray1"><p align="left"><%=Replace(rs1("text_1").value, Chr(10), "<BR>")%><br />
                        </p>                            </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td colspan="2" rowspan="2" align="right"><a href="#top"><img src="images/top_1.gif" width="46" height="15" border="0" /></a></td>
                      </tr>
                      
                      
                      <tr>
                        <td rowspan="11">&nbsp;</td>
                        </tr>
                      <tr>
                        <td colspan="2" class="title_red_13b">�Ũ����
                          (<%=rs2("m_tr_date").value%>)
                          </p></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text12b_brown2"><strong><span lang="EN-US" xml:lang="EN-US">�@�B</span>�W�g�ꤺ�Ũ�ާQ�v�^�U</strong></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text12gray1"><p><%=Replace(rs2("text_2").value, Chr(10), "<BR>")%></p></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text12gray1">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text12b_brown2"><strong><span lang="EN-US" xml:lang="EN-US">�G�B</span>�v�T���g�Ũ�ާQ�v�i��]��</strong></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text12gray1"><p><%=Replace(rs2("text_3").value, Chr(10), "<BR>")%></p>                          </td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text12gray1">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text12b_brown2">�T�B���g�Q�v���ծi��</td>
                      </tr>
                      <tr>
                        <td colspan="2" class="text12gray1"><p><%=Replace(rs2("text_4").value, Chr(10), "<BR>")%></p></td>
                      </tr>
                      <tr>
                        <td height="30" colspan="2" align="right" class="text12gray1"><a href="#top"><img src="images/top_1.gif" width="46" height="15" border="0" /></a></td>
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
