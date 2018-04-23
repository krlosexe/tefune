<?php
$titulo= array ("Bienvenido a inc.cl el mejor datcenter de Chile", "Bienvenido a inc.cl el mejor web hosting de Chile", "Bienvenido a inc.cl con el mejor servicio de 
hosting en Chile;");
$titulo_i= array_rand ($titulo,1);

$cuerpo= array ("Recuerda leer nuestro correo de activación de Servicio<br/>", "En inc.cl encuentras el mejor hosting de Chile<br/>", "Si posees dudas en tu servicio 
ll&aacute;manos<br/>", "Revisa nuestros planes Vps y Servidores Dedicados para potenciar tu empresa<br/>", 
"¿Deseas crear tu pagina web?</br>en INC podemos realizar tu web seg&uacute;n las necesidades de tu empresa</br> revisa nuestra secci&oacute;n de Dise&ntilde;o Web");
$cuerpo_i= array_rand ($cuerpo,1);

$pie= array ("Si tienes dudas contactanos a soporte@inc.cl </br>inc.cl el mejor hosting de Chile.", "Tenemos un equipo de soporte personalizado 24x7<br/> para que rea
lices tus consultas", "El servicio de web hosting te 
permite mantener un sitio web en Internet, guardar información multimedia,<br/>respaldos de información y además tener acceso a crear correos electrónicos corporativo
s con el nombre de tu propio dominio."); 
$pie_i= array_rand ($pie,1);

$url = "http://" . $_SERVER["HTTP_HOST"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..:: <?echo $titulo[$titulo_i]?> ::..</title>
<link rel="shortcut icon" href="http://www.inc.cl/wp-content/uploads/2014/05/favicon_inc.png"/>
<style type="text/css">
body {margin:0px;padding:0px;height:0px;}
#header {background-color:#72b100;padding:40px;/* Altura del header */}
#body {padding:10px;padding-bottom:80px;}
#footer {background: #72b100;width: 100%;float: left;padding: 0 0 150px;color: #ffffff;overflow: hidden;}
h1{font-family:"Times New Roman", Times, serif;    /*titulo Bienvenida*/font-size:25px;color:#72b100;}
a{font-family:Georgia, "Times New Roman", Times, serif;   /* letras de link*/font-size:15px;color:#72b100;text-decoration:none;}
.alternativo-url{color:#FFFFFF;font-size:20px;font-family:Georgia, "Times New Roman", Times, serif;}
p{font-family: Georgia, "Times New Roman", Times, serif;  /* letras de pie de pagina*/font-size:20px;color:#FFFFFF;text-align:center;}
</style>
</head>   
<body > 
        <div>
       <div id="header"></div>
        <div id="body">
        <div align="center" class="pocuer">
          <div class="logo"><a alt="inc.cl Web Hosting" href="https://www.inc.cl" target="_blank"><img alt="inc webhosting" src="http://www.inc.cl/wp-content/uploads/
2014/04/Logo2-1.png" ></a></div>
                                        <h1>Bienvenido a INC <br>Web Hosting en Chile</h1>
                  <div class="texto"><a><?echo $cuerpo[$cuerpo_i];?></br></a></div>
        </div>
<TABLE align="center" border="0">
    <tr>
       <td width="50"><a alt="INC Web Hosting" target="_blank"><img alt="Mejor Datacenter" src="https://www.hostname.cl/uploads/2015/07/cpanel_logo.png" width='50' he
ight='50' target="_blank"/></a></td>
       <td width="200"><a alt="INC Web Hosting" href="<?echo $url;?>/cpanel" target="_blank">Acceso a Cpanel</a></td>
       <td width="50"><a alt="INC Web Hosting" target="_blank"><img alt="Mejor Datacenter" src="https://www.hostname.cl/uploads/2015/07/contact-support.png" width='50
' height='50' target="_blank"/></a></td>
       <td width="200"><a alt="INC Web Hosting" href="http://clientes.inc.cl/submitticket.php?step=2&deptid=1" target="_blank">Ticket de Soporte</a></td>
    </tr>
       <td><a alt="INC Webmail" target="_blank"><img alt="Datacenter Chile" src="https://www.hostname.cl/uploads/2015/07/webmail-icon.png" width='50' height='50' targ
et="_blank"/></a></td>
       <td><a alt="INC Webmail" href="<?echo $url;?>/cpanel" target="_blank">Acceso Webmail</a></td>
       <td><a alt="INC Webmail" target="_blank"><img alt="Datacenter Chile" src="https://www.hostname.cl/uploads/2015/07/web-design-50x50.png" width='50' height='50' 
target="_blank"/></a></td>
       <td><a alt="INC Webmail" href="https://www.inc.cl/diseno-web" target="_blank">Dise&ntilde;o Web</a></td>
        <tr></tr> 
    <tr>
       <td><a alt="INC Blog Mejor WebHosting" target="_blank"><img alt="Datacenter Chile" src="https://www.hostname.cl/uploads/2015/07/logo-blog.png" width='50' heigh
t='50' target="_blank"/></a></td>
       <td><a alt="INC Blog Mejor WebHosting" href="http://www.inc.cl/blog" target="_blank">Blog de Noticias INC</a></td>
       <td><a alt="Reseller Hosting Cpanel vps" target="_blank"><img alt="Cpanel Chile" src="https://www.hostname.cl/uploads/2015/07/contratar_servicio.png" width='50
' height='50' target="_blank"/></a></td>
       <td><a alt="Reseller Hosting Cpanel vps" href="http://clientes.inc.cl/cart.php" target="_blank">Contrata Nuevos Productos</a></td>
    </tr> 
    <tr>
       <td><a alt="Cpanel Correo Web" target="_blank"><img alt="Cpanel Chile" src="https://www.hostname.cl/uploads/2015/07/videos_soporte.png" width='50' height='50' 
target="_blank"/></a></td>
       <td><a alt="Cpanel Correo Web" href="http://www.inc.cl/tutoriales" target="_blank">Videos Tutoriales</a></td>
       <td><a alt="INC Datacenter en Chile" target="_blank"><img alt="Mejor Hosting INC" src="https://www.hostname.cl/uploads/2015/07/preguntas_frecuentes.png" width=
'50' height='50' target="_blank"/></a></td>
       <td><a alt="INC Datacenter en Chile" href="http://clientes.inc.cl/knowledgebase.php?action=displaycat&catid=1" target="_blank">Preguntas Frecuentes</a></td>
    </tr>
    <tr>
       <td><a alt="INC Hosting en Chile" target="_blank"><img alt="Mejor Hosting INC" src="https://www.hostname.cl/uploads/2015/07/ip.png" width='50' height='50' targ
et="_blank"/></a></td>
       <td><a alt="INC Hosting en Chile" href="http://ip.inc.cl" target="_blank">Mi ip publica</a></td>
       <td><a alt="INC Cpanel vps" target="_blank"><img alt="Mejor Hosting INC" src="https://www.hostname.cl/uploads/2015/07/dominio.png" width='50' height='50' targe
t="_blank"/></a></td>
       <td><a alt="INC Cpanel vps" href="http://clientes.inc.cl/domainchecker.php" target="_blank">Compra tu Dominio</a></td>
    </tr>
    <tr>
       <td><a alt="INC Hosting en Chile" target="_blank"><img alt="Mejor Hosting INC" src="https://www.hostname.cl/uploads/2015/07/area_de_clientes.jpg" width='50' he
ight='50' target="_blank"/></a></td>
       <td><a alt="INC Hosting en Chile" href="http://clientes.inc.cl/clientarea.php" target="_blank">&Aacute;rea de Cliente</a></td>
       <td><a alt="INC Cpanel vps" target="_blank"><img alt="Mejor Hosting INC" src="https://www.hostname.cl/uploads/2015/07/notificar_pago.png" width='50' height='50
' target="_blank"/></a></td>
       <td><a alt="INC Cpanel vps" href="http://www.inc.cl/notificacion-de-pago" target="_blank">Notificar Pago</a></td>
    </tr>
    <tr>
       <td colspan="4" align="center"><a alt="inc cpanel partner" target="_blank"><img src="http://ip.hn.cl/img/qr-inc.png" alt="Mejor Hosting inc" target="_blank"/></a></td>
    </tr>
    <tr>
       <td colspan="4" align="center" ><a alt="INC Cpanel vps" href="http://www.inc.cl" target="_blank">INC Web Hosting</a></td>   
    </tr>              
<tr>
<td colspan="4" align="center" ></td>  
</tr>

</TABLE>
 <div class="texto" align="center"> <a><?echo $pie[$pie_i]?></a></div>
 
</div>

  <div id="footer">
  <table align="center">
        <tr align="center">
                <td><p>Pagina web alojada en <a class="alternativo-url" alt="INC Cpanel vps" href="http://www.inc.cl" target="_blank">INC.CL</a></p><p>se encuentra en
 construcci&oacute;n</p></td>  
        </tr>
  </table> 
  <table align="center">
              <tr align="center"> 
                 <td width="300px"><a alt="Hostname cpanel partner" target="_blank"></a></td>   
                 <td width="300px"><a alt="Hostname datacenter en chile" target="_blank"><img alt="Mejor Hosting Hostname" src="http://www.inc.cl/wp-content/uploads/2
014/04/Logo2-1.png" target="_blank"/></a></td>   
                 <td width="300px"><a alt="Hostname wordpress joomla" target="_blank"></a></td>        
             </tr>
             <tr align="center"> 
                 <td><a class="alternativo"></a></td>
                 <td><a class="alternativo"><p>Web Hosting en<br/>Chile</p></a></td>
                 <td><a class="alternativo">Noc Partners<br/>Softaculous</a></td>
            </tr>
        </table> 
    </div>
    </div>
  
</div>
</body>

</html>
