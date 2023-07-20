<?php
$User_Id='saurabhk1';
$ldaprdn  = "kentmail\\".$User_Id;  
			 $ldappass = 'K11nt@817'; 
			 $ldapconn = ldap_connect("192.168.11.221") or die("Could not connect to LDAP server.");		
				 
			   if($ldapconn){
					echo $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);
				
			   if($ldapbind == 1) {
					echo 'authentication success';
			   } else {
				echo 'authentication fail';
			   }

			   }
?>