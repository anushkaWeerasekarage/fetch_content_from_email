<html>
    <head>
        <title>Wifi Password </title>
        <style>
            .p1{
                margin-left: 450px;
                margin-right: 450px;
                margin-top: 10px;
               }
            header{
                padding-top: 10px;
                padding-bottom: 15px;
                text-align: center;
                height:60px;
                line-height: 20px;
                background-color:#edeff2;
                   }
            .footer{
                position:fixed;
                width: 100%;
                background-color:#b3b3b3;
                left: 0;
                bottom: 0;
                text-align: center;
                font-size:16;
            }
            
             body{
                 align-items: center;
                 font-family: 'Open Sans', sans-serif;
                 font-size: 130%;
                 background-image: linear-gradient(180deg, rgba(191, 58, 48, .9), rgba(25, 32, 36, .7)), url("bg.jpg");
                 background-repeat: no-repeat;
                 background-size: cover;
                 background-position: center;
                 
                }
                table {
                    align = center;
            
                }
                td {
                    font-size: 40;
                    height: 100;
                    color:#999999;
                }
                .table_data {
                   font-Size: 60;
                   text-align: left;
                   padding-left: 40;
                   color: #ffffff;
                }
                .date {
                    font-size: 30;
                    color: #ffffff;
                }
        </style>
    </head>
    <header><h1>TODAY'S WIFI PASSWORD </h1></header>
 <body>
    <div  align="justify" class="p1" style = color:white>
    <?php date_default_timezone_set('Canada/Eastern');?>
        
        <span class="date"><center><br><b>Date&nbsp;&nbsp;: &nbsp;&nbsp;</b><?php  echo date("d/m/Y"); ?></center></span>
          <br>
       <!-- <br><b><center>INSTRUCTIONS<br><br> HOW TO CONNECT TO IBOOST WIFI?</center> </b>-->
        <table>
        <tr><td>Network</td><td class="table_data">RU-Secure</td> </tr>
        <tr><td>Username</td><td class="table_data">iboostwifi</td></tr>
        
   <?php
/* connect to gmail */
$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
$username = 'iboostdailywifi@gmail.com';
$password = 'iboost2018';
 
// enter the number of  messages you want to display from mailbox or
//enter 0 to display all  messages e.g.--> $m_acs = 0;
        $m_acs = 1;
        
/* try to connect */ 
/*Open an IMAP stream to a mailbox*/
        $inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

/* grab emails */
        $emails = imap_search($inbox,'FROM rmsadmin@ryerson.ca');

/* if emails are returned, cycle through each... */
if($emails) {
   
     /* begin output var */
        $output = '';

    /* put the newest emails on top */
        rsort($emails);
    
    /*limit results*/
        if($m_acs <= 1){
            
            array_splice($emails, $m_acs);
            }

    /* for every email... */
    foreach($emails as $email_number) {

        /* get information specific to this email */
        $overview = imap_fetch_overview($inbox,$email_number,0);
        $message = imap_fetchbody($inbox,$email_number,1);

        /* output the email header information */
       /* $output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
        $output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
        $output.= '<span class="from">'.$overview[0]->from.'</span>';
        $output.= '<span class="date"><b> '.$overview[0]->date.'</b></span>';*/
        #$output.= '</div>';

        /* output the email body */
        //$output = '<div align = "center" class="body"><br>'.$message.'</div>';
        $output = substr($message, 20);
        
        }

       echo "<tr><td>Password </td><td class='table_data'>".$output."</td></tr>";

}
/*Close an IMAP stream*/ 
imap_close($inbox);
          
            ?> 
        
     </div>
     </body>
    <footer class="footer"><b><br>Issues connecting to the wifi?</b>
            <br>Email:&nbsp; tngrant@ryerson.ca  </footer>
</html>